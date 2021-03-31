<?php
require "utils/functions.php";
getUserTypeForRestriction();
if (!isset($_POST["updateProduct"])) {
    header("Location: /adminproducts");
}
include 'view/includes/header.php';

?>
    <div id="content-form">
        <div id="slogan">
            <h1><?= $title ?></h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col">
                <fieldset> Description
                    <div class="form-section">
                        <div class="form-group">
                            <div>
                                <label for="product_name">Nom du produit :
                                    <input type="text" name="product_name" id="product_name"
                                           value="<?= isset($currentProduct["product_name"]) ? $currentProduct["product_name"] : "" ?>">
                                    <p class="error"><?= isset($errorMessages["product_name"]) ? $errorMessages["product_name"] : "" ?></p>
                                </label>
                            </div>
                            <div class="col">
                                <label for="product_description">Description du produit
                                    <textarea type="text" name="product_description" id="product_description" cols="70"
                                              rows="10"><?= isset($currentProduct["product_description"]) ? $currentProduct["product_description"] : "" ?></textarea>
                                    <p class="error"><?= isset($errorMessages["product_description"]) ? $errorMessages["product_description"] : "" ?></p>
                                </label>
                            </div>
                            <div>
                                <label for="product_price">Prix du produit
                                    <input type="text" name="product_price" id="product_price"
                                           value="<?= isset($currentProduct["product_price"]) ? $currentProduct["product_price"] : "" ?>">
                                    <p class="error"><?= isset($errorMessages["product_price"]) ? $errorMessages["product_price"] : "" ?></p>
                                </label>
                            </div>
                            <div>
                                <select class="dropdown" name="product_type" id="">
                                    <?php
                                    foreach ($product_categorie as $value) {
                                        ?>
                                        <option value="<?= $value["id"] ?>" <?= isset($currentProduct["product_type"]) ? ($currentProduct["product_type"] == $value["id"] ? "selected" : "") : "" ?>><?= $value["product_type"] ?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label class="label-file" for="photos">Ajouter une/des photos</label>
                                <input class="input-file" type="file" name="photos[]" id="photos" multiple>
                            </div>
                        </div>
                    </div>
                    <button type="submit" value="<?= $_POST["updateProduct"] ?>" name="updateProductPage">Modifier
                        produit
                    </button>
                </fieldset>
            </div>
            <div class="col">
                <div class="collection-2">
                    <?php
                    $displayPictures = $Picture->getAllPictureOfOneProduct($currentProduct["id"]);
                    if (!empty($displayPictures)) {
                        foreach ($displayPictures as $picture) {
                            ?>
                            <div class="item">
                                <img src="<?= $picture["product_pics"] ?>" alt="">
                                <form action="/productupdate" method="post">
                                    <input type="hidden" name="updateProduct" value="<?= $currentProduct["id"] ?>">
                                    <button type="submit" name="deletePicture" value="<?= $picture["id"] ?>"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <h2>Le produit n'as pas de photos</h2>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </form>
        <div class="buttons-add">
            <a href="/account"><button>Page admin</button></a>
            <a href="/adminproducts"><button>Liste des produits</button></a>
        </div>
    </div>
<?php

include "view/includes/footer.html";
