<?php 
	include_once "user.php";
	
	session_start();
	
	if(!isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = 1;
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add User Details</title>
</head>

<body>
<?php 
	
	$add_user_details = new User();
		/*$add_user_details->get_all_designation(); 
		foreach($add_user_details->user_data as $data)
		{
			extract($data);
			$designation ;
		}*/
	
	if(isset($_REQUEST["submit"]))
	{
		//var_dump($_REQUEST);		
		
		if(!in_array("",$_REQUEST))
		{
			extract($_REQUEST);
			$add_user_details->add_user_details($id,$name,$contact,$designation,$department);
			
		}	
		else 
			echo "You left a field blank.";	
		
	}
?>
<form action="add_user_details.php" method="post">
<table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" id="name" /></td>
  </tr>
  <tr>
    <td>contact</td>
    <td><input type="text" name="contact" id="contact" /></td>
  </tr>
  <tr>
    <td>designation</td>
	<td>
    <select name="designation" id="designation">
	<?php
		$add_user_details->get_all_designation(); 
		foreach($add_user_details->user_data as $data)
		{
			extract($data);
	?>	
	  <option><?php echo $designation ?></option>    
	<?php }?>    
    </select>
    </td>
  </tr>
  <tr>
    <td>department</td>
    <td>
    <select name="department" id="department">
    <?php	
		unset($add_user_details->user_data);
		$add_user_details->get_all_departments(); 
		foreach($add_user_details->user_data as $dep)
		{
			extract($dep);
	?>	
	  <option><?php echo $name ?></option>    
	<?php }?> 
    </select> 
    </td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="2" /></td>
    <td><input name="submit" type="submit" /></td>
  </tr>
</table>
</form>


</body>
</html>