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
	<button type="submit">OK</button>
</header>
<body>
	<div>
<!-- barre de recherche dans IMDB -->
		<h3>Gestion du film : <?php if (isset($fileGetTable['Title'])) {echo $fileGetTable['Title'];} ?></h3>
		<form action="" method="get">
			<input type="text" name="search_OMDB" placeholder="entrer votre film à ajouter">
			<input type="submit" value="rechercher film">
		</form>
		<br>
<!-- ajout du film trouvé en BDD -->
		<form action="" method="post" enctype="multipart/form-data">
			<label>Titre du film</label><br>
		    <input type="text" name="add_film_title" value="<?php if (isset($fileGetTable['Title'])) {echo $fileGetTable['Title'];} ?>"><br>
		    <span style="color:red;"><?php if (isset($mainTitleError)) {echo $mainTitleError;} ?></span>
		    <br>

		    <label>Catégorie du film</label><br>
		     <select name="categorie" size="1">
	    	<?php foreach ($selectCategory as $key => $value) : ?>
		    	<option value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option> 		
	    	<?php endforeach; ?>
			</select>
			<?php if (isset($fileGetTable['Genre'])) {echo ' <u>Choisissez le genre :</u> '.$fileGetTable['Genre'];} ?><br>
		    <br>

		<!-- release date & casting -->
			<label>Date de sortie</label>
			<input type="text" name="add_film_released" value="<?php if (isset($fileGetTable['Released'])) {echo $fileGetTable['Released'];} ?>"><br>
			<br>

			<label>Casting</label><br>
		    <textarea rows="3" cols="50" type="text" name="add_film_cast"><?php if (isset($fileGetTable['Actors'])) {echo $fileGetTable['Actors'];} ?></textarea><br>
		    <br>

		    <label>Synopsis</label><br>
		    <textarea rows="5" cols="50" type="text" name="add_film_synopsis"><?php if (isset($fileGetTable['Plot'])) {echo $fileGetTable['Plot'];} ?></textarea><br>
		    <br>

		    <label>Chemin de stockage</label><br>
		    <input type="text" name="add_film_path" value="" placeholder="où est stocké votre film ?"><br>
		   	<select name="storage">
		   	<?php foreach ($selectStorage as $key => $value) : ?>
		   		<option value="<?= $value['sto_id'] ?>"><?= $value['sto_name'] ?></option>
		   	<?php endforeach; ?>
		   	</select><br>
		    <br>

		    <label>Titre Original</label><br>
		    <input type="text" name="add_film_VO_title" value="<?php if (isset($fileGetTable['Title'])) {echo $fileGetTable['Title'];} ?>"><br>
		    <br>

		    <label>Image du film</label><br>
			<input type="text" name="add_film_pic" value="<?php if (isset($fileGetTable['Poster'])) {echo $fileGetTable['Poster'];} ?>"><br>	    
		    <br>

		    <br><input type="submit" value="Ajouter"> 
		    <span><?php if (isset($addValidation)) {echo $addValidation;} ?></span>
	    </form>
	</div>
</body>
</html>