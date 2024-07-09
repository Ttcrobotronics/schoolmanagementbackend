-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2024 at 11:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_class_teacher`
--

CREATE TABLE `assign_class_teacher` (
  `id` int NOT NULL,
  `class_id` int DEFAULT NULL,
  `teacher_id` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `is_delete` tinyint DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assign_class_teacher`
--

INSERT INTO `assign_class_teacher` (`id`, `class_id`, `teacher_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(14, 9, 17, 5, 0, 1, '2024-07-01 09:39:28', '2024-07-01 09:39:28'),
(16, 10, 17, 5, 0, 0, '2024-07-01 09:48:03', '2024-07-01 09:48:09'),
(17, 4, 17, 5, 0, 0, '2024-07-01 10:09:51', '2024-07-01 10:09:51'),
(18, 3, 17, 5, 0, 0, '2024-07-01 10:10:00', '2024-07-01 10:10:00'),
(19, 8, 17, 5, 0, 0, '2024-07-01 10:10:14', '2024-07-01 10:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:active, 1:inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0:not, 1:yes',
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'class7', 0, 0, 5, '2024-06-23 08:49:21', '2024-06-24 10:26:49'),
(4, 'class6', 0, 0, 5, '2024-06-23 08:49:35', '2024-06-24 10:26:40'),
(5, 'class5', 1, 0, 5, '2024-06-23 08:52:13', '2024-06-24 10:26:31'),
(7, 'class4', 0, 0, 5, '2024-06-24 10:18:48', '2024-06-24 10:26:19'),
(8, 'class3', 0, 0, 5, '2024-06-24 10:18:56', '2024-06-24 10:26:08'),
(9, 'class2', 0, 0, 5, '2024-06-24 10:19:14', '2024-06-24 10:26:01'),
(10, 'class1', 0, 0, 5, '2024-06-24 10:19:22', '2024-06-24 10:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(9, '10', '5', '5', 0, 0, '2024-06-24 06:39:19', '2024-06-24 06:39:19'),
(10, '10', '6', '5', 0, 0, '2024-06-24 06:39:19', '2024-06-24 06:39:57'),
(15, '9', '5', '5', 0, 0, '2024-06-28 05:22:27', '2024-06-28 05:22:27'),
(16, '9', '4', '5', 0, 0, '2024-06-28 05:22:27', '2024-06-28 05:22:27'),
(17, '9', '1', '5', 0, 0, '2024-06-28 05:22:27', '2024-06-28 05:22:27'),
(18, '9', '7', '5', 0, 0, '2024-06-28 05:22:27', '2024-06-28 05:22:27'),
(19, '9', '6', '5', 0, 0, '2024-06-28 05:22:27', '2024-06-28 05:22:27'),
(20, '8', '5', '5', 0, 0, '2024-07-09 05:11:39', '2024-07-09 05:11:39'),
(21, '8', '4', '5', 0, 0, '2024-07-09 05:11:39', '2024-07-09 05:11:39'),
(22, '8', '1', '5', 0, 0, '2024-07-09 05:11:39', '2024-07-09 05:11:39'),
(23, '8', '7', '5', 0, 0, '2024-07-09 05:11:39', '2024-07-09 05:11:39'),
(24, '8', '6', '5', 0, 0, '2024-07-09 05:11:39', '2024-07-09 05:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetable`
--

CREATE TABLE `class_subject_timetable` (
  `id` int NOT NULL,
  `class_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `week_id` int DEFAULT NULL,
  `start_time` varchar(25) NOT NULL,
  `end_time` varchar(25) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class_subject_timetable`
--

INSERT INTO `class_subject_timetable` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(7, 9, 1, 1, '09:08', '06:07', '767', '2024-07-03 10:52:07', '2024-07-03 10:52:07'),
(8, 9, 7, 1, '09:30', '10:00', '12345', '2024-07-03 10:55:19', '2024-07-03 10:55:19'),
(9, 9, 7, 2, '10:01', '11:00', '55363', '2024-07-03 10:55:19', '2024-07-03 10:55:19'),
(10, 9, 7, 3, '11:01', '12:30', '6467', '2024-07-03 10:55:19', '2024-07-03 10:55:19'),
(11, 9, 7, 4, '15:00', '16:00', '55', '2024-07-03 10:55:19', '2024-07-03 10:55:19'),
(15, 10, 6, 1, '12:44', '03:04', '565', '2024-07-04 04:36:12', '2024-07-04 04:36:12'),
(16, 10, 6, 2, '23:04', '06:56', '6565', '2024-07-04 04:36:12', '2024-07-04 04:36:12'),
(17, 10, 6, 3, '05:45', '04:56', '565', '2024-07-04 04:36:12', '2024-07-04 04:36:12'),
(18, 10, 6, 4, '03:46', '06:35', '46346', '2024-07-04 04:36:12', '2024-07-04 04:36:12'),
(19, 10, 6, 5, '06:34', '03:06', '346346', '2024-07-04 04:36:12', '2024-07-04 04:36:12'),
(20, 10, 6, 6, '03:46', '04:06', '46436', '2024-07-04 04:36:12', '2024-07-04 04:36:12'),
(21, 8, 7, 1, '23:00', '03:00', '76876', '2024-07-04 04:37:13', '2024-07-04 04:37:13'),
(22, 8, 7, 2, '04:00', '07:00', '5646', '2024-07-04 04:37:13', '2024-07-04 04:37:13'),
(23, 8, 7, 3, '02:00', '03:00', '76868', '2024-07-04 04:37:13', '2024-07-04 04:37:13'),
(24, 8, 7, 4, '05:06', '06:56', '6546', '2024-07-04 04:37:13', '2024-07-04 04:37:13'),
(25, 8, 1, 1, '05:05', '04:03', '5454', '2024-07-04 04:37:26', '2024-07-04 04:37:26'),
(26, 8, 4, 1, '04:35', '04:35', '36536', '2024-07-04 04:37:42', '2024-07-04 04:37:42'),
(27, 8, 5, 1, '03:45', '05:44', '5646', '2024-07-04 04:37:52', '2024-07-04 04:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `note`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'english test', 'demo exam', 5, 1, '2024-07-04 09:09:58', '2024-07-04 09:59:43'),
(2, 'hindi sub', 'demo test', 5, 0, '2024-07-04 09:11:08', '2024-07-04 09:45:44'),
(3, 'maths', 'demo math', 5, 0, '2024-07-04 09:59:55', '2024-07-04 09:59:55'),
(4, 'demo', 'test', 5, 0, '2024-07-09 10:43:30', '2024-07-09 10:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int NOT NULL,
  `exam_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `end_time` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `room_number` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `full_marks` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `passing_mark` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `room_number`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 8, 6, '2024-03-31', '03:12', '03:43', '434', '100', '60', 5, '2024-07-05 04:57:00', '2024-07-05 04:57:00'),
(2, 3, 9, 7, '2024-03-02', '03:43', '03:43', '34', '434', '34', 5, '2024-07-05 04:57:00', '2024-07-05 04:57:00'),
(3, 3, 9, 1, '2024-05-05', '04:05', '03:04', '34', '12', '434', 5, '2024-07-05 04:57:00', '2024-07-05 04:57:00'),
(4, 4, 8, 7, '2024-02-04', '03:04', '03:43', '324', '43', '12', 5, '2024-07-09 10:44:20', '2024-07-09 10:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks_register`
--

CREATE TABLE `marks_register` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `exam_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `class_work` int NOT NULL DEFAULT '0',
  `home_work` int NOT NULL DEFAULT '0',
  `test_work` int NOT NULL DEFAULT '0',
  `exam` int NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marks_register`
--

INSERT INTO `marks_register` (`id`, `student_id`, `exam_id`, `class_id`, `subject_id`, `class_work`, `home_work`, `test_work`, `exam`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 15, 3, 8, 6, 10, 10, 20, 20, 17, '2024-07-09 10:32:43', '2024-07-09 10:33:05'),
(2, 15, 4, 8, 7, 5, 5, 5, 5, 5, '2024-07-09 10:45:12', '2024-07-09 10:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_06_23_131304_create_subject_table', 2),
(10, '2024_06_24_042837_create_class_subject_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `is_delete` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `status`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'hindi', 'Theory', '0', 5, 0, '2024-06-23 08:42:18', '2024-06-23 09:10:29'),
(4, 'english', 'Theory', '0', 5, 0, '2024-06-24 01:21:00', '2024-06-24 01:21:00'),
(5, 'economy', 'Theory', '0', 5, 0, '2024-06-24 04:50:13', '2024-06-24 04:50:13'),
(6, 'science', 'Practical', '0', 5, 0, '2024-06-24 04:50:25', '2024-06-24 04:50:25'),
(7, 'maths', 'Theory', '0', 5, 0, '2024-06-24 04:50:36', '2024-06-24 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `admission_number` int DEFAULT NULL,
  `roll_number` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` bigint DEFAULT NULL,
  `admission_date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `qualification` text COLLATE utf8mb4_unicode_ci,
  `work_experience` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint NOT NULL DEFAULT '3' COMMENT '1:admin, 2:teacher, 3:student, 4:parent',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:active, 1:inactive',
  `parent_id` int DEFAULT NULL,
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0:not , 1:yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `state`, `city`, `country`, `profile_image`, `usertype`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `mobile_number`, `admission_date`, `blood_group`, `height`, `weight`, `occupation`, `marital_status`, `address`, `permanent_address`, `qualification`, `work_experience`, `note`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `status`, `parent_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(5, 'Admin', '', NULL, NULL, NULL, '1719052530.png', 'admin', 0, 0, 0, '', '', '', '', 0, '', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', NULL, '$2y$12$SfYHrvsDQ9Zr4ABD28bzYudzm47BZ4PawogqS/JHD17HqXyFUfhbi', NULL, 1, 0, NULL, 0, NULL, '2024-06-28 01:56:28'),
(6, 'demo', 'test', NULL, NULL, NULL, '1719073644.png', 'parent', 0, 0, 0, '', '', '', '', 0, '', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test@gmail.com', NULL, '$2y$12$yslIkazVMcNV6j1hADkPvOQw36HTXXMf.oK27tnot8W7A5X.yHuS2', NULL, 4, 0, NULL, 0, '2024-06-22 10:57:24', '2024-06-26 23:05:12'),
(7, 'student', 'demo', NULL, NULL, NULL, '1719080024.png', 'student', 0, 0, 0, '', '', '', '', 0, '', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'student@gmail.com', NULL, '$2y$12$Sor7C2cNmffKOaxQ/Pmhsu8JIw7xV043LHWuwmZPdCJr1iAFWvF8O', NULL, 3, 0, NULL, 1, NULL, '2024-06-26 03:19:27'),
(8, 'Gagandeep', 'Singh', NULL, NULL, NULL, '1719079515.png', 'student', 0, 0, 0, '', '', '', '', 0, '', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gagan@gmail.com', NULL, '$2y$12$79DA6Vkj83ssc/rWcuDk2OrAPhIvLbHcRrV4PXkbodz7PQe73Ln1i', NULL, 3, 0, NULL, 1, '2024-06-22 12:35:15', '2024-06-26 03:19:32'),
(13, 'gagan', 'test', 'punjab', 'mohali', 'India', '1719312774.jpeg', 'student', 5555555, 666666, 9, 'Male', '2024-06-13', 'test', 'test', 9988776655, '2024-06-12', 'O positive', 6, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'student12345@gmail.com', NULL, '$2y$12$5v5YvtgI2nJQ4MpggbL.5efi9DzrxebcAtsKh3yHPPtt20YxABRja', NULL, 3, 0, 18, 0, '2024-06-25 05:22:54', '2024-06-28 03:36:26'),
(14, 'gagan', 'kamboj', 'yujyt', 'ytuytu', 'India', '1719386060.png', 'student', 45435435, 43543543, 9, 'Female', '2024-06-06', 'getegyty', 'rtrtr', 6757567555, '2024-06-12', 'O positive', 67, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'studen4465636@gmail.com', NULL, '$2y$12$dX6aw/vGnhZ6/.BaYdTcMe5TZNeC3LXJOo9X8CGSgtLY89FzkKOQC', NULL, 3, 0, 6, 0, '2024-06-26 00:59:02', '2024-06-27 03:51:59'),
(15, 'Gagandeep kamboj', 'Singh', 'punjab', 'mohali', 'India', '1719555810.png', 'student', 5446365, 5435435, 8, 'Male', '1998-02-08', 'kamboz', 'sikh', 9988776655, '2024-06-26', 'O positive', 6, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gagankamboj@gmail.com', NULL, '$2y$12$jj6aBXUHSKaXwD5IHjKCve7/.TySZkq4lp2Qny/ckrTpHh2jRkWKq', NULL, 3, 0, 17, 0, '2024-06-26 03:21:42', '2024-06-28 00:53:30'),
(16, 'demo', 'test', 'state', 'Mohali', 'India', '1719398894.jpg', 'student', 66666666, 67890, 7, 'Male', '2024-06-05', 'kamboj', 'sikh', 9988776655, '2024-06-26', 'O positive', 6, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'demo123@gmail.com', NULL, '$2y$12$fZbHDO5NZaQfkrzUqM.rCeK7emLiRWicnNo8b6cQgbrxBqK8awPAm', NULL, 3, 0, 18, 0, '2024-06-26 05:18:14', '2024-06-28 03:23:28'),
(17, 'rahul', 'deemo', NULL, NULL, NULL, '1719462382.jpg', 'teacher', NULL, NULL, NULL, 'Male', '2024-06-07', NULL, NULL, 999888777, '2024-06-08', NULL, NULL, NULL, 'jal vibhag', 'married', 'patiala', 'patiala', 'btech', '10 year', 'demo', 'rahul@gmail.com', NULL, '$2y$12$pTDBRRaYqKcyIdGsoV/AH.8Lchx3ewQu92QllGTA5YFXKV.WUJtTG', NULL, 3, 0, NULL, 0, '2024-06-26 06:55:09', '2024-06-27 07:02:33'),
(18, 'Diwaker', 'mutreja', NULL, NULL, NULL, '1719557428.png', 'parent', NULL, NULL, NULL, 'Male', '1982-06-03', NULL, NULL, 998877888, '2024-06-01', NULL, NULL, NULL, 'farmer', 'unmarried', 'ambala', 'ambala', 'mba', '5 years', 'demo test', 'diwaker123@gmail.com', NULL, '$2y$12$j4FiTK1sYcqQo1iD3fbYUeX/Y7YERcXD9OErFQi2gCXcwW8PByIzS', NULL, 3, 0, NULL, 0, '2024-06-27 05:58:13', '2024-06-28 07:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fullcalendar_day` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `fullcalendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, NULL, NULL),
(2, 'Tuesday', 2, NULL, NULL),
(3, 'Wednesday', 3, NULL, NULL),
(4, 'Thrusday', 4, NULL, NULL),
(5, 'Friday', 5, NULL, NULL),
(6, 'Saturday', 6, NULL, NULL),
(7, 'Sunday', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marks_register`
--
ALTER TABLE `marks_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks_register`
--
ALTER TABLE `marks_register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
