<?php 
	include_once "user.php";
	session_start();	
	if(!isset($_SESSION["loggedin"])||!isset($_SESSION["user_id"]))
	{ 	  
		header("Location: signin.php?status=notloggedin");
	}	
	$req_list = new User();
	if(!$req_list->user_home_page_authorization($_SESSION["user_id"])){
		echo 'You are not authorized to use this page.';
		echo "<INPUT class='btn' TYPE='button' VALUE='Back to previous page' onClick='history.go(-1);return true;'>";
		exit;
	}
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
              <li> <a class="active" href="user_home.php">Home</a> </li>
              <li> <a href="add_new_req.php">Requisition</a> </li>
              <li> <a id="log_out" href="log_out.php">Log Out</a>  </li>
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
          <div id="notice">
          <?php 
		  	//print_r($_SESSION);
			if(isset($_REQUEST["pm_submit"]))
				$req_list->add_pm($_REQUEST["subject"],$_REQUEST["message"],$_REQUEST["sender"],$_REQUEST["receiver"]);
		  	if(isset($_REQUEST["stat_cng"]))
				$req_list->change_req_status($_SESSION["user_id"],$_REQUEST["id"]);	//echo $_REQUEST["select_admin"];
		  ?>
          </div>          
          <div id="notice">
          
          </div>
          <div id="yooo">
		  	<?php 
			//echo $_SESSION['location'];
				unset($req_list->user_data);
				$req_list->date_time();
				$date_time = $req_list->date;
				if(isset($_REQUEST['poSubmit']) && $_REQUEST['poCost']!=''){
			   		//$req_list->insert_actual_cost($_REQUEST["poCost"],$_REQUEST["id"]);	
					$req_list->insert_po($_REQUEST,$_REQUEST["id"]);	
				}
				if(isset($_REQUEST['decision1'])){
					$decision = $_REQUEST['decision1'];
					if($_SESSION['rand'] == $_REQUEST["prevent"]){
						//echo $_REQUEST['decision1'];
						if($_REQUEST['decision1']=='Reject'){
							$req_list->change_req_activities($_SESSION["user_id"],$_REQUEST["id"],$decision);
							$req_list->change_req_status($_SESSION["user_id"],$_REQUEST["id"],$decision);
							$req_list->change_req_status_main($_REQUEST["id"],$decision);
						}
						else{
							$destination = NULL;
							$isBoss = $req_list->checkBoss($_REQUEST["id"],$_SESSION["user_id"]);
							$isLocal = $req_list->checkLocal($_SESSION['location'],$_REQUEST["id"]);
							if($isBoss){
								if($isLocal){
									$destination = $req_list->check_req_final_destination($_REQUEST["id"]);		
									if($destination == 'local'){
										$req_list->assign_local_account_scm($_REQUEST["id"]);			
									}
									else if($destination == 'central'){	
										$req_list->send_to_hub_update($_REQUEST["id"],'central');
										$decision = 'View';	
									}
								}
								else
									$req_list->assign_local_account_scm($_REQUEST["id"]);	
							}
							$req_list->change_req_activities($_SESSION["user_id"],$_REQUEST["id"],$decision);
							$req_list->change_req_status($_SESSION["user_id"],$_REQUEST["id"],$decision);
							$req_list->change_req_status_main($_REQUEST["id"],$decision);
							if($decision=='Delivered'||$decision=='Partially Delivered')
								$req_list->update_delivery_date($_REQUEST["id"]);
						}
					}
					else 
						echo "<span class='label label-warning'>Form resubmission prevented.</span> ";				
				}
				if(isset($_REQUEST['decision2']))
			   		echo $_REQUEST['decision2'];
				if(isset($_REQUEST['decision3']))
			   		echo $_REQUEST['decision3'];					
				
				$_SESSION['rand'] = rand(1, 10000000);
			?>
          </div>           
             <div>
             <table class="table table-striped">
             <?php 
				//unset($req_list->req_data); 
				$only_view = $req_list->getRelation($_SESSION["user_id"],$_REQUEST["id"]);
				$pst = $req_list->getPost($_SESSION["user_id"],$_REQUEST["id"]);
			 	$req_list->user_req_single($_SESSION["user_id"],$_REQUEST["id"]);
				//var_dump($req_list->req_data);
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
                 <th>Raised From</th>
                 <td><?php echo $location_id ?>
                 </td>
               </tr>   
               <tr>
                 <th>Requisition by</th>
                 <td><i class="icon-user icon-white"></i> <?php echo "<a href='user_details.php?id=$user_id'>".$req_list->idusers_to_id($user_id)."</a>" ?> <a href="#myModal" role="button" class="btn btn-small" data-toggle="modal">Send PM <i class="icon-envelope icon-white"></i></a>
                 </td>
               </tr>  
               <tr>
                 <th>Estimated Costing</th>
                 <td>
				 <?php 
				 	if($pst == 'Boss' && $only_view != 'View' && $status=='New'){
				 ?>
                 
                 <form class="form-inline" id="local_boss_cost_edit" name="local_boss_cost_edit">
                 	<input id="cost_edit_box_for_local_boss" name="cost_edit_box_for_local_boss" type="text" value="<?php echo $costing?>" disabled>
                    <input id="req_id_to_edit_cost" name="req_id_to_edit_cost" type="text" value="<?php echo $_REQUEST['id']?>" style="display:none" >
                    <?php //if($status=='New'){?>
                    <input class="btn btn-primary" id="cost_edit" name="cost_edit" value="Edit" type="button">
                    <input style="display:none" class="btn btn-primary" id="cost_edit_finish" name="cost_edit_finish" value="Submit" type="button">
                    <?php //}?>
                 </form>
				 <?php 
					}
					else
						echo $costing ;
				 ?>
               </tr> 
               <tr>
                 <th>Purchase Order</th>
                 <td>
               <?php 	
				if($pst=='SCM' && $req_list->poOff($status)){		   
			   ?>
                 <input class="checkbox" type="checkbox" id="pos" name="pos"/> <span id="chk">P.O. Available</span>
                 <form style="display:none" class="form-horizontal"id="poForm" name="poForm" method="post" action="req_validation_local.php?id=<?php echo $_REQUEST['id'] ?>">             
                  <div class="control-group">
                    <label class="control-label" for="poNo">P.O. No.</label>
                    <div class="controls">
                 	  <input type="text" id="poNo" name="poNo"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="poCost">Purchase Amount</label>
                    <div class="controls">
                 	  <input type="text" id="poAmount" name="poAmount"/>
                      <select id="amount" name="amount">
                        <option>Select Unit</option>
                        <?php 
						  $unit = $req_list->getUnitType();
						  var_dump($unit);
						  if($unit){
						    foreach($unit as $unt){
							  extract($unt);
                     		  echo '<option>'.$name.'</option>';
						    }
						  }
						?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="poCost">Purchase Cost</label>
                    <div class="controls">
                 	  <input type="text" id="poCost" name="poCost"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="poDetails">Details</label>
                    <div class="controls">
                      <textarea name="poDetails" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <input id="date" name="date" value="<?php echo $date_time ?>" style="display:none"/>
                      <input type="submit" class="btn" name="poSubmit" id="poSubmit" />
                    </div>
                  </div>
                 </form> 
               <?php 
				} 
				else{
					//echo 'Purchase Order not submitted.';
				}
					
				if($po_info == ''){
					echo '</br> Purchase Order not submitted.';
				}
				else{
				?>	
                <table class="table-condensed">
                  <tr>
                    <th>PO NO.</th>
                    <th>Purchase Amount</th>
                    <th>Purchase Cost</th>
                    <th>Details</th>
                    <th>Date</th>
                  </tr>
				<?php
					$po_form_temp = $req_list->form_unserialized($po_info);
				// echo $po_info;
					foreach($po_form_temp as $pft){
						extract($pft);
				?>	
                  <tr>
                    <td><?php echo $poNo?> </td>
                    <td><?php echo $poAmount.' '.$amount?> </td>
                    <td><?php echo $poCost?> </td>
                    <td><?php echo $poDetails?> </td>
                    <td><?php echo $date?> </td>
                  </tr>
				<?php
					}
				?>
                </table>
				<?php
				 }
				?>
                 </td>
               </tr>            
                 <th>Status</th>
                 <td>
				 <?php
				 if($only_view != 'View'){
				 	switch($status)
					{
						case "Received":
						case "Partially Received":	
						case "Approved":		
						case "Redirect":					
						case "Delivered":				
						case "Partially Delivered":		
						case "Document Delivered":		
						case "Document Received":		
						case "Closed":						
							echo "<button class='btn btn-small btn-success disabled' type='button'>$status</button>";
							break;
						case "Pending":	
						case "New":						
							echo "<button class='btn btn-small btn-primary disabled' type='button'>Pending</button>";
							break;					
						case "Reject":						
							echo "<button class='btn btn-small btn-danger disabled' type='button'>Rejected</button>";
							break;
						case "View":						
							echo "<button class='btn btn-small btn-primary disabled' type='button'>Only View</button>";
							break;
					}
				 }
				 else
				 	echo "<button class='btn btn-small btn-primary disabled' type='button'>Only View</button>";
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
			     if($delivery_date!=''){
					 $allDates = explode('|',$delivery_date);
			   ?>
               <tr>
                 <th>Delivery Date and Time</th>
                 <td>
				 <?php 
				   foreach($allDates as $ad)
					echo $ad.'</br>' ;
				 ?>
                 </td> 
               </tr>
               <?php
				 }
			   ?>
               <tr>               
                 <th>Decision</th>
                 
                 <td>
                 <form id="des" name="des" action="req_validation_local.php?id=<?php echo $_REQUEST["id"] ?>" method="post">
                 <?php 	
				 	$this_user_status = $req_list->getReqStatus($_REQUEST["id"],$_SESSION["user_id"]);					
					$button = $req_list->getButton($status);
					//echo $button;
					if($pst){
					/*if(($status==='Delivered' && $pst==='Raiser')||($status==='Approved' && $pst==='Accountant')||($status==='Clear From Accounts' && $pst==='SCM')||($status==='Solved' && $pst==='Accountant')||(($status==='New'||$status==='Redirect') && $pst==='Boss' && $only_view != 'View'))*/
					 /*if(($status==='Delivered' && $pst==='Raiser')||($status==='Partially Delivered' && $pst==='Raiser')||($status==='Approved' && $pst==='SCM')||($status==='Partially Received' && $pst==='SCM')||($status==='Received' && $pst==='Accountant')||(($status==='New'||$status==='Redirect') && $pst==='Boss' && $only_view != 'View'))*/
					 if($req_list->status_comparison($this_user_status,$status,$pst))
						echo $button;						 
					 else{
						if($only_view)
							echo "<button class='btn btn-small btn-success disabled' type='button'>Only View</button>";
						else
							echo "<button class='btn btn-small btn-success disabled' type='button'>$status</button>";
					 }
					}
					else
						echo "<button class='btn btn-small btn-success disabled' type='button'>$status</button>";
				 ?>
                     <!--<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Approved">Approved</button>
                     <button class="btn btn-small btn-warning" type="submit" id="decision" name="decision2" value="Review">Review</button>
                     <button class="btn btn-small btn-danger" type="submit" id="decision" name="decision3" value="Dismiss">Dismiss</button>-->
                     <input id="prevent" name="prevent" value="<?php echo $_SESSION['rand']?>" style="display:none"/>
                 </form>
                 </td>    
                 <td>
				 <?php 
				 
				 ?>
                 </td>  
               </tr>             
             </table>
             <?php 
				}	
				unset($req_list->req_data); 		
			   ?>                 
             </div>
             <div>
                <legend>Comments</legend>
             	<table>
                
                </table>
             </div>             
             <div class="accordion" id="accordion2">
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
            </div>
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
            </div>
             
        </div> 
        <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <br>
        <br>
        <form id="pm" name="pm" class="form-horizontal" action="req_validation.php?id=<?php echo $_REQUEST["id"] ?>" method="post">
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
    <script src="js/all_functions.js"></script>
    <style type="text/css">
    * { font-family: Verdana; font-size: 100%; }
    label { width: 10em; float: left; }
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    p { clear: both; }
    .submit { margin-left: 12em; }
    em { font-weight: bold; padding-right: 1em; vertical-align: top; }
    </style>
	<script>	 
	$("#cost_edit").click(changeButtonForCostEdit)
	$("#cost_edit_finish").click(changeButtonForCostEditFinish)
	$("#des").submit(function(e){
		if (!confirm("Do you confirm submit?"))
		{
			e.preventDefault();
			return;
		} 
	}); 
	$("#edit").click(function(e){
		$("#editedCost").removeAttr("disabled")
	}); 
	  /*function reassure(){
		if (!confirm("Do you confirm submit?"))
		{
			preventDefault();
			return;
		} 
	  }*/
	  
	  function make_read($id){
		  $.post('comment_handler.php', {handler_type: "makeRead", id: $id},
              function(output){
                  $('#yooo').html(output).show();
              });
		  
	  }
	  $('#pos').click(function(){
		  if($('#pos').is(':checked')){
		  	$('#poForm').show('slow')
			$('#chk').html('P.O. Not Available')
		  }
		  else{
		  	$('#poForm').hide('slow')
			$('#chk').html('P.O. Available')
		  }
	  })
    </script>
    
    

</body></html>