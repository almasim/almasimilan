<html lang="hu">
<head>
	<meta charset="utf-8">
  	<title>Alm�si Mil�n</title>
    <link href="logo_32.jpg" rel="shortcut icon" >
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css.css">
  	<link rel="stylesheet" href="bootstrap.min.css">
  	<script src="jquery.min.js"></script>
  	<script src="bootstrap.min.js"></script>
	<script type="text/javascript" src="oldal_tetejere_nyil.js"></script>
</head>
<body>

<div class="container">
					
	<?php include 'fejlec.php';?>


	<ul class="nav nav-pills" role="tablist">
			
			<li ><a href="http://users.atw.hu/almasimilan/webaruhaz/">Webaruhaz</a></li>
			<li ><a href="http://users.atw.hu/almasimilan/webaruhaz/mindentermek.php">MindenTerm�k</a></li>
			<li class="active"><a href="http://users.atw.hu/almasimilan/webaruhaz/alaplapok.php">Alaplapok</a></li>
			<li><a href="http://users.atw.hu/almasimilan/webaruhaz/monitorok.php">Monitorok</a></li>
			<li><a href="http://users.atw.hu/almasimilan/webaruhaz/videokartya.php">Videok�rtya</a></li>
			<li><a href="http://users.atw.hu/almasimilan/webaruhaz/memoria.php">Mem�ria</a></li>
			<li><a href="http://users.atw.hu/almasimilan/webaruhaz/processzor.php">Processzor</a></li>
			<li><a href="http://users.atw.hu/almasimilan/webaruhaz/gephaz.php">Gephaz</a></li>
			<li><a href="http://users.atw.hu/almasimilan">Home</a></li>
		</ul>

<hr>
		
	<?php include 'kapcsolat.php';?>
		
<?php
// sql lek�rdez�sek
$sql = "SELECT * FROM webaruhaz Where kategoria = \"alaplap\"";

// A lek�rdez�s eredm�nye
$eredmeny = mysql_query($sql, $kapcsolat) or die(print("Nem tudtam az utas�t�st v�grehajtani! A hiba oka: ".mysql_error()));

//$sor = mysql_fetch_array($eredmeny, MYSQL_ASSOC);
print("<H2>A web�ruh�z tartalma</H2>");
print("<table class=\"table table-condensed table table-striped\">
    <thead>
		<tr>");
			$sor = mysql_fetch_array($eredmeny,MYSQL_ASSOC);
			while (list($k, $v) = each($sor))
			{
				print("<th style= \"width: 2%\">$k</th>");
			}		
		print("</tr>
    </thead>
	
    <tbody>");

	$eredmeny1 = mysql_query($sql, $kapcsolat) or die(print("Nem tudtam az utas�t�st v�grehajtani! A hiba oka: ".mysql_error()));
	while ($sor1 = mysql_fetch_array($eredmeny1,MYSQL_ASSOC))
		{
			print ("<tr>");
			$mezo_szamlalo=0;
			foreach ($sor1 as $i=>$ertek)
			{
				$mezo_szamlalo++;
				if ($mezo_szamlalo < 4) 
					print("<td>$ertek</td>");
				if ($mezo_szamlalo == 4)
					print("<td>$ertek Ft</td>");
				if ($mezo_szamlalo == 5)
					print("<td><img src=\"fotok/$ertek.png\" alt=\"\" height=\"200\"></td>");
			}
			print("</tr>");
		}
		
print("</table>\n");
mysql_close($kapcsolat);
?>

<hr>
</div>
</body>
</html>
