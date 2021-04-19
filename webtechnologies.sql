-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 10:01 AM
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
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connectiontable`
--

INSERT INTO `connectiontable` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`) VALUES
(1, 'Malina', 'Benchea', 'malinaBenchea', 'malina16fnl@gmail.com', 'MalinaBenchea123'),
(2, 'Ionut', 'Hristea', 'ionutHristea', 'hristeaionut72@gmail.com', 'IonutHristea123'),
(3, 'Tudor', 'Neculau', 'tudorNeculau', 'neculautudor02@gmail.com', 'TudorNeculau123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectiontable`
--
ALTER TABLE `connectiontable`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
