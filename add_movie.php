<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';
//appel de ce qui contient ma fonction
require 'inc/functions.php';

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

require 'inc/crud_movie_view.php';