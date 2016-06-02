<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';

// the_search. 
$search = array();
if(!empty($_GET['the_search'])){
	$theSearch = $_GET['the_search'];// type?

	$sqlSearch = '
		SELECT mov_title, mov_cat, mov_synopsis, mov_path, mov_cast
		FROM movie
		WHERE mov_title = :mov_title
	';

	$pdoStatement = $pdo->prepare($sqlSearch);

	$pdoStatement->bindValue( ':mov_title', '%$theSearch%');
	if ($pdoStatement ->execute() === false){
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount()>0){
		$search= $pdoStatement->fetchAll();
		}
}












require 'inc/catalogue_view.php';