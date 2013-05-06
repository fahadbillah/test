<?php 
	include_once "user.php";
	$catV = $_POST['cat'];	
	//echo $cat;
	$cat = new User();
	$cat->getMatSubCat($catV);
		echo "<option value='0'>Select Subcategory</option>"; 
	foreach($cat->user_data_temp as $subcat){
		extract($subcat);
		echo "<option value=".$id.">".$name."</option>"; 	
	}
?>