-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 03:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Camry Car', 'Toyota', 'Camry', 2020, 'Sedan', 50.00, 0, 'cars/1727096846.jpg', '2024-09-18 05:15:15', '2024-09-23 07:07:26'),
(2, 'Honda CR-V', 'Honda', 'CR-V', 2021, 'SUV', 70.00, 1, 'cars/2.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(3, 'Ford Mustang', 'Ford', 'Mustang', 2019, 'Coupe', 100.00, 1, 'cars/3.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(4, 'Tesla Model S', 'Tesla', 'Model S', 2022, 'Electric', 120.00, 1, 'cars/4.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(5, 'BMW X5', 'BMW', 'X5', 2021, 'SUV', 90.00, 1, 'cars/5.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(6, 'Toyota Camry', 'Toyota', 'Camry', 2020, 'Sedan', 50.00, 1, 'cars/1.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(7, 'Honda CR-V', 'Honda', 'CR-V', 2021, 'SUV', 70.00, 1, 'cars/2.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(8, 'Ford Mustang', 'Ford', 'Mustang', 2019, 'Coupe', 100.00, 1, 'cars/3.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(9, 'Tesla Model S', 'Tesla', 'Model S', 2022, 'Electric', 120.00, 1, 'cars/4.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(10, 'BMW X5', 'BMW', 'X5', 2021, 'SUV', 90.00, 1, 'cars/5.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(11, 'Toyota Camry', 'Toyota', 'Camry', 2020, 'Sedan', 50.00, 1, 'cars/1.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(12, 'Honda CR-V', 'Honda', 'CR-V', 2021, 'SUV', 70.00, 1, 'cars/2.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(13, 'Ford Mustang', 'Ford', 'Mustang', 2019, 'Coupe', 100.00, 1, 'cars/3.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(14, 'Tesla Model S', 'Tesla', 'Model S', 2022, 'Electric', 120.00, 1, 'cars/4.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15'),
(15, 'BMW X5', 'BMW', 'X5', 2021, 'SUV', 90.00, 1, 'cars/5.jpg', '2024-09-18 05:15:15', '2024-09-18 05:15:15');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_09_10_140047_create_users_table', 1),
(5, '2024_09_18_082725_create_cars_table', 1),
(6, '2024_09_18_082932_create_rentals_table', 1),
(7, '2024_09_23_140102_create_rentals_table', 2),
(8, '2024_09_23_140333_create_rentals_table', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` enum('Ongoing','Completed','Canceled') NOT NULL DEFAULT 'Ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-09-23', '2024-09-24', 500.00, 'Completed', '2024-09-23 08:04:26', '2024-09-24 09:00:14'),
(3, 2, 2, '2024-09-24', '2024-09-24', 0.00, 'Ongoing', '2024-09-24 09:13:15', '2024-09-24 09:13:15'),
(4, 2, 1, '2024-09-27', '2024-09-28', 50.00, 'Completed', '2024-09-26 06:29:18', '2024-09-26 06:30:51'),
(5, 2, 2, '2024-09-27', '2024-09-30', 210.00, 'Ongoing', '2024-09-26 07:15:23', '2024-09-26 07:15:23'),
(7, 2, 9, '2024-09-20', '2024-10-03', 1560.00, 'Ongoing', '2024-09-26 07:26:22', '2024-09-26 07:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `otp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Md Salim Reza', 'bafsalim@gmail.com', '12345', '0', 'admin', '2024-09-18 05:18:09', '2024-09-22 10:57:48'),
(2, 'Md Salim Reza', 'mdsalimrezaspi@gmail.com', '12345', '0', 'customer', '2024-09-18 05:18:32', '2024-09-26 07:31:49'),
(5, 'Md Sumon Ahmed', 'sumon@gmail.com', '12345', '0', 'customer', '2024-09-22 11:16:20', '2024-09-22 11:16:20'),
(6, 'Md Moshiar Rahman r', 'salim@gmail.com', '12345', '0', 'customer', '2024-09-22 11:16:37', '2024-09-22 11:16:37'),
(7, 'Md Moshiar RahmanE', 'engr.rabbil@yahoo.com', '12345', '0', 'customer', '2024-09-22 11:16:57', '2024-09-22 11:16:57'),
(8, 'Md Moshiar Rahman r', 'robiul0pk@gmail.com', '12345', '0', 'customer', '2024-09-22 11:17:57', '2024-09-22 11:17:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
