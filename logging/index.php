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
		.today { background-color: lightgreen; }
		.userId { text-align: center; }
		td { padding: 5px; }
		th { text-align: left; }
		h1 { background-color: lightgrey; padding: 5px; }
		#wrapper { width: 1000px; }
		.green { color: green; font-weight: 500; }
		.highlight { background-color: yellow; }
		</style>
	</head>

	<?php
		$dbconn = mysqli_connect("localhost", "ollibo", "tortuga#db1","oliver-boldt-db");
	
		if (!$dbconn) 
		{
	  		die("Connection failed: " . mysqli_connect_error());
		}				
		
		$filtered = $_REQUEST['filtered'] ?? null;
		$userId = $_REQUEST['userId'] ?? null;
		$page = $_REQUEST['page'] ?? null;
	?>

	<body>
		<div id="wrapper">
			<div id="menu">
				<img id="logo" src="../image/logo.jpg"/>
				<div class="menuitem-mytaikodrum right" onclick="history.back();">
					my<strong>taiko</strong>drum.de
				</div>
				<div class=cleardiv></div>
			</div>
			<div class="section">
				<script type="text/javascript">
					localStorage.setItem("filtered", "1");
				</script>

				<h1>Benutzer pro Tag</h1>

				<?php
					$dateStart = date('Y-m-d', strtotime('-1 month')); // date(time() - (30 * 24 * 60 * 60));

					$where = "WHERE filtered = '$filtered' AND date > '$dateStart'";

					$sql = "SELECT filtered, tld, lang, userId, ip, city, page, date, referrer, drumId, woodId, colorId, handleId".
							" FROM mytaikodrum ".$where." ORDER BY date DESC, userId";		

					// Anzahl der Besuche/Seitenabrufe pro userId
					//
					// SELECT userId, count(distinct date) FROM `mytaikodrum` WHERE filtered='r' GROUP BY userId ORDER BY date DESC	
					// SELECT userId, count(date) FROM `mytaikodrum` WHERE filtered='r' GROUP BY userId ORDER BY date DESC		
					// SELECT userId, count(distinct date) AS Visits, count(date) AS Pages FROM `mytaikodrum` 
					//		WHERE filtered='r' GROUP BY userId ORDER BY date DESC

					// print "<p>$sql</p>";		
				?>

				<table>
					<tr>
						<th>Datum</th>
						<th>Benutzer</th>
						<th>Orte</th>
					</tr>
					
				<?php

					function userCityLink($userId, $city)
					{
						return "<a class='$userId' onmouseover='onUserLinkHover(\"$userId\");' href='?userId=$userId'>$city</a>";
					}
				
					$lastdate = "";
					$lastuserId = "";
					$userCount = 0;
					$totalUserCount = 0;
					$cities = "";

					$res1 = mysqli_query($dbconn,$sql);

					while ($eintrag = mysqli_fetch_object ($res1)) 
					{
						// Selber Tag
						//
						if ($eintrag->date == $lastdate || $lastdate == "")
						{
							if ($eintrag->userId == $lastuserId)
							{
								// Schon vorhanden, pageCount++
							}
							else
							{
								$userCount++;
						    	$totalUserCount++;

						    	$userLink = userCityLink($eintrag->userId,$eintrag->city); 

							    if ($cities == "")
							   	 	$cities = $userLink;
							   	 else
							   	 	$cities .= ", ".$userLink;	
							}
						}
						else // Tageswechsel
						{
							// Letzten Tag wegschreiben
					    	//
					    	print "<tr>";
					    	if ($lastdate == date("Y-m-d"))
					    		print "<td class='today'>".$lastdate."</td>";
					    	else
					    		print "<td>".$lastdate."</td>";
					    	print "<td>".$userCount."</td>";
					    	print "<td>".$cities."</td>";
					    	print "</tr>";

					    	// Für aktuellen Tag merken
					    	$cities = userCityLink($eintrag->userId,$eintrag->city);
					    	$userCount = 1;
					    	$totalUserCount++;
						} 

					    $lastdate = $eintrag->date;   	
					    $lastuserId = $eintrag->userId;			    	
					}

					if ($cities != "")
				    {
				    	print "<tr>";
				    	print "<td>".$lastdate."</td>";
				    	print "<td>".$userCount."</td>";
				    	print "<td>".$cities."</td>";
				    	print "</tr>";
				    }

					mysqli_free_result ($res1);

					print "<tr><td colspan='3'>$totalUserCount Benutzer insgesamt in diesem Zeitraum.</td></tr>"
				?>
				</table>	

				<h1>Seitenabrufe</h1>	

				<table>
					<tr>
						<th>f</th>
						<th>Datum</th>
						<th>Benutzer</th>
						<th>Ort</th>
						<th>Seite / Referrer</th>
						<th>Trommel</th>
						<th>Holz/Farbe</th>
						<th>Griffe</th>
					</tr>

				<?php
					$where = "";
					
					if (isset($page))
					{
						$where = "WHERE page = '$page' and filtered = 'r'";
					}
					else if (isset($userId))
						$where = "WHERE userId = '$userId'";
					else if (isset($filtered))
						$where = "WHERE filtered = '$filtered' AND date > '$dateStart'";

					$sql = "SELECT filtered, tld, lang, userId, ip, city, page, date, referrer, drumId, woodId, colorId, handleId".
							" FROM mytaikodrum  ".$where." ORDER BY date DESC, userId LIMIT 500";				
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
					    

						if ($eintrag->page == "offer"
						&&  $page != "offer")
					    	print "<tr class='green'>";
					    else
					    	print "<tr>";    
					    
					    print "<td>$eintrag->filtered</td>";
					    
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
					    	
					    if ($eintrag->date == date("Y-m-d"))
					    	print "<td class='today'>$printDate</td>";
					    else
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
				    	
				    	if ($eintrag->page == "offer" &&  $page != "offer")
				    	{
				    		print "<a href='?page=offer'>".$eintrag->page."</a>";
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
					    
					    if ($eintrag->drumId != "")
					    {
						    print "<td>".str_replace("_DAIKO","",$eintrag->drumId)."</td>";				   
						    print "<td>".str_replace("WOOD_","",$eintrag->woodId)."/";				   
						    print        str_replace("WOODCOLOR_","",$eintrag->colorId)."</td>";				   
						    print "<td>".str_replace("HANDLE_","",$eintrag->handleId)."</td>";				   
						    print "</tr>"
						    	.PHP_EOL;
					    }
					    	
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

		<script type="text/javascript">
			function onUserLinkHover(userId)
			{ 
				var allOldHighlights = document.querySelectorAll(".highlight");

				for (i=0; i<allOldHighlights.length; i++)
				{
					allOldHighlights[i].classList.remove("highlight");
				}

				var allNewHighlights = document.querySelectorAll("." + userId);

				for (i=0; i<allNewHighlights.length; i++)
				{
					allNewHighlights[i].classList.add("highlight");
				}
			}
		</script>
				
	</body>

</html>

