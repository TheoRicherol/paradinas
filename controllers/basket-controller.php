<?php

$title = "Votre Panier";
$basketList = $Basket->getBasketContents($_SESSION["basket"]["id"]);

if (isset($_POST["increase"])){
    $IsIn->increaseQuantity($_POST["increase"]);
    $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
    header("Location: /basket");
}

if (isset($_POST["decrease"])){
    $IsIn->decreaseQuantity($_POST["decrease"]);
    $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
    header("Location: /basket");
}

if (isset($_POST["delete"])){
    $IsIn->deleteFromBasket($_POST["delete"]);
    $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
    header("Location: /basket");
}

require "view/basket.php";
