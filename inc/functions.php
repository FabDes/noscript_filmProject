<?php
//création de la fonction qui affiche les différentes catégories de films dans un select html
function categorySelect() {
	//il n'y a pas de require à la DB...
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
}