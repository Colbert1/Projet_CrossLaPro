-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table projetcross_lapro.classeparticipante_tbl : ~4 rows (environ)
/*!40000 ALTER TABLE `classeparticipante_tbl` DISABLE KEYS */;
INSERT INTO `classeparticipante_tbl` (`clp_id`, `cl_id`, `crs_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 1),
	(4, 2, 2);
/*!40000 ALTER TABLE `classeparticipante_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.classe_tbl : ~4 rows (environ)
/*!40000 ALTER TABLE `classe_tbl` DISABLE KEYS */;
INSERT INTO `classe_tbl` (`cl_id`, `cl_nom`) VALUES
	(1, 'BTSSN1'),
	(2, 'BTSSN2'),
	(3, 'BTSE1'),
	(4, 'BTSE2');
/*!40000 ALTER TABLE `classe_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.course_tbl : ~3 rows (environ)
/*!40000 ALTER TABLE `course_tbl` DISABLE KEYS */;
INSERT INTO `course_tbl` (`crs_id`, `crs_date`, `crs_nom`) VALUES
	(1, '2021-05-07', 'SN2'),
	(2, '2021-05-07', 'SN1'),
	(4, '2021-05-21', '11111');
/*!40000 ALTER TABLE `course_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.dossard_tbl : ~12 rows (environ)
/*!40000 ALTER TABLE `dossard_tbl` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `dossard_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.participant_tbl : ~4 rows (environ)
/*!40000 ALTER TABLE `participant_tbl` DISABLE KEYS */;
INSERT INTO `participant_tbl` (`pt_id`, `us_id`, `crs_id`, `ds_id`) VALUES
	(1, 5, 1, 1),
	(2, 1, 1, 2),
	(3, 3, 2, 4),
	(4, 6, 1, 8);
/*!40000 ALTER TABLE `participant_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.temps_tbl : ~4 rows (environ)
/*!40000 ALTER TABLE `temps_tbl` DISABLE KEYS */;
INSERT INTO `temps_tbl` (`ts_id`, `pt_id`, `ts_temps`, `tr_id`) VALUES
	(3, 2, '00:16:48', 1),
	(4, 1, '00:40:13', 1),
	(5, 3, '00:03:13', 1),
	(6, 2, '00:15:00', 3);
/*!40000 ALTER TABLE `temps_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.tour_tbl : ~3 rows (environ)
/*!40000 ALTER TABLE `tour_tbl` DISABLE KEYS */;
INSERT INTO `tour_tbl` (`tr_id`, `tr_distance`, `tr_numero`, `crs_id`) VALUES
	(1, 1500, 1, 2),
	(2, 1500, 1, 1),
	(3, 500, 2, 2);
/*!40000 ALTER TABLE `tour_tbl` ENABLE KEYS */;

-- Listage des données de la table projetcross_lapro.user_tbl : ~8 rows (environ)
/*!40000 ALTER TABLE `user_tbl` DISABLE KEYS */;
INSERT INTO `user_tbl` (`us_id`, `us_nom`, `us_prenom`, `us_mail`, `us_passwd`, `us_status`, `cl_id`) VALUES
	(1, 'nathan', 'nathan', 'ndanel@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$cTZVdWU3OEd1WVVULlJQTA$f47aO4sQBJXdlMOIMot6ZTHgphDy8aDzcafZg1jYiUo', 0, 2),
	(3, 'test', 'test', 'test@test', '$argon2id$v=19$m=65536,t=4,p=1$NVJzeDhVWnhkV0NpLjBrVw$u/Xfz2FK/LXz4VJdNeUFwSgxyTHCLYkXoKXc8lvBBD8', 0, 2),
	(4, 'nathan', 'nathan', 'nathan@nathan.fr', '$argon2id$v=19$m=65536,t=4,p=1$MHdJbGZ0Y2VzVy5ZbWR0RQ$UbVl76wsFEAo5TfThOEilXetHUl4Rk57df2g0MroUVw', 0, 3),
	(5, 'colb', 'Laurent', 'gc@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$SUNvVkhzS3ZXNXFRbDhTZA$qz887ay1mq7LSC9KAlaotmO+AT1QHKBVrEtD2vnXxRc', 0, 4),
	(6, 'Dupont', 'Pierre', 'ppp@la-providence.net', '$argon2id$v=19$m=65536,t=4,p=1$ZkxjRS8vbGJsNkkxZkw5bQ$mYHZ39x4qHS5EwSA5rktqZkmVt+kq62OltGQY0v5zuQ', 0, 4),
	(8, 'Colbert', 'Grégoire', 'gcolbert@la-providence.net', '123456', 0, 2),
	(9, 'test', 'test', 'test@test.fr', 'test', 0, 1),
	(10, 'test', 'test', 'test@test.test', '$2y$10$3DuORFPnsh5/UCGZ1nQz1uYsIgJD/Mv8JvEUJt0MzYJrlaqiVFULK', 0, 2);
/*!40000 ALTER TABLE `user_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
