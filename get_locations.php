<?php 
	include_once "user.php";
	
	$getLocations = new User();
	unset($getLocations->user_data_temp1);
	
	if(isset($_POST["val"])){
		$value = (int)$_POST["val"];
		$getLocations->get_location_by_id($value);
		echo "<option>Select Location</option>";  
		foreach($getLocations->user_data as $d){
			//echo $d;
				echo "<option value='$d'>".$getLocations->convert_id_location($d)."</option>";  
		}
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