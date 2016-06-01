<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
</head>
<body>
	<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<input type="search" placeholder="Recherche" name="the_search">
	<button type="submit" name="OK">OK</button>
	<nav>
		<ul>
		<?php foreach ($categorySort as $key => $value):?>
			<li><a href="#"><?= $value['cat_name'].' ('.$value[0].')'?></a></li>
		<?php endforeach; ?>
		</ul>
	</nav>
	<span>
		<img src="../img/Fast.jpg">
		<a href="#">Fast & Furious</a>
	</span>
	<span>
		<img src="../img/Fast.jpg">
		<a href="#">Fast & Furious</a>
	</span>
	<span>
		<img src="../img/Fast.jpg">
		<a href="#">Fast & Furious</a>
	</span>
	<span>
		<img src="../img/Fast.jpg">
		<a href="#">Fast & Furious</a>
	</span>
</body>
</html>