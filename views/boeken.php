<?php
include_once 'includes/security.incl.php';
$results = $controller->GetBoeken();
?>


<div class="container">
    <div class="row margintop">
        <div class="col-sm-4 col-sm-push-2">
            <a href="index.php?page=addboek"><button type="button" class="btn btn-primary btn-lg btn-block" >Toevoegen</button></a>
        </div>
        <div class="col-sm-4 col-sm-push-2">
            <a href="index.php?page=boeken"><button type="button" class="btn btn-info btn-lg btn-block">Verversen</button></a>
        </div>
    </div>
    <div class="row margintop">
        <div class="col-sm-12">
            <ul class="list-group">
                <?php foreach ($results as $row) : ?>
                    <li class="list-group-item"><span class="badge">
                            <a href="index.php?page=toonboek&id=<?php print($row['boek_id'])?>"><i class="fa fa-search"></i></a> -
                            <a
                                href="index.php?page=editboek&id=<?php print ($row['boek_id']) ?>"><i
                                    class="fa fa-pencil-square-o"></i></a> - <a
                                href="index.php?page=boeken&id=<?php print ($row['boek_id']) ?>&action=deleteboek"
                                onclick="return confirm('Ben je zeker?')"><i
                                    class="fa fa-trash"></i></a></span><?php echo($row['boek_titel']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>