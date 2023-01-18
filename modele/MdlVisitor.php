
<?php

require_once('modele/visitorGateway.php');
require_once('modele/fromageGateway.php');
require_once('modele/departementGateway.php');
require_once('modele/connection.php');
require_once('config/validation.php');

class MdlVisitor
{
    public function inscription(string $nom, string $prenom, string $mail, string $mail_confirm, string $mdp, string $mdp_confirm, string $estFromager): array
    {
        global $dns, $user, $password;
        $dVueErreur = array();
        $vistorG = new visitorGateway(new Connection($dns, $user, $password));


        $nom = Validation::nettoyer_string($_POST['nom']);
        $prenom = Validation::nettoyer_string($_POST['prenom']);
        $mail = Validation::nettoyer_string($_POST['mail']);
        $mail_confirm = Validation::nettoyer_string(($_POST['mail_confirm']));
        $mdp = Validation::nettoyer_string($_POST['mdp']);
        $mdp_confirm = Validation::nettoyer_string($_POST['mdp_confirm']);
        $estFromager = Validation::nettoyer_string($_POST['estFromager']);

        $dVueErreur = Validation::val_form_inscription($nom, $prenom, $mail, $mail_confirm, $mdp, $mdp_confirm, $estFromager);

        if (empty($dVueErreur)) {

            $verif_mail = $vistorG->findUserByEmail($mail);
            $verif_mail2 = count($verif_mail);
            if ($verif_mail2 == 0) {
                $pass_hash = password_hash($mdp, PASSWORD_DEFAULT);
                $vistorG->inscription($mail, $nom, $prenom, $pass_hash, $estFromager);
                $dVueErreur[] = "Votre inscription a bien été prise en compte !!!";
                return $dVueErreur;
            } else {
                $dVueErreur[] = "Adresse e-mail déjà utilisé !!!";
                return $dVueErreur;
            }
        } else {
            return $dVueErreur;
        }
    }

    public function detail(string $nomFromage, string $departementFabrication, array $dVueErreur)
    {
        global $dns, $user, $password, $vue, $rep;
        $dVueErreur = array();
        $aNote = false;
        $gw = new FromageGateway(new Connection($dns, $user, $password));
        $userG = new UserGateway(new Connection($dns, $user, $password));
        $queryDetail = $gw->findFromage($nomFromage, $departementFabrication);
        $listCommentaire = $gw->findAllCommentaire($nomFromage, $departementFabrication);
        if (isset($_SESSION['login'])) {
            if (count($userG->aNote($nomFromage, $departementFabrication)) > 0) {
                $aNote = true;
            } else if ($userG->aNote($nomFromage, $departementFabrication) == 0) {
                $dVueErreur = array();
            }
        }
        require($rep . $vue['detail']);
    }

    public function rechercher(string $nom)
    {
        global $dns, $user, $password;
        $gw = new FromageGateway(new Connection($dns, $user, $password));
        return $gw->findFromageByNom($nom);
    }

    // Affiche la liste de tous les fromages de la bdd
    public function findAllFromages()
    {
        global $dns, $user, $password;
        $gw = new FromageGateway(new Connection($dns, $user, $password));
        return $gw->findAllFromages();
    }

    public function findAllFromagesByDep(string $dep)
    {
        global $dns, $user, $password;
        $gw = new DepartementGateway(new Connection($dns, $user, $password));
        return $gw->findDep($dep);
    }

    public function trie(string $choixTrie)
    {
        global $dns, $user, $password;
        $gw = new FromageGateway(new Connection($dns, $user, $password));
        if ($choixTrie == "none" || $choixTrie == "A-Z") {
            return $gw->findAllFromages();
        } else if ($choixTrie == "Z-A") {
            return $gw->sortZA();
        } else if ($choixTrie == "depart") {
            return $gw->sortDep();
        } else if ($choixTrie == "lait") {
            return $gw->sortLait();
        } // else if ($choixTrie == "note"){

        // }
        return $gw->sortDep();
    }
}
?>