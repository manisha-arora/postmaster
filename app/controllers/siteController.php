<?php
class siteController extends Controller{
  public function index(){
    $this->data['window_title'] = 'Email project';
    $this->data['form_title'] = 'Our Vision';
    $this->render('site/pages/home.php');
  }
  public function login(){
      $form = get_input('form');
      $user = new User();
      
      $data_array = array(
         'username' => $form['username'], 
         'password' => md5($form['password'])
      );
      $user_array = $user->get($data_array);
      $user_object = $user_array[0];
    if($user_object->id){
       $_SESSION['is_user_logged_in'] = serialize($user_object);
       register_message("Successfully logged in.");
       forward(get_url(array('email')));
      }else{
       register_message("Wrong username/password. Try again.", 'error');
       forward(get_url(array('site')));
    }
  }
  public function signin(){
    $this->render('site/login.php');
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
	    register_message('Dob must be enter','info');
		$error=true;
	  }
      
	  if($error){
        forward(get_url(array('site','creating_new_account')));
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
		forward(get_url(array('email')));
      }
      $this->render('site/new_account.php');
    }
  
    public function contactus(){
      $this->data['window_title'] = 'Contact Us';
      $this->data['form_title'] = 'Contact Us';
	  $form=get_input('form');
	  $contact_us = new Contact();
	  $error=false;
	  if(isset($form['send'])){
        if(empty($form['name'])){
         register_message("Name must be entered.","error");
	      $error=true;
	  }
	  if(empty($form['email'])){
         register_message("Email must be given.","error");
	      $error=true;
	  }
	  if(empty($form['phone'])){
         register_message("phone no. must be given.","error");
	      $error=true;
	  }
	  if($error){
      forward(get_url(array('site','contactus')));
	  }
      $data_array= array('name'=>$form['name'],
	  'email'=> $form['email'],
	  'ph'=> $form['phone'],
	  'sms'=> $form['sms']);
	  
	  if($contact_us->add($data_array)){
          register_message("You have been successfully  contacted us");
      }
	  forward(get_url(array('site','contactus')));
	 }
      $this->render('site/pages/contactus.php');
    }
	
    public function aboutus(){
      $this->data['window_title'] = 'About Us';
      $this->data['form_title'] = 'About Us';
      $this->render('site/pages/aboutus.php');
    }
    public function products(){
      $this->data['window_title'] = 'Our products';
      $this->data['form_title'] = 'Products we are dealing in!';
      $this->data['right_sidebar'] = null;
      $this->render('site/pages/products.php');
    }
}
