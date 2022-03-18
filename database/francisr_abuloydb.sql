-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 07:51 AM
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
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` datetime NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_add` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` longtext NOT NULL,
  `date_of_death` datetime NOT NULL,
  `reg_firstname` varchar(255) NOT NULL,
  `reg_lastname` varchar(255) NOT NULL,
  `goal_amount` int(255) NOT NULL,
  `summary` longtext NOT NULL,
  `token` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `confirmation` int(1) DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `phone_number`, `email_add`, `password`, `avatar`, `date_of_death`, `reg_firstname`, `reg_lastname`, `goal_amount`, `summary`, `token`, `confirmation`, `date_created`) VALUES
(1, 'J', 'P', 'R', '1891-01-19 00:00:00', '9268632944', 'abuloyph.citychapels@gmail.com', '$2y$10$8Ge7kvnVtL9HiZ10Sc87C.utp1U/y0SIuvuxjcV9fFftr0wI5Q7Fq', 'assets/img/profile/Jose-Rizal.jpg', '1916-12-23 00:00:00', 'Francis', 'Reyes', 5000, 'National Hero', NULL, 0, '2022-03-17 08:13:08'),
(2, 'Jose', 'Protacio', 'Rizal', '1891-01-19 00:00:00', '9268632944', 'jpr@mail.com', '$2y$10$O049V5K3Hqb3ZskBcPL.6uZ2o8uHnw6PiRfeie6nFla0w5rQtlwcO', 'assets/img/profile/noimage.png', '1916-12-23 00:00:00', 'Francis', 'Reyes', 1000, 'Hero', NULL, 0, '2022-03-17 10:43:57'),
(3, 'Francis', 'None', 'Reyes', '1010-01-01 00:00:00', '9268632944', 'abuloyph.citychapels@gmail.com', '$2y$10$3hD4q1sR8pGux0KFrJlYmOs20q0yCSOJRKQlrokib0I/EripC0Z5S', 'assets/img/profile/noimage.png', '2020-01-01 00:00:00', 'Francis', 'Reyes', 123, 'khug', NULL, 0, '2022-03-17 11:14:10'),
(4, 'Jose', 'P', 'Rizal', '0001-01-01 00:00:00', '9268632944', 'abuloyph.citychapels@gmail.com', '$2y$10$0BBA9im9.VArPbRrB2G8Qucz3k2q2WqE8tVu5ihv3idySESrJQ49q', 'assets/img/profile/noimage.png', '0002-02-02 00:00:00', 'Francis', 'Reyes', 10000, 'Hero', NULL, 0, '2022-03-17 11:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts_info`
--

CREATE TABLE `tbl_accounts_info` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` int(255) NOT NULL,
  `gcash_number` int(11) NOT NULL,
  `donate_amount` int(255) NOT NULL,
  `donate_fees` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donate_funds`
--

CREATE TABLE `tbl_donate_funds` (
  `id` int(11) NOT NULL,
  `acct_info_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `total_donation` int(255) NOT NULL,
  `total_abuloy` int(255) NOT NULL,
  `total_fees` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `email_add` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `token` varchar(20) CHARACTER SET utf8 NOT NULL,
  `confirmation` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email_add`, `password`, `token`, `confirmation`) VALUES
(1, 'abuloyph.citychapels@gmail.com', '$2y$10$6.IazcoCVUxsP7H1c1ekQeFdXrpya0XnGNGYU5FMDRKN/lvvn/NCm', 'a8af9a6d3f', 0),
(2, 'abuloyph.citychapels@gmail.com', '$2y$10$gZdyTaYOqaIEfvgfpV.zJ.Zt/gVmIEMcA/FPHJXmn6GWe.hd/EkMS', '53d53010db', 0),
(3, 'abuloyph.citychapels@gmail.com', '$2y$10$88j5JneeMwWpZ9TJS5OI/uVZO8AVxYAgCFpkrR0WJD3Oga1e5KV8a', '32e3c2af83', 0),
(4, 'tdm@gmail.com', '$2y$10$Ho2fz1ub/ZCkXn9.8b.39ONWog7pVlMM1ZZ5hrvdnRVe3EHCrW5.e', '680ec801bb', 0),
(5, 'tdm@gmail.com', '$2y$10$/NUarc3V46ORFZyZqbPfW.wyq1Tc7kenzHku0Pt1AXX9MW688i2PG', 'a70956f203', 0),
(6, 'tdm@gmail.com', '$2y$10$veOO2v0gB8xlSzwfj2/ce.jdDe9PykyMYHu74B4VH5HevwJgcB..q', '2821df5bfe', 0),
(7, 'tdm@gmail.com', '$2y$10$sQqc4jMfslQKFM7IxII42esH5Q9dcnffo2KVbmUv6QRKIm88yqhhC', '525b54dd02', 0),
(8, 'tdm@gmail.com', '$2y$10$GpG344.7CnLvkblY84vDiO5jTxo4J2vyR7o2RJUfRYRakJ4KWx716', 'beabd45e7f', 0),
(9, 'abuloyph.citychapels@gmail.com', '$2y$10$9lXTbecmcK1wG.hByAQRoeppTucYS2/Y0zd4VDoi033y0oVv6h9FW', 'b5d8fe69af', 0),
(10, 'abuloyph.citychapels@gmail.com', '$2y$10$uSRdkQzY6ucAwVHfdGj9ees7kgSwQImT1eFuq/0JBKYawV4BI3fd6', '34191f5250', 0),
(11, 'abuloyph.citychapels@gmail.com', '$2y$10$HFSwrRxFX33PaMZA9PYKtuzdldgDb9zisvEYpNnLUDP1kDKc8HCDi', '6b024b6ac3', 0),
(12, 'abuloyph.citychapels@gmail.com', '$2y$10$RYTNGWv/e9xbKwaxAlLUdOKtz1t5X0Z/1FLunaZzGXrYr1iKp986i', 'dc83d06ebb', 0),
(13, 'jenneledm09@gmail.com', '$2y$10$Tpo6TEknLIuHm8/Zx4lPpu.axdRASR8G25KnmAGyBsov76DXC8Xiy', 'c54cbbdfca', 0),
(14, 'jesseledm@gmail.com', '$2y$10$.75QlR1oc/KXFTMHsy8zt.N5xdkUAIS9DJBM0LmXFXaeONH4ANsdC', '3c4d4d2319', 0),
(15, 'abuloyph.citychapels@gmail.com', '$2y$10$BdinwT4.r332PX0iHMT5bewriI9drK911GWymtWN2Wu7XbMUkC8jK', 'f8119de770', 0),
(16, 'abuloyph.citychapels@gmail.com', '$2y$10$10q2/LIcYuCYbmaXXiJ5LuaXPaiweq99FtrvPJ.XQPw3WRsRkNeGi', 'ebfef6ab51', 0),
(17, 'abuloyph.citychapels@gmail.com', '$2y$10$4mvQQ.jCKAkzSgSTwH4JFOu.x1YSAuwmLSTe8NnKr/xakzujSfKWm', 'd3c7592626', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts_info`
--
ALTER TABLE `tbl_accounts_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donate_funds`
--
ALTER TABLE `tbl_donate_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_accounts_info`
--
ALTER TABLE `tbl_accounts_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_donate_funds`
--
ALTER TABLE `tbl_donate_funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
