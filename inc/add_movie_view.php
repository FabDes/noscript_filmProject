<div class="content">
<!-- barre de recherche dans IMDB -->
	<h3>Ajout d'un film : <?php if (isset($fileGetTable['Title'])) {echo $fileGetTable['Title'];} ?></h3>
	<form action="" method="get">
		<input type="text" name="search_OMDB" placeholder="entrer votre film à ajouter">
		<input type="submit" value="rechercher film" class="btnOmdb">
	</form>
	<br>
<!-- Affichage du poster -->
	<img src="<?php if (isset($fileGetTable['Poster'])) {echo $fileGetTable['Poster'];} elseif (isset($getFilmDB['mov_image'])) {echo $getFilmDB['mov_image'];} ?>" style="position:relative;float:right;">
<!-- AJOUT du film trouvé sur OMDB -->
	<?php if (isset($_GET['search_OMDB']) || empty($_GET)) : ?>
		<h4 class="validAddMov"><?php if (isset($addValidation)) {echo $addValidation;} ?></h4>
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
		    <label>Long Synopsis</label><br>
		    <textarea rows="5" cols="50" type="text" name="add_film_descri"><?php if (isset($fileGetTableLong['Plot'])) {echo $fileGetTableLong['Plot'];} ?></textarea><br>
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
	    </form>
	<?php endif; ?>

<!-- MODIFIER un film choisi dans catalog.php -->
	<?php if (isset($_GET['modif']) && !empty($_GET['modif'])) : ?>
		<h4 class="validAddMov"><?php if (isset($updateValidation)) {echo $updateValidation;} ?></h4>
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
    	</form>
    <?php endif; ?>
</div>