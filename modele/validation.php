<?php

class Validation{

    static function val_action($action) {
            
            if (!isset($action)) {
                throw new Exception('pas d\'action');
            }
        }
    

    static function val_form(string &$nom, string &$prenom, string &$eMail, string&$motDePasse, bool &$estFromager, array &$dVueEreur){
        if (!isset($nom)||$nom=="") {
            $dVueEreur[] =	"pas de nom";
            $nom="";
        }
    
        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $nom="";
    
        }
    
        if (!isset($prenom)||$prenom=="") {
            $dVueEreur[] =	"pas de prenom";
            $prenom="";
        }
    
        if ($prenom != filter_var($prenom, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $prenom="";
    
        }
    
        if (!isset($eMail)||$eMail=="") {
            $dVueEreur[] =	"pas d'email";
            $eMail="";
        }
    
        if ($eMail != filter_var($eMail, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $eMail="";
    
        }
    
        if (!isset($motDePasse)||$motDePasse=="") {
            $dVueEreur[] =	"pas de mot de passe";
            $motDePasse="";
        }
    
        if ($motDePasse != filter_var($motDePasse, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $motDePasse="";
    
        }
    
        if (!isset($estFromager)||$estFromager=="") {
            $dVueEreur[] =	"pas d'information sur le statut de fromager";
            $estFromager=false;
        }
    }
}
?>
