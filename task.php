<?php 

class Task extends Database
{
	public $task_data;
	
	public $task_data_temp;
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	function __destruct() {
		
       parent::__destruct();
	   
	   unset($task_data);
	   
	   unset($task_data_temp);
   }
	
	public function add_new_task($id,$self_designation,$title,$description,$assigned_to,$admin,$date)
	{
		$id = $this->mysqli->real_escape_string($id);
		$self_designation = $this->mysqli->real_escape_string($self_designation);
		$title = $this->mysqli->real_escape_string($title);
		$description = $this->mysqli->real_escape_string($description);
		$assigned_to = $this->mysqli->real_escape_string($assigned_to);
		$admin = $this->mysqli->real_escape_string($admin);
		$date = $this->mysqli->real_escape_string($date);

		echo $id." ".$self_designation." ".$title." ".$description." ".$assigned_to." ".$admin." ".$date;
		
		$query="INSERT INTO staff_level SET designation='$description' , level='$title'"; 	
		
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		
		echo "New Task added!";		
		
	}
	
	public function insert($name,$email,$address,$mob){
		
		$query="INSERT INTO user SET name='$name', email='$email', address='$address', mob='$mob'";
		
		$result= $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot inserted");
		
		if($result){
			header('location:read.php');	
		}
		
		
		
	}
	
}




?>