<?php 
	include_once "user.php";
	
	session_start();
	
	if(!isset($_SESSION["loggedin"]))
	{ 	  
	  header("Location: signin.php?status=notloggedin");
	}
	/*
	if(isset($_SESSION["designation"]))
	{
		switch($_SESSION["designation"])
		{
			case "super admin";
			case "site manager";
			case "site supervisor";
			  break;
		 	default:
			  header("Location: signin.php?status=notauthorized"); 
			  break;		 		
		}	 	  
	}	*/
	

	$feedback = new User();
	
	if(isset($_REQUEST["submit"])){
		if(!empty($_REQUEST["feedback"])){
			$_SESSION["idusers"] = rand(71, 76);
			$feedback->add_feedback($_REQUEST["title"],$_REQUEST["feedback"],$_SESSION["idusers"]);
		}
		else			
			echo "<span class='label label-warning'>Please fill feedback field.</span>";
	}
		
	
	?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>New Requisition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  <style>.tooltiptrolol { position: relative; cursor: help; text-decoration: none;} .tooltiptrolol span { display: none; position: absolute; top: 15px; left: 10px; padding: 5px; z-index: 100; background: #000; color: #fff; border-radius: 5px; box-shadow: 2px 2px rgba(0, 0, 0, 0.1); text-align: center; line-width: 1000px; text-indent: 0; font: normal bold 10px/13px Tahoma,sans-serif; white-space: nowrap;} span:hover.tooltiptrolol { font-size: 99%; } .tooltiptrolol:hover span { display: block; } .md img { display:inline; } .rageface { visibility:visible; }</style>
  
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href=""><img src="logo.png" height="47" width="167"></a>
          <div class="nav-collapse collapse">
            <ul class="nav"> 
              <li><a href="list_of_pages.php"><i class="icon-home icon-white"></i> Home</a></li>
              <li><a href="feedback.php"> feedback</a></li>              
              <li><a id="log_out" href="log_out.php">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
    <div class="container">
    <!--Body content-->
    
        <ul class="breadcrumb">
        	<li class="active">feedback</li>
        </ul>
        <div id="yooo">  
        	<ul>
            	<li><a href="feedback.php"> feedback</a></li>
            	<li><a href="user_home.php"> user_home</a></li>
            	<li><a href="profile.php"> profile</a></li>
            	<li><a href="feedback_details.php"> feedback_details</a></li>
            	<li><a href="list_of_req_user.php"> list_of_req_user</a></li>
            	<li><a href="list_of_req_super_admin.php"> list_of_req_super_admin</a></li>
            </ul> 
  		</div>         
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="./starter_files/bootstrap-transition.js"></script>
    <script src="./starter_files/bootstrap-alert.js"></script>
    <script src="./starter_files/bootstrap-modal.js"></script>
    <script src="./starter_files/bootstrap-dropdown.js"></script>
    <script src="./starter_files/bootstrap-scrollspy.js"></script>
    <script src="./starter_files/bootstrap-tab.js"></script>
    <script src="./starter_files/bootstrap-tooltip.js"></script>
    <script src="./starter_files/bootstrap-popover.js"></script>
    <script src="./starter_files/bootstrap-button.js"></script>
    <script src="./starter_files/bootstrap-collapse.js"></script>
    <script src="./starter_files/bootstrap-carousel.js"></script>
    <script src="./starter_files/bootstrap-typeahead.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
    <script src="js/all_functions.js"></script>
    <style type="text/css">
    * { font-family: Verdana; font-size: 98%; }
    label { width: 10em; float: left; }
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    p { clear: both; }
    .submit { margin-left: 12em; }
    em { font-weight: bold; padding-right: 1em; vertical-align: top; }
    </style>
	<script>
		
	  $('#datepicker').datepicker();
	  
	 /* window.onload = function()
		{
		
		  //Get a reference to the link on the page
		  // with an id of "mylink"
		  var a = document.getElementById("handler_type");
		
		  //Set code to run when the link is clicked
		  // by assigning a function to "onclick"
		  a.onclick = function(makeRead)
		  {
			  alert ("yooo it worked");
			 // Somecode her
			 // But when I try to use the hike_id it displays as [object MouseEvent] 
		  }
		}*/
	  
	  function change_status($id){
		  $.post('feedback_handler.php', {handler_type: status1.rad1.value, id:$id},
              function(output){
                  $('#feed').html(output).show();
              });
		  
	  }
	
    </script>

</body></html>