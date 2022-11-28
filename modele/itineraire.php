<?php
	
class Itineraire{

	private string $nom;
	private array $fromageries;

	public function __construct(string $nom, array $fromageries){
		$this->nom=$nom;
		$this->fromageries=$fromageries;
	}

	public function __getNom():string{
		return $this->nom;
	}
	
	public function __getFromageries():array{
        	return $this->fromageries;
    }

	public function ajouterFromagerie($fromagerie){
		$this->fromageries[]=$fromagerie;
	}

}
