-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 05:53 AM
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(6) UNSIGNED NOT NULL,
  `order_state` tinyint(1) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_state`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `reg_date`) VALUES
(1, 1, 'Dean Winchester', '0123123123', 'deanwinchester@gmail.com', 'kansas', '2020-06-15 02:21:29'),
(2, 1, 'Sam Winchester', '0123123444', 'samwinchester@gmail.com', 'kansas', '2020-06-13 05:51:39'),
(3, 1, 'Quang Quec', '0355764662', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:39:28'),
(4, 1, 'Trung', '09999998213', 'a@gmail.com', 'HN', '2020-06-16 12:49:02'),
(5, 0, 'Tuan', '09999998214', 'b@gmail.com', 'HN', '2020-06-16 12:49:02'),
(6, 0, 'Hao', '09999998215', 'c@gmail.com', 'HN', '2020-06-16 12:49:02'),
(7, 1, 'Khanh', '0999999816', 'd@gmail.com', 'HN', '2020-06-16 12:49:02'),
(8, 0, 'Duong', '0999999817', 'e@gmail.com', 'HN', '2020-06-16 12:49:03'),
(9, 1, 'Duc', '0999999818', 'f@gmail.com', 'HN', '2020-06-16 12:49:03'),
(10, 0, 'Tung', '0999999819', 'g@gmail.com', 'HN', '2020-06-16 12:49:03'),
(11, 0, 'Huy', '0999999820', 'h@gmail.com', 'HN', '2020-06-16 12:49:03'),
(12, 0, 'AAA', '0355764663', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:44'),
(13, 1, 'BBB', '0355764664', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:44'),
(14, 0, 'CCC', '0355764665', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:44'),
(15, 1, 'DDD', '0355764666', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45'),
(16, 0, 'EEE', '0355764667', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45'),
(17, 0, 'FFF', '0355764668', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45'),
(18, 1, 'GGG', '0355764669', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45'),
(19, 0, 'HHH', '0355764671', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45'),
(20, 1, 'III', '0355764672', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45'),
(21, 0, 'KKK', '0355764673', 'caothubongro5899@gmail.com', 'HN', '2020-06-16 12:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(6) UNSIGNED NOT NULL,
  `order_id` int(6) UNSIGNED NOT NULL,
  `product_id` int(6) NOT NULL,
  `order_details_quantity` int(6) UNSIGNED NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `order_details_quantity`, `reg_date`) VALUES
(1, 1, 3, 9, '2020-06-13 05:35:51'),
(2, 1, 4, 7, '2020-06-13 05:35:54'),
(3, 2, 5, 1, '2020-06-13 05:35:57'),
(4, 2, 6, 2, '2020-06-13 05:36:01'),
(5, 21, 1, 10, '2020-06-16 12:43:43'),
(6, 20, 3, 10, '2020-06-16 12:43:43'),
(7, 19, 4, 10, '2020-06-16 12:43:43'),
(8, 18, 5, 10, '2020-06-16 12:43:44'),
(9, 17, 6, 10, '2020-06-16 12:43:44'),
(10, 16, 8, 10, '2020-06-16 12:43:44'),
(11, 15, 9, 10, '2020-06-16 12:43:44'),
(12, 14, 9, 10, '2020-06-16 12:43:44'),
(13, 13, 8, 10, '2020-06-16 12:43:44'),
(14, 12, 6, 10, '2020-06-16 12:43:44'),
(15, 11, 6, 10, '2020-06-16 12:43:44'),
(16, 10, 5, 10, '2020-06-16 12:43:44'),
(17, 9, 4, 10, '2020-06-16 12:43:44'),
(18, 8, 3, 10, '2020-06-16 12:43:44'),
(19, 7, 1, 10, '2020-06-16 12:43:44'),
(20, 19, 3, 10, '2020-06-16 12:43:44'),
(21, 6, 4, 10, '2020-06-16 12:43:44'),
(22, 5, 5, 10, '2020-06-16 12:43:44'),
(23, 4, 6, 10, '2020-06-16 12:43:44'),
(24, 3, 8, 10, '2020-06-16 12:43:44');

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
(1, 'WM1-FU', 'THU OK1', '999999.00', 1, 12, 'M1-FU.jpg', 1, 999999, 'asdfsadfg', 'ggggrrrgr', '2020-06-12 05:07:30'),
(3, 'WMT1', 'MadWoman', '99900.00', 1, 12, 'WMT1.jpg', 0, 1100000, 'htsdf', 'hgsdgfd', '2020-06-12 05:08:35'),
(4, 'M2', 'CrazyMan', '2000000.00', 1, 11, 'ao-khoac.jpg', 0, 0, NULL, NULL, '2020-06-11 02:52:37'),
(5, 'Q1-FU', 'QUANG OK', '9999999.00', 1, 11, 'Q123.jpg', 1, 1, 'Ok', 'GOOD', '2020-06-11 08:44:55'),
(6, 'asd-iujj', 'asef', '123.00', 1, 11, 'asd-iujj.jpg', 1, 123, 'ggg', 'ghh', '2020-06-11 13:38:25'),
(8, 'DR-0001', 'Transparent Dress', '9999999.00', 1, 23, 'DR-0001.jpg', 1, 10, 'This product can raise any man desire!!!', 'See anything through the dress!!!', '2020-06-11 13:44:14'),
(9, 'BlLJM', 'Blue Leather Jacket', '1111111.00', 1, 24, 'BlLJM.jpg', 0, 12, '1234', '5678', '2020-06-12 04:51:11');

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
(13, 'chuck', '$2y$10$FcqogNiENWkGkMU/2gA5MueOH2v8nUEYRI8kXkuoxD/jWxHTZtjde', 'Chuck', 'chuck@gmail.com', '0000000000', 'Everywhere', 1, '2020-06-11 13:24:51'),
(14, 'donaldtrump', '$2y$10$4FR/X4IGQFMX69uqQQC4m.AerpyNdQc5wogC8TJ2DIfRgKviMrbL6', 'Donal Trump', 'donaltrump@gmail.com', '01231231231', '01231231231', 0, '2020-06-15 02:15:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
