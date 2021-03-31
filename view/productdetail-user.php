<?php
include 'view/includes/header.php';
?>
<div id="content-product">
    <div id="slogan">
        <h1><?= $productDetail["product_name"] ?></h1>
    </div>
    <?= isset($errorMessage["login"]) ? "<p class='errors'>" . $errorMessage["login"]  . "</p>"  :  "" ?>
    <div id="product-page">

        <div id="product-pics">
            <div id="product-pic-primary">
                <img src="../<?= $productPics[0]["product_pics"] ?>" id="pic-primary" alt="">
            </div>
            <div id="product-pic-secondary">
                <?php
                foreach ($productPics as $picture) {
                    ?>
                    <img src="../<?= $picture["product_pics"] ?>" class="pic-secondary"
                         data-image="<?= "../" . $picture["product_pics"] ?>" alt="">
                    <?php
                }

                ?>
            </div>
        </div>
        <div id="product-infos">
            <div class="product-info-price">
                <div>
                    <h2>Description</h2>
                    <p class="details"><?= nl2br($productDetail["product_description"]) ?></p></div>
                <div>
                    <p class="product-price"><?= $productDetail["product_price"] ?><sup> &euro; </sup></p></div>
            </div>
            <form action="" method="post">
                <?php
                if ($productDetail["id_product_type"] == "1") {
                    ?>
                    <fieldset><strong> Couleurs de cuir</strong>

                        <div class="image-form">
                            <?php
                            foreach ($leatherColors as $color) {
                                ?>
                                <label for="<?= "Cuir " . $color["color_leather"] ?>">
                                    <input type="radio" name="colorleather"
                                           value="<?= $color["id"] ?>"
                                           id="<?= "Cuir " . $color["color_leather"] ?>">
                                    <img src="<?= $color["color_leather_picture"] ?>" alt="">
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <strong>
                            Couleurs de fil</strong>
                        <div class="image-form">

                            <?php
                            foreach ($liningColors as $color) {
                                ?>
                                <label for="<?= "Fil " . $color["color_lining"] ?>">
                                    <input type="radio" name="colorlinig"
                                           id="<?= "Fil " . $color["color_lining"] ?>"
                                           value="<?= $color["id"] ?>" id="<?= "Fil " . $color["color_lining"] ?>">

                                    <img src="<?= $color["color_lining_picture"] ?>" alt="">
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    </fieldset>
                    <?php
                }
                ?>
                <label for="engraving">Gravure</label>
                <div class="col" id="div-engraving">
                    <input type="text" id="engraving" name="engraving" maxlength="3">
                </div>


                <button type="submit" name="addToBasket" value="<?= $productDetail["id"] ?>">Ajouter au panier
                </button>

            </form>
        </div>
    </div>
</div>

<?php
include "view/includes/footer.html";
?>


