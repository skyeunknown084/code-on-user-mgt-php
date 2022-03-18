-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 09:32 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `manager_id` int(30) NOT NULL,
  `user_ids` text NOT NULL,
  `project_url` longtext NOT NULL,
  `project_time_sheet` longtext NOT NULL,
  `project_files` longtext NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_list`
--

INSERT INTO `project_list` (`id`, `name`, `description`, `status`, `start_date`, `end_date`, `manager_id`, `user_ids`, `project_url`, `project_time_sheet`, `project_files`, `date_created`) VALUES
(21, 'Project One', '																																								Proj One																																			', 1, '2021-12-10', '2021-12-17', 17, '18,20', 'https://docs.google.com/spreadsheets/d/1VPYzRekHOMXbRFmHUASxOZDdOuxMYn8se4cjgW_a_8U/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1NKXcLS3rcaNcnDc_ej0YB38FqE_HKjyx7aqQWFOnWqA/edit#gid=0', '', '2021-12-10 05:54:59'),
(22, 'Project Two', '								Proj Two							', 1, '2021-12-10', '2021-12-17', 16, '21,19', 'https://docs.google.com/spreadsheets/u/0/', 'https://docs.google.com/spreadsheets/u/0/', '', '2021-12-10 05:58:48'),
(23, 'Project Three', '								Proj Three							', 1, '2021-12-10', '2021-12-24', 16, '18,21,22', 'https://docs.google.com/spreadsheets/u/0/', 'https://docs.google.com/spreadsheets/u/0/', '', '2021-12-10 06:14:10'),
(24, 'Project Four', 'Proj Four', 1, '2021-12-10', '2021-12-31', 16, '18,20,21,19,22', 'https://docs.google.com/spreadsheets/u/0/', 'https://docs.google.com/spreadsheets/u/0/', '', '2021-12-10 06:51:29'),
(25, 'Project Five', 'Project Five', 1, '2021-12-10', '2022-01-07', 17, '18,20,21,19,22', 'https://docs.google.com/spreadsheets/u/0/', 'https://docs.google.com/spreadsheets/u/0/', '', '2021-12-10 07:11:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
