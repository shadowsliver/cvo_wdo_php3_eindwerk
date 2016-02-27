<?php
if(!isset($_SESSION['login'])){
	$_SESSION['errorMessage'] = "U moet eerst inloggen voordat u " . basename($_SERVER['PHP_SELF']) . " kunt gebruiken!";
	redirect("login.php");
}