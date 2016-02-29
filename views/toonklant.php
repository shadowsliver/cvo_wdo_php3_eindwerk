<?php
include_once 'includes/security.incl.php';
$id = $_GET['id'];
$objs = $controller->GetKlanten();
$obj = null;
foreach($objs as $o){
    if($o['klant_id'] == $id){
        $obj = $o;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><span class="display">Naam:</span><?php echo($obj['klant_naam']); ?></p>
            <p><span class="display">Voornaam:</span><?php echo($obj['klant_voornaam']); ?></p>
            <p><span class="display">Geboorte Datum:</span><?php echo($obj['klant_gebdatum']); ?></p>
            <p><span class="display">Adres:</span><?php echo($obj['klant_adres']); ?></p>
            <p><span class="display">Gemeente:</span><?php echo($obj['gemeente_postcode'] . " " . $obj['gemeente_naam']); ?></p>
        </div>
    </div>
</div>

