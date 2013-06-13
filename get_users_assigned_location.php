<?php 
	include_once "user.php";	
	$get_ass_location = new User();
	$temp = $get_ass_location->get_users_assigned_location($_POST["id"]);
	//var_dump($locations);
	if($temp){
		$locations = array_unique($temp);
		foreach($locations as $loc){
			$c = explode('.',$loc);
			if(count($c)>1){
				$get_ass_location->get_micro_site((int)$c[1]);
				echo '<strong>Site - '.$get_ass_location->get_location_name($c[0]).', Micro Site - '.$get_ass_location->user_data_temp1[0]['name'].'</strong></br>';
			}
			else{
				if($loc == 'central')			
					echo '<strong>Central</strong></br>';
				else    
					echo '<strong>'.$get_ass_location->get_location_name($loc).'</strong></br>';		
			}
		}
	}
	else{
		echo "<span class='label label-warning'>No location assigned to this user.</span> ";
		
	}
?>