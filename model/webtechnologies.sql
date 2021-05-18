-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 08:34 PM
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
-- Table structure for table `pastes`
--

CREATE TABLE `pastes` (
  `id` int(20) NOT NULL,
  `paste_name` varchar(64) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pastes`
--

INSERT INTO `pastes` (`id`, `paste_name`, `password`, `created_at`) VALUES
(8, '136093062660a3cbb53bcb47.01405790.html', NULL, '2021-05-18 17:14:13'),
(8, '66410481060a406779546f7.53950014.html', NULL, '2021-05-18 21:24:55'),
(8, '6866030660a406fc234321.18798662.html', NULL, '2021-05-18 21:27:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pastes`
--
ALTER TABLE `pastes`
  ADD KEY `id_fk` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pastes`
--
ALTER TABLE `pastes`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `connectiontable` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
