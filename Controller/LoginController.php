<?php
namespace M184\Controller;
/**
 *
 */
class LoginController
{
  private $login_state = false;
  private $UserController;


  function __construct()
  {
    $this->UserController = new UserController();
     if(isset($_POST['username']) && isset($_POST['password'])){
       if($this->UserController->login($_POST['username'], $_POST['password'])){
         require '../View/logined.php';
       }else {
         require_once '../View/login.php';
       }
    }else{
    require_once '../View/login.php';
    }
  }
}

 ?>
