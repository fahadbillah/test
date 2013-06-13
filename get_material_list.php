<?php 
	include_once "user.php";
	$type = $_POST['val'];
	$material_list = new User();
	if(isset($_POST['id']) && $type=='all_sub_cat_list'){
		$sub = $_POST['id'];
		echo "<option value=''>Select Sub Catagoty</option>";
		foreach($material_list->get_all_material_cat() as $cat){
			extract($cat);
			if($sub_cat_of	== $sub)
				echo "<option value='$id'>".$name."</option>";
		}
	}
	if($type=='item' && isset($_POST['id'])){
		//print_r($material_list->get_all_material());
		foreach($material_list->get_all_material($_POST['id']) as $item){
			extract($item);
			//if($type=='Subcategory')
			echo "<option value='$id'>".$name."</option>|".$measurment_unit;
		}
	}
	if($type=='singleItem' && isset($_POST['id'])){
		//$temp = $material_list->get_all_material($_POST['id'],'id');
		//$temp.='|'.$_POST['qt'];
		//array_push($temp,$_POST['qt']);
		//var_dump(json_encode($temp));
		//echo json_encode($temp);
		//return $temp;
		//print_r($temp);
		
		foreach($material_list->get_all_material($_POST['id'],'id') as $item){
			extract($item);
			$total = (int)$_POST['qt']*$cost_per_unit;
			echo "<tr>";
			echo "<td>1</td>";
			echo "<td>".$name."</td>";
			echo "<td>".$_POST['qt']." ".$measurment_unit."</td>";
			echo "<td>".$cost_per_unit."</td>";
			echo "<td>".$total."</td>";
			echo "</tr>|".$total;
		}
	}
	/*if($type=='all_sub_cat_list'){
		foreach($material_list->get_all_material_cat() as $cat){
			extract($cat);
			if($type=='Subcategory')
				echo "<option value='$id'>".$name."</option>";
		}
		//print_r();
	}*/
	if($type=='all_cat_list'){
		echo "<option value=''>Select Catagoty</option>";
		foreach($material_list->get_all_material_cat() as $cat){
			extract($cat);
			if($type=='Category')
				echo "<option value='$id'>".$name."</option>";
		}
		//print_r();
	}
?>