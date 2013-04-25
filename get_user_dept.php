<?php 
	include_once "user.php";
	
	
	$req_list = new User();
	
	$admin = $_REQUEST["admin"];
	
	
	$req_list->get_user_by_dept($admin,"Max Automobile");
	
	echo "<option>Select Admin</option>";
	foreach($req_list->user_data as $user){
		extract($user);	
		echo "<option value='".$idusers."'>".$name."</option>";
	}
	
?>