<?php

$host = "localhost";
	$user = "root";
	$pass = "";
	$db	  = "master";
$koneksi = mysql_connect("$host","$user","$pass");
mysql_select_db("$db",$koneksi) or die (mysql_error());

?>
