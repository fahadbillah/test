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
	$material = new User();
	
	if(isset($_REQUEST['add_new_material_cat'])){
		$material->add_material_category($_REQUEST['cName'],$_REQUEST['category'],$_REQUEST['cat']);
	}
	if(isset($_REQUEST['add_new_material'])){
		$material->add_material($_REQUEST['mCat'],$_REQUEST['mSubCat'],$_REQUEST['mName'],$_REQUEST['mUnit'],$_REQUEST['mDes'],$_REQUEST['mCPU']);
	}
	?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Add material</title>
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
              <li class="active"><a href="add_material.php">Add Material</a></li>    
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
        <li class="active">Add material</li>
      </ul>
      <div class="page-header">
        <h2>Add material</h2>
      </div>
      <div id="main">
		<a href="#add_material_category" role="button" class="btn" data-toggle="modal">Add Material Category</a>
		<a href="#add_material" role="button" class="btn" data-toggle="modal">Add material</a>
   	  </div>
    </div>
	<!-- All modals -->
   
    
  	<div id="add_material" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Material</h3>
      </div>
      <br>
    <form id="add_material_form" name="add_material_form" class="form-horizontal" action="add_material.php" method="post">
       <div class="control-group">
        <label class="control-label" for="inputEmail">Category</label>
        <div class="controls">
          <select name="mCat" id="mCat">
              <option value="0">Select Category</option> 
              <?php
			  	$material->getMatCat();
				foreach($material->user_data_temp1 as $cata){
					extract($cata);
			  ?>
              <option value="<?php echo $id ?>"><?php echo $name ?></option>   
              <?php
				}
			  ?> 
          </select>
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Subcategory</label>
        <div class="controls">
          <select name="mSubCat" id="mSubCat">
              <option value="0">Select Subcategory</option> 
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Material Name</label>
        <div class="controls">
          <input name="mName" type="text">
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="mUnit">Measurement Unit</label>
        <div class="controls">
          <select name="mUnit" id="mUnit">
              <option>Select Measurement Unit</option> 
              <option>Piece</option>    
              <option>KG</option>  
              <option>Ton</option>  
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="mDes">Measurement Description</label>
        <div class="controls">
          <textarea name="mDes"></textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="mCPU">Cost Per Unit</label>
        <div class="controls">
          <input name="mCPU" type="text">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="add_new_material" id="add_new_material" name="add_new_material" class="btn">Submit</button>
        </div>
      </div>
    </form>    
    </div>
    
	<div id="add_material_category" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Material Category</h3>
      </div>
      <br>
    <form id="add_material_category_form" name="add_material_category_form" class="form-horizontal" action="add_material.php" method="post">
       <div class="control-group">
        <label class="control-label" for="category">Select Category/Subcategory</label>
        <div class="controls">
          <select name="category" id="category">
              <option>Select Category/Subcategory</option> 
              <option>Category</option>    
              <option>Subcategory</option>  
            </select>
        </div>
      </div>
       <div id="catDiv" class="control-group" hidden>
        <label class="control-label" for="category">Select Category</label>
        <div class="controls">
          <select name="cat" id="cat">
              <option value="0">Select Category</option> 
              <?php
			  	$material->getMatCat();
				foreach($material->user_data_temp1 as $cata){
					extract($cata);
			  ?>
              <option value="<?php echo $id ?>"><?php echo $name ?></option>   
              <?php
				}
			  ?> 
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Category/Subcategory Name</label>
        <div class="controls">
          <input name="cName" type="text">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="add_new_material_cat" id="add_new_material_cat" name="add_new_material_cat" class="btn">Submit</button>
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
    $("#category").change(showCat);
    $("#mCat").change(getSub);
	function showCat(){
	    var catVal = $("#category").val();
		if(catVal == 'Subcategory')
			$("#catDiv").show(500)
		else
			$("#catDiv").hide(500)
	}
	  
	function getSub(){
		var catVal = $("#mCat").val();
		$.post('material_subcategory.php', {cat: catVal},
			function(output){
			  $('#mSubCat').html(output).show();
		});// main
	}
	</script>
		
	  

</body></html>