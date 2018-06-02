-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 25 mai 2018 à 21:42
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_promo`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

DROP TABLE IF EXISTS `absences`;
CREATE TABLE IF NOT EXISTS `absences` (
  `loginetu` text NOT NULL,
  `j` int(11) DEFAULT NULL,
  `nj` int(11) DEFAULT NULL,
  `loginprof` text NOT NULL,
  `date` datetime NOT NULL,
  `id_abs` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absences`
--

INSERT INTO `absences` (`loginetu`, `j`, `nj`, `loginprof`, `date`, `id_abs`) VALUES
('123', 0, 1, 'Prof', '2019-03-15 08:14:37', 1),
('123', 1, 0, 'Prof', '2019-04-17 10:14:37', 2);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Matière` text CHARACTER SET utf8 NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_promo` text CHARACTER SET utf8 NOT NULL,
  `salle` text CHARACTER SET utf8 NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qrcode`
-- 

DROP TABLE IF EXISTS `qrcode`;
CREATE TABLE IF NOT EXISTS `qrcode`(
  `horaire` datetime NOT NULL,
  `id_cours` text CHARACTER SET utf8 NOT NULL,
  `qr` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET = latin1;

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Nom` text CHARACTER SET utf8 NOT NULL,
  `Prénom` text CHARACTER SET utf8 NOT NULL,
  `id_promo` text CHARACTER SET utf8 NOT NULL,
  `photo` text NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_bin,
  `MDP` text,
  `Groupe` int(11) NOT NULL,
  `presencetemp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Nom`, `Prénom`, `id_promo`, `photo`, `login`, `MDP`, `Groupe`, `presencetemp`) VALUES
