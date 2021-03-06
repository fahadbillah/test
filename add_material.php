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
	$material = new User();
	
	if(isset($_REQUEST['add_new_material_cat'])){
		$material->add_material_category($_REQUEST['cName'],$_REQUEST['category'],$_REQUEST['cat']);
	}
	if(isset($_REQUEST['add_new_material'])){
		$material->add_material($_REQUEST['mCat'],$_REQUEST['mSubCat'],$_REQUEST['mName'],$_REQUEST['mUnit'],$_REQUEST['mDes'],$_REQUEST['mCPU']);
	}
	if(isset($_REQUEST['submit_unit'])){
		$material->setUnitType($_REQUEST['unit_name']);
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
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
              <li><a href="admin.php"><i class="icon-home icon-white"></i> Home</a></li><li class="dropdown">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="#">
                    ADD
                    <b class="caret"></b>
                  </a>
                <ul class="dropdown-menu">
                  <!-- links -->
                  <li><a href="add_user.php">Add User</a></li> 
                  <li class="active"><a href="add_material.php">Add Material</a></li> 
                  <li><a href="add_location.php">Add Location</a></li> 
                </ul>
              </li>    
              <li><a href="#message" data-toggle="modal">Message</a></li>
              <li><a href="super_admin_central_hub.php">Requisition Hub</a></li>               
              <li><a id="log_out" href="log_out.php">Log Out</a></li>
            </ul>
            <ul class="nav pull-right">
            <form id="search_req" name="search_req" method="get" action="all_requisitions.php" class="navbar-form pull-right">
            	<input id="search_box" name="query" type="text" class="span2 search-query" placeholder="Search Requisition">
                 <input id="type" name="type" type="text" value="search" style="display: none;">
                <button id="search_btn" type="submit" class="btn">Search</button>
            </form>
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
		<a href="#add_unit" role="button" class="btn" data-toggle="modal">Add Unit</a>
   	  </div>
    </div>
	<!-- All modals -->
   
    
  	<div id="add_material" class="modal hide fade container-fluid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <?php 
			  	$unitForMat = $material->getUnitType();
			  	foreach($unitForMat as $ufm){
					extract($ufm);
					echo "<option>".$name."</option>";
				}
			  
			  ?> 
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
    <div class="container-fluid"><button id="toggle_add_material_list" class="btn btn-large btn-block" type="button">Hide</button>
    </div>
    </br>
    <div class="notice container-fluid"></div>
    <div class="container-fluid pre-scrollable nano">
      <table id="add_material_list" class="table table-condensed table-striped table-hover">
        <tr>
          <th>Name</th>
          <th>Catagory</th>
          <th>Sub-Catagory</th>
          <th>Unit</th>
          <th>Detail</th>
          <th>CPU</th>
          <th>Date Added</th>
          <th>Delete</th>
        </tr>
      </table>
      <div class=""><button id="see_more_add_material_list" class="btn btn-large btn-block" type="button">See More</button>
    </div>
      <div class="modal-footer"></div>
      <div class="modal-footer"></div>
    </div>   
    </div>
    
	<div id="add_material_category" class="modal hide fade container-fluid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    <div id="matCatNotice" class="container-fluid" style="display:none"></div>
    <div class="container-fluid">
    <table class="table table-condensed table-hover" >
    <tr>
    <th>Name</th>
    <th>Catagory/Subcatagory</th>
    <th>Subcatagory of</th>
    <th>Delete</th>
    </tr>
    <?php 
		$allCat = $material->get_all_material_cat();
		foreach($allCat as $ac){
			extract($ac);
	?>
    <tr>
    <td><?php echo $name ?></td>
    <td id="<?php echo 'cat_type_'.$id ?>"><?php echo $type ?></td>
    <td>
	<?php 
		echo $material->id_to_category($sub_cat_of);
	?>
    </td>
    <td><button type="button" class="btn btn-mini btn-danger deleteCat" id="<?php echo 'removecat_'.$id ?>">Remove</button></td>
    </tr>
    <?php 
		}
	?>
    </table>
    </div> 
    </div>
	
    <div id="add_unit" class="modal hide fade container-fluid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Material Category</h3>
      </div>
      <br>
    <form id="add_unit_form" name="add_unit_form" class="form-horizontal" action="add_material.php" method="post">
       <div class="control-group">
        <label class="control-label" for="category">Add Unit</label>
        <div class="controls">
          <input type="text" id="unit_name" name="unit_name" >
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" value="submit_unit" id="submit_unit" name="submit_unit" class="btn">Submit</button>
        </div>
      </div>
    </form>
    <div id="unitNotice" class="container-fluid" style="display:none"></div>
    <div class="container-fluid">
    <table class="table table-condensed table-hover" >
    <tr>
    <th>Unit</th>
    <th>Remove</th>
    </tr>
    <?php 
		$allUnit = $material->getUnitType();
		foreach($allUnit as $au){
			extract($au);
	?>
    <tr>
    <td><?php echo $name ?></td>
    <td><button type="button" class="btn btn-mini btn-danger deleteUnit" id="<?php echo 'removeUnit_'.$id ?>">Remove</button></td>
    </tr>
    <?php 
		}
	?>
    </table>
    </div> 
    </div>
    <?php include_once "messenger.php" ?> 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
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
    <script src="js/jquery.nanoscroller.min.js"></script>
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
      get_add_material_list()
    })
    var material_list_start = 0

    $("#category").change(showCat);
    $("#mCat").change(getSub);


    function get_add_material_list(){
      var singleVal = 10
      buttonLoadingOn("see_more_add_material_list","Loading..")
      var posting = $.post("form_handler.php",{get_material_list: singleVal, limit: material_list_start})
      material_list_start += 10
      posting.done(function(output){
        $("#add_material_list").append(output)
        buttonLoadingOff("see_more_add_material_list","See More")
      })    
    }
    $('#see_more_add_material_list').click(get_add_material_list)


    function delete_material_list(c,id){          
      buttonLoadingOn("delete_material_list"+c,"Deleting..")
      var posting = $.post("form_handler.php",{delete_material: id})
      posting.done(function(output){
        console.log(output)
        $("#add_material .notice").hide().html(output).show("slow").delay(2000).hide("slow")
        if(!output.match("not"))
          temp = $("#delete_material_list"+c).parent().parent().hide("slow")
        else
          buttonLoadingOff("delete_material_list"+c,"Delete")
      })
    }


	function showCat(){
	    var catVal = $("#category").val();
		if(catVal == 'Subcategory')
			$("#catDiv").show(500)
		else
			$("#catDiv").hide(500)
	}
	  
	function getSub(){
		var catVal = $("#mCat").val()
		$('#mSubCat option').text('Loading...')
		posting = $.post('material_subcategory.php', {cat: catVal});
		posting.done(function(output){
			  $('#mSubCat').html(output).show();
		})
	}
	$("form").submit(function(e){
		if (!confirm("Do you confirm submit?"))
		{
			e.preventDefault();
			return;
		} 
	}); 
	$('.deleteUnit').click(function(){
		id = this.id
		id = id.split('_')
		
		posting = $.post('form_handler.php', {unitDeleteId: id[1]});
		posting.done(function(data){
			$($($('#removeUnit_'+id[1]).parent()).parent()).hide('slow').delay(1000).remove()
			$('#unitNotice').html(data).show('slow').delay(3000).hide('slow')			
		})
	}) 
	$('.deleteCat').click(function(){
		id = this.id
		id = id.split('_')
		type = $('#cat_type_'+id[1]).text()
		
		posting = $.post('form_handler.php', {catDeleteId: id[1], type: type});
		posting.done(function(data){
			$($($('#removecat_'+id[1]).parent()).parent()).hide('slow').delay(1000).remove()
			$('#matCatNotice').html(data).show('slow').delay(3000).hide('slow')			
		})
	})
	</script>
		
	  

</body></html>