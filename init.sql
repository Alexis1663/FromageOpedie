-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 jan. 2023 à 12:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fromageopedie`
--

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `nomFromage` varchar(50) NOT NULL,
  `departementFabrication` varchar(60) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `avis` varchar(200) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `datePublication` datetime NOT NULL,
  PRIMARY KEY (`nomFromage`,`user`,`datePublication`),
  KEY `departementFabrication` (`departementFabrication`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commenter`
--

INSERT INTO `commenter` (`nomFromage`, `departementFabrication`, `user`, `avis`, `titre`, `datePublication`) VALUES
('A Filetta                       ', 'Allier                ', 'alexis.carreau@gmail.com', 'ceci est un incroyable fromage !!', 'ce fromag est formidable', '2023-01-08 06:14:53');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `nom` varchar(50) NOT NULL,
  `numero` varchar(3) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

DROP TABLE IF EXISTS `favori`;
CREATE TABLE IF NOT EXISTS `favori` (
  `nomFromage` varchar(50) NOT NULL,
  `departementFabrication` varchar(60) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  PRIMARY KEY (`nomFromage`,`departementFabrication`,`pseudo`),
  KEY `pseudo` (`pseudo`),
  KEY `departementFabrication` (`departementFabrication`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favori`
--

INSERT INTO `favori` (`nomFromage`, `departementFabrication`, `pseudo`) VALUES
('A Filetta                       ', 'Allier                ', 'a@gmail.com'),
('Abbaye de Cîteaux               ', 'Réunion               ', 'a@gmail.com'),
('Abbaye de Tamié                 ', 'Yonne                 ', 'a@gmail.com'),
('Brie de Meaux                   ', 'Puy-de-Dôme           ', 'a@gmail.com'),
('Gruyère français                ', 'Isère                 ', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `fromage`
--

DROP TABLE IF EXISTS `fromage`;
CREATE TABLE IF NOT EXISTS `fromage` (
  `departementFabrication` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `urlWikipedia` varchar(100) DEFAULT NULL,
  `lait` varchar(30) NOT NULL,
  `image` varchar(60) NOT NULL,
  `typePate` varchar(40) NOT NULL,
  `vin` varchar(40) NOT NULL,
  PRIMARY KEY (`nom`,`departementFabrication`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fromage`
--

INSERT INTO `fromage` (`departementFabrication`, `nom`, `urlWikipedia`, `lait`, `image`, `typePate`, `vin`) VALUES
('Allier                ', 'A Filetta                       ', 'http://fr.wikipedia.org/wiki/A_Filetta_%28marque%29                                ', 'Brebis ', 'A_Filetta.jpg                       ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Lot                   ', 'Abbaye de Belloc                ', 'http://fr.wikipedia.org/wiki/Abbaye_de_Belloc_%28fromage%29                        ', 'Brebis ', 'Abbaye_de_Belloc.jpg                ', 'pressée non cuite      ', 'vin rouge charnu'),
('Réunion               ', 'Abbaye de Cîteaux               ', 'http://fr.wikipedia.org/wiki/Abbaye_de_C%C3%AEteaux_%28marque%29                   ', 'Vaches ', 'Abbaye_de_Citeaux.JPG               ', 'pressée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Abbaye de la Joie Notre-Dame    ', 'http://fr.wikipedia.org/wiki/Abbaye_de_la_Joie_Notre-Dame_%28fromage%29            ', 'Vache  ', 'Abbaye_de_la_Joie_NotreDame.jpg     ', 'pressée non cuite      ', 'vin rouge charnu'),
('Saône-et-Loire        ', 'Abbaye de la Pierre-qui-Vire    ', 'http://fr.wikipedia.org/wiki/Abbaye_de_la_Pierre-qui-Vire_%28fromage%29            ', 'Vache  ', 'Abbaye_de_la_Pierre_qui_Vire.jpg    ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Yonne                 ', 'Abbaye de Tamié                 ', 'http://fr.wikipedia.org/wiki/Abbaye_de_Tami%C3%A9_%28fromage%29                    ', 'Vache  ', 'Abbaye_de_Tamie.jpg                 ', 'pressée non cuite      ', 'vin rouge charnu'),
('Tarn                  ', 'Abondance                       ', 'http://fr.wikipedia.org/wiki/Abondance_%28fromage%29                               ', 'Vache  ', 'Abondance.jpg                       ', 'pressée cuite          ', 'vin blanc gras'),
('Seine-Maritime        ', 'Affidélice                      ', 'http://fr.wikipedia.org/wiki/Affid%C3%A9lice                                       ', 'Vache  ', 'Affidelice.jpg                      ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Morbihan              ', 'Aiguille d\'Orcières             ', 'http://fr.wikipedia.org/wiki/Aiguille_d%27Orci%C3%A8res                            ', 'Vache  ', 'Aiguille_dOrcieres.png              ', 'préssée cuite          ', 'vin blanc gras'),
('Ain                   ', 'Aisy cendré                     ', 'http://fr.wikipedia.org/wiki/Aisy_cendr%C3%A9                                      ', 'Vache  ', 'Aisy_Cendre.jpg                     ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Corrèze               ', 'Amou                            ', 'http://fr.wikipedia.org/wiki/Amou_%28fromage%29                                    ', 'Brebis ', 'Amou.jpg                            ', 'pressée non cuite      ', 'vin rouge charnu'),
('Jura                  ', 'Ardi-Gasna                      ', 'http://fr.wikipedia.org/wiki/Ardi-Gasna                                            ', 'Brebis ', 'Ardi_Gasna.jpg                      ', 'pressée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Arôme au vin blanc              ', 'http://fr.wikipedia.org/wiki/Ar%C3%B4me_au_vin_blanc                               ', 'Vache  ', 'Arome_au_Vin_Blanc.png              ', 'molle                  ', 'vin blanc équilibré'),
('Savoie                ', 'Arôme de Lyon                   ', 'http://fr.wikipedia.org/wiki/Ar%C3%B4me_de_Lyon                                    ', 'Vache  ', 'Arome_de_Lyon.jpg                   ', 'molle                  ', 'vin blanc équilibré'),
('Tarn                  ', 'Arthon                          ', 'http://fr.wikipedia.org/wiki/Arthon_%28fromage%29                                  ', 'Chèvre ', 'Arthon.jpg                          ', 'molle                  ', 'vin blanc équilibré'),
('Aveyron               ', 'Autun                           ', 'http://fr.wikipedia.org/wiki/Autun_%28fromage%29                                   ', 'Chèvre ', 'Autun.jpg                           ', 'molle                  ', 'vin blanc équilibré'),
('Bas-Rhin              ', 'Avalin                          ', 'http://fr.wikipedia.org/wiki/Avalin                                                ', 'Vache  ', 'Avalin.jpg                          ', 'préssée cuite          ', 'vin blanc gras'),
('Meurthe-et-Moselle    ', 'Baguette paysanne à la moutarde ', 'http://fr.wikipedia.org/wiki/Baguette_paysanne_%C3%A0_la_moutarde                  ', 'Vache  ', 'Baguette_Paysanne_a_la_Moutarde.jpg ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Ain                   ', 'Barberey                        ', 'http://fr.wikipedia.org/wiki/Barberey_%28fromage%29                                ', 'Vache  ', 'Barberey.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Ardèche               ', 'Barousse                        ', 'http://fr.wikipedia.org/wiki/Barousse_%28fromage%29                                ', 'Brebis ', 'Barousse.jpg                        ', 'pressée non cuite      ', 'vin rouge charnu'),
('Cantal                ', 'Beaufort                        ', 'http://fr.wikipedia.org/wiki/Beaufort_%28fromage%29                                ', 'Vache  ', 'Beaufort.jpg                        ', 'pressée cuite          ', 'vin blanc gras'),
('Côte-d\'Or             ', 'Beaumont                        ', 'http://fr.wikipedia.org/wiki/Beaumont_%28fromage%29                                ', 'Vache  ', 'Beaumont.jpg                        ', 'pressée non cuite      ', 'vin rouge charnu'),
('Indre                 ', 'Belle des champs                ', 'http://fr.wikipedia.org/wiki/Belle_des_champs                                      ', 'Vache  ', 'Belle_des_Champs.jpg                ', 'molle croute fleurie   ', 'vin rouge léger'),
('Indre-et-Loire        ', 'Bessay                          ', 'http://fr.wikipedia.org/wiki/Bessay_%28fromage%29                                  ', 'Vache  ', 'Bessay.jpg                          ', 'molle                  ', 'vin blanc équilibré'),
('Morbihan              ', 'Bethmale                        ', 'http://fr.wikipedia.org/wiki/Bethmale_%28fromage%29                                ', 'Vache  ', 'Bethmale.jpg                        ', 'pressée non cuite      ', 'vin rouge charnu'),
('Oise                  ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Puy-de-Dôme           ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Réunion               ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Savoie                ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Haute-Marne           ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Drôme                 ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Rhône                 ', 'Bleu d\'Auvergne                 ', 'http://fr.wikipedia.org/wiki/Bleu_d%27Auvergne                                     ', 'Vache  ', 'Bleu_dAuvergne.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Aveyron               ', 'Bleu de Costaros                ', 'http://fr.wikipedia.org/wiki/Bleu_de_Costaros                                      ', 'Vache  ', 'Bleu_de_Costaros.jpg                ', 'persilée               ', 'vin blanc moelleux'),
('Haute-Loire           ', 'Bleu de Gex                     ', 'http://fr.wikipedia.org/wiki/Bleu_de_Gex                                           ', 'Vache  ', 'Bleu_de_Gex.jpg                     ', 'persilée               ', 'vin blanc moelleux'),
('Charente-Maritime     ', 'Bleu de Gex                     ', 'http://fr.wikipedia.org/wiki/Bleu_de_Gex                                           ', 'Vache  ', 'Bleu_de_Gex.jpg                     ', 'persilée               ', 'vin blanc moelleux'),
('Charente-Maritime     ', 'Bleu de Laqueuille              ', 'http://fr.wikipedia.org/wiki/Bleu_de_Laqueuille                                    ', 'Vache  ', 'Bleu_de_Laqueuille.jpg              ', 'persilée               ', 'vin blanc moelleux'),
('Côte-d\'Or             ', 'Bleu de Lavaldens               ', 'http://fr.wikipedia.org/wiki/Bleu_de_Lavaldens                                     ', 'Vache  ', 'Bleu_de_Lavaldens.png               ', 'persilée               ', 'vin blanc moelleux'),
('Eure                  ', 'Bleu de Loudes                  ', 'http://fr.wikipedia.org/wiki/Bleu_de_Loudes                                        ', 'Vache  ', 'Bleu_de_Loudes.png                  ', 'persilée               ', 'vin blanc moelleux'),
('Isère                 ', 'Bleu de Sainte-Foy              ', 'http://fr.wikipedia.org/wiki/Bleu_de_Sainte-Foy                                    ', 'Vache  ', 'Bleu_de_Sainte_Foy.jpg              ', 'persilée               ', 'vin blanc moelleux'),
('Nord                  ', 'Bleu de Termignon               ', 'http://fr.wikipedia.org/wiki/Bleu_de_Termignon                                     ', 'Vache  ', 'Bleu_de_Termignon.JPG               ', 'persilée               ', 'vin blanc moelleux'),
('Pas-de-Calais         ', 'Bleu de Thiézac                 ', 'http://fr.wikipedia.org/wiki/Bleu_de_Thi%C3%A9zac                                  ', 'Vache  ', 'Bleu_de_Thiezac.jpg                 ', 'persilée               ', 'vin blanc moelleux'),
('Pas-de-Calais         ', 'Bleu des Causses                ', 'http://fr.wikipedia.org/wiki/Bleu_des_Causses                                      ', 'Vache  ', 'Bleu_des_Causses.jpg                ', 'persilée               ', 'vin blanc moelleux'),
('Sarthe                ', 'Bleu des Causses                ', 'http://fr.wikipedia.org/wiki/Bleu_des_Causses                                      ', 'Vache  ', 'Bleu_des_Causses.jpg                ', 'persilée               ', 'vin blanc moelleux'),
('Eure                  ', 'Bleu du Dévoluy                 ', 'http://fr.wikipedia.org/wiki/Bleu_du_D%C3%A9voluy                                  ', 'Vache  ', 'Bleu_du_Devoluy.png                 ', 'persilée               ', 'vin blanc moelleux'),
('Territoire de Belfort ', 'Bleu du Mont-Cenis              ', 'http://fr.wikipedia.org/wiki/Bleu_du_Mont-Cenis                                    ', 'Vache  ', 'Bleu_du_MontCenis.JPG               ', 'persilée               ', 'vin blanc moelleux'),
('Dordogne              ', 'Bleu du Quercy                  ', 'http://fr.wikipedia.org/wiki/Bleu_du_Quercy                                        ', 'Vache  ', 'Bleu_de_Quercy.png                  ', 'persilée               ', 'vin blanc moelleux'),
('Cantal                ', 'Bleu du Vercors-Sassenage       ', 'http://fr.wikipedia.org/wiki/Bleu_du_Vercors-Sassenage                             ', 'Vache  ', 'Bleu_du_VercorsSassenage.jpg        ', 'persilée               ', 'vin blanc moelleux'),
('Haute-Saône           ', 'Bleu du Vercors-Sassenage       ', 'http://fr.wikipedia.org/wiki/Bleu_du_Vercors-Sassenage                             ', 'Vache  ', 'Bleu_du_VercorsSassenage.jpg        ', 'persilée               ', 'vin blanc moelleux'),
('Maine-et-Loire        ', 'Bons Mayennais                  ', 'http://fr.wikipedia.org/wiki/Bons_Mayennais                                        ', 'Vache  ', 'Bons_Mayennais.jpg                  ', 'molle croute fleurie   ', 'vin rouge léger'),
('Seine-Maritime        ', 'Bouille                         ', 'http://fr.wikipedia.org/wiki/Bouille_%28fromage%29                                 ', 'Vache  ', 'Bouille.jpg                         ', 'molle croute fleurie   ', 'vin rouge léger'),
('Saône-et-Loire        ', 'Boule des moines                ', 'http://fr.wikipedia.org/wiki/Boule_des_moines                                      ', 'Vache  ', 'Boule_des_Moines.jpg                ', 'fraiche                ', 'vin blanc sec'),
('Côte-d\'Or             ', 'Boulet de Cassel                ', 'http://fr.wikipedia.org/wiki/Boulet_de_Cassel                                      ', 'Vache  ', 'Boulet_de_Cassel.jpg                ', 'préssée non cuite      ', 'vin rouge charnu'),
('Vosges                ', 'Boulette d\'Avesnes              ', 'http://fr.wikipedia.org/wiki/Boulette_d%27Avesnes                                  ', 'Vache  ', 'Boulette_dAvesnes.jpg               ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Ardèche               ', 'Boulette de la Pierre-qui-Vire  ', 'http://fr.wikipedia.org/wiki/Boulette_de_la_Pierre-qui-Vire                        ', 'Vache  ', 'Boulette_de_la_PierreQuiVire.jpg    ', 'molle croute naturelle ', 'vin rouge léger'),
('Landes                ', 'Bouton de Culotte               ', 'http://fr.wikipedia.org/wiki/Bouton_de_Culotte                                     ', 'Chèvre ', 'Bouton_de_Culotte.jpg               ', 'molle croute fleurie   ', 'vin rouge léger'),
('Lozère                ', 'Bresse Bleu                     ', 'http://fr.wikipedia.org/wiki/Bresse_Bleu                                           ', 'Vache  ', 'Bresse_Bleu.jpg                     ', 'persilée               ', 'vin blanc moelleux'),
('Saône-et-Loire        ', 'Brézain                         ', 'http://fr.wikipedia.org/wiki/Br%C3%A9zain                                          ', 'Vache  ', 'Brezain.jpg                         ', 'pressée non cuite      ', 'vin rouge charnu'),
('Loiret                ', 'Brie de Meaux                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Meaux                                         ', 'Vache  ', 'Brie_de_Meaux.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Puy-de-Dôme           ', 'Brie de Meaux                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Meaux                                         ', 'Vache  ', 'Brie_de_Meaux.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Ain                   ', 'Brie de Meaux                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Meaux                                         ', 'Vache  ', 'Brie_de_Meaux.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Jura                  ', 'Brie de Meaux                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Meaux                                         ', 'Vache  ', 'Brie_de_Meaux.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Ain                   ', 'Brie de Melun                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Melun                                         ', 'Vache  ', 'Brie_de_Melun.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Savoie                ', 'Brie de Melun                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Melun                                         ', 'Vache  ', 'Brie_de_Melun.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Aube                  ', 'Brie de Melun                   ', 'http://fr.wikipedia.org/wiki/Brie_de_Melun                                         ', 'Vache  ', 'Brie_de_Melun.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Puy-de-Dôme           ', 'Brie de Montereau               ', 'http://fr.wikipedia.org/wiki/Brie_de_Montereau                                     ', 'Vache  ', 'Brie_de_Montereau.jpg               ', 'molle                  ', 'vin blanc équilibré'),
('Aveyron               ', 'Brie de Nangis                  ', 'http://fr.wikipedia.org/wiki/Brie_de_Nangis                                        ', 'Vache  ', 'Brie_de_Nangis.jpg                  ', 'molle croute fleurie   ', 'vin rouge léger'),
('Allier                ', 'Brin d\'amour                    ', 'http://fr.wikipedia.org/wiki/Brin_d%27amour                                        ', 'Brebis ', 'Brin_dAmour.jpg                     ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Calvados              ', 'Briquette de l\'Ecaillon         ', 'http://fr.wikipedia.org/wiki/Briquette_de_l%27Ecaillon                             ', 'Chèvre ', 'Briquette_de_lEcaillon.jpg          ', 'molle                  ', 'vin blanc équilibré'),
('Manche                ', 'Cabécou                         ', 'http://fr.wikipedia.org/wiki/Cab%C3%A9cou                                          ', 'Chèvre ', 'Cabecou.jpg                         ', 'molle croute fleurie   ', 'vin rouge léger'),
('Réunion               ', 'Cabécou                         ', 'http://fr.wikipedia.org/wiki/Cab%C3%A9cou                                          ', 'Chèvre ', 'Cabecou.jpg                         ', 'molle croute fleurie   ', 'vin rouge léger'),
('Seine-et-Marne        ', 'Cabécou                         ', 'http://fr.wikipedia.org/wiki/Cab%C3%A9cou                                          ', 'Chèvre ', 'Cabecou.jpg                         ', 'molle croute fleurie   ', 'vin rouge léger'),
('Cantal                ', 'Caillé                          ', 'http://fr.wikipedia.org/wiki/Caill%C3%A9                                           ', 'Vache  ', 'Caille.JPG                          ', 'fraiche                ', 'vin blanc sec'),
('Saône-et-Loire        ', 'Caillebotte                     ', 'http://fr.wikipedia.org/wiki/Caillebotte_%28fromage%29                             ', 'Vache  ', 'Caillebotte.jpg                     ', 'caillé                 ', 'vin rouge'),
('Rhône                 ', 'Cantal                          ', 'http://fr.wikipedia.org/wiki/Cantal_%28fromage%29                                  ', 'Vache  ', 'Cantal.jpg                          ', 'préssée non cuite      ', 'vin rouge charnu'),
('Haute-Corse           ', 'Cap Noir                        ', 'http://fr.wikipedia.org/wiki/Cap_Noir_%28fromage%29                                ', 'Vache  ', 'Cap_Noir.JPG                        ', 'préssée non cuite      ', 'vin rouge charnu'),
('Nord                  ', 'Caprice des Dieux               ', 'http://fr.wikipedia.org/wiki/Caprice_des_Dieux                                     ', 'Vache  ', 'Caprice_des_Dieux.JPG               ', 'molle croute fleurie   ', 'vin rouge léger'),
('Réunion               ', 'Carré d\'Aurillac                ', 'http://fr.wikipedia.org/wiki/Carr%C3%A9_d%27Aurillac                               ', 'Vache  ', 'Carre_dAurillac.JPG                 ', 'persilée               ', 'vin blanc moelleux'),
('Vienne                ', 'Carré de Bonneville             ', 'http://fr.wikipedia.org/wiki/Carr%C3%A9_de_Bonneville                              ', 'Vache  ', 'Carre_de_Bonneville.jpg             ', 'persilée               ', 'vin blanc moelleux'),
('Lozère                ', 'Carré du Vinage                 ', 'http://fr.wikipedia.org/wiki/Carr%C3%A9_du_Vinage                                  ', 'Vache  ', 'Carre_de_Vinage.jpg                 ', 'persilée               ', 'vin blanc moelleux'),
('Pas-de-Calais         ', 'Carré Frais                     ', 'http://fr.wikipedia.org/wiki/Carr%C3%A9_Frais                                      ', 'Vache  ', 'Carre_Frais.jpg                     ', 'persilée               ', 'vin blanc moelleux'),
('Mayenne               ', 'Cathare                         ', 'http://fr.wikipedia.org/wiki/Cathare_%28marque%29                                  ', 'Chèvre ', 'Cathare.JPG                         ', 'molle                  ', 'vin blanc équilibré'),
('Manche                ', 'Ch\'ti Crémeux                   ', 'http://fr.wikipedia.org/wiki/Ch%27ti_Cr%C3%A9meux                                  ', 'Vache  ', 'Chti_Cremeux.jpg                    ', 'molle croute fleurie   ', 'vin rouge léger'),
('Orne                  ', 'Chambérat                       ', 'http://fr.wikipedia.org/wiki/Chamb%C3%A9rat_%28fromage%29                          ', 'Vache  ', 'Chamberat.jpg                       ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Allier                ', 'Chandamour                      ', 'http://fr.wikipedia.org/wiki/Chandamour                                            ', 'Vache  ', 'Chandamour.jpg                      ', 'molle croute fleurie   ', 'vin rouge léger'),
('Calvados              ', 'Chaource                        ', 'http://fr.wikipedia.org/wiki/Chaource_%28fromage%29                                ', 'Vache  ', 'Chaource.jpg                        ', 'molle croute fleurie   ', 'vin rouge léger'),
('Haute-Loire           ', 'Charolais                       ', 'http://fr.wikipedia.org/wiki/Charolais_%28fromage%29                               ', 'Chèvre ', 'Charolais.jpg                       ', 'molle croute naturelle ', 'vin rouge léger'),
('Réunion               ', 'Charolais                       ', 'http://fr.wikipedia.org/wiki/Charolais_%28fromage%29                               ', 'Chèvre ', 'Charolais.jpg                       ', 'molle croute naturelle ', 'vin rouge léger'),
('Savoie                ', 'Charolais                       ', 'http://fr.wikipedia.org/wiki/Charolais_%28fromage%29                               ', 'Chèvre ', 'Charolais.jpg                       ', 'molle croute naturelle ', 'vin rouge léger'),
('Dordogne              ', 'Charolais                       ', 'http://fr.wikipedia.org/wiki/Charolais_%28fromage%29                               ', 'Chèvre ', 'Charolais.jpg                       ', 'molle croute naturelle ', 'vin rouge léger'),
('Puy-de-Dôme           ', 'Chaumes                         ', 'http://fr.wikipedia.org/wiki/Chaumes                                               ', 'Vache  ', 'Chaumes.jpg                         ', 'molle                  ', 'vin blanc équilibré'),
('Cher                  ', 'Chaussée aux moines             ', 'http://fr.wikipedia.org/wiki/Chauss%C3%A9e_aux_moines                              ', 'Vache  ', 'Chaussee_aux_Moines.JPG             ', 'préssée non cuite      ', 'vin rouge charnu'),
('Loire-Atlantique      ', 'Chaussée aux moines             ', 'http://fr.wikipedia.org/wiki/Chauss%C3%A9e_aux_moines                              ', 'Vache  ', 'Chaussee_aux_Moines.JPG             ', 'préssée non cuite      ', 'vin rouge charnu'),
('Loire-Atlantique      ', 'Chavroux                        ', 'http://fr.wikipedia.org/wiki/Chavroux                                              ', 'Chèvre ', 'Chavroux.jpg                        ', 'fraiche                ', 'vin blanc sec'),
('Haute-Corse           ', 'Chécy                           ', 'http://fr.wikipedia.org/wiki/Ch%C3%A9cy_%28fromage%29                              ', 'Vache  ', 'Checy.jpg                           ', 'molle croute naturelle ', 'vin rouge léger'),
('Hérault               ', 'Chevret                         ', 'http://fr.wikipedia.org/wiki/Chevret                                               ', 'Chèvre ', 'Chevret.jpg                         ', 'molle                  ', 'vin blanc équilibré'),
('Loiret                ', 'Chevret du Haut-Jura            ', 'http://fr.wikipedia.org/wiki/Chevret_du_Haut-Jura                                  ', 'Vache  ', 'Chevret_du_Haut_Jura.JPG            ', 'molle croute fleurie   ', 'vin rouge léger'),
('Puy-de-Dôme           ', 'Chevret du Haut-Jura            ', 'http://fr.wikipedia.org/wiki/Chevret_du_Haut-Jura                                  ', 'Vache  ', 'Chevret_du_Haut_Jura.JPG            ', 'molle croute fleurie   ', 'vin rouge léger'),
('Rhône                 ', 'Chèvreton                       ', 'http://fr.wikipedia.org/wiki/Ch%C3%A8vreton                                        ', 'Chèvre ', 'Chevreton.jpg                       ', 'molle croute fleurie   ', 'vin rouge léger'),
('Seine-Maritime        ', 'Chèvreton                       ', 'http://fr.wikipedia.org/wiki/Ch%C3%A8vreton                                        ', 'Chèvre ', 'Chevreton.jpg                       ', 'molle croute fleurie   ', 'vin rouge léger'),
('Haute-Loire           ', 'Chevrotin                       ', 'http://fr.wikipedia.org/wiki/Chevrotin                                             ', 'Chèvre ', 'Chevretin.jpg                       ', 'préssée non cuite      ', 'vin rouge charnu'),
('Seine-et-Marne        ', 'Clon                            ', 'http://fr.wikipedia.org/wiki/Clon                                                  ', 'Vache  ', 'Clon.jpg                            ', 'caillé                 ', 'vin rouge'),
('Loire                 ', 'Comté                           ', 'http://fr.wikipedia.org/wiki/Comt%C3%A9_%28fromage%29                              ', 'Vache  ', 'Comte.jpg                           ', 'pressée cuite          ', 'vin blanc gras'),
('Aveyron               ', 'Corsica                         ', 'http://fr.wikipedia.org/wiki/Corsica_%28marque%29                                  ', 'Brebis ', 'Corsica.jpg                         ', 'molle croute naturelle ', 'vin rouge léger'),
('Cher                  ', 'Coulommiers                     ', 'http://fr.wikipedia.org/wiki/Coulommiers_%28fromage%29                             ', 'Vache  ', 'Coulommiers.jpg                     ', 'molle croute fleurie   ', 'vin rouge léger'),
('Orne                  ', 'Couronne Lochoise               ', 'http://fr.wikipedia.org/wiki/Couronne_Lochoise                                     ', 'Chèvre ', 'Couronne_Lochoise.jpg               ', 'molle croute fleurie   ', 'vin rouge léger'),
('Charente-Maritime     ', 'Cousteron                       ', 'http://fr.wikipedia.org/wiki/Cousteron                                             ', 'Vache  ', 'Cousteron.jpg                       ', 'préssée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Coutances                       ', 'http://fr.wikipedia.org/wiki/Coutances_%28marque%29                                ', 'Vache  ', 'Coutances.jpg                       ', 'molle croute fleurie   ', 'vin rouge léger'),
('Vosges                ', 'Crémet du Cap Blanc Nez         ', 'http://fr.wikipedia.org/wiki/Cr%C3%A9met_du_Cap_Blanc_Nez                          ', 'Vache  ', 'Cremet_du_Cap_Blanc_Nez.jpg         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Aveyron               ', 'Crottin de Chavignol            ', 'http://fr.wikipedia.org/wiki/Crottin_de_Chavignol                                  ', 'Chèvre ', 'Crottin_de_Chavignol.jpg            ', 'molle                  ', 'vin blanc équilibré'),
('Dordogne              ', 'Crottin de Chavignol            ', 'http://fr.wikipedia.org/wiki/Crottin_de_Chavignol                                  ', 'Chèvre ', 'Crottin_de_Chavignol.jpg            ', 'molle                  ', 'vin blanc équilibré'),
('Eure                  ', 'Dauphin                         ', 'http://fr.wikipedia.org/wiki/Dauphin_%28fromage%29                                 ', 'Vache  ', 'Dauphin.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Hautes-Alpes          ', 'Dauphin                         ', 'http://fr.wikipedia.org/wiki/Dauphin_%28fromage%29                                 ', 'Vache  ', 'Dauphin.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Réunion               ', 'Délice de la Sicalait           ', 'http://fr.wikipedia.org/wiki/D%C3%A9lice_de_la_Sicalait                            ', 'Vache  ', 'Délice_de_la_Sicalait.jpg           ', 'molle                  ', 'vin blanc équilibré'),
('Savoie                ', 'Délice de Saint-Cyr             ', 'http://fr.wikipedia.org/wiki/D%C3%A9lice_de_Saint-Cyr                              ', 'Vache  ', 'Delice_de_Saint_Cyr.jpg             ', 'molle                  ', 'vin blanc équilibré'),
('Savoie                ', 'Emmental de Savoie              ', 'http://fr.wikipedia.org/wiki/Emmental_de_Savoie                                    ', 'Vache  ', 'Emmental_de_Savoie.jpg              ', 'caillé                 ', 'vin rouge'),
('Loir-et-Cher          ', 'Emmental de Savoie              ', 'http://fr.wikipedia.org/wiki/Emmental_de_Savoie                                    ', 'Vache  ', 'Emmental_de_Savoie.jpg              ', 'caillé                 ', 'vin rouge'),
('Nord                  ', 'Époisses                        ', 'http://fr.wikipedia.org/wiki/%C3%89poisses_%28fromage%29                           ', 'Vache  ', 'Epoisses.jpg                        ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Ain                   ', 'Époisses                        ', 'http://fr.wikipedia.org/wiki/%C3%89poisses_%28fromage%29                           ', 'Vache  ', 'Epoisses.jpg                        ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Seine-et-Marne        ', 'Époisses                        ', 'http://fr.wikipedia.org/wiki/%C3%89poisses_%28fromage%29                           ', 'Vache  ', 'Epoisses.jpg                        ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Lot                   ', 'Etorki                          ', 'http://fr.wikipedia.org/wiki/Etorki                                                ', 'Brebis ', 'Etorki.jpg                          ', 'préssée non cuite      ', 'vin rouge charnu'),
('Ain                   ', 'Faisselle                       ', 'http://fr.wikipedia.org/wiki/Faisselle                                             ', 'Vache  ', 'Faisselle.jpg                       ', 'fraiche                ', 'vin blanc sec'),
('Haute-Saône           ', 'Fontainebleau                   ', 'http://fr.wikipedia.org/wiki/Fontainebleau_%28dessert%29                           ', 'Vache  ', 'Fontainebleau.jpg                   ', 'caillé                 ', 'vin rouge'),
('Loire-Atlantique      ', 'Fort de Béthune                 ', 'http://fr.wikipedia.org/wiki/Fort_de_B%C3%A9thune                                  ', 'Vache  ', 'Fort_de_Bethune.jpg                 ', 'fondue                 ', 'vin blanc vif'),
('Puy-de-Dôme           ', 'Foudjou                         ', 'http://fr.wikipedia.org/wiki/Foudjou                                               ', 'Chèvre ', 'Foudjou.jpg                         ', 'fondue                 ', 'vin blanc vif'),
('Savoie                ', 'Fourmagée                       ', 'http://fr.wikipedia.org/wiki/Fourmag%C3%A9e                                        ', 'Vache  ', 'Fourmagee.jpg                       ', 'fondue                 ', 'vin blanc vif'),
('Saône-et-Loire        ', 'Fourme d\'Ambert                 ', 'http://fr.wikipedia.org/wiki/Fourme_d%27Ambert                                     ', 'Vache  ', 'Fourme_dAmbert.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Seine-et-Marne        ', 'Fourme de Montbrison            ', 'http://fr.wikipedia.org/wiki/Fourme_de_Montbrison                                  ', 'Vache  ', 'Fourme_de_Montbrison.jpg            ', 'persilée               ', 'vin blanc moelleux'),
('Cantal                ', 'Fourme de Montbrison            ', 'http://fr.wikipedia.org/wiki/Fourme_de_Montbrison                                  ', 'Vache  ', 'Fourme_de_Montbrison.jpg            ', 'persilée               ', 'vin blanc moelleux'),
('Savoie                ', 'Fourme de Rochefort-Montagne    ', 'http://fr.wikipedia.org/wiki/Fourme_de_Rochefort-Montagne                          ', 'Vache  ', 'Fourme_de_RochefortMontagne.jpg     ', 'persilée               ', 'vin blanc moelleux'),
('Haute-Marne           ', 'Frinault                        ', 'http://fr.wikipedia.org/wiki/Frinault                                              ', 'Vache  ', 'Frinault.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Ain                   ', 'Fromage aux artisons            ', 'http://fr.wikipedia.org/wiki/Fromage_aux_artisons                                  ', 'Vache  ', 'Fromage_aux_Artisous.JPG            ', 'molle                  ', 'vin blanc équilibré'),
('Aveyron               ', 'Fromage aux noix                ', 'http://fr.wikipedia.org/wiki/Fromage_aux_noix                                      ', 'Vache  ', 'Fromage_aux_Noix.JPG                ', 'fondue                 ', 'vin blanc vif'),
('Jura                  ', 'Fromage de Pays                 ', 'http://fr.wikipedia.org/wiki/Fromage_de_Pays                                       ', 'Vache  ', 'Fromage_de_Pays.jpg                 ', 'persilée               ', 'vin blanc moelleux'),
('Orne                  ', 'Fromage des Plaines             ', 'http://fr.wikipedia.org/wiki/Fromage_des_Plaines                                   ', 'Vache  ', 'Fromage_des_Plaines.png             ', 'fraiche                ', 'vin blanc sec'),
('Pas-de-Calais         ', 'Fromager d\'Affinois             ', 'http://fr.wikipedia.org/wiki/Fromager_d%27Affinois                                 ', 'Vache  ', 'Fromager_dAffinois.jpg              ', 'molle                  ', 'vin blanc équilibré'),
('Pyrénées-Atlantiques  ', 'Gabriel Coulet                  ', 'http://fr.wikipedia.org/wiki/Gabriel_Coulet_%28marque%29                           ', 'Brebis ', 'Gabriel_Coulet.jpg                  ', 'persilée               ', 'vin blanc moelleux'),
('Seine-Maritime        ', 'Gaperon                         ', 'http://fr.wikipedia.org/wiki/Gaperon                                               ', 'Vache  ', 'Gaperon.jpg                         ', 'molle croute fleurie   ', 'vin rouge léger'),
('Haute-Loire           ', 'Gaztanbera                      ', 'http://fr.wikipedia.org/wiki/Gaztanbera                                            ', 'Brebis ', 'Gaztanbera.jpg                      ', 'fraiche                ', 'vin blanc sec'),
('Drôme                 ', 'Gourmelin                       ', 'http://fr.wikipedia.org/wiki/Gourmelin_%28fromage%29                               ', 'Vache  ', 'Gourmelin.JPG                       ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Nord                  ', 'Grand tomachon                  ', 'http://fr.wikipedia.org/wiki/Grand_tomachon                                        ', 'Vache  ', 'Grand_Tomachon.jpg                  ', 'pressée non cuite      ', 'vin rouge charnu'),
('Cantal                ', 'Grataron du Beaufortain         ', 'http://fr.wikipedia.org/wiki/Grataron_du_Beaufortain                               ', 'Chèvre ', 'Grataron_du_Beaufortain.jpg         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Nord                  ', 'Gratte-Paille                   ', 'http://fr.wikipedia.org/wiki/Gratte-Paille                                         ', 'Vache  ', 'GrattePaille.jpg                    ', 'molle croute fleurie   ', 'vin rouge léger'),
('Nord                  ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Loire                 ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Puy-de-Dôme           ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Loiret                ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Sarthe                ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Aude                  ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Seine-et-Marne        ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Drôme                 ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Isère                 ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Pyrénées-Atlantiques  ', 'Gruyère français                ', 'http://fr.wikipedia.org/wiki/Gruy%C3%A8re_fran%C3%A7ais                            ', 'Vache  ', 'Gruyere_Francais.jpg                ', 'pressée cuite          ', 'vin blanc gras'),
('Calvados              ', 'Jonchée                         ', 'http://fr.wikipedia.org/wiki/Jonch%C3%A9e_%28fromage%29                            ', 'Vache  ', 'Jonchee.jpg                         ', 'fraiche                ', 'vin blanc sec'),
('Corrèze               ', 'Kaïkou                          ', 'http://fr.wikipedia.org/wiki/Ka%C3%AFkou                                           ', 'Brebis ', 'Kaikou.jpg                          ', 'pressée cuite          ', 'vin blanc gras'),
('Côte-d\'Or             ', 'Kiri                            ', 'http://fr.wikipedia.org/wiki/Kiri_%28marque%29                                     ', 'Vache  ', 'Kiri.jpg                            ', 'fondue                 ', 'vin blanc vif'),
('Aisne                 ', 'L\'Ami du Chambertin             ', 'http://fr.wikipedia.org/wiki/L%27Ami_du_Chambertin                                 ', 'Vache  ', 'lAmi_du_Chambertin.jpg              ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Ardèche               ', 'La Fournaise                    ', 'http://fr.wikipedia.org/wiki/La_Fournaise_%28fromage%29                            ', 'Vache  ', 'la_Fournaise.jpg                    ', 'préssée non cuite      ', 'vin rouge charnu'),
('Nord                  ', 'La Petite Raclette              ', 'http://fr.wikipedia.org/wiki/La_Petite_Raclette                                    ', 'Vache  ', 'la_Petite_Raclette.jpg              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Hautes-Alpes          ', 'La Pierre Dorée                 ', 'http://fr.wikipedia.org/wiki/La_Pierre_Dor%C3%A9e                                  ', 'Chèvre ', 'la_Pierre_Doree.jpg                 ', 'molle croute fleurie   ', 'vin rouge léger'),
('Lozère                ', 'La Vache qui rit                ', 'http://fr.wikipedia.org/wiki/La_Vache_qui_rit                                      ', 'Vache  ', 'la_Vache_qui_Rit.jpg                ', 'fondue                 ', 'vin blanc vif'),
('Pas-de-Calais         ', 'Laguiole                        ', 'http://fr.wikipedia.org/wiki/Laguiole_%28fromage%29                                ', 'Vache  ', 'Laguiole.jpg                        ', 'préssée non cuite      ', 'vin rouge charnu'),
('Ain                   ', 'Laguiole                        ', 'http://fr.wikipedia.org/wiki/Laguiole_%28fromage%29                                ', 'Vache  ', 'Laguiole.jpg                        ', 'préssée non cuite      ', 'vin rouge charnu'),
('Haute-Marne           ', 'Langres                         ', 'http://fr.wikipedia.org/wiki/Langres_%28fromage%29                                 ', 'Vache  ', 'Laguiole.jpg                        ', 'préssée non cuite      ', 'vin rouge charnu'),
('Moselle               ', 'Larron d\'Ors                    ', 'http://fr.wikipedia.org/wiki/Larron_d%27Ors                                        ', 'Vache  ', 'Larron_dOrs.jpg                     ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Savoie                ', 'Le Bleu des Basques             ', 'http://fr.wikipedia.org/wiki/Le_Bleu_des_Basques                                   ', 'Brebis ', 'le_Bleu_des_Basques.png             ', 'persilée               ', 'vin blanc moelleux'),
('Hautes-Pyrénées       ', 'Le Brebiou                      ', 'http://fr.wikipedia.org/wiki/Le_Brebiou                                            ', 'Brebis ', 'le_Brebiou.jpg                      ', 'molle croute naturelle ', 'vin rouge léger'),
('Lozère                ', 'Le Coucouron                    ', 'http://fr.wikipedia.org/wiki/Le_Coucouron                                          ', 'Vache  ', 'Le_Coucouron.jpg                    ', 'persilée               ', 'vin blanc moelleux'),
('Savoie                ', 'Le Curé Nantais                 ', 'http://fr.wikipedia.org/wiki/Le_Cur%C3%A9_Nantais                                  ', 'Vache  ', 'le_Cure_Nantais.JPG                 ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Haute-Loire           ', 'Le Délice du Chalet             ', 'http://fr.wikipedia.org/wiki/Le_D%C3%A9lice_du_Chalet                              ', 'Vache  ', 'le_Delice_du_Chalet.jpg             ', 'préssée non cuite      ', 'vin rouge charnu'),
('Cantal                ', 'Le Fédou                        ', 'http://fr.wikipedia.org/wiki/Le_F%C3%A9dou                                         ', 'Brebis ', 'le_Fedou.jpg                        ', 'molle croute fleurie   ', 'vin rouge léger'),
('Haute-Corse           ', 'Le Graval                       ', 'http://fr.wikipedia.org/wiki/Le_Graval                                             ', 'Vache  ', 'le_Graval.jpg                       ', 'molle croute naturelle ', 'vin rouge léger'),
('Loire-Atlantique      ', 'Le Lavort                       ', 'http://fr.wikipedia.org/wiki/Le_Lavort                                             ', 'Brebis ', 'le_Lavort.jpg                       ', 'préssée non cuite      ', 'vin rouge charnu'),
('Loiret                ', 'Le Moulis                       ', 'http://fr.wikipedia.org/wiki/Le_Moulis                                             ', 'Brebis ', 'le_Moulis.jpg                       ', 'préssée non cuite      ', 'vin rouge charnu'),
('Lot                   ', 'Le Pavé du Plessis              ', 'http://fr.wikipedia.org/wiki/Le_Pav%C3%A9_du_Plessis                               ', 'Vache  ', 'le_Pave_du_Plessis.jpg              ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Réunion               ', 'Le Petit Trôo                   ', 'https://everybodywiki.com/Le_Petit_Tr%C3%B4o                                       ', 'Vache  ', 'le_Petit_Troo.jpeg                  ', 'molle                  ', 'vin blanc équilibré'),
('Savoie                ', 'Le Rogallais                    ', 'http://fr.wikipedia.org/wiki/Le_Rogallais                                          ', 'Vache  ', 'le_Rogallais.jpg                    ', 'préssée non cuite      ', 'vin rouge charnu'),
('Lozère                ', 'Le Rouchi à l\'échalote          ', 'https://www.fermedupontdesloups.fr/le-rouchi-a-lechalote/                          ', 'Vache  ', 'le_Rouchi_a_lEchalote.png           ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Pyrénées-Atlantiques  ', 'Le Rustique                     ', 'http://fr.wikipedia.org/wiki/Le_Rustique                                           ', 'Vache  ', 'le_Rustique.jpg                     ', 'molle croute fleurie   ', 'vin rouge léger'),
('Indre                 ', 'Le Sire de Créquy               ', 'http://fr.wikipedia.org/wiki/Le_Sire_de_Cr%C3%A9quy                                ', 'Vache  ', 'le_Sire_de_Crequy.jpg               ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Yonne                 ', 'Le Trou du Cru                  ', 'http://fr.wikipedia.org/wiki/Le_Trou_du_Cru                                        ', 'Vache  ', 'le_Trou_du_Cru.jpg                  ', 'molle croûte lavée     ', 'vin blanc moelleux'),
('Ariège                ', 'Lévéjac                         ', 'http://fr.wikipedia.org/wiki/L%C3%A9v%C3%A9jac_%28marque%29                        ', 'Brebis ', 'Levejac.jpg                         ', 'molle croute fleurie   ', 'vin rouge léger'),
('Aveyron               ', 'Lou Pérac                       ', 'http://fr.wikipedia.org/wiki/Lou_P%C3%A9rac                                        ', 'Brebis ', 'Lou_Perac.jpg                       ', 'molle croute fleurie   ', 'vin rouge léger'),
('Ariège                ', 'Mâconnais                       ', 'http://fr.wikipedia.org/wiki/M%C3%A2connais_%28fromage%29                          ', 'Chèvre ', 'Maconnais.jpg                       ', 'molle croute fleurie   ', 'vin rouge léger'),
('Eure-et-Loir          ', 'Mâconnais                       ', 'http://fr.wikipedia.org/wiki/M%C3%A2connais_%28fromage%29                          ', 'Chèvre ', 'Maconnais.jpg                       ', 'molle croute fleurie   ', 'vin rouge léger'),
('Loiret                ', 'Mimolette                       ', 'http://fr.wikipedia.org/wiki/Mimolette                                             ', 'Vache  ', 'Mimolette.jpg                       ', 'préssée non cuite      ', 'vin rouge charnu'),
('Lozère                ', 'Moelleux du Revard              ', 'http://fr.wikipedia.org/wiki/Moelleux_du_Revard                                    ', 'Vache  ', 'Moelleux_du_Revars.jpg              ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Mayenne               ', 'Mont Bébour                     ', 'http://fr.wikipedia.org/wiki/Mont_B%C3%A9bour                                      ', 'Vache  ', 'Mont_Bebour.jpg                     ', 'molle                  ', 'vin blanc équilibré'),
('Nord                  ', 'Mont des Cats                   ', 'http://fr.wikipedia.org/wiki/Mont_des_Cats_%28marque_de_fromage%29                 ', 'Vache  ', 'Mont_des_Cats.jpg                   ', 'préssée non cuite      ', 'vin rouge charnu'),
('Puy-de-Dôme           ', 'Montbriac                       ', 'http://fr.wikipedia.org/wiki/Montbriac                                             ', 'Vache  ', 'Montbriac.jpg                       ', 'persillée              ', 'vin blanc moelleux'),
('Réunion               ', 'Montrachet                      ', 'http://fr.wikipedia.org/wiki/Montrachet_%28marque%29                               ', 'Chèvre ', 'Montrachet.jpg                      ', 'molle croute naturelle ', 'vin rouge léger'),
('Yonne                 ', 'Montségur                       ', 'http://fr.wikipedia.org/wiki/Monts%C3%A9gur_%28marque%29                           ', 'Vache  ', 'Montsegur.jpeg                      ', 'préssée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Morbier                         ', 'http://fr.wikipedia.org/wiki/Morbier_%28fromage%29                                 ', 'Vache  ', 'Morbier.jpg                         ', 'préssée non cuite      ', 'vin rouge charnu'),
('Doubs                 ', 'Morbier                         ', 'http://fr.wikipedia.org/wiki/Morbier_%28fromage%29                                 ', 'Vache  ', 'Morbier.jpg                         ', 'préssée non cuite      ', 'vin rouge charnu'),
('Pyrénées-Atlantiques  ', 'Morbier                         ', 'http://fr.wikipedia.org/wiki/Morbier_%28fromage%29                                 ', 'Vache  ', 'Morbier.jpg                         ', 'préssée non cuite      ', 'vin rouge charnu'),
('Cantal                ', 'Morbier                         ', 'http://fr.wikipedia.org/wiki/Morbier_%28fromage%29                                 ', 'Vache  ', 'Morbier.jpg                         ', 'préssée non cuite      ', 'vin rouge charnu'),
('Côte-d\'Or             ', 'Mottin charentais               ', 'http://fr.wikipedia.org/wiki/Mottin_charentais                                     ', 'Vache  ', 'Mottin_Charentais.jpg               ', 'molle croute fleurie   ', 'vin rouge léger'),
('Loiret                ', 'Moulin de Gaye                  ', 'http://fr.wikipedia.org/wiki/Moulin_de_Gaye                                        ', 'Vache  ', 'Moulin_de_Gaye.jpg                  ', 'molle croute fleurie   ', 'vin rouge léger'),
('Lozère                ', 'Munster                         ', 'http://fr.wikipedia.org/wiki/Munster_%28fromage%29                                 ', 'Vache  ', 'Munster.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Réunion               ', 'Munster                         ', 'http://fr.wikipedia.org/wiki/Munster_%28fromage%29                                 ', 'Vache  ', 'Munster.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Charente              ', 'Munster                         ', 'http://fr.wikipedia.org/wiki/Munster_%28fromage%29                                 ', 'Vache  ', 'Munster.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Aube                  ', 'Munster                         ', 'http://fr.wikipedia.org/wiki/Munster_%28fromage%29                                 ', 'Vache  ', 'Munster.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux');
INSERT INTO `fromage` (`departementFabrication`, `nom`, `urlWikipedia`, `lait`, `image`, `typePate`, `vin`) VALUES
('Hautes-Alpes          ', 'Munster                         ', 'http://fr.wikipedia.org/wiki/Munster_%28fromage%29                                 ', 'Vache  ', 'Munster.jpg                         ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Nord                  ', 'Neufchâtel                      ', 'http://fr.wikipedia.org/wiki/Neufch%C3%A2tel_%28fromage%29                         ', 'Vache  ', 'Neufchatel.jpg                      ', 'molle croute fleurie   ', 'vin rouge léger'),
('Pas-de-Calais         ', 'Neufchâtel                      ', 'http://fr.wikipedia.org/wiki/Neufch%C3%A2tel_%28fromage%29                         ', 'Vache  ', 'Neufchatel.jpg                      ', 'molle croute fleurie   ', 'vin rouge léger'),
('Réunion               ', 'Notre Dame de la Paix           ', 'http://fr.wikipedia.org/wiki/Notre_Dame_de_la_Paix                                 ', 'Vache  ', 'Notre_Dame_de_la_Paix.jpg           ', 'molle                  ', 'vin blanc équilibré'),
('Hautes-Pyrénées       ', 'Olivet                          ', 'http://fr.wikipedia.org/wiki/Olivet_%28fromage%29                                  ', 'Vache  ', 'Olivet.jpg                          ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Cher                  ', 'Ossau-iraty                     ', 'http://fr.wikipedia.org/wiki/Ossau-iraty                                           ', 'Brebis ', 'Ossau_Iraty.jpg                     ', 'préssée non cuite      ', 'vin rouge charnu'),
('Haut-Rhin             ', 'Ossau-iraty                     ', 'http://fr.wikipedia.org/wiki/Ossau-iraty                                           ', 'Brebis ', 'Ossau_Iraty.jpg                     ', 'préssée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Ovalie                          ', 'http://fr.wikipedia.org/wiki/Ovalie_%28marque%29                                   ', 'Brebis ', 'Ovalie.jpg                          ', 'molle croute naturelle ', 'vin rouge léger'),
('Loir-et-Cher          ', 'P\'tit Basque                    ', 'http://fr.wikipedia.org/wiki/P%27tit_Basque                                        ', 'Brebis ', 'Ptit_Basque.jpg                     ', 'préssée non cuite      ', 'vin rouge charnu'),
('Aube                  ', 'Pannes cendré                   ', 'http://fr.wikipedia.org/wiki/Pannes_cendr%C3%A9                                    ', 'Vache  ', 'Pannes_Cendre.jpg                   ', 'molle croute naturelle ', 'vin rouge léger'),
('Ardennes              ', 'Patay                           ', 'http://fr.wikipedia.org/wiki/Patay_%28fromage%29                                   ', 'Vache  ', 'Patay.jpg                           ', 'molle                  ', 'vin blanc équilibré'),
('Aveyron               ', 'Pavé aux Algues de Samer        ', 'http://fr.wikipedia.org/wiki/Pav%C3%A9_aux_Algues_de_Samer                         ', 'Vache  ', 'Pave_aux_Algues_de_Samer.jpg        ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Moselle               ', 'Pavé corrézien                  ', 'http://fr.wikipedia.org/wiki/Pav%C3%A9_corr%C3%A9zien                              ', 'Vache  ', 'Pave_Correzien.jpg                  ', 'préssée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Pavé d\'Auge                     ', 'http://fr.wikipedia.org/wiki/Pav%C3%A9_d%27Auge                                    ', 'Vache  ', 'Pave_dAuge.jpg                      ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Aisne                 ', 'Pavé d\'Auge                     ', 'http://fr.wikipedia.org/wiki/Pav%C3%A9_d%27Auge                                    ', 'Vache  ', 'Pave_dAuge.jpg                      ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Gard                  ', 'Pavé d\'Auge                     ', 'http://fr.wikipedia.org/wiki/Pav%C3%A9_d%27Auge                                    ', 'Vache  ', 'Pave_dAuge.jpg                      ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Hautes-Alpes          ', 'Pélardon                        ', 'http://fr.wikipedia.org/wiki/P%C3%A9lardon                                         ', 'Chèvre ', 'Pelardon.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Pyrénées-Atlantiques  ', 'Pélardon                        ', 'http://fr.wikipedia.org/wiki/P%C3%A9lardon                                         ', 'Chèvre ', 'Pelardon.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Réunion               ', 'Pélardon                        ', 'http://fr.wikipedia.org/wiki/P%C3%A9lardon                                         ', 'Chèvre ', 'Pelardon.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Savoie                ', 'Pélardon                        ', 'http://fr.wikipedia.org/wiki/P%C3%A9lardon                                         ', 'Chèvre ', 'Pelardon.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Vienne                ', 'Pélardon                        ', 'http://fr.wikipedia.org/wiki/P%C3%A9lardon                                         ', 'Chèvre ', 'Pelardon.jpg                        ', 'molle croute naturelle ', 'vin rouge léger'),
('Yonne                 ', 'Pérail                          ', 'http://fr.wikipedia.org/wiki/P%C3%A9rail                                           ', 'Brebis ', 'Perail.jpg                          ', 'molle croute fleurie   ', 'vin rouge léger'),
('Côte-d\'Or             ', 'Pérassu                         ', 'http://fr.wikipedia.org/wiki/P%C3%A9rassu                                          ', 'Vache  ', 'Perassu.jpg                         ', 'persillée              ', 'vin blanc moelleux'),
('Indre-et-Loire        ', 'Persillé de Tignes              ', 'http://fr.wikipedia.org/wiki/Persill%C3%A9_de_Tignes                               ', 'Chèvre ', 'Persille_de_Tignes.JPG              ', 'persillée              ', 'vin blanc moelleux'),
('Gard                  ', 'Persillé des Aravis             ', 'http://fr.wikipedia.org/wiki/Persill%C3%A9_des_Aravis                              ', 'Chèvre ', 'Persille_des_Aravis.jpg             ', 'persillée              ', 'vin blanc moelleux'),
('Haute-Garonne         ', 'Persillé du col Bayard          ', 'http://fr.wikipedia.org/wiki/Persill%C3%A9_du_col_Bayard                           ', 'Vache  ', 'Persille_du_Col_Bayard.jpg          ', 'persillée              ', 'vin blanc moelleux'),
('Ain                   ', 'Persillé du Malzieu             ', 'http://fr.wikipedia.org/wiki/Persill%C3%A9_du_Malzieu                              ', 'Brebis ', 'Persille_du_Malzieu.jpg             ', 'persillée              ', 'vin blanc moelleux'),
('Aveyron               ', 'Persillé du Mont-Cenis          ', 'http://fr.wikipedia.org/wiki/Persill%C3%A9_du_Mont-Cenis                           ', 'Chèvre ', 'Persille_du_Mont_Cenis.JPG          ', 'persillée              ', 'vin blanc moelleux'),
('Cantal                ', 'Pétafine                        ', 'http://fr.wikipedia.org/wiki/P%C3%A9tafine                                         ', 'Chèvre ', 'Petafine.jpg                        ', 'fondue                 ', 'vin blanc vif'),
('Puy-de-Dôme           ', 'Petit Billy                     ', 'http://fr.wikipedia.org/wiki/Petit_Billy                                           ', 'Chèvre ', 'Petit_Billy.JPG                     ', 'fondue                 ', 'vin blanc vif'),
('Haute-Marne           ', 'Petit Gaugry                    ', 'http://fr.wikipedia.org/wiki/Petit_Gaugry                                          ', 'Vache  ', 'Petit_Gaugry.jpg                    ', 'fraiche                ', 'vin blanc sec'),
('Loire                 ', 'Petit moka                      ', 'http://fr.wikipedia.org/wiki/Petit_moka                                            ', 'Vache  ', 'Petit_Moka.png                      ', 'préssée                ', 'vin blanc sec'),
('Ille-et-Vilaine       ', 'Pic du Vieux Chaillol           ', 'http://fr.wikipedia.org/wiki/Pic_du_Vieux_Chaillol_%28fromage%29                   ', 'Vache  ', 'Pic_du_Vieux_Chaillol.jpg           ', 'molle croute fleurie   ', 'vin rouge léger'),
('Morbihan              ', 'Picodon                         ', 'http://fr.wikipedia.org/wiki/Picodon                                               ', 'Chèvre ', 'Picodon.jpg                         ', 'molle croute naturelle ', 'vin rouge léger'),
('Côte-d\'Or             ', 'Picodon                         ', 'http://fr.wikipedia.org/wiki/Picodon                                               ', 'Chèvre ', 'Picodon.jpg                         ', 'molle croute naturelle ', 'vin rouge léger'),
('Moselle               ', 'Picodon                         ', 'http://fr.wikipedia.org/wiki/Picodon                                               ', 'Chèvre ', 'Picodon.jpg                         ', 'molle croute naturelle ', 'vin rouge léger'),
('Pyrénées-Atlantiques  ', 'Picodon                         ', 'http://fr.wikipedia.org/wiki/Picodon                                               ', 'Chèvre ', 'Picodon.jpg                         ', 'molle croute naturelle ', 'vin rouge léger'),
('Savoie                ', 'Pithiviers au foin              ', 'http://fr.wikipedia.org/wiki/Pithiviers_au_foin                                    ', 'Vache  ', 'Pithiviers_au_Foin.jpg              ', 'molle croute fleurie   ', 'vin rouge léger'),
('Yonne                 ', 'Piton des Neiges                ', 'http://fr.wikipedia.org/wiki/Piton_des_Neiges_%28fromage%29                        ', 'Vache  ', 'Piton_des_Neiges.jpg                ', 'préssée                ', 'vin blanc sec'),
('Ardèche               ', 'Piton Maïdo                     ', 'http://fr.wikipedia.org/wiki/Piton_Ma%C3%AFdo_%28fromage%29                        ', 'Vache  ', 'Piton_Maido.JPG                     ', 'préssée                ', 'vin blanc sec'),
('Ain                   ', 'Pont-l\'évêque                   ', 'http://fr.wikipedia.org/wiki/Pont-l%27%C3%A9v%C3%AAque_%28fromage%29               ', 'Vache  ', 'Pont_lEveque.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Allier                ', 'Pont-l\'évêque                   ', 'http://fr.wikipedia.org/wiki/Pont-l%27%C3%A9v%C3%AAque_%28fromage%29               ', 'Vache  ', 'Pont_lEveque.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Cantal                ', 'Pont-l\'évêque                   ', 'http://fr.wikipedia.org/wiki/Pont-l%27%C3%A9v%C3%AAque_%28fromage%29               ', 'Vache  ', 'Pont_lEveque.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Hautes-Pyrénées       ', 'Pont-l\'évêque                   ', 'http://fr.wikipedia.org/wiki/Pont-l%27%C3%A9v%C3%AAque_%28fromage%29               ', 'Vache  ', 'Pont_lEveque.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Haute-Loire           ', 'Pont-l\'évêque                   ', 'http://fr.wikipedia.org/wiki/Pont-l%27%C3%A9v%C3%AAque_%28fromage%29               ', 'Vache  ', 'Pont_lEveque.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Indre                 ', 'Pont-l\'évêque                   ', 'http://fr.wikipedia.org/wiki/Pont-l%27%C3%A9v%C3%AAque_%28fromage%29               ', 'Vache  ', 'Pont_lEveque.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Loiret                ', 'Port-Salut                      ', 'http://fr.wikipedia.org/wiki/Port-Salut_%28marque%29                               ', 'Vache  ', 'Port_Salut.jpg                      ', 'préssée non cuite      ', 'vin rouge charnu'),
('Pyrénées-Atlantiques  ', 'Pouligny-saint-pierre           ', 'http://fr.wikipedia.org/wiki/Pouligny-saint-pierre_%28fromage%29                   ', 'Chèvre ', 'Pouligny_Saint_Pierre.jpg           ', 'molle croute naturelle ', 'vin rouge léger'),
('Rhône                 ', 'Pourri bressan                  ', 'http://fr.wikipedia.org/wiki/Pourri_bressan                                        ', 'Vache  ', 'Pourri_Bressan.JPG                  ', 'fondue                 ', 'vin blanc vif'),
('Savoie                ', 'Raclette                        ', 'http://fr.wikipedia.org/wiki/Raclette                                              ', 'Vache  ', 'Raclette.jpg                        ', 'préssée non cuite      ', 'vin rouge charnu'),
('Yonne                 ', 'Ramequin                        ', 'http://fr.wikipedia.org/wiki/Ramequin_%28fromage%29                                ', 'Vache  ', 'Ramequin.jpg                        ', 'préssée non cuite      ', 'vin rouge charnu'),
('Aveyron               ', 'Rebarbe                         ', 'http://fr.wikipedia.org/wiki/Rebarbe                                               ', 'Brebis ', 'Rebarbe.jpg                         ', 'fondue                 ', 'vin blanc vif'),
('Somme                 ', 'Rebarbe                         ', 'http://fr.wikipedia.org/wiki/Rebarbe                                               ', 'Brebis ', 'Rebarbe.jpg                         ', 'fondue                 ', 'vin blanc vif'),
('Lozère                ', 'Reblochon                       ', 'http://fr.wikipedia.org/wiki/Reblochon                                             ', 'Vache  ', 'Reblochon.jpg                       ', 'préssée non cuite      ', 'vin rouge charnu'),
('Indre-et-Loire        ', 'Recuite                         ', 'http://fr.wikipedia.org/wiki/Recuite                                               ', 'Brebis ', 'Recuite.jpg                         ', 'fraiche                ', 'vin blanc sec'),
('Marne                 ', 'Rigotte de Condrieu             ', 'http://fr.wikipedia.org/wiki/Rigotte_de_Condrieu                                   ', 'Chèvre ', 'Rigotte_de_Condrieu.jpg             ', 'molle croute fleurie   ', 'vin rouge léger'),
('Rhône                 ', 'Rigotte de Condrieu             ', 'http://fr.wikipedia.org/wiki/Rigotte_de_Condrieu                                   ', 'Chèvre ', 'Rigotte_de_Condrieu.jpg             ', 'molle croute fleurie   ', 'vin rouge léger'),
('Lot                   ', 'Rigotte de Pélussin             ', 'http://fr.wikipedia.org/wiki/Rigotte_de_P%C3%A9lussin                              ', 'Chèvre ', 'Rigottes_de_Pelussin.JPG            ', 'molle croute naturelle ', 'vin rouge léger'),
('Mayenne               ', 'Rocamadour                      ', 'http://fr.wikipedia.org/wiki/Rocamadour_%28fromage%29                              ', 'Chèvre ', 'Rocamadour.jpg                      ', 'molle croute fleurie   ', 'vin rouge léger'),
('Ain                   ', 'Rochebaron                      ', 'http://fr.wikipedia.org/wiki/Rochebaron                                            ', 'Vache  ', 'Rochebaron.JPG                      ', 'persillée              ', 'vin blanc moelleux'),
('Nord                  ', 'Rocroi                          ', 'http://fr.wikipedia.org/wiki/Rocroi_%28fromage%29                                  ', 'Vache  ', 'Rocroi.jpeg                         ', 'molle croute naturelle ', 'vin rouge léger'),
('Allier                ', 'Rogeret des Cévennes            ', 'http://fr.wikipedia.org/wiki/Rogeret_des_C%C3%A9vennes                             ', 'Chèvre ', 'Rogeret_des_Cevennes.png            ', 'molle croute naturelle ', 'vin rouge léger'),
('Ardèche               ', 'Rollot                          ', 'http://fr.wikipedia.org/wiki/Rollot_%28fromage%29                                  ', 'Vache  ', 'Rollot.jpg                          ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Ariège                ', 'Rollot                          ', 'http://fr.wikipedia.org/wiki/Rollot_%28fromage%29                                  ', 'Vache  ', 'Rollot.jpg                          ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Haute-Loire           ', 'Rollot                          ', 'http://fr.wikipedia.org/wiki/Rollot_%28fromage%29                                  ', 'Vache  ', 'Rollot.jpg                          ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Haute-Loire           ', 'Roquefort                       ', 'http://fr.wikipedia.org/wiki/Roquefort_%28fromage%29                               ', 'Brebis ', 'Roquefort.jpg                       ', 'persillée              ', 'vin blanc moelleux'),
('Jura                  ', 'Roue de Ris                     ', 'http://fr.wikipedia.org/wiki/Roue_de_Ris                                           ', 'Brebis ', 'Roue_de_Ris.jpeg                    ', 'persillée              ', 'vin blanc moelleux'),
('Loire                 ', 'Saint Agur                      ', 'http://fr.wikipedia.org/wiki/Saint_Agur                                            ', 'Vache  ', 'Saint_Agur.jpg                      ', 'persillée              ', 'vin blanc moelleux'),
('Savoie                ', 'Saint Albray                    ', 'http://fr.wikipedia.org/wiki/Saint_Albray                                          ', 'Vache  ', 'Saint_Albray.jpg                    ', 'molle                  ', 'vin blanc équilibré'),
('Seine-et-Marne        ', 'Saint-félicien                  ', 'http://fr.wikipedia.org/wiki/Saint-f%C3%A9licien_%28fromage_de_l%27Ard%C3%A8che%29 ', 'Vache  ', 'Saint_Felicien.jpg                  ', 'molle croute fleurie   ', 'vin rouge léger'),
('Yonne                 ', 'Saint-florentin                 ', 'http://fr.wikipedia.org/wiki/Saint-florentin_%28fromage%29                         ', 'Vache  ', 'Saint_Florentin.jpg                 ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Charente              ', 'Saint-gildas-des-bois           ', 'http://fr.wikipedia.org/wiki/Saint-gildas-des-bois_%28fromage%29                   ', 'Vache  ', 'Saint_Gildas_des_Bois.png           ', 'molle croute fleurie   ', 'vin rouge léger'),
('Aube                  ', 'Saint-laurent                   ', 'http://fr.wikipedia.org/wiki/Saint-laurent_%28fromage%29                           ', 'Vache  ', 'Saint_Laurent.jpg                   ', 'molle croute fleurie   ', 'vin rouge léger'),
('Pas-de-Calais         ', 'Saint-nectaire                  ', 'http://fr.wikipedia.org/wiki/Saint-nectaire_%28fromage%29                          ', 'Vache  ', 'Saint_Nectaire.jpg                  ', 'préssée non cuite      ', 'vin rouge charnu'),
('Ain                   ', 'Saint-nectaire                  ', 'http://fr.wikipedia.org/wiki/Saint-nectaire_%28fromage%29                          ', 'Vache  ', 'Saint_Nectaire.jpg                  ', 'préssée non cuite      ', 'vin rouge charnu'),
('Mayenne               ', 'Sainte-Maure de Touraine        ', 'http://fr.wikipedia.org/wiki/Sainte-Maure_de_Touraine_%28fromage%29                ', 'Chèvre ', 'Sainte_Maure_de_Touraine.jpg        ', 'molle croute naturelle ', 'vin rouge léger'),
('Isère                 ', 'Sainte-Maure de Touraine        ', 'http://fr.wikipedia.org/wiki/Sainte-Maure_de_Touraine_%28fromage%29                ', 'Chèvre ', 'Sainte_Maure_de_Touraine.jpg        ', 'molle croute naturelle ', 'vin rouge léger'),
('Aveyron               ', 'Sainte-Maure de Touraine        ', 'http://fr.wikipedia.org/wiki/Sainte-Maure_de_Touraine_%28fromage%29                ', 'Chèvre ', 'Sainte_Maure_de_Touraine.jpg        ', 'molle croute naturelle ', 'vin rouge léger'),
('Ariège                ', 'Salers                          ', 'http://fr.wikipedia.org/wiki/Salers_%28fromage%29                                  ', 'Vache  ', 'Salers.jpg                          ', 'préssée non cuite      ', 'vin rouge charnu'),
('Corrèze               ', 'Santranges-sancerre             ', 'http://fr.wikipedia.org/wiki/Santranges-sancerre                                   ', 'Chèvre ', 'Santranges_Sancerre.jpg             ', 'molle croute naturelle ', 'vin rouge léger'),
('Loir-et-Cher          ', 'Selles-sur-cher                 ', 'http://fr.wikipedia.org/wiki/Selles-sur-cher_%28fromage%29                         ', 'Chèvre ', 'Selles_sur_Cher.jpg                 ', 'molle croute naturelle ', 'vin rouge léger'),
('Loire                 ', 'Société                         ', 'http://fr.wikipedia.org/wiki/Soci%C3%A9t%C3%A9_%28marque%29                        ', 'Brebis ', 'Societe.jpg                         ', 'persillée              ', 'vin blanc moelleux'),
('Marne                 ', 'Soumaintrain                    ', 'http://fr.wikipedia.org/wiki/Soumaintrain_%28fromage%29                            ', 'Vache  ', 'Soumaintrain.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Puy-de-Dôme           ', 'Soumaintrain                    ', 'http://fr.wikipedia.org/wiki/Soumaintrain_%28fromage%29                            ', 'Vache  ', 'Soumaintrain.jpg                    ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Pyrénées-Atlantiques  ', 'St Môret                        ', 'http://fr.wikipedia.org/wiki/St_M%C3%B4ret                                         ', 'Vache  ', 'St_Moret.jpeg                       ', 'fraiche                ', 'vin blanc sec'),
('Rhône                 ', 'Suprême des Ducs                ', 'http://fr.wikipedia.org/wiki/Supr%C3%AAme_des_Ducs                                 ', 'Vache  ', 'Supreme_des_Ducs.jpg                ', 'molle croute fleurie   ', 'vin rouge léger'),
('Vaucluse              ', 'T\'chiot biloute                 ', 'http://fr.wikipedia.org/wiki/T%27chiot_biloute                                     ', 'Vache  ', 'Tchiot_Biloute.jpg                  ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Jura                  ', 'Takamaka                        ', 'http://fr.wikipedia.org/wiki/Takamaka_%28fromage%29                                ', 'Chèvre ', 'Takamaka.jpg                        ', 'fraiche                ', 'vin blanc sec'),
('Savoie                ', 'Tarare                          ', 'http://fr.wikipedia.org/wiki/Tarare_%28fromage%29                                  ', 'Vache  ', 'Tarare.jpg                          ', 'molle croute fleurie   ', 'vin rouge léger'),
('Indre                 ', 'Taupinette                      ', 'http://fr.wikipedia.org/wiki/Taupinette                                            ', 'Chèvre ', 'Taupinette.jpg                      ', 'molle croute fleurie   ', 'vin rouge léger'),
('Nord                  ', 'Thollon                         ', 'http://fr.wikipedia.org/wiki/Thollon                                               ', 'Vache  ', 'Thollon.jpg                         ', 'persilée               ', 'vin blanc moelleux'),
('Nord                  ', 'Ti frais des Hauts              ', 'http://fr.wikipedia.org/wiki/Ti_frais_des_Hauts                                    ', 'Vache  ', 'Ti_Frais_des_Hauts.jpg              ', 'persilée               ', 'vin blanc moelleux'),
('Pyrénées-Atlantiques  ', 'Tignard                         ', 'http://fr.wikipedia.org/wiki/Tignard                                               ', 'Vache  ', 'Tignard.JPG                         ', 'persilée               ', 'vin blanc moelleux'),
('Savoie                ', 'Tome de Cambrai                 ', 'http://fr.wikipedia.org/wiki/Tome_de_Cambrai                                       ', 'Vache  ', 'Tome_de_Cambrai.jpg                 ', 'préssée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Tome de Rhuys                   ', 'http://fr.wikipedia.org/wiki/Tome_de_Rhuys                                         ', 'Vache  ', 'Tome_de_Rhuys.jpg                   ', 'préssée non cuite      ', 'vin rouge charnu'),
('Saône-et-Loire        ', 'Tome des Bauges                 ', 'http://fr.wikipedia.org/wiki/Tome_des_Bauges                                       ', 'Vache  ', 'Tome_des_Bauges.jpg                 ', 'préssée non cuite      ', 'vin rouge charnu'),
('Val-de-Marne          ', 'Tome du Champsaur               ', 'http://fr.wikipedia.org/wiki/Tome_du_Champsaur                                     ', 'Vache  ', 'Tome_de_Champsaur.jpg               ', 'molle croute fleurie   ', 'vin rouge léger'),
('Haute-Garonne         ', 'Tome fraîche                    ', 'http://fr.wikipedia.org/wiki/Tome_fra%C3%AEche                                     ', 'Vache  ', 'Tome_Fraiche.jpg                    ', 'fraiche                ', 'vin blanc sec'),
('Lozère                ', 'Tome fraîche                    ', 'http://fr.wikipedia.org/wiki/Tome_fra%C3%AEche                                     ', 'Vache  ', 'Tome_Fraiche.jpg                    ', 'fraiche                ', 'vin blanc sec'),
('Savoie                ', 'Tome fraîche                    ', 'http://fr.wikipedia.org/wiki/Tome_fra%C3%AEche                                     ', 'Vache  ', 'Tome_Fraiche.jpg                    ', 'fraiche                ', 'vin blanc sec'),
('Doubs                 ', 'Tomette de Brebis               ', 'http://fr.wikipedia.org/wiki/Tomette_de_Brebis                                     ', 'Brebis ', 'Tommette_de_Brebis.png              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Jura                  ', 'Tomme au foin                   ', 'http://fr.wikipedia.org/wiki/Tomme_au_foin                                         ', 'Vache  ', 'Tomme_au_Foin.jpg                   ', 'préssée non cuite      ', 'vin rouge charnu'),
('Seine-et-Marne        ', 'Tomme blanche                   ', 'http://fr.wikipedia.org/wiki/Tomme_blanche                                         ', 'Vache  ', 'Tomme_Blanche.jpg                   ', 'molle                  ', 'vin blanc équilibré'),
('Orne                  ', 'Tomme crayeuse                  ', 'http://fr.wikipedia.org/wiki/Tomme_crayeuse                                        ', 'Vache  ', 'Tomme_Crayeuse.jpg                  ', 'préssée non cuite      ', 'vin rouge charnu'),
('Pyrénées-Atlantiques  ', 'Tomme de Gorze                  ', 'http://fr.wikipedia.org/wiki/Tomme_de_Gorze                                        ', 'Vache  ', 'Tomme_de_Gorze.jpg                  ', 'préssée                ', 'vin blanc sec'),
('Ariège                ', 'Tomme de Montagne               ', 'http://fr.wikipedia.org/wiki/Tomme_de_Montagne                                     ', 'Vache  ', 'Tomme_de_Montagne.png               ', 'préssée non cuite      ', 'vin rouge charnu'),
('Territoire de Belfort ', 'Tomme de Savoie                 ', 'http://fr.wikipedia.org/wiki/Tomme_de_Savoie                                       ', 'Vache  ', 'Tomme_de_Savoie.jpg                 ', 'préssée non cuite      ', 'vin rouge charnu'),
('Côte-d\'Or             ', 'Tomme des Pyrénées              ', 'http://fr.wikipedia.org/wiki/Tomme_des_Pyr%C3%A9n%C3%A9es                          ', 'Vache  ', 'Tomme_des_Pyrenees.jpg              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Savoie                ', 'Tomme des Pyrénées              ', 'http://fr.wikipedia.org/wiki/Tomme_des_Pyr%C3%A9n%C3%A9es                          ', 'Vache  ', 'Tomme_des_Pyrenees.jpg              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Mayenne               ', 'Tomme des Pyrénées              ', 'http://fr.wikipedia.org/wiki/Tomme_des_Pyr%C3%A9n%C3%A9es                          ', 'Vache  ', 'Tomme_des_Pyrenees.jpg              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Saône-et-Loire        ', 'Tomme des Pyrénées              ', 'http://fr.wikipedia.org/wiki/Tomme_des_Pyr%C3%A9n%C3%A9es                          ', 'Vache  ', 'Tomme_des_Pyrenees.jpg              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Loir-et-Cher          ', 'Tomme des Pyrénées              ', 'http://fr.wikipedia.org/wiki/Tomme_des_Pyr%C3%A9n%C3%A9es                          ', 'Vache  ', 'Tomme_des_Pyrenees.jpg              ', 'préssée non cuite      ', 'vin rouge charnu'),
('Pyrénées-Atlantiques  ', 'Tomme forte de Savoie           ', 'http://fr.wikipedia.org/wiki/Tomme_forte_de_Savoie                                 ', 'Vache  ', 'Tomme_forte_de_Savoie.jpg           ', 'fondue                 ', 'vin blanc vif'),
('Cher                  ', 'Tournon-saint-pierre            ', 'http://fr.wikipedia.org/wiki/Tournon-saint-pierre_%28fromage%29                    ', 'Chèvre ', 'Tournon_Saint_Pierre.jpg            ', 'molle croute naturelle ', 'vin rouge léger'),
('Corrèze               ', 'Tourrée de l\'Aubier             ', 'http://fr.wikipedia.org/wiki/Tourr%C3%A9e_de_l%27Aubier                            ', 'Vache  ', 'Touree_de_lAubier.jpg               ', 'molle croute fleurie   ', 'vin rouge léger'),
('Drôme                 ', 'Tracle                          ', 'http://fr.wikipedia.org/wiki/Tracle                                                ', 'Vache  ', 'Tracle.jpg                          ', 'fondue                 ', 'vin blanc vif'),
('Hautes-Alpes          ', 'Trappe Échourgnac               ', 'http://fr.wikipedia.org/wiki/Trappe_%C3%89chourgnac                                ', 'Vache  ', 'Trappe_Echourgnac.jpg               ', 'préssée non cuite      ', 'vin rouge charnu'),
('Nord                  ', 'Trappiste de Belval             ', 'http://fr.wikipedia.org/wiki/Trappiste_de_Belval                                   ', 'Vache  ', 'Trappiste_de_Belval.jpg             ', 'préssée non cuite      ', 'vin rouge charnu'),
('Pas-de-Calais         ', 'Trappiste de Campénéac          ', 'http://fr.wikipedia.org/wiki/Trappiste_de_Camp%C3%A9n%C3%A9ac                      ', 'Vache  ', 'Trappiste_de_Campeneac.jpg          ', 'préssée non cuite      ', 'vin rouge charnu'),
('Réunion               ', 'Trappiste de Laval              ', 'http://fr.wikipedia.org/wiki/Trappiste_de_Laval                                    ', 'Vache  ', 'Trappiste_de_Laval.jpg              ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Savoie                ', 'Tricorne de Marans              ', 'http://fr.wikipedia.org/wiki/Tricorne_de_Marans                                    ', 'Brebis ', 'Tricorne_de_Marans.jpg              ', 'molle                  ', 'vin blanc équilibré'),
('Oise                  ', 'Truffe de Ventadour             ', 'http://fr.wikipedia.org/wiki/Truffe_de_Ventadour                                   ', 'Chèvre ', 'Truffe_de_Ventadour.jpg             ', 'molle croute naturelle ', 'vin rouge léger'),
('Pyrénées-Atlantiques  ', 'Vacherin des Bauges             ', 'http://fr.wikipedia.org/wiki/Vacherin_des_Bauges                                   ', 'Vache  ', 'Vacherin_des_Bauges.jpg             ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Haute-Marne           ', 'Valençay                        ', 'http://fr.wikipedia.org/wiki/Valen%C3%A7ay_%28fromage%29                           ', 'Chèvre ', 'Valencay.jpg                        ', 'molle croute fleurie   ', 'vin rouge léger'),
('Cantal                ', 'Valençay                        ', 'http://fr.wikipedia.org/wiki/Valen%C3%A7ay_%28fromage%29                           ', 'Chèvre ', 'Valencay.jpg                        ', 'molle croute fleurie   ', 'vin rouge léger'),
('Savoie                ', 'Valençay                        ', 'http://fr.wikipedia.org/wiki/Valen%C3%A7ay_%28fromage%29                           ', 'Chèvre ', 'Valencay.jpg                        ', 'molle croute fleurie   ', 'vin rouge léger'),
('Aveyron               ', 'Valençay                        ', 'http://fr.wikipedia.org/wiki/Valen%C3%A7ay_%28fromage%29                           ', 'Chèvre ', 'Valencay.jpg                        ', 'molle croute fleurie   ', 'vin rouge léger'),
('Rhône                 ', 'Vieux Boulogne                  ', 'http://fr.wikipedia.org/wiki/Vieux_Boulogne                                        ', 'Vaches ', 'Vieux_Boulogne.jpg                  ', 'molle                  ', 'vin blanc équilibré'),
('Indre                 ', 'Vieux pané                      ', 'http://fr.wikipedia.org/wiki/Vieux_pan%C3%A9                                       ', 'Vache  ', 'Vieux_Pane.jpg                      ', 'préssée non cuite      ', 'vin rouge charnu'),
('Ain                   ', 'Vieux Samer                     ', 'http://fr.wikipedia.org/wiki/Vieux_Samer                                           ', 'Vache  ', 'Vieux_Samer.jpg                     ', 'molle croute lavée     ', 'vin blanc moelleux'),
('Aveyron               ', 'Voves cendré                    ', 'http://fr.wikipedia.org/wiki/Voves_cendr%C3%A9                                     ', 'Vache  ', 'Voves_Cendre.jpg                    ', 'molle croute naturelle ', 'vin rouge léger');

-- --------------------------------------------------------

--
-- Structure de la table `itineraire`
--

DROP TABLE IF EXISTS `itineraire`;
CREATE TABLE IF NOT EXISTS `itineraire` (
  `nom` varchar(50) NOT NULL,
  `fromageries` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nom`),
  KEY `fromageries` (`fromageries`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

DROP TABLE IF EXISTS `noter`;
CREATE TABLE IF NOT EXISTS `noter` (
  `nomFromage` varchar(50) NOT NULL,
  `departementFabrication` varchar(60) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `note` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`nomFromage`,`departementFabrication`,`pseudo`),
  KEY `departementFabrication` (`departementFabrication`),
  KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `noter`
--

INSERT INTO `noter` (`nomFromage`, `departementFabrication`, `pseudo`, `note`) VALUES
('Abbaye de CÃ®teaux               ', 'RÃ©union               ', 'alexis.carreau@gmail.com', '5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `eMail` varchar(100) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `motDePasse` varchar(70) NOT NULL,
  `estFromager` tinyint(1) NOT NULL,
  PRIMARY KEY (`eMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`eMail`, `nom`, `prenom`, `motDePasse`, `estFromager`) VALUES
('a@gmail.com', 'CARREAU', 'Alexis', '$2y$10$EltgiZmIC5A/XvysbYDlSeHetd6/e333b7ixP3cyrv3VdHUZ2lYIq', 1),
('alexis.carreau@gmail.com', 'CARREAU', 'Alexis', '$2y$10$9pdo1LWKcSi8Dg86jeZbT.vTSRtRkxkebYatpK0Q.lSsLzr0ONY9y', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendre`
--

DROP TABLE IF EXISTS `vendre`;
CREATE TABLE IF NOT EXISTS `vendre` (
  `mailVendeur` varchar(100) NOT NULL,
  `nomBoutique` varchar(50) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `departement` varchar(50) DEFAULT NULL,
  `fromages` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`mailVendeur`),
  KEY `fromages` (`fromages`,`departement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
