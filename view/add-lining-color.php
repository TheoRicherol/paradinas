<?php
require "utils/functions.php";
getUserTypeForRestriction();
include "controllers/header-controller.php";
?>

<div id="content-form">
    <div id="slogan">
        <h1>Ajout d'une couleur</h1>

    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col">
            <fieldset> Description
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <label for="color">Nom du produit : </label>
                            <input type="text" name="color" id="color" value="<?= isset($_POST["color"]) ? $_POST["color"] : "" ?>">
                            <p class="error"><?= isset($errorMessages["color"]) ? $errorMessages["color"] : "" ?></p>
                        </div>
                        <div>
                            <label for="photo">Photos du produit</label>
                            <input type="file" name="photos[]" id="photos">
                        </div>
                        <div>
                            <button type="submit" name="addColor">Ajouter couleur fil</button>
                        </div>
                    </div>
                </div>
            </fieldset>

        </div>
    </form>
</div>
<?php
include "view/includes/footer.html";
