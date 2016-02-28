<?php
include_once 'includes/security.incl.php';
$_SESSION['login'] = false;
$controller->CallFunction()->redirect('index.php?page=login');