<?php 
	include_once "user.php";
	
	session_start();
	
	$super_admin = new User();	
	
	/*if(!isset($_SESSION["designation"]))
		$_SESSION["designation"] = 'site manager';
	if(!isset($_SESSION["location_central"]))
		$_SESSION["location_central"] = 'central';
	if(!isset($_SESSION["autorizatin_level"]))
		$_SESSION["autorizatin_level"] = 'Approve';
	//if(!isset($_SESSION["user_id"]))
		$_SESSION["user_id"] = '29';*/
	
	/*if(!isset($_SESSION["loggedin"]))
	{ 	  
	  header("Location: signin.php?status=notloggedin");
	}
	
	if(isset($_SESSION["designation"]))
	{
		switch($_SESSION["designation"])
		{
			case "super admin":
			case "Manager":
			case "GM":
			case "Additional Manager":
			case "Deputy Manager":
			case "site manager":
			  break;
		 	default:
			  header("Location: signin.php?status=notauthorized"); 
			  break;		 		
		}	 	  
	}*/
		
	
		
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
			  	$super_admin->get_pages($_SESSION["designation"]);
				$a=(explode("/",$_SERVER["PHP_SELF"]));
				foreach($super_admin->user_data as $pages)
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
          <div class="page-header">
            <h3><?php /*echo $_SESSION["name"]*/ ?></h3>
          </div>
          <div id="yooo">
          <?php 
		  	if($super_admin->check_new_req()){			  
		  ?>
          <div class="well well-large">
             <h4>All Requisition</h4>
             <table class="table table-striped">
             <ul>     
             <?php 
			 	unset($super_admin->req_data);
				//$super_admin->super_admin_req_list_by_type(0,10,"New",$_SESSION["idusers"]);
				$super_admin->get_request_list(0,10,24);
				  if($super_admin->good_to_go_flag>0){
					 foreach($super_admin->req_data as $list)
					 {
						extract($list);
			  ?>           
               <tr> 
              <td>        
               <li>
                 <?php 
				 	echo"<a href='req_redirect_central.php?id=".$id."&read_status=read'>".$id.' '.$title."</a>";
				?>  
               </li>
               </td>
               <td>
                 <?php 
				 	switch($status){
						case 'New':
							 echo ' <button class="btn btn-primary btn-mini disabled">New</button>';
							 break;
						case 'Closed':
							 echo ' <button class="btn btn-warning btn-mini disabled">Closed</button>';
							 break;
						case 'Solved':
							 echo ' <button class="btn btn-success btn-mini disabled">Solved</button>';
							 break;
						case 'Delivered':
							 echo ' <button class="btn btn-warning btn-mini disabled">Delivered</button>';
							 break;
						case 'Approved':
							 echo ' <button class="btn btn-warning btn-mini disabled">Approved</button>';
							 break;
						
					}
				?>  
                </td>
               </tr>  
               <?php 
					 }
				 }
					else
					 	echo "<span class='label label-warning'>No requisition is found under this type.</span>";
			}
		  ?>             
             </ul> <?php 
	
				
				unset($super_admin->req_data);
				
				if($super_admin->check_any_req_in_table(24,"user_id"))
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
              <tr> 
               <td  align="center" class="pagination">
                   <ul>
					<?php
                    
                    if(isset($page))
                    
                    {
                        unset($super_admin->req_data);
                    
                        $super_admin->total_user_req_list(24);
                    
                    //echo $req_list->req_data;
                    
                        if($super_admin->req_data)					
                        {					
                            $total = $super_admin->req_data;					
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
          </div>      
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
		
	  $('#datepicker').datepicker();
	
    </script>

</body></html>