<?php
//var_dump($_SESSION);
?>

<!doctype html>
<html lang="fr">
<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../view/assets/css/style.css">
</head>

<body>

<div id="titleAnim" class="">
	<div id="title">
		<div class="box">
			<div class="close-menu" id="close-menu">
				<div class="lignes"></div>
				<div class="lignes"></div>
			</div>
			<div class="contLigne">
				<div class="lignes"></div>
				<div class="lignes"></div>
				<div class="lignes"></div>
			</div>
		</div>
        <div>
		<a href="/home"><img src="../view/assets/img/Logo.png" alt="logo Atelier Paradinas" id="logo" class=""></a></div>
		<div id="icons-basket-user">
			<div class="icon-popup" id="icon-popup">
				<?php if (!isset($_SESSION) || empty($_SESSION)) { ?>
					<a href="/login">
						<i class="far fa-user"></i>
					</a>

				<?php } else { ?>
					<a href="/account" class="non-displayed-mobile">
						<i class="fas fa-user-check"></i>
					</a>
					<a href="/view/logout.php" class="non-displayed-mobile"><i class="fas fa-sign-out-alt"></i></a>
				<?php } ?>
				<?php
				if (isset($_SESSION["basketItems"]["nbrItems"])) {
					?>
					<a href="/basket">
						<i class="fas fa-shopping-basket">
							<sup> <?= isset($_SESSION["basketItems"]["nbrItems"]) ? $_SESSION["basketItems"]["nbrItems"] : "" ?> </sup>
						</i>
					</a>
				<?php }
				?>
			</div>
		</div>
	</div>
	<div id="modal-menu" class="hide">
		<nav id="menu" class="nav-hide">
			<ul id="menu-list">
				<?php
				foreach ($productCategory as $category) {
					?>
					<li><a href="/category/<?= $category["id"] ?>"><?= $category["product_type"] ?></a></li>
					<?php
				}
				?>
				<?php
				if (isset($_SESSION["user"])) {
					?>
					<li class="non-displayed-desktop"><a href="/account">
							 <p>Mon compte <i class="fas fa-user-check"></i> </p>
						</a>
					</li>
					<li class="non-displayed-desktop"><a href="/view/logout.php"><p>Déconnexion <i class="fas fa-sign-out-alt"></i></p></a>

					</li>
					<?php
				}
				?>
			</ul>

		</nav>
	</div>
</div>