<?php
?>

<!doctype html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../view/assets/css/style.css">
</head>

<body>

<div id="titleAnim" class="">
    <div id="title">
        <div class="box">
            <div class="close-menu" id="close-menu">
                <div class="lignes"></div>
                <div class="lignes"></div>
            </div>
            <div class="contLigne">
                <div class="lignes"></div>
                <div class="lignes"></div>
                <div class="lignes"></div>
            </div>
        </div>
        <a href="/home"><img src="../view/assets/img/Logo.png" alt="logo Atelier Paradinas" id="logo" class=""></a>
        <div id="icons-basket-user">
            <div class="icon-popup" id="icon-popup">


                <?php if (!isset($_SESSION) || empty($_SESSION)) { ?>
                <a href="">
                    <i class="far fa-user"></i>
                </a>
                <div id="popup-user">
                    <li><a href="/signin">Inscription</a></li>
                    <li><a href="/login">Connexion</a></li>

                    <?php } else { ?>
                    <a href="">
                        <i class="fas fa-user-check"></i></i>
                    </a>
                    <div id="popup-user">
                        <a href="/account">Mon compte</a>
                        <form action="/home" method="post">
                            <button type="submit" name="logoutUser" class="">D&eacute;connexion</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
                <?php
              if  (isset($_SESSION["basketItems"]["nbrItems"])){
                ?>
                <div class="icon-popup" id="basketOpen">
                    <a href="/basket">
                        <i class="fas fa-shopping-basket"> <?= isset($_SESSION["basketItems"]["nbrItems"]) ? $_SESSION["basketItems"]["nbrItems"] : "" ?> </i>
                    </a>
                </div>
                <?php }
                ?>
            </div>
        </div>

        <nav id="menu" class="nav-hide">
            <ul id="menu-list">
                <?php
                foreach ($productCategory as $category) {
                    ?>
                    <li><a href="/category/<?= $category["id"] ?>"><?= $category["product_type"] ?></a></li>
                    <?php
                }
                ?>
                <li class=""><a href="">Contact</a></li>
            </ul>
        </nav>
    </div>