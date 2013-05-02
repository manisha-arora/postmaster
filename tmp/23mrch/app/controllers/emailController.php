<?php
class emailController extends Controller{
  
  public function __construct(){
    gateway();
    parent::__construct();
    $this->data['window_title'] = "Email box";
  }

  public function index(){
    $label_id = get_input('label_id',0);
    $label=new Lable();
    $label_array=$label->get(array('id' => $label_id));        
    $this->data['form_title'] = (!$label_id)?"Inbox":$label_array[0]->name;
    $email = new Email();
    $this->data['email']=$email->getEmailsByLableId($label_id);//$email->get($query_array);
    $this->render('email/inbox.php');
  }
  
  public function showMessage(){
     $email=new Email();
	 $id=get_input('id');
	 $data_array=$email->get(array('id'=>$id));
	 $this->data['form_title']=$data_array[0]->subject;
	 $this->data['email']=$data_array;
	 $this->render('email/message.php');
	 }
  public function sent(){
    $this->data['form_title'] = "Sent mails";
    $email = new Email();
    $this->data['email']=$email->getSentEmails(); //$email->getEmailsByLableId($label_id);
    $this->render('email/sent.php');
  }
 
 
  public function compose(){
    global $CONFIG;
    $form = get_input('form');
    if(isset($form['send'])){
     if(empty($form['subject'])){
      register_message("Subject is mandatory field.", "error");
     }
      $db_array = array(
       'subject' => $form['subject'], 
        'body' => $form['message'], 
        'to_id' => $form['user_id'], 
        'from_id' => get_session_user()->id , 
        'label_id' => 0,
      );
	  $user_upload_destination =$CONFIG['site']['uploads'].'/'.get_session_user()->id;
	  $expected_file_name = $_FILES['form']['name']['attachment'];
	  mkdir($user_upload_destination);
	  
	  if(move_uploaded_file($_FILES['form']['tmp_name']['attachment'],$user_upload_destination.'/'.$expected_file_name)){
	     $db_array['attachment'] = $expected_file_name;
	  }
	  
      $email = new Email();
     if($email->insert($db_array)){
       register_message("Your email has been sent successfully.");
       forward("index.php?controller=email");
     }else{
       register_message("Critical bug in the system.", "error");
     }
    }
     $user = new User();
    $this->data['users'] = $user->get();
    $this->data['form_title'] = 'Compose new email';
    $this->render('email/compose.php');
  }
/*public function subject(){
	 $email=new Email();
	 echo "<pre>";
	 print_r($email);
	 $this->data['users'] = $user->get(array('id' => $id));
	 echo "<pre>";
	 print_r($user);
	 print_r($this);
	 
	 
	
	
}*/
  public function delete(){
    $form=get_input('form');
    $email=new Email();
    if($form['action'] == 'Delete'){
      if($email->removeMultipleByid($form['check_id'])){
        register_message("Email has been deleted.");
      }
    }elseif($form['action'] == 'Move'){
      $data_array = array('label_id' => $form['label_id']);
     if($email->moveMultipleEmailByLableid($data_array,$form['check_id'])){
        register_message("Email has been moved to seleced label.");
      }
     }
    forward("index.php?controller=email");
  }
}
