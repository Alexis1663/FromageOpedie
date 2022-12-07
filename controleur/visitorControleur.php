<?php

class visitorControleur{

    public function __construct(){
        global $rep, $vues,$user, $password, $dns; // pour utiliser les variables globales : le répertoire, les vues, le login, le mot de passe et le dns
        session_start(); // démarrage ou reprise de la session
        $listeActionsUser = array('Deconnecter','AjouterFavori','SupprimerFavori','AjouterNote','AjouterCommentaire'); 
        $ListeActionsVisitor = array ('Connexion','Inscription');

    }
}

?>
