<?php
include "controllers/header-controller.php";
?>
<div id="content-form">
	<div id="slogan">
		<h1>Connexion</h1>
	</div>
    <form action="" method="post">
        <div class="col col-sign-in">
            <fieldset>
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" name="username" id="login-username">
                            <p class="errors"><?= isset($errorMessage["username"]) ? $errorMessage["username"] : "" ?></p>
                        </div>
                        <div>
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="login-password">
                            <p class="errors"><?= isset($errorMessage["password"]) ? $errorMessage["password"] : "" ?></p>
                            <p class="errors"><?= isset($errorMessage["login"]) ? $errorMessage["login"] : "" ?></p>
                        </div>
                    </div>
                </div>
                <button type="submit" name="connectUser">Connexion</button>
            </fieldset>
        </div>
    </form>
</div>
<?php
include "view/includes/footer.html";
?>