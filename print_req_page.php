<?php	
	include_once "user.php";
	session_start();
	$print = new User();
	//echo $_REQUEST['id'];
	$print->user_req_single($_SESSION["user_id"],$_REQUEST["id"]);
?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Print Requisition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <style>/*.tooltiptrolol { position: relative; cursor: help; text-decoration: none;} .tooltiptrolol span { display: none; position: absolute; top: 15px; left: 10px; padding: 5px; z-index: 100; background: #000; color: #fff; border-radius: 5px; box-shadow: 2px 2px rgba(0, 0, 0, 0.1); text-align: center; line-width: 1000px; text-indent: 0; font: normal bold 10px/13px Tahoma,sans-serif; white-space: nowrap;} span:hover.tooltiptrolol { font-size: 99%; } .tooltiptrolol:hover span { display: block; } .md img { display:inline; } .rageface { visibility:visible; }*/</style>
  
  </head>
  <body class="">
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <img src="logo.png" height="47" width="167">
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div>
             <table class="table table-striped">
             <?php 
			 	$print->user_req_single($_SESSION["user_id"],$_REQUEST["id"]);
			 	foreach($print->req_data as $list)
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
                 <td><?php echo $print->convert_id_location($location_id) ?>
                 </td>
               </tr>   
               <tr>
                 <th>Requisition by</th>
                 <td><?php echo $print->idusers_to_id($user_id) ?> 
                 </td>
               </tr>  
               <tr>
                 <th>Estimated Costing</th>
                 <td>
				 <?php 
						echo $costing ;
				 ?>
               </tr> 
               <tr>
                 <th>Purchase Order</th>
                 <td>
               <?php 
					
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
					$po_form_temp = $print->form_unserialized($po_info);
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
                   
               <!--<tr>
                 <th></th>
                 <td>
                     <input type="button" class="btn btn-large" value="Print This Requisition" onClick="window.print()">
                 </td> 
               </tr>-->          
             </table>
             <?php 
				}	
				unset($print->req_data); 		
			   ?>                 
             </div>
   

    <!-- Le javascript
    ================================================== -->
    <style type="text/css">
   /* * { font-family: Verdana; font-size: 98%; }
    label { width: 10em; float: left; }
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    p { clear: both; }
    .submit { margin-left: 12em; }
    em { font-weight: bold; padding-right: 1em; vertical-align: top; }*/
    </style>
    <script type="text/javascript">
      $(document).ready(function () {
		   window.print()
		});
    </script>

</body></html>