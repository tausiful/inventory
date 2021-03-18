-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fridge', NULL, '2021-03-18 07:51:08', '2021-03-18 07:51:08'),
(2, 'Air-Condition', NULL, '2021-03-18 07:51:18', '2021-03-18 07:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `code`, `national_id`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sagor', 'cust-210318-000000001', '456546345', '5965646', 'pabna', 1, '2021-03-18 08:02:08', '2021-03-18 08:02:08'),
(2, 'Emon', 'cust-210318-000000002', '8796546', '546546', 'pabna', 1, '2021-03-18 08:02:31', '2021-03-18 08:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liftings`
--

CREATE TABLE `liftings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaouchar_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `purchase_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `vouchar_date` date DEFAULT NULL,
  `total_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` double NOT NULL,
  `total_mrp_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liftings`
--

INSERT INTO `liftings` (`id`, `serial_no`, `vaouchar_no`, `vendor_id`, `purchase_by`, `submission_date`, `vouchar_date`, `total_qty`, `total_price`, `total_mrp_price`, `created_at`, `updated_at`) VALUES
(1, '1000001', 'v1', 1, 'Tausiful Islam', '2021-03-18', '2021-03-18', '20', 300000, 340000, '2021-03-18 07:56:10', '2021-03-18 07:56:10'),
(2, '1000002', 'v2', 1, 'Tausiful Islam', '2021-03-18', '2021-03-16', '10', 120000, 140000, '2021-03-18 07:56:46', '2021-03-18 07:56:46'),
(3, '1000003', 'v3', 2, 'Tausiful Islam', '2021-03-18', '2021-03-18', '10', 350000, 380000, '2021-03-18 07:57:25', '2021-03-18 07:57:25'),
(4, '1000006', 'v4', 2, 'Tausiful Islam', '2021-03-18', '2021-03-15', '4', 180000, 192000, '2021-03-18 07:58:02', '2021-03-18 07:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `lifting_products`
--

CREATE TABLE `lifting_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lifting_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `mrp` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lifting_products`
--

INSERT INTO `lifting_products` (`id`, `lifting_id`, `vendor_id`, `product_id`, `product_name`, `model_no`, `serial_no`, `qty`, `price`, `mrp`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000001', 1, 15000, 17000, 1, NULL, NULL),
(2, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000002', 1, 15000, 17000, 1, NULL, NULL),
(3, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000003', 1, 15000, 17000, 1, NULL, NULL),
(4, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000004', 1, 15000, 17000, 1, NULL, NULL),
(5, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000005', 1, 15000, 17000, 1, NULL, NULL),
(6, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000006', 1, 15000, 17000, 1, NULL, NULL),
(7, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000007', 1, 15000, 17000, 1, NULL, NULL),
(8, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000008', 1, 15000, 17000, 1, NULL, NULL),
(9, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000009', 1, 15000, 17000, 1, NULL, NULL),
(10, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000010', 1, 15000, 17000, 1, NULL, NULL),
(11, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000011', 1, 15000, 17000, 1, NULL, NULL),
(12, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000012', 1, 15000, 17000, 1, NULL, NULL),
(13, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000013', 1, 15000, 17000, 1, NULL, NULL),
(14, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000014', 1, 15000, 17000, 1, NULL, NULL),
(15, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000015', 1, 15000, 17000, 1, NULL, NULL),
(16, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000016', 1, 15000, 17000, 1, NULL, NULL),
(17, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000017', 1, 15000, 17000, 1, NULL, NULL),
(18, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000018', 1, 15000, 17000, 1, NULL, NULL),
(19, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000019', 1, 15000, 17000, 1, NULL, NULL),
(20, 1, 1, 1, 'fridge-1 (m-100)', 'm-100', '10000000000020', 1, 15000, 17000, 1, NULL, NULL),
(21, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000021', 1, 12000, 14000, 1, NULL, NULL),
(22, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000022', 1, 12000, 14000, 1, NULL, NULL),
(23, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000023', 1, 12000, 14000, 1, NULL, NULL),
(24, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000024', 1, 12000, 14000, 1, NULL, NULL),
(25, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000025', 1, 12000, 14000, 1, NULL, NULL),
(26, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000026', 1, 12000, 14000, 1, NULL, NULL),
(27, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000027', 1, 12000, 14000, 1, NULL, NULL),
(28, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000028', 1, 12000, 14000, 1, NULL, NULL),
(29, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000029', 1, 12000, 14000, 1, NULL, NULL),
(30, 2, 1, 2, 'fridge-2 (m-200)', 'm-200', '10000000000030', 1, 12000, 14000, 1, NULL, NULL),
(31, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000031', 1, 35000, 38000, 1, NULL, NULL),
(32, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000032', 1, 35000, 38000, 1, NULL, NULL),
(33, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000033', 1, 35000, 38000, 1, NULL, NULL),
(34, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000034', 1, 35000, 38000, 1, NULL, NULL),
(35, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000035', 1, 35000, 38000, 1, NULL, NULL),
(36, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000036', 1, 35000, 38000, 1, NULL, NULL),
(37, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000037', 1, 35000, 38000, 1, NULL, NULL),
(38, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000038', 1, 35000, 38000, 1, NULL, NULL),
(39, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000039', 1, 35000, 38000, 1, NULL, NULL),
(40, 3, 2, 3, 'ac-1 (mac-300)', 'mac-300', '10000000000040', 1, 35000, 38000, 1, NULL, NULL),
(50, 4, 2, 4, 'ac-2', 'mac-300', '10000000000041', 1, 45000, 48000, 1, NULL, NULL),
(51, 4, 2, 4, 'ac-2', 'mac-300', '10000000000042', 1, 45000, 48000, 1, NULL, NULL),
(52, 4, 2, 4, 'ac-2', 'mac-300', '10000000000043', 1, 45000, 48000, 1, NULL, NULL),
(53, 4, 2, 4, 'ac-2', 'mac-300', '10000000000044', 1, 45000, 48000, 1, NULL, NULL);

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2021_03_07_192036_create_sessions_table', 1),
(14, '2021_03_12_043728_create_categories_table', 1),
(15, '2021_03_12_120256_create_posts_table', 2),
(16, '2021_03_12_124850_create_products_table', 3),
(17, '2021_03_12_171238_create_vendors_table', 4),
(18, '2021_03_13_144645_create_liftings_table', 5),
(19, '2021_03_14_011945_create_lifting_products_table', 5),
(20, '2021_03_16_113336_create_customers_table', 6),
(21, '2021_03_17_015718_create_product_issues_table', 7),
(22, '2021_03_17_015749_create_product_issue_lists_table', 7);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` double(8,2) NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `model_no`, `description`, `cost_price`, `mrp`, `created_at`, `updated_at`) VALUES
(1, 1, 'fridge-1', 'm-100', NULL, 15000.00, 17000.00, '2021-03-18 07:52:31', '2021-03-18 07:52:31'),
(2, 1, 'fridge-2', 'm-200', NULL, 12000.00, 14000.00, '2021-03-18 07:52:56', '2021-03-18 07:52:56'),
(3, 2, 'ac-1', 'mac-300', NULL, 35000.00, 38000.00, '2021-03-18 07:53:24', '2021-03-18 07:53:24'),
(4, 2, 'ac-2', 'mac-300', NULL, 45000.00, 48000.00, '2021-03-18 07:53:57', '2021-03-18 07:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_issues`
--

CREATE TABLE `product_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `issue_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` double NOT NULL,
  `total_amount` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_issues`
--

INSERT INTO `product_issues` (`id`, `customer_id`, `issue_no`, `date`, `total_qty`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '100000001', '2021-03-18', 3, 51000, 1, '2021-03-18 08:03:28', '2021-03-18 08:03:28'),
(2, 2, '100000002', '2021-03-16', 5, 190000, 1, '2021-03-18 08:04:29', '2021-03-18 08:04:29'),
(3, 1, '100000003', '2021-03-18', 1, 38000, 1, '2021-03-18 08:04:55', '2021-03-18 08:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_issue_lists`
--

CREATE TABLE `product_issue_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `model_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_issue_lists`
--

INSERT INTO `product_issue_lists` (`id`, `issue_id`, `product_id`, `model_no`, `serial_no`, `price`, `qty`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'm-100', '10000000000001', 17000, 1, 17000, 1, NULL, NULL),
(2, 1, 1, 'm-100', '10000000000002', 17000, 1, 17000, 1, NULL, NULL),
(3, 1, 1, 'm-100', '10000000000003', 17000, 1, 17000, 1, NULL, NULL),
(4, 2, 3, 'mac-300', '10000000000031', 38000, 1, 38000, 1, NULL, NULL),
(5, 2, 3, 'mac-300', '10000000000032', 38000, 1, 38000, 1, NULL, NULL),
(6, 2, 3, 'mac-300', '10000000000033', 38000, 1, 38000, 1, NULL, NULL),
(7, 2, 3, 'mac-300', '10000000000034', 38000, 1, 38000, 1, NULL, NULL),
(8, 2, 3, 'mac-300', '10000000000035', 38000, 1, 38000, 1, NULL, NULL),
(9, 3, 3, 'mac-300', '10000000000036', 38000, 1, 38000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gmmQPqp1LCt7Qs1iStAIfHpeNdbvbwN58erdRCf7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2ozM3NHYWRZNGNNTkRScGdleUFuZzZCMWx6amhMcnZBZ0RUNnNyViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1616076597),
('vxPccTrDgGJOyc8LfcU3Urs7BAzSHwtW31MVUXOY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHpuZWJJTk93TTJSSVcxSTFVUWduUlNWSmUzdlM4WFVhSEsxRXVUNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1616072596);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Tausiful Islam', 'admin@gmail.com', NULL, '$2y$10$QAKxcMVmYs1gIOfCrn/LDuodQygsSScnFZ.ee5T6nCEQbH55f9LX.', NULL, NULL, NULL, NULL, NULL, '2021-03-12 04:06:33', '2021-03-12 04:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `contact_person`, `contact_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Shuvo', 'sagor', '546345', 'tausif011@gmail.com', 'pabna', '2021-03-18 07:54:35', '2021-03-18 07:55:25'),
(2, 'Rahat', 'manik', '0123589562', 'rahat@gmail.com', 'pabna', '2021-03-18 07:55:12', '2021-03-18 07:55:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lifting_record`
-- (See below for the actual view)
--
CREATE TABLE `view_lifting_record` (
`liftingDate` date
,`liftingNo` varchar(191)
,`vendorId` int(11)
,`vendorName` varchar(100)
,`categoryId` int(11)
,`categoryName` varchar(100)
,`productId` int(11)
,`productName` varchar(100)
,`productModelNo` varchar(100)
,`productSerialNo` varchar(191)
,`productQty` int(11)
,`price` double
,`mrp` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sales_record`
-- (See below for the actual view)
--
CREATE TABLE `view_sales_record` (
`date` varchar(100)
,`customerId` int(11)
,`issueNo` varchar(100)
,`categoryId` int(11)
,`categoryName` varchar(100)
,`productId` int(11)
,`productName` varchar(100)
,`productModelNo` varchar(100)
,`productSerialNo` varchar(100)
,`productQty` int(11)
,`price` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stock_report`
-- (See below for the actual view)
--
CREATE TABLE `view_stock_report` (
`date` varchar(100)
,`categoryId` bigint(20) unsigned
,`categoryName` varchar(100)
,`productId` decimal(20,0)
,`productName` varchar(100)
,`modelNo` varchar(100)
,`liftingQty` decimal(32,0)
,`liftingAmount` double
,`mrp` double
,`productIssueQty` decimal(32,0)
,`productIssueAmount` double
);

-- --------------------------------------------------------

--
-- Structure for view `view_lifting_record`
--
DROP TABLE IF EXISTS `view_lifting_record`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lifting_record`  AS  select `liftings`.`vouchar_date` AS `liftingDate`,`liftings`.`vaouchar_no` AS `liftingNo`,`liftings`.`vendor_id` AS `vendorId`,`vendors`.`name` AS `vendorName`,`products`.`category_id` AS `categoryId`,`categories`.`name` AS `categoryName`,`lifting_products`.`product_id` AS `productId`,`lifting_products`.`product_name` AS `productName`,`products`.`model_no` AS `productModelNo`,`lifting_products`.`serial_no` AS `productSerialNo`,`lifting_products`.`qty` AS `productQty`,`lifting_products`.`price` AS `price`,`lifting_products`.`mrp` AS `mrp` from ((((`liftings` left join `vendors` on(`vendors`.`id` = `liftings`.`vendor_id`)) left join `lifting_products` on(`lifting_products`.`lifting_id` = `liftings`.`id`)) left join `products` on(`products`.`id` = `lifting_products`.`product_id`)) left join `categories` on(`categories`.`id` = `products`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_sales_record`
--
DROP TABLE IF EXISTS `view_sales_record`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sales_record`  AS  select `product_issues`.`date` AS `date`,`product_issues`.`customer_id` AS `customerId`,`product_issues`.`issue_no` AS `issueNo`,`products`.`category_id` AS `categoryId`,`categories`.`name` AS `categoryName`,`product_issue_lists`.`product_id` AS `productId`,`products`.`name` AS `productName`,`products`.`model_no` AS `productModelNo`,`product_issue_lists`.`serial_no` AS `productSerialNo`,`product_issue_lists`.`qty` AS `productQty`,`product_issue_lists`.`price` AS `price` from (((`product_issues` left join `product_issue_lists` on(`product_issue_lists`.`issue_id` = `product_issues`.`id`)) left join `products` on(`products`.`id` = `product_issue_lists`.`product_id`)) left join `categories` on(`categories`.`id` = `products`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_stock_report`
--
DROP TABLE IF EXISTS `view_stock_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stock_report`  AS  select `liftings`.`vouchar_date` AS `date`,`categories`.`id` AS `categoryId`,`categories`.`name` AS `categoryName`,`lifting_products`.`product_id` AS `productId`,`products`.`name` AS `productName`,`products`.`model_no` AS `modelNo`,sum(`lifting_products`.`qty`) AS `liftingQty`,sum(`lifting_products`.`price`) AS `liftingAmount`,sum(`lifting_products`.`mrp`) AS `mrp`,0 AS `productIssueQty`,0 AS `productIssueAmount` from (((`lifting_products` left join `products` on(`products`.`id` = `lifting_products`.`product_id`)) left join `liftings` on(`liftings`.`id` = `lifting_products`.`lifting_id`)) left join `categories` on(`categories`.`id` = `products`.`category_id`)) group by `lifting_products`.`product_id` union all select `product_issues`.`date` AS `date`,`categories`.`id` AS `categoryId`,`categories`.`name` AS `categoryName`,`product_issue_lists`.`product_id` AS `productId`,`products`.`name` AS `productName`,`products`.`model_no` AS `modelNo`,0 AS `liftingQty`,0 AS `liftingAmount`,0 AS `mrp`,sum(`product_issue_lists`.`qty`) AS `productIssueQty`,sum(`product_issue_lists`.`price`) AS `productIssueAmount` from (((`product_issue_lists` left join `products` on(`products`.`id` = `product_issue_lists`.`product_id`)) left join `product_issues` on(`product_issues`.`id` = `product_issue_lists`.`issue_id`)) left join `categories` on(`categories`.`id` = `products`.`category_id`)) group by `product_issue_lists`.`product_id` union all select 0 AS `date`,`categories`.`id` AS `categoryId`,`categories`.`name` AS `categoryName`,`products`.`id` AS `productId`,`products`.`name` AS `productName`,`products`.`model_no` AS `modelNo`,0 AS `liftingQty`,0 AS `liftingAmount`,0 AS `mrp`,0 AS `productIssueQty`,0 AS `productIssueAmount` from (`products` left join `categories` on(`categories`.`id` = `products`.`category_id`)) group by `products`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `liftings`
--
ALTER TABLE `liftings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lifting_products`
--
ALTER TABLE `lifting_products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_issues`
--
ALTER TABLE `product_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_issue_lists`
--
ALTER TABLE `product_issue_lists`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liftings`
--
ALTER TABLE `liftings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lifting_products`
--
ALTER TABLE `lifting_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_issues`
--
ALTER TABLE `product_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_issue_lists`
--
ALTER TABLE `product_issue_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
