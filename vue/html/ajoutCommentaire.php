<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COURNONTT</title>
    <link rel="stylesheet" href="vue/css/header_footer.css">
    <link rel="stylesheet" href="vue/css/ajoutCommentaire.css">
</head>

<body>

    <!-- Début de l'entête de page -->

    <header>

        <nav>

            <div class="titre">
                <a href="index.php?page=accueil">
                    <h1>FromageOpédie</h1>
                </a>
            </div>

            <div class="onglets">
                <a href="index.php?page=fromage">
                    <p>Fromages</p>
                </a>
                <a href="index.php?page=favoris">
                    <p>Favoris</p>
                </a>
                <a href="index.php?page=histoire">
                    <p>Histoire</p>
                </a>
                <a href="index.php?page=carte">
                    <p>Carte</p>
                </a>
            </div>

            <div class="log">
                <?php if (isset($_SESSION['login'])) { ?>
                    <a href="index.php?page=deconnexion">Deconnexion</a>
                <?php } else { ?>
                    <a href="index.php?page=connexion">Connexion</a>
                    <a href="index.php?page=inscription">Inscription</a>
                <?php } ?>
            </div>

        </nav>

    </header>

    <!-- Début du corp de code -->

    <section>
        <h1>Donnez votre avis !!!</h1>
        <form action="index.php?page=ajouterCommentaire" method="POST">
            <div class="container">

                <label for="titre">Titre du commentaire</label>
                <input name="titre" type="text">



                <label for="contenu">Contenu</label>
                <textarea name="contenu" type="text"></textarea>


                <?php
                foreach ($dVueErreur as $row) {
                    echo '<p style="color: red;">' . $row . '</p>';
                }
                ?>

                <input type="hidden" name="nomFromage" value="<?= $nomFromage ?>">
                <input type="hidden" name="departementFabrication" value="<?= $departFabric ?>">
                <input type="submit" name="formulaire_ajout_commentaire" value="Commenter">

            </div>
        </form>

    </section>

    <!-- Début du pied de page -->

    <footer>

        <div class="global_footer">

            <div class="foot1">
                <h3>Contact</h1>
                    <p>exemple@exemple.fr</p>
            </div>

            <div class="foot2">
                <h3>A propos</h1>
                    <p>Iut Clermont-Ferrand</p>
            </div>

        </div>

    </footer>

</body>

</html>