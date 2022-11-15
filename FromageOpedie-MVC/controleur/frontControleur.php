<?php

require_once('controleur\fromageControleur.php');
require_once('config\config.php');


class FrontControleur
{

    private $ctrlVisitor;
    private $ctrlUser;
    private $ctrlAdmin;

    public function __construct()
    {
        global $user, $password, $dns;
        $this->ctrlFromage = new FromageControleur($user, $password, $dns);
    }

    // Traite une requête entrante
    public function frontRequest()
    {
    }

    /* Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/
}
