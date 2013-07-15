<?php
		include('relevant_search.php');
		
		//setting db options
		$dbopt['host']="10.91.64.32";
		$dbopt['login']="tester";
		$dbopt['pass']="awesome";
		$dbopt['dbname']="dash";
		
		//Setting the relations between tables
		$t['s']=array(      // 's' is synonym for table 'usb_segment'
			"name"=>"usb_segment",
			"out"=>array( //an array of output colums. After search their name will be for example "s_biz_en". TableName_ColumnName.
				'biz_en',
				'subsegment'
			),
			"links"=>array( //an array of links. In this table we have one link to the table 'xref' linked like s.id=xref.segment_id
				"xref"=>array(
					"local"=>"id",
					"foreign"=>"segment_id"
				)
			)
		);
		
		$t['xref']=array(
			"name"=>"usb_functionality_segment_xref",
			"out"=>array(),
			"links"=>array(
				"s"=>array(
					"local"=>"segment_id",
					"foreign"=>"id"
				),
				"f"=>array(
					"local"=>"functionality_id",
					"foreign"=>"id"
				)
			)
		);
		
		$t['f']=array(
			"name"=>"usb_functionality",
			"out"=>array(
				'name','short_desc'
			),
			"links"=>array(
				"xref"=>array(
					"local"=>"id",
					"foreign"=>"functionality_id"
				),
				"b11"=>array(
					"link"=>"id",
					"with"=>"b_xref_id"
				)
			)
		);
		$t['MB']=array(
			"name"=>"MANAGER_BASE",
			"out"=>array(
				"uname",
				"tabl_num",
				"fio",
				"key_shtat",
				"office",
				"otdel",
				"inn",
				"region_id",
				"id_group",
				"working",
				"hierarchy",
				"id"
		
			),
			"links"=>array(
			)
		);
		$t['MI']=array(
			"name"=>"MANAGER_INFO",
			"out"=>array(
				"tabl_num",
				"phone_work",
				"phone_mob",
				"phone_fax",
				"phone_int",
				"e_mail",
				"jabber",
				"last_update"
		
			),
			"links"=>array(
				"MB"=>array(
					"local"=>"tabl_num",
					"foreign"=>"tabl_num"
				)
			)
		);
		
		//create new RelevantSearch
		$db=new Search($dbopt,$t);
		//setting relation between General params. Can be 'or' or 'and'
		$db->setType("or");

                //Link tables. For example MI is linked to MB. 
		$db->Join("MB");
		$db->Join("MB.MI");
		//adding General Search parameters. Table, column_name, operator, value, rate_of_relevantion		
		$db->addGeneral("MB","fio","like","Tim",1.1);
		$db->addGeneral("MB","inn",">",0,1.1);
		//adding Bonus Search parameters.  Table, column_name, operator, value, rate_of_relevantion		
		$db->addSecondary("MB","key_shtat","like","Dir",0.7);
		
		print__r($db->find());
		
