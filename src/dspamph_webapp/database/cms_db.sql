-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 11:21 AM
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
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(30) NOT NULL,
  `client_code` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 2= Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `client_code`, `password`, `fullname`, `status`, `date_created`, `date_updated`) VALUES
(8, '20230004', '01205a2c4208bb1a4562037e62464387', 'BALLENAS, MARVIN M.', 1, '2023-10-17 10:56:32', '2023-11-08 13:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `client_meta`
--

CREATE TABLE `client_meta` (
  `client_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_meta`
--

INSERT INTO `client_meta` (`client_id`, `meta_field`, `meta_value`) VALUES
(8, 'lastname', 'BALLENAS'),
(8, 'firstname', 'MARVIN'),
(8, 'middlename', 'M.'),
(8, 'gender', 'Male'),
(8, 'dob', '2001-07-06'),
(8, 'contact', '09363816887'),
(8, 'address', 'Palma, Barbaza, Antique'),
(8, 'email', 'marvin.ballenas@wvsu.edu.ph');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'D-Spam Philippines'),
(6, 'short_name', ''),
(11, 'logo', 'uploads/logo-1636098009.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1636097638.png'),
(15, 'content', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Admin', NULL, 'Manager', 'NTC_PH', '85e8f2b6d97e1ab78960bd3d6ab91bab', 'uploads/avatar-1.png?v=1635556826', NULL, 1, '2021-01-20 14:02:37', '2023-11-13 22:12:29'),
(15, 'NTC', NULL, 'Region_6', 'NTC', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 1, '2023-09-27 15:49:51', '2023-10-17 10:54:07'),
(17, 'Aeron', NULL, 'Rose', 'Smart', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 3, '2023-11-13 15:56:06', '2023-11-13 22:32:05'),
(18, 'Vin', NULL, 'Ballenas', 'vvinmb06', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-13 16:33:29', '2023-11-13 22:55:03'),
(20, 'Juan', NULL, 'Dela Cruz', 'JDC.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-14 14:06:43', NULL),
(21, 'Jose', NULL, 'Rizal', 'JR.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-14 14:19:18', NULL),
(22, 'Tiburcio', NULL, 'Dimaguiba', 'TD.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 3, '2023-11-14 14:20:37', NULL),
(23, 'Princess', NULL, 'Batumbakal', 'PB.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-14 14:22:54', NULL),
(24, 'Ben', NULL, 'Ten', 'BT.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 3, '2023-11-14 14:24:54', NULL),
(25, 'Peter', NULL, 'Mendes', 'PM.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-14 14:25:11', NULL),
(26, 'Allison', NULL, 'Swift', 'AS.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-14 14:25:28', NULL),
(27, 'Peter', NULL, 'Parker', 'Spidey.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-14 14:25:54', NULL),
(28, 'Trial', NULL, '1', 'Trial1', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 1, '2023-11-14 14:27:04', NULL),
(30, 'Marianne Mae Therese', NULL, 'Adorable', 'A.WVSU', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 1, '2023-11-16 12:48:41', NULL),
(31, 'MARVIN', NULL, 'BALLENAS', 'vin.wvsu', '85e8f2b6d97e1ab78960bd3d6ab91bab', NULL, NULL, 2, '2023-11-21 22:54:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `user_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_meta`
--
ALTER TABLE `client_meta`
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_meta`
--
ALTER TABLE `client_meta`
  ADD CONSTRAINT `client_meta_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
