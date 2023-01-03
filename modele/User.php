<?php

class User
{

    private string $nom;
    private string $prenom;
    private string $mail;
    private string $motDePasse;
    private bool $estFromager;
    private array $favoris;


    public function __construct(string $nom, string $prenom, string $email, string $mdp, bool $estFromager)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $mdp;
        $this->estFromager = $estFromager;
    }

    public function __getMail(): string
    {
        return $this->mail;
    }

    public function __getMDP(): string
    {
        return $this->motDePasse;
    }

    public function __isFromager(): bool
    {
        return $this->estFromager;
    }

    public function __getAvis(): array
    {
        return $this->avisUtilisateur;
    }

    // public function __getFavoris(): array_map
    // {
    //     return $this->favoris;
    // }

    public function __setMail(string $mail)
    {
        $this->mail = $mail;
    }

    public function __setMDP(string $mdp)
    {
        $this->motDePasse = $mdp;
    }

    public function __addAvis(Fromage $fromage, string $avis)
    {
        $this->avisUtilisateur[$fromage] = $avis;
    }

    public function __addFavori(Fromage $fromage)
    {
        $this->favori[] = $fromage;
    }
}
