<?php   

	// require /*url*/'verteiler/verteilerinhalt-einfugen.php';

	//
	// Parameter
	//     	$name
	//		$email
	//		$sys_an
	//		$sys_betreff
	//		$sys_ok
	//		$sys_fehler

	$spam = false;
	
	if (isset($_REQUEST['name']))
		$name = $_REQUEST['name'];

	if (isset($_REQUEST['liame']))
	{
		$email = $_REQUEST['liame'];
		
		if ($_REQUEST['email'] != "")
			$spam = true;
	}
	else if (isset($_REQUEST['email']))
		$email = $_REQUEST['email'];

	// if (isset($_REQUEST['verteiler']))
	//	$verteiler = $_REQUEST['verteiler'];

	$sys_an		 = $_REQUEST['sys_an'];
	$sys_betreff = $_REQUEST['sys_betreff'];
	$sys_ok	 	 = $_REQUEST['sys_ok'];
	$sys_fehler	 = $_REQUEST['sys_fehler'];
	
	// echo "Anzahl parameter:".count($_GET)."<p>";
	
	if ($spam === true)
	{
		$message = "<font color=red>SPAM:</font> Formular wurde wohl von einem Roboter abgeschickt!";
	}
	else if ((! isset($name) || $name != "")		// name darf nicht leer sein, aber fehlen
	&&  (! isset($email) || $email != ""))	// email genauso
	{
		$mailBody = "Formulardaten\n";
		$hasData = false;
		
		foreach($_REQUEST as $key => $value)
		{
			if (substr($key,0,4) != "sys_")
			{
				$mailBody .= "$key = $value\n";
				$hasData = true;
			}
		}
		
		if ($sys_an != "")
			$mailTo = $sys_an;
		else
			$mailTo = "anfrage@mytaikodrum.de";
		
		$mailHeaders = "From: ".$email."\n";
		$mailSubject = $sys_betreff;
		
		if ($hasData)
		{	
			// Probleme 1-2018 mit yahoo.de Adressen
			mail($mailTo, "KOPIE: ".$mailSubject, $mailBody, "From: ".$mailTo."\n");
		}
	
		if ($hasData &&  mail($mailTo, $mailSubject, $mailBody, $mailHeaders))
		{
			if ($sys_ok != "")
			{
				/* if ($email != "" && isset($verteiler))
				{
					$db = mysql_connect("localhost", "ollibo", "tortuga#db1");
					mysql_select_db("oliver-boldt-db",$db);
		
					VerteilerinhaltEinfugen($db,$verteiler,$email,$geoip_country_code,$geoip_region_name,$geoip_city);
				}*/
		
				header("Location: $sys_ok");
				exit;
			}	
			else
				$message = "<p> <font color=green>Okay</font>: eMail wurde verschickt";
		}
		else
		{
			if ($sys_fehler != "")
			{
				header("Location: $sys_fehler");
				exit;
			}	
			else
				$message = "<p> <font color=red>FEHLER</font>: eMail wurde NICHT verschickt";
		}
		
	}
	else
	{
		$message = "<font color=red>FEHLER:</font> Name und eMail m?ssen gesetzt sein.";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<title>Mail verschicken</title>
</head>
<body bgcolor="#ffffff">
	<p><?php
		if (isset($message))
			echo $message;
	?>
	<p><a href="javascript:history.back();">zur&uuml;ck</a></p>
	</body>
</html>
