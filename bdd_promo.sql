-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 déc. 2017 à 19:36
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
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Prof` text CHARACTER SET utf8 NOT NULL,
  `N°Salle` text NOT NULL,
  `Heure` time(4) NOT NULL,
  `Date` date NOT NULL,
  `N°Badgeuse` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Nom` text CHARACTER SET utf8 NOT NULL,
  `Prénom` text CHARACTER SET utf8 NOT NULL,
  `n°etudiant` int(11) DEFAULT NULL,
  `MDP` int(11) DEFAULT NULL,
  `Groupe` int(11) NOT NULL,
  `Nb absences J` int(11) DEFAULT NULL,
  `Nb absences NJ` int(11) DEFAULT NULL,
  `n° badge` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Nom`, `Prénom`, `n°etudiant`, `MDP`, `Groupe`, `Nb absences J`, `Nb absences NJ`, `n° badge`) VALUES
('Briand-Goudet', 'Loetis', NULL, NULL, 1, NULL, NULL, NULL),
('Barreau', 'Pierre', NULL, NULL, 1, NULL, NULL, NULL),
('Blanchon', 'Erwan', NULL, NULL, 1, NULL, NULL, NULL),
('Boucey', 'Paul', NULL, NULL, 2, NULL, NULL, NULL),
('Boudaud', 'Jules', NULL, NULL, 1, NULL, NULL, NULL),
('Bouland', 'Thomas', NULL, NULL, 2, NULL, NULL, NULL),
('Bret', 'Vladimir', NULL, NULL, 2, NULL, NULL, NULL),
('Briand', 'Dorian', NULL, NULL, 2, NULL, NULL, NULL),
('Camera', 'Romain', NULL, NULL, 1, NULL, NULL, NULL),
('Cassecuel', 'Clément', NULL, NULL, 2, NULL, NULL, NULL),
('Choquet', 'Nicolas', NULL, NULL, 1, NULL, NULL, NULL),
('Coquette', 'Yann', NULL, NULL, 1, NULL, NULL, NULL),
('Duchatel', 'Mathis', NULL, NULL, 1, NULL, NULL, NULL),
('Keller', 'Maxime', NULL, NULL, 1, NULL, NULL, NULL),
('Lafont', 'Emeline', NULL, NULL, 2, NULL, NULL, NULL),
('Laurain', 'Titouan', NULL, NULL, 2, NULL, NULL, NULL),
('Le Coz', 'Samuel', NULL, NULL, 1, NULL, NULL, NULL),
('Lecrivain', 'Ugo', NULL, NULL, 2, NULL, NULL, NULL),
('Levielle', 'Cedric', NULL, NULL, 2, NULL, NULL, NULL),
('Lisnic', 'Dorian', NULL, NULL, 2, NULL, NULL, NULL),
('Maulnier', 'Leopold', NULL, NULL, 1, NULL, NULL, NULL),
('Metayer', 'Coralie', 123, 12345, 1, 3, 0, 123),
('Miché', 'Paul', NULL, NULL, 1, NULL, NULL, NULL),
('Militao', 'Sarah', NULL, NULL, 1, NULL, NULL, NULL),
('Morvan', 'Alan', NULL, NULL, 1, NULL, NULL, NULL),
('Mouazan', 'Morgann', NULL, NULL, 1, NULL, NULL, NULL),
('Ndao', 'Mouhamed', NULL, NULL, 1, NULL, NULL, NULL),
('Parola', 'Mario', NULL, NULL, 1, NULL, NULL, NULL),
('Passelande Porte', 'Baptiste', NULL, NULL, 2, NULL, NULL, NULL),
('Polet', 'Allan', NULL, NULL, 1, NULL, NULL, NULL),
('Raux', 'Kevin', NULL, NULL, 1, NULL, NULL, NULL),
('Reintjes', 'Willian', NULL, NULL, 1, NULL, NULL, NULL),
('Rogard', 'Olivier', NULL, NULL, 1, NULL, NULL, NULL),
('Samson', 'Théo', NULL, NULL, 2, NULL, NULL, NULL),
('Talio', 'Romain', NULL, NULL, 1, NULL, NULL, NULL),
('Termet', 'Mathieu', NULL, NULL, 1, NULL, NULL, NULL),
('Trinquart', 'Kilian', NULL, NULL, 1, NULL, NULL, NULL),
('Vetele', 'Ewen', NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `Nom` text CHARACTER SET utf8 NOT NULL,
  `Prénom` text CHARACTER SET utf8 NOT NULL,
  `n°` int(11) DEFAULT NULL,
  `MDP` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`Nom`, `Prénom`, `n°`, `MDP`) VALUES
('Prof', 'Prof', 1234, '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
