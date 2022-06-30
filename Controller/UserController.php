<?php
namespace M184\Controller;
/**
 *
 */
class UserController
{

  private $DAO;

  function __construct()
  {
    $this->DAO = new DAO();

  }
  function login($username, $password){
    $pass = $this->DAO->getUser($username);
    if($pass !== false){
      if(password_verify($pass, $password)){
        $token = new \M184\Model\TokenHolder();
        $token->generate();
        $this->DAO->setToken($username, password_hash($token->getToken(), PASSWORD_DEFAULT));
        $_SESSION['token'] = $token->getToken();
        $_SESSION['username'] = $username;
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }
  function verify_token(){
      return $this->DAO->verify_token($_SESSION['username'], $_SESSION['token']);
  }
}

 ?>
