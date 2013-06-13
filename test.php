<?php 
	include_once "user.php";
	$test = new User();
	var_dump($test->get_micro_site(5));
	return ;
	foreach($test->user_data as $d){
			extract($d);
			echo "<option value='$location_id'>'$site_factory'</option>";  
		}
	//var_dump($test->get_local_accountant('central',91));
	
?>