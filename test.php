<?php 
	include_once "user.php";	
	
	$test = new User();
	//$arr = $test->user_from_requisition_user(24);
	//var_dump($arr);
	//unset($test->user_data_temp);
	$user_post = array_unique($test->getPost(24));
	print_r($user_post);
	//var_dump(array_unique($test->getPost(24)));
	/*$test->getExtractedArray($test->get_all_user_location(24),'location_id');
	$temp = substr($test->user_data_temp, 0, -1);
	$arr = explode("|", $temp);
	//var_dump($arr);
	for($i=0;$i<count($arr);$i++)
		echo $arr[$i];*/
	//var_dump($test->get_all_user_location(24));
	/*$test->get_all_user_location(27);
	//print_r($test->comment_data[0]);
	foreach($test->comment_data as $d){
		extract($d);
		foreach($d as $da){
			extract($da);
			echo $location_id;
		}
	}*/
?>