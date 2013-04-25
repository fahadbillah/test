<?php 

	include_once "user.php";
	
	$comment = new User();
	
	$handler_type = $_POST["handler_type"]; 
	$id = $_POST["id"]; 
	
	$comment->make_read($id,$handler_type);
	
	//echo $handler_type." ".$id." made read successfully";
	
	/*$comment_handler = new User();	
	
	$comment_handler->make_read_comment();
*/


?>