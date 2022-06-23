<?php
namespace M184\Controller;
/**
 *
 */
class DefaultController
{
  $db;
  function __construct()
  {
    $this->db = new \mysql();
      if($this->valid_token() === true){
        header("Location: /home");
        exit();
      }else {
        header("Location: /login");
        exit();
      }
  }
  function valid_token(){
    if(isset($_SESSION['token'])){

    }else{
      return false;
    }

  }
}

 ?>
