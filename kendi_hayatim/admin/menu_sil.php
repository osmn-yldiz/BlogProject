<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = mainmenuDelete($ID);
	if($result){
		header('location: menu.php');
		exit;
	}
}

?>