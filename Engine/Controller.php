<?php
class Controller{
  public $data = null;

  public function __construct(){
   global $CONFIG;
    $lable_object = new Lable();
    $request_object = new Request();
    $email=new Email();
    $this->data['labels'] = $lable_object->get(array('user_id' => get_session_user()->id));
    $this->data['requests'] = $request_object->pendingRequest();
    $this->data['controller'] = $this;
    $this->data['right_sidebar'] = $CONFIG['site']['right_sidebar'];
  }
  
  function render($work_area,$data = null){
    global $CONFIG;
    if(!$data){
     $data = $this->data;
    }
    extract($data);
    include($CONFIG['site']['app_path'].DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$CONFIG['site']['page_shell']);
  } 
}
