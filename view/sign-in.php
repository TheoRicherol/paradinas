<?php
include "controllers/header-controller.php";
?>
	<div id="content-form">
		<div id="slogan">
			<h1><?= $page ?></h1></div>
		<form method="post" action="/signin">
			<div class="col">
				<fieldset>Données personnelles
					<div class="form-section">
						<div class="form-group">
							<div class="row">
								<label for="firstname">Pr&eacute;nom :
									<input type="text" name="firstname" placeholder="Jean" id="firstname"
										   value="<?= isset($arrayParameters["firstname"]) ? $arrayParameters["firstname"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["firstname"]) ? $errorMessage["firstname"] : "" ?></p>
								</label>
								<label for="lastname">Nom :
									<input type="text" name="lastname" id="lastname" placeholder="Dupont"
										   value="<?= isset($arrayParameters["lastname"]) ? $arrayParameters["lastname"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["lastname"]) ? $errorMessage["lastname"] : "" ?></p>
								</label>
							</div>
							<div class="row">
								<label for="birthdate">Date de naissance :
									<input type="date" name="birthdate" id="birthdate" placeholder="1990-01-01"
										   value="<?= isset($arrayParameters["birthdate"]) ? $arrayParameters["birthdate"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["birthdate"]) ? $errorMessage["birthdate"] : "" ?></p>
								</label>
								<label for="phone">N&deg; de t&eacute;l&eacute;phone :
									<input type="text" name="phone" id="phone"
										   value="<?= isset($arrayParameters["phone"]) ? $arrayParameters["phone"] : "" ?>">
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
									<input type="email" placeholder="votre-adresse@mail.com" required name="mail"
										   id="mail"
										   value="<?= isset($arrayParameters["mail"]) ? $arrayParameters["mail"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["mail"]) ? $errorMessage["mail"] : "" ?></p>
								</label>
								<label for="username">Nom d'utilisateur :
									<input type="text" placeholder="username" name="username" id="username"
										   value="<?= isset($arrayParameters["username"]) ? $arrayParameters["username"] : "" ?>">
									<p class="errors" id="validationUsername"><?= isset($errorMessage["username"]) ? $errorMessage["username"] : "" ?></p>
								</label>
								<p id="validationUsername"></p>
							</div>
							<div id="div-password" class="row">
								<label for="password">Mot de passe :
									<input placeholder="Enter your password" type="password" name="password" id="password">
								<p class="errors" id="error-password"><?= isset($errorMessage["password"]) ? $errorMessage["password"] : "" ?></p></label>
								<label for="password-confirm">Confirmation mot de passe :
									<input type="password" name="password-confirm" id="password-confirm">
									<p class="errors" id="error-password-confirm"><?= isset($errorMessage["password"]) ? $errorMessage["password"] : "" ?></p>
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
							<div class="row-mobile">
								<label for="adress-number" id="adress-number-label">N° :
									<input type="text" name="adress-number" placeholder="01" id="adress-number"
										   value="<?= isset($arrayParameters["adress_number"]) ? $arrayParameters["adress_number"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["adress-number"]) ? $errorMessage["adress-number"] : "" ?></p>
								</label>
								<label for="adress-street" id="adress-street-label">Rue :
									<input type="text" name="adress-street" placeholder="Rue Alsace Loarraine" id="adress-street"
										   value="<?= isset($arrayParameters["adress_street"]) ? $arrayParameters["adress_street"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["adress-street"]) ? $errorMessage["adress-street"] : "" ?></p>
								</label>
							</div>
							<div class="row">
								<label for="adress-complement">Complement
									<input type="text" name="adress-complement" id="adress-complement"
										   placeholder="N° Appt, Etage, Batiment"
										   value="<?= isset($arrayParameters["adress_complement"]) ? $arrayParameters["adress_complement"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["adress-complement"]) ? $errorMessage["adress-complement"] : "" ?></p>
								</label>
								<label for="postal-code">Code Postal
									<input type="text" name="postal-code" id="postal-code" placeholder="31000"
										   value="<?= isset($arrayParameters["adress_postal_code"]) ? $arrayParameters["adress_postal_code"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["postal-code"]) ? $errorMessage["postal-code"] : "" ?></p>
								</label>
							</div>
							<div class="row">
								<label for="city">Ville
									<input type="text" name="city" id="city" placeholder="Toulouse"
										   value="<?= isset($arrayParameters["adress_city"]) ? $arrayParameters["adress_city"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["city"]) ? $errorMessage["city"] : "" ?></p>
								</label>

								<label for="country">Pays :
									<input type="text" name="country" id="country" placeholder="France"
										   value="<?= isset($arrayParameters["adress_country"]) ? $arrayParameters["adress_country"] : "" ?>">
									<p class="errors"><?= isset($errorMessage["country"]) ? $errorMessage["country"] : "" ?></p>
								</label>
							</div>
						</div>
					</div>
					<button type="submit" name="createUser" id="submitButton">S'inscrire</button>
				</fieldset>

			</div>
		</form>
	</div>
<?php
include "view/includes/footer.html";
?>