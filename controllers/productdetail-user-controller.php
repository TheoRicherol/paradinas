<?php

$productDetail = $Product->getOneProductInfo($_GET["produit"]);
$productPics = $Picture->getAllPictureOfOneProduct($_GET["produit"]);
$productliningColors = $LiningColors->getAllColors();
$productleatherColors = $LeatherColors->getAllColors();

$title = $productDetail["product_name"];

require "view/productdetail-user.php";
