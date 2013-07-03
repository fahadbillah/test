<?php 
	include_once "user.php";
	
	session_start();
	
	if(!isset($_SESSION["loggedin"])||!isset($_SESSION["user_id"]))
	{ 	  
		header("Location: signin.php?status=notloggedin");
	}
	if($_SESSION["designation"]!=='Hub Admin')
	{ 	  
		echo 'You are not authorized to use this page.';
		echo "<INPUT class='btn' TYPE='button' VALUE='Back to previous page' onClick='history.go(-1);return true;'>";
		exit;
	}
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
	$location = new User();
	
	if(isset($_REQUEST['add_new_ms'])){
		if(!empty($_REQUEST['ms'])&&!empty($_REQUEST['pr'])&&!empty($_REQUEST['si'])&&!empty($_REQUEST['msite'])){
			$location->add_new_micro_site($_REQUEST['ms'],$_REQUEST['pr'],$_REQUEST['si'],$_REQUEST['msite']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_new_location'])){
		if(!empty($_REQUEST['master'])&&!empty($_REQUEST['project'])&&!empty($_REQUEST['site_factory'])){
			$location->add_new_location($_REQUEST['master'],$_REQUEST['project'],$_REQUEST['site_factory']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_new_master'])){
		if(!empty($_REQUEST['master_field'])&&!empty($_REQUEST['master_id'])){
			$location->add_new_master($_REQUEST['master_field'],$_REQUEST['master_id']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_new_project'])){
		if(!empty($_REQUEST['master_project'])&&!empty($_REQUEST['project_field'])){
			$location->add_new_project($_REQUEST['master_project'],$_REQUEST['project_field']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	if(isset($_REQUEST['add_single_entity_submit'])){
		//print_r($_REQUEST);
		if(!empty($_REQUEST['single_entity_master'])&&!empty($_REQUEST['single_entity'])){
			//echo 'worksss';
			$location->add_new_single_entity($_REQUEST['single_entity_master'],$_REQUEST['single_entity']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	if(isset($_REQUEST['add_single_entity_office_submit'])){
		//print_r($_REQUEST);
		if(!empty($_REQUEST['single_entity_name'])&&!empty($_REQUEST['office_factory'])){
			//echo 'worksss';
			$location->add_new_single_entity_off_fac($_REQUEST['single_entity_name'],$_REQUEST['office_factory']);
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Location</title>
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
              <li><a href="add_user.php">Add User</a></li> 
              <li><a href="add_material.php">Add Material</a></li>    
              <li class="active"><a href="add_location.php">Add Location</a></li>       
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
        <li class="active">Location</li>
      </ul>
      <div class="page-header">
        <h2>Location</h2>
      </div>
      <div id="main">
      <table class="table table-hover">
      <tr>
      <td><a href="#add_master" role="button" class="btn" data-toggle="modal">Add New Master</a></td>
      <td>Add master business</td>
      </tr>
      <tr>
      <td><a href="#add_project" role="button" class="btn" data-toggle="modal">Add New Project</a></td>
      <td>Add project of a master business</td>
      </tr>
      <tr>
      <td><a href="#add_site" role="button" class="btn" data-toggle="modal">Add Site</a></td>
      <td>Add site of a project</td>
      </tr>
      <tr>
      <td><a href="#add_micro_site" role="button" class="btn" data-toggle="modal">Add Micro Site</a></td>
      <td>Add micro site of a site</td>
      </tr>
      <tr>
      <tr>
      <td style="text-align:center"><strong>Section For Single Entity</strong></td>
      </tr>
      <tr>
      <td><a href="#add_single_entity" role="button" class="btn" data-toggle="modal">Add New Industry</a></td>
      <td>Add industry of single entity</td>
      </tr>
      <tr>
      <td><a href="#entity_off_fac" role="button" class="btn" data-toggle="modal">Add New Office/Factory</a></td>
      <td>Add office/factory of industry</td>
      </tr>
      </table>
   	  </div>
    </div>
	<!-- All modals -->
    <div id="add_micro_site" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Micro Site</h3>
      </div>
      <div class="modal-body">
        <form name="add_micro_site_form" id="add_micro_site_form" action="add_location.php" method="post">
			<table class="table-striped" width="100%" cellspacing="5" cellpadding="5">
              <tr>
                <td>Master</td>
                <td>
                <select name="ms" id="ms" onchange="get_projects1()">
                 <option value="" label="Select Master"></option>  
                 <?php
					$location->get_all_masters(); 
					foreach($location->user_data_temp as $masters)
					{
						extract($masters);
				?>	
				  <option><?php echo $name ?></option>    
				<?php }?>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Project</td>
                <td>
                <select name="pr" id="pr" onChange="get_site_factory2()">
                 <option value="" label="Select Project"></option>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Site</td>
                <td>
                <select name="si" id="si">
                 <option value="" label="Select Site"></option>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Micro Site</td>
                <td>
                <input name="msite" type="text">
                </td>
              </tr> 
              <tr>
                <td></td>
                <td>
       			 <input name="add_new_ms" id="add_new_ms" class="btn" type="submit" />
                </td>
              </tr>    
			</table>
        </form>
      </div>
       <div class="container-fluid pre-scrollable" id="micro_site_list">
        <table class="table table-condensed table-hover" id="micro_site_list_table">
        <tr>
        <th>Micro Site</th>
        <th>Site</th>
        <th>ID</th>
        <th>Remove/Edit</th>
        </tr>
        <?php 
        $location->get_micro_site('');
       	//var_dump($location->user_data_temp1);
        foreach($location->user_data_temp1 as $mic){
            extract($mic)
        ?>
        <tr>
        <td><?php echo $name;?></td>
        <td><?php echo $site;?></td>
        <td><?php echo $id;?></td>
        <td><input type="button" class="btn btn-mini btn-danger microSiteButton" id="<?php echo 'microSite_'.$id;?>" value="Remove"></td>
        </tr>
        <?php }?>
        </table>
        </div>
      <div class="modal-footer">
      </div>
    </div>
    <div id="add_site" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Site</h3>
      </div>
      <div class="modal-body">
        <form name="add_user_form" id="add_user_form" action="add_location.php" method="post">
			<table class="table-striped" width="100%" cellspacing="5" cellpadding="5">
              <tr>
                <td>Master</td>
                <td>
                <select name="master" id="master" onchange="get_projects()">
                 <option value="" label="Select Master"></option>  
                 <?php
				 	unset($location->user_data_temp);
					$location->get_all_masters(); 
					foreach($location->user_data_temp as $masters)
					{
						extract($masters);
				?>	
				  <option><?php echo $name ?></option>    
				<?php }?>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Project</td>
                <td>
                <select name="project" id="project" onChange="get_site_factory()">
                 <option value="" label="Select Project"></option>  
                </select>
                </td>
              </tr>
              <tr>
                <td>Site</td>
                <td>
                <input name="site_factory" type="text">
                </td>
              </tr>  
              <tr>
                <td></td>
                <td>
       			 <input name="add_new_location" id="add_new_location" class="btn" type="submit" />
                </td>
              </tr>    
			</table>
        </form>
      </div>
      <div class="container-fluid pre-scrollable" id="site_list">
        <table class="table table-condensed table-hover" id="site_list_table">
        <tr>
        <th>Site</th>
        <th>ID</th>
        <th>Project</th>
        <th>Master</th>
        <th>Remove/Edit</th>
        </tr>
        <?php 
        $siteTemp = $location->search_location();
        //var_dump($location->user_data_temp);
        foreach($siteTemp as $si){
            extract($si);
			if($location_type!='Single Entity'){
        ?>
        <tr>
        <td><?php echo $site_factory;?></td>
        <td><?php echo $location_id;?></td>
        <td><?php echo $project;?></td>
        <td><?php echo $master;?></td>			
        <td><input type="button" class="btn btn-mini btn-danger siteButton" id="<?php echo 'site_'.$id;?>" value="Remove"></td>
        </tr>
        <?php }}?>
        </table>
        </div>
    </div>
    
  	<div id="add_master" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Master</h3>
      </div>
      <br>
    <form id="add_master_form" name="add_master_form" class="form-horizontal" action="add_location.php" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Master</label>
        <div class="controls">
          <input name="master_field" type="text">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Id</label>
        <div class="controls">
          <input name="master_id" type="text">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" id="add_new_master" name="add_new_master" class="btn">Submit</button>
        </div>
      </div>
    </form>
    <div class="container-fluid pre-scrollable" id="master_list">
    <table class="table table-condensed table-hover" id="master_list_table">
    <tr>
    <th>Master Business</th>
    <th>ID</th>
    <th>Remove/Edit</th>
    </tr>
    <?php 
	$location->get_all_masters();
	//var_dump($location->user_data_temp);
	foreach($location->user_data_temp as $mas){
		extract($mas)
	?>
    <tr>
    <td><?php echo $name;?></td>
    <td><?php echo $id;?></td>
    <td><input type="button" class="btn btn-mini btn-danger masterButton" id="<?php echo 'master_'.$id;?>" value="Remove"></td>
    </tr>
    <?php }?>
    </table>
    </div>
    </div>

	<div id="add_single_entity" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Single Entity</h3>
      </div>
      <br>
    <form id="add_project_form" name="add_project_form" class="form-horizontal" action="add_location.php" method="post">
      <div class="control-group">
        <label class="control-label" for="master">Master</label>
        <div class="controls">          
          <input id="single_entity_master" name="single_entity_master" value="Single Entity" type="text" readonly>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="entity">Entity</label>
        <div class="controls">
          <input id="single_entity" name="single_entity" type="text">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" id="add_single_entity_submit" name="add_single_entity_submit" value="submit" class="btn">Submit</button>
        </div>
      </div>
    </form>
    <div class="container-fluid pre-scrollable" id="master_list">
    <table class="table table-condensed table-hover" id="se_list_table">
    <tr>
    <th>Single Entity Business</th>
    <th>ID</th>
    <th>Remove/Edit</th>
    </tr>
    <?php 
	$seTemp = $location->get_all_single_entity();
	//var_dump($location->user_data_temp);
	foreach($seTemp as $set){
		extract($set)
	?>
    <tr>
    <td><?php echo $name;?></td>
    <td><?php echo $id;?></td>
    <td><input type="button" class="btn btn-mini btn-danger seButton" id="<?php echo 'se_'.$id;?>" value="Remove"></td>
    </tr>
    <?php }?>
    </table>
    </div>
    </div>
    <div id="add_project" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Project</h3>
      </div>
      <br>
    <form id="add_project_form" name="add_project_form" class="form-horizontal" action="add_location.php" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Master</label>
        <div class="controls">
          <select name="master_project" id="master_project">
                 <option value="" label="Select Master"></option>  
                 <?php
				 	unset($location->user_data_temp);
					$location->get_all_masters(); 
					foreach($location->user_data_temp as $masters)
					{
						extract($masters);
				?>	
				  <option><?php echo $name ?></option>    
				<?php }?>  
                </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Project</label>
        <div class="controls">
          <input name="project_field" type="text">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" id="add_new_project" name="add_new_project" class="btn">Submit</button>
        </div>
      </div>
    </form>
    <div class="container-fluid pre-scrollable" id="master_list">
    <table class="table table-condensed table-hover" id="project_list_table">
    <tr>
    <th>Project</th>
    <th>ID</th>
    <th>Master</th>
    <th>Remove/Edit</th>
    </tr>
    <?php 
	$pTemp = $location->get_all_projects('','all');
	//var_dump($location->user_data_temp);
	foreach($pTemp as $pt){
		extract($pt)
	?>
    <tr>
    <td><?php echo $name;?></td>
    <td><?php echo $id;?></td>
    <td><?php echo $master;?></td>
    <td><input type="button" class="btn btn-mini btn-danger seButton" id="<?php echo 'se_'.$id;?>" value="Remove"></td>
    </tr>
    <?php }?>
    </table>
    </div>
    </div>   

	<div id="entity_off_fac" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Single Entity</h3>
      </div>
      <br>
    <form id="add_entity_office_form" name="add_entity_office_form" class="form-horizontal" action="add_location.php" method="post"><div class="control-group">
        <label class="control-label" for="inputEmail">Single Entity Office / Factory</label>
        <div class="controls">
          <select name="single_entity_name" id="single_entity_name">
                 <option value="" label="Select Single Entity wow"></option>  
                 <?php
					$ent = $location->get_all_single_entity(); 
					//var_dump($ent);
					foreach($ent as $ett)
					{
						extract($ett);
				?>	
				  <option value="<?php echo $id.'|'.$name ?>"><?php echo $name ?></option>    
				<?php }?>  
                </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Office / Factory</label>
        <div class="controls">
          <input name="office_factory" id="office_factory" type="text">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" id="add_single_entity_office_submit" name="add_single_entity_office_submit" class="btn">Submit</button>
        </div>
      </div>
    </form>
      
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
	/*$("#master").change(function () {
	  var str = "";
	  $("select option:selected").each(function () {
				str += $(this).text() + " ";
	  });
	  $("#main").text(str);
	})	*/
      function get_projects()
      {
		  //masterOne = document.getElementById("master")
          $.post('get_projects.php', {master: add_user_form.master.value},
              function(output){
                  $('#project').html(output).show();
              });
      }
	  
	  function get_projects1()
      {
		  //masterOne = document.getElementById("master")
          $.post('get_projects.php', {master: add_micro_site_form.ms.value},
              function(output){
                  $('#pr').html(output).show();
              });
      }
	  
	  function get_site_factory()
      {
          $.post('get_site_factory.php', {project: add_user_form.project.value, master: add_user_form.master.value },
              function(output){
                  $('#site_factory').html(output).show();
              });
      }
	  
	  function get_site_factory2()
      {
          $.post('get_site_factory.php', {project: add_micro_site_form.pr.value, master: add_micro_site_form.ms.value },
              function(output){
                  $('#si').html(output).show();
              });
      }
	  
	  function get_site_factory1()
      {
          $.post('get_site_factory.php', {project: location.project.value, master: location.master.value },
              function(output){
                  $('#site_factory').html(output).show();
              });
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