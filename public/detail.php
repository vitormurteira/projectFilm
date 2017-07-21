<?php

// J'inclus le fichier de config
require dirname(dirname(__FILE__)).'/inc/config.php';
require dirname(dirname(__FILE__)).'/inc/db.php';

// Je récupère la donnée (id) de l'URL (list.php?id=xxx)
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Requete pour la base de donnees
$sql = '
  SELECT *
  FROM movies
  LEFT JOIN categories ON movies.idmovies_categories = categories.idmovies_categories
  LEFT JOIN movies_support ON movies.idmovies_support = movies_support.idmovies_support
  WHERE idmovies = :movieId
';

$pdoStatement = $pdo->prepare($sql); //=>prepare car donnée id "externe"

$pdoStatement->bindValue(':movieId', $id, PDO::PARAM_INT);

if ($pdoStatement->execute() === false) {
  print_r($pdo->errorInfo());
}
else {
  $movieDetail = $pdoStatement->fetch(PDO::FETCH_ASSOC);
}

// J'inclus les vues
require dirname(dirname(__FILE__)).'/view/header.php';
require dirname(dirname(__FILE__)).'/view/detail.php';
require dirname(dirname(__FILE__)).'/view/footer.php';

 ?>
