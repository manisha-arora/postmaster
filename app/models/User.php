<?php
class User extends Model implements ModelInterface {
  protected $table = 'users';
  public function __construct(){
    parent::__construct();
  }
  
  public function fullName(){
    return $this->fname.' '.$this->lname;
  }

 /* public function findUserByUsernameAndPassword($username, $password){
    $query = "SELECT * FROM $this->table WHERE username = '$username' and password = '$password'";
    return $this->db->execute($query);
  }*/
}
