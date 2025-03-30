-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 03:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sameer_shaikh_tasks`
--

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `priority` enum('Low','Medium','High','') NOT NULL DEFAULT 'Low',
  `due_date` date NOT NULL,
  `status` enum('Pending','Completed','','') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `due_date`, `status`, `created_at`, `updated_at`) VALUES
(7, 'test111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:29', '2025-03-29 16:45:29'),
(8, 'test1111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:32', '2025-03-29 16:45:32'),
(9, 'test11111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:35', '2025-03-29 16:45:35'),
(10, 'test111111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:37', '2025-03-29 16:45:37'),
(11, 'test1111111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:40', '2025-03-29 16:45:40'),
(12, 'test11111111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:44', '2025-03-29 16:45:44'),
(14, 'test1111111111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:45:57', '2025-03-29 16:45:57'),
(15, 'test11111111111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:46:00', '2025-03-29 16:46:00'),
(16, 'test111111111111', 'description1', 'High', '2025-01-20', 'Completed', '2025-03-29 16:46:03', '2025-03-29 16:46:03'),
(18, 'test1231111', 'test1111111111', 'Low', '2025-03-04', 'Pending', '2025-03-30 14:32:57', '2025-03-30 14:32:57'),
(19, 'test', 'test', 'Low', '2025-03-05', 'Pending', '2025-03-30 14:36:16', '2025-03-30 14:36:16'),
(22, 'test1231', 'test', 'Medium', '2025-03-04', 'Completed', '2025-03-30 16:42:25', '2025-03-30 16:42:25'),
(23, 'test123111111111111', 'test', 'Medium', '2025-03-04', 'Completed', '2025-03-30 16:42:37', '2025-03-30 16:42:37'),
(24, 'test12311', 'test', 'Medium', '2025-03-04', 'Completed', '2025-03-30 16:48:36', '2025-03-30 16:48:36'),
(25, 'test1231', 'test', 'Medium', '2025-03-04', 'Completed', '2025-03-30 16:50:18', '2025-03-30 16:50:18'),
(26, 'test1231111', 'test', 'Medium', '2025-03-04', 'Completed', '2025-03-30 16:51:52', '2025-03-30 16:51:52'),
(27, 'test123111', 'test', 'Medium', '2025-03-04', 'Completed', '2025-03-30 16:52:08', '2025-03-30 16:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'test', 'test', 'sameer@gmail.com', '', '$2y$10$rQtV0KEg5ygdsxFhaOS/9uEzpYB7d0pmr5RoAup96i8vIqudr9ZRW', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
