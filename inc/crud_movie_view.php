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
		<form action="" method="post" enctype="multipart/form-data">
			<label>Titre du film</label>
		    <input type="text" name=""><br>
		    <br>
		    <label>Catégorie du film</label>
		    <input type="text" name=""><br>
		    <br>
		    <label>Synopsis</label>
		    <input type="text" name=""><br>
		    <br>
		    <label>Chemin de stockage</label>
		    <input type="text" name=""><br>
		    <br>	
		    <label>Titre Original</label>
		    <input type="text" name=""><br>
		    <br>
		    <label>Image du film</label>
			<input type="file" name="moviePicture">
			<input type="submit" value="Télécharger">
	    </form>
	    <br>
	    <br>
	    <button type="submit">Supprimer</button>
	    <button type="submit">Valider</button>
	</div>
</body>
</html>