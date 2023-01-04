<?php

class visitorGateway
{

    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function findUserByEmail(string $email): array
    {
        $query = "SELECT nom FROM utilisateur WHERE email = :email;";
        $this->con->executeQuery($query, array(
            ':email' => array($email, PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }

    public function inscription(string $mail, string $nom, string $prenom, string $pass_hash, bool $estFromager)
    {
        $query = "INSERT INTO utilisateur(eMail,nom,prenom,motDePasse,estFromager) VALUES(:mail,:nom,:prenom,:pswd,:estFromager);";
        echo "toto6";
        $this->con->executeQuery($query, array(
            ':mail' => array($mail, PDO::PARAM_STR),
            ':nom' => array($nom, PDO::PARAM_STR),
            ':prenom' => array($prenom, PDO::PARAM_STR),
            ':pswd' => array($pass_hash, PDO::PARAM_STR),
            ':estFromager' => array($estFromager, PDO::PARAM_STR)
        ));
        echo "toto7";
    }
}
