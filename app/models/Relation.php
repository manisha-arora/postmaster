<?php
class Relation extends Model implements ModelInterface {
  protected $table = 'relations';
  public function __construct(){
    parent::__construct();
  }
}
