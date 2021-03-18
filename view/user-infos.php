<?php
include "view/includes/header.php";
?>

<div id="content-form">
    <div id="slogan">
        <h1>Mon compte</h1>
    </div>
    <div id="user-page">
        <div class="col-infos">
            <h2>Mes infos</h2>
            <p><strong> Nom : </strong></p>
            <p class="user-value"> <?= $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?> </p>
            <p> <strong> Nom d'utilisateur : </strong></p>
            <p class="user-value"><?= $_SESSION["user"]["username"] ?></p>
            <p> <strong> Adresse : </strong></p>
            <p class="user-value"><?= $_SESSION["user"]["adress_number"] . " " . $_SESSION["user"]["adress_street"] . ", <br>" . $_SESSION["user"]["adress_complement"] . " " . $_SESSION["user"]["adress_postal_code"] . " " . $_SESSION["user"]["adress_city"] . ", <br>" . $_SESSION["user"]["adress_country"] ?>
            </p>
            <?php
            if ($_SESSION["user"]["role"] == "user") {
            ?>
                <div id="container-form">
                    <form class="user-form" action="/update" method="post">
                        <button type="submit" name="update" value="<?= $_SESSION["user"]["id"] ?>">Modifier mon compte</button>
                    </form>
                    <form class="user-form" action="" method="post">
                        <button type="submit" name="deleteUser">Supprimer mon compte</button>
                    </form>
                </div>
        </div>
        <div class="col-infos">
            <h2>Mes commandes</h2>
        </div>
    </div>

<?php
            } else {
?>
</div>
<div class="col-infos">
    <h2>Gestion produits/couleurs</h2>
    <a href="/adminproducts"> <button> Liste des produits </button> </a>
    <a href="/addproduct"> <button> Ajouter un produit </button> </a>
</div>

<?php
            }
?>
</div>


<?php
include "view/includes/footer.html";
?>