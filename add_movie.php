<?php
//appel de ce qui contient ma fonction
require 'inc/functions.php';
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';

if (isset($_GET) && !empty($_GET['search_OMDB'])) {
	$fileGet=file_get_contents("http://www.omdbapi.com/?t=". $_GET['search_OMDB'] ."&y=&plot=short&r=json");
	echo $fileGet;
	$fileGetTable = json_decode($fileGet);
}
else {
	echo 'veuillez saisir une recherche';
}

//function qui affiche mon select catégorie de films
selectCategory();

require 'inc/crud_movie_view.php';