<?php

class itineraireGateway
{
    private $con;
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function getItineraireByNom($nom)
    {
        //vérification dans la base de données
        $query = 'SELECT * FROM itineraire WHERE nom=:nom';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        return $results;
    }

    public function addItineraire($nom, $fromageries)
    {
        //vérification dans la base de données
        $query = 'INSERT INTO itineraire (nom, fromageries) VALUES (:nom, :fromageries)';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR), ':fromageries' => array($fromageries, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        return $results;
    }

    public function deleteItineraire($nom)
    {
        //vérification dans la base de données
        $query = 'DELETE FROM itineraire WHERE nom=:nom';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        return $results;
    }
}
