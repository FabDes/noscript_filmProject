<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';
//appel de ce qui contient ma fonction
require 'inc/functions.php';

//-----------------RECHERCHER SUR IMDB-----------------
if (isset($_GET['search_OMDB'])) {
	$searchOMDB = isset($_GET['search_OMDB']) ? strip_tags(trim($_GET['search_OMDB'])) : '';

	if (!empty($searchOMDB)) {
		//En STRING, on récupère les infos sur le film de IMDB en json 
		//aller tester "Examples By Title" sur http://www.omdbapi.com/ => on utilise la request en mettant au paramètre "t=" notre mot entré en recherche.
		$fileGet = file_get_contents("http://www.omdbapi.com/?t=". $searchOMDB ."&y=&plot=short&r=json");
		//echo $fileGet;

		//on transforme la string en TABLEAU 
		$fileGetTable = json_decode($fileGet, true);
		//print_r($fileGetTable);
		//duquel on va récupérer les valeurs pour les afficher dans le formulaire html.
	}
	else {
		echo 'veuillez saisir une recherche';
	}
}

//function qui affiche mon select catégorie de films
categoryFunction();
//function qui affiche mon select stockage des films
storageFunction();

//récupération des champs des formulaires, ils ont les mm name= dans les 2
if (isset($_POST) && !empty($_POST)) {
	$mainTitle = isset($_POST['add_film_title']) ? strip_tags(trim($_POST['add_film_title'])) : '';
	$category = isset($_POST['categorie']) ? intval($_POST['categorie']) : '';
	$releaseDate = isset($_POST['add_film_released']) ? strip_tags(trim($_POST['add_film_released'])) : '';
	$casting = isset($_POST['add_film_cast']) ? strip_tags(trim($_POST['add_film_cast'])) : '';
	$plot = isset($_POST['add_film_synopsis']) ? strip_tags(trim($_POST['add_film_synopsis'])) : '';
	$storagePath = isset($_POST['add_film_path']) ? strip_tags(trim($_POST['add_film_path'])) : '';
	$storageType = isset($_POST['storage']) ? intval($_POST['storage']) : '';
	$originTitle = isset($_POST['add_film_VO_title']) ? strip_tags(trim($_POST['add_film_VO_title'])) : '';
	$posterPath = isset($_POST['add_film_pic']) ? strip_tags(trim($_POST['add_film_pic'])) : '';

	if (empty($mainTitle)) {
		$mainTitleError = 'Titre requis';
	}
	else {
//-----------------AJOUT DU FILM-----------------
		$insql = '
			INSERT INTO movie 
			(
				cat_id,
				sto_id,
				mov_title,
				mov_release_date,
				mov_cast,
				mov_synopsis,
				mov_path,
				mov_original_title,
				mov_image,
				mov_date_creation
			)
			VALUES 
			(
				:category,
				:storageType,
				:mainTitle,
				:releaseDate,
				:casting,
				:plot,
				:storagePath,
				:originTitle,
				:posterPath,
				NOW()
			)
		';
		$pdoStIns = $pdo->prepare($insql);
		$pdoStIns->bindValue(':category', $category, PDO::PARAM_INT);
		$pdoStIns->bindValue(':storageType', $storageType, PDO::PARAM_INT);
		$pdoStIns->bindValue(':mainTitle', $mainTitle);
		$pdoStIns->bindValue(':releaseDate', $releaseDate);
		$pdoStIns->bindValue(':casting', $casting);
		$pdoStIns->bindValue(':plot', $plot);
		$pdoStIns->bindValue(':storagePath', $storagePath);
		$pdoStIns->bindValue(':originTitle', $originTitle);
		$pdoStIns->bindValue(':posterPath', $posterPath);
		if ($pdoStIns->execute()) {
			$addValidation = 'Film ajouté !';
		}
		else {
			print_r($pdoStIns->errorInfo());
			$addValidation = 'erreur d\'envoi';
		}
//-----------------MODIFICATION D'UN FILM-----------------
		if (isset($_GET['modif']) && !empty($_GET['modif'])) {		
			$updateSql = '
				UPDATE movie 
				SET 
					cat_id = :category,
					sto_id = :storageType,
					mov_title = :mainTitle,
					mov_release_date = :releaseDate,
					mov_cast = :casting,
					mov_synopsis = :plot,
					mov_path = :storagePath,
					mov_original_title = :originTitle,
					mov_image = :posterPath,
					mov_date_update = NOW()
				WHERE 
					mov_id = '.$_GET['modif'].'
			';
			$pdoStUp = $pdo->prepare($updateSql);
			$pdoStUp->bindValue(':category', $category, PDO::PARAM_INT);
			$pdoStUp->bindValue(':storageType', $storageType, PDO::PARAM_INT);
			$pdoStUp->bindValue(':mainTitle', $mainTitle);
			$pdoStUp->bindValue(':releaseDate', $releaseDate);
			$pdoStUp->bindValue(':casting', $casting);
			$pdoStUp->bindValue(':plot', $plot);
			$pdoStUp->bindValue(':storagePath', $storagePath);
			$pdoStUp->bindValue(':originTitle', $originTitle);
			$pdoStUp->bindValue(':posterPath', $posterPath);
			if ($pdoStUp->execute()) {
				$updateValidation = 'Film modifié !';
			}
			else {
				print_r($pdoStUp->errorInfo());
				$updateValidation = 'erreur';
			}
		}//fin modification
	}//fin Titre du film rempli
}//fin de mon isset $_post donc des 2 formulaires

//RECUPERATION DES INFOS BDD pr les mettre dans les input de la modification
//qd on clique sur le bouton "modifier" dans catalogue_view.php
if (isset($_GET['modif'])) {
	$updateMovie = 'Modifier le film :';
	//récupération des infos en BDD
	$sqlDB = '
		SELECT *
		FROM movie 
		WHERE mov_id = '.$_GET['modif'].'
	';
	$pdoStDB = $pdo->query($sqlDB);
	if ($pdoStDB->execute()) {
		if ($pdoStDB->rowCount() > 0) {
			$getFilmDB = $pdoStDB->fetch();
			//print_r($getFilmDB);
		}
		else {
			echo 'film introuvable';
		}
	}
	else {
		print_r($pdo->errorInfo());
	}
}
/*
print_r($_POST);
echo '<hr>';
print_r($_GET);
*/
require 'inc/add_movie_view.php';