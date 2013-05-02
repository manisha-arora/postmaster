<?php
class requestController extends Controller{
  public function __construct(){
    parent::__construct();
  }

  public function send(){
    $request_object = new Request();
    $form = get_input('form');
    // 7736
    if($request_object->isThereAFriendRequest()) {
      register_message("Sorry! Your previous request is still pending to be accepted.", "info");
    }else{
      $status = $request_object->send(get_session_user()->id, $form['username']);
      if($status['success']){
        register_message("Your request has been sent successfully.");
      }elseif(!$status['success'] && $status['error_no'] == 7736){
        register_message("Sorry! Given username is not available.", "info");
      }elseif(!$status['success'] && $status['error_no'] == 1062){
        register_message("Sorry! You already sent a request to corresponding user.");
      }
    }
    forward($_SERVER['HTTP_REFERER']);
  }

  public function acceptReject(){
    $request_object = new Request();
    $form = get_input('form');
    if(isset($form['accept']) && $form['accept'] == 'Accept'){
      $request_object->accept($form['id'], get_session_user()->id);
      register_message("You have accepted this request.");
    }elseif(isset($form['reject']) && $form['reject'] == 'Reject'){
      $request_object->reject($form['id'], get_session_user()->id);
      register_message("You have rejected this request.");
    }
    forward('index.php?controller=request&action=pending');
  }
 
    public function pending(){
     $this->data['form_title'] = 'Friend Requests';
     $this->data['window_title'] = 'Request Channel';
	 $request=new Request();
	 $this->data['requests']=$request->pendingRequest();
     $this->render('request/pending_request.php');
	}
	
	public function friends(){
	 $request=new Request();
	 $user=new User();
	 $this->data['window_title'] = 'Friends Management';
	 $id=get_session_user()->id;
	 $name=$user->get(array('id' => $id));
	 $this->data['form_title'] = $name[0]->fullName() . ' '.'Friends';
	 $this->data['friends']=$request->showFriendList();
	 $this->render('friend/friends.php');
    }
   
   public function delete(){
    $request=new Request();
	$id=get_input('id');
	$data=array('id'=>$id);
	if($request->delete($data)){
	 register_message('your friend has been deleted..');
	}
    forward('index.php?controller=request&action=friends');	
   }	
}
