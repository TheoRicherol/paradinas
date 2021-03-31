<?php
include "controllers/header-controller.php";
?>
<div id="content-form" >
	<div id="slogan">
		<h1>Connexion</h1>
	</div>
    <form action="" method="post" class="login">
        <div class="col col-log-in">
            <fieldset>
                <div class="form-section">
                    <div class="form-group">
                        <div>
                            <label for="username-login">Nom d'utilisateur
                            <input type="text" name="username" id="username-login">
                            <?= isset($errorMessage["username"]) ? "<p class='errors'>" . $errorMessage["username"]. "</p>" : "" ?></label>
						</div>
						<div>
                            <label for="password">Mot de passe
                            <input type="password" name="password" id="password">
                            <?= isset($errorMessage["password"]) ? "<p class='errors'>"  . $errorMessage["password"] ."</p>" : "" ?>
                            <?= isset($errorMessage["login"]) ? "<p class='errors'>" . $errorMessage["login"] . "</p>" : "" ?>
							</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="connectUser">Connexion</button>
            </fieldset>
        </div>
    </form>
	<p>Vous n'avez pas encore de compte ? <a href="/signin">Créez-en un ici !</a></p>
</div>
<?php
include "view/includes/footer.html";
?>