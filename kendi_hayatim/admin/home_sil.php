<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = homeDelete($ID);
	if($result){
		header('location: home.php');
		exit;
	}
}

?>