-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2021 at 11:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetcross_lapro`
--
CREATE DATABASE IF NOT EXISTS `projetcross_lapro` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetcross_lapro`;

-- --------------------------------------------------------

--
-- Table structure for table `classeparticipante_tbl`
--

DROP TABLE IF EXISTS `classeparticipante_tbl`;
CREATE TABLE `classeparticipante_tbl` (
  `clp_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classeparticipante_tbl`
--

INSERT INTO `classeparticipante_tbl` (`clp_id`, `cl_id`, `crs_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `classe_tbl`
--

DROP TABLE IF EXISTS `classe_tbl`;
CREATE TABLE `classe_tbl` (
  `cl_id` int(11) NOT NULL,
  `cl_nom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classe_tbl`
--

INSERT INTO `classe_tbl` (`cl_id`, `cl_nom`) VALUES
(1, 'BTSSN1'),
(2, 'BTSSN2'),
(3, 'BTSE1'),
(4, 'BTSE2');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

DROP TABLE IF EXISTS `course_tbl`;
CREATE TABLE `course_tbl` (
  `crs_id` int(11) NOT NULL,
  `crs_date` date NOT NULL,
  `crs_nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`crs_id`, `crs_date`, `crs_nom`) VALUES
(1, '2021-05-07', 'SN2'),
(2, '2021-05-07', 'SN1'),
(4, '2021-05-21', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `dossard_tbl`
--

DROP TABLE IF EXISTS `dossard_tbl`;
CREATE TABLE `dossard_tbl` (
  `ds_id` int(11) NOT NULL,
  `ds_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dossard_tbl`
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
-- Table structure for table `participant_tbl`
--

DROP TABLE IF EXISTS `participant_tbl`;
CREATE TABLE `participant_tbl` (
  `pt_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL,
  `ds_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant_tbl`
--

INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) VALUES
(1, 5, 1, 1),
(2, 1, 1, 2),
(3, 3, 2, 4),
(4, 6, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `temps_tbl`
--

DROP TABLE IF EXISTS `temps_tbl`;
CREATE TABLE `temps_tbl` (
  `ts_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `ts_temps` time NOT NULL,
  `tr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temps_tbl`
--

INSERT INTO `temps_tbl` (`ts_id`, `pt_id`, `ts_temps`, `tr_id`) VALUES
(3, 2, '00:16:48', 1),
(4, 1, '00:40:13', 1),
(5, 3, '00:03:13', 1),
(6, 2, '00:15:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tour_tbl`
--

DROP TABLE IF EXISTS `tour_tbl`;
CREATE TABLE `tour_tbl` (
  `tr_id` int(11) NOT NULL,
  `tr_distance` int(11) NOT NULL,
  `tr_numero` int(11) NOT NULL,
  `crs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_tbl`
--

INSERT INTO `tour_tbl` (`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES
(1, 1500, 1, 2),
(2, 1500, 1, 1),
(3, 500, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
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
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) VALUES
(1, 'nathan', 'nathan', 'ndanel@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$cTZVdWU3OEd1WVVULlJQTA$f47aO4sQBJXdlMOIMot6ZTHgphDy8aDzcafZg1jYiUo', 0, 2),
(3, 'test', 'test', 'test@test', '$argon2id$v=19$m=65536,t=4,p=1$NVJzeDhVWnhkV0NpLjBrVw$u/Xfz2FK/LXz4VJdNeUFwSgxyTHCLYkXoKXc8lvBBD8', 0, 2),
(4, 'nathan', 'nathan', 'nathan@nathan.fr', '$argon2id$v=19$m=65536,t=4,p=1$MHdJbGZ0Y2VzVy5ZbWR0RQ$UbVl76wsFEAo5TfThOEilXetHUl4Rk57df2g0MroUVw', 0, 3),
(5, 'colb', 'Laurent', 'gc@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$SUNvVkhzS3ZXNXFRbDhTZA$qz887ay1mq7LSC9KAlaotmO+AT1QHKBVrEtD2vnXxRc', 0, 4),
(6, 'Dupont', 'Pierre', 'ppp@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$ZkxjRS8vbGJsNkkxZkw5bQ$mYHZ39x4qHS5EwSA5rktqZkmVt+kq62OltGQY0v5zuQ', 0, 4),
(8, 'Colbert', 'Grégoire', 'gcolbert@la-providence.net', '123456', 0, 2),
(9, 'test', 'test', 'test@test.fr', 'test', 0, 1),
(10, 'test', 'test', 'test@test.test', '$2y$10$3DuORFPnsh5/UCGZ1nQz1uYsIgJD/Mv8JvEUJt0MzYJrlaqiVFULK', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  ADD PRIMARY KEY (`clp_id`),
  ADD KEY `cl_id` (`cl_id`),
  ADD KEY `crs_id` (`crs_id`);

--
-- Indexes for table `classe_tbl`
--
ALTER TABLE `classe_tbl`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`crs_id`);

--
-- Indexes for table `dossard_tbl`
--
ALTER TABLE `dossard_tbl`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `crs_id` (`crs_id`),
  ADD KEY `ds_id` (`ds_id`),
  ADD KEY `us_id` (`us_id`);

--
-- Indexes for table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  ADD PRIMARY KEY (`ts_id`),
  ADD KEY `pt_id` (`pt_id`),
  ADD KEY `tr_id` (`tr_id`);

--
-- Indexes for table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `crs_id` (`crs_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `cl_id` (`cl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  MODIFY `clp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classe_tbl`
--
ALTER TABLE `classe_tbl`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dossard_tbl`
--
ALTER TABLE `dossard_tbl`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classeparticipante_tbl`
--
ALTER TABLE `classeparticipante_tbl`
  ADD CONSTRAINT `classeparticipante_tbl_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classe_tbl` (`cl_id`),
  ADD CONSTRAINT `classeparticipante_tbl_ibfk_2` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`);

--
-- Constraints for table `participant_tbl`
--
ALTER TABLE `participant_tbl`
  ADD CONSTRAINT `participant_tbl_ibfk_1` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`),
  ADD CONSTRAINT `participant_tbl_ibfk_2` FOREIGN KEY (`ds_id`) REFERENCES `dossard_tbl` (`ds_id`),
  ADD CONSTRAINT `participant_tbl_ibfk_3` FOREIGN KEY (`us_id`) REFERENCES `user_tbl` (`us_id`);

--
-- Constraints for table `temps_tbl`
--
ALTER TABLE `temps_tbl`
  ADD CONSTRAINT `temps_tbl_ibfk_1` FOREIGN KEY (`tr_id`) REFERENCES `tour_tbl` (`tr_id`),
  ADD CONSTRAINT `temps_tbl_ibfk_2` FOREIGN KEY (`pt_id`) REFERENCES `participant_tbl` (`pt_id`);

--
-- Constraints for table `tour_tbl`
--
ALTER TABLE `tour_tbl`
  ADD CONSTRAINT `tour_tbl_ibfk_1` FOREIGN KEY (`crs_id`) REFERENCES `course_tbl` (`crs_id`);

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `classe_tbl` (`cl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
