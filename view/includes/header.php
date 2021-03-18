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
                    <a href="">
                        <i class="far fa-user"></i>
                    </a>
                    <div id="popup-user">
                        <?php if (!isset($_SESSION) || empty($_SESSION)) { ?>
                            <li><a href="/signin">Inscription</a></li>
                            <li><a href="/login">Connexion</a></li>
                        <?php } else { ?>
                            <p>Bonjour <?= $_SESSION["user"]["firstname"] ?></p>
                            <a href="/account">Mon compte</a>
                            <form action="/home" method="post">
                                <button type="submit" name="logoutUser" class="">Déconnexion</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="icon-popup">
                    <a href="">
                        <i class="fas fa-shopping-basket"></i></a>
                </div>
            </div>
        </div>

        <nav id="menu" class="nav-hide">
            <ul id="menu-list">
                <?php
                foreach ($productCategorie as $category) {
                ?>
                <li><a href="/category/<?= $category["id"] ?>"><?= $category["product_type"] ?></a></li>
                <?php
                }
                ?>
                <li class=""><a href="">Contact</a></li>
            </ul>
        </nav>
    </div>