<?php 
	include_once "user.php";
	
	$pm_process = new User();
	if($_POST["type"]==="pm_send"){
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$sender = $_POST["sender"];
		$receiver = $_POST["receiver"];
		
		//echo $subject.$message.$sender.$receiver;
		if(!empty($_POST["subject"]) || !empty($_POST["message"]))	
			$pm_process->add_pm($subject,$message,$sender,$receiver);
		else
			echo "<span class='label label-warning'>please fill up the message properly.</span>";		
	}
	elseif ($_POST["type"]==="get_all_staff") {
		# code...
	}
	elseif ($_POST["type"]==="get_req_staff") {
		# code...
	}
	
?>