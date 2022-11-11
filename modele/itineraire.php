<?php
	
class Fromage{

	private string $nom;
	private string $description;
	//private array $departements;
	//private array $fromageries;

	public function __construct(string $nom, string $description){
		$this->nom=$nom;
		$this->description=$description;
	}

	public function __getNom():string{
		return $this->nom;
	}

	public function __getDescription()):string{
		return $this->description;
	}
}

?>