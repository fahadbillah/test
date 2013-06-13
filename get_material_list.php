<?php 
	include_once "user.php";
	$type = $_POST['val'];
	$material_list = new User();
	if($type=='all_list'){
		$material_list->get_all_material();
	}
?>