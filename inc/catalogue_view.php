<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Catalogue</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<main>
<header>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="categorie.php">Catégories</a></li>
			<li><a href="crud.php">Ajouter un film</a></li>
		</ul>
	</nav>
	<form id="search_all" method="GET" action="catalog.php">
		<input type="search" placeholder="Recherche" name="the_search">
		<button type="submit" name="OK">OK</button>
	</form>
</header>
<body>
	<div>
		<form action="#">
		    <select name="page" size="1">
			    <option>page x</option>  
			</select>
	    </form>
	</div>
<?php

	foreach ($search as $key => $value) {
?>
		<div class="movieCat">
			<img src="<?= $value['mov_image'] ?>">
			<p>#<?= $value['mov_id'] ?></p>
			<h1><?= $value['mov_title'] ?></h1>
			<p><?= $value['mov_synopsis'] ?></p>
			<button><a href="#">Détails</a></button>
			<button><a href="#">Modifier</a></button>
		</div>
<?php
	
}
?>	
	<div>
		<a href="#">< Précédent</a>
		<p>Page du catalogue</p>
		<a href="#">Suivant ></a>
	</div>

</body>
</html>