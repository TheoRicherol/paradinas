<?php
require "utils/functions.php";
getUserTypeForRestriction();
include "view/includes/header.php";
?>

<div id="content-form">
    <div id="slogan">
        <h1>Tous les produits</h1>

    </div>
    <div class="buttons-add">
        <a href="/addproduct"> <button> Ajouter un produit </button> </a>
    </div>
    <table>
        <thead>
            <th>Produit</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Type</th>
            <th><i class="far fa-image"></i></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            foreach ($productList as $key => $value) {
            ?>

                <tr>
                    <td><?= $value["product_name"] ?></td>
                    <td><?= mb_strimwidth(nl2br($value["product_description"]), 0, 30, "…") ?></td>
                    <td><?= $value["product_price"] . "€" ?></td>
                    <td><?= $value["product_type"] ?></td>
                    <td><?php
                        $countPictures = $Picture->countAllPictureOfOneProduct($value["id"]);
                        echo $countPictures[0]["numberOfPics"];
                        ?></td>
                    <td>
                        <form action="/productupdate" method="post"><button type="submit" value="<?= $value['id'] ?>" name="updateProduct"><i class="far fa-edit"></i></button></form>
                    <td>
                        <form action="" method="post"><button type="submit" value="<?= $value['id'] ?>" name="deleteProduct"><i class="far fa-trash-alt"></i></button></form>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</div>
<?php
require "view/includes/footer.html"
?>