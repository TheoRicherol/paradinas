<?php

$title = "Sur-Mesure - Atelier paradinas";

$categorieOfThePage = $ProductCategory->getThisPageCategorie($_GET["category"]);
$productsOfThisPage = $ProductCategory->getAllProductsFromOneType($_GET["category"]);

require "view/products-user.php";