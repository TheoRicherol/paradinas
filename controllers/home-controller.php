<?php

$title = "Acceuil - Atelier Paradinas";

if (isset($_SESSION["user"])){
    xdebug_var_dump($_SESSION);
}


require "view/home.php";