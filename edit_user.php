<?php 
	include_once "user.php";
	
	session_start();
	
	if(!isset($_SESSION["loggedin"]))
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
              <li><a href="admin.php"><i class="icon-home icon-white"></i> Home</a></li>
              <li class="active"><a href="admin_panel.php">Admin Panel</a></li>
              <li><a href="profile.php"><i class="icon-user icon-white"></i> Profile</a></li>            
              <li><a href="log_out.php">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
        <div class="container">
          <!--Body content-->
          <ul class="breadcrumb">
              <li><a href="admin_panel.php">Admin Panel</a> <span class="divider">/</span></li>
              <li class="active">Edit User</li>
          </ul>
          <div class="page-header">
            <h2>Welcome Mr. <?php echo $_SESSION["name"] ?></h2>
            
          </div>
          <div id="yooo">
          <form id="search" class="form-search">
            <input name="src" type="text" class="input-medium search-query" placeholder="Search by ID or Name">
            <input name="submit" type="submit" class="btn" value="Search">
          </form>  
          <?php 
	
				$search = new User();
				
				if(isset($_REQUEST["src"]))
				{  				   				   
				   if(filter_var($_REQUEST["src"],FILTER_VALIDATE_EMAIL))
				   	 $search->search_user($_REQUEST["src"],"email");
				   else if(filter_var($_REQUEST["src"],FILTER_VALIDATE_INT))
				   	 $search->search_user($_REQUEST["src"],"id");			  
				   else 				     
				   	echo "<span class='label label-warning'>Please input email or ID</span>";				
		  ?>
                 
          </div>  
          <div>
		    <?php 
		      if($search->login_data)
			  {
			?>
          	<table class="table table-striped" >            	
                <tr>
                	<th>Staff ID
                    </th>
                	<th>Name
                    </th>
                	<th>Designation
                    </th>
                	<th>Email
                    </th>
                	<th>Contact
                    </th>
                	<th>Master
                    </th>
                	<th>Project
                    </th>
                	<th>Site/Factory
                    </th>
                    <th>Edit
                    </th>
                </tr>
                <tr>
                	<?php 
						foreach($search->login_data as $reuslt)
						{
							extract($reuslt);	
					?>                    
                	<td><?php echo $staff_id ?>
                    </td>
                	<td><?php echo"<a href='user_details.php?id=".$idusers."'>$name</a>"?>				
                    </td>
                	<td><?php echo $designation ?>
                    </td>
                	<td><?php echo $email ?>
                    </td>
                	<td><?php echo $contact ?>
                    </td>
                	<td><?php echo $master ?>
                    </td>
                	<td><?php echo $project ?>
                    </td>
                	<td><?php echo $site_factory ?>
                    </td>
                    <td>
                      <a href="edit_user.php?edit_user=<?php echo $staff_id ?>"><i class="icon-pencil"></i></a>
                    </td>
                </tr>
                <?php }?>
            </table>
            <?php }}
			  
			  if(isset($_REQUEST["edit_user"]))
				{		
					foreach($search->login_data as $reuslt)
					{
						extract($reuslt);	
					?>  
            <div class="row">
              <div class="span8">          
                <form name="edit_user_form" id="add_user_form" action="add_new_user.php" method="post">    
                <table class="table table-striped" >   
                	<tr>
                        <th>Staff ID
                        </th>
                        <td><?php echo $staff_id ?>
                    	</td>
                    </tr>         	
                    <tr>	
                        <th>Name
                        </th>
                        <td><?php echo $name ?>	
                        </td>
                    </tr>                    
                    <tr>
                        <th>Email
                        </th>
                        <td><?php echo $email ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Contact
                        </th>
                        <td><?php echo $contact ?>
                        </td>
                    </tr>                    
                    <tr>
                        <th>Master
                        </th>
                        <td>
                        <select name="master" id="master" onchange="get_projects()">
                         <option><?php echo $master ?></option>  
                         <?php
                            $search->get_all_masters(); 
                            foreach($search->user_data_temp as $masters)
                            {
                                extract($masters);
                        ?>	
                          <option><?php echo $name ?></option>    
                        <?php }?>  
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Project
                        </th>
                        <td>
                        <select name="project" id="project" onChange="get_site_factory()">
                         <option><?php echo $project ?></option>  
                        </select>  
                        </td>
                    </tr>
                    <tr>
                        <th>Site/Factory
                        </th>
                        <td>
                        <select name="site_factory" id="site_factory" onChange="get_designation()">
                         <option><?php echo $site_factory ?></option>  
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Designation
                        </th>
                        <td>
                        <select name="site_factory" id="site_factory" onChange="get_designation()">
                         <option><?php echo $designation ?></option>  
                        </select>
                        </td>
                    </tr>
                </table>
                </form>
              </div>
              <div class="span4">
                <li class="span4">
                    <a href="#" class="thumbnail">
                      <img height="200px" src="server/php/files/47336_488967517815122_1966545043_n.jpg"  alt="">
                    </a>
                </li>
              </div>
            </div>
            
            
            <?php }}?>
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
		
		function get_projects()
      {
          $.post('get_projects.php', {master: edit_user_form.master.value },
              function(output){
                  $('#project').html(output).show();
              });
      }
	  
	  function get_site_factory()
      {
          $.post('get_site_factory.php', {project: edit_user_form.project.value, master: add_user_form.master.value },
              function(output){
                  $('#site_factory').html(output).show();
              });
      }
	  
	  function get_designation()
      {
          $.post('get_designation.php', {site_factory: edit_user_form.site_factory.value},
              function(output){
                  $('#designation').html(output).show();
              });
      }
	  
	  function unique_email_check()
      {
          $.post('unique_email_check.php', {email: edit_user_form.email.value},
              function(output){
                  $('#unique_email_check').html(output).show();
              });
      }
		
    </script>

</body></html>