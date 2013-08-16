<?php 
	include_once "user.php";
	include_once "relevant_search.php";
	$test = new User();
	var_dump($test->master_log("this is the test message 3!!!","theKeyword3"));
	//if($temp)
	//$temp = "মাত্র এক বছরের মধ্যেই বিশ্বের সবচেয়ে উঁচু ভবনের দিক থেকে দ্বিতীয় অবস্থানে চলে যাচ্ছে দুবাইয়ের বুর্জ খলিফা। ইতোমধ্যে চীনে সবচেয়ে উঁচু ভবন স্কাই সিটি নির্মাণ কাজ শুরু হয়েছে। আর মাত্র দশ মাসেই এই ভবনের নির্মাণ কাজ শেষ করার পরিকল্পনা গ্রহণ করা হয়েছে। খবর সিএনএন'র।";
		//var_dump(utf8_encode(utf8_encode($temp)));
	//else
		//echo 'false';
	//explode('|',$test->get_user_req_stage_urgent('SCM'));
	//var_dump($temp);
	//var_dump($test->get_request_list_by_urgent(0,5,24,$temp));
	//echo $temp[2];
	/*$po = 'a:14:{s:2:"id";s:3:"122";s:4:"poNo";s:4:"1212";s:8:"poAmount";s:2:"16";s:6:"amount";s:4:"Unit";s:6:"poCost";s:4:"6200";s:9:"poDetails";s:16:"i got 8%discount";s:4:"date";s:19:"27-06-2013 14:25:44";s:8:"poSubmit";s:6:"Submit";s:8:"__cfduid";s:43:"d41af1be040c368c3f4b85761f5eed9411370857570";s:9:"PHPSESSID";s:32:"d613fcddf963e5c71eaf50a2a8ec5d3e";s:6:"__utma";s:55:"239603743.1205956686.1370857574.1372257576.1372318614.7";s:6:"__utmb";s:26:"239603743.35.10.1372318614";s:6:"__utmc";s:9:"239603743";s:6:"__utmz";s:70:"239603743.1370857574.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)";}';
	$temp = explode('|',$po);
	$pos = strpos($temp[0], 'Submit');
	
	var_dump($pos);
	var_dump($temp);*/
	//var_dump($test->total_user_req_list(24));
	/*$matCatSub = $test->getMatSubCat(1);
	foreach($matCatSub as $subcat){
		extract($subcat);
		echo "<option value=".$id.">".$name."</option>"; 	
	}*/
	exit;
	return ;
	$temp = $test->id_to_catagory($item_id);
	foreach($temp as $d){
			extract($d);
			echo $id.' '.$name.' '.$type.' '.$sub_cat_of.' '.$date_added; 
			echo '</br>';
		}
	//var_dump($test->get_local_accountant('central',91));
	
?>