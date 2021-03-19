<?php

$title = "Liste des couleurs";

$liningColors = $LiningColors->getAllColors();
$leatherColors = $LeatherColors->getAllColors();

if (isset($_POST["deleteColorLeather"])){
    $LeatherColors->deleteColor($_POST["deleteColorLeather"]);
    header("Location: /colorlist");
}

if (isset($_POST["deleteColorLining"])){
    $LiningColors->deleteColor($_POST["deleteColorLining"]);
    header("Location: /colorlist");
}


require "view/color-list.php";