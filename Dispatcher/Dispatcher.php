<?php
namespace M184\Dispatcher;
class Dispatcher
{
    /**
     * Diese Methode wertet die Request URI aus leitet die Anfrage entsprechend
     * weiter.
     */

     public static function dispatch()
     {
         $path = new Path();
         if(isset($_GET['code'])){
             $fbController = new \Tomferrara\Controller\FacebookController();
             $fbController->getUser();
             $fbController->singIn();
           }

         switch ($path->getPage()) {

           default:
             $controllerName = 'DefaultController';
             break;
         }

         $className = 'M184\\Controller\\'.$controllerName;
         // Eine neue Instanz des Controllers wird erstellt
         $controller = new $className();
     }
}

 ?>
