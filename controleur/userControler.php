<?php

class userControleur{
    
    private $user;
    private $vue;
    private $userG;

    public function __construct(User $user){
        $this->user=$user;
       //$this->vue=new Vue(); Pas vraiment sur de cette ligne j'ai mi ça là en attendant de voir comment on fait pour les vues
        
        $host = 'ec2-34-246-86-78.eu-west-1.compute.amazonaws.com';
        $dbname = 'd6jd8juvb86a3p';
        $user = 'user'; //Il faudra ajouter l'utilisateur user dans la bdd, il peut juste ajouter des favoris et des commentaires
        $password = 'guest';
        $bdd = "pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password";
        $dsn="$bdd:host=$host;dbname=$dbname;user=$user;password=$password";
       
       
       $this->userG=new UserGateway(new Connection($dsn,$user,$password));
    }

    public function afficher(){
        $this->vue->afficher();
    }

    //Pour ajouter en favori le fromage sur lequel l'utilisateur a cliqué
    public function ajouterFavori($nomFromage){
        $this->userG->ajouterFavori($nomFromage);
    }

    //Pour supprimer en favori le fromage sur lequel l'utilisateur a cliqué
    public function supprimerFavori($nomFromage){
        $this->userG->supprimerFavori($nomFromage);
    }

    //Pour ajouter un avis sur le fromage sur lequel l'utilisateur se trouve
    public function ajouterAvis($nomFromage, $avis){
        $this->userG->ajouterAvis($nomFromage, $avis);
    }

    //ajouter une note au fromage choisit par l'utilisateur
    public function ajouterNote($nomFromage, $note){
        $this->userG->ajouterNote($nomFromage, $note);
    }
}


?>
