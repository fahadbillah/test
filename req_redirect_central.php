<?php 
include_once "user.php";
session_start();
if($_SESSION["designation"]!=='Hub Admin')
{ 	  
  echo 'You are not authorized to use this page.';
  echo "<INPUT class='btn' TYPE='button' VALUE='Back to previous page' onClick='history.go(-1);return true;'>";
  exit;
}
/*	
if(!isset($_SESSION["designation"]))
$_SESSION["designation"] = 'site manager';
if(!isset($_SESSION["location"]))
$_SESSION["location"] = 41201;
if(!isset($_SESSION["autorizatin_level"]))
$_SESSION["autorizatin_level"] = 'Approve';
if(!isset($_SESSION["user_id"]))
$_SESSION["user_id"] = '6';*/
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


$req_list = new User();



?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>New Requisition</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
              <li><a href="add_user.php">Add User</a></li> 
              <li><a href="add_material.php">Add Material</a></li> 
              <li class="active"><a href="add_location.php">Add Location</a></li> 
            </ul>
          </li>   
          <li><a href="#message" data-toggle="modal">Message</a></li>   
          <li class="active"><a href="super_admin_central_hub.php">Requisition Hub</a></li>               
          <li><a id="log_out" href="log_out.php">Log Out</a></li>
        </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container">
  <!--Body content-->

  <ul class="breadcrumb">
    <li><a href="super_admin_central_hub.php">Central Hub</a> <span class="divider">/</span></li>
    <li class="active">Requisition ID <?php echo $req_list->id_to_req_id($_REQUEST["id"]) ?> </li>
  </ul>

  <div class="page-header">
    <h2>Requisition <?php echo $req_list->id_to_req_id($_REQUEST["id"]) ?></h2>
  </div>
  <div id="notice">
    <?php 
//print_r($_SESSION);
    if(isset($_REQUEST["pm_submit"]))
      $req_list->add_pm($_REQUEST["subject"],$_REQUEST["message"],$_REQUEST["sender"],$_REQUEST["receiver"]);
    if(isset($_REQUEST["stat_cng"]))
$req_list->change_req_status(98,$_REQUEST["id"]);	//echo $_REQUEST["select_admin"];
?>
</div>
<div id="yooo">
  <?php 
  unset($req_list->user_data);
  if(isset($_REQUEST['decision1'])){
    $req_list->add_admin_central($_REQUEST["user_id"],$_REQUEST["req_id"]);
    $req_list->change_req_status_main($_REQUEST["id"],$_REQUEST['decision1']);
/*	$req_list->change_req_status(6,$_REQUEST["id"],$_REQUEST['decision1']);
$req_list->assign_local_account_scm($_REQUEST["id"],$_SESSION['location']);	*/				
}
if(isset($_REQUEST['decision2']))
  echo $_REQUEST['decision2'];
if(isset($_REQUEST['decision3']))
  echo $_REQUEST['decision3'];
