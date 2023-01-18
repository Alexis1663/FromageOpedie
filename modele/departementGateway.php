<?php

class DepartementGateway
{

    private $con;

    public    function __construct(Connection    $con)
    {
        $this->con = $con;
    }

    public function findDep(string $dep): array
    {
        $query = "SELECT * FROM fromage WHERE upper(departementFabrication) = :dep";
        $this->con->executeQuery($query, array(
            ':dep' => array(strtoupper($dep), PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }
}
