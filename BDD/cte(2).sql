-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 31 Mai 2014 à 08:21
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cte`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `id_prof` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_interro` int(11) NOT NULL,
  `promo` varchar(32) NOT NULL,
  `travail` text NOT NULL,
  `date_butoir` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `contenu` text NOT NULL,
  `heure` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_prof` (`id_prof`),
  KEY `id_matiere` (`id_matiere`),
  KEY `id_interro` (`id_interro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`ID`, `id_prof`, `id_matiere`, `id_interro`, `promo`, `travail`, `date_butoir`, `date`, `contenu`, `heure`, `creation_date`, `last_update_date`) VALUES
(14, 1, 2, 0, 'B1', '', '', '2014-05-06', 'Etude des composants PC', 0, '2014-05-06 09:48:39', '2014-05-29 17:58:45'),
(15, 1, 2, 0, 'B2', 'Recherche sur les VPN', '08/05/2014', '2014-05-05', 'Cours sur les protocoles TCP/IP', 0, '2014-05-06 09:56:32', '2014-05-06 10:11:46'),
(18, 1, 6, 12, 'B1', '', '', '2014-05-07', 'Cours', 0, '2014-05-06 10:10:56', '2014-05-31 10:03:57'),
(19, 5, 17, 0, 'B1', '', '', '2014-05-06', 'UML', 0, '2014-05-06 10:11:09', '2014-05-29 18:01:39'),
(20, 1, 5, 13, 'I3 Initiaux', '', '', '2014-05-09', 'Contenu cours test', 0, '2014-05-06 10:26:17', '2014-05-29 17:56:40'),
(21, 1, 14, 14, 'B1', '', '', '2014-05-06', 'Cours', 0, '2014-05-06 10:59:13', '2014-05-06 10:59:13'),
(25, 1, 14, 0, 'B1', 'erer', '29/05/2014', '2014-05-31', 'test', 0, '2014-05-30 18:34:55', '2014-05-31 10:07:08');

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE IF NOT EXISTS `enseigne` (
  `userID` int(10) NOT NULL,
  `matiereID` int(10) NOT NULL,
  KEY `userID` (`userID`),
  KEY `matiereID` (`matiereID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseigne`
--

INSERT INTO `enseigne` (`userID`, `matiereID`) VALUES
(2, 3),
(2, 2),
(3, 13),
(3, 15),
(5, 16),
(5, 17),
(4, 14),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `ID` int(11) NOT NULL,
  `action` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`ID`, `action`, `date`) VALUES
(2, '(Architecture systèmes) Nouveau cours : Etude des composants PC', '2014-05-06 09:48:39'),
(2, '(Réseaux) Nouveau cours : Cours sur les protocoles TCP/IP', '2014-05-06 09:56:32'),
(3, 'Ajout de l''interrogation : Création d''une base de données', '2014-05-06 09:58:40'),
(3, '(SGBD) Nouveau cours : Découverte du langage SQL', '2014-05-06 09:58:40'),
(1, 'Ajout de l''utilisateur Eloi PAGNIEZ', '2014-05-06 10:04:34'),
(8, '(Développement Web) Nouveau cours : Découverte de l''HTML', '2014-05-06 10:05:52'),
(8, '(Anglais) Nouveau cours : Cours', '2014-05-06 10:10:56'),
(8, '(Développement Web) Nouveau cours : Découverte du PHP', '2014-05-06 10:11:09'),
(1, 'Suppression de l''interrogation : ', '2014-05-06 10:11:46'),
(1, '(Réseaux) Modification d''un cours : Cours sur les protocoles TCP/IP', '2014-05-06 10:11:46'),
(1, 'Suppression de l''interrogation : ', '2014-05-06 10:12:36'),
(1, '(Développement Web) Modification d''un cours : Découverte de l''HTML', '2014-05-06 10:12:36'),
(1, 'Suppression de l''interrogation : ', '2014-05-06 10:12:44'),
(1, '(Anglais) Modification d''un cours : Cours', '2014-05-06 10:12:44'),
(1, 'Ajout de l''interrogation : Interro', '2014-05-06 10:25:44'),
(1, '(Anglais) Modification d''un cours : Cours', '2014-05-06 10:25:44'),
(1, 'Ajout de l''interrogation : Sujet', '2014-05-06 10:26:17'),
(1, '(Economie d''entreprise) Nouveau cours : Contenu', '2014-05-06 10:26:17'),
(1, 'Modification de l''interrogation : Sujet', '2014-05-06 10:46:24'),
(1, '(Economie d''entreprise) Modification d''un cours : Contenu cours', '2014-05-06 10:46:24'),
(1, 'Ajout de l''interrogation : Interro', '2014-05-06 10:59:13'),
(1, '(Algorithmique) Nouveau cours : Cours', '2014-05-06 10:59:13'),
(8, '(Développement Web) Nouveau cours : JAVA Android - projet', '2014-05-06 11:06:19'),
(8, '(Anglais) Nouveau cours : contenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenucontenu', '2014-05-06 11:15:14'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 16:38:44'),
(1, '(Réseaux) Modification d''un cours : Etude des composants PC', '2014-05-23 16:38:44'),
(1, 'Modification de l''interrogation : Création d''une base de données', '2014-05-23 16:40:03'),
(1, '(Java) Modification d''un cours : Découverte du langage SQL', '2014-05-23 16:40:03'),
(1, '(Droit) Nouveau cours : lol', '2014-05-23 16:40:23'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:25:54'),
(1, '(Anglais) Modification d''un cours : Découverte du PHPWWWWWWWWWWWWWWWWWw', '2014-05-23 17:25:54'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:27:47'),
(1, '(Anglais) Modification d''un cours : Découverte du PHPWWWWWWWWWWWWWWWWWwdd', '2014-05-23 17:27:47'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:28:31'),
(1, '(Anglais) Modification d''un cours : Découverte du PHPWWWWWWWWWWWWWWWWWwdd', '2014-05-23 17:28:31'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:28:54'),
(1, '(Anglais) Modification d''un cours : Découverte du PHPWWWWWWWWWWWWWWWWWwdd', '2014-05-23 17:28:54'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:30:11'),
(1, '(Anglais) Modification d''un cours : Découverte du PHPWWWWWWWWWWWWWWWWWwdd', '2014-05-23 17:30:11'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:30:45'),
(1, '(UML) Modification d''un cours : Découverte du PHPWWWWWWWWWWWWWWWWWwdd', '2014-05-23 17:30:45'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:30:52'),
(1, '(UML) Modification d''un cours : UMLOL', '2014-05-23 17:30:52'),
(1, 'Modification de l''interrogation : Interro', '2014-05-23 17:52:51'),
(1, '(Droit) Modification d''un cours : Cours', '2014-05-23 17:52:51'),
(1, 'Suppression de l''interrogation : ', '2014-05-23 17:53:53'),
(1, '(Développement Web) Modification d''un cours : Découverte de l''HTML', '2014-05-23 17:53:53'),
(8, '(Développement Web) Nouveau cours : JS', '2014-05-28 16:46:25'),
(1, 'Modification de l''utilisateur Eloi PAGNIEZE', '2014-05-28 16:54:15'),
(2, 'Utilisateur BRIKI connecté depuis 127.0.0.1 ', '2014-05-29 17:53:57'),
(1, 'Utilisateur ADMIN connecté depuis 127.0.0.1 ', '2014-05-29 17:55:32'),
(1, 'Suppression de l''interrogation : ', '2014-05-29 17:56:13'),
(1, '(UML) Modification d''un cours : UML', '2014-05-29 17:56:13'),
(1, 'Modification de l''interrogation : Sujet', '2014-05-29 17:56:40'),
(1, '(Economie d''entreprise) Modification d''un cours : Contenu cours test', '2014-05-29 17:56:40'),
(1, 'Suppression de l''interrogation : ', '2014-05-29 17:57:27'),
(1, '(Réseaux) Modification d''un cours : Etude des composants PC', '2014-05-29 17:57:27'),
(1, '(Réseaux) Modification d''un cours : Etude des composants PC', '2014-05-29 17:58:45'),
(1, '(UML) Modification d''un cours : UML', '2014-05-29 17:59:38'),
(1, 'Suppression de l''interrogation : ', '2014-05-29 18:00:42'),
(1, '(UML) Modification d''un cours : UML', '2014-05-29 18:00:42'),
(1, 'Suppression de l''interrogation : ', '2014-05-29 18:00:52'),
(1, '(UML) Modification d''un cours : UML', '2014-05-29 18:00:52'),
(1, '(UML) Modification d''un cours : UML', '2014-05-29 18:01:39'),
(1, '(Développement Web) Modification d''un cours : Découverte de l''HTMLOL', '2014-05-29 18:03:07'),
(1, '(Développement Web) Modification d''un cours : Découverte de l''HTML', '2014-05-29 18:03:17'),
(1, '(Droit) Modification d''un cours : lol', '2014-05-29 18:03:32'),
(1, 'Utilisateur ADMIN connecté depuis 127.0.0.1 ', '2014-05-29 21:28:13'),
(1, 'Utilisateur ADMIN connecté depuis 127.0.0.1 ', '2014-05-29 21:56:38'),
(1, 'Utilisateur ADMIN connecté depuis 127.0.0.1 ', '2014-05-30 08:56:08'),
(1, '(Développement Web) Modification d''un cours : Découverte de l''HTML testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '2014-05-30 14:55:59'),
(1, '(Algorithmique) Nouveau cours : test', '2014-05-30 18:34:55'),
(1, '(Développement Web) Modification d''un cours : TROWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2014-05-30 18:36:08'),
(1, 'Modification de l''utilisateur Patrick MAATI', '2014-05-30 18:36:20'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:36:57'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:38:24'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:40:09'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:42:17'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:42:45'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:43:27'),
(1, 'Modification de l''utilisateur Test MAATI', '2014-05-30 18:45:07'),
(1, 'Utilisateur ADMIN connecté depuis 127.0.0.1 ', '2014-05-31 08:54:10'),
(1, '(Droit) Modification d''un cours : lol', '2014-05-31 09:17:54'),
(1, '(Algorithmique) Nouveau cours : TEST', '2014-05-31 09:58:32'),
(1, '(Algorithmique) Nouveau cours : TEST', '2014-05-31 09:59:11'),
(1, '(Algorithmique) Nouveau cours : AAAAAAAAAAAAAAAAAAA', '2014-05-31 10:00:15'),
(1, '(Développement Web) Modification d''un cours : TROWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2014-05-31 10:02:09'),
(1, '(Développement Web) Modification d''un cours : TROWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2014-05-31 10:02:13'),
(1, '(Algorithmique) Nouveau cours : aa', '2014-05-31 10:02:21'),
(1, '(Développement Web) Modification d''un cours : TROWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2014-05-31 10:03:52'),
(1, 'Modification de l''interrogation : Interro', '2014-05-31 10:03:57'),
(1, '(Droit) Modification d''un cours : Cours', '2014-05-31 10:03:57'),
(1, '(Algorithmique) Nouveau cours : erzer', '2014-05-31 10:06:26'),
(1, 'Ajout de l''interrogation : BARAERZERZERER', '2014-05-31 10:06:39'),
(1, '(Algorithmique) Modification d''un cours : erzer', '2014-05-31 10:06:39'),
(1, 'Modification de l''interrogation : BARAERZERZEREsdfsdfsdfR', '2014-05-31 10:06:50'),
(1, '(Algorithmique) Modification d''un cours : erzer', '2014-05-31 10:06:50'),
(1, 'Suppression de l''interrogation : BARAERZERZERER', '2014-05-31 10:06:59'),
(1, '(Algorithmique) Modification d''un cours : erzer', '2014-05-31 10:06:59'),
(1, '(Algorithmique) Modification d''un cours : test', '2014-05-31 10:07:08'),
(1, 'Ajout de l''interrogation : test', '2014-05-31 10:08:48'),
(1, '(Développement Web) Modification d''un cours : TROWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2014-05-31 10:08:48'),
(1, 'Ajout de l''interrogation : classage des pieces d''un briki', '2014-05-31 10:11:24'),
(1, '(Architecture systèmes) Nouveau cours : détruire briki ', '2014-05-31 10:11:24'),
(1, 'Modification de l''interrogation : classage des pieces d''un briki', '2014-05-31 10:11:40'),
(1, '(Architecture systèmes) Modification d''un cours : détruire briki ', '2014-05-31 10:11:40'),
(1, 'Ajout de l''utilisateur briki mort', '2014-05-31 10:13:08'),
(1, 'Modification de l''interrogation : classage des pieces d''un briki', '2014-05-31 10:13:44'),
(1, '(Architecture systèmes) Modification d''un cours : détruire briki ', '2014-05-31 10:13:44'),
(1, 'Modification de l''utilisateur Abderrabi MAATI', '2014-05-31 10:19:17');

-- --------------------------------------------------------

--
-- Structure de la table `interro`
--

CREATE TABLE IF NOT EXISTS `interro` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date` varchar(32) NOT NULL,
  `promo` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `interro`
--

INSERT INTO `interro` (`ID`, `libelle`, `etat`, `date`, `promo`) VALUES
(11, 'Création d''une base de données', 1, '2014-05-06', 'B1'),
(12, 'Interro', 1, '2014-05-07', 'B1'),
(13, 'Sujet', 0, '2014-05-09', 'I3 Initiaux'),
(14, 'Interro', 1, '2014-05-06', 'B1'),
(16, 'test', 0, '2014-06-08', 'B1'),
(17, 'classage des pieces d''un briki', 1, '2014-05-31', 'I4 Alternants');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `syllabus` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`ID`, `nom`, `syllabus`) VALUES
(1, 'Mathématiques', ''),
(2, 'Réseaux', ''),
(3, 'Architecture systèmes', ''),
(4, 'Anglais', ''),
(5, 'Economie d''entreprise', ''),
(6, 'Droit', ''),
(7, 'JavaScript', ''),
(8, 'Développement Web', ''),
(9, 'PHP', ''),
(10, 'PHP - Framework Symfony', ''),
(11, 'TEC', ''),
(12, 'SQL Server', ''),
(13, 'SGBD', ''),
(14, 'Algorithmique', ''),
(15, 'Java', ''),
(16, 'Analyse', ''),
(17, 'UML', '');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `ID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promo`
--

INSERT INTO `promo` (`ID`, `nom`) VALUES
(1, 'B1'),
(2, 'B2'),
(3, 'I3 Initiaux'),
(4, 'I3 Alternants'),
(5, 'I4 Initiaux'),
(6, 'I4 Alternants'),
(7, 'I5 Initiaux'),
(8, 'I5 Alternants');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(32) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `poste` int(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `type`, `nom`, `prenom`, `login`, `password`, `poste`) VALUES
(1, 1, 'ADMIN', 'Admin', 'admin', 'password', 0),
(2, 0, 'BRIKI', 'Rachid', 'rbriki', 'password', 0),
(3, 0, 'LABIS', 'Solveig', 'slabis', 'password', 0),
(4, 0, 'MAATI', 'Abderrabi', 'amaati', 'password', 0),
(5, 0, 'LEFEVRE', 'Patrick', 'plefevre', 'password', 0),
(7, 1, 'MINAS', 'Helen', 'hminas', 'password', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `enseigne_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `enseigne_ibfk_2` FOREIGN KEY (`matiereID`) REFERENCES `matiere` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
