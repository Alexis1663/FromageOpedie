
<?php

//gen
$rep = __DIR__ . '/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$host = 'ec2-34-246-86-78.eu-west-1.compute.amazonaws.com';
$dbname = 'd6jd8juvb86a3p';
$user = "tncgniwrddfkvg";
$password = "88d421f583b147bb6d8eaee9cd377b48a16d9c9481c094032c12aa17f968e19b";
$dns = "pgsql:host=$host;dbname=$dbname;";

//Vues

$vue['accueil'] = 'vue/html/accueil.php';
$vue['carte'] = 'vue\html\carte.php';
$vue['connexion'] = 'vue\html\connexion.php';
$vue['detail'] = 'vue\html\detail.php';
$vue['favoris'] = 'vue\html\favoris.php';
$vue['fromage'] = 'vue\html\fromage.php';
$vue['histoire'] = 'vue\html\histoire.php';
$vue['inscription'] = 'vue\html\inscription.php';

?>