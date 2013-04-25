<?php 
	include_once "user.php";

	$feedback = new User();
	
	$handler_type = $_POST["handler_type"]; 
	$id = $_POST["id"]; 
	
	$feedback->make_read_feed($id,$handler_type);
	
	//echo $handler_type." wow ".$id ;		

?>