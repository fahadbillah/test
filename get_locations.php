<?php 
	include_once "user.php";
	
	$args = $_POST;
	$getLocations = new User();
	unset($getLocations->user_data_temp1);
	//echo 'wokssssssssssssss';
	if(isset($args["locval"])){
		var_dump($args);
		$value = (int)$_POST["locval"];
		$getLocations->get_location_by_id($value);
		echo "<option>Select Location</option>";  
		
		//$getLocations->get_location_by_id($value);
		foreach($getLocations->user_data as $d){
				extract($d);
				echo "<option value='$location_id'>".$site_factory."</option>";  
			}
	}
	elseif (in_array("delete_master_location", $_POST)) {
		echo $_POST["delete_master_location"];
	}
	
	/*if(isset($_POST["val"]) && isset($_POST["from"])){
		$value = $_POST["val"];
		$from = $_POST["from"];
		if($from=='ms'){
			$getLocations->get_project($value);		
			echo "<option>Select Project</option>";  
			foreach($getLocations->user_data_temp1 as $mas)
			{
				extract($mas);
				echo "<option>".$name."</option>";  
			}
		}
		else if($from=='pr'){
			$getLocations->get_site($value);		
			echo "<option>Select Site</option>";  
			foreach($getLocations->user_data_temp1 as $mas)
			{
				extract($mas);
				echo "<option>".$site_factory."</option>";    
			}
			
		}
		else if($from=='site'){
			$getLocations->get_micro_site($value);		
			echo "<option>Select Site</option>";  
			foreach($getLocations->user_data_temp1 as $mas)
			{
				extract($mas);
				echo "<option>".$name."</option>";    
			}
			
		}
	}
	else{
		$getLocations->get_master();		
		echo "<option>Select Master</option>";  
		foreach($getLocations->user_data_temp1 as $mas)
		{
			extract($mas);
			echo "<option>".$name."</option>";    
		}
	}*/
	
	
	


?>