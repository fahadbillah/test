<?php 
	include_once "user.php";
	$master = $_POST["master"]; 
	
	$get_project = new User();
	
	$get_project->get_all_projects($master);
	
	echo "<option value=''>Select Project</option>";   
	
	foreach($get_project->user_data_temp as $projects)
	{
		extract($projects);
		echo "<option>".$name."</option>";    
	}
	
?>