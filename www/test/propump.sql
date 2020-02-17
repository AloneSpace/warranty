-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 02:56 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propump`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `created_in` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `type`, `created_in`) VALUES
(1, 'admin@admin.com', '$2y$10$4EzWbR1X1HBdb9W.UxceKOnWpUjzIjHPFPjMr5M51sU3/Y.3wbDZK', 'super_admin', '2020-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `db`
--

CREATE TABLE `db` (
  `id` int(11) NOT NULL,
  `warranty_number` text COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` text COLLATE utf8_unicode_ci NOT NULL,
  `purchase_date` text COLLATE utf8_unicode_ci NOT NULL,
  `customer` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `shop_name` text COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `file_extension` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db`
--

INSERT INTO `db` (`id`, `warranty_number`, `serial_number`, `purchase_date`, `customer`, `address`, `email`, `mobile`, `phone`, `shop_name`, `staff_id`, `image`, `file_extension`) VALUES
(3, '', '1234567890', '05/01/2020', 'AloneCoding', 'Test', 'admin@admin.com', '0954698230', '0954698230', '', '', '20200115035714_c56bf2bebdad989c74e74a2d3b52ebfb', 'jpg'),
(4, '', '12345678907', '01/18/2020', 'Thanos', 'test', 'admin@admin.com', '0954698230', '0954698230', 'TestShop', '123456789', '20200118090949_0ec1d28e168a6db17dce73c040a21642', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `login_date` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `username`, `type`, `login_date`) VALUES
(5, 'admin@admin.com', 'super_admin', '18/01/2020 09:58:56'),
(6, 'admin@admin.com', 'super_admin', '18/01/2020 09:59:56'),
(7, 'admin@admin.com', 'super_admin', '18/01/2020 10:02:22'),
(8, 'admin@admin.com', 'super_admin', '18/01/2020 10:04:49'),
(9, 'test', 'admin', '18/01/2020 12:34:17'),
(10, 'admin@admin.com', 'super_admin', '18/01/2020 12:35:33'),
(11, 'test', 'admin', '18/01/2020 15:14:09'),
(12, 'admin@admin.com', 'super_admin', '18/01/2020 15:19:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db`
--
ALTER TABLE `db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db`
--
ALTER TABLE `db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
