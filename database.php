<?php 

class Database
{
	const host = 'localhost';
	const username = 'zulkerv8_root';
	const password = 'A~nZkL?z=+~-';
	const db_name = 'zulkerv8_task_manager';
	
	public $mysqli;
		
	public function __construct(){		
	
		$this->mysqli = new mysqli(self::host, self::username, self::password, self::db_name);	
		
		if(mysqli_connect_errno()) {
 
			echo "Error: Could not connect to database.";
 
		exit;
 
		}	
		/*else
			echo "yoooo";	*/
	}
	
	public function __destruct() {
       	   
	  $this->mysqli->close();
   }
	
	/*public function __destruct() {
       $this->mysqli->close();
   }*/

}


?>