-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 01:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_product_requests`
--

CREATE TABLE `accepted_product_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_catagory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accepted_product_requests`
--

INSERT INTO `accepted_product_requests` (`id`, `user_id`, `product_catagory`, `product_name`, `unit`, `product_quantity`, `product_price`, `product_image`, `product_available_from`, `product_available_to`, `created_at`, `updated_at`) VALUES
(15, 3, 'Flowers', 'Rose', 'Pieces', '100', '10', 'storage/images/rose.jpg', '2017-09-07', '2017-09-08', '2017-09-08 08:58:18', '2017-09-08 08:58:18'),
(16, 3, 'Vegetables', 'brinjal', 'Kilogram', '20', '60', 'storage/images/brinjal.jpg', '2017-09-07', '2017-09-08', '2017-09-08 08:58:52', '2017-09-08 08:58:52'),
(20, 3, 'Flowers', 'Rose', 'Dozens', '30', '25', 'storage/images/images (4).jpg', '2017-09-17', '2017-09-18', '2017-09-16 21:51:55', '2017-09-16 21:51:55'),
(21, 3, 'Flowers', 'Rose', 'Dozens', '40', '45', 'storage/images/images (8).jpg', '2017-09-17', '2017-09-19', '2017-09-16 22:16:35', '2017-09-16 22:16:35'),
(22, 3, 'Vegetables', 'potato', 'Kilogram', '120', '40', 'storage/images/download (2).jpg', '2017-09-17', '2017-09-19', '2017-09-16 22:16:53', '2017-09-16 22:16:53'),
(23, 3, 'Vegetables', 'tomato', 'Kilogram', '80', '50', 'storage/images/download (4).jpg', '2017-09-17', '2017-09-19', '2017-09-16 22:17:08', '2017-09-16 22:17:08'),
(24, 3, 'Vegetables', 'potato', 'Kilogram', '40', '60', 'storage/images/download.jpg', '2017-09-17', '2017-09-20', '2017-09-16 22:21:01', '2017-09-16 22:21:01'),
(25, 3, 'Fruits', 'malta', 'Kilogram', '20', '200', 'storage/images/download (4).jpg', '2017-09-17', '2017-09-19', '2017-09-17 01:02:09', '2017-09-17 01:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `admin_private_keys`
--

CREATE TABLE `admin_private_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `private_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_private_keys`
--

