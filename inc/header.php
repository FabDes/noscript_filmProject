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
			<li class="noscript_logo"><img src="img/noscript_logo.jpg"></li>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="cru.php">Catégories</a></li>
			<li><a href="add_movie.php">Ajouter un film</a></li>
		</ul>
	</nav>
	<form id="search_all" method="GET" action="catalog.php">
		<input type="search" placeholder="Recherche" name="the_search">
		<button type="submit">OK</button>
	</form>
</header>
<body>