<?php 
	include_once "user.php";
	
	$get_masters = new User();
	unset($get_masters->user_data_temp1);
	
	if(isset($_POST["val"]) && isset($_POST["from"])){
		$value = $_POST["val"];
		$from = $_POST["from"];
		if($from=='ms'){
			$get_masters->get_project($value);		
			echo "<option>Select Project</option>";  
			foreach($get_masters->user_data_temp1 as $mas)
			{
				extract($mas);
				echo "<option>".$name."</option>";  
			}
		}
		else if($from=='pr'){
			$get_masters->get_site($value);		
			echo "<option>Select Site</option>";  
			foreach($get_masters->user_data_temp1 as $mas)
			{
				extract($mas);
				echo "<option>".$site_factory."</option>";    
			}
			
		}
		else if($from=='site'){
			$get_masters->get_micro_site($value);		
			echo "<option>Select Site</option>";  
			foreach($get_masters->user_data_temp1 as $mas)
			{
				extract($mas);
				echo "<option>".$name."</option>";    
			}
			
		}
	}
	else{
		$get_masters->get_master();		
		echo "<option>Select Master</option>";  
		foreach($get_masters->user_data_temp1 as $mas)
		{
			extract($mas);
			echo "<option>".$name."</option>";    
		}
	}
	
	
	


?>