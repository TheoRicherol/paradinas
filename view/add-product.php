<?php

// Require of the functions file

require "utils/functions.php";

// Usage of the functions of the file required to see if the connected user is an admin, if not, redirect on the home page

getUserTypeForRestriction();

// Include header of all th pages, which contains navbar

include "controllers/header-controller.php";
?>

<div id="content-form">

    <div id="slogan">
        <h1>Ajout d'un produit</h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="col">
            <fieldset> Description
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <label for="product_name">Nom du produit :
                            <!-- Get Values of the POST  -->
                            <input type="text" name="product_name" id="product_name" value="<?= isset($_POST["product_name"]) ? $_POST["product_name"] : "" ?>">
                            <!-- Get the errors  -->
                            <p class="error"><?= isset($errorMessages["product_name"]) ? $errorMessages["product_name"] : "" ?></p></label>
                        </div>
                        <div class="col">
                            <label for="product_description">Description du produit
                            <textarea type="text" name="product_description" id="product_description" cols="30" rows="10"><?= isset($_POST["product_description"]) ? $_POST["product_description"] : "" ?></textarea>
                            <p class="error"><?= isset($errorMessages["product_description"]) ? $errorMessages["product_description"] : "" ?></p></label>
                        </div>
                        <div>
                            <label for="product_price">Prix du produit
                            <input type="text" name="product_price" id="product_price" value="<?= isset($_POST["product_price"]) ? $_POST["product_price"] : "" ?>">
                            <p class="error"><?= isset($errorMessages["product_price"]) ? $errorMessages["product_price"] : "" ?></p></label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col">
            <fieldset>
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <select name="product_type" id="" class="dropdown">
                                <?php
                                foreach ($productCategoryList as $value) {
                                ?>
                                    <option value="<?= $value["id"] ?>" <?= isset($_POST["product_type"]) ? ($_POST["product_type"] == $value["id"] ? "selected" : "")  : "" ?>><?= $value["product_type"] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="photos" class="label-file">Ajouter une/des photos</label>
                            <input class="input-file" type="file" name="photos[]" id="photos" multiple>
                        </div>
                        <div>

                            <button type="submit" name="addProduct">Ajouter produit</button>
                        </div>
                    </div>
                </div>
            </fieldset>

        </div>
    </form>
    <div class="buttons-add">
        <a href="/account"><button>Page admin</button></a>
        <a href="/adminproducts"><button>Liste des produits</button></a>
    </div>
</div>
<?php
include "view/includes/footer.html";
