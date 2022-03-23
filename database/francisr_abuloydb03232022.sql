-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 10:53 AM
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
  `avatar` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `d_goal_amount` text CHARACTER SET utf8mb4 NOT NULL,
  `d_summary` longtext CHARACTER SET utf8mb4 NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `type`, `d_firstname`, `d_middlename`, `d_lastname`, `d_birthdate`, `d_date_of_death`, `avatar`, `d_goal_amount`, `d_summary`, `date_created`) VALUES
(1, 6, 2, 'Andres', 'L', 'Bonifacio', '2022-03-01 15:54:06', '2022-03-23 15:54:06', 'no-logo.png', '1000', 'KKK', '2022-03-23 15:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `gcash_payments`
--

CREATE TABLE `gcash_payments` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT 2,
  `gcash_number` varchar(255) DEFAULT NULL,
  `gcash_amount` varchar(255) NOT NULL,
  `gcash_fee` int(30) NOT NULL,
  `gcash_abuloy_fee` int(30) NOT NULL,
  `gcash_abuloy_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gcash_payments`
--

INSERT INTO `gcash_payments` (`id`, `account_id`, `user_type`, `gcash_number`, `gcash_amount`, `gcash_fee`, `gcash_abuloy_fee`, `gcash_abuloy_amount`) VALUES
(1, 1, 2, '9771936413', '100', 0, 0, '95');

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
  `avatar` text DEFAULT '\'no-image-available.png\'',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `phone_number`, `avatar`, `date_created`) VALUES
(1, 'JESSELE', 'DEL MUNDO', 'jesseledm@gmail.com', '96f0f08c0188ba04898ce8cc465c19c4', 2, '9771936413', '\'no-image-available.png\'', '2022-03-23 10:55:54'),
(2, 'Francis', 'Reyes', 'abuloyph.citychapels@gmail.com', '36f17c3939ac3e7b2fc9396fa8e953ea', 2, '9268632944', '\'no-image-available.png\'', '2022-03-23 10:57:09'),
(3, 'JESSELE', 'DEL MUNDO', 'dmjessele@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 2, '9771936413', '\'no-image-available.png\'', '2022-03-23 11:50:45'),
(4, 'J', 'J', 'jn@mail.com', 'd26f376ccf6c8edb1a02aa9e29aa6e3f', 2, '9687689123', '\'no-image-available.png\'', '2022-03-23 11:57:42'),
(5, 'J', 'N', 'jn@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 2, '9123456789', '\'no-image-available.png\'', '2022-03-23 13:21:33'),
(6, 'Jennele', 'DM', 'jinel@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 2, '9123456787', '\'no-image-available.png\'', '2022-03-23 15:53:21');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gcash_payments`
--
ALTER TABLE `gcash_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
