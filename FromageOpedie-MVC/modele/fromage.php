<?php
	
require 'departement.php';

class Fromage{

	private string $nom;
	private Departement $departementFabrication;
	private string $urlWikipedia;
	private string $lait;
	private string $image;
	private string $typePate;
	private string $vinAssocie;
	//private array $moyenne;

	public function __construct(string $nom, Departement $departementFabrication, string $urlWikipedia, string $lait, string $image, string $typePate, string $vinAssocie){
		$this->nom=$nom;
		$this->departementFabrication=$departementFabrication;
		$this->urlWikipedia=$urlWikipedia;
		$this->lait=$lait;
		$this->image=$image;
		$this->typePate=$typePate;
		$this->vinAssocie=$vinAssocie;
	}

	public function __getNom():string{
		return $this->nom;
	}

	public function __getDepartementFabrication():Departement{
		return $this->departementFabrication;
	}

	public function __getUrlWikipedia():string{
		return $this->urlWikipedia;
	}

	public function __getLait():string{
		return $this->lait;
	}

	public function __getImage():string{
		return $this->image;
	}

	public function __getTypePate():string{
		return $this->typePate;
	}

	public function __getVinAssocie():string{
		return $this->vinAssocie;
	}
}
