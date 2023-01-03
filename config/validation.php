
<?php
class Validation
{

    public static function nettoyer_string(string $str)
    {
        return filter_var($str, FILTER_SANITIZE_STRING);
    }

    public static function val_form_connexion(string &$login, string &$mot_de_passe)
    {
        $dVueErreur = array();
        if (!isset($login) || empty($login)) {
            $dVueErreur[] = "Votre nom d'utilisateur doit être renseigné";
            $login = "";
        }

        if ($login != filter_var($login, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $login = "";
        }

        if (!isset($mot_de_passe) || empty($mot_de_passe)) {
            $dVueErreur[] = "Votre mot de passe doit être renseigné";
            $mot_de_passe = "";
        }

        if ($mot_de_passe != filter_var($mot_de_passe, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $mot_de_passe = "";
        }
        return $dVueErreur;
    }

    public static function val_form_inscription(string $nom, string $prenom, string $mail, string $mail_confirm, string $mdp, string $mdp_confirm, string $estFromager)
    {
        $dVueErreur = array();
        if (!isset($nom) || empty($nom)) {
            $dVueErreur[] = "Votre nom doit être renseigné";
            $nom = "";
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $nom = "";
        }

        if (!isset($prenom) || empty($prenom)) {
            $dVueErreur[] = "Votre prenom doit être renseigné";
            $prenom = "";
        }

        if ($prenom != filter_var($prenom, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $prenom = "";
        }

        if (!isset($mail) || empty($mail)) {
            $dVueErreur[] = "Votre mail doit être renseigné";
            $mail = "";
        }

        if ($mail != filter_var($mail, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $mail = "";
        }

        if (!isset($mdp) || empty($mdp)) {
            $dVueErreur[] = "Votre mot de passe doit être renseigné";
            $mdp = "";
        }

        if ($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $mdp = "";
        }

        if (!isset($mdp_confirm) || empty($mdp_confirm)) {
            $dVueErreur[] = "Votre mot de passe de confirmation doit être renseigné";
            $mdp_confirm = "";
        }

        if ($mdp_confirm != filter_var($mdp_confirm, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $mdp_confirm = "";
        }

        if ($estFromager != 'TRUE' && $estFromager != 'FALSE') {
            $dVueErreur[] = "Vous devez spécifié si vous êtes fromager ou non";
            $estFromager = "";
        }

        if ($estFromager != filter_var($estFromager, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $estFromager = "";
        }

        if (!isset($mail_confirm) || empty($mail_confirm)) {
            $dVueErreur[] = "Votre mail de confirmation doit être renseigné";
            $mail_confirm = "";
        }

        if ($mail_confirm != filter_var($mail_confirm, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $mail_confirm = "";
        }

        if ($mail != $mail_confirm) {
            $dVueErreur[] = "E-mail non correspondant !!!";
            $mail = "";
            $mail_confirm = "";
        }

        if ($mdp != $mdp_confirm) {
            $dVueErreur[] = "Mot de passe non correspondant !!!";
            $mdp = "";
            $mdp_confirm = "";
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $dVueErreur[] = "Format d'adresse e-mail invalide !!!";
            $mail = "";
        }

        if (!filter_var($mail_confirm, FILTER_VALIDATE_EMAIL)) {
            $dVueErreur[] = "Format d'adresse e-mail de confirmation invalide !!!";
            $mail_confirm = "";
        }

        return $dVueErreur;
    }

    public static function val_form_ajout_commentaire(string &$titre, string &$contenu)
    {
        $dVueErreur = array();

        if (!isset($titre) || empty($titre)) {
            $dVueErreur[] = "Vous devez renseigné un titre au commentaire";
            $titre = "";
        }

        if ($titre != filter_var($titre, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $titre = "";
        }

        if (!isset($contenu) || empty($contenu)) {
            $dVueErreur[] = "Vous devez renseigné du contenu à votre commentaire";
            $contenu = "";
        }

        if ($contenu != filter_var($contenu, FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "tentative d'injection de code (attaque sécurité)";
            $contenu = "";
        }
        return $dVueErreur;
    }
}
?>