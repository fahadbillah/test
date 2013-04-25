<?php 
	include_once "user.php";
	$master = $_POST["master"]; 
	$type = $_POST["type"]; 
	
	$get_departments = new User();
	
	$get_departments->get_departments($master,$type);
	
	echo "<option value=''>Select Department</option>";   
	
	foreach($get_departments->comment_data as $departments)
	{
		extract($departments);
		echo "<option>".$name."</option>";  
		//echo $name."<br>";   
		 
	}
	
		
?>