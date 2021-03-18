<?php

$title = "Sur-Mesure - Atelier paradinas";

$categorieOfThePage = $ProductCategorie->getThisPageCategorie($_GET["category"]);
$productsOfThisPage = $ProductCategorie->getAllProductsFromOneType($_GET["category"]);

require "view/products-user.php";