<?php
require "controllers/header-controller.php";
if (isset($_SESSION["basket"]["id"])) {
    $basketTotal = $Basket->getTotalBasketPrice($_SESSION["basket"]["id"]);
}
?>
    <div id="content-form">
        <div id="slogan"><h1><?= $title ?></h1></div>
        <?php
        if (($basketList)) {
            foreach ($basketList

                     as $value) {
                ?>
                <table>
                    <thead>
                    <th>Produit</th>
                    <th class="non-displayed-mobile">Type</th>
                    <th class="non-displayed-mobile">Cuir</th>
                    <th class="non-displayed-mobile">Fil</th>
                    <th class="non-displayed-mobile">Gravure</th>
                    <th>P.U</th>
                    <th class="reduced-cell"></th>
                    <th class="reduced-cell">Qté</th>
                    <th class="reduced-cell"></th>
                    <th>Total</th>
                    <th class="reduced-cell"></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $value["product_name"]; ?></td>
                        <td class="non-displayed-mobile"><?= $value["product_type"]; ?></td>
                        <td class="non-displayed-mobile"><?= $value["leather"]; ?></td>
                        <td class="non-displayed-mobile"><?= $value["lining"]; ?></td>
                        <td class="non-displayed-mobile"><?= $value["engraving"] ?></td>
                        <td> <?= $value["product_price"] ?> &euro;</td>
                        <td>
                            <form method="post" action="">
                                <button type="submit" name="decrease" value="<?= $value["id"] ?>">-</button>
                            </form>
                        </td>
                        <td> <?= $value["quantity"] ?></td>
                        <td>
                            <form method="post" action="">
                                <button type="submit" name="increase" value="<?= $value["id"] ?>">+</button>
                            </form>
                        </td>
                        <td><?= $value["total"]; ?> &euro;</td>
                        <td>
                            <form method="post" action="">
                                <button type="submit" name="delete" value="<?= $value["id"] ?>"><i
                                            class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div>
                    <form action="" method="post">
                        <button type="submit" name="deleteBasket" value="<?= $_SESSION["basket"]["id"] ?>">
                            Effacer le panier
                        </button>
                        <button type="submit" name="order" value="<?= $_SESSION["basket"]["id"] ?>">
                            Commandez
                        </button>

                    </form>
                </div>
                <?php
            }
        }
        ?>

    </div>
<?php

include "view/includes/footer.html";

