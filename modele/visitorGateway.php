<?php

require 'connexion.php';

class visitorGateway{

    private $con;
    
    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function inscription(){

    }

    public function connexion(){

    }
}

?>