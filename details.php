<?php
// je factorise et je cree PDO et j inclus DB
require 'inc/db.php';


$mov_id =isset($_GET['movId'])?$_GET['movId']:'';
$sql='
SELECT *
FROM movie
INNER JOIN category ON category.cat_id = movie.cat_id
INNER JOIN storage ON storage.sto_id = movie.sto_id
WHERE mov_id = '.$mov_id.'
';

$pdoStatement=$pdo->query($sql);
if($pdoStatement->execute()===false){
	print_r($pdo->errorInfo());
}elseif($pdoStatement->rowCount()>0){
	$detailsMovie=$pdoStatement->fetch();
	//print_r($detailsMovie);
}

require 'inc/header.php';
require 'inc/movie_view.php';
require 'inc/footer.php';