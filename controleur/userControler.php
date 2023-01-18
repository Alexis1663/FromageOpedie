<?php

require_once('modele/MdlUser.php');

class UserControleur
{
    public function __construct()
    {
        try {
            global $vue, $rep;

            $dVueErreur = array();

            if (isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            } else {
                $page = NULL;
            }
            switch ($page) {
                case 'favoris':
                    $this->favoris();
                    break;
                case 'deconnexion':
                    $this->deconnexion();
                    break;
                case "ajouterFavori":
                    $this->ajouterFavori($_REQUEST['nomFromage'], $_REQUEST['departementFabrication']);
                    break;
                case "supprimerFavori":
                    $this->supprimerFavori($_REQUEST['nomFromage'], $_REQUEST['departementFabrication']);
                    break;
                case "ajouterNote":
                    $this->ajouterNote($_REQUEST['nomFromage'], $_REQUEST['departementFabrication'], $_REQUEST['note']);
                    break;
                case "commenter":
                    $this->AddCommentaireV1($_REQUEST['nomFromage'], $_REQUEST['departementFabrication'], $dVueErreur);
                    break;
                case "ajouterCommentaire":
                    $this->AddCommentaireV2();
                    break;
                default:
                    $dVueErreur[] = "Erreur 404 : Page non trouvée (Not Found) ";
                    require($rep . $vue['erreur']);
                    break;
            }
        } catch (Exception $e) {
        }
    }

    public function favoris()
    {
        global $vue, $rep;
        $m = new MdlUser();
        $fromages = $m->favoris($_SESSION['login']);
        require($rep . $vue['favoris']);
    }

    public function deconnexion()
    {
        $m = new MdlUser();
        $m->deconnexion();
        header("Location: index.php");
    }

    public function AddCommentaireV1(string $nomFromage, string $departFabric, array $dVueErreur)
    {
        global $vue, $rep;
        require($rep . $vue['commenter']);
    }

    public function AddCommentaireV2()
    {
        $m = new MdlUser();
        if (isset($_REQUEST['formulaire_ajout_commentaire'])) {
            $m->AddCommentaire();
        }
    }

    //Pour ajouter en favori le fromage sur lequel l'utilisateur a cliqué
    public function ajouterFavori(string $nomFromage, string $departFabric)
    {
        global $vue, $rep;
        $mU = new MdlUser();
        $mV = new MdlVisitor();
        $mU->ajouterFavori($nomFromage, $departFabric);
        $fromages = $mV->findAllFromages();
        require($rep . $vue['fromage']);
    }

    //Pour supprimer en favori le fromage sur lequel l'utilisateur a cliqué
    public function supprimerFavori(string $nomFromage, string $departFabric)
    {
        global $vue, $rep;
        $m = new MdlUser();
        $m->supprimerFavori($nomFromage, $departFabric);
        header("Location: index.php?page=favoris");
    }

    //ajouter une note au fromage choisit par l'utilisateur
    public function ajouterNote(string $nomFromage, string $departFabric, string $note)
    {
        global $vue, $rep;
        $dVueErreur = array();
        $m = new MdlUser();
        $mV = new MdlVisitor();
        if ($m->ajouterNote($nomFromage, $departFabric, $note) == false) {
            $dVueErreur[] = "Tu as deja voté pour ce fromages !!!";
            $mV->detail($_REQUEST['nomFromage'], $_REQUEST['departementFabrication'], $dVueErreur);
        }
    }
}
