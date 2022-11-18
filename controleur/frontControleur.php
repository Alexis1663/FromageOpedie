<?php

//require_once('controleur/accueilControleur.php');
//require_once('controleur/adminControleur.php');
//require_once('fromageControleur.php');
//require_once('controleur/userControleur.php');
//require_once('controleur/visitorControleur.php');


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
  public function frontRequest(){
    $pageDemandee = $_GET['pageDemandee'];
    switch($pageDemandee){
      case "accueil.php":
        require("accueil.php");
        break;
      
      case "fromages.php":
        require("fromages.php");
        break;
 
      case "details.php":
        require("details.php");
        break;

      case "carte.php":
        require("carte.php");
        break;
      
      case "favoris.php":
        require("favoris.php");
        break;
      
      case "histoire.php":
        require("histoire.php");
        break;
      
      case "connexion.php":
        require("connexion.php");
        break;
      
      case "inscription.php":
        require("inscription.php");
        break;      

      default :
        require("accueil.php");
        break;
    }
  }

    /* Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/
}
