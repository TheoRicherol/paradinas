<?php

$title = "Connexion - Atelier Paradinas";


if (!isset($_SESSION["user"])) {
    if (isset($_POST["connectUser"])) {

        $regexUsername = "/^.*$/";
        $regexPassword = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){6,}$/";

        $errorMessage = [];
        $arrayParameters = [];

        if (!isset($_POST["username"])) {
            $errorMessage["username"] = "Veuillez remplir la case";
        } elseif (isset($_POST["username"]) && !preg_match($regexUsername, $_POST["username"])) {
            $errorMessage["username"] = "Veuillez utiliser des caractères autorisés";
        } else {
            unset($errorMessage["username"]);
            $arrayParameters["username"] = htmlspecialchars($_POST["username"]);
        }

        if (!isset($_POST["password"])) {
            $errorMessage["password"] = "Veuillez remplir la case";
        } elseif (isset($_POST["password"]) && !preg_match($regexPassword, $_POST["password"])) {
            $errorMessage["password"] = "Veuillez respecter la sécurité du mot de passe";
        } else {
            unset($errorMessage["password"]);
            $arrayParameters["password"] = $_POST["password"];
        }

        if (empty($errorMessage)) {
            $resultQuery =  $User->verifyUser($arrayParameters["username"]);
            if (!empty($resultQuery)) {
                require "utils/functions.php";
                if (password_verify($arrayParameters["password"], $resultQuery["user_password"])) {
                    updateSessionVar($resultQuery);
                    $_SESSION["basket"] = $Basket->controlUsersBasket($_SESSION["user"]["id"]);
                    $_SESSION["basketItems"] = $Basket->countItemsInBasket($_SESSION["basket"]["id"]);
                    header("Location: /home");
                } else {
                    $errorMessage["login"] = "Il y a eu un soucis dans la saisie de vos identifiants";
                }
            } else {
                $errorMessage["login"] = "Il y a eu un soucis dans la saisie de vos identifiants";
            }
        }
    }
} else {
    header("Location: /home");
}



require "view/login.php";
