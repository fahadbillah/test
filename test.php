<title></title>
<?php 
	include_once "user.php";
	$test = new User();
	//print_r($_REQUEST);
	/*$pst ='SCM';
	if($pst=='SCM' && $test->poOff('Approved'))
		echo 'wow';
	else 
		echo 'noooo';	*/
	$po_info = 'a:8:{s:2:"id";s:3:"105";s:4:"poNo";s:6:"test 1";s:8:"poAmount";s:3:"324";s:6:"amount";s:2:"pc";s:6:"poCost";s:7:"1243441";s:9:"poDetails";s:7:"newwwww";s:4:"date";s:19:"01-06-2013 01:02:46";s:8:"poSubmit";s:6:"Submit";}|a:8:{s:2:"id";s:3:"105";s:4:"poNo";s:5:"test1";s:8:"poAmount";s:3:"324";s:6:"amount";s:2:"kg";s:6:"poCost";s:7:"1243441";s:9:"poDetails";s:5:"wwwww";s:4:"date";s:19:"01-06-2013 01:03:04";s:8:"poSubmit";s:6:"Submit";}';
	var_dump($test->form_unserialized($po_info));
	//var_dump($test->location_id_to_name('60011'));
	//echo $test->user_data_temp[0]['id'];
	//$test->get_all_single_entity();
	/*$id = (int)$test->getBossByLocation('10011.5');
	//echo $id;
	$this->req_data=*/
?>