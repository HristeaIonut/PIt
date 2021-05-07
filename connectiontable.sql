-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 10:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechnologies`
--

-- --------------------------------------------------------

--
-- Table structure for table `connectiontable`
--

CREATE TABLE `connectiontable` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connectiontable`
--

INSERT INTO `connectiontable` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`) VALUES
(2, 'Ionut', 'Hristea', 'ionutHristea', 'hristeaionut72@gmail.com', 'HristeaIonut123'),
(3, 'Tudor', 'Neculau', 'tudorNeculau', 'neculautudor02@gmail.com', 'NeculauTudor123'),
(4, 'firstName', 'lastName', 'userName', 'email@email.com', 'password123'),
(5, 'attempt2', 'att2_name', 'userName2', 'email2@email.com', 'password123'),
(6, 'firstName1', 'lastName1', 'userName1', 'email1@email.com', 'password123'),
(8, 'Malina', 'Benchea', 'MalinaBenchea', 'malina16fnl@gmail.com', '$2y$10$VHUdcb6H20gJ4L2TVEpZmexP9jJYidsDyu3y007iD8uRHfYBOkpqG'),
(9, 'firstName', 'lastName', 'username123', 'email3@email.com', '$2y$10$0MxS80SaZy2mxGo4/FUsrex2m/bS2fIlqWtZJEx9/dnptzmQTQMRy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectiontable`
--
ALTER TABLE `connectiontable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connectiontable`
--
ALTER TABLE `connectiontable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
