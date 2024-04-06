-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 06 avr. 2024 à 15:09
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion-remisecle`
--

-- --------------------------------------------------------

--
-- Structure de la table `coproprietaire`
--

DROP TABLE IF EXISTS `coproprietaire`;
CREATE TABLE IF NOT EXISTS `coproprietaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coproprietaire`
--

INSERT INTO `coproprietaire` (`id`, `nom`, `adresse`) VALUES
(1, 'Coproprietaire1', 'Adresse1'),
(2, 'Coproprietaire2', 'Adreesse2'),
(3, 'Coproprietaire 3', 'Adresse 3');

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

DROP TABLE IF EXISTS `immeuble`;
CREATE TABLE IF NOT EXISTS `immeuble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `immeuble`
--

INSERT INTO `immeuble` (`id`, `nom`, `adresse`) VALUES
(1, 'nom1', 'adresse1'),
(2, 'Nom Immeuble 2', 'Adresse2'),
(3, 'Immeuble3', 'Adresse3'),
(4, 'Immeuble 4', 'Adresse 4');

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

DROP TABLE IF EXISTS `lot`;
CREATE TABLE IF NOT EXISTS `lot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_immeuble` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `id_coproprio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_immeuble` (`id_immeuble`),
  KEY `id_coproprio` (`id_coproprio`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lot`
--

INSERT INTO `lot` (`id`, `id_immeuble`, `nom`, `id_coproprio`) VALUES
(1, 1, 'nomLot1', 0),
(2, 3, 'lot numero 3', 2),
(3, 2, 'Lot numÃ©ro 3', 1),
(4, 4, 'Lot numÃ©ro 4', 3);

-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

DROP TABLE IF EXISTS `remise`;
CREATE TABLE IF NOT EXISTS `remise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lot` int(11) NOT NULL,
  `donneur` varchar(255) DEFAULT NULL,
  `receveur` varchar(250) DEFAULT NULL,
  `date_remise` date DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `signature` varchar(200) DEFAULT NULL,
  `media` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lot` (`id_lot`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remise`
--

INSERT INTO `remise` (`id`, `id_lot`, `donneur`, `receveur`, `date_remise`, `commentaire`, `signature`, `media`) VALUES
(1, 1, 'John Doe', 'Jane Doe', '2024-04-03', 'Remise de clÃ© pour l\'appartement A101.', 'signaturee', 'chemin/vers/photo_ou_video.jpg'),
(2, 1, 'John Doe', 'Jane Doe', '2024-04-03', 'Remise de clÃ© pour l\'appartement A102.', 'signaturee2', 'chemin/vers/photo_ou_video.jpg'),
(3, 1, 'vjh', 'gyy', '2024-04-06', 'gt', 'ghu', 'hi'),
(4, 1, 'gjgu', 'kjuk', '2024-04-07', 'hhyy', 'ghu', NULL),
(5, 1, 'vjh', 'gyy', '2024-04-07', 'gt', 'gggg', 'dd'),
(6, 4, 'Donneur ', 'Receveur', '2024-04-05', 'test', 'test', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
