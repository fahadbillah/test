<?php 
	
	include_once "user.php";
	
	$department = new User();
	
	$type = $_POST["id"]; 	
	
	//echo $type;
	//echo "<option>".$type."</option>";  
	
	unset($department->req_data);
	$department->get_exec($type);
	
	
	echo "<option value=''>Select Executive</option>";
	foreach($department->req_data as $exec){
		extract($exec);	
		echo "<option>".$name."</option>";   
	}
	
	//echo $handler_type." ".$id." made read successfully";
	
	
?>