<?php 
	include_once "user.php";
	
	session_start();
	
	if(isset($_SESSION["designation"]))
	{
		switch($_SESSION["designation"])
		{
			case "site manager":
			case "site supervisor":
			  break;
		 	default:
			  header("Location: signin.php?status=notauthorized"); 
			  break;		 		
		}	 	  
	}
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
              <li class="active">Requisition<span class="divider">/</span></li>
          </ul>
          <div class="page-header">
            <h2>All Requisition</h2>
          </div>
          <div id="yooo">
         <ul class="nav nav-pills">
           <li class="active">
             <a href="add_new_req.php">Make New Requisition</a>
           </li>
         </ul>
          <?php 
	
				
				unset($req_list->req_data);
				
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
				
				$sort_type = "Pending";			
			?>
             </div>             
			 <table class="table table-striped">
               <tr>
                 <th>ID</th>
                 <th>Title</th>								
                 <th>Description</th>
                 <th>Type of Requisition</th>
                 <th>Recurring/Nonrecurring</th>
                 <th>Costing</th>
                 <th>Status</th>
                 <th>Submission Date</th>
                 <th>Deadline</th>
               </tr>
             <?php 
			 	$req_list->user_req_list($_SESSION["idusers"],$start,$perpage);
			 	foreach($req_list->req_data as $list)
				{
					extract($list);			   
			 ?>
               <tr>								
                 <td><?php echo $id ?>
                 </td>							
                 <td>
				 <?php 
				 	echo"<a href='req_details.php?id=".$id."'>$title</a>";   
					if($req_list->new_comment_available($id,$_SESSION["idusers"])>0)
						echo " ".$req_list->addition_data." new <i class='icon-comment'></i> ";
				 ?>
                 </td>
                 <td><?php echo $description ?>
                 </td>
                 <td><?php echo $type_of_req ?>
                 </td>
                 <td><?php echo $recurring_nonrecurring ?>
                 </td>
                 <td><?php echo $costing ?>
                 </td>
                 <td>
				 <?php 
				 	switch($status)
					{
						case "Solved":						
							echo "<button class='btn btn-mini btn-success disabled' type='button'>Solved</button>";
							break;
						case "Pending":	
						case "New":						
							echo "<button class='btn btn-mini btn-primary disabled' type='button'>Pending</button>";
							break;
						case "Modify":						
							echo "<button class='btn btn-mini btn-danger disabled' type='button'>Need Modification</button>";
							break;
					} 
				 ?>
                 </td>
                 <td><?php echo $submission_date ?>
                 </td>
                 <td><?php echo $deadline ?>
                 </td>                 
               </tr>
               <?php 
				}				
			   ?>               
             </table>
             <table class="table table-striped" width="100%" cellpadding="100px">
               <tr>
                 <td class="pagination">
                   <ul>
					<?php
                    
                    if(isset($page))
                    
                    {
                        unset($req_list->req_data);
                    
                        $req_list->total_user_req_list($_SESSION['idusers']);
                    
                    //echo $req_list->req_data;
                    
                        if($req_list->req_data)					
                        {					
                            $total = $req_list->req_data;					
                        }
                    
                        $totalPages = ceil($total / $perpage);
                    
                        if($page <=1 )					
                        {					
                            echo "<li><a id='page_links' href='#' style='font-weight:bold;'>Prev</a></li>";					
                        }                
                        else					
                        {					
                            $j = $page - 1;
                                                
                            echo "<li><a id='page_a_link' href='list_of_req_user.php?page=$j'><< Prev</a></li>";					
                        }
                    
                        for($i=1; $i <= $totalPages; $i++)					
                        {					
                            if($i<>$page)					
                            {					
                                echo "<li><a href='list_of_req_user.php?page=$i' id='page_a_link'>$i</a></li>";					
                            }					
                            else					
                            {					
                                echo "<li><a id='page_links' style='font-weight:bold;'>$i</a></li>";					
                            }
                        
                        }
                    
                        if($page == $totalPages )					
                        {					
                            echo "<li><a id='page_links' style='font-weight:bold;'>Next</a></li>";					
                        }					
                        else					
                        {					
                            $j = $page + 1;
                                            
                            echo "<li><a href='list_of_req_user.php?page=$j' id='page_a_link'>Next >></a></li>";					
                        }					
                    }  
				}
                    ?>
                  </ul>
                <td>
               </tr>
             </table>
             
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
	
    </script>

</body></html>