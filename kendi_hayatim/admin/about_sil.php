<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = aboutDelete($ID);
	if($result){
		header('location: about.php');
		exit;
	}
}

?>