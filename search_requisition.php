<?php 	
	include_once "user.php";
	session_start();
	$search = new User();
	if(isset($_POST['keyword'])&&isset($_POST['user_id'])){
		$keyword = $_POST['keyword'];
		$user_id = $_POST['user_id'];
		$search->search_requisition($keyword,$user_id);
	}
?>