<?php

//require_once('controleur/accueilControleur.php');
//require_once('controleur/adminControleur.php');
//require_once('fromageControleur.php');
//require_once('controleur/userControleur.php');
//require_once('controleur/visitorControleur.php');
require_once('config/config.php');

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
      $listeActionsUser = array('Deconnecter','AjouterFavori','SupprimerFavori','AjouterNote','AjouterCommentaire'); 
      $ListeActionsVisitor = array ('Connexion','Inscription');

      //$this->ctrlFromage = new FromageControleur($dns, $user, $password);


      //Création d'un tableau d'erreur
      $dVueErreur=array();


      //On tente de récupèrer l'action dans la session
      
      try{

        $user = MdlUser::isConnecte();

      if(isset ($_REQUEST['action'])){
        $action = $_REQUEST['action'];
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
          new userControleur();
        }
      }
      //Sinon
      else{
        new visitorControleur();
      }
        
      //On récupère la page demandée
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }
        //Si aucune page n'est demandée de base, on utilise la page d'accueil
        else{
          $page='accueil';
        }

        //On affiche la page demandée en fonction de la valeur de la variable $page
        switch($page){

          case 'accueil':
            require ($rep.$vues['accueil']);
            break;
          
          case 'carte':
            require ($rep.$vues['carte']);
            break;

          case 'connexion':
            require ($rep.$vues['connexion']);
            break;

          case 'inscription':
            require ($rep.$vues['inscription']);
            break;

          case 'histoire':
            require ($rep.$vues['histoire']);
            break;

          case 'detail':
            require ($rep.$vues['detail']);
            break;

          case 'favoris':
            require ($rep.$vues['favoris']);
            break;

          //Si la page n'est pas reconnue, alors c'est qu'elle n'existe pas
          default:
            $dVueErreur[] = "Erreur 404 : Page non trouvée (Not Found) ";
            require ($rep.$vues['erreur']);
            break;
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
        if(){
            
        }
        else{
            $fromages = $this->ctrlFromage->findAllFromages();
        }
        require_once($vue['fromage']);
    }

    Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/
}
