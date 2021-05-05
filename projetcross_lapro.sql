-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 mai 2021 à 15:01
-- Version du serveur :  10.3.27-MariaDB-0+deb10u1
-- Version de PHP : 7.3.27-1~deb10u1

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

CREATE TABLE `classeparticipante_tbl` (
  `clp_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classe_tbl`
--

CREATE TABLE `classe_tbl` (
  `cl_id` int(11) NOT NULL,
  `cl_nom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Déchargement des données de la table `course_tbl`
--

INSERT INTO `course_tbl` (`crs_id`, `crs_date`, `crs_nom`) VALUES
(1, '2020-09-15', 'Test'),
(2, '2021-04-10', 'Colbert');

-- --------------------------------------------------------

--
-- Structure de la table `dossard_tbl`
--

CREATE TABLE `dossard_tbl` (
  `ds_id` int(11) NOT NULL,
  `ds_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `tour_tbl`
--

CREATE TABLE `tour_tbl` (
  `tr_id` int(11) NOT NULL,
  `tr_distance` float NOT NULL,
  `tr_nombre` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tour_tbl`
--

INSERT INTO `tour_tbl` (`tr_id`, `tr_distance`, `tr_nombre`, `crs_id`) VALUES
(1, 100000, 0, 2),
(2, 200000, 0, 1);

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
-- Déchargement des données de la table `user_tbl`
--

INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) VALUES
(1, 'danel', 'nathan', 'ndanel@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$cTZVdWU3OEd1WVVULlJQTA$f47aO4sQBJXdlMOIMot6ZTHgphDy8aDzcafZg1jYiUo', 0, NULL),
(3, 'test', 'test', 'test@test', '$argon2id$v=19$m=65536,t=4,p=1$NVJzeDhVWnhkV0NpLjBrVw$u/Xfz2FK/LXz4VJdNeUFwSgxyTHCLYkXoKXc8lvBBD8', 0, NULL),
(4, 'Colbert', 'Grégoire', 'gcolbert@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$akM3RzF3LlN0dldLbEZVdQ$1mWgmpggygRZU61IKCh1pPOoZ4f80hwucdOfDiPh+Jo', 0, NULL);

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
  ADD KEY `us_id` (`us_id`),
  ADD KEY `crs_id` (`crs_id`),
  ADD KEY `ds_id` (`ds_id`);

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
  MODIFY `clp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classe_tbl`
--
ALTER TABLE `classe_tbl`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `dossard_tbl`
--
ALTER TABLE `dossard_tbl`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
