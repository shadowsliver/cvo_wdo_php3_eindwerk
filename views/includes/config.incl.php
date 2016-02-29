<?php
include 'views/includes/session.incl.php';
include 'views/includes/settings.incl.php';
include_once './controllers/Controller.php';
$controller = new Controller();

//Error Messaging
if($controller->GetProperties()->debugging == 1){
    error_reporting(E_ALL);
    ini_set("display_error", $controller->GetProperties()->debugging);
    include 'views/includes/error_handler.incl.php';
}else{
    error_reporting(0);
}