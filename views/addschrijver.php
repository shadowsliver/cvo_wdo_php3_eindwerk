<?php
include_once 'includes/security.incl.php';
?>
<div class="container">
    <div class="row margintop">
        <div class="col-sm-12">
            <form method="post" action="index.php?page=schrijvers&action=addschrijver">



                <div class="form-group">
                    <label for="schrijver">Name:</label>
                    <input type="text" class="form-control" id="schrijver" name="schrijver_naam" value="">
                </div>

                <div class="form-group">
                    <label for="comment">Bibliografie:</label>
                    <textarea class="form-control" rows="5" id="comment" name="schrijver_bibliografie"></textarea>
                </div>

                <input type="submit" value="Veranderingen opslaan" class="btn btn-primary">
                <input type="reset" class="btn btn-info">
            </form>
        </div>
    </div>
</div>

