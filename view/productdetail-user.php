<?php

include 'view/includes/header.php';
?>
<div id="content-product">
    <div id="slogan">
        <h1><?= $productDetail["product_name"] ?></h1>
    </div>
    <div id="product-page">
        <div id="product-pics">
            <div id="product-pic-primary">
                <img src="../<?= $productPics[0]["product_pics"] ?>" id="pic-primary" alt="">
            </div>
            <div id="product-pic-secondary">
                <?php
                foreach ($productPics as $picture) {
                ?>
                    <img src="../<?= $picture["product_pics"] ?>" class="pic-secondary" data-image="<?= "../" . $picture["product_pics"] ?>" alt="">
                <?php
                }

                ?>
            </div>
        </div>
        <div id="product-infos">
            <p><?= nl2br($productDetail["product_description"]) ?></p>
            <form action="">
                <label for="leathercolors">Couleur du cuir</label>
                <select name="leathercolors" id="">
                    <?php
                    foreach ($productleatherColors as $color) {
                    ?>
                        <option value="<?= $color["id"] ?>"><?= $color["color"]?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="leathercolors">Couleur du cuir</label>
                <select name="leathercolors" id="">
                    <?php
                    foreach ($productliningColors as $color) {
                    ?>
                        <option value="<?= $color["id"] ?>"><?= $color["color"] ?></option>
                    <?php
                    }
                    ?>
                </select>

            </form>
        </div>
    </div>
</div>

<?php

include "view/includes/footer.html";
