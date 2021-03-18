<?php
include "controllers/header-controller.php";
?>
<div id="content-form">
    <h1><?= $page ?></h1>
    <form method="post" action="/signin">
        <div class="col">
            <fieldset>Données personnelles
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <label for="firstname">Pr&eacute;nom :</label>
                            <input type="text" name="firstname" placeholder="John" id="firstname" value="<?= isset($arrayParameters["firstname"]) ? $arrayParameters["firstname"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["firstname"]) ? $errorMessage["firstname"] : "" ?></p>
                        </div>
                        <div>
                            <label for="lastname">Nom : </label>
                            <input type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= isset($arrayParameters["lastname"]) ? $arrayParameters["lastname"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["lastname"]) ? $errorMessage["lastname"] : "" ?></p>
                        </div>
                        <div>
                            <label for="birthdate">Date de naissance : </label>
                            <input type="date" name="birthdate" id="birthdate" value="<?= isset($arrayParameters["birthdate"]) ? $arrayParameters["birthdate"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["birthdate"]) ? $errorMessage["birthdate"] : "" ?></p>
                        </div>
                        <div>
                            <label for="phone">N&deg; de t&eacute;l&eacute;phone : </label>
                            <input type="text" name="phone" id="phone" value="<?= isset($arrayParameters["phone"]) ? $arrayParameters["phone"] : "" ?>">
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
                            <input type="email" name="mail" id="mail" value="<?= isset($arrayParameters["mail"]) ? $arrayParameters["mail"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["mail"]) ? $errorMessage["mail"] : "" ?></p>
                        </div>
                        <div>
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" name="username" id="username" value="<?= isset($arrayParameters["username"]) ? $arrayParameters["username"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["username"]) ? $errorMessage["username"] : "" ?></p>
                            <p id="validationUsername"></p>
                        </div>
                        <div id="div-password">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div id="div-password-confirm">
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
                            <input type="text" name="adress-number" id="adress-number" value="<?= isset($arrayParameters["adress_number"]) ? $arrayParameters["adress_number"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["adress-number"]) ? $errorMessage["adress-number"] : "" ?></p>
                        </div>
                        <div>
                            <label for="adress-street">Rue : </label>
                            <input type="text" name="adress-street" id="adress-street" value="<?= isset($arrayParameters["adress_street"]) ? $arrayParameters["adress_street"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["adress-street"]) ? $errorMessage["adress-street"] : "" ?></p>
                        </div>
                        <div>
                            <label for="adress-complement">Complement </label>
                            <input type="text" name="adress-complement" id="adress-complement" placeholder="N° Appt, Etage, Batiment" value="<?= isset($arrayParameters["adress_complement"]) ? $arrayParameters["adress_complement"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["adress-complement"]) ? $errorMessage["adress-complement"] : "" ?></p>
                        </div>
                        <div>
                            <label for="postal-code">Code Postal </label>
                            <input type="text" name="postal-code" id="postal-code" placeholder="31000" value="<?= isset($arrayParameters["adress_postal_code"]) ? $arrayParameters["adress_postal_code"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["postal-code"]) ? $errorMessage["postal-code"] : "" ?></p>
                        </div>
                         <div>
                            <label for="city">Ville</label>
                            <input type="text" name="city" id="city" placeholder="Toulouse" value="<?= isset($arrayParameters["adress_city"]) ? $arrayParameters["adress_city"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["city"]) ? $errorMessage["city"] : "" ?></p>
                        </div>
                        <div>
                            <label for="country">Pays :</label>
                            <input type="text" name="country" id="country" placeholder="France" value="<?= isset($arrayParameters["adress_country"]) ? $arrayParameters["adress_country"] : "" ?>">
                            <p class="errors"><?= isset($errorMessage["country"]) ? $errorMessage["country"] : "" ?></p>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button type="submit" name="createUser" id="submitButton">S'inscrire</button>
        </div>
    </form>
</div>
<?php
include "view/includes/footer.html";
?>