<?php 
include_once "database.php";
	// do not change the salt *63%Df*#@ 
class User extends Database
{
	public $login_data;
	public $user_data;
	public $req_data;
	public $user_data_temp;
	public $user_data_temp1;
	public $good_to_go_flag;
	public $comment_data;
	public $additional_data;
	public $date;
	public $time;
	public function __construct()
	{
		parent::__construct();	
	}
	
	function __destruct() {
		
       parent::__destruct();
	   
	   unset($user_data);
	   
	   unset($user_data_temp);
   }

	
	private function my_hash($password) 
    {        
        $salt = '*63%Df*#@'; 		 // do not change this salt *63%Df*#@ 
        $hash = base64_encode( sha1($password . $salt, true) . $salt ); 
        return $hash; 
    }
	public function add_user($user_id,$email,$password)
	{
		$name = $this->mysqli->real_escape_string($user_id);
		$email = $this->mysqli->real_escape_string($email);
		$password = $this->mysqli->real_escape_string($password);
		
		if($this->check_unique_mail($email)){
			$password = $this->my_hash($password);		
			$query="INSERT INTO user_login_details SET user_id='$user_id', email='$email', password='$password'";
			$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
			$last_req_id = $this->mysqli->insert_id;
			return $last_req_id;
		}
	}
	public function update_unique_id($id,$unique_id)
	{
		$id = $this->mysqli->real_escape_string($id);
		$unique_id = $this->mysqli->real_escape_string($unique_id);
		
		$query="update users SET staff_id = '$unique_id' where idusers = $id";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>A new user added.</span> ";
		
	}
		public function get_all_designation()
	{		
		$query="SELECT * FROM staff_level";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}	
	}
	 
	public function get_all_departments()
	{		
		$query="SELECT * FROM departments";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}	
	}
	public function get_all_subordinate($designation)
	{
		$designation = $this->mysqli->real_escape_string($designation);
							
		$this->get_level($designation);
		
		foreach($this->user_data_temp as $data)
		{
			extract($data);
			
			$lvl =  $level;
			
		}
	
		$query="SELECT * FROM users where designation > '$lvl'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}	
	}	public function get_level($designation)
	{
		$designation = $this->mysqli->real_escape_string($designation);
									
		$query="SELECT level FROM staff_level where designation = '$designation' or  level = '$designation' ";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}	
	}
	public function create_unique_id($entity,$project,$site)
	{
		$entity = $this->get_master_id($entity);
		
		if($project!=99){
			$project = $this->get_project_id($project);
			$site = $this->get_site_factory_id($site);
		}
		else {
			$entity = $entity."99";
			if($this->available_id($entity)!= NULL)
				return $this->user_data;
			else
				return $this->user_data = $entity.str_pad(1, 3, "0", STR_PAD_LEFT);
		}
		$project = str_pad($project, 2, "0", STR_PAD_LEFT);
		$site = str_pad($site, 2, "0", STR_PAD_LEFT);
		
		$unfinished_id = $entity.$project.$site;	
		
		//echo $unfinished_id;
		
		if($this->available_id($unfinished_id)!= NULL)
			return $this->user_data;
		else
			return $this->user_data = $unfinished_id."1";
				
	}
	public function available_id($unfinished_id)
	{		
		$query="SELECT * FROM users where staff_id like '$unfinished_id%' order by staff_id desc limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}	
		else 
			return NULL;
	}
	public function get_all_masters($master='')
	{
		if($master=='')
			$query="SELECT * FROM master_business";
		else
			$query="SELECT * FROM master_business WHERE name = '$master'";
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}	
	}
	public function getLastProjectId($master)
	{		
		$master = $this->mysqli->real_escape_string($master);
							
		$query="SELECT id FROM projects where master= '$master' ORDER BY id asc";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}	
		else
			echo "<span class='label label-success'>no project found.</span> ";	
		return 0;
	}
	public function get_all_projects($master)
	{		
		$master = $this->mysqli->real_escape_string($master);
							
		$query="SELECT * FROM projects where master= '$master'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}	
		else
		{
			$noproject = array("0" => array("name" => "No Project Available", "id" => 0, "master" => $master,));
			
			$this->user_data_temp = $noproject;
			
			return $this->user_data_temp;
		}	
	}
	public function get_all_sites_factories($project,$master)
	{		
		$project = $this->mysqli->real_escape_string($project);
		$master = $this->mysqli->real_escape_string($master);
		
		//var_dump($project." project master ".$master);
		
		$query="SELECT * FROM locations where project = '$project' and master = '$master'";
		
		$result = $this->mysqli->query($query);
		
		var_dump($result);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}else
		{
			$noproject = array("0" => array("name" => "No Project Available", "type" => "corporate", "id" => 0, "project" => $project,));
			
			$this->user_data_temp = $noproject;
			
			return $this->user_data_temp;
		}			
	}
	public function get_site_factory_designation($site_factory)
	{
		$site_factory = $this->mysqli->real_escape_string($site_factory);
		
		$query="SELECT * FROM designation_site_factory where site_factory_type = '$site_factory'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}	
	}
	public function get_master_id($master)
	{
		$master = $this->mysqli->real_escape_string($master);
		
		$query="SELECT id FROM master_business where name = '$master' limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1=$rows['id'];					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function get_master()
	{
		unset($this->user_data_temp1);
		$query="SELECT * FROM master_business";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1[]=$rows;					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function get_project($data)
	{
		$query="SELECT * FROM projects where master = '$data'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1[]=$rows;					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function get_site($data)
	{
		$query="SELECT * FROM locations where project = '$data'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1[]=$rows;					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function get_micro_site($data)
	{
		unset($this->user_data_temp1);
		if(is_int($data))
			$query="SELECT name FROM micro_site where id = '$data'";
		else
			$query="SELECT * FROM micro_site where site = '$data'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1[]=$rows;					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function get_project_id($project)
	{
		$project = $this->mysqli->real_escape_string($project);
		
		$query="SELECT id FROM projects where name = '$project' limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1=$rows['id'];					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function get_site_factory_id($site_factory)
	{
		
		$site_factory = $this->mysqli->real_escape_string($site_factory);
		
		$query="SELECT id FROM sites_factories where name = '$site_factory' limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1=$rows['id'];					
			}						
			return $this->user_data_temp1;
		}	
	}
	public function user_table_id()
	{		
		$query="SELECT idusers FROM users order by idusers desc limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1=$rows['idusers'];					
			}						
			return $this->user_data_temp1;
		}		
	}
	public function get_recurring()
	{		
		$query="SELECT * FROM recurring_nonrecurring";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1[]=$rows;					
			}						
			return $this->user_data_temp1;
		}		
	}
	public function get_req_destination($req_id)
	{		
		$query="SELECT location FROM req_hub where req_id = '$req_id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1=$rows['location'];					
			}						
			return $this->user_data_temp1;
		}		
	}
	public function get_all_type_of_req()
	{		
		unset($this->user_data_temp1);
		$query="SELECT * FROM type_of_req";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1[]=$rows;					
			}						
			return $this->user_data_temp1;
		}		
	}
	public function add_new_exec($user,$location,$post){
		//echo $user.' '.$location.' '.$post;	
		if(strcasecmp($post,'boss')==0){
			$query="INSERT INTO requisition_user SET user_id='$user', location_id='$location', post='$post',  active='active'";
		}
		else 
			$query="INSERT INTO requisition_user SET user_id='$user', location_id='$location', post='$post', active='active'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>User added as '$post' for '$location' location.</span> ";
		//echo $this->mysqli->insert_id;
	}
	public function new_req($idusers,$title,$description,$type_of_req,$costing,$datepicker,$location_id)
	{
		$idusers = (int)$this->mysqli->real_escape_string($idusers);
		$title = $this->mysqli->real_escape_string($title);
		$description = $this->mysqli->real_escape_string($description);
		$type_of_req = $this->mysqli->real_escape_string($type_of_req);
		$costing = $this->mysqli->real_escape_string($costing);
		$datepicker = $this->mysqli->real_escape_string($datepicker);
		$location_id = $this->mysqli->real_escape_string($location_id);
		
		
		
		$query="INSERT INTO requisition SET user_id='$idusers', title='$title', description='$description', type_of_req='$type_of_req', costing='$costing', deadline='$datepicker', status='New', location_id='$location_id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>New requisition is successfully added.</span> ";
		//echo 'new_req executed</br>';
		//echo $costing.$type_of_req.'</br>';
		$last_req_id = $this->mysqli->insert_id;
		$this->send_to_hub($last_req_id,$location_id);
		$adminStat = $this->add_admin_local($location_id,$last_req_id);
		if(!$adminStat){
			$this->send_to_hub_update($last_req_id,'central');
		}		
		$this->add_user_to_admin_table($idusers,$last_req_id);	
		/*$hub = $this->determine_local_main($costing,$location_id);
		//var_dump($hub);
		if($hub == 'local'){
			$this->send_to_hub($last_req_id,$location_id);
			$this->add_admin_local($location_id,$last_req_id);
			$this->add_user_to_admin_table($idusers,$last_req_id);				
		}
		else if($hub == 'central'){
			$this->add_user_to_admin_table($idusers,$last_req_id);	
			$this->send_to_hub($last_req_id,'central');
		}*/
	}
	public function send_to_hub($last_req_id,$location_id)
	{		
		//echo 'send_to_hub executed</br>';
		$query="INSERT INTO req_hub SET req_id='$last_req_id', location='$location_id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>New requisition is successfully added the hub.</span> ";			
	}
	public function send_to_hub_update($req_id,$location_id)
	{		
		//echo 'send_to_hub executed</br>';
		$query="UPDATE req_hub SET location='$location_id' WHERE req_id = '$req_id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Destination is successfully updated.</span> ";			
	}
	public function determine_local_main($costing,$location)
	{
		//echo 'determine_local_main executed</br>';
		if($this->money_limit_cross($costing,$location)){
			return 'local';
		}
		else
			return 'central';		
	}	public function select_central_hub()
	{
		$query = "SELECT * FROM hub_admins where location = 'Main Hub'";
			
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data=$rows;					
			}						
		}
	}
	public function select_local_hub($location_id)
	{
		$query = "SELECT * FROM hub_admins where location = '$location_id'";
			
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data=$rows;					
			}						
		}
	}
	public function getBossByLocation($location_id)
	{
		unset($this->user_data_temp1);
		$query = "SELECT user_id FROM requisition_user where location_id = '$location_id' and post = 'Boss'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;	
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){								
				$this->user_data_temp1=$rows['user_id'];					
			}						
			return $this->user_data_temp1;
		}
		else
			echo "<span class='label label-warning'>No boss found for '$location_id' location.</span> ";		
	}
	public function get_limit($user_id){
		unset($this->req_data);
		$query="SELECT * FROM money_limit where user_id = '$user_id'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 		
		$this->additional_data = $num_result;					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->req_data=$rows["limit"];				
			}						
			return $this->req_data;
		}
		else{
			echo "<span class='label label-warning'>Limit for this user not found.</span> ";
			return 0;
		}
	}
	public function money_limit_cross($costing,$location)
	{
		$id = (int)$this->getBossByLocation($location);
		$limit = $this->get_limit($id);
		if($limit){
			if($costing<=$limit) //money limit not crossed return true
				return true;
			else if($costing>=$limit)//money limit crossed return false
				return false;
		}
		else{
			echo "<span class='label label-warning'>Limit for '$location' boss not set.</span> ";
			if($costing<=10000) //money limit not crossed return true
				return true;
			else if($costing>=10000)//money limit crossed return false
				return false;			
		}
	}
	public function add_admin_local($location_id,$last_req_id)
	{	
		$this->date_time();
		$admin = (int)$this->highest_local_authority($location_id);
		if(!$admin)
			return false;
			//$admin = (int)$this->highest_local_authority('central');			
		$message = 'admin added,'.$this->date;
		$query="INSERT INTO admins SET req_id='$last_req_id', admin_id= '$admin', relation_to_req='Boss', activities='$message', status='New'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>New requisition is successfully added.</span> ";
		return true;
	}
	public function add_activity_central($user_id,$req_id,$status)
	{	
		$this->date_time();
		$message = $status.','.$this->date;
		$query="INSERT INTO admins SET req_id='$req_id', admin_id= '$user_id', activities='$message', status='$status'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>New accounts activity is successfully added.</span> ";
	}
	public function add_admin_central($user_id,$req_id)
	{	
		$this->date_time();
		$message = 'admin added,'.$this->date;
		$query="INSERT INTO admins SET req_id='$req_id', admin_id= '$user_id', relation_to_req='Boss', activities='$message', status='New'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>New requisition is successfully added.</span> ";
	}
	public function add_user_to_admin_table($idusers,$last_req_id)
	{	
		$this->date_time();
		$message = 'requisition raised,'.$this->date;
		$query="INSERT INTO admins SET req_id='$last_req_id', admin_id= '$idusers', relation_to_req='Raiser', activities='$message', status='New'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_error()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>New requisition is successfully added.</span> ";
	}
	public function highest_local_authority($location_id)
	{	
		$query="SELECT user_id FROM requisition_user where location_id = '$location_id' and post = 'Boss' limit 1";
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){		
			while($rows=$result->fetch_assoc()){								
				return $rows['user_id'];					
			}						
			//return $this->req_data;
		}		
		else
			return false;
	}
	public function requisition_table_id()
	{		
		$query="SELECT id FROM requisition order by id desc limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data=$rows['id'];					
			}						
			return $this->req_data;
		}		
	}
	public function user_req_list($start,$limit,$id)
	{		
		$query="SELECT * FROM requisition where user_id = '$id' order by id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->user_data_temp1 = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}		
	}
	public function admin_req_list($id,$start,$limit)
	{		
		$query="SELECT * FROM requisition where admin = '$id' order by id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->user_data_temp1 = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}		
	}
	public function user_req_single($id,$req_id,$colname='')
	{	
		//if($colname=="user_id")	
		//$query="SELECT * FROM requisition where id = '$req_id'";
		//if($colname=="admin")	
		unset($this->req_data);
		$query="SELECT * FROM requisition WHERE id = '$req_id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->user_data_temp1 = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}		
	}
	public function local_request_single($location,$req_id)
	{	
		$query="SELECT * FROM requisition where id = '$req_id' and location_id = '$location'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->user_data_temp1 = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}		
	}
	public function user_req_list_by_type($id,$start,$limit,$type)
	{		
		$query="SELECT * FROM requisition where user_id = '$id' and status = '$type' order by id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		/*else
			echo "<span class='label label-warning'>No requisition is found under this type.</span> ";*/
	}
	public function super_admin_req_list_by_type($start,$limit,$type,$idusers)
	{		
		$query="SELECT * FROM requisition where admin = '$idusers' and status = '$type' order by id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		/*else
			echo "<span class='label label-warning'>No requisition is found under this type.</span> ";*/
	}	public function super_admin_req_list_by_location($start,$limit,$type,$location_id)
	{		
		$query="SELECT * FROM requisition where location_id LIKE '$location_id%' and status = '$type' order by id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		/*else
			echo "<span class='label label-warning'>No requisition is found under this type.</span> ";*/
	}
	public function get_request_list($start,$limit,$user_id)
	{	
		$query="SELECT requisition.id, requisition.title, requisition.status, admins.relation_to_req
		FROM requisition
		INNER JOIN admins
		ON requisition.id = admins.req_id
		WHERE admins.admin_id = '$user_id'
		ORDER BY requisition.id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No requisition is found for this user.</span> ";
	}
	public function get_request_list_central_accounts($start,$limit)
	{	
		$query="SELECT requisition.id, requisition.title, requisition.status
		FROM requisition
		INNER JOIN req_hub
		ON requisition.id = req_hub.req_id
		WHERE requisition.status = 'Approved' and req_hub.location = 'central'
		ORDER BY requisition.id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No requisition is found for this user.</span> ";
	}
	public function get_request_list_central_scm($start,$limit)
	{	
		$query="SELECT requisition.id, requisition.title, requisition.status
		FROM requisition
		INNER JOIN req_hub
		ON requisition.id = req_hub.req_id
		WHERE requisition.status IN ('Approved','Clear From Accounts') and req_hub.location = 'central'
		ORDER BY requisition.id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No requisition is found for this user.</span> ";
	}
	public function get_requisition_list_for_admins($start,$limit,$location)
	{	
		$query="SELECT requisition.id, requisition.title, requisition.status
		FROM requisition
		INNER JOIN req_hub
		ON requisition.id=req_hub.req_id
		WHERE req_hub.location = '$location'
		ORDER BY requisition.id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No requisition is found for this user.</span> ";
	}
	public function get_requisition_list($start,$limit,$location)
	{	
		$query="SELECT requisition.id, requisition.title, requisition.status
		FROM requisition
		INNER JOIN req_hub
		ON requisition.id=req_hub.req_id
		WHERE req_hub.location = '$location'
		ORDER BY requisition.id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No requisition is found for this user.</span> ";
	}
	public function get_single_request($req_id)
	{	
		$query="SELECT requisition.id, requisition.title, admins.status
		FROM requisition
		INNER JOIN admins
		ON requisition.id=admins.req_id
		WHERE admins.admin_id = '$user_id'
		ORDER BY requisition.id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No requisition is found for this user.</span> ";
	}
	public function super_admin_req_list($start,$limit)
	{		
		$query="SELECT * FROM requisition order by id desc limit $start,$limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->user_data_temp1 = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}		
	}
	public function total_user_req_list($idusers,$user_type="user_id")
	{
		if($user_type=="user_id")
			$query="SELECT * FROM admins where admin_id = '$idusers'";
		if($user_type=="admin")
			$query="SELECT * FROM admins where admin_id = '$idusers'";
		
		$result = $this->mysqli->query($query);
		
		$this->req_data = $result->num_rows;		// determine number of rows result set 
				
		return $this->req_data;	
	}
	public function login($email,$not_yo_business)
	{		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			echo "<span class='label label-warning'>Enter valid email adress</span> ";
			echo "<INPUT class='btn' TYPE='button' VALUE='Back to Sign in page' onClick='history.go(-1);return true;'>";
			exit;
		}
		else
		{		
			$email = $this->mysqli->real_escape_string($email);
			$not_yo_business = $this->mysqli->real_escape_string($not_yo_business);		
		    $not_yo_business = $this->my_hash($not_yo_business);	
		
			$query="SELECT user_master.*
					FROM user_master
					INNER JOIN user_login_details
					ON user_master.id = user_login_details.user_id
					WHERE user_login_details.email = '$email' and 
					user_login_details.password = '$not_yo_business' limit 1";
			
			$result = $this->mysqli->query($query);
		
			$num_result=$result->num_rows;		// determine number of rows result set 
					
			if($num_result>0){
				
				while($rows=$result->fetch_assoc()){
									
					$this->login_data[]=$rows;					
				}						
			}	
			else
			{
				echo "<span class='label label-warning'>Wrong username or password</span> ";
				echo "<INPUT class='btn' TYPE='button' VALUE='Back to Sign in page' onClick='history.go(-1);return true;'>";
				exit;
			}	
			if($this->login_data[0]['active_status'] !== 'active')	{
				echo "<span class='label label-warning'>This user is not active right now</span> ";
				echo "<INPUT class='btn' TYPE='button' VALUE='Back to Sign in page' onClick='history.go(-1);return true;'>";
				exit;
			}
			else
				return $this->login_data;
						
		}
	}
	public function check_any_req_in_table($value="",$colname="")
	{	
		/*if($value!="" && $colname!="") {	
		  if($colname=="user_id")*/	
		    $query="SELECT * FROM admins where admin_id = '$value'";
		 /* if($colname=="admin")	
		    $query="SELECT * FROM admins where admin = '$value'";
		  if($colname=="location_id")	
		    $query="SELECT * FROM admins where location_id = '$value'";		  
		}		
		if($value=="") 		
		  $query="SELECT * FROM requisition order by submission_date desc";*/
		
		$result = $this->mysqli->query($query);
		
		if($result->num_rows==0)		// determine number of rows result set 
		{
			echo "<span class='label label-info'>Please make your first requisition.</span> ";
			return false;
		}
		else
			return true;
		
	}
	public function check_unique_mail($email)
	{		
		$email = $this->mysqli->real_escape_string($email);	
	
		$query="SELECT email FROM user_login_details where email = '$email'";
		
		$result = $this->mysqli->query($query);
		
		if($result->num_rows!=0){	// determine number of rows result set 
			echo "<span class='label label-warning'>Sorry this email is not available.</span> ";
			return false;
		}
		else{
			echo "<span class='label label-success'>This email is available.</span> ";
			return true;
		}
	}
	public function get_user_locations($id)
	{
		unset($this->user_data);
		
		$id = $this->mysqli->real_escape_string($id);
				
		$query="SELECT location_id FROM requisition_user WHERE user_id = '$id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data=$rows['location_id'];					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user found.</span> ";	
		return $num_result;
	}
	public function get_user_by_locations($id)
	{
		unset($this->user_data);
		
		$id = $this->mysqli->real_escape_string($id);
		
		//$id = explode('.',$id);	
		
		$query="SELECT user_master.id, user_master.name, user_master.designation, user_master.office_code, user_master.authorization_level
				FROM user_master
				INNER JOIN user_by_location
				ON user_master.id = user_by_location.user_id
				WHERE user_by_location.location_id = '$id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user found.</span> ";	
		return $num_result;
	}
	
	function get_site_id($site){
		unset($this->login_data);
		$query="SELECT * FROM locations where site_factory='$site'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->login_data[]=$rows;					
			}						
			return $this->login_data;
		}
		else
			echo "<span class='label label-warning'>no msite data found</span> ";	
	}
	function get_micro_site_id($msite,$site){
		unset($this->login_data);
		$query="SELECT * FROM micro_site where name='$msite' and site='$site'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->login_data[]=$rows;					
			}						
			return $this->login_data;
		}
		else
			echo "<span class='label label-warning'>".__FUNCTION__." error</span> ";
		return NULL;
	}
	public function add_location_to_user($user,$ms,$pr,$site,$msite)
	{
		$user = $this->mysqli->real_escape_string($user);
		$ms = $this->mysqli->real_escape_string($ms);
		$pr = $this->mysqli->real_escape_string($pr);
		$site = $this->mysqli->real_escape_string($site);
		$sid = $this->get_site_id($site);
		$msite = $this->mysqli->real_escape_string($msite);
		if(strtolower($ms)=='single entity')
			$temp = $sid[0]['location_id'];
		else{
			$mid = $this->get_micro_site_id($msite,$site);
			$temp = $sid[0]['location_id'].".".$mid[0]['id'];
		}
		//var_dump($sid);
		
		//var_dump($mid);
		//echo " ".$user." ".$ms." ".$pr." ".$site." ".$msite." ".$temp;user_id	location_id		
		
		$query="INSERT INTO requisition_user SET user_id='$user', location_id='$temp', post='Raiser', active='active'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>User successfully added to that location.</span> ";	
	}
	public function search_location()
	{		
		$query="SELECT * FROM locations";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$location[]=$rows;					
			}						
			return $location;
		}
		else
			echo "<span class='label label-warning'>".__FUNCTION__." error</span> ";	
			
		$this->login_data = $num_result;
		return $this->login_data;
	}
	public function search_user($search="",$type="")
	{		
		unset($this->login_data);
		$search = $this->mysqli->real_escape_string($search);	
		
		if($type=="designation")
		  $query="SELECT * FROM user_master where designation = '$search'";
		
		if($type=="id")
		  $query="SELECT * FROM user_master where id = '$search'";	
		
		if($type=="office_code")
		  $query="SELECT * FROM user_master where office_code = '$search'";
		  
		if($search=="" && $type=="")
		  $query="SELECT * FROM user_master";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->login_data[]=$rows;					
			}						
			return $this->login_data;
		}
		else
			echo "<span class='label label-warning'>No user found.</span> ";	
			
		$this->login_data = $num_result;
		return $this->login_data;
	}	
	public function set_authentication_steps($req_type)
	{
		
		
	}
	public function money_range()
	{
		
	}
	public function get_comments($id)
	{
		$id = $this->mysqli->real_escape_string($id);	
	
		$query="SELECT * FROM comment where comment_to = '$id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No comment available.</span> ";	
		return $this->additional_data;
	}
	public function get_user_details($comment_by,$type = "")
	{//					
		$comment_by = $this->mysqli->real_escape_string($comment_by);
		$type = $this->mysqli->real_escape_string($type);	
		
		switch($type)
		{
			case "name":
		 	 $query="SELECT name FROM user_master where id = '$comment_by'";
	         break;
			 
			case "designation":
		 	 $query="SELECT designation FROM user_master where id = '$comment_by'";
	         break;
			 
			case "office_code":
		 	 $query="SELECT office_code FROM user_master where id = '$comment_by'";
	         break;
			 
			case "authorization_level":
		 	 $query="SELECT authorization_level FROM user_master where id = '$comment_by'";
	         break;
			 
			default:
		 	 $query="SELECT * FROM user_master where id = '$comment_by'";
	         break;				
		}
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
				if($type=='')
					$this->user_data[]=$rows;
				else{
					return $rows[$type];
				}					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user found.</span> ";	
			
		return $this->user_data;
		
	}
	public function add_comment_to_req($user,$req_id,$comment)
	{
		$user = $this->mysqli->real_escape_string($user);
		$req_id = $this->mysqli->real_escape_string($req_id);
		$comment = $this->mysqli->real_escape_string($comment);	
		
		$query="INSERT INTO comment SET comment='$comment', comment_by='$user', comment_to='$req_id', flag='unread'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Comment added successfully.</span> ";	
	}
		public function idusers_to_id($idusers)
	{
		$idusers = $this->mysqli->real_escape_string($idusers);	
	
		$query="SELECT name FROM user_master where id = '$idusers'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 		
					
		$this->additional_data = $num_result;
		
		if($num_result>0){			
			$rows=$result->fetch_assoc();										
			return $rows["name"];	
		}
		else
			echo "<span class='label label-warning'>No user found.</span> ";	
		return $this->additional_data;
	}
	public function new_comment_available($id,$self)
	{
		$id = $this->mysqli->real_escape_string($id);	
	
		$query="SELECT flag FROM comment where comment_to = '$id' and flag = 'unread' and comment_by <> $self";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 		
					
		$this->additional_data = $num_result;
		
		if($num_result>0){		
			return $this->additional_data;			
		}		
	}
	public function get_pages($user_type)
	{
		$user_type = $this->mysqli->real_escape_string($user_type);	
		
		if($user_type == 'site supervisor' || $user_type == 'site manager')
			$query="SELECT * FROM pagination where user_type = 'staff' order by page_order";
		else 
			$query="SELECT * FROM pagination where user_type = 'administration' order by page_order";
			
	
		//$query="SELECT * FROM pagination where user_type = '$user_type' order by page_order";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 		
					
		$this->additional_data = $num_result;
		
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}
		else
			echo "<li class='active'><a href='sing_in.php'><i class='icon-home icon-white'></i> Home</a></li>
              <li><a href=''>Pages Not Defined For This User</a></li>";
			//echo "<span class='label label-warning'>User type not found. So navbar can not be available</span> ";		
			//header("Location: signin.php?status=notauthorized"); 
	}
	public function recent_added_user($limit)
	{		
		$query="SELECT id,name FROM user_master order by user_since desc limit $limit";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}	
			//echo $_SESSION["designation"];					
			return $this->req_data;
		}	
		/*else
			echo "<span class='label label-warning'>No requisition is found under this type.</span> ";*/
	}	
	public function check_new_req()
	{		
		$query="SELECT * FROM requisition where status = 'New'";
		
		$result = $this->mysqli->query($query);
		
		return $result->num_rows;		// determine number of rows result set 
				
		/*$this->good_to_go_flag = $num_result;
		
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}	*/
		/*else
			echo "<span class='label label-warning'>No requisition is found under this type.</span> ";*/
	}
	/*public function change_req_status($id,$status)
	{
		$id = $this->mysqli->real_escape_string($id);
		$status = $this->mysqli->real_escape_string($status);
		
		$query="update requisition SET status = '$status' where id = $id";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
	}*/
	public function make_read($id,$handler_type)
	{
		$id = $this->mysqli->real_escape_string($id);
		$handler_type = $this->mysqli->real_escape_string($handler_type);
		
		$query="update comment SET flag = 'read' where id = $id and flag = 'unread'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
	}
	public function get_destination($type_of_req)
	{
		$query="select * from type_of_req where name = '$type_of_req'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		$num_result=$result->num_rows;		// determine number of rows result set 				
		$this->good_to_go_flag = $num_result;		
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){								
				$this->additional_data[]=$rows;		
			}						
			return $this->additional_data;
		}	
		else
			echo "<span class='label label-warning'>No data is found.</span> ";
	} 
	public function get_exec($type)
	{
		$query="select * from corporate where designation like %'$type'%";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		$num_result=$result->num_rows;		// determine number of rows result set 				
		$this->good_to_go_flag = $num_result;		
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){								
				$this->req_data[]=$rows;		
			}						
			return $this->req_data;
		}	
		else
			echo "<span class='label label-warning'>No data is found.</span> ";
	}
	public function add_feedback($title,$description,$idusers)
	{
		$title = $this->mysqli->real_escape_string($title);
		$description = $this->mysqli->real_escape_string($description);
		$idusers = $this->mysqli->real_escape_string($idusers);	
		
		$query="INSERT INTO feedback SET title='$title', description='$description', iduser='$idusers', flag='unread'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>feedback added successfully.</span> ";	
	}
	public function get_feedbacks()
	{
		$query="SELECT * FROM feedback";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No feedback available.</span> ";	
		return $this->additional_data;
	}
	public function get_feedbacks_id($id)
	{
		$query="SELECT * FROM feedback where id=$id";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No feedback available.</span> ";	
		return $this->additional_data;
	}
	public function change_feed_stat($rad,$id)
	{
		$rad = $this->mysqli->real_escape_string($rad);
		$id = $this->mysqli->real_escape_string($id);
		
		$query="update feedback SET flag = '$rad' where id = $id";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Feedback updated.</span> ";
		
	}
	public function make_read_feed($id,$handler_type)
	{
		$id = $this->mysqli->real_escape_string($id);
		$handler_type = $this->mysqli->real_escape_string($handler_type);
		
		$query="update feedback SET flag = '$handler_type' where id = $id and flag= 'unread'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");				
	}
	public function add_corporate_user($name,$email,$password,$contact,$master,$department,$designation)
	{
		$name = $this->mysqli->real_escape_string($name);
		$email = $this->mysqli->real_escape_string($email);
		$password = $this->mysqli->real_escape_string($password);
		$contact = $this->mysqli->real_escape_string($contact);
		$master = $this->mysqli->real_escape_string($master);
		$department = $this->mysqli->real_escape_string($department);
		$designation = $this->mysqli->real_escape_string($designation);
			
		$password = $this->my_hash($password);		
		$query="INSERT INTO users SET name='$name', email='$email', contact='$contact', password='$password', master='$master', department='$department', designation='$designation'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		return $this->user_table_id();
	}
	public function get_departments($master,$type)
	{
		$master = $this->mysqli->real_escape_string($master);
		$type = $this->mysqli->real_escape_string($type);
		
	//	echo $master;
		
		if($type=='corporate'){
			$query="SELECT * FROM department_corporate where master = '$master'";			
		}		
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No department available.</span> ";	
		return $this->additional_data;
	}
	public function get_designation()
	{		
		$query="SELECT * FROM designation_corporate";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No designation available.</span> ";	
		return $this->additional_data;
	}
	public function get_admin($destination,$admin)
	{		
		$query="SELECT * FROM users where designation='$admin' and department = '$destination' limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No designation available.</span> ";	
		return $this->additional_data;
	}
	public function get_admin_department($dept)
	{		
		$query="SELECT * FROM users where designation='$admin' and department = '$destination' limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->comment_data[]=$rows;					
			}						
			return $this->comment_data;
		}
		else
			echo "<span class='label label-warning'>No designation available.</span> ";	
		return $this->additional_data;
	}
	public function get_manager($ad)
	{		
		$query="SELECT * FROM users where staff_id like '$ad%' and designation = 'site manager'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No designation available.</span> ";	
		return $this->additional_data;
	}
	public function add_pm($subject,$message,$sender,$receiver)
	{		
		$query="INSERT INTO pm SET subject='$subject', message='$message', sender='$sender', receiver='$receiver', flag='new'";
		
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
		
		echo "<span class='label label-success'>Pm send successfully.</span> ";
	}
	public function add_admin($select_admin,$req_id)
	{		
		$query="INSERT INTO admins SET admin_id='$select_admin', req_id='$req_id'";
		
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
		
		echo "<span class='label label-success'>Admin added successfully.</span> ";
	}	
	public function get_user_by_dept($admin,$master)
	{		
		$query="SELECT * FROM users where department = '$admin' and master = '$master'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user available.</span> ";	
		return $this->additional_data;
	}
	public function get_list_of_admins($id)
	{		
		$query="SELECT * FROM admins where req_id = '$id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No admin assigned.</span> ";	
		return $this->additional_data;
	}
	public function is_corporate($user_designation)
	{		
		$query="SELECT * FROM designation_corporate where name = '$user_designation'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
			
			return true;
		}
		else
			return false;
	}
	public function add_new_location($master,$project,$site_factory)
	{
		$master = $this->mysqli->real_escape_string($master);
		$project = $this->mysqli->real_escape_string($project);
		$site_factory = $this->mysqli->real_escape_string($site_factory);	
		//$locaiton_type = $this->mysqli->real_escape_string($locaiton_type);	
		
		$masterId = $this->get_master_id($master);
		$masterId = substr($masterId, 0,1);
		$projectId = $this->get_project_id($project);
		$projectId = substr($projectId, 1,3);
		//$projectId = str_pad($projectId, 2, "0", STR_PAD_LEFT);
		$tempId = $masterId.$projectId;
		if($this->check_available_location_id($tempId)!==false){
			$tempAvailable = $this->user_data_temp1 + 1;
		}else
			$tempAvailable = $tempId.'1';
						
		$query="INSERT INTO locations SET site_factory='$site_factory', project='$project', master='$master', location_id='$tempAvailable'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Location added successfully.</span> ";	
	}
	function check_available_location_id($id){
		$query="SELECT * FROM locations WHERE location_id LIKE '$id%' ORDER by location_id DESC limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp1=$rows['location_id'];					
			}						
			return $this->user_data_temp1;
		}	
		else 
			return false;	
	}
	public function add_new_micro_site($ms,$pr,$si,$msite)
	{
		$ms = $this->mysqli->real_escape_string($ms);
		$pr = $this->mysqli->real_escape_string($pr);
		$si = $this->mysqli->real_escape_string($si);
		$msite = $this->mysqli->real_escape_string($msite);
		$query="INSERT INTO micro_site SET name='$msite', site='$si'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Micro site added successfully.</span> ";	
	}
	public function add_new_master($master,$id)
	{
		$master = $this->mysqli->real_escape_string($master);
		$query="INSERT INTO master_business SET name='$master', id='$id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Master added successfully.</span> ";	
	}
	public function add_new_site($site,$id,$project)
	{
		$site = $this->mysqli->real_escape_string($site);
		$id = $this->mysqli->real_escape_string($id);
		$project = $this->mysqli->real_escape_string($project);
		if($this->getLastSiteId($project)){
			foreach ($this->user_data_temp as $data) {
				extract($data);	
				array_push($pjs, $id);
			}
			$final = $pjs[count($pjs)-1];
			$final++;
			//$final = $final*10;
			//echo $final;
		}
		else{
			$final = $this->get_master_id($master)+10;
		}
		$this->ifSameSiteExists($site);
		$query="INSERT INTO sites_factories SET name='$site', id='$id', project='$project'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Site added successfully.</span> ";	
	}
	
	public function getLastSiteId($project)
	{		
		$project = $this->mysqli->real_escape_string($project);
							
		$query="SELECT id FROM sites_factories where project= '$project' ORDER BY id asc";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){
			
			while($rows=$result->fetch_assoc()){
								
				$this->user_data_temp[]=$rows;					
			}						
			return $this->user_data_temp;
		}	
		else
			echo "<span class='label label-success'>no project found.</span> ";	
		return 0;
	}
	public function ifSameSiteExists($site)
	{
		$query="SELECT id FROM sites_factories where id = '$site'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
			return true;	
		}
		else 
			return false;
	}
	public function add_new_project($master,$project)
	{
		$pjs = array();
		$master = $this->mysqli->real_escape_string($master);
		$project = $this->mysqli->real_escape_string($project);
		
		if($this->getLastProjectId($master)){
			foreach ($this->user_data_temp as $data) {
				extract($data);	
				array_push($pjs, $id);
			}
			$final = floor($pjs[count($pjs)-1]/10);
			$final++;
			$final = $final*10;
			//echo $final;
		}
		else{
			$final = $this->get_master_id($master)+10;
		}
		if($this->ifSameProjectExists($final)){
			echo "<span class='label label-warning'>Another project with same id exists.</span> ";
			return ;	
		}
		$query="INSERT INTO projects SET name='$project', id='$final', master='$master'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Project added successfully.</span> ";	
	}
	public function ifSameProjectExists($project)
	{
		$query="SELECT id FROM projects where id = '$project'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
			return true;	
		}
		else 
			return false;
	}
	public function get_authority_level()
	{		
		$query="SELECT * FROM authority_level";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user available.</span> ";	
		return $this->additional_data;
	}
	public function add_new_user($name,$designation,$office_code,$authority_level)
	{
		$name = $this->mysqli->real_escape_string($name);
		$designation = $this->mysqli->real_escape_string($designation);
		$office_code = $this->mysqli->real_escape_string($office_code);
		$authority_level = $this->mysqli->real_escape_string($authority_level);
		//echo $name,$designation,$office_code,$authority_level;					
		$query="INSERT INTO user_master SET name='$name', designation='$designation', office_code='$office_code', authorization_level='$authority_level', active_status='active'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>User added successfully.</span> ";	
		return $this->mysqli->insert_id;
	}
	public function change_req_activities($admin,$id,$status)
	{		
	//	echo $admin.' '.$id.' '.$status;
		$query="SELECT * FROM admins where req_id = '$id' and admin_id = '$admin' limit 1";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;					
			}
			$this->date_time();
			//print_r($this->user_data);
			//echo $status;
			$pieces = explode("|", $this->user_data[0]['activities']);	
			//print_r($pieces);			
			//return $this->user_data;
			//array_push($pieces, "|");
			array_push($pieces, $status.','.$this->date);
			$rearranged = implode("|", $pieces);
			//echo $rearranged;
			$this->update_admins($rearranged,$admin,$id);
		}
		else
			echo "<span class='label label-warning'>No request available.</span> ";	
		return $this->additional_data;
	}
	public function update_admins($rearranged,$admin,$id)
	{		
		$query="update admins SET activities = '$rearranged' where req_id = '$id' and admin_id = $admin";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Admin activity updated.</span> ";
		
	}
	public function change_req_status($admin,$req_id,$status)
	{		
		$query="update admins SET status = '$status' where req_id = '$req_id' and admin_id = '$admin'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Requisition status updated.</span> ";
		
	}
	public function change_req_status_main($req_id,$status)
	{		
		//echo $req_id." ".$status;
		$query="update requisition SET status = '$status' where id = '$req_id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Main requisition status updated.</span> ";
		
	}
	public function get_approved_requisition_list($start,$limit,$location)
	{		
		$query="SELECT * FROM requisition where location_id = '$location' and status= 'Approved'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->req_data[]=$rows;					
			}						
			return $this->req_data;
		}
		else
			echo "<span class='label label-warning'>No requisition available.</span> ";	
		return $this->additional_data;
	}
	/*public get_acc_scm_for_location($,$){
		
	}*/
	public function redirect_to_dept($id, $dept)
	{
		$this->date_time();
		$id = $this->mysqli->real_escape_string($id);
		$idL = $this->get_location_id($location);
		//$acc_for_location = $this->get_acc_scm_for_location($idL,'');
		$account = $this->get_local_accountant($idL);
		$scm = $this->get_local_scm($idL);
		$activitiesAcc = 'accountant added,'.$this->date;
		$activitiesScm = 'scm added,'.$this->date;
		//echo $name,$designation,$office_code,$authority_level;		
		$query_account="INSERT INTO admins SET admin_id='$account', relation_to_req='Accountant', req_id='$id', activities = '$activitiesAcc', status='Approved'";
		$result = $this->mysqli->query($query_account) or die(mysqli_connect_errno()."Data cannot be inserted");							
		$query_scm="INSERT INTO admins SET admin_id='$scm', relation_to_req='SCM', req_id='$id', activities = '$activitiesScm', status='Approved'";
		/*$query="INSERT INTO admins (admin_id, req_id, activities, status)
						VALUES ('$account', '$id', '$activitiesAcc','New')
						VALUES ('$scm', '$id', '$activitiesScm','New')";*/
		$result = $this->mysqli->query($query_scm) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>User added successfully.</span> ";	
	}
	public function getReqDestination($id){
		unset($this->req_data);
		$query="SELECT location FROM req_hub WHERE req_id = '$id'";
		$result = $this->mysqli->query($query);
		$num_result=$result->num_rows;		
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->req_data=$rows;					
			}						
			return $this->req_data['location'];
		}
		else
			echo "<span class='label label-warning'>Not found in req_hub.</span> ";	
	}
	public function assign_local_account_scm($id)
	{
		$this->date_time();
		$id = $this->mysqli->real_escape_string($id);
		$location = $this->getReqDestination($id); 
		//$this->mysqli->real_escape_string($location);
		//$idL = $this->get_location_id($location);		
		var_dump($location);
		$account = (int)$this->get_local_accountant($location,$id);	
		var_dump($account);
		$scm = (int)$this->get_local_scm($location,$id);	
		var_dump($scm);
		$activitiesAcc = 'accountant added,'.$this->date;
		$activitiesScm = 'scm added,'.$this->date;
		//echo $name,$designation,$office_code,$authority_level;		
		$query_account="INSERT INTO admins SET admin_id='$account', relation_to_req='Accountant', req_id='$id', activities = '$activitiesAcc', status='Approved'";
		$result = $this->mysqli->query($query_account) or die(mysqli_connect_errno()."Data cannot be inserted");							
		$query_scm="INSERT INTO admins SET admin_id='$scm', relation_to_req='SCM', req_id='$id', activities = '$activitiesScm', status='Approved'";
		$result = $this->mysqli->query($query_scm) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>User added successfully.</span> ";	
	}
	public function assign_central_account_scm($id)
	{
		$this->date_time();
		$id = $this->mysqli->real_escape_string($id);
		$account = $this->get_central_accountant();
		$scm = $this->get_central_scm();
		$activitiesAcc = 'accountant added,'.$this->date;
		$activitiesScm = 'scm added,'.$this->date;
		$query_account="INSERT INTO admins SET admin_id='$account', relation_to_req='Accountant', req_id='$id', activities = '$activitiesAcc', status='Approved'";
		$result = $this->mysqli->query($query_account) or die(mysqli_connect_errno()."Data cannot be inserted");							
		$query_scm="INSERT INTO admins SET admin_id='$scm', relation_to_req='SCM', req_id='$id', activities = '$activitiesScm', status='Approved'";
		$result = $this->mysqli->query($query_scm) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>User added successfully.</span> ";	
	}
	public function get_central_accountant()
	{		
		unset($this->req_data);
		$query="SELECT id FROM user_master WHERE authorization_level = 'Central Hub Accountant'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->req_data.=$rows['id'].',';					
			}						
			return $this->req_data;
		}
		else
			echo "<span class='label label-warning'>No requisition available.</span> ";	
	}
	public function get_central_scm()
	{		
		unset($this->req_data);
		$query="SELECT id FROM user_master WHERE authorization_level = 'Central Hub SCM'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->req_data.=$rows['id'].',';					
			}						
			return $this->req_data;
		}
		else
			echo "<span class='label label-warning'>No requisition available.</span> ";	
	}
	public function get_local_accountant($location,$req_id)
	{
		unset($this->req_data);
		$query="SELECT user_master.id 
		FROM user_master 
		INNER JOIN requisition_user
		ON requisition_user.user_id = user_master.id		
		WHERE requisition_user.post = 'Accountant' and requisition_user.location_id = '$location'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){									
				$this->req_data[]=$rows['id'];					
			}	
			var_dump($this->req_data);
			if(count($this->req_data)>1){
				foreach($this->req_data as $user){
					var_dump($user);
					var_dump($req_id);
					var_dump($this->check_scm_acc_by_loc($user,$req_id));
					if($this->check_scm_acc_by_loc($user,$req_id))
						return $user; 
				}
				var_dump($this->req_data);
			}	
			else{	
				var_dump($this->req_data[0]);			
				return $this->req_data[0];
			}
		}
		else
			echo "<span class='label label-warning'>No requisition available.</span> ";	
	}
	public function get_local_scm($location,$req_id='')
	{		
		unset($this->req_data);
		$query="SELECT user_master.id 
		FROM user_master 
		INNER JOIN requisition_user
		ON requisition_user.user_id = user_master.id		
		WHERE requisition_user.post = 'SCM' and requisition_user.location_id = '$location'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
		
		$this->additional_data = $num_result;
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){									
				$this->req_data[]=$rows['id'];					
			}	
			//var_dump($this->req_data);
			if(count($this->req_data)>1){
				foreach($this->req_data as $data){
					if($this->check_scm_acc_by_loc($data,$req_id))
						return $data; 
				}
			}	
			else				
				return $this->req_data[0];
		}
		else
			echo "<span class='label label-warning'>No requisition available.</span> ";	
	}
	public function check_scm_acc_by_loc($data,$req_id){
		$loc = $this->get_req_location($req_id);
		var_dump($loc);		
		$query="SELECT user_id FROM acc_scm_to_office WHERE location_id = '$loc'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){				
				var_dump($rows);									
				 if($rows['user_id']==$data){
					var_dump($data);						
				 	return true;			
				 }
			}						
		}
		return false;	
	}
	public function get_location($site='',$id='')
	{		
		//echo $id;
		unset($this->req_data);
		//var_dump($site.' '.$id);
		//if($colName=='location_id')
		if($site!='')
			$query="SELECT id FROM locations WHERE site_factory = '$site'";
		if($id!='')
			$query="SELECT site_factory FROM locations WHERE location_id = '$id'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
				$this->req_data=$rows;					
			}						
			return $this->req_data;
		}
		else
			echo "<span class='label label-warning'>".__FUNCTION__." error</span> ";	
	}
	public function get_location_id($location)
	{		
		unset($this->req_data);
		//if($colName=='location_id')
		$query="SELECT id FROM locations WHERE location_id = '$location'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->req_data=$rows['id'];					
			}						
			return $this->req_data;
		}
		else
			echo "<span class='label label-warning'>No location available.</span> ";	
	}
	public function get_location_by_id($id='')
	{		
		unset($this->user_data);
		if($id='site_factory')
			$query="SELECT site_factory,location_id FROM locations";			
		else
			$query="SELECT location_id FROM locations";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
			while($rows=$result->fetch_assoc()){
				$this->user_data[] = $rows;
			}			
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>".__FUNCTION__." error</span> ";	
	}
	
	public function convert_id_location($id){
		//unset($this->additional_data);
		//echo $id;
		$temp = explode(".", $id);
		//return $temp;
		//$data = array();
		//$data1 = array();
		$data = $this->get_location('',$temp[0]);

		if(count($temp)==2){
			$data1 = $this->get_micro_site((int)$temp[1]);
			return $data["site_factory"].'-'.$data1[0]['name'];
		}
		else{
			return $data["site_factory"];
		}
	}
	public function date_time()
	{
		unset($this->date);
		unset($this->time);
		date_default_timezone_set('Asia/Dacca');
		$this->date = date('d-m-Y H:i:s');
	}
	public function get_central_hub_admins()
	{		
		unset($this->user_data);
		
		$query="SELECT user_master.id,user_master.name 
		FROM user_master 
		INNER JOIN requisition_user
		ON requisition_user.user_id = user_master.id
		WHERE requisition_user.location_id = 'central' and post = 'Boss'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;		
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>"._FUNCTION_." error</span> ";	
	}
	public function get_req_log($req_id)
	{		
		unset($this->user_data);
		
		$query="SELECT * FROM admins WHERE req_id = '$req_id'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;		
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No log data available.</span> ";	
	}
	public function check_login_available($user_id)
	{				
		$query="SELECT * FROM user_login_details WHERE user_id = '$user_id'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		return $num_result;
	}
	public function add_department($department)
	{
		$department = $this->mysqli->real_escape_string($department);
		$query="INSERT INTO departments SET name='$department'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		echo "<span class='label label-success'>A new department added.</span> ";	
	}
	public function location_by_user($user_id)
	{		
		unset($this->user_data);
		
		$query="SELECT user_master.id,user_master.name 
		FROM user_master 
		INNER JOIN central_admins
		ON central_admins.user_id = user_master.id";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;		
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No location available.</span> ";	
	}
	public function user_from_highest_local_authority($user_id){
		unset($this->user_data);
		
		$query="SELECT location_id FROM highest_local_authority WHERE user_id	= '$user_id'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
				$this->user_data[]=$rows;		
			}	
			$array = array(
				"des" => "boss",
			);
			$this->user_data[] = $array;
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user_from_highest_local_authority available.</span> ";	
		return false;
	}
	public function user_from_requisition_user($user_id){
		unset($this->user_data);
		
		$query="SELECT location_id FROM requisition_user WHERE user_id = '$user_id'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){									
				$this->user_data[]=$rows;		
			}						
			return $this->user_data;
		}
		else
			echo "<span class='label label-warning'>No user_from_requisition_user available.</span> ";	
		return false;
	}
	public function user_from_user_by_location($user_id){
		unset($this->user_data);
		
		$query="SELECT location_id FROM user_by_location WHERE user_id = '$user_id'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){
									
				$this->user_data[]=$rows;		
			}			
			/*$array = array(
				"des" => "staff",
			);
			$this->user_data[] = $array;	*/		
			return $this->user_data;
		}
		else			
			return 0;
			//echo "<span class='label label-warning'>No user_from_user_by_location available.</span> ";	
	}
	public function getExtractedArray($arr,$key){
		//$this->comment_data = array();
		if(is_array($arr)){
			if(!array_key_exists($key, $arr)){
				extract($arr);
				foreach($arr as $arr1){
					//extract($da);
					$this->getExtractedArray($arr1,$key);
				}
			}
			else{
				$this->user_data_temp.= $arr[$key];
				$this->user_data_temp.= '|';
			}
		}
		return $this->user_data_temp;
	}
	public function get_all_user_location($user_id)
	{	
		unset($this->comment_data);
		unset($this->additional_data);
		unset($this->req_data);
		unset($this->user_data_temp1);
		unset($this->user_data_temp);
		$this->comment_data = array();
		if($this->user_from_requisition_user($user_id)){
			array_push($this->comment_data,$this->user_data);
		}
		/*if($this->user_from_user_by_location($user_id)){
			array_push($this->comment_data,$this->user_data);
		}*/
		return $this->comment_data;
	}
	public function getPost($user_id,$req_id){
		unset($this->user_data_temp1);
		$query="SELECT relation_to_req FROM admins WHERE admin_id = '$user_id' and req_id = '$req_id'";
				
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
					
		if($num_result>0){
				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp1=$rows;		
			}						
			return $this->user_data_temp1['relation_to_req'];
		}
		else
			return false;//echo "<span class='label label-warning'>No post for this user found.</span> ";	
	}
	public function getReqStatus($req_id,$user_id){
		unset($this->user_data_temp);
		$query="SELECT status FROM admins WHERE req_id = '$req_id' and admin_id = '$user_id'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp=$rows;		
			}						
			return $this->user_data_temp['status'];
		}
		else
			echo "<span class='label label-warning'>No status found for this requisition of this uesr.</span> ";
	}
	public function getReqStatusMain($req_id){
		unset($this->user_data_temp);
		$query="SELECT status FROM requisition WHERE id = '$req_id'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				return $rows['status'];		
			}						
		}
		else
			echo "<span class='label label-warning'>No status found for this requisition of this uesr.</span> ";
	}
				//'<button class="btn btn-small btn-warning" type="submit" id="decision" name="decision2" value="Review">Review</button><button class="btn btn-small btn-danger" type="submit" id="decision" name="decision3" value="Dismiss">Dismiss</button>'
	public function getButton($status){
		unset($this->user_data_temp1);		
		switch($status){
			case 'New':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Approved">Approve</button> <button class="btn btn-small btn-danger" type="submit" id="decision" name="decision1" value="Reject">Reject</button>'; 
				break;
			case 'Delivered':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Received">Received</button>';
				break;
			case 'Partially Delivered':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Partially Received">Partially Receive</button>';
				break;
			case 'Approved':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Delivered">Deliver</button>
					 <button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Partially Delivered">Partially Deliver</button>';
				break;
			case 'Clear From Accounts':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Delivered">Delivered</button>
					 <button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Partially Delivered">Partially Deliver</button>';
				break;
			case 'Received':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Document Delivered">Document Deliver</button>';
				break;
			case 'Document Delivered':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Document Received">Document Receive</button>';
				break;
			case 'Document Received':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Closed">Close</button>';
				break;
			case 'Partially Received':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Delivered">Deliver</button>
					 <button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Partially Delivered">Partially Deliver</button>';
				break;
			case 'Redirect':
				$this->user_data_temp1 = '<button class="btn btn-small btn-success" type="submit" id="decision" name="decision1" value="Approved">Approve</button> <button class="btn btn-small btn-danger" type="submit" id="decision" name="decision1" value="Reject">Reject</button>';
				break;
			case 'Closed':
			case 'View':
			case 'Reject':
				$this->user_data_temp1 = '';
				break;
		}	
		return $this->user_data_temp1;
	}
	public function checkBoss($req_id,$user_id){		
		unset($this->user_data_temp);
		$query="SELECT relation_to_req FROM admins WHERE req_id = '$req_id' and admin_id = '$user_id'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp=$rows;		
			}						
			if($this->user_data_temp['relation_to_req']=='Boss')
				return true;
			else
				return false;
		}
		else
			echo "<span class='label label-warning'>No admin found for this requisition.</span> ";
	}
	public function search_boss(){
		unset($this->user_data_temp);
		$query="SELECT * FROM requisition_user WHERE post = 'Boss' and location_id <> 'central'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp[]=$rows;		
			}						
			return $this->user_data_temp;
		}
		else
			echo "<span class='label label-warning'>No admin found for this requisition.</span> ";
	}
	public function get_boss_by_id($user_id){
		unset($this->user_data_temp1);
		$query="SELECT name FROM user_master WHERE id = '$user_id'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp1=$rows['name'];		
			}						
			return $this->user_data_temp1;
		}
		else
			echo "<span class='label label-warning'>No admin found for this requisition.</span> ";
	}
	public function add_boss_limit($user_id,$limit){
		$id = (int)$user_id;
		$lim = (int)$limit;
		$query="INSERT INTO money_limit SET limit = '$lim', user_id = '$id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		echo "<span class='label label-success'>Pm send successfully.</span> ";
	}
	public function location_id_to_name($location_id){
		unset($this->user_data_temp1);
		$temp = explode(".", $location_id);
		//var_dump($temp);
		//if(count($temp)>1){
		$query="SELECT site_factory,project,master FROM locations WHERE location_id = '$temp[0]'";			
			$result = $this->mysqli->query($query);		
			$num_result=$result->num_rows;		// determine number of rows result set 					
			if($num_result>0){				
				while($rows=$result->fetch_assoc()){									
					return $this->user_data_temp1=$rows['master']."->".$rows['project']."->".$rows['site_factory'];		
				}						
			}
			else
				echo "<span class='label label-warning'>".__FUNCTION__." error</span> ";
		//}
				
		if(count($temp)==2){			
			$query="SELECT name FROM micro_site WHERE id = '$temp[1]'";			
			$result = $this->mysqli->query($query);		
			$num_result=$result->num_rows;		// determine number of rows result set 					
			if($num_result>0){				
				while($rows=$result->fetch_assoc()){									
					$this->user_data_temp1.="->".$rows['name'];		
				}
			}
			else
				echo "<span class='label label-warning'>".__FUNCTION__." error</span> ";
			return $this->user_data_temp1;
		}
	}
	function insert_actual_cost($actual_cost,$req_id){
		/*echo $actual_cost.' '.$req_id;
		$actual_cost = (int)$actual_cost;
		$req_id = (int)$req_id;
		echo $actual_cost.' '.$req_id;
		var_dump($actual_cost);
		var_dump($req_id);*/
		$query="UPDATE requisition SET actual_cost_by_scm = '$actual_cost' where id = '$req_id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		echo "<span class='label label-success'>Actual cost set successfully by SCM.</span> ";
	}
	public function getMatCat(){
		unset($this->user_data_temp1);
		$query="SELECT id,name FROM material_category WHERE type = 'Category'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp1[]=$rows;		
			}						
			return $this->user_data_temp1;
		}
		else{
			$this->user_data_temp1[0]['id']= 0;
			$this->user_data_temp1[0]['name']= 'No category';
			return $this->user_data_temp1;
		}
	}
	public function id_to_category($mCat){
		unset($this->user_data_temp1);
		$query="SELECT name FROM material_category WHERE id = '$mCat'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp1=$rows['name'];		
			}						
			return $this->user_data_temp1;
		}
	}
	public function add_material($mCat,$mSubCat,$mName,$mUnit,$mDes,$mCPU){
		//echo $mCat." ".$mSubCat." ".$mName." ".$mUnit." ".$mDes." ".$mCPU;
		$Cat = $this->id_to_category($mCat);
		$SubCat = $this->id_to_category($mSubCat);
		//var_dump($cat);
		$mCat = $this->mysqli->real_escape_string($mCat);
		$mSubCat = $this->mysqli->real_escape_string($mSubCat);
		$mName = $this->mysqli->real_escape_string($mName);
		$mUnit = $this->mysqli->real_escape_string($mUnit);
		$mDes = $this->mysqli->real_escape_string($mDes);
		$mCPU = $this->mysqli->real_escape_string($mCPU);
		//if($category=='Category')
			$query="INSERT INTO material_master SET name = '$mName', category = '$Cat', subcategory = '$SubCat', measurment_unit = '$mUnit', m_description = '$mDes', cost_per_unit = '$mCPU'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		echo "<span class='label label-success'>Material category added successfully.</span> ";	
				
	}
	public function add_material_category($cName,$category,$cat){
		$cName = $this->mysqli->real_escape_string($cName);
		$category = $this->mysqli->real_escape_string($category);
		$cat = $this->mysqli->real_escape_string($cat);
		if($category=='Category')
			$query="INSERT INTO material_category SET name = '$cName', type = '$category'";
		else
			$query="INSERT INTO material_category SET name = '$cName', type = '$category', sub_cat_of = '$cat'";			
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
		echo "<span class='label label-success'>Material category added successfully.</span> ";	
				
	}
	public function getMatSubCat($cat){
		unset($this->user_data_temp);
		$query="SELECT id,name FROM material_category WHERE sub_cat_of = '$cat'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				$this->user_data_temp[]=$rows;		
			}						
			return $this->user_data_temp;
		}
		else{
			$this->user_data_temp[0]['id']= 0;
			$this->user_data_temp[0]['name']= 'No category';
			return $this->user_data_temp;
		}
	}
	public function updateCostingByLocalBoss($newCosting,$reqId){		
		$newCosting = $this->mysqli->real_escape_string($newCosting);		
		$query="update requisition SET costing = '$newCosting' where id = $reqId";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Costing updated.</span> ";
	}
	public function get_req_costing($req_id){
		unset($this->user_data_temp);
		$query="SELECT costing FROM requisition WHERE id = '$req_id'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){								
				return $rows['costing'];		
			}						
			return $this->user_data_temp;
		}
		else
			echo "<span class='label label-warning'>Requisition cosing is not set.</span> ";			
	}
	public function get_req_location($req_id){
		$query="SELECT location_id FROM requisition WHERE id = '$req_id'";			
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){				
			while($rows=$result->fetch_assoc()){									
				return $rows['location_id'];		
			}						
		}
		else
			echo "<span class='label label-warning'>Requisition location is not set.</span> ";
		
	}
	public function check_req_final_destination($req_id){
		$cost = $this->get_req_costing($req_id);
		$location = $this->get_req_location($req_id);
		return $this->determine_local_main($cost,$location);
		/*if($hub == 'local'){
			$this->send_to_hub($last_req_id,$location_id);
			$this->add_admin_local($location_id,$last_req_id);
			$this->add_user_to_admin_table($idusers,$last_req_id);				
		}
		else if($hub == 'central'){
			$this->add_user_to_admin_table($idusers,$last_req_id);	
			$this->send_to_hub($last_req_id,'central');
		}*/
	}
	public function checkLocal($location_id,$req_id){
		$locations = explode('|',$location_id);
		$req_location = $this->get_req_location($req_id);
		$isCentral = false;
		$isLocal = false;
		if(in_array('central',$locations))
			$isCentral = true;
		if(in_array($req_location,$locations))
			$isLocal = true;
		if($isCentral && $isLocal)
			return true;
		if($isLocal)
			return true;
		if($isCentral)
			return false;
		if(!$isCentral && !$isLocal)
			return false;
	}
	public function test($id){
		$idArr = array();
		//var_dump($idArr);
		$year = 2;
		$semester = 1;
		$roll = 4;
		$dept = 3;
		$temp = $semester+$roll+$dept;
		$yr = substr($id, 0, -$temp);
		$idArr['year'] = $yr;
		//array_push($idArr, $yr);
		//echo 'Year - '.$yr;
		//echo '</br>';
		$temp = $roll+$dept;
		$sm = substr($id, $year, -$temp);
		$idArr['semester'] = $sm;
		//array_push($idArr, $sm);
		//echo 'Semester - '.$sm;
		//echo '</br>';
		$rl = substr($id, $year+$semester, -$dept);
		$idArr['roll'] = $rl;
		//array_push($idArr, $rl);
		//echo 'Roll - '.$rl;
		//echo '</br>';
		$dpt = substr($id, $year+$semester+$roll);
		$idArr['dept'] = $dpt;
		//array_push($idArr, $dpt);
		return $idArr;
		//echo 'Dept - '.$dpt;
		/*echo '</br>';
		$temp = $semester+$roll+$dept;
		echo 'Dept - '.$sm;*/

		/*echo $yr;
		echo '</br>';
		echo $yr;
		echo '</br>';
		echo $yr;*/
		//print_r($arr);
		//var_dump($arr);
		//echo '</br>';
		//echo count($arr);
		echo '</br>';
	
	}
	public function input_stage($name,$instruction){	
		$name = $this->trimming(strtolower($name));	
		$instruction = $this->trimming(strtolower($instruction));	
		$query="INSERT INTO stages_of_requisition SET name='$name', instruction='$instruction'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
		echo "<span class='label label-success'>A new stage added.</span> ";
	}
	public function trimming($str){
		$str = ltrim($str);
		$str = rtrim($str);
		return $str;
	} 
	public function get_stage(){
		unset($this->user_data);
		$query="SELECT * FROM stages_of_requisition";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){								
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}		
		else
			echo "<span class='label label-warning'>No stage found.</span> ";				
	}
	public function get_single_stage($edit){
		unset($this->user_data);
		$query="SELECT * FROM stages_of_requisition WHERE id = '$edit'";
		
		$result = $this->mysqli->query($query);
		
		$num_result=$result->num_rows;		// determine number of rows result set 
				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){								
				$this->user_data[]=$rows;					
			}						
			return $this->user_data;
		}		
		else
			echo "<span class='label label-warning'>No stage found.</span> ";				
	}
	public function delete_stage($delete){
		//echo $delete;				
		$query="DELETE FROM stages_of_requisition WHERE id='$delete'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
		echo "<span class='label label-warning'>Deleted.</span> ";
	}	
	public function edit_stage($id,$name,$instructions){
		echo $name.' '.$instructions;		
		$query="update stages_of_requisition SET name = '$name',instruction = '$instructions' where id = '$id'";
		$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
		
		echo "<span class='label label-success'>Edited.</span> ";
	}
	public function getRelation($user_id,$req_id){
		$query="SELECT status FROM admins WHERE admin_id = '$user_id' and req_id ='$req_id'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){								
				return $rows['status'];					
			}						
		}		
		return false;
	}
	public function getUnitType(){	
		$query="SELECT name FROM unit_master";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){	
				//array_push($unit[0], $rows['name']);							
				$unit[] = $rows;					
			}		
			return $unit;				
		}		
		return false;
	}
	public function status_comparison($user,$main,$pst){
		//echo $pst;
		if($user=='Partially Delivered' && $main=='Partially Received')
			return true;
		if($user=='Delivered' && $main=='Received')
			return true;
		else if($user=='Partially Received' && $main=='Partially Delivered')
			return true;
		else if($user=='Partially Received' && $main=='Delivered')
			return true;
		else if($user=='New' && $main=='Redirect' && $pst=='Boss')
			return true;
		else if($user=='New' && $main=='Delivered')
			return true;
		else if($user=='New' && $main=='Partially Delivered')
			return true;
		else if($user=='New' && $main=='New' && $pst!='Raiser')
			return true;
		else if($user=='Approved' && $main=='Approved' && $pst=='SCM')
			return true;
		else if($user=='Approved' && $main=='Document Delivered' && $pst=='Accountant')
			return true;
		else if($user=='Document Received' && $main=='Document Received')
			return true;
		else
			return false;
		
	}
	public function insert_po($po_form,$req_id){
		$this->date_time();			
		$query="SELECT po_info FROM requisition where id = '$req_id'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){	
				//array_push($unit[0], $rows['name']);							
				$temp = $rows['po_info'];					
			}
			if($temp==''){	
				$temp1 = serialize($po_form);
				$query="update requisition SET po_info = '$temp1' where id = '$req_id'";
				$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
				echo "<span class='label label-success'>A new P.O added.</span> ";
			}
			else{
				$temp1 = serialize($po_form);
				//$temp2 = serialize($temp);
				//array_push($temp, $temp1);
				$temp.= '|'.$temp1;
				$query="update requisition SET po_info = '$temp' where id = '$req_id'";
				$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");
				echo "<span class='label label-success'>P.O updated.</span> ";
			}			
		}		
		return false;
	}
	public function getSingleEntityId($single_entity_master){
		//unset($this->user_data);
		$query="SELECT id FROM master_business where name = '$single_entity_master'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){							
				return $rows['id'];					
			}					
		}		
	    echo "<span class='label label-success'>No data found for single entity master.</span> ";
	}
	public function add_new_single_entity($single_entity_master,$single_entity){
		$id = $this->getSingleEntityId($single_entity_master);
		$fDigit = $id/10000;
		$finish = $id+9999;
		$current= 0;
		$newID = 0;
		//var_dump($finish);
		//return $fDigit;
		$query="SELECT id FROM projects WHERE id BETWEEN '$id' AND '$finish' ORDER by id DESC limit 1";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){							
				$current = (int)$rows['id'];					
			}
			$newID = $current + 10;
			$query="INSERT INTO projects SET name = '$single_entity', id = '$newID', master = '$single_entity_master'";
			$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");	
			echo "<span class='label label-success'>Entity added.</span> ";	
		}
		else{
			$final = $id + 10;						
			$query="INSERT INTO projects SET name = '$single_entity', id = '$final', master = '$single_entity_master'";
			$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
			echo "<span class='label label-success'>Entity added.</span> ";
			
		}
	}
	public function get_all_single_entity(){
		unset($this->user_data_temp);
		$this->get_all_masters('Single Entity');		
		$entity = (int)$this->user_data_temp[0]['id'];
		$finish = $entity + 9999;
		$query="SELECT name,id FROM projects WHERE id BETWEEN '$entity' AND '$finish'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){							
				$current[]= $rows;					
			}	
			return $current;		
		}
		else
			echo "<span class='label label-success'>Entity not found.</span> ";
	}
	public function add_new_single_entity_off_fac($id,$off_fac){
		//echo $id.' '.$off_fac;
		$id_name = explode('|',$id);
		//var_dump($off_fac);
		//return ;
		$query="SELECT name,master FROM projects WHERE id = '$id_name[0]'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){							
				$id_master[]= $rows;					
			}
			$final_id = $this->get_single_entity_final_id($id_name[0]);
			//var_dump($final_id);	
			//echo $off_fac.' '.$id_master[0]['name'].' '.$id_master[0]['master'].' '.$final_id;
			//return ;	
			$master_name = $id_master[0]['name'];
			$master = $id_master[0]['master'];	
			$query="INSERT INTO locations SET site_factory = '$off_fac', project = '$master_name', master = '$master', location_id = '$final_id', location_type = '$master'";
			$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted");		
			echo "<span class='label label-success'>Entity office/factory added.</span> ";
		}
		else{
			echo "<span class='label label-success'>Master Entity not found.</span> ";
			return ;
		}		
	}
	public function get_single_entity_final_id($id){		
		$limit = $id + 9;
		$query="SELECT location_id FROM locations WHERE location_id BETWEEN '$id' AND '$limit' ORDER BY location_id DESC limit 1";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){							
				return $rows['location_id']+1;					
			}			
		}
		else
			return $id + 1;
	}
	public function is_single_entity($location_id){	
		$query="SELECT location_type FROM locations WHERE location_id = '$location_id'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){
				$location_type = $rows['location_type'];				
			}				
			if(strtolower($location_type)=='single entity')	
				return true;	
		}
		else
			return false;
	}
	public function poOff($status){
		switch($status){
			case "Received":					
			case "Delivered":		
			case "Document Delivered":		
			case "Document Received":		
			case "Closed":
				return false;
				break;
			default:
				return true;
				break;			
		}
	}
	public function form_unserialized($po_info){
		$temp = explode('|',$po_info);
		foreach($temp as $t){
			$temp1 = unserialize($t);
			array_splice($temp1, -1);
			$temp2[] = $temp1;
		}
		return $temp2;
	}
	public function get_central_acc_scm(){		
		$query="SELECT user_id FROM requisition_user WHERE location_id = 'central' and post BETWEEN 'Accountant' AND 'SCM'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){
				$uid[] = $rows['user_id'];				
			}
			return $uid;	
		}
		else
			return false;
	}
	public function acc_scm_to_site_fact_office($user_id,$location_id){
		$query="INSERT INTO acc_scm_to_office SET user_id = '$user_id', location_id = '$location_id'";
			$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted. error- ".__FUNCTION__);		
			echo "<span class='label label-success'>Entity office/factory added.</span> ";
	}
	public function user_home_page_authorization($user_id){
		$query="SELECT post FROM requisition_user WHERE user_id = '$user_id'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 					
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){
				$uPost[] = $rows['post'];				
			}
			//var_dump($uPost);
			if(in_array('Hub Admin',$uPost)||in_array('Hub',$uPost))
				return false;	
			else 
				return true;
		}
		else
			return false;
	}
	public function update_delivery_date($req_id){
		$temp = '';
		$this->date_time();
		$dt = $this->date;	
		$query="SELECT delivery_date FROM requisition WHERE id = '$req_id'";		
		$result = $this->mysqli->query($query);		
		$num_result=$result->num_rows;		// determine number of rows result set 				
		if($num_result>0){			
			while($rows=$result->fetch_assoc()){
				$dDate = $rows['delivery_date'];
				var_dump($dDate);	
				//var_dump($temp);				
			}			
			if($dDate!='')
				$temp.=$dDate.'|'.$dt;
			else
				$temp = $dt;		
			$query="update requisition SET delivery_date = '$temp' where id = '$req_id'";
			$result = $this->mysqli->query($query) or die(mysqli_connect_errno()."Data cannot be inserted. error- ".__FUNCTION__);	
			echo 'date updated.';
		}	
		else			
			echo "<span class='label label-warning'>No requisition found under this id.</span> ";		
	}
}	
?>