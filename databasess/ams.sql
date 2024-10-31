-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 09:36 AM
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
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('2zFCDXO5sPufFG658Les7IfH1AG6Cc56RrdUFtW9', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZkhHUVozWlN2NHlFWmlRTmticzgySXNHTHRDV2Rrd0EzcUJEdzJ0ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2Vycy9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1730362791),
('FZhVxwByBxTSmBWTqLekj4GF1qHsx4XVSFrWLQt6', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRndjbDRDMWRVQktpQmpGSGw5VzlSNEpYd2dkU0xSUXczM3psZjViRSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vdXNlcnMvc3R1ZGVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1730362228);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `student_id`, `role`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'John1', 'Orfanel1', 'Carandang1', 'B20200916', 'admin', 'approved', 'davecarandang9@gmail.com', NULL, '$2y$12$z8iRDctupDz5zovGc/Y5x.UhF.r96cU9c7qiP8tD4h.WV88UUqWC2', '9Apd6Shsbro0k9ipg6grVaD5basyynawDGRKnPgdnhchn3K2rcr7rlUhkiCW', '2024-10-20 21:43:02', '2024-10-20 23:50:00'),
(8, 'John', 'John', 'Doe', 'B20200917', 'student', 'approved', 'johndoe@gmail.com', NULL, '$2y$12$HQSA7Uq2dHKvMvQuJ0hlsOQYy56.ISG8L8ZXk4jZKttiQACsrGCmq', NULL, '2024-10-20 23:08:30', '2024-10-20 23:08:30'),
(9, 'Chadrick', 'Morissette', 'Padberg', 'B20202666', 'student', 'approved', 'lizeth.flatley@example.net', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'qbecOICdUX', '2024-10-21 22:37:56', '2024-10-21 22:37:56'),
(10, 'Amber', 'Volkman', 'Haley', 'B20204194', 'admin', 'approved', 'carroll33@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'PuqO4fOvMC', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(11, 'Elliot', 'VonRueden', 'Yundt', 'B20203491', 'student', 'approved', 'caleigh.reilly@example.org', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'PX09G7NVdG', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(12, 'Oren', 'Turner', 'Shields', 'B20203802', 'admin', 'approved', 'schmitt.allene@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'AFmI1HGgG2', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(13, 'Wilfrid', 'Willms', 'Hickle', 'B20208614', 'admin', 'approved', 'fschuster@example.net', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'lTd3blic2c', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(14, 'Tristin', 'Dickens', 'Nicolas', 'B20206526', 'student', 'approved', 'lane40@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'jjGtLHfIRy', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(15, 'Cornelius', 'Schamberger', 'Lueilwitz', 'B20202164', 'student', 'approved', 'ykunde@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'A5xovkkoHQ', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(16, 'Janae', 'Torphy', 'Pfeffer', 'B20202987', 'admin', 'approved', 'reinger.misty@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', '7CkxupJ0W9', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(17, 'Barton', 'Renner', 'Lowe', 'B20204249', 'student', 'approved', 'vkrajcik@example.org', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'Q44LA1LUja', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(18, 'Rosemarie', 'Hayes', 'Powlowski', 'B20206621', 'student', 'approved', 'tillman.mikayla@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', '140wY7omhm', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(19, 'Montana', 'Gusikowski', 'Willms', 'B20206668', 'student', 'approved', 'anissa83@example.org', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'YHaoggOg2l', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(20, 'Zelma', 'Ryan', 'Lehner', 'B20206195', 'admin', 'approved', 'hpagac@example.net', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', '92u1uL3zgi', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(21, 'Kristoffer', 'Ebert', 'Schmitt', 'B20204918', 'admin', 'approved', 'adamore@example.net', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'mo8eZQbRZ2', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(22, 'Florence', 'Koepp', 'Okuneva', 'B20208522', 'student', 'pending', 'keeling.enoch@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'kft9fGSu9p', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(23, 'Cletus', 'Treutel', 'Gorczany', 'B20201172', 'admin', 'approved', 'julian.kozey@example.org', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'LJjQHkLrg1', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(24, 'Desmond', 'Schinner', 'Reichel', 'B20201005', 'student', 'pending', 'waelchi.sherman@example.net', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'XBZ6LasfWV', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(25, 'Freddy', 'McDermott', 'Gorczany', 'B20204869', 'admin', 'approved', 'wmarvin@example.org', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'FbrVEF6e0C', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(26, 'Yesenia', 'Emard', 'Champlin', 'B20205683', 'student', 'pending', 'delia78@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'ktOPGuk38S', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(27, 'Idell', 'Osinski', 'Langworth', 'B20203107', 'admin', 'approved', 'beer.elna@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 't4NcrmiZKD', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(28, 'Ronny', 'Kunze', 'Berge', 'B20208855', 'admin', 'approved', 'ernest56@example.com', '2024-10-21 22:37:56', '$2y$12$eNMkpqtKT1Lp0Y41oxDWG.ukToXh2/ed/YUBOC4HVx.jc0XRJMfN.', 'C4hkFNG8zW', '2024-10-21 22:37:57', '2024-10-21 22:37:57'),
(29, 'Terence', 'Gislason', 'Hermiston', 'B20205019', 'admin', 'pending', 'hkulas@example.net', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'KTi2SZEWTy', '2024-10-22 00:09:26', '2024-10-22 00:09:26'),
(30, 'Harmony', 'Towne', 'Hettinger', 'B20207191', 'student', 'pending', 'mdare@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'yF5p4NcK6Z', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(31, 'Queen', 'Bailey', 'Funk', 'B20201562', 'admin', 'pending', 'guillermo.franecki@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'cnug0mFHyq', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(32, 'Stephanie', 'Cartwright', 'Wiza', 'B20204990', 'student', 'pending', 'eddie.adams@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'iKhGbI5dOs', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(33, 'Ottilie', 'Hintz', 'Kulas', 'B20200524', 'admin', 'pending', 'murray58@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', '4x1qijirNH', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(34, 'Hector', 'Cormier', 'Gleichner', 'B20200117', 'student', 'pending', 'granville49@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', '9Vk7XAab6z', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(35, 'Ignatius', 'Shields', 'Williamson', 'B20209747', 'student', 'pending', 'theresia02@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'SYWsE8qZft', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(36, 'Austen', 'Stiedemann', 'Koelpin', 'B20203270', 'admin', 'pending', 'leanne.moore@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'R7jHbhGy1S', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(37, 'Connor', 'Wilkinson', 'Welch', 'B20201441', 'admin', 'pending', 'jimmy97@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'fBjbcoUq0P', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(38, 'Spencer', 'Dietrich', 'Stanton', 'B20209761', 'student', 'pending', 'elfrieda.ratke@example.net', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'FHQgwTC9sR', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(39, 'Ceasar', 'Hill', 'Ferry', 'B20207138', 'student', 'pending', 'kmorar@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'vGu5pF01et', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(40, 'Laurie', 'Stiedemann', 'Nienow', 'B20200132', 'student', 'pending', 'sborer@example.net', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'cg3VPB7TGs', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(41, 'Raphaelle', 'Cremin', 'Hoeger', 'B20206024', 'student', 'pending', 'ole.hayes@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'CcEBGQftjg', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(42, 'Maxie', 'Beatty', 'Mueller', 'B20204904', 'admin', 'pending', 'dmraz@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'r15lIJcpCX', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(43, 'Saul', 'Schumm', 'Jacobi', 'B20202450', 'admin', 'pending', 'rwilderman@example.net', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'zytTb9VeAR', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(44, 'Laverne', 'Shanahan', 'Wehner', 'B20209650', 'student', 'pending', 'randall72@example.net', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'J9HpXKYoG4', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(45, 'Sherwood', 'Pouros', 'Gerlach', 'B20205718', 'student', 'pending', 'phaley@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'CgfWCPxSKG', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(46, 'Adam', 'Larson', 'Altenwerth', 'B20205132', 'student', 'pending', 'dale84@example.org', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'mFr0cInbHf', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(47, 'Helen', 'Mayer', 'Lockman', 'B20208906', 'admin', 'pending', 'bschamberger@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', 'Er2a5OCqvz', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(48, 'Boris', 'Ferry', 'Hermann', 'B20202401', 'student', 'pending', 'mccullough.ramon@example.com', '2024-10-22 00:09:26', '$2y$12$nBDVZTn9NQKnyvQLlR1oNO6YKQV3HE.Q3ZUdYyOCY13MQuzf6.wyO', '7QpZk3RH9F', '2024-10-22 00:09:27', '2024-10-22 00:09:27'),
(49, 'Mona', 'Zemlak', 'Heathcote', 'B20205000', 'admin', 'pending', 'kirk58@example.net', '2024-10-30 22:26:49', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', '1ugdyqpOAz', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(50, 'Okey', 'Goodwin', 'Runte', 'B20201594', 'admin', 'pending', 'gleichner.josiah@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'mCuof6QAmt', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(51, 'Stephany', 'Rippin', 'Dickinson', 'B20206920', 'admin', 'pending', 'rolfson.verda@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'gnFnkbVBA9', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(52, 'Colby', 'Bednar', 'Block', 'B20206742', 'student', 'pending', 'saul40@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'ettDnAVV0c', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(53, 'Gabriella', 'Jacobi', 'Reichel', 'B20204986', 'admin', 'pending', 'stewart61@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'Ngu36eIY1c', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(54, 'Maddison', 'Bruen', 'Dach', 'B20207757', 'student', 'pending', 'marguerite.grady@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'mnsvuOnlwJ', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(55, 'Jaquelin', 'Kirlin', 'Ebert', 'B20209202', 'admin', 'pending', 'fay.loraine@example.com', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'EuqsUtb2mp', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(56, 'Glen', 'Ryan', 'Hintz', 'B20204513', 'student', 'pending', 'grimes.aiden@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'wArYOHrh0P', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(57, 'Khalil', 'Wintheiser', 'McCullough', 'B20206480', 'student', 'pending', 'hahn.dusty@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'wwO9pPndZv', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(58, 'Percival', 'Jacobs', 'Prohaska', 'B20200883', 'student', 'pending', 'vernon23@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', '9sFVSEmKD6', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(59, 'Kaelyn', 'Hagenes', 'Price', 'B20200848', 'student', 'pending', 'ismael82@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'EsP0Dnw5Eo', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(60, 'Krista', 'Kiehn', 'Rutherford', 'B20208815', 'student', 'pending', 'eloise86@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'ZZBdJ8YW5f', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(61, 'Tyson', 'Rowe', 'Wilderman', 'B20202669', 'admin', 'pending', 'arnoldo98@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'xrKPWI2abX', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(62, 'Celia', 'Torphy', 'Ziemann', 'B20208539', 'admin', 'pending', 'wilkinson.annabelle@example.com', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', '4Gtcccz5ag', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(63, 'Assunta', 'Raynor', 'Leannon', 'B20207336', 'admin', 'pending', 'gislason.alexane@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'qjkOv3jcIp', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(64, 'Morton', 'King', 'Terry', 'B20204045', 'student', 'pending', 'rau.sydni@example.com', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'OkwHQsboad', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(65, 'Donald', 'Witting', 'Willms', 'B20200670', 'student', 'pending', 'margarete.harber@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'qSAgm5lbhI', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(66, 'Alfredo', 'Robel', 'Carter', 'B20207420', 'admin', 'pending', 'ebert.kristofer@example.org', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'cprkGIm5fg', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(67, 'Samara', 'Mante', 'Senger', 'B20205540', 'admin', 'pending', 'hgrimes@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'H6IT6tWiCn', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(68, 'Alda', 'Daugherty', 'Schiller', 'B20209777', 'student', 'pending', 'sally02@example.net', '2024-10-30 22:26:50', '$2y$12$deBGYEO0Xkipy6cZrFp30Ol8N7R3JSWBTSw2NOrNc.KZDIJ6P1xUK', 'eWSWYcwuSu', '2024-10-30 22:26:50', '2024-10-30 22:26:50'),
(69, 'Elna', 'Jacobson', 'Effertz', 'B20202134', 'student', 'denied', 'gerhold.clifford@example.net', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'WEiba7AYzv', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(70, 'Hilton', 'Schinner', 'Nolan', 'B20208918', 'student', 'denied', 'yweimann@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '7mU7b3uOSz', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(71, 'Kaleigh', 'Gutkowski', 'Hyatt', 'B20202869', 'admin', 'denied', 'mittie29@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '97vEUca46B', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(72, 'Lane', 'Pacocha', 'Steuber', 'B20202796', 'admin', 'denied', 'ted.mcdermott@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'swEp7dpNPj', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(73, 'Benton', 'Lockman', 'Larson', 'B20203865', 'student', 'denied', 'ptrantow@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'mOxRRkAzbe', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(74, 'Grant', 'Schinner', 'Okuneva', 'B20200968', 'student', 'denied', 'vkoepp@example.net', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'PPGuUMF7Wd', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(75, 'Flavie', 'Bartoletti', 'Ward', 'B20203662', 'student', 'denied', 'ismith@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'D2RvGBwYEy', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(76, 'Erik', 'Rempel', 'Jakubowski', 'B20201450', 'admin', 'denied', 'olson.paolo@example.net', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'Sqz1A0oitc', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(77, 'Gina', 'Donnelly', 'Gutmann', 'B20205075', 'student', 'denied', 'nicolas.heloise@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '72J2AoUHDm', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(78, 'Mandy', 'Lueilwitz', 'Deckow', 'B20205879', 'student', 'denied', 'kuphal.sterling@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'fpNf6vOHDh', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(79, 'Isaias', 'Crona', 'Bogan', 'B20204484', 'admin', 'denied', 'joan.spencer@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'pAmImtOlRH', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(80, 'Beverly', 'Mante', 'Schmitt', 'B20209962', 'student', 'denied', 'okon.stefanie@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '6LmRdQzN9K', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(81, 'Dedrick', 'Legros', 'Mann', 'B20208075', 'student', 'denied', 'alexandrine64@example.net', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '7aQvF0bQKy', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(82, 'Marguerite', 'Larson', 'Kshlerin', 'B20204968', 'admin', 'denied', 'tfahey@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'jAH6uvlcnj', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(83, 'Doyle', 'Lynch', 'Deckow', 'B20200904', 'admin', 'denied', 'ozella.mclaughlin@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '9b1J7udlVN', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(84, 'Lillie', 'Haag', 'McCullough', 'B20202788', 'admin', 'denied', 'pierre92@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'qpaQTpdWmK', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(85, 'Martin', 'Dietrich', 'Stamm', 'B20205868', 'student', 'denied', 'odurgan@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '5MqadYvTcL', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(86, 'Mose', 'Jast', 'Sawayn', 'B20200273', 'student', 'denied', 'srosenbaum@example.org', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'ZIUfw8lKGw', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(87, 'Virginia', 'Hoppe', 'Bergnaum', 'B20204057', 'admin', 'denied', 'montana06@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', 'gtDFrv7Qpt', '2024-10-30 22:27:27', '2024-10-30 22:27:27'),
(88, 'Eric', 'Moen', 'Lemke', 'B20204065', 'admin', 'denied', 'vandervort.marcelino@example.com', '2024-10-30 22:27:27', '$2y$12$wkD86TLVpxCQFko4VhefeO6.AlBIvg0fKy5frLq7KXx1iMe9SFym.', '5eD6hbGuas', '2024-10-30 22:27:27', '2024-10-30 22:27:27');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
