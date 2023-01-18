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
            <h1>Ici vous retrouverez plus de 300 fromages français</h1>
        </div>


        <div class="affinage">

            <form action="index.php?page=rechercher" method="POST">
                <div class="recherche">
                    <input type="text" name="recherche" placeholder="Rechercher...">
                    <button type="submit" name="formulaire_recherche">OK</button>
                </div>
            </form>

            <form action="index.php?page=trie" method="POST">
                <select name="trier" id="trier_select">

                    <option value="none" selected>Trier</option>

                    <option value="A-Z">Ordre alphabétique A-Z</option>

                    <option value="Z-A">Ordre alphabétique Z-A</option>

                    <option value="depart">Département</option>

                    <option value="lait">Lait</option>

                    <option value="note">Note</option>

                </select>
            </form>

        </div>

        <div class="global_container">

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
                                    <input type="hidden" name="nomFromage" value="<?= utf8_encode($req['nom']) ?>">
                                    <input type="hidden" name="departementFabrication" value="<?= utf8_encode($req['departementFabrication']) ?>">
                                </div>
                            </button>
                        </form>
                        <form action="index.php?page=ajouterFavori" method="POST" class="form_favoris">
                            <input type="hidden" name="nomFromage" value="<?= utf8_encode($req['nom']) ?>">
                            <input type="hidden" name="departementFabrication" value="<?= utf8_encode($req['departementFabrication']) ?>">
                            <button type="submit" id="button_favoris">
                                <?php
                                $m = new MdlUser();
                                if (isset($_SESSION['login'])) {
                                    if ($m->isFavoris(utf8_encode($req['nom']), utf8_encode($req['departementFabrication']))) { ?>
                                        <img id="image_favoris" src="vue/Img/isFavoris.png" alt="">
                                    <?php } else { ?>
                                        <img id="image_favoris" src="vue/Img/favoris.png" alt="">
                                    <?php }
                                } else { ?>
                                    <img id="image_favoris" src="vue/Img/favoris.png" alt="">
                                <?php } ?>
                            </button>
                        </form>
                    </div>
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