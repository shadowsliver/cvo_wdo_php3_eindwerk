<?php
include_once 'views/includes/config.incl.php';
$page = 'home'; // de 'index' pagina

$controller->GetProperties()->stylesheets =  array(
    "style.css"
);
$controller->GetProperties()->javascript_top = array(
    "js/html5shiv.js"
);
$controller->GetProperties()->javascript_bot = array(
    "js/jquery.min.js", "js/bootstrap.min.js"
);

if(!empty($_GET['page'])){
    $page = $_GET['page'];
}else{
    $controller->CallFunction()->redirect("index.php?page=$page");
}

include_once 'views/templates/page.tpl.php';