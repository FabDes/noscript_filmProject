<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<!-- Grande barre de recherche -->
<form id="bigSearchBar" method="GET" action="catalog.php">
	<input id="the_search" type="search" placeholder="Recherche" name="the_search">
	<button id="the_button" type="submit">OK</button>
</form>

<!-- Affiche les catégories et nombre de films -->
<nav id="nav_cat">
	<ul>
	<?php foreach ($categorySort as $key => $value):?>
		<li><a href="catalog.php?the_search=<?= $value['cat_name'] ?>"><?= $value['cat_name'].' ('.$value['countMovies'].')'?></a></li>
	<?php endforeach; ?>
	</ul>
</nav>

<!-- Affiche 4 films random -->
<div class="imgLienFrame">
	<?php foreach ($randomImg as $key => $value):?>
		<div class="imgLien">
			<img class="img_movie" src="<?= $value['mov_image'] ?>">
			<a class="titel_movie" href="catalog.php?the_search=<?= $value['mov_title'] ?>"><?= $value['mov_title'] ?></a>
		</div>
	<?php endforeach; ?>
</div>