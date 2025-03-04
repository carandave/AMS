-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 07:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Title 13', 'Content 1', 'Active', NULL, '2025-02-19 23:47:46'),
(8, 'Ttitle222222', 'Content 2', 'Archived', NULL, '2025-02-23 16:35:08'),
(15, ' 12qweqweq', '123123', 'Active', '2025-02-25 18:18:12', '2025-02-25 18:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `record_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `user_id`, `action`, `table_name`, `record_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Update', 'Users', '1', NULL, NULL),
(2, 1, 'Update', 'Users', '1', '2025-02-10 23:51:48', '2025-02-10 23:51:48'),
(3, 1, 'Update Password', 'Users', '1', '2025-02-10 23:57:55', '2025-02-10 23:57:55'),
(4, 56, 'Create New Course', 'Users', '15', '2025-02-11 18:35:32', '2025-02-11 18:35:32'),
(5, 56, 'Create New Course', 'Departments', '12', '2025-02-11 18:46:34', '2025-02-11 18:46:34'),
(6, 56, 'Create New Major', 'Sub Departments', '13', '2025-02-11 18:47:18', '2025-02-11 18:47:18'),
(7, 56, 'Update Course', 'Departments', '11', '2025-02-11 18:48:51', '2025-02-11 18:48:51'),
(8, 56, 'Update Course', 'Departments', '11', '2025-02-11 18:48:51', '2025-02-11 18:48:51'),
(9, 56, 'Update Course', 'Departments', '11', '2025-02-11 18:49:18', '2025-02-11 18:49:18'),
(10, 56, 'Update Course', 'Departments', '11', '2025-02-11 18:49:18', '2025-02-11 18:49:18'),
(11, 56, 'Update Major', 'Departments', '10', '2025-02-11 18:50:00', '2025-02-11 18:50:00'),
(12, 56, 'Update Major', 'Departments', '10', '2025-02-11 18:50:00', '2025-02-11 18:50:00'),
(13, 56, 'Update Major', 'Sub Departments', '10', '2025-02-11 18:50:29', '2025-02-11 18:50:29'),
(14, 56, 'Update Major', 'Sub Departments', '10', '2025-02-11 18:50:29', '2025-02-11 18:50:29'),
(15, 56, 'Create New Course', 'Departments', '16', '2025-02-11 18:52:10', '2025-02-11 18:52:10'),
(16, 56, 'Delete Course', 'Departments', '16', '2025-02-11 18:52:12', '2025-02-11 18:52:12'),
(17, 56, 'Create New Major', 'Sub Departments', '14', '2025-02-11 18:52:30', '2025-02-11 18:52:30'),
(18, 56, 'Delete Major', 'Sub Departments', '14', '2025-02-11 18:52:33', '2025-02-11 18:52:33'),
(19, 56, 'Update Student', 'Users', '27', '2025-02-11 19:00:28', '2025-02-11 19:00:28'),
(20, 56, 'Update Student', 'Users', '27', '2025-02-11 19:00:28', '2025-02-11 19:00:28'),
(21, 56, 'Archive Student', 'Users', '27', '2025-02-11 19:00:55', '2025-02-11 19:00:55'),
(22, 56, 'Unarchive Student', 'Users', '27', '2025-02-11 19:01:21', '2025-02-11 19:01:21'),
(23, 56, 'Update Thesis', 'Thesis', '22', '2025-02-11 19:13:53', '2025-02-11 19:13:53'),
(25, 1, 'Update Request Thesis', 'Request Thesis', '1', '2025-02-11 19:24:07', '2025-02-11 19:24:07'),
(26, 1, 'Update Request Thesis', 'Request Thesis', '1', '2025-02-11 19:24:19', '2025-02-11 19:24:19'),
(29, 1, 'Update Profile Information', 'Users', '1', '2025-02-11 19:50:00', '2025-02-11 19:50:00'),
(32, 1, 'Update Request Thesis', 'Request Thesis', '1', '2025-02-18 19:20:58', '2025-02-18 19:20:58'),
(33, 1, 'Create New Official', 'Users', '57', '2025-02-18 21:53:54', '2025-02-18 21:53:54'),
(34, 1, 'Create New Official', 'Users', '58', '2025-02-18 21:55:11', '2025-02-18 21:55:11'),
(35, 1, 'Create New Official', 'Users', '59', '2025-02-18 22:03:13', '2025-02-18 22:03:13'),
(36, 1, 'Update Student', 'Users', '55', '2025-02-18 22:34:45', '2025-02-18 22:34:45'),
(37, 1, 'Update Student', 'Users', '55', '2025-02-18 22:34:45', '2025-02-18 22:34:45'),
(41, 1, 'Update Thesis', 'Thesis', '22', '2025-02-18 23:03:08', '2025-02-18 23:03:08'),
(53, 1, 'Update Request Thesis', 'Request Thesis', '1', '2025-02-18 23:24:14', '2025-02-18 23:24:14'),
(58, 1, 'Update Profile Information', 'Users', '1', '2025-02-18 23:39:06', '2025-02-18 23:39:06'),
(61, 1, 'Create New Announcement', 'Announcement', '2', '2025-02-19 23:01:43', '2025-02-19 23:01:43'),
(62, 1, 'Create New Announcement', 'Announcement', '3', '2025-02-19 23:01:43', '2025-02-19 23:01:43'),
(63, 1, 'Create New Announcement', 'Announcement', '4', '2025-02-19 23:01:50', '2025-02-19 23:01:50'),
(64, 1, 'Create New Announcement', 'Announcement', '5', '2025-02-19 23:01:50', '2025-02-19 23:01:50'),
(65, 1, 'Create New Announcement', 'Announcement', '6', '2025-02-19 23:01:56', '2025-02-19 23:01:56'),
(66, 1, 'Create New Announcement', 'Announcement', '7', '2025-02-19 23:01:56', '2025-02-19 23:01:56'),
(67, 1, 'Update Announcement', 'Announcement', '1', '2025-02-19 23:47:46', '2025-02-19 23:47:46'),
(68, 1, 'Update Announcement', 'Announcement', '1', '2025-02-19 23:47:46', '2025-02-19 23:47:46'),
(69, 1, 'Update Announcement', 'Announcement', '8', '2025-02-19 23:48:01', '2025-02-19 23:48:01'),
(70, 1, 'Update Announcement', 'Announcement', '8', '2025-02-19 23:48:01', '2025-02-19 23:48:01'),
(71, 1, 'Update Announcement', 'Announcement', '8', '2025-02-19 23:58:58', '2025-02-19 23:58:58'),
(72, 1, 'Update Announcement', 'Announcement', '8', '2025-02-19 23:58:58', '2025-02-19 23:58:58'),
(73, 1, 'Update Announcement', 'Announcement', '8', '2025-02-23 16:35:08', '2025-02-23 16:35:08'),
(74, 1, 'Update Announcement', 'Announcement', '8', '2025-02-23 16:35:08', '2025-02-23 16:35:08'),
(75, 1, 'Update Thesis', 'Thesis', '33', '2025-02-24 22:04:01', '2025-02-24 22:04:01'),
(76, 1, 'Update Student', 'Users', '64', '2025-02-24 22:32:02', '2025-02-24 22:32:02'),
(77, 1, 'Update Student', 'Users', '64', '2025-02-24 22:32:02', '2025-02-24 22:32:02'),
(78, 1, 'Update Student', 'Users', '64', '2025-02-24 22:37:22', '2025-02-24 22:37:22'),
(79, 1, 'Update Student', 'Users', '64', '2025-02-24 22:37:22', '2025-02-24 22:37:22'),
(80, 1, 'Update Student', 'Users', '64', '2025-02-24 22:38:17', '2025-02-24 22:38:17'),
(81, 1, 'Update Student', 'Users', '64', '2025-02-24 22:38:17', '2025-02-24 22:38:17'),
(82, 1, 'Update Student', 'Users', '64', '2025-02-24 22:39:55', '2025-02-24 22:39:55'),
(83, 1, 'Update Student', 'Users', '64', '2025-02-24 22:39:55', '2025-02-24 22:39:55'),
(84, 1, 'Update Student', 'Users', '65', '2025-02-24 22:42:45', '2025-02-24 22:42:45'),
(85, 1, 'Update Student', 'Users', '65', '2025-02-24 22:42:47', '2025-02-24 22:42:47'),
(86, 1, 'Update Thesis', 'Thesis', '36', '2025-02-24 22:58:24', '2025-02-24 22:58:24'),
(87, 1, 'Update Student', 'Users', '66', '2025-02-24 23:27:44', '2025-02-24 23:27:44'),
(88, 1, 'Update Student', 'Users', '66', '2025-02-24 23:27:44', '2025-02-24 23:27:44'),
(90, 1, 'Update Request Thesis', 'Request Thesis', '3', '2025-02-24 23:37:00', '2025-02-24 23:37:00'),
(93, 1, 'Update Request Thesis', 'Request Thesis', '4', '2025-02-24 23:40:32', '2025-02-24 23:40:32'),
(94, 1, 'Update Student', 'Users', '67', '2025-02-25 17:56:45', '2025-02-25 17:56:45'),
(95, 1, 'Update Student', 'Users', '67', '2025-02-25 17:56:45', '2025-02-25 17:56:45'),
(96, 67, 'Update Password', 'Users', '67', '2025-02-25 18:02:14', '2025-02-25 18:02:14'),
(97, 67, 'Create New Request Thesis', 'Thesis', '5', '2025-02-25 18:02:58', '2025-02-25 18:02:58'),
(98, 67, 'Create New Request Thesis', 'Thesis', '6', '2025-02-25 18:06:48', '2025-02-25 18:06:48'),
(99, 67, 'Update Request Thesis', 'Request Thesis', '6', '2025-02-25 18:06:57', '2025-02-25 18:06:57'),
(100, 67, 'Update Request Thesis', 'Request Thesis', '6', '2025-02-25 18:07:31', '2025-02-25 18:07:31'),
(101, 1, 'Update Request Thesis', 'Request Thesis', '6', '2025-02-25 18:07:59', '2025-02-25 18:07:59'),
(102, 67, 'Create New Request Thesis', 'Thesis', '7', '2025-02-25 18:08:32', '2025-02-25 18:08:32'),
(103, 1, 'Update Request Thesis', 'Request Thesis', '7', '2025-02-25 18:09:08', '2025-02-25 18:09:08'),
(104, 1, 'Create New Announcement', 'Announcement', '9', '2025-02-25 18:11:57', '2025-02-25 18:11:57'),
(105, 1, 'Create New Announcement', 'Announcement', '10', '2025-02-25 18:11:57', '2025-02-25 18:11:57'),
(106, 1, 'Create New Announcement', 'Announcement', '11', '2025-02-25 18:12:18', '2025-02-25 18:12:18'),
(107, 1, 'Create New Announcement', 'Announcement', '12', '2025-02-25 18:12:18', '2025-02-25 18:12:18'),
(108, 1, 'Create New Announcement', 'Announcement', '13', '2025-02-25 18:16:17', '2025-02-25 18:16:17'),
(109, 1, 'Create New Announcement', 'Announcement', '14', '2025-02-25 18:16:17', '2025-02-25 18:16:17'),
(110, 1, 'Update Announcement', 'Announcement', '14', '2025-02-25 18:16:25', '2025-02-25 18:16:25'),
(111, 1, 'Update Announcement', 'Announcement', '14', '2025-02-25 18:16:25', '2025-02-25 18:16:25'),
(112, 1, 'Create New Announcement', 'Announcement', '15', '2025-02-25 18:18:12', '2025-02-25 18:18:12'),
(113, 67, 'Create New Request Thesis', 'Thesis', '8', '2025-02-25 18:19:36', '2025-02-25 18:19:36'),
(114, 1, 'Update Request Thesis', 'Request Thesis', '8', '2025-02-25 19:14:28', '2025-02-25 19:14:28'),
(115, 67, 'Create New Request Thesis', 'Thesis', '9', '2025-02-25 19:17:02', '2025-02-25 19:17:02'),
(116, 1, 'Update Request Thesis', 'Request Thesis', '9', '2025-02-25 19:17:14', '2025-02-25 19:17:14'),
(117, 67, 'Create New Request Thesis', 'Thesis', '10', '2025-02-25 19:18:44', '2025-02-25 19:18:44'),
(118, 1, 'Update Request Thesis', 'Request Thesis', '10', '2025-02-25 19:18:59', '2025-02-25 19:18:59'),
(119, 67, 'Create New Request Thesis', 'Thesis', '11', '2025-02-25 19:19:40', '2025-02-25 19:19:40'),
(120, 67, 'Create New Request Thesis', 'Thesis', '12', '2025-02-25 19:21:05', '2025-02-25 19:21:05'),
(121, 67, 'Create New Request Thesis', 'Thesis', '13', '2025-02-25 19:22:43', '2025-02-25 19:22:43'),
(122, 1, 'Update Request Thesis', 'Request Thesis', '13', '2025-02-25 19:22:59', '2025-02-25 19:22:59'),
(123, 67, 'Create New Request Thesis', 'Thesis', '14', '2025-02-25 19:31:27', '2025-02-25 19:31:27'),
(124, 1, 'Update Request Thesis', 'Request Thesis', '14', '2025-02-25 19:31:56', '2025-02-25 19:31:56'),
(125, 67, 'Create New Request Thesis', 'Thesis', '15', '2025-02-25 19:35:35', '2025-02-25 19:35:35'),
(126, 1, 'Update Request Thesis', 'Request Thesis', '15', '2025-02-25 19:37:02', '2025-02-25 19:37:02'),
(127, 67, 'Create New Request Thesis', 'Thesis', '16', '2025-02-25 19:38:51', '2025-02-25 19:38:51'),
(128, 1, 'Update Request Thesis', 'Request Thesis', '16', '2025-02-25 19:39:01', '2025-02-25 19:39:01'),
(129, 67, 'Create New Request Thesis', 'Thesis', '17', '2025-02-25 19:40:05', '2025-02-25 19:40:05'),
(130, 1, 'Update Request Thesis', 'Request Thesis', '17', '2025-02-25 19:40:20', '2025-02-25 19:40:20'),
(131, 1, 'Update Request Thesis', 'Request Thesis', '16', '2025-02-25 19:48:29', '2025-02-25 19:48:29'),
(132, 1, 'Update Request Thesis', 'Request Thesis', '17', '2025-02-25 19:48:41', '2025-02-25 19:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1740535366),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1740535366;', 1740535366),
('5a5b0f9b7d3f8fc84c3cef8fd8efaaa6c70d75ab', 'i:2;', 1739949267),
('5a5b0f9b7d3f8fc84c3cef8fd8efaaa6c70d75ab:timer', 'i:1739949267;', 1739949267),
('intern.jgermina@gmail.com|127.0.0.1', 'i:1;', 1739944819),
('intern.jgermina@gmail.com|127.0.0.1:timer', 'i:1739944819;', 1739944819),
('jh5683940@gmail.com|127.0.0.1', 'i:3;', 1740469458),
('jh5683940@gmail.com|127.0.0.1:timer', 'i:1740469458;', 1740469458);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science in Business Administration', '2025-01-20 19:38:42', '2025-01-20 19:38:42'),
(2, 'Bachelor of Science in Hospitality Management', '2025-01-20 19:38:50', '2025-01-20 19:38:50'),
(3, 'Bachelor of Science in Entrepreneurship', '2025-01-20 19:38:55', '2025-01-20 19:38:55'),
(4, 'Bachelor of Elementary Education', '2025-01-20 19:39:06', '2025-01-20 19:39:06'),
(5, 'Bachelor of Science in Information Technology', '2025-01-20 19:39:14', '2025-01-20 19:39:14'),
(6, 'Bachelor of Secondary Education', '2025-01-20 19:39:31', '2025-01-20 19:39:31'),
(7, 'Associate in Computerized Accounting', '2025-01-20 19:39:40', '2025-01-20 19:39:40'),
(8, 'Associate in Hotel and Restaurant Services', '2025-01-20 19:39:45', '2025-01-20 19:39:45'),
(9, 'Associate in Secretarial Education', '2025-01-20 19:39:56', '2025-01-20 19:39:56'),
(10, 'Associate in Office Administration', '2025-01-20 19:40:02', '2025-01-20 19:40:02'),
(11, 'Associate in Computer Technology', '2025-01-20 19:40:46', '2025-02-11 18:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_11_18_050756_create_users_table', 1),
(7, '2025_01_15_054904_create_sub-_departments_table', 2),
(18, '2025_01_15_054700_create_departments_table', 3),
(19, '2025_01_16_022621_create_sub_departments_table', 3),
(20, '2025_01_21_010551_create_theses_table', 3),
(21, '2025_01_21_034658_create_thesis_table', 4),
(23, '2025_01_21_034835_create_theses_table', 5),
(26, '2025_02_03_054859_create_request_theses_table', 6),
(27, '2025_02_03_055407_create_request_thesis_table', 7),
(33, '2025_02_03_064216_create_request_thesis_table', 8),
(34, '2025_02_11_021226_create_audit_trails_table', 8),
(36, '2025_02_20_061028_create_announcements_table', 9),
(37, '2025_02_25_055327_make_sub_department_id_nullable', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('davecarandang9@gmail.com', '$2y$12$UB727uFol3vzxlDgbzrAr.D19.KZPGEqD6/L8BV0rpsUHP1JJZAjy', '2025-02-24 22:15:59'),
('davecarandang91@gmail.com', '$2y$12$dOEGpEjkPD3bO8gyhhNHjOrRUNlTGoWJySCqBZgCj.IFf.VECAfI2', '2025-01-12 22:29:10'),
('glenwilliam.perez36@gmail.com', '$2y$12$OQNicZm9Gr8/TKsdb94yleb6dEgrsqWmKG/Al6bULx6rU/MCcYNhy', '2025-02-03 17:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `request_theses`
--

CREATE TABLE `request_theses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `thesis_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `approved_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_theses`
--

INSERT INTO `request_theses` (`id`, `user_id`, `thesis_id`, `approved_by`, `status`, `purpose`, `approved_date`, `created_at`, `updated_at`) VALUES
(16, 67, 38, 1, 'Approved', '2', '2025-02-26 03:48:25', '2024-02-08 19:38:51', '2025-02-25 19:48:25'),
(17, 67, 39, 1, 'Approved', '3', '2025-02-26 03:48:37', '2025-02-25 19:40:05', '2025-02-25 19:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KQhOU5w2r8U9VowSqpnW5DkDajN5VELgIzbAKWMK', 67, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicllvT1NNMVZKUjR1cVlBOHl1TFdvNU9NQTFaaHlQbkVDMmdNY1RqVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50L2xpc3QtdGhlc2lzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njc7fQ==', 1740541543),
('psUj6ZjVojT6jGaXmwcZJWu8Wj5Wieq4Etx9Tsei', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHg3eEVNb0tZQTZnRllCb2IxUzFYZFlLWEs2MDk1S0phczJHeWtYdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yZXF1ZXN0LXRoZXNpcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1740548428);

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE `sub_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departments_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_departments`
--

INSERT INTO `sub_departments` (`id`, `departments_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 6, 'English', '2025-01-20 19:41:29', '2025-01-20 19:41:29'),
(2, 6, 'Filipino', '2025-01-20 19:41:38', '2025-01-20 19:41:38'),
(3, 6, 'Mathematics', '2025-01-20 19:41:47', '2025-01-20 19:41:47'),
(4, 6, 'Social Studies', '2025-01-20 19:41:55', '2025-01-20 19:41:55'),
(5, 6, 'Science', '2025-01-20 19:42:13', '2025-01-20 19:42:13'),
(6, 1, 'Financial Management', '2025-01-20 19:42:26', '2025-01-20 19:42:26'),
(7, 1, 'Marketing Management', '2025-01-20 19:42:33', '2025-01-20 19:42:33'),
(8, 1, 'Operations Management', '2025-01-20 19:42:41', '2025-01-20 19:42:41'),
(9, 1, 'Business Economics', '2025-01-20 19:42:47', '2025-01-20 19:42:47'),
(10, 1, 'Human Resource Management', '2025-01-20 19:42:56', '2025-02-11 18:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `theses`
--

CREATE TABLE `theses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `sub_department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `adviser` varchar(255) NOT NULL,
  `submission_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `approval_date` datetime DEFAULT NULL,
  `rejection_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theses`
--

INSERT INTO `theses` (`id`, `title`, `abstract`, `author`, `year`, `keywords`, `user_id`, `department_id`, `sub_department_id`, `adviser`, `submission_date`, `status`, `photo`, `file_path`, `approval_date`, `rejection_reason`, `created_at`, `updated_at`) VALUES
(38, 'Dignissimos reprehen', 'Iure totam id et au', 'Excepturi aliqua Vo', '2008', 'Incididunt vero atqu', '53', 1, 6, 'Aut atque culpa ipsa', '2025-02-26 02:00:52', 'Approved', 'public/hvwOFmxCKmyrFyurZWTrSsKXmI5TTUtle68ecGpQ.jpg', 'public/C1QRpFVkhlFPBzfQYfA0fJszKYU12CCGVWOjcps7.pdf', NULL, NULL, '2025-02-25 18:00:52', '2025-02-25 18:00:52'),
(39, 'Hic sit et quis iust', 'Laborum Magni minus', 'Ipsum id voluptatem ', '2012', 'Iusto et incidunt d', '15', 6, 1, 'Quae repudiandae sit', '2025-02-26 02:01:19', 'Approved', 'public/FaVFAcUxGubQRrhtu28ZyTso6ZH7NYGb8aZNsTdy.jpg', 'public/6Nn9hDNKjWLCUmpeTa1vdUyTPfXeP0b4Aaalauy4.pdf', NULL, NULL, '2025-02-25 18:01:19', '2025-02-25 18:01:19'),
(40, 'Rerum sequi nulla la', 'Voluptatem Ad totam', 'Dolore obcaecati tot', '2003', 'Architecto rem inven', '27', 2, NULL, 'Ut sit ut molestiae ', '2025-02-26 02:01:46', 'Approved', 'public/LYmQDnp18YGQq53H6Va1NaEBa2jFIEeYN96o5emd.jpg', 'public/75Sjse5x3mBN242fqpOUvJ9oWO4CdyK8yge8Uvu8.pdf', NULL, NULL, '2025-02-25 18:01:46', '2025-02-25 18:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `student_id`, `role`, `status`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Dave15678', 'Orfanel', 'Villarin', NULL, 'Admin', 'Approved', 'davecarandang9@gmail.com', 'public/FxgAinkybl7Rjwuzgx7MB8sJVUd2lM7zDqwU8co0.jpg', NULL, '$2y$12$5voow/RSHTk2mz3o6QwxzuMnDCJc15ff06RQjGsyrg7/cKxWNMggO', 'TWTbYwPqRoj6ZAnyHJF9k96Y2Xxz8Z5zF4DktksD2wuMcqiT4pYUsytHgHbh', '2024-11-17 21:09:52', '2025-02-24 17:48:01'),
(2, '13', '1', '1', '1', 'Student', 'Archived', '1@gmail.com', 'public/l2MtXoev2pIzXS5mCUKh75sdfPTItX29AeLm9lH4.jpg', NULL, '$2y$12$1..cJoIfZGXNJ.lX17UktuIFWMoeHcC.KwzEcF0W.IxAKZWSgJgXO', NULL, '2024-11-17 21:11:37', '2025-01-15 18:34:15'),
(5, 'qwe21', 'qwe', 'we', 'qwe', 'Student', 'Approved', 'qwe@gmail.com', 'public/X9bmxpmYeiSYv2VyDVS1zPzQP4XGQ9x3niIss4Dy.png', NULL, '$2y$12$q7AEdXSjO2hYUkigSm/Zmu.comZ.WLhSXodWdK8QydKSOZQ91iwfW', NULL, '2024-11-21 22:21:26', '2025-01-12 19:34:27'),
(6, 'qwe', 'qwe', 'qwe', 'B20200919', 'Student', 'Archived', 'qwe1@gmail.com', 'public/LVxgAeDkHiXKfXzRs2DXpGgeNi0AaBrcwS6IXQfF.png', NULL, '$2y$12$3kKaS0UjrDzIUaxDY.AtMuxTayEwJZ701pb/JHX7mVFejp/7zqYnG', NULL, '2024-11-21 22:23:17', '2025-01-12 19:31:48'),
(7, 'QWEQ', 'WEQW', 'EQWE', 'QWE1', 'Student', 'Approved', 'qwe12@gmail.com', 'public/E1FldiLj8AmkKUHcyKLm81sVE4yg3yHRt4br0Q9j.png', NULL, '$2y$12$UCuclmg8Z2ERDKmjzU7vpus1dcsmyTi.yLeCPf/58j4qNYi2lIfEC', NULL, '2024-11-21 22:24:44', '2025-01-13 00:29:57'),
(9, 'of21', 'of2', 'of2', NULL, 'Admin', 'Archived', 'of2@gmail.com', 'public/6t29qqC4T58jiMqfctq7BIr9jwzGd7JoXAKlAPvY.png', NULL, '$2y$12$P18ri2z1duqFFTvkAZtICOt1whrOs81zPrdH63xDD1/6X9ZkQ5k9S', NULL, '2024-11-21 22:44:53', '2025-01-12 17:00:40'),
(10, 'of3', 'of3', 'of3', NULL, 'Admin', 'Approved', 'of3@gmail.com', 'public/w8HHA1j4YiYRFlivUkRdSfBUrFIvLba0yqnjEBOz.png', NULL, '$2y$12$IKsRgUhvGw5UqYT4hnaFSe2AJYFWv8Chpr8IO5XmJpS9vjAK0ZNtK', NULL, '2024-11-21 22:45:24', '2024-11-21 22:45:24'),
(11, 'of4', 'of4', 'of4', NULL, 'Admin', 'Approved', 'of4@gmail.com', 'public/596WtFJ8EkIofvzp7NieSGMHjLkIMt8L7SbJpS6l.png', NULL, '$2y$12$exe.q/u3Rkh9WjOv/uW3UeTlnEx1RKcgav7z8o8Qp6of2TD6PJbw2', NULL, '2024-11-21 22:46:52', '2024-11-21 22:46:52'),
(12, 'QWE1', 'QWE', 'QWE', 'QWE12', 'Student', 'Archived', 'QWE13@gmail.com', 'public/5mFEQkLYGq2A7mSsTaRE4rD4G9dynhYFSxkYoqgh.png', NULL, '$2y$12$fiAKfPgtwHu/GKSWg5gcY.jHDJQnhqvz2wb9kfmbb1YXKBte4Aseu', NULL, '2024-11-21 22:47:30', '2025-01-12 17:16:21'),
(14, 'qwe111', 'qwe', 'qwe', 'qwe123', 'Student', 'Approved', 'QWE123@gmail.com', 'public/Bg2otavlCGr6jxsoi6hZqh4BH9cQJrCptaA9iBAA.png', NULL, '$2y$12$HQJSATSht2XJk2GZpAogRuza.lhZ479d2weZsJGXKjgvZ1fTSpiEm', NULL, '2024-11-25 00:43:30', '2025-01-13 21:52:32'),
(15, 'fr1', 'fr2', 'fr3', 'fr4', 'Student', 'Approved', 'fr5@gmail.com', 'public/48YtClXYE5mO4CePmAcmoOWuSs2r3XoLYETSEhrZ.png', NULL, '$2y$12$p6I.rmeYpf8qTMXpDCTK/.aGjJEDvGzzqpZDjKFpshGHtz6tkicC6', NULL, '2024-11-25 23:30:52', '2025-01-12 19:33:33'),
(19, '45', '45', '45', NULL, 'Admin', 'Approved', '456@gmail.com', 'public/u0pubDvEq8FpjgCDNXlNhEnqdFXs9pkTZSqUifX8.jpg', NULL, '$2y$12$X8sS6dnaZlNtzrzNptE56ebBZqfhoCtUgefRuwvarqPVbelWkEtLe', NULL, '2024-12-15 19:40:50', '2024-12-16 00:48:49'),
(22, 'jk', 'jk', 'jk', NULL, 'Faculty', 'Approved', 'jk@gmail.com', 'public/5uJP9CK4atzLA6sywEziTHLJ52vq0g4z70I8xsVu.png', NULL, '$2y$12$fx4Mu1cVw/Dhm1378UM1mOTnm5SWlfVn/ZgJF4JwWUeRyttm2eCqW', NULL, '2024-12-15 22:36:02', '2025-01-13 22:21:00'),
(26, 'ghj', 'ghj', 'ghj', NULL, 'Faculty', 'Approved', 'ghj@gmail.com', 'public/GEhs204ZI2N3MPjxZHCYuA0OXEhPkdiPdY465anU.jpg', NULL, '$2y$12$Ge/L4IdTwSLFzuhgFFS4SO098MbOkRukoV78Kw2zNgNcJzEs14fgq', NULL, '2025-01-12 21:21:13', '2025-01-13 22:16:26'),
(27, 'zxc1', 'zxc', 'zxc', '123123', 'Student', 'Approved', 'zxc@gmail.com', 'public/cEIt5wnXrhj4plHOFVwjh2h7tKH3oOPRm09Dhw8q.jpg', NULL, '$2y$12$Tb.P5DLIX9GRIEl1dLhFKur8rAWidgV6E3g9L400kCyuVfS8gw98.', NULL, '2025-01-12 21:26:19', '2025-02-11 19:01:21'),
(28, 'John Dave', 'hjk', 'hjk', '111111', 'Student', 'Archived', 'hjk@gmail.com', 'public/GFwvXpISzx2x7fQX7Mh066mdDyWXkUf6wpddRjvj.png', NULL, '$2y$12$K6P7gdLpd3ia66.yd8ntHexN8q4O6uSwmKk96bsNr/DWJaCWmQFvW', NULL, '2025-01-12 21:27:32', '2025-01-19 16:20:25'),
(29, 'uio', 'uio', 'uio', NULL, 'Faculty', 'Approved', 'uio@gmail.com', 'public/w0WvueRJy5XYZkrWECtdbjtUQnie1Y4djSR3NGun.png', NULL, '$2y$12$X0osnUdVPJGaDYwhPRDGDO7QhEx1veU38rmMnwQDMYkVNT8g2dGPi', NULL, '2025-01-12 22:38:09', '2025-01-13 22:16:10'),
(30, 'tyu', 'tyu', 'tyu', NULL, 'Admin', 'Approved', 'tyu@gmail.com', 'public/angg2Qa6XGBQbK4C01WofNjDoXJJZs8yhQbgB79d.jpg', NULL, '$2y$12$.17.hm5T8ehY8pkgbm3r0.3oj63jW5wxvCAwAPgfPvBVyXCW1k.iq', NULL, '2025-01-12 22:39:12', '2025-01-12 22:39:12'),
(31, 'John Dave', 'lkj', 'lkj', NULL, 'Admin', 'Approved', 'lkj@gmail.com', 'public/ZLFVncXueEiW5JxGIf9LIq6evtJSemhmc31FJum5.png', NULL, '$2y$12$MKcH2mr/rixtVQamvcaGMeEGQCdTOTm2Ea8HbXBKAxl/nV9zBxIYK', NULL, '2025-01-12 22:40:45', '2025-01-12 22:41:19'),
(32, 'poi', 'poi', 'poi', '333', 'Student', 'Archived', 'poi@gmail.com', 'public/HFs5AeWue4GVDjZZojcqIovji34TM5DUVF388DXT.jpg', NULL, '$2y$12$ndfGi3ZxQW.TIJPFYHu17uIh32YWq30CbDxgwt8hkG3eKMPfHuOQm', NULL, '2025-01-12 23:22:28', '2025-01-19 16:20:21'),
(33, 'ggg1', 'ggg', 'ggg', '444', 'Student', 'Archived', 'ggg@gmail.com', 'public/VC8Cc4TICYHpneExW6GD2LLJs3hHiG7YsWGhFkOp.jpg', NULL, '$2y$12$CAO60pE3I8FsMaQw/ZTVLeRoSTIHRDAXasXEWWryDDucAKXG.rePK', NULL, '2025-01-12 23:28:20', '2025-01-19 16:19:31'),
(34, 'iii15', 'iii', 'iii', NULL, 'Admin', 'Approved', 'iii@gmail.com', 'public/pBNTvs7v2ClYvz90gzznQGtfiY0yIAx0i1C0qfqf.jpg', NULL, '$2y$12$Y1wdtxfLYmllkQ6qj5EdG.dD3qfxmR.2ldmKsfT3G.E1GYM.MUDQi', NULL, '2025-01-12 23:30:55', '2025-01-13 19:19:49'),
(35, 'John Dave5', 'mmm', 'mmm', '6666', 'Student', 'Archived', 'mmm@gmail.com', 'public/QSofHLz0nMnGQORgbPYlJ1W1frl6sA5GJmeisC6T.png', NULL, '$2y$12$ZuNT9m6PoRGVZGWNF4O07.xXI5PUxpOC0hd0NhobmxAcruXif.nuW', NULL, '2025-01-12 23:34:02', '2025-01-19 16:08:51'),
(36, 'nnn155', 'nnn', 'nnn', '777', 'Student', 'Pending', 'qwe2@gmail.com', 'public/TDw2Il6AnV8B0UnMmeZPv7gNh3LnY5uoUlaexRDw.jpg', NULL, '$2y$12$MCmp.SGEpM2Ya10RmOhu/.NV.y1KBJOHB8t6Im9eHzFqRkiezng4G', '8qhSw0JiUYV5QVPC3NsTyWCZ2Cl4do2gV2AwKq0I6zkb367ozcygSJ1DsGDa', '2025-01-12 23:36:27', '2025-01-13 19:32:13'),
(38, 'bnm', 'bnm', 'bnm', NULL, 'Faculty', 'Approved', 'bnm123@gmail.com', 'public/vugAl73XCFz1nnPFixWlKunfiHzjrlwoXhBXJ8j3.jpg', NULL, '$2y$12$E3nX6GTpNYpua0/vh9pAsOy8UvCOCyhBt9LGHd56x0Tvxdi6QKtNe', NULL, '2025-01-13 22:18:11', '2025-01-13 22:18:11'),
(39, 'Dave', 'qwe', 'qwe', NULL, 'Admin', 'Approved', 'dcarandang332@gmail.com', 'public/NIEsxy9tVoC5GT3VJcLlLDhbZ3bRLxdgkAYYl5b2.jpg', NULL, '$2y$12$KYIyp1R8WitZ5j1Mab7kP.VcIXlNqIbaTbwqubQ27WA.B78YBRTs6', NULL, '2025-01-13 23:02:00', '2025-01-13 23:02:00'),
(40, 'fgh', 'fgh', 'fgh', NULL, 'Faculty', 'Approved', 'fgh@gmail.com', 'public/EmjgmFeEM63sTglvtQpZV7WV2hESEK467reEzMHB.jpg', NULL, '$2y$12$q2XIXN//rw0yK.eHrxpdR.gUtRw1Zueuq/..6aPeONnCC3jw3iDtm', NULL, '2025-01-13 23:07:56', '2025-01-13 23:07:56'),
(41, 'ggg', 'ggg', 'ggg', NULL, 'Admin', 'Approved', 'dcarandang3232@gmail.com', 'public/MoHDr2qW4jHZFEsajaWqO6PFgFJMcAXe9F3yj5Hd.jpg', NULL, '$2y$12$ACJqiFpmzNlGLA43vrUK/O11C9/yRzffNjGo6D0vOdnYj5md8vXK2', NULL, '2025-01-13 23:16:32', '2025-01-13 23:16:32'),
(42, 'nnn4', 'nnn', 'nnn', NULL, 'Admin', 'Archived', 'dcarandang321@gmail.com', 'public/1wOgwHi2rtRJ9cwYa6tUNUEKMWQIYD3Z533iakHQ.png', NULL, '$2y$12$r1BDii9UKR0dcTcPZY5/D.UikwKCdn.jGSfRitDjKPcWhckhT0d6.', NULL, '2025-01-13 23:18:32', '2025-01-19 16:28:05'),
(43, 'kkk', 'kkk', 'kkk', NULL, 'Faculty', 'Archived', 'dcarandang323213@gmail.com', 'public/drVnBNWyQKcJ5DNEFW0ZWvIpSBUzGnOneFLOXaVf.jpg', NULL, '$2y$12$Mg9KB7IjyKeO1PXdwMzAzOuKSn2nxxJh1jtftq.JLKy1nUZaNLk/6', NULL, '2025-01-13 23:23:51', '2025-01-19 16:27:54'),
(44, 'vvv', 'vv', 'vvv', 'vvv', 'Student', 'Archived', 'dcarandang12@gmail.com', 'public/LhREwcObKSBCzQItlZhFrypC9oDkmcYfZdXahGcn.jpg', NULL, '$2y$12$4ot2yf8Fv1b13S5A/OpFI.FkvvVwxpsXuFcJxBXesKbm25fK3GtKO', NULL, '2025-01-13 23:30:09', '2025-01-15 18:34:26'),
(45, 'vvv', 'vv', 'vvv', 'vvv32', 'Student', 'Archived', 'dcarandang33332@gmail.com', 'public/Ut0plRAIn9jaooIQFhn25F5TSkkl0JRWRopHSAbG.jpg', NULL, '$2y$12$efphDaTLYzpWCNzaUA6zIuyPKKgolt679aV6See/CrjC8wBG2OVfa', NULL, '2025-01-13 23:34:16', '2025-01-15 18:34:24'),
(46, 'ffff', 'fff', 'fff', 'fff', 'Student', 'Archived', 'dcarandang324@gmail.com', 'public/KlAmveSQcfYmOHTY5KJf5BTOzrRpcZzQHe7ToQI3.jpg', NULL, '$2y$12$rWJbf/Be8IsEYQ8l2wI06esKqCXjyzUumxW6PaHMVGcyfLPdkC1L2', NULL, '2025-01-13 23:38:17', '2025-01-15 18:34:19'),
(47, 'nnn', 'nnn', 'nnn', 'nnnnn', 'Student', 'Archived', 'dcarandang432@gmail.com', 'public/kQpVsIbvgelDKiQ1zyIT23dFno9vZ7ortgYsSFIs.jpg', NULL, '$2y$12$tgOnOnelY.TYAIPD2T3E3ecGeZiweT/4M9l.jP3uioUdiNT50skB.', NULL, '2025-01-13 23:40:50', '2025-01-15 18:34:18'),
(48, 'mmm', 'mmm', 'mm', 'mmm', 'Student', 'Archived', 'dcara3ndang32@gmail.com', 'public/oTwaklsfI9TEpda3b6jmOe7C1C5vwe8BpCaSoveh.jpg', NULL, '$2y$12$3M1hLrH25eNuYfJQQfbKS.Hn0DY.1/wvJXVDZ7bXtXu/JWH9KjFwC', NULL, '2025-01-13 23:42:26', '2025-01-15 18:34:17'),
(49, 'q', 'q', 'q', NULL, 'Faculty', 'Archived', 'dc3arandang32@gmail.com', 'public/vEVJLCFKd05gZyGedrnDFBals7F1w9jq7I4tNtKF.jpg', NULL, '$2y$12$N.U174kG4IvA./Zh7h0byOF5yMaF2lLm.Zr2LBZmy5Il.vW9kdIIW', NULL, '2025-01-13 23:43:36', '2025-01-19 16:27:52'),
(50, 'e', 'e', 'e', NULL, 'Admin', 'Archived', 'dcarandang32444@gmail.com', 'public/4lXBWyh3p2Evu3e02n3lZMBSSrNs3crRVcJK79IA.jpg', NULL, '$2y$12$c2fSq2lInW43VFFWn3kF7e6rVVLaFr1GCuftkXkVOiq/DrYZFi2Ai', NULL, '2025-01-13 23:44:56', '2025-01-19 16:27:36'),
(51, 'ggg', 'gggg', 'gggg', NULL, 'Admin', 'Archived', 'dcarandang32e@gmail.com', 'public/KN0lZJnQixJaV8cNaLyBGqIW3xVQLRhXRiuQcnQG.png', NULL, '$2y$12$ees0eIqZRpu8fyKcLjtryek6hbsoKWOXJWO9vpWNcE57f9bN3359.', NULL, '2025-01-13 23:48:04', '2025-01-19 16:26:04'),
(52, 'vvv', 'vvv', 'vvv', 'vvvv', 'Student', 'Denied', 'dcarandang323@gmail.com', 'public/NmugmvBPNRaw2SFjjuctzoNp7ZXBsJjsrillHk36.jpg', NULL, '$2y$12$f0MTXi4r5sKJybOeFGGpxOBZtSh73xgp8ejoSH2r36edJ5wcOT28K', NULL, '2025-01-13 23:49:02', '2025-01-13 23:54:17'),
(53, 'Glenn', 'P', 'Williams', 'ffff', 'Student', 'Approved', 'glenwilliam.perez36@gmail.com', 'public/Iny6Q2qpwq9sLmHOdXphIq1F8LU6J1zebAKNLuBN.jpg', NULL, '$2y$12$a/qkoQfrflJem.uAWZfNduwz2GGIwbSaKaF99pBhow9FawTNd7.XK', NULL, '2025-01-13 23:58:43', '2025-01-15 18:34:16'),
(54, 'qweqwe', 'qwe', 'qwe', NULL, 'Faculty', 'Archived', 'dcarandang323232@gmail.com', 'public/7IVlzs20Q6FYKYP12buXnX7AQPM2hpREUebqqxyA.jpg', NULL, '$2y$12$gxOrRW0oEyAHKlpja62Mk.H9ruwHr20/LIwGrdApZe6KUy6ftS4Ba', NULL, '2025-01-14 00:16:02', '2025-01-19 16:25:59'),
(56, 'Mark', 'C', 'Relles', NULL, 'Admin', 'Approved', 'rellesmark43@gmail.com', 'public/o8LZM92P3YPSzaL41al4HySiYJd4zAaOs4hT9Itj.jpg', NULL, '$2y$12$MDh6ucv4iKQukC2crfEQBO15q9gh5wT5is45N7LaAfLN5YRvanAK.', NULL, '2025-02-11 17:58:17', '2025-02-11 17:58:17'),
(57, 'Jay', 'Jay', 'Jay', NULL, 'Faculty', 'Approved', 'intern.jaygermina@gmail.com', 'public/wZBwrxO2omCIHdlTkAhM53zGChqnm0sorx7yn4UR.jpg', NULL, '$2y$12$Y3nVKG5wMhbMcawEBR69GO8TqCKGdDaLzvbmwyqloDG.gR7FTW8Fu', NULL, '2025-02-18 21:53:54', '2025-02-18 21:53:54'),
(58, 'Jay', 'Jay', 'Jay', NULL, 'Admin', 'Approved', 'intern.jgermina@gmail.com', 'public/1FSPKmuJmDJ2kFG5GlTX6aHD0dYrZKqEBb9Qgf3r.jpg', NULL, '$2y$12$tJ4i5hX7/9XDcKPOKrok3eqd.PdIf/zjT0MX5UrYZiICS2Z/3QshC', NULL, '2025-02-18 21:55:11', '2025-02-18 21:55:11'),
(67, 'John', 'Jay', 'Doe1', '202020', 'Student', 'Approved', 'dcarandang32@gmail.com', 'public/WBDiXm42FU4QTuWqTqc3hr6iu7kkWBLUPj5HXENO.jpg', NULL, '$2y$12$nUi8d2Gk1jcg3fImi3EJm.zXc7cqmgHDyJYGWxnpBVrhL0BOAilS.', NULL, '2025-02-25 17:55:47', '2025-02-25 18:02:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_trails_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `request_theses`
--
ALTER TABLE `request_theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_theses_user_id_foreign` (`user_id`),
  ADD KEY `request_theses_thesis_id_foreign` (`thesis_id`),
  ADD KEY `request_theses_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_departments_departments_id_foreign` (`departments_id`);

--
-- Indexes for table `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theses_department_id_foreign` (`department_id`),
  ADD KEY `theses_sub_department_id_foreign` (`sub_department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_student_id_unique` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `request_theses`
--
ALTER TABLE `request_theses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_departments`
--
ALTER TABLE `sub_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `theses`
--
ALTER TABLE `theses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD CONSTRAINT `audit_trails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_theses`
--
ALTER TABLE `request_theses`
  ADD CONSTRAINT `request_theses_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_theses_thesis_id_foreign` FOREIGN KEY (`thesis_id`) REFERENCES `theses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_theses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD CONSTRAINT `sub_departments_departments_id_foreign` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theses`
--
ALTER TABLE `theses`
  ADD CONSTRAINT `theses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theses_sub_department_id_foreign` FOREIGN KEY (`sub_department_id`) REFERENCES `sub_departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
