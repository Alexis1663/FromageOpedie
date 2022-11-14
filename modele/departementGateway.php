<?php

include 'departement.php';
include 'fromage.php';
include 'connection.php';

class DepartementGateway{

	private $con;

	public	function __construct(Connection	$con){	 
		$this->con=$con;
	}

	public function findDep(string $dep):array{
		$queryfinddep = "SELECT * FROM Fromage WHERE departementFabrication=:dep";
		$this->con->executeQuery($queryfinddep, array(':image'=>array($image,PDO:PARAM_STR), 'nom'=>array($nom,PDO:PARAM_STR), 'departementFabrication'=>array($departementFabrication,PDO:PARAM_STR) ));

		$results=$this->con->getResults();
		Foreach ($results as $row)
		$Tab_Fromages_FindDep[]=new Fromage($row['image'],$row['nom'],$row['departementFabrication']);
		Return $Tab_Fromages_FindDep;
	}

}

?>