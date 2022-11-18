<?php

class acceuilGateway{

    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function __sInscrire(){
        //Ici je fais avec $_POST mais je suis pas sur que ça soit la meilleure solution pour récupérer les données du formulaire

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $motDePasse = $_POST['password'];
        $estFromager = $_POST['estFromager'];
        
        $dVueErreur = array();

        //On vérifie que les champs ne sont pas vides
        Validation::val_form($nom, $prenom, $email, $password, $estFromager, $dVueErreur);

        //Si des erreurs sont détectées, on les affiche
        if(isset($dVueErreur)) {
            foreach ($dVueErreur as $value){
                echo $value;
            }
        }

        //S'il n'y a pas eu d'erreurs, on vérifie que l'adresse email n'est pas déjà utilisée
        else
        {
        $query='SELECT * FROM Utilisateur WHERE eMail=:eMail';
        $this->con->executeQuery($query, array(':eMail' => array($email,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        
        //Si l'utilisateur est introuvable (que le résultat de la recherche est vide), on peut l'inscrire, donc l'ajouter à la base de données
        if(empty($results)){
            $query='INSERT INTO Utilisateur (nom, prenom, eMail, motDePasse, estFromager) VALUES (:nom, :prenom, :eMail, :mdp, :fromager)';
            
            //Lors de l'inscription, pas besoin d'ajouter les avis et les favoris car ils sont vides par défaut, l'utilisateur n'ayant pas encore pu ajouter de favoris ou de commentaires
            $this->con->executeQuery($query, array(':nom' => array($nom,PDO::PARAM_STR), ':prenom' => array($prenom,PDO::PARAM_STR), ':eMail' => array($email,PDO::PARAM_STR), ':mdp' => array($motDePasse,PDO::PARAM_STR), ':fromager' => array($estFromager,PDO::PARAM_STR)));
            $results=$this->con->getResults();

            //Si l'insertion a bien été effectuée (si le résultat est vide, en théorie ça devrait être bon)
            if(!empty($results)){
                echo "Votre inscription a bien été prise en compte !";
            }
            else{
                echo "Une erreur est survenue lors de l'inscription, veuillez réessayer.";
            }
        }

        //Si l'adresse mail éait déjà utilisée pour un autre compte (Si elle a été trouvée dans la base de données, on considère que c'est le cas)
            else{
                echo "Erreur, cette adresse mail est déjà utilsée sur un autre compte";
            }
        }
    }


    public function __seconecter(string $eMail, string $motDePasse){
        $query='SELECT * FROM Utilisateur WHERE eMail=:eMail AND motDePasse=:motDePasse';
        $this->con->executeQuery($query, array(':eMail' => array($eMail,PDO::PARAM_STR), 'name' => array($motDePasse, PDO::PARAM_STR)));
        $resultatconexion=$this->con->getResults();
        
        //Si l'utilisateur est introuvable
        if(empty($results)){
            echo "Erreur, utilisateur introuvable <br> L'adresse email ou le mot de passe peut être erroné(e)";
        }

        //Si l'utilisateur a bien été trouvé
        else{
            $donnees=array($resultatconexion['nom'], $resultatconexion['prenom'], $resultatconexion['eMail'], $resultatconexion['motDePasse'], $resultatconexion['estFromager']);
            
            //On récupère la liste d'avis de l'utilisateur
            $query='SELECT * FROM Avis WHERE eMail=:eMail';
            $this->con->executeQuery($query, array(':eMail' => array($eMail,PDO::PARAM_STR)));
            $resultatAvis=$this->con->getResults();
            $AvisUtilisateur=array($resultatAvis);
            
            //Pareil avec les favoris
            $query='SELECT * FROM Favoris WHERE eMail=:eMail';
            $this->con->executeQuery($query, array(':eMail' => array($eMail,PDO::PARAM_STR)));
            $resultatFavoris=$this->con->getResults();
            $FavorisUtilisateur=array($resultatFavoris);


            $utilisateur = new User($donnees['nom'],$donnees['prenom'],$donnees['eMail'],$donnees['motDePasse'],$donnees['estFromager'], $AvisUtilisateur, $FavorisUtilisateur);
            
            //conecter l'utilisateur et afficher le controleur userControleur
            $userControleur = new userControleur($utilisateur);
            $userControleur->afficher();
        }
    }

}
?>
