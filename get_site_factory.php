<?php 
	include_once "user.php";
	$project = $_POST["project"]; 
	
	$master = $_POST["master"]; 
	
	$type1 = "factory";
	
	$type2 = "site";
	
	
	echo "<option value=''>Select Site/Factory</option>";
	
	$get_sites_factories = new User();
	
	if($project == "No Project Available")
		$get_sites_factories->get_all_sites_factories($master,$type1);
	else		
		$get_sites_factories->get_all_sites_factories($project,$master);		
			
	foreach($get_sites_factories->user_data_temp as $sites_factories)
	{
		extract($sites_factories);
		echo "<option>".$site_factory."</option>";    
	}
	
?>