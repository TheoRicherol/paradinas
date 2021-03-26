<?php
var_dump($_SESSION);

if (isset($_POST["logoutUser"])) {
    session_destroy();
    header("Location: /home");
}

require "view/includes/header.php";