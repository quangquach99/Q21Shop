-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 06:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q21shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(6) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_parent` int(6) UNSIGNED NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_parent`, `reg_date`) VALUES
(1, '----ROOT----', 0, '2020-06-10 07:29:00'),
(11, 'Men', 1, '2020-06-10 14:10:39'),
(12, 'Women', 1, '2020-06-10 14:10:44'),
(15, 'Leather Jacket', 13, '2020-06-10 14:46:43'),
(17, 'Shirt', 16, '2020-06-10 14:47:01'),
(22, 'Jacket', 11, '2020-06-11 13:38:59'),
(23, 'Dress', 12, '2020-06-11 13:39:06'),
(24, 'Leather Jacket', 22, '2020-06-12 03:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_state` int(2) UNSIGNED NOT NULL,
  `product_category` int(6) UNSIGNED DEFAULT NULL,
  `product_image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `product_highlight` int(1) UNSIGNED NOT NULL,
  `product_quantity` int(10) UNSIGNED NOT NULL,
  `product_details` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_price`, `product_state`, `product_category`, `product_image`, `product_highlight`, `product_quantity`, `product_details`, `product_description`, `reg_date`) VALUES
(1, 'B123', 'Black Jacket', '999999.00', 1, 11, 'ao-khoac.jpg', 0, 0, NULL, NULL, '2020-06-11 02:44:44'),
(2, 'M1', 'MadMan', '1000000.00', 0, 11, 'ao-khoac.jpg', 0, 0, NULL, NULL, '2020-06-11 02:52:37'),
(3, 'WM1', 'MadWoman', '1100000.00', 1, 12, 'ao-khoac.jpg', 0, 0, NULL, NULL, '2020-06-11 02:52:37'),
(4, 'M2', 'CrazyMan', '2000000.00', 1, 11, 'ao-khoac.jpg', 0, 0, NULL, NULL, '2020-06-11 02:52:37'),
(5, 'Q1-FU', 'QUANG OK', '9999999.00', 1, 11, 'Q123.jpg', 1, 1, 'Ok', 'GOOD', '2020-06-11 08:44:55'),
(6, 'asd-iujj', 'asef', '123.00', 1, 11, 'asd-iujj.jpg', 1, 123, 'ggg', 'ghh', '2020-06-11 13:38:25'),
(7, 'J-001', 'Jacket For Man', '1000000.00', 1, 22, 'J-001.jpeg', 1, 99, 'A polite product for any gentlemen!!!', 'Product made of real croc skin!!!', '2020-06-11 13:42:00'),
(8, 'DR-0001', 'Transparent Dress', '9999999.00', 1, 23, 'DR-0001.jpg', 1, 10, 'This product can raise any man desire!!!', 'See anything through the dress!!!', '2020-06-11 13:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_level` tinyint(1) DEFAULT 0,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_fullname`, `user_email`, `user_phone`, `user_address`, `user_level`, `reg_date`) VALUES
(8, 'deanwinchester', '$2y$10$CUFMxOU6U87jM5CQso410etPPuP62LM9l039NvXQ9FloczdSGIDRG', 'Dean Winchester', 'deanwinchester@gmail.com', '01111111111', 'Kansas', 1, '2020-06-04 08:16:48'),
(11, 'samwinchester', '$2y$10$skj4QHO/MOxIdA7IjrdX5.BC1L6UDOje/VDdf6tE6YwfwOedOLB6u', 'Sam Winchester', 'samwinchester@gmail.com', '09993939393', 'Kansas', 0, '2020-06-07 06:19:30'),
(12, 'johnwinchester', '$2y$10$qN1h6I6zMOWmuG3ZTaqXPu4ashhlMMBNzwzGVg08JbD467R9AnD92', 'John Winchester', 'johnwinchester@gmail.com', '09991113334', 'Kansas', 1, '2020-06-09 03:38:07'),
(13, 'chuck', '$2y$10$FcqogNiENWkGkMU/2gA5MueOH2v8nUEYRI8kXkuoxD/jWxHTZtjde', 'Chuck', 'chuck@gmail.com', '0000000000', 'Everywhere', 1, '2020-06-11 13:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
