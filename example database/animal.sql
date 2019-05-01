-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 09:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `animal_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` enum('adopted','available') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `ownerid` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `created_at`, `updated_at`, `animal_name`, `date_of_birth`, `description`, `image`, `availability`, `ownerid`) VALUES
(1, '2019-04-30 09:42:20', '2019-04-30 09:42:20', 'john', '2015-05-07', 'wfeergfdgtfdr', 'noimage.jpg', 'available', NULL),
(2, '2019-04-30 09:42:57', '2019-04-30 09:42:57', 'john', '2015-05-07', 'efsddgth', 'noimage.jpg', 'available', 2),
(3, '2019-04-30 09:58:47', '2019-04-30 09:58:47', 'john', '2015-05-07', 'rdgfvrdgf', 'noimage.jpg', 'available', NULL),
(4, '2019-04-30 09:59:26', '2019-04-30 09:59:26', 'john', '2015-06-04', 'gsdfdv', 'noimage.jpg', 'available', NULL);

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_04_29_154018_create_animals_table', 1),
(8, '2019_04_30_083615_create_requests_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `animalid` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `userid`, `animalid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'accepted', '2019-05-01 07:06:01', '2019-05-01 12:54:56'),
(2, 2, 1, 'pending', '2019-05-01 16:42:15', '2019-05-01 16:42:15'),
(3, 2, 1, 'pending', '2019-05-01 16:42:48', '2019-05-01 16:42:48'),
(4, 2, 4, 'pending', '2019-05-01 16:43:51', '2019-05-01 16:43:51'),
(5, 2, 2, 'pending', '2019-05-01 17:09:53', '2019-05-01 17:09:53'),
(6, 2, 1, 'pending', '2019-05-01 17:10:52', '2019-05-01 17:10:52'),
(7, 2, 1, 'pending', '2019-05-01 17:11:12', '2019-05-01 17:11:12'),
(8, 2, 1, 'pending', '2019-05-01 17:12:04', '2019-05-01 17:12:04'),
(9, 2, 2, 'pending', '2019-05-01 17:12:08', '2019-05-01 17:12:08'),
(10, 2, 1, 'pending', '2019-05-01 17:13:26', '2019-05-01 17:13:26'),
(11, 2, 1, 'pending', '2019-05-01 17:14:14', '2019-05-01 17:14:14'),
(12, 2, 1, 'pending', '2019-05-01 17:16:42', '2019-05-01 17:16:42'),
(13, 2, 1, 'pending', '2019-05-01 17:16:55', '2019-05-01 17:16:55'),
(14, 2, 1, 'pending', '2019-05-01 17:17:16', '2019-05-01 17:17:16'),
(15, 2, 1, 'pending', '2019-05-01 17:22:22', '2019-05-01 17:22:22'),
(16, 2, 1, 'pending', '2019-05-01 17:23:01', '2019-05-01 17:23:01'),
(17, 2, 2, 'pending', '2019-05-01 17:23:05', '2019-05-01 17:23:05'),
(18, 2, 3, 'pending', '2019-05-01 17:23:19', '2019-05-01 17:23:19'),
(19, 2, 2, 'pending', '2019-05-01 17:23:21', '2019-05-01 17:23:21'),
(20, 2, 2, 'pending', '2019-05-01 17:32:43', '2019-05-01 17:32:43'),
(21, 2, 2, 'pending', '2019-05-01 17:35:09', '2019-05-01 17:35:09'),
(22, 2, 2, 'pending', '2019-05-01 17:35:49', '2019-05-01 17:35:49'),
(23, 2, 2, 'pending', '2019-05-01 17:36:21', '2019-05-01 17:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@sanctuary.com', 1, NULL, '$2y$10$/mILCct4XK8S39d52YOxz.zYSvBGdv4OBAcaIS/5hWlEYuAmctdpm', NULL, '2019-04-29 19:45:51', '2019-04-29 19:45:51'),
(2, 'person', 'Animal@animal.com', 0, NULL, '$2y$10$Xd7FfjS5k6sbuKrjMtXTUOnMuxZLvntEISEEnnO9LG4G7iUsJzmi6', NULL, '2019-04-30 12:39:49', '2019-04-30 12:39:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_ownerid_foreign` (`ownerid`);

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
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_userid_foreign` (`userid`),
  ADD KEY `requests_animalid_foreign` (`animalid`);

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
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ownerid_foreign` FOREIGN KEY (`ownerid`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_animalid_foreign` FOREIGN KEY (`animalid`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `requests_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
