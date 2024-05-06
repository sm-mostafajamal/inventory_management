-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2024 at 02:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `sr_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category`, `quantity`, `total`, `sr_name`, `sr_company`, `sr_phone`, `image`, `created_at`, `updated_at`) VALUES
(11, 'softrobo', 12, 'others', 1, 12, 'testingtesting', 'softrobot', '01855536222', '1714919818.jpg', '2024-05-05 14:36:58', '2024-05-05 14:43:32'),
(12, 'name', 12, 'personal_care', 12, 144, 'treset', 'coman', '01855536223', '1714920051.jpg', '2024-05-05 14:40:51', '2024-05-05 14:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `image`, `updated_at`, `created_at`) VALUES
(1, 'Mostafa', 'admin', 'test@test.com', '01855536222', '$2y$10$yXfVnCnsk2IcPEaCGTt8CeOsX6dHoqWjXxy/CghIu1KA7zXeSgskG', '1714923339.png', '2024-05-05 15:35:39', '2024-04-17 14:16:30'),
(2, 'mostafa', 'mostafa', 'test@email.com', '01855536222', '$2y$10$HoeXB24TrShJIUtf.btfHuqkaEqob9M1NBSRWEUv2XPV7woZJ7Ide', NULL, '2024-04-17 17:29:45', '2024-04-17 17:22:57'),
(3, 'test', 'testing', 'test@test.com', '01855536222', '$2y$10$MuobH4kYUdeMY./87kjGRujpqFWnbKJzb1MsLz/i8QOsYEYlMG0OS', NULL, '2024-05-05 15:37:24', '2024-05-05 15:37:24'),
(4, 'test', 'testingt', 'test@test.com', '01855536222', '$2y$10$Hlaj1FyGskX0ZE4.y.fD0OpQLCVkjh5kWNnJYj8P6pgIsFdwqAz7q', '1714923779.png', '2024-05-05 15:42:59', '2024-05-05 15:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
