<?php
if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
	$_SESSION['errorMessage'] = "U moet eerst inloggen voordat u deze website kunt gebruiken!";
	$_SESSION['login'] = false;
	$controller->CallFunction()->redirect("index.php?page=login");
}