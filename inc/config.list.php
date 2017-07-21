<?php

// Tableau contenant des données sur la configuration
$config = array(
	'db_host' => 'wf3.progweb.fr',
	'db_user' => 'julienb',
	'db_password' => 'webforce3',
	'db_database' => 'movies_database'
);

// definition de la variable $currentPage utilisée dans la partie "header"
if (empty($currentPage)) {
	$currentPage = 'home';
}


// J'inclus composer, db.php & functions.php
require dirname(dirname(__FILE__)).'/vendor/autoload.php';
require dirname(__FILE__).'/functions.php';
