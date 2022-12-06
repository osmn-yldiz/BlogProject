<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = AboutAdd();

	print_r($result);
}

?>