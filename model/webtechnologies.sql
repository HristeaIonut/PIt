-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 12:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
(0, 'guest', 'guest', 'guest', 'guest', 'guest'),
(2, 'Ionut', 'Hristea', 'ionutHristea', 'hristeaionut72@gmail.com', 'HristeaIonut123'),
(3, 'Tudor', 'Neculau', 'tudorNeculau', 'neculautudor02@gmail.com', 'NeculauTudor123'),
(4, 'firstName', 'lastName', 'userName', 'email@email.com', 'password123'),
(5, 'attempt2', 'att2_name', 'userName2', 'email2@email.com', 'password123'),
(6, 'firstName1', 'lastName1', 'userName1', 'email1@email.com', 'password123'),
(8, 'Malina', 'Benchea', 'MalinaBenchea', 'malina16fnl@gmail.com', '$2y$10$VHUdcb6H20gJ4L2TVEpZmexP9jJYidsDyu3y007iD8uRHfYBOkpqG'),
(9, 'firstName', 'lastName', 'username123', 'email3@email.com', '$2y$10$0MxS80SaZy2mxGo4/FUsrex2m/bS2fIlqWtZJEx9/dnptzmQTQMRy'),
(10, 'mere', 'pere', 'merepere', 'merepere@gmail.com', '$2y$10$KxenVHhYkFoXcTIVZJjxgO4KlQklBJTk1SeCj4ctgrJQKp.fdfxOi'),
(11, 'mere', 'pere', 'peremere', '1@gmail.com', '$2y$10$dA0JeubesOA.d1X.ctUsj.LbqBldin3/UqKxZqKLmE0fBJ8.eXjk.'),
(12, 'mere', 'pere', 'peremere', 'fdsfd@gmail.com', '$2y$10$pLAts0nPunVoCp9InXMgEuAqEDjS9wL9K8MWE/i2N6wsKXZJu9eo2'),
(13, 'gfdg', 'gfdg', 'gfdgfd', 'hristeagfdgionut72@gmail.com', '$2y$10$6rfIHjQUY3hZnCxCzbQTy.kCa2ekVKbdM7MI2O9ocexqzoR5dtbEC');

-- --------------------------------------------------------

--
-- Table structure for table `modified_pastes`
--

CREATE TABLE `modified_pastes` (
  `paste_name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `modified_paste_name` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modified_pastes`
--

INSERT INTO `modified_pastes` (`paste_name`, `modified_paste_name`) VALUES
('dvIG0.php', 'dvIG0_modified_at_08-06-2021_10-08-06.php'),
('dvIG0.php', 'dvIG0_modified_at_08-06-2021_10-10-16.php'),
('OECWP.php', 'OECWP_modified_at_08-06-2021_10-14-16.php'),
('jvB28.php', 'jvB28_modified_at_08-06-2021_10-15-50.php'),
('ZdZKw.php', 'ZdZKw_modified_at_08-06-2021_10-16-52.php'),
('3g4Ad.php', '3g4Ad_modified_at_08-06-2021_10-19-12.php'),
('c3SVf.php', 'c3SVf_modified_at_08-06-2021_10-20-30.php'),
('JNh9H.php', 'JNh9H_modified_at_08-06-2021_10-21-10.php');

-- --------------------------------------------------------

--
-- Table structure for table `pastes`
--

CREATE TABLE `pastes` (
  `id` int(20) NOT NULL,
  `paste_name` varchar(128) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expiration_date` datetime DEFAULT '2100-01-01 00:00:00',
  `burn_ar` tinyint(1) NOT NULL DEFAULT 0,
  `public_edit` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pastes`
--

INSERT INTO `pastes` (`id`, `paste_name`, `password`, `created_at`, `expiration_date`, `burn_ar`, `public_edit`) VALUES
(10, 'c3SVf.php', NULL, '2021-06-08 11:20:26', '2100-01-01 00:00:00', 0, 0),
(10, 'JNh9H.php', NULL, '2021-06-08 11:21:01', '2100-01-01 00:00:00', 0, 1),
(10, 'VAVRA.php', NULL, '2021-06-08 13:16:29', '2100-01-01 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectiontable`
--
ALTER TABLE `connectiontable`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `modified_pastes`
--
ALTER TABLE `modified_pastes`
  ADD KEY `modified_paste_fk` (`paste_name`);

--
-- Indexes for table `pastes`
--
ALTER TABLE `pastes`
  ADD PRIMARY KEY (`paste_name`),
  ADD KEY `id_fk` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connectiontable`
--
ALTER TABLE `connectiontable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modified_pastes`
--
ALTER TABLE `modified_pastes`
  ADD CONSTRAINT `modified_paste_fk` FOREIGN KEY (`paste_name`) REFERENCES `pastes` (`paste_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pastes`
--
ALTER TABLE `pastes`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `connectiontable` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
