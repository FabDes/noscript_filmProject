<?php
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

require 'inc/crud_movie_view.php';