<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = skillDelete($ID);
	if($result){
		header('location: skill.php');
		exit;
	}
}

?>