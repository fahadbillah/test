<?php 
	include_once "user.php";
	$test = new User();
	$test->get_location_by_id(34);
	foreach($test->user_data as $d){
			extract($d);
			echo "<option value='$location_id'>'$site_factory'</option>";  
		}
	//var_dump($test->get_local_accountant('central',91));
	
?>