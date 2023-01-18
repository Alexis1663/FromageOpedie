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

        <div class="header_section">
            <h1>Vos fromages favoris</h1>
        </div>

        <div class="global_container">

            <?php if (empty($fromages)) { ?>
                <h3>Vous n'avez ajouté aucun fromage à vos favoris. Ajouter en depuis la page fromage pour les retrouver ici !!!</h3>
            <?php } else { ?>
                <div class="container_fromage">
                    <?php foreach ($fromages as $req) { ?>
                        <div class="fromage_container">
                            <form action="index.php?page=detail" method="POST" class="form_detail">
                                <button type="submit" class="button_detail" name="form_detail">
                                    <div class="fromage">
                                        <?php echo '<img src="vue/images/' . $req['image'] . '" alt="Image de ' . $req['image'] . '">' ?>
                                        <div class="nom_departement">
                                            <h1><?= utf8_encode($req['nom']) ?></h1>
                                            <h4><?= utf8_encode($req['departementFabrication']) ?></h4>
                                        </div>
                                        <h4>5/5</h4>
                                        <input type="hidden" name="nomFromage" value="<?= $req['nom'] ?>">
                                        <input type="hidden" name="departementFabrication" value="<?= $req['departementFabrication'] ?>">
                                    </div>
                                </button>
                            </form>
                            <form action="index.php?page=supprimerFavori" method="POST" class="form_favoris">
                                <input type="hidden" name="nomFromage" value="<?= utf8_encode($req['nom']) ?>">
                                <input type="hidden" name="departementFabrication" value="<?= utf8_encode($req['departementFabrication']) ?>">
                                <button type="submit" id="button_favoris"><img id="image_favoris" src="vue/Img/supprimer.png" alt=""></button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

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