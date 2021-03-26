<?php

if (isset($_POST["logoutUser"])) {
    session_destroy();
    header("Location: /home");
}

require "view/includes/header.php";