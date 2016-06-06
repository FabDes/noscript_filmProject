<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Catalogue</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<main>
<header>
	<nav>
		<ul>
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Catégories</a></li>
			<li><a href="#">Ajouter un film</a></li>
		</ul>
	</nav>
	<form id="search_all" method="GET" action="catalog.php">
		<input type="search" placeholder="Recherche" name="the_search">
		<button type="submit" name="OK">OK</button>
	</form>
</header>
<body>
	<div id="cru">
		<h3>Gestion des catégories</h3>

		<form action="" method="post">
		    <select name="categorie" size="1">
		    	<option value="new">Nouvelle catégorie</option> 
		    	<?php foreach ($selectCategory as $key => $value) : ?>
			    	<option value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option> 		
		    	<?php endforeach; ?>
			</select>
			<br>
	   
	    	<input type="text" name="renameCategorie">
	    	<br>
	    	
	    	<button type="submit">Valider</button>
	    </form>
	</div>
</body>
</html>