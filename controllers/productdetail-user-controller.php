<?php

require "models/LeatherColors.php";
require "models/LiningColors.php";

$liningColors = new Liningcolors();
$leatherColors = new Leathercolors();


$productDetail = $Product->getOneProductInfo($_GET["produit"]);
$productPics = $Picture->getAllPictureOfOneProduct($_GET["produit"]);
$productliningColors = $liningColors->getAllColors();
$productleatherColors = $leatherColors->getAllColors();

$title = $productDetail["product_name"];

require "view/productdetail-user.php";
