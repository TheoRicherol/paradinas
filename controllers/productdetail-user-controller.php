<?php

$productDetail = $Product->getOneProductInfo($_GET["produit"]);
$productPics = $Picture->getAllPictureOfOneProduct($_GET["produit"]);
$liningColors = $LiningColors->getAllColors();
$leatherColors = $LeatherColors->getAllColors();

$title = $productDetail["product_name"];

if (isset($_POST["addToBasket"])) {
    $arrayParameters["id_product"] = $_POST["addToBasket"];
    $arrayParameters["id_color_leather"] = htmlspecialchars($_POST["colorleather"]);
    $arrayParameters["id_color_lining"] = $_POST["colorlinig"];
    $arrayParameters["engraving"] = htmlspecialchars($_POST["engraving"]);
    if (isset($_SESSION["user"])) {
        if (!isset($_SESSION["basket"])) {
            $Basket->createBasket($_SESSION["user"]["id"]);
            $_SESSION["basket"] = $Basket->getDb()->lastInsertId();
            $arrayParameters["id_basket"] = $_SESSION["basket"];
            $IsIn->addToBasket($arrayParameters);
            $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]);
        } elseif (isset($_SESSION["basket"])) {
            $arrayParameters["id_basket"] = $_SESSION["basket"];
            $IsIn->addToBasket($arrayParameters);
            $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]);
        }
    } else {
        echo "Vous n'êtes pas connecté";
    }
}

require "view/productdetail-user.php";
