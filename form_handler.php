<?php 
	include_once "user.php";
	$form = new User();
	$args = $_POST;
	//var_dump($args);
	//$field = explode("&", $args);
	//array_walk($args,'');
	//if(count($args)==1){
	if(array_key_exists('cost_edit_box_for_local_boss', $args)){
		$form->updateCostingByLocalBoss($args['cost_edit_box_for_local_boss'],$args['req_id_to_edit_cost']);
		//echo 'key - cost_edit_box_for_local_boss';
	}
	//else if(array_key_exists('cost_edit_box_for_local_boss', $args)){}
	else
		echo 'key not exists';
	//call_user_func('barber', "mushroom");	
	/*}
	else{
		echo 'wow';	
	}*/


?>