<?php 
class Controller{
  public $data = null;

  public function __construct(){
    $lable_object = new Lable();
    $this->data['labels'] = $lable_object->get();
  }
  function render($work_area,$data = null){
    global $CONFIG;
    if(!$data){
     $data = $this->data;
    }
    //extract($data);
    include($CONFIG['site']['app_path'].DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$CONFIG['site']['page_shell']);
  } 
}
