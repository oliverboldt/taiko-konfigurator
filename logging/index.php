<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Logging</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet" >
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/menu.css">
		<script src="../js/common.js"></script>
		<style type="text/css">	
		.col24 { background-color: lightgrey; }
		.userId { text-align: center; }
		td { padding: 5px; }
		th { text-align: left; }
		#wrapper { width: 1000px; }
		</style>
	</head>

	<body>
		<div id=wrapper>
			<div id=menu>
				<img id="logo" src="../image/logo.jpg"/>
				<div class="menuitem-mytaikodrum right" onclick="history.back();">
					my<strong>taiko</strong>drum.de
				</div>
				<div class=cleardiv></div>
			</div>
			<div class=section>
				<script type="text/javascript">
					localStorage.setItem("filtered", "1");
				</script>
			<table>
			<tr>
				<th>f</th>
				<th>Datum</th>
				<th>Benutzer</th>
				<th>Ort</th>
				<th>Seite / Referrer</th>
				<th>Trommel</th>
				<th>Holz</th>
				<th>Farbe</th>
				<th>Griffe</th>
				</tr>
			<?php
				// $db = mysql_connect("localhost", "ollibo", "tortuga#db1");
				// mysql_select_db("oliver-boldt-db",$db);
				$dbconn = mysqli_connect("localhost", "ollibo", "tortuga#db1","oliver-boldt-db");
			
				if (!$dbconn) 
				{
			  		die("Connection failed: " . mysqli_connect_error());
				}				
				
				$filtered = $_REQUEST['filtered'];
				$userId = $_REQUEST['userId'];
				$where = "";
				
				if (isset($userId))
					$where = "WHERE userId = '$userId'";
				else if (isset($filtered))
					$where = "WHERE filtered = $filtered";

				$sql = "SELECT filtered, userId, ip, city, page, date, referrer, drumId, woodId, colorId, handleId".
						" FROM mytaikodrum  ".$where." ORDER BY date DESC LIMIT 300";				
				$res = mysqli_query($dbconn,$sql);
				
				$lastdate = "";
				
				while ($eintrag = mysqli_fetch_object ($res)) 
				{
					// Tageswechsel
					//
				    if ($lastdate != "" && $lastdate != $eintrag->date)
				    {
				     	print "<tr>";
				     	print "<td></td>";
				     	print "</tr>";
				    }
				    
				    $lastdate = $eintrag->date;

				    print "<tr>";
				    if ($eintrag->filtered == "1")
				    	print "<td>f</td>";
				    else
				    	print "<td></td>";
				    print "<td class='col24'>$eintrag->date</td>";
				    print "<td class='userId'><a href='?userId=$eintrag->userId' title='$eintrag->userId'>".substr($eintrag->userId,strlen($eintrag->userId)-4)."</a></td>";
				    print "<td class='col24-off'>$eintrag->city</td>";
				    print "<td>$eintrag->page";
				    
				    if ($eintrag->referrer != "" 
				    && stripos($eintrag->referrer,"mytaikodrum") === FALSE)
				    {
				    	print ", ".$eintrag->referrer;
				    }
				    print "</td>";
				    
				    print "<td>".str_replace("_DAIKO","",$eintrag->drumId)."</td>";				   
				    print "<td>".str_replace("WOOD_","",$eintrag->woodId)."</td>";				   
				    print "<td>".str_replace("WOODCOLOR_","",$eintrag->colorId)."</td>";				   
				    print "<td>".str_replace("HANDLE_","",$eintrag->handleId)."</td>";				   
				    print "</tr>"
				    	.PHP_EOL;
				}
				mysqli_free_result ($res);
			?>
			</table>				
			</div>
			<div class="footer">
				<div class="rechtliches"> <a href="../impressum.html">Impressum</a> | <a href="../dsgvo.html">DSGVO</a></div>
				<div class="cleardiv"></div>
			</div>
		</div>
	</body>

</html>