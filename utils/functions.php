<?php
function updateSessionVar($arrayParameters)
{
    $user = [];
    $user["firstname"] = $arrayParameters["user_firstname"];
    $user["lastname"] = $arrayParameters["user_lastname"];
    $user["birthdate"] = $arrayParameters["user_birthdate"];
    $user["mail"] = $arrayParameters["user_mail"];
    $user["phone"] = $arrayParameters["user_phone"];
    $user["adress_number"] = $arrayParameters["user_adress_number"];
    $user["adress_street"] = $arrayParameters["user_adress_street"];
    $user["adress_complement"] = $arrayParameters["user_adress_complement"];
    $user["adress_postal_code"] = $arrayParameters["user_adress_postal_code"];
    $user["adress_city"] = $arrayParameters["user_adress_city"];
    $user["adress_country"] = $arrayParameters["user_adress_country"];
    $user["username"] = $arrayParameters["user_username"];
    $user["password"] = $arrayParameters["user_password"];
    $user["role"] = $arrayParameters["users_role_role"];
    $user["id"] = $arrayParameters["id"];
    $_SESSION["user"] = $user;
}

function uploadPicture($id, $directory, $type)
{
    $errorMessages = [];
    $destination = "view/assets/img/$directory";
    $maxsize = 10000000;
    $acceptedextension = ["image/gif", "image/png", "image/jpeg"];
    if (!empty($_FILES)) {
        foreach ($_FILES["photos"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                if ($_FILES["photos"]["size"][$key] >= $maxsize) {
                    $errorMessages["size"] = "L'image que vous essayez d'ajouter est trop grosse";
                } elseif (!in_array($_FILES["photos"]["type"][$key], $acceptedextension)) {
                    $errorMessages["extension"] = "L'image que vous essayez d'ajouter n'est pas autorisée";
                } else {
                    $tmp_name = $_FILES["photos"]["tmp_name"][$key];
                    $name = filter_var(htmlspecialchars(basename($_FILES["photos"]["name"][$key])), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                    move_uploaded_file($tmp_name, "$destination/$name");
                    $type->addPicture("../" . "$destination/$name", $id);
                }
            }
        }
    }
}

function getUserTypeForRestriction()
{
    if (isset($_SESSION["user"]["role"])) {
        if ($_SESSION["user"]["role"] != "admin") {
            header("Location: /home");
        }
    } else {
        header("Location: /home");
    }
}
