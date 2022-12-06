<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = skillAdd();

	print_r($result);
}

?>