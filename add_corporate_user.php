<?php 
	include_once "user.php";
	
	session_start();	
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
              <li><a href="admin.php">Home</a></li>
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
              <li class="active">Add New Corporate User</li>
          </ul>
          <div class="page-header">
            <h2>Step 1: Add user details</h2>            
          </div>
          <?php 
	
				$add_user = new User();
				
				unset($add_user->user_data_temp1);
				unset($add_user->user_data);
				
				if(isset($_REQUEST["submit"]))
				{
					//var_dump($_REQUEST);		
					if($_SESSION["form_resubmission"]==$_REQUEST["confirm"]){
					if(!in_array("",$_REQUEST))
					{
						extract($_REQUEST);
						if(filter_var($email, FILTER_VALIDATE_EMAIL))
						{							
							$id = $add_user->add_corporate_user($name,$email,$password,$contact,$master,$department,$designation);
							
							$add_user->create_unique_id($master,99,0);
							
							if(is_array($add_user->user_data))
							{
								foreach($add_user->user_data as $data)
								{
									extract($data);
										
									$unique_id = ++$staff_id;					
								}
							}
							else
								$unique_id = $add_user->user_data;
								
							if($add_user->update_unique_id($id,$unique_id)){
								$_SESSION["recent_add_user"]=$id;							
							}
							
							
							//header('Location: new_image.php');
							
							//echo $name.$email.$password.$contact.$master.$project.$site_factory.$designation.$unique_id;
						}
						else
						  echo "<span class='label label-warning'>Input a proper email address.</span>";
				  }	
					else 
					  echo "<span class='label label-warning'>You left a field blank.</span>";
				}
					else 
					  echo "<span class='label label-warning'>Form resubmission not allowed.</span>";
				}
			?>
            <div id="yooo"> </div>
			<form name="add_user_form" id="add_user_form" action="add_corporate_user.php" method="post">
			<table class="table-striped" width="100%" cellspacing="5" cellpadding="5">
			  <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name" /></td>
              </tr>
			  <tr>
				<td>Email</td>
				<td>
                <input type="text" name="email" id="email" onChange="unique_email_check()" /><span id="unique_email_check" class="help-inline"></span>
                </td>                
			  </tr>
			  <tr>
				<td>Password</td>
				<td><input name="password" type="password" /></td>
			  </tr>              
              <tr>
                <td>Contact</td>
                <td><input type="text" name="contact" id="contact" /></td>
              </tr>
              <tr>
                <td>Master</td>
                <td>
                <select name="master" id="master" onchange="get_departments()">
                 <option value="" label="Select Master"></option>  
                 <?php
					$add_user->get_all_masters(); 
					foreach($add_user->user_data_temp as $masters)
					{
						extract($masters);
				?>	
				  <option><?php echo $name ?></option>    
				<?php }?>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Departments</td>
                <td>
                <select name="department" id="department">
                 <option value="" label="Select designations"></option>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Designation</td>
                <td>
                <select name="designation" id="designation">
                 <option value="" label="Select Designation"></option> 
                  <?php
					$add_user->get_designation(); 
					foreach($add_user->comment_data as $designation)
					{
						extract($designation);
				?>	
				  <option><?php echo $name ?></option>    
				<?php }?>                    
                </select>
                </td>
              </tr>              
			  <tr>
			  <?php 
			  	$rand = rand(10, 100);
				$_SESSION["form_resubmission"] = $rand
			  ?>
				<td><input type="hidden" id="id" value="<?php echo 102243;?>"><input type="hidden" 
                name="confirm" id="confirm" value="<?php echo $rand ?>"></td>
				<td><input name="submit" type="submit" /></td>
			  </tr>
			</table>
			</form>
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
	
      function get_departments()
      {
          $.post('get_departments.php', {master: add_user_form.master.value, type: 'corporate'},
              function(output){
                  $('#department').html(output).show();
              });
      }
	  
	  function get_site_factory()
      {
          $.post('get_site_factory.php', {project: add_user_form.project.value, master: add_user_form.master.value },
              function(output){
                  $('#site_factory').html(output).show();
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
	</script>

</body></html>