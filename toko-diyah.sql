-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2025 at 07:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko-diyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_11_005135_create_products_table', 1),
(5, '2025_05_11_140826_create_sales_table', 1),
(6, '2025_05_11_141043_create_sale_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `image`, `capital_price`, `selling_price`, `stock`, `created_at`, `updated_at`) VALUES
(11, 10, 'Aqua Botol 600ml', 'gambar_products/bRPPpFwmTddhFRcKD3ud95jWvlj3OveJqsDOybH1.jpg', 3000, 5000, 0, '2025-05-12 20:17:40', '2025-05-12 20:50:47'),
(12, 10, 'Teh Botol Sosro 500ml', 'gambar_products/4nhlb1r2Uze7vbp9Ym1tcLBIMbcAWOEkFNf54xdt.jpg', 5000, 8000, 0, '2025-05-12 22:23:55', '2025-05-12 22:23:55'),
(13, 10, 'Coca-Cola Kaleng 330ml', 'gambar_products/Caf66CPxwgJU1bElycUrbZLUPQCLsBWdnK4AS2uE.jpg', 7000, 9000, 0, '2025-05-12 22:24:29', '2025-05-12 22:24:29'),
(14, 10, 'Mister Potato Chips Original 85g', 'gambar_products/MZQSOW2FEEzVKl3PFfW58BXiBQYvUR0i19iEy9W0.jpg', 18000, 23000, 0, '2025-05-12 22:30:49', '2025-05-12 22:30:49'),
(15, 10, 'Oreo Vanilla 137g', 'gambar_products/BqHChaybjK4IW2d9uS0KsKRCuI2UYvCKKj2pkxbl.jpg', 13000, 18000, 0, '2025-05-12 22:32:48', '2025-05-12 22:32:48'),
(16, 10, 'Indomie ayam bawang 69 gr', 'gambar_products/IQskNTVAvdTklaCCvOVjVrgA5G4zghOQ7f0EvImd.jpg', 2000, 3000, 0, '2025-05-12 22:35:48', '2025-05-12 22:35:48'),
(17, 10, 'Indomie goreng 69 gr', 'gambar_products/YO1dzHNupkISkYpjjghgjfzb8uW1EtlbdHw0AkHL.jpg', 2000, 3500, 0, '2025-05-12 22:36:28', '2025-05-12 22:36:28'),
(18, 11, 'Aqua Botol 600ml', 'gambar_products/Tsb25YezEk5Aj1NV1YTzuoHOrsfXeW3atpgFJ7qc.jpg', 3000, 5000, 0, '2025-05-12 22:43:38', '2025-05-12 22:44:51'),
(19, 11, 'Teh Botol Sosro 500ml', 'gambar_products/m2t7v1yfSPG1WPSCmPZhdNReO5ZgVbK2VGLPX673.jpg', 5000, 8000, 0, '2025-05-12 22:44:38', '2025-05-12 22:45:12'),
(20, 11, 'Coca-Cola Kaleng 330ml', 'gambar_products/bo55YA177pceFC80YOBYXmHt6BKz6xeMyYAEL26E.jpg', 7000, 9000, 0, '2025-05-12 22:45:53', '2025-05-12 22:45:53'),
(21, 11, 'Mister Potato Chips Original 85g', 'gambar_products/qzrDAkSUPOiYCYKVnQLqAMEXuHmVCg9B9jHCeNvn.jpg', 18000, 23000, 0, '2025-05-12 22:46:24', '2025-05-12 22:46:24'),
(22, 11, 'Oreo Vanilla 137g', 'gambar_products/q374FWquzW0kJ8XVsfa6FD8FlMISPHgQK5xIOrmN.jpg', 13000, 18000, 0, '2025-05-12 22:46:55', '2025-05-12 22:46:55'),
(23, 11, 'Indomie ayam bawang 69 gr', 'gambar_products/JyYaM2lXxbnwxStZHEqDpIAa8nUq61hZHihvc2zn.jpg', 2000, 3000, 0, '2025-05-12 22:47:27', '2025-05-12 22:47:27'),
(24, 11, 'Indomie goreng 69 gr', 'gambar_products/cWdnfyoOZwsKjPDpz7N1mLuCRuudvRiIBh54gqPA.jpg', 2000, 3500, 0, '2025-05-12 22:47:55', '2025-05-12 22:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `money_received` int NOT NULL,
  `change` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `transaction_code`, `user_id`, `total`, `money_received`, `change`, `created_at`, `updated_at`) VALUES
(1, 'TRX-20250511013836-ljTifh', 7, 112294, 115322, 3028, '2025-05-10 18:38:36', '2025-05-10 18:38:36'),
(2, 'TRX-20250511013836-WbuIrm', 7, 255659, 294524, 38865, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(3, 'TRX-20250511013836-lKf9uX', 7, 277930, 309475, 31545, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(4, 'TRX-20250511013836-1hqyYs', 7, 178337, 193068, 14731, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(5, 'TRX-20250511013836-Q4s55M', 7, 380538, 429705, 49167, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(6, 'TRX-20250511013836-ILm8ez', 7, 192621, 204910, 12289, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(7, 'TRX-20250511013836-al3lyZ', 7, 398072, 443905, 45833, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(8, 'TRX-20250511013836-NxDHGm', 7, 389871, 392418, 2547, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(9, 'TRX-20250511013836-AmrsWL', 7, 51738, 64951, 13213, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(10, 'TRX-20250511013836-sNNDui', 7, 148021, 154205, 6184, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(11, 'TRX-20250511013836-B1GxAx', 7, 142231, 158920, 16689, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(12, 'TRX-20250511013836-nzLsot', 7, 299694, 315017, 15323, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(13, 'TRX-20250511013836-di2E82', 7, 246487, 294530, 48043, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(14, 'TRX-20250511013836-DWVzkE', 7, 164466, 166978, 2512, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(15, 'TRX-20250511013836-a0gpFI', 7, 26113, 67858, 41745, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(16, 'TRX-20250511013836-Tz0HOn', 7, 209791, 239219, 29428, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(17, 'TRX-20250511013836-kjq6Px', 7, 233201, 272384, 39183, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(18, 'TRX-20250511013836-pKAoIa', 7, 298155, 343314, 45159, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(19, 'TRX-20250511013836-D6dA4r', 7, 141766, 159528, 17762, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(20, 'TRX-20250511013836-Rkqzjs', 7, 494400, 522588, 28188, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(21, 'TRX-20250511013836-Od4Lbi', 7, 113438, 161788, 48350, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(22, 'TRX-20250511013836-L2PTpB', 7, 121124, 145632, 24508, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(23, 'TRX-20250511013836-XRz0o9', 7, 246200, 263798, 17598, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(24, 'TRX-20250511013836-hVHnur', 7, 222506, 258387, 35881, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(25, 'TRX-20250511013836-SFi6C6', 7, 411812, 455445, 43633, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(26, 'TRX-20250511013836-H9iJnf', 7, 143123, 171621, 28498, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(27, 'TRX-20250511013836-plZmm5', 7, 350292, 359223, 8931, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(28, 'TRX-20250511013836-hqx4qe', 7, 460768, 495103, 34335, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(29, 'TRX-20250511013836-QOOfuT', 7, 348898, 376898, 28000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(30, 'TRX-20250511013836-Lnc6tw', 7, 211583, 239946, 28363, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(31, 'TRX-20250511013836-YS0CQs', 7, 95777, 133810, 38033, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(32, 'TRX-20250511013836-DaqoD7', 7, 84574, 133274, 48700, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(33, 'TRX-20250511013836-pmkzct', 7, 485324, 512266, 26942, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(34, 'TRX-20250511013836-7Wfnfx', 7, 225424, 268916, 43492, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(35, 'TRX-20250511013836-L7aCcb', 7, 439172, 466940, 27768, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(36, 'TRX-20250511013836-pPEwG6', 7, 244460, 277545, 33085, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(37, 'TRX-20250511013836-83K6Hg', 7, 59840, 85813, 25973, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(38, 'TRX-20250511013836-wjrQbr', 7, 411790, 421491, 9701, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(39, 'TRX-20250511013836-VPhcqk', 7, 194959, 243200, 48241, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(40, 'TRX-20250511013836-xhnikw', 7, 43589, 86141, 42552, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(41, 'TRX-20250511013836-0VGrfI', 7, 152549, 163491, 10942, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(42, 'TRX-20250511013836-BQvm81', 7, 285432, 292603, 7171, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(43, 'TRX-20250511013836-tOnPAB', 7, 153622, 167208, 13586, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(44, 'TRX-20250511013836-Y7rCX5', 7, 142550, 185963, 43413, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(45, 'TRX-20250511013836-BsPv6M', 7, 374253, 422718, 48465, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(46, 'TRX-20250511013836-wv3Ba7', 7, 64764, 70942, 6178, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(47, 'TRX-20250511013836-HL1iGc', 7, 93939, 137621, 43682, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(48, 'TRX-20250511013836-Y727R9', 7, 124985, 166324, 41339, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(49, 'TRX-20250511013836-o76QXk', 7, 400661, 421059, 20398, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(50, 'TRX-20250511013836-1X5fUe', 7, 162856, 182785, 19929, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(51, 'TRX-20250513033216-pfTyTT', 10, 6000, 10000, 4000, '2025-05-12 20:32:16', '2025-05-12 20:32:16'),
(52, 'TRX-20250513053811-WTHh61', 10, 33000, 50000, 17000, '2025-05-12 22:38:11', '2025-05-12 22:38:11'),
(53, 'TRX-20250513070258-CQQSXZ', 10, 21000, 30000, 9000, '2025-05-13 00:02:58', '2025-05-13 00:02:58'),
(54, 'TRX-20250513070446-p3fy9V', 11, 29000, 40000, 11000, '2025-05-13 00:04:46', '2025-05-13 00:04:46'),
(55, 'TRX-20250513071523-S5RlkY', 11, 19000, 30000, 11000, '2025-05-13 00:15:23', '2025-05-13 00:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(151, 51, 11, 1, 6000, '2025-05-12 20:32:16', '2025-05-12 20:32:16'),
(152, 52, 11, 2, 10000, '2025-05-12 22:38:11', '2025-05-12 22:38:11'),
(153, 52, 14, 1, 23000, '2025-05-12 22:38:11', '2025-05-12 22:38:11'),
(154, 53, 11, 2, 10000, '2025-05-13 00:02:58', '2025-05-13 00:02:58'),
(155, 53, 12, 1, 8000, '2025-05-13 00:02:58', '2025-05-13 00:02:58'),
(156, 53, 16, 1, 3000, '2025-05-13 00:02:58', '2025-05-13 00:02:58'),
(157, 54, 22, 1, 18000, '2025-05-13 00:04:46', '2025-05-13 00:04:46'),
(158, 54, 23, 1, 3000, '2025-05-13 00:04:46', '2025-05-13 00:04:46'),
(159, 54, 19, 1, 8000, '2025-05-13 00:04:46', '2025-05-13 00:04:46'),
(160, 55, 18, 2, 10000, '2025-05-13 00:15:23', '2025-05-13 00:15:23'),
(161, 55, 20, 1, 9000, '2025-05-13 00:15:23', '2025-05-13 00:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `shop_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diyah', 'Toko Diyah', 'diyah@example.com', NULL, '$2y$12$6kG84DZzOenfDTPSqbg59Oan.0B3LNI8HjnBeZ4Vig8EbEqoaV8gG', NULL, '2025-05-10 18:38:30', '2025-05-10 18:38:30'),
(2, 'Abigail Greenholt', 'Toko Stokes', 'blind@example.net', '2025-05-10 18:38:30', '$2y$12$hBUHQu.xsEBtOW7qnzuzMunwaImYX7LmDqmTOrGGn1RDFnM26Njhy', 'egyCq5vgbb', '2025-05-10 18:38:34', '2025-05-10 18:38:34'),
(3, 'Ms. Onie Ankunding', 'Toko Schulist', 'hgraham@example.org', '2025-05-10 18:38:31', '$2y$12$wZbue.ipaMn8mOjHg/8zv.Fs1lunMv6sy6xWSbcLHWer9ShGXyR/y', 'xgxoV4aHyG', '2025-05-10 18:38:34', '2025-05-10 18:38:34'),
(4, 'Geovanni Dietrich', 'Toko Flatley', 'gregory.deckow@example.com', '2025-05-10 18:38:32', '$2y$12$JlBghaHOLyBujHV8zTgnHezADSqbSGa4fXpFRdxa1cOVmBr16MESe', 'M4lcAQwJ04', '2025-05-10 18:38:34', '2025-05-10 18:38:34'),
(5, 'Miss Janet McLaughlin', 'Toko Welch', 'torp.georgiana@example.com', '2025-05-10 18:38:33', '$2y$12$QlbkM4i9NOjgCCmNW0ctE.VS9zMi.PCBdQcJN0DtoPRduY73OlLri', 'fVDvY39W2g', '2025-05-10 18:38:34', '2025-05-10 18:38:34'),
(6, 'Lorena Batz', 'Toko Feil', 'lillian58@example.net', '2025-05-10 18:38:33', '$2y$12$DSxBonqZZyCkfXo5GTVGOO3lF0jRNuZMIBfpcYvh61wP7IE0SN1mO', 'kP8vQFekhp', '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(7, 'Kasir Toko', 'Toko Diyah', 'kasir@tokodiyah.com', NULL, 'de28f8f7998f23ab4194b51a6029416f', NULL, '2025-05-10 18:38:36', '2025-05-10 18:38:36'),
(8, 'diyahww', 'tokodd', 'diyah@gmail.com', NULL, '$2y$12$U/jT9bkblQmhIFLWHYlyRuKxhIi2z4764NiGfzBGo6r1cMwlBMz0q', NULL, '2025-05-12 02:36:04', '2025-05-12 02:36:04'),
(9, 'regina', 'tokoregina', 'regina@gmail.com', NULL, '$2y$12$HAbUz/5dAmHb4WH2eOFE6eqGYrR08Am7t1T9cO46ifX12OTnphZNS', NULL, '2025-05-12 04:03:05', '2025-05-12 04:03:05'),
(10, 'zea', 'tokozea', 'zea@gmail.com', NULL, '$2y$12$8VD8dNzySF9ueESg4iGxDeWKp2Jpclflf4qeYH.DOrSbi.rcMklR.', NULL, '2025-05-12 06:09:32', '2025-05-12 06:09:32'),
(11, 'aleeya', 'tokoaleeya', 'aleeya@gmail.com', NULL, '$2y$12$UQWwQzhLKKiRLn4A8UI52.iRdMBtSzHouTr6e95jjwWthvzCsvFkG', NULL, '2025-05-12 22:40:17', '2025-05-12 22:40:17'),
(12, 'puput', 'tokopuput', 'puput@gmail.com', NULL, '$2y$12$vwclEF0eOlZIO2G69CvE5ubIeXK3CqYzs415WGqGe0OU/76HX3nOi', NULL, '2025-05-12 23:55:23', '2025-05-12 23:55:23'),
(13, 'kus', 'tokokus', 'kus@gmail.com', NULL, '$2y$12$Wt2/ypzaQsYuibRHSa1FfO76z.9lx90dul/b5U.H0V9uwKnAEgg62', NULL, '2025-05-13 00:01:23', '2025-05-13 00:01:23'),
(14, 'aripin', 'tokoaripin', 'aripin@gmail.com', NULL, '$2y$12$jfPJhTe0JyJP1nzKXmDLnuZp4Nc4Zt.9CRWgqHaao1tpXV8Ne9vmC', NULL, '2025-05-13 00:12:53', '2025-05-13 00:12:53'),
(15, 'aulia', 'tokoaulia', 'aulia@gmail.com', NULL, '$2y$12$.QiLEGPCfpn3nbY1TE7MqOzio2wOWVkiaedx.UDfy8V1qx3Ewkic6', NULL, '2025-05-13 00:25:54', '2025-05-13 00:25:54');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_transaction_code_unique` (`transaction_code`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
