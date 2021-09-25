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
		.green { color: green; font-weight: 500; }
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
				$page = $_REQUEST['page'];
				$where = "";
				
				if (isset($page))
				{
					$where = "WHERE page = '$page' and filtered = '0'";
				}
				else if (isset($userId))
					$where = "WHERE userId = '$userId'";
				else if (isset($filtered))
					$where = "WHERE filtered = $filtered";

				$sql = "SELECT filtered, tld, lang, userId, ip, city, page, date, referrer, drumId, woodId, colorId, handleId".
						" FROM mytaikodrum  ".$where." ORDER BY date DESC, userId LIMIT 300";				
				$res = mysqli_query($dbconn,$sql);
				
				$lastdate = "";
				$lastUserId = "";
				
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
				    
				    $userId = " ";
				    
				    if ($eintrag->userId != null)
				    	$userId = $eintrag->userId;
				    
				    if ($lastdate != $eintrag->date 
				    ||  $lastUserId !=  $userId)
				    	$printDate = $eintrag->date;
				    else
				    	$printDate = '';
				    

					if ($eintrag->page == "offer")
				    	print "<tr class='green'>";
				    else
				    	print "<tr>";    
				    
				    if ($eintrag->filtered == "1")
				    	print "<td>f</td>";
				    else
				    	print "<td></td>";
				    
				    if ($lastUserId	!= $userId)
				    {    	
				    	$printUserId = substr($userId,strlen($userId)-4);
				    	$printCity = $eintrag->city;
				    }
				    else
				    {
				    	$printUserId = '';
				    	$printCity = '';
				    }
				    	
				    print "<td class='col24'>$printDate</td>";
				    
				    if ($lastUserId	!= $userId)
				    	print "<td class='userId'><a href='?userId=$userId' title='$userId'>".$printUserId."</a></td>";
				    else
				    	print "<td class='userId'>".$printUserId."</td>";
				    
				    print "<td>$printCity</td>";
			    	print "<td>";
			    	
			    	if ($eintrag->tld != null)
			    	{
			    		print $eintrag->tld."/".$eintrag->lang.", ";
			    	}
			    	
			    	if ($eintrag->page == "offer")
			    	{
			    		print "<a href='?page=offer&filtered=0'>".$eintrag->page."</a>";
			    	}
			    	else
			    	{
			    		print $eintrag->page;
			    	}
				    
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
				    	
				    $lastdate = $eintrag->date;
				    $lastUserId = $eintrag->userId;
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

