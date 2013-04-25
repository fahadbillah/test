<?php 
	include_once "user.php";
	
	$email = $_POST["email"]; 		
	 	
	$email_check = new User();
		
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{		
		$email_check->check_unique_mail($email);				
	}
	else
		echo "<span class='label label-warning'>Input a proper email address.</span>";
	
?>