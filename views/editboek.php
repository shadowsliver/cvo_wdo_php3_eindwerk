<?php
include_once 'includes/security.incl.php';
$categorieen = $controller->GetCatagorieen();
$schrijvers = $controller->GetSchrijvers();
$boeken = $controller->GetBoeken();
$id = $_GET['id'];
$book = null;
foreach($boeken as $b){
    if($b['boek_id'] == $id){
        $book = $b;
        break;
    }
}
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <form method="post" action="index.php?page=boeken&action=updateboek">

                <input type="hidden" value="<?php echo($id)?>" name="boek_id">

                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="boek_isbn" value="<?php echo($book['boek_isbn']) ?>">
                </div>

                <div class="form-group">
                    <label for="titel">Titel:</label>
                    <input type="text" class="form-control" id="titel" name="boek_titel" value="<?php echo($book['boek_titel']) ?>">
                </div>

                <div class="form-group">
                    <label for="sel1">Schrijver:</label>
                    <select class="form-control" id="sel1" name="boek_schrijvers_id">
                        <?php foreach($schrijvers as $schrijver): ?>
                            <option <?php if($schrijver['schrijver_id'] == $book['boek_schijvers_id']){echo('selected');} ?> value="<?php print($schrijver['schrijver_id']) ?>"><?php print($schrijver['schrijver_naam']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sel2">Categorieën:</label>
                    <select class="form-control" id="sel2" name="boek_categorie_id">
                        <?php foreach($categorieen as $cat): ?>
                            <option <?php if($cat['categorie_id'] == $book['boek_catagorie_id']){echo('selected');} ?> value="<?php print($cat['categorie_id']) ?>"><?php print($cat['categorie_naam']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">Inhoud:</label>
                    <textarea class="form-control" rows="5" id="comment" name="boek_inhoud"><?php echo($book['boek_inhoud']) ?></textarea>
                </div>

                <input type="submit" value="Veranderingen opslaan" class="btn btn-primary">
                <a href="index.php?page=editboek&id=<?php echo($id)?>"><button type="button" class="btn btn-info">Ongedaan maken</button></a>
            </form>
        </div>
    </div>
</div>

