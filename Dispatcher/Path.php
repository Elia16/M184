<?php
namespace M184\Dispatcher;
class Path{

  private $pathParts;
  private $pagesArray = array("default");
  private $versionsArray = array("v1","v2","v3");
  private $apiControllerArray = array();

  private $version;
  private $apiController;
  private $page;
  private $number;
  private $partsLeft = array();

  public function __construct(){
    if(isset($this->pagesArray)){
    $this->pathParts=explode("/", $_SERVER['REQUEST_URI']);
    foreach ($this->pathParts as $key => $part) {
      if(in_array($part, $this->pagesArray))
      {
        $this->page = $part;
      }elseif (is_numeric($part)) {
        $this->number = $part;
      }elseif(in_array($part, $this->versionsArray))
      {
        $this->version = $part;
      }elseif(in_array($part, $this->apiControllerArray))
      {
        $this->apiController = $part;
      }else {

        }
      }
    }
  }



public function getPage(){
  return $this->page;
}
public function getNumber(){
  return $this->number;
}
public function getApiController(){
  return $this->apiController;
}
public function getVersion(){
  return $this->version;
}
public function getParts(){
  return $this->pathParts;
}


}
 ?>
