<?php
/*
 * Die index.php Datei ist der Einstiegspunkt des MVC. Hier werden zuerst alle
 * vom Framework benötigten Klassen geladen und danach wird die Anfrage dem
 * Dispatcher weitergegeben.
 *
 * Wie in der .htaccess Datei beschrieben, werden alle Anfragen, welche nicht
 * auf eine bestehende Datei zeigen hierhin umgeleitet.
 */

 //set Error Reporting
 error_reporting(-1);
 ini_set('display_errors', 'On');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  // Start session
  if(!isset($_SESSION))session_start();

  //set Constants
  require_once __DIR__ .'/../Setup/const.php';

  // load files

  function load_dir($PATH){
    if ($handle = opendir($PATH)) {
      while (false !== ($entry = readdir($handle))) {
        if($entry == "autoload.php"){
          require_once $PATH . $entry;
          return true;
        }
      }
    }
    if ($handle = opendir($PATH)) {
    while (false !== ($entry = readdir($handle))) {
      $info = pathinfo($entry);
       if($entry != ".." && $entry != "."){
         if(is_dir($PATH . $entry)){
           load_dir($PATH . $entry . "/");
         }elseif($info['extension'] == "php"){
           require_once $PATH . $entry;
         }
       }
     }
   }else return false;
  }

  // Load Dispatcher
  load_dir(DISPATCHER_PATH);

  // Load Controlers
  load_dir(CONTROLLER_PATH);

  // Load Models
  load_dir(MODEL_PATH);

  // Dispach
  use M184\Dispatcher\Dispatcher;
  Dispatcher::dispatch();


 ?>
