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
	<input type="search" placeholder="Recherche" name="the_search">
	<button type="submit" name="OK">OK</button>
</header>
<body>
	<div>
		<form action="#">
		    <select name="page" size="1">
			    <option>page x</option>  
			</select>
	    </form>
	</div>

	<div class="movieCat">
		<img src="../img/Fast.jpg">
		<p>#ID1</p>
		<h1>Titre du film</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.
		</p>
		<button><a href="crud.php">Détails</a></button>
		<button><a href="cru.php">Modifier</a></button>
	</div>
	<div class="movieCat">
		<img src="../img/Fast.jpg">
		<p>#ID2</p>
		<h1>Titre du film</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.
		</p>
		<button><a href="crud.php">Détails</a></button>
		<button><a href="cru.php">Modifier</a></button>
	</div>
	<div class="movieCat">
		<img src="../img/Fast.jpg">
		<p>#ID3</p>
		<h1>Titre du film</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.
		</p>
		<button><a href="crud.php">Détails</a></button>
		<button><a href="cru.php">Modifier</a></button>
	</div>
	<div>
		<a href="#">< Précédent</a>
		<p>Page du catalogue</p>
		<a href="#">Suivant ></a>
	</div>

</body>
</html>