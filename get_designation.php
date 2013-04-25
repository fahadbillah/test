<?php 
	include_once "user.php";
	
	$site_factory = $_POST["site_factory"]; 
	//$master = "Max Lubricant"; 	
	
	$findme   = ' , ';

	$site_factory = substr($site_factory, strpos($site_factory, $findme)+3); 
	
	//echo $site_factory;
	//echo "<option>".$master."</option>";
	
	$get_site_factory_designation = new User();
	
	$get_site_factory_designation->get_site_factory_designation($site_factory);
	
	echo "<option value=''>Select Designation</option>";   
	//print_r($get_project->user_data_temp);
	foreach($get_site_factory_designation->user_data_temp as $designation)
	{
		extract($designation);
		echo "<option>".$name."</option>";    
	}
	
?>