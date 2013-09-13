<?php 
	include_once "user.php";
	$visual_test = new User();
	if(isset($_REQUEST['submit'])){
		$visual_test->input_stage($_REQUEST['name'],$_REQUEST['instructions']);
	}	
	if(isset($_REQUEST['delete'])){	
		$visual_test->delete_stage($_REQUEST['delete']);
	}
	if(isset($_REQUEST['edit_submit'])){
		$visual_test->edit_stage($_REQUEST['id'],$_REQUEST['edit_name'],$_REQUEST['edit_instructions']);
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://twitter.github.com/bootstrap/examples/starter-template.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Requisitions</title>
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
              <li>
              	<a href="visual_test.php">Visula Test</a>
              </li>
            </ul>
            <ul class="nav pull-right">
            <form id="search_req" name="search_req" method="post" class="navbar-form pull-right">
            	<input id="search_box" type="text" class="span2 search-query" placeholder="Search Requisition">
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
              <li class="active">Requisition<span class="divider">/</span></li>
          </ul>
          <div class="page-header">
            <h2>Visual Test</h2>
          </div>             
          <div class="span9">           
          <div class="well well-large">
            <table class="table table-striped">
  			  <tr>
                <th>Name of Stage</th>
                <th>Instruction</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>	
              <form action="visual_test.php" method="get">
			<?php 
				//$visual_test->get_stage();
				$visual_test->get_stage();
				foreach($visual_test->user_data as $stages){
					extract($stages);					
					  echo '<tr>';
						echo '<td>'.$name.'</td>';
						echo '<td>'.$instruction.'</td>';
						echo '<td><button id="edit" name="edit" value="'.$id.'" class="btn btn-small btn-primary">Edit</button></td>';
						echo '<td><button id="delete" name="delete" value="'.$id.'" class="btn btn-small btn-danger">Delete</button></td>';
					  echo '</tr>';
				}
			?>	
              </form>
			</table>
          </div>          
            <form class="form-horizontal" id="stage_form" name="stage_form" method="post" action="visual_test.php">
              <div class="control-group">
                <label class="control-label" for="name">Name of Requisition Stage</label>
                <div class="controls">
                  <input type="text" id="name" name="name" placeholder="Name of the stage">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="instructions">Instruction</label>
                <div class="controls">
                  <textarea id="instructions" name="instructions" rows="3" placeholder="Write instruction here"></textarea>
<!--                  <input type="text" id="inputEmail" placeholder="">
-->                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" id="submit" name="submit" class="btn">Submit</button>
                </div>	
              </div>
            </form>
            
            <?php				 
				if(isset($_REQUEST['edit'])){	
					echo "<h3>Edit</h3>";
					$temp = $visual_test->get_single_stage($_REQUEST['edit']);	
					//var_dump($temp);		
			?>
            <form class="form-horizontal" id="stage_form" name="stage_form" method="post" action="visual_test.php">
              <div class="control-group">
                <label class="control-label" for="edit_name">Name of Requisition Stage</label>
                <div class="controls">
                  <input value="<?php echo $temp[0]['name']; ?>" type="text" id="edit_name" name="edit_name" placeholder="Name of the stage">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="edit_instructions">Instruction</label>
                <div class="controls">
                  <textarea id="edit_instructions" name="edit_instructions" rows="3" placeholder="Write instruction here"><?php echo $temp[0]['instruction']; ?></textarea>
<!--                  <input type="text" id="inputEmail" placeholder="">
-->                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <input style="display:none" id="id" name="id" value="<?php echo $temp[0]['id']; ?>">
                  <button type="submit" id="edit_submit" name="edit_submit" class="btn">Submit</button>
                </div>	
              </div>
            </form>
            <?php }?>
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