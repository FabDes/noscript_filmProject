<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Catalogue view</title>
</head>
<header>
	<nav>
		<ul>
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Catégories</a></li>
			<li><a href="#">Ajouter un film</a></li>
		</ul>
	</nav>
	<form method="GET" action="catalog.php">
	<input type="search" placeholder="Recherche" name="the_search">
	<button type="submit">OK</button>
	</form>
</header>
<body>
	<div>
	<!-- récupère le nbre nbFilm en GET pr LIMIT dynamique avec OFFSET -->
	<!-- !! input type hidden pr y ajouter les GET de search et offset  -->
		<form action="">
			<input type="hidden" name="the_search" value="<?= $theSearch ?>">
			<input type="hidden" name="offset" value="<?= $currentOffset ?>">
		    <select name="limit">
		    	<option value="1" <?php if (isset($nbFilm) && $nbFilm==1) {echo 'selected';} ?>>1</option>
		    	<option value="2" <?php if (isset($nbFilm) && $nbFilm==2) {echo 'selected';} ?>>2</option>
			    <option value="3" <?php if (isset($nbFilm) && $nbFilm==3) {echo 'selected';} ?>>3</option>
			    <option value="6" <?php if (isset($nbFilm) && $nbFilm==6) {echo 'selected';} ?>>6</option>
			    <option value="10" <?php if (isset($nbFilm) && $nbFilm==10) {echo 'selected';} ?>>10</option>
			    <option value="15" <?php if (isset($nbFilm) && $nbFilm==15) {echo 'selected';} ?>>15</option>
			    <option value="25" <?php if (isset($nbFilm) && $nbFilm==25) {echo 'selected';} ?>>25</option>
			    <option value="35" <?php if (isset($nbFilm) && $nbFilm==35) {echo 'selected';} ?>>35</option>
			</select>
			<button type="submit">par page</button>
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
			<button><a href="details.php">Détails</a></button>
		<!-- Je mets en argument "modif" l'id du film, pr être redirigé sur add_movie.php -->
			<button><a href="add_movie.php?modif=<?= $value['mov_id'] ?>">Modifier</a></button>
		</div>
<?php
	
}
?>	
	<div>
	<!-- offset+limit => donne en tout premier lieu 0, et puis, 0+3 c-à-d on affiche à partir de 0 jusqu'à 2, et puis, on affiche à partir de 3 jusqu'à 5, etc -->
		<a href="catalog.php?the_search=<?=$theSearch ?>&offset=<?=($currentOffset-$nbFilm)?>&limit=<?= $nbFilm ?>">< Précédent</a>
		<a href="catalog.php?the_search=<?= $theSearch ?>&offset=<?=($currentOffset+$nbFilm)?>&limit=<?= $nbFilm ?>">Suivant ></a>
	</div>
</body>
</html>