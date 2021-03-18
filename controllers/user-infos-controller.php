<?php

$title = "Mon copte - Atelier paradinas";
require "models/Users.php";

$User = new Users();

if (isset($_POST["deleteUser"])) {
    $User->deleteuser($_SESSION["user"]["id"]);
    session_destroy();
    header("Location: /home");
}

require "view/user-infos.php";
