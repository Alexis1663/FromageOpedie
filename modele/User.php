<?php

class User
{

    private string $nom;
    private string $prenom;
    private string $mail;
    private string $motDePasse;
    private bool $estFromager;


    public function __construct(string $nom, string $prenom, string $email, string $mdp, bool $estFromager)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $email;
        $this->motDePasse = $mdp;
        $this->estFromager = $estFromager;
    }

    public function __getNom(): string
    {
        return $this->nom;
    }

    public function __getPrenom(): string
    {
        return $this->prenom;
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

    public function __setMail(string $mail)
    {
        $this->mail = $mail;
    }

    public function __setMDP(string $mdp)
    {
        $this->motDePasse = $mdp;
    }
}
