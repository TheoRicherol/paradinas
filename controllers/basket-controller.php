<?php

$title = "Votre Panier";
$basketList = [];
if (isset($_SESSION["basket"]["id"])) {

    $basketList = $Basket->getBasketContents($_SESSION["basket"]["id"]);

    if (isset($_POST) && !empty($_POST)) {
        if (isset($_POST["increase"])) {
            $IsIn->increaseQuantity($_POST["increase"]);
        } else if (isset($_POST["decrease"])) {
            $IsIn->decreaseQuantity($_POST["decrease"]);
        } else if (isset($_POST["delete"])) {
            $IsIn->deleteFromBasket($_POST["delete"]);
        }
        $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
        $Basket->totalBasketPrice($_SESSION["basket"]["id"]);
        header("Location: /basket");
    }
}
require "view/basket.php";
