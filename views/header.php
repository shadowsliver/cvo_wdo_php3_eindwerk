<?php

$pages = array(
    "home", "klanten", "schrijvers", "boeken", "uitleningen", "logout"
);
$pages_name = array(
    "Home", "Klanten overzicht", "Schrijvers", "Boeken", "Uitlenen", "<span class='logout'><i class=\"fa fa-sign-out\"></i>Uitloggen</span>"
);


?>
<div class="container">
    <?php if($_SESSION['login'] != false) : ?>
    <div class="row">
        <nav id="menu">
            <ul class="nav nav-tabs">
                <?php for ($i = 0; $i < count($pages); ++$i) : ?>
                    <li <?php if ($page == $pages[$i]): ?> class="active" <?php endif; ?> ><a
                            href="?page=<?php print($pages[$i]); ?>"><?php print($pages_name[$i]) ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <?php endif; ?>
    <div id="header" class="row">
       <img src="./assets/images/logo.png" alt="logo" class="img-responsive"> <span class="greentext">&#60;Bibliotheek&#62;</span> &nbsp;Bibiotheek Naam&nbsp;<span class="greentext">&#60;/Manager&#62;</span>
    </div>
</div>