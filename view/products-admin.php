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
            <th class="non-displayed-mobile">Description</th>
            <th class="non-displayed-mobile">Prix</th>
            <th>Type</th>
            <th class="non-displayed-mobile"><i class="far fa-image"></i></th>
            <td class="reduced-cell"></td>
            <td class="reduced-cell"></td>
        </thead>
        <tbody>
            <?php
            foreach ($productList as $key => $value) {
            ?>

                <tr>
                    <td><?= $value["product_name"] ?></td>
                    <td class="non-displayed-mobile"><?= mb_strimwidth(nl2br($value["product_description"]), 0, 30, "…") ?></td>
                    <td class="non-displayed-mobile"><?= $value["product_price"] . "€" ?></td>
                    <td><?= $value["product_type"] ?></td>
                    <td class="non-displayed-mobile"><?php
                        if (isset($Picture)) {
                            $countPictures = $Picture->countAllPictureOfOneProduct($value["id"]);
                            echo $countPictures[0]["numberOfPics"];
                        }
                        ?></td>
                    <td class="reduced-cell">
                        <form action="/productupdate" method="post"><button type="submit" value="<?= $value['id'] ?>" name="updateProduct"><i class="far fa-edit"></i></button></form>
                    <td class="reduced-cell">
                        <form action="" method="post"><button type="submit" value="<?= $value['id'] ?>" name="deleteProduct"><i class="far fa-trash-alt"></i></button></form>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
    <div class="buttons-add">
        <a href="/account"><button>Page admin</button></a>
        <a href="/colorlist"><button>Liste des couleurs</button></a>
    </div>
</div>
<?php
require "view/includes/footer.html"
?>