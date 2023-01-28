-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2022 at 06:16 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_departure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_arrival` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone_number`, `destination`, `members`, `date_of_departure`, `date_of_arrival`, `created_at`, `updated_at`) VALUES
(4, 'Sunil kumar Yadav', 'sunil@gmail.com', '8382869681', 'Banglore', '4', '2022-10-13', '2022-11-01', '2022-10-28 04:23:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Sunil', 'Yadav', 'sunil@gmail.com', '500 Terry Francois St.\n\nSan Francisco, CA 94158\n\n123-456-7890\n\ninfo@mysite.com', '2022-10-28 04:10:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeliver` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `full_name`, `email`, `address1`, `address2`, `phone_number1`, `phone_number2`, `country`, `state`, `zip`, `card_number`, `expiry_date`, `cvv`, `postal_code`, `product_title`, `sku_id`, `price`, `image`, `quantity`, `isDeliver`, `created_at`, `updated_at`) VALUES
(1, 8, 'Rohit Sharma', 'hello@example.com', 'KK Apartment C5 , Dalibagh', '222060', '9795605833', '', 'United States', 'California', '222060', '111234567896432', '12/23', '1234', '222060', 'Classic Ireland Adventure - 7 Days,Ultimate Ireland Road Trip', '002,003', '45,50', 'services4.webp,services1.webp', '1,1', 1, '2022-10-31 12:16:12', '2022-11-01 00:34:33'),
(2, 8, 'Rohit Sharma', 'hello@example.com', '149', 'Village and post-Baraipur , Dist.-Azamgarh , UP', '09795605833', '', 'United States', 'California', '225003', '888888888888888', '12/23', '2222', '225003', 'Classic Ireland Adventure - 7 Days,Ultimate Ireland Road Trip', '002,003', '45,50', 'services4.webp,services1.webp', '1,1', 1, '2022-10-31 12:19:32', '2022-11-01 00:34:31'),
(3, 8, 'Rohit Sharma', 'hello@example.com', 'KK Apartment C5 , Dalibagh', '222060', '9795605833', '', 'United States', 'California', '222060', '67777777777777', '12/23', '7654', '222060', 'Classic Ireland Adventure - 7 Days,Ultimate Ireland Road Trip', '002,003', '45,50', 'services4.webp,services1.webp', '1,1', 1, '2022-10-31 12:22:31', '2022-11-01 00:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `sku_id`, `price`, `quantity`, `images`, `description`, `created_at`, `updated_at`) VALUES
(1, 'South Ireland Scenic Road Trip - 8 Days', '001', '35', '100', 'services1.webp,services2.webp,services3.webp', 'A great choice for families or travelers who prefer a little independence, this itinerary will take you on a leisurely road trip through some of Ireland most scenic cities and natural sites. Experience the allure of Ireland as you drive along the coast and over verdant hills between stop at the medieval Rock of Cashel, Killarney National Park, and the Cliffs of Moher.', '2022-10-28 22:48:04', NULL),
(2, 'Classic Ireland Adventure - 7 Days', '002', '45', '50', 'services4.webp,services5.webp', 'A great choice for families or travelers who prefer a little independence, this itinerary will take you on a leisurely road trip through some of Ireland most scenic cities and natural sites. Experience the allure of Ireland as you drive along the coast and over verdant hills between stop at the medieval Rock of Cashel, Killarney National Park, and the Cliffs of Moher.', '2022-10-28 22:49:49', '2022-10-29 02:46:26'),
(3, 'Ultimate Ireland Road Trip', '003', '50', '150', 'services1.webp,services2.webp,services3.webp', 'A great choice for families or travelers who prefer a little independence, this itinerary will take you on a leisurely road trip through some of Ireland most scenic cities and natural sites. Experience the allure of Ireland as you drive along the coast and over verdant hills between stop at the medieval Rock of Cashel, Killarney National Park, and the Cliffs of Moher.', '2022-10-28 22:50:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `email_verified_at`, `password`, `phone_number`, `city`, `role`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'admin@gmail.com', NULL, '827ccb0eea8a706c4c34a16891f84e7b', '9811107203', 'France', 'admin', 'active', '2022-10-26 03:15:31', NULL),
(8, 'Rohit Sharma', 'hello@example.com', NULL, '827ccb0eea8a706c4c34a16891f84e7b', '9795605833', 'France', 'user', 'active', '2022-10-31 04:55:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`sku_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
