<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = mainmenuAdd();

	print_r($result);
}

?>