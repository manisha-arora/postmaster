<?php
class welcomeController extends Controller{
  public function index(){
    $this->render("welcome/index.php", array('my_content' => 'Wow this is welcome page.'));
  }
}
