<?php
//path definition
if(defined("CONTROLLER_PATH") !== TRUE)     define("CONTROLLER_PATH",__DIR__. "/../Controller/");
if(defined("DISPATCHER_PATH") !== TRUE)     define("DISPATCHER_PATH", __DIR__. "/../Dispatcher/");
if(defined("MODEL_PATH") !== TRUE)     define("MODEL_PATH", __DIR__. "/../Model/");
if(defined("VIEW_PATH") !== TRUE)     define("VIEW_PATH", __DIR__. "/../View/");


//Database
if(defined("DB_HOST") !== TRUE)     define("DB_HOST", "localhost");
if(defined("DB_USERNAME") !== TRUE)     define("DB_USERNAME", "");
if(defined("DB_PASSWORD") !== TRUE)     define("DB_PASSWORD", "");
if(defined("DB_DATABASE") !== TRUE)     define("DB_DATABASE", "");


 ?>
