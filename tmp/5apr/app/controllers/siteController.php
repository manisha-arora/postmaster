<?php
class siteController extends Controller{

  public function index(){
    $data['window_title'] = 'Email project';
    $data['form_title'] = 'Welcome on Zmail';
    $this->render('site/home.php',$data);
  }
  public function login(){
      $form = get_input('form');
      $user = new User();
      
      $data_array = array(
         'username' => $form['username'], 
         'password' => md5($form['password'])
      );
      $user_array = $user->get($data_array);//$user->findUser($form);
      $user_object = $user_array[0];
    if($user_object->id){
       $_SESSION['is_user_logged_in'] = serialize($user_object);
       register_message("Successfully logged in.");
       forward("index.php?controller=email");
      }else{
       register_message("Wrong username/password. Try again.", 'error');
       forward("index.php?controller=site");
    }
  }

  public function logout(){
    unset($_SESSION['is_user_logged_in']);
    forward(web_root());
  }
  public function creating_new_account(){
    $this->data['form_title'] = "Create new account!";
    $error = false;
    $form=get_input('form');
    if(isset($form['signup']) && $form['signup'] == 'Signup'){
      // validations
      if(empty($form['username'])){
        register_message("Username must be provided.","error");
        $error=true;
      }
      if($form['password'] != $form['cpassword']){
        register_message("Password/Confirm Password must be same.","error");
        $error=true;
      }
      if(empty($form['fname'])){
	    register_message("Name must be given","error");
		$error=true;
	  }	
	  if($form['dob']['y'] == 0 && $form['dob']['m'] == 0 && $form['dob']['d'] ==0){
	    register_message('Dob must be enter','error');
		$error=true;
	  }
      
	  if($error){
        forward("index.php?controller=site&action=creating_new_account");
      }

      $user= new User();
      $data_array= array('fname'=>$form['fname'],
	  'lname' =>  $form['lname'],
	  'dob' =>  $form['dob']['y'].'-'.$form['dob']['m'].'-'.$form['dob']['d'],
	  'username' =>  $form['username'],
	  'password'=> md5($form['password']));
        if($user->insert($data_array)){
          register_message("You have been successfully signed up.");
        }
		forward('index.php?controller=email');
      }
      $this->render('site/new_account.php');
    }
}
