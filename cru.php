<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';
//appel de ce qui contient mes fonctions
require 'inc/functions.php';

//function qui affiche mon select catégorie de films
$selectCategory = categoryFunction();

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
			$validationCru = 'nouvelle catégorie créée<br>';
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
			$validationCru = 'catégorie modifiée';
		}
		else {
			print_r($pdoCreate->errorInfo());
		}
	}
}//fin isset $_post

require 'inc/header.php';
require 'inc/cru_cat_view.php';
require 'inc/footer.php';