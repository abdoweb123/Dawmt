-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2024 at 10:30 AM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malmasgroup_sallam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `cpr` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `accent` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uuid`, `phone_code`, `country_code`, `name`, `phone`, `email`, `short_name`, `cpr`, `birthdate`, `gender`, `accent`, `image`, `bio`, `status`, `password`, `code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cbc115af-0f5f-42d3-890d-311e6f1d01a9', '966', 'SA', 'Admin', '123456', 'admin@gmail.com', 'Admin', NULL, NULL, 'M', NULL, NULL, NULL, 1, '$2y$10$K9gNhsoPg2OeNfOp4QDNZ.KZjFRMsEZDHtm4LLdNMIG3op2bslBde', NULL, NULL, NULL, NULL),
(3, '62bbde1a-c613-48af-a1b8-e7ea04dc6947', '966', 'SA', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$E10CxGaX747BuEhiU/plAez/PJ3R0Kqatpf7iw7EKsjlYlJdtAOUe', NULL, NULL, '2024-08-11 09:40:43', '2024-08-11 09:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `name`, `phone_code`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(29, NULL, 'test', NULL, '966433242', 'amir@gmail.com', NULL, 'rewrr', '2024-08-13 16:15:24', '2024-08-13 16:15:24'),
(30, NULL, 'sallam', NULL, '90242342324', 'sallam@gmail.com', NULL, 'ewrwerwr', '2024-08-13 16:17:54', '2024-08-13 16:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `currancy_code_ar` varchar(255) DEFAULT NULL,
  `currancy_code_en` varchar(255) DEFAULT NULL,
  `currancy_value` decimal(5,3) NOT NULL DEFAULT 0.000,
  `phone_code` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `accept_orders` tinyint(1) NOT NULL DEFAULT 1,
  `length` int(11) NOT NULL DEFAULT 10,
  `decimals` int(11) NOT NULL DEFAULT 3,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `title_en`, `currancy_code_ar`, `currancy_code_en`, `currancy_value`, `phone_code`, `country_code`, `lat`, `long`, `status`, `accept_orders`, `length`, `decimals`, `image`, `created_at`, `updated_at`) VALUES
(1, 'البحرين', 'Bahrain', 'دينار بحريني', 'BHD', 0.100, '+973', 'BH', '25.93041400', '50.63777200', 1, 1, 8, 3, '/countries/Bahrain.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(2, 'المملكة العربية السعودية', 'Saudi Arabia', 'ريال سعودي', 'SAR', 1.000, '+966', 'SA', '23.88594200', '45.07916200', 1, 1, 9, 1, '/countries/SaudiArabia.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(3, 'سلطنة عمان', 'Oman', 'ريال عماني', 'OR', 0.102, '+968', 'OM', '21.51258300', '55.92325500', 1, 1, 10, 1, '/countries/Oman.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(4, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'درهم إماراتي', 'AED', 1.000, '+971', 'AE', '23.42407600', '53.84781800', 1, 1, 9, 1, '/countries/UnitedArabEmirates.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(5, 'قطر', 'Qatar', 'ريال قطري', 'QR', 1.000, '+974', 'QA', '25.35482600', '51.18388400', 1, 1, 10, 1, '/countries/Qatar.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(6, 'الكويت', 'Kuwait', 'دينار كويتي', 'KWD', 0.081, '+965', 'KW', '29.31166000', '47.48176600', 1, 1, 10, 1, '/countries/Kuwait.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(7, 'مصر', 'Egypt', 'جنيه مصري', 'EGP', 6.141, '+20', 'EG', '26.82055300', '30.80249800', 0, 1, 10, 1, '/countries/Egypt.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(8, 'انجلترا', 'England', 'جنيه استرلينى', 'GBP', 0.208, '+44', 'EN', '52.7204885', ',-7.6159144', 1, 1, 10, 1, '/countries/england.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title_ar`, `title_en`, `status`, `created_at`, `updated_at`) VALUES
(7, 'تنظيف عميق', 'Deep cleaning', 1, '2024-08-13 17:11:08', '2024-08-13 17:11:08'),
(8, 'زيارة اسبوعية', 'Weekly visit', 1, '2024-08-13 17:11:39', '2024-08-13 17:11:39'),
(9, 'تنظيف النوافذ', 'Cleaning windows', 1, '2024-08-13 17:12:42', '2024-08-13 17:12:42'),
(14, 'تنظيف الغرف', 'Room cleaning', 1, '2024-08-13 17:14:48', '2024-08-13 17:15:19');

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
(1, '2014_10_08_000000_create_countries_table', 1),
(2, '2014_10_10_000000_create_client_table', 1),
(3, '2014_10_10_100517_create_days_table', 1),
(4, '2014_10_11_000000_create_abouts_table', 1),
(5, '2014_10_11_000000_create_help_center_table', 1),
(6, '2014_10_11_000000_create_privacy_table', 1),
(7, '2014_10_11_000000_create_sliders_table', 1),
(8, '2014_10_11_000000_create_splashs_table', 1),
(9, '2014_10_11_000000_create_terms_table', 1),
(10, '2014_10_12_000000_create_admins_table', 1),
(11, '2015_04_18_084603_create_addresses_table', 1),
(12, '2022_04_18_080645_create_settings_table', 1),
(13, '2022_04_18_084603_create_contacts_table', 1),
(14, '2022_04_18_084626_create_f_a_q_s_table', 1),
(15, '2022_04_19_100517_create_payments_table', 1),
(16, '2022_05_09_080339_create_brands_table', 1),
(17, '2022_05_09_080339_create_colors_table', 1),
(18, '2022_05_09_080339_create_deliveries_table', 1),
(19, '2022_05_09_080339_create_sizes_table', 1),
(20, '2022_05_10_080339_create_categories_table', 1),
(21, '2022_05_10_080339_create_coupons_table', 1),
(22, '2022_05_10_080339_create_products_table', 1),
(23, '2022_05_11_080339_create_carts_table', 1),
(24, '2022_05_12_080339_create_home_screens_table', 1),
(25, '2023_01_01_080339_create_orders_table', 1),
(26, '2022_05_10_080341_create_notifications_table', 2),
(27, '2022_05_10_080339_create_branches_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `old_price` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title_ar`, `title_en`, `old_price`, `price`, `status`, `created_at`, `updated_at`) VALUES
(17, 'الباقة الرئيسية', 'Main package', '32', '12', 1, '2024-08-13 17:49:29', '2024-08-13 18:16:54'),
(18, 'الباقة الثانية', 'The second package', '40', '34', 1, '2024-08-13 17:56:48', '2024-08-13 17:56:48'),
(19, 'الباقة الثالثة', 'The third package', '50', '42', 1, '2024-08-13 17:57:38', '2024-08-13 17:57:38'),
(20, 'الباقة الرابعة', 'Fourth package', '24', '13', 1, '2024-08-13 17:58:08', '2024-08-13 17:58:08'),
(21, 'الباقة الخامسة', 'Fifth package', '13', '6', 1, '2024-08-13 17:58:34', '2024-08-13 17:58:34'),
(24, 'rwer', 'fdsdf', '454', '435', 0, '2024-08-13 18:14:06', '2024-08-13 18:14:06'),
(25, 'ewr', 'rwerwerw', '32', '20', 0, '2024-08-13 18:16:12', '2024-08-13 18:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `package_items`
--

CREATE TABLE `package_items` (
  `id` bigint(20) NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `package_items`
--

INSERT INTO `package_items` (`id`, `package_id`, `item_id`, `created_at`, `updated_at`) VALUES
(4, 17, 7, '2024-08-13 17:49:29', '2024-08-13 17:49:29'),
(6, 17, 14, '2024-08-13 17:49:29', '2024-08-13 17:49:29'),
(7, 17, 9, '2024-08-13 17:53:00', '2024-08-13 17:53:00'),
(8, 18, 7, '2024-08-13 17:56:48', '2024-08-13 17:56:48'),
(9, 18, 8, '2024-08-13 17:56:48', '2024-08-13 17:56:48'),
(10, 18, 14, '2024-08-13 17:56:48', '2024-08-13 17:56:48'),
(11, 17, 8, '2024-08-13 17:57:05', '2024-08-13 17:57:05'),
(12, 19, 7, '2024-08-13 17:57:38', '2024-08-13 17:57:38'),
(13, 19, 8, '2024-08-13 17:57:38', '2024-08-13 17:57:38'),
(14, 20, 8, '2024-08-13 17:58:08', '2024-08-13 17:58:08'),
(15, 20, 9, '2024-08-13 17:58:08', '2024-08-13 17:58:08'),
(16, 20, 14, '2024-08-13 17:58:08', '2024-08-13 17:58:08'),
(17, 21, 7, '2024-08-13 17:58:34', '2024-08-13 17:58:34'),
(18, 21, 8, '2024-08-13 17:58:34', '2024-08-13 17:58:34'),
(19, 21, 14, '2024-08-13 17:58:34', '2024-08-13 17:58:34'),
(20, 24, 7, '2024-08-13 18:14:06', '2024-08-13 18:14:06'),
(21, 24, 8, '2024-08-13 18:14:06', '2024-08-13 18:14:06'),
(22, 24, 9, '2024-08-13 18:14:06', '2024-08-13 18:14:06'),
(23, 24, 14, '2024-08-13 18:14:06', '2024-08-13 18:14:06'),
(24, 25, 7, '2024-08-13 18:16:12', '2024-08-13 18:16:12'),
(25, 25, 8, '2024-08-13 18:16:12', '2024-08-13 18:16:12'),
(26, 25, 9, '2024-08-13 18:16:12', '2024-08-13 18:16:12'),
(27, 25, 14, '2024-08-13 18:16:12', '2024-08-13 18:16:12');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'e7fdfed165404c7d6f95ffd88dc2b2f9c601ca750bdfed11424f51ca4a078e84', '[\"*\"]', NULL, NULL, '2024-07-18 08:35:06', '2024-07-18 08:35:06'),
(2, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '13665731fad16122639f3c40134f4fefd09a5a6b4a670779f3c5dda664a5a93e', '[\"*\"]', '2024-07-25 13:31:10', NULL, '2024-07-18 08:36:02', '2024-07-25 13:31:10'),
(3, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'cda9f781b401c41d6cbfdb2cc190ef4d24aa6bba4d39a1fb4422a8f14e0d7320', '[\"*\"]', NULL, NULL, '2024-07-18 13:31:52', '2024-07-18 13:31:52'),
(4, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'e86b706e8aff41064a009e2c5215de8feb65ca23883b2bc632d1d024c0d1dff4', '[\"*\"]', NULL, NULL, '2024-07-18 13:36:53', '2024-07-18 13:36:53'),
(5, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'a25bd56c99a6e30cc35d059667e28551c57d112174bebcab1e4ac55ca7642ed4', '[\"*\"]', NULL, NULL, '2024-07-18 13:42:41', '2024-07-18 13:42:41'),
(6, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '69b2b7f8bf54d52b590d869684c7840a38b3bc4bc0c00803f170caa0c3557da5', '[\"*\"]', NULL, NULL, '2024-07-18 13:45:33', '2024-07-18 13:45:33'),
(7, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '7a00bf5ab1cf8ccba6bef84c60a4810a117082d85a3525707b0760014470d436', '[\"*\"]', NULL, NULL, '2024-07-18 13:47:48', '2024-07-18 13:47:48'),
(8, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'fa3a25325ab189ef4db66dfeca132870c9c6615deb19294effddd4fc84659c17', '[\"*\"]', NULL, NULL, '2024-07-20 17:55:35', '2024-07-20 17:55:35'),
(9, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'e82a82f302e6225b44bc9b03c4279bb579d9c2c6d40aea293162dfe48fa8aa95', '[\"*\"]', NULL, NULL, '2024-07-20 18:11:00', '2024-07-20 18:11:00'),
(12, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '32462adffad48f72352e061828a37b3ff06490f1c2e0e2751df2407667408d8b', '[\"*\"]', '2024-07-22 06:53:26', NULL, '2024-07-21 06:43:40', '2024-07-22 06:53:26'),
(13, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '3b6f575dde15c739df5926206848be9bef0bc4818f5d3ea3cf2595b6e7093bb7', '[\"*\"]', NULL, NULL, '2024-07-21 06:59:15', '2024-07-21 06:59:15'),
(14, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'e7c035752cbed988139a998176a152eca7a2e1e59556b6121c9eb3ddc75f908a', '[\"*\"]', NULL, NULL, '2024-07-21 07:01:14', '2024-07-21 07:01:14'),
(15, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'a5df8a3630880097f253a2f0d868b4b8ca2aa8feb1dfda5e6db64dd37fa5176a', '[\"*\"]', '2024-07-21 07:02:30', NULL, '2024-07-21 07:02:30', '2024-07-21 07:02:30'),
(16, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '8ea2c529b55ea682f3ef137372f19d5aff859d4937a55507d3607cc2f60d9f00', '[\"*\"]', '2024-07-21 07:10:18', NULL, '2024-07-21 07:10:17', '2024-07-21 07:10:18'),
(17, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'c3795c5ef45b26a6d1ae55d27e5434696ae525ef5973d052a2a4efe244560e5d', '[\"*\"]', '2024-07-21 07:26:16', NULL, '2024-07-21 07:25:17', '2024-07-21 07:26:16'),
(18, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '03fcf0b5f42c26c486e13bc8601927a16b613594e47c95868d6909c8cd104231', '[\"*\"]', '2024-07-21 07:53:36', NULL, '2024-07-21 07:53:10', '2024-07-21 07:53:36'),
(19, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '42f7aaf2ef03f8a2e64fae078eba6c36828642e437e934cfeaa9c8158ba8278e', '[\"*\"]', '2024-07-21 08:00:25', NULL, '2024-07-21 07:59:36', '2024-07-21 08:00:25'),
(21, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '2ad0479e7fb3f810737226e0c4407b9333d66ab6120f2796b744ea7ccf4dd1ad', '[\"*\"]', '2024-07-22 09:06:16', NULL, '2024-07-21 08:44:58', '2024-07-22 09:06:16'),
(23, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '44c443d40f10a1a82b67bbeb973bd94e66b8ce0d3f2f3ca0a433bd054afca1f2', '[\"*\"]', NULL, NULL, '2024-07-21 09:47:03', '2024-07-21 09:47:03'),
(26, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '18447f6f6bef733605aeffc0413c77469c42977bfd297b5d615dcf7b67ba9503', '[\"*\"]', NULL, NULL, '2024-07-21 11:22:29', '2024-07-21 11:22:29'),
(28, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '8e3d1532b4dc5c17e23740db1aa224df14d94581b5c3b9334c26f57a007124bf', '[\"*\"]', '2024-07-21 11:56:02', NULL, '2024-07-21 11:33:41', '2024-07-21 11:56:02'),
(38, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'c504a3839ddb3345c7ec852c9368c3c2c3f341386df7951b0220ffaa09b8a47a', '[\"*\"]', '2024-08-01 12:57:50', NULL, '2024-07-22 08:57:41', '2024-08-01 12:57:50'),
(39, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'ecc52b03e246e29af8d244a08f230cf1a05d56e7fe587e2cb602894baf9b02c1', '[\"*\"]', NULL, NULL, '2024-07-22 08:58:03', '2024-07-22 08:58:03'),
(45, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '1505c12c9fe3cccd0bd04f851e6061b65494aeb8c1a8da7d372d908e9798cada', '[\"*\"]', '2024-07-23 13:17:03', NULL, '2024-07-22 10:33:35', '2024-07-23 13:17:03'),
(46, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '6666aac0fb332f7d7f7869a1bc0ff424836fcba62d0e11a787305ca8c4ad4cc6', '[\"*\"]', '2024-07-22 11:08:34', NULL, '2024-07-22 10:58:12', '2024-07-22 11:08:34'),
(49, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '077302beae8aed358b3b56d9a9946fe72e93d86f5e33b16f34034485b61e7ee1', '[\"*\"]', '2024-07-24 06:42:47', NULL, '2024-07-22 11:37:45', '2024-07-24 06:42:47'),
(53, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'ead36051c28d0f23475965b2f2d86221472a3d821ed7ab41d29a0a8cd5fa1acb', '[\"*\"]', '2024-07-23 08:36:51', NULL, '2024-07-23 08:36:45', '2024-07-23 08:36:51'),
(56, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '1b9bbfbcbb778e6c2e9657b83ddd525a408faba979f0119bf9909646970e493a', '[\"*\"]', '2024-07-28 10:21:34', NULL, '2024-07-24 07:52:44', '2024-07-28 10:21:34'),
(57, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'd6d55addb971f849c53a3f8a07a98ae7a7e25225484214ba4221c6165a12a34f', '[\"*\"]', '2024-07-30 14:29:45', NULL, '2024-07-24 09:48:56', '2024-07-30 14:29:45'),
(70, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '6b9d77c5ca224d6c009e389eb891cef1045751c3fa90738a6a3032337b820ff3', '[\"*\"]', '2024-07-30 20:29:41', NULL, '2024-07-29 20:40:26', '2024-07-30 20:29:41'),
(73, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '5883dc85f4f8aa40f116e196d389f495319c5f3cf7e3e14ca7d12405073071e2', '[\"*\"]', '2024-07-30 09:34:36', NULL, '2024-07-30 09:00:17', '2024-07-30 09:34:36'),
(74, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '161906e418759f7e1624a7d95b4fecd3d4129375238b2edc07411c250844efa8', '[\"*\"]', '2024-07-30 10:32:07', NULL, '2024-07-30 09:35:38', '2024-07-30 10:32:07'),
(75, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'e2ddf3bb0fe816a31322aa966de536fb4ad1c785a171291f669714f169c5dc4c', '[\"*\"]', '2024-07-31 09:35:39', NULL, '2024-07-30 10:32:32', '2024-07-31 09:35:39'),
(76, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', 'd3aa901c043a978dce7353b6f01bc895c4d31135de389c8c1780917ce6216029', '[\"*\"]', '2024-07-30 11:20:09', NULL, '2024-07-30 11:18:37', '2024-07-30 11:20:09'),
(77, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '8b57445b44064614c2597790678d7afc467757863ccb711711e307e65e8ec1c9', '[\"*\"]', '2024-07-31 11:46:23', NULL, '2024-07-30 11:20:29', '2024-07-31 11:46:23'),
(78, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', '02791f58a8fa30450eb7d3e758d60bd181b5ad5c2158ef7cdbc6a02493d91e7e', '[\"*\"]', NULL, NULL, '2024-07-30 14:31:39', '2024-07-30 14:31:39'),
(79, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '18c121cf4dad7deddbec8488a11199e4fbf0c9afb99b6427c6d67904e8ee6dc9', '[\"*\"]', '2024-07-31 13:23:01', NULL, '2024-07-30 20:30:00', '2024-07-31 13:23:01'),
(80, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '5a5f7c2173446a4080e772b67f01f640ca25ba7af6053d2c7ed450a39bcc19c3', '[\"*\"]', '2024-07-31 08:46:19', NULL, '2024-07-31 08:19:02', '2024-07-31 08:46:19'),
(81, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '345ab8d7a4e84b2c9cfb5fca50dcb7777c21ddc0f21f92f1be5eae565482af19', '[\"*\"]', '2024-07-31 08:38:21', NULL, '2024-07-31 08:38:04', '2024-07-31 08:38:21'),
(82, 'Modules\\Client\\Entities\\Model', 6, 'ClientToken', '92d0f085cc45c5b525b6b3f82d8fb388e4f10e7a20a1d4847ec777f22be5c293', '[\"*\"]', '2024-07-31 12:56:48', NULL, '2024-07-31 09:07:06', '2024-07-31 12:56:48'),
(83, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '77243231766503cd84d1b9dab29b97a9bf23bdbf01de8e12401755f86fc323fa', '[\"*\"]', '2024-07-31 11:53:58', NULL, '2024-07-31 11:34:59', '2024-07-31 11:53:58'),
(84, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '704d011d3592b499452e58e7cb0bd464d016e93f6e52a6b165318032593dc155', '[\"*\"]', '2024-08-04 10:56:35', NULL, '2024-07-31 11:46:42', '2024-08-04 10:56:35'),
(85, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '56834d3e807e0013916bb9666aa6c8fc4595363d89805e1db527d4be1bdba02f', '[\"*\"]', '2024-07-31 12:10:11', NULL, '2024-07-31 11:55:07', '2024-07-31 12:10:11'),
(86, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'c812f743dea5051d9d5a2a98466f1a8585f7a4cd7c99c9db0668b8dbb6d40684', '[\"*\"]', '2024-08-01 08:28:17', NULL, '2024-07-31 12:10:45', '2024-08-01 08:28:17'),
(87, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '18ea2295d232da9a0c28abec70f17b8e30bef8b759fdc06919129f6d31ac22e0', '[\"*\"]', '2024-07-31 12:58:09', NULL, '2024-07-31 12:57:13', '2024-07-31 12:58:09'),
(88, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', 'e2e4f66e138247d987ca7cb645abb6359ddcc780181c0ffdca9c1b145ac0499e', '[\"*\"]', '2024-07-31 13:01:10', NULL, '2024-07-31 12:58:33', '2024-07-31 13:01:10'),
(89, 'Modules\\Client\\Entities\\Model', 6, 'ClientToken', '324095084363379b1801efadc869dbd2e8cc4de1a85536ce25fdbfd13dd6897b', '[\"*\"]', '2024-08-05 13:41:58', NULL, '2024-07-31 13:23:15', '2024-08-05 13:41:58'),
(90, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', '5cd3de8783b2e9a4efd04304ec4dfecb9e11ca50c576489ce5f095d370faca16', '[\"*\"]', NULL, NULL, '2024-07-31 13:55:42', '2024-07-31 13:55:42'),
(91, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', 'd777b2e6ee9583f88d245db23968cb4c9a00e966bbd2452f27ac315b5d576dd1', '[\"*\"]', '2024-07-31 13:56:37', NULL, '2024-07-31 13:56:37', '2024-07-31 13:56:37'),
(92, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', 'dd9181fda7385d43c252cf605f3ba28453adfc7fc0ac27dc0e2c533a27b0b913', '[\"*\"]', '2024-07-31 14:07:31', NULL, '2024-07-31 14:06:35', '2024-07-31 14:07:31'),
(93, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', '14662e08c6100cdd8dbc71ffe765ea1f9f90b8b258df482264db84b895bba48c', '[\"*\"]', '2024-07-31 14:12:30', NULL, '2024-07-31 14:11:57', '2024-07-31 14:12:30'),
(94, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', '18c7a5093863774deae5a06cad206c8b3a2e24f4f9d34f39013beedd891d2810', '[\"*\"]', '2024-07-31 14:13:19', NULL, '2024-07-31 14:13:16', '2024-07-31 14:13:19'),
(95, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', '1f19b64125acdd7996a2295b9868417bbe37660318bfb9d9c74f55a2229b64c7', '[\"*\"]', '2024-07-31 14:14:31', NULL, '2024-07-31 14:14:28', '2024-07-31 14:14:31'),
(96, 'Modules\\Client\\Entities\\Model', 7, 'ClientToken', '816a1948d1b9f26a9b3055327c2b189a7af187a0833212df7bdb1ef2660a9b69', '[\"*\"]', '2024-07-31 14:23:09', NULL, '2024-07-31 14:23:04', '2024-07-31 14:23:09'),
(113, 'Modules\\Client\\Entities\\Model', 6, 'ClientToken', 'eb59d835d4583811d9b03204a59447e0a03f678cc80fd7fdcae432a8311dad1c', '[\"*\"]', '2024-07-31 21:08:25', NULL, '2024-07-31 21:08:09', '2024-07-31 21:08:25'),
(133, 'Modules\\Client\\Entities\\Model', 8, 'ClientToken', 'e9dffcddff93f0daca848462eca58874c4ee952ba9c5f03f35365b8b01108864', '[\"*\"]', NULL, NULL, '2024-08-01 09:09:36', '2024-08-01 09:09:36'),
(134, 'Modules\\Client\\Entities\\Model', 8, 'ClientToken', 'd6d1dc2000910b1499c370a3338d87a8ecbc946663fb2bc7f809027e8b9e1acd', '[\"*\"]', '2024-08-01 09:11:09', NULL, '2024-08-01 09:11:01', '2024-08-01 09:11:09'),
(135, 'Modules\\Client\\Entities\\Model', 8, 'ClientToken', 'e5a926c35f51781d0c0578fe04ca8ea0a453fffa0b254e1183a45a03de325f01', '[\"*\"]', '2024-08-01 09:25:24', NULL, '2024-08-01 09:25:08', '2024-08-01 09:25:24'),
(136, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '8bafa0d00a80214760ba66dfd1c5f8a6666c5192c19fbcbd326dafa9cd568d5b', '[\"*\"]', NULL, NULL, '2024-08-01 09:31:41', '2024-08-01 09:31:41'),
(137, 'Modules\\Client\\Entities\\Model', 10, 'ClientToken', '8dde05670c36dc4eecebbd2e99b14ae969505cfa51a61e69bd593212657fef70', '[\"*\"]', NULL, NULL, '2024-08-01 09:48:39', '2024-08-01 09:48:39'),
(138, 'Modules\\Client\\Entities\\Model', 11, 'ClientToken', 'edacca0c99de9049070fbcea85a8e628e592085c49c2fafd51b7de6043dd9529', '[\"*\"]', '2024-08-01 09:54:04', NULL, '2024-08-01 09:52:28', '2024-08-01 09:54:04'),
(139, 'Modules\\Client\\Entities\\Model', 12, 'ClientToken', 'ff709dff6c0a83038d93da6351e0d390986c80a4a8d0d57ad195ac5ff5e6eec9', '[\"*\"]', '2024-08-01 09:57:23', NULL, '2024-08-01 09:54:52', '2024-08-01 09:57:23'),
(140, 'Modules\\Client\\Entities\\Model', 6, 'ClientToken', 'f69a4f32289b065419721d353b142e7ad0c7e0072fff7a64df18a5540ac8a7a7', '[\"*\"]', NULL, NULL, '2024-08-01 10:09:06', '2024-08-01 10:09:06'),
(142, 'Modules\\Client\\Entities\\Model', 14, 'ClientToken', '28177b72c2d445b6fe3e690be81b1e2c2b9a7b1eae74533503d36b9e25f8db2c', '[\"*\"]', NULL, NULL, '2024-08-01 10:15:42', '2024-08-01 10:15:42'),
(143, 'Modules\\Client\\Entities\\Model', 15, 'ClientToken', '49427dc2336b7eb95745b2f3a022f98d88613d3d758435af24599300c45429ef', '[\"*\"]', '2024-08-01 10:26:33', NULL, '2024-08-01 10:17:48', '2024-08-01 10:26:33'),
(146, 'Modules\\Client\\Entities\\Model', 8, 'ClientToken', 'e0fc498eabac3345ca336e4dba7064a61b5c48ba496ef7278c00e9dbb65cfa68', '[\"*\"]', '2024-08-01 11:23:16', NULL, '2024-08-01 10:40:29', '2024-08-01 11:23:16'),
(147, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '14e24d07650e916f0a1351461d784e79d65374df28f1e09bb109f9e17e88dc17', '[\"*\"]', '2024-08-01 14:05:32', NULL, '2024-08-01 11:28:02', '2024-08-01 14:05:32'),
(148, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'b70013026e4508781aec1b25486d7b30d256c45baa5e6fa0da95fd140d722802', '[\"*\"]', '2024-08-01 12:55:58', NULL, '2024-08-01 12:55:45', '2024-08-01 12:55:58'),
(149, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '76f761db4cc1e01d595d0d45218a350313ec1e32aeb36a7a9c0259a24d1275f4', '[\"*\"]', '2024-08-04 08:54:26', NULL, '2024-08-01 12:56:56', '2024-08-04 08:54:26'),
(150, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '16a40a868f98f4dd2125d880b831816c3be901de7e933bbcf17bbd33354180c2', '[\"*\"]', '2024-08-04 09:49:43', NULL, '2024-08-01 14:05:50', '2024-08-04 09:49:43'),
(151, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'c3626778a501b6b4974415b0a7ad68d2efb82ac86dc3308c8b619e6c626bec49', '[\"*\"]', NULL, NULL, '2024-08-01 14:14:42', '2024-08-01 14:14:42'),
(152, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '733e3c2b7a2879774155f471f927fb335abd53f4dc3238cc481ae55c7d1debf1', '[\"*\"]', NULL, NULL, '2024-08-01 14:19:59', '2024-08-01 14:19:59'),
(153, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '6dd606ef977d75077ef2caf307b248c10d886b62716512818733e30d5c433d1d', '[\"*\"]', '2024-08-04 09:22:55', NULL, '2024-08-04 08:38:30', '2024-08-04 09:22:55'),
(154, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '8463a85ce1ed0853bfb25d733dd5638288d79c06f3c9bc08fb77d550fa12013f', '[\"*\"]', '2024-08-04 10:41:02', NULL, '2024-08-04 08:57:29', '2024-08-04 10:41:02'),
(155, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '6a446991591ffd24bb55b2ee4e94f1c8f679322e05181e915f9bffbbf2c47b93', '[\"*\"]', '2024-08-04 11:48:39', NULL, '2024-08-04 09:23:34', '2024-08-04 11:48:39'),
(156, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '1a8d6aa8af3c3ca8cc3c99a3aae8e4c07a09f94926c67a80fb33e7fefe95219b', '[\"*\"]', '2024-08-04 10:58:04', NULL, '2024-08-04 10:57:27', '2024-08-04 10:58:04'),
(157, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '26a4d40e74a0c19459f28e610df0336f9c0e3d481cb56f5ff070f964c5f683f9', '[\"*\"]', '2024-08-11 11:28:43', NULL, '2024-08-04 10:58:29', '2024-08-11 11:28:43'),
(158, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '20e49cfdf55b17a0cdb5fc841e00bc3ee247e1bc461fd2bab90be478809602bd', '[\"*\"]', '2024-08-04 11:23:01', NULL, '2024-08-04 11:07:54', '2024-08-04 11:23:01'),
(159, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '8dabbba768991c7269e317a3a026a43f844844278e0ae7c30752d64b686d2148', '[\"*\"]', '2024-08-04 14:35:01', NULL, '2024-08-04 14:33:45', '2024-08-04 14:35:01'),
(161, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '583e47f0557678b05e3800d330aed15a5cc146cf18136341ab7a102c5add4d56', '[\"*\"]', '2024-08-05 13:52:24', NULL, '2024-08-05 08:57:40', '2024-08-05 13:52:24'),
(162, 'Modules\\Client\\Entities\\Model', 1, 'ClientToken', 'f7165a1863af668b3b312d7b9eebab494c96400ac6557c005dd55cd756c65787', '[\"*\"]', NULL, NULL, '2024-08-05 10:56:43', '2024-08-05 10:56:43'),
(163, 'Modules\\Client\\Entities\\Model', 18, 'ClientToken', '6bb2ae273b09805b1bdf441a4b547244c204626e594c6ad006e422b8c69ae8d4', '[\"*\"]', '2024-08-05 12:08:15', NULL, '2024-08-05 12:08:03', '2024-08-05 12:08:15'),
(164, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'f97d88a6c51d3563cb44fe2ec9fa8b3052b78ea8d49636c86a7b441aa4134e00', '[\"*\"]', '2024-08-06 13:56:01', NULL, '2024-08-05 12:12:45', '2024-08-06 13:56:01'),
(165, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'babcf06a1f45ecbf1d578f01663be1203d90714087bb5138e37e48d5e445dae7', '[\"*\"]', '2024-08-07 10:32:55', NULL, '2024-08-05 12:16:36', '2024-08-07 10:32:55'),
(166, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '72657a32ad8cffcc0d4b914e1545c88166592cd6b22426110e2ef79f2ec1e4a1', '[\"*\"]', '2024-08-06 12:35:09', NULL, '2024-08-05 13:42:21', '2024-08-06 12:35:09'),
(167, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '7f2d3843e190f71cc8f673d470e844928f9fb647de94316ee8463a1505f20ed1', '[\"*\"]', '2024-08-05 14:42:23', NULL, '2024-08-05 14:37:25', '2024-08-05 14:42:23'),
(168, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'f102a2706186b4240e2996e326703c344be3355887a512bd4635b917ba81be32', '[\"*\"]', '2024-08-05 15:33:31', NULL, '2024-08-05 15:32:31', '2024-08-05 15:33:31'),
(169, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '245d6c98f505e4152cd96db21a3755af79741805015680b36901152361a4ed43', '[\"*\"]', '2024-08-06 09:26:44', NULL, '2024-08-05 16:38:54', '2024-08-06 09:26:44'),
(170, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'f18d3a353939fe521704efad933333e5b07e3fbe93dfe26f8f1c8cd1f903ecca', '[\"*\"]', '2024-08-06 09:34:52', NULL, '2024-08-06 09:29:06', '2024-08-06 09:34:52'),
(171, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'afca57ebc83c3a5a78218580077443e2933246c86ce2cb287a77529803ccb48c', '[\"*\"]', '2024-08-06 09:37:26', NULL, '2024-08-06 09:36:20', '2024-08-06 09:37:26'),
(172, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '3a52034f897b1dc1ba03c99519ae7ff6ab21d84b19140c7877e9b91792cc9ea7', '[\"*\"]', '2024-08-06 12:34:16', NULL, '2024-08-06 09:40:30', '2024-08-06 12:34:16'),
(173, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'd2143cd51718ab255f40a562119754e6cd67c47fd6d78487f780e23132fb8abf', '[\"*\"]', '2024-08-06 10:06:47', NULL, '2024-08-06 09:53:02', '2024-08-06 10:06:47'),
(174, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'c5cd1bd2a549de4f90e0c16a86f2a2ac0cd220db1d19e35ae91760b5bfa1d99a', '[\"*\"]', NULL, NULL, '2024-08-06 10:42:14', '2024-08-06 10:42:14'),
(175, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'a03fd4d91a8d8369da3ae58a083a0accc6572b12ad50f1142cbf4eaf50416465', '[\"*\"]', NULL, NULL, '2024-08-06 10:44:37', '2024-08-06 10:44:37'),
(176, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'b39c2a1610afed86896f6e246963a9e55695ad128b284d8b3890c7e4ce876d1f', '[\"*\"]', NULL, NULL, '2024-08-06 11:01:36', '2024-08-06 11:01:36'),
(177, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'c90a52c086dcb7583aeed0cd16074084cdec80edf058e33eb4b1d58b93a2e974', '[\"*\"]', '2024-08-06 13:07:39', NULL, '2024-08-06 11:38:05', '2024-08-06 13:07:39'),
(178, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'd6649871674dfe2d4f6c9b731b3e8c063ac1778357fc115b3fbb0ede5f87f67c', '[\"*\"]', '2024-08-06 12:44:00', NULL, '2024-08-06 12:31:00', '2024-08-06 12:44:00'),
(179, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '2ed67bb52c10e6d45049bcc4e934cef000c54f04adf1920678baec51dd0cbbbf', '[\"*\"]', '2024-08-06 12:37:53', NULL, '2024-08-06 12:35:32', '2024-08-06 12:37:53'),
(180, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '074d567b57eab52c962b0c4be0d4189d7cb452417fe6c35ddf6b0e9ccc04c611', '[\"*\"]', '2024-08-06 12:45:36', NULL, '2024-08-06 12:38:11', '2024-08-06 12:45:36'),
(181, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', 'db459d93a79c2a6d7b0ffb5a5c0c747a5f07a5344429fc9e439a5a9144c5a38c', '[\"*\"]', '2024-08-06 12:46:00', NULL, '2024-08-06 12:45:32', '2024-08-06 12:46:00'),
(182, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'db2d77c623aada0b29360be88ae120b160605b33ac71f00ec74ad96489caf4e9', '[\"*\"]', '2024-08-06 12:48:26', NULL, '2024-08-06 12:45:56', '2024-08-06 12:48:26'),
(183, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '8b15c47e71a4ae0e82bf7e94b88c346b8043242fa8ea08d0a5c220abce15c239', '[\"*\"]', '2024-08-06 13:21:44', NULL, '2024-08-06 12:46:18', '2024-08-06 13:21:44'),
(184, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'da9947a9a5014f036b03af6e1e70f8e23ca13cd35671d78a053464231ae1246c', '[\"*\"]', '2024-08-06 14:09:49', NULL, '2024-08-06 12:51:25', '2024-08-06 14:09:49'),
(185, 'Modules\\Client\\Entities\\Model', 19, 'ClientToken', '52c0789ae35b1439ad5b90e465ea7b0bb47f532d814054a919dd1df8bd7e63f9', '[\"*\"]', '2024-08-06 13:11:29', NULL, '2024-08-06 13:09:29', '2024-08-06 13:11:29'),
(186, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'd4eda9a453cad095b573cf253366fe5bed416ab3750e4ce70baf40e430d2f218', '[\"*\"]', '2024-08-06 14:05:20', NULL, '2024-08-06 13:22:47', '2024-08-06 14:05:20'),
(187, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '70e75162f926ecd0f325964bbbc277b861f0e9e9282ad870a53ca5cb8e59505d', '[\"*\"]', NULL, NULL, '2024-08-06 13:57:39', '2024-08-06 13:57:39'),
(188, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'd2de44728be870f99c2eb816441ba4ffc4bb7bc32e00ad842bc67d3a04b4c9d0', '[\"*\"]', '2024-08-06 17:05:06', NULL, '2024-08-06 14:05:41', '2024-08-06 17:05:06'),
(189, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '6af7d7c0366b7dcd2ce6b22878b3aa244d01c6d1cf40e5d5c760c32fd151bc24', '[\"*\"]', '2024-08-06 14:50:37', NULL, '2024-08-06 14:10:13', '2024-08-06 14:50:37'),
(190, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '4c78d972e605a0507e077fb2b0cc3bc31a832370ef0d458e0e84046af4b5da64', '[\"*\"]', '2024-08-06 15:08:46', NULL, '2024-08-06 14:55:35', '2024-08-06 15:08:46'),
(191, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '829d44c40afac87e916315533b648bd6e0e8267c6a7a818f4272dfdbfd30e680', '[\"*\"]', '2024-08-07 11:11:17', NULL, '2024-08-06 15:09:07', '2024-08-07 11:11:17'),
(192, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '1cca93168d2d3c46aebfe080112e81f89690ff49c6bb863595d7a93c0e1b7845', '[\"*\"]', '2024-08-06 17:04:13', NULL, '2024-08-06 17:03:50', '2024-08-06 17:04:13'),
(193, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '190cc17fc4cee89d3db3d1dcd3ab9cc245541ead905167db71372053cc2633b1', '[\"*\"]', '2024-08-06 17:09:35', NULL, '2024-08-06 17:05:33', '2024-08-06 17:09:35'),
(194, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '8aeb20a1fa6bad203a22971347a62261aebbf3e8e57d42b3c35034a8d4eee0e8', '[\"*\"]', '2024-08-06 17:10:04', NULL, '2024-08-06 17:09:56', '2024-08-06 17:10:04'),
(195, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '819346f16563aa290d901b66faf909b1903e920c921b3cae5426e8b1822a1614', '[\"*\"]', '2024-08-07 07:21:28', NULL, '2024-08-06 17:13:25', '2024-08-07 07:21:28'),
(196, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'dd23a814437d7bfbad5a39819e8172b371dfd4e648f601fe2836f922a43b85e7', '[\"*\"]', '2024-08-06 19:20:41', NULL, '2024-08-06 19:20:04', '2024-08-06 19:20:41'),
(197, 'Modules\\Client\\Entities\\Model', 20, 'ClientToken', '2f3ace488fd498d6c18d1f00889668f8e1974ecc2cf7303befc63814d9635837', '[\"*\"]', NULL, NULL, '2024-08-06 21:27:07', '2024-08-06 21:27:07'),
(198, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '8200c95299ff06f1cf8eae5a38fa9febbf46b0e3b6d43c62fc2d1e7861ca7e4f', '[\"*\"]', '2024-08-06 22:55:34', NULL, '2024-08-06 22:45:27', '2024-08-06 22:55:34'),
(199, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'b7ab44762e1d7e3431d3f3cbfe33c2f29e5e7eff108f329137747fe23c9edcb4', '[\"*\"]', '2024-08-07 07:18:40', NULL, '2024-08-07 07:14:02', '2024-08-07 07:18:40'),
(200, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'c34ed024c3c0f46ceae72b3281b0c1be439cb2ac22222a52bc689fc34aa9fe40', '[\"*\"]', '2024-08-07 12:39:32', NULL, '2024-08-07 07:30:25', '2024-08-07 12:39:32'),
(201, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '70f0c11a9d6b8423066296044ea3ba177c8b8a67a986b70dadca104ed7af7664', '[\"*\"]', '2024-08-07 11:54:56', NULL, '2024-08-07 07:49:18', '2024-08-07 11:54:56'),
(202, 'Modules\\Client\\Entities\\Model', 21, 'ClientToken', 'fb5aea853b698f28a85c112de8f7506bb34dfc885646ef7dee3481cd4ed3d57e', '[\"*\"]', '2024-08-08 08:33:11', NULL, '2024-08-07 08:37:32', '2024-08-08 08:33:11'),
(203, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '11f721c04e0ea0da4aa62af4aacce0de525b3421d66745c4170894827fb3aeee', '[\"*\"]', '2024-08-07 10:45:03', NULL, '2024-08-07 10:44:36', '2024-08-07 10:45:03'),
(204, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'f7098350d04147be983f9ca3a1b793f29832da712c548bae02a9e3624bf112d4', '[\"*\"]', '2024-08-07 10:46:54', NULL, '2024-08-07 10:46:08', '2024-08-07 10:46:54'),
(205, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '76521ba0b6db271e44a039e5e3b3911739ce88dbe61e219d2d85222bd3674d35', '[\"*\"]', '2024-08-07 10:48:08', NULL, '2024-08-07 10:47:29', '2024-08-07 10:48:08'),
(206, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '81bb9ffee9680295efadddc3ae454401de64a95374c0dd714ba99fe4c88fd0bd', '[\"*\"]', '2024-08-07 11:56:45', NULL, '2024-08-07 10:48:47', '2024-08-07 11:56:45'),
(207, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', 'dabdf12e354a7644319e7df3d315717578256013ad43e658351afa370838b21d', '[\"*\"]', NULL, NULL, '2024-08-07 10:51:53', '2024-08-07 10:51:53'),
(208, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '058ad0426435db71748f8348a8ca969dcf3d7cc53b1e00ddfc6dd4820ddcb695', '[\"*\"]', NULL, NULL, '2024-08-07 11:00:42', '2024-08-07 11:00:42'),
(209, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'a9ce48f9bcd4046d9094f14d67e3568015804027243eeadefc512ff741f69b82', '[\"*\"]', '2024-08-07 11:02:19', NULL, '2024-08-07 11:01:08', '2024-08-07 11:02:19'),
(210, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'e6d203e8dd7a1b025019cc59630f47374c175d6e2af3ca88e7147743fb57da9c', '[\"*\"]', '2024-08-07 13:08:33', NULL, '2024-08-07 11:05:13', '2024-08-07 13:08:33'),
(211, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '76341aaad9558ca2659af1eb69c03194366dd275d994a21b4779e5feba7d33ca', '[\"*\"]', '2024-08-07 12:49:53', NULL, '2024-08-07 11:11:34', '2024-08-07 12:49:53'),
(212, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '8db5c26d07099fc8a55058cb373e87fac078470c459c1ec04ca178afa5796474', '[\"*\"]', '2024-08-11 12:49:35', NULL, '2024-08-07 11:12:40', '2024-08-11 12:49:35'),
(213, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '5ede3d863e5ba08a8cc032b20d4abc529fc0d4949bf8249b43eb9b5d10e9a5c5', '[\"*\"]', '2024-08-12 07:55:04', NULL, '2024-08-07 11:57:14', '2024-08-12 07:55:04'),
(214, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '75ad126b06b11f397a16a28f86f4968bdf14026e36e4f49debf18e1085bbedca', '[\"*\"]', '2024-08-08 08:38:14', NULL, '2024-08-07 12:05:25', '2024-08-08 08:38:14'),
(215, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '619135cc76631542cd4745c708595f76345f1024e1feea0c56442990d4349053', '[\"*\"]', '2024-08-08 08:18:34', NULL, '2024-08-07 12:42:15', '2024-08-08 08:18:34'),
(216, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '21d443bdcb8f897db6bd6b504b16b7ad8e9d64cb695552ea41a6b632daef934b', '[\"*\"]', '2024-08-11 06:33:27', NULL, '2024-08-07 12:50:09', '2024-08-11 06:33:27'),
(217, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '52174c94d0ea124831dcea047e411632d1fe369f8e86525a4b00ffc03212338d', '[\"*\"]', '2024-08-08 13:13:21', NULL, '2024-08-07 13:09:29', '2024-08-08 13:13:21'),
(218, 'Modules\\Client\\Entities\\Model', 6, 'ClientToken', '9138e451a1b76e92e168bb09e8124c98ae38c009c84580f4d4b32bef1f167675', '[\"*\"]', '2024-08-07 15:21:01', NULL, '2024-08-07 15:20:35', '2024-08-07 15:21:01'),
(219, 'Modules\\Client\\Entities\\Model', 22, 'ClientToken', 'e45be9575b06d3ba8ecae57b50d4aa50007e9c1cdd871a3579dfe22d0c758ecf', '[\"*\"]', '2024-08-08 08:39:55', NULL, '2024-08-08 08:03:48', '2024-08-08 08:39:55'),
(222, 'Modules\\Client\\Entities\\Model', 4, 'ClientToken', '3c96fb682630a133029a3d8294ad08d0b0fd2526e8d4ec8fb6d33c7fc65512f8', '[\"*\"]', '2024-08-08 08:20:53', NULL, '2024-08-08 08:20:48', '2024-08-08 08:20:53'),
(223, 'Modules\\Client\\Entities\\Model', 23, 'ClientToken', 'c241c3a724912aa6699abf11b66a144522d98711c1c6b1e945bcef99aa094630', '[\"*\"]', '2024-08-08 08:22:21', NULL, '2024-08-08 08:22:14', '2024-08-08 08:22:21'),
(224, 'Modules\\Client\\Entities\\Model', 24, 'ClientToken', '61fc8693a4f307fbf7615f6c2562bc589c7e2ec94e2aea6e8e31c44492d3e277', '[\"*\"]', '2024-08-08 08:26:35', NULL, '2024-08-08 08:23:24', '2024-08-08 08:26:35'),
(225, 'Modules\\Client\\Entities\\Model', 25, 'ClientToken', 'ac60acd2f58db4c96c08d6cfd0a15123de3aec4c9769e420b9e36c529e2fdb2c', '[\"*\"]', '2024-08-08 08:24:18', NULL, '2024-08-08 08:24:06', '2024-08-08 08:24:18'),
(226, 'Modules\\Client\\Entities\\Model', 26, 'ClientToken', 'fd9bfaa50fba58919614c1b5135cf95679f8c9ecbd8528fc0947ceaa234fd957', '[\"*\"]', '2024-08-08 08:26:29', NULL, '2024-08-08 08:26:23', '2024-08-08 08:26:29'),
(227, 'Modules\\Client\\Entities\\Model', 27, 'ClientToken', '4eece5b84430b6df1a9aff031fd9cfae8b04987b1beecfe1f6cb4ad3f35547ec', '[\"*\"]', '2024-08-08 08:30:51', NULL, '2024-08-08 08:28:10', '2024-08-08 08:30:51'),
(228, 'Modules\\Client\\Entities\\Model', 28, 'ClientToken', 'de9e5d5b735cfaf7a55bb7854d8ff911f4034a39e79255a187e99afb62adcfab', '[\"*\"]', '2024-08-08 08:35:03', NULL, '2024-08-08 08:34:00', '2024-08-08 08:35:03'),
(229, 'Modules\\Client\\Entities\\Model', 29, 'ClientToken', '0992b09eb8b92f3c0970a081ff8f27ff85eaf658188d6ccd45a12057dbfd7b67', '[\"*\"]', '2024-08-08 08:48:01', NULL, '2024-08-08 08:34:52', '2024-08-08 08:48:01'),
(230, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', 'eb2b37721c1359f1efe5c084bff8256465811355854c9e1371780ba69b5a145b', '[\"*\"]', NULL, NULL, '2024-08-08 08:36:49', '2024-08-08 08:36:49'),
(231, 'Modules\\Client\\Entities\\Model', 30, 'ClientToken', '2e14e7fc6fbd74c32457f3b1333fe23d1b38444dcd05eb6e7705dc02a3338f93', '[\"*\"]', '2024-08-08 08:44:18', NULL, '2024-08-08 08:43:35', '2024-08-08 08:44:18'),
(232, 'Modules\\Client\\Entities\\Model', 31, 'ClientToken', '8239ec68ed858c04a823057c3b1b1cfe52bc233171b3be3aeb5290948d6ac10e', '[\"*\"]', '2024-08-08 09:01:31', NULL, '2024-08-08 08:43:41', '2024-08-08 09:01:31'),
(233, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '418c582b4b6aa5add2481772a95caa96b36013541c5a6d67527dc7d3016c1447', '[\"*\"]', '2024-08-08 13:00:18', NULL, '2024-08-08 09:35:41', '2024-08-08 13:00:18'),
(234, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'a873cadd0a818eaee457c0d68167ebb4849712b43eba77ef331645ebbc87f366', '[\"*\"]', '2024-08-08 11:59:46', NULL, '2024-08-08 09:47:22', '2024-08-08 11:59:46'),
(235, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '4043bebb74d13fa0ac9001674df564c734d499e5b13db5b613fdea3774c15be7', '[\"*\"]', '2024-08-11 10:09:43', NULL, '2024-08-08 12:36:00', '2024-08-11 10:09:43'),
(236, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '12e3cdb000534ddde196f10cea1cab2943c593a0478f964404b8ba41aac6b471', '[\"*\"]', '2024-08-08 13:11:52', NULL, '2024-08-08 13:11:51', '2024-08-08 13:11:52'),
(237, 'Modules\\Client\\Entities\\Model', 32, 'ClientToken', '448d6a982ab6b79584e2e0a89cfdf72d5c63633ad79d67ae440d6280790bffab', '[\"*\"]', '2024-08-08 14:04:15', NULL, '2024-08-08 14:02:13', '2024-08-08 14:04:15'),
(238, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '167101c4f1f0e65d6a714c8290be1d335f43b6f180781a62bec342a7122944cf', '[\"*\"]', '2024-08-11 11:16:09', NULL, '2024-08-11 06:33:55', '2024-08-11 11:16:09'),
(239, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '21ab48815c629f5fde33e043498f09f20ff48bff277a490395972c36771a5cef', '[\"*\"]', '2024-08-11 11:05:02', NULL, '2024-08-11 09:38:52', '2024-08-11 11:05:02'),
(240, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '09816ebd4dafa158f5fcb42917dccd31c77d90c1a8a4272ea3508b41ad311ca8', '[\"*\"]', '2024-08-11 11:19:52', NULL, '2024-08-11 10:41:18', '2024-08-11 11:19:52'),
(241, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'e676c8134abe8ccee07d7273a618993dc08ca1d7e9db7a1859c3df1ca04ee9fa', '[\"*\"]', '2024-08-11 10:51:24', NULL, '2024-08-11 10:45:35', '2024-08-11 10:51:24'),
(242, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '45952c2c5d5e6394295a05e570cc0688e026f863d919b54a39429ddafb8e0253', '[\"*\"]', '2024-08-11 10:52:58', NULL, '2024-08-11 10:51:52', '2024-08-11 10:52:58'),
(243, 'Modules\\Client\\Entities\\Model', 22, 'ClientToken', '3f631c44b1a7a88f559cf6641c4e58a84f5c871d41098f696c14570c888efe74', '[\"*\"]', '2024-08-11 10:55:39', NULL, '2024-08-11 10:55:38', '2024-08-11 10:55:39'),
(244, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '11bd9a10038b1804c81cef9fa6c2d7ca91d261ecbc0940d6ff55df6e06df3967', '[\"*\"]', '2024-08-11 11:38:07', NULL, '2024-08-11 11:05:38', '2024-08-11 11:38:07'),
(245, 'Modules\\Client\\Entities\\Model', 24, 'ClientToken', '7ab6cf16ba17cafbb498688a88fbe5e440c16c012eeda1cf00a95f71bf62b5de', '[\"*\"]', '2024-08-12 06:55:40', NULL, '2024-08-11 11:17:26', '2024-08-12 06:55:40'),
(246, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '43919e09330ce385c17ac5ba3d5360fb935ce888301a23ba532787e4f7486c9a', '[\"*\"]', '2024-08-11 11:33:29', NULL, '2024-08-11 11:33:26', '2024-08-11 11:33:29'),
(247, 'Modules\\Client\\Entities\\Model', 5, 'ClientToken', '74f5a1b07f1426d2017f0b57f4671d851b7834a60086ad78010483871ada358c', '[\"*\"]', '2024-08-11 12:50:19', NULL, '2024-08-11 12:50:14', '2024-08-11 12:50:19'),
(248, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'adcdeb1080d44b5abe807988b5ea84f4ad4c4c8e7a65b65f46c681aa73072d79', '[\"*\"]', '2024-08-11 13:20:12', NULL, '2024-08-11 13:20:02', '2024-08-11 13:20:12'),
(249, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '7a6eb59fc648df5318c903a9fbf449b62b4b3e69312fdcbb0ff1412525ebb475', '[\"*\"]', '2024-08-12 08:42:13', NULL, '2024-08-11 13:23:49', '2024-08-12 08:42:13'),
(250, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '8439992d15678c9400f64c36f67504252a69218f1bb552c4faeccf1d0ee27e07', '[\"*\"]', '2024-08-11 13:47:46', NULL, '2024-08-11 13:27:32', '2024-08-11 13:47:46'),
(251, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', 'fcfcdda751d05c84708b18a26572467c49597783edcf91b4edf84283e7be7790', '[\"*\"]', '2024-08-11 13:51:05', NULL, '2024-08-11 13:49:55', '2024-08-11 13:51:05'),
(252, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', 'b925ac905ddf70c1be62653a7d12e9b492bf5a03efe52dcc6e6ba79212093224', '[\"*\"]', '2024-08-12 07:04:00', NULL, '2024-08-11 14:51:07', '2024-08-12 07:04:00'),
(253, 'Modules\\Client\\Entities\\Model', 3, 'ClientToken', '21650a3d247faab84e29f27c6c61a2d728e8d0408d35af5b8e6c467096c77ace', '[\"*\"]', '2024-08-12 09:03:06', NULL, '2024-08-12 07:13:17', '2024-08-12 09:03:06'),
(254, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', '332eb0a5eeccc06a6445769dcf9f801e7d105d868a0ded69aff5b8b83c217de6', '[\"*\"]', '2024-08-12 07:58:30', NULL, '2024-08-12 07:58:24', '2024-08-12 07:58:30'),
(255, 'Modules\\Client\\Entities\\Model', 2, 'ClientToken', 'c6911df6c5e36e1b69160fd2be03325b20b123fb04d606d5f457fd70b350838f', '[\"*\"]', '2024-08-12 08:05:39', NULL, '2024-08-12 08:02:26', '2024-08-12 08:05:39'),
(256, 'Modules\\Client\\Entities\\Model', 16, 'ClientToken', '7a08356262d2e745c5d5d448dc604c46f2ce56b75eadc77b75802dc76a658600', '[\"*\"]', '2024-08-12 08:38:18', NULL, '2024-08-12 08:37:13', '2024-08-12 08:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `file`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'تنظيف عميق', 'Deep cleaning', 'إزالة الأتربة، والبكتيريا، والمواد المسببة للحساسية من المناطق التي يصعب الوصول إليها.', 'Remove soil, germs and bacteria, for allergens from hard-to-reach areas.', '/uploads/Services/1723546089_5945.svg', NULL, 1, '2024-04-16 22:09:35', '2024-08-13 10:48:09'),
(15, 'تنظيف عميق', 'Deep cleaning', 'إزالة الأتربة، والبكتيريا، والمواد المسببة للحساسية من المناطق التي يصعب الوصول إليها.', 'Remove soil, germs and bacteria, for allergens from hard-to-reach areas.', '/uploads/Services/1723546002_1832.svg', NULL, 1, '2024-08-13 10:46:42', '2024-08-13 10:46:42'),
(16, 'تنظيف عميق', 'Deep cleaning', 'إزالة الأتربة، والبكتيريا، والمواد المسببة للحساسية من المناطق التي يصعب الوصول إليها.', 'Remove soil, germs and bacteria, for allergens from hard-to-reach areas.', '/uploads/Services/1723546127_9630.svg', NULL, 1, '2024-08-13 10:48:47', '2024-08-13 10:48:47'),
(17, 'تنظيف عميق', 'Deep cleaning', 'إزالة الأتربة، والبكتيريا، والمواد المسببة للحساسية من المناطق التي يصعب الوصول إليها.', 'Remove soil, germs and bacteria, for allergens from hard-to-reach areas.', '/uploads/Services/1723546184_6479.svg', NULL, 1, '2024-04-16 22:09:35', '2024-08-13 10:49:44'),
(18, 'تنظيف عميق', 'Deep cleaning', 'إزالة الأتربة، والبكتيريا، والمواد المسببة للحساسية من المناطق التي يصعب الوصول إليها.', 'Remove soil, germs and bacteria, for allergens from hard-to-reach areas.', '/uploads/Services/1723546195_3030.svg', NULL, 1, '2024-08-13 10:46:42', '2024-08-13 10:49:55'),
(19, 'تنظيف عميق', 'Deep cleaning', 'إزالة الأتربة، والبكتيريا، والمواد المسببة للحساسية من المناطق التي يصعب الوصول إليها.', 'Remove soil, germs and bacteria, for allergens from hard-to-reach areas.', '/uploads/Services/1723546211_3494.svg', NULL, 1, '2024-08-13 10:48:47', '2024-08-13 10:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'title_ar', 'ملمس', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(2, 'title_en', 'Malmas', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(3, 'logo', '/uploads/Settings/1723464619_1085.svg', 'publicSettings', 1, NULL, '2024-08-12 12:10:19'),
(4, 'email', 'Malmas@gmail.om', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(5, 'phone', '995553921888', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(6, 'whatsapp', '995553921888', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(7, 'desc', 'Texture revitalizes every space with immaculate cleanliness. Our services transform every location into a masterpiece of purity and care.', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(8, 'keywords', 'Cleaning Services Immaculate Cleanliness Space Revitalization Artistic Purity Attention to Detail Pristine Spaces Professional Cleaning Space Transformation Pure and Careful Service High-Quality Cleaning', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(9, 'author', 'Malams', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(10, 'main_color', '#02cab9', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(11, 'google_map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29080.350234119378!2d46.99174615!3d24.3449676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f8586317b19a1%3A0x59a612f78e33a658!2z2KfZhNix2YrYp9i2IDE0NTc52Iwg2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sar!2seg!4v1723025456400!5m2!1sar!2seg', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(13, 'twitter', 'https://x.com', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(14, 'linkedin', 'https://linkedin.com', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(15, 'facebook', 'https://facebook.com', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(16, 'instagram', 'https://instagram.com', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(17, 'tiktok', 'https://google.com', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(18, 'snapchat', 'https://snapchat.com', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(19, 'address_ar', '<p>ام الشعال، الرياض 14579، المملكة العربية السعودية</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(20, 'address_en', '<p>Umm Al Shaal, Riyadh 14579, Kingdom of Saudi Arabia</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(21, 'inOurWebsite_ar', '<p>لا يقتصر الامر على التنظيف فقط نحن نقدم لك أسلوب حياة محسّن، ورفاهية المزيد من وقت الفراغ، وراحة بيئة منزلية نقية. اخترينا اليوم وأهدي لنفسك&nbsp;<span class=\"marker\">متعة المنزل النظيف</span>&nbsp;المتلألئ دون أن ترفعي إصبعاً</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(22, 'inOurWebsite_en', '<p>It&#39;s not just about cleaning, we offer you an improved lifestyle, the luxury of more free time, and the comfort of a pure home environment. Choose us today and gift yourself <span class=\"marker\">the joy of a sparkling clean home</span> without lifting a finger</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'publicSettings', 1, NULL, '2024-08-13 19:12:59'),
(46, 'about_ar', '<p>نحن نستخدم&nbsp;<span class=\"marker\">أحدث الأجهزة الايطالية</span>&nbsp;لضمان نتائج مبهرة ،سواء كانت واجهات زجاجية عمائر،قصور،مجمعات،فلل،فنادق،مكاتب شركات أو محلات تجارية . الجودة و الاحترافية هيا عنواننا.</p>', 'about', 1, NULL, '2024-08-12 14:21:04'),
(47, 'about_en', '<p>We use the <span class=\"marker\">latest Italian equipment</span> to ensure impressive results, whether they are glass facades of buildings, palaces, complexes, villas, hotels, corporate offices or commercial stores. Quality and professionalism are our goal.</p>', 'about', 1, NULL, '2024-08-12 14:21:04'),
(48, 'about_image', '/uploads/Settings/1723472464_6331.svg', 'about', 1, NULL, '2024-08-12 14:21:04'),
(52, 'privacy_ar', '<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الخصوصية</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الخصوصية</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الخصوصية</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'privacy', 1, NULL, '2024-08-13 12:59:06'),
(53, 'privacy_en', '<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum&nbsp;Dollar Set Amit , Privacy</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum&nbsp;Dollar Set Amit , Privacy</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum Dollar Set Amit , Privacy</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'privacy', 1, NULL, '2024-08-13 12:59:06'),
(55, 'privacy_image', '/uploads/Settings/1723553946_6870.webp', 'privacy', 1, NULL, '2024-08-13 12:59:08'),
(56, 'terms_ar', '<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الشروط</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الشروط</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الشروط</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'terms', 1, NULL, '2024-08-13 13:00:33'),
(57, 'terms_en', '<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum&nbsp;Dollar Set Amit , Terms</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum&nbsp;Dollar Set Amit , Terms</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum Dollar Set Amit , Terms</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>&nbsp;</p>', 'terms', 1, NULL, '2024-08-13 13:00:33'),
(58, 'terms_image', '/uploads/Settings/1723554033_1425.webp', 'terms', 1, NULL, '2024-08-13 13:00:35'),
(63, 'faq_ar', '<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الأسئلة الشائعة</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الأسئلة الشائعة</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>لوريم ايبسوم&nbsp;دولار سيت أميت ,الأسئلة الشائعة</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>لوريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت ريم ايبسوم&nbsp;دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور نكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريدأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواسأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>', 'faq', 1, NULL, '2024-08-13 12:44:46'),
(64, 'faq_en', '<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum&nbsp;Dollar Set Amit , FAQ</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum&nbsp;Dollar Set Amit , FAQ</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Lorem Ipsum Dollar Set Amit , FAQ</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem Ipsum&nbsp;Dollar Set Amit , Conductor Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.Lorem ipsum&nbsp;dollar set amet, consectitor adiba escuing allite, set do iosmude tempor ncadedeonteut labor at dollar magna aliquia. Yot anime ad minim vinayem, kiwas yegait.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>', 'faq', 1, NULL, '2024-08-13 12:44:46'),
(65, 'faq_image', '/uploads/Settings/1723552853_6994.webp', 'faq', 1, NULL, '2024-08-13 12:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `file`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'من القصور الفاخرة إلى الشقق السكنية', 'From luxury palaces to residential apartments', '<p><span class=\"marker\">ملمس</span> تعيد إحياء كل <span class=\"marker\">مساحة بنظافة</span> متكاملة ... خدماتنا تجعل من كل موقع <span class=\"marker\">تحفة فنية</span> من النقاء و الاهتمام</p>', '<p><span class=\"marker\">Malams</span> revives <span class=\"marker\">every space with complete cleanliness</span>... Our services make every site a <span class=\"marker\">masterpiece of purity</span> and care.</p>', '/uploads/Sliders/1723468819_5237.webp', NULL, 1, '2024-08-12 13:20:19', '2024-08-12 13:24:57'),
(6, 'من القصور الفاخرة إلى الشقق السكنية', 'From luxury palaces to residential apartments', '<p><span class=\"marker\">ملمس</span> تعيد إحياء كل <span class=\"marker\">مساحة بنظافة</span> متكاملة ... خدماتنا تجعل من كل موقع <span class=\"marker\">تحفة فنية</span> من النقاء و الاهتمام</p>', '<p><span class=\"marker\">Malams</span> revives <span class=\"marker\">every space with complete cleanliness</span>... Our services make every site a <span class=\"marker\">masterpiece of purity</span> and care.</p>', '/uploads/Sliders/1723468990_9024.webp', NULL, 1, '2024-08-12 13:23:10', '2024-08-12 13:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sallam@gmail.com', '2024-08-13 15:07:32', '2024-08-13 15:07:32'),
(4, 'abdo@gmail.com', '2024-08-13 15:07:32', '2024-08-13 15:07:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_items`
--
ALTER TABLE `package_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id_items` (`item_id`),
  ADD KEY `package_id_packages` (`package_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `package_items`
--
ALTER TABLE `package_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `package_items`
--
ALTER TABLE `package_items`
  ADD CONSTRAINT `item_id_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_id_packages` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
