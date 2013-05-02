<?php
class User extends Model{
  protected $table = 'users';
  public function __construct(){
    parent::__construct();
  }
  
  public function fullName(){
    return ucwords($this->fname.' '.$this->lname);
  }
}
