<?php
include_once 'includes/security.incl.php';
$results = $controller->GetSchrijvers();
?>


<div class="container">
    <div class="row margintop">
        <div class="col-sm-4 col-sm-push-2">
            <a href="index.php?page=addschrijver"><button type="button" class="btn btn-primary btn-lg btn-block" >Toevoegen</button></a>
        </div>
        <div class="col-sm-4 col-sm-push-2">
            <a href="index.php?page=schijvers"><button type="button" class="btn btn-info btn-lg btn-block">Verversen</button></a>
        </div>
    </div>
    <div class="row margintop">
        <div class="col-sm-12">
            <ul class="list-group">

                <?php foreach ($results as $row) : ?>
                    <li class="list-group-item"><span class="badge">
                            <a href="index.php?page=toonschrijver&id=<?php print($row['schrijver_id'])?>"><i class="fa fa-search"></i></a> -
                            <a
                                href="index.php?page=editschrijver&id=<?php print ($row['schrijver_id']) ?>"><i
                                    class="fa fa-pencil-square-o"></i></a> - <a
                                href="index.php?page=schrijvers&id=<?php print ($row['schrijver_id']) ?>&action=deleteschrijver"
                                onclick="return confirm('Ben je zeker?')"><i
                                    class="fa fa-trash"></i></a></span><?php echo($row['schrijver_naam']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
