-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2023 at 06:57 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_accreditation`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_areas`
--

DROP TABLE IF EXISTS `t_areas`;
CREATE TABLE IF NOT EXISTS `t_areas` (
  `area_id` int NOT NULL AUTO_INCREMENT,
  `area_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_areas`
--

INSERT INTO `t_areas` (`area_id`, `area_name`, `created_at`, `updated_at`) VALUES
(1, 'Area 01', '2023-09-18 02:21:30', '0000-00-00 00:00:00'),
(2, 'Area 02', '2023-09-18 02:21:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_files`
--

DROP TABLE IF EXISTS `t_files`;
CREATE TABLE IF NOT EXISTS `t_files` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_folderid` int NOT NULL,
  `file_name` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `file_directory` text COLLATE utf8mb4_general_ci NOT NULL,
  `file_extension` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_files`
--

INSERT INTO `t_files` (`file_id`, `file_folderid`, `file_name`, `file_directory`, `file_extension`, `created_at`, `updated_at`) VALUES
(1, 26, 'logo-pic.docx', '/data/storage/logo-pic.docx', 'docx', '2023-09-27 05:12:08', '2023-09-27 05:12:08'),
(2, 26, 'UpdatedListV2.xlsx', '/data/storage/UpdatedListV2.xlsx', 'xlsx', '2023-09-27 05:23:29', '2023-09-27 05:23:29'),
(3, 26, 'Screenshot from 2023-09-22 19-10-43.png', '/data/storage/Screenshot from 2023-09-22 19-10-43.png', 'png', '2023-09-27 05:29:00', '2023-09-27 05:29:00'),
(4, 26, '20231260-1.pdf', '/data/storage/20231260-1.pdf', 'pdf', '2023-09-27 05:31:28', '2023-09-27 05:31:28'),
(5, 23, 'UpdatedListV2.xlsx', '/data/storage/UpdatedListV2.xlsx', 'xlsx', '2023-09-27 05:34:42', '2023-09-27 05:34:42'),
(6, 44, '20231260-1.pdf', '/data/storage/20231260-1.pdf', 'pdf', '2023-09-27 05:35:18', '2023-09-27 05:35:18'),
(7, 46, 'logo-pic.docx', '/data/storage/logo-pic.docx', 'docx', '2023-09-27 05:35:40', '2023-09-27 05:35:40'),
(8, 59, 'UpdatedListV2.xlsx', '/data/storage/UpdatedListV2.xlsx', 'xlsx', '2023-09-29 06:30:43', '2023-09-29 06:30:43'),
(9, 59, '23-24S1-007-Acknowledgement-sir-Kent.pdf', '/data/storage/23-24S1-007-Acknowledgement-sir-Kent.pdf', 'pdf', '2023-09-29 06:32:42', '2023-09-29 06:32:42'),
(10, 59, 'Screenshot from 2023-09-29 20-43-09.png', '/data/storage/Screenshot from 2023-09-29 20-43-09.png', 'png', '2023-09-29 06:33:34', '2023-09-29 06:33:34'),
(11, 61, 't_sms.sql', '/data/storage/t_sms.sql', 'sql', '2023-12-05 08:59:56', '2023-12-05 08:59:56'),
(12, 62, 'BRUCE FRANK.pdf', '/data/storage/BRUCE FRANK.pdf', 'pdf', '2023-12-05 09:06:03', '2023-12-05 09:06:03'),
(15, 61, 'JIELA-MAE.pdf', '/storage/attachment/JIELA-MAE.pdf', 'pdf', '2023-12-05 09:19:29', '2023-12-05 09:19:29'),
(16, 42, 'Hero-selection-and-banning.pdf', '/storage/attachment/Hero-selection-and-banning.pdf', 'pdf', '2023-12-05 09:21:52', '2023-12-05 09:21:52'),
(17, 42, 'Shawn Johnson.pdf', 'attachment/Shawn Johnson.pdf', 'pdf', '2023-12-05 09:23:38', '2023-12-05 09:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `t_folders`
--

DROP TABLE IF EXISTS `t_folders`;
CREATE TABLE IF NOT EXISTS `t_folders` (
  `folder_id` int NOT NULL AUTO_INCREMENT,
  `folder_area` int NOT NULL,
  `folder_parentid` int NOT NULL,
  `folder_name` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `folder_directory` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`folder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_folders`
--

INSERT INTO `t_folders` (`folder_id`, `folder_area`, `folder_parentid`, `folder_name`, `folder_directory`, `created_at`, `updated_at`) VALUES
(7, 0, 56, 'qweqeeweqewe', '/Documents/Area/qweqeeweqewe/', '2023-09-29 06:35:38', '2023-09-29 06:35:38'),
(8, 0, 61, 'TEST', '/Documents/Area/TEST/', '2023-12-05 07:55:36', '2023-12-05 07:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `t_instruments`
--

DROP TABLE IF EXISTS `t_instruments`;
CREATE TABLE IF NOT EXISTS `t_instruments` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `ins_text` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ins_code` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_instruments`
--

INSERT INTO `t_instruments` (`ins_id`, `ins_text`, `ins_code`, `created_at`, `updated_at`) VALUES
(1, 'AREA I: VISION, MISSION, GOALS AND OBJECTIVES', 'AREA I', '2023-09-25 14:49:34', '0000-00-00 00:00:00'),
(2, 'AREA II: FACULTY', 'AREA II', '2023-09-25 14:49:39', '0000-00-00 00:00:00'),
(3, 'AREA III: CURRICULUM AND INSTRUCTION', 'AREA III', '2023-09-25 14:49:43', '0000-00-00 00:00:00'),
(4, 'AREA IV: SUPPORT TO STUDENTS', 'AREA IV', '2023-09-25 14:49:47', '0000-00-00 00:00:00'),
(5, 'AREA V: RESEARCH', 'AREA V', '2023-09-25 14:49:51', '0000-00-00 00:00:00'),
(6, 'AREA VI: EXTENSION AND COMMUNITY INVOLVEMENT', 'AREA VI', '2023-09-25 14:49:55', '0000-00-00 00:00:00'),
(7, 'AREA VII: LIBRARY', 'AREA VII', '2023-09-25 14:49:59', '0000-00-00 00:00:00'),
(8, 'AREA VIII: PHYSICAL PLANT AND FACILITIES', 'AREA VIII', '2023-09-25 14:50:07', '0000-00-00 00:00:00'),
(9, 'AREA IX: LABORATORIES', 'AREA IX', '2023-09-25 14:50:11', '0000-00-00 00:00:00'),
(10, 'AREA X: ADMINISTRATION', 'AREA X', '2023-09-25 14:50:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_instruments_sub`
--

DROP TABLE IF EXISTS `t_instruments_sub`;
CREATE TABLE IF NOT EXISTS `t_instruments_sub` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `ins_parentid` int DEFAULT NULL,
  `ins_text` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ins_level` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_instruments_sub`
--

INSERT INTO `t_instruments_sub` (`ins_id`, `ins_parentid`, `ins_text`, `ins_level`, `created_at`, `updated_at`) VALUES
(23, 2, 'A. Academic Qualifications and Professional Experience', 0, '2023-09-25 05:49:32', '2023-09-25 05:49:32'),
(24, 2, 'B. Recruitment, Selection and Orientation', 0, '2023-09-25 05:49:55', '2023-09-25 05:49:55'),
(25, 2, 'C. Faculty Adequacy and Loading', 0, '2023-09-25 05:50:05', '2023-09-25 05:50:05'),
(26, 2, 'D. Rank and Tenure', 0, '2023-09-25 05:50:22', '2023-09-25 05:50:22'),
(27, 2, 'E. Faculty Development', 0, '2023-09-25 05:50:59', '2023-09-25 05:50:59'),
(28, 2, 'F. Professional Performance and Scholarly Works', 0, '2023-09-25 05:51:06', '2023-09-25 05:51:06'),
(29, 2, 'G. Salaries, Fringe Benefits and Incentices', 0, '2023-09-25 05:51:14', '2023-09-25 05:51:14'),
(30, 2, 'H. Professionalism', 0, '2023-09-25 05:51:22', '2023-09-25 05:51:22'),
(42, 2, 'A.1. Copy of Qualification Standards.', 1, '2023-09-25 06:31:45', '2023-09-25 06:31:45'),
(43, 2, 'A.2. The Faculty\'s Personal Data Sheet.', 1, '2023-09-25 06:31:52', '2023-09-25 06:31:52'),
(44, 2, 'A.3. Profile of the faculty according to:', 1, '2023-09-25 06:32:01', '2023-09-25 06:32:01'),
(45, 2, 'A.4. List of Faculty who have received academic awards/recognition.', 1, '2023-09-25 06:32:11', '2023-09-25 06:32:11'),
(46, 2, 'A.3.1. educational qualification;', 2, '2023-09-27 08:35:35', '2023-09-25 06:32:19'),
(47, 2, 'A.3.2. length of academic experience; and', 2, '2023-09-27 08:35:32', '2023-09-25 06:32:27'),
(48, 2, 'A.3.3. field of specialization, if applicable.', 2, '2023-09-27 08:35:30', '2023-09-25 06:32:34'),
(49, 2, 'B.1. Policies on hiring and selection', 1, '2023-09-25 06:33:18', '2023-09-25 06:33:18'),
(50, 2, 'B.2. Criteria used in the selection process.', 1, '2023-09-25 06:33:27', '2023-09-25 06:33:27'),
(51, 2, 'B.3. Composition of the Screening Committee.', 1, '2023-09-25 06:33:35', '2023-09-25 06:33:35'),
(52, 2, 'B.4. Evidence of the selection process showing the names of applicants.', 1, '2023-09-25 06:33:43', '2023-09-25 06:33:43'),
(53, 2, 'B.5. Evidence/s of the Orientation Program for newly-hired faculty.', 1, '2023-09-25 06:33:51', '2023-09-25 06:33:51'),
(54, 2, 'B.6. Policies on inbreeding.', 1, '2023-09-25 06:34:01', '2023-09-25 06:34:01'),
(57, 5, 'A. Priorities and Relevance', 0, '2023-09-29 06:28:00', '2023-09-29 06:28:00'),
(58, 5, 'B. Funding and Other Resources', 0, '2023-09-29 06:28:27', '2023-09-29 06:28:27'),
(59, 5, 'A.1. Copy of the Institutional Research Agenda.', 1, '2023-09-29 06:29:06', '2023-09-29 06:29:06'),
(60, 1, 'A. Statement of Vision, Mission, Goals and Objectives', 0, '2023-11-28 16:12:43', '2023-11-28 16:12:43'),
(61, 1, 'A.1. Vision Statement.', 1, '2023-11-28 16:13:16', '2023-11-28 16:13:16'),
(62, 1, 'A.2. Mission Statement.', 1, '2023-11-28 16:13:22', '2023-11-28 16:13:22'),
(63, 1, 'A.3. Statement of the Goals of the Academic Unit.', 1, '2023-11-28 16:13:32', '2023-11-28 16:13:32'),
(64, 1, 'A.4. Statement of the Program Objectives.', 1, '2023-11-28 16:13:41', '2023-11-28 16:13:41'),
(65, 1, 'A.5. Copy of the Charter of the Institution.', 1, '2023-11-28 16:13:48', '2023-11-28 16:13:48'),
(66, 1, 'A.6. Minutes of Meetings on the formulation, review and revision of the VMGO.', 1, '2023-11-28 16:13:57', '2023-11-28 16:13:57'),
(67, 1, 'A.7. File Copies of Letters of Invitation to Participants.', 1, '2023-11-28 16:14:03', '2023-11-28 16:14:03'),
(68, 1, 'A.8. Attendance Record of Stakeholder-Participants.', 1, '2023-11-28 16:14:11', '2023-11-28 16:14:11'),
(69, 1, 'A.9. Copies of CMOs relevant to VGMO formulation, if any.', 1, '2023-11-28 16:14:17', '2023-11-28 16:14:17'),
(70, 1, 'B. Dissemination and Acceptability', 0, '2023-11-28 16:14:33', '2023-11-28 16:14:33'),
(71, 1, 'C. Congruence and Implementation', 0, '2023-11-28 16:14:40', '2023-11-28 16:14:40'),
(72, 1, 'B.1. Display boards on which the VMGO are posted.', 1, '2023-11-28 16:14:51', '2023-11-28 16:14:51'),
(73, 1, 'B.2. Samples of dissemination materials (brochures, leaflets, flyers, etc.).', 1, '2023-11-28 16:14:59', '2023-11-28 16:14:59'),
(74, 1, 'B.3. Evidences of awareness and acceptability of the VMGO.', 1, '2023-11-28 16:15:07', '2023-11-28 16:15:07'),
(75, 1, 'C.1. Evidence/s of congruence between educational practices/activities and the VMGO.', 1, '2023-11-28 16:15:15', '2023-11-28 16:15:15'),
(76, 1, 'C.2. Awards/citations received by the programs under survey.', 1, '2023-11-28 16:15:27', '2023-11-28 16:15:27'),
(77, 1, 'C.3. List of Linkages, consortia and networking.', 1, '2023-11-28 16:15:35', '2023-11-28 16:15:35'),
(78, 1, 'C.4. Data on employability of graduates.', 1, '2023-11-28 16:15:43', '2023-11-28 16:15:43'),
(79, 10, 'A. Organization', 0, '2023-11-28 16:16:53', '2023-11-28 16:16:53'),
(80, 10, 'B. Academic Administration', 0, '2023-11-28 16:17:00', '2023-11-28 16:17:00'),
(81, 10, 'C. Students Administration', 0, '2023-11-28 16:17:07', '2023-11-28 16:17:07'),
(82, 10, 'D. Financial Managment', 0, '2023-11-28 16:17:14', '2023-11-28 16:17:14'),
(83, 10, 'E. Supply Management', 0, '2023-11-28 16:17:20', '2023-11-28 16:17:20'),
(84, 10, 'F. Records Management', 0, '2023-11-28 16:17:28', '2023-11-28 16:17:28'),
(85, 10, 'G. Institutional Planning and Development', 0, '2023-11-28 16:17:35', '2023-11-28 16:17:35'),
(86, 10, 'A.1. Organizational Chart of the Institution displayed at the Administration Office.', 1, '2023-11-28 16:17:46', '2023-11-28 16:17:46'),
(87, 10, 'A.2. Copy of the Board Resolution approving the organizational structure and other relevant resolutions.', 1, '2023-11-28 16:17:52', '2023-11-28 16:17:52'),
(88, 10, 'A.3. Functional Chart.', 1, '2023-11-28 16:17:58', '2023-11-28 16:17:58'),
(89, 10, 'A.4. Composition of Administrative Council including its powers and functions.', 1, '2023-11-28 16:18:06', '2023-11-28 16:18:06'),
(90, 10, 'A.5. Composition of Administrative Council including its powers and functions.', 1, '2023-11-28 16:18:12', '2023-11-28 16:18:12'),
(91, 10, 'A.6. College/University Code.', 1, '2023-11-28 16:18:18', '2023-11-28 16:18:18'),
(92, 10, 'A.7. System of communication flow.', 1, '2023-11-28 16:18:26', '2023-11-28 16:18:26'),
(93, 10, 'A.8. Administrative/Operations Manual.', 1, '2023-11-28 16:18:32', '2023-11-28 16:18:32'),
(94, 10, 'A.9. Qualification Standards for Administrative Personnel.', 1, '2023-11-28 16:18:39', '2023-11-28 16:18:39'),
(95, 10, 'B.1. Educational profile and functions of the academic administrators.', 1, '2023-11-28 16:18:47', '2023-11-28 16:18:47'),
(96, 10, 'B.1.1. Dean/Director; and', 1, '2023-11-28 16:18:55', '2023-11-28 16:18:55'),
(97, 10, 'B.1.2. Department Chair or his/her equivalent.', 1, '2023-11-28 16:19:02', '2023-11-28 16:19:02'),
(98, 10, 'B.2. Evidence of participatory administration in the College/Institute.', 1, '2023-11-28 16:19:09', '2023-11-28 16:19:09'),
(99, 10, 'B.3. Dean\'s Supervisory Program.', 1, '2023-11-28 16:19:18', '2023-11-28 16:19:18'),
(100, 10, 'G.1. Composition of the Planning Unit, including their functions.', 1, '2023-11-28 16:19:28', '2023-11-28 16:19:28'),
(101, 10, 'G.2. Copy of the Development, long term and short term.', 1, '2023-11-28 16:19:36', '2023-11-28 16:19:36'),
(102, 10, 'G.3. Evidence of participatory financial management.', 1, '2023-11-28 16:19:44', '2023-11-28 16:19:44'),
(103, 10, 'G.4. Description of the inter-office sharing of resources (facilities and equipment).', 1, '2023-11-28 16:19:52', '2023-11-28 16:19:52'),
(104, 10, 'G.5. Copy of the Personnel Performance Evaluation instrument.', 1, '2023-11-28 16:19:59', '2023-11-28 16:19:59'),
(105, 10, 'G.6. Evidence of the use of the Personnel Performance Evaluation results to improve performance delivery of services.', 1, '2023-11-28 16:20:08', '2023-11-28 16:20:08'),
(106, 10, 'G.7. Annual Reports.', 1, '2023-11-28 16:20:17', '2023-11-28 16:20:17'),
(107, 10, 'F.1. Composition of the Records Management Office, their qualification and functions.', 1, '2023-11-28 16:20:28', '2023-11-28 16:20:28'),
(108, 10, 'F.2. Description of the records management in the Institution.', 1, '2023-11-28 16:20:38', '2023-11-28 16:20:38'),
(109, 10, 'F.3. Description of the system of maintaining the confidentiality and security of official records.', 1, '2023-11-28 16:20:48', '2023-11-28 16:20:48'),
(110, 10, 'F.4. Updated records/files identified under Administration.', 1, '2023-11-28 16:20:58', '2023-11-28 16:20:58'),
(111, 10, 'E.1. Composition of the Supply Management Office, including their qualifications, functions and responsibilities.', 1, '2023-11-28 16:21:08', '2023-11-28 16:21:08'),
(112, 10, 'E.2. Description of the system supply management.', 1, '2023-11-28 16:21:16', '2023-11-28 16:21:16'),
(113, 10, 'E.3. Composition and functions of the Bids and Awards Committee.', 1, '2023-11-28 16:21:23', '2023-11-28 16:21:23'),
(114, 10, 'E.4. Evidence of the compliance to RA 9184 (Procurement of equipment, supplies and materials).', 1, '2023-11-28 16:21:31', '2023-11-28 16:21:31'),
(115, 10, 'E.5. File copies of annual inventories of serviceable and non-serviceable equipment.', 1, '2023-11-28 16:21:40', '2023-11-28 16:21:40'),
(116, 10, 'D.1. Qualification of the Head of the FMO, including his/her functions.', 1, '2023-11-28 16:21:51', '2023-11-28 16:21:51'),
(117, 10, 'D.2. Guidelines in budget preparation.', 1, '2023-11-28 16:21:59', '2023-11-28 16:21:59'),
(118, 10, 'D.3. Evidence of participation of the academic unit in budget allocation.', 1, '2023-11-28 16:22:09', '2023-11-28 16:22:09'),
(119, 10, 'D.4. Statement of budget priorities.', 1, '2023-11-28 16:22:25', '2023-11-28 16:22:25'),
(120, 10, 'D.5. Plantilla of Administrative Personnel.', 1, '2023-11-28 16:22:49', '2023-11-28 16:22:49'),
(121, 10, 'C.1. Policies and guidelines on different aspects of student life.', 1, '2023-11-28 16:22:59', '2023-11-28 16:22:59'),
(122, 10, 'C.2. Evidence of students participation in planning and implementation of student activities.', 1, '2023-11-28 16:23:08', '2023-11-28 16:23:08'),
(123, 10, 'C.3. Evidence of good working relationship among the administration, faculty, staff and students.', 1, '2023-11-28 16:23:17', '2023-11-28 16:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `t_instruments_sublist`
--

DROP TABLE IF EXISTS `t_instruments_sublist`;
CREATE TABLE IF NOT EXISTS `t_instruments_sublist` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `ins_parentid` int DEFAULT NULL,
  `ins_text` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_instruments_sublist`
--

INSERT INTO `t_instruments_sublist` (`ins_id`, `ins_parentid`, `ins_text`, `created_at`, `updated_at`) VALUES
(35, 23, 'A.1. Copy of Qualification Standards.', '2023-09-25 06:31:45', '2023-09-25 06:31:45'),
(36, 23, 'A.2. The Faculty\'s Personal Data Sheet.', '2023-09-25 06:31:52', '2023-09-25 06:31:52'),
(37, 23, 'A.3. Profile of the faculty according to:', '2023-09-25 06:32:01', '2023-09-25 06:32:01'),
(38, 23, 'A.4. List of Faculty who have received academic awards/recognition.', '2023-09-25 06:32:11', '2023-09-25 06:32:11'),
(39, 44, 'A.3.1. educational qualification;', '2023-09-25 06:32:19', '2023-09-25 06:32:19'),
(40, 44, 'A.3.2. length of academic experience; and', '2023-09-25 06:32:27', '2023-09-25 06:32:27'),
(41, 44, 'A.3.3. field of specialization, if applicable.', '2023-09-25 06:32:34', '2023-09-25 06:32:34'),
(42, 24, 'B.1. Policies on hiring and selection', '2023-09-25 06:33:18', '2023-09-25 06:33:18'),
(43, 24, 'B.2. Criteria used in the selection process.', '2023-09-25 06:33:27', '2023-09-25 06:33:27'),
(44, 24, 'B.3. Composition of the Screening Committee.', '2023-09-25 06:33:35', '2023-09-25 06:33:35'),
(45, 24, 'B.4. Evidence of the selection process showing the names of applicants.', '2023-09-25 06:33:43', '2023-09-25 06:33:43'),
(46, 24, 'B.5. Evidence/s of the Orientation Program for newly-hired faculty.', '2023-09-25 06:33:51', '2023-09-25 06:33:51'),
(47, 24, 'B.6. Policies on inbreeding.', '2023-09-25 06:34:01', '2023-09-25 06:34:01'),
(49, 57, 'A.1. Copy of the Institutional Research Agenda.', '2023-09-29 06:29:06', '2023-09-29 06:29:06'),
(50, 60, 'A.1. Vision Statement.', '2023-11-28 16:13:16', '2023-11-28 16:13:16'),
(51, 60, 'A.2. Mission Statement.', '2023-11-28 16:13:22', '2023-11-28 16:13:22'),
(52, 60, 'A.3. Statement of the Goals of the Academic Unit.', '2023-11-28 16:13:32', '2023-11-28 16:13:32'),
(53, 60, 'A.4. Statement of the Program Objectives.', '2023-11-28 16:13:41', '2023-11-28 16:13:41'),
(54, 60, 'A.5. Copy of the Charter of the Institution.', '2023-11-28 16:13:48', '2023-11-28 16:13:48'),
(55, 60, 'A.6. Minutes of Meetings on the formulation, review and revision of the VMGO.', '2023-11-28 16:13:57', '2023-11-28 16:13:57'),
(56, 60, 'A.7. File Copies of Letters of Invitation to Participants.', '2023-11-28 16:14:03', '2023-11-28 16:14:03'),
(57, 60, 'A.8. Attendance Record of Stakeholder-Participants.', '2023-11-28 16:14:11', '2023-11-28 16:14:11'),
(58, 60, 'A.9. Copies of CMOs relevant to VGMO formulation, if any.', '2023-11-28 16:14:18', '2023-11-28 16:14:18'),
(59, 70, 'B.1. Display boards on which the VMGO are posted.', '2023-11-28 16:14:51', '2023-11-28 16:14:51'),
(60, 70, 'B.2. Samples of dissemination materials (brochures, leaflets, flyers, etc.).', '2023-11-28 16:14:59', '2023-11-28 16:14:59'),
(61, 70, 'B.3. Evidences of awareness and acceptability of the VMGO.', '2023-11-28 16:15:07', '2023-11-28 16:15:07'),
(62, 71, 'C.1. Evidence/s of congruence between educational practices/activities and the VMGO.', '2023-11-28 16:15:15', '2023-11-28 16:15:15'),
(63, 71, 'C.2. Awards/citations received by the programs under survey.', '2023-11-28 16:15:27', '2023-11-28 16:15:27'),
(64, 71, 'C.3. List of Linkages, consortia and networking.', '2023-11-28 16:15:35', '2023-11-28 16:15:35'),
(65, 71, 'C.4. Data on employability of graduates.', '2023-11-28 16:15:43', '2023-11-28 16:15:43'),
(66, 79, 'A.1. Organizational Chart of the Institution displayed at the Administration Office.', '2023-11-28 16:17:46', '2023-11-28 16:17:46'),
(67, 79, 'A.2. Copy of the Board Resolution approving the organizational structure and other relevant resolutions.', '2023-11-28 16:17:52', '2023-11-28 16:17:52'),
(68, 79, 'A.3. Functional Chart.', '2023-11-28 16:17:58', '2023-11-28 16:17:58'),
(69, 79, 'A.4. Composition of Administrative Council including its powers and functions.', '2023-11-28 16:18:06', '2023-11-28 16:18:06'),
(70, 79, 'A.5. Composition of Administrative Council including its powers and functions.', '2023-11-28 16:18:12', '2023-11-28 16:18:12'),
(71, 79, 'A.6. College/University Code.', '2023-11-28 16:18:18', '2023-11-28 16:18:18'),
(72, 79, 'A.7. System of communication flow.', '2023-11-28 16:18:26', '2023-11-28 16:18:26'),
(73, 79, 'A.8. Administrative/Operations Manual.', '2023-11-28 16:18:32', '2023-11-28 16:18:32'),
(74, 79, 'A.9. Qualification Standards for Administrative Personnel.', '2023-11-28 16:18:39', '2023-11-28 16:18:39'),
(75, 80, 'B.1. Educational profile and functions of the academic administrators.', '2023-11-28 16:18:47', '2023-11-28 16:18:47'),
(76, 95, 'B.1.1. Dean/Director; and', '2023-11-28 16:18:55', '2023-11-28 16:18:55'),
(77, 95, 'B.1.2. Department Chair or his/her equivalent.', '2023-11-28 16:19:02', '2023-11-28 16:19:02'),
(78, 80, 'B.2. Evidence of participatory administration in the College/Institute.', '2023-11-28 16:19:09', '2023-11-28 16:19:09'),
(79, 80, 'B.3. Dean\'s Supervisory Program.', '2023-11-28 16:19:18', '2023-11-28 16:19:18'),
(80, 85, 'G.1. Composition of the Planning Unit, including their functions.', '2023-11-28 16:19:28', '2023-11-28 16:19:28'),
(81, 85, 'G.2. Copy of the Development, long term and short term.', '2023-11-28 16:19:36', '2023-11-28 16:19:36'),
(82, 85, 'G.3. Evidence of participatory financial management.', '2023-11-28 16:19:44', '2023-11-28 16:19:44'),
(83, 85, 'G.4. Description of the inter-office sharing of resources (facilities and equipment).', '2023-11-28 16:19:52', '2023-11-28 16:19:52'),
(84, 85, 'G.5. Copy of the Personnel Performance Evaluation instrument.', '2023-11-28 16:20:00', '2023-11-28 16:20:00'),
(85, 85, 'G.6. Evidence of the use of the Personnel Performance Evaluation results to improve performance delivery of services.', '2023-11-28 16:20:08', '2023-11-28 16:20:08'),
(86, 85, 'G.7. Annual Reports.', '2023-11-28 16:20:17', '2023-11-28 16:20:17'),
(87, 84, 'F.1. Composition of the Records Management Office, their qualification and functions.', '2023-11-28 16:20:28', '2023-11-28 16:20:28'),
(88, 84, 'F.2. Description of the records management in the Institution.', '2023-11-28 16:20:38', '2023-11-28 16:20:38'),
(89, 84, 'F.3. Description of the system of maintaining the confidentiality and security of official records.', '2023-11-28 16:20:48', '2023-11-28 16:20:48'),
(90, 84, 'F.4. Updated records/files identified under Administration.', '2023-11-28 16:20:58', '2023-11-28 16:20:58'),
(91, 83, 'E.1. Composition of the Supply Management Office, including their qualifications, functions and responsibilities.', '2023-11-28 16:21:08', '2023-11-28 16:21:08'),
(92, 83, 'E.2. Description of the system supply management.', '2023-11-28 16:21:16', '2023-11-28 16:21:16'),
(93, 83, 'E.3. Composition and functions of the Bids and Awards Committee.', '2023-11-28 16:21:23', '2023-11-28 16:21:23'),
(94, 83, 'E.4. Evidence of the compliance to RA 9184 (Procurement of equipment, supplies and materials).', '2023-11-28 16:21:31', '2023-11-28 16:21:31'),
(95, 83, 'E.5. File copies of annual inventories of serviceable and non-serviceable equipment.', '2023-11-28 16:21:40', '2023-11-28 16:21:40'),
(96, 82, 'D.1. Qualification of the Head of the FMO, including his/her functions.', '2023-11-28 16:21:51', '2023-11-28 16:21:51'),
(97, 82, 'D.2. Guidelines in budget preparation.', '2023-11-28 16:21:59', '2023-11-28 16:21:59'),
(98, 82, 'D.3. Evidence of participation of the academic unit in budget allocation.', '2023-11-28 16:22:09', '2023-11-28 16:22:09'),
(99, 82, 'D.4. Statement of budget priorities.', '2023-11-28 16:22:25', '2023-11-28 16:22:25'),
(100, 82, 'D.5. Plantilla of Administrative Personnel.', '2023-11-28 16:22:49', '2023-11-28 16:22:49'),
(101, 81, 'C.1. Policies and guidelines on different aspects of student life.', '2023-11-28 16:22:59', '2023-11-28 16:22:59'),
(102, 81, 'C.2. Evidence of students participation in planning and implementation of student activities.', '2023-11-28 16:23:08', '2023-11-28 16:23:08'),
(103, 81, 'C.3. Evidence of good working relationship among the administration, faculty, staff and students.', '2023-11-28 16:23:17', '2023-11-28 16:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `t_programs`
--

DROP TABLE IF EXISTS `t_programs`;
CREATE TABLE IF NOT EXISTS `t_programs` (
  `prog_id` int NOT NULL AUTO_INCREMENT,
  `prog_program` varchar(255) NOT NULL,
  `prog_type` varchar(255) NOT NULL,
  `prog_level` varchar(255) NOT NULL,
  `prog_rating` decimal(3,2) NOT NULL,
  `prog_validity` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_programs`
--

INSERT INTO `t_programs` (`prog_id`, `prog_program`, `prog_type`, `prog_level`, `prog_rating`, `prog_validity`, `created_at`, `updated_at`) VALUES
(6, 'Bachelor of Science in Manufacturing Engineering Technology', 'Graduate', 'Level I', '3.50', '2023-12-31', '2023-12-05 08:10:39', '2023-12-05 08:10:39'),
(5, 'Bachelor of Science in Manufacturing Engineering Technology', 'Graduate', 'For PSV Accreditation', '3.00', '2023-12-10', '2023-12-05 08:09:34', '2023-12-05 08:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `t_program_instruments`
--

DROP TABLE IF EXISTS `t_program_instruments`;
CREATE TABLE IF NOT EXISTS `t_program_instruments` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `ins_progid` int NOT NULL,
  `ins_text` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ins_code` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_program_instruments`
--

INSERT INTO `t_program_instruments` (`ins_id`, `ins_progid`, `ins_text`, `ins_code`, `created_at`, `updated_at`) VALUES
(1, 6, 'AREA I: VISION, MISSION, GOALS AND OBJECTIVES', 'AREA I', '2023-12-05 17:27:05', '0000-00-00 00:00:00'),
(2, 6, 'AREA II: FACULTY', 'AREA II', '2023-12-05 17:27:13', '0000-00-00 00:00:00'),
(3, 6, 'AREA III: CURRICULUM AND INSTRUCTION', 'AREA III', '2023-12-05 17:27:13', '0000-00-00 00:00:00'),
(17, 6, 'qwe', NULL, '2023-12-05 09:47:32', '2023-12-05 09:47:32'),
(18, 6, 'AREA IV: TESTING', NULL, '2023-12-05 10:00:49', '2023-12-05 10:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `t_program_instruments_sub`
--

DROP TABLE IF EXISTS `t_program_instruments_sub`;
CREATE TABLE IF NOT EXISTS `t_program_instruments_sub` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `ins_progid` int DEFAULT NULL,
  `ins_parentid` int DEFAULT NULL,
  `ins_text` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ins_level` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_program_instruments_sub`
--

INSERT INTO `t_program_instruments_sub` (`ins_id`, `ins_progid`, `ins_parentid`, `ins_text`, `ins_level`, `created_at`, `updated_at`) VALUES
(3, 6, 18, 'ewewe', 0, '2023-12-05 10:17:37', '2023-12-05 10:17:37'),
(4, 6, 18, 'assadsadsadsadsa', 0, '2023-12-05 10:18:42', '2023-12-05 10:18:42'),
(6, 6, 18, 'xxxxxxxxxxxx', 1, '2023-12-05 10:33:26', '2023-12-05 10:33:26'),
(7, 6, 18, 'rrrrrr', 1, '2023-12-05 10:47:00', '2023-12-05 10:47:00'),
(8, 6, 18, 'qwewqewqe', 1, '2023-12-05 10:54:52', '2023-12-05 10:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `t_program_instruments_sublist`
--

DROP TABLE IF EXISTS `t_program_instruments_sublist`;
CREATE TABLE IF NOT EXISTS `t_program_instruments_sublist` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `ins_progid` int DEFAULT NULL,
  `ins_parentid` int DEFAULT NULL,
  `ins_text` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_program_instruments_sublist`
--

INSERT INTO `t_program_instruments_sublist` (`ins_id`, `ins_progid`, `ins_parentid`, `ins_text`, `created_at`, `updated_at`) VALUES
(1, 6, 4, 'xxxxxxxxxxxx', '2023-12-05 10:33:26', '2023-12-05 10:33:26'),
(2, 6, 4, 'rrrrrr', '2023-12-05 10:47:00', '2023-12-05 10:47:00'),
(3, 6, 2, 'qwewqewqe', '2023-12-05 10:54:52', '2023-12-05 10:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
