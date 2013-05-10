<?php
class emailController extends Controller{
  
  public function __construct(){
    gateway();
    parent::__construct();
    $this->data['window_title'] = "Email box";
  }

  public function index(){
    $label_id = get_input('id',0);
    $label=new Lable();
    $label_array=$label->get(array('id' => $label_id));        
    $this->data['form_title'] = (!$label_id)?"Inbox":$label_array[0]->name;
    $email = new Email();
    $this->data['email']=$email->getEmailsByLableId($label_id);
    $this->render('email/inbox.php');
  }
  
  public function searchMail(){
   $info=false;
   $form=get_input('form');
   $this->data['form_title'] ="Resulting Mail";
   $this->data['window_title']='Search Mail';
   if(isset($form['search'])){
     if(empty($form['subject'])){
     register_message('Please enter subject or name','info');
     $info=true;
    }
     if($info){
	 forward(get_url(array('email')));
    }
   }
   $email=new Email();
   $data_array=$email->searchMailBySubjectOrName($form['subject']);
   if(!$data_array[0]->subject){
     register_message("Such mail not exist", "error");
     forward(get_url(array('email')));
   }
    $this->data['emails']=$data_array;
    $this->render('email/resulting_Mail.php');
  }
   
  public function showInboxMessage(){
    $email=new Email();
    $id=get_input('id');
    $data_array=$email->getSenderName($id);
    if(!$data_array[0]->fname){
      register_message("Unauthorized actions are not allowed.", "error");
      forward(get_url(array('email')));
    }
    $this->data['form_title']=$data_array[0]->subject;
    $this->data['email']=$data_array;
    $this->render('email/inbox_message.php');
  }
	 
  public function showSentMessage(){
     $email=new Email();
     $id=get_input('id');
     $data_array=$email->getRecieverName($id);
	 if(!$data_array[0]->subject){
      register_message("Unauthorized actions are not allowed.", "error");
      forward(get_url(array('email')));
    }
     $this->data['form_title']=$data_array[0]->subject;
     $this->data['email']=$data_array;
     $this->render('email/inbox_message.php');
   }	 
 
   public function sent(){
     $this->data['form_title'] = "Sent mails";
     $email = new Email();
     $this->data['email']=$email->getSentEmails(); 
     $this->render('email/sent.php');
   }

   public function compose(){
    global $CONFIG;
	$error=false;
    $form = get_input('form');
    if(isset($form['send'])){
     if(empty($form['subject'])){
      register_message("Subject is mandatory field.", "error");
	  $error=true;
     }
      $db_array = array(
       'subject' => $form['subject'], 
        'body' => $form['message'], 
        'to_id' => $form['user_id'], 
        'from_id' => get_session_user()->id , 
        'label_id' => 0,
      );
	  $user_upload_destination =$CONFIG['site']['uploads'].'/'.get_session_user()->id;
	  $expected_file_name = time().'.'.get_file_extentions($_FILES['form']['name']['attachment']);
	  mkdir($user_upload_destination);
	  
	  if(move_uploaded_file($_FILES['form']['tmp_name']['attachment'],$user_upload_destination.'/'.$expected_file_name)){
	     $db_array['attachment'] = $expected_file_name;
	  }
	  if($error){
        forward(get_url(array('email','compose')));
      }
      $email = new Email();
     if($email->insert($db_array)){
       register_message("Your email has been sent successfully.");
       forward(get_url(array('email')));
     }else{
       register_message("Critical bug in the system.", "error");
     }
    }
    $request = new Request();
    $this->data['request'] = $request->showFriendList();
    $this->data['form_title'] = 'Compose new email';
    $this->render('email/compose.php');
  }

  public function delete(){
    $form=get_input('form');
	$error=false;
    $email=new Email();
	$error=false;
	 if(isset($form['action'])){
     if(empty($form['check_id'])){
      register_message("No message selected. Please select at least one message and try again.", "error");
	  $error=true;
     }
    elseif($form['action'] == 'Delete'){
      if($email->removeMultipleByid($form['check_id'])){
        register_message("Email has been deleted.");
      }
    }elseif($form['action'] == 'Move'){
      $data_array = array('label_id' => $form['label_id']);
     if($email->moveMultipleEmailByLableid($data_array,$form['check_id'])){
        register_message("Email has been moved to seleced label.");
      }
    }	
   }
    forward(get_url(array('email')));
  }
}