<?php 
	include_once "user.php";
	session_start();	
	$login = new User();
	$loc = array();	
	if(isset($_REQUEST["submit"]))
	{
		if($_REQUEST["email"]!="" &&  $_REQUEST["not_yo_business"]!="")
		{
			$login->login($_REQUEST["email"],$_REQUEST["not_yo_business"]);		
			
			if($login->login_data)
			{
				foreach($login->login_data as $ld)
				{	
					extract($ld);									
						
					$_SESSION["user_id"]= $id;	
					$_SESSION["name"]= $name;	
					$_SESSION["designation"]= $designation;	
					$_SESSION["office_code"]= $office_code;	
					$_SESSION["authorization_level"]= $authorization_level;		
					$_SESSION["user_since"]= $user_since;	
					$_SESSION["active_status"]= $active_status;		
					$_SESSION["loggedin"]=true;
					
					//$login->location_by_user($id);
				}
				unset($login->user_data_temp);
				$login->getExtractedArray($login->get_all_user_location($_SESSION["user_id"]),'location_id');
				$_SESSION["location"]= substr($login->user_data_temp, 0, -1);	
				header("Location: user_home.php");			
				//$temp = substr($login->user_data_temp, 0, -1);
				//$arr = explode("|", $temp);
				/*$login->get_all_user_location($_SESSION["user_id"]);
				//print_r($test->comment_data[0]);
				foreach($login->comment_data as $d){
					extract($d);
					foreach($d as $da){
						extract($da);
						array_push($loc,$location_id);
					}
				}*/
				//print_r($_SESSION);
			}
			else
			{
				echo "<span class='label label-warning'>Wrong username or password</span>";
				echo "<INPUT class='btn' TYPE='button' VALUE='Back to Sign in page' onClick='history.go(-1);return true;'>";
				exit;
			}			
		}		
		else
		{
			echo "<span class='label label-warning'>Fill both email and password field</span>";
			echo "<INPUT class='btn' TYPE='button' VALUE='Back to Sign in page' onClick='history.go(-1);return true;'>";
			exit;
		}
		echo "<span class='label label-success'>Login successfull. You are redirecting to the homepage.</span>";
		
	}
?>
     