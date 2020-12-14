<?php
$kapcsolat = mysql_connect("127.0.0.1", "almasimilan", "Stampika11");
if (!$kapcsolat) die("Nem siker�lt kapcsol�dni az adatb�zishoz!");
mysql_select_db("almasimilan", $kapcsolat) or die("Nem siker�lt kiv�lasztani az adatb�zist!");
?>