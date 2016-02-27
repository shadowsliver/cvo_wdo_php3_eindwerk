<?php

$pages = array(
    "home"
);
$pages_name = array(
    "Home"
);


?>
<div class="container">
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
    <div id="header" class="row">
       <img src="images/logo.png" alt="logo" class="img-responsive"> <span class="greentext">&#60;about&#62;</span> &nbsp;CodeSource Base&nbsp;<span class="greentext">&#60;/about&#62;</span>
    </div>
</div>