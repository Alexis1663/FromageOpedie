<?php
	
class Departement{

	private string $nom;
	private string $numero;

	public function __construct(string $nom, string $numero){
		$this->nom=$nom;
		$this->numero=$numero;
	}

	public function __getNom():string{
		return $this->nom;
	}

	public function __getNumero():string{
		return $this->numero;
	}
}