('Briand-Goudet', 'Loetis', 'FI1A', 'loetisb', NULL, NULL, 1, 0),
('Barreau', 'Pierre', 'FI1A', 'pierreb', NULL, NULL, 1, 0),
('Blanchon', 'Erwan', 'FI1A', 'erwanb', NULL, NULL, 1, 0),
('Boucey', 'Paul', 'FI1A', 'paulb', NULL, NULL, 2, 0),
('Boudaud', 'Jules', 'FI1A', 'julesb', NULL, NULL, 1, 0),
('Bouland', 'Thomas', 'FI1A', 'thomasb', NULL, NULL, 2, 0),
('Bret', 'Vladimir', 'FI1A', 'vladimirb', NULL, NULL, 2, 0),
('Briand', 'Dorian', 'FI1A', 'dorianb', NULL, NULL, 2, 0),
('Camera', 'Romain', 'FI1A', 'romainc', NULL, NULL, 1, 0),
('Cassecuel', 'Clément', 'FI1A', 'clementc', NULL, NULL, 2, 0),
('Choquet', 'Nicolas', 'FI1A', 'nicolasc', NULL, NULL, 1, 0),
('Coquette', 'Yann', 'FI1A', 'yannc', NULL, NULL, 1, 0),
('Duchatel', 'Mathis', 'FI1A', 'mathisd', NULL, NULL, 1, 0),
('Keller', 'Maxime', 'FI1A', 'maximek', NULL, NULL, 1, 0),
('Lafont', 'Emeline', 'FI1A', 'emelinel', NULL, NULL, 2, 0),
('Laurain', 'Titouan', 'FI1A', 'titouanl', NULL, NULL, 2, 0),
('Le Coz', 'Samuel', 'FI1A', 'samuell', NULL, NULL, 1, 0),
('Lecrivain', 'Ugo', 'FI1A', 'ugol', NULL, NULL, 2, 0),
('Levielle', 'Cedric', 'FI1A', 'cedricl', NULL, NULL, 2, 0),
('Lisnic', 'Dorian', 'FI1A', 'dorianl', NULL, NULL, 2, 0),
('Maulnier', 'Leopold', 'FI1A', 'leopoldm', NULL, NULL, 1, 0),
('Metayer', 'Coralie', 'FI1A', 'coraliem', NULL, '12345', 1, 0),
('Miché', 'Paul', 'FI1A', 'paulm', NULL, NULL, 1, 0),
('Morvan', 'Alan', 'FI1A', 'alanm', NULL, NULL, 1, 0),
('Mouazan', 'Morgann', 'FI1A', 'morgannm', NULL, NULL, 1, 0),
('Ndao', 'Mouhamed', 'FI1A', 'mouhamedn', NULL, NULL, 1, 0),
('Parola', 'Mario', 'FI1A', 'mariop', NULL, NULL, 1, 0),
('Passelande Porte', 'Baptiste', 'FI1A', 'baptistep', NULL, NULL, 2, 0),
('Polet', 'Allan', 'FI1A', 'allanp', NULL, NULL, 1, 0),
('Raux', 'Kevin', 'FI1A', 'kevinr', NULL, NULL, 1, 0),
('Reintjes', 'Willian', 'FI1A', 'williamr', NULL, NULL, 1, 0),
('Rogard', 'Olivier', 'FI1A', 'olivierr', NULL, NULL, 1, 0),
('Samson', 'Théo', 'FI1A', 'theos', NULL, NULL, 2, 0),
('Talio', 'Romain', 'FI1A', 'romaint', NULL, NULL, 1, 0),
('Termet', 'Mathieu', 'FI1A', 'mathieut', NULL, NULL, 1, 0),
('Trinquart', 'Kilian', 'FI1A', 'kiliant', NULL, NULL, 1, 0),
('Vetele', 'Ewen', 'FI1A', 'ewenv', NULL, NULL, 2, 0),
('test', 'test', 'FI1A', 'test', '123', '123', 1, 0),
('Macé', 'Louise', 'FA1A', 'louisem', NULL, NULL, 2, 0),
('Martyn', 'Marie', 'FA1A', 'mariem', NULL, NULL, 1, 0),
('Chaffotec', 'Adrien', 'FA1A', 'adrienc', NULL, NULL, 1, 0),
('Conqueur', 'Nina', 'FA1A', 'ninac', NULL, NULL, 1, 0),
('Debray', 'Rémi', 'FA1A', 'remid', NULL, NULL, 1, 0),
('Fabre', 'Maël', 'FA1A', 'maelf', NULL, NULL, 1, 0),
('Georget', 'Florian', 'FA1A', 'floriang', NULL, NULL, 1, 0),
('Goupil', 'Romain', 'FA1A', 'romaing', NULL, NULL, 1, 0),
('Gouverith', 'Antoine', 'FA1A', 'antoineg', NULL, NULL, 1, 0),
('Gueraud', 'Dorian', 'FA1A', 'doriang', NULL, NULL, 1, 0),
('Guégant', 'Axel', 'FA1A', 'axelg', NULL, NULL, 1, 0),
('Guillaume', 'Maxime', 'FA1A', 'maximeg', NULL, NULL, 1, 0),
('Guitton', 'Aloïs', 'FA1A', 'aloisg', NULL, NULL, 1, 0),
('Koebel', 'Kilian', 'FA1A', 'kiliank', NULL, NULL, 1, 0),
('Lemoing', 'Pierre', 'FA1A', 'pierrel', NULL, NULL, 1, 0),
('Marziou', 'Romain', 'FA1A', 'romainm', NULL, NULL, 1, 0),
('Meunier', 'Claire', 'FA1A', 'clairem', NULL, NULL, 1, 0),
('Payet', 'Mathieu', 'FA1A', 'mathieup', NULL, NULL, 1, 0),
('Raynard', 'Paul', 'FA1A', 'paulr', NULL, NULL, 1, 0),
('Reichert', 'Raphaël', 'FA1A', 'raphaelr', NULL, NULL, 1, 0),
('Rolland', 'Orlane', 'FA1A', 'orlaner', NULL, NULL, 1, 0),
('Torres', 'Ken', 'FA1A', 'kent', NULL, NULL, 1, 0),
('Vaucheret', 'Loïc', 'FA1A', 'loicv', NULL, NULL, 1, 0),
('Beaufils', 'Eliott', 'FA1A', 'eliottb', NULL, NULL, 2, 0),
('Boutet', 'Louna', 'FA1A', 'lounab', NULL, NULL, 2, 0),
('Colineaux', 'Marie', 'FA1A', 'mariec', NULL, NULL, 2, 0),
('Coste', 'Guillaume', 'FA1A', 'guillaumec', NULL, NULL, 2, 0),
('Crié', 'Bastien', 'FA1A', 'bastienc', NULL, NULL, 2, 0),
('Garion', 'Héloïse', 'FA1A', 'heloiseg', NULL, NULL, 2, 0),
('Guillou', 'Maïwenn', 'FA1A', 'maiwenng', NULL, NULL, 2, 0),
('Imbeaud', 'Aymeric', 'FA1A', 'aymerici', NULL, NULL, 2, 0),
('Jannot', 'Killian', 'FA1A', 'killianj', NULL, NULL, 2, 0),
('Jeusset', 'Mathis', 'FA1A', 'mathisj', NULL, NULL, 2, 0),
('Jouan', 'Goulwen', 'FA1A', 'goulwenj', NULL, NULL, 2, 0),
('L\'Helgoualc\'h', 'Justine', 'FA1A', 'justinel', NULL, NULL, 2, 0),
('Lamour', 'Mickael', 'FA1A', 'mickaell', NULL, NULL, 2, 0),
('Lucas', 'Léandre', 'FA1A', 'leandrel', NULL, NULL, 2, 0),
('Magadur', 'Alexandre', 'FA1A', 'alexandrem', NULL, NULL, 2, 0),
('Marchand', 'Jean-Baptiste', 'FA1A', 'jbm', NULL, NULL, 2, 0),
('Meilleur', 'Jérémy', 'FA1A', 'jeremym', NULL, NULL, 2, 0),
('Menard', 'Mathis', 'FA1A', 'mathism', NULL, NULL, 2, 0),
('Redouté', 'Thomas', 'FA1A', 'thomasr', NULL, NULL, 2, 0),
('Vermet', 'Julien', 'FA1A', 'julienv', NULL, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `Nom` text CHARACTER SET utf8 NOT NULL,
  `Prénom` text CHARACTER SET utf8 NOT NULL,
  `login` text CHARACTER SET utf8,
  `MDP` text CHARACTER SET utf8 NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`Nom`, `Prénom`, `login`, `MDP`, `id_prof`) VALUES
('Prof', 'Prof', '1234', '1234', 0),
('BARA', 'YANN', 'baray', NULL, 1),
('ABGRALL', 'CHRISTOPHE', 'abgrallc', NULL, 2),
('BEUCHER', 'LAURENT', 'beucherl', NULL, 3),
('PRIGENT', 'ANNE', 'prigenta', NULL, 4),
('GATEL', 'DAVID', 'gateld', NULL, 5),
('TABOURET', 'MICHEL', 'tabouretm', NULL, 6),
('DUMONT', 'FABIENNE', 'dumontf', NULL, 7),
('PASQUET', 'MAXINE', 'pasquetm', NULL, 8),
('FEREY', 'PHILIPPE', 'fereyp', NULL, 9),
('MORVAN', 'LAURENT', 'morvanl', NULL, 10),
('HUART', 'DEBORAH', 'huartd', NULL, 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
