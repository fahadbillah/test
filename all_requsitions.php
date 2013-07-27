<?php 
	include_once "user.php";
	include_once "relevant_search.php";
	session_start();
	
	if(!isset($_SESSION["loggedin"])||!isset($_SESSION["user_id"]))
	{ 	  
		header("Location: signin.php?status=notloggedin");
	}
	$user_home = new User();
	$user_id = $_SESSION["user_id"];
	if(!$user_home->user_home_page_authorization($user_id)){
		echo 'You are not authorized to use this page.';
		echo "<INPUT class='btn' TYPE='button' VALUE='Back to previous page' onClick='history.go(-1);return true;'>";
		exit;
	}
	$roles = $user_home->get_all_user_role($user_id);
	try {
		foreach($roles as $r){
			extract($r);
			//echo $location_id.' '.$post.'<br>';
			$stages = $user_home->get_user_req_stage_urgent($post);
		}
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	$type = $_REQUEST['type'];
	//var_dump($stages);
	?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Home</title>
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
              <li> <a class="active" href="user_home.php">Home</a> </li>
              <li> <a href="add_new_req.php">Requisition</a> </li>
              <li> <a id="log_out" href="log_out.php">Log Out</a>  </li>
            </ul>
            <ul class="nav pull-right">
            <form id="search_req" name="search_req" method="post" class="navbar-form pull-right">
            	<input type="text" class="span2 search-query" placeholder="Search Requisition">
                <button type="submit" class="btn">Search</button>
            </form>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>      
        <div class="container">
          <!--Body content-->
          <div class="page-header">
            <h2>Welcome Mr. <?php echo $_SESSION["name"] ?></h2>
          </div>
          <div id="yooo">
          <?php //echo $user_id ?>
          </div>
          <?php 
		  		$perpage = 10;

				if(isset($_REQUEST["page"]))				
				{				
				  $page = intval($_REQUEST["page"]);				
				}				
				else			
				{			
				  $page = 1;				
				}
								
				$calc = $perpage * $page;
				
				$start = $calc - $perpage;
				
			(isset($_REQUEST['page'])) ? $stpage = $_REQUEST['page']-1 : $stpage = 0; 
			
				 	
		  ?>
          <?php 		  	
					$tempStart = $start;		
			 	unset($user_home->req_data);
				
				switch($type){
					case 'byNew':
						$requisition = $user_home->get_request_list_by_urgent($tempStart,$perpage,$user_id,$stages);
						$typeHeader = 'Urgent';
						break;
					case 'byActive':
						$requisition = $user_home->get_active_request_list($tempStart,$perpage,$user_id);
						$typeHeader = 'Active';
						break;
					case 'bySolved':
						$requisition = $user_home->get_solved_request_list($tempStart,$perpage,$user_id);
						$typeHeader = 'Solved';
						break;						
				}
				if($requisition!==NULL){
		  ?>
             <div class="span10 well well-large">
             <h4><?php echo $typeHeader ?> Requisitions</h4><br>
             <table class="table table-striped">
             <ul>     
             <?php 
					 foreach($requisition as $list)
					 {
						extract($list);
			  ?>           
               <tr> 
              <td> <i class="icon-eye-open"></i> 
                 <?php 
				 	echo"<a href='req_validation_local.php?id=".$id."&read_status=read'>".$user_home->id_to_req_id($id)."</a>";
				?>  
              <td>  
                 <?php 
				 	echo"<a href='req_validation_local.php?id=".$id."&read_status=read'>".$title."</a>";
				?> 
               </td>
               <td>
                 <?php 
				 	echo ' <button class="btn btn-primary btn-mini disabled">'.$status.'</button>';
				?>  
                </td>
               </tr>  
               <?php 
					 }
		  	   ?>             
             </ul>
            <?php 
				unset($user_home->req_data);
				if(count($requisition)>0)
				{					
			?>
            
             </table>
              <div class="pagination" style="text-align:center">
                   <ul>
					<?php
                    
                    if(isset($page))                    
                    {                    
                    	$total = $user_home->total_user_req_list($user_id);                    
                        $totalPages = ceil($total / $perpage);
                        if($page <=1 )					
                        {					
                            echo "<li><a id='page_links' href='' style='font-weight:bold;'>Prev</a></li>";					
                        }                
                        else					
                        {					
                            $j = $page - 1;
                                                
                            echo "<li><a id='page_a_link' href='user_home.php?page=$j&type=byNew'><< Prev</a></li>";					
                        }
                    
                        for($i=1; $i <= $totalPages; $i++)					
                        {					
                            if($i<>$page)					
                            {					
                                echo "<li><a href='user_home.php?page=$i&type=byNew' id='page_a_link'>$i</a></li>";					
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
                                            
                            echo "<li><a href='user_home.php?page=$j&type=byNew' id='page_a_link'>Next >></a></li>";					
                        }					
                    }
				}
                    ?>
                  </ul>
                
              </div>
            </div>
            <?php			
				 }
				else{
					echo "<div class='span10 well well-large'><h4>Urgent Requisition</h4><br>";
					echo "<span class='label label-success'>No Urgent Requisition Available!</span></div>";
				}
				?>
          <!--</div>  -->                          
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
		
	  $('#datepicker').datepicker();
	
    </script>

</body></html>