<?php
include_once 'includes/security.incl.php';
$id = $_GET['id'];
$objs = $controller->GetSchrijvers();
$obj = null;
foreach($objs as $o){
    if($o['schrijver_id'] == $id){
        $obj = $o;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><span class="display">Naam:</span><?php echo($obj['schrijver_naam']); ?></p>
            <p><span class="display">Biografie:</span><?php echo($obj['schrijver_bibliografie']); ?></p>
        </div>
    </div>
</div>

