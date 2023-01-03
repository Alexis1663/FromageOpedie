<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue\css\connexion.css">
    <link rel="stylesheet" href="vue\css\header_footer.css">
    <title>FromageOpédie</title>
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

    </header>

    <!-- Début du corp de code -->

    <section>

        <div class="header_section">
            <h1>Se connecter</h1>
        </div>

        <form method="POST" action="">
            <div class="container">

                <div class="element">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" placeholder="exemple@exemple.XX">
                </div>

                <div class="element">
                    <label for="mdp">Mot de passe</label>
                    <input name="mdp" type="password">
                </div>

                <?php
                foreach ($dVueErreur as $row) {
                    echo '<p style="color: red;">' . $row . '</p>';
                }
                ?>

                <input type="submit" value="Se connecter" name="formulaire_connexion">

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