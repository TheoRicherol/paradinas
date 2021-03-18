<?php

$title = "Modifier un produit";

$currentProduct = $Product->getOneProductInfo($_POST["updateProduct"]);
$product_categorie = $ProductCategorie->getAllProductsType();

$regexPrice = "/^[0-9]*$/";

if (isset($_POST["updateProductPage"])) {
    $arrayParameters = [];
    $errorMessages = [];
    $arrayParameters["id"] = isset($arrayParameters["id"]) ? $arrayParameters["id"] : $_POST["updateProductPage"];
    if (isset($_POST["product_name"]) && !empty($_POST["product_name"])) {
        unset($errorMessages["product_name"]);
        $arrayParameters["product_name"] = htmlspecialchars($_POST["product_name"]);
    } else {
        $errorMessages["product_name"] = "Veuillez renseigner la case";
    }
    if (isset($_POST["product_description"]) && !empty($_POST["product_description"])) {
        unset($errorMessages["product_description"]);
        $arrayParameters["product_description"] = htmlspecialchars($_POST["product_description"]);
    } else {
        $errorMessages["product_description"] = "Veuillez renseigner la case";
    }
    if (isset($_POST["product_price"])) {
        if (empty($_POST["product_price"])) {
            $errorMessages["product_price"] = "Veuillez renseigner la case";
        } else if (!preg_match($regexPrice, $_POST["product_price"])) {
            $errorMessages["price"] = "Veuillez renseigner un prix sous la forme 00.00";
        } else {
            unset($errorMessages["product_price"]);
            $arrayParameters["product_price"] = htmlspecialchars($_POST["product_price"]);
        }
    }
    if (isset($_POST["product_type"])) {
        $arrayParameters["product_type"] = $_POST["product_type"];
    }

    if (empty($errorMessages)) {
        $Product->updateProduct($arrayParameters);
        require "utils/functions.php";
        uploadPicture($arrayParameters["id"], "product", $Picture);
        header("Location: /adminproducts");
    }
}

if (isset($_POST["deletePicture"])) {
    $Picture->deletePicture($_POST["deletePicture"]);
}

require "view/update-product.php";
