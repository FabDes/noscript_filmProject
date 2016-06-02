<?php
// je factorise et je cree PDO et j inclus DB
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
		$selectCategory = $pdoStatement->fetchAll();
		//print_r($selectCategory);
	}
}

if (isset($_POST) && !empty($_POST)) {
	$newNameCat = isset($_POST['renameCategorie']) ? strip_tags(trim($_POST['renameCategorie'])) : '';

	if ($_POST['categorie'] == 'new') {
		$sqlNewCat = '
			INSERT INTO category 
			(
				cat_name,
				cat_date_creation
			)
			VALUES 
			(
				:newNameCat,
				NOW() 
			)
		';
		$pdoCreate = $pdo->prepare($sqlNewCat);
		$pdoCreate->bindValue(':newNameCat', $newNameCat);
		if ($pdoCreate->execute()) {
			echo 'nouvelle cat créée<br>';
		}
		else {
			print_r($pdoCreate->errorInfo());
		}
	}
	else {
		$updateCat = $_POST['categorie'];

		$sqlUpdateCat = '
			UPDATE category
			SET cat_name = :newName, cat_date_update = NOW()
			WHERE cat_id = :catId
		';
		$pdoUpdate = $pdo->prepare($sqlUpdateCat);
		$pdoUpdate->bindValue(':newName', $newNameCat);
		$pdoUpdate->bindValue(':catId', $updateCat);
		if ($pdoUpdate->execute()) {
			echo 'catégorie modifiée';
		}
		else {
			print_r($pdoCreate->errorInfo());
		}
	}
	//fin $_post rempli
}//fin isset $_post

//print_r($_POST);

require 'inc/cru_cat_view.php';