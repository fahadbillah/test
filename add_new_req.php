<?php 
	include_once "user.php";
	
	session_start();	
	$new_req = new User();
	if(!isset($_SESSION["loggedin"])||!isset($_SESSION["user_id"]))
	{ 	  
		header("Location: signin.php?status=notloggedin");
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
  <style>
  .tooltiptrolol { position: relative; cursor: help; text-decoration: none;} .tooltiptrolol span { display: none; position: absolute; top: 15px; left: 10px; padding: 5px; z-index: 100; background: #000; color: #fff; border-radius: 5px; box-shadow: 2px 2px rgba(0, 0, 0, 0.1); text-align: center; line-width: 1000px; text-indent: 0; font: normal bold 10px/13px Tahoma,sans-serif; white-space: nowrap;} span:hover.tooltiptrolol { font-size: 99%; } .tooltiptrolol:hover span { display: block; } .md img { display:inline; } .rageface { visibility:visible; }
  td{
	  position:relative;	  
  }
  </style>
  
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
              <li class="active">Make New Requisition</li>
          </ul>
          <div class="page-header">
            <h2>New Requisition</h2>
          </div>
          <div id="yooo">
          <?php 
	
				//echo $_SESSION["location"];
				
				if(isset($_REQUEST["submit"]))
				{
					//var_dump($_REQUEST);		
					if($_SESSION['rand']==$_REQUEST["prevent"]){
						if(!in_array("",$_REQUEST))
						{
							extract($_REQUEST);
							if(filter_var($costing, FILTER_VALIDATE_INT))
							{
								//echo $type_of_req." ".$recurring_recurring." ".$title." ".$description." ".$costing." ".$datepicker;
								
								$id = $new_req->new_req($_SESSION["user_id"],$title,$description,$type_of_req,$costing,$datepicker,$location);
								//echo "id ".$id." has been added to requisition list";
								
								//echo $name.$email.$password.$contact.$master.$project.$site_factory.$designation;
							}
							else
								echo "<span class='label label-warning'>Input number in costing field.</span> ";							
						}
						else 
							echo "<span class='label label-warning'>You left a field blank.</span> ";					
					}
					else 
						echo "<span class='label label-warning'>Form resubmission prevented.</span> ";									
				}
				$_SESSION['rand'] = rand(1, 10000000);
				//var_dump($new_req->getExtractedArray($new_req->get_all_user_location($_SESSION["user_id"]),'location_id'));
				//echo $_SESSION["location"];
			?>
             </div>             
			  <form id="new_req_form" name="new_req_form" class="form-horizontal" action="add_new_req.php" method="post">             
              <div class="control-group">
                <label class="control-label" for="location">Location</label>
                <div class="controls">
                  <select id="location" name="location">
                    <option value="">Select Location</option>
                        <?php
							$loc = explode("|", $_SESSION["location"]);
							for($i=0;$i<count($loc);$i++)
							{
						?>	
						  <option value="<?php echo $loc[$i];?>"><?php echo $new_req->location_id_to_name($loc[$i]) ?></option>    
						<?php 
							}
						
						?>   
                  </select>  
                  <span class="help-inline">Select Location of Requisition</span>                  
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label" for="type_of_req">Type of Requisition</label>
                <div class="controls">
                  <select id="type_of_req" name="type_of_req"> <!-- onChange="get_other_field()"-->
                    <option value="">Select Requisition Type</option>
                        <?php
							$new_req->get_all_type_of_req(); 
							foreach($new_req->user_data_temp1 as $req)
							{
								extract($req);
						?>	
						  <option><?php echo $name ?></option>    
						<?php }?>   
                  </select>               
                </div>
              </div>
              <div id="field_for_other">   
              </div>
              <div class="control-group">
                <label class="control-label" for="title">Title</label>
                <div class="controls">
                  <input name="title" id="title" type="text" placeholder="Text input">
                  <span class="help-inline">Subject of Requisition</span>
                </div>
              </div> 
              <div id="material" class="control-group" style="display:none">
                <label class="control-label" for="title">Material Input</label>
                <div class="controls">
                 <!-- <form id="mat_form" name="mat_form" class="form-actions">-->
                    <table class="table table-condensed table-hover">
                      <tr>
                        <th>Catagory</th>
                        <td>
                          <select id="mat_cat" name="mat_cat">
                        	<option value="">Select Catagory</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <th>Sub-Catagory</th>
                        <td>
                          <select id="mat_sub_cat" name="mat_sub_cat">
                        	<option value="">Select Sub Catagory</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <th>Item</th>
                        <td>
                          <select id="mat_item" name="mat_item">
                        	<option value="">Select Item</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <th>Quantity</th>
                        <td><input type="text" id="mat_quantity" name="mat_quantity"> <span><strong>Unit</strong></span> <strong><span id="unit">--</span> </strong>
                            <input type="button" data-loading-text="loading..." id="mat_add" value="Add" class="btn btn-small btn-primary"></td>
                      </tr> 
                      <tr id='mat_list'>
                        <th>Material List</th>
                        <td>
                        <table class=" table table-condensed" style="margin-bottom: 0px;">
                        </table>
                        <table id="mat_list_table" class="table table-condensed">
                        <tr id="mat_head">
                        <th>No.</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Item Total</th>
                        </tr>
                        <tr id="costingRow">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Costing</th>
                        <th id="costing"></th>
                        </tr>
                        </table>
                        </td>
                      </tr> 
                      <tr>
                        <!--<th>Costing</th>
                        <td>
                          <div class="input-append">
                            <input readonly name="costing" id="costing" type="text">
                            <span class="add-on">Taka</span>
                          </div>
                            <span class="help-inline">More than 5 lakh require site superviser's varification</span> 
                        </td>-->
                      </tr>
                      <tr style="display:none">
                        <th>Approved Quantity</th>
                        <td><input type="text" id="mat_app_quantity" name="mat_app_quantity"></td>
                      </tr> 
                      <tr style="display:none">
                        <th>Received Quantity</th>
                        <td><input type="text" id="mat_rec_quantity" name="mat_rec_quantity"></td>
                      </tr> 
                      <tr>
                        <th></th>
                        <td>
                          <input class="btn btn-primary" type="button" id="mat_submit" value="Submit">
                        </td>
                      </tr>          
                    </table>
<!--                  </form>-->    
                </div> 
              </div> 
              <div class="control-group">
                <label class="control-label" for="description">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" rows="3"></textarea>
                </div>
              </div>    
              <div id="costing_block" class="control-group">
                <label class="control-label" for="costing">Costing</label>      
                <div class="controls">          
                  <div class="input-append">
                    <input name="costing" id="costing" type="text" placeholder="Number input">
                    <span class="add-on">Taka</span>                   
                  </div>
                    <span class="help-inline">More than 5 lakh require site superviser's varification</span> 
                </div>
              </div>           
              <!--<div class="control-group">
                <div class="controls"> 
                  <div id="demo" class="collapse in"> … </div>
                </div>
              </div>-->
              <div class="control-group">
                <label class="control-label" for="datepicker">Deadline</label>
                <div class="controls">
                  <input id="datepicker" name="datepicker" type="text" placeholder="Date input">
                  <!--<div class="input-append date" id="datepicker" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                    <input size="16" type="text" value="12-02-2012" readonly>
                    <span class="add-on"><i class="icon-th"></i></span>
                  </div>-->
                </div>
              </div> 
              <div class="control-group">
                <div class="controls">
                  <input id="prevent" name="prevent" value="<?php echo $_SESSION['rand']?>" style="display:none"/>
                  <input name="submit" id="submit" value="Submit Requisition" type="submit" class="btn">
                </div>
              </div>
			</form>                      
        </div>
      </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <!--   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>    -->
    <!--<script src="js/jquery.validate.js"></script>
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
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>-->
	<script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="starter_files/bootstrap-button.js"></script>
    <script src="js/all_functions.js"></script>
    <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css" />
    <style type="text/css">
    * { font-family: Verdana; font-size: 98%; }
    label { width: 10em; float: left; }
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    p { clear: both; }
    .submit { margin-left: 12em; }
    em { font-weight: bold; padding-right: 1em; vertical-align: top; }
    </style>
	<script>
	  var materialList = ''
	  var materialCatList = ''
	  
	  function init(){
		  /*$.post("get_material_list.php",{val:'all_list'},function(output){
			  $('#mat_cat').html(output).show();
			  //alert(materialList);
			});*/
		  $.post("get_material_list.php",{val:'all_cat_list'},function(output){
			  $('#mat_cat').html(output).show();
			  //getMatCat(output)
		 	  //alert(materialCatList);
			});				  
	  }	  
	  $('#mat_sub_cat').change(function(){
	      id = $('#'+this.id).val()
		  if(id!=''){
			  posting = $.post("get_material_list.php",{val:'item',id:id})
			  posting.done(function(output){
			  temp = output.split('|')				  
			  $('#mat_item').html(temp[0]).show()	  
			  $('#unit').text(temp[1]).show()
			});
		  }
	  })
	  $('#mat_cat').change(function(){
		  id = $('#'+this.id).val()
		  $.post("get_material_list.php",{val:'all_sub_cat_list',id:id},function(output){
			  $('#mat_sub_cat').html(output).show();
			 // getMatCat(output)
		 	  //alert(materialCatList);
			});		  
	  })
		
		function getMatCat(mcl){
			html = ''
			html+='<option value="">Select Catagory</option>'
			for(i=0;i<mcl.length;i++)
				console.log(mcl[i]['type'])
		}
		function getMat(mcl){
			html = ''
			html+='<option value="">Select Material</option>'
			for(i=0;i<mcl.length;i++)
				console.log(mcl[i]['type'])
		}
		
	  jQuery(function($){
		$("#datepicker").datepicker({ dateFormat: "dd-mm-yy" });
	  });
	
	  function get_other_field()
      {
		  other = document.getElementById("type_of_req")
		  $('#field_for_other').hide()
		  if(other.value == 'Other')
		  	$('#field_for_other').html('<div class="control-group"><label class="control-label" for="title"></label><div class="controls"><input name="other_type" type="text" placeholder="Text input"><span class="help-inline">Write Type Name</span></div></div>').show();
      }
	  
	$('#type_of_req').change(function(){
		type = $('#'+this.id).val()
		if(type.toLowerCase()=='material'){
			$('#costing_block').hide('slow')			
			$('#material').show('slow')		
			//$('#mat_costing').html(html).show('slow')
			
		}
		else{
			$('#material').hide('slow')
		}
	})
	
	$("#new_req_form").submit(function(e){
		if($("#location").val()==''||$("#type_of_req").val()==''||$("#title").val()==''||$("#description").val()=='' || $("#costing").val()==''||$("#datepicker").val()==''){
			alert('empty field!')
			e.preventDefault();
			return;
		}
		if (!confirm("Do you confirm submit?"))
		{
			e.preventDefault();
			return;
		} 
	});
	
	$('#mat_add').click(function(){
 		$('#mat_add').button('loading')
		id = $('#mat_item').val()
		qt = $('#mat_quantity').val()
		head = $('#mat_head')//.html()
		$('#mat_head').remove()
		//alert(head)
		 var mainArr = new Array()
		  /* Put the results in a div */
		posting = $.post( "get_material_list.php", { val:'singleItem',id:id,qt:qt})
			 
		posting.done(function( data ) {
			//temp = data.split("|")] => Brick [category] => Building Material [subcategory] => Concrete Mixture [measurment_unit] => Piece [m_description] => 3X8 [cost_per_unit] 
			/*console.log(data)
			arr = data.split(',')
			for(i=0;i<arr.length;i++){
				sarr = arr[i].split(":")
				mainArr[sarr[0]] = sarr[1]
			}
			alert(mainArr)  
			iid = mainArr.find('id')  
			name = mainArr.find('name') 
			measurment_unit = mainArr.find('measurment_unit') 
			cost_per_unit = mainArr.find('cost_per_unit') 
			quantity = qt
			html = ''
			html+= '<tr>'
			html+= '<td>'+iid+'</td>'
			html+= '<td>'+name+'</td>'
			html+= '<td>'+quantity+' '+data[0]['measurment_unit']+'</td>'
			html+= '<td>'+data[0]['cost_per_unit']+'</td>'
			total = quantity*data[0]['cost_per_unit']
			html+= '<td>'+total+'</td>'
			html+= '</tr>'      */
			temp = data.split('|')
			$( "#mat_list_table" ).prepend(temp[0])
			$( "#mat_list_table" ).prepend(head)
			$('#mat_add').button('reset')
			totalCost = $('#costing').text()
			if(totalCost=='')
				totalCost = parseInt(temp[1])
			else
				totalCost = parseInt(totalCost) + parseInt(temp[1])
			$('#costing').text(totalCost)
		});
	})
	  init() 
    </script>

</body></html>