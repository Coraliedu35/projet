-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 06 fév. 2018 à 10:10
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
  `salle` int(11) NOT NULL,
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
  `photo` text NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_bin,
  `MDP` int(11) DEFAULT NULL,
  `Groupe` int(11) NOT NULL,
  `absencesJ` int(11) DEFAULT NULL,
  `absencesNJ` int(11) DEFAULT NULL,
  `presence` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Nom`, `Prénom`, `photo`, `login`, `MDP`, `Groupe`, `absencesJ`, `absencesNJ`, `presence`) VALUES
('Briand-Goudet', 'Loetis', 'loetisb', NULL, NULL, 1, NULL, NULL, 0),
('Barreau', 'Pierre', 'pierreb', NULL, NULL, 1, NULL, NULL, 0),
('Blanchon', 'Erwan', 'erwanb', NULL, NULL, 1, NULL, NULL, 0),
('Boucey', 'Paul', 'paulb', NULL, NULL, 2, NULL, NULL, 0),
('Boudaud', 'Jules', 'julesb', NULL, NULL, 1, NULL, NULL, 0),
('Bouland', 'Thomas', 'thomasb', NULL, NULL, 2, NULL, NULL, 0),
('Bret', 'Vladimir', 'vladimirb', NULL, NULL, 2, NULL, NULL, 0),
('Briand', 'Dorian', 'dorianb', NULL, NULL, 2, NULL, NULL, 0),
('Camera', 'Romain', 'romainc', NULL, NULL, 1, NULL, NULL, 0),
('Cassecuel', 'Clément', 'clementc', NULL, NULL, 2, NULL, NULL, 0),
('Choquet', 'Nicolas', 'nicolasc', NULL, NULL, 1, NULL, NULL, 0),
('Coquette', 'Yann', 'yannc', NULL, NULL, 1, NULL, NULL, 0),
('Duchatel', 'Mathis', 'mathisd', NULL, NULL, 1, NULL, NULL, 0),
('Keller', 'Maxime', 'maximek', NULL, NULL, 1, NULL, NULL, 0),
('Lafont', 'Emeline', 'emelinel', NULL, NULL, 2, NULL, NULL, 0),
('Laurain', 'Titouan', 'titouanl', NULL, NULL, 2, NULL, NULL, 0),
('Le Coz', 'Samuel', 'samuell', NULL, NULL, 1, NULL, NULL, 0),
('Lecrivain', 'Ugo', 'ugol', NULL, NULL, 2, NULL, NULL, 0),
('Levielle', 'Cedric', 'cedricl', NULL, NULL, 2, NULL, NULL, 0),
('Lisnic', 'Dorian', 'dorianl', NULL, NULL, 2, NULL, NULL, 0),
('Maulnier', 'Leopold', 'leopoldm', NULL, NULL, 1, NULL, NULL, 0),
('Metayer', 'Coralie', 'coraliem', NULL, 12345, 1, 3, 0, 0),
('Miché', 'Paul', 'paulm', NULL, NULL, 1, NULL, NULL, 0),
('Militao', 'Sarah', 'sarahm', NULL, NULL, 1, NULL, NULL, 0),
('Morvan', 'Alan', 'alanm', NULL, NULL, 1, NULL, NULL, 0),
('Mouazan', 'Morgann', 'morgannm', NULL, NULL, 1, NULL, NULL, 0),
('Ndao', 'Mouhamed', 'mouhamedn', NULL, NULL, 1, NULL, NULL, 0),
('Parola', 'Mario', 'mariop', NULL, NULL, 1, NULL, NULL, 0),
('Passelande Porte', 'Baptiste', 'baptistep', NULL, NULL, 2, NULL, NULL, 0),
('Polet', 'Allan', 'allanp', NULL, NULL, 1, NULL, NULL, 0),
('Raux', 'Kevin', 'kevinr', NULL, NULL, 1, NULL, NULL, 0),
('Reintjes', 'Willian', 'williamr', NULL, NULL, 1, NULL, NULL, 0),
('Rogard', 'Olivier', 'olivierr', NULL, NULL, 1, NULL, NULL, 0),
('Samson', 'Théo', 'theos', NULL, NULL, 2, NULL, NULL, 0),
('Talio', 'Romain', 'romaint', NULL, NULL, 1, NULL, NULL, 0),
('Termet', 'Mathieu', 'mathieut', NULL, NULL, 1, NULL, NULL, 0),
('Trinquart', 'Kilian', 'kiliant', NULL, NULL, 1, NULL, NULL, 0),
('Vetele', 'Ewen', 'ewenv', NULL, NULL, 2, NULL, NULL, 0),
('test', 'test', 'test', '123', 123, 1, NULL, NULL, 1),
('Vanherzeele', 'Jacques', 'jacquesv', NULL, NULL, 2, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `Nom` text CHARACTER SET utf8 NOT NULL,
  `Prénom` text CHARACTER SET utf8 NOT NULL,
  `login` text CHARACTER SET utf8,
  `MDP` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`Nom`, `Prénom`, `login`, `MDP`) VALUES
('Prof', 'Prof', '1234', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
