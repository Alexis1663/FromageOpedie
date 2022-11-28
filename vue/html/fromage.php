<?php

/* Connexion */

$host = 'ec2-34-246-86-78.eu-west-1.compute.amazonaws.com';
$dbname = 'd6jd8juvb86a3p';
$user = 'tncgniwrddfkvg';
$password = '88d421f583b147bb6d8eaee9cd377b48a16d9c9481c094032c12aa17f968e19b';
$bdd = "pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
} catch (PDOException $e) {
    echo $e->getMessage();
}

/* Initialisation des varibales pour l'ensemble du code PHP */

include_once('controleur/frontControleur.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue\css\fromage.css">
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
            <h1>Ici vous retrouverez plus de 300 fromages français</h1>
        </div>


        <div class="affinage">

            <div class="recherche">
                <input type="text" placeholder="Rechercher...">
                <button>OK</button>
            </div>

            <form action="index.php?page=fromage">
                <select name="trier" id="trier_select">
                    <option value="" selected>Trier</option>
                    <option value="A-Z">Ordre alphabétique A-Z</option>
                    <option value="Z-A">Ordre alphabétique Z-A</option>
                    <option value="dep">Département</option>
                    <option value="lait">Lait</option>
                    <option value="note">Note</option>
                </select>
            </form>

        </div>

        <div class="global_container">

            <div class="container_fromage">
                <?php foreach ($fromages as $req) { ?>

                    <form action="index.php?page=detail" method="POST" class="form">
                        <button type="submit" class="button_detail" name="form_detail">
                            <div class="fromage">
                                <?php echo '<img src="../images/' . $req['image'] . '" alt="Image de ' . $req['image'] . '">' ?>
                                <div class="nom_departement">
                                    <h1><?= $req['nom'] ?></h1>
                                    <h4><?= $req['departementfabrication'] ?></h4>
                                </div>
                                <i class="fa-regular fa-star"></i>
                                <input type="hidden" name="nomFromage" value="<?= $req['nom'] ?>">
                                <input type="hidden" name="departementFabrication" value="<?= $req['departementfabrication'] ?>">
                            </div>
                        </button>
                    </form>

                <?php } ?>
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