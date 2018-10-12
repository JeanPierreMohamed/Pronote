-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Mars 2015 à 12:49
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `eproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `Code` int(2) NOT NULL,
  `Classe` varchar(20) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`Code`, `Classe`) VALUES
(1, 'Seconde'),
(2, 'Premiere'),
(3, 'Terminal');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `IDCompte` int(2) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MotDePasse` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDCompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`IDCompte`, `Pseudo`, `MotDePasse`, `Prenom`, `Nom`, `Email`, `Admin`) VALUES
(1, 'admin', 'admin', 'Aministrateur', 'Professeur', 'admin.prof@admin.fr', 1),
(2, 'jmohamed', 'eproject', 'Jean-Pierre', 'Mohamed', 'jean-pierre.mohamed@u-psud.fr', 0),
(3, 'yapronia', 'eproject2', 'Yoann', 'Apronia', 'yoann.apronia@u-psud.fr', 0),
(5, 'dyannick', 'eproject3', 'Yannick', 'Durand', 'yannick.durand@u-psud.fr', 0),
(6, 'bpaul', 'eproject4', 'Paul', 'Bruno', 'paul.bruno@u-psud.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `IDEleve` int(2) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DateNaissance` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Classe` int(2) NOT NULL,
  `Maths` int(5) DEFAULT NULL,
  `Physique` int(5) DEFAULT NULL,
  `Francais` int(5) DEFAULT NULL,
  `SVT` int(5) DEFAULT NULL,
  `Anglais` int(5) DEFAULT NULL,
  `Sport` int(5) DEFAULT NULL,
  PRIMARY KEY (`IDEleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`IDEleve`, `Nom`, `Prenom`, `DateNaissance`, `Classe`, `Maths`, `Physique`, `Francais`, `SVT`, `Anglais`, `Sport`) VALUES
(1, 'Mohamed', 'Jean-Pierre', '15/01/95', 3, 12, 17, 5, 18, 10, 19),
(2, 'Apronia', 'Yoann', '18/08/94', 2, 17, 18, 4, 12, 12, 15),
(3, 'Dupont', 'Harry', '26/07/98', 1, 2, 8, 14, 16, 3, 18),
(4, 'Ouech', 'Alexandre', '08/12/96', 2, 8, 5, 14, 16, 7, 12),
(5, 'Albert', 'Christophe', '14/11/95', 3, 8, 14, 9, 15, 6, 12),
(6, 'Ryve', 'Didier', '15/08/96', 1, 18, 14, 4, 12, 10, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
