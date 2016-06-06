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
	<div>
<!-- barre de recherche dans IMDB -->
		<h3>Ajout d'un film : <?php if (isset($fileGetTable['Title'])) {echo $fileGetTable['Title'];} ?></h3>
		<form action="" method="get">
			<input type="text" name="search_OMDB" placeholder="entrer votre film à ajouter">
			<input type="submit" value="rechercher film">
		</form>
		<br>

<!-- AJOUT du film trouvé sur OMDB -->
		<?php if (isset($_GET['search_OMDB']) || empty($_GET)) : ?>
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
		<?php endif; ?>

<!-- MODIFIER un film choisi dans catalog.php -->
		<?php if (isset($_GET['modif']) && !empty($_GET['modif'])) : ?>
			<h3><?= $updateMovie.' '.$getFilmDB['mov_title'] ?></h3>

			<form action="" method="post" enctype="multipart/form-data">
				<label>Titre du film</label><br>
			    <input type="text" name="add_film_title" value="<?= $getFilmDB['mov_title'] ?>"><br>
			    <span style="color:red;"><?php if (isset($mainTitleError)) {echo $mainTitleError;} ?></span>
			    <br>

			    <label>Catégorie du film</label><br>
			     <select name="categorie" size="1">
		    	<?php foreach ($selectCategory as $key => $value) : ?>
			    	<option value="<?= $value['cat_id'] ?>" <?php if ($getFilmDB['cat_id'] == $value['cat_id']) {echo 'selected';} ?>><?= $value['cat_name'] ?></option> 		
		    	<?php endforeach; ?>
				</select>
			    <br>

				<label>Date de sortie</label>
				<input type="text" name="add_film_released" value="<?= $getFilmDB['mov_release_date'] ?>"><br>
				<br>

				<label>Casting</label><br>
			    <textarea rows="3" cols="50" type="text" name="add_film_cast"><?= $getFilmDB['mov_cast'] ?></textarea><br>
			    <br>

			    <label>Synopsis</label><br>
			    <textarea rows="5" cols="50" type="text" name="add_film_synopsis"><?= $getFilmDB['mov_synopsis'] ?></textarea><br>
			    <br>

			    <label>Chemin de stockage</label><br>
			    <input type="text" name="add_film_path" value="<?= $getFilmDB['mov_path'] ?>" placeholder="où est stocké votre film ?"><br>
			   	<select name="storage">
			   	<?php foreach ($selectStorage as $key => $value) : ?>
			   		<option value="<?= $value['sto_id'] ?>" <?php if ($getFilmDB['sto_id'] == $value['sto_id']) {echo 'selected';} ?>><?= $value['sto_name'] ?></option>
			   	<?php endforeach; ?>
			   	</select><br>
			    <br>

			    <label>Titre Original</label><br>
			    <input type="text" name="add_film_VO_title" value="<?= $getFilmDB['mov_original_title'] ?>"><br>
			    <br>

			    <label>Image du film</label><br>
				<input type="text" name="add_film_pic" value="<?= $getFilmDB['mov_image'] ?>"><br>	    
			    <br>

			    <br><input type="submit" value="Modifier">
			    <span><?php if (isset($updateValidation)) {echo $updateValidation;} ?></span>
	    	</form>
	    <?php endif; ?>
	</div>
</body>
</html>