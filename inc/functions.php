<?php
//création de la fonction qui affiche les différentes CATEGORIES de films dans un select html
function categoryFunction() {
	require 'inc/db.php';
	$sql = '
		SELECT cat_id, cat_name
		FROM category
	';
	$pdoStatement = $pdo->query($sql);
	if ($pdoStatement->execute()==false) {
		print_r($pdo->errorInfo());
	}
	else {
		if ($pdoStatement->rowCount() > 0) {
			return $pdoStatement->fetchAll();
			//return pr récupérer un tableau en appelant la fonction
		}
	}
}

//création de la fonction qui affiche les différents STOCKAGES des films dans un select html
function storageFunction() {
	require 'inc/db.php';
	$stoSql = '
		SELECT sto_id, sto_name
		FROM storage
	';
	$pdoStmt = $pdo->query($stoSql);
	if ($pdoStmt->execute() == false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStmt->rowCount() > 0) {
		return $pdoStmt->fetchAll();
	}
}