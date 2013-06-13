<?php 
	include_once "user.php";
	
	session_start();
	if($_SESSION["designation"]!=='Hub Admin')
	{ 	  
		echo 'You are not authorized to use this page.';
		echo "<INPUT class='btn' TYPE='button' VALUE='Back to previous page' onClick='history.go(-1);return true;'>";
		exit;
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>starter</title>
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
              <li><a href="add_material.php">Add Material</a></li>
              <li><a href="add_user.php">Add User</a></li>  
              <li><a href="add_location.php">Add Location</a></li>    
              <li><a href="super_admin_central_hub.php">Requisition Hub</a></li>                 
              <li><a id="log_out" href="log_out.php">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
        <div class="container">
          <!--Body content-->
          <ul class="breadcrumb">
              <li><a href="admin.php">Home</a> <span class="divider">/</span></li>
              <li class="active">Add New User</li>
          </ul>
          <div class="page-header">
            <h3>Add user login info</h3>            
          </div>
          <?php 
	
				$add_user = new User();
				
				unset($add_user->user_data_temp1);
				unset($add_user->user_data);
				
				if(isset($_REQUEST["submit"]))
				{
					if(!in_array("",$_REQUEST))
					{
						extract($_REQUEST);
						if(filter_var($email, FILTER_VALIDATE_EMAIL) && $password===$r_password)
						{
							$id = $add_user->add_user($user_id,$email,$password);
							if($id)
								echo "<span class='label label-success'>User login added successfully.</span>";
							else
								echo "<span class='label label-warning'>User login not added.</span>";
						}
						else
						  echo "<span class='label label-warning'>Input a proper email address.</span>";
				  }	
					else 
					  echo "<span class='label label-warning'>You left a field blank.</span>";
				}
				
				if(isset($_REQUEST['id'])){
					$add_user->search_user($_REQUEST['id'],'id');
					foreach($add_user->login_data as $data){
						extract($data);					
			?>
            <div id="yooo"> </div>
			<form name="add_user_form" id="add_user_form" action="add_user_login.php" method="post">
			<table class="table-striped" width="100%" cellspacing="5" cellpadding="5">
			  <tr>
				<td>Name</td>
				<td>
             	   <input disabled type="text" name="name" id="name" value="<?php echo $name ?>"/>
                </td>                
			  </tr>
			  <tr>
				<td>Designation</td>
				<td>
                   <input disabled type="text" name="designation" id="designation" value="<?php echo $designation ?>"/>
                </td>                
			  </tr>
			  <tr>
				<td>Offial ID</td>
				<td>
                   <input disabled type="text" name="oId" id="oId" value="<?php echo $office_code ?>"/>
                </td>                
			  </tr>
			  <tr>
				<td>Status</td>
				<td>
                   <input disabled type="text" name="status" id="status" value="<?php echo $active_status ?>"/>
                </td>                
			  </tr>
			  <tr>
				<td>Email</td>
				<td>
                <input type="text" name="email" id="email" onChange="unique_email_check()" /><span id="unique_email_check" class="help-inline"></span>
                </td>                
			  </tr>
			  <tr>
				<td>Password</td>
				<td><input id="password" name="password" type="password" /></td>
			  </tr>    
			  <tr>
				<td>Repeat Password</td>
				<td><input id="r_password" name="r_password" type="password" onChange="confirm_password()" /><span id="r_password_span" class="help-inline"></span></td>
			  </tr>      
			  <tr>
				<td><input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['id'] ?>"></td>
				<td><input class="btn" name="submit" type="submit" /></td>
			  </tr>
			</table>
			</form>
            <?php 
					}
				}
			?>
        </div>
      </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery.validate.js"></script>
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
	  $(document).ready(function(){
		$("#add_user_form").validate();
	  });
	
      function get_projects()
      {
          $.post('get_projects.php', {master: add_user_form.master.value },
              function(output){
                  $('#project').html(output).show();
              });
      }
	  
	  function get_site_factory()
      {
          $.post('get_site_factory.php', {project: add_user_form.project.value, master: add_user_form.master.value },
              function(output){
                  $('#site_factory').html(output).show();
              });
      }
	  
	  function get_designation()
      {
          $.post('get_designation.php', {site_factory: add_user_form.site_factory.value},
              function(output){
                  $('#designation').html(output).show();
              });
      }
	  
	  function unique_email_check()
      {
          $.post('unique_email_check.php', {email: add_user_form.email.value},
              function(output){
                  $('#unique_email_check').html(output).show();
              });
      }
	  
	  function get_office_type()
      {
          $.post('office_type.php', {email: add_user_form.office_type.value},
              function(output){
                  $('#unique_email_check').html(output).show();
              });
      }
	  function confirm_password()
      {
         var x=document.getElementById("password");
		 var y=document.getElementById("r_password");
		 if(x.value !== y.value)
		 	 $('#r_password_span').html("<span class='label label-warning'>Password not matched.</span>").show();
		else
		 	 $('#r_password_span').html("<span class='label label-success'>Password matched.</span>").show();
			
      }
	  $("form").submit(function(e){
		if (!confirm("Do you confirm submit?"))
		{
			e.preventDefault();
			return;
		} 
	}); 
	</script>

</body></html>