<?php
function is_user_logged_in(){
  $session_user = get_session_user();
  return isset($session_user->id)?true:false;
}

function get_session_user(){
  return unserialize($_SESSION['is_user_logged_in']);
}

function web_root(){
  global $CONFIG;
  return $CONFIG['site']['web_root'];
}

function refresh_session_user(){
  $user = new User();
  $user_object_array = $user->get(array('id' => get_session_user()->id));
  $_SESSION['is_user_logged_in'] = serialize($user_object_array[0]);
}

function forward($url){
  header("Location: $url");
  exit;
}

function gateway(){
  if(!is_user_logged_in()){
    forward(web_root());
  }
}


// register_message("Your record has been added.");
function register_message($message, $type = 'success'){
    if(!preg_match("/success|error|info/", $type)){
      throw new Exception("Not a valid message type.");
    }
    $_SESSION[$type][] = $message;
}

function return_message($type = 'success'){
  if(!preg_match("/success|error|info/", $type)){
    throw new Exception("Not a valid message type.");
  }
  $message_array = $_SESSION[$type];
  unset($_SESSION[$type]);
  return $message_array;
}

function get_file_extentions($filename){
  return end(explode(".",$filename));
}
