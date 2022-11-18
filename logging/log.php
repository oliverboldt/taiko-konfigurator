
<?php
	
	$conn = new mysqli("localhost", "ollibo", "tortuga#db1", "oliver-boldt-db");

	if ($conn->connect_error) 
	{
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$date = date("Y-m-d");
	$city = "";

	$ip = $_SERVER['REMOTE_ADDR'];
	$filtered = ($_REQUEST['filtered'] == "1" ? 'i' /*intern*/ : 'r' /*real*/);
	$tld = $_REQUEST['tld'];
	$lang = $_REQUEST['lang'];
	$userId = $_REQUEST['userId'];

	$page = $_REQUEST['page'];
	$referrer = $_REQUEST['referrer'];
	$drumId = $_REQUEST['drumId'] ?? null;
	$woodId = $_REQUEST['woodId'] ?? null;
	$colorId = $_REQUEST['colorId'] ?? null;
	$handleId = $_REQUEST['handleId'] ?? null;
	
	$json_response = "";
	
	
	if (! isset($userId)) // vielleicht Suchmaschine...
		return; 
	
	if (true)
	{
		$sql = "SELECT city, filtered FROM mytaikodrum WHERE userId = '$userId' and `date`='$date'";
		$res = $conn->query($sql);
		// print "Query 1<br/>";
		
		$eintrag = $res->fetch_object();
		
		if ($eintrag != null)
		{
			$city = $eintrag->city;
			$filtered = $eintrag->filtered;
		}
	}
	

	if ($city == "" || $lang == "??")
	{
		$accesskey = "6216ea110558547a774d1e2094d20e39";
				
		$geoip = file_get_contents('http://api.ipstack.com/'.$ip.'?access_key='.$accesskey);
		$geoip_obj = json_decode($geoip);	
		// print $geoip."<br/>";JSON !
		
		// 2. Geo-IP Account versuchen
		//
		if (property_exists($geoip_obj,'success')
		&& $geoip_obj->{'success'} == false)
		{
			$accesskey = "eace2da410d83c0357f6eee5410c374a";
			
			$geoip = file_get_contents('http://api.ipstack.com/'.$ip.'?access_key='.$accesskey);
			$geoip_obj = json_decode($geoip);	
			// print $geoip."<br/>"; JSON !
		}
		
		$city = $geoip_obj->zip." ".$geoip_obj->city;
		
		if ($geoip_obj->country_code != "DE")
		{
			$city = $geoip_obj->country_code."-".$city;
			
			if ($geoip_obj->country_code == "US"
			||  $geoip_obj->country_code == "CN"
			||  $geoip_obj->country_code == "SG")
				$filtered = 's'; // Suchmaschine ?		
		}
		
		if ($lang == "??")
		{	
			$lang = "en";
			
			if ($geoip_obj->country_code == "DE"
			||  $geoip_obj->country_code == "CH"
			||  $geoip_obj->country_code == "AT")
				$lang = "de";
		}
	}

	$sql = "INSERT INTO mytaikodrum (`filtered`, tld, lang, userId, ip, city, date, page, referrer, drumId, colorId, woodId, handleId) ".
			"VALUES ('$filtered', '$tld', '$lang', '$userId', '$ip', '$city', '$date', '$page', '$referrer', '$drumId', '$colorId', '$woodId', '$handleId');";
	$res = $conn->query($sql);
	// print "SQL=$sql\nRes=$res";
	
	$json_response = '{ "lang": "'.$lang.'" }'; // JSON-Response

	$conn->close(); 
	print $json_response;
?>

