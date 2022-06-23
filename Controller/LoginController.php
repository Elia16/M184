<?php
namespace M184\Controller;
/**
 *
 */
class LoginController
{
  $db;
  $login_state = false;


  function __construct()
  {
    $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
     if(isset($_POST['username']) && isset($_POST['password'])){

    }else{
    require_once '../View/login.php';
    }
  }
}

 ?>
