<?php
class adminController extends Controller{
  
  public function __construct(){
    parent::__construct();
    $this->data['window_title'] = 'Admin panel';
    $this->data['form_title']='Admin panel';
  }
  
  public function index(){
    if(!admin_gateway()){
      register_message("You are not authorized to access this page.", "error");
      forward(web_root());
    }
    else{
	$user=new User();
	$this->data['user']=$user->getAll();
	$this->render('admin/adminpanel.php');
   }
}
   public function delete(){
     $user=new User();
	 $id=get_input('id');
	if($user->delete(array('id'=>$id))){
		register_message('User has been deleted');
	}
	  forward('index.php?controller=admin');
  }
   public function edit(){
    $user=new User();
    $id=get_input('id');
    $this->data['user']=$user->get(array('id'=>$id));
	$this->render('admin/update_user.php');
   }
   
   public function updateUser(){
     $user=new User();
	 $id=get_input('id');
	 $form=get_input('form');
	 $data_array= array(
	 'fname' => $form['fname'], 
	 'lname' => $form['lname'],
	 'about' => $form['about'],
	 'password' => md5($form['password']),
	 'is_admin' => $form['is_admin']);
     if($user->update($data_array,array('id'=>$id))){
	   register_message("User Info. has been updated ");
	 }
	  forward('index.php?controller=admin');
   }
 }	