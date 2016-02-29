<?php
include_once 'includes/security.incl.php';
$results = $controller->GetLeningen();
$count = 0;
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <h2>Welkom administrator:</h2>

            <?php foreach ($results as $row) : ?>
                <?php if (strtotime($row['uitlening_datum']) < strtotime('-2 days')) : ?>
                    <?php $count++; ?>
                    <p"><span class="laat"><i
                            class="fa fa-arrow-circle-right"></i> <?php echo($row['uitlening_datum']) ?> </span> - <a
                        href="index.php?page=boek&id=<?php echo($row['boek_id']) ?>"><?php echo($row['boek_titel']) ?></a> - Klant:
                    <a href="index.php?page=klant&id=<?php echo($row['klant_id']) ?>"><?php echo($row['klant_voornaam'] . ' ' . $row['klant_naam']) ?></a>
                    <a href="index.php?page=home&action=deletelening&id=<?php echo($row['uitlening_id']) ?>"
                       onclick="return confirm('Ben je zeker?')"><i class="fa fa-trash"></i></a></p>
                <?php endif; ?>
            <?php endforeach; ?>
            <p>Er zijn op het moment <strong><?php print($count); ?></strong> overtijdse boek leningen.</p>
        </div>
    </div>
</div>
