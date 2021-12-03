<!DOCTYPE html>
<html>
<body>
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
	

	if (true)
	{
		if ($city == "")
		{
			$accesskey = "6216ea110558547a774d1e2094d20e39";
					
			$geoip = file_get_contents('http://api.ipstack.com/'.$ip.'?access_key='.$accesskey);
			$geoip_obj = json_decode($geoip);	
			
			print $geoip."<br/>";
			
			// 2. Geo-IP Account versuchen
			//
			if (property_exists($geoip_obj,'success')
			&& $geoip_obj->{'success'} == false)
			{
				$accesskey = "eace2da410d83c0357f6eee5410c374a";
				
				$geoip = file_get_contents('http://api.ipstack.com/'.$ip.'?access_key='.$accesskey);
				$geoip_obj = json_decode($geoip);	
				print $geoip."<br/>";
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
		}
	
		$sql = "INSERT INTO mytaikodrum (`filtered`, tld, lang, userId, ip, city, date, page, referrer, drumId, colorId, woodId, handleId) ".
				"VALUES ('$filtered', '$tld', '$lang', '$userId', '$ip', '$city', '$date', '$page', '$referrer', '$drumId', '$colorId', '$woodId', '$handleId');";
		$res = $conn->query($sql);
		print "SQL=$sql\nRes=$res";
	}
/*	else
	{
		$sql = "UPDATE mytaikodrum SET `count`=`count`+1 WHERE targetid = '$targetID' and sourceid = '$sourceID' and `date` = '$date'";
		$res = mysql_query($sql, $db);
		print "SQL=$sql\nRes=$res";
	}
*/
	$conn->close(); 
?>

</body>
</html>
