<?php
	if (class_exists('User')) {
		$messenger = new User();
	}
	else
		echo "Please Add User Class At The Top!!!";
	$contactList = $messenger->message_scope("admin");
  $all_inbox_messages = $messenger->get_inbox_pm($_SESSION['user_id'],5,0);
  $all_sent_messages = $messenger->get_sent_pm($_SESSION['user_id'],5,0);
?>

<div id="message" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Messenger</h3>
      </div>
      </br>
      <div class="container-fluid" id="message_notice" style="text-align:center;"></div>
      </br>
    <div id="messenger_form_box">
    <form id="messenger_form" name="messenger_form" class="form-horizontal" action="#message" method="post"><div class="control-group">
        <label class="control-label" for="inputEmail">Select Staff</label>
        <div class="controls">
          <select name="receiver" id="receiver">
            <option value="" label="Select Staff"></option>  
            <?php 
            	$opt = '';
            	foreach ($contactList as $cl) {
            		extract($cl);
            		if ($opt!==$location_id) {
            			if ($location_id!=="central") {
            		 		$loc = $messenger->convert_id_location($location_id);
            			}
            			else
            				$loc = "Central";
					  echo "<optgroup label='$loc'>";
            		}
            		echo "<option value='$id'>".$name.' - '.$post."</option>";
            		$opt = $location_id;
            	}
            ?>                
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Message</label>
        <div class="controls">
          <textarea id="sms" name="sms"></textarea>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input name="sender" id="sender" value="<?php echo $_SESSION['user_id'] ?>" style="display:none;">
          <button type="button" id="send_pm" name="send_pm" class="btn">Submit</button>
        </div>
      </div>
    </form>
    </div>
    <div class="container-fluid"><button id="toggle_messenger" class="btn btn-large btn-block" type="button" data-toggle-text="Collapse Messenger">Hide</button>
</div>
</br>
  <div class="container-fluid">
    <div class="tabbable" id="messenger_tab"> <!-- Only required for left/right tabs -->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#inbox" data-toggle="tab">Inbox</a></li>
        <li><a href="#sent" data-toggle="tab">Sent</a></li>
        <!-- <li>
          <a href="#tab2" data-toggle="tab">User1<button type="button" class="close tab_close" data-dismiss="nav nav-tabs" aria-hidden="true"> ×</button></a>
        </li>
        <li>
          <a href="#tab3" data-toggle="tab">User2<button type="button" class="close tab_close" data-dismiss="nav nav-tabs" aria-hidden="true"> ×</button></a>
        </li> -->
      </ul>
      <div class="tab-content pre-scrollable">
        <div class="tab-pane active" id="inbox">
          <?php
            echo '<div class="accordion" id="accordioninbox">';
            if($all_inbox_messages){
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
            }
            else
              echo "<span class='label label-warning'>No received message available.</span>"; 
          ?>
          <!-- <div class="pane" style="display: block;"><div class="slider" style="height: 37px; top: 71.74416243654822px;"></div></div>
         --></div>
        <div class="tab-pane" id="sent">
          <?php
            echo '<div class="accordion" id="accordionsent">';
            if($all_sent_messages){
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
            }
            else
              echo "<span class='label label-warning'>No sent message available.</span>";                
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
  <div class="modal-footer"></div>
    </div>   