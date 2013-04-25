<?php 
	include_once "user.php";
	
	session_start();
	
	if(!isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = 1;
		$_SESSION['user_designation'] = "Chairman";
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Task</title>
<!--<script type="text/javascript" src="jquery-1.8.3.js">-->
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#date").datepicker({ dateFormat: "dd-mm-yy" });
  });
  </script>

</head>

<body>
<?php 
	
	$user_details = new User();	
	
	if(isset($_REQUEST["submit"]))	
	{
		$task_details = new Task();
		//var_dump($_REQUEST);		
		
		if(!in_array("",$_REQUEST))
		{
			extract($_REQUEST);
			//echo $id." ".$self_designation." ".$title." ".$description." ".$assigned_to." ".$admin." ".$date;
			$task_details->add_new_task($id,$self_designation,$title,$description,$assigned_to,$admin,$date);
			
		}	
		else 
			echo "You left a field blank.";	
		
	}
?>
<form action="add_task.php" method="post">
<table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td>Title</td>
    <td><input type="text" name="title" id="title" /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="description" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td>Assigned to</td>
	<td>
    <select name="assigned_to" id="assigned_to">
	<?php
		$des = $_SESSION['user_designation'];
		unset($user_details->user_data);
		$user_details->get_all_subordinate($des); 
		foreach($user_details->user_data as $data)
		{
			extract($data);
	?>	
	  <option value="<?php echo $idusers ?>" label="<?php echo $name ?>"></option>    
	<?php }?>    
    </select>
    </td>
  </tr>
  <tr>
    <td>Admin of this task</td>
    <td>
    <select name="admin" id="admin">
   <?php
		$des = $_SESSION['user_designation'];
		unset($user_details->user_data);
		$user_details->get_all_subordinate($des); 
		foreach($user_details->user_data as $data)
		{
			extract($data);
	?>	
	  <option value="<?php echo $idusers ?>" label="<?php echo $name ?>"></option>    
	<?php }?>    
    </select>
    </td>
  </tr>
  <tr>
    <td>Report Submission Date</td>
    <td><input id="date" name="date" type="text" />
    </td>
  </tr>
  <tr>
    <td>
    <input type="hidden" name="id" value=<?php echo $_SESSION['user_id'] ?> />
    <input type="hidden" name="self_designation" value=<?php echo $_SESSION['user_designation']?> />
    </td>
    <td><input name="submit" type="submit" /></td>
  </tr>
</table>
</form>


</body>
</html>