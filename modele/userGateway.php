<?php

class userGateway{
    
        private $con;
    
        public function __construct(Connection $con){
            $this->con=$con;
        }


        //Ajout d'un favori
        public function ajouterFavori($nomFromage){
            $query='INSERT INTO Favori (nomFromage, eMail) VALUES (:nomFromage, :eMail)';
            $this->con->executeQuery($query, array(':nomFromage' => array($nomFromage,PDO::PARAM_STR), ':eMail' => array($this->user->getEMail(),PDO::PARAM_STR)));
            $results=$this->con->getResults();
        }

        //Suppression d'un favori
        public function supprimerFavori($nomFromage){
            $query='DELETE FROM Favori WHERE nomFromage=:nomFromage AND eMail=:eMail';
            $this->con->executeQuery($query, array(':nomFromage' => array($nomFromage,PDO::PARAM_STR), ':eMail' => array($this->user->getEMail(),PDO::PARAM_STR)));
            $results=$this->con->getResults();
        }

        //Ajouter un avis pour le fromage qu'à choisit l'utilisateur
        public function ajouterAvis($nomFromage, $avis){
            $query='INSERT INTO Avis (nomFromage, eMail, avis) VALUES (:nomFromage, :eMail, :avis';
            $this->con->executeQuery($query, array(':nomFromage' => array($nomFromage,PDO::PARAM_STR), ':eMail' => array($this->user->getEMail(),PDO::PARAM_STR), ':avis' => array($avis,PDO::PARAM_STR)));
            $results=$this->con->getResults();
        }

        //Ajouter une note au fromage choisit par l'utilisateur
        public function ajouterNote($nomFromage, $note){
            $query='INSERT INTO Note (nomFromage, eMail, note) VALUES (:nomFromage, :eMail, :note';
            $this->con->executeQuery($query, array(':nomFromage' => array($nomFromage,PDO::PARAM_STR), ':eMail' => array($this->user->getEMail(),PDO::PARAM_STR), ':note' => array($note,PDO::PARAM_INT)));
            $results=$this->con->getResults();
        }   
}


?>
