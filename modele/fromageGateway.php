<?php

include 'fromage.php';
include 'connection.php';

class FromageGateway{

	private $con;

	public	function __construct(Connection	$con){	 
		$this->con=$con;
	}

	public function findAll():array{
		$queryfindall = "SELECT * FROM Fromage";
		$this->con->executeQuery($queryfindall, array(':image'=>array($image,PDO:PARAM_STR), 'nom'=>array($nom,PDO:PARAM_STR), 'departementFabrication'=>array($departementFabrication,PDO:PARAM_STR) ));

		$results=$this->con->getResults();
		Foreach ($results as $row)
		$Tab_Fromages_FindAll[]=new Fromage($row['image'],$row['nom'],$row['departementFabrication']);
		Return $Tab_Fromages_FindAll;
	}

	public function find(string $nom){
		$queryfind = "SELECT * FROM Fromage WHERE nom=:nom";
		$this->con->executeQuery($queryfind,  array(':image'=>array($image,PDO:PARAM_STR), 'nom'=>array($nom,PDO:PARAM_STR), 'departementFabrication'=>array($departementFabrication,PDO:PARAM_STR) ));

		$results=$this->con->getResults();
		Foreach ($results as $row)
		$Tab_Fromages_Find[]=new Fromage($row['image'],$row['nom'],$row['departementFabrication']);
		Return $Tab_Fromages_Find;
	}

	public function sortZA():array{
		$querysortza = "SELECT * FROM Fromage ORDER BY nom DESC";
		$this->con->executeQuery($querysortza, array(':image'=>array($image,PDO:PARAM_STR), 'nom'=>array($nom,PDO:PARAM_STR), 'departementFabrication'=>array($departementFabrication,PDO:PARAM_STR) ));

		$results=$this->con->getResults();
		Foreach ($results as $row)
		$Tab_Fromages_SortZA[]=new Fromage($row['image'],$row['nom'],$row['departementFabrication']);
		Return $Tab_Fromages_SortZA;
	}

	public function sortDep():array{
		$querysortdep = "SELECT * FROM Fromage ORDER BY departementFabrication ASC";
		$this->con->executeQuery($querysortdep, array(':image'=>array($image,PDO:PARAM_STR), 'nom'=>array($nom,PDO:PARAM_STR), 'departementFabrication'=>array($departementFabrication,PDO:PARAM_STR) ));

		$results=$this->con->getResults();
		Foreach ($results as $row)
		$Tab_Fromages_SortDep=new Fromage($row['image'],$row['nom'],$row['departementFabrication']);
		Return $Tab_Fromages_SortDep;
	}

	public function sortLait():array{
		$querysortlait = "SELECT * FROM Fromage ORDER BY lait ASC";
		$this->con->executeQuery($querysortlait, array(':image'=>array($image,PDO:PARAM_STR), 'nom'=>array($nom,PDO:PARAM_STR), 'departementFabrication'=>array($departementFabrication,PDO:PARAM_STR) ));

		$results=$this->con->getResults();
		Foreach ($results as $row)
		$Tab_Fromages_SortLait=new Fromage($row['image'],$row['nom'],$row['departementFabrication']);
		Return $Tab_Fromages_SortLait;
	}

	//public function sortNote():array;

}

?>
