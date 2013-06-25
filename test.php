<?php 
	include_once "user.php";
	$test = new User();
	//print_r($test->get_all_material_cat());
	$matCatSub = $test->getMatSubCat(1);
	foreach($matCatSub as $subcat){
		extract($subcat);
		echo "<option value=".$id.">".$name."</option>"; 	
	}
	return ;
	$temp = $test->id_to_catagory($item_id);
	foreach($temp as $d){
			extract($d);
			echo $id.' '.$name.' '.$type.' '.$sub_cat_of.' '.$date_added; 
			echo '</br>';
		}
	//var_dump($test->get_local_accountant('central',91));
	
?>