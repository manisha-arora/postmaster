<?php
class userController extends Controller{
 
   public function __construct(){
    parent::__construct();
	$this->data['window_title']='Edit Profile';
   }
   public function index(){
    $user = new User();
    $this->data['user'] = $user;
    $this->render('user/profile.php');
  }

  public function setting(){
   $this->data['form_title'] = 'Edit Profile';
   $this->render('user/profile.php');
   }
   
   public function editProfile(){
    $user=new User();
	$form=get_input('form');
	$data_array= array('fname' => $form['fname'], 'lname' => $form['lname'],'about' => $form['about']);
	if($user->update($data_array,array('id'=>$form['id']))){
	register_message("User info. has been updated ");
    }
    forward("index.php?controller=user");
    }
}