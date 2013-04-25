<?php 
	include_once "user.php";
	
	session_start();
	
	$user_details = new User();
	
	$_SESSION["designation"] = 'Cons.Manager';
	//if(!isset($_SESSION["location"]))
	$_SESSION["location"] = 41201;
	/*if(!isset($_SESSION["loggedin"]))
	{ 	  
	  header("Location: signin.php?status=notloggedin");
	}
	
	if(isset($_SESSION["designation"]))
	{
		if(!$user_details->is_corporate($_SESSION["designation"])&& $_SESSION["designation"]!="site manager" && $_SESSION["designation"]!="site supervisor" && $_SESSION["designation"]!="admin")
		{
			header("Location: signin.php?status=notauthorized"); 
		} 	  
	}*/
		
?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Admin Panel</title>
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
              <?php
			  	if($_SESSION["designation"]!='admin'){
			  	$user_details->get_pages($_SESSION["designation"]);
				$a=(explode("/",$_SERVER["PHP_SELF"]));
				//echo $a[2];
				foreach($user_details->user_data as $pages)
						{
							extract($pages);
			  ?>		
              <li
			  <?php 
			  	if($a[2]==$url)
					echo "class='active'";
			  ?>
              >
              	<a href="<?php echo $url ?>">
				<?php
				 if($icon)
               		 echo $icon." ".$name;
				 else
				 	 echo $name;
				?>
                </a>
              </li>
              <?php 
					}
				}
				else {
			  ?>
              <li><a href="admin.php"><i class="icon-home icon-white"></i> Home</a></li>
              <li><a href="admin_panel.php">Admin Panel</a></li>
              <li class="active"><a href="profile.php"><i class="icon-user icon-white"></i> Profile</a></li>            
              <li><a href="log_out.php">Log Out</a></li>
              <?php 
				}
				
			  ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
          <?php 			
			if(isset($_REQUEST["id"]))	
			{
			  $user_details->search_user($_REQUEST["id"],"id");			  
			
			}		
		  ?> 
        <div class="container">
          <!--Body content-->
          <div class="page-header">
            <h2>Welcome Mr. <?php echo $user_details->login_data[0]['name'] ?></h2>
            
          </div>
          <div id="yooo">
                 
          </div>  
          <div>
		    <?php 
		      if($user_details->login_data)
			  {
				  foreach($user_details->login_data as $reuslt)
						{
							extract($reuslt);	
			?>
            <div class="row">
              <div class="span8">                
                <table class="table table-striped" >   
                	<tr>
                        <th>Staff ID
                        </th>
                        <td><?php echo $id ?>
                        </td>
                    </tr>         	
                    <tr>	
                        <th>Name
                        </th>
                        <td><?php echo $name ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Designation
                        </th>
                        <td><?php echo $designation ?>
                        </td>
                    </tr>	
                    <tr>
                        <th>office_code
                        </th>
                        <td><?php echo $office_code ?>
                    	</td>                	
                    </tr>
                    <tr>
                        <th>authorization_level
                        </th>
                        <td><?php echo $authorization_level ?>
                   		</td>
                    </tr>  
                    <tr>
                        <th>Assigned Locations
                        <?php 
							unset($user_details->user_data);
							if($user_details->get_user_locations($_REQUEST["id"])){
									
									
						?>
                        </th>
                        <td>
						<?php 
							foreach($user_details->user_data as $reuslt1)
								{
									extract($reuslt1);	
									echo $master.'->'.$project.'->'.$site_factory.'</br>';
								}
							} 
						?>
                   		</td>
                    </tr>                    
                    <tr>
                        <th>user_since
                        </th>                        
                		<td><?php echo $user_since ?>
                    	</td>
                	
                    </tr>
                    <tr>
                        <th>active_status
                        </th>
                        <td><?php echo $active_status ?>
                   		</td>
                	
                    </tr>
                </table>
              </div>
              <div class="span4">
                <li class="span4">
                    <a href="#" class="thumbnail">
                      <img height="200px" src="server/php/files/<?php echo $image ?>"  alt="<?php echo $name ?>">
                    </a>
                    <?php 
						if($_SESSION["idusers"]==$_REQUEST["id"]||$_SESSION["designation"]=="admin")
							echo "<a href='new_image.php?id=".$_REQUEST["id"]."'>Add Picture</a>"; 
					
					?>
                </li>                
              </div>
              <?php }}?>
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
		
	  $('#datepicker').datepicker();
	
    </script>

</body></html>