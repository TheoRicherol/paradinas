<?php
$title = "Inscription - Atelier Paradinas";
$page = "Inscription";



if (isset($_POST["createUser"])) {
    $regexName = "/^\D*$/";
    $regexMail = "/^.*[@].*[.]\D{1,4}$/";
    $regexBirth = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";
    $regexPhone = "/^[0-9]{10}$/";
    $regexUsername = "/^.*$/";
    $regexPassword = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){6,}$/";

    $regexPostalCode = "/^[0-9]{5,6}$/";
    $regexNumber = "/^[0-9]{0,6}$/";

    $arrayParameters = [];
    $errorMessage = [];

    if (empty($_POST["firstname"])) {
        $errorMessage["firstname"] = "Veuillez renseigner un prénom";
    } elseif (!preg_match($regexName, $_POST["firstname"])) {
        $errorMessage["firstname"] = "Vous ne pouvez utiliser que des lettres/espaces/tirets";
    } else {
        unset($errorMessage["firstname"]);
        $arrayParameters["firstname"] = htmlspecialchars($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $errorMessage["lastname"] = "Veuillez renseigner un nom";
    } elseif (!preg_match($regexName, $_POST["lastname"])) {
        $errorMessage["lastname"] = "Veuillez utiliser des caractères autorisés";
    } else {
        unset($errorMessage["lastname"]);
        $arrayParameters["lastname"] = htmlspecialchars($_POST["lastname"]);
    }

    if (empty($_POST["birthdate"])) {
        $errorMessage["birthdate"] = "Veuillez renseigner une date de naissance";
    } elseif (!preg_match($regexBirth, $_POST["birthdate"])) {
        $errorMessage["birthdate"] = "Veuillez utiliser des caractères autorisés";
    } else {
        unset($errorMessage["birthdate"]);
        $arrayParameters["birthdate"] = htmlspecialchars($_POST["birthdate"]);
    }

    if (empty($_POST["phone"])) {
        $errorMessage["phone"] = "Veuillez renseigner un numéro de téléphone";
    } elseif (!preg_match($regexPhone, $_POST["phone"])) {
        $errorMessage["phone"] = "Veuillez utiliser des caractères autorisés";
    } else {
        unset($errorMessage["phone"]);
        $arrayParameters["phone"] = htmlspecialchars($_POST["phone"]);
    }

    if (empty($_POST["mail"])) {
        $errorMessage["mail"] = "Veuillez renseigner un mail";
    } elseif (!preg_match($regexMail, $_POST["mail"])) {
        $errorMessage["mail"] = "Veuillez renseigner une adresse au format exemple@mail.fr";
    } else {
        unset($errorMessage["mail"]);
        $arrayParameters["mail"] = htmlspecialchars($_POST["mail"]);
    }

    if (empty($_POST["username"])) {
        $errorMessage["username"] = "Veuillez renseigner un nom d'utilisateur";
    } elseif (!preg_match($regexUsername, $_POST["username"])) {
        $errorMessage["username"] = "Veuillez utiliser des caractères autorisés";
    } else {
        unset($errorMessage["username"]);
        $arrayParameters["username"] = htmlspecialchars($_POST["username"]);
    }

    if (empty($_POST["adress-number"])) {
        $errorMessage["adress-number"] = "Veuillez renseigner un numéro de rue";
    } elseif (!preg_match($regexNumber, $_POST["adress-number"])) {
        $errorMessage["adress-number"] = "Veuillez n'utiliser que des chiffres";
    } else {
        unset($errorMessage["adress-number"]);
        $arrayParameters["adress-number"] = htmlspecialchars($_POST["adress-number"]);
    }

    if (empty($_POST["adress-street"])) {
        $errorMessage["adress-street"] = "Veuillez renseigner un nom de rue";
    } else {
        unset($errorMessage["adress-street"]);
        $arrayParameters["adress-street"] = htmlspecialchars($_POST["adress-street"]);
    }

    $arrayParameters["adress-complement"] = htmlspecialchars($_POST["adress-complement"]);

    if (empty($_POST["postal-code"])) {
        $errorMessage["postal-code"] = "Veuillez renseigner votre code postal";
    } elseif (!preg_match($regexPostalCode, $_POST["postal-code"])) {
        $errorMessage["postal-code"] = "Veuillez n'utiliser que des chiffres";
    } else {
        unset($errorMessage["postal-code"]);
        $arrayParameters["postal-code"] = htmlspecialchars($_POST["postal-code"]);
    }

    if (empty($_POST["city"])) {
        $errorMessage["city"] = "Veuillez renseigner votre ville";
    } else {
        unset($errorMessage["city"]);
        $arrayParameters["adress_city"] = htmlspecialchars($_POST["city"]);
    }

    if (empty($_POST["country"])) {
        $errorMessage["country"] = "Veuillez renseigner votre pays";
    } else {
        unset($errorMessage["country"]);
        $arrayParameters["country"] = htmlspecialchars($_POST["country"]);
    }

    if (empty($_POST["password"])) {
        $errorMessage["password"] = "Veuillez renseigner un mot de passe valide";
    } elseif (!preg_match($regexPassword, $_POST["password"])) {
        $errorMessage["password"] = "Votre mot de passe doit contenir une majuscule, une minuscule, un chiffre et une ponctuation";
    } elseif (!empty($_POST["password"]) && $_POST["password"] != $_POST["password-confirm"]) {
        $errorMessage["password"] = "Les mots de passe ne correspondent pas";
    } else {
        unset($errorMessage["password"]);
        $arrayParameters["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
    }

    if (empty($errorMessage)) {
        $newUser = $User->addUser($arrayParameters);
        $newUser = $User->addUser($arrayParameters);
        if ($newUser) {
            header('Location: /login');
        }
    }
}

require "view/sign-in.php";
