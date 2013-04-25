<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
 
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

 
/*$option1 = null;
if (isset($_REQUEST['job'])) {
   if (substr($_REQUEST['job'],-1)!= '/') {
      $_REQUEST['job'] .= '/';
   }
   $dir = dirname($_SERVER['SCRIPT_FILENAME']).'/files/'.$_REQUEST['job'];
   if (!file_exists($dir)) {
      mkdir($dir, 0777, true);
   }
	$option1 = array('upload_dir' => $dir);
}*/

/*$option1 = null;
if (isset($_REQUEST['user_id'])) {
   $option1 = array('user_id' => $_REQUEST['user_id']);
}
*/
$option2 = array('accept_file_types' => '/\.(gif|jpe?g|png|txt|doc|docx|pdf|xls|xlsx|zip|rar)$/i');
if(isset($_REQUEST["recent_user"])){
  $option3 = array('user_id' => $_REQUEST["recent_user"]);
  $option = array_merge($option2, $option3);
  $upload_handler = new UploadHandler($option);
}
else
  $upload_handler = new UploadHandler($option2);



/*$option = array_merge($option1, $option2);*/

//print_r($option);
//$upload_handler = new UploadHandler($option);

//$upload_handler = new UploadHandler();





