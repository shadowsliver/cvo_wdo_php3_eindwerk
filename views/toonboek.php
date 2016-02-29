<?php
include_once 'includes/security.incl.php';
$id = $_GET['id'];
$objs = $controller->GetBoeken();
$obj = null;
foreach($objs as $o){
    if($o['boek_id'] == $id){
        $obj = $o;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><span class="display">ISBN:</span><?php echo($obj['boek_isbn']); ?></p>
            <p><span class="display">Titel:</span><?php echo($obj['boek_titel']); ?></p>
            <p><span class="display">Schrijver:</span><?php echo($obj['schrijver_naam']); ?></p>
            <p><span class="display">Categorie:</span><?php echo($obj['categorie_naam']); ?></p>
            <p><span class="display">Inhoud</span><?php echo($obj['boek_inhoud']); ?></p>
        </div>
    </div>
</div>
