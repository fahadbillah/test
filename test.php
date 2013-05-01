<?php 
	include_once "user.php";	
	
	$test = new User();
	//$arr = $test->user_from_requisition_user(24);
	
	var_dump($test->getPost(24,66));
	
	//echo $test->req_data;
	//echo $test->req_data[0]['relation_to_req']
	//var_dump($test->money_limit_cross(500000,'10011.9'));
	//unset($test->user_data_temp);
	//$user_post = array_unique($test->getPost(24));
	//print_r($user_post);
	/*$test->search_boss();
	foreach($test->user_data_temp as $bossLimit)
	{
		extract($bossLimit);
		echo $id." ";
		$test->get_boss_by_id($id);
		//echo $test->user_data_temp1;
	} */
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