<?php
//appel de ce qui contient ma fonction
require 'inc/functions.php';
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';

//function qui affiche mon select catégorie de films
selectCategory();

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
}//fin isset $_post

require 'inc/cru_cat_view.php';