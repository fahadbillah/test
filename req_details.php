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
			case "super admin";
			case "site manager";
			case "site supervisor";
			  break;
		 	default:
			  header("Location: signin.php?status=notauthorized"); 
			  break;		 		
		}	 	  
	}	
	
	/*if(!isset($_SESSION["spacial_case"]))
		$_SESSION["spacial_case"] = "testing admin selection";*/
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
			  	$req_list->get_pages($_SESSION["designation"]);
				$a=(explode("/",$_SERVER["PHP_SELF"]));
				//echo $a[2];
				foreach($req_list->user_data as $pages)
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
			  ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
        <div class="container">
          <!--Body content-->
         
          <ul class="breadcrumb">
            <li><a href="list_of_req_user.php">Requisition</a> <span class="divider">/</span></li>
            <li class="active">Requisition ID <?php echo $_REQUEST["id"] ?> </li>
          </ul>
          
          <div class="page-header">
            <h2>Requisition <?php echo $_REQUEST["id"] ?></h2>
          </div>
          <div id="yooo">
          <?php if($_SESSION["designation"]=="site manager" || $_SESSION["designation"]=="site supervisor") {?>
         <ul class="nav nav-pills">
           <li class="active">
             <a href="add_new_req.php">Make New Requisition</a>
           </li>
         </ul>
         <?php }?>
          <?php 
	
				
				unset($req_list->req_data);
				
				if(isset($_REQUEST["read_status"]))
					$req_list->change_req_activities($_REQUEST["id"],'Pending');
						
				
				if(isset($_REQUEST["submit"])&& !empty($_REQUEST["comment"]))
				{
					$req_list->add_comment_to_req($_SESSION["idusers"],$_REQUEST["id"],$_REQUEST["comment"]);
					
				}
				
				if($_SESSION["designation"]=="site manager" || $_SESSION["designation"]=="site supervisor")
				{
				if($req_list->check_any_req_in_table($_SESSION['idusers'],"user_id"))
				{
				
					//print_r($req_list->req_data);
					
					$perpage = 5;
	
					if(isset($_GET["page"]))				
					{				
					  $page = intval($_GET["page"]);				
					}				
					else			
					{			
					  $page = 1;				
					}
									
					$calc = $perpage * $page;
					
					$start = $calc - $perpage;
					
					
					
					$sn =1;
				
			?>
             </div>           
             <div>
             <table class="table table-striped">
             <?php 
				unset($req_list->req_data); 
			 	$req_list->user_req_single($_SESSION["idusers"],$_REQUEST["id"],"user_id");
			 	foreach($req_list->req_data as $list)
				{
					extract($list);			   
			 ?>
               <tr>
                 <th>Requisition ID</th>
                 <td><?php echo $id ?>
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
                 <th>Recurring/Nonrecurring</th>
                 <td><?php echo $recurring_nonrecurring ?>
                 </td>
               </tr>   
               <tr>
                 <th>Requisition by</th>
                 <td><i class="icon-user icon-white"></i> <?php echo "<a href='user_details.php?id=$user_id'>".$req_list->idusers_to_id($user_id)."</a>" ?>
                 </td>
               </tr>  
               <tr>
                 <th>Costing</th>
                 <td><?php echo $costing ?>
                 </td>
               </tr>  
               <tr>
                 <th>Status</th>
                 <td>
				 <?php
				 	switch($status)
					{
						case "Solved":						
							echo "<button class='btn btn-small btn-success disabled' type='button'>Solved</button>";
							break;
						case "Pending":						
							echo "<button class='btn btn-small btn-primary disabled' type='button'>Pending</button>";
							break;
						case "Modify":						
							echo "<button class='btn btn-small btn-danger disabled' type='button'>Need Modification</button>";
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
               <?php 
					}	
				}			
			   ?>               
             </table>
             <?php 
				}	
				unset($req_list->req_data); 		
			   ?>  
               
             <?php
               
               if($_SESSION["designation"]=="super admin")
				{
				if($req_list->check_any_req_in_table($_SESSION['idusers'],"admin"))
				{
				
					//print_r($req_list->req_data);
					
					$perpage = 5;
	
					if(isset($_GET["page"]))				
					{				
					  $page = intval($_GET["page"]);				
					}				
					else			
					{			
					  $page = 1;				
					}
									
					$calc = $perpage * $page;
					
					$start = $calc - $perpage;
					
					
					
					$sn =1;
				
			?>
             </div>           
             <div>
             <table class="table table-striped">
             <?php 
				unset($req_list->req_data); 
			 	$req_list->user_req_single($_SESSION["idusers"],$_REQUEST["id"],"admin");
			 	foreach($req_list->req_data as $list)
				{
					extract($list);			   
			 ?>
               <tr>
                 <th>Requisition ID</th>
                 <td><?php echo $id ?>
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
                 <th>Recurring/Nonrecurring</th>
                 <td><?php echo $recurring_nonrecurring ?>
                 </td>
               </tr>    
               <tr>
                 <th>Requisition by</th>
                 <td><i class="icon-user icon-white"></i> <?php echo "<a href='user_details.php?id=$user_id'>".$req_list->idusers_to_id($user_id)."</a>" ?>
                 </td>
               </tr> 
               <tr>
                 <th>Costing</th>
                 <td><?php echo $costing ?>
                 </td>
               </tr>  
               <tr>
                 <th>Status</th>
                 <td>
				 <?php
				 switch($status)
					{
						case "Solved":						
							echo "<button class='btn btn-small btn-success disabled' type='button'>Solved</button>";
							break;
						case "Pending":						
							echo "<button class='btn btn-small btn-primary disabled' type='button'>Pending</button>";
							break;
						case "Modify":						
							echo "<button class='btn btn-small btn-danger disabled' type='button'>Need Modification</button>";
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
                 <th>Deadline</th>
                 <td><?php echo $deadline ?>
                 </td> 
               </tr>           
               <?php 
					}	
				}			
			   ?>               
             </table>
             <?php 
				}			
			   ?> 
             </div>
             <div>
                <legend>Comments</legend>
             	<table>
                
                </table>
             </div>             
             <div class="accordion" id="accordion2">
             <?php 
			   $req_list->get_comments($_REQUEST["id"]);
			   
			   $sn = 1;	
			   
			   if($req_list->additional_data!=0)			   
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
				unset($req_list->comment_data);							  
			  ?>             
            </div>
             <div>
                 <form name="comments" action="req_details.php?id=<?php echo $_REQUEST["id"]?>" method="post">
                  <fieldset>
                    <textarea name="comment" rows="3"></textarea>
                    <span class="help-block">Write your comment here.</span>
                    <label>
                      <button type="submit" name="submit" class="btn">Submit</button>
                    </label>
                  </fieldset>
                </form>
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
	  
	 /* window.onload = function()
		{
		
		  //Get a reference to the link on the page
		  // with an id of "mylink"
		  var a = document.getElementById("handler_type");
		
		  //Set code to run when the link is clicked
		  // by assigning a function to "onclick"
		  a.onclick = function(makeRead)
		  {
			  alert ("yooo it worked");
			 // Somecode her
			 // But when I try to use the hike_id it displays as [object MouseEvent] 
		  }
		}*/
	  
	  function make_read($id){
		  $.post('comment_handler.php', {handler_type: "makeRead", id: $id},
              function(output){
                  $('#yooo').html(output).show();
              });
		  
	  }
	
    </script>

</body></html>