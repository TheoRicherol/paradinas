<?php
require "utils/functions.php";
getUserTypeForRestriction();
include "controllers/header-controller.php";
?>

<div id="content-form">
    <div id="slogan">
        <h1>Ajout d'une couleur cuir</h1>

    </div>
    <form action="" class="login" method="post" enctype="multipart/form-data">
        <div class="col col-log-in">
            <fieldset> Description
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <label for="color">Nom du produit :
                            <input type="text" name="color" id="color" value="<?= isset($_POST["color"]) ? $_POST["color"] : "" ?>">
                            <p class="error"><?= isset($errorMessages["color"]) ? $errorMessages["color"] : "" ?></p> </label>
                        </div>
                        <div>
                            <label class="label-file" for="photos">Photo du produit
                            <input class="input-file" type="file" name="photos[]" id="photos"></label>
                        </div>
                        <div>
                            <button type="submit" name="addColor">Ajouter couleur cuir</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
    <div class="buttons-add">
        <a href="/account"><button>Page admin</button></a>
        <a href="/colorlist"><button>Liste des couleurs</button></a>
    </div>
</div>
<?php
include "view/includes/footer.html";
