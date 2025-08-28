-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 08:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lilac_with_grabit`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `en_description` longtext NOT NULL,
  `ar_description` longtext DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `en_title`, `ar_title`, `en_description`, `ar_description`, `image`, `image_2`, `image_3`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Who are we', 'Who are we', '<p>&lt;p&gt;We&rsquo;re here to serve only the best products for you. Enriching your homes with the best<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; essentials.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; galley of type and scrambled it to make a type specimen book. It has survived not only five<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Lorem Ipsum has survived not only five centuries, but also the leap into electronic<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; typesetting, remaining essentially unchanged.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; galley of type and scrambled it to make a type specimen book.&lt;/p&gt;</p>', '<p>&lt;p&gt;We&rsquo;re here to serve only the best products for you. Enriching your homes with the best<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; essentials.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; galley of type and scrambled it to make a type specimen book. It has survived not only five<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Lorem Ipsum has survived not only five centuries, but also the leap into electronic<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; typesetting, remaining essentially unchanged.&lt;/p&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; galley of type and scrambled it to make a type specimen book.&lt;/p&gt;</p>', 'about_image_4770530.jpg', 'about_image_325028.jpg', 'about_image_8650161.jpg', 1, '2024-08-08 04:36:19', '2024-08-08 05:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `barnch_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `iban_number` varchar(225) DEFAULT NULL,
  `swift_code` varchar(225) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `stemped_doc` varchar(500) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `beneficiary_name`, `bank_name`, `barnch_name`, `account_number`, `iban_number`, `swift_code`, `currency_id`, `stemped_doc`, `isActive`, `isDeleted`, `created_at`, `updated_at`) VALUES
