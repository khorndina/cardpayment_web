-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 12:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `logo`, `name`, `slug`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(2, 'uploards/media_64df47761265d.png', 'sony', '', 0, 1, '2023-08-18 03:27:02', '2023-08-18 04:02:14'),
(3, 'uploards/media_64df4ec4696e1.png', 'canon', '', 1, 1, '2023-08-18 03:58:12', '2023-08-18 03:58:12'),
(4, 'uploards/media_64ec586049505.png', 'Lumix', '', 1, 1, '2023-08-28 01:18:40', '2023-08-28 01:18:40'),
(5, 'uploards/media_64ec79a8606a2.png', 'adidas', '', 1, 1, '2023-08-28 03:40:40', '2023-08-28 03:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shop', '', 'fas fa-cart-plus', 1, '2023-08-15 23:53:51', '2023-08-17 00:01:12'),
(5, 'testing', '', 'fas fa-at', 0, '2023-08-16 20:22:04', '2023-08-16 20:45:41'),
(6, 'electronic', '', 'fab fa-buromobelexperte', 1, '2023-08-18 00:05:15', '2023-08-18 00:05:15'),
(7, 'fashion', '', 'fas fa-male', 1, '2023-08-18 00:59:05', '2023-08-18 00:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `category_id`, `sub_category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'iphone store', 'iphone-store', 1, '2023-08-17 02:12:24', '2023-08-17 21:16:58'),
(2, 1, 6, 'MSI', 'msi', 0, '2023-08-17 20:03:58', '2023-08-17 22:51:19'),
(5, 6, 7, 'canon', 'canon', 1, '2023-08-18 00:23:36', '2023-08-18 00:23:36'),
(6, 6, 7, 'sony', 'sony', 1, '2023-08-18 00:23:55', '2023-08-18 00:23:55'),
(7, 6, 7, 'Lumix', 'lumix', 1, '2023-08-27 23:42:07', '2023-08-27 23:42:07'),
(8, 7, 9, 't-shirt', 't-shirt', 1, '2023-08-27 23:43:37', '2023-08-27 23:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `max_use` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_use` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `quantity`, `max_use`, `start_date`, `end_date`, `discount_type`, `discount_value`, `status`, `total_use`, `created_at`, `updated_at`) VALUES
(2, '$9 Off', 'tinh-9', 10009, 59, '2023-09-01', '2023-09-03', 'amount', 9, 1, 0, '2023-08-31 19:49:30', '2023-08-31 19:56:01');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '2023-09-01', '2023-08-29 19:26:08', '2023-08-29 19:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_items`
--

CREATE TABLE `flash_sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `flash_sale_id` int(11) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sale_items`
--

INSERT INTO `flash_sale_items` (`id`, `product_id`, `flash_sale_id`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 1, '2023-08-29 21:05:52', '2023-08-29 21:05:52'),
(3, 5, 1, 1, 1, '2023-08-29 21:06:06', '2023-08-30 00:43:29'),
(4, 7, 1, 1, 1, '2023-08-29 23:41:20', '2023-08-29 23:41:20'),
(5, 6, 1, 1, 1, '2023-08-30 00:05:18', '2023-08-30 00:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `layout`, `contact_email`, `currency_name`, `currency_icon`, `timezone`, `created_at`, `updated_at`) VALUES
(1, 'uatsite', 'LTR', 'khorn.dina@gmail.com', 'USD', '$', 'Asia/Ho_Chi_Minh', '2023-08-31 00:34:09', '2023-08-31 02:35:11');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_09_091739_create_sliders_table', 2),
(6, '2023_08_16_042802_create_categories_table', 3),
(7, '2023_08_17_035830_create_sub_categories_table', 4),
(8, '2023_08_17_075424_create_child_categories_table', 5),
(9, '2023_08_18_092835_create_brands_table', 6),
(11, '2023_08_21_065148_create_vendors_table', 7),
(13, '2023_08_21_091705_create_products_table', 8),
(14, '2023_08_23_034608_create_product_image_galleries_table', 9),
(15, '2023_08_23_091842_create_product_variants_table', 10),
(16, '2023_08_24_093524_create_product_variant_items_table', 11),
(17, '2023_08_25_091257_add_shop_name_to_vendors_table', 12),
(18, '2023_08_29_101639_create_flash_sales_table', 13),
(19, '2023_08_29_101650_create_flash_sale_items_table', 13),
(20, '2023_08_31_061424_create_general_settings_table', 14),
(21, '2023_08_31_083319_create_coupons_table', 15),
(22, '2023_09_01_031111_create_shipping_rules_table', 16),
(23, '2023_09_01_072742_create_user_addresses_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$g4nRrN8iCWy.OjN28QNAze6gbprbP97dVocanjq1B.rR3u/WYvPry', '2023-08-08 19:39:43'),
('usertest@gmail.com', '$2y$10$8uCN1JR.xWNaZqxhgFnT3.42A2gOV6kS1mc3Memnd6cXe9ZDgrqhy', '2023-08-08 19:35:58'),
('vendor@gmail.com', '$2y$10$sBgS/b60mq.Dn/Wx2M3lN.BCuvnq6NAC01c./lmgfV4ERatuBwBby', '2023-08-08 19:31:35');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thum_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL DEFAULT 0,
  `child_category_id` int(11) NOT NULL DEFAULT 0,
  `brand_id` int(11) NOT NULL,
  `qyt` int(11) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_end_date` date DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thum_image`, `vendor_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `qyt`, `short_description`, `long_description`, `video_link`, `sku`, `price`, `offer_price`, `offer_start_date`, `offer_end_date`, `product_type`, `status`, `is_approved`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(2, 'Sony ZV-1', 'sony-zv-1', 'uploards/media_64e574e98bfb4.jpg', 1, 6, 7, 6, 2, 10, 'Sony ZV-1 Digital Camera for Content Creators', '<p><span data-component-type=\"s-search-results\" class=\"rush-component s-latency-cf-section\" data-component-id=\"10\"><h2 class=\"a-size-mini a-spacing-none a-color-base s-line-clamp-2\"><span style=\"\"><span class=\"a-size-medium a-color-base a-text-normal\"><span style=\"font-weight: normal;\">Sony\r\n ZV-1 Digital Camera for Content Creators</span></span></span></h2></span></p>', 'http://127.0.0.1:8000/admin/products/create', 'ZV-1', 1500, 99, '2023-08-24', '2023-08-25', 'best_product', 1, 1, 'Sony ZV-1 Digital Camera for Content Creators', 'Sony ZV-1 Digital Camera for Content Creators', '2023-08-22 19:54:33', '2023-08-28 23:34:57'),
(5, 'LUMIX FZ300K1', 'lumix-fz300k1', 'uploards/media_64ec5bd0672d7.jpg', 2, 6, 7, 7, 4, 11, 'LUMIX FZ300K Digital Camera with 24X 25-600mm F2.8 LEICA DC VARIO-ELMAR Lens1', '<p><span style=\"color: rgb(113, 113, 113); font-family: DINOT, Arial, Helvetica, sans-serif;\">The Panasonic LUMIX DMC FZ300K long zoom digital camera offers 4K video features and a Leica DC lens with 24x zoom and a bright F2.8 aperture across the entire zoom range. The 4K photo function can be used in three different modes, and 4K video delivers a far more intense viewing experience that is four times larger than full HD, resulting in a much higher level of detail. Built into a splash proof/dustproof rugged camera body.1</span><br></p>', 'https://www.youtube.com/watch?v=nP_uy6xeEaM', 'DMC-FZ300K1', 9991, 991, '2023-08-30', '2023-08-31', 'top_product', 1, 1, 'LUMIX FZ300K Digital Camera with 24X 25-600mm F2.8 LEICA DC VARIO-ELMAR Lens1', '<p><span style=\"color: rgb(113, 113, 113); font-family: DINOT, Arial, Helvetica, sans-serif;\">The Panasonic LUMIX DMC FZ300K long zoom digital camera offers 4K video features and a Leica DC lens with 24x zoom and a bright F2.8 aperture across the entire zoom range. The 4K photo function can be used in three different modes, and 4K video delivers a far more intense viewing experience that is four times larger than full HD, resulting in a much higher level of detail. Built into a splash proof/dustproof rugged camera body1.</span><br></p>', '2023-08-27 23:50:29', '2023-08-30 03:05:53'),
(6, 'Man T-Shirt', 'man-t-shirt', 'uploards/media_64ed6d916a7c0.jpg', 2, 7, 9, 8, 5, 1, 'sssssssssssssssssssssssssssssssss', '<p>ssssssssssssssssssssssssssssssssssssssssssssssssssssss</p>', 'http://127.0.0.1:8000/admin/products/create', 'Adidas-99', 99, 9, '2023-08-30', '2023-08-31', 'new_arrival', 1, 1, 'ssssssssssssss', 'ssssssssssssssssssssssssssssssssssssss', '2023-08-28 21:01:21', '2023-08-29 22:59:24'),
(7, 'Men Shirt-Adidas', 'men-shirt-adidas', 'uploards/media_64eedaa917999.jpg', 1, 7, 9, 8, 5, 1, 'aaaaaaaaaaaaaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaa</p>', 'http://127.0.0.1:8000/admin/products/create', 'Shirt-Adidas', 100, 10, '2023-08-30', '2023-09-01', 'new_arrival', 1, 1, 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', '2023-08-29 22:59:05', '2023-08-29 23:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_image_galleries`
--

CREATE TABLE `product_image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image_galleries`
--

INSERT INTO `product_image_galleries` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'uploards/media_64e5946d1d1f1.png', 2, '2023-08-22 22:09:01', '2023-08-22 22:09:01'),
(2, 'uploards/media_64e59501c0ef1.png', 2, '2023-08-22 22:11:29', '2023-08-22 22:11:29'),
(16, 'uploards/media_64e6c1756b274.png', 2, '2023-08-23 19:33:25', '2023-08-23 19:33:25'),
(20, 'uploards/media_64ec714591ede.jpg', 5, '2023-08-28 03:04:53', '2023-08-28 03:04:53'),
(23, 'uploards/media_64ed6db964f37.jpg', 6, '2023-08-28 21:02:01', '2023-08-28 21:02:01'),
(24, 'uploards/media_64ed6db965ac7.png', 6, '2023-08-28 21:02:01', '2023-08-28 21:02:01'),
(25, 'uploards/media_64ed6db9662c7.jpg', 6, '2023-08-28 21:02:01', '2023-08-28 21:02:01'),
(26, 'uploards/media_64eee96a26c3e.png', 7, '2023-08-30 00:02:02', '2023-08-30 00:02:02'),
(27, 'uploards/media_64eee96a27c17.png', 7, '2023-08-30 00:02:02', '2023-08-30 00:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'size', 1, '2023-08-23 03:46:38', '2023-08-23 03:46:38'),
(2, 2, 'color', 1, '2023-08-23 19:56:59', '2023-08-24 02:33:53'),
(11, 5, 'Lens', 1, '2023-08-28 19:34:46', '2023-08-30 03:33:23'),
(13, 5, 'color', 1, '2023-08-28 20:09:45', '2023-08-28 20:09:45'),
(14, 6, 'size', 1, '2023-08-28 21:02:30', '2023-08-28 21:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_items`
--

CREATE TABLE `product_variant_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_items`
--

INSERT INTO `product_variant_items` (`id`, `product_variant_id`, `name`, `price`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(6, 2, 'black', 5, 0, 1, '2023-08-24 23:03:09', '2023-08-30 03:32:09'),
(7, 1, 'M', 1, 1, 1, '2023-08-25 00:04:23', '2023-08-25 00:04:23'),
(9, 11, 'S', 0, 0, 1, '2023-08-28 20:43:54', '2023-08-28 20:43:54'),
(10, 11, 'L', 2, 1, 1, '2023-08-28 20:44:13', '2023-08-28 20:44:13'),
(11, 11, 'M', 0, 1, 0, '2023-08-28 20:44:24', '2023-08-28 20:44:24'),
(12, 13, 'black', 0, 0, 1, '2023-08-28 20:45:21', '2023-08-30 03:33:45'),
(14, 14, 'M', 0, 1, 1, '2023-08-28 21:05:22', '2023-08-28 21:07:56'),
(15, 13, 'silver', 10, 1, 1, '2023-08-30 03:34:02', '2023-08-30 03:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rules`
--

CREATE TABLE `shipping_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_cost` double DEFAULT NULL,
  `cost` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_rules`
--

INSERT INTO `shipping_rules` (`id`, `name`, `type`, `min_cost`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Default delivery', 'min_cost', 5, 0, 0, '2023-08-31 21:07:04', '2023-08-31 23:25:31'),
(2, 'Express Delivery', 'flat_cost', NULL, 9, 1, '2023-08-31 21:07:28', '2023-08-31 23:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_price` int(11) DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serail` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `banner`, `type`, `title`, `starting_price`, `button_url`, `serail`, `status`, `created_at`, `updated_at`) VALUES
(7, 'uploards/media_64ec072237a33.jpg', 'electronic', 'smart phone', 99, 'http://127.0.0.1:8000/admin/slider/create', 1, 1, '2023-08-27 19:32:02', '2023-08-27 19:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'phone shop', '', NULL, 1, '2023-08-16 21:46:49', '2023-08-17 00:12:38'),
(6, 1, 'computer', '', NULL, 1, '2023-08-17 01:38:02', '2023-08-17 01:38:02'),
(7, 6, 'camera', '', NULL, 1, '2023-08-18 00:22:41', '2023-08-18 00:22:41'),
(8, 6, 'printer', '', NULL, 1, '2023-08-18 00:23:00', '2023-08-18 00:23:00'),
(9, 7, 'men fashion', '', NULL, 1, '2023-08-18 00:59:44', '2023-08-27 23:42:35'),
(10, 7, 'women fashion', '', NULL, 1, '2023-08-18 01:00:18', '2023-08-27 23:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','vendor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `image`, `phone`, `address_id`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin9999', 'Adminuser', '/uploards/1766691378-2admin_img.png', '012345678', 1, 'admin@gmail.com', 'admin', 'active', NULL, '$2y$10$Liinufadn1xvDTmNkCDsYugqu0CrezQ3YRRMgcb9XB.h49KZxopi2', 'WV9aYVP0JEhf9gywohi2soMmRC1WvawB9etuY9iNex68KJMVUkeYt2MWqMTu', NULL, '2023-08-07 20:22:02'),
(2, 'vendor99', 'vendoruser', '/uploards/139040257-vendor1.png', '012345679', 2, 'vendor@gmail.com', 'vendor', 'active', NULL, '$2y$10$CL/HBtGrr.RnE2koEehwNOEDAd7F8wADVIn/p3PPXjGiF.u/hz.r6', 'omvNzY8zKNXsQPt2vOFsU2wyjxdc3xSXrInrmFRg2Dr5euTS5N8QkACYCgBL', NULL, '2023-08-09 01:36:22'),
(3, 'user', 'user', 'example.txt', '012345699', 3, 'user@gmail.com', 'user', 'active', NULL, '$2y$10$/Svx2aTvnBTI8EvheJN.0.go1F6OAQCH.R7eloj9ZfXQun1REUkcu', NULL, NULL, NULL),
(4, 'user test88', NULL, '/uploards/1221134349-admin_img.png', NULL, NULL, 'usertest88@gmail.com', 'user', 'active', NULL, '$2y$10$MjQ8HqCbaP.c4fa7P81Q0eP/pWYDKIVvz8GUdpGgvnLtu.yhx0JQ.', NULL, '2023-08-08 01:39:50', '2023-08-09 01:00:33'),
(5, 'test user2', NULL, NULL, NULL, NULL, 'user2@gmai.com', 'user', 'active', NULL, '$2y$10$ZW6FO46/o7tv9TMVYjryBOV/6wz36cTU4OSg3ScaUvXODbnTxbDwW', NULL, '2023-08-17 20:02:23', '2023-08-17 20:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `name`, `email`, `phone`, `country`, `state`, `city`, `zip`, `address`, `created_at`, `updated_at`) VALUES
(2, 5, 'dina home', 'myhome@gmail.com', '0123456987', 'Cambodia', 'Takeo', 'Takeo', '0123', 'bati, takeo', '2023-09-01 00:51:43', '2023-09-01 00:51:43'),
(3, 5, 'Mrr.Dina', 'dina@gmail.com', '0123456789', 'American Samoa', 'Phnom Penh', 'Phnom Penh', '555', 'Cambodia', '2023-09-01 01:05:44', '2023-09-01 01:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `banner`, `phone`, `email`, `address`, `description`, `fb_link`, `tw_link`, `insta_link`, `created_at`, `updated_at`, `shop_name`) VALUES
(1, 1, 'uploards/media_64e872158c237.png', '01234567800', 'admin@gmail.com', 'Phnom Penh ppp', 'shop description ppp<br>', 'https://facebook.com', 'https://facebook.com', 'https://facebook.com', '2023-08-21 00:38:15', '2023-08-25 02:19:17', 'Admin Shop'),
(2, 2, 'uploards/media_64ec0bb36b237.png', '012345678', 'vendor99@gmail.com', 'Phnom Penh', 'vendor shop description99', 'http://127.0.0.1:8000/vendor/shop-profile', 'http://127.0.0.1:8000/vendor/shop-profile', 'http://127.0.0.1:8000/vendor/shop-profile', '2023-08-25 02:57:38', '2023-08-27 19:54:33', 'Vendor Shop99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_sale_items`
--
ALTER TABLE `flash_sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
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
-- Indexes for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_rules`
--
ALTER TABLE `shipping_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flash_sale_items`
--
ALTER TABLE `flash_sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shipping_rules`
--
ALTER TABLE `shipping_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
