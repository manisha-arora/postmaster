<?php
class lableController extends Controller{
  
  public function __construct(){
    parent::__construct();
    gateway();
    $this->data['window_title'] = 'Labels Management';
    $this->data['form_title']='Labels Management';
  }
  public function index(){
    $lab = new Lable();
    $this->data['lables']=$lab->get(array('user_id' => get_session_user()->id));
    $this->render('lable/manage_labels.php');
   }
 
    public function add(){
    $form=get_input('form');
	$error=false;
	if(isset($form['add_update'])){
      if(empty($form['name'])){
      register_message(" Lable Name must be provided.","error");
	  $error=true;
	  }
	   if($error){
      forward(get_url(array('lable')));
	   }
    $lable= new Lable();
    $data_array= array('name' => $form['name'], 'user_id' => get_session_user()->id);
    if($lable->insert($data_array)){
      register_message("Label has been added successfully.");
    }else{
      register_message("Some error in the database, Please try later.", 'error');
    }
   }
    forward(get_url(array('lable')));
    }

   public function edit(){
     $action = get_input('action');
     $form = get_input('form');
     $id = get_input('id',$form['id']);
     
     $lable=new Lable();
     if(isset($form['add_update'])){
       $data_array['name'] = $form['name'];
       if($lable->update($data_array,array('id' => $id))){
        register_message("Label has been updated successfully.");
        forward(get_url(array('lable')));
       }
      }

      if($id){
        $this->data['edit_lable'] = $lable->get(array('id' => $id));
      }

      $this->data['lables']=$lable->get(array('user_id'=>get_session_user()->id));
      $this->render('lable/manage_labels.php');
   }
   
  public function delete(){
    $id=get_input('id');
    $lable=new Lable();
    if($lable->delete(array('id'=>$id))){
      register_message("Label has been deleted successfully.");
    }
    forward(get_url(array('lable')));
  }
}
