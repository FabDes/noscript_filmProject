<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<main>
<header>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="cru.php">Catégories</a></li>
			<li><a href="add_movie.php">Ajouter un film</a></li>
		</ul>
	</nav>
	<form id="search_all" method="GET" action="catalog.php">
		<input type="search" placeholder="Recherche" name="the_search">
		<button type="submit" name="OK">OK</button>
	</form>
</header>
<body>
	<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	
<!-- Grande barre de recherche -->
<!-- 
	REVOIR LES BOUTONS ET LES TYPES SUBMIT DANS LES FORMS et se mettre d'accord : 
	- button en dehors du form avec ciblage par id grâce à l'attribut form=
	ou 
	- input type submit dans le form pour valider. 
-->
	<form method="GET" action="catalog.php" id="searchBar">
		<input id="the_search" type="search" placeholder="Recherche" name="the_search">
	</form>
	<button id="the_button" form="searchBar" type="submit">OK</button>

<!-- Affiche les catégories et nombre de films -->
	<nav id="nav_cat">
		<ul>
		<?php foreach ($categorySort as $key => $value):?>
			<li><a href="#"><?= $value['cat_name'].' ('.$value['countMovies'].')'?></a></li>
		<?php endforeach; ?>
		</ul>
	</nav>

<!-- Affiche 4 films random -->
	<?php foreach ($randomImg as $key => $value):?>
	<div class="imgLien">
		<img class="img_movie" src="<?= $value['mov_image'] ?>">
		<a class="titel_movie" href="#"><?= $value['mov_title'] ?></a>
	</div>
	<?php endforeach; ?>
</body>
</main>
</html>