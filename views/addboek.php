<?php
include_once 'includes/security.incl.php';
$categorieen = $controller->GetCatagorieen();
$schrijvers = $controller->GetSchrijvers();
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <form method="post" action="index.php?page=boeken&action=addboek">

                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="boek_isbn">
                </div>

                <div class="form-group">
                    <label for="titel">Titel:</label>
                    <input type="text" class="form-control" id="titel" name="boek_titel">
                </div>

                <div class="form-group">
                    <label for="sel1">Schrijver:</label>
                    <select class="form-control" id="sel1" name="boek_schrijvers_id">
                        <?php foreach($schrijvers as $schrijver): ?>
                            <option value="<?php print($schrijver['schrijver_id']) ?>"><?php print($schrijver['schrijver_naam']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sel2">Categorieën:</label>
                    <select class="form-control" id="sel2" name="boek_categorie_id">
                        <?php foreach($categorieen as $cat): ?>
                            <option value="<?php print($cat['categorie_id']) ?>"><?php print($cat['categorie_naam']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">Inhoud:</label>
                    <textarea class="form-control" rows="5" id="comment" name="boek_inhoud"></textarea>
                </div>

                <input type="submit" value="Toevoegen" class="btn btn-primary">
                <input type="reset" class="btn btn-info">
            </form>
        </div>
    </div>
</div>

