<?php   
		// Parameter
		//
		// sys_from
		// sys_liame
		// sys_subject
		// sys_template
		
		function processTemplate($source)
		{
			$dest = "";
			$offset = 0;
			$offset2 = strpos($source, "__", $offset);
			
			while ($offset2 !== false)
			{
				$dest .= substr($source, $offset, $offset2-$offset);
			
				$offset = $offset2+2;
				$offset2 = strpos($source, "__", $offset);
				
				if ($offset2 !== false)
				{
					$param_name = substr($source, $offset, $offset2-$offset);
					$param_value = $_REQUEST[$param_name];
					
					$dest .= $param_value;
					
					$offset = $offset2+2;
					$offset2 = strpos($source, "__", $offset);
				}	
			}
			
			$dest .= substr($source, $offset);
		
			return $dest;
		}
		
		$mailFrom = $_REQUEST['sys_from'];	
		
		if (!isset($mailFrom) || $mailFrom == "")
			$mailFrom = "noreply@mytaikodrum.de";

		$mailTo	= $_REQUEST['sys_liame'];
		$mailSubject = $_REQUEST['sys_subject'];
		
		$mailHeaders = "From: ".$mailFrom."\n";
		$mailHeaders .= "Content-Type: text/html\n";
		$mailHeaders .= "BCC: wadaiko@posteo.de,".$_REQUEST['sys_from']."\n";
		
		$template = $_REQUEST['sys_template'];
		$mailBody = file_get_contents($template);
		$mailBody = processTemplate($mailBody);

		if (mail($mailTo, $mailSubject, $mailBody, $mailHeaders))
		{
			$message = "<p> <font color=green>Okay</font>: eMail wurde verschickt";
		}
		else
		{
			$message = "<p> <font color=red>FEHLER</font>: eMail wurde NICHT verschickt";
			http_response_code(400);
			exit ("error sending mail");
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta charset="UTF-8" />
	<title>Mail verschicken</title>
</head>
<body>
	<?php
		if (isset($message))
			echo $message;
	?>
	</body>
</html>
