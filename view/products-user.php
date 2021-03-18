<?php
include 'includes/header.php';
?>

<div id="content-product">
    <div id="slogan">
        <h1><?= $categorieOfThePage["product_type"] ?></h1>
    </div>
    <div class="collection-products">
        <?php
        foreach ($productsOfThisPage as $product) {
            $picsOfProduct = $Picture->getAllPictureOfOneProduct($product["id_produit"]);
        ?>
            <a href="/productdetail/<?= $product["id_produit"] ?>">
                <div class="item-product">
                    <div class="product-pic">
                        <img src="../<?= $picsOfProduct[0]["product_pics"] ?>" alt="">
                    </div>
                    <div class="product-infos">
                        <p class="product-title">
                            <?= $product["product_name"] ?>
                        </p>
                        <p class="product-price">
                            <?= $product["product_price"] ?><sup>€</sup>
                        </p>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>

</div>

<?php
include 'includes/footer.html';
