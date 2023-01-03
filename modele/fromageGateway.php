<?php

require_once('fromage.php');
require_once('connection.php');

class FromageGateway
{

    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function findFromage(string $nomFromage, string $departementFabrication)
    {
        $query = "SELECT * FROM fromage WHERE nom = :nom AND departementfabrication = :depart";
        $this->con->executeQuery($query, array(
            ':nom' => array($nomFromage, PDO::PARAM_STR),
            ':depart' => array($departementFabrication, PDO::PARAM_STR)
        ));
        return $this->con->getResults()[0];
    }

    public function findAllFromages(): array
    {
        $query = "SELECT * FROM Fromage";
        $this->con->executeQuery($query);

        return $this->con->getResults();
    }

    public function findFromageFavoris(string $pseudoUser)
    {
        $query = "SELECT * FROM favori WHERE pseudo = :login;";
        $this->con->executeQuery($query, array(
            ':login' => array($pseudoUser, PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }

    public function find(string $nom)
    {
        $query = "SELECT * FROM Fromage WHERE nom=:nom";
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR)));

        $results = $this->con->getResults();
        return $results;
    }

    public function sortZA(): array
    {
        $query = "SELECT * FROM Fromage ORDER BY nom DESC";
        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        return $results;
    }

    public function sortDep(): array
    {
        $query = "SELECT * FROM Fromage ORDER BY departementFabrication ASC";
        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        return $results;
    }

    public function sortLait(): array
    {
        $query = "SELECT * FROM Fromage ORDER BY lait ASC";
        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        return $results;
    }

    public function findFromageByNom(string $nom): array
    {
        $query = "SELECT * FROM fromage WHERE nom LIKE :nom";
        $this->con->executeQuery($query, array(
            ':nom' => array("%" . $nom . "%", PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }

    public function findAllCommentaire(string $nomFromage, string $departementFabrication): array
    {
        $queryFindAll = "SELECT * FROM Commenter WHERE nomFromage = :nom AND departementFabrication = :depart";
        $this->con->executeQuery($queryFindAll, array(
            ':nom' => array($nomFromage, PDO::PARAM_STR),
            ':depart' => array($departementFabrication, PDO::PARAM_STR)
        ));
        $results = $this->con->getResults();
        return $results;
    }
}
