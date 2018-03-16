<?php
$host = "localhost";
$user = "root";
$pass = "pikul";
$dbnm = "mundakin";

try {
	$kon = new PDO("mysql:host=$host;dbname=$dbnm",$user,$pass,array(PDO::ATTR_PERSISTENT => true));	
} catch (PDOException $e) {
	echo "Eror".$e->getMessage();
}
