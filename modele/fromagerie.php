<?php

require 'user.php';
require 'departement.php';
require 'fromage.php';
	
class Fromagerie{

	private string $nom;
	private string $adresse;
	private User $user;
	private Departement $departement;
	private int $position;
	private array $listeFromage; 

	public function __construct(string $nom, string $adresse, User $user, Departement $departement, int $position, array $listeFromage){
		$this->nom=$nom;
		$this->adresse=$adresse;
		$this->user=$user;
		$this->departement=$departement;
		$this->position=$position;
		$this->listeFromage=$listeFromage;
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

	public function __getPosition():int{
		return $this->position;
	}

	public function __getListeFromage():array{
		return $this->listeFromage;
	}
}

?>
