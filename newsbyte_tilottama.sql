-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2024 at 07:04 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsbyte_tilottama`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `name`, `club_name`, `qr_code`, `created_at`, `updated_at`) VALUES
(1, 'Dock Rental', 'Anthoni', 'qrcodes/1.png', '2024-12-03 05:21:05', '2024-12-03 05:21:05'),
(2, 'backend', 'Lorem Ipsum', 'qrcodes/2.png', '2024-12-03 05:21:34', '2024-12-03 05:21:34'),
(3, 'Shreya Chaki Nag', 'Lorem Ipsum', 'qrcodes/3.png', '2024-12-03 05:21:41', '2024-12-03 05:21:41'),
(4, 'Dock Rental', 'Lorem Ipsum', 'qrcodes/4.png', '2024-12-03 05:21:47', '2024-12-03 05:21:47'),
(5, 'test', 'Lorem Ipsum', 'qrcodes/5.png', '2024-12-03 05:21:54', '2024-12-03 05:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `attendee_flags`
--

CREATE TABLE `attendee_flags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendee_id` bigint(20) UNSIGNED NOT NULL,
  `event_date` date NOT NULL,
  `entry` tinyint(1) NOT NULL DEFAULT '0',
  `breakfast` tinyint(1) NOT NULL DEFAULT '0',
  `lottery_11_12` tinyint(1) NOT NULL DEFAULT '0',
  `lunch` tinyint(1) NOT NULL DEFAULT '0',
  `lottery_5_6` tinyint(1) NOT NULL DEFAULT '0',
  `poolside_entry` tinyint(1) NOT NULL DEFAULT '0',
  `dinner` tinyint(1) NOT NULL DEFAULT '0',
  `gift` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendee_flags`
--

INSERT INTO `attendee_flags` (`id`, `attendee_id`, `event_date`, `entry`, `breakfast`, `lottery_11_12`, `lunch`, `lottery_5_6`, `poolside_entry`, `dinner`, `gift`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-01-10', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:05', '2024-12-03 05:21:05'),
(2, 1, '2025-01-11', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:05', '2024-12-03 05:21:05'),
(3, 1, '2025-01-12', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:05', '2024-12-03 05:21:05'),
(4, 2, '2025-01-10', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:34', '2024-12-03 05:21:34'),
(5, 2, '2025-01-11', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:34', '2024-12-03 05:21:34'),
(6, 2, '2025-01-12', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:34', '2024-12-03 05:21:34'),
(7, 3, '2025-01-10', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:41', '2024-12-03 05:21:41'),
(8, 3, '2025-01-11', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:41', '2024-12-03 05:21:41'),
(9, 3, '2025-01-12', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:41', '2024-12-03 05:21:41'),
(10, 4, '2025-01-10', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:47', '2024-12-03 05:21:47'),
(11, 4, '2025-01-11', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:47', '2024-12-03 05:21:47'),
(12, 4, '2025-01-12', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:47', '2024-12-03 05:21:47'),
(13, 5, '2025-01-10', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:54', '2024-12-03 05:21:54'),
(14, 5, '2025-01-11', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:54', '2024-12-03 05:21:54'),
(15, 5, '2025-01-12', 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-03 05:21:54', '2024-12-03 05:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_28_131403_create_attendees_table', 2),
(5, '2024_11_28_132750_create_attendee_flags_table', 3);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4Cd89U7I92tZXp1avnD1o8WT1UY2GWcWO00gvOxc', NULL, '103.242.189.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWU53R1hyUTJYM09MTHJYT0dWYjU2eFdIOU1GRjRSWUVYRlRnUTRRRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vYWJ3ZWJ4LmNvbS91cGRhdGVzL3RpbG90dGFtYTIwMjUvZGV2L2Rvd25sb2FkLWFsbC1wZGZzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733232548),
('5KJ2IGYPISbxWekZUvtKNNYXp1omLm7UbTkzVtzk', NULL, '103.242.189.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicndyTmtJc3dadGFsUWFhdElYeEhHa3RVb1hMb240cGpDcFZ0NGc5OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vYWJ3ZWJ4LmNvbS91cGRhdGVzL3RpbG90dGFtYTIwMjUvZGV2L2Rvd25sb2FkLWFsbC1wZGZzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733207970),
('d4cTnKQxBAfbMqksuLDE0Uhy76QbgBcuQXAON999', NULL, '103.242.189.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiem1YWDFRRDlacDJiMVQ0WUFBa3g2RVA2ZldNa1FnZ2hOdlFZZ3p3QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vYWJ3ZWJ4LmNvbS91cGRhdGVzL3RpbG90dGFtYTIwMjUvZGV2L2Rvd25sb2FkLWFsbC1wZGZzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733224156),
('XuGbwLJOhT3FE2GU4CaAF6ZSM1t8wUGZx3XFp9xi', NULL, '103.242.189.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlJNNnRlZkhxMHdJVXhqNmp1dXVpaDh2WXZSWGhzOU1YV2cxcHVGNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vYWJ3ZWJ4LmNvbS91cGRhdGVzL3RpbG90dGFtYTIwMjUvZGV2L2Rvd25sb2FkLWFsbC1wZGZzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733232134);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendees_qr_code_unique` (`qr_code`);

--
-- Indexes for table `attendee_flags`
--
ALTER TABLE `attendee_flags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendee_flags_attendee_id_foreign` (`attendee_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendee_flags`
--
ALTER TABLE `attendee_flags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee_flags`
--
ALTER TABLE `attendee_flags`
  ADD CONSTRAINT `attendee_flags_attendee_id_foreign` FOREIGN KEY (`attendee_id`) REFERENCES `attendees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
