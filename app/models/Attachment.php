<?php
class Attachment extends Model implements ModelInterface {
  protected $table = 'attachments';
  public function __construct(){
    parent::__construct();
  }
}
