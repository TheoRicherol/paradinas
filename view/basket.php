<?php
require "view/includes/header.php";
?>

	<div id="content-form">
		<div id="slogan"><h1><?= $title ?></h1></div>
		<table>
			<thead>
			<th>Produit</th>
			<th>Type</th>
			<th>Cuir</th>
			<th>Fil</th>
			<th>Prix</th>
			<th></th>
			<th>Quantité</th>
			<th></th>
			<th>Total</th>
			<th></th>
			</thead>
			<tbody>
			<?php
			if (($basketList)) {
				foreach ($basketList as $value) {
					?>
					<tr>
						<td><?= $value["product_name"]; ?></td>
						<td><?= $value["product_type"]; ?></td>
						<td><?= $value["leather"]; ?></td>
						<td><?= $value["lining"]; ?></td>
						<td> <?= $value["product_price"] ?> &euro; </td>
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
						<td><?= $value["total"]; ?> &euro; </td>
						<td>
							<form method="post" action="">
								<button type="submit" name="delete" value="<?= $value["id"] ?>"><i
											class="far fa-trash-alt"></i></button>
							</form>
						</td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr>
					<td colspan="10">Votre panier est vide</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		<p><?= $basketTotal ?></p>
	</div>

<?php

include "view/includes/footer.html";

