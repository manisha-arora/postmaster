<?php
class Email extends Model implements ModelInterface {
  protected $table = 'emails';
  public function __construct(){
    parent::__construct();
  }
  
  public function removeMultipleByid($array_of_id = null ){
    $ids = implode(",", $array_of_id);
    $query = "DELETE FROM $this->table WHERE id in ($ids)";  
    return $this->db->execute($query);
  }

  public function moveMultipleEmailByLableid($data, $array_of_id){
    $ids = implode(",", $array_of_id);
    $query = "UPDATE $this->table SET label_id=".$data['label_id']." WHERE id in ($ids)";
	return $this->db->execute($query);
  }

  public function getSentEmails(){
    $logged_in_user = get_session_user();
    $query = "select u.fname, u.lname, e.* from users u, {$this->table} e where e.to_id = u.id AND e.from_id=".$logged_in_user->id;
      return $this->returnObjects($this->db->execute($query));
  }

  public function getEmailsByLableId($lable_id = 0){
    $logged_in_user = get_session_user();
    $query = "select u.fname, u.lname, e.* from users u, {$this->table} e where e.from_id = u.id";
      $query .= " and label_id = $lable_id and to_id = ".$logged_in_user->id;
      return $this->returnObjects($this->db->execute($query));
  }
}
