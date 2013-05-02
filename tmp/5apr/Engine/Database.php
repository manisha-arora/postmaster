<?php
class Database{
  private $link;
  private $db_credentials;
  
  public function __construct($db_params){
    $default = array('db_hostname' => 'localhost');
	$db_final_params = array_merge($default, $db_params);
	if(!(isset($db_final_params['db_username']) &&
		isset($db_final_params['db_name']))){
		throw new Exception("db_username, db_name are mandatory parameters!");
	}
	$this->db_credentials = $db_final_params;
    $this->connect();
  }
  
  public function execute($sql_query = false){
    if(!$sql_query){
	  throw new Exception("You must pass a valid query!");
	}
	if(preg_match("/select/i", $sql_query, $matches)){
	  $query_handler = mysql_query($sql_query);
	  while($row = mysql_fetch_assoc($query_handler)){
	    $rows[] = $row;
	  }
	   return $rows;
	}else{
	  mysql_query($sql_query);
	  if(preg_match("/insert/i", $sql_query)){
	    return mysql_insert_id();
	  }elseif(preg_match("/delete/i", $sql_query)){
	    return mysql_affected_rows();
	  }elseif(preg_match("/update/i", $sql_query)){
	    return mysql_affected_rows();
	}
  }
}
  private function connect(){
    $this->link = mysql_connect($this->db_credentials['db_hostname'], $this->db_credentials['db_username'], $this->db_credentials['db_password']);
 	mysql_select_db($this->db_credentials['db_name']);
  }
}