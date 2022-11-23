<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue\css\favoris.css">
    <link rel="stylesheet" href="vue\css\header_footer.css">
    <title>FromageOpédie</title>
    <script src="https://kit.fontawesome.com/bb5fdb8d36.js" crossorigin="anonymous"></script> <!-- Permet l'ajout de logo présent à partir de la base de donées de font awesome -->
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
                <a href="index.php?page=connexion">Connexion</a>
                <a href="index.php?page=inscription">Inscription</a>
            </div>

        </nav>

    </header>

    <!-- Début du corp de code -->

    <section>

        <div class="header_section">
            <h1>Vos fromages favoris</h1>
        </div>

        <div class="global_container">

            <div class="container_fromage">

                <div class="fromage">
                    <img src="../Img/st-nectaire.jpeg" alt="Image de st nectaire">
                    <h1>Le st nectaire</h1>
                    <form method=""><i class="fa-solid fa-star"></i></form>
                </div>

                <div class="fromage">
                    <img src="../Img/st-nectaire.jpeg" alt="Image de st nectaire">
                    <h1>Le st nectaire</h1>
                    <form method=""><i class="fa-solid fa-star"></i></form>
                </div>

                <div class="fromage">
                    <img src="../Img/st-nectaire.jpeg" alt="Image de st nectaire">
                    <h1>Le st nectaire</h1>
                    <form method=""><i class="fa-solid fa-star"></i></form>
                </div>
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