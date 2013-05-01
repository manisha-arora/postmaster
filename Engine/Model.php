<?php
abstract class Model{
  protected $db;
  public function __construct(){
    global $CONFIG;
    $connection_string = array(
		'db_username' => $CONFIG['db']['username'], 
		'db_password' => $CONFIG['db']['password'], 
		'db_hostname' => $CONFIG['db']['host'], 
		'db_name' => $CONFIG['db']['name']);
		$this->db = new Database($connection_string);
  }
  
  public function FindUser($params=array()){
       if($params['username'] != 'username' && $params['password'] != 'password'){
	      echo "<h3> Please Verify Username Or Password";
	} 
	   foreach($params as $column => $value){
         $query_elements[] = "{$column} = '{$value}'";
      }
	     $where = implode(" and ", $query_elements); 
	     $query = "SELECT * FROM {$this->table} where {$where}";
          return $this->db->execute($query);
  }
  
  public function insert($params = array()){
    if(count($params)){
	  foreach($params as $column => $value){
	    $columns[] = $column;
		$values[] = is_numeric($value)?$value:"'".$value."'";
	  }
          $columns[]='created_on';
          $values[]='now()';
	  
          $columns = implode(",",$columns);
	      $values = implode(",",$values);
	  $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
	  return $this->db->execute($query);
	}
  }

  // this function is deprecated for further use.
  public function getAll(){
    $query = "SELECT * FROM {$this->table}";
    return  $this->returnObjects($this->db->execute($query));
  }
  
  // future use of this function would be always with array
  // $object->get(array('id' => <value>));
  public function get($params = null){
    $query = "SELECT * FROM {$this->table}";
    if($params && !is_array($params)){
      $query .= " WHERE id = $params";
    }elseif($params){
     foreach($params as $attribute => $a_value){
        $columns[] = $attribute .'='. (is_numeric($a_value)?$a_value:"'".$a_value."'");
     }
     $sub_query = implode(" and ", $columns);
     if(count($columns)){
      $query .= " WHERE ".$sub_query;
     }
    }
    $query .= ' ORDER BY id desc';
    
    $objects = $this->returnObjects($this->db->execute($query));
    return  $objects;
  }

  public function returnObjects($data_array){
	  $objects = array();
	  $class_name = get_class($this);
	  foreach($data_array as $row){
		$tmp_object = new $class_name;
		foreach($row as $attribute => $attribute_value){
		  $tmp_object->$attribute = $attribute_value; 
		}
		$objects[] = $tmp_object;
	  }
	  return $objects;
  }

  public function delete($params = array()){
    if(count($params)){
      foreach($params as $column => $value){
        $query_elements[] = "{$column} = '{$value}'";
      }
      $where = implode(" and ", $query_elements); 
      $query = "DELETE FROM {$this->table} where {$where}";
      return $this->db->execute($query);
    }
  }
  public function update($params=array(),$where=array()){
    foreach($params as $column=>$value){
      $query_elements[] = "{$column} = '{$value}'";
    }
    $columns = implode(", ", $query_elements);
    $query= "update {$this->table} set $columns";
    if(count($where)){
      foreach($where as $wcolumn => $wvalue){
        $where_elements[] = "{$wcolumn} = '{$wvalue}'";
      }
      $final_where = implode(" and ", $where_elements);
      $query .= " WHERE $final_where";
    }
    return $this->db->execute($query);
  }
	   
  public function getHTMLTable(){
    $table_rows = $this->getAll();
    return print_table($table_rows);
 }}
