<?php

session_start();
include('Engine'.DIRECTORY_SEPARATOR.'boot.php');
$controller = get_input('controller', $CONFIG['site']['default_controller']).'Controller';
$action = get_input('action', 'index');
$id = get_input('id');
$controller_object = new $controller();
$controller_object->$action();
