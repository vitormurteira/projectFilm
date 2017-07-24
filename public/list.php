<?php

// J'inclus le fichier de config
require dirname(dirname(__FILE__)).'/inc/config.php';
require dirname(dirname(__FILE__)).'/inc/db.php';

// Je récupère la donnée (page) de l'URL (list.php?page=xxx)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// Je récupère la donnée (recherche) de l'URL (list.php?s=xxx)
$search = isset($_GET['s']) ? trim($_GET['s']) : '';
// Je calcule l'offset correspondant à la page
$limit = 3;
$offset = ($page-1) * $limit;

$sql = '
  SELECT *
  FROM movies
';

// Si recherche
if (!empty($search)) {
  $sql .= "
    LEFT JOIN categories ON movies.idmovies_categories = categories.idmovies_categories
    WHERE movies_title LIKE :search
      OR movies_categories_name LIKE :search
      OR movies_synopsis LIKE :search
      OR movies_path LIKE :search
  ";
}

$sql .= '
  LIMIT '.$limit.' OFFSET '.$offset.'
';

$pdoStatement = $pdo->prepare($sql); //=>prepare car donnée "externe" si recherche

$pdoStatement->bindValue(':search', '%$search%');

if ($pdoStatement->execute() === false) {
  print_r($pdo->errorInfo());
}
else {
  $movieList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  $maxPageNum = ceil(count($movieList[0]) / $limit)-1;
}

// J'inclus les vues
require dirname(dirname(__FILE__)).'/view/header.php';
require dirname(dirname(__FILE__)).'/view/list.php';
require dirname(dirname(__FILE__)).'/view/footer.php';

 ?>