?>
</div>           
<div>
  <table class="table table-striped">
    <?php 
    unset($req_list->req_data); 
    $req_list->user_req_single(6,$_REQUEST["id"],"admin");
    foreach($req_list->req_data as $list)
    {
      extract($list);			   
      ?>
      <tr>
        <th>Requisition ID</th>
        <td><?php echo $req_list->id_to_req_id($id) ?>
        </td>
      </tr>  
      <tr>
        <th>Title</th>	
        <td><?php echo $title ?>
        </td>		
      </tr>  
      <tr>					
        <th>Description</th>
        <td><?php echo $description ?>
        </td>
      </tr>  
      <tr>
        <th>Type of Requisition</th>
        <td><?php echo $type_of_req ?>
        </td>
      </tr>   
      <tr>
        <th>Requisition by</th>
        <td><i class="icon-user icon-white"></i> <?php echo "<a href='user_details.php?id=$user_id'>".$req_list->idusers_to_id($user_id)."</a>" ?> <a href="#myModal" role="button" class="btn btn-small" data-toggle="modal">Send PM <i class="icon-envelope icon-white"></i></a>
        </td>
      </tr>  
      <?php if($material_cart!='') {?>
      <tr>
        <th>Material List</th>
        <td><?php  echo $req_list->convert_to_table($material_cart)?></td>
      </tr>  
      <?php  }?> 
      <tr>
        <th>Costing</th>
        <td><?php echo $costing ?>
        </td>
      </tr> <?php if($_SESSION['designation'] == 'Manager'){ ?>
      <tr>
        <th>Admins</th>
        <td>
          <?php 
          unset($req_list->user_data);
          $req_list->get_list_of_admins($_REQUEST['id']);
          foreach($req_list->user_data as $admin){
            extract($admin);
            echo $req_list->idusers_to_id($admin_id)." | ";
          }
          ?>
        </td>
      </tr> 
      <tr>
        <th>Add Admin</th>
        <td><a href="#add_admin" role="button" class="btn btn-small" data-toggle="modal"><i class="icon-user icon-white"></i> Add Admin</a>
        </td>
      </tr> <?php } ?>
      <tr>
        <th>Status</th>
        <td>
          <?php
          switch($status)
          {
            case 'New':
            case 'View':
            case 'Redirect':
            case 'Approved':
            case 'Partially Delivered':
            case 'Delivered':
            case 'Received':
            case 'Partially Received':
            case 'Document Received':
            case 'Document Delivered':
            case 'Close':
            echo ' <button class="btn btn-primary btn-mini disabled">'.$status.'</button>';
            break;
          }
          ?>
        </td>
      </tr>  
      <tr>
        <th>Submission Date</th>
        <td><?php echo $submission_date ?>
        </td>
      </tr>  
      <tr>
        <th>Deadline</th>
        <td><?php echo $deadline ?>
        </td> 
      </tr>
      <tr>
        <th>Decision</th>
        <?php 
        if($status==='New'||$status==='View'){					 
          ?>
          <td>
            <form id="des" name="des" action="req_redirect_central.php?id=<?php echo $id ?>" method="post" onSubmit="reassure()">
              <select name="user_id">
                <option value="">Select Admin</option>
                <?php 
                $allCentralBoss = $req_list->get_central_hub_admins();
                foreach($allCentralBoss as $udata){	
                  extract($udata)	 
                  ?>
                  <option value="<?php echo $id?>"><?php echo $name?></option>

                  <?php 
                }
                ?>
              </select>
              <input name="req_id" type="hidden" value="<?php echo $_REQUEST["id"]?>">
              <button class="btn btn-small btn" type="submit" id="decision" name="decision1" value="Redirect">Redirect</button>
            </form>
          </td>                 
          <?php 
        }
        else if($status==='Delivered'){
          ?>   
          <td>
            <?php 
            echo "<button class='btn btn-small btn-success disabled' type='button'>Delivered</button>";
            ?>
          </td>         
          <?php 
        }
        else if($status==='Approved'){
          ?>   
          <td>
            <?php 
            echo "<button class='btn btn-small btn-success disabled' type='button'>Approved</button>";
            ?>
          </td>         
          <?php 
        }
        else if($status==='Clear From Accounts'){
          ?>   
          <td>
            <?php 
            echo "<button class='btn btn-small btn-success disabled' type='button'>Clear From Accounts</button>";
            ?>
          </td>         
          <?php 
        }
        else if($status==='Solved'){
          ?>   
          <td>
            <?php 
            echo "<button class='btn btn-small btn-success disabled' type='button'>Solved</button>";
            ?>
          </td>         
          <?php 
        }
        else if($status==='Redirect'){
          ?>   
          <td>
            <?php 
            echo "<button class='btn btn-small btn-success disabled' type='button'>Redirected</button>";
            ?>
          </td>         
          <?php 
        }
        ?>  
      </tr>             
    </table>
    <?php 
  }	
  unset($req_list->req_data); 		
  ?>                 
</div>
<!-- <div>
<legend>Comments</legend>
<table>

</table>
</div>             
<div class="accordion" id="accordion2"> -->
  <?php 
