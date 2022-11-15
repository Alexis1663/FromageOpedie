<?php

include 'departement.php';
include 'fromage.php';
include 'connection.php';

class DepartementGateway
{

    private $con;

    public    function __construct(Connection    $con)
    {
        $this->con = $con;
    }

    public function findDep(string $dep): array
    {
        $queryfinddep = "SELECT * FROM Fromage WHERE departementFabrication=:dep";
        $this->con->executeQuery($queryfinddep, array(':dep' => array($dep, PDO::PARAM_STR)));

        $results = $this->con->getResults();
        return $results;
    }
}
