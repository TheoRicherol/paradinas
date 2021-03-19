<?php

$title = "Ajouter une Couleur";

$regexColor = "/^\D*$/";

if (isset($_POST["addColor"]) && !empty($_POST)) {
    $errorMessage = [];
    if (isset($_POST["color"]) && !empty($_POST["color"])) {
        if (preg_match($regexColor, $_POST["color"])) {
            unset($errorMessage["color"]);
            $color = htmlspecialchars($_POST["color"]);
        } else {
            $errorMessage["color"] = "Veuillez utiliser des caractères autorisés";
        }
    } else {
        $errorMessage["color"] = "Veuillez remplir cette case";
    }

    if (empty($errorMessage)) {
        // Envoi des modifications en BDD
        $LiningColors->addColor($color);
        //Appel du fichier de fonctions annexes
        require "utils/functions.php";
        // Appel d'une fonction du fichier appelé la ligne précédente
        try {
            uploadPicture($LiningColors->getDb()->lastInsertId(), "colors", $LiningcolorsPics);
        } catch (Exception $e) {
?>

            <p>
                <?= $e->getMessage() ?></p>
<?php
        }
        header("Location: /colorlist");
    }
}
require "view/add-lining-color.php";
