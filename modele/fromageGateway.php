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
        $query = 'SELECT * FROM fromage WHERE nom = :nom AND departementFabrication = :depart';
        $this->con->executeQuery($query, array(
            ':nom' => array(utf8_decode($nomFromage), PDO::PARAM_STR),
            ':depart' => array(utf8_decode($departementFabrication), PDO::PARAM_STR)
        ));
        return $this->con->getResults()[0];
    }

    public function findAllFromages(): array
    {
        $query = "SELECT * FROM fromage ORDER BY nom ASC";
        $this->con->executeQuery($query);

        return $this->con->getResults();
    }

    public function findFromageFavoris()
    {
        $query = "SELECT * FROM favori WHERE pseudo = :login;";
        $this->con->executeQuery($query, array(
            ':login' => array($_SESSION['login'], PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }

    public function sortZA(): array
    {
        $query = "SELECT * FROM fromage ORDER BY nom DESC";
        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        return $results;
    }

    public function sortDep(): array
    {
        $query = "SELECT * FROM fromage ORDER BY departementFabrication ASC";
        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        return $results;
    }

    public function sortLait(): array
    {
        $query = "SELECT * FROM fromage ORDER BY lait ASC";
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
        $queryFindAll = "SELECT * FROM commenter WHERE nomFromage = :nom AND departementFabrication = :depart ORDER BY datePublication DESC";
        $this->con->executeQuery($queryFindAll, array(
            ':nom' => array($nomFromage, PDO::PARAM_STR),
            ':depart' => array($departementFabrication, PDO::PARAM_STR)
        ));
        $results = $this->con->getResults();
        return $results;
    }
}
