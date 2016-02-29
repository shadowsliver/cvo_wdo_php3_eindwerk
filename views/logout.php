<?php
$_SESSION['login'] = false;
//$controller->CallFunction()->redirect('index.php');
//header("location:index.php?page=login");
//exit();
?>
<style>
    nav#menu{
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p>U bent uitgelogd... Klik <a href="index.php?page=login">hier</a> om terug aan te melden.</p>
        </div>
    </div>
</div>

