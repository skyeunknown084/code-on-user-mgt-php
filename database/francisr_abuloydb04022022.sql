-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 10:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `francisr_abuloydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = user',
  `d_firstname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `d_middlename` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `d_lastname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `d_birthdate` datetime NOT NULL,
  `d_date_of_death` datetime NOT NULL,
  `d_goal_amount` text CHARACTER SET utf8mb4 NOT NULL,
  `d_summary` longtext CHARACTER SET utf8mb4 NOT NULL,
  `avatar` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `type`, `d_firstname`, `d_middlename`, `d_lastname`, `d_birthdate`, `d_date_of_death`, `d_goal_amount`, `d_summary`, `avatar`, `date_created`) VALUES
(1, 1, 2, 'Andres', 'F', 'Bonifacio', '0001-01-01 00:00:00', '0002-02-02 00:00:00', '100000', 'KKK', '1648112880_Andres-Bonifacio.jpg', '2022-03-24 17:08:15'),
(2, 1, 2, 'Jose', 'P', 'Rizal', '1861-06-19 00:00:00', '1896-12-30 00:00:00', '1000000', 'National Hero', '1648113420_Jose-Rizal.jpg', '2022-03-24 17:17:08'),
(3, 2, 2, 'Juan', 'H', 'Luna', '0001-01-01 00:00:00', '0002-02-02 00:00:00', '2000000', 'Heneral', '1648113480_Luna.jpg', '2022-03-24 17:18:02'),
(4, 1, 2, 'Emilio', 'A', 'Aguinaldo', '0001-01-01 00:00:00', '0002-02-02 00:00:00', '1000000', 'Emilio', '1648451820_Emilio-Aguinaldo.jpg', '2022-03-28 15:17:42'),
(5, 2, 2, 'Rocky', 'M', 'Lake', '0001-01-01 00:00:00', '0002-02-02 00:00:00', '1000', 'Rocky Mountain Lake', '1648541940_rocky-lake.jpg', '2022-03-29 16:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `gcash_payments`
--

CREATE TABLE `gcash_payments` (
  `id` int(11) NOT NULL,
  `account_id` int(30) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT 2,
  `gcash_number` varchar(255) DEFAULT NULL,
  `gcash_amount` varchar(255) NOT NULL,
  `gcash_fee` int(30) NOT NULL,
  `gcash_abuloy_fee` int(30) NOT NULL,
  `gcash_abuloy_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gcash_payments`
--

INSERT INTO `gcash_payments` (`id`, `account_id`, `user_type`, `gcash_number`, `gcash_amount`, `gcash_fee`, `gcash_abuloy_fee`, `gcash_abuloy_amount`) VALUES
(1, 1, 2, '9771936413', '100', 0, 0, '95'),
(2, 2, 2, NULL, '1000', 0, 0, NULL),
(3, 2, 0, NULL, '700', 0, 0, NULL),
(4, 2, 2, NULL, '800', 0, 0, NULL),
(5, 1, 2, NULL, '350', 0, 0, NULL),
(6, 1, 2, NULL, '450', 0, 0, NULL),
(7, 1, 2, NULL, '505', 0, 0, NULL),
(8, 1, 2, NULL, '111', 0, 0, NULL),
(9, 4, 2, NULL, '222', 0, 0, NULL),
(10, 4, 2, NULL, '333', 0, 0, NULL),
(11, 2, 0, NULL, '10000', 0, 0, NULL),
(12, 2, 0, NULL, '252', 0, 0, NULL),
(13, 2, 0, NULL, '252', 0, 0, NULL),
(14, 2, 2, NULL, '10', 0, 0, NULL),
(15, 1, 2, NULL, '2', 0, 0, NULL),
(16, 2, 2, NULL, '10000', 0, 0, NULL),
(17, 4, 2, NULL, '500', 0, 0, NULL),
(18, 1, 2, NULL, '5555', 0, 0, NULL),
(19, 2, 2, NULL, '123', 0, 0, NULL),
(20, 1, 2, NULL, '321', 0, 0, NULL),
(21, 4, 2, NULL, '54321', 0, 0, NULL),
(22, 1, 2, NULL, '12345', 0, 0, NULL),
(23, 2, 2, NULL, '1896', 0, 0, NULL),
(24, 3, 2, NULL, '123456', 0, 0, NULL),
(25, 5, 2, NULL, '654', 0, 0, NULL),
(26, 3, 2, NULL, '500', 0, 0, NULL),
(27, 3, 2, NULL, '159', 0, 0, NULL),
(28, 0, 2, NULL, '158', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Abuloy', 'citychapels@gmail.com', '+63 (977) 811 3377', 'City Chapels Inc., General Malvar Avenue,\nBarangay San Roque, Santo Tomas City, Batangas, Philippines, 4234', 'no-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = user',
  `phone_number` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `phone_number`,`date_created`) VALUES
(1, 'Francis', 'Reyes', 'abuloyph.citychapels@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 2, '9268632944', '2022-03-24 17:07:40'),
(2, 'JESSELE', 'DEL MUNDO', 'jesseledm@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 2, '9771936413', '2022-03-24 17:17:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcash_payments`
--
ALTER TABLE `gcash_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gcash_payments`
--
ALTER TABLE `gcash_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
