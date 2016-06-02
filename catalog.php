<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';
//nb de film 

$nbFilm = 3;
$currentOffset= 0;
	
if(array_key_exists('offset', $_GET)){ 
	$currentOffset = intval($_GET['offset']);
}

// the_search. 
$search = array();
if(!empty($_GET['the_search'])){
	$theSearch = $_GET['the_search'];// type?

	$sqlSearch = '
		SELECT mov_id, mov_title, category.cat_id, cat_name, mov_synopsis, mov_path, mov_cast, mov_image
		FROM movie
		INNER JOIN category ON category.cat_id = movie.cat_id
		WHERE mov_title = :mov_title
		LIMIT :offset, :nbFilm
	';

	$pdoStatement = $pdo->prepare($sqlSearch);

	$pdoStatement->bindValue(':mov_title', $theSearch, PDO::PARAM_STR);
	$pdoStatement->bindValue(':nbFilm', $nbFilm, PDO::PARAM_INT);
	$pdoStatement->bindValue(':offset', $currentOffset, PDO::PARAM_INT);

	if ($pdoStatement->execute() === false){
		print_r($pdoStatement->errorInfo());
	}
	else if ($pdoStatement->rowCount()>0){
		$search= $pdoStatement->fetchAll();
		print_r($search);
	}
	else {
		echo 'aucun resultat';
	}
}

// list catalogue


require 'inc/catalogue_view.php';