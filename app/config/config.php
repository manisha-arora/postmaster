<?php
global $CONFIG;
$CONFIG['db']['username'] = 'project';
$CONFIG['db']['password'] = 'project';
$CONFIG['db']['host'] = 'localhost';
$CONFIG['db']['name'] = 'manisha_anju';
$CONFIG['site']['default_controller'] = 'site';
$CONFIG['site']['root'] = dirname(dirname(dirname(__FILE__)));

$CONFIG['site']['app_path'] = $CONFIG['site']['root'].DIRECTORY_SEPARATOR.'app';
$CONFIG['site']['uploads'] = $CONFIG['site']['root'].DIRECTORY_SEPARATOR.'uploads';
$CONFIG['site']['page_shell'] = 'page_shell.php';
$CONFIG['site']['right_sidebar'] = 'sidebar/right.php';
$CONFIG['site']['web_root'] = 'http://priya.iz/';
$CONFIG['Engine'] = $CONFIG['site']['root'].DIRECTORY_SEPARATOR.'Engine';
