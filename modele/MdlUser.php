<?php

require_once('modele/userGateway.php');
require_once('modele/connection.php');
require_once('config/validation.php');
require_once('modele/User.php');

class MdlUser
{

    public function connexion($login, $mdp)
    {
        global $dns, $user, $password;
        $dVueErreur = array();
        $userG = new UserGateway(new Connection($dns, $user, $password));
        $login = Validation::nettoyer_string($login);
        $mdp = Validation::nettoyer_string($mdp);
        $dVueErreur = Validation::val_form_connexion($login, $mdp);
        if (empty($dVueErreur)) {
            if ($userG->getCredential($login) != null) {
                if (password_verify($mdp, $userG->getCredential($login)[0]['motDePasse'])) {
                    $_SESSION['role'] = "admin";
                    $_SESSION['login'] = $login;
                    $info = $userG->getInformationUser($login);
                    new User($info['nom'], $info['prenom'], $login, $mdp, TRUE);
                } else {
                    $dVueErreur[] = "Mot de passe incorrect";
                    return $dVueErreur;
                }
            } else {
                $dVueErreur[] = "Login ou mot de passe incorrect";
                return $dVueErreur;
            }
        } else {
            return $dVueErreur;
        }
    }


    public function deconnexion()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function isConnecte()
    {
        global $dns, $user, $password;

        $userG = new UserGateway(new Connection($dns, $user, $password));
        //teste	rôle	dans	la	session,	retourne	instance	d’objet	ou	booleen	
        if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
            $email = Validation::nettoyer_string($_SESSION['login']);
            $motDePasse = Validation::nettoyer_string($_SESSION['role']);
            $info = $userG->getInformationUser($email);
            return new User($info['nom'], $info['prenom'], $email, $motDePasse, TRUE);
        } else {
            return null;
        }
    }

    public function AddCommentaire()
    {
        global $dns, $user, $password, $vue, $rep;;
        $dVueErreur = array();
        $articleG = new FromageGateway(new Connection($dns, $user, $password));
        $userG = new UserGateway(new Connection($dns, $user, $password));

        $titre = Validation::nettoyer_string($_REQUEST['titre']);
        $contenu = Validation::nettoyer_string($_REQUEST['contenu']);
        $nomFromage = Validation::nettoyer_string($_REQUEST['nomFromage']);
        $departFabric = Validation::nettoyer_string($_REQUEST['departementFabrication']);

        $dVueErreur = Validation::val_form_ajout_commentaire($titre, $contenu);
        if (empty($dVueErreur)) {
            $userG->addCommentaire(date('Y-m-d h:i:s'), $titre, $_SESSION['login'], $contenu, $nomFromage, $departFabric);
            header("Location: index.php?page=fromage");
        } else {
            require($rep . $vue['commenter']);
        }
    }

    public function isFavoris(string $nomFromage, string $departFabric): bool
    {
        global $dns, $user, $password;
        $userG = new UserGateway(new Connection($dns, $user, $password));
        if ($userG->isFavoris($nomFromage, $departFabric)[0][0] == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function ajouterFavori(string $nomFromage, string $departFabric)
    {
        global $dns, $user, $password;
        $userG = new UserGateway(new Connection($dns, $user, $password));
        if ($this->isFavoris($nomFromage, $departFabric) == false) {
            $userG->ajouterFavori($nomFromage, $departFabric);
        } else {
            $this->supprimerFavori($nomFromage, $departFabric);
        }
    }

    public function supprimerFavori(string $nomFromage, string $departFabric)
    {
        global $dns, $user, $password;
        $userG = new UserGateway(new Connection($dns, $user, $password));
        $userG->supprimerFavori($nomFromage, $departFabric);
    }

    public function favoris()
    {
        global $dns, $user, $password;
        $gw = new FromageGateway(new Connection($dns, $user, $password));
        $resultTmp = $gw->findFromageFavoris();
        if (count($resultTmp) != 0) {
            foreach ($resultTmp as $row) {
                $fromages[] = $gw->findFromage(utf8_encode($row['nomFromage']), utf8_encode($row['departementFabrication']));
            }
            return $fromages;
        } else {
            return $fromages = array();
        }
    }

    public function ajouterNote(string $nomFromage, string $departFabric, int $note)
    {
        global $dns, $user, $password;
        $userG = new UserGateway(new Connection($dns, $user, $password));
        if (count($userG->aNote($nomFromage, $departFabric)) == 0) {
            $userG->ajouterNote($nomFromage, $departFabric, $note);
        } else {
            return false;
        }
    }

    public function aNote(string $nomFromage, string $departFabric)
    {
        global $dns, $user, $password;
        $userG = new UserGateway(new Connection($dns, $user, $password));
        if ($userG->aNote($nomFromage, $departFabric) == 0) {
            return false;
        } else {
            return true;
        }
    }
}
