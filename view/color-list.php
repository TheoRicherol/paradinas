<?php
include "view/includes/header.php";
?>

<div id="content-form">
    <div id="slogan">
        <h1>Toutes les couleurs</h1>
    </div>
    <div class="buttons-add">
        <a href="/addleathercolor"> <button> Ajouter couleur cuir </button> </a>
        <a href="/addliningcolor"> <button> Ajouter couleur fil </button> </a>
    </div>
    <div class="double-table">
        <div>
            <h1>Couleurs de cuir</h1>
            <table>
                <thead>
                    <th>Couleur</th>
                    <th><i class="far fa-image"></i></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    if ($leatherColors) {
                        foreach ($leatherColors as $color) {
                    ?>
                            <tr>
                                <td><?= $color["color"] ?></td>
                                <td><img src="<?= $color["color_leather_picture"] ?>" alt=""></td>
                                <td>
                                    <form action="" method="post"><button type="submit" value="<?= $color['id'] ?>" name="deleteColorLeather"><i class="far fa-trash-alt"></i></button></form>
                                </td>
                            </tr>

                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">Aucune couleur pour le moment</td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
        <div>
            <h1>Couleurs de fil</h1>
            <table>
                <thead>
                    <th>Couleur</th>
                    <th><i class="far fa-image"></i></th>
                    <th></th>
                </thead>
                <tbody>

                    <?php
                    if ($liningColors) {
                        foreach ($liningColors as $color) {
                    ?>
                            <tr>
                                <td><?= $color["color"] ?></td>
                                <td><img src="<?= $color["color_lining_picture"] ?>" alt=""></td>
                                <td>
                                    <form action="" method="post"><button type="submit" value="<?= $color['id'] ?>" name="deleteColorLining"><i class="far fa-trash-alt"></i></button></form>
                                </td>
                            </tr>

                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">Aucune couleur pour le moment</td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
include "view/includes/footer.html";
