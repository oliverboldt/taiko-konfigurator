<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="UTF-8" />
	</head>

	<body>
		<div id=wrapper>
			<?php
				
				// print "Hallo\n";
				
				$ip = $_SERVER['REMOTE_ADDR'];
				print $ip. " ";
				
				$response = file_get_contents('http://api.ipstack.com/'.$ip.'?access_key=6216ea110558547a774d1e2094d20e39');
				//print $response;
				
				$obj = json_decode($response);
				
				print $obj->{'city'};
			?>
		</div>
	</body>
</html>
