<?php
include_once 'includes/security.incl.php';
$results = $controller->GetLeningen();
?>
<div class="container">

    <div class="row margintop">
        <div class="col-sm-4 col-sm-push-2">
            <a href="index.php?page=addlening"><button type="button" class="btn btn-primary btn-lg btn-block" >Toevoegen</button></a>
        </div>
        <div class="col-sm-4 col-sm-push-2">
           <a href="index.php?page=uitleningen"><button type="button" class="btn btn-info btn-lg btn-block">Verversen</button></a>
        </div>
    </div>

    <div class="row margintop">
        <div class="col-sm-12">
            <ul class="list-group">
                <?php foreach ($results as $row) : ?>
                    <?php if (strtotime($row['uitlening_datum']) < strtotime('-2 days')) : ?>
                        <li class="list-group-item">
                            <span class="badge">
                                <a href="index.php?page=uitleningen&action=deletelening&id=<?php echo($row['uitlening_id']) ?>"
                                                   onclick="return confirm('Ben je zeker?')"><i class="fa fa-trash"></i></a></span>
                            <span class="laat">
                                <i class="fa fa-arrow-circle-right"></i> <?php echo($row['uitlening_datum']) ?>
                            </span>
                            <a href="index.php?page=toonboek&id=<?php echo($row['boek_id']) ?>"><?php echo($row['boek_titel']) ?></a> - Klant:
                            <a href="index.php?page=toonklant&id=<?php echo($row['klant_id']) ?>"><?php echo($row['klant_voornaam'] . ' ' . $row['klant_naam']) ?></a>
                        </li>
                    <?php elseif (strtotime($row['uitlening_datum']) > strtotime('-2 days')) : ?>
                        <li class="list-group-item">
                            <span class="badge"><a href="index.php?page=uitleningen&action=deletelening&id=<?php echo($row['uitlening_id']) ?>"
                                                   onclick="return confirm('Ben je zeker?')"><i class="fa fa-trash"></i></a></span>
                            <span class="niet_laat">
                                <i class="fa fa-arrow-circle-right"></i> <?php echo($row['uitlening_datum']) ?>
                            </span>
                            <a href="index.php?page=toonboek&id=<?php echo($row['boek_id']) ?>"><?php echo($row['boek_titel']) ?></a> - Klant:
                            <a href="index.php?page=toonklant&id=<?php echo($row['klant_id']) ?>"><?php echo($row['klant_voornaam'] . ' ' . $row['klant_naam']) ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>