-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 03:54 PM
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
(9, 'firstName', 'lastName', 'username123', 'email3@email.com', '$2y$10$0MxS80SaZy2mxGo4/FUsrex2m/bS2fIlqWtZJEx9/dnptzmQTQMRy'),
(10, 'mere', 'pere', 'merepere', 'merepere@gmail.com', '$2y$10$KxenVHhYkFoXcTIVZJjxgO4KlQklBJTk1SeCj4ctgrJQKp.fdfxOi'),
(11, 'mere', 'pere', 'peremere', '1@gmail.com', '$2y$10$dA0JeubesOA.d1X.ctUsj.LbqBldin3/UqKxZqKLmE0fBJ8.eXjk.'),
(12, 'mere', 'pere', 'peremere', 'fdsfd@gmail.com', '$2y$10$pLAts0nPunVoCp9InXMgEuAqEDjS9wL9K8MWE/i2N6wsKXZJu9eo2');

-- --------------------------------------------------------

--
-- Table structure for table `pastes`
--

CREATE TABLE `pastes` (
  `id` int(20) NOT NULL,
  `paste_name` varchar(64) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pastes`
--

INSERT INTO `pastes` (`id`, `paste_name`, `password`, `created_at`, `expiration_date`) VALUES
(8, '136093062660a3cbb53bcb47.01405790.html', NULL, '2021-05-18 17:14:13', '2021-05-18 14:14:18'),
(8, '66410481060a406779546f7.53950014.html', NULL, '2021-05-18 21:24:55', '2021-05-24 11:28:14'),
(8, '6866030660a406fc234321.18798662.html', NULL, '2021-05-18 21:27:08', '2021-05-24 11:28:14'),
(8, '10676891260a408fb340e63.71187660.html', NULL, '2021-05-18 21:35:39', '2021-05-24 11:28:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectiontable`
--
ALTER TABLE `connectiontable`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pastes`
--
ALTER TABLE `pastes`
  ADD KEY `id_fk` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connectiontable`
--
ALTER TABLE `connectiontable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
