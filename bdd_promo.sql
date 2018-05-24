-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 mai 2018 à 11:18
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
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `absences` (`loginetu`, `j`, `nj`, `loginprof`) VALUES
('test', '2', '1', 'Prof');
COMMIT;
-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Matière` text CHARACTER SET utf8 NOT NULL,
  `Prof` text CHARACTER SET utf8 NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_promo` int(11) NOT NULL,
  `salle` text CHARACTER SET utf8 NOT NULL,
  `Heure` time(4) NOT NULL,
  `Date` date NOT NULL,
  `badge` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
  `Groupe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Nom`, `Prénom`, `id_promo`, `photo`, `login`, `MDP`, `Groupe`) VALUES
('Briand-Goudet', 'Loetis', 'FI1A', 'loetisb', NULL, NULL, 1),
('Barreau', 'Pierre', 'FI1A', 'pierreb', NULL, NULL, 1),
('Blanchon', 'Erwan', 'FI1A', 'erwanb', NULL, NULL, 1),
('Boucey', 'Paul', 'FI1A', 'paulb', NULL, NULL, 2),
('Boudaud', 'Jules', 'FI1A', 'julesb', NULL, NULL, 1),
('Bouland', 'Thomas', 'FI1A', 'thomasb', NULL, NULL, 2),
('Bret', 'Vladimir', 'FI1A', 'vladimirb', NULL, NULL, 2),
('Briand', 'Dorian', 'FI1A', 'dorianb', NULL, NULL, 2),
('Camera', 'Romain', 'FI1A', 'romainc', NULL, NULL, 1),
('Cassecuel', 'Clément', 'FI1A', 'clementc', NULL, NULL, 2),
('Choquet', 'Nicolas', 'FI1A', 'nicolasc', NULL, NULL, 1),
('Coquette', 'Yann', 'FI1A', 'yannc', NULL, NULL, 1),
('Duchatel', 'Mathis', 'FI1A', 'mathisd', NULL, NULL, 1),
('Keller', 'Maxime', 'FI1A', 'maximek', NULL, NULL, 1),
('Lafont', 'Emeline', 'FI1A', 'emelinel', NULL, NULL, 2),
('Laurain', 'Titouan', 'FI1A', 'titouanl', NULL, NULL, 2),
('Le Coz', 'Samuel', 'FI1A', 'samuell', NULL, NULL, 1),
('Lecrivain', 'Ugo', 'FI1A', 'ugol', NULL, NULL, 2),
('Levielle', 'Cedric', 'FI1A', 'cedricl', NULL, NULL, 2),
('Lisnic', 'Dorian', 'FI1A', 'dorianl', NULL, NULL, 2),
('Maulnier', 'Leopold', 'FI1A', 'leopoldm', NULL, NULL, 1),
('Metayer', 'Coralie', 'FI1A', 'coraliem', NULL, '12345', 1),
('Miché', 'Paul', 'FI1A', 'paulm', NULL, NULL, 1),
('Militao', 'Sarah', 'FI1A', 'sarahm', NULL, NULL, 1),
('Morvan', 'Alan', 'FI1A', 'alanm', NULL, NULL, 1),
('Mouazan', 'Morgann', 'FI1A', 'morgannm', NULL, NULL, 1),
('Ndao', 'Mouhamed', 'FI1A', 'mouhamedn', NULL, NULL, 1),
('Parola', 'Mario', 'FI1A', 'mariop', NULL, NULL, 1),
('Passelande Porte', 'Baptiste', 'FI1A', 'baptistep', NULL, NULL, 2),
('Polet', 'Allan', 'FI1A', 'allanp', NULL, NULL, 1),
('Raux', 'Kevin', 'FI1A', 'kevinr', NULL, NULL, 1),
('Reintjes', 'Willian', 'FI1A', 'williamr', NULL, NULL, 1),
('Rogard', 'Olivier', 'FI1A', 'olivierr', NULL, NULL, 1),
('Samson', 'Théo', 'FI1A', 'theos', NULL, NULL, 2),
('Talio', 'Romain', 'FI1A', 'romaint', NULL, NULL, 1),
('Termet', 'Mathieu', 'FI1A', 'mathieut', NULL, NULL, 1),
('Trinquart', 'Kilian', 'FI1A', 'kiliant', NULL, NULL, 1),
('Vetele', 'Ewen', 'FI1A', 'ewenv', NULL, NULL, 2),
('test', 'test', 'FI1A', 'test', '123', '123', 1),
('Vanherzeele', 'Jacques', 'FI1A', 'jacquesv', NULL, NULL, 2),
('Macé', 'Louise', 'FA1A', 'louisem', NULL, NULL, 1),
('Martyn', 'Marie', 'FA1A', 'mariem', NULL, NULL, 1);

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
('Prof', 'Prof', '1234', '1234', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
