<?php

require_once('config/config.php');
require_once('modele/MdlVisitor.php');
require_once('modele/MdlUser.php');

class AccueilControleur
{
    public function __construct()
    {
        try {
            global $vue, $rep;

            if (isset($_REQUEST['param'])) {
                $param = $_REQUEST['param'];
            } else {
                $param = NULL;
            }

            if (isset($_REQUEST['depart'])) {
                $depart = $_REQUEST['depart'];
            } else {
                $depart = NULL;
            }

            if (isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            } else {
                $page = NULL;
            }
            switch ($page) {
                case NULL:
                    require($rep . $vue['accueil']);
                    break;
                case 'accueil':
                    require($rep . $vue['accueil']);
                    break;
                case 'fromage':
                    $this->fromage();
                    break;
                case 'carte':
                    $this->carte($depart);
                    break;
                case 'connexion':
                    $this->connexion($param);
                    break;
                case 'inscription':
                    $this->inscription();
                    break;
                case 'histoire':
                    require($rep . $vue['histoire']);
                    break;
                case 'detail':
                    $this->detail();
                    break;
                case "rechercher":
                    $this->rechercher();
                    break;
                case 'trie':
                    $this->trie($_REQUEST['trier']);
                    break;
                default:
                    $dVueErreur[] = "Erreur 404 : Page non trouvée (Not Found) ";
                    require($rep . $vue['erreur']);
                    break;
            }
        } catch (Exception $e) {
        }
    }

    public function trie(string $choixTrie)
    {
        $m = new MdlVisitor();
        $m->trie($choixTrie);
        $fromages = $m->trie($choixTrie);
        require($rep . $vue['fromage']);
    }

    public function carte($depart)
    {
        global $vue, $rep;
        $m = new MdlVisitor();
        if ($depart != null) {
            $image = $depart . ".png";
            $fromage = $m->findAllFromagesByDep($depart);
        }
        require($rep . $vue['carte']);
    }

    public function rechercher()
    {
        global $vue, $rep;
        $m = new MdlVisitor();
        if (isset($_REQUEST['formulaire_recherche'])) {
            $fromages = $m->rechercher($_REQUEST['recherche']);
            require($rep . $vue['fromage']);
        }
    }

    public function fromage()
    {
        global $vue, $rep;
        $m = new MdlVisitor();
        $fromages = $m->findAllFromages();
        require($rep . $vue['fromage']);
    }

    public function detail()
    {
        global $vue, $rep;
        $dVueErreur = array();
        $m = new MdlVisitor();
        if (isset($_REQUEST['form_detail'])) {
            $m->detail($_REQUEST['nomFromage'], $_REQUEST['departementFabrication'], $dVueErreur);
        }
    }

    public function connexion($param)
    {
        global $vue, $rep;
        $m = new MdlUser();
        $dVueErreur = array();
        if (isset($_REQUEST['formulaire_connexion'])) {
            $dVueErreur = $m->connexion($_REQUEST['mail'], $_REQUEST['mdp']);
            if (MdlUser::isConnecte() != null && $param == NULL) {
                header("Location: index.php");
            } else if (MdlUser::isConnecte() != null && $param == "favoris") {
                header("Location: index.php?page=favoris");
            } else if (MdlUser::isConnecte() != null && $param == "commentaire") {
                header("Location: index.php?page=fromage");
            } else if (MdlUser::isConnecte() != null && $param == "ajouterFavori") {
                header("Location: index.php?page=fromage");
            }
        }
        require($rep . $vue['connexion']);
    }

    public function inscription()
    {
        global $vue, $rep;
        $m = new MdlVisitor();
        $dVueErreur = array();
        if (isset($_REQUEST['formulaire_inscription'])) {
            $dVueErreur = $m->inscription($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['mail'], $_REQUEST['mail_confirm'], $_REQUEST['mdp'], $_REQUEST['mdp_confirm'], $_REQUEST['estFromager']);
        }
        require_once($rep . $vue['inscription']);
    }
}
