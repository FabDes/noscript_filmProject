<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout / Modification / Suppression d'un Film</title>

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
		<h3>Gestion du film : #</h3>
		<form action="" method="get">
			<input type="text" name="search_OMDB" placeholder="entrer votre film à ajouter">
			<input type="submit" value="rechercher film">
		</form><br>
		<form action="" method="post" enctype="multipart/form-data">
			<label>Titre du film</label><br>
		    <input type="text" name="add_film_title"><br>
		    <br>
		    <label>Catégorie du film</label><br>
		    <input type="text" name="add_film_category"><br>
		    <br>
		    <label>Synopsis</label><br>
		    <textarea rows="4" cols="50" name="add_film_synopsis"></textarea><br>
		    <br>
		    <label>Chemin de stockage</label><br>
		    <input type="text" name="add_film_path"><br>
		    <br>	
		    <label>Titre Original</label><br>
		    <input type="text" name="add_film_VO_title"><br>
		    <br>
		    <label>Image du film</label><br>
			<input type="file" name="add_film_pic"><br>
			<input type="submit" value="Télécharger">
	    </form>
	    <br>
	    <br>
	    <button type="submit">Supprimer</button>
	    <button type="submit">Valider</button>
	</div>
</body>
</html>