<?php 
  include_once "user.php";
  session_start();
  
  if(!isset($_SESSION["loggedin"])||!isset($_SESSION["user_id"]))
  {     
    header("Location: signin.php?status=notloggedin");
  }
  $messenger = new User();
  if(!$messenger->user_home_page_authorization($_SESSION["user_id"])){
    echo 'You are not authorized to use this page.';
    echo "<INPUT class='btn' TYPE='button' VALUE='Back to previous page' onClick='history.go(-1);return true;'>";
    exit;
  }
  $roles = $messenger->get_all_user_role($_SESSION["user_id"]);
  try {
    foreach($roles as $r){
      extract($r);
      //echo $location_id.' '.$post.'<br>';
      $stages = $messenger->get_user_req_stage_urgent($post);
    }
  } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
  
  $contactList = $messenger->message_scope("admin");
  $all_inbox_messages = $messenger->get_inbox_pm($_SESSION['user_id'],20,0);
  $all_sent_messages = $messenger->get_sent_pm($_SESSION['user_id'],20,0);
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
    <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css" />
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
              <li> <a href="user_home.php">Home</a> </li>
              <li> <a href="add_new_req.php">Requisition</a> </li>
              <li class="active"> <a href="messenger_for_staff.php">Message</a> </li>
              <li> <a id="log_out" href="log_out.php">Log Out</a>  </li>
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
    </br>
      <div><button id="new_message" class="btn"><i class="icon-plus-sign"> </i><i class="icon-envelope"> </i>New Message</button></div>
    </br>
    <div class="mail_notice container-fluid" style="text-align:center"></div>
      <div class="tabbable" id="messenger_tab"> <!-- Only required for left/right tabs -->
      <ul id="message_tab_ul" class="nav nav-tabs">
        <li class="active"><a href="#inbox" data-toggle="tab">Inbox</a></li>
        <li><a href="#sent" data-toggle="tab">Sent</a></li>
        <!-- <li>
          <a href="#tab2" data-toggle="tab">User1<button type="button" class="close tab_close" data-dismiss="nav nav-tabs" aria-hidden="true"> ×</button></a>
        </li>
        <li>
          <a href="#tab3" data-toggle="tab">User2<button type="button" class="close tab_close" data-dismiss="nav nav-tabs" aria-hidden="true"> ×</button></a>
        </li> -->
      </ul>
      <div id="message_tab_content" class="tab-content container-fluid pre-scrollable">
        <div class="tab-pane active" id="inbox">
          <?php
            echo '<div class="accordion" id="accordioninbox">';
            foreach ($all_inbox_messages as $inbox) {
              extract($inbox);
              $datetime = strtotime($date);
              $mysqldate = date("m/d/y g:i A", $datetime);
              echo '<div class="accordion-group"><div class="accordion-heading">';
              echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordioninbox" href="#collapse_inbox_'.$id.'">';
              echo $messenger->get_user_details($sender,'name');  
              echo '<span class="pull-right">'.$mysqldate.'</span>';
              echo '</a>';
              echo '</div><div id="collapse_inbox_'.$id.'" class="accordion-body collapse"><div class="accordion-inner">';
              echo $message;
              echo '</div></div></div>';
            }
            echo "</div>";
          ?>
          <!-- <div class="pane" style="display: block;"><div class="slider" style="height: 37px; top: 71.74416243654822px;"></div></div>
         --></div>
        <div class="tab-pane" id="sent">
          <?php
            echo '<div class="accordion" id="accordionsent">';
            foreach ($all_sent_messages as $sent) {
              extract($sent);
              //var_dump($date);
              $datetime = strtotime($date);
              $mysqldate = date("m/d/y g:i A", $datetime);
              echo '<div class="accordion-group"><div class="accordion-heading">';
              echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionsent" href="#collapse_sent_'.$id.'">';
              echo $messenger->get_user_details($receiver,'name');     
              echo '<span class="pull-right">'.$mysqldate.'</span>';
              echo '</a>';
              echo '</div><div id="collapse_sent_'.$id.'" class="accordion-body collapse"><div class="accordion-inner">';
              echo $message;
              echo '</div></div></div>';
            }
            echo "</div>";
          ?>
        </div>
        <!-- <div class="tab-pane" id="tab2">
          <p>Howdy, I'm in Section 2.</p>
        </div>
        <div class="tab-pane" id="tab3">
          <p>Howdy, I'm in Section 2.</p>
        </div> -->
      </div>
    </div>
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
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
    <script src="js/tinymce/tinymce.min.js"></script>
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
    var singleVal
    $("#sent").ready(function(){      
      posting = $.post("form_handler.php",{message_scope:'admin'}); 
      posting.done(function(output){
        singleVal = output
       //$('#sent').html(output)
     }) 
    })
    
    var count = 0



    $("#new_message").click(function(e){
      //alert('new_message')
      count++
      var user = '<?php echo $_SESSION["user_id"] ?>'
      var textarea = "<textarea id='tab_textarea_"+count+"' rows='5'></textarea>"
      var sender = "<input type='text' value='"+parseInt(user)+"' id='sender_"+count+"' style='display:none;'>"
      var tab_submit = "<button id='tab_submit_"+count+"' class='send_pm_user btn' type='button' class='btn' onClick='submit_message("+count+")'>Submit</button>"
      var tab = "<li><button onClick='close_tab("+count+")' id='mbc' class='close'>&times;</button><a href='#new_message_content_"+count+"' data-toggle='tab' id='new_message_tab_"+count+"'>New Message</a></li>"
      var tab_content = "<div class='tab-pane' id='new_message_content_"+count+"'><form id='m_form_"+count+"'>"+sender+singleVal+"<br>"+textarea+"<br>"+tab_submit+"</form></div>"
      
      $("#message_tab_ul").append(tab)
      $("#message_tab_content").append(tab_content)
      //call_tinemce()
    })

    function call_tinemce(){      
      tinymce.init({selector:'textarea'})
    }

    /*function submit_message(id){
      //alert($("#tab_textarea_"+id).val())
      //alert($("#select_receiver").val())
      //console.log($("#tab_textarea_"+id))
      if($("#select_receiver").val()==""||$("#tab_textarea_"+id).val()==""){
        alert('Blank')
        return
      }

      if(!confirm("Do you like to send this message?")){
        return
      }

      //alert('worksss')
    }*/

    function close_tab(id){
      $("#new_message_tab_"+id).parent().remove()
      $("#new_message_content_"+id).remove()
    }    
      
    </script>

</body></html>