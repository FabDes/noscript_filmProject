<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';
//nb de film 

$nbFilm = isset($_GET['limit']) ? intval($_GET['limit']) : 3;

$currentOffset= 0;	
if(array_key_exists('offset', $_GET) && $_GET['offset']>0){ 
	$currentOffset = intval($_GET['offset']);
}

// the_search. 
$search = array();
if(isset($_GET['the_search']) && !empty($_GET['the_search'])){
	$theSearch = isset($_GET['the_search']) ? strip_tags(trim($_GET['the_search'])) : '';

	$sqlSearch = '
		SELECT mov_id, mov_title, category.cat_id, cat_name, mov_synopsis, mov_path, mov_cast, mov_image
		FROM movie
		INNER JOIN category ON category.cat_id = movie.cat_id
		WHERE mov_title = :mov_title
		OR cat_name = :mov_title
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
		//print_r($search);
		//$moveId = $search['mov_id']; Affiche tout le temps offset=1
	}
	else {
		echo 'aucun resultat';
	}
}
else{
	$sqlNoSearch = '
		SELECT mov_id, mov_title, category.cat_id, cat_name, mov_synopsis, mov_path, mov_cast, mov_image
		FROM movie
		INNER JOIN category ON category.cat_id = movie.cat_id
		ORDER BY RAND()
		
	';

	$pdoStatement = $pdo->prepare($sqlNoSearch);

	$pdoStatement->bindValue(':mov_title', $theSearch, PDO::PARAM_STR);
	$pdoStatement->bindValue(':nbFilm', $nbFilm, PDO::PARAM_INT);
	$pdoStatement->bindValue(':offset', $currentOffset, PDO::PARAM_INT);

	if ($pdoStatement->execute() === false){
		print_r($pdoStatement->errorInfo());
	}
	else if ($pdoStatement->rowCount()>0){
		$emptySearch= $pdoStatement->fetchAll();
		//print_r($emptySearch);
		//$moveId = $search['mov_id']; Affiche tout le temps offset=1
	}
}

//calcul du offset pour la page : arrondi supérieur round()
//l'id représente le nombre de films précédents / pour le suivant
//$currentOffset = round($moveId/$nbFilm);

//modif ds le catalogue_view.php de la valeur du offset en GET,
//ajout du nbre nbFilm grâce à un select récupéré en GET

// list catalogue
require 'inc/catalogue_view.php';