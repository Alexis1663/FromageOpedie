<?php

class AccueilControleur{
    
    private $user;
    private $vue;
    private $userG;

    public function __construct(){
        try{

            global $vue,$rep;

            if(isset ($_REQUEST['page'])){
                $page = $_REQUEST['page'];
              }
              else{
                $page = NULL;
              }

            switch($page){
                case NULL:
                    require($rep.$vue['accueil']);
                    break;

                case 'accueil':
                    require($rep.$vue['accueil']);
                    break;
                
                case 'carte':
                    require($rep.$vue['carte']);
                    break;
    
                case 'connexion':
                    require($rep.$vue['connexion']);
                    break;
    
                case 'inscription':
                    require($rep.$vue['inscription']);
                    break;
    
                case 'histoire':
                    require($rep.$vue['histoire']);
                    break;
    
                case 'detail':
                    require($rep.$vue['detail']);
                    break;
    
                case 'favoris':
                    require($rep.$vue['favoris']);
                    break;
    
                //Si la page n'est pas reconnue, alors c'est qu'elle n'existe pas
                default:
                    $dVueErreur[] = "Erreur 404 : Page non trouvée (Not Found) ";
                    require ($rep.$vue['erreur']);
                    break;
            }
        }catch(Exception $e){

        }
    }

}

?>