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
	
	/*if(!isset($_SESSION["spacial_case"]))
		$_SESSION["spacial_case"] = "testing admin selection";*/
	$user = new User();
	
	if(isset($_REQUEST['add_exec'])){
		if(!in_array("", $_REQUEST)){
			$user->add_new_exec($_REQUEST['user1'],$_REQUEST['loc'],$_REQUEST['post']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_exec_central'])){
		if(!in_array("", $_REQUEST)){
			//echo $_REQUEST['name_c']." ".$_REQUEST['designation_c']." ".$_REQUEST['office_code_c']." ".$_REQUEST['authority_level_c'];
			$id_r = $user->add_new_user($_REQUEST['name_c'],$_REQUEST['designation_c'],$_REQUEST['office_code_c'],$_REQUEST['authority_level_c']);
			$user->add_new_exec($id_r,'central',$_REQUEST['post_c']);
			//$_REQUEST['post_c']
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_new_user'])){
		if(!in_array("", $_REQUEST)){
			$user->add_new_user($_REQUEST['name'],$_REQUEST['designation'],$_REQUEST['office_code'],$_REQUEST['authority_level']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_location'])){
		if(!empty($_REQUEST['user'])&&!empty($_REQUEST['ms'])&&!empty($_REQUEST['pr'])&&!empty($_REQUEST['site'])&&!empty($_REQUEST['msite'])) {
			$user->add_location_to_user($_REQUEST['user'],$_REQUEST['ms'],$_REQUEST['pr'],$_REQUEST['site'],$_REQUEST['msite']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Add User</title>
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
              <li class="active"><a href="add_user.php">Add User</a></li>  
              <li><a href="add_location.php">Add Location</a></li>                  
              <li><a href="log_out.php">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
    <div class="container">
      <!--Body content-->
      <ul class="breadcrumb">
        <li class="active">Add User</li>
      </ul>
      <div class="page-header">
        <h2>Add User</h2>
      </div>
      <div id="main">
		<a href="#add_user" role="button" class="btn" data-toggle="modal">Add User</a>
		<a href="#add_location_to_user" role="button" class="btn" data-toggle="modal">Add Location to User</a>
		<a href="#add_top_local" role="button" class="btn" data-toggle="modal">Add Local Boss</a>
   	 	<a href="#add_top_central" role="button" class="btn" data-toggle="modal">Add Central Boss</a>
   	  </div>
    </div>
	<!-- All modals -->
   
    
  	<div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Master</h3>
      </div>
      <br>
    <form id="add_user_form" name="add_user_form" class="form-horizontal" action="add_user.php" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Name</label>
        <div class="controls">
          <input name="name" type="text">
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Designation</label>
        <div class="controls">
          <select name="designation" id="designation"">
             <option value="" label="Select Designation"></option>  
             <?php
			 	unset($user->comment_data);
                $user->get_designation(); 
                foreach($user->comment_data as $des)
                {
                    extract($des);
            ?>	
              <option><?php echo $name ?></option>    
            <?php }?>  
            </select>
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Office Code</label>
        <div class="controls">
          <input name="office_code" type="text">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Authority Level</label>
        <div class="controls">
          <select name="authority_level" id="authority_level"">
             <option value="" label="Select Authority Level"></option>  
             <?php
			 	unset($user->user_data);
                $user->get_authority_level(); 
                foreach($user->user_data as $auth)
                {
                    extract($auth);
            ?>	
              <option><?php echo $name ?></option>    
            <?php }?>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="add_new_user" id="add_new_user" name="add_new_user" class="btn">Submit</button>
        </div>
      </div>
    </form>
    </div>
	
    <div id="add_location_to_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add location to user</h3>
      </div>
      <br>
    <form id="add_location_to_user_form" name="add_location_to_user_form" class="form-horizontal" action="add_user.php" method="post">
      <div class="control-group">
        <label class="control-label" for="inputUser">User</label>
        <div class="controls">
        	<select id="user" name="user">
             <option value="" label="Select User" onChange="getMaster()"></option>  
             <?php
			 	unset($user->login_data);
                $user->search_user(); 
                foreach($user->login_data as $data1)
                {
                    extract($data1);
            ?>	
              <option value="<?php echo $id ?>"><?php echo $name ?></option>    
            <?php }?>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputUser">Master</label>
        <div class="controls">
        	<select id="ms" name="ms">
             <option value="" label="Select Master"></option>  
             
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputLocation">Project</label>
        <div class="controls">
        	<select id="pr" name="pr">
             <option value="" label="Select Project"></option>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputLocation">Site</label>
        <div class="controls">
        	<select id="site" name="site">
             <option value="" label="Select Site"></option>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputLocation">Micro Site</label>
        <div class="controls">
        	<select id="msite" name="msite">
             <option value="" label="Select Micro Site"></option>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="add_location" id="add_location" name="add_location" class="btn">Submit</button>
        </div>
      </div>
    </form>
    </div>
    
    
    <div id="add_top_central" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add central boss,accountant and SCM</h3>
      </div>
      <br>
    <form id="add_top_central_form" name="add_top_central_form" class="form-horizontal" action="add_user.php" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Name</label>
        <div class="controls">
          <input name="name_c" type="text">
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Designation</label>
        <div class="controls">
          <select name="designation_c" id="designation_c">
             <option value="" label="Select Designation"></option>  
             <?php
			 	unset($user->comment_data);
                $user->get_designation(); 
                foreach($user->comment_data as $des)
                {
                    extract($des);
            ?>	
              <option><?php echo $name ?></option>    
            <?php }?>  
            </select>
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Office Code</label>
        <div class="controls">
          <input name="office_code_c" type="text">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Authority Level</label>
        <div class="controls">
          <select name="authority_level_c" id="authority_level_c">
             <option value="" label="Select Authority Level"></option>  
             <?php
			 	unset($user->user_data);
                $user->get_authority_level(); 
                foreach($user->user_data as $auth)
                {
                    extract($auth);
            ?>	
              <option><?php echo $name ?></option>    
            <?php }?>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputLocation">Post</label>
        <div class="controls">
        	<select id="post_c" name="post_c">
             <option value="" label="Select Post"></option>  
             <option>Boss</option>  
             <option>Accountant</option>  
             <option>SCM</option>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="add_exec_central" id="add_exec_central" name="add_exec_central" class="btn">Submit</button>
        </div>
      </div>
    </form>
    </div>
    
    
	<div id="add_top_local" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add local boss,accountant and SCM</h3>
      </div>
      <br>
    <form id="add_top_local_form" name="add_top_local_form" class="form-horizontal" action="add_user.php" method="post">
      <div class="control-group">
        <label class="control-label" for="inputUser">User</label>
        <div class="controls">
        	<select id="user1" name="user1" onChange="getLocations()">
             <option value="" label="Select User"></option>  
             <?php
                $user->search_user(); 
                foreach($user->login_data as $data1)
                {
                    extract($data1);
            ?>	
              <option value="<?php echo $id ?>"><?php echo $name ?></option>    
            <?php }?>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputUser">Location</label>
        <div class="controls">
        	<select id="loc" name="loc">
             <option value="" label="Select Location"></option>  
             
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputLocation">Post</label>
        <div class="controls">
        	<select id="post" name="post">
             <option value="" label="Select Post"></option>  
             <option>Boss</option>  
             <option>Accountant</option>  
             <option>SCM</option>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="add_exec" id="add_exec" name="add_exec" class="btn">Submit</button>
        </div>
      </div>
    </form>
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
	/*$("#master").change(function () {
	  var str = "";
	  $("select option:selected").each(function () {
				str += $(this).text() + " ";
	  });
	  $("#main").text(str);
	})	*/
	
	function getLocations(){
		singleVal = $("#user1").val();
		$.post("get_locations.php",{val:singleVal},function(output){
			  $('#loc').html(output).show();
			});	  
	}
	function getMaster(){
		$.post("get_master.php",function(output){
			  $('#ms').html(output).show();
			});	  
	}
	function getProject(){
		singleVal = $("#ms").val();
		$.post("get_master.php",{val:singleVal,from:'ms'},function(output){
			  $('#pr').html(output).show();
			});	  
	}
	function getSite(){
		singleVal = $("#pr").val();
		$.post("get_master.php",{val:singleVal,from:'pr'},function(output){
			  $('#site').html(output).show();
			});	  
	}
	function getMicroSite(){
		singleVal = $("#site").val();
		$.post("get_master.php",{val:singleVal,from:'site'},function(output){
			  $('#msite').html(output).show();
			});	  
	}
	function displayVals() {
      var singleValues = $("#single").val();
      var multipleValues = $("#multiple").val() || [];
      $("p").html("<b>Single:</b> " +
                  singleValues +
                  " <b>Multiple:</b> " +
                  multipleValues.join(", "));
    }
 
    $("#user").change(getMaster);
    $("#ms").change(getProject);
    $("#pr").change(getSite);
    $("#site").change(getMicroSite);
    //getMaster();
      function get_projects()
      {
		  //masterOne = document.getElementById("master")
          $.post('get_projects.php', {master: add_user_form.master.value},
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
	  
	  function get_site_factory1()
      {
          $.post('get_site_factory.php', {project: location.project.value, master: location.master.value },
              function(output){
                  $('#site_factory').html(output).show();
              });
      }
	</script>
		
	  

</body></html>