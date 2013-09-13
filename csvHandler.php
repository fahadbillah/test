<?php
if(isset($_REQUEST['osType'])){
	if($_REQUEST['osType']==1)
		$osType = 'iphone';
	else
		$osType = 'android';	
}
$row = 1;
$xmlArr = array ();
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;
$root = $doc->createElement('array');
$root = $doc->appendChild($root);
if (($handle = fopen("app.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {		
		if($row!=1 && $osType==$data[1]){
			$item = $doc->createElement('item');
			$item = $root->appendChild($item);
		}
		for($i=0;$i<count($data);$i++){	
			if($row==1)
				$xmlArr[$i] = $data[$i];
			else{					
				if($osType==$data[1]){					
					$elment = $doc->createElement(trim($xmlArr[$i]));
					$elment = $item->appendChild($elment);
					
					$text = $doc->createTextNode(trim($data[$i]));
					$text = $elment->appendChild($text);
					
				}
			}
		}
    $row++;	
	}
	$doc->save($osType.".xml");
    fclose($handle);
	header('Location: http://www.lilait.com/squid/'.$osType.'.xml');
}
?> 