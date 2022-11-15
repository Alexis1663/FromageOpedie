<?php

include 'fromage.php';
include 'connection.php';

class FromageGateway
{

    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function findAll(): array
    {
        $queryfindall = "SELECT * FROM Fromage";
        $this->con->executeQuery($queryfindall);

        $results = $this->con->getResults();
        return $results;
    }

    public function find(string $nom)
    {
        $queryfind = "SELECT * FROM Fromage WHERE nom=:nom";
        $this->con->executeQuery($queryfind, array(':nom' => array($nom, PDO::PARAM_STR)));

        $results = $this->con->getResults();
        return $results;
    }

    public function sortZA(): array
    {
        $querysortza = "SELECT * FROM Fromage ORDER BY nom DESC";
        $this->con->executeQuery($querysortza);

        $results = $this->con->getResults();
        return $results;
    }

    public function sortDep(): array
    {
        $querysortdep = "SELECT * FROM Fromage ORDER BY departementFabrication ASC";
        $this->con->executeQuery($querysortdep);

        $results = $this->con->getResults();
        return $results;
    }

    public function sortLait(): array
    {
        $querysortlait = "SELECT * FROM Fromage ORDER BY lait ASC";
        $this->con->executeQuery($querysortlait);

        $results = $this->con->getResults();
        return $results;
    }

    //public function sortNote():array;

}
