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
							echo $location_id;
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
	else if(array_key_exists('get_local_boss_list', $args)){
		$result = $form->recent_added_local_bosses($args['get_local_boss_list'],$args['local_boss_start']);
		if($result=== NULL)
			echo "<span class='label label-warning'>No more local bosses.</span> ";
		else{
			//echo count($result);
			//print_r($result);
			$c = 0+$args['local_boss_start'];
			foreach ($result as $list) {
							extract($list);
							echo "<tr><td>";
							echo $name;
							echo "</td><td>";
							echo $location_id;
							echo "</td><td>";
							echo $user_since;
							echo "</td><td>";
							echo '<button id="delete_local_boss'.$c.'" type="button" class="btn btn-danger btn-mini dcu" value="'.$id.'" onclick="delete_local_boss('.$c.','.$id.','.$location_id.')">Delete</button>';
							echo "</td></tr>";
							$c++;
						}			
		}
	}
	else if(array_key_exists('delete_local_boss', $args)){
		$result = $form->delete_local_boss($args['delete_local_boss'],$args['boss_loc']);
		if($result=== NULL)
			echo "<span class='label label-warning'>Local boss delete failed.</span> ";
		else
			echo "<span class='label label-success'>Local boss deleted.</span> ";
	}
	else if(array_key_exists('get_local_boss_money_limit', $args)){
		$result = $form->local_boss_money_limit($args['get_local_boss_money_limit'],$args['local_money_limit']);
		if($result=== NULL)
			echo "<span class='label label-warning'>No more local boss money limit.</span> ";
		else{
			//echo count($result);
			//print_r($result);
			$c = 0+$args['local_money_limit'];
			foreach ($result as $list) {
							extract($list);
							echo "<tr><td>";
							echo $name;
							echo "</td><td>";
							echo $bosslimit;
							echo "</td><td>";
							echo $date_modified;
							echo "</td><td>";
							echo '<button id="delete_local_boss_money_limit'.$c.'" type="button" class="btn btn-danger btn-mini dcu" value="'.$mid.'" onclick="delete_local_boss_money_limit('.$c.','.$mid.')">Delete</button>';
							echo "</td></tr>";
							$c++;
						}			
		}
	}
	else if(array_key_exists('money_limit', $args)){
		$result = $form->delete_local_boss_money_limit($args['money_limit']);
		if($result=== NULL)
			echo "<span class='label label-warning'>Local boss money limit cannot be deleted.</span> ";
		else
			echo "<span class='label label-success'>Local boss money limit deleted.</span> ";
	}
	else if(array_key_exists('get_top_central_list', $args)){
		//echo $args['get_top_central_list']." ".$args['limit'];
		$result = $form->get_top_central_list($args['get_top_central_list'],$args['limit']);
		if($result=== NULL)
			echo "<span class='label label-warning'>No more central boss found.</span> ";
		else{
			/*echo count($result);
			print_r($result);*/
			$c = 0+$args['limit'];
			foreach ($result as $list) {
							extract($list);
							echo "<tr><td>";
							echo $name;
							echo "</td><td>";
							echo $post;
							echo "</td><td>";
							echo $user_since;
							echo "</td><td>";
							$pssst = "'$post'";
							echo '<button id="delete_central_boss'.$c.'" type="button" class="btn btn-danger btn-mini dcu" value="'.$id.'" onclick="delete_central_boss_func('.$c.','.$id.','.$pssst.')">Delete</button>';
							echo "</td></tr>";
							$c++;
						}
		}
	}
	else if(array_key_exists('delete_central_boss', $args)){
		$result = $form->delete_central_boss($args['delete_central_boss'],$args['boss_post']);
		if($result=== NULL)
			echo "<span class='label label-warning'>Central ".$args['boss_post']." cannot be deleted.</span> ";
		else
			echo "<span class='label label-success'>Central ".$args['boss_post']." deleted.</span> ";
	}
	else if(array_key_exists('get_assigned_location', $args)){
		//echo $args['get_top_central_list']." ".$args['limit'];
		$result = $form->get_assigned_location_scm_acc($args['get_assigned_location'],$args['limit']);
		if($result=== NULL)
			echo "<span class='label label-warning'>No more assigned location found.</span> ";
		else{
			/*echo count($result);
			print_r($result);*/
			$c = 0+$args['limit'];
			foreach ($result as $list) {
							extract($list);
							echo "<tr><td>";
							echo $name;
							echo "</td><td>";
							echo $location_id;
							echo "</td><td>";
							echo $date_added;
							echo "</td><td>";
							echo '<button id="delete_acc_scm_assigned_location'.$c.'" type="button" class="btn btn-danger btn-mini dcu" value="'.$id.'" onclick="delete_acc_scm_assigned_location('.$c.','.$id.')">Delete</button>';
							echo "</td></tr>";
							$c++;
						}
		}
	}
	else if(array_key_exists('delete_acc_scm_location', $args)){
		$result = $form->delete_acc_scm_location($args['delete_acc_scm_location']);
		if($result=== NULL)
			echo "<span class='label label-warning'>Acc/SCM location cannot be deleted.</span> ";
		else
			echo "<span class='label label-success'>Acc/SCM location deleted.</span> ";
	}
	else
		echo 'key not exists';
	//call_user_func('barber', "mushroom");	
	/*}
	else{
		echo 'wow';	
	}*/


?>