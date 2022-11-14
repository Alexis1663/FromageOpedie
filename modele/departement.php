<?php

require 'fromagerie.php';

class Departement{

	private string $nom;
	private string $numero;
	private array $listeFromagerie;

	public function __construct(string $nom, string $numero, array $listeFromagerie){
		$this->nom=$nom;
		$this->numero=$numero;
		$this->listeFromagerie=$listeFromagerie;
	}

	public function __getNom():string{
		return $this->nom;
	}

	public function __getNumero():string{
		return $this->numero;
	}
	public function __getListeFromagerie():array{
		return $this->listeFromagerie;
	}
}

?>