INSERT INTO `admin_private_keys` (`id`, `private_key`, `created_at`, `updated_at`) VALUES
(1, 'tushar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_infos`
--

CREATE TABLE `customer_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_infos`
--

INSERT INTO `customer_infos` (`id`, `name`, `division`, `district`, `thana`, `village`, `contact_no`, `order_status`, `created_at`, `updated_at`) VALUES
(4, 'Md. Abdullah Al Maruf', 'Rajshahi', 'Rajshahi', 'Rajpara', 'Terokhadia', '01521477634', 'pending', '2017-09-08 13:20:54', '2017-09-08 13:20:54'),
(5, 'tushar', 'khulna', 'jessore', 'sarsha', 'shorupdha', '01926127007', 'pending', '2017-09-09 09:05:21', '2017-09-09 09:05:21'),
(6, 'tushar', 'khulna', 'jessore', 'sarsha', 'shorupdha', '01926127007', 'pending', '2017-09-11 23:02:19', '2017-09-11 23:02:19'),
(7, 'tushar', 'khulna', 'jessore', 'sarsha', 'shorupdha', '01926127007', 'accepted', '2017-09-11 23:10:18', '2017-09-16 06:02:35'),
(8, 'sohag', 'Rajshahi', 'sirjgong', 'kajipra', 'kajipara', '01926127007', 'accepted', '2017-09-16 22:32:03', '2017-09-16 22:36:51'),
(9, 'rahim', 'Rajshahi', 'sirjgong', 'kajipra', 'kajipara', '01926127007', 'pending', '2017-09-16 22:42:44', '2017-09-16 22:42:44'),
(10, 'tushar', 'Rajshahi', 'sirjgong', 'kajipra', 'kajipara', '01926127007', 'pending', '2017-09-17 00:19:36', '2017-09-17 00:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_requests`
--

CREATE TABLE `farmer_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_catagory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_available_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmer_requests`
--

INSERT INTO `farmer_requests` (`id`, `user_id`, `product_catagory`, `product_name`, `unit`, `product_quantity`, `product_price`, `product_image`, `product_available_from`, `product_available_to`, `created_at`, `updated_at`) VALUES
(10, 2, 'Cattle', 'Flowers', 'Pieces', '789', '345', 'storage/images/received_926429180828670.jpeg', '2017-09-07', '2017-09-29', '2017-09-07 22:09:04', '2017-09-07 22:09:04'),
(14, 2, 'Vegetables', 'Flowers', 'Pieces', '09876', '3457', 'storage/images/orca-image-1502034000458.jpg_1502034000519.jpeg', '2017-09-07', '2017-09-29', '2017-09-07 23:53:01', '2017-09-07 23:53:01'),
(16, 2, 'Vegetables', 'Fertilizers', 'Pieces', '87455', '876', 'storage/images/13707651_1246432235370079_2180088234326982723_n (1).jpg', '2017-09-09', '2017-09-29', '2017-09-08 00:00:32', '2017-09-08 00:00:32');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_09_06_094923_create_farmer_requests_table', 1),
(7, '2017_09_06_180202_create_admin_private_keys_table', 2),
(8, '2017_09_06_180254_create_accepted_product_requests_table', 2),
(9, '2017_09_06_180957_create_accepted_product_requests_table', 3),
(10, '2017_09_08_183902_create_customer_infos_table', 4),
(12, '2017_09_08_184152_create_order_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_info_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_info_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `customer_info_id`, `product_info_id`, `product_quantity`, `product_unit_price`, `customer_time_stamp`, `created_at`, `updated_at`) VALUES
(4, '4', '10', '28', '876', '2017-09-08 13:20:54', '2017-09-08 13:20:54', '2017-09-08 13:20:54'),
(5, '4', '16', '24', '60', '2017-09-08 13:20:54', '2017-09-08 13:20:54', '2017-09-08 13:20:54'),
(7, '5', '16', '10', '60', '2017-09-09 09:05:21', '2017-09-09 09:05:21', '2017-09-09 09:05:21'),
(8, '5', '15', '20', '10', '2017-09-09 09:05:21', '2017-09-09 09:05:21', '2017-09-09 09:05:21'),
(9, '6', '16', '1', '60', '2017-09-11 23:02:19', '2017-09-11 23:02:19', '2017-09-11 23:02:19'),
(10, '7', '16', '1', '60', '2017-09-11 23:10:18', '2017-09-11 23:10:18', '2017-09-11 23:10:18'),
(11, '8', '15', '50', '10', '2017-09-16 22:32:03', '2017-09-16 22:32:03', '2017-09-16 22:32:03'),
(12, '9', '23', '16', '50', '2017-09-16 22:42:44', '2017-09-16 22:42:45', '2017-09-16 22:42:45'),
(13, '10', '16', '5', '60', '2017-09-17 00:19:36', '2017-09-17 00:19:36', '2017-09-17 00:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sohanur550@gmail.com', '$2y$10$QAeo./Cnx/S.prd9lTA33eW0uPAv5Y6gPBaaudT5KDG1DO5/FBXi.', '2017-09-06 12:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'farmer',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `division`, `district`, `thana`, `village`, `contact_no`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sohanur Rahman', 'sohanur.cse.ru@gmail.com', 'Rajshahi', 'Rajshahi', 'Rajpara', 'Terokhadia', '01521477634', 'admin', '$2y$10$.cTFMO9HDYfFaXJGjn4N6ea8syiV5GCqT/YgKOZ4fINf6BQlTkRJW', 'n7NBsnSLJk7AHVUOKOTdt8uNzFRWU1yVHckRyhWiFTwPsqEQo4Hr1s40ivyP', '2017-09-06 11:11:42', '2017-09-06 11:11:42'),
(2, 'Tushar Mal', 'tushar@gmail.com', 'Jossore', 'jessore', 'mal', 'mal', '01765432176', 'farmer', '$2y$10$la4Z9HALXdAqCbj/Vh/e1eUCxYBsMyGG7VkENltYitAAOsV/WLVe6', 'o5IoITSv4jYRKN7LwdXrdm4Lp28TPWyjVrp9MzlEjJzV7oDcTbNwNRPvSNMb', '2017-09-06 11:12:37', '2017-09-06 11:12:37'),
(3, 'Tushar', 'sohanur550@gmail.com', 'khulna', 'jessore', 'sarsha', 'shorupdha', '01926127007', 'farmer', '$2y$10$NBe6wl2j8/B86Xpu04qfU.gICdM8IO08EimGUB9.GsvRCJYdNrsHK', '0ObBy58QChKnueVkC3BhR9CXfOPQu9abq3l3SAV4PUJ9FooYvyIXKcCSU3bC', '2017-09-06 12:37:15', '2017-09-06 12:37:15'),
(4, 'Md. Abdullah Al Maruf', 'abdulllahmaruf71@gmail.com', 'Rajshahi', 'Rajshahi', 'Rajpara', 'Terokhadia', '01521477634', 'admin', '$2y$10$FQ72e3NrM4A0H7MDnLHqzuL9VNg4JV119FAhTvDGG3nytGkBTNOnm', 'KW7i2FkVXCXN1MDw1D9g3phIEiUCtg03cYTT5mdIoHnU1E2tNZWbQdKlZ1Qu', '2017-09-16 02:49:15', '2017-09-16 02:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_product_requests`
--
ALTER TABLE `accepted_product_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_private_keys`
--
ALTER TABLE `admin_private_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_infos`
--
ALTER TABLE `customer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_requests`
--
ALTER TABLE `farmer_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- AUTO_INCREMENT for table `accepted_product_requests`
--
ALTER TABLE `accepted_product_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `admin_private_keys`
--
ALTER TABLE `admin_private_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer_infos`
--
ALTER TABLE `customer_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `farmer_requests`
--
ALTER TABLE `farmer_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
