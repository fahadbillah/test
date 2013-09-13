<?php 
	include_once "user.php";
	
	$pm_process = new User();
	//$subject = $_POST["subject"];
	$message = $_POST["sms"];
	$sender = (int)$_POST["sender"];
	$receiver = (int)$_POST["receiver"];
	
	//echo $subject.$message.$sender.$receiver;
	if(!empty($_POST["sender"]) || !empty($_POST["message"]))	
		$pm_process->add_pm($message,$sender,$receiver);
	else
		echo "<span class='label label-warning'>please fill up the message properly.</span>";		
	/*elseif ($_POST["type"]==="get_all_staff") {
		# code...
	}
	elseif ($_POST["type"]==="get_req_staff") {
		# code...
	}*/
	
?>