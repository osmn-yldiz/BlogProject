<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = aboutimagesDelete($ID);
	if($result){
		header('location: '.$_SERVER['HTTP_REFERER']);
		exit;
	}
}

?>