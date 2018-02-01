-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2018 at 03:22 am
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `short`
--
DROP DATABASE IF EXISTS `short`;
CREATE DATABASE IF NOT EXISTS `short` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `short`;

-- --------------------------------------------------------

--
-- Table structure for table `add_user`
--

DROP TABLE IF EXISTS `add_user`;
CREATE TABLE `add_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `add_user`
--

TRUNCATE TABLE `add_user`;
--
-- Dumping data for table `add_user`
--

INSERT INTO `add_user` (`id`, `login`, `password`) VALUES
(1, '123', '$2y$10$U03NxKYZNF7MLHlS0RoP3OfGF6901qxq1ptJcbR5ln3fXbmbBVvO6');

-- --------------------------------------------------------

--
-- Table structure for table `add_user_group`
--

DROP TABLE IF EXISTS `add_user_group`;
CREATE TABLE `add_user_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `add_user_group`
--

TRUNCATE TABLE `add_user_group`;
--
-- Dumping data for table `add_user_group`
--

INSERT INTO `add_user_group` (`id`, `name`) VALUES
(1, 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `short_url`
--

DROP TABLE IF EXISTS `short_url`;
CREATE TABLE `short_url` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `short_url`
--

TRUNCATE TABLE `short_url`;
--
-- Dumping data for table `short_url`
--

INSERT INTO `short_url` (`id`, `name`, `url`, `category`) VALUES
(1, '123', 'http://moneyfront.fack:8888/dashboard/create_url.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `short_url_category`
--

DROP TABLE IF EXISTS `short_url_category`;
CREATE TABLE `short_url_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `short_url_category`
--

TRUNCATE TABLE `short_url_category`;
--
-- Dumping data for table `short_url_category`
--

INSERT INTO `short_url_category` (`id`, `name`) VALUES
(1, 'qwe123'),
(2, 'qwe123q'),
(3, '342'),
(4, '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'User Id',
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Users email address',
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'User password',
  `act_hash` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time and date the user registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Users table';

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login`, `email`, `password`, `act_hash`, `reg_time`) VALUES
(1, 'qweqwe', 'qwe@qwe.qwe', '$2y$10$4jH0Hb1Y6WZVk8TnOmzhNuUGKcbpV4vOeBvwSDmWDSRfBM06TRS32', NULL, '2018-01-31 21:22:24'),
(2, 'qweqweqweqweqweqwe', 'qwe@qweqwe.qwe', '$2y$10$fAJvfNk27Q7uhjmvAOrzQuzsHtpRr8355LC7p8wTolukwqMEfxNGO', '83848dd33c2ef2b9f1540a75ec632c9d', '2018-01-31 22:04:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_user`
--
ALTER TABLE `add_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_user_group`
--
ALTER TABLE `add_user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_url`
--
ALTER TABLE `short_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_url_category`
--
ALTER TABLE `short_url_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_user`
--
ALTER TABLE `add_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `add_user_group`
--
ALTER TABLE `add_user_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `short_url`
--
ALTER TABLE `short_url`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `short_url_category`
--
ALTER TABLE `short_url_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Id', AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
