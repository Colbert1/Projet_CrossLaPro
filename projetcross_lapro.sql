-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 31 mai 2021 à 14:03
-- Version du serveur :  10.5.10-MariaDB-2
-- Version de PHP : 7.4.18

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
CREATE DATABASE IF NOT EXISTS `projetcross_lapro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projetcross_lapro`;

-- --------------------------------------------------------

--
-- Structure de la table `classeparticipante_tbl`
--

CREATE TABLE `classeparticipante_tbl` (
  `clp_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `classeparticipante_tbl`:
--   `cl_id`
--       `classe_tbl` -> `cl_id`
--   `crs_id`
--       `course_tbl` -> `crs_id`
--

--
-- Déchargement des données de la table `classeparticipante_tbl`
--

INSERT INTO `classeparticipante_tbl` (`clp_id`, `cl_id`, `crs_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `classe_tbl`
--

CREATE TABLE `classe_tbl` (
  `cl_id` int(11) NOT NULL,
  `cl_nom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `classe_tbl`:
--

--
-- Déchargement des données de la table `classe_tbl`
--

INSERT INTO `classe_tbl` (`cl_id`, `cl_nom`) VALUES
(1, 'BTSSN1'),
(2, 'BTSSN2'),
(3, 'BTSE1'),
(4, 'BTSE2');

-- --------------------------------------------------------

--
-- Structure de la table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `crs_id` int(11) NOT NULL,
  `crs_date` date NOT NULL,
  `crs_nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `course_tbl`:
--

--
-- Déchargement des données de la table `course_tbl`
--

INSERT INTO `course_tbl` (`crs_id`, `crs_date`, `crs_nom`) VALUES
(1, '2021-05-07', 'SN2'),
(2, '2021-05-07', 'SN1'),
(4, '2021-05-21', '11111');

-- --------------------------------------------------------

--
-- Structure de la table `dossard_tbl`
--

CREATE TABLE `dossard_tbl` (
  `ds_id` int(11) NOT NULL,
  `ds_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `dossard_tbl`:
--

--
-- Déchargement des données de la table `dossard_tbl`
--

INSERT INTO `dossard_tbl` (`ds_id`, `ds_num`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Structure de la table `participant_tbl`
--

CREATE TABLE `participant_tbl` (
  `pt_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL,
  `ds_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `participant_tbl`:
--   `crs_id`
--       `course_tbl` -> `crs_id`
--   `ds_id`
--       `dossard_tbl` -> `ds_id`
--   `us_id`
--       `user_tbl` -> `us_id`
--

--
-- Déchargement des données de la table `participant_tbl`
--

INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) VALUES
(1, 5, 1, 1),
(2, 1, 1, 2),
(3, 3, 2, 4),
(4, 6, 1, 8),
(6, 3, 1, NULL),
(8, 11, 1, NULL),
(10, 11, 1, NULL),
(11, 11, 1, NULL),
(13, 11, 1, NULL),
(15, 3, 1, NULL),
(17, 6, 2, 12),
(18, 11, 1, NULL),
(20, 3, 2, NULL),
(21, 11, 4, NULL),
(22, 11, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `temps_tbl`
--

CREATE TABLE `temps_tbl` (
  `ts_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `ts_temps` time NOT NULL,
  `tr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `temps_tbl`:
--   `tr_id`
--       `tour_tbl` -> `tr_id`
--   `pt_id`
--       `participant_tbl` -> `pt_id`
--

--
-- Déchargement des données de la table `temps_tbl`
--

INSERT INTO `temps_tbl` (`ts_id`, `pt_id`, `ts_temps`, `tr_id`) VALUES
(3, 2, '00:16:48', 1),
(4, 1, '00:40:13', 1),
(5, 3, '00:03:13', 1),
(6, 2, '00:15:00', 3),
(7, 17, '07:54:26', 1),
(8, 17, '04:55:11', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tour_tbl`
--

CREATE TABLE `tour_tbl` (
  `tr_id` int(11) NOT NULL,
  `tr_distance` int(11) NOT NULL,
  `tr_numero` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `tour_tbl`:
--   `crs_id`
--       `course_tbl` -> `crs_id`
--

--
-- Déchargement des données de la table `tour_tbl`
--

INSERT INTO `tour_tbl` (`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES
(1, 1500, 1, 2),
(2, 1500, 1, 1),
(3, 500, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `us_id` int(11) NOT NULL,
  `us_nom` varchar(30) NOT NULL,
  `us_prenom` varchar(30) NOT NULL,
  `us_mail` varchar(30) NOT NULL,
  `us_passwd` varchar(255) NOT NULL,
  `us_status` tinyint(1) NOT NULL,
  `cl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `user_tbl`:
--   `cl_id`
--       `classe_tbl` -> `cl_id`
--

--
-- Déchargement des données de la table `user_tbl`
--

INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) VALUES
(1, 'nathan', 'nathan', 'ndanel@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$cTZVdWU3OEd1WVVULlJQTA$f47aO4sQBJXdlMOIMot6ZTHgphDy8aDzcafZg1jYiUo', 0, 2),
(3, 'test', 'test', 'test@test', '$argon2id$v=19$m=65536,t=4,p=1$NVJzeDhVWnhkV0NpLjBrVw$u/Xfz2FK/LXz4VJdNeUFwSgxyTHCLYkXoKXc8lvBBD8', 0, 2),
(4, 'nathan', 'nathan', 'nathan@nathan.fr', '$argon2id$v=19$m=65536,t=4,p=1$MHdJbGZ0Y2VzVy5ZbWR0RQ$UbVl76wsFEAo5TfThOEilXetHUl4Rk57df2g0MroUVw', 0, 3),
(5, 'colb', 'Laurent', 'gc@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$SUNvVkhzS3ZXNXFRbDhTZA$qz887ay1mq7LSC9KAlaotmO+AT1QHKBVrEtD2vnXxRc', 0, 4),
(6, 'Dupont', 'Pierre', 'ppp@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$ZkxjRS8vbGJsNkkxZkw5bQ$mYHZ39x4qHS5EwSA5rktqZkmVt+kq62OltGQY0v5zuQ', 0, 4),
(10, 'test', 'test', 'test@test.test', '$2y$10$3DuORFPnsh5/UCGZ1nQz1uYsIgJD/Mv8JvEUJt0MzYJrlaqiVFULK', 0, 2),
(11, 'Colbert', 'Grégoire', 'gcolbert@la-providence.net', '$2y$10$b.Ir2T/2SAMkeyDwyWVUbOWbhqfpbSBC/jjjPzhpXppauVmlRMmdu', 0, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  ADD PRIMARY KEY (`clp_id`),
  ADD KEY `cl_id` (`cl_id`),
  ADD KEY `crs_id` (`crs_id`);

--
-- Index pour la table `classe_tbl`
--
ALTER TABLE `classe_tbl`
  ADD PRIMARY KEY (`cl_id`);

--
-- Index pour la table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`crs_id`);

--
-- Index pour la table `dossard_tbl`
--
ALTER TABLE `dossard_tbl`
  ADD PRIMARY KEY (`ds_id`);

--
-- Index pour la table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `crs_id` (`crs_id`),
  ADD KEY `ds_id` (`ds_id`),
  ADD KEY `us_id` (`us_id`);

--
-- Index pour la table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  ADD PRIMARY KEY (`ts_id`),
  ADD KEY `pt_id` (`pt_id`),
  ADD KEY `tr_id` (`tr_id`);

--
-- Index pour la table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `crs_id` (`crs_id`);

--
-- Index pour la table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `cl_id` (`cl_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  MODIFY `clp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `classe_tbl`
--
ALTER TABLE `classe_tbl`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `dossard_tbl`
--
ALTER TABLE `dossard_tbl`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  ADD CONSTRAINT `classeparticipante_tbl_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classe_tbl` (`cl_id`),
  ADD CONSTRAINT `classeparticipante_tbl_ibfk_2` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`);

--
-- Contraintes pour la table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  ADD CONSTRAINT `participant_tbl_ibfk_1` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`),
  ADD CONSTRAINT `participant_tbl_ibfk_2` FOREIGN KEY (`ds_id`) REFERENCES `dossard_tbl` (`ds_id`),
  ADD CONSTRAINT `participant_tbl_ibfk_3` FOREIGN KEY (`us_id`) REFERENCES `user_tbl` (`us_id`);

--
-- Contraintes pour la table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  ADD CONSTRAINT `temps_tbl_ibfk_1` FOREIGN KEY (`tr_id`) REFERENCES `tour_tbl` (`tr_id`),
  ADD CONSTRAINT `temps_tbl_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `participant_tbl` (`pt_id`);

--
-- Contraintes pour la table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  ADD CONSTRAINT `tour_tbl_ibfk_1` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`);

--
-- Contraintes pour la table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classe_tbl` (`cl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
