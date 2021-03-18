<?php
$title = "Tous les produits";

$productList = $Product->getAllProduct();
$PictureList = $Picture->getAllPictures();


if(isset($_POST["deleteProduct"])){
    $Product->deleteProduct($_POST["deleteProduct"]);
    header("Location: /adminproducts");
}

require "view/products-admin.php";