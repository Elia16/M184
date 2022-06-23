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
    $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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
