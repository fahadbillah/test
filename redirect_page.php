<?php 
function redirect_to_a_page($page){
header("Location: $page.php");
exit;	
}
?>