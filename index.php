<?php
session_start();
require "models/Database.php";
require "models/Product.php";
require "models/Picture.php";
require "models/LeatherColors.php";
require "models/LiningColors.php";
require "models/LeatherColorsPics.php";
require "models/LiningColorsPics.php";
require "models/ProductCategorie.php";
require "models/isIn.php";
require "models/Basket.php";
require "controllers/index-controller.php";

if (isset($_GET["page"]) && $_GET["page"] == "home") {
	require "controllers/home-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "signin") {
	require "controllers/sign-in-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "login") {
	require "controllers/login-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "update") {
	require "controllers/update-user-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "account") {
	require "controllers/user-infos-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "addproduct") {
	require "controllers/add-product-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "productsadmin") {
	require "controllers/products-admin-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "productupdate") {
	require "controllers/update-product-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "category") {
	require "controllers/products-user-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "productdetail") {
	require "controllers/productdetail-user-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "addleathercolor") {
	require "controllers/add-leather-color-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "addliningcolor") {
	require "controllers/add-lining-color-controller.php";
} else if (isset($_GET["page"]) && $_GET["page"] == "colorlist") {
	require "controllers/color-list-controller.php";
} else {
	header("Location: /home");
}
