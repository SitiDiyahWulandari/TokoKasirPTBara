-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2025 at 10:16 AM
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
(1, 1, 'Aqua Botol 600ml', NULL, 3000, 5000, 100, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(2, 1, 'Teh Botol Sosro 500ml', NULL, 3500, 6000, 80, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(3, 1, 'Coca-Cola Kaleng 330ml', NULL, 5000, 8000, 50, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(4, 1, 'Chitato Original 85g', NULL, 7000, 10000, 60, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(5, 1, 'Oreo Vanilla 137g', NULL, 8000, 12000, 40, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(6, 1, 'Indomie Goreng', NULL, 2500, 3500, 120, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(7, 1, 'Mie Sedap Soto', NULL, 2500, 3500, 90, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(8, 1, 'Marlboro Red', NULL, 25000, 30000, 30, '2025-05-10 18:38:35', '2025-05-10 18:38:35'),
(9, 1, 'Gulaku 1kg', NULL, 12000, 15000, 25, '2025-05-10 18:38:35', '2025-05-10 18:38:35');

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
(50, 'TRX-20250511013836-1X5fUe', 7, 162856, 182785, 19929, '2025-05-10 18:38:42', '2025-05-10 18:38:42');

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
(1, 1, 4, 6, 60000, '2025-05-10 18:38:36', '2025-05-10 18:38:36'),
(2, 1, 3, 9, 72000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(3, 1, 4, 5, 50000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(4, 2, 1, 10, 50000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(5, 2, 2, 10, 60000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(6, 2, 9, 6, 90000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(7, 3, 1, 2, 10000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(8, 3, 5, 4, 48000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(9, 3, 1, 7, 35000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(10, 4, 3, 10, 80000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(11, 4, 7, 10, 35000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(12, 4, 1, 5, 25000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(13, 5, 1, 1, 5000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(14, 5, 8, 1, 30000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(15, 5, 4, 6, 60000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(16, 6, 3, 7, 56000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(17, 6, 3, 6, 48000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(18, 6, 9, 6, 90000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(19, 7, 9, 3, 45000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(20, 7, 4, 3, 30000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(21, 7, 3, 1, 8000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(22, 8, 4, 10, 100000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(23, 8, 1, 7, 35000, '2025-05-10 18:38:37', '2025-05-10 18:38:37'),
(24, 8, 8, 2, 60000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(25, 9, 9, 8, 120000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(26, 9, 4, 8, 80000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(27, 9, 3, 6, 48000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(28, 10, 5, 7, 84000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(29, 10, 3, 6, 48000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(30, 10, 6, 4, 14000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(31, 11, 1, 8, 40000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(32, 11, 9, 4, 60000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(33, 11, 3, 7, 56000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(34, 12, 7, 9, 31500, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(35, 12, 6, 2, 7000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(36, 12, 3, 9, 72000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(37, 13, 6, 10, 35000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(38, 13, 4, 4, 40000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(39, 13, 8, 7, 210000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(40, 14, 7, 8, 28000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(41, 14, 9, 3, 45000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(42, 14, 1, 2, 10000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(43, 15, 2, 1, 6000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(44, 15, 1, 4, 20000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(45, 15, 2, 2, 12000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(46, 16, 2, 6, 36000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(47, 16, 6, 7, 24500, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(48, 16, 3, 9, 72000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(49, 17, 3, 3, 24000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(50, 17, 4, 5, 50000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(51, 17, 9, 2, 30000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(52, 18, 4, 5, 50000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(53, 18, 5, 9, 108000, '2025-05-10 18:38:38', '2025-05-10 18:38:38'),
(54, 18, 5, 5, 60000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(55, 19, 2, 7, 42000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(56, 19, 4, 3, 30000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(57, 19, 4, 7, 70000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(58, 20, 5, 9, 108000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(59, 20, 2, 10, 60000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(60, 20, 8, 1, 30000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(61, 21, 2, 8, 48000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(62, 21, 6, 9, 31500, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(63, 21, 9, 3, 45000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(64, 22, 5, 7, 84000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(65, 22, 3, 1, 8000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(66, 22, 7, 9, 31500, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(67, 23, 4, 9, 90000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(68, 23, 8, 1, 30000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(69, 23, 2, 6, 36000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(70, 24, 4, 4, 40000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(71, 24, 4, 7, 70000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(72, 24, 6, 2, 7000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(73, 25, 6, 3, 10500, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(74, 25, 8, 4, 120000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(75, 25, 5, 3, 36000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(76, 26, 9, 10, 150000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(77, 26, 7, 8, 28000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(78, 26, 1, 7, 35000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(79, 27, 7, 6, 21000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(80, 27, 3, 7, 56000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(81, 27, 2, 7, 42000, '2025-05-10 18:38:39', '2025-05-10 18:38:39'),
(82, 28, 6, 4, 14000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(83, 28, 3, 5, 40000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(84, 28, 6, 5, 17500, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(85, 29, 8, 8, 240000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(86, 29, 1, 2, 10000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(87, 29, 2, 1, 6000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(88, 30, 9, 7, 105000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(89, 30, 5, 7, 84000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(90, 30, 8, 6, 180000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(91, 31, 4, 4, 40000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(92, 31, 3, 10, 80000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(93, 31, 1, 5, 25000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(94, 32, 2, 2, 12000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(95, 32, 9, 8, 120000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(96, 32, 6, 10, 35000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(97, 33, 4, 2, 20000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(98, 33, 8, 8, 240000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(99, 33, 6, 1, 3500, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(100, 34, 7, 4, 14000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(101, 34, 2, 4, 24000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(102, 34, 8, 5, 150000, '2025-05-10 18:38:40', '2025-05-10 18:38:40'),
(103, 35, 9, 3, 45000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(104, 35, 1, 3, 15000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(105, 35, 6, 5, 17500, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(106, 36, 6, 1, 3500, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(107, 36, 4, 6, 60000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(108, 36, 2, 8, 48000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(109, 37, 1, 9, 45000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(110, 37, 4, 4, 40000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(111, 37, 5, 2, 24000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(112, 38, 1, 8, 40000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(113, 38, 2, 10, 60000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(114, 38, 9, 10, 150000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(115, 39, 9, 2, 30000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(116, 39, 2, 6, 36000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(117, 39, 1, 5, 25000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(118, 40, 1, 9, 45000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(119, 40, 7, 3, 10500, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(120, 40, 4, 7, 70000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(121, 41, 1, 2, 10000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(122, 41, 2, 7, 42000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(123, 41, 1, 9, 45000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(124, 42, 7, 1, 3500, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(125, 42, 1, 1, 5000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(126, 42, 9, 3, 45000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(127, 43, 8, 9, 270000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(128, 43, 8, 9, 270000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(129, 43, 4, 6, 60000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(130, 44, 8, 1, 30000, '2025-05-10 18:38:41', '2025-05-10 18:38:41'),
(131, 44, 3, 4, 32000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(132, 44, 4, 3, 30000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(133, 45, 8, 1, 30000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(134, 45, 2, 3, 18000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(135, 45, 9, 1, 15000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(136, 46, 5, 1, 12000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(137, 46, 7, 1, 3500, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(138, 46, 2, 2, 12000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(139, 47, 9, 6, 90000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(140, 47, 4, 3, 30000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(141, 47, 5, 10, 120000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(142, 48, 2, 10, 60000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(143, 48, 9, 8, 120000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(144, 48, 3, 10, 80000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(145, 49, 5, 3, 36000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(146, 49, 3, 4, 32000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(147, 49, 8, 4, 120000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(148, 50, 5, 9, 108000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(149, 50, 3, 7, 56000, '2025-05-10 18:38:42', '2025-05-10 18:38:42'),
(150, 50, 4, 7, 70000, '2025-05-10 18:38:42', '2025-05-10 18:38:42');

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
(8, 'diyahww', 'tokodd', 'diyah@gmail.com', NULL, '$2y$12$U/jT9bkblQmhIFLWHYlyRuKxhIi2z4764NiGfzBGo6r1cMwlBMz0q', NULL, '2025-05-12 02:36:04', '2025-05-12 02:36:04');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
