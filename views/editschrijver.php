<?php
include_once 'includes/security.incl.php';
$id = $_GET['id'];
$schrijvers = $controller->GetSchrijvers();
$schrijver = null;
foreach($schrijvers as $b){
    if($b['schrijver_id'] == $id){
        $schrijver = $b;
        break;
    }
}
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <form method="post" action="index.php?page=schrijvers&action=updateschrijver">

                <input type="hidden" value="<?php echo($id)?>" name="schrijver_id">

                <div class="form-group">
                    <label for="schrijver">Name:</label>
                    <input type="text" class="form-control" id="schrijver" name="schrijver_naam" value="<?php echo($schrijver['schrijver_naam'])?>">
                </div>

                <div class="form-group">
                    <label for="comment">Bibliografie:</label>
                    <textarea class="form-control" rows="5" id="comment" name="schrijver_bibliografie"><?php echo($schrijver['schrijver_bibliografie'])?></textarea>
                </div>

                <input type="submit" value="Veranderingen opslaan" class="btn btn-primary">
                <input type="reset" class="btn btn-info">
            </form>
        </div>
    </div>
</div>
