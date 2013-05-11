<?php
class Contact extends Model{
  protected $table = 'contact';
  public function __construct(){
    parent::__construct();
  }
  
  public function add($params=array()){
    if(count($params)){
    foreach($params as $column => $value){
	    $columns[] = $column;
		$values[] = is_numeric($value)?$value:"'".$value."'";
	  }
          $columns = implode(",",$columns);
	      $values = implode(",",$values);
	      $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
	     return $this->db->execute($query);
	}
  }
 }