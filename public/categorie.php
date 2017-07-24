<?php

// nécessité de definir chaque page comme le currentpage à defaut pour que la navigation interprete les correspondance 
$currentPage = categorie;

// J'inclus le fichier de config
require dirname(dirname(__FILE__)).'/inc/config.php';
require dirname(dirname(__FILE__)).'/inc/db.php';

if (!empty($_GET['newCat'])){
  // Je récupère la donnée (categorie) de l'URL (categorie.php?categorie=xxx)
  $newCat = $_GET['newCat'];

  if(!empty($_GET['categorie']) && $_GET['categorie']!="categories"){
    $categorie = $_GET['categorie'];
    $sql = "
      UPDATE `categories`
      SET `movies_categories_name`= :new
      WHERE `idmovies_categories`= '$categorie'
    ";
  }

  else{
    $sql = "
      INSERT INTO `categories`
      (`movies_categories_name`)
      VALUE (:new)
    ";
  }

  $pdoStatement = $pdo->prepare($sql); //=>prepare car donnée categorie "externe"

  $pdoStatement->bindValue(':new', $newCat);

  if ($pdoStatement->execute() === false) {
    print_r($pdo->errorInfo());
  }

}
$sql = '
  SELECT *
  FROM categories
';

$categoryList = $pdo->query($sql);

// J'inclus les vues
require dirname(dirname(__FILE__)).'/view/header.php';
require dirname(dirname(__FILE__)).'/view/categorie.php';
require dirname(dirname(__FILE__)).'/view/footer.php';

 ?>