/*unset($req_list->user_data);
$req_list->get_comments($_REQUEST["id"]);

$sn = 1;	

foreach($req_list->comment_data as $cmnt)
{
extract($cmnt);	
$req_list->get_user_details($comment_by,"name");	
if($sn == $req_list->additional_data){
?>
<div class="accordion-group">
<div class="accordion-heading">
<a id="comment_heading" class="accordion-toggle" onClick="<?php if($_SESSION["idusers"] != $comment_by){?>make_read(<?php echo $id ?>)<?php }?>" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo "collapse".$sn ?>">
<?php 
echo substr($comment,0,50).".... Comment # ".$sn." by ".$req_list->user_data[0]["name"]." time ".$date; 
if($comment_by!= $_SESSION["idusers"])
{
if($flag=="unread")
echo "<strong> New*</strong>";
else
echo " Old";
}
?>
<i class="icon-comment"></i>
</a>
</div>
<div id="<?php echo "collapse".$sn ?>" class="accordion-body collapse in">
<div id="comment" class="accordion-inner">
<?php echo $comment ?>
</div>
</div>
</div> 
<?php
}
else{
?>
<div class="accordion-group">
<div class="accordion-heading">
<a id="comment_heading" class="accordion-toggle" onClick="<?php if($_SESSION["idusers"] != $comment_by){?>make_read(<?php echo $id ?>)<?php }?>" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo "collapse".$sn ?>">
<?php 
echo substr($comment,0,50).".... Comment # ".$sn." by ".$req_list->user_data[0]["name"]." time ".$date; 
if($comment_by!= $_SESSION["idusers"])
{
if($flag=="unread")
echo "<strong> New*</strong>";
else
echo " Old";
}
?>
<i class="icon-comment"> </i>
</a>
</div>
<div id="<?php echo "collapse".$sn ?>" class="accordion-body collapse">
<div id="comment" class="accordion-inner">
<?php echo $comment ?>
</div>
</div>
</div> 
<?php
}
$sn++;}
unset($req_list->user_data); 
unset($req_list->comment_data);*/							  
?>             
<!-- </div>
<div>
<form name="comments" action="req_validation_local.php?id=<?php echo $_REQUEST["id"]?>" method="post">
<fieldset>
<textarea name="comment" rows="3"></textarea>
<span class="help-block">Write your comment here.</span>
<label>
<button type="submit" name="submit" class="btn">Submit</button>
</label>
</fieldset>
</form>
</div> -->

</div> 
<!-- Modal -->

<?php include_once "messenger.php" ?> 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <br>
  <br>
  <form id="pm" name="pm" class="form-horizontal" action="req_redirect_central.php?id=<?php echo $_REQUEST["id"] ?>" method="post">
    <div class="control-group">
      <label class="control-label" for="subject">Subject</label>
      <div class="controls">
        <input type="text" name="subject" id="subject" placeholder="Write subject">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="message">Message</label>
      <div class="controls">
        <textarea name="message" id="message" rows="3"></textarea>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="hidden" id="sender" name="sender" value="<?php echo $user_id ?>">
        <input type="hidden" id="receiver" name="receiver" value="<?php echo $_SESSION["idusers"] ?>">
        <button type="submit" id="pm_submit" name="pm_submit" class="btn">Send Message</button>
      </div>
    </div>
  </form>
</div>
<div id="changeStatus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <br>
  <br>
  <form id="status" name="status" class="form-horizontal" method="post" action="req_validation_local.php?id=<?php echo $_REQUEST["id"] ?>">
    <div class="control-group">
      <label class="control-label" for="status_list">Change Status</label>
      <div class="controls">
        <select id="status_list" name="status_list">
          <option>Select Status</option>
          <option>Need Modification</option>
          <option>Local Purchase Approved</option>
          <option>Reffered to Higher Authority</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="details">Write Details</label>
      <div class="controls">
        <input type="text" id="details" name="details">
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="hidden" id="req_id" name="req_id" value="<?php echo $_REQUEST["id"] ?>">
        <button type="submit" id="stat_cng" name="stat_cng" class="btn">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>


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
  function reassure(){
    alert('Do you really want to approve? ')
  }

  function make_read($id){
    $.post('comment_handler.php', {handler_type: "makeRead", id: $id},
      function(output){
        $('#yooo').html(output).show();
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