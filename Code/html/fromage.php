<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fromage.css">
    <link rel="stylesheet" href="../css/header_footer.css"> <!-- Rappel de la feuille de style pour la nav et le footer pour éviter la duplication de code -->
    <title>FromageOpédie</title>
    <script src="https://kit.fontawesome.com/bb5fdb8d36.js" crossorigin="anonymous"></script> <!-- Permet l'ajout de logo présent à partir de la base de donées de font awesome -->
</head>

<body>

    <!-- Début de l'entête de page -->

    <header>

        <nav>

            <div class="titre">
                <a href="accueil.html">
                    <h1>FromageOpédie</h1>
                </a>
            </div>

            <div class="onglets">
                <a href="fromage.php">
                    <p>Fromages</p>
                </a>
                <a href="favoris.php">
                    <p>Favoris</p>
                </a>
                <a href="histoire.html">
                    <p>Histoire</p>
                </a>
                <a href="carte.php">
                    <p>Carte</p>
                </a>
            </div>

            <div class="log">
                <a href="connexion.php">Connexion</a>
                <a href="inscription.php">Inscription</a>
            </div>

        </nav>

    </header>

    <!-- Début du corp de code -->

    <section>

        <div class="header_section">
            <h1>Ici vous retrouverez plus de 300 fromages français</h1>
        </div>


        <div class="affinage">

            <div class="recherche">
                <input type="text" placeholder="Rechercher...">
                <button>OK</button>
            </div>

            <select name="trier" id="trier_select">
                <option value="" selected>Trier</option>
                <option value="">Ordre alphabétique A-Z</option>
                <option value="">Ordre alphabétique Z-A</option>
                <option value="">Département</option>
                <option value="">Lait</option>
                <option value="">Note</option>
            </select>
        </div>

        <div class="global_container">

            <div class="container_fromage">

                <div class="fromage">
                    <img src="../Img/st-nectaire.jpeg" alt="Image de st nectaire">
                    <h1>Le st nectaire</h1>
                    <form method=""><i class="fa-regular fa-star"></i></form>
                </div>

                <div class="fromage">
                    <img src="../Img/st-nectaire.jpeg" alt="Image de st nectaire">
                    <h1>Le st nectaire</h1>
                    <form method=""><i class="fa-regular fa-star"></i></form>
                </div>

                <div class="fromage">
                    <img src="../Img/st-nectaire.jpeg" alt="Image de st nectaire">
                    <h1>Le st nectaire</h1>
                    <form method=""><i class="fa-regular fa-star"></i></form>
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