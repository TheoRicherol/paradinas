<?php

$productDetail = $Product->getOneProductInfo($_GET["produit"]);
$productPics = $Picture->getAllPictureOfOneProduct($_GET["produit"]);
$liningColors = $LiningColors->getAllColors();
$leatherColors = $LeatherColors->getAllColors();


$regexEngraving = "/^[A-Za-z]{0,3}$/";

$title = $productDetail["product_name"];

if (isset($_POST["addToBasket"])) {
    $arrayParameters["id_product"] = $_POST["addToBasket"];

    isset($_POST["colorleather"]) ? $arrayParameters["id_color_leather"] = (int)htmlspecialchars($_POST["colorleather"]) : $arrayParameters["id_color_leather"] = null;
    isset($_POST["colorlinig"]) ? $arrayParameters["id_color_lining"] = (int)htmlspecialchars($_POST["colorlinig"]) : $arrayParameters["id_color_lining"] = null;
    if (isset($_POST["engraving"])) {
        if (preg_match($regexEngraving, $_POST["engraving"])) {
            $arrayParameters["engraving"] = htmlspecialchars($_POST["engraving"]);
        }
    }


    if (isset($_SESSION["user"])) {
        if (!isset($_SESSION["basket"]) || empty($_SESSION["basket"]) || $_SESSION["basket"] == false) {
            $Basket->createBasket($_SESSION["user"]["id"]);
            $_SESSION["basket"]["id"] = $Basket->getDb()->lastInsertId();
            $arrayParameters["id_basket"] = $_SESSION["basket"]["id"];
            $IsIn->addToBasket($arrayParameters);
            $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
            $Basket->totalBasketPrice($_SESSION["basket"]["id"]);
            $basketTotal = $Basket->getTotalBasketPrice($_SESSION["basket"]["id"]);
        } elseif (isset($_SESSION["basket"])) {
            $arrayParameters["id_basket"] = $_SESSION["basket"]["id"];
            $IsIn->addToBasket($arrayParameters);
            $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
            $Basket->totalBasketPrice($_SESSION["basket"]["id"]);
            $basketTotal = $Basket->getTotalBasketPrice($_SESSION["basket"]["id"]);
        }
    } else {
        $errorMessage["login"] = "Veuillez vous connecter pour ajouter un item au panier";
    }
}

require "view/productdetail-user.php";
