<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = ProjectsEdit($ID);
	
	 foreach($result as $err){
		 $errArray .= "error[] = ".$err."&";
	 }
	header("location:projects.php?".$errArray);
	exit;
	//print_r($result);
}

?>