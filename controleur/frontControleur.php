<?php

require_once('config/config.php');
require_once('modele/MdlUser.php');
require_once('controleur/accueilControleur.php');

class FrontControleur
{
    /*private $ctrlAccueil;
    private $ctrlAdmin;
    private $ctrlFromage;
    private $ctrlUser;
    private $ctrlVisitor;*/

    public function __construct()
    {
      global $rep, $vues,$user, $password, $dns; // pour utiliser les variables globales : le répertoire, les vues, le login, le mot de passe et le dns
      session_start(); // démarrage ou reprise de la session
      $listeActionsUser = array('Inscription','Connexion','Deconnecter','AjouterFavori','SupprimerFavori','AjouterNote','AjouterCommentaire'); 

      //$this->ctrlFromage = new FromageControleur($dns, $user, $password);


      //Création d'un tableau d'erreur
      $dVueErreur=array();


      //On tente de récupèrer l'action dans la session
      
      try{

        $user = MdlUser::isConnecte();

      if(isset ($_REQUEST['page'])){
        $action = $_REQUEST['page'];
      }
      else{
        $action = NULL;
      }

        //On vérifie que l'action soit une action pour un utilisateur connecté
        if(in_array($action, $listeActionsUser)){
          //Si oui, mais que l'utilisateur n'est pas connecté
          if($user == NULL){
            require($rep.$vues['connexion']);
          }
        //Sinon
        else{
          new UserControleur();
        }
      }
      //Sinon
      else{
        new AccueilControleur();
      }
        
      //Si une erreur est survenue
      }catch(Exception $e){
        $dVueErreur[] = "Erreur Inconnue";
        require ($rep.$vues['erreur']);
      }

    }


    // Traite une requête entrante
    /*public function frontRequest()
    {
        global $vue;
        //Page fromage

        if (isset($_GET['trie'])) {
            $trie = $_GET['trie'];
            switch ($trie) {
                case "A-Z":
                    $fromages = $this->ctrlFromage->findAllFromages();
                    break;
                case  "Z-A":
                    $fromages = $this->ctrlFromage->sortZAFromages();
                    break;
                case "dep":
                    $fromages = $this->ctrlFromage->sortDepFromages();
                    break;
                case "lait":
                    $fromages = $this->ctrlFromage->sortLaitFromages();
                    break;
                    //case "note":
                    //  $fromages = $this->ctrlFromage->findAllFromages();
                    //break;
                case "none":
                    $fromages = $this->ctrlFromage->findAllFromages();
                    break;
            }
        } else {
            $fromages = $this->ctrlFromage->findAllFromages();
            echo "error!!!!";
        }
        require_once($vue['fromage']);
    }

    Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/
}
