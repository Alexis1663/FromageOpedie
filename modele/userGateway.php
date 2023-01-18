<?php

class UserGateway
{

    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }


    //Ajout d'un favori
    public function ajouterFavori(string $nomFromage, string $departFabric)
    {
        $query = 'INSERT INTO favori VALUES (:nomFromage, :depart, :pseudo)';
        $this->con->executeQuery($query, array(
            ':nomFromage' => array(utf8_decode($nomFromage), PDO::PARAM_STR),
            ':pseudo' => array($_SESSION['login'], PDO::PARAM_STR),
            ':depart' => array(utf8_decode($departFabric), PDO::PARAM_STR)
        ));
    }

    //Suppression d'un favori
    public function supprimerFavori(string $nomFromage, string $departFabric)
    {
        $query = "DELETE FROM favori WHERE nomFromage=:nomFromage AND departementFabrication = :depart AND pseudo = :login";
        $this->con->executeQuery($query, array(
            ':nomFromage' => array(utf8_decode($nomFromage), PDO::PARAM_STR),
            ':login' => array($_SESSION['login'], PDO::PARAM_STR),
            ':depart' => array(utf8_decode($departFabric), PDO::PARAM_STR)
        ));
    }

    //Ajouter un avis pour le fromage qu'à choisit l'utilisateur
    public function addCommentaire(string $date, string $titre, string $pseudo, string $contenu, string $nomFromage, string $departFabric)
    {
        $queryAdd = "INSERT INTO commenter VALUES (:nomFromage,:depart,:pseudo,:contenu,:titre,:date)";
        $this->con->executeQuery($queryAdd, array(
            ':nomFromage' => array($nomFromage, PDO::PARAM_STR),
            ':depart' => array($departFabric, PDO::PARAM_STR),
            ':pseudo' => array($pseudo, PDO::PARAM_STR),
            ':contenu' => array($contenu, PDO::PARAM_STR),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR)
        ));
    }

    //Ajouter une note au fromage choisit par l'utilisateur
    public function ajouterNote(string $nomFromage, string $departFabric, int $note)
    {
        $query = 'INSERT INTO noter VALUES (:nomFromage, :depart, :pseudo, :note)';
        $this->con->executeQuery($query, array(
            ':nomFromage' => array($nomFromage, PDO::PARAM_STR),
            ':pseudo' => array($_SESSION['login'], PDO::PARAM_STR),
            ':depart' => array($departFabric, PDO::PARAM_STR),
            ':note' => array($note, PDO::PARAM_STR)
        ));
    }

    public function aNote(string $nomFromage, string $departFabric)
    {
        $query = 'SELECT * FROM noter WHERE pseudo = :login AND nomFromage = :nom AND departementFabrication = :depart';
        $this->con->executeQuery($query, array(
            ':login' => array($_SESSION['login'], PDO::PARAM_STR),
            ':nom' => array($nomFromage, PDO::PARAM_STR),
            ':depart' => array($departFabric, PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }

    public function getCredential(string $email)
    {
        $queryCredentials = "SELECT motDePasse FROM utilisateur WHERE email=:email";
        if ($this->con->executeQuery($queryCredentials, array(":email" => array($email, PDO::PARAM_STR)))) {
            return $this->con->getResults();
        } else {
            throw new PDOException("ERR : GetCredential !");
        }
    }

    public function getInformationUser(string $email): array
    {
        $query = "SELECT nom,prenom FROM utilisateur WHERE eMail=:email;";
        if ($this->con->executeQuery($query, array(':email' => array($email, PDO::PARAM_STR)))) {
            return $this->con->getResults()[0];
        } else {
            throw new PDOException("ERR : GetInformationUser !");
        }
    }

    public function isFavoris(string $nomFromage, string $departFabric)
    {
        $query = "SELECT count(*) FROM favori WHERE nomFromage = :nomFromage AND departementFabrication = :depart AND pseudo = :login";
        $this->con->executeQuery($query, array(
            ':login' => array($_SESSION['login'], PDO::PARAM_STR),
            ':nomFromage' => array(utf8_decode($nomFromage), PDO::PARAM_STR),
            ':depart' => array(utf8_decode($departFabric), PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }
}
