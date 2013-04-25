<?php 
	include_once "user.php";
	
	session_start();
	
	$admin = new User();
	
	/*if(!isset($_SESSION["loggedin"]))
	{ 	  
	  header("Location: signin.php?status=notloggedin");
	}
	
	if(isset($_SESSION["designation"]))
	{
		switch($_SESSION["designation"])
		{
			case "admin":
			  break;
		 	default:
			  header("Location: signin.php?status=notauthorized"); 
			  break;		 		
		}	 	  
	}
		*/
?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Admin Home</title>
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
              <li class="active"><a href="admin.php"><i class="icon-home icon-white"></i> Home</a></li>
              <li><a href="add_user.php">Add User</a></li>    
              <li><a href="add_location.php">Add Location</a></li>                
              <li><a href="log_out.php">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
        <div class="container">
          <!--Body content-->
          
          <div class="page-header">
            <h2>Welcome Mr. Zulkarnain<?php //echo $_SESSION["name"] ?></h2>
          </div>
          <div id="yooo">
          <div class="well well-large">
             <h3>Pending</h3>
             <ul>   
             <?php 
			 	unset($admin->req_data);
			 	unset($admin->good_to_go_flag);
				$admin->recent_added_user(10);
				  if($admin->good_to_go_flag>0){
					 foreach($admin->req_data as $list)
					 {
						extract($list);
			  ?>           
               <li>
                 <?php 
				 	echo"<a href='user_details.php?id=".$id."'>$name</a>";
					
					if($admin->check_login_available($id)==0)
						echo"<a  style='text-decoration: none;' href='add_user_login.php?id=".$id."'> <button class='btn btn-mini'>Add Login Info</button></a>";
				?>  
               </li>  
               <?php 
					 }
				 }
					else
					 	echo "<span class='label label-warning'>No requisition is found under this type.</span>";
				
		  ?>                
             </ul>
          </div> 
          </div>  
          <!--<div id="approved" class="hero-unit">
             <h3>Heading</h3>
     		 <p>Tagline</p>
          </div>  
          <div id="modified" class="hero-unit">
             <h3>Heading</h3>
     		 <p>Tagline</p>
          </div> 
          <div id="Pending" class="hero-unit">
             <h3>Heading</h3>
     		 <p>Tagline</p>
          </div> -->
                   
        </div>
      </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
	<script src="./starter_files/jquery.js"></script>
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
	
    </script>

</body></html>