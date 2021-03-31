<?php

$title = "Ajouter un produit";

$regexPrice = "/^[0-9]*$/";

$productCategoryList = $ProductCategory->getAllProductsType();

// Validation du formulaire d'ajout du produit

if (isset($_POST["addProduct"])) {
    $arrayParameters = [];
    $errorMessages = [];
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
        // Envoi des modifications en BDD
        $Product->addProduct($arrayParameters);
        //Appel du fichier de fonctions annexes
        require "utils/functions.php";
        // Appel d'une fonction du fichier appelé la ligne précédente pour uploader une/des photos sur le serveur
        uploadPicture($Product->getDb()->lastInsertId(), "product", $Picture);
        header("Location: /adminproducts");
    }
}



require "view/add-product.php";
