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
		<script src="../common.js"></script>
		<style type="text/css">	
		.col24 { background-color: lightgrey; }
		td { padding: 5px; }
		th { text-align: left; }
		#wrapper { width: 1200px; }
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
			<table>
			<tr>
				<th>Datum</th>
				<th>IP-Adresse</th>
				<th>Ort</th>
				<th>Referrer</th>
				<th>Trommel</th>
				<th>Farbe</th>
				<th>Holz</th>
				<th>Griffe</th>
				</tr>
			<?php
				$db = mysql_connect("localhost", "ollibo", "tortuga#db1");
				mysql_select_db("oliver-boldt-db",$db);

				$sql = "SELECT ip, city, date, referrer, drumId, colorId, woodId, handleId FROM mytaikodrum  ORDER BY date DESC LIMIT 300";				
				$res = mysql_query($sql, $db);
				
				while ($eintrag = mysql_fetch_object ($res)) 
				{
				    print "<tr>";
				    print "<td class='col24'>$eintrag->date</td>";
				    print "<td>$eintrag->ip</td>";
				    print "<td class='col24'>$eintrag->city</td>";
				    print "<td>$eintrag->referrer</td>";
				    print "<td>$eintrag->drumId</td>";
				    print "<td>$eintrag->colorId</td>";
				    print "<td>$eintrag->woodId</td>";
				    print "<td>$eintrag->handleId</td>";
				    print "</tr>";
				}
				mysql_free_result ($res);
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