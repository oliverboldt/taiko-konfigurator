<?php

	// print "Hallo\n";
	
	$db = mysql_connect("localhost", "ollibo", "tortuga#db1");
	mysql_select_db("oliver-boldt-db",$db);
	// $dbconn = mysqli_connect("localhost", "ollibo", "tortuga#db1","oliver-boldt-db");
	
	$date = date("Y-m-d");
	$ip = $_SERVER['REMOTE_ADDR'];
	$city = "";
	$filtered = ($_REQUEST['filtered'] == "1" ? 1 : 0);
	$tld = $_REQUEST['tld'];
	$lang = $_REQUEST['lang'];
	$userId = $_REQUEST['userId'];
	$page = $_REQUEST['page'];
	$referrer = $_REQUEST['referrer'];
	$drumId = $_REQUEST['drumId'];
	$woodId = $_REQUEST['woodId'];
	$colorId = $_REQUEST['colorId'];
	$handleId = $_REQUEST['handleId'];
	
	$checkDuplicate = is_null($drumId);
	$isDuplicate = false;

	if ($checkDuplicate)
	{
		$sql = "SELECT count(*) FROM mytaikodrum WHERE ip = '$ip' and `date`='$date'";
		$res = mysql_query($sql,$db);
		print "SQL=$sql\nRes=$res";
		
		if ($eintrag = mysql_fetch_array($res,MYSQL_NUM))
		{
			$zaehler = $eintrag[0];
			$isDuplicate = $zaehler > 0;
		}
			
		mysql_free_result ($res);
		
	}

	if (true) // ! $isDuplicate)
	{
		$geoip = file_get_contents('http://api.ipstack.com/'.$ip.'?access_key=6216ea110558547a774d1e2094d20e39');
		$geoip_obj = json_decode($geoip);	
		$city = $geoip_obj->{'zip'}." ".$geoip_obj->{'city'};
		
		if ($geoip_obj->{'country_code'} != "DE")
			$city = $geoip_obj->{'country_code'}."-".$city;
	
		$sql = "INSERT INTO mytaikodrum (`filtered`, tld, lang, userId, ip, city, date, page, referrer, drumId, colorId, woodId, handleId) ".
				"VALUES ('$filtered', '$tld', '$lang', '$userId', '$ip', '$city', '$date', '$page', '$referrer', '$drumId', '$colorId', '$woodId', '$handleId');";
		$res = mysql_query($sql, $db);
		print "SQL=$sql\nRes=$res";
	}
/*	else
	{
		$sql = "UPDATE mytaikodrum SET `count`=`count`+1 WHERE targetid = '$targetID' and sourceid = '$sourceID' and `date` = '$date'";
		$res = mysql_query($sql, $db);
		print "SQL=$sql\nRes=$res";
	}
*/

?>
