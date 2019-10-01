-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 12:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grand`
--

-- --------------------------------------------------------

--
-- Table structure for table `barbers`
--

CREATE TABLE `barbers` (
  `b_id` bigint(20) UNSIGNED NOT NULL,
  `b_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_active` tinyint(1) NOT NULL DEFAULT '1',
  `b_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barbers`
--

INSERT INTO `barbers` (`b_id`, `b_name`, `b_photo`, `b_price`, `b_active`, `b_link`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'barber1', NULL, '50', 0, 'sda/ada/ada/dad/ad/asdad', NULL, '2019-09-29 11:01:41', '2019-09-29 11:38:26'),
(2, 'barber2', NULL, '70', 0, 'sda/ada/ada/dad/ad/asdad/uiy/iyyiyi/iyi', NULL, '2019-09-29 11:02:56', '2019-09-29 11:02:56'),
(3, 'barber3', NULL, '90', 0, 'google.com', NULL, '2019-09-29 11:06:17', '2019-09-29 11:06:17'),
(4, 'barber4', 'barberImg_1569764217.png', '99', 0, 'facebook.com', NULL, '2019-09-29 11:08:09', '2019-09-29 11:08:09'),
(5, 'barber5', 'barberImg_1569762575.png', '60', 1, 'google.com', NULL, '2019-09-29 11:09:35', '2019-09-29 11:09:35'),
(6, 'barber6', 'barberImg_1569768441.png', '85', 1, 'google.com', NULL, '2019-09-29 12:47:21', '2019-09-29 12:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `barberslikes`
--

CREATE TABLE `barberslikes` (
  `b_l_id` bigint(20) UNSIGNED NOT NULL,
  `b_like` tinyint(1) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `barber_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barberslikes`
--

INSERT INTO `barberslikes` (`b_l_id`, `b_like`, `customer_id`, `barber_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2019-09-28 22:00:00', '2019-09-28 22:00:00'),
(2, 1, 2, 6, NULL, '2019-09-30 19:27:52', '2019-09-30 19:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `barbersrates`
--

CREATE TABLE `barbersrates` (
  `b_r_id` bigint(20) UNSIGNED NOT NULL,
  `b_rate` double(8,2) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `barber_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barbersrates`
--

INSERT INTO `barbersrates` (`b_r_id`, `b_rate`, `customer_id`, `barber_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3.50, 1, 1, NULL, '2019-09-28 22:00:00', '2019-09-28 22:00:00'),
(2, 4.50, 1, 2, NULL, '2019-09-28 22:00:00', '2019-09-28 22:00:00'),
(3, 4.20, 2, 1, NULL, '2019-09-29 22:00:00', '2019-09-29 22:00:00'),
(4, 2.20, 3, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_email`, `c_password`, `c_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'andrewwwww', 'andrew.akram@gmail.com', 'b8b074e739c55886ffefb96c0680b623', NULL, NULL, '2019-09-29 16:58:53', '2019-09-29 17:13:40'),
(2, 'ayman', 'andrew2.akram2@gmail.com', 'b8b074e739c55886ffefb96c0680b623', NULL, NULL, '2019-09-30 18:36:48', '2019-09-30 18:36:48');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_29_103847_create_barbers_table', 2),
(4, '2019_09_29_105134_create_barberslikes_table', 2),
(5, '2019_09_29_105203_create_barbersrates_table', 2),
(6, '2019_09_29_105235_create_customers_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'andrew', 'andrew@andrew.com', NULL, '$2y$10$RiN84hIBfE5P4jDrlEvgo.MEoU29sQFoULylJSHK2zlDQWU.9AzcG', NULL, '2019-09-29 07:19:07', '2019-09-29 07:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `barberslikes`
--
ALTER TABLE `barberslikes`
  ADD PRIMARY KEY (`b_l_id`);

--
-- Indexes for table `barbersrates`
--
ALTER TABLE `barbersrates`
  ADD PRIMARY KEY (`b_r_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `customers_c_email_unique` (`c_email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barbers`
--
ALTER TABLE `barbers`
  MODIFY `b_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barberslikes`
--
ALTER TABLE `barberslikes`
  MODIFY `b_l_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barbersrates`
--
ALTER TABLE `barbersrates`
  MODIFY `b_r_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
