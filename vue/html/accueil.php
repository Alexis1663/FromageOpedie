<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue\css\acceuil.css">
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

    <!-- Début du corp de code -->

    <section>

        <div class="container">

            <img src="vue/Img/Image_Accueil.jpg" alt="Image visant à faire comprendre instantanément le concept de FromageOpédie">

            <div class="texte">

                <h1>Votre palais,<br>Notre priorité</h1>
                <h3>Le fromage autrement par FromageOpédie</h3>

            </div>

        </div>

        <div class="container_explication">

            <div class="expl1">
                <h1>Qui sommes-nous ?</h1>
                <p>FromageOpédie est une équipe d'étudiants en deuxième année de BUT Informatique à l'IUT Clermont-Ferrand Auvergne. Mené par BESSON Jeremy, BRODA Lou, CARREAU Alexis et YOUSSE François, quatre amoureux du fromage, ce projet de plus de 120 heures fait partie intégrante de notre formation.</p>
            </div>

            <div class="expl2">
                <h1>Pourquoi nous rejoindre ?</h1>
                <p>FromageOpédie se veut être connue comme le site de référence autour du fromage. Ouvert à tout le monde qu'importe l'âge, l'origine ou la profession, il est également un outil de partage pour les utilisateurs. Mélange d'informations, conseils et avis, FromageOpédie est l'incoutournable du Fromage en France.</p>
            </div>

        </div>

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