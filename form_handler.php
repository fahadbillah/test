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
	}
	else if(array_key_exists('unitDeleteId', $args)){
		//echo $args['unitDeleteId'];
		//var_dump($args['unitDeleteId']);
		$form->deleteUnitType($args['unitDeleteId']);
	}
	else if(array_key_exists('catDeleteId', $args)){
		//echo $args['unitDeleteId'];
		//var_dump($args['unitDeleteId']);
		$form->deleteCat($args['catDeleteId'],$args['type']);
	}
	else if(array_key_exists('grn', $args)){
		$result = $form->insert_grn($args['form'],$args['req_id']);
		if($result=== NULL)
			echo false;
	}
	else if(array_key_exists('get_local_staff_list', $args)){
		$result = $form->recent_added_user($args['get_local_staff_list'],$args['start']);
		if($result=== NULL)
			echo "<span class='label label-warning'>No more current user.</span> ";
		else{
			//echo count($result);
			//print_r($result);
			foreach ($result as $list) {
							extract($list);
							echo "<tr><td>";
							echo $name;
							echo "</td><td>";
							echo $user_since;
							echo "</td><td>";
							echo '<button id="delete_current_user'.$id.'" type="button" class="btn btn-danger btn-mini dcu" value="'.$id.'" onclick="delete_current_user('.$id.')">Delete</button>';
							echo "</td></tr>";
						}			
		}
	}
	else if(array_key_exists('delete_current_user', $args)){
		$result = $form->delete_recent_added_user($args['delete_current_user']);
		if($result=== NULL)
			echo "<span class='label label-warning'>Current user cannot be deleted.</span> ";
		else
			echo "<span class='label label-success'>Current user deleted.</span> ";
	}
	else if(array_key_exists('get_local_raiser_list', $args)){
		$result = $form->recent_added_local_raisers($args['get_local_raiser_list'],$args['raise_start']);
		if($result=== NULL)
			echo "<span class='label label-warning'>No more local raiser.</span> ";
		else{
			//echo count($result);
			//print_r($result);
			$c = 0+$args['raise_start'];
			foreach ($result as $list) {
							extract($list);
							echo "<tr><td>";
							echo $name;
							echo "</td><td>";
							echo $user_since;
							echo "</td><td>";
							echo '<button id="delete_local_raiser'.$c.'" type="button" class="btn btn-danger btn-mini dcu" value="'.$id.'" onclick="delete_local_raiser('.$c.','.$id.','.$location_id.')">Delete</button>';
							echo "</td></tr>";
							$c++;
						}			
		}
	}
	else if(array_key_exists('delete_local_raiser', $args)){
		$result = $form->delete_local_raiser($args['delete_local_raiser'],$args['loc']);
		if($result=== NULL)
			echo "<span class='label label-warning'>Local raiser delete failed.</span> ";
		else
			echo "<span class='label label-success'>Local raiser deleted.</span> ";
	}
	else
		echo 'key not exists';
	//call_user_func('barber', "mushroom");	
	/*}
	else{
		echo 'wow';	
	}*/


?>