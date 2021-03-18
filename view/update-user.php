<?php
include "controllers/header-controller.php";
?>
    <div id="content-form">
        <h1><?= $page ?></h1>
        <form method="post" action="/update">
            <div class="col">
                <fieldset>Données personnelles
                    <div class="form-section">
                        <div class="form-group">
                            <div>
                                <label for="firstname">Pr&eacute;nom :</label>
                                <input type="text" name="firstname" placeholder="John" id="firstname" value="<?= isset($_SESSION["user"]["firstname"]) ? $_SESSION["user"]["firstname"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["firstname"]) ? $errorMessage["firstname"] : "" ?></p>
                            </div>
                            <div>
                                <label for="lastname">Nom : </label>
                                <input type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= isset($_SESSION["user"]["lastname"]) ? $_SESSION["user"]["lastname"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["lastname"]) ? $errorMessage["lastname"] : "" ?></p>
                            </div>
                            <div>
                                <label for="birthdate">Date de naissance : </label>
                                <input type="date" name="birthdate" id="birthdate" value="<?= isset($_SESSION["user"]["birthdate"]) ? $_SESSION["user"]["birthdate"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["birthdate"]) ? $errorMessage["birthdate"] : "" ?></p>
                            </div>

                            <div><label for="phone">N&deg; de t&eacute;l&eacute;phone : </label>
                                <input type="text" name="phone" id="phone" placeholder="0612345678" value="<?= isset($_SESSION["user"]["phone"]) ? $_SESSION["user"]["phone"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["phone"]) ? $errorMessage["phone"] : "" ?></p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>Données de Connexion
                    <div class="form-section">
                        <div class="form-group">
                            <div>
                                <label for="mail">Mail : </label>
                                <input type="email" name="mail" id="mail" placeholder="name@exemple.fr" value="<?= isset($_SESSION["user"]["mail"]) ? $_SESSION["user"]["mail"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["mail"]) ? $errorMessage["mail"] : "" ?></p>
                            </div>
                            <div>
                                <label for="username">Nom d'utilisateur :</label>
                                <input type="text" name="username" id="username" value="<?= isset($_SESSION["user"]["username"]) ? $_SESSION["user"]["username"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["username"]) ? $errorMessage["username"] : "" ?></p>
                            </div>
                            <div>
                                <label for="current-password">Ancien mot de passe :</label>
                                <input type="password" name="current-password" id="current-password">
                            </div>
                            <div>
                                <label for="password">Nouveau mot de passe :</label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div>
                                <label for="password-confirm">Confirmation mot de passe :</label>
                                <input type="password" name="password-confirm" id="password-confirm">
                                <p class="errors"><?= isset($errorMessage["password"]) ? $errorMessage["password"] : "" ?></p>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>Données de facturation
                    <div class="form-section">
                        <div class="form-group">
                            <div>
                                <label for="adress-number">N° :</label>
                                <input type="text" name="adress-number" id="adress-number" value="<?= isset($_SESSION["user"]["adress_number"]) ? $_SESSION["user"]["adress_number"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["adress-number"]) ? $errorMessage["adress-number"] : "" ?></p>
                            </div>
                            <div>
                                <label for="adress-street">Rue : </label>
                                <input type="text" name="adress-street" id="adress-street" value="<?= isset($_SESSION["user"]["adress_street"]) ? $_SESSION["user"]["adress_street"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["adress-street"]) ? $errorMessage["adress-street"] : "" ?></p>
                            </div>
                            <div>
                                <label for="adress-complement">Complement </label>
                                <input type="text" name="adress-complement" id="adress-complement" placeholder="N° Appt, Etage, Batiment" value="<?= isset($_SESSION["user"]["adress_complement"]) ? $_SESSION["user"]["adress_complement"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["adress-complement"]) ? $errorMessage["adress-complement"] : "" ?></p>
                            </div>
                            <div>
                                <label for="postal-code">Code Postal </label>
                                <input type="text" name="postal-code" placeholder="31000" id="postal-code" value="<?= isset($_SESSION["user"]["adress_postal_code"]) ? $_SESSION["user"]["adress_postal_code"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["postal-code"]) ? $errorMessage["postal-code"] : "" ?></p>
                            </div>
                            <div>
                                <label for="city">Code Postal </label>
                                <input type="text" name="city" placeholder="Toulouse" id="city" value="<?= isset($_SESSION["user"]["adress_city"]) ? $_SESSION["user"]["adress_city"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["city"]) ? $errorMessage["city"] : "" ?></p>
                            </div>
                            <div>
                                <label for="country">Pays :</label>
                                <input type="text" name="country" placeholder="France" id="country" value="<?= isset($_SESSION["user"]["adress_country"]) ? $_SESSION["user"]["adress_country"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["country"]) ? $errorMessage["country"] : "" ?></p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="createUser">Enregistrer les modifications</button>
                </fieldset>
              
            </div>
        </form>
    </div>
    <?php
include "view/includes/footer.html";
?>

   