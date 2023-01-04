
<?php

//gen
$rep = __DIR__ . '/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$user = "root";
$password = "Root-linux63";
$dns = "mysql:host=localhost;dbname=fromageopedie";

//Vues

$vue['accueil'] = 'vue/html/accueil.php';
$vue['carte'] = 'vue/html/carte.php';
$vue['connexion'] = 'vue/html/connexion.php';
$vue['detail'] = 'vue/html/detail.php';
$vue['favoris'] = 'vue/html/favoris.php';
$vue['fromage'] = 'vue/html/fromage.php';
$vue['histoire'] = 'vue/html/histoire.php';
$vue['inscription'] = 'vue/html/inscription.php';
$vue['erreur'] = 'vue/html/erreur.php';
$vue['commenter'] = 'vue/html/ajoutCommentaire.php';
?>