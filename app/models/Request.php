<?php
class Request extends Model implements ModelInterface {
  protected $table = 'relations';
  public $type = 'friend';
  public function __construct(){
    parent::__construct();
  }

 public function send($from_id, $username){
   $query_array = array('username' => $username);
   $user_object = new User();
   $user = $user_object->get($query_array);
   if(count($user)){
     $to_id = $user[0]->id;
     $data_array = array(
       'type' => $this->type,
       'from_id' => $from_id,
       'to_id' => $to_id,
     );
    $request_id = $this->insert($data_array);
    if(mysql_errno()){
      return array('success' => false,'error_no' => mysql_errno());
    }
    return array('success' => true, 'id' => $request_id);
   }// count if closed
   return array('success' => false, 'error_no' => 7736);
 }

 public function accept($id, $my_id){
   $data_array = array('status' => 1);
   return $this->update($data_array, array('id' => $id, 'to_id' => $my_id));
 }

 public function reject($id, $my_id){
   return $this->delete(array('id' => $id, 'to_id' => $my_id));
 }

  public function pending($my_id){
    return $this->get(array('to_id' => $my_id,'status' => 0));
  }
 
  public function pendingRequest(){
    $logged_in_user = get_session_user();
    $query="SELECT u.fname,u.lname,u.picture,u.id,r.* from {$this->table} r,users u WHERE r.from_id=u.id and status=0 and r.to_id=" . $logged_in_user->id;
	return $this->returnObjects($this->db->execute($query));
  } 
  
  public function showFriendList(){
    $logged_in_user = get_session_user();
    $query="SELECT u.fname,u.lname,u.picture,u.id,r.id as rid from {$this->table} r,users u WHERE (r.status=1 and r.to_id=u.id and r.from_id=$logged_in_user->id) or (r.from_id=u.id and r.status=1 and r.to_id=$logged_in_user->id)";
      return $this->returnObjects($this->db->execute($query));
  }

 public function isThereAFriendRequest($to_username){
    $logged_in_user = get_session_user();
    $user_query = "SELECT id from users where username = '{$to_username}'";
    $user_objects = $this->returnObjects($this->db->execute($user_query));
    $to_id = $user_objects[0]->id;
    $query="SELECT u.id from {$this->table} r,users u WHERE  r.from_id=u.id and (r.to_id={$to_id} and r.from_id={$logged_in_user->id}) or (r.to_id = {$logged_in_user->id} and r.from_id={$to_id})";
    return (bool) count($this->db->execute($query));
  } 

  public function isFriend(){
    $logged_in_user = get_session_user();
    $query="SELECT u.fname,u.lname,u.id, r.id as rid from {$this->table} r,users u WHERE r.status=1 and r.from_id=u.id and (r.to_id={$logged_in_user->id} or r.from_id={$logged_in_user->id})";
    return (bool) count($this->db->execute($query));
  } 
}
