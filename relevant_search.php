<?php

/**
 * Relevant Search
 * 
 */
ini_set('display_errors', 1);
class RelevantSearch {
	public $return=array();
	public $db;
	public $type;
	public $generalQ=array();
	public $restriction=array();
	public $searchParams=array();
	public $select=array();
	public $tables=array();
	public $links=array();
	public $addedTables=array();
	/**
	 * Making connection with DB, setting UTF-8 relation 
	 * and deafault General params relation type
	 *
	 * @param array $dbopt
	 */
	public function __construct($dbopt) {	
		$this->db = new PDO("mysql:host=".$dbopt['host'].";dbname=".$dbopt['dbname'], $dbopt['login'], $dbopt['pass']);
		$this->db->exec('SET NAMES UTF8');
		$this->type='or';
	}
	/**
	 * Adding table to the search query
	 *
	 * @param string $name - table name
	 * @param string $as - synonym of table
	 */
	public function addTable($name,$as) {
		$this->tables[]=array("name"=>$name,"as"=>$as);
		$this->addedTables[]=$as;
	}
	/**
	 * Add field wich will be selected for output
	 *
	 * @param string $base	- table name
	 * @param mixed $name	- column name
	 */
	public function addSelect($base,$name) {
		if(is_array($name)) {
			foreach($name as $el) {
				if(!array_key_exists($base.".".$el,$this->select))
				$this->select[$base.".".$el]=$base.".".$el." ".$base."_".$el;
			}
		} 
	}
	/**
	 * Add link between tables
	 *
	 * @param string $base1 - table1 where linking (where linking condition is placed)
	 * @param string $link1 - column in table1 wich linked
	 * @param string $base2	- table2 with what linking
	 * @param string $link2	- column in table2 wich linked
	 */
	public function addLink($base1,$link1,$base2,$link2) {
		$this->links[$base1]=$base1.".".$link1."=".$base2.".".$link2;
	}
	/**
	 * Adding Restriction to search
	 *
	 * @param string $table - table name
	 * @param string $name	- column name
	 * @param string $oper	- operator
	 * @param string $value	- value
	 * @param bool $date	- make date transformation
	 * @param bool $date_format	- date format
	 */
	public function addRestriction($table,$name,$oper,$value,$date=false,$date_format="") {
		switch($oper) {
			case ">":
				$this->restriction[$table][]="$table.$name>$value";
				break;
			case "<":
				$this->restriction[$table][]="$table.$name<$value";
				break;
			case "<=":
				$this->restriction[$table][]="$table.$name<=$value";
				break;
			case ">=":
				$this->restriction[$table][]="$table.$name>=$value";
				break;
			case "=":
				$this->restriction[$table][]="$table.$name='$value'";
				break;
			case "!=":
				$this->restriction[$table][]="$table.$name!='$value'";
				break;
			case "like":
				$this->restriction[$table][]="$table.$name like '".trim($value)."%'";
				break;
			case "between":
				if($date) {
					$this->restriction[$table][]="$table.$name between '".date($date_format,strtotime(trim($value[0])))."' and '".date($date_format,strtotime(trim($value[1])))."'";
				} else {
					$this->restriction[$table][]="$table.$name between '".trim($value[0])."' and '".trim($value[1])."'";
				}
				break;
		}
		
	}
	/**
	 * Adding General Search param
	 *
	 * @param string $table - table name
	 * @param string $name	- column name
	 * @param string $oper	- operator
	 * @param string $value	- value
	 * @param float $rate	- relevant rate
	 * @param bool $date	- make date transformation
	 * @param bool $date_format	- date format
	 */
	public function addGeneral($table,$name,$oper,$value,$rate,$date=false,$date_format="") {		
		$false=false;
		if(!is_array($value) && $date) $value=date($date_format,strtotime(trim($value)));
		switch($oper) {
			case ">":
				$this->generalQ[]="$table.$name>$value";
				break;
			case "<":
				$this->generalQ[]="$table.$name<$value";
				break;
			case "<=":
				$this->generalQ[]="$table.$name<=$value";
				break;
			case ">=":
				$this->generalQ[]="$table.$name>=$value";
				break;
			case "=":
				$this->generalQ[]="$table.$name='$value'";
				break;
			case "!=":
				$this->generalQ[]="$table.$name!='$value'";
				break;
			case "like":
				$this->generalQ[]="$table.$name like '".trim($value)."%'";
				break;
			case "between":
				if($date) {
					$this->generalQ[]="$table.$name between '".date($date_format,strtotime(trim($value[0])))."' and '".date($date_format,strtotime(trim($value[1])))."'";
				} else {
					$this->generalQ[]="$table.$name between '".trim($value[0])."' and '".trim($value[1])."'";
				}
				break;
			default:
				$false=true;
				break;		
		}
		if(!$false) {
			$this->addSelect($table,array($name));
			$this->searchParams[$table."_".$name][]=array($oper,$value,$rate,$date);
		}
	}
	/**
	 * Adding Bonus Search param
	 *
	 * @param string $table - table name
	 * @param string $name	- column name
	 * @param string $oper	- operator
	 * @param string $value	- value
	 */
	public function addSecondary($table,$name,$oper,$value,$rate,$date=false) {
		$this->addSelect($table,array($name));
		$this->searchParams[$table."_".$name][]=array($oper,$value,$rate,$date);
	}
	/**
	 * Setting type of relation between General Search params
	 *
	 * @param string $type - 'or' or 'and'
	 */
	public function setType($type) {
		$this->type=$type;
	}
	/**
	 * Make query and sort it by relevantion
	 *
	 * @return array - array of fetched query data sorted by relevantion
	 */
	public function make() {
	$first=array_shift($this->tables);
		$FROM=$first["name"]." ".$first["as"];
		$JOINS='';		
		foreach($this->tables as $table) {
			$RESTRICT=(count($this->restriction[$table['as']])>0)?" and (".implode(" and ",$this->restriction[$table['as']]).")":"";
			if(strlen($RESTRICT)>0) {$JOIN=" JOIN ";} else {$JOIN=" LEFT JOIN ";}
			$JOINS.=$JOIN.$table['name']." ".$table['as']." on (".$this->links[$table['as']].$RESTRICT.")";	
		}
		$sql=
		"		
		SELECT DISTINCT ".implode(",",$this->select)." from ".$FROM.$JOINS."
		WHERE
		( ".implode(" ".$this->type." ",$this->generalQ)." )
		";
		$query=$this->db->query($sql);
		$res=$query->fetchAll();
		$this->doRelevant($res);
		krsort($this->return);
		return $this->return;
	}
	/**
	 * Sort fetched query by relevantion
	 *
	 * @param array $data - fetched query data
	 */
	private function doRelevant($data) {
		foreach($data as $el) {
			$rel=0;
			foreach($this->searchParams as $k=>$v) {
				foreach($v as $val) {
					switch($val[0]) {
						case ">":
							if($el[$k]>$val[1]) $rel+=$val[2];
							break;
						case "<":
							if($el[$k]<$val[1]) $rel+=$val[2];
							break;
						case "<=":
							if($el[$k]<=$val[1]) $rel+=$val[2];
							break;
						case ">=":
							if($el[$k]>=$val[1]) $rel+=$val[2];
							break;
						case "=":
							if($el[$k]==$val[1]) $rel+=$val[2];
							break;
						case "!=":
							if($el[$k]!=$val[1]) $rel+=$val[2];
							break;
						case "like":
							if(mb_eregi("^".$val[1]."",trim($el[$k]))) $rel+=$val[2];
							break;
						case "between":
							if($val[3]) {
							if(strtotime($el[$k])>=strtotime(trim($val[1][0])) &&  strtotime($el[$k])<=strtotime(trim($val[1][1]))) $rel+=$val[2];
							} else {
								if($el[$k]>=trim($val[1][0]) &&  $el[$k]<=trim($val[1][1])) $rel+=$val[2];
							}
							break;
						
					}		
				}	
			}
			$this->return[(string)$rel][]=$el;
		}
	}
	
}
/**
 * Search
 * 
 */
class Search extends RelevantSearch {
	
	public $tableData=array();
	public $linked_to_table=array();
	/**
	 * Set DB connect params and tables info 
	 *
	 * @param array $dbopt - db params
	 * @param array $tables - array of tables information
	 */
	public function __construct($dbopt,$tables) {
		parent::__construct($dbopt);
		$this->tableData=$tables;
	}
	/**
	 * Join the table to the search
	 *
	 * @param string $table - table name with linking table like "table_linked_to.table"
	 */
	public function Join($table) {
		if(eregi("\.",$table)){
			$tabls=explode(".",$table);
			$this->addTable($this->tableData[$tabls[1]]['name'],$tabls[1]);
			if(strlen($tabls[0])>0) {	
				$this->linked_to_table[$tabls[1]]=$tabls[0];
			}
		} else {
			$this->addTable($this->tableData[$table]['name'],$table);
		}
		
	}
	/**
	 * Run search query
	 *
	 * @return array - sorted array of data sorted by relevant desc
	 */
	public function find() {
		foreach($this->addedTables as $table) {
			$this->addSelect($table,$this->tableData[$table]['out']);
			if(array_key_exists($table,$this->linked_to_table)) {
				$this->addLink(
				$table,
				$this->tableData[$table]["links"][$this->linked_to_table[$table]]['local'],
				$this->linked_to_table[$table],
				$this->tableData[$table]["links"][$this->linked_to_table[$table]]['foreign']
				);
			}
		}
		
		return $this->make();
	}
	
	
	
	
}