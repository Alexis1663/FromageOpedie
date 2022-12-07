<?php

require_once('config/config.php');

class FrontControleur
{
    private $ctrlAccueil;
    private $ctrlAdmin;
    private $ctrlFromage;
    private $ctrlUser;
    private $ctrlVisitor;

    public function __construct()
    {
        global $user, $password, $dns;
        $this->ctrlFromage = new FromageControleur($dns, $user, $password);
    }

    // Traite une requête entrante
    public function frontRequest()
    {
        global $vue;
        //Page fromage

        if (isset($_GET['trie'])) {
            $trie = $_GET['trie'];
            switch ($trie) {
                case "A-Z":
                    $fromages = $this->ctrlFromage->findAllFromages();
                    break;
                case  "Z-A":
                    $fromages = $this->ctrlFromage->sortZAFromages();
                    break;
                case "dep":
                    $fromages = $this->ctrlFromage->sortDepFromages();
                    break;
                case "lait":
                    $fromages = $this->ctrlFromage->sortLaitFromages();
                    break;
                    //case "note":
                    //  $fromages = $this->ctrlFromage->findAllFromages();
                    //break;
                case "none":
                    $fromages = $this->ctrlFromage->findAllFromages();
                    break;
            }
        } else {
            $fromages = $this->ctrlFromage->findAllFromages();
            echo "error!!!!";
        }
        require_once($vue['fromage']);
    }

    /* Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }*/
}
