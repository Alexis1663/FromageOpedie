
<?php
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once 'config/config.php';

//chargement autoloader pour autochargement des classes
require_once 'config/Autoload.php';
Autoload::charger();

//chargement FrontControleur
require_once 'controleur/frontControleur.php';

$cont = new FrontControleur();


?> 
