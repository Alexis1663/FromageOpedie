<?php

require_once 'controleur/visitorControleur';
require_once 'controleur/userControleur';
require_once 'controleur/adminControleur';
require_once 'controleur/';
require_once 'vue/';

class FrontControleur {

  private $ctrlVisitor;
  private $ctrlUser;
  private $ctrlAdmin

  public function __construct() {
    $this->ctrlVisitor = new VisitorControleur();
    $this->ctrlUser = new UserControleur();
    $this->ctrlAdmin = new AdminControleur();
  }

  // Traite une requête entrante
  public function frontRequest();

  /* Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/

}

?>
