<?php

class MdlUser{

    public function connexion($login, $mdp){
        global $dns, $user, $password;
    
        $userG = new UserGateway(new Connection($dns, $user, $password));
        $login = Nettoyer::nettoyer_string($login);
        $mdp = Nettoyer::nettoyer_string($mdp);
    
        if(password_verify($mdp, $userG->getCredential($login))){
            $_SESSION['role']='user';
            $_SESSION['login']=$login;
            return new User($login, $mdp);
        }
        else NULL;
    
      }


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
