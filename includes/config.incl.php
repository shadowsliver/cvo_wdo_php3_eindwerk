<?php
include 'includes/session.incl.php';
include 'includes/settings.incl.php';


//Error Messaging
if($global_error == 1){
    error_reporting(E_ALL);
    ini_set("display_error", $global_error);
    include 'includes/error_handler.incl.php';
}

include 'includes/db_functions.incl.php';
include 'includes/functions.incl.php';

//Database Config
//include 'includes/db_config.incl.php';
