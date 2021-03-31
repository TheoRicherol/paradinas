<?php
include "controllers/header-controller.php";
?>
<div id="content-form">
    <div id="slogan">
        <h1><?= $page ?></h1></div>
    <form method="post" action="/update">
        <div class="col">
            <fieldset>Données personnelles
                <div class="form-section">
                    <div class="form-group">
                        <div class="row">
                            <label for="firstname">Pr&eacute;nom :
                                <input type="text" name="firstname" placeholder="John" id="firstname"
                                       value="<?= isset($_SESSION["user"]["firstname"]) ? $_SESSION["user"]["firstname"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["firstname"]) ? $errorMessage["firstname"] : "" ?></p>
                            </label>

                            <label for="lastname">Nom :
                                <input type="text" name="lastname" id="lastname" placeholder="Doe"
                                       value="<?= isset($_SESSION["user"]["lastname"]) ? $_SESSION["user"]["lastname"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["lastname"]) ? $errorMessage["lastname"] : "" ?></p>
                            </label>
                        </div>
                        <div class="row">
                            <label for="birthdate">Date de naissance :
                                <input type="date" name="birthdate" id="birthdate"
                                       value="<?= isset($_SESSION["user"]["birthdate"]) ? $_SESSION["user"]["birthdate"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["birthdate"]) ? $errorMessage["birthdate"] : "" ?></p>
                            </label>
                            <label for="phone">N&deg; de t&eacute;l&eacute;phone :
                                <input type="text" name="phone" id="phone" placeholder="0612345678"
                                       value="<?= isset($_SESSION["user"]["phone"]) ? $_SESSION["user"]["phone"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["phone"]) ? $errorMessage["phone"] : "" ?></p>
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>Données de Connexion
                <div class="form-section">
                    <div class="form-group">
                        <div class="row">
                            <label for="mail">Mail :
                                <input type="email" name="mail" id="mail" placeholder="name@exemple.fr"
                                       value="<?= isset($_SESSION["user"]["mail"]) ? $_SESSION["user"]["mail"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["mail"]) ? $errorMessage["mail"] : "" ?></p>
                            </label>
                            <label for="username">Nom d'utilisateur :
                                <input type="text" name="username" id="username"
                                       value="<?= isset($_SESSION["user"]["username"]) ? $_SESSION["user"]["username"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["username"]) ? $errorMessage["username"] : "" ?></p>
                            </label>
                        </div>
                        <div>
                            <label for="current-password">Ancien mot de passe :
                                <input type="password" name="current-password" id="current-password">
                                <p id="error-password" class="errors"><?= isset($errorMessage["current-password"]) ? $errorMessage["current-password"] : "" ?></p>
                            </label>
                        </div>
                        <div id="div-password" class="row">
                            <label for="password">Nouveau mot de passe :
                                <input type="password" name="password" id="password">

                                <p id="error-password"
                                   class="errors"><?= isset($errorMessage["password"]) ? $errorMessage["password"] : "" ?></p>
                            </label>
                            <label for="password-confirm">Confirmation mot de passe :
                                <input type="password" name="password-confirm" id="password-confirm">
                                <p id="error-password-confirm"
                                   class="errors"><?= isset($errorMessage["password"]) ? $errorMessage["password"] : "" ?></p>
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col">
            <fieldset>Données de facturation
                <div class="form-section">
                    <div class="form-group">
                        <div class="row">
                            <label id="adress-number-label" for="adress-number">N° :
                                <input type="text" name="adress-number" id="adress-number"
                                       value="<?= isset($_SESSION["user"]["adress_number"]) ? $_SESSION["user"]["adress_number"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["adress-number"]) ? $errorMessage["adress-number"] : "" ?></p>
                            </label>

                            <label id="adress-street-label" for="adress-street">Rue :
                                <input type="text" name="adress-street" id="adress-street"
                                       value="<?= isset($_SESSION["user"]["adress_street"]) ? $_SESSION["user"]["adress_street"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["adress-street"]) ? $errorMessage["adress-street"] : "" ?></p>
                            </label>
                        </div>
                        <div class="row">
                            <label for="adress-complement">Complement
                                <input type="text" name="adress-complement" id="adress-complement"
                                       placeholder="N° Appt, Etage, Batiment"
                                       value="<?= isset($_SESSION["user"]["adress_complement"]) ? $_SESSION["user"]["adress_complement"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["adress-complement"]) ? $errorMessage["adress-complement"] : "" ?></p>
                            </label>
                            <label for="postal-code">Code Postal
                                <input type="text" name="postal-code" placeholder="31000" id="postal-code"
                                       value="<?= isset($_SESSION["user"]["adress_postal_code"]) ? $_SESSION["user"]["adress_postal_code"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["postal-code"]) ? $errorMessage["postal-code"] : "" ?></p>
                            </label>
                        </div>
                        <div class="row">
                            <label for="city">Code Postal
                                <input type="text" name="city" placeholder="Toulouse" id="city"
                                       value="<?= isset($_SESSION["user"]["adress_city"]) ? $_SESSION["user"]["adress_city"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["city"]) ? $errorMessage["city"] : "" ?></p>
                            </label>

                            <label for="country">Pays :
                                <input type="text" name="country" placeholder="France" id="country"
                                       value="<?= isset($_SESSION["user"]["adress_country"]) ? $_SESSION["user"]["adress_country"] : "" ?>">
                                <p class="errors"><?= isset($errorMessage["country"]) ? $errorMessage["country"] : "" ?></p>
                            </label>
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

   