
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

//navigation

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    global $vue;

    switch ($page) {
        case "accueil":
            require($vue['accueil']);
            break;

        case "carte":
            require($vue['carte']);
            break;

        case "connexion":
            require($vue['connexion']);
            break;

        case "detail":
            require($vue['detail']);
            break;

        case "favoris":
            require($vue['favoris']);
            break;

        case "fromage":
            $cont->frontRequest();
            break;

        case "histoire":
            require($vue['histoire']);
            break;

        case "inscription":
            require($vue['inscription']);
            break;
    }
} else {
    require($vue['accueil']);
}

?> 
