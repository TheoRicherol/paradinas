<?php
require "utils/functions.php";
getUserTypeForRestriction();
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
                            <label for="product_name">Nom du produit : </label>
                            <input type="text" name="product_name" id="product_name" value="<?= isset($currentProduct["product_name"]) ? $currentProduct["product_name"] : "" ?>">
                            <p class="error"><?= isset($errorMessages["product_name"]) ? $errorMessages["product_name"] : "" ?></p>
                        </div>
                        <div>
                            <label for="product_description">Description du produit</label>
                            <textarea type="text" name="product_description" id="product_description" cols="30" rows="10"><?= isset($currentProduct["product_description"]) ? $currentProduct["product_description"] : "" ?></textarea>
                            <p class="error"><?= isset($errorMessages["product_description"]) ? $errorMessages["product_description"] : "" ?></p>
                        </div>
                        <div>
                            <label for="product_price">Prix du produit</label>
                            <input type="text" name="product_price" id="product_price" value="<?= isset($currentProduct["product_price"]) ? $currentProduct["product_price"] : "" ?>">
                            <p class="error"><?= isset($errorMessages["product_price"]) ? $errorMessages["product_price"] : "" ?></p>
                        </div>
                        <select name="product_type" id="">
                            <?php
                            foreach ($product_categorie as $value) {
                            ?>
                                <option value="<?= $value["id"] ?>" <?= isset($currentProduct["product_type"]) ? ($currentProduct["product_type"] == $value["id"] ? "selected" : "")  : "" ?>><?= $value["product_type"] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                        <div class="form-section">
                            <div class="form-group">
                                <label for="photo">Photos du produit</label>
                                <input type="file" name="photos[]" id="photos" multiple>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" value="<?= $_POST["updateProduct"] ?>" name="updateProductPage">Modifier produit</button>
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

</div>
<?php
include "view/includes/footer.html";
