
<?php
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once(__DIR__ . '/config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__ . '/config/Autoload.php');

//chargement FrontControleur
require_once(__DIR__ . '/controleur/frontControleur.php');

$cont = new FrontControleur();

?> 
