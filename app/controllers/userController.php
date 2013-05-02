<?php
class userController extends Controller{
 
   public function __construct(){
    parent::__construct();
    gateway();
    $this->data['window_title']='Edit Profile';
   }
  
  public function index(){
    $this->render('user/profile.php');
  }
 
  public function setting(){
   $this->data['form_title'] = 'Edit Profile';
   $this->render('user/profile.php');
   }
   
   public function viewUserInfo(){
   $user=new User();
   $id=get_input('id');
   $data_array=$user->get(array('id'=>$id));
   $this->data['form_title']=$data_array[0]->fullName();
   $this->data['user']=$data_array;
   $this->render('user/viewuserinfo.php');
   }
  
   public function updateProfile(){
   	global $CONFIG;
    $user=new User();
	$form=get_input('form');
	$data_array= array(
	'fname' => $form['fname'], 
	'lname' => $form['lname'],
	'dob' => $form['dob']['y'].'-'.$form['dob']['m'].'-'.$form['dob']['d'],
	'about' => $form['about'],
	'address' => $form['address']);
	 $user_upload_destination = $CONFIG['site']['profile'].'/'.get_session_user()->id;
	 $expected_file_name = time().'.'.get_file_extentions($_FILES['form']['name']['picture']);
	  mkdir($user_upload_destination);
	  
	  if(move_uploaded_file($_FILES['form']['tmp_name']['picture'],$user_upload_destination.'/'.$expected_file_name)){
	     $data_array['picture'] = $expected_file_name;
}

	if($user->update($data_array,array('id'=>$form['id']))){
          refresh_session_user();
	  register_message("Your profile has been updated ");
        }
      forward(get_url(array('user','setting')));
    }
}
