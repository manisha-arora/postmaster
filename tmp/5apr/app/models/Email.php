<?php
class Email extends Model implements ModelInterface {
  protected $table = 'emails';
  public function __construct(){
    parent::__construct();
  }
  
  public function getFormattedTime(){
    $date = get_formatted_date($this->created_on);
    return date("d, F Y",mktime(0,0,0,$date['m'],$date['d'],$date['y'],$this->created_on));
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
    $query = "select u.fname, u.lname, e.* from users u, {$this->table} e where e.to_id = u.id AND  e.from_id=".$logged_in_user->id;
      return $this->returnObjects($this->db->execute($query));
  }

  public function getEmailsByLableId($lable_id = 0){
    $logged_in_user = get_session_user();
    $query = "select u.fname, u.lname, e.* from users u, {$this->table} e where e.from_id = u.id";
      $query .= " and label_id = $lable_id and e.to_id = ".$logged_in_user->id;
      return $this->returnObjects($this->db->execute($query));
  }
  
  public function getSenderName($id){     
     $logged_in_user = get_session_user();
     $query = "select u.fname, u.picture,u.lname, e.* from users u, {$this->table} e WHERE e.from_id=u.id and e.id=$id and e.to_id=" .$logged_in_user->id;
       return $this->returnObjects($this->db->execute($query));
  }
   
  public function getRecieverName($id){
    $logged_in_user = get_session_user();
    $query = "select u.fname,u.picture,u.lname, e.* from users u, {$this->table} e WHERE e.to_id=u.id and e.id=$id and e.from_id=" .$logged_in_user->id;
       return $this->returnObjects($this->db->execute($query));
  } 
 
  public function searchMailBySubject($form){
    $logged_in_user = get_session_user();
    $query = "select u.fname,u.lname,u.id as uid,e.* from users u,emails e where ((e.to_id=u.id and e.from_id=$logged_in_user->id) or (e.from_id=u.id and e.to_id=$logged_in_user->id)) and fname like '{$form}%'";
	
	//subject like '%{$form}%'"
 
    //$query = "select * from emails where subject like '%have%'";
    return $this->returnObjects($this->db->execute($query));
  } 
}