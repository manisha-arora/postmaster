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
   public function profile(){
   $this->data['form_title'] = 'User Profile';
   $user =  new User();
   $this->render('user/user_profile.php');
   //$result = mysql_query("SELECT * FROM users where id ='". get_session_user()->id."'");
   
 
//while($row = mysql_fetch_assoc($result)){
//echo "fname: ".$row['fname'].", last Name:".$row['lname']
//.", dob:".$row['dob'].", about:".$row['about']."<br/>";
//}
  
   	
   }
   public function updateProfile(){
   	global $CONFIG;
        $user=new User();
	$form=get_input('form');
	print_r($form);
	$data_array= array(
	'fname' => $form['fname'], 
	'lname' => $form['lname'],
	'about' => $form['about'],
	'address' => $form['address']);
	 $user_upload_destination = $CONFIG['site']['uploads'].'/'.get_session_user()->id.'/profile';
	  
	  $expected_file_name = time().'.'.get_file_extentions($_FILES['form']['name']['picture']);
	  mkdir($user_upload_destination);
	  mkdir($user_upload_destination);
	  
	  if(move_uploaded_file($_FILES['form']['tmp_name']['picture'],$user_upload_destination.'/'.$expected_file_name)){
	     $data_array['picture'] = $expected_file_name;
	  }

	if($user->update($data_array,array('id'=>$form['id']))){
          refresh_session_user();
	  register_message("Your profile has been updated ");
        }
      forward("index.php?controller=user&action=setting");
    }
}
