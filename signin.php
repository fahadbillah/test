<?php 
	include_once "user.php";	
	session_start();
	
	$login = new User();

	if(isset($_SESSION["designation"]))
	{	
		if($_SESSION["designation"]=="admin") 
			header("Location: admin.php");			
		else{
			header("Location: user_home.php");			
		}
			
					
				//header("Location: nowhere.php");
	}
?>

<!DOCTYPE html>
<!-- saved from url=(0056)http://twitter.github.com/bootstrap/examples/signin.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

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
  <style>.tooltiptrolol { position: relative; cursor: help; text-decoration: none;} .tooltiptrolol span { display: none; position: absolute; top: 15px; left: 10px; padding: 5px; z-index: 100; background: #000; color: #fff; border-radius: 5px; box-shadow: 2px 2px rgba(0, 0, 0, 0.1); text-align: center; line-width: 1000px; text-indent: 0; font: normal bold 10px/13px Tahoma,sans-serif; white-space: nowrap;} span:hover.tooltiptrolol { font-size: 99%; } .tooltiptrolol:hover span { display: block; } .md img { display:inline; } .rageface { visibility:visible; }</style></head>

  <body>

    <div class="container">	    
      <form class="form-signin" action="sign_in_process.php" method="post">
        <?php 	  
	  	  if(isset($_REQUEST["status"]))
		  {
			  switch($_REQUEST["status"])
			  {
				case "notauthorized":
				  echo "<span class='label label-warning'>You are not allowed to see the page</span>";
				  break;
		 		case "notloggedin":
				  echo "<span class='label label-warning'>You are not logged in. Please sign in.</span>";
				  break;		 		
			  }
		  }
		?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="email" id="email" type="text" class="input-block-level" placeholder="Email address">
        <input name="not_yo_business" id="not_yo_business" type="password" class="input-block-level" placeholder="Password">
        
        <input class="btn btn-large btn-primary" type="submit" name="submit" value="Submit">
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./signin_files/jquery.js"></script>
    <script src="./signin_files/bootstrap-transition.js"></script>
    <script src="./signin_files/bootstrap-alert.js"></script>
    <script src="./signin_files/bootstrap-modal.js"></script>
    <script src="./signin_files/bootstrap-dropdown.js"></script>
    <script src="./signin_files/bootstrap-scrollspy.js"></script>
    <script src="./signin_files/bootstrap-tab.js"></script>
    <script src="./signin_files/bootstrap-tooltip.js"></script>
    <script src="./signin_files/bootstrap-popover.js"></script>
    <script src="./signin_files/bootstrap-button.js"></script>
    <script src="./signin_files/bootstrap-collapse.js"></script>
    <script src="./signin_files/bootstrap-carousel.js"></script>
    <script src="./signin_files/bootstrap-typeahead.js"></script>

  

</body></html>