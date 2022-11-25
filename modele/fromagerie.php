<?php

require 'user.php';
require 'departement.php';
	
class Fromagerie{

	private string $nom;
	private string $ville;
	private User $user;
	private Departement $departement;
	private $fromagesVendus = array();

	public function __construct(string $nom, string $ville, User $user, Departement $departement, array $fromagesVendus){
		$this->nom=$nom;
		$this->ville=$ville;
		$this->user=$user;
		$this->departement=$departement;
		$this->fromagesVendus=$fromagesVendus;
	}

	public function __getNom():string{
		return $this->nom;
	}

	public function __getVille():string{
		return $this->ville;
	}

	public function __getUser():User{
		return $this->user;
	}

	public function __getDepartement():Departement{
		return $this->departement;
	}

	public function __getFromagesVendus():array{
		return $this->fromagesVendus;
	}
}

?>
