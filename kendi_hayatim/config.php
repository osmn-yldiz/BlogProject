<?php
error_reporting(0);
ob_start();
session_start();
try {
	$db = new PDO("mysql:host=localhost; dbname=kendi_hayatim; charest=utf8", 'osman', 'Oy621207.');
	$db->query("SET NAMES 'UTF8'");
	//echo 'Veritabanı Bağlantısı Başarılı';
} catch (Exception $e) {
	echo $e->getMessage(); 
}

$URL = "http://localhost:8080/osman/kendi_hayatim/";

?>