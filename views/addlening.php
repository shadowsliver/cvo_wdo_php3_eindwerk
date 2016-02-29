<?php
include_once 'includes/security.incl.php';
$boeken = $controller->GetBoeken();
$klanten = $controller->GetKlanten();
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <form method="post" action="index.php?page=uitleningen&action=addlening">
                <div class="form-group">
                    <label for="sel1">Boek:</label>
                    <select class="form-control" id="sel1" name="boek">
                        <?php foreach($boeken as $boek): ?>
                            <option value="<?php print($boek['boek_id']) ?>"><?php print($boek['boek_titel']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel1">Klant Naam:</label>
                    <select class="form-control" id="sel2" name="klant">
                        <?php foreach($klanten as $klant): ?>
                            <option value="<?php print($klant['klant_id']) ?>"><?php print($klant['klant_naam'] . " " . $klant['klant_voornaam']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Toevoegen" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

