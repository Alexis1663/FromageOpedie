<?php

require_once('modele/fromageGateway.php');
require_once('modele/connection.php');

class FromageControleur
{

    private $fromageG;

    private $conn;

    public function __construct($dns, $user, $password)
    {
        $this->conn = new Connection($dns, $user, $password);
        $this->fromageG = new FromageGateway($this->conn);
    }

    // Affiche la liste de tous les fromages de la bdd
    public function findAllFromages()
    {
        $lesFromages = $this->fromageG->findAll();
    }

    // Trie les fromages par ordre alphabétique inverse
    public function sortZAFromages()
    {
        $lesFromages = $this->fromageG->sortZA();
    }

    // Trie les fromages par département dans l'ordre croissant
    public function sortDepFromages()
    {
        $lesFromages = $this->fromageG->sortDep();
    }

    // Trie les fromages par type de lait dans l'ordre croissant
    public function sortLaitFromages()
    {
        $lesFromages = $this->fromageG->sortLait();
    }
}
