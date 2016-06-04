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

//-----------------AJOUT DU FILM EN BDD-----------------
if (isset($_POST) && !empty($_POST)) {
	//print_r($_POST);
	$mainTitle = isset($_POST['add_film_title']) ? strip_tags(trim($_POST['add_film_title'])) : '';
	$category = isset($_POST['categorie']) ? intval($_POST['categorie']) : '';
	$releaseDate = isset($_POST['add_film_released']) ? strip_tags(trim($_POST['add_film_released'])) : '';
	$casting = isset($_POST['add_film_cast']) ? strip_tags(trim($_POST['add_film_cast'])) : '';
	$plot = isset($_POST['add_film_synopsis']) ? strip_tags(trim($_POST['add_film_synopsis'])) : '';
	$storagePath = isset($_POST['add_film_path']) ? strip_tags(trim($_POST['add_film_path'])) : '';
	$storageType = isset($_POST['storage']) ? intval($_POST['storage']) : '';
	$originTitle = isset($_POST['add_film_VO_title']) ? strip_tags(trim($_POST['add_film_VO_title'])) : '';
	$posterPath = isset($_POST['add_film_pic']) ? strip_tags(trim($_POST['add_film_pic'])) : '';

	$mainTitleValid = false;

	if (empty($mainTitle)) {
		$mainTitleError = 'Titre requis';
	}
	else {
		$mainTitleValid = true;
	}
	if ($mainTitleValid) {
		//ajout en BDD
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
	}
}//fin de mon isset _post

require 'inc/add_movie_view.php';