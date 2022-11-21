<?php

require_once 'controleur/userControleur';
require_once 'controleur/adminControleur';
require_once 'controleur/';
require_once 'vue/';

class FrontControleur {

  var $controleur;

  public function __construct() {
    session_start();
    Autoload::charger();
    
    //on récupère le role de l'utilisateur et on initie le bon controleur en conséquence
    $role = $_SESSION['role'];
    switch($role){
      case "Admin":
        $controleur= new AdminControleur();
        break;
      
      case "User":
        $controleur= new UserControleur();
        break;

      default:
        break;
      }

    //On récupère l'action dans la session
    $action = $_SESSION['action'];
    //On vérifie que l'action existe 
    if(isset($action)){
      //On vérifie que le controleur en question à le droit de faire l'action
      if(method_exists($controleur, $action)){
        //On appelle la méthode
        $controleur->$action();
      }else{
        //On affiche une erreur si le controleur n'a pas le droit de faire l'action
        $dVueEreur[] =	"Erreur 403 : Accès interdit (Forbidden) ";
	      require ($vues['erreur']); //là j'ai fait un peu comme dans l'exemple mais il faudra peut être changer
      }
    }else{
      //Si l'action n'existe pas, on affiche une erreur
      $dVueEreur[] =	"Erreur 404 : Page non trouvée (Not Found) ";
	    require ($rep.$vues['erreur']);
    }
  }
}
?>