(3, 40, 'Muhammad Muzammil', 'HBL', 'Civic Center', '0000123654789', 'PK05', 'PKHBLMT', 1, '30342.png', 1, 0, '2020-05-01 05:29:00', '2020-05-01 05:29:00'),
(4, 41, 'Muhammad Usama', 'Al-Habib', 'Defence', '00001236654789', 'ALHBL', 'AlHBLMTD', 1, '15643.png', 1, 0, '2020-05-02 00:54:39', '2020-05-02 00:54:39'),
(7, 46, 'Muzammil', 'HBL', 'CC', '001122547859632', 'PK05', 'PKHBL', 1, '22087.docx', 1, 0, '2020-05-02 05:28:18', '2020-05-02 05:28:18'),
(10, 55, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 1, '51280.jpg', 1, 0, '2021-08-10 06:26:29', '2021-08-10 06:26:29'),
(12, 58, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 1, '66929.PNG', 1, 0, '2021-08-12 07:52:29', '2021-08-12 07:52:29'),
(13, 71, 'Test Name', 'AL-Habib', 'Baber Market', '44244244244242424', '4422', NULL, 1, '86536.png', 1, 0, '2022-10-10 06:02:57', '2022-10-10 06:02:57'),
(14, 73, 'test', 'test', 'test', 'lkjsahdjsha', 'ajkshdkjsahkjd', 'shajdksahkj', 1, '39357.pdf', 1, 0, '2024-07-11 05:05:01', '2024-07-11 05:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-08-23 07:34:57', '2021-08-23 07:34:57'),
(2, '2021-08-23 07:36:32', '2021-08-23 07:36:32'),
(3, '2021-08-23 07:37:43', '2021-08-23 07:37:43'),
(4, '2021-08-23 07:39:16', '2021-08-23 07:39:16'),
(5, '2024-07-10 05:58:10', '2024-07-10 05:58:10'),
(6, '2024-07-10 06:08:47', '2024-07-10 06:08:47'),
(7, '2024-07-10 06:09:38', '2024-07-10 06:09:38'),
(8, '2024-07-10 06:10:55', '2024-07-10 06:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translates`
--

CREATE TABLE `brand_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_translates`
--

INSERT INTO `brand_translates` (`id`, `brand_id`, `lang`, `name`, `short_name`, `description`, `image`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Saadeddin Sweet', 'Saadeddin', 'Saadeddin Sweet in Riyadh', 'brand18887.jpg', 1, '2021-08-23 07:34:58', '2024-08-21 06:01:08'),
(2, 1, 'ar', 'حلويات سعد الدين', 'سعد الدين', 'حلويات سعد الدين بالرياض', 'brand70582.jpg', 1, '2021-08-23 07:34:58', '2021-08-23 07:34:58'),
(3, 2, 'en', 'Sanabel Sweet', 'Sanabel', 'Sanabel Sweet in Riyadh', 'brand25279.jpg', 1, '2021-08-23 07:36:33', '2021-08-23 07:36:33'),
(4, 2, 'ar', 'سنابل سويت', 'سنابل', 'حلويات سنابل بالرياض', 'brand15140.jpg', 1, '2021-08-23 07:36:33', '2021-08-23 07:36:33'),
(5, 3, 'en', 'Kabbani Sweet', 'Kabbani', 'Kabbani Sweet Riyadh', 'brand67932.jpg', 1, '2021-08-23 07:37:43', '2021-08-23 07:37:43'),
(6, 3, 'ar', 'حلويات قباني', 'قباني', 'حلويات قباني الرياض', 'brand28303.jpg', 1, '2021-08-23 07:37:43', '2021-08-23 07:37:43'),
(7, 4, 'en', 'Florida Garden', 'Florida', 'Florida Roses', 'brand34507.JPG', 1, '2021-08-23 07:39:17', '2021-08-23 07:39:17'),
(8, 4, 'ar', 'حديقة فلوريدا', 'فلوريدا', 'فلوريدا الورود', 'brand7005.JPG', 1, '2021-08-23 07:39:17', '2021-08-23 07:39:17'),
(9, 8, 'en', 'Test', 't', 'sfdasf', 'brand8336.png', 1, '2024-07-10 06:10:58', '2024-07-10 06:13:03'),
(10, 8, 'ar', 'ar', 'ar', 'ar', 'brand70292.png', 1, '2024-07-10 06:10:58', '2024-07-10 06:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_actions`
--

CREATE TABLE `cart_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT 0,
  `deal_id` int(11) DEFAULT 0,
  `action_type` varchar(255) DEFAULT NULL,
  `action_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_actions`
--

INSERT INTO `cart_actions` (`id`, `user_ip`, `country`, `product_id`, `deal_id`, `action_type`, `action_time`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', NULL, 10, 0, 'Add', '2024-08-16 07:36 AM', '2024-08-16 02:36:15', '2024-08-16 02:36:15'),
(2, '127.0.0.1', NULL, 10, 0, 'Add', '2024-08-16 07:39 AM', '2024-08-16 02:39:08', '2024-08-16 02:39:08'),
(3, '127.0.0.1', NULL, 9, 0, 'Add', '2024-08-16 07:39 AM', '2024-08-16 02:39:40', '2024-08-16 02:39:40'),
(4, '127.0.0.1', NULL, 8, 0, 'Add', '2024-08-16 07:39 AM', '2024-08-16 02:39:52', '2024-08-16 02:39:52'),
(5, '127.0.0.1', NULL, 7, 0, 'Add', '2024-08-16 07:39 AM', '2024-08-16 02:39:55', '2024-08-16 02:39:55'),
(6, '127.0.0.1', NULL, 12, 0, 'Add', '2024-08-16 07:39 AM', '2024-08-16 02:39:59', '2024-08-16 02:39:59'),
(7, '127.0.0.1', NULL, 12, 0, 'Delete', '2024-08-16 07:50 AM', '2024-08-16 02:50:34', '2024-08-16 02:50:34'),
(8, '127.0.0.1', NULL, 10, 0, 'Order', '2024-08-16 07:56 AM', '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(9, '127.0.0.1', NULL, 9, 0, 'Order', '2024-08-16 07:56 AM', '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(10, '127.0.0.1', NULL, 8, 0, 'Order', '2024-08-16 07:56 AM', '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(11, '127.0.0.1', NULL, 7, 0, 'Order', '2024-08-16 07:56 AM', '2024-08-16 02:56:28', '2024-08-16 02:56:28'),
(12, '127.0.0.1', NULL, 9, 0, 'Add', '2024-08-17 07:56 AM', '2024-08-17 02:56:20', '2024-08-17 02:56:20'),
(13, '127.0.0.1', NULL, 9, 0, 'Delete', '2024-08-17 07:57 AM', '2024-08-17 02:57:11', '2024-08-17 02:57:11'),
(14, '127.0.0.1', NULL, 9, 0, 'Add', '2024-08-22 07:43 AM', '2024-08-22 02:43:43', '2024-08-22 02:43:43'),
(15, '127.0.0.1', NULL, 12, 0, 'Add', '2024-08-22 09:42 AM', '2024-08-22 04:42:18', '2024-08-22 04:42:18'),
(16, '127.0.0.1', NULL, 9, 0, 'Add', '2024-08-22 09:45 AM', '2024-08-22 04:45:05', '2024-08-22 04:45:05'),
(17, '127.0.0.1', NULL, 8, 0, 'Add', '2024-08-22 09:46 AM', '2024-08-22 04:46:58', '2024-08-22 04:46:58'),
(18, '127.0.0.1', NULL, 10, 0, 'Add', '2024-08-22 09:47 AM', '2024-08-22 04:47:01', '2024-08-22 04:47:01'),
(19, '127.0.0.1', NULL, 12, 0, 'Add', '2024-08-22 09:47 AM', '2024-08-22 04:47:02', '2024-08-22 04:47:02'),
(20, '127.0.0.1', NULL, 9, 0, 'Order', '2024-08-22 10:49 AM', '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(21, '127.0.0.1', NULL, 8, 0, 'Order', '2024-08-22 10:49 AM', '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(22, '127.0.0.1', NULL, 10, 0, 'Order', '2024-08-22 10:49 AM', '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(23, '127.0.0.1', NULL, 12, 0, 'Order', '2024-08-22 10:49 AM', '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(24, '127.0.0.1', NULL, 9, 0, 'Add', '2024-09-07 05:40 AM', '2024-09-07 00:40:22', '2024-09-07 00:40:22'),
(25, '127.0.0.1', NULL, 9, 0, 'Order', '2024-09-07 05:45 AM', '2024-09-07 00:45:09', '2024-09-07 00:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-08-23 00:33:19', '2021-08-23 00:33:19'),
(2, '2021-08-23 00:35:14', '2021-08-23 00:35:14'),
(3, '2021-08-23 00:35:46', '2021-08-23 00:35:46'),
(4, '2021-08-23 00:36:59', '2021-08-23 00:36:59'),
(6, '2021-08-23 00:50:58', '2021-08-23 00:50:58'),
(7, '2021-08-23 00:51:56', '2021-08-23 00:51:56'),
(8, '2021-08-23 00:52:39', '2021-08-23 00:52:39'),
(9, '2021-08-23 01:01:49', '2021-08-23 01:01:49'),
(10, '2021-08-23 01:02:39', '2021-08-23 01:02:39'),
(11, '2021-08-23 01:03:07', '2021-08-23 01:03:07'),
(12, '2022-01-04 02:45:18', '2022-01-04 02:45:18'),
(13, '2022-01-04 02:47:55', '2022-01-04 02:47:55'),
(14, '2022-01-04 02:48:46', '2022-01-04 02:48:46'),
(15, '2022-01-04 02:49:55', '2022-01-04 02:49:55'),
(16, '2022-01-06 05:46:27', '2022-01-06 05:46:27'),
(18, '2024-08-21 04:45:29', '2024-08-21 04:45:29'),
(19, '2024-08-21 04:47:05', '2024-08-21 04:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `category_translates`
--

CREATE TABLE `category_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `promotion_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translates`
--

INSERT INTO `category_translates` (`id`, `category_id`, `lang`, `parent_id`, `name`, `description`, `image`, `isActive`, `promotion_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 0, 'Cakes', 'Cake', 'category25243.png', 1, 1, '2021-08-23 00:33:19', '2024-09-06 05:55:47'),
(2, 1, 'ar', 0, 'كيك', 'كيك', 'category99406.png', 1, 1, '2021-08-23 00:33:19', '2024-09-06 05:55:47'),
(3, 2, 'en', 0, 'Traditional Sweets', 'Methai', NULL, 1, 0, '2021-08-23 00:35:14', '2024-09-06 05:55:37'),
(4, 2, 'ar', 0, 'حلويات تقليدية', 'قبضة', NULL, 1, 0, '2021-08-23 00:35:14', '2024-09-06 05:55:37'),
(5, 3, 'en', 0, 'Chocolates', 'Chocolates', NULL, 1, 0, '2021-08-23 00:35:46', '2024-09-06 05:55:37'),
(6, 3, 'ar', 0, 'الشوكولاتة', 'الشوكولاتة', NULL, 1, 0, '2021-08-23 00:35:46', '2024-09-06 05:55:37'),
(7, 4, 'en', 0, 'Flowers', 'Flowers', NULL, 1, 0, '2021-08-23 00:36:59', '2024-09-06 05:55:37'),
(8, 4, 'ar', 0, 'زهور', 'زهور', NULL, 1, 0, '2021-08-23 00:36:59', '2024-09-06 05:55:37'),
(11, 6, 'en', 1, 'Chocolate Cakes', 'Chocolate Cakes', NULL, 1, 0, '2021-08-23 00:50:58', '2024-09-06 05:55:37'),
(12, 6, 'ar', 1, 'كعك الشوكولاتة', 'كعك الشوكولاتة', NULL, 1, 0, '2021-08-23 00:50:58', '2024-09-06 05:55:37'),
(13, 7, 'en', 1, 'Cheese Cake', 'Cheese Cake', NULL, 1, 0, '2021-08-23 00:51:56', '2024-09-06 05:55:37'),
(14, 7, 'ar', 1, 'تشيز كيك', 'تشيز كيك', NULL, 1, 0, '2021-08-23 00:51:56', '2024-09-06 05:55:37'),
(15, 8, 'en', 2, 'Kunafa', 'Kunafa', NULL, 1, 0, '2021-08-23 00:52:39', '2024-09-06 05:55:37'),
(16, 8, 'ar', 2, 'كنافة', 'كنافة', NULL, 1, 0, '2021-08-23 00:52:39', '2024-09-06 05:55:37'),
(17, 9, 'en', 2, 'Umm Ali', 'Umm Ali', NULL, 1, 0, '2021-08-23 01:01:49', '2024-09-06 05:55:37'),
(18, 9, 'ar', 2, 'أم علي', 'أم علي', NULL, 1, 0, '2021-08-23 01:01:49', '2024-09-06 05:55:37'),
(19, 10, 'en', 4, 'Flower Bouquet', 'Flower Bouquet', NULL, 1, 0, '2021-08-23 01:02:39', '2024-09-06 05:55:37'),
(20, 10, 'ar', 4, 'باقة من الزهور', 'باقة من الزهور', NULL, 1, 0, '2021-08-23 01:02:39', '2024-09-06 05:55:37'),
(21, 11, 'en', 4, 'Roses', 'Roses', NULL, 1, 0, '2021-08-23 01:03:07', '2024-09-06 05:55:37'),
(22, 11, 'ar', 4, 'ورود', 'ورود', NULL, 1, 0, '2021-08-23 01:03:08', '2024-09-06 05:55:37'),
(23, 12, 'en', 0, 'Gifts', NULL, NULL, 1, 0, '2022-01-04 02:45:18', '2024-09-06 05:55:37'),
(24, 12, 'ar', 0, 'الهدايا', NULL, NULL, 1, 0, '2022-01-04 02:45:18', '2024-09-06 05:55:37'),
(25, 13, 'en', 0, 'Electronics', NULL, NULL, 1, 0, '2022-01-04 02:47:55', '2024-09-06 05:55:37'),
(26, 13, 'ar', 0, 'إلكترونيات', NULL, NULL, 1, 0, '2022-01-04 02:47:55', '2024-09-06 05:55:37'),
(27, 14, 'en', 0, 'Toys', NULL, NULL, 1, 0, '2022-01-04 02:48:46', '2024-09-06 05:55:37'),
(28, 14, 'ar', 0, 'ألعاب الأطفال', NULL, NULL, 1, 0, '2022-01-04 02:48:46', '2024-09-06 05:55:37'),
(29, 15, 'en', 0, 'Beauty & Fragrance', NULL, NULL, 1, 0, '2022-01-04 02:49:55', '2024-09-06 05:55:37'),
(30, 15, 'ar', 0, 'الجمال والعطور', NULL, NULL, 1, 0, '2022-01-04 02:49:55', '2024-09-06 05:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `code`, `shortName`, `long`, `lat`, `isActive`, `isDeleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Karachi', '0213', 'KHI', NULL, NULL, 1, 0, NULL, NULL, NULL),
(2, 2, NULL, 'Makkah', '046', 'MAK', NULL, NULL, 1, 0, NULL, NULL, NULL),
(3, 2, NULL, 'Madina', '046', 'MAD', NULL, NULL, 1, 0, NULL, NULL, NULL),
(4, 2, NULL, 'Riyadh', '046', 'RYD', NULL, NULL, 1, 0, NULL, NULL, NULL),
(7, 1, 2, 'Islamabad', '051', 'ISB', '10', '20', 1, 0, NULL, NULL, '2019-05-14 06:31:58'),
(9, 1, 0, 'Torronto', '0012', 'TR', NULL, NULL, 1, 0, NULL, NULL, '2021-12-30 06:10:55'),
(12, 1, 3, 'testing', 'y', 'y', '8', '8', 1, 0, '2021-12-30 05:55:11', '2019-05-13 06:44:22', '2021-12-30 05:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `city_areas`
--

CREATE TABLE `city_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_areas`
--

INSERT INTO `city_areas` (`id`, `country_id`, `state_id`, `city_id`, `name`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 'Gulshan Iqbal', 1, '2022-02-17 06:15:49', '2022-02-17 06:16:11'),
(4, 1, 1, 1, 'Johar', 1, '2022-02-18 01:57:53', '2022-02-18 01:57:53'),
(5, 1, 1, 1, 'Landhi', 1, '2022-02-18 01:59:01', '2022-02-18 01:59:01'),
(6, 1, 1, 1, 'Korangi', 1, '2022-02-19 01:13:05', '2022-02-19 01:13:05'),
(7, 1, 1, 1, 'Malir', 1, '2022-02-19 01:32:27', '2022-02-19 01:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `shortName`, `long`, `lat`, `isActive`, `isDeleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pakistan', '+92', 'Pak', NULL, NULL, 1, 0, NULL, NULL, '2021-12-30 06:08:05'),
(2, 'Saudi Arabia', '046', 'SA', NULL, NULL, 1, 0, NULL, '2019-05-13 04:36:13', '2019-05-13 04:36:13'),
(3, 'Canada', '001', 'CA', '100', '50', 0, 0, NULL, NULL, '2019-05-27 06:41:38'),
(4, 'Srilanka', 'SRI-001', 'SRI', '60.99999', '75.00000', 0, 0, '2021-12-30 06:00:37', '2019-05-13 05:37:14', '2021-12-30 06:00:37'),
(5, 'Bangladesh', 'BNG-001', 'BAN', '20', '40', 0, 0, '2019-05-14 01:18:59', '2019-05-13 06:51:33', '2019-05-14 01:18:59'),
(6, 'Japan', '045', 'JP', '7889.63', '7878.90', 0, 0, '2021-12-30 04:50:43', '2019-05-14 01:14:53', '2021-12-30 04:50:43'),
(7, 'New One', 'NO', 'NO', '', '', 1, 0, NULL, '2021-12-30 06:03:02', '2021-12-30 06:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `cell` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` bigint(20) NOT NULL,
  `shipToAddress` varchar(255) DEFAULT NULL,
  `billToAddress` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `cell`, `image`, `country_id`, `state_id`, `city_id`, `shipToAddress`, `billToAddress`, `Address1`, `Address2`, `status`, `created_at`, `updated_at`) VALUES
(1, 60, 'aftab2', 'arzoo', '00923221234567', 'user40407.jpg', 1, 1, 1, NULL, NULL, 'new address', NULL, NULL, '2021-09-03 01:26:36', '2021-10-08 05:35:10'),
(2, 61, 'muzammil', 'khan', '00923221234567', NULL, 1, NULL, 7, NULL, NULL, 'asdfasdf', NULL, NULL, '2021-09-03 01:28:40', '2021-09-03 01:28:40'),
(3, 63, 'Muhammad', 'Muzammil', '03460329659', 'user85820.jpg', 1, 1, 1, 'Malir', 'Malir', 'Johar\r\nMateen Shopping Galaxy', NULL, NULL, '2022-01-24 06:23:06', '2024-07-26 05:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_post` varchar(255) DEFAULT NULL,
  `review` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `name`, `job_post`, `review`, `image`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Muzammil', 'Developer', 'lsjhlsahkldaslkdjslk\r\naskdjskdjsalkd', 'customer_review_image_5394025.jpeg', 1, '2024-08-08 05:42:39', '2024-08-08 05:46:54'),
(2, 'Muhammad Muzammil', 'Developer', 'sdljhsalhd\r\nhdklsahdlashld\r\ndjksadlksajd', 'customer_review_image_32556.jpeg', 1, '2024-08-08 05:48:02', '2024-08-08 05:48:02');

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
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `address`, `phone_1`, `phone_2`, `email`, `google`, `linkedin`, `twitter`, `facebook`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Saudia Arabia', '03460329659', NULL, 'info@lilac.com', NULL, NULL, NULL, 'https://www.facebook.com/', 'https://instagram.com/', NULL, '2024-08-09 02:20:11', '2024-08-09 05:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `condition` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `en_title_2` varchar(255) DEFAULT NULL,
  `ar_title_2` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `condition`, `image`, `en_title`, `ar_title`, `image_2`, `en_title_2`, `ar_title_2`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'home_banner_image_8008060.png', 'Explore For Latest Products', 'استكشاف للحصول على أحدث المنتجات', NULL, NULL, NULL, 1, '2024-08-02 06:59:38', '2024-08-05 00:57:07'),
(2, 2, 'home_banner_image_8638343.jpg', 'Explore For Latest Products', 'استكشاف للحصول على أحدث المنتجات', 'home_banner_image_7172024.jpg', 'Explore For Latest Products', 'استكشاف للحصول على أحدث المنتجات', 1, '2024-08-02 07:01:12', '2024-08-05 00:57:41'),
(3, 3, 'home_banner_image_6907860.png', 'Explore For Latest Products', 'استكشاف للحصول على أحدث المنتجات', NULL, NULL, NULL, 1, '2024-08-02 07:01:32', '2024-08-05 01:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"410c7d13-9ae2-4b7f-8d88-dafd1fb5645c\",\"displayName\":\"App\\\\Events\\\\SupportMsgSend\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:25:\\\"App\\\\Events\\\\SupportMsgSend\\\":2:{s:7:\\\"message\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\SupportChat\\\";s:2:\\\"id\\\";i:54;s:9:\\\"relations\\\";a:1:{i:0;s:4:\\\"user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"socket\\\";s:13:\\\"44790.6012173\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1720762656, 1720762656),
(2, 'default', '{\"uuid\":\"0587e164-fd0d-4814-92ec-1df957f93f29\",\"displayName\":\"App\\\\Events\\\\SupportMsgSend\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:25:\\\"App\\\\Events\\\\SupportMsgSend\\\":2:{s:7:\\\"message\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\SupportChat\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:1:{i:0;s:4:\\\"user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"socket\\\";s:11:\\\"44962.88329\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1720855356, 1720855356);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `table_name`, `table_id`, `title`, `keywords`, `description`, `url_slug`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Lilac', 'home, store, display,', 'home, store, display,', '/', '2024-08-21 05:52:53', '2024-08-21 05:52:53'),
(2, NULL, NULL, 'Shop', 'shop, store', 'shop', 'shop', '2024-08-21 05:54:23', '2024-08-21 05:55:41'),
(3, NULL, NULL, 'About', 'about, store', 'about', 'about', '2024-08-21 05:57:06', '2024-08-21 05:57:06'),
(4, NULL, NULL, 'Contact', 'contact, page', 'contact', 'contact', '2024-08-21 05:57:50', '2024-08-21 05:57:50'),
(5, 'categories', 1, 'Cakes', 'category, cake', 'category, cake', 'cakes', '2024-08-21 06:00:21', '2024-08-21 06:00:21'),
(6, 'categories', 3, 'Traditional Sweets', 'Traditional Sweets', 'Traditional Sweets', 'traditional-sweets', '2024-08-21 06:00:43', '2024-08-21 06:00:43'),
(7, 'brands', 1, 'Saadeddin Sweet', 'Saadeddin Sweet', 'Saadeddin Sweet', 'saadeddin-sweet', '2024-08-21 06:01:08', '2024-08-21 06:01:08'),
(8, 'products', 9, 'admin vendor product', 'product, cake', 'product,, cake', 'admin-vendor-product', '2024-08-21 06:02:07', '2024-08-21 06:02:07');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_09_063413_create_permission_tables', 1),
(6, '2024_08_02_053519_create_sliders_table', 2),
(7, '2024_08_02_075324_create_home_banners_table', 3),
(8, '2024_08_05_065154_create_we_serve_provides_table', 4),
(9, '2024_08_05_100717_create_footers_table', 5),
(13, '2024_08_08_062534_create_abouts_table', 6),
(14, '2024_08_08_062559_create_customer_reviews_table', 6),
(15, '2024_08_08_062620_create_our_teams_table', 6),
(20, '2024_08_16_061847_create_page_visits_table', 7),
(21, '2024_08_16_061901_create_cart_actions_table', 7),
(22, '2024_08_21_064758_create_meta_tags_table', 8),
(24, '2024_08_22_061910_create_v_a_t_s_table', 9),
(25, '2024_09_05_100119_create_promotions_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48),
(2, 'App\\Models\\User', 49),
(2, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 52),
(3, 'App\\Models\\User', 54),
(3, 'App\\Models\\User', 55),
(3, 'App\\Models\\User', 56),
(3, 'App\\Models\\User', 57),
(3, 'App\\Models\\User', 58),
(3, 'App\\Models\\User', 70),
(3, 'App\\Models\\User', 71),
(3, 'App\\Models\\User', 73),
(4, 'App\\Models\\User', 62),
(5, 'App\\Models\\User', 59),
(5, 'App\\Models\\User', 60),
(5, 'App\\Models\\User', 61),
(5, 'App\\Models\\User', 63),
(10, 'App\\Models\\User', 64),
(10, 'App\\Models\\User', 65),
(10, 'App\\Models\\User', 66),
(10, 'App\\Models\\User', 67),
(10, 'App\\Models\\User', 68),
(10, 'App\\Models\\User', 69),
(10, 'App\\Models\\User', 72),
(10, 'App\\Models\\User', 74);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `total` varchar(255) NOT NULL,
  `shippingFee` varchar(255) DEFAULT NULL,
  `vat_value` varchar(255) DEFAULT '0',
  `vat_amount` varchar(255) DEFAULT '0',
  `total_amount` varchar(255) DEFAULT NULL,
  `total_weight` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `area_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `addedOn` varchar(255) DEFAULT NULL,
  `deliverdDate` varchar(255) DEFAULT NULL,
  `shipToAddress` varchar(255) DEFAULT NULL,
  `streetAddress` varchar(255) DEFAULT NULL,
  `buildingAddress` varchar(255) DEFAULT NULL,
  `billToAddress` varchar(255) DEFAULT NULL,
  `status_id` bigint(20) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `isPaid` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `contact_no` bigint(20) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `deliverySchedualDate` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `rider_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `latitude`, `longitude`, `total`, `shippingFee`, `vat_value`, `vat_amount`, `total_amount`, `total_weight`, `user_id`, `state_id`, `city_id`, `area_id`, `country_id`, `addedOn`, `deliverdDate`, `shipToAddress`, `streetAddress`, `buildingAddress`, `billToAddress`, `status_id`, `isActive`, `isPaid`, `deleted_at`, `created_at`, `updated_at`, `isDeleted`, `contact_no`, `firstName`, `lastName`, `contact`, `deliverySchedualDate`, `payment_method`, `rider_id`) VALUES
(23, 'fakir@gmail.com', NULL, NULL, '143', '200', '0', '0', '343', NULL, 0, 0, 1, 0, 1, NULL, NULL, 'asdfas', 'asdfa', 'asdf', NULL, 1, NULL, NULL, NULL, '2021-09-06 05:30:00', '2021-09-06 05:30:00', 0, NULL, 'fakir', 'zamaan', '00923221234567', '2021-09-05 19:00:00', 'COD', NULL),
(24, 'aftab@gmail.com', NULL, NULL, '400', '200', '0', '0', '600', NULL, 60, 0, 1, 0, 1, NULL, NULL, 'asdf', 'asdf', 'asdf', NULL, 1, NULL, NULL, NULL, '2021-09-06 05:35:29', '2021-09-06 05:35:29', 0, NULL, 'aftab', 'arzoo', '00923221234567', '2021-09-05 19:00:00', 'COD', NULL),
(26, 'aftab@gmail.com', NULL, NULL, '429', '200', '0', '0', '629', NULL, 60, 1, 1, 0, 1, NULL, NULL, '2222222', '2222222', '22222222', NULL, 1, NULL, NULL, NULL, '2021-10-12 01:01:53', '2021-10-12 01:01:53', 0, NULL, 'aftab2', 'arzoo', '00923221234567', '2021-10-11 19:00:00', 'COD', NULL),
(28, 'ali@gmail.com', NULL, NULL, '400', '200', '0', '0', '600', NULL, 60, 2, 7, 0, 1, NULL, NULL, '444444444', '4444444', '4444444', NULL, 3, NULL, NULL, NULL, '2021-10-12 01:14:44', '2021-10-14 06:43:35', 0, NULL, 'fakir', 'zamaan', '00923221234567', '2021-10-11 19:00:00', 'COD', NULL),
(29, 'ali@gmail.com', NULL, NULL, '200', '200', '0', '0', '400', NULL, 0, 0, 2, 0, 2, NULL, NULL, '555555555', '555555', '55555555', NULL, 1, NULL, NULL, NULL, '2021-10-12 01:16:23', '2021-10-12 01:16:23', 0, NULL, 'ffffff', 'ggggggg', '00923221234567', '2021-10-11 19:00:00', 'COD', NULL),
(30, 'ali@gmail.com', NULL, NULL, '968', '200', '0', '0', '1168', NULL, 0, 0, 7, 0, 1, NULL, NULL, '66666666666', '66666666', '66666666', NULL, 1, NULL, NULL, NULL, '2021-10-12 01:18:05', '2021-10-12 01:18:05', 0, NULL, 'tttttttt', 'yyyyyyyy', '00923221234567', '2021-10-11 19:00:00', 'COD', NULL),
(38, 'ali@gmail.com', NULL, NULL, '242', '200', '0', '0', '442', NULL, 0, 0, 1, 0, 1, NULL, NULL, 'rrrrrrr', 'rrrrrr', 'rrrrr', NULL, 1, NULL, NULL, NULL, '2021-10-12 05:40:06', '2021-10-12 05:40:06', 0, NULL, 'fakir', 'zamaan', '00923221234567', '2021-10-11 19:00:00', 'COD', NULL),
(39, 'muzammilken95@gmail.com', NULL, NULL, '143', '200', '0', '0', '343', NULL, 63, 1, 1, 0, 1, NULL, NULL, 'Johar\r\nMateen Shopping Galaxy', 'Johar\r\nMateen Shopping Galaxy', 'Shoppong galaxy', NULL, 1, NULL, NULL, NULL, '2022-01-24 06:25:04', '2022-01-24 06:25:04', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-01-24 19:00:00', 'COD', NULL),
(40, 'muzammilken95@gmail.com', NULL, NULL, '475', '200', '0', '0', '675', NULL, 63, 1, 1, 0, 1, NULL, NULL, 'Johar\r\nMateen Shopping Galaxy', 'Johar\r\nMateen Shopping Galaxy', 'Shopping', NULL, 1, NULL, NULL, NULL, '2022-01-31 04:41:51', '2022-01-31 04:41:51', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-01-31 19:00:00', 'COD', NULL),
(41, 'muzammilken95@gmail.com', NULL, NULL, '717', '200', '0', '0', '917', NULL, 63, 1, 1, 0, 1, NULL, NULL, 'Johar\r\nMateen Shopping Galaxy', 'Johar\r\nMateen Shopping Galaxy', 'Shoppoing', NULL, 1, NULL, NULL, NULL, '2022-02-02 05:21:39', '2022-02-02 05:21:39', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-02-02 19:00:00', 'COD', NULL),
(42, 'muzammilken95@gmail.com', NULL, NULL, '1043', '200', '0', '0', '1243', NULL, 63, 1, 1, 0, 1, NULL, NULL, 'Johar\r\nMateen Shopping Galaxy', 'Johar\r\nMateen Shopping Galaxy', 'ldsjfklds', NULL, 1, NULL, NULL, NULL, '2022-02-03 05:13:51', '2022-02-03 05:13:51', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-02-03 19:00:00', 'COD', NULL),
(43, 'muzammilken95@gmail.com', NULL, NULL, '1425', '50', '0', '0', '1475', '600', 0, 1, 1, 2, 1, NULL, NULL, 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'fdsfds', NULL, 1, NULL, NULL, NULL, '2022-03-03 02:04:50', '2022-03-03 02:04:50', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-03-02 19:00:00', 'COD', NULL),
(44, 'muzammilken95@gmail.com', NULL, NULL, '4125', '75', '0', '0', '4200', '1350', 0, 1, 1, 2, 1, NULL, NULL, 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'fhjdshjfkdsa', NULL, 1, NULL, NULL, NULL, '2022-03-03 02:07:20', '2022-03-03 02:07:20', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-03-02 19:00:00', 'COD', NULL),
(45, 'muzammilken95@gmail.com', NULL, NULL, '1617', '60', '0', '0', '1677', '950', 0, 1, 1, 5, 1, NULL, NULL, 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'efdsafa', NULL, 1, NULL, NULL, NULL, '2022-03-03 02:11:41', '2022-03-03 02:11:41', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-03-02 19:00:00', 'COD', NULL),
(46, 'muzammilken95@gmail.com', '24.9060121', '67.1115203', '1617', '50', '0', '0', '1667', '950', 63, 1, 1, 2, 1, NULL, '2022-05-27', 'Johar\r\nMateen Shopping Galaxy', 'Johar\r\nMateen Shopping Galaxy', 'fdsf', NULL, 5, NULL, NULL, NULL, '2022-03-03 02:25:41', '2022-05-27 06:57:33', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-05-26 19:00:00', 'COD', 69),
(47, 'muzammilken95@gmail.com', NULL, NULL, '242', '50', '0', '0', '292', '500', 63, 1, 1, 2, 1, NULL, NULL, 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'sdsad', NULL, 1, NULL, NULL, NULL, '2022-03-03 02:31:39', '2022-03-03 02:31:39', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-03-02 19:00:00', 'COD', NULL),
(48, 'muzammilken95@gmail.com', NULL, NULL, '242', '50', '0', '0', '292', '500', 63, 1, 1, 2, 1, NULL, '2022-05-30', 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'sdaas', NULL, 3, NULL, NULL, NULL, '2022-03-03 02:33:32', '2022-05-30 01:49:57', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-05-29 19:00:00', 'COD', NULL),
(49, 'muzammilken95@gmail.com', NULL, NULL, '2700', '50', '0', '0', '2750', '750', 63, 1, 1, 2, 1, NULL, NULL, 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'dfdsfsd', NULL, 1, NULL, NULL, NULL, '2022-03-03 05:24:26', '2022-03-03 05:24:26', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-03-03 19:00:00', 'COD', NULL),
(59, 'muzammilken95@gmail.com', NULL, NULL, '900', '50', '0', '0', '950', '250', 0, 1, 1, 2, 1, NULL, NULL, 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'lkkjl', NULL, 1, NULL, NULL, NULL, '2022-03-03 06:31:32', '2022-03-03 06:31:32', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-03-03 19:00:00', 'COD', NULL),
(60, 'muzammilken95@gmail.com', '24.9060121', '67.1115203', '900', '50', '0', '0', '950', '250', 0, 1, 1, 2, 1, NULL, '2022-05-27', 'House # A-2/77, A Area, Malir, Karachi', 'Johar\r\nMateen Shopping Galaxy', 'lkkjl', NULL, 5, NULL, NULL, NULL, '2022-03-03 06:33:07', '2022-05-27 02:06:41', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-05-26 19:00:00', 'COD', 69),
(61, 'muzammilken95@gmail.com', '24.9060121', '67.1115203', '475', '50', '0', '0', '525', '200', 0, 1, 1, 4, 1, NULL, NULL, 'Mateen Shopping Galaxy, Rashid Minhas Road Service Lane, Block 10-A Block 10 A Gulshan-e-Iqbal, Karachi, Pakistan', 'Johar\r\nMateen Shopping Galaxy', 'johar', NULL, 1, NULL, NULL, NULL, '2022-07-23 02:46:00', '2022-07-23 02:46:00', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-07-24 19:00:00', NULL, NULL),
(62, 'muzammilken95@gmail.com', '24.8452922', '67.1998241', '242', '60', '0', '0', '302', '500', 0, 1, 1, 5, 1, NULL, NULL, 'Party Fast Food And Ice Cream Palour, Landhi Road, Sector 37 B Landhi Town, Karachi, Pakistan', 'Johar\r\nMateen Shopping Galaxy', 'Party fast food', NULL, 1, NULL, NULL, NULL, '2022-07-23 02:47:28', '2022-07-23 02:47:28', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-07-26 19:00:00', NULL, NULL),
(63, 'muzammilken9@gmail.com', '24.8452922', '67.1998241', '143', '60', '0', '0', '203', '150', 63, 1, 1, 5, 1, NULL, NULL, 'Party Fast Food And Ice Cream Palour, Landhi Road, Sector 37 B Landhi Town, Karachi, Pakistan', 'Party fast food', 'party fast food', NULL, 3, NULL, NULL, NULL, '2022-07-23 02:58:22', '2022-07-29 02:32:00', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-08-03 19:00:00', NULL, NULL),
(64, 'muzammilken95@gmail.com', '24.8452922', '67.1998241', '900', NULL, '0', '0', '900', '250', 63, 1, 0, 0, 1, NULL, NULL, 'Party Fast Food And Ice Cream Palour, Landhi Road, Sector 37 B Landhi Town, Karachi, Pakistan', 'Johar\r\nMateen Shopping Galaxy', 'dklsjajdkls', NULL, 1, NULL, NULL, NULL, '2022-07-23 04:01:57', '2022-07-23 04:01:57', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', '2022-07-06 19:00:00', NULL, NULL),
(65, 'muzammilken95@gmail.com', NULL, NULL, '900', NULL, '0', '0', '900', '250', 0, 1, 1, 7, 1, NULL, NULL, 'Johar', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-07-30 02:27:58', '2024-07-30 02:27:58', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL),
(66, 'customer@gmail.com', NULL, NULL, '475', NULL, '0', '0', '475', '200', 63, 1, 1, 5, 1, NULL, NULL, 'JoharMateen Shopping Galaxy', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-07-30 02:33:29', '2024-07-30 02:33:29', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL),
(67, 'muzammilken95@gmail.com', NULL, NULL, '2144', NULL, '0', '0', '2144', '1505', 0, 1, 1, 2, 1, NULL, NULL, 'Johar', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-08-16 02:53:51', '2024-08-16 02:53:51', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL),
(68, 'muzammilken95@gmail.com', NULL, NULL, '2144', NULL, '0', '0', '2144', '1505', 0, 1, 1, 2, 1, NULL, NULL, 'Johar', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-08-16 02:55:42', '2024-08-16 02:55:42', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL),
(69, 'muzammilken95@gmail.com', NULL, NULL, '2144', NULL, '0', '0', '2144', '1505', 0, 1, 1, 2, 1, NULL, NULL, 'Johar', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-08-16 02:56:27', '2024-08-16 02:56:27', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL),
(70, 'muzammilken95@gmail.com', NULL, NULL, '3367', NULL, '15', '505.05', '3872.05', '1810', 63, 1, 1, 2, 1, NULL, NULL, 'Johar', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-08-22 05:49:31', '2024-08-22 05:49:31', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL),
(71, 'muzammilken95@gmail.com', NULL, NULL, '500', NULL, '15', '75', '575', '250', 0, 1, 1, 4, 1, NULL, NULL, 'Johar', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-09-07 00:45:09', '2024-09-07 00:45:09', 0, NULL, 'Muhammad', 'Muzammil', '03460329659', NULL, 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `qty` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `unit_weight` bigint(20) DEFAULT NULL,
  `total_weight` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `unit_price`, `qty`, `total_price`, `unit_weight`, `total_weight`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(23, 23, 5, 143.00, 1.00, 143.00, NULL, NULL, 1, NULL, '2021-09-06 05:30:00', '2021-09-06 05:30:00'),
(24, 24, 3, 200.00, 2.00, 400.00, NULL, NULL, 1, NULL, '2021-09-06 05:35:29', '2021-09-06 05:35:29'),
(26, 26, 5, 143.00, 3.00, 429.00, NULL, NULL, 1, NULL, '2021-10-12 01:01:53', '2021-10-12 01:01:53'),
(27, 28, 3, 200.00, 2.00, 400.00, NULL, NULL, 1, NULL, '2021-10-12 01:14:44', '2021-10-12 01:14:44'),
(28, 29, 3, 200.00, 1.00, 200.00, NULL, NULL, 1, NULL, '2021-10-12 01:16:23', '2021-10-12 01:16:23'),
(29, 30, 7, 242.00, 4.00, 968.00, NULL, NULL, 1, NULL, '2021-10-12 01:18:05', '2021-10-12 01:18:05'),
(30, 38, 7, 242.00, 1.00, 242.00, NULL, NULL, 1, NULL, '2021-10-12 05:40:06', '2021-10-12 05:40:06'),
(31, 39, 5, 143.00, 1.00, 143.00, NULL, NULL, 1, NULL, '2022-01-24 06:25:04', '2022-01-24 06:25:04'),
(32, 40, 8, 475.00, 1.00, 475.00, NULL, NULL, 2, NULL, '2022-01-31 04:41:51', '2022-02-02 02:56:25'),
(33, 41, 8, 475.00, 1.00, 475.00, NULL, NULL, 1, NULL, '2022-02-02 05:21:39', '2022-02-02 05:21:39'),
(34, 41, 7, 242.00, 1.00, 242.00, NULL, NULL, 2, NULL, '2022-02-02 05:21:39', '2022-02-02 06:29:51'),
(35, 42, 9, 900.00, 1.00, 900.00, NULL, NULL, 2, NULL, '2022-02-03 05:13:51', '2022-02-03 06:27:25'),
(36, 42, 5, 143.00, 1.00, 143.00, NULL, NULL, 2, NULL, '2022-02-03 05:13:51', '2022-02-03 05:58:50'),
(37, 43, 8, 475.00, 3.00, 1425.00, 200, 600, 1, NULL, '2022-03-03 02:04:50', '2022-03-03 02:04:50'),
(38, 44, 8, 475.00, 3.00, 1425.00, 200, 600, 1, NULL, '2022-03-03 02:07:20', '2022-03-03 02:07:20'),
(39, 44, 9, 900.00, 3.00, 2700.00, 250, 750, 1, NULL, '2022-03-03 02:07:20', '2022-03-03 02:07:20'),
(40, 45, 7, 242.00, 1.00, 242.00, 500, 500, 1, NULL, '2022-03-03 02:11:41', '2022-03-03 02:11:41'),
(41, 45, 8, 475.00, 1.00, 475.00, 200, 200, 1, NULL, '2022-03-03 02:11:41', '2022-03-03 02:11:41'),
(42, 45, 9, 900.00, 1.00, 900.00, 250, 250, 1, NULL, '2022-03-03 02:11:41', '2022-03-03 02:11:41'),
(43, 46, 7, 242.00, 1.00, 242.00, 500, 500, 5, NULL, '2022-03-03 02:25:41', '2022-05-27 06:57:33'),
(44, 46, 8, 475.00, 1.00, 475.00, 200, 200, 5, NULL, '2022-03-03 02:25:41', '2022-05-27 06:57:33'),
(45, 46, 9, 900.00, 1.00, 900.00, 250, 250, 5, NULL, '2022-03-03 02:25:41', '2022-05-27 06:57:33'),
(46, 47, 7, 242.00, 1.00, 242.00, 500, 500, 1, NULL, '2022-03-03 02:31:39', '2022-03-03 02:31:39'),
(47, 48, 7, 242.00, 1.00, 242.00, 500, 500, 3, NULL, '2022-03-03 02:33:32', '2022-05-30 01:49:57'),
(48, 49, 9, 900.00, 3.00, 2700.00, 250, 750, 1, NULL, '2022-03-03 05:24:26', '2022-03-03 05:24:26'),
(59, 59, 9, 900.00, 1.00, 900.00, 250, 250, 1, NULL, '2022-03-03 06:31:32', '2022-03-03 06:31:32'),
(60, 60, 9, 900.00, 1.00, 900.00, 250, 250, 5, NULL, '2022-03-03 06:33:07', '2022-05-27 02:06:41'),
(61, 61, 8, 475.00, 1.00, 475.00, 200, 200, 1, NULL, '2022-07-23 02:46:00', '2022-07-23 02:46:00'),
(62, 62, 7, 242.00, 1.00, 242.00, 500, 500, 1, NULL, '2022-07-23 02:47:28', '2022-07-23 02:47:28'),
(63, 63, 5, 143.00, 1.00, 143.00, 150, 150, 3, NULL, '2022-07-23 02:58:22', '2022-07-29 02:32:06'),
(64, 64, 9, 900.00, 1.00, 900.00, 250, 250, 1, NULL, '2022-07-23 04:01:57', '2022-07-23 04:01:57'),
(65, 65, 9, 900.00, 1.00, 900.00, 250, 250, 1, NULL, '2024-07-30 02:27:58', '2024-07-30 02:27:58'),
(66, 66, 8, 475.00, 1.00, 475.00, 200, 200, 1, NULL, '2024-07-30 02:33:29', '2024-07-30 02:33:29'),
(67, 67, 10, 527.00, 1.00, 527.00, 555, 555, 1, NULL, '2024-08-16 02:53:51', '2024-08-16 02:53:51'),
(68, 68, 10, 527.00, 1.00, 527.00, 555, 555, 1, NULL, '2024-08-16 02:55:42', '2024-08-16 02:55:42'),
(69, 69, 10, 527.00, 1.00, 527.00, 555, 555, 1, NULL, '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(70, 69, 9, 900.00, 1.00, 900.00, 250, 250, 1, NULL, '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(71, 69, 8, 475.00, 1.00, 475.00, 200, 200, 1, NULL, '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(72, 69, 7, 242.00, 1.00, 242.00, 500, 500, 1, NULL, '2024-08-16 02:56:27', '2024-08-16 02:56:27'),
(73, 70, 9, 900.00, 2.00, 1800.00, 250, 500, 1, NULL, '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(74, 70, 8, 475.00, 1.00, 475.00, 200, 200, 1, NULL, '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(75, 70, 10, 527.00, 1.00, 527.00, 555, 555, 1, NULL, '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(76, 70, 12, 565.00, 1.00, 565.00, 555, 555, 1, NULL, '2024-08-22 05:49:31', '2024-08-22 05:49:31'),
(77, 71, 9, 500.00, 1.00, 500.00, 250, 250, 1, NULL, '2024-09-07 00:45:09', '2024-09-07 00:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `our_teams`
--

CREATE TABLE `our_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_post` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_teams`
--

INSERT INTO `our_teams` (`id`, `name`, `job_post`, `image`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Muzammil', 'Developer', 'our_team_image_1762072.jpeg', 1, '2024-08-08 05:21:17', '2024-08-08 05:21:43'),
(2, 'Muhammad Muzammil', 'Developer', 'our_team_image_158945.jpeg', 1, '2024-08-08 05:22:00', '2024-08-08 05:22:00'),
(3, 'Muhammad Muzammil', 'Developer', 'our_team_image_2517605.jpeg', 1, '2024-08-08 05:22:17', '2024-08-08 05:22:17'),
(4, 'Muhammad Muzammil', 'Developer', 'our_team_image_5921059.jpeg', 1, '2024-08-08 05:23:08', '2024-08-08 05:23:08'),
(5, 'Muhammad Muzammil', 'Developer', 'our_team_image_3624983.jpeg', 1, '2024-08-08 05:23:24', '2024-08-08 05:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `page_visits`
--

CREATE TABLE `page_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT 0,
  `vendor_id` int(11) DEFAULT 0,
  `deal_id` int(11) DEFAULT 0,
  `country` varchar(255) DEFAULT NULL,
  `date_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_visits`
--

INSERT INTO `page_visits` (`id`, `user_ip`, `page`, `product_id`, `vendor_id`, `deal_id`, `country`, `date_time`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:03', '2024-08-17 01:01:03'),
(2, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:21', '2024-08-17 01:01:21'),
(3, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:22', '2024-08-17 01:01:22'),
(4, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:23', '2024-08-17 01:01:23'),
(5, '127.0.0.1', 'Register', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:25', '2024-08-17 01:01:25'),
(6, '127.0.0.1', 'Login', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:27', '2024-08-17 01:01:27'),
(7, '127.0.0.1', 'Wishlist', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:28', '2024-08-17 01:01:28'),
(8, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:32', '2024-08-17 01:01:32'),
(9, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:33', '2024-08-17 01:01:33'),
(10, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:39', '2024-08-17 01:01:39'),
(11, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:40', '2024-08-17 01:01:40'),
(12, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:43', '2024-08-17 01:01:43'),
(13, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:44', '2024-08-17 01:01:44'),
(14, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:48', '2024-08-17 01:01:48'),
(15, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:49', '2024-08-17 01:01:49'),
(16, '127.0.0.1', 'Product Detail', 7, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:55', '2024-08-17 01:01:55'),
(17, '127.0.0.1', 'Product Detail', 8, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:58', '2024-08-17 01:01:58'),
(18, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-17 06:01 AM', '2024-08-17 01:01:58', '2024-08-17 01:01:58'),
(19, '127.0.0.1', 'Product Detail', 10, 0, 0, NULL, '2024-08-17 06:02 AM', '2024-08-17 01:02:00', '2024-08-17 01:02:00'),
(20, '127.0.0.1', 'Product Detail', 12, 0, 0, NULL, '2024-08-17 06:02 AM', '2024-08-17 01:02:01', '2024-08-17 01:02:01'),
(21, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-17 06:02 AM', '2024-08-17 01:02:06', '2024-08-17 01:02:06'),
(22, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-17 07:56 AM', '2024-08-17 02:56:10', '2024-08-17 02:56:10'),
(23, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-17 07:57 AM', '2024-08-17 02:57:04', '2024-08-17 02:57:04'),
(24, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-17 07:57 AM', '2024-08-17 02:57:12', '2024-08-17 02:57:12'),
(25, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:02 AM', '2024-08-21 06:02:30', '2024-08-21 06:02:30'),
(26, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:13 AM', '2024-08-21 06:13:00', '2024-08-21 06:13:00'),
(27, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:01', '2024-08-21 06:14:01'),
(28, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:02', '2024-08-21 06:14:02'),
(29, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:03', '2024-08-21 06:14:03'),
(30, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:42', '2024-08-21 06:14:42'),
(31, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:43', '2024-08-21 06:14:43'),
(32, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:43', '2024-08-21 06:14:43'),
(33, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:14 AM', '2024-08-21 06:14:44', '2024-08-21 06:14:44'),
(34, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:14', '2024-08-21 06:15:14'),
(35, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:15', '2024-08-21 06:15:15'),
(36, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:15', '2024-08-21 06:15:15'),
(37, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:16', '2024-08-21 06:15:16'),
(38, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:23', '2024-08-21 06:15:23'),
(39, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:24', '2024-08-21 06:15:24'),
(40, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:25', '2024-08-21 06:15:25'),
(41, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:15 AM', '2024-08-21 06:15:26', '2024-08-21 06:15:26'),
(42, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:17', '2024-08-21 06:16:17'),
(43, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:18', '2024-08-21 06:16:18'),
(44, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:19', '2024-08-21 06:16:19'),
(45, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:20', '2024-08-21 06:16:20'),
(46, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:30', '2024-08-21 06:16:30'),
(47, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:31', '2024-08-21 06:16:31'),
(48, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:32', '2024-08-21 06:16:32'),
(49, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:16 AM', '2024-08-21 06:16:32', '2024-08-21 06:16:32'),
(50, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:17 AM', '2024-08-21 06:17:06', '2024-08-21 06:17:06'),
(51, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:17 AM', '2024-08-21 06:17:07', '2024-08-21 06:17:07'),
(52, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:17 AM', '2024-08-21 06:17:07', '2024-08-21 06:17:07'),
(53, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:17 AM', '2024-08-21 06:17:08', '2024-08-21 06:17:08'),
(54, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:17 AM', '2024-08-21 06:17:49', '2024-08-21 06:17:49'),
(55, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:18 AM', '2024-08-21 06:18:23', '2024-08-21 06:18:23'),
(56, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:18 AM', '2024-08-21 06:18:24', '2024-08-21 06:18:24'),
(57, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:18 AM', '2024-08-21 06:18:24', '2024-08-21 06:18:24'),
(58, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:18 AM', '2024-08-21 06:18:25', '2024-08-21 06:18:25'),
(59, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:20 AM', '2024-08-21 06:20:00', '2024-08-21 06:20:00'),
(60, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:20 AM', '2024-08-21 06:20:06', '2024-08-21 06:20:06'),
(61, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:21 AM', '2024-08-21 06:21:09', '2024-08-21 06:21:09'),
(62, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:21 AM', '2024-08-21 06:21:25', '2024-08-21 06:21:25'),
(63, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:22 AM', '2024-08-21 06:22:12', '2024-08-21 06:22:12'),
(64, '127.0.0.1', 'About', 0, 0, 0, NULL, '2024-08-21 11:22 AM', '2024-08-21 06:22:23', '2024-08-21 06:22:23'),
(65, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-21 11:22 AM', '2024-08-21 06:22:28', '2024-08-21 06:22:28'),
(66, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:22 AM', '2024-08-21 06:22:33', '2024-08-21 06:22:33'),
(67, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:22 AM', '2024-08-21 06:22:40', '2024-08-21 06:22:40'),
(68, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:35 AM', '2024-08-21 06:35:25', '2024-08-21 06:35:25'),
(69, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:35 AM', '2024-08-21 06:35:33', '2024-08-21 06:35:33'),
(70, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:35 AM', '2024-08-21 06:35:57', '2024-08-21 06:35:57'),
(71, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-21 11:36 AM', '2024-08-21 06:36:21', '2024-08-21 06:36:21'),
(72, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-21 11:36 AM', '2024-08-21 06:36:24', '2024-08-21 06:36:24'),
(73, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:36 AM', '2024-08-21 06:36:36', '2024-08-21 06:36:36'),
(74, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:36 AM', '2024-08-21 06:36:55', '2024-08-21 06:36:55'),
(75, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:43 AM', '2024-08-21 06:43:12', '2024-08-21 06:43:12'),
(76, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:43 AM', '2024-08-21 06:43:49', '2024-08-21 06:43:49'),
(77, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:44 AM', '2024-08-21 06:44:19', '2024-08-21 06:44:19'),
(78, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:45 AM', '2024-08-21 06:45:11', '2024-08-21 06:45:11'),
(79, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:45 AM', '2024-08-21 06:45:24', '2024-08-21 06:45:24'),
(80, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:46 AM', '2024-08-21 06:46:00', '2024-08-21 06:46:00'),
(81, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:46 AM', '2024-08-21 06:46:29', '2024-08-21 06:46:29'),
(82, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:46 AM', '2024-08-21 06:46:43', '2024-08-21 06:46:43'),
(83, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:46 AM', '2024-08-21 06:46:59', '2024-08-21 06:46:59'),
(84, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:47 AM', '2024-08-21 06:47:06', '2024-08-21 06:47:06'),
(85, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-08-21 11:47 AM', '2024-08-21 06:47:21', '2024-08-21 06:47:21'),
(86, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-21 11:47 AM', '2024-08-21 06:47:34', '2024-08-21 06:47:34'),
(87, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 04:32 AM', '2024-08-21 23:32:45', '2024-08-21 23:32:45'),
(88, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 07:28 AM', '2024-08-22 02:28:35', '2024-08-22 02:28:35'),
(89, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 07:34 AM', '2024-08-22 02:34:05', '2024-08-22 02:34:05'),
(90, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 07:34 AM', '2024-08-22 02:34:16', '2024-08-22 02:34:16'),
(91, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 07:38 AM', '2024-08-22 02:38:05', '2024-08-22 02:38:05'),
(92, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 07:38 AM', '2024-08-22 02:38:17', '2024-08-22 02:38:17'),
(93, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 07:39 AM', '2024-08-22 02:39:36', '2024-08-22 02:39:36'),
(94, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 07:43 AM', '2024-08-22 02:43:21', '2024-08-22 02:43:21'),
(95, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 07:43 AM', '2024-08-22 02:43:33', '2024-08-22 02:43:33'),
(96, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 07:43 AM', '2024-08-22 02:43:47', '2024-08-22 02:43:47'),
(97, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 07:56 AM', '2024-08-22 02:56:56', '2024-08-22 02:56:56'),
(98, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 07:57 AM', '2024-08-22 02:57:42', '2024-08-22 02:57:42'),
(99, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 07:59 AM', '2024-08-22 02:59:16', '2024-08-22 02:59:16'),
(100, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 08:00 AM', '2024-08-22 03:00:54', '2024-08-22 03:00:54'),
(101, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 08:02 AM', '2024-08-22 03:02:03', '2024-08-22 03:02:03'),
(102, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:20 AM', '2024-08-22 04:20:36', '2024-08-22 04:20:36'),
(103, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:21 AM', '2024-08-22 04:21:05', '2024-08-22 04:21:05'),
(104, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:22 AM', '2024-08-22 04:22:21', '2024-08-22 04:22:21'),
(105, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 09:22 AM', '2024-08-22 04:22:35', '2024-08-22 04:22:35'),
(106, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 09:23 AM', '2024-08-22 04:23:25', '2024-08-22 04:23:25'),
(107, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:30 AM', '2024-08-22 04:30:35', '2024-08-22 04:30:35'),
(108, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:30 AM', '2024-08-22 04:30:52', '2024-08-22 04:30:52'),
(109, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:32 AM', '2024-08-22 04:32:49', '2024-08-22 04:32:49'),
(110, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:33 AM', '2024-08-22 04:33:08', '2024-08-22 04:33:08'),
(111, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:39 AM', '2024-08-22 04:39:56', '2024-08-22 04:39:56'),
(112, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 09:40 AM', '2024-08-22 04:40:10', '2024-08-22 04:40:10'),
(113, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:40 AM', '2024-08-22 04:40:11', '2024-08-22 04:40:11'),
(114, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 09:40 AM', '2024-08-22 04:40:57', '2024-08-22 04:40:57'),
(115, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:41 AM', '2024-08-22 04:41:14', '2024-08-22 04:41:14'),
(116, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:41 AM', '2024-08-22 04:41:43', '2024-08-22 04:41:43'),
(117, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:41 AM', '2024-08-22 04:41:51', '2024-08-22 04:41:51'),
(118, '127.0.0.1', 'Product Detail', 12, 0, 0, NULL, '2024-08-22 09:42 AM', '2024-08-22 04:42:08', '2024-08-22 04:42:08'),
(119, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:42 AM', '2024-08-22 04:42:19', '2024-08-22 04:42:19'),
(120, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:42 AM', '2024-08-22 04:42:39', '2024-08-22 04:42:39'),
(121, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-08-22 09:42 AM', '2024-08-22 04:42:53', '2024-08-22 04:42:53'),
(122, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:45 AM', '2024-08-22 04:45:06', '2024-08-22 04:45:06'),
(123, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 09:46 AM', '2024-08-22 04:46:50', '2024-08-22 04:46:50'),
(124, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 09:47 AM', '2024-08-22 04:47:07', '2024-08-22 04:47:07'),
(125, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-08-22 10:00 AM', '2024-08-22 05:00:09', '2024-08-22 05:00:09'),
(126, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 10:00 AM', '2024-08-22 05:00:34', '2024-08-22 05:00:34'),
(127, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 10:02 AM', '2024-08-22 05:02:17', '2024-08-22 05:02:17'),
(128, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 10:27 AM', '2024-08-22 05:27:58', '2024-08-22 05:27:58'),
(129, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 10:28 AM', '2024-08-22 05:28:57', '2024-08-22 05:28:57'),
(130, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 10:45 AM', '2024-08-22 05:45:32', '2024-08-22 05:45:32'),
(131, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-08-22 10:48 AM', '2024-08-22 05:48:36', '2024-08-22 05:48:36'),
(132, '127.0.0.1', 'Order Placed', 0, 0, 0, NULL, '2024-08-22 10:49 AM', '2024-08-22 05:49:32', '2024-08-22 05:49:32'),
(133, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 10:59 AM', '2024-08-22 05:59:39', '2024-08-22 05:59:39'),
(134, '127.0.0.1', 'Login', 0, 0, 0, NULL, '2024-08-22 10:59 AM', '2024-08-22 05:59:51', '2024-08-22 05:59:51'),
(135, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-22 11:00 AM', '2024-08-22 06:00:05', '2024-08-22 06:00:05'),
(136, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 08:57 AM', '2024-08-26 03:57:21', '2024-08-26 03:57:21'),
(137, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:17 AM', '2024-08-26 04:17:06', '2024-08-26 04:17:06'),
(138, '127.0.0.1', 'Contact', 0, 0, 0, NULL, '2024-08-26 09:26 AM', '2024-08-26 04:26:37', '2024-08-26 04:26:37'),
(139, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:34 AM', '2024-08-26 04:34:18', '2024-08-26 04:34:18'),
(140, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:35 AM', '2024-08-26 04:35:57', '2024-08-26 04:35:57'),
(141, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:36 AM', '2024-08-26 04:36:43', '2024-08-26 04:36:43'),
(142, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:42 AM', '2024-08-26 04:42:45', '2024-08-26 04:42:45'),
(143, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:42 AM', '2024-08-26 04:42:47', '2024-08-26 04:42:47'),
(144, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:45 AM', '2024-08-26 04:45:09', '2024-08-26 04:45:09'),
(145, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:46 AM', '2024-08-26 04:46:00', '2024-08-26 04:46:00'),
(146, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:49 AM', '2024-08-26 04:49:17', '2024-08-26 04:49:17'),
(147, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:49 AM', '2024-08-26 04:49:28', '2024-08-26 04:49:28'),
(148, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:52 AM', '2024-08-26 04:52:21', '2024-08-26 04:52:21'),
(149, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:53 AM', '2024-08-26 04:53:56', '2024-08-26 04:53:56'),
(150, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:54 AM', '2024-08-26 04:54:55', '2024-08-26 04:54:55'),
(151, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 09:55 AM', '2024-08-26 04:55:34', '2024-08-26 04:55:34'),
(152, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:02 AM', '2024-08-26 05:02:45', '2024-08-26 05:02:45'),
(153, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:03 AM', '2024-08-26 05:03:45', '2024-08-26 05:03:45'),
(154, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:05 AM', '2024-08-26 05:05:00', '2024-08-26 05:05:00'),
(155, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:05 AM', '2024-08-26 05:05:47', '2024-08-26 05:05:47'),
(156, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:07 AM', '2024-08-26 05:07:43', '2024-08-26 05:07:43'),
(157, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:08 AM', '2024-08-26 05:08:19', '2024-08-26 05:08:19'),
(158, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:08 AM', '2024-08-26 05:08:56', '2024-08-26 05:08:56'),
(159, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:08 AM', '2024-08-26 05:08:58', '2024-08-26 05:08:58'),
(160, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:09 AM', '2024-08-26 05:09:07', '2024-08-26 05:09:07'),
(161, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:09 AM', '2024-08-26 05:09:44', '2024-08-26 05:09:44'),
(162, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:10 AM', '2024-08-26 05:10:58', '2024-08-26 05:10:58'),
(163, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:11 AM', '2024-08-26 05:11:04', '2024-08-26 05:11:04'),
(164, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:11 AM', '2024-08-26 05:11:18', '2024-08-26 05:11:18'),
(165, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:11 AM', '2024-08-26 05:11:37', '2024-08-26 05:11:37'),
(166, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:13 AM', '2024-08-26 05:13:35', '2024-08-26 05:13:35'),
(167, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:13 AM', '2024-08-26 05:13:43', '2024-08-26 05:13:43'),
(168, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:13 AM', '2024-08-26 05:13:56', '2024-08-26 05:13:56'),
(169, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:14 AM', '2024-08-26 05:14:06', '2024-08-26 05:14:06'),
(170, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:15 AM', '2024-08-26 05:15:52', '2024-08-26 05:15:52'),
(171, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:17 AM', '2024-08-26 05:17:19', '2024-08-26 05:17:19'),
(172, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:17 AM', '2024-08-26 05:17:40', '2024-08-26 05:17:40'),
(173, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:17 AM', '2024-08-26 05:17:48', '2024-08-26 05:17:48'),
(174, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:18 AM', '2024-08-26 05:18:00', '2024-08-26 05:18:00'),
(175, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:20 AM', '2024-08-26 05:20:42', '2024-08-26 05:20:42'),
(176, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-08-26 10:23 AM', '2024-08-26 05:23:16', '2024-08-26 05:23:16'),
(177, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-04 04:38 AM', '2024-09-03 23:38:25', '2024-09-03 23:38:25'),
(178, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 05:51 AM', '2024-09-05 00:51:04', '2024-09-05 00:51:04'),
(179, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 05:52 AM', '2024-09-05 00:52:17', '2024-09-05 00:52:17'),
(180, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 05:57 AM', '2024-09-05 00:57:49', '2024-09-05 00:57:49'),
(181, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 05:58 AM', '2024-09-05 00:58:32', '2024-09-05 00:58:32'),
(182, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 05:59 AM', '2024-09-05 00:59:05', '2024-09-05 00:59:05'),
(183, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 06:00 AM', '2024-09-05 01:00:10', '2024-09-05 01:00:10'),
(184, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 06:15 AM', '2024-09-05 01:15:26', '2024-09-05 01:15:26'),
(185, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 09:11 AM', '2024-09-05 04:11:51', '2024-09-05 04:11:51'),
(186, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 09:13 AM', '2024-09-05 04:13:47', '2024-09-05 04:13:47'),
(187, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 09:14 AM', '2024-09-05 04:14:10', '2024-09-05 04:14:10'),
(188, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 09:14 AM', '2024-09-05 04:14:44', '2024-09-05 04:14:44'),
(189, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-05 09:15 AM', '2024-09-05 04:15:38', '2024-09-05 04:15:38'),
(190, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 09:28 AM', '2024-09-05 04:28:57', '2024-09-05 04:28:57'),
(191, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 09:29 AM', '2024-09-05 04:29:57', '2024-09-05 04:29:57'),
(192, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 09:30 AM', '2024-09-05 04:30:26', '2024-09-05 04:30:26'),
(193, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 09:31 AM', '2024-09-05 04:31:02', '2024-09-05 04:31:02'),
(194, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 09:32 AM', '2024-09-05 04:32:37', '2024-09-05 04:32:37'),
(195, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-05 09:33 AM', '2024-09-05 04:33:15', '2024-09-05 04:33:15'),
(196, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 07:46 AM', '2024-09-06 02:46:18', '2024-09-06 02:46:18'),
(197, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 09:58 AM', '2024-09-06 04:58:53', '2024-09-06 04:58:53'),
(198, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:00 AM', '2024-09-06 05:00:07', '2024-09-06 05:00:07'),
(199, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:19 AM', '2024-09-06 05:19:49', '2024-09-06 05:19:49'),
(200, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:20 AM', '2024-09-06 05:20:11', '2024-09-06 05:20:11'),
(201, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:21 AM', '2024-09-06 05:21:39', '2024-09-06 05:21:39'),
(202, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:22 AM', '2024-09-06 05:22:20', '2024-09-06 05:22:20'),
(203, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:23 AM', '2024-09-06 05:23:07', '2024-09-06 05:23:07'),
(204, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:23 AM', '2024-09-06 05:23:26', '2024-09-06 05:23:26'),
(205, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:25 AM', '2024-09-06 05:25:12', '2024-09-06 05:25:12'),
(206, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:30 AM', '2024-09-06 05:30:53', '2024-09-06 05:30:53'),
(207, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:31 AM', '2024-09-06 05:31:34', '2024-09-06 05:31:34'),
(208, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:35 AM', '2024-09-06 05:35:58', '2024-09-06 05:35:58'),
(209, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:36 AM', '2024-09-06 05:36:13', '2024-09-06 05:36:13'),
(210, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:37 AM', '2024-09-06 05:37:16', '2024-09-06 05:37:16'),
(211, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:38 AM', '2024-09-06 05:38:15', '2024-09-06 05:38:15'),
(212, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:38 AM', '2024-09-06 05:38:49', '2024-09-06 05:38:49'),
(213, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:39 AM', '2024-09-06 05:39:34', '2024-09-06 05:39:34'),
(214, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:41 AM', '2024-09-06 05:41:13', '2024-09-06 05:41:13'),
(215, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 10:41 AM', '2024-09-06 05:41:31', '2024-09-06 05:41:31'),
(216, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:56 AM', '2024-09-06 05:56:00', '2024-09-06 05:56:00'),
(217, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 10:57 AM', '2024-09-06 05:57:34', '2024-09-06 05:57:34'),
(218, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:00 AM', '2024-09-06 06:00:09', '2024-09-06 06:00:09'),
(219, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:01 AM', '2024-09-06 06:01:10', '2024-09-06 06:01:10'),
(220, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:01 AM', '2024-09-06 06:01:57', '2024-09-06 06:01:57'),
(221, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:04 AM', '2024-09-06 06:04:14', '2024-09-06 06:04:14'),
(222, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:04 AM', '2024-09-06 06:04:52', '2024-09-06 06:04:52'),
(223, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:06 AM', '2024-09-06 06:06:16', '2024-09-06 06:06:16'),
(224, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:07 AM', '2024-09-06 06:07:45', '2024-09-06 06:07:45'),
(225, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:08 AM', '2024-09-06 06:08:56', '2024-09-06 06:08:56'),
(226, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:09 AM', '2024-09-06 06:09:22', '2024-09-06 06:09:22'),
(227, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:19 AM', '2024-09-06 06:19:58', '2024-09-06 06:19:58'),
(228, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:20 AM', '2024-09-06 06:20:21', '2024-09-06 06:20:21'),
(229, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:28 AM', '2024-09-06 06:28:37', '2024-09-06 06:28:37'),
(230, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:31 AM', '2024-09-06 06:31:26', '2024-09-06 06:31:26'),
(231, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:36 AM', '2024-09-06 06:36:25', '2024-09-06 06:36:25'),
(232, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:36 AM', '2024-09-06 06:36:51', '2024-09-06 06:36:51'),
(233, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:38 AM', '2024-09-06 06:38:09', '2024-09-06 06:38:09'),
(234, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:38 AM', '2024-09-06 06:38:23', '2024-09-06 06:38:23'),
(235, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-09-06 11:38 AM', '2024-09-06 06:38:48', '2024-09-06 06:38:48'),
(236, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-09-06 11:39 AM', '2024-09-06 06:39:04', '2024-09-06 06:39:04'),
(237, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:39 AM', '2024-09-06 06:39:15', '2024-09-06 06:39:15'),
(238, '127.0.0.1', 'Product Detail', 7, 0, 0, NULL, '2024-09-06 11:39 AM', '2024-09-06 06:39:50', '2024-09-06 06:39:50'),
(239, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:40 AM', '2024-09-06 06:40:26', '2024-09-06 06:40:26'),
(240, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:43 AM', '2024-09-06 06:43:20', '2024-09-06 06:43:20'),
(241, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:44 AM', '2024-09-06 06:44:04', '2024-09-06 06:44:04'),
(242, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:44 AM', '2024-09-06 06:44:58', '2024-09-06 06:44:58'),
(243, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:45 AM', '2024-09-06 06:45:11', '2024-09-06 06:45:11'),
(244, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:47 AM', '2024-09-06 06:47:05', '2024-09-06 06:47:05'),
(245, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:48 AM', '2024-09-06 06:48:06', '2024-09-06 06:48:06'),
(246, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-06 11:48 AM', '2024-09-06 06:48:28', '2024-09-06 06:48:28'),
(247, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:48 AM', '2024-09-06 06:48:42', '2024-09-06 06:48:42'),
(248, '127.0.0.1', 'Product Detail', 8, 0, 0, NULL, '2024-09-06 11:48 AM', '2024-09-06 06:48:56', '2024-09-06 06:48:56'),
(249, '127.0.0.1', 'Product Detail', 8, 0, 0, NULL, '2024-09-06 11:49 AM', '2024-09-06 06:49:44', '2024-09-06 06:49:44'),
(250, '127.0.0.1', 'Product Detail', 8, 0, 0, NULL, '2024-09-06 11:50 AM', '2024-09-06 06:50:00', '2024-09-06 06:50:00'),
(251, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-06 11:53 AM', '2024-09-06 06:53:54', '2024-09-06 06:53:54'),
(252, '127.0.0.1', 'Product List', 0, 0, 0, NULL, '2024-09-06 11:54 AM', '2024-09-06 06:54:48', '2024-09-06 06:54:48'),
(253, '127.0.0.1', 'Product Detail', 8, 0, 0, NULL, '2024-09-06 11:55 AM', '2024-09-06 06:55:07', '2024-09-06 06:55:07'),
(254, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-07 04:38 AM', '2024-09-06 23:38:11', '2024-09-06 23:38:11'),
(255, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-07 04:41 AM', '2024-09-06 23:41:32', '2024-09-06 23:41:32'),
(256, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-07 04:44 AM', '2024-09-06 23:44:58', '2024-09-06 23:44:58'),
(257, '127.0.0.1', 'Product Detail', 9, 0, 0, NULL, '2024-09-07 04:48 AM', '2024-09-06 23:48:11', '2024-09-06 23:48:11'),
(258, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-07 04:53 AM', '2024-09-06 23:53:09', '2024-09-06 23:53:09'),
(259, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-07 05:40 AM', '2024-09-07 00:40:11', '2024-09-07 00:40:11'),
(260, '127.0.0.1', 'Home', 0, 0, 0, NULL, '2024-09-07 05:40 AM', '2024-09-07 00:40:34', '2024-09-07 00:40:34'),
(261, '127.0.0.1', 'Cart', 0, 0, 0, NULL, '2024-09-07 05:40 AM', '2024-09-07 00:40:46', '2024-09-07 00:40:46'),
(262, '127.0.0.1', 'Checkout', 0, 0, 0, NULL, '2024-09-07 05:42 AM', '2024-09-07 00:42:03', '2024-09-07 00:42:03'),
(263, '127.0.0.1', 'Order Placed', 0, 0, 0, NULL, '2024-09-07 05:45 AM', '2024-09-07 00:45:09', '2024-09-07 00:45:09');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_units`
--

CREATE TABLE `price_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_units`
--

INSERT INTO `price_units` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-08-21 02:17:08', '2021-08-21 02:17:08'),
(2, '2021-08-21 02:18:17', '2021-08-21 02:18:17'),
(4, '2021-08-21 02:19:45', '2021-08-21 02:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `price_unit_translates`
--

CREATE TABLE `price_unit_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_unit_id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_unit_translates`
--

INSERT INTO `price_unit_translates` (`id`, `price_unit_id`, `lang`, `name`, `code`, `shortName`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Rupees', 'PKR', 'PKR', 1, '2021-08-21 02:17:08', '2021-08-21 02:20:15'),
(2, 1, 'ar', 'روبية', 'PKR', 'PKR', 1, '2021-08-21 02:17:08', '2021-08-21 02:17:08'),
(3, 2, 'en', 'Saudi Riyal', 'SAR', 'SAR', 1, '2021-08-21 02:18:17', '2021-08-21 02:18:17'),
(4, 2, 'ar', 'الريال السعودي', 'ريال سعودي', 'ريال سعودي', 1, '2021-08-21 02:18:17', '2021-08-21 02:18:17'),
(7, 4, 'en', 'Canadian Dollar', 'CAD', 'CAD', 1, '2021-08-21 02:19:45', '2021-08-21 02:19:45'),
(8, 4, 'ar', 'الدولار الكندي', 'نذل - وغد', 'نذل - وغد', 1, '2021-08-21 02:19:45', '2021-08-21 02:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`) VALUES
(3, '2021-08-23 07:50:54', '2021-08-23 07:50:54'),
(5, '2021-08-25 01:53:16', '2021-08-25 01:53:16'),
(7, '2021-10-06 07:37:59', '2021-10-06 07:37:59'),
(8, '2022-01-26 05:49:19', '2022-01-26 05:49:19'),
(9, '2022-01-27 05:15:50', '2022-01-27 05:15:50'),
(10, '2022-10-19 05:09:35', '2022-10-19 05:09:35'),
(11, '2024-07-11 04:42:43', '2024-07-11 04:42:43'),
(12, '2024-07-11 04:51:31', '2024-07-11 04:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_cities`
--

CREATE TABLE `product_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cities`
--

INSERT INTO `product_cities` (`id`, `product_id`, `country_id`, `city_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 1, 50, '2021-09-29 06:33:48', '2021-09-29 06:33:48'),
(3, 3, 1, 7, 50, '2021-09-29 06:33:48', '2021-09-29 06:33:48'),
(4, 5, 2, 2, 1, '2021-09-29 06:33:48', '2021-09-29 06:33:48'),
(5, 5, 2, 4, 1, '2021-09-29 06:33:48', '2021-09-29 06:33:48'),
(7, 5, 1, 12, 1, '2021-09-30 05:21:44', '2021-09-30 05:21:44'),
(8, 5, 1, 1, 1, '2021-09-30 05:21:44', '2021-09-30 05:21:44'),
(9, 5, 2, 3, 1, '2021-09-30 05:21:44', '2021-09-30 05:21:44'),
(10, 7, 1, 1, 62, '2021-10-06 07:37:59', '2021-10-06 07:37:59'),
(11, 8, 1, 1, 50, '2022-01-26 05:49:19', '2022-01-26 05:49:19'),
(12, 9, 1, 1, 1, '2022-01-27 05:15:50', '2022-01-27 05:15:50'),
(13, 10, 1, 1, 1, '2022-10-19 05:09:35', '2022-10-19 05:09:35'),
(14, 12, 1, 1, 1, '2024-07-11 04:51:31', '2024-07-11 04:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `lang`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '', '25888.jpg', '2019-05-03 07:21:46', '2019-05-03 07:21:46'),
(2, 1, '', '82877.jpg', '2019-05-03 08:11:10', '2019-05-03 08:11:10'),
(3, 6, '', '32613.jpg', '2019-05-03 08:32:47', '2019-05-03 08:32:47'),
(4, 8, '', '49057.jpg', '2019-05-03 09:59:42', '2019-05-03 09:59:42'),
(5, 9, '', '86419.jpg', '2019-05-04 01:00:31', '2019-05-04 01:00:31'),
(7, 10, '', '17262.jpg', '2019-05-04 01:05:28', '2019-05-04 01:05:28'),
(26, 11, '', '65332.jpg', '2019-05-04 07:35:13', '2019-05-04 07:58:18'),
(27, 11, '', '28252.jpg', '2019-05-04 07:57:54', '2019-05-04 07:58:18'),
(28, 11, '', '65369.jpg', '2019-05-04 07:58:18', '2019-05-04 07:58:18'),
(33, 13, '', '94854.jpg', '2019-05-04 08:33:50', '2019-05-04 08:33:50'),
(35, 14, '', '7800.jpg', '2019-05-08 02:31:25', '2019-05-08 02:31:25'),
(36, 14, '', '53784.jpg', '2019-05-08 02:31:25', '2019-05-08 02:31:25'),
(37, 12, '', '40771.jpg', '2019-05-30 03:33:08', '2019-06-13 13:38:47'),
(38, 24, '', '53258.jpg', '2019-06-24 01:49:59', '2019-06-25 05:53:12'),
(39, 24, '', '11686.jpg', '2019-06-24 02:00:26', '2019-06-25 05:53:12'),
(40, 2, 'en', 'product18236.jpg', '2021-08-23 07:47:13', '2021-08-23 07:47:13'),
(41, 2, 'en', 'product28017.jpg', '2021-08-23 07:47:14', '2021-08-23 07:47:14'),
(42, 2, 'en', 'product69583.jpg', '2021-08-23 07:47:14', '2021-08-23 07:47:14'),
(43, 3, 'en', 'product11737.jpg', '2021-08-23 07:50:55', '2021-08-24 07:50:19'),
(45, 3, 'en', 'product87988.jpg', '2021-08-23 07:50:55', '2021-08-24 07:50:19'),
(46, 3, 'ar', 'product72423.jpg', '2021-08-23 07:50:56', '2021-08-24 07:52:16'),
(47, 3, 'ar', 'product7506.jpg', '2021-08-23 07:50:56', '2021-08-24 07:52:16'),
(48, 3, 'ar', 'product77986.jpg', '2021-08-23 07:50:56', '2021-08-24 07:52:16'),
(50, 5, 'en', 'product85913.jpg', '2021-08-25 01:53:17', '2021-08-25 02:12:28'),
(51, 5, 'en', 'product75442.jpg', '2021-08-25 01:53:17', '2021-08-25 02:12:28'),
(52, 5, 'en', 'product31324.jpg', '2021-08-25 01:53:18', '2021-08-25 02:12:28'),
(53, 5, 'ar', 'product53694.jpg', '2021-08-25 01:53:18', '2021-08-25 02:13:09'),
(54, 5, 'ar', 'product44373.jpg', '2021-08-25 01:53:18', '2021-08-25 02:13:09'),
(55, 5, 'ar', 'product84728.jpg', '2021-08-25 01:53:19', '2021-08-25 02:13:09'),
(56, 12, 'en', 'product96136.png', '2024-07-11 04:51:35', '2024-07-11 04:51:35'),
(57, 12, 'ar', 'product79148.png', '2024-07-11 04:51:36', '2024-07-11 04:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` varchar(255) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT 1,
  `isActive` tinyint(1) DEFAULT 1,
  `isDeleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `user_id`, `product_id`, `star`, `review`, `isApproved`, `isActive`, `isDeleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 61, 5, '3', NULL, 1, 1, 0, NULL, '2019-08-26 01:35:15', '2019-08-26 01:35:15'),
(3, 60, 5, '2.5', '12345', 1, 1, 0, NULL, '2021-10-11 07:05:55', '2021-10-11 07:05:55'),
(4, 60, 3, '1.5', 'bbbbbbbbbbbbbbbbb', 1, 1, 0, NULL, '2021-10-12 00:51:52', '2021-10-12 00:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT 1,
  `isActive` tinyint(1) DEFAULT 1,
  `isDeleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `comments`, `isApproved`, `isActive`, `isDeleted`, `created_at`, `updated_at`) VALUES
(2, 1, 21, 'This is awesome product.', 1, 1, 0, '2019-08-26 01:37:54', '2019-08-26 01:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_translates`
--

CREATE TABLE `product_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) UNSIGNED DEFAULT 0.00,
  `saleprice` decimal(8,2) UNSIGNED DEFAULT 0.00,
  `discount` varchar(255) DEFAULT NULL,
  `price_unit_id` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `product_unit_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isHotDeal` tinyint(1) NOT NULL DEFAULT 0,
  `isFeatured` tinyint(1) NOT NULL DEFAULT 0,
  `isTopOffer` tinyint(1) NOT NULL DEFAULT 0,
  `created_for` int(11) DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `promotion_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translates`
--

INSERT INTO `product_translates` (`id`, `product_id`, `lang`, `category_id`, `brand_id`, `name`, `code`, `price`, `saleprice`, `discount`, `price_unit_id`, `color`, `quantity`, `height`, `width`, `weight`, `product_unit_id`, `description`, `long_description`, `image`, `isHotDeal`, `isFeatured`, `isTopOffer`, `created_for`, `created_by`, `isActive`, `promotion_id`, `created_at`, `updated_at`) VALUES
(2, 3, 'en', 2, 1, 'dairy milk', 'drm', 200.00, NULL, NULL, 1, 'black', '5', '1.2', '1.2', '100', 5, 'sweet chocolate', 'sweet chocolate', '39751.jpg', 1, 1, 1, 1, 1, 1, 0, '2021-08-23 07:50:55', '2024-09-06 05:55:37'),
(3, 3, 'ar', 2, 1, 'الحليب الألبان', 'drm', 200.00, NULL, NULL, 1, 'أسود', '4', '1.2', '1.2', '100', 5, 'الشوكولاته الحلوة', 'الشوكولاته الحلوة', 'product63580.jpg', 1, 1, 1, 1, 1, 1, 0, '2021-08-23 07:50:56', '2024-09-06 05:55:37'),
(4, 5, 'en', 4, 4, 'red rose', 'rd', 150.00, 143.00, '5.00', 1, 'red', '8', '1.2', '1.2', '150', 5, 'red rose', 'red rose', 'product20616.jpg', 1, 1, 1, 50, 50, 1, 0, '2021-08-25 01:53:17', '2024-09-06 05:55:37'),
(5, 5, 'ar', 4, 4, 'وردة حمراء', 'rd', 150.00, 143.00, '5.00', 1, 'أحمر', '8', '1.2', '1.2', '150', 5, 'وردة حمراء', 'وردة حمراء', 'product5807.jpg', 1, 1, 1, 50, 50, 1, 0, '2021-08-25 01:53:18', '2024-09-06 05:55:37'),
(6, 7, 'en', 1, 1, 'aaaaa', 'aaaa', 345.00, 242.00, '30.00', 1, 'black', '3', '1.2', '1.2', '500', 1, 'asdf', 'asdf', 'product59988.jpg', 1, 0, 1, 58, 62, 1, 1, '2021-10-06 07:38:00', '2024-09-06 05:55:47'),
(7, 8, 'en', 1, 1, 'New test', 'cake', 500.00, 475.00, '5.00', 1, 'black and white', '10', '4', '8', '200', 1, 'test', 'testing', 'product53272.jpg', 1, 1, 1, 58, 50, 1, 1, '2022-01-26 05:49:22', '2024-09-06 05:55:47'),
(8, 8, 'ar', 1, 1, 'اختبار', 'اختبار', 500.00, 475.00, '5.00', 1, 'black and white', '10', '4', '8', '200', 1, 'test', 'testing', 'product55067.jpg', 1, 1, 1, 58, 50, 1, 1, '2022-01-26 05:49:25', '2024-09-06 05:55:47'),
(9, 9, 'en', 1, 1, 'admin vendor product', 'cake', 1000.00, 900.00, '10.00', 1, 'black and white', '1', '4', '8', '250', 1, 'admin side testing', 'اختبار الجانب المشرف', 'product98451.jpg', 1, 1, 1, 58, 1, 1, 1, '2022-01-27 05:15:51', '2024-09-06 05:55:47'),
(10, 9, 'ar', 1, 1, 'منتج بائع المشرف', 'كيك', 1000.00, 900.00, '10.00', 1, 'اسود و ابيض', '1', '4', '8', '250', 1, 'اختبار الجانب المشرف', 'اختبار الجانب المشرف', 'product10672.jpg', 1, 1, 1, 58, 1, 1, 1, '2022-01-27 05:15:52', '2024-09-06 05:55:47'),
(11, 10, 'en', 1, 1, 'Test', 'cake', 555.00, 527.00, '5.00', 1, 'black and white', '10', '4', '8', '555', 1, 'test', NULL, 'product52451.png', 1, 1, 0, 1, 1, 1, 1, '2022-10-19 05:09:37', '2024-09-06 05:55:47'),
(12, 10, 'ar', 1, 1, 'اختبار', 'كيك', 555.00, 527.00, '5.00', 1, 'black and white', '10', '4', '8', '555', 1, 'test', NULL, 'product95961.png', 1, 0, 1, 1, 1, 1, 1, '2022-10-19 05:09:38', '2024-09-06 05:55:47'),
(13, 12, 'en', 1, 8, 'Test P', NULL, 565.00, NULL, NULL, 1, NULL, NULL, NULL, NULL, '555', 1, 'fsdfds', NULL, 'product66068.png', 1, 0, 0, 1, 1, 1, 1, '2024-07-11 04:51:35', '2024-09-06 05:55:47'),
(14, 12, 'ar', 1, 8, 'Test P', NULL, 565.00, NULL, NULL, 1, NULL, NULL, NULL, NULL, '555', 1, 'fsdsfds', NULL, 'product6215.png', 1, 0, 0, 1, 1, 1, 1, '2024-07-11 04:51:35', '2024-09-06 05:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_units`
--

INSERT INTO `product_units` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-08-21 01:55:14', '2021-08-21 01:55:14'),
(2, '2021-08-21 02:08:15', '2021-08-21 02:08:15'),
(3, '2021-08-21 02:09:31', '2021-08-21 02:09:31'),
(5, '2021-08-21 02:12:44', '2021-08-21 02:12:44'),
(6, '2021-08-23 00:32:09', '2021-08-23 00:32:09'),
(7, '2021-08-23 00:32:53', '2021-08-23 00:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_unit_translates`
--

CREATE TABLE `product_unit_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_unit_id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_unit_translates`
--

INSERT INTO `product_unit_translates` (`id`, `product_unit_id`, `lang`, `name`, `code`, `shortName`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Pounds', 'LB', 'LB', 1, '2021-08-21 01:55:14', '2021-08-21 02:14:18'),
(2, 1, 'ar', 'جنيه أو رطل للوزن', 'رطل', 'رطل', 1, '2021-08-21 01:55:14', '2021-08-21 01:55:14'),
(3, 2, 'en', 'Kilogram', 'KG', 'KG', 1, '2021-08-21 02:08:15', '2021-08-21 02:08:15'),
(4, 2, 'ar', 'كيلوغرام', 'كلغ', 'كلغ', 1, '2021-08-21 02:08:15', '2021-08-21 02:08:15'),
(5, 3, 'en', 'Litter', 'LTR', 'LTR', 1, '2021-08-21 02:09:31', '2021-08-21 02:09:31'),
(6, 3, 'ar', 'قمامة', 'LTR', 'LTR', 1, '2021-08-21 02:09:31', '2021-08-21 02:09:31'),
(9, 5, 'en', 'Pieces', 'PCs', 'PCs', 1, '2021-08-21 02:12:44', '2021-08-21 02:12:44'),
(10, 5, 'ar', 'قطع', 'أجهزة الكمبيوتر', 'أجهزة الكمبيوتر', 1, '2021-08-21 02:12:44', '2021-08-21 02:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `amount`, `type`, `from_date`, `to_date`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Test', 50, 'Percentage', '2024-09-05', '2024-09-07', 1, '2024-09-05 05:43:26', '2024-09-05 05:48:21'),
(2, 'Test', 15, 'Percentage', '2024-09-01', '2024-09-07', 1, '2024-09-05 05:55:55', '2024-09-06 02:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `d_o_b` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `license_number` varchar(255) DEFAULT NULL,
  `license_expiry` varchar(255) DEFAULT NULL,
  `license_image` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_image` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_verified` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `country_id`, `state_id`, `city_id`, `user_id`, `unique_id`, `name`, `d_o_b`, `address`, `phone_1`, `phone_2`, `nationality`, `license_number`, `license_expiry`, `license_image`, `image`, `id_image`, `added_by`, `is_verified`, `status`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 69, 'Rider-3106', 'Muhammad Muzammil', '1996-11-05', 'Johar\r\nMateen Shopping Galaxy\r\n5th floor, fi-12', '03460329659', NULL, 'Pakistani', '1234-5678-90', '2022-05-31', 'license_image_222793.png', 'rider_image_4606113.jpg', 'id_image_4295154.jpg', 1, 'Yes', 'Available', 1, '2022-05-09 06:03:24', '2023-12-26 00:43:51'),
(2, 1, NULL, 1, 72, 'Rider-7142', 'Muhammad Muzammil', '2023-12-01', 'Johar\r\nMateen Shopping Galaxy', '0888888543', NULL, 'Pakistani', 'sdadasdsadasd', '2023-12-30', 'license_image_3455710.png', 'rider_image_6552459.png', 'id_image_8742710.png', 1, 'No', 'Not verified', 0, '2023-12-26 00:47:10', '2023-12-26 00:47:10'),
(3, 1, NULL, 1, 74, 'Rider-9849', 'Muhammad Muzammil', '1996-11-05', 'Johar\r\nMateen Shopping Galaxy', '66666666666666', NULL, 'Pakistani', 'sdadasdsadasd', '2025-02-14', 'license_image_599745.png', 'rider_image_3847357.jpg', 'id_image_8610588.jpg', 1, 'No', 'Not verified', 0, '2024-07-11 05:12:54', '2024-07-11 05:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-06-24 05:29:09', '2021-06-24 05:29:09'),
(2, 'sub-admin', 'web', '2021-08-16 09:28:43', '2021-08-16 09:28:43'),
(3, 'vendor', 'web', '2021-08-16 09:30:25', '2021-08-16 09:30:25'),
(4, 'vendor-user', 'web', '2021-08-16 09:30:25', '2021-08-16 09:30:25'),
(5, 'customer', 'web', '2021-08-16 09:30:25', '2021-08-16 09:30:25'),
(10, 'rider', 'web', '2022-04-08 05:38:30', '2022-04-08 05:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('82mprlbtdtN0nYnmAdeRdNMf5JGYZeXberalaxAE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUG95SFRYTDRTQmhJUUR5TXkxOHFSRjFIQ243VWZnNXBxQkpCZW83QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9hc3NpZ24tcHJvbW90aW9uLzEvMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoibGFuZyI7czoyOiJlbiI7czoxMjoiU3VwcG9ydF9Vc2VyIjtzOjk6IlVzZXJfNzcyMyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1725691907),
('cO9ACli2RAq3oQ6sCVWAFqBubjnQ2WEZTsLu48dE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQnRJUjdwUVZMNWtDTFoxMkFkbHZiQlNNOVpvdVJlVzVYdGlBRUpkRiI7czo0OiJsYW5nIjtzOjI6ImVuIjtzOjEyOiJTdXBwb3J0X1VzZXIiO3M6OToiVXNlcl8xNTE5IjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3ZpZXctcHJvbW90aW9ucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1725616652),
('OomWSeg7tahXHM6lxZEW4FaPKesAACNT7h08wyso', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOWVXUUpESjZXM08zM0hTc3BDZkpaOGZHZHhINFlkZnpMR3JTSldFMSI7czo0OiJsYW5nIjtzOjI6ImVuIjtzOjEyOiJTdXBwb3J0X1VzZXIiO3M6OToiVXNlcl8zNDkxIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2VuL3Byb2R1Y3QvOC9uZXctdGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725623711);

-- --------------------------------------------------------

--
-- Table structure for table `shippingcosts`
--

CREATE TABLE `shippingcosts` (
  `id` int(10) UNSIGNED NOT NULL,
  `amountLimit` varchar(255) DEFAULT NULL,
  `shippingCost` varchar(255) DEFAULT NULL,
  `zone_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippingcosts`
--

INSERT INTO `shippingcosts` (`id`, `amountLimit`, `shippingCost`, `zone_name`, `description`, `isDeleted`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2000', '100', 'Zone 1', NULL, 0, 1, '2022-02-19 01:23:23', '2022-02-19 01:23:23', NULL),
(4, '1500', '50', 'Zone 2', NULL, 0, 1, '2022-02-19 01:29:13', '2022-02-19 01:29:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_cost_zone_cities`
--

CREATE TABLE `shipping_cost_zone_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_cost_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `city_area_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_cost_zone_cities`
--

INSERT INTO `shipping_cost_zone_cities` (`id`, `shipping_cost_id`, `country_id`, `state_id`, `city_id`, `city_area_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 2, '2022-02-19 01:23:23', '2022-02-19 01:23:23'),
(2, 1, 1, 1, 1, 4, '2022-02-19 01:23:23', '2022-02-19 01:23:23'),
(6, 4, 1, 1, 1, 5, '2022-02-19 01:29:13', '2022-02-19 01:29:13'),
(7, 4, 1, 1, 1, 6, '2022-02-19 01:29:13', '2022-02-19 01:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_zone_weight_costs`
--

CREATE TABLE `shipping_zone_weight_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_cost_id` int(11) NOT NULL,
  `weight_up_to` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_zone_weight_costs`
--

INSERT INTO `shipping_zone_weight_costs` (`id`, `shipping_cost_id`, `weight_up_to`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, '1000', '50', '2022-02-22 05:54:18', '2022-02-22 05:54:18'),
(2, 1, '2000', '75', '2022-02-22 05:54:59', '2022-02-22 06:07:25'),
(4, 4, '1000', '60', '2022-02-22 06:10:07', '2022-02-22 06:10:24'),
(5, 4, '2000', '100', '2022-02-22 06:37:52', '2022-02-22 06:37:52'),
(6, 4, '3000', '150', '2022-02-22 06:37:52', '2022-02-22 06:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `shop_owners`
--

CREATE TABLE `shop_owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `company_legal_name` varchar(255) DEFAULT NULL,
  `product_kind` varchar(255) DEFAULT NULL,
  `full_address` varchar(255) DEFAULT NULL,
  `trade_license` varchar(500) NOT NULL,
  `national_id` varchar(500) NOT NULL,
  `tax_reg_number` varchar(255) DEFAULT NULL,
  `tax_reg_certificate` varchar(500) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_owners`
--

INSERT INTO `shop_owners` (`id`, `user_id`, `email`, `country`, `city`, `store_name`, `company_legal_name`, `product_kind`, `full_address`, `trade_license`, `national_id`, `tax_reg_number`, `tax_reg_certificate`, `isActive`, `isDeleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 40, 'testvendor@gmail.com', 'Pakistan', 'Karachi', 'Sweets', 'Sweets', 'Sweets', 'Landhi', '49145.png', '46438.jpg', 'tx-1029', '41385.png', 1, 0, NULL, '2020-05-01 05:29:00', '2020-05-01 05:29:00'),
(6, 41, 'vendortest@gmail.com', 'Pakistan', 'Islamabad', 'HR Sweets', 'HR Sweets', 'Sweets', 'Defence', '8028.png', '845.png', 'tx-1029', '67253.png', 0, 0, NULL, '2020-05-02 00:54:38', '2020-05-02 00:54:38'),
(9, 46, 'angry@gmail.com', 'Pakistan', 'Karachi', 'Sweets', 'Sweets', 'Sweets', 'Landhi 1', '32566.pdf', '78041.jpg', 'tx-1029', '30880.png', 0, 0, NULL, '2020-05-02 05:28:18', '2020-05-02 05:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `en_title`, `ar_title`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'slider_image_8212596.png', 'Explore For Latest Products', 'استكشاف للحصول على أحدث المنتجات', 1, '2024-08-02 02:03:23', '2024-08-02 02:10:34'),
(2, 'slider_image_212494.png', 'Explore For Latest Products', 'استكشاف للحصول على أحدث المنتجات', 1, '2024-08-02 02:11:07', '2024-08-02 02:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `code`, `shortName`, `long`, `lat`, `isActive`, `isDeleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'sindh', '012', 'sn', '', '', 1, 0, NULL, '2021-09-27 04:59:12', '2021-12-30 06:08:42'),
(2, 1, 'panjab', '123', 'pn', '', '', 1, 0, NULL, '2021-09-27 04:59:30', '2021-09-27 04:59:30'),
(3, 1, 'balochistan', '123', 'bl', '', '', 1, 0, '2021-12-30 05:56:47', '2021-09-27 04:59:46', '2021-12-30 05:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', '2019-05-22 19:00:00', '2019-05-22 19:00:00', NULL),
(2, 'Confirmed', '2019-05-22 19:00:00', '2019-05-22 19:00:00', NULL),
(3, 'Ready To Dispatch', '2019-05-22 19:00:00', '2019-05-22 19:00:00', NULL),
(4, 'On The Way', '2019-05-22 19:00:00', '2019-05-22 19:00:00', NULL),
(5, 'Delivered', '2019-05-22 19:00:00', '2019-05-22 19:00:00', NULL),
(6, 'Cancelled', '2019-05-22 19:00:00', '2019-05-22 19:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 50, 'ali', 'ahmed', '03223232456', 'gulshan', 'subadmin288547.jpg', '1', '2021-08-05 14:33:54', '2021-08-09 00:47:17'),
(4, 52, 'rashid', 'jamal', '03223232456', 'nazimabad', NULL, '1', '2021-08-09 00:22:11', '2021-08-09 00:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin_active_cities`
--

CREATE TABLE `sub_admin_active_cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin_privileges`
--

CREATE TABLE `sub_admin_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `chat_supports` tinyint(1) NOT NULL DEFAULT 1,
  `products` tinyint(1) NOT NULL DEFAULT 1,
  `orders` tinyint(1) NOT NULL DEFAULT 1,
  `vendors` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_admin_privileges`
--

INSERT INTO `sub_admin_privileges` (`id`, `user_id`, `country_id`, `city_id`, `chat_supports`, `products`, `orders`, `vendors`, `created_at`, `updated_at`) VALUES
(1, 50, 1, 7, 1, 1, 1, 0, '2021-08-06 07:35:46', '2021-08-12 02:10:39'),
(2, 52, 1, 7, 1, 1, 0, 1, '2021-08-09 00:22:11', '2021-08-09 00:22:11'),
(3, 50, 1, 1, 1, 1, 1, 1, '2021-08-09 04:53:10', '2021-08-09 04:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `support_chats`
--

CREATE TABLE `support_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_chat_room_id` int(11) NOT NULL,
  `msg_by` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `msg_time` varchar(255) NOT NULL,
  `msg_read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_chats`
--

INSERT INTO `support_chats` (`id`, `support_chat_room_id`, `msg_by`, `message`, `msg_time`, `msg_read`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'test', '12/30/2021 09:34 am', 1, '2021-12-30 04:34:17', '2022-01-12 04:59:25'),
(2, 2, 'User_1231', 'test', '01/11/2022 06:53 am', 1, '2022-01-11 01:53:10', '2022-01-12 04:59:29'),
(3, 3, 'User_7274', 'test', '01/11/2022 10:09 am', 1, '2022-01-11 05:09:54', '2022-01-12 04:59:35'),
(4, 3, 'User_7274', 'again test', '01/11/2022 10:10 am', 1, '2022-01-11 05:10:07', '2022-01-12 04:59:35'),
(5, 3, 'User_7274', 'chk again', '01/11/2022 10:13 am', 1, '2022-01-11 05:13:04', '2022-01-12 04:59:35'),
(6, 4, 'User_9906', 'new test', '01/11/2022 10:14 am', 1, '2022-01-11 05:14:39', '2022-01-13 06:37:28'),
(7, 3, 'User_7274', 'scrool chk', '01/11/2022 10:17 am', 1, '2022-01-11 05:17:02', '2022-01-12 04:59:35'),
(8, 4, '1', 'jfhdsjfsd', '01/13/2022 10:14 am', 1, '2022-01-13 05:14:17', '2022-01-13 06:37:28'),
(9, 4, '1', 'chk again', '01/13/2022 10:48 am', 1, '2022-01-13 05:48:12', '2022-01-13 06:37:28'),
(10, 4, '1', 'hjfhdkj', '01/13/2022 11:22 am', 1, '2022-01-13 06:22:57', '2022-01-13 06:37:28'),
(11, 5, 'User_9660', 'what is the exact time of delivery in karachi', '01/13/2022 11:38 am', 1, '2022-01-13 06:38:27', '2022-01-13 06:45:43'),
(12, 5, '1', 'its depends on your order sir', '01/13/2022 11:38 am', 1, '2022-01-13 06:38:56', '2022-01-13 06:45:43'),
(13, 5, 'User_9660', 'ok thanks you', '01/13/2022 11:45 am', 1, '2022-01-13 06:45:38', '2022-01-13 06:45:43'),
(14, 6, 'User_4659', 'testing timer', '01/14/2022 10:39 am', 1, '2022-01-14 05:39:54', '2022-03-11 02:32:05'),
(15, 6, '1', 'form admin replay', '01/14/2022 10:40 am', 1, '2022-01-14 05:40:57', '2022-03-11 02:32:05'),
(16, 6, 'User_4659', 'again', '01/14/2022 10:41 am', 1, '2022-01-14 05:41:24', '2022-03-11 02:32:05'),
(17, 6, '1', 'again chk', '01/14/2022 10:41 am', 1, '2022-01-14 05:41:36', '2022-03-11 02:32:05'),
(18, 6, '1', 'chk msg send oy not', '01/14/2022 11:42 am', 1, '2022-01-14 06:42:38', '2022-03-11 02:32:05'),
(19, 7, 'User_9261', 'hdkashdkhaskjd', '03/10/2022 07:05 am', 1, '2022-03-10 02:05:11', '2022-03-11 02:32:07'),
(20, 7, 'User_9261', 'new msg on key press', '03/10/2022 07:16 am', 1, '2022-03-10 02:16:45', '2022-03-11 02:32:07'),
(21, 7, 'User_9261', 'dhfjds', '03/10/2022 07:57 am', 1, '2022-03-10 02:57:39', '2022-03-11 02:32:07'),
(22, 7, 'User_9261', 'hdsljhdlsa', '03/10/2022 08:06 am', 1, '2022-03-10 03:06:00', '2022-03-11 02:32:07'),
(23, 8, 'User_5307', 'fdshlf', '03/11/2022 07:27 am', 1, '2022-03-11 02:27:43', '2022-03-11 06:31:34'),
(24, 8, 'User_5307', 'now i thi', '03/11/2022 07:27 am', 1, '2022-03-11 02:27:57', '2022-03-11 06:31:34'),
(25, 8, 'User_5307', 'now chk', '03/11/2022 07:30 am', 1, '2022-03-11 02:30:27', '2022-03-11 06:31:34'),
(26, 8, '1', 'admin', '03/11/2022 07:32 am', 1, '2022-03-11 02:32:24', '2022-03-11 06:31:34'),
(27, 9, 'User_9418', 'chk', '03/11/2022 11:11 am', 1, '2022-03-11 06:11:41', '2022-03-12 01:35:58'),
(28, 9, 'User_9418', 'hdjkashdkjas', '03/11/2022 11:11 am', 1, '2022-03-11 06:11:47', '2022-03-12 01:35:58'),
(29, 9, 'User_9418', 'jdklasjkmx,.dksajkldsaldsalkdl;sad;lasjd;lsa', '03/11/2022 11:11 am', 1, '2022-03-11 06:11:51', '2022-03-12 01:35:58'),
(30, 9, '1', 'sjdhfkjdshfjsdkllkdslk', '03/11/2022 11:31 am', 1, '2022-03-11 06:31:49', '2022-03-12 01:35:58'),
(31, 9, '1', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '03/11/2022 11:31 am', 1, '2022-03-11 06:31:55', '2022-03-12 01:35:58'),
(32, 9, 'User_9418', 'jdslkfjdsl', '03/11/2022 11:38 am', 1, '2022-03-11 06:38:26', '2022-03-12 01:35:58'),
(33, 9, 'User_9418', 'jflkdsjflkdskf', '03/11/2022 11:38 am', 1, '2022-03-11 06:38:33', '2022-03-12 01:35:58'),
(34, 9, 'User_9418', 'fkds;lfkjds', '03/11/2022 11:40 am', 1, '2022-03-11 06:40:38', '2022-03-12 01:35:58'),
(35, 9, 'User_9418', 'kfjdsklflsd', '03/11/2022 11:40 am', 1, '2022-03-11 06:40:45', '2022-03-12 01:35:58'),
(36, 10, 'User_3357', 'lfdjslkfsd', '03/12/2022 06:29 am', 1, '2022-03-12 01:29:12', '2022-03-12 01:39:20'),
(37, 10, 'User_3357', 'now tesing agagin', '03/12/2022 06:29 am', 1, '2022-03-12 01:29:26', '2022-03-12 01:39:20'),
(38, 10, 'User_3357', 'again', '03/12/2022 06:29 am', 1, '2022-03-12 01:29:32', '2022-03-12 01:39:20'),
(39, 10, 'User_3357', 'now test msg again', '03/12/2022 06:29 am', 1, '2022-03-12 01:29:39', '2022-03-12 01:39:20'),
(40, 10, '1', 'admin side test', '03/12/2022 06:37 am', 1, '2022-03-12 01:37:22', '2022-03-12 01:39:20'),
(41, 10, 'User_3357', 'noew djsklfs', '03/12/2022 06:39 am', 1, '2022-03-12 01:39:03', '2022-03-12 01:39:20'),
(42, 10, '1', 'salfhdsal', '03/12/2022 06:39 am', 0, '2022-03-12 01:39:29', '2022-03-12 01:39:29'),
(43, 10, 'User_3357', 'fldslfkds', '03/12/2022 07:00 am', 0, '2022-03-12 02:00:28', '2022-03-12 02:00:28'),
(44, 10, 'User_3357', 'jlfdsjlkfdslfdsjlkdslk', '03/12/2022 07:23 am', 0, '2022-03-12 02:23:02', '2022-03-12 02:23:02'),
(45, 10, 'User_3357', 'jshjkashdjashjkdnm,nmnjkdhsakjdhjshdjhaskjdhsadkjhsjahjkssnjkshdksjahdas', '03/12/2022 07:27 am', 0, '2022-03-12 02:27:29', '2022-03-12 02:27:29'),
(52, 13, 'User_6398', 'test', '02/19/2024 10:56 am', 0, '2024-02-19 05:56:44', '2024-02-19 05:56:44'),
(53, 13, 'User_6398', 'new', '02/19/2024 10:57 am', 0, '2024-02-19 05:57:11', '2024-02-19 05:57:11'),
(54, 14, 'User_2829', 'test', '07/12/2024 05:37 am', 0, '2024-07-12 00:37:33', '2024-07-12 00:37:33'),
(55, 15, 'User_3561', 'test', '07/13/2024 07:22 am', 0, '2024-07-13 02:22:33', '2024-07-13 02:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `support_chat_rooms`
--

CREATE TABLE `support_chat_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_id` varchar(255) NOT NULL,
  `to_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_chat_rooms`
--

INSERT INTO `support_chat_rooms` (`id`, `from_id`, `to_id`, `created_at`, `updated_at`) VALUES
(1, 'User_7663', 1, '2021-12-30 04:34:17', '2021-12-30 04:34:17'),
(2, 'User_1231', 1, '2022-01-11 01:53:10', '2022-01-11 01:53:10'),
(3, 'User_7274', 1, '2022-01-11 05:09:54', '2022-01-11 05:09:54'),
(4, 'User_9906', 1, '2022-01-11 05:14:38', '2022-01-11 05:14:38'),
(5, 'User_9660', 1, '2022-01-13 06:38:27', '2022-01-13 06:38:27'),
(6, 'User_4659', 1, '2022-01-14 05:39:54', '2022-01-14 05:39:54'),
(7, 'User_9261', 1, '2022-03-10 02:05:11', '2022-03-10 02:05:11'),
(8, 'User_5307', 1, '2022-03-11 02:27:43', '2022-03-11 02:27:43'),
(9, 'User_9418', 1, '2022-03-11 06:11:41', '2022-03-11 06:11:41'),
(10, 'User_3357', 1, '2022-03-12 01:29:12', '2022-03-12 01:29:12'),
(13, 'User_6398', 1, '2024-02-19 05:56:43', '2024-02-19 05:56:43'),
(14, 'User_2829', 1, '2024-07-12 00:37:33', '2024-07-12 00:37:33'),
(15, 'User_3561', 1, '2024-07-13 02:22:32', '2024-07-13 02:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `isActive`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@lilac.com', NULL, '$2y$12$fWpg/qeaz3Kh5UIoSP6MsOFmwLIJwelRclaCRggDMl0FpwLzffq92', 1, 'eQ2YLAereCSrCjF5TUkrzdtDtPs1tid3MXLxFmUf5etTJjx3hn0jBb9pRhq6', '2019-03-05 06:16:49', '2024-07-09 05:50:57'),
(2, 'Guest', 'cogentdevs@gmail.com', NULL, '$2y$10$7OJ4QQ/baOuSsDI4Ch0.WeubMxV15ZTfJONODeUXrkXRr6/jwhz0K', 1, NULL, '2019-03-05 08:27:43', '2022-10-22 04:46:55'),
(3, 'Abbad', 'abbad@gmail.com', NULL, '$2y$10$8E1RqdC6WKpZDM4.CbjGtexYfDEMMWH696iQHyig/czvvK2wMBiJq', 1, 'NpAobiyGUTezmwPQaU7trxFGVOHLdk371AFXZLBWgIfczYvt5PkgOewAKO6L', '2019-03-06 07:55:44', '2019-03-06 07:55:44'),
(4, 'Muzaffar1', 'finekashif.aquil1@gmail.com', NULL, '$2y$10$PaxQ2YjWuPNP.WdtB5lWXO3IoQtB11zKXPhaJVcJlQP17iNI1lDXG', 1, NULL, '2019-04-25 07:25:05', '2019-04-25 07:25:05'),
(6, 'Hamza', 'hamza@gmail.com', NULL, '$2y$10$8mDysM2YW8po8G0pUUTWpOpeCzYOeajJ.jM2F0gtcu2xb4xq7Y3iC', 1, NULL, '2019-04-25 07:40:23', '2019-04-25 07:40:23'),
(7, 'Hamza', 'hamza1@gmail.com', NULL, '$2y$10$cYmQXFUtiPyV9TAPSNJ59u0.tC1tn3BoJeXzJfTUBLNIw9u5eESQS', 1, NULL, '2019-04-25 07:42:08', '2019-04-25 07:42:08'),
(8, 'Muneera', 'muneera@gmail.com', NULL, '$2y$10$kCDMEr9B0Frh84nqADmc/eSFepU9g95fDR2kfgjOsg5/C.1q5i8I2', 1, NULL, '2019-04-25 07:43:32', '2019-04-25 07:43:32'),
(9, 'Owais', 'owais@gmail.com', NULL, '$2y$10$hF5gR3LpA9dcC7sx/d5HWOpNZ129jTE.JZ6aPFah8hmpuR4d3P5/6', 1, NULL, '2019-04-25 07:50:40', '2019-04-25 07:50:40'),
(10, 'Kashif', 'finekashif_aquil@yahoo.com', NULL, '$2y$10$HaxHY1rMJQ0PR/HeGTxO8OIF3nbgdopPgmgZsVkiQq1zVZ3PkDWvu', 1, NULL, '2019-05-21 06:51:02', '2019-05-21 06:51:02'),
(12, 'Kamran', 'k.anjum@gmail.com', NULL, '$2y$10$FIKuN68i45igSWFzcgbWT.DeF5vmNLex4M0o.RV768IEO8HfleQ8W', 1, 'aXyv3MpfJkeMvmbs8jh7JbpNb6UbGag2Q0G9qBzO8Vt4SXpBSCMm24MxJem7', '2019-05-21 07:22:46', '2019-05-21 07:22:46'),
(13, 'testing1', 'aamir1@gmail.com', NULL, '$2y$10$2eJ3yRErQeDUWmZA5JlawOP4XLWK4r4EvsT9JJ9ud/UemWZxC0C8q', 1, 'nxaQ9MvJ4Ns7SWkKuJsjlurVvRTA8oX4BNJfHaGFo6VLgrL9pOW5ZMLAkIKE', '2019-05-22 00:38:39', '2019-05-22 00:38:39'),
(14, 'testing2', 'aamir2@gmail.com', NULL, '$2y$10$EOCoylX8aHWf8z2Vr1zSTObTarupqAG2JX1holFZ7pHf64gVC5oVa', 1, 'EPABvPi7E7H45oC54a0k5DHszwFeqYyNBEqmcVndPO5AjlUsgOXbOcsQ9tta', '2019-05-22 00:41:53', '2019-05-22 00:41:53'),
(15, 'umair', 'umairkhan@gmail.com', NULL, '$2y$10$dudgASevR0zLx73ohWmA.uSL3VUXMJD0DJTXFjy3wMdgkbEZmg9S6', 1, 'qjWUedzAzfXgbEbpKqGiSnPB3r4hGOj5QquEeCibuI3KfNZeW3MXjpxAinwk', '2019-05-22 06:25:41', '2019-05-22 06:25:41'),
(16, 'Maquil', 'finekashif.aquil123@gmail.com', NULL, '$2y$10$CUX3sFYWQrCklFUcVyPlzu8EfAtiGgO0s4Yb20kexwAqLImf8uCj.', 1, 'jsbyck2bKCCAB3nMJWTnJ103DGZzF13H9RQRENGbm4tplE4hZd8gyH2LKHe8', '2019-05-23 01:26:00', '2019-05-23 01:26:00'),
(17, 'Maquil', 'finekashif.aquil234@gmail.com', NULL, '$2y$10$JKC488IiMbM7Dv.eTFynrOvXip5wAVKaC7dEe4b7jNbZr/xp.hWoC', 1, NULL, '2019-05-23 01:33:34', '2019-05-23 01:33:34'),
(18, 'Maquil', 'finekashif.aquil1234@gmail.com', NULL, '$2y$10$qusYlqi1QXL.sc0xQnryjOELJDD.AmTyboGaSpKQbEBy4viqzE7o.', 1, '3vl2Pt4htvkcaJneDeseXVbaxWiP8LJYatW679oC81b38zEZdGwGiVGuNn2A', '2019-05-23 01:38:26', '2019-05-23 01:38:26'),
(19, 'KAnjum', 'k.anjum123@gmail.com', NULL, '$2y$10$qusYlqi1QXL.sc0xQnryjOELJDD.AmTyboGaSpKQbEBy4viqzE7o.', 1, 'dx7uyDnbg2VrdzXnyGtDeZPtgXr1cXLHbWobmGsnSdz4ftPQYym4htzO0JRI', '2019-05-23 02:59:27', '2019-05-23 02:59:27'),
(20, 'SMemon', 'sunairam@gmail.com', NULL, '$2y$10$wbXfJtc9Vlb3nBN.q0I3U.Ooh0.07HVLmk5qnMa0kciR82aPuEusW', 1, 'uXIvW0BwmN8ACY8M4d7uaCQPJACXR1092UKu6l5B2s0bJx4B6SLFUCWwNHmo', '2019-05-23 04:22:19', '2019-05-23 04:22:19'),
(21, 'Laiba', 'finekashif.aquil12345@gmail.com', NULL, '$2y$10$vi.1Ousp/gERXxyEAvjPG.Ck7Xype/6jjq1TlngOWslzcjZGdnL9m', 1, NULL, '2019-05-27 01:56:05', '2019-05-27 01:56:05'),
(22, 'Laiba1', 'laiba@123.com', NULL, '$2y$10$.H73pnB1GeQ0xKYthIbMh.dTmRR0u73suVfrBWJm7A/RnQWQ2VrFG', 1, NULL, '2019-05-27 02:03:01', '2019-05-27 02:03:01'),
(23, 'Laiba3', 'laiba2@a.com', NULL, '$2y$10$myB6tpZ1eD0cj8DyHgwp2.hYNtXrr3l6kIlzq22X8Li9Q1ezTt9WC', 0, NULL, '2019-05-27 02:04:54', '2019-05-27 07:38:51'),
(24, 'Kajum', 'k.anjum11@gmail.com', NULL, '$2y$10$MOW250zEBC/og81qaEeETe2QRAVOCbzX/eDpwSIoqxqMIjG5Xo4HW', 1, NULL, '2019-05-27 07:54:27', '2019-05-27 07:54:27'),
(25, 'NSahrif', 'nawaz@gmail.com', NULL, '$2y$10$e9CPN1O2RF3szVoQrQCRtuFf2DQHuPdt2.F9O1Zd3Ub4Vb0F6wLCm', 1, 'vtWLW4Ha6bVu2Co7B2HNqk9RgRVtGwxfgW1IRzw39vJMBMgnO1m7SDlQaK5M', '2019-05-28 06:43:01', '2019-05-28 06:43:01'),
(26, 'Hkhan', 'hamza123@gmail.com', NULL, '$2y$10$YF4RQBIlddtipS1OCAWUb.vKTxXu7u4SdnXdj9Fq/nr1EPUN.DhvO', 1, NULL, '2019-05-29 02:03:59', '2019-05-29 02:03:59'),
(27, 'Kamran', 'k.anjum1234@gmail.com', NULL, '$2y$10$DWiOGANWjdPsC7NyCUB44uNCd6E.bJFRrye8Wd9WGUV3DUT.ykVY.', 1, 'QTYWeeF78PDLukVzLYNY8xjityoiseJWFaNq7Me6wJUE2A2GEyS5TxxiNupj', '2019-06-03 00:49:46', '2019-06-03 00:49:46'),
(28, 'Anjum', 'a.kamran@gmail.com', NULL, '$2y$10$iSslEjgqF7EyRjZCwAAP0u9elrI.Z5wCTwJafCpmou9Jvuz8bkaOa', 1, NULL, '2019-06-03 01:00:50', '2019-06-03 01:00:50'),
(29, 'Adil', 'muneeraadil@gmail.com', NULL, '$2y$10$D84d4ZQMaUKUc84ZVtH/9OIv8fZHeQtAFq/dmMRAt82ZpWVYpNwQi', 1, NULL, '2019-06-03 13:16:30', '2019-06-03 13:16:30'),
(30, 'owais219', 'owaiskhan402@gmail.com', NULL, '$2y$10$eU7.7ZQpQtjXZ8g2IlEfpe3QEHsmfmH.AJC1xXF5c1WunXoq6Fg8i', 1, NULL, '2019-06-03 13:16:43', '2019-06-03 13:16:43'),
(31, 's.nabeel', 'nabbu786@gmail.com', NULL, '$2y$10$KfXmbIxWiJQQxkLJeQBXeOqwE/28STWJ5CjIyRtaLaDGhTjcrYVQG', 1, 'VvlCBGMRHVScNdOddrd6Po3T4CHtPpozH0SVNlkPCXmUi063ov5BqqOnrmTE', '2019-06-15 17:12:27', '2019-06-15 17:40:07'),
(32, 'Muzammil', 'muzammilken@gmail.com', NULL, '$2y$10$r0ZSI6ZLzzGzw5ZwOYhTde77nLT.sbtDXq0BJmZ76sSKh1TLVj486', 1, NULL, '2020-04-17 05:15:46', '2020-04-17 05:15:46'),
(33, 'Muhammad', 'muzammilkhan@gmail.com', NULL, '$2y$10$bdsoxq0GF.KtuxYa2/RjIulT3yXp5rEC6PyNKgHWw6BLrrrYGYaPq', 1, NULL, '2020-04-17 07:07:00', '2020-04-17 07:07:00'),
(34, 'Usama', 'usamakhan@gmail.com', NULL, '$2y$10$Iw6BAibV.7XwXOAw.64xseyeox8UCJPQGvsstg74BYef.BlBabtai', 1, 'sFud6OjsSFIii4bCljZ8UhDVs26ro55fvC5uzBILokwhAO4wgzXus8N7Oj2j', '2020-04-21 05:45:39', '2020-04-21 05:45:39'),
(40, 'Sweets', 'testvendor@gmail.com', NULL, '$2y$10$XbI20c1Z6yeguz.spl6xsOmm9YhMI13p6H./4lpgw1Qf7J06YNKw6', 1, NULL, '2020-05-01 05:28:59', '2020-05-01 05:28:59'),
(41, 'HR Sweets', 'vendortest@gmail.com', NULL, '$2y$10$iK4Hzj7fyAQyXH7ZdHFT3OgsgExIazjte5rC8bMtI3nL/2xSguMkO', 0, NULL, '2020-05-02 00:54:37', '2020-05-02 00:54:37'),
(42, 'Sweets', 'pdf.doc.jpg@gmail.com', NULL, '$2y$10$hgXf/dxkhBG7XCuK9qlSe.hctFRf8s6MK9x1/yDlZ6Q3VDvaVQwqq', 0, NULL, '2020-05-02 03:09:57', '2020-05-02 03:09:57'),
(46, 'Sweets', 'angry@gmail.com', NULL, '$2y$10$Ep7MtnyTjlc/GB4PXxORnOQOXQPmdbQirf9CtPAA4bg7FkUNwOSNm', 0, NULL, '2020-05-02 05:28:18', '2020-05-02 05:28:18'),
(50, 'ali_ahmed', 'subadmin@gmail.com', NULL, '$2y$12$WO2Ei9RauG3DUCKNIeTYtOM8wo6T5z7uA0qBRb07hqUSeRn71AQQS', 1, 'XtIJVW3cxGh9KNYyT6G0X8jUiqlGBV7Iw42Yaz30ktZSjjfepnVLGbMxaQt4', '2021-08-05 14:33:53', '2024-07-10 02:21:48'),
(52, 'rashid_jamal', 'rashid@gmail.com', NULL, '$2y$10$7lYJHnDJJGkyI6AoMbhaNux7ewRP.GUmV8SXISt1qvTLjKI5orE2.', 0, NULL, '2021-08-09 00:22:10', '2021-08-09 00:22:10'),
(55, 'asdf', 'faiz@gmail.com', NULL, '$2y$10$yDesmX1T9Nvqytd/sl24eeMqPk9cIQLadwxHG/TshPRCfeK04T8Fm', 0, NULL, '2021-08-10 06:26:29', '2021-08-10 06:26:29'),
(58, 'rrrr', 'vendor@gmail.com', NULL, '$2a$12$92RGx.aTwdjfkDiRIhQ7Gu5axMVLbOndsfhzdMzw4YSR1pFTXvY/G', 1, 'wfnYFbTZib6UvVNkjU04IfLf1eYtHwLPeSkOm3cuIktECqkN6qDHSyN6xIRR', '2021-08-12 07:52:29', '2021-08-12 07:52:29'),
(60, 'aftab_arzoo', 'aftab@gmail.com', NULL, '$2y$10$cl8l8eYRSIOg9D4XN/cNouHTPhGhf.KnM0WrmayIonxlUYxUXRXOC', 1, NULL, '2021-09-03 01:26:36', '2021-10-08 07:31:02'),
(61, 'muzammil_khan', 'muzammil@gmail.com', NULL, '$2y$10$T/AlGFW5euA0eGnaF89Q9ey.r3P.3fHBHzLh4p8GsSQdjzybatgKG', 1, NULL, '2021-09-03 01:28:40', '2021-09-03 01:28:40'),
(62, 'vendor_user', 'vendoruser@gmail.com', NULL, '$2a$12$92RGx.aTwdjfkDiRIhQ7Gu5axMVLbOndsfhzdMzw4YSR1pFTXvY/G', 1, NULL, '2021-09-17 04:44:04', '2021-09-17 04:44:04'),
(63, 'muzammil', 'customer@gmail.com', NULL, '$2y$12$UDXJkWazo1eNn7DxKkUDEOQCk9FjeHeNNQK1mdyJ.UDLz56T6T1S2', 1, NULL, '2022-01-24 06:23:06', '2024-07-26 05:59:07'),
(64, 'Muhammad Muzammil', 'm.muzammil@gmail.com', NULL, '$2y$10$/4mmkoLvobAcgxtP/5BpZeL7RLZF8Ld7wJYGt2Y.LP9uMIGYlaJ3i', 0, NULL, '2022-04-15 01:43:25', '2022-04-15 01:43:25'),
(65, 'Muhammad ALi', 'm.ali@gmail.com', NULL, '$2y$10$cX7/VK.EiS7iTnLfYCJJ5.bgj.Vi66qvS2wRTgRSXxuq4kO2DRhlO', 0, NULL, '2022-04-15 02:15:02', '2022-04-15 02:15:02'),
(66, 'Muhammad Muzammil', 'muzammilken5@gmail.com', NULL, '$2y$10$VPb.QJI1n696d2G2yOcDZeG/WyFXAJ9r5xTpglhPv6uEfi8aIvbvO', 0, NULL, '2022-04-20 04:47:22', '2022-04-20 04:47:22'),
(67, 'Muhammad Muzammil', 'muzammilken6@gmail.com', NULL, '$2y$10$bQGMBNoQARdYXetqV0ZPJeGbK5udOJBN31fSme.4xMeYLWJUVLYuW', 0, NULL, '2022-04-20 04:59:21', '2022-04-20 04:59:21'),
(68, 'Muhammad Muzammil', 'muzammilken7@gmail.com', NULL, '$2y$10$sShl71Yx/r8l1HA2PhCf9urSP3UFNXtoO3ZWFkSDMGAPvkbp3YFRa', 0, NULL, '2022-04-20 05:01:08', '2022-04-20 05:01:08'),
(69, 'Muhammad Muzammil', 'muz.ken@gmail.com', NULL, '$2y$10$Rhlnq3QCd/LReEnvDIpC2ewirrspd5uQD8IrEcLJMm12mMryzakcG', 1, NULL, '2022-05-09 06:03:22', '2023-12-26 00:43:51'),
(70, 'Sweet Cakes', 'testing@gmail.com', NULL, '$2y$10$umbGADd3zQtBxXttv2MX8OS/hB3mUdDXSXz4Du4rgI0DOOVX1p4rC', 0, NULL, '2022-10-10 02:53:11', '2022-10-10 02:53:11'),
(71, 'Sweet Cakes', 'tets@gmail.com', NULL, '$2y$10$jsC8KzSNw90QUfsQlKorb.BSALK7CRDij3Lb5C8XdcGxV7ZumXCa6', 0, NULL, '2022-10-10 06:02:56', '2022-10-10 06:02:56'),
(72, 'Muhammad Muzammil', 'muzammilkn@gmail.com', NULL, '$2y$10$WDUEUff/ZjZCQZLxBifxnunvk9TYqbK4jRIsfyjOrs9FrW3t8gUaW', 0, NULL, '2023-12-26 00:47:09', '2023-12-26 00:47:09'),
(73, 'dsa', 'newvendortest@lilac.com', NULL, '$2y$12$hYrPjOoSzuKPUATI.S94xuIpzoNkql6ALlE2JGuoL5oka2QS5Ee.O', 0, NULL, '2024-07-11 05:05:00', '2024-07-11 05:05:00'),
(74, 'Muhammad Muzammil', 'muzammilken95@gmail.com', NULL, '$2y$12$VretsqSPn3E3fKu9hV6es.jRaEJNrtr.d4lz4R11NWs/h65us.cQi', 0, NULL, '2024-07-11 05:12:52', '2024-07-30 05:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `company_legal_name` varchar(255) DEFAULT NULL,
  `product_kind` varchar(255) DEFAULT NULL,
  `full_address` varchar(255) DEFAULT NULL,
  `trade_license` varchar(500) NOT NULL,
  `national_id` varchar(500) NOT NULL,
  `tax_reg_number` varchar(255) DEFAULT NULL,
  `tax_reg_certificate` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `store_name`, `company_legal_name`, `product_kind`, `full_address`, `trade_license`, `national_id`, `tax_reg_number`, `tax_reg_certificate`, `created_at`, `updated_at`) VALUES
(3, 55, 'asdf', 'asdf', 'asdf', 'asdf', '24839.PNG', '89041.PNG', 'asdf', '15930.jpg', '2021-08-10 06:26:29', '2021-08-10 06:26:29'),
(6, 58, 'Test Vendor', 'asdf', 'asdf', 'asdf', '40012.jpg', '94904.jpg', 'wwerwe', '41011.PNG', '2021-08-12 07:52:29', '2021-08-12 07:52:29'),
(7, 71, 'Sweet Cakes', 'CogentDevs', NULL, 'Johar\r\nMateen Shopping Galaxy', '92545.pdf', '28672.png', 'SC12345', '30595.png', '2022-10-10 06:02:56', '2022-10-10 06:02:56'),
(8, 73, 'dsa', 'CogentDevs', 'lksajdlksajlkd', 'Johar\r\nMateen Shopping Galaxy', '71815.docx', '57043.png', 'hdkjsahjkdsa', '82399.pdf', '2024-07-11 05:05:01', '2024-07-11 05:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_active_cities`
--

CREATE TABLE `vendor_active_cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_approval_requests`
--

CREATE TABLE `vendor_approval_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `viewAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `subadmin_id` int(11) NOT NULL,
  `viewSubadmin` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_approval_requests`
--

INSERT INTO `vendor_approval_requests` (`id`, `user_id`, `viewAdmin`, `subadmin_id`, `viewSubadmin`, `created_at`, `updated_at`) VALUES
(1, 54, 1, 50, 1, '2021-08-10 06:26:29', '2021-08-13 02:49:03'),
(2, 55, 1, 52, 0, '2021-08-10 06:26:29', '2021-08-10 06:26:29'),
(6, 58, 1, 52, 0, '2021-08-12 07:52:29', '2021-08-12 07:52:29'),
(7, 71, 1, 50, 0, '2022-10-10 06:02:57', '2022-10-10 06:02:57'),
(8, 73, 1, 50, 0, '2024-07-11 05:05:01', '2024-07-11 05:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_city_requests`
--

CREATE TABLE `vendor_city_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `viewAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `subadmin_id` int(11) NOT NULL,
  `viewSubadmin` tinyint(1) NOT NULL DEFAULT 0,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_city_requests`
--

INSERT INTO `vendor_city_requests` (`id`, `user_id`, `country_id`, `city_id`, `viewAdmin`, `subadmin_id`, `viewSubadmin`, `reason`, `created_at`, `updated_at`) VALUES
(7, 58, 1, 12, 1, 50, 1, '123', '2021-09-16 05:23:58', '2021-09-16 05:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_privileges`
--

CREATE TABLE `vendor_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_privileges`
--

INSERT INTO `vendor_privileges` (`id`, `user_id`, `country_id`, `city_id`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 55, 1, 7, 1, '2021-08-12 11:01:02', '2021-08-12 06:42:00'),
(6, 58, 1, 1, 1, '2021-08-12 07:52:29', '2021-08-12 07:52:29'),
(7, 58, 1, 7, 0, '2021-08-13 00:25:30', '2021-08-13 00:25:30'),
(9, 71, 1, 1, 1, '2022-10-10 06:02:56', '2022-10-10 06:02:56'),
(10, 73, 1, 1, 1, '2024-07-11 05:05:01', '2024-07-11 05:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_users`
--

CREATE TABLE `vendor_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_users`
--

INSERT INTO `vendor_users` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `image`, `address`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 62, 'vendor', 'user', '323452345234534', 'vendoruser4609804.jpg', 'asdf', 58, '2021-09-17 04:44:05', '2021-09-17 04:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_user_privileges`
--

CREATE TABLE `vendor_user_privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `products` tinyint(1) NOT NULL DEFAULT 1,
  `orders` tinyint(1) NOT NULL DEFAULT 1,
  `accounts` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_user_privileges`
--

INSERT INTO `vendor_user_privileges` (`id`, `user_id`, `country_id`, `city_id`, `products`, `orders`, `accounts`, `created_at`, `updated_at`) VALUES
(1, 62, 1, 1, 1, 1, 0, '2021-09-17 04:44:05', '2021-09-17 04:44:05'),
(2, 62, 1, 7, 0, 1, 1, '2021-09-17 05:08:18', '2021-09-17 05:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `v_a_t_s`
--

CREATE TABLE `v_a_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` int(11) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `v_a_t_s`
--

INSERT INTO `v_a_t_s` (`id`, `vat`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2024-08-22 07:14:15', '2024-08-22 02:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `we_serve_provides`
--

CREATE TABLE `we_serve_provides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  `en_title_2` varchar(255) DEFAULT NULL,
  `ar_title` varchar(255) DEFAULT NULL,
  `ar_title_2` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `we_serve_provides`
--

INSERT INTO `we_serve_provides` (`id`, `image`, `en_title`, `en_title_2`, `ar_title`, `ar_title_2`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'we_serve_provide_image_4733977.jpg', 'Free Shipping', 'Free shipping on all US order or order above $200', 'Free Shipping', 'Free shipping on all US order or order above $200', 1, '2024-08-05 04:21:05', '2024-08-05 04:36:14'),
(2, 'we_serve_provide_image_1697879.jpg', '24X7 Support', 'Contact us 24 hours a day, 7 days a week', '24X7 Support', 'Contact us 24 hours a day, 7 days a week', 1, '2024-08-05 04:32:11', '2024-08-05 04:32:11'),
(3, 'we_serve_provide_image_3226972.jpg', '30 Days Return', 'Simply return it within 30 days for an exchange', '30 Days Return', 'Simply return it within 30 days for an exchange', 1, '2024-08-05 04:33:38', '2024-08-05 04:33:38'),
(4, 'we_serve_provide_image_8032110.jpg', 'Payment Secure', 'Contact us 24 hours a day, 7 days a week', 'Payment Secure', 'Contact us 24 hours a day, 7 days a week', 1, '2024-08-05 04:35:27', '2024-08-05 04:35:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translates`
--
ALTER TABLE `brand_translates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cart_actions`
--
ALTER TABLE `cart_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translates`
--
ALTER TABLE `category_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_areas`
--
ALTER TABLE `city_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_teams`
--
ALTER TABLE `our_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_visits`
--
ALTER TABLE `page_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `price_units`
--
ALTER TABLE `price_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_unit_translates`
--
ALTER TABLE `price_unit_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cities`
--
ALTER TABLE `product_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translates`
--
ALTER TABLE `product_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_unit_translates`
--
ALTER TABLE `product_unit_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippingcosts`
--
ALTER TABLE `shippingcosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_cost_zone_cities`
--
ALTER TABLE `shipping_cost_zone_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_zone_weight_costs`
--
ALTER TABLE `shipping_zone_weight_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_owners`
--
ALTER TABLE `shop_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin_active_cities`
--
ALTER TABLE `sub_admin_active_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin_privileges`
--
ALTER TABLE `sub_admin_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_chats`
--
ALTER TABLE `support_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_chat_rooms`
--
ALTER TABLE `support_chat_rooms`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vendor_active_cities`
--
ALTER TABLE `vendor_active_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_approval_requests`
--
ALTER TABLE `vendor_approval_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_city_requests`
--
ALTER TABLE `vendor_city_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_privileges`
--
ALTER TABLE `vendor_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_users`
--
ALTER TABLE `vendor_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_user_privileges`
--
ALTER TABLE `vendor_user_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_a_t_s`
--
ALTER TABLE `v_a_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `we_serve_provides`
--
ALTER TABLE `we_serve_provides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand_translates`
--
ALTER TABLE `brand_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_actions`
--
ALTER TABLE `cart_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category_translates`
--
ALTER TABLE `category_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city_areas`
--
ALTER TABLE `city_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `our_teams`
--
ALTER TABLE `our_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_visits`
--
ALTER TABLE `page_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_units`
--
ALTER TABLE `price_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `price_unit_translates`
--
ALTER TABLE `price_unit_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_cities`
--
ALTER TABLE `product_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_translates`
--
ALTER TABLE `product_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_unit_translates`
--
ALTER TABLE `product_unit_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shippingcosts`
--
ALTER TABLE `shippingcosts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_cost_zone_cities`
--
ALTER TABLE `shipping_cost_zone_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping_zone_weight_costs`
--
ALTER TABLE `shipping_zone_weight_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop_owners`
--
ALTER TABLE `shop_owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_admin_active_cities`
--
ALTER TABLE `sub_admin_active_cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_admin_privileges`
--
ALTER TABLE `sub_admin_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support_chats`
--
ALTER TABLE `support_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `support_chat_rooms`
--
ALTER TABLE `support_chat_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor_active_cities`
--
ALTER TABLE `vendor_active_cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_approval_requests`
--
ALTER TABLE `vendor_approval_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor_city_requests`
--
ALTER TABLE `vendor_city_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_privileges`
--
ALTER TABLE `vendor_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor_users`
--
ALTER TABLE `vendor_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_user_privileges`
--
ALTER TABLE `vendor_user_privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `v_a_t_s`
--
ALTER TABLE `v_a_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `we_serve_provides`
--
ALTER TABLE `we_serve_provides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
