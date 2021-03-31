<?php
require "controllers/header-controller.php";
//var_dump($_SESSION);
?>
	<div id="content-form">
		<div id="slogan"><h1><?= $title ?></h1></div>
		<div id="basket-content">
			<?php
			if (isset($basketList) && !empty($basketList)) {
				foreach ($basketList as $value) {
					$pictureOfProduct = $Picture->getAllPictureOfOneProduct($value["id_product"]);
					?>

					<div class="product-basket">
						<div class="product-basket-image"><img src="<?= $pictureOfProduct[0]["product_pics"] ?>" alt="">
						</div>
						<div class="product-basket-detail">
							<h2 class="product-basket-title"><?= $value["product_name"] ?></h2>
							<h3 class="product-basket-type"><?= $value["product_type"] ?></h3>
							<p class="product-basket-infos">
								<?= !empty($value["leather"]) ? "Couleur du cuir : " . $value["leather"] . "," : "" ?>
								<?= !empty($value["lining"]) ? "Couleur du fil : " . $value["lining"] . "," : "" ?>
								<?= !empty($value["engraving"]) ? "Gravure : " . $value["engraving"] : "" ?>
							</p>
						</div>
						<div class="product-basket-price">
							<div class="supp">
								<form method="post" action="">
									<button type="submit" name="delete" value="<?= $value["id"] ?>">X</button>
								</form>
							</div>
							<div>

								<p class="product-price"><?= $value["product_price"] ?> <sup>€</sup></p></div>
							<div class="quantity">
								<form method="post" action="">
									<button type="submit" name="decrease" value="<?= $value["id"] ?>">-</button>
								</form>
								<p> <?= $value["quantity"] ?></p>
								<form method="post" action="">
									<button type="submit" name="increase" value="<?= $value["id"] ?>">+</button>
								</form>
							</div>
						</div>
					</div>
					<?php
				} ?>
				<div class="basket-total">
					<form action="" method="post">
						<button class="basket-button" type="submit" name="deleteBasket"
								value="<?= $_SESSION["basket"]["id"] ?>">
							Effacer le panier
						</button>
					</form>
					<p>Total : <strong><?= $basketTotal["basket_total"] ?> € </strong></p>
				</div>
				<div class="basket-button">
					<form action="" method="post">
						<button type="submit" name="order" value="<?= $_SESSION["basket"]["id"] ?>">
							Commander
						</button>
					</form>
				</div>
				<?php
			} else {
				?>
				<h2>Votre panier ne contient aucun éléments, <a href="/home">Revenir à l'acceuil</a></h2>
				<?php
			}
			?>
		</div>
	</div>
<?php

include "view/includes/footer.html";

