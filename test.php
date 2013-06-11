<?php 
	include_once "user.php";
	$test = new User();
	var_dump($test->user_home_page_authorization(24));
	//var_dump($test->get_local_accountant('central',91));
	
?>