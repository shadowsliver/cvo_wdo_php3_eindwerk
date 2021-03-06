<?php
include_once 'views/includes/config.incl.php';
$page = 'login'; // de 'index' pagina
date_default_timezone_set("Europe/Brussels");

$controller->GetProperties()->stylesheets = array(
    "style.css"
);
$controller->GetProperties()->javascript_top = array(
    "./assets/js/html5shiv.js"
);
$controller->GetProperties()->javascript_bot = array(
    "./assets/js/jquery.min.js", "./assets/js/bootstrap.min.js"
);

if (!empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $controller->CallFunction()->redirect("index.php?page=$page");
}

include_once 'views/templates/page.tpl.php';