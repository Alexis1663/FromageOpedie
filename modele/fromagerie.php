<?php

require 'user.php';
require 'departement.php';
	
class Fromagerie{

	private string $nom;
	private string $adresse;
	private User $user;
	private Departement $departement;
	private $fromagesVendus = array(); 

	public function __construct(string $nom, string $departementFabrication, User $adresse, Departement $departement){
		$this->nom=$nom;
		$this->adresse=$adresse;
		$this->user=$user;
		$this->departement=$departement;
		//$this->fromagesVendus=new array(Fromage);
	}

	public function __getNom():string{
		return $this->nom;
	}

	public function __getAdresse():string{
		return $this->adresse;
	}

	public function __getUser():User{
		return $this->user;
	}

	public function __getDepartement():Departement{
		return $this->departement;
	}
}

?>