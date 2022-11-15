
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

$vues['erreur'] = 'vue/erreur.php';
$vues['vuephp1'] = 'vue/vuephp1.php';

?>