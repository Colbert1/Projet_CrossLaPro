-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mars 2021 à 09:45
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetcross_lapro`
--

-- --------------------------------------------------------

--
-- Structure de la table `classeparticipante_tbl`
--

DROP TABLE IF EXISTS `classeparticipante_tbl`;
CREATE TABLE IF NOT EXISTS `classeparticipante_tbl` (
  `clp_id` int NOT NULL AUTO_INCREMENT,
  `cl_id` int NOT NULL,
  `crs_id` int NOT NULL,
  PRIMARY KEY (`clp_id`),
  KEY `cl_id` (`cl_id`),
  KEY `crs_id` (`crs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classe_tbl`
--

DROP TABLE IF EXISTS `classe_tbl`;
CREATE TABLE IF NOT EXISTS `classe_tbl` (
  `cl_id` int NOT NULL AUTO_INCREMENT,
  `cl_nom` varchar(15) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `course_tbl`
--

DROP TABLE IF EXISTS `course_tbl`;
CREATE TABLE IF NOT EXISTS `course_tbl` (
  `crs_id` int NOT NULL AUTO_INCREMENT,
  `crs_date` date NOT NULL,
  `crs_nom` varchar(25) NOT NULL,
  PRIMARY KEY (`crs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dossard_tbl`
--

DROP TABLE IF EXISTS `dossard_tbl`;
CREATE TABLE IF NOT EXISTS `dossard_tbl` (
  `ds_id` int NOT NULL AUTO_INCREMENT,
  `ds_num` int NOT NULL,
  PRIMARY KEY (`ds_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participant_tbl`
--

DROP TABLE IF EXISTS `participant_tbl`;
CREATE TABLE IF NOT EXISTS `participant_tbl` (
  `pt_id` int NOT NULL AUTO_INCREMENT,
  `us_id` int NOT NULL,
  `crs_id` int NOT NULL,
  `ds_id` int DEFAULT NULL,
  PRIMARY KEY (`pt_id`),
  KEY `us_id` (`us_id`),
  KEY `crs_id` (`crs_id`),
  KEY `ds_id` (`ds_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `temps_tbl`
--

DROP TABLE IF EXISTS `temps_tbl`;
CREATE TABLE IF NOT EXISTS `temps_tbl` (
  `ts_id` int NOT NULL AUTO_INCREMENT,
  `pt_id` int NOT NULL,
  `ts_temps` time NOT NULL,
  `tr_id` int NOT NULL,
  PRIMARY KEY (`ts_id`),
  KEY `pt_id` (`pt_id`),
  KEY `tr_id` (`tr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tour_tbl`
--

DROP TABLE IF EXISTS `tour_tbl`;
CREATE TABLE IF NOT EXISTS `tour_tbl` (
  `tr_id` int NOT NULL AUTO_INCREMENT,
  `tr_distance` int NOT NULL,
  `crs_id` int NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `crs_id` (`crs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `us_id` int NOT NULL AUTO_INCREMENT,
  `us_nom` varchar(30) NOT NULL,
  `us_prenom` varchar(30) NOT NULL,
  `us_mail` varchar(30) NOT NULL,
  `us_passwd` varchar(255) NOT NULL,
  `us_status` tinyint(1) NOT NULL,
  `cl_id` int DEFAULT NULL,
  PRIMARY KEY (`us_id`),
  KEY `cl_id` (`cl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_tbl`
--

INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) VALUES
(1, 'danel', 'nathan', 'ndanel@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$cTZVdWU3OEd1WVVULlJQTA$f47aO4sQBJXdlMOIMot6ZTHgphDy8aDzcafZg1jYiUo', 0, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  ADD CONSTRAINT `classeparticipante_tbl_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classe_tbl` (`cl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classeparticipante_tbl_ibfk_2` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  ADD CONSTRAINT `participant_tbl_ibfk_1` FOREIGN KEY (`us_id`) REFERENCES `user_tbl` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_tbl_ibfk_2` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_tbl_ibfk_3` FOREIGN KEY (`ds_id`) REFERENCES `dossard_tbl` (`ds_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_tbl_ibfk_4` FOREIGN KEY (`pt_id`) REFERENCES `temps_tbl` (`pt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  ADD CONSTRAINT `temps_tbl_ibfk_1` FOREIGN KEY (`tr_id`) REFERENCES `tour_tbl` (`tr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  ADD CONSTRAINT `tour_tbl_ibfk_1` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classe_tbl` (`cl_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
