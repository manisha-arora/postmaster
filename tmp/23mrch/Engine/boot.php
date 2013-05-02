<?php
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');
require_once('Database.php');
require_once('ModelInterface.php');
require_once('Model.php');
require_once('Controller.php');
require_once('helpers.php');
require_once('lib.php');
function __autoload($class_name) {
  global $CONFIG;
  $controller_path = $CONFIG['site']['app_path'].DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$class_name.'.php';
  $model_path = $CONFIG['site']['app_path'].DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.$class_name.'.php';
  if(file_exists($model_path)){
    require_once($model_path);
  }elseif(file_exists($controller_path)){
    require_once($controller_path);
  }
}
