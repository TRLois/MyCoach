-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 sep. 2023 à 08:22
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mycoach_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `idAct` int NOT NULL AUTO_INCREMENT,
  `libelleActivite` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idAct`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`idAct`, `libelleActivite`) VALUES
(1, 'Yoga'),
(2, 'Step'),
(3, 'Cardio Tra'),
(4, 'Musculatio'),
(5, 'Fitness');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `idNiveau` int NOT NULL AUTO_INCREMENT,
  `libelleNiveau` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idNiveau`, `libelleNiveau`) VALUES
(1, 'Découverte'),
(2, 'Débutant'),
(3, 'Expériment'),
(4, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idSalle`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `nom`, `adresse`, `ville`, `cp`) VALUES
(1, 'Basic-Fit', 'Avenue des Cretes', 'Ramonville-Saint-Agn', '31520'),
(2, 'Movida Clu', '69 Avenue Tolosane', 'Castanet Tolosane', '31320'),
(3, 'Vita Liber', '14b Esplanade Compans Caffareli', 'Toulouse', '31000'),
(4, 'Saham Yoga', '11 rue Temponières', 'Toulouse', '3100'),
(5, 'KeepCool', '60 rue Pierre et Marie Curie', 'Labège', '31670');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `idSeance` int NOT NULL AUTO_INCREMENT,
  `activiteSeance` int DEFAULT NULL,
  `salleSeance` int DEFAULT NULL,
  `niveauSeance` int DEFAULT NULL,
  `jour` varchar(8) DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time DEFAULT NULL,
  PRIMARY KEY (`idSeance`),
  KEY `fk_seance_niveau` (`niveauSeance`),
  KEY `fk_seance_salle` (`salleSeance`),
  KEY `fk_seance_activite` (`activiteSeance`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`idSeance`, `activiteSeance`, `salleSeance`, `niveauSeance`, `jour`, `heureDebut`, `heureFin`) VALUES
(1, 1, 4, 1, 'Lundi', '09:00:00', '10:00:00'),
(2, 1, 2, 3, 'Lundi', '11:30:00', '13:30:00'),
(3, 3, 1, 2, 'Mardi ', '10:30:00', '12:00:00'),
(4, 4, 1, 1, 'Mercredi', '08:00:00', '10:00:00'),
(5, 2, 2, 3, 'Mardi', '14:00:00', '16:30:00'),
(6, 5, 4, 1, 'Jeudi', '16:30:00', '19:00:00'),
(8, 2, 5, 4, 'Vendredi', '16:00:00', '18:00:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_seance_activite` FOREIGN KEY (`activiteSeance`) REFERENCES `activite` (`idAct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seance_niveau` FOREIGN KEY (`niveauSeance`) REFERENCES `niveau` (`idNiveau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seance_salle` FOREIGN KEY (`salleSeance`) REFERENCES `salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
