-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 07:49 AM
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
  `reg_firstname` varchar(255) NOT NULL,
  `reg_lastname` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `d_firstname` varchar(255) DEFAULT NULL,
  `d_middlename` varchar(255) DEFAULT NULL,
  `d_lastname` varchar(255) DEFAULT NULL,
  `d_birthdate` datetime DEFAULT NULL,
  `d_date_of_death` datetime DEFAULT NULL,
  `d_avatar` longtext DEFAULT NULL,
  `d_goal_amount` int(255) DEFAULT NULL,
  `d_summary` longtext DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `reg_firstname`, `reg_lastname`, `email_add`, `phone_number`, `d_firstname`, `d_middlename`, `d_lastname`, `d_birthdate`, `d_date_of_death`, `d_avatar`, `d_goal_amount`, `d_summary`, `date_created`) VALUES
(1, 2, 'Jessele', 'Del Earth', 'jesseledm@gmail.com', 910203040, 'Jose', 'P', 'Rizal', '2022-03-17 17:49:31', '2022-03-17 17:49:33', 'no-logo.png', 1000, 'National Hero', '2022-03-17 17:49:33'),
(2, 1, 'Administrator', 'Abuloy', 'admin@gmail.com', 912344567, 'Andres', 'L', 'Bonifacio', '2022-03-01 11:28:15', '2022-03-17 11:28:15', 'no-logo.png', 10000, 'Leader of KKK', '2022-03-18 11:28:15');

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
(1, 'AbuloyPH', 'info@abuloy.ph', '+6397701234567', 'Sto. Tomas, Batangas', 'no-logo.png');

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
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `avatar`, `date_created`) VALUES
(1, 'Administrator', ' Abuloy', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '1639091160_144119.jpg', '2021-12-10 05:16:23'),
(2, 'Jessele', 'Del Earth', 'jesseledm@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 2, '1647502860_pexels-oleg-magni-2033981.jpg', '2022-03-17 15:41:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
