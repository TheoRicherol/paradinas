<?php
include 'includes/header.php';
?>

    <div id="content-product">
    <div id="slogan">
        <h1><?= $categorieOfThePage["product_type"] ?></h1>
    </div>
    <div class="collection-products">
<?php
if (!empty($productsOfThisPage)) {
    foreach ($productsOfThisPage

             as $product) {
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
                        <?= $product["product_price"] ?><sup>&euro;</sup>
                    </p>
                </div>
            </div>
        </a>
        <?php
    }
} else {
    ?>
    </div>
    	<p>Cette catégorie ne contient pas de produits <a href="/home">retour &agrave; l'accueil</a></p>

    <?php
}
?>
    </div>

<?php
include 'includes/footer.html';
