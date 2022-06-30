<?php

namespace M184\Controller;

/**
 * PHP version 7.3.33
 */
class DAO
{
  private $mysqli;
  function __construct()
  {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $this->mysqli = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if(!$this->mysqli) die ('<strong>Fatal Database Error!</strong><br>please reload to retry');
  }

  public function getUser($username)
  {
    $sql = "SELECT `password` FROM `users` WHERE `username`=?";
    $stmt = $this->mysqli->stmt_init();
    if ($stmt = $this->mysqli->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $res = $stmt->get_result();
        $stmt->close();
        while ($row = $res->fetch_assoc()) {
          return $row['password'];
        }
        return false;
      }
    }
    public function setToken($username, $token){
      $sql = "UPDATE `users` SET `token`=? WHERE `username`=?";
      $stmt = $this->mysqli->stmt_init();
      if ($stmt = $this->mysqli->prepare($sql)) {
          $stmt->bind_param("ss", $username, $token);
          $stmt->execute();
          $stmt->close();

          return true;
    }
    return false;

  }
  public function verify_Token($username, $token){
    $sql = "SELECT `token` FROM `users` WHERE `username`=?";
    $stmt = $this->mysqli->stmt_init();
    if ($stmt = $this->mysqli->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $res = $stmt->get_result();
        $stmt->close();
        while ($row = $res->fetch_assoc()) {
          if(password_verify($row['token'], $token)){
            return true;
          }
        }
        return false;
      }
}
}

 ?>
