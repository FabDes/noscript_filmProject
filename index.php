<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';


$categorySort= array();
//j ecris ma requete pour la recherche
$sql='
SELECT COUNT(mov_id), category.cat_name
FROM movie
INNER JOIN category ON category.cat_id = movie.cat_id
GROUP BY cat_name
LIMIT 4
';
$pdoStatement = $pdo->prepare($sql);

if ($pdoStatement ->execute() === false){
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount()>0){
	$categorySort= $pdoStatement->fetchAll();
	print_r($categorySort);
}