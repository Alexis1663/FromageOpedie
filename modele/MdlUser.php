<?php

class MdlUser{

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isConnecte(){
         //teste	rôle	dans	la	session,	retourne	instance	d’objet	ou	booleen	
    if(isset($_SESSION['email'])	&&	isset	($_SESSION['motDePasse'])){
        $email=Nettoyer::nettoyer_string($_SESSION['email']);
        $motDePasse=Nettoyer::nettoyer_string($_SESSION['motDePasse']);
        return new User($email,$motDePasse);
    }
    else	return	null;
    }    
}

?>
