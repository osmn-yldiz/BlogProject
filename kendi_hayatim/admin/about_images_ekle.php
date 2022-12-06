<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = aboutimagesAdd();

	print_r($result);
}

?>