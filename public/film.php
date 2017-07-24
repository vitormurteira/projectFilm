<?php 

//inclusion du fichier de config (chaque fichier public)

require '../inc/config.php';
require '../inc/db.php';

// pour ajouter un film : utilisation de la methode POST plus securisée que la methode GET (recuperation de données externe)

$errorList = array();


if(!empty($_POST)){

//donnees a suivre : POST 

	// si la donnée récupérée par la méthode POST n'est pas vide (si le formulaire a été remplie)

	//et si chaque champ individuellementy a été rempli et que l'on filtre les espaces potentiels de la saisie 

	var_dump($_POST).'<br>';

	// ---------------------------RECUPERATION DE DONNEES -------------------------------


	//1. RECUPERATION DE LA DONNEE "title":

	$title = isset($_POST['movies_title']) ? strip_tags(trim($_POST['movies_title'])) : '';


	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! la donnée "index" du tableau $_POST doit etre egale à la donnée saisie en view/film.php dans le name du form de saisie des données relmatyive au nouveau film ------------------>

	//NB: le strip_tag évite les injections

	//2. RECUPERATION DE LA DONNEE "synopsis":

	$synopsis = isset($_POST['movies_synopsis']) ? strip_tags(trim($_POST['movies_synopsis'])) : '';

	//3. RECUPERATION DE LA DONNEE "affiche":

	$affiche = isset($_POST['movies_affiche_url']) ? strip_tags(trim($_POST['movies_affiche_url'])) : '';

	//4. RECUPERATION DE LA DONNEE "date de sortie ou release_date":

	$release_date = isset($_POST['movies_release_date']) ? strip_tags(trim($_POST['movies_release_date'])) : '';

	//5. RECUPERATION DE LA DONNEE "date de telechargement ou register_date":

	$registery_date = isset($_POST['movies_registery_date']) ? strip_tags(trim($_POST['movies_registery_date'])) : '';

	//6. RECUPERATION DE LA DONNEE "description longue":

	$description = isset($_POST['movies_description']) ? strip_tags(trim($_POST['movies_description'])) : '';

	//7. RECUPERATION DE LA DONNEE "categories":

	$categories = isset($_POST['idmovies_categories']) ? strip_tags(trim($_POST['idmovies_categories'])) : '';

	//8. RECUPERATION DE LA DONNEE "acteurs":

	$actors = isset($_POST['movies_actors']) ? strip_tags(trim($_POST['movies_actors'])) : '';

	//9. RECUPERATION DE LA DONNEE "nationalité":

	$nationality = isset($_POST['idmovies_nationality']) ? strip_tags(trim($_POST['idmovies_nationality'])) : '';

	//10. RECUPERATION DE LA DONNEE "support":

	$support = isset($_POST['idmovies_support']) ? strip_tags(trim($_POST['idmovies_support'])) : '';

	//11. RECUPERATION DE LA DONNEE "chemin":

	$path = isset($_POST['idmovies_path']) ? strip_tags(trim($_POST['idmovies_path'])) : '';




	// -----------------------------VALIDATION DE DONNEES -------------------------------

	// BEAUCOUP D'AIDE SUR PHP FILTER VALIDATE !!!!!!!!!!!!!!!


	//1. VALIDATION DE LA DONNEE "title":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($title)){
		$formValid = false;
		echo "Please add a title in your movies addition process !";
	}

	//etape 2. validation des conditionnalités associées au titre 

	else if (strlen($title) < 0){
		$formValid = false;
		echo "title must have at least one character";
	}

	//2. VALIDATION DE LA DONNEE "synopsis":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($synopsis)){
		$formValid = false;
		echo "Please add a synopsis in your movies addition process !";
	}

	//etape 2. validation des conditionnalités associées au résumé

	else if (strlen($synopsis) < 10){
		$formValid = false;
		echo "synopsis must have at least 10 character";
	}

	//3. VALIDATION DE LA DONNEE "affiche":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($affiche)){
		$formValid = false;
		echo "Please add an poster in your movies addition process !";
	}

	//etape 2. aucune conditionnalité associée  

	else if (!filter_var($affiche, FILTER_VALIDATE_URL)){
		$formValid = false;
		echo "url is not a valid one";
	}

	//PS : $affiche = $url;

	//4. VALIDATION DE LA DONNEE "date de sortie ou release_date":

	//etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($release_date)){
		$formValid = false;
		echo "Please add a release date in the french format !";
	}

	//etape 2. validation des conditionnalités associées à la date de sortie: format francais 

	else if (!empty($release_date)){
		$formValid = false;
		echo "date : ok!";
	}

	//5. VALIDATION DE LA DONNEE "date de telechargement ou register_date":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($registery_date)){
		$formValid = false;
		echo "Please select a register_date in your movies addition process !";
	}

	//etape 2. validation des conditionnalités associées à la date de sortie 

	else if (!empty($registery_date)){
		$formValid = false;
		echo "date is ok, you're the best man";
	}

	//6. VALIDATION DE LA DONNEE "description longue":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($description)){
		$formValid = false;
		echo "Please add a description !";
	}

	//etape 2. validation des conditionnalités associées à la description

	else if (strlen($description) < 0){
		$formValid = false;
		echo "Description must have at least one character";
	}

	//7. VALIDATION DE LA DONNEE "categories":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($categories)){
		$formValid = false;
		echo "Please select a category !";
	}

	//etape 2. validation des conditionnalités associées à la catégorie

	else if (strlen($categories) < 0){
		$formValid = false;
		echo "Category must be selected";
	}

	//8. VALIDATION DE LA DONNEE "acteurs":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($actors)){
		$formValid = false;
		echo "Please add an actor";
	}

	//etape 2. validation des conditionnalités associées aux acteurs

	else if (strlen($actor) < 0){
		$formValid = false;
		echo "Actor must have at least one character";
	}

	//9. VALIDATION DE LA DONNEE "nationality":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($nationality)){
		$formValid = false;
		echo "Please add an nationality";
	}

	//etape 2. validation des conditionnalités associées à la nationalité

	else if (strlen($nationality) < 0){
		$formValid = false;
		echo "Nationality must have at least one character";
	}

	//10. VALIDATION DE LA DONNEE "support":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($support)){
		$formValid = false;
		echo "Please add a support";
	}

	//etape 2. validation des conditionnalités associées au support

	else if (strlen($support) < 0){
		$formValid = false;
		echo "Support must have at least one character";
	}

	//11. VALIDATION DE LA DONNEE "path":

	// etape 1. si le champ "title" est vide alors la validation du formulaire est fausse (boolean)

	if (empty($path)){
		$formValid = false;
		echo "Please add a path";
	}

	//etape 2. validation des conditionnalités associées au chemin 

	else if (strlen($path) < 0){
		$formValid = false;
		echo "Path must have at least one character";
	}


	// -----------------------------AJOUT DES DONNEES DANS LA DATABASE-------------------------------


	// 1. insertion via la création d'une variable $sql

	$sql = '
	INSERT INTO movies (movies_title, movies_synopsis, movies_affiche_url, movies_release_date, movies_registery_date, movies_description, idmovies_categories, movies_actors, idmovies_nationality, idmovies_support, movies_path)
	VALUES (:title, :synopsis, :affiche_url, :release_date, :registery_date, :description, :categories, :actors, :nationality, :support, :path)
	';

	$pdoStatement = $pdo -> prepare($sql);

	//2. Protection des données intégrés dans la database en passant par un token

			$pdoStatement->bindValue(':title', $title);
			$pdoStatement->bindValue(':synopsis', $synopsis);
			$pdoStatement->bindValue(':affiche_url', $affiche);
			$pdoStatement->bindValue(':release_date', $release_date);
			$pdoStatement->bindValue(':registery_date', $registery_date);
			$pdoStatement->bindValue(':description', $description);
			$pdoStatement->bindValue(':categories', $categories);
			$pdoStatement->bindValue(':actors', $actors);
			$pdoStatement->bindValue(':nationality', $nationality);
			$pdoStatement->bindValue(':support', $support);
			$pdoStatement->bindValue(':path', $path);

			// Si erreur
			if($pdoStatement->execute() === false) {

			}
			else{
				$lastMoviesId = $pdo->lastInsertId();
			}


	// -----------------------------RETOUR VERS LA PAGE DU DERNIER FILM RECUPERER-------------------------------

	echo 'L\'ID de la dernière ligne insérée est #'.$lastMoviesId.'<br>';

	/*header: permet de spécifier l'en-tête HTTP string lors de l'envoi des fichiers HTML*/

	/*il doit se trouver dans le "if" pour pas que la redirection se fasse systematiquement*/ 

	header("Location:detail.php?id=$lastMoviesId");
}

//fin du "post" 


// creation du select offrant un choix de support:

// 1. on cree une variable qui regroupe l'ensemble des supports 

$supportList = array();

$sql='
	SELECT *
	FROM movies_support
'; 

$stmtsupportname = $pdo->query($sql);

if ($stmtsupportname === false){
	print_r($pdo->errorInfo());
}
else {
	$supportList = $stmtsupportname->fetchAll(PDO::FETCH_ASSOC);
}



/*il est nécessaire d'initialiser le tableau de données compilant l'ensemble des requetes:*/

$moviesInfos = array(
	'idmovies'=> 0,
	'movies_title'=>'',
	'movies_synopsis'=>'',
	'movies_affiche_url'=>'',
	'movies_release_date'=>'',
	'movies_registery_date'=>'',
	'movies_description'=>'',
	'idmovies_categories'=>'',
	'movies_actors'=>'',
	'idmovies_nationality'=>'',
	'idmovies_support'=>'',
	'movies_path'=>'',
	);

require '../view/header.php';
require '../view/film.php';
require '../view/footer.php';


/*definition de variable:

$pdo : definit en db.php et utilisé ds public  

*/


