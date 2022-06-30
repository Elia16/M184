<?php
namespace M184\Model;

/**
 *
 */
class TokenHolder
{
  private $id;
  private $uid;
  private $token;
  private $tokenHash;
  private $created_at;
  private $expire;

  function __construct(){

  }
  public function generate(){
        $this->token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i<100; $i++) {
            $this->token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        $this->tokenHash = password_hash($this->token, PASSWORD_DEFAULT);
        return $this->token;
  }
  private function crypto_rand_secure($min, $max)
  {
    $range = $max - $min;
    if ($range < 1) return $min;
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1;
    $bits = (int) $log + 1;
    $filter = (int) (1 << $bits) - 1;
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
    } while ($rnd > $range);
    return $min + $rnd;
}



  public function getTokenHash()
  {
    return $this->tokenHash;
  }
  public function getToken()
  {
    return $this->token;
  }
  public function getUID()
  {
    return $this->uid;
  }
  public function getExpire()
  {
    return $this->expire;
  }
  public function getCreated_at()
  {
    return $this->created_at;
  }
  public function setUID($UID){
    $this->uid = $UID;
  }
}
