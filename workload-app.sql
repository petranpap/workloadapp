-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for workload_app
CREATE DATABASE IF NOT EXISTS `workload_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `workload_app`;

-- Dumping structure for table workload_app.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table workload_app.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table workload_app.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `data` longtext NOT NULL DEFAULT '0',
  `year` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table workload_app.members: ~6 rows (approximately)
INSERT IGNORE INTO `members` (`id`, `name`, `email`, `supervisor`, `data`, `year`, `created_at`, `updated_at`) VALUES
	(1, 'Elena Kakoulli', 'e.kakoulli@nup.ac.cy', 's.chatzichristofis@nup.ac.cy', '[{"id":"input_perCourseConv","val":""},{"id":"input_stdfeed","val":""},{"id":"input_perCourseDist","val":""},{"id":"input_thesisUnder","val":""},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":"1"},{"id":"input_preparing","val":"1"},{"id":"input_preparingProg","val":"1"},{"id":"input_courseRecogn","val":"1"},{"id":"input_admin","val":"1"}]', NULL, NULL, NULL),
	(2, 'Konstantinos Zagoris', 'k.zagoris@nup.ac.cy', 's.chatzichristofis@nup.ac.cy', '[{"id":"input_perCourseConv","val":""},{"id":"input_stdfeed","val":"10"},{"id":"input_perCourseDist","val":""},{"id":"input_thesisUnder","val":"20"},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":""},{"id":"input_preparing","val":""},{"id":"input_preparingProg","val":"1"},{"id":"input_courseRecogn","val":"1"},{"id":"input_admin","val":""}]', NULL, NULL, NULL),
	(3, 'Michael Georgiades', 'm.georgiades@nup.ac.cy', 's.chatzichristofis@nup.ac.cy', '0', '', NULL, NULL),
	(4, 'Marios Poullas', 'm.poullas.2@nup.ac.cy', 's.chatzichristofis@nup.ac.cy', '0', '', NULL, NULL),
	(5, 'Eleutherios Zacharioudakis', 'l.zacharioudakis@nup.ac.cy', 's.chatzichristofis@nup.ac.cy', '0', '', NULL, NULL),
	(6, 'Salomi Evripidou', 's.evripidou.3@nup.ac.cy', 's.chatzichristofis@nup.ac.cy', '0', '', NULL, NULL);

-- Dumping structure for table workload_app.members_admin_view
CREATE TABLE IF NOT EXISTS `members_admin_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` longtext NOT NULL DEFAULT '0',
  `memberid` int(11) NOT NULL DEFAULT 0,
  `step` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table workload_app.members_admin_view: ~2 rows (approximately)
INSERT IGNORE INTO `members_admin_view` (`id`, `data`, `memberid`, `step`) VALUES
	(16, '[{"id":"input_perCourseConv","val":"2"},{"id":"input_stdfeed","val":"120"},{"id":"input_perCourseDist","val":"1"},{"id":"input_thesisUnder","val":"3"},{"id":"input_thesisPost","val":"2"},{"id":"input_oh","val":"99"},{"id":"input_programCord","val":"1"},{"id":"input_headDept","val":"1"},{"id":"input_newspaper","val":"3"},{"id":"input_schoolVisits","val":"2"},{"id":"input_exhibitions","val":"0"},{"id":"input_presentations","val":"0"},{"id":"input_proposal","val":"1"},{"id":"input_q1","val":"2"},{"id":"input_q2","val":"2"},{"id":"input_q3","val":"1"},{"id":"input_confArticle","val":"2"},{"id":"input_studyGuide","val":"1"},{"id":"input_moodle_pagePrep","val":"1"},{"id":"input_updStudyGuide","val":"1"},{"id":"input_participation","val":"1"},{"id":"input_preparing","val":"0"},{"id":"input_preparingProg","val":"1"},{"id":"input_courseRecogn","val":"15"},{"id":"input_admin","val":"2"}]', 1, 1),
	(17, '[{"id":"input_perCourseConv","val":"10"},{"id":"input_stdfeed","val":"10"},{"id":"input_perCourseDist","val":"10"},{"id":"input_thesisUnder","val":""},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":""},{"id":"input_preparing","val":""},{"id":"input_preparingProg","val":""},{"id":"input_courseRecogn","val":""},{"id":"input_admin","val":""}]', 6, 1),
	(18, '[{"id":"input_perCourseConv","val":""},{"id":"input_stdfeed","val":"10"},{"id":"input_perCourseDist","val":""},{"id":"input_thesisUnder","val":"20"},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":""},{"id":"input_preparing","val":""},{"id":"input_preparingProg","val":""},{"id":"input_courseRecogn","val":""},{"id":"input_admin","val":""}]', 2, 1),
	(19, '[{"id":"input_perCourseConv","val":""},{"id":"input_stdfeed","val":"10"},{"id":"input_perCourseDist","val":""},{"id":"input_thesisUnder","val":"20"},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":""},{"id":"input_preparing","val":""},{"id":"input_preparingProg","val":"1"},{"id":"input_courseRecogn","val":"1"},{"id":"input_admin","val":""}]', 2, 2),
	(20, '[{"id":"input_perCourseConv","val":""},{"id":"input_stdfeed","val":""},{"id":"input_perCourseDist","val":""},{"id":"input_thesisUnder","val":""},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":""},{"id":"input_preparing","val":"1"},{"id":"input_preparingProg","val":"1"},{"id":"input_courseRecogn","val":"1"},{"id":"input_admin","val":""}]', 1, 2),
	(21, '[{"id":"input_perCourseConv","val":""},{"id":"input_stdfeed","val":""},{"id":"input_perCourseDist","val":""},{"id":"input_thesisUnder","val":""},{"id":"input_thesisPost","val":""},{"id":"input_oh","val":""},{"id":"input_programCord","val":""},{"id":"input_headDept","val":""},{"id":"input_newspaper","val":""},{"id":"input_schoolVisits","val":""},{"id":"input_exhibitions","val":""},{"id":"input_presentations","val":""},{"id":"input_proposal","val":""},{"id":"input_q1","val":""},{"id":"input_q2","val":""},{"id":"input_q3","val":""},{"id":"input_confArticle","val":""},{"id":"input_studyGuide","val":""},{"id":"input_moodle_pagePrep","val":""},{"id":"input_updStudyGuide","val":""},{"id":"input_participation","val":"1"},{"id":"input_preparing","val":"1"},{"id":"input_preparingProg","val":"1"},{"id":"input_courseRecogn","val":"1"},{"id":"input_admin","val":"1"}]', 1, 2);

-- Dumping structure for table workload_app.members_users
CREATE TABLE IF NOT EXISTS `members_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT 0,
  `memberid` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table workload_app.members_users: ~0 rows (approximately)

-- Dumping structure for table workload_app.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table workload_app.migrations: ~6 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_26_054527_create_members_table', 2),
	(6, '2023_07_26_060250_create_members_table', 3);

-- Dumping structure for table workload_app.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table workload_app.password_resets: ~0 rows (approximately)

-- Dumping structure for table workload_app.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table workload_app.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table workload_app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table workload_app.users: ~2 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
	(1, 'Petros Papagiannis', 'p.papagiannis@nup.ac.cy', NULL, '$2y$10$HLs2O4uvb8hjWwE7/qyDPuNF9QMnnpI5duasPwKk15ALkpHDVzL5O', NULL, '2023-07-17 04:56:09', '2023-07-17 04:56:09', 'admin'),
	(5, 'Savvas Chatzichristofis', 's.chatzichristofis@nup.ac.cy', NULL, '$2y$10$E17Xu47Sew6qy2AsDFT6DuaVP8/h.tmiiUD4bLaolgZVqDggL3c5W', NULL, '2023-07-17 06:50:23', '2023-07-18 09:50:47', 'dep');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
