<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Movie View</title>
</head>
<header>
	<nav>
		<ul>
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Catégories</a></li>
			<li><a href="#">Ajouter un film</a></li>
		</ul>
	</nav>
	<input type="search" placeholder="Recherche" name="the_search">
	<button type="submit" name="OK">OK</button>
</header>
<body>
	<section class="gauche">
		<img src="<?= $detailsMovie['mov_image'] ?>">
		<h3>Sorti le : <?= $detailsMovie['mov_release_date'] ?></h3>
		<h3>Support : <?= $detailsMovie['sto_name'] ?></h3>
	</setion>
	<section class="droite">
		<h3><a href="#"><?= $detailsMovie['mov_title'] ?></a></h3> 
		<h3>Catégorie : <?= $detailsMovie['cat_name'] ?></h3>
		<p><?= $detailsMovie['mov_descri'] ?></p>
		<p>Casting : <?= $detailsMovie['mov_cast'] ?></p>
		<br>
		<p>Chemin de la zone de stockage : <br><?= $detailsMovie['mov_path'] ?></p>
	</setion>
</body>
</html>