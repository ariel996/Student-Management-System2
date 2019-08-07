-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 02:28 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `attended` int(11) DEFAULT '0',
  `attendance_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `teacher_id`, `attended`, `attendance_date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '05/06/2019', '13:10', '15:10', '2019-05-15 17:55:01', '2019-05-15 17:55:01'),
(2, 4, 1, 1, '05/21/2019', '09:20', '11:30', '2019-05-21 13:39:40', '2019-05-21 13:39:40'),
(3, 3, 1, 0, '05/22/2019', '12:00', '14:00', '2019-05-22 15:38:32', '2019-05-22 15:38:32'),
(4, 3, 1, NULL, '06/12/2019', '08:00', '10:00', '2019-06-09 05:21:25', '2019-06-09 05:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `clearances`
--

CREATE TABLE `clearances` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `library` int(11) DEFAULT NULL,
  `exam_record` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `clearance_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearances`
--

INSERT INTO `clearances` (`id`, `student_id`, `library`, `exam_record`, `department`, `clearance_date`, `remark`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, '06/06/2019', 'ok', '2019-05-29 10:41:19', '2019-06-06 00:20:06'),
(2, 3, 1, 0, 0, '06/06/2019', 'no', '2019-06-05 08:54:22', '2019-06-06 00:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `complaint_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `student_id`, `complaint_code`, `complaint_type`, `complaint_message`, `complaint_status`, `created_at`, `updated_at`) VALUES
(1, 3, 'QF8GOF', 'CA marks', 'I have a problem with my Exam mark', 1, '2019-05-05 09:43:15', '2019-06-09 05:15:14'),
(2, 4, 'ORT5RL', 'Exam mark', 'Hello sir, I have a problem with my Exam mark on Industrial Intership', 1, '2019-05-16 15:21:33', '2019-05-16 15:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `course_type` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_credit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `course_type`, `semester_id`, `level`, `course_code`, `course_name`, `course_credit`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 1, '600', 'CSCT6104', 'Cryptography and Applications', 3, '2019-05-16 18:05:47', '2019-05-16 18:05:47'),
(8, 1, 2, 1, '600', 'CSCT6541', 'Artificial intelligence & Expert Systems', 3, '2019-05-16 18:07:10', '2019-05-16 18:07:10'),
(9, 1, 2, 1, '300', 'CSCT3210', 'Database Design & Implementation', 2, '2019-05-16 18:10:40', '2019-05-16 18:10:40'),
(10, 24, 2, 1, '600', 'SEDT6102', 'EDUCATIONAL ADMINISTRATION AND PLANNING II', 2, '2019-06-09 05:10:44', '2019-06-09 05:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `courseteaches`
--

CREATE TABLE `courseteaches` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courseteaches`
--

INSERT INTO `courseteaches` (`id`, `course_id`, `teacher_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, '2019-05-12 10:52:56', '2019-05-12 10:52:56'),
(2, 9, 2, 1, '2019-05-12 11:13:35', '2019-05-12 11:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `department_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `school_id`, `department_code`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'CSC', 'Computer Science', '2019-05-04 12:33:16', '2019-05-04 12:33:16'),
(2, 1, 'MAT', 'Mathematics', '2019-05-05 01:24:38', '2019-05-05 01:24:38'),
(3, 1, 'CHE', 'Chemistry', '2019-05-05 01:25:00', '2019-05-05 01:25:00'),
(4, 1, 'PHY', 'Physics', '2019-05-05 01:25:16', '2019-05-05 01:25:16'),
(5, 1, 'SED', 'Science of Education', '2019-05-05 01:25:39', '2019-05-05 01:25:39'),
(6, 1, 'EML', 'English Modern Letters', '2019-05-05 01:26:05', '2019-05-05 01:26:05'),
(7, 1, 'BIL', 'Bilingual Letters', '2019-05-05 01:26:25', '2019-05-05 01:26:25'),
(8, 1, 'HIS', 'History', '2019-05-05 01:26:40', '2019-05-05 01:26:40'),
(9, 1, 'GEO', 'Geography', '2019-05-05 01:31:51', '2019-05-05 01:31:51'),
(10, 1, 'BIO', 'Biology', '2019-05-05 01:32:24', '2019-05-05 01:32:24'),
(11, 1, 'GLY', 'Geology', '2019-05-05 01:32:47', '2019-05-05 01:32:47'),
(12, 1, 'PHI', 'Philosophy', '2019-05-05 01:33:06', '2019-05-05 01:33:06'),
(13, 1, 'GAC', 'Guidance and Counselling', '2019-05-05 01:33:26', '2019-05-05 01:33:26'),
(14, 1, 'ECO', 'Economics', '2019-05-05 01:33:40', '2019-05-05 01:33:40'),
(15, 1, 'COS', 'Computer Sciences', '2019-05-05 01:33:56', '2019-05-05 01:33:56'),
(16, 1, 'FML', 'French Modern Letters', '2019-05-05 01:34:15', '2019-05-05 01:34:15'),
(17, 2, 'ADT', 'Administrative Techniques', '2019-05-05 01:35:50', '2019-05-05 01:35:50'),
(18, 2, 'CEFT', 'Civil Engineering & Foresty Techniques', '2019-05-05 01:36:15', '2019-05-05 01:36:15'),
(19, 2, 'ME', 'Mechanical Engineering', '2019-05-05 01:36:37', '2019-05-05 01:36:37'),
(20, 2, 'SEFM', 'Social Economy and Family Management', '2019-05-05 01:37:06', '2019-05-05 01:37:06'),
(21, 2, 'EPE', 'Electrical & Power Engineering', '2019-05-05 01:37:31', '2019-05-05 01:37:31'),
(22, 2, 'FUN', 'Fundamental Sciences', '2019-05-05 01:37:50', '2019-05-05 01:37:50'),
(23, 2, 'LAW', 'Law', '2019-05-05 01:38:05', '2019-05-05 01:38:05'),
(24, 2, 'SED', 'Science of Education', '2019-05-05 01:38:20', '2019-05-05 01:38:20'),
(25, 3, 'BIO', 'Biochemistry', '2019-05-06 13:22:49', '2019-05-06 13:22:49'),
(26, 3, 'BIS', 'Biological Sciences', '2019-05-06 13:23:13', '2019-05-06 13:23:13'),
(27, 3, 'CHE', 'Chemistry', '2019-05-06 13:23:26', '2019-05-06 13:23:26'),
(28, 3, 'MCS', 'Mathematics & Computer Sciences', '2019-05-06 13:23:50', '2019-05-06 13:23:50'),
(29, 3, 'PHY', 'Physics', '2019-05-06 13:24:01', '2019-05-06 13:24:01'),
(30, 3, 'GMES', 'Geology, Mining & Env. Sciences', '2019-05-06 13:24:26', '2019-05-06 13:24:26'),
(31, 4, 'BCS', 'Biomedical Sciences', '2019-05-06 13:26:39', '2019-05-06 13:26:39'),
(32, 4, 'CLS', 'Clinical Sciences', '2019-05-06 13:27:00', '2019-05-06 13:27:00'),
(33, 4, 'MLS', 'Medical & Lab. Sciences', '2019-05-06 13:27:21', '2019-05-06 13:27:21'),
(34, 4, 'NUR', 'Nursing', '2019-05-06 13:27:35', '2019-05-06 13:27:35'),
(35, 5, 'ACF', 'Accounting & Finance', '2019-05-06 13:27:57', '2019-05-06 13:27:57'),
(36, 5, 'MKT', 'Marketing', '2019-05-06 13:28:16', '2019-05-06 13:28:16'),
(37, 5, 'INS', 'Insurance', '2019-05-06 13:28:51', '2019-05-06 13:28:51'),
(38, 5, 'MGT', 'Management', '2019-05-06 13:29:13', '2019-05-06 13:29:13'),
(39, 6, 'BPT', 'Bio Process Technology', '2019-05-06 13:29:41', '2019-05-06 13:29:41'),
(40, 6, 'BAS', 'Basic Science', '2019-05-06 13:29:59', '2019-05-06 13:29:59'),
(41, 6, 'AGT', 'Agribusiness Technology', '2019-05-06 13:30:24', '2019-05-06 13:30:24'),
(42, 6, 'APT', 'Animal Production Technology', '2019-05-06 13:30:57', '2019-05-06 13:30:57'),
(43, 6, 'CPT', 'Crop Production Technology', '2019-05-06 13:31:29', '2019-05-06 13:31:29'),
(44, 7, 'LAT', 'Land Transport', '2019-05-06 13:31:59', '2019-05-06 13:31:59'),
(45, 7, 'TRL', 'Transit and Logistics', '2019-05-06 13:32:20', '2019-05-06 13:32:20'),
(46, 7, 'CUS', 'Customs', '2019-05-06 13:32:35', '2019-05-06 13:32:35'),
(47, 7, 'MTT', 'Maritime Transport', '2019-05-06 13:32:53', '2019-05-06 13:32:53'),
(48, 7, 'GLS', 'General Studies', '2019-05-06 13:33:13', '2019-05-06 13:33:13'),
(49, 8, 'ENG', 'English', '2019-05-06 13:33:32', '2019-05-06 13:33:32'),
(50, 8, 'GEP', 'Geography and Planning', '2019-05-06 13:33:56', '2019-05-06 13:33:56'),
(51, 8, 'HIA', 'History and Archaeology', '2019-05-06 13:34:26', '2019-05-06 13:34:26'),
(52, 8, 'LAL', 'Linguistics and African Languages', '2019-05-06 13:34:49', '2019-05-06 13:34:49'),
(53, 8, 'PVA', 'Performing and Visual Arts', '2019-05-06 13:35:18', '2019-05-06 13:35:18'),
(54, 8, 'CDS', 'Communication and Development Studies', '2019-05-06 13:36:07', '2019-05-06 13:36:07'),
(55, 8, 'PHI', 'Philosophy', '2019-05-06 13:36:35', '2019-05-06 13:36:35'),
(56, 8, 'ACFA', 'Acting Coordinator of Fine Arts', '2019-05-06 13:37:25', '2019-05-06 13:37:25'),
(57, 8, 'CFE', 'Coordinator Functional English', '2019-05-06 13:37:53', '2019-05-06 13:37:53'),
(58, 8, 'CFF', 'Coordinator Functional French', '2019-05-06 13:38:12', '2019-05-06 13:38:12'),
(59, 8, 'CVE', 'Coordinator Civics and Ethics', '2019-05-06 13:38:40', '2019-05-06 13:38:40'),
(60, 9, 'ENGL', 'English Law', '2019-05-06 13:39:15', '2019-05-06 13:39:15'),
(61, 9, 'PBL', 'Public Law', '2019-05-06 13:39:37', '2019-05-06 13:39:37'),
(62, 9, 'POS', 'Political Science', '2019-05-06 13:39:56', '2019-05-06 13:39:56'),
(63, 9, 'FRL', 'French Law', '2019-05-06 13:40:08', '2019-05-06 13:40:08'),
(64, 10, 'ECO', 'Economics', '2019-05-06 13:40:22', '2019-05-06 13:40:22'),
(65, 10, 'Accounting', 'ACC', '2019-05-06 13:40:40', '2019-05-06 13:40:40'),
(66, 10, 'MGT', 'Management', '2019-05-06 13:40:56', '2019-05-06 13:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `fees_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `fees_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `mark_ca` double(8,2) NOT NULL,
  `mark_exam` double(8,2) NOT NULL,
  `mark_resit` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `course_id`, `student_id`, `semester_id`, `mark_ca`, `mark_exam`, `mark_resit`, `created_at`, `updated_at`) VALUES
(1, 8, 4, 1, 25.00, 45.00, NULL, '2019-06-05 21:23:28', '2019-06-05 21:23:28'),
(2, 8, 4, 1, 20.00, 22.00, NULL, '2019-06-09 05:22:56', '2019-06-09 05:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_02_13_201605_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_03_07_105454_create_schools_table', 1),
(5, '2019_03_07_105825_create_departments_table', 1),
(6, '2019_03_07_110156_create_specialities_table', 1),
(7, '2019_03_07_111203_create_type_courses_table', 1),
(8, '2019_03_07_111427_create_semesters_table', 1),
(9, '2019_03_07_111639_create_teachers_table', 1),
(10, '2019_03_07_113548_create_courses_table', 1),
(11, '2019_03_07_114444_create_students_table', 1),
(12, '2019_03_07_114555_create_fees_table', 1),
(13, '2019_03_07_122909_create_attendances_table', 1),
(14, '2019_03_07_123120_create_marks_table', 1),
(15, '2019_03_07_123550_create_courseteaches_table', 1),
(16, '2019_03_07_125458_create_studentcourses_table', 1),
(17, '2019_04_22_193630_create_complaints_table', 1),
(18, '2019_05_29_113201_create_clearances_table', 2),
(20, '2019_06_06_051304_create_images_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nullarray@outlook.com', '$2y$10$natxi86VqLIRvQTBEtW7S.reTe1M1C/KpSOc2xuw7ItQAzxzLMjoW', '2019-05-22 11:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'teacher', NULL, NULL),
(3, 'student', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_code`, `school_name`, `school_description`, `created_at`, `updated_at`) VALUES
(1, 'HTTC', 'Higher Teacher Training College', 'general school', '2019-05-04 12:25:50', '2019-05-08 16:12:07'),
(2, 'HTTTC', 'Higher Technical Teacher Training College', 'technical school', '2019-05-04 12:32:23', '2019-05-04 12:32:23'),
(3, 'FOS', 'Faculty of Science', 'Faculty of Science', '2019-05-06 13:18:33', '2019-05-06 13:18:33'),
(4, 'FHS', 'Faculty of Health Sciences', 'faculty of health sciences', '2019-05-06 13:19:01', '2019-05-06 13:19:01'),
(5, 'HICM', 'Higher Institute of Commerce and Management', 'higher', '2019-05-06 13:19:28', '2019-05-06 13:19:28'),
(6, 'COLTECH', 'College of Technology', 'College of Technology', '2019-05-06 13:20:02', '2019-05-06 13:20:02'),
(7, 'HITL', 'Higher Institute of Transport and Logistics', 'Higher institute of Transport and Logistics', '2019-05-06 13:20:38', '2019-05-06 13:20:38'),
(8, 'FOA', 'Faculty of Arts', 'faculty of arts', '2019-05-06 13:20:54', '2019-05-06 13:20:54'),
(9, 'FLPS', 'Faculty of Law and Political Science', 'Faculty', '2019-05-06 13:21:21', '2019-05-06 13:21:21'),
(10, 'FEMS', 'Faculty of Economics and Management Sciences', 'FEMS', '2019-05-06 13:21:44', '2019-05-06 13:21:44'),
(11, 'NAPI', 'National Polytechnique', 'school of engineers', '2019-06-05 08:43:19', '2019-06-05 08:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `num_semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_univ` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `num_semester`, `annee_univ`, `created_at`, `updated_at`) VALUES
(1, '1', '2018/2019', NULL, NULL),
(2, '2', '2018/2019', NULL, NULL),
(3, '1', '2019/2020', '2019-05-16 17:11:34', '2019-05-16 17:11:34'),
(4, '2', '2019/2020', '2019-05-16 17:11:43', '2019-05-16 17:11:43'),
(5, '1', '2020/2021', '2019-05-16 17:55:41', '2019-05-16 17:55:41'),
(6, '2', '2020/2021', '2019-05-16 17:55:48', '2019-05-16 17:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `speciality_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_name` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `department_id`, `speciality_code`, `speciality_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'FCS', 'Fundamental Computer Science', '2019-05-06 13:41:24', '2019-05-06 13:41:24'),
(2, 1, 'ICT', 'Information, Communication and Technology', '2019-05-06 13:41:49', '2019-05-06 13:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourses`
--

CREATE TABLE `studentcourses` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentcourses`
--

INSERT INTO `studentcourses` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 4, 8, '2019-05-21 08:54:18', '2019-05-21 08:54:18'),
(2, 4, 7, '2019-05-21 08:55:24', '2019-05-21 08:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `student_matricule` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_dob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_pob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `school_id`, `department_id`, `student_matricule`, `student_name`, `student_surname`, `student_level`, `student_dob`, `student_pob`, `student_phone`, `student_address`, `student_email`, `created_at`, `updated_at`) VALUES
(3, 4, 2, 1, '14T0226', 'YANDJEU NANA', 'ARIEL DE GUILIQUE', '600', '05/02/1996', 'BAFIA', '699501442', 'BAMBILI', 'arieldeguilique@hotmail.com', '2019-05-05 08:27:00', '2019-05-05 08:27:00'),
(4, 5, 2, 1, 'UBa17T0486', 'DJUKEM TAZI', 'FLAVIE', '600', '06/07/1994', 'MBOUDA', '684571247', 'YAOUNDE', 'dtzflavie@gmail.com', '2019-05-16 15:04:08', '2019-05-16 15:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `teacher_matricule` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_grade` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `teacher_matricule`, `teacher_name`, `teacher_surname`, `teacher_grade`, `teacher_phone`, `teacher_email`, `created_at`, `updated_at`) VALUES
(1, 3, '10B845', 'FOGUE SIMO', 'EMMANUEL', 'MASTER', '699501442', 'foguemmanuel@gmail.com', '2019-05-04 16:20:57', '2019-05-04 16:20:57'),
(2, 2, 'N-10845', 'NANJIP NJOJIP', 'RODRIGUE', 'DIPET 1', '655478214', 'rodriguenanjip@gmail.com', '2019-05-12 11:12:40', '2019-05-12 11:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `type_courses`
--

CREATE TABLE `type_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_courses`
--

INSERT INTO `type_courses` (`id`, `code_type`, `type_description`, `created_at`, `updated_at`) VALUES
(1, 'E', 'Elective', NULL, NULL),
(2, 'R', 'Required', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'ariel', 'arielyandjeu@yahoo.fr', NULL, '$2y$10$nvnWxwwX5znKJ5VlGcQGS.Hq7on9uFnZlN1gpGnopMXoH1hMoeXqO', '4Vm13vKFDU0uhjpFO0qIJRUDIkV3JDKivtROmq2XuRKSMasJmuIgudFvRFXz', '2019-05-04 12:16:43', '2019-05-04 12:16:43'),
(3, 2, 'dimitry', 'arielnana913@gmail.com', NULL, '$2y$10$QjgKmp07faa8/MDssZ3gpu9FBZPJD.4ejPvX2FIdga4s01LaxC13G', 'lnUPjqWVdQoLQanjyjMmjilt3zq8XeqOwrUlwYMtZFzF5lmXPthhvhjqZOcE', '2019-05-04 12:35:43', '2019-05-04 12:35:43'),
(4, 3, 'de varil', 'arieldeguilique@hotmail.com', NULL, '$2y$10$ejmDn5nPjR3AZta20sOLyumcmiP4uhO4Kvg5TcqVSqvQtvJrmSV96', 'lhjU4i3bVP4dsugFPuzJJnmeRUPCdYF84t0cIMM2p3IqSxBg1rFKEuTWjzAk', '2019-05-04 12:36:29', '2019-05-04 12:36:29'),
(5, 3, 'nullarray', 'nullarray@outlook.com', NULL, '$2y$10$z8tDXDp3ur4JwjQ2M1QxXeZat8ADNcfRnVfugIc6XZYiJb3FJaELW', 'uMIcjbFlxqdEuUGsOcoOyKFoCTNXDrdT0lCnu384qo9iwjNh9XpN6VsgfeoP', '2019-05-04 16:18:06', '2019-05-04 16:18:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `clearances`
--
ALTER TABLE `clearances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clearances_student_id_foreign` (`student_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_student_id_foreign` (`student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_type` (`course_type`),
  ADD KEY `courses_department_id_foreign` (`department_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `courseteaches`
--
ALTER TABLE `courseteaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseteaches_course_id_foreign` (`course_id`),
  ADD KEY `courseteaches_teacher_id_foreign` (`teacher_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_school_id_foreign` (`school_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_student_id_foreign` (`student_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_student_id_foreign` (`student_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_course_id_foreign` (`course_id`),
  ADD KEY `marks_student_id_foreign` (`student_id`),
  ADD KEY `marks_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialities_department_id_foreign` (`department_id`);

--
-- Indexes for table `studentcourses`
--
ALTER TABLE `studentcourses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentcourses_student_id_foreign` (`student_id`),
  ADD KEY `studentcourses_course_id_foreign` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_school_id_foreign` (`school_id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `type_courses`
--
ALTER TABLE `type_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearances`
--
ALTER TABLE `clearances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courseteaches`
--
ALTER TABLE `courseteaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentcourses`
--
ALTER TABLE `studentcourses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_courses`
--
ALTER TABLE `type_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `clearances`
--
ALTER TABLE `clearances`
  ADD CONSTRAINT `clearances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course_type` FOREIGN KEY (`course_type`) REFERENCES `type_courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semester_id` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseteaches`
--
ALTER TABLE `courseteaches`
  ADD CONSTRAINT `courseteaches_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courseteaches_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `marks_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `specialities`
--
ALTER TABLE `specialities`
  ADD CONSTRAINT `specialities_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentcourses`
--
ALTER TABLE `studentcourses`
  ADD CONSTRAINT `studentcourses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `studentcourses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
