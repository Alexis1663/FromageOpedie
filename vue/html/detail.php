<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue\css\detail.css">
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

        <div class="entete">

            <div class="image">
                <img src="vue/images/<?= utf8_encode($queryDetail['image']) ?>" alt="Image de <?= utf8_encode($queryDetail['image']) ?>">
            </div>

            <div class="titre">
                <h1><?= utf8_encode($queryDetail['nom']) ?></h1>
            </div>

            <div class="moyenne">
                <h2>5/5</h2>
            </div>

        </div>

        <div class="corps">

            <div class="informations">
                <div class="departement">
                    <h2>Département : <?= utf8_encode($queryDetail['departementFabrication']) ?></h2>
                </div>

                <div class="lait">
                    <h2>Type de lait : <?= utf8_encode($queryDetail['lait']) ?></h2>
                </div>

                <div class="vin">
                    <h2>Vin associé : <?= utf8_encode($queryDetail['vin']) ?></h2>
                </div>
            </div>

            <div class="description">
                <h1>Description</h1>
                <p>Ce fromage communément appelé "<?= utf8_encode($queryDetail['nom']) ?>" est notamment présent dans le département suivant : <?= utf8_encode($queryDetail['departementFabrication']) ?>.<br>
                    Sa pâte <?= utf8_encode($queryDetail['typePate']) ?> est constituée de lait de <?= utf8_encode($queryDetail['lait']) ?>.<br>
                    En bonus pour le consommer, il est conseillé de se diriger vers un <?= $queryDetail['vin'] ?>.</p>
                <div class="wiki">
                    <h2>En savoir plus : <a href="<?= utf8_encode($queryDetail['urlWikipedia']) ?>"><?= utf8_encode($queryDetail['urlWikipedia']) ?></a></h2>
                </div>
            </div>

            <div class="avis">
                <div class="note">
                    <h2>Noter ce fromage !</h2>
                    <?php if ($aNote == false) { ?>
                        <form action="index.php?page=ajouterNote" method="POST">
                            <div class="etoile etoile2">
                                <button id="button_etoile" type="submit" name="formulaire_note">
                                    <a title="1/5">★</a>
                                    <input type="hidden" name="note" value="1">
                                </button>
                                <button id="button_etoile" type="submit" name="formulaire_note">
                                    <a title="2/5">★</a>
                                    <input type="hidden" name="note" value="2">
                                </button>
                                <button id="button_etoile" type="submit" name="formulaire_note">
                                    <a title="3/5">★</a>
                                    <input type="hidden" name="note" value="3">
                                </button>
                                <button id="button_etoile" type="submit" name="formulaire_note">
                                    <a title="4/5">★</a>
                                    <input type="hidden" name="note" value="4">
                                </button>
                                <button id="button_etoile" type="submit" name="formulaire_note">
                                    <a title="5/5">★</a>
                                    <input type="hidden" name="note" value="5">
                                </button>
                            </div>
                            <input type="hidden" name="nomFromage" value="<?= utf8_encode($queryDetail['nom']) ?>">
                            <input type="hidden" name="departementFabrication" value="<?= utf8_encode($queryDetail['departementFabrication']) ?>">
                        </form>
                    <?php } else { ?>
                        <p>Tu as déja noté</p>
                    <?php } ?>

                </div>

                <div class="container_commentaire">
                    <h2>Espace commentaire</h2>
                    <form action="index.php?page=commenter" method="POST">
                        <input type="hidden" name="nomFromage" value="<?= utf8_encode($queryDetail['nom']) ?>">
                        <input type="hidden" name="departementFabrication" value="<?= utf8_encode($queryDetail['departementFabrication']) ?>">
                        <input type="submit" value="Laisser un commentaire">
                    </form>
                    <?php foreach ($listCommentaire as $row) { ?>

                        <div class="commentaire">

                            <div class="left">
                                <p><?= utf8_encode($row['user']) ?></p>
                            </div>
                            <div class="right">
                                <div class="sur">
                                    <p><?= utf8_encode($row['titre']) ?></p>
                                    <p><?= utf8_encode($row['datePublication']) ?></p>
                                </div>
                                <div class="sous">
                                    <p><?= utf8_encode($row['avis']) ?></p>
                                </div>
                            </div>

                        </div>



                    <?php } ?>

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