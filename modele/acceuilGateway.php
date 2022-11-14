<?php

class acceuilGateway{

    public function __construct(){}



    public function __sInscrire(){
        
        $host = 'ec2-34-246-86-78.eu-west-1.compute.amazonaws.com';
        $dbname = 'd6jd8juvb86a3p';
        $user = 'tncgniwrddfkvg';
        $password = '88d421f583b147bb6d8eaee9cd377b48a16d9c9481c094032c12aa17f968e19b';
        $bdd = "pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password";

        try {
            $conn = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        //Formulaire et traitement des infos






        //Vérification que l'email est pas déjà utilisée
        $query='SELECT * FROM Utilisateur WHERE eMail=:eMail';
        $conn->executeQuery($query, array(':eMail' => array($eMail,PDO::PARAM_STR)));
        $results=$con->getResults();
        
        //Si l'utilisateur est introuvable, est donc que c'est OK pour l'inscription
        if(empty($results)){
            echo "Votre inscription a bien été prise en compte !";
        }

        else{
            echo "Erreur, cette adresse mail est déjà utilsée sur un autre compte";
        }


    }


    public function __seConnecter(string $eMail, string $motDePasse){

        $host = 'ec2-34-246-86-78.eu-west-1.compute.amazonaws.com';
        $dbname = 'd6jd8juvb86a3p';
        $user = 'tncgniwrddfkvg';
        $password = '88d421f583b147bb6d8eaee9cd377b48a16d9c9481c094032c12aa17f968e19b';
        $bdd = "pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password";

        try {
            $conn = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $query='SELECT * FROM Utilisateur WHERE eMail=:eMail AND motDePasse=:motDePasse';
        $conn->executeQuery($query, array(':eMail' => array($eMail,PDO::PARAM_STR), 'name' => array($motDePasse, PDO::PARAM_STR)));
        $results=$con->getResults();
        
        //Si l'utilisateur est introuvable
        if(empty($results)){
            echo "Erreur, utilisateur introuvable <br> L'adresse email ou le mot de passe peut être erroné(e)";
        }

        //Si l'utilisateur a bien été trouvé
        else{
            $row=array($results);
            $user = new User($row['nom'],$row['prenom'],$row['eMail'],$row['motDePasse'],$row['estFromager']);
            
            //Ici a mon avis c'est pas complet il faudrait je pense indiquer qu'il faut ouvrir la "session" de l'utilisateur mais je sais pas trop comment il faut le faire
            require 'userControler.php';
        }
    }

}
?>