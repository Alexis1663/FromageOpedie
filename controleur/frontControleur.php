<?php

//require_once('controleur/accueilControleur.php');
//require_once('controleur/adminControleur.php');
include('controleur/fromageControleur.php');
//require_once('controleur/userControleur.php');
//require_once('controleur/visitorControleur.php');

require_once('config\config.php');


class FrontControleur
{
    private $ctrlAccueil;
    private $ctrlAdmin;
    private $ctrlFromage;
    private $ctrlUser;
    private $ctrlVisitor;

    public function __construct()
    {
        global $user, $password, $dns;
        $this->ctrlFromage = new FromageControleur($dns, $user, $password);
    }

    // Traite une requête entrante
    public function frontRequest()
    {
        global $vue;
        require($vue['accueil']);
    }

    /* Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/
}
