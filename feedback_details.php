<?php 
	include_once "user.php";
	
	session_start();
	
	/*if(!isset($_SESSION["loggedin"]))
	{ 	  
	  header("Location: signin.php?status=notloggedin");
	}
	
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
	if(!isset($_SESSION['designation']))
		$_SESSION['designation'] = "webdeveloper";
		

	$feedback = new User();	
		
	if(isset($_REQUEST['submit']))
		$feedback->change_feed_stat($_REQUEST['stat'],$_REQUEST['id']);
	
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
              <li><a href="user_home.php"><i class="icon-home icon-white"></i> Home</a></li>
              <li class="active"><a href="list_of_req_user.php">Requisition</a></li>
              <li><a href="profile.php"><i class="icon-user icon-white"></i> Profile</a></li>
              <li><a href="feedback.php"> feedback</a></li>              
              <li><a href="log_out.php">Log Out</a></li>
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
         <div id="list_feedback">         
         	<div class="accordion" id="accordion2">
             <?php 
			   $feedback->get_feedbacks_id($_REQUEST["feed_id"]);
			   
			   $sn = 1;	
			   
			   if($feedback->additional_data!=0)			   
			   foreach($feedback->comment_data as $feeds)
				{
					extract($feeds);	
					$feedback->get_user_details($iduser);
			 ?>              
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a id="comment_heading" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo "collapse".$sn ?>">
                    <?php 
						echo $sn.". ".$title." by ".$feedback->user_data[0]["name"]; 
						if($iduser!= '00')
						{
							if($flag=="unread")
								echo "<strong> New* </strong>";
						}
						switch($flag){
							case "unread":
							case "pending":
								echo "<img src='img/red.jpg' width='10' height='10'>";
								break;
							case "finished":
								echo "<img src='img/green.jpg' width='10' height='10'>";
								break;
							case "in process":
								echo "<img src='img/yellow.jpg' width='10' height='10'>";
								break;
						}
					?>					
                  </a>
                </div>
                <div id="<?php echo "collapse".$sn ?>" class="accordion-body collapse">
                  <div id="comment" class="accordion-inner">
                    <?php 
						echo $description ;	
						if($_SESSION['designation']=="webdeveloper" && $flag!="finished"){
					?>
                      <div>
                       <form name="status1" id="status1" action="feedback_details.php?feed_id=<?php echo $id ?>" method="post">
                        <select name="stat" id="stat">
                          <option>Select Status</option>
                          <option>finished</option>
                          <option>in process</option>
                          <option>pending</option>
                        </select>
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit">
                       </form>
                      </div>
                  </div>
                </div>
              </div> 
              <?php
					}
					$sn++;}
				unset($feedback->user_data); 
				unset($feedback->comment_data);							  
			  ?>             
            </div>
         </div>        
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
	
    </script>

</body></html>