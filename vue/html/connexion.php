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

$mail = "";
$mdp = "";

?>

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
                <a href="index.php?page=connexion">Connexion</a>
                <a href="index.php?page=inscription">Inscription</a>
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

                <input type="submit" value="Se connecter" name="formulaire_connexion">

                <?php

                if (isset($_POST['formulaire_connexion'])) {
                    if (isset($mail, $mdp)) {
                        $mail = htmlspecialchars($_POST['mail']);
                        $mdp = $_POST['mdp'];
                        if (!empty($mail) || !empty($mdp)) {
                            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                $requConnexionVerif = $conn->prepare('SELECT email,motdepasse FROM utilisateur WHERE email = :mail');
                                $requConnexionVerif->bindValue(':mail', $mail);
                                $requConnexionVerif->execute();
                                $return = $requConnexionVerif->fetch(PDO::FETCH_ASSOC);

                                if ($return) {
                                    $mdpHash = $return['motdepasse'];
                                    if (password_verify($mdp, $mdpHash)) {
                                        echo "Connexion réussi !!!";
                                    } else {
                                        echo "Adresse mail ou mot de passe incorrect !!!";
                                    }
                                } else {
                                    echo "Adresse mail ou mot de passe incorrect !!!";
                                }
                            } else {
                                echo "Adresse mail invalide !!!";
                            }
                        } else {
                            echo "Veuillez remplir tous les champs !!!";
                        }
                    }
                }


                ?>

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