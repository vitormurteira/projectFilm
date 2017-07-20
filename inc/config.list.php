<?php

// Tableau contenant des données sur la configuration
$config = array(
	'db_host' => 'wf3.progweb.fr',
	'db_user' => 'julienb',
	'db_password' => 'webforce3',
	'db_database' => 'julienb_sql0'
);

// J'inclus composer, db.php & functions.php
require dirname(dirname(__FILE__)).'/vendor/autoload.php';
require dirname(__FILE__).'/functions.php';
