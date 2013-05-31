<?php 
	include_once "user.php";
	$test = new User();
	//print_r($_REQUEST);
	var_dump($test->get_all_single_entity());
	//echo $test->user_data_temp[0]['id'];
	//$test->get_all_single_entity();
	/*$id = (int)$test->getBossByLocation('10011.5');
	//echo $id;
	$limit = $test->get_limit($id);
	echo $limit;
	var_dump($test->checkLocal('central',89));*/
//	echo $cost;
	//var_dump($test->determine_local_main(89,"10011.5"));
	//var_dump($test->send_to_hub_update(89,"10011.5"));
?>