

<?php

// J'inclus le fichier de config
require dirname(dirname(__FILE__)).'/inc/config.php';
require dirname(dirname(__FILE__)).'/inc/db.php';


// fetch la liste des categories et le numero de filmes
$sql = '
  SELECT categories.idmovies_categories AS cats, COUNT(movies.idmovies) AS numMovies
  FROM movies
  INNER JOIN categories ON movies.idmovies_categories = categories.idmovies_categories
  ORDER BY cats
';

$pdoStatement = $pdo->query($sql);

$catList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);


// fetch la liste des 4 dernires filmes
$sql = '
  SELECT *
  FROM movies
  ORDER BY idmovies desc
  LIMIT 4
';

$pdoStatement = $pdo->query($sql);

$lastMovies = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

















// J'inclus les vues

require dirname(dirname(__FILE__)).'/view/header.php';
require dirname(dirname(__FILE__)).'/view/home.php';
require dirname(dirname(__FILE__)).'/view/footer.php';
