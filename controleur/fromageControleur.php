<?php

require_once 'modele/fromageGateway.php';
require_once 'vue/fromage.php';

class FromageControleur {

  private $fromageG;

  public function __construct() {
    $this->fromageG = new FromageGateway();
  }

  // Affiche la liste de tous les fromages de la bdd
  public function findAllFromages() {
    $lesFromages = $this->fromageG->findAll();
  }

  // Trie les fromages par ordre alphabétique inverse
  public function sortZAFromages() {
    $lesFromages = $this->fromageG->sortZA();
  }

  // Trie les fromages par département dans l'ordre croissant
  public function sortDepFromages() {
    $lesFromages = $this->fromageG->sortDep();
  }

  // Trie les fromages par type de lait dans l'ordre croissant
  public function sortLaitFromages() {
    $lesFromages = $this->fromageG->sortLait();
  }

  // Trie les fromages par type de pâte dans l'ordre croissant
  public function sortPateFromages() {
    $lesFromages = $this->fromageG->sortPate();
  }

  // Affiche les détails d'un fromage
  public function findFromage(string $nom) {
    $leFromage = $this->fromageG->find($nom);
  }


}

?>
