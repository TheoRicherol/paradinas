<?php

$title = "Mon copte - Atelier paradinas";

if (!isset($_SESSION["user"])){
    header("Location: /home");
}

if (isset($_POST["deleteUser"])) {
    $User->deleteuser($_SESSION["user"]["id"]);
    session_destroy();
    header("Location: /home");
}

require "view/user-infos.php";
