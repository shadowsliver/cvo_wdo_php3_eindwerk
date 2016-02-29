<?php
include_once 'includes/security.incl.php';
$gemeentes = $controller->GetGemeentes();
$klanten = $controller->GetKlanten();
$id = $_GET['id'];
$klant = null;
foreach($klanten as $b){
    if($b['klant_id'] == $id){
        $klant = $b;
        break;
    }
}
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <form method="post" action="index.php?page=klanten&action=updateklant">

                <input type="hidden" value="<?php echo($id)?>" name="klant_id">

                <div class="form-group">
                    <label for="n">Naam:</label>
                    <input type="text" class="form-control" id="n" name="klant_naam" value="<?php echo($klant['klant_naam']) ?>">
                </div>

                <div class="form-group">
                    <label for="vn">Voornaam:</label>
                    <input type="text" class="form-control" id="vn" name="klant_voornaam" value="<?php echo($klant['klant_voornaam']) ?>">
                </div>

                <div class="form-group">
                    <label for="date">Geboortedatum:</label>
                    <input type="text" class="form-control" id="date" name="klant_gebdatum" value="<?php echo($klant['klant_gebdatum']) ?>">
                </div>

                <div class="form-group">
                    <label for="adres">Adres:</label>
                    <input type="text" class="form-control" id="adres" name="klant_adres" value="<?php echo($klant['klant_adres']) ?>">
                </div>

                <div class="form-group">
                    <label for="sel2">Gemeente:</label>
                    <select class="form-control" id="sel1" name="klant_gemeente">
                        <?php foreach($gemeentes as $cat): ?>
                            <option <?php if($cat['gemeente_id'] == $klant['klant_gemeente']){echo('selected');} ?> value="<?php print($cat['gemeente_id']) ?>"><?php print($cat['gemeente_postcode'] . " ". $cat['gemeente_naam']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="submit" value="Toevoegen" class="btn btn-primary">
                <input type="reset" class="btn btn-info">
            </form>
        </div>
    </div>
</div>

