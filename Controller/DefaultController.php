<?php
namespace M184\Controller;
/**
 *
 */
class DefaultController
{
  private $UserController;
  function __construct()
  {
    $this->UserController = new UserController();
      if($this->UserController->verify_token() === true){
        header("Location: /home");
        exit();
      }else {
        header("Location: /login");
        exit();
      }
  }
}

 ?>
