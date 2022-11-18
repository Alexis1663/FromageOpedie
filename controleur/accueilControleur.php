<?php

require_once 'modele/fromageGateway.php';
require_once 'vue/accueil.php';

class AccueilControleur {

  private $fromageG;
  private $accueilG;

  public function __construct() {
    $this->fromageG = new FromageGateway();
    $this->accueilG = new accueilGateway();
  }

  // Affiche la liste de tous les fromages de la bdd
  public function accueil() {
    $lesFromages = $this->fromageG->findAll();
  }


  
  public function __sInscrire() {
    $this->accueilG->__sInscrire();
  }

  //si on clique sur le bouton se connecter, on appelle la fonction seConnecter et on affiche la page de connexion
  public function seConnecter() {
    $this->accueilG->__seConnecter();
  }


}

?>
