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
$user = new User();

if(isset($_REQUEST['add_limit'])){
  if(!in_array("", $_REQUEST)){
			//var_dump($_REQUEST['boss']);
			//var_dump($_REQUEST['money_limit']);
   $user->add_boss_limit($_REQUEST['boss'],$_REQUEST['money_limit']);
 }
 else 
   echo "<span class='label label-warning'>A field was empty.</span>";	
}

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
			$id_r = $user->add_new_user($_REQUEST['name_c'],$_REQUEST['designation_c'],$_REQUEST['authority_level_c']); //$_REQUEST['office_code_c'],
			$user->add_new_exec($id_r,'central',$_REQUEST['post_c']);
			//$_REQUEST['post_c']
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	
	if(isset($_REQUEST['add_new_user'])){
		if(!in_array("", $_REQUEST)){
			$user->add_new_user($_REQUEST['name'],$_REQUEST['designation'],$_REQUEST['authority_level']);//,$_REQUEST['office_code']
		}
		else 
			echo "<span class='label label-warning'>A field was empty.</span>";	
	}
	if(isset($_REQUEST['off_fac_site_submit'])){
		if(!in_array("", $_REQUEST)) {
			$user->acc_scm_to_site_fact_office($_REQUEST['name_acc_scm'],$_REQUEST['off_fac_site']);
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
                <li><a href="admin.php"><i class="icon-home icon-white"></i> Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      ADD
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu">
                    <!-- links -->
                    <li class="active"><a href="add_user.php">Add User</a></li> 
                    <li><a href="add_material.php">Add Material</a></li> 
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
        <li class="active">Add User</li>
      </ul>
      <div class="page-header">
        <h2>Add User</h2>
      </div>
      <div id="main">

        <table class="table table-hover">
          <tr>
            <td style="text-align:center"><strong>Section For Local User</strong></td>
          </tr>
          <tr>
            <td><a href="#add_user" role="button" class="btn" data-toggle="modal">Add Local Staff</a></td>
            <td>Add new staff</td>
          </tr>
          <tr>
            <td><a href="#add_location_to_user" role="button" class="btn" data-toggle="modal">Add Local Raiser</a></td>
            <td>Assign location to a user</td>
          </tr>
          <tr>
            <td><a href="#add_top_local" role="button" class="btn" data-toggle="modal">Add Local Boss</a></td>
            <td>Add new local boss</td>
          </tr>
          <tr>
            <td><a href="#add_boss_limit" role="button" class="btn" data-toggle="modal">Set Boss Limit</a></td>
            <td>Set boss money limit</td>
          </tr>
          <tr>
            <tr>
              <td style="text-align:center"><strong>Section For Central User</strong></td>
            </tr>
            <tr>
              <td><a href="#add_top_central" role="button" class="btn" data-toggle="modal">Add Central Boss/Accountant/SCM</a></td>
              <td>Add new central boss/accountant/SCM</td>
            </tr>
            <tr>
              <td><a href="#assign_acc_scm_to_office_factory_site" role="button" class="btn" data-toggle="modal">Assign Accountant/SCM</a></td>
              <td>Assign accountant/SCM to office/factory/site</td>
            </tr>
          </table>  
        </div>
      </div>
      <!-- All modals -->


      <div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">Add Local Staff</h3>
        </div>
        <br>
        <form id="add_user_form" name="add_user_form" class="form-horizontal" action="add_user.php" method="post">
          <div class="control-group">
            <label class="control-label" for="inputName">Name</label>
            <div class="controls">
              <input name="name" type="text">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputDesignation">Designation</label>
            <div class="controls">
              <select name="designation" id="designation">
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
          <label class="control-label" for="inputEmail">Authority Level</label>
          <div class="controls">
            <select name="authority_level" id="authority_level">
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
<div class="container-fluid"><button id="toggle_form_new_user" class="btn btn-large btn-block" type="button">Hide</button>
</div>
</br>
      <div class="notice container-fluid"></div>
      <div class="container-fluid pre-scrollable nano">
        <table id="local_staff_list" class="table table-condensed table-striped table-hover">
          <tr>
            <th>Name</th>
            <th>Date Added</th>
            <th>Delete</th>
          </tr>
        </table>
        <div class=""><button id="see_more_local_staff_list" class="btn btn-large btn-block" type="button">See More</button>
</div>
        <div class="modal-footer"></div>
      </div>
    </div>

    <div id="add_location_to_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Local Raiser</h3>
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
<div class="container-fluid"><button id="toggle_form_add_loc_user" class="btn btn-large btn-block" type="button">Hide</button>
</div>
</br>
<div class="notice container-fluid"></div>
<div class="container-fluid pre-scrollable">
  <table id="local_raiser_list" class="table table-condensed table-striped table-hover">
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Date Added</th>
      <th>Delete</th>
    </tr>
  </table>
  <div class=""><button id="see_more_local_raiser_list" class="btn btn-large btn-block" type="button">See More</button>
</div>
  <div class="modal-footer"></div>
  <div class="modal-footer"></div>
</div>
</div>    
<div id="assign_acc_scm_to_office_factory_site" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add central boss,accountant and SCM</h3>
  </div>
  <br>
  <form id="add_top_central_form_1" name="add_top_central_form_1" class="form-horizontal" action="add_user.php" method="post">
   <div class="control-group">
    <label class="control-label" for="inputEmail">User Name</label>
    <div class="controls">
      <select name="name_acc_scm" id="name_acc_scm">
       <option value="" label="Select Central Accountant/SCM"></option>  
       <?php
       unset($user->comment_data);
       $uid = $user->get_central_acc_scm(); 
       var_dump($uid);
       foreach($uid as $ud)
       {
        ?>	
        <option value="<?php echo $ud; ?>"><?php echo $user->get_user_details($ud,'name') ?></option>    
        <?php }?>  
      </select>
    </div>
  </div>
  <div id="location_output_ext" class="control-group" style="display:none">
    <div id="location_output" class="controls">

    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Office/Factory/Site</label>
    <div class="controls">
      <select name="off_fac_site" id="off_fac_site">
       <option value="" label="Select Office/Factory/Site"></option>  
       <?php
       unset($user->user_data);
       $user->get_location_by_id('site_factory'); 
       foreach($user->user_data as $loct)
       {
        extract($loct);
        ?>	
        <option value="<?php echo $location_id ?>"><?php echo $site_factory ?></option>    
        <?php }?>  
      </select>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" value="off_fac_site_submit" id="off_fac_site_submit" name="off_fac_site_submit" class="btn">Submit</button>
    </div>
  </div>
</form>
<div class="container-fluid"><button id="toggle_form_fac_site" class="btn btn-large btn-block" type="button">Hide</button>
</div>
</br>
<div class="notice container-fluid"></div>
<div class="container-fluid pre-scrollable nano">
  <table id="acc_scm_location_list" class="table table-condensed table-striped table-hover">
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Date Added</th>
      <th>Delete</th>
    </tr>
  </table>
  <div class=""><button id="see_more_acc_scm_location_list" class="btn btn-large btn-block" type="button">See More</button>
</div>
  <div class="modal-footer"></div>
  <div class="modal-footer"></div>
</div>
</div>
<div id="add_top_central" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add central boss,accountant and SCM</h3>
  </div>
  <br>
  <form id="add_top_central_form" name="add_top_central_form" class="form-horizontal" action="add_user.php" method="post">
    <div class="control-group">
      <label class="control-label" for="inputEmail">User Name</label>
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
       <!--<div class="control-group">
        <label class="control-label" for="inputEmail">Office Code</label>
        <div class="controls">
          <input name="office_code_c" type="text">
        </div>
      </div>-->
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
           <option>Hub Admin</option>  
         </select>
       </div>
     </div>
     <div class="control-group">
      <div class="controls">
        <button type="submit" value="add_exec_central" id="add_exec_central" name="add_exec_central" class="btn">Submit</button>
      </div>
    </div>
  </form>  
<div class="container-fluid"><button id="toggle_form_add_exec_cent" class="btn btn-large btn-block" type="button">Hide</button>
</div>
</br>
  <div class="notice container-fluid"></div>
  <div class="container-fluid pre-scrollable">
    <table id="add_top_central_list" class="table table-condensed table-striped table-hover">
      <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Date Added</th>
        <th>Delete</th>
      </tr>
    </table>
    <div class=""><button id="see_more_add_top_central_list" class="btn btn-large btn-block" type="button">See More</button>
  </div>
    <div class="modal-footer"></div>
    <div class="modal-footer"></div>
  </div>
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
<div class="container-fluid"><button id="toggle_form_add_exec_loc" class="btn btn-large btn-block" type="button">Hide</button>
</div>
</br>
<div class="notice container-fluid"></div>
<div class="container-fluid pre-scrollable nano">
  <table id="local_boss_list" class="table table-condensed table-striped table-hover">
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Date Added</th>
      <th>Delete</th>
    </tr>
  </table>
  <div class=""><button id="see_more_local_boss_list" class="btn btn-large btn-block" type="button">See More</button>
</div>
  <div class="modal-footer"></div>
  <div class="modal-footer"></div>
</div>
</div>

<div id="add_boss_limit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Boss Money Limit</h3>
  </div>
  <br>
  <form id="limit_money" name="limit_money" class="form-horizontal" action="add_user.php" method="post">
    <div class="control-group">
      <label class="control-label" for="inputUser">User</label>
      <div class="controls">
       <select id="boss" name="boss" onChange="getLocations()">
         <option value="" label="Select Boss"></option>  
         <?php
         unset($user->user_data_temp);
         $user->search_boss(); 
         foreach($user->user_data_temp as $bossLimit)
         {
           extract($bossLimit);
           $user->get_boss_by_id($user_id);					
           ?>	
           <option value="<?php echo $user_id ?>"><?php echo $user->user_data_temp1; ?></option>    
           <?php }?>  
         </select>
       </div>
     </div>
     <div class="control-group">
      <label class="control-label" for="inputUser">Money Limit</label>
      <div class="controls">
       <input id="money_limit" name="money_limit" type="text">
     </div>
   </div>
   <div class="control-group">
    <div class="controls">
      <button type="submit" value="add_limit" id="add_limit" name="add_limit" class="btn">Submit</button>
    </div>
  </div>
</form>
<div class="container-fluid"><button id="toggle_form_limit" class="btn btn-large btn-block" type="button">Hide</button>
</div>
</br>
<div class="notice container-fluid"></div>
<div class="container-fluid pre-scrollable">
  <table id="local_boss_money_limit" class="table table-condensed table-striped table-hover">
    <tr>
      <th>Name</th>
      <th>Money Limit</th>
      <th>Date Added</th>
      <th>Delete</th>
    </tr>
  </table>
  <div class=""><button id="see_more_local_boss_money_limit" class="btn btn-large btn-block" type="button">See More</button>
</div>
  <div class="modal-footer"></div>
  <div class="modal-footer"></div>
</div>
</div>
    <?php include_once "messenger.php" ?> 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.js"></script>
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
var local_staff_limit_start = 0
var local_raiser_limit_start = 0
var local_boss_limit_start = 0
var local_boss_money_limit_start = 0
var top_central_limit_start = 0
var scm_acc_assigned_location_start = 0
$(document).ready(function() {
  get_local_staff_list()
  get_local_raiser_list()
  get_local_boss_list()
  get_local_boss_money_limit()
  get_top_central_list()  
  get_scm_acc_assigned_location()  
});
function get_scm_acc_assigned_location(){
  var singleVal = 10
  buttonLoadingOn("see_more_acc_scm_location_list","Loading..")
  var posting = $.post("form_handler.php",{get_assigned_location: singleVal, limit: scm_acc_assigned_location_start})
  scm_acc_assigned_location_start += 10
  posting.done(function(output){
    //console.log(output)
    //alert(output)
    $("#acc_scm_location_list").append(output)
    buttonLoadingOff("see_more_acc_scm_location_list","See More")
  }) 
}
$('#see_more_acc_scm_location_list').click(get_scm_acc_assigned_location)
function get_top_central_list(){
  var singleVal = 10
  buttonLoadingOn("see_more_add_top_central_list","Loading..")
  var posting = $.post("form_handler.php",{get_top_central_list: singleVal, limit: top_central_limit_start})
  top_central_limit_start += 10
  posting.done(function(output){
    //console.log(output)
    //alert(output)
    $("#add_top_central_list").append(output)
    buttonLoadingOff("see_more_add_top_central_list","See More")
  })    
}
$('#see_more_add_top_central_list').click(get_top_central_list)
function get_local_boss_money_limit(){
  var singleVal = 10
  buttonLoadingOn("see_more_local_boss_money_limit","Loading..")
  var posting = $.post("form_handler.php",{get_local_boss_money_limit: singleVal, local_money_limit: local_boss_money_limit_start})
  local_boss_money_limit_start += 10
  posting.done(function(output){
    ///console.log(output)
    $("#local_boss_money_limit").append(output)
    buttonLoadingOff("see_more_local_boss_money_limit","See More")
  })    
}
$('#see_more_local_boss_money_limit').click(get_local_boss_money_limit)
function get_local_boss_list(){
  //alert('hi')
  var singleVal = 10
  buttonLoadingOn("see_more_local_boss_list","Loading..")
  var posting = $.post("form_handler.php",{get_local_boss_list: singleVal, local_boss_start: local_boss_limit_start})
  local_boss_limit_start += 10
  posting.done(function(output){
    $("#local_boss_list").append(output)
    buttonLoadingOff("see_more_local_boss_list","See More")
  })    
}
$('#see_more_local_boss_list').click(get_local_boss_list)
function get_local_raiser_list(){
  var singleVal = 10
  buttonLoadingOn("see_more_local_raiser_list","Loading..")
  var posting = $.post("form_handler.php",{get_local_raiser_list: singleVal, raise_start: local_raiser_limit_start})
  local_raiser_limit_start += 10
  posting.done(function(output){
    $("#local_raiser_list").append(output)
    buttonLoadingOff("see_more_local_raiser_list","See More")
  })    
}
$('#see_more_local_raiser_list').click(get_local_raiser_list)
function get_local_staff_list(){
  var singleVal = 10
  buttonLoadingOn("see_more_local_staff_list","Loading..")
  var posting = $.post("form_handler.php",{get_local_staff_list: singleVal, start: local_staff_limit_start})
  local_staff_limit_start += 10
  posting.done(function(output){
    $("#local_staff_list").append(output)
    buttonLoadingOff("see_more_local_staff_list","See More")
  })    
}
$('#see_more_local_staff_list').click(get_local_staff_list)

function delete_acc_scm_assigned_location(c,id){
  buttonLoadingOn("delete_acc_scm_assigned_location"+c,"Deleting..")
  var posting = $.post("form_handler.php",{delete_acc_scm_location: id})
  posting.done(function(output){
    //alert(output)
    $("#assign_acc_scm_to_office_factory_site .notice").hide().html(output).show("slow").delay(2000).hide("slow")
    if(!output.match("not"))
      temp = $("#delete_acc_scm_assigned_location"+c).parent().parent().hide("slow")
    else
      buttonLoadingOff("delete_acc_scm_assigned_location"+c,"Delete")
  })
}
function delete_central_boss_func(c,id,pst){
  //alert(c+' '+id+' '+pst)
  buttonLoadingOn("delete_central_boss"+c,"Deleting..")
  var posting = $.post("form_handler.php",{delete_central_boss: id,boss_post: pst})
  posting.done(function(output){
    //alert(output)
    $("#add_top_central .notice").hide().html(output).show("slow").delay(2000).hide("slow")
    if(!output.match("not"))
      temp = $("#delete_central_boss"+c).parent().parent().hide("slow")
    else
      buttonLoadingOff("delete_central_boss"+c,"Delete")
  })
}
function delete_local_boss_money_limit(c,id){
  //alert(id+" "+c)
  buttonLoadingOn("delete_local_boss_money_limit"+c,"Deleting..")
  var posting = $.post("form_handler.php",{money_limit: id})
  posting.done(function(output){
    $("#add_boss_limit .notice").hide().html(output).show("slow").delay(2000).hide("slow")
    if(!output.match("not"))
      temp = $("#delete_local_boss_money_limit"+c).parent().parent().hide("slow")
    else
      buttonLoadingOff("delete_local_boss_money_limit"+c,"Delete")
  })
}
function delete_current_user(id){
  //alert(id)
  buttonLoadingOn("delete_current_user"+id,"Deleting..")
  var posting = $.post("form_handler.php",{delete_current_user: id})
  posting.done(function(output){
    $("#add_user .notice").hide().html(output).show("slow").delay(2000).hide("slow")
    if(!output.match("not"))
      temp = $("#delete_current_user"+id).parent().parent().hide("slow")
    else
      buttonLoadingOff("delete_current_user"+id,"Delete")
  })
}
function delete_local_raiser(c,id,location){
  //alert(id+" "+location)
  buttonLoadingOn("delete_local_raiser"+c,"Deleting..")
  var posting = $.post("form_handler.php",{delete_local_raiser: id,loc: location})
  posting.done(function(output){
    console.log(output)
    $("#add_location_to_user .notice").hide().html(output).show("slow").delay(2000).hide("slow")
    if(!output.match("delete failed"))
      temp = $("#delete_local_raiser"+c).parent().parent().hide("slow")
    else
      buttonLoadingOff("delete_local_raiser"+c,"Delete")
  })
}
function delete_local_boss(c,id,location){
  //alert(id+" "+location)
  buttonLoadingOn("delete_local_boss"+c,"Deleting..")
  var posting = $.post("form_handler.php",{delete_local_boss: id,boss_loc: location})
  posting.done(function(output){
    console.log(output)
    $("#add_top_local .notice").hide().html(output).show("slow").delay(2000).hide("slow")
    if(!output.match("delete failed"))
      temp = $("#delete_local_boss"+c).parent().parent().hide("slow")
    else
      buttonLoadingOff("delete_local_boss"+c,"Delete")
  })
}
function buttonLoadingOn(id,message){
  loading = '<i class="icon-spinner icon-spin icon-large"></i> '+message
  $('#'+id).html(loading)
  return
}
function buttonLoadingOff(id,message){
  $('#'+id).html(message)
  return
}
function getLocations(){
  singleVal = $("#user1").val()
  $('#loc option').text('Loading...')
  posting = $.post("get_locations.php",{val:singleVal})
  posting.done(function(output){
   $('#loc').html(output).show();
 })  
}
function getMaster(){
  $('#ms option').text('Loading...')
  posting = $.post("get_master.php");	  
  posting.done(function(output){
   $('#ms').html(output).show();
 })
}
function getProject(){
  singleVal = $("#ms").val();
  $('#pr option').text('Loading...')
  posting = $.post("get_master.php",{val:singleVal,from:'ms'});	 
  posting.done(function(output){
   $('#pr').html(output).show();
 }) 
}
function getSite(){
  singleVal = $("#pr").val();
  $('#site option').text('Loading...')
  posting = $.post("get_master.php",{val:singleVal,from:'pr'});
  posting.done(function(output){
   $('#site').html(output).show();
 })	  
}
function getMicroSite(){
  singleVal = $("#site").val();
  $('#msite option').text('Loading...')
  posting = $.post("get_master.php",{val:singleVal,from:'site'});	
  posting.done(function(output){
   $('#msite').html(output).show();
 })  
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
      $('#project option').text('Loading...')
      posting = $.post('get_projects.php', {master: add_user_form.master.value})

      posting.done(function(output){
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
    $("form").submit(function(e){
      if (!confirm("Do you confirm submit?"))
      {
       e.preventDefault();
       return;
     } 
   }); 
    $('#name_acc_scm').change(get_users_assigned_location)
    function get_users_assigned_location(e){
      if(this.value!=''){			
       $('#location_output').text('Loading...')
       posting = $.post('get_users_assigned_location.php', {id: this.value},
         function(o){
          $('#location_output_ext').show('slow')
          $('#location_output').html(o).show('slow');
        })
     }
   }
   </script>



 </body></html>