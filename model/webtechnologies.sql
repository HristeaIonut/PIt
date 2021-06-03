-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: mai 27, 2021 la 10:12 AM
-- Versiune server: 10.4.19-MariaDB
-- Versiune PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `webtechnologies`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `connectiontable`
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
-- Eliminarea datelor din tabel `connectiontable`
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
(12, 'mere', 'pere', 'peremere', 'fdsfd@gmail.com', '$2y$10$pLAts0nPunVoCp9InXMgEuAqEDjS9wL9K8MWE/i2N6wsKXZJu9eo2');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `modified_pastes`
--

CREATE TABLE `modified_pastes` (
  `paste_name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `modified_paste_name` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `modified_pastes`
--

INSERT INTO `modified_pastes` (`paste_name`, `modified_paste_name`) VALUES
('Evg7M.php', 'Evg7M_modified_at_27-05-2021_09:42:39.php');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pastes`
--

CREATE TABLE `pastes` (
  `id` int(20) NOT NULL,
  `paste_name` varchar(128) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expiration_date` datetime DEFAULT '2100-01-01 00:00:00',
  `burn_ar` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `pastes`
--

INSERT INTO `pastes` (`id`, `paste_name`, `password`, `created_at`, `expiration_date`, `burn_ar`) VALUES
(0, '4xLxI.php', NULL, '2021-05-27 11:11:28', '2100-01-01 00:00:00', 0),
(2, 'cqBC1.php', NULL, '2021-05-27 11:05:21', '2100-01-01 00:00:00', 0),
(10, 'Evg7M.php', '{\"ct\":\"52VQMcSpSHNEnPRNYTh4mA==\",\"iv\":\"2402c1fa82221510c5c3bae4d93cda3a\",\"s\":\"b16de1ebfb951ca1\"}', '2021-05-27 10:42:35', '2100-01-01 00:00:00', 0),
(10, 'UudFK.php', '{\"ct\":\"ckZQW6FtycG\\/doaqfFThOQ==\",\"iv\":\"83f5dc0e14119e08508be346c08bd177\",\"s\":\"bb74c3cb81b535a8\"}', '2021-05-27 10:50:04', '2100-01-01 00:00:00', 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `connectiontable`
--
ALTER TABLE `connectiontable`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexuri pentru tabele `modified_pastes`
--
ALTER TABLE `modified_pastes`
  ADD KEY `modified_paste_fk` (`paste_name`);

--
-- Indexuri pentru tabele `pastes`
--
ALTER TABLE `pastes`
  ADD PRIMARY KEY (`paste_name`),
  ADD KEY `id_fk` (`id`);

--
-- Constrângeri pentru tabele eliminate
--
ALTER TABLE `connectiontable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constrângeri pentru tabele `modified_pastes`
--
ALTER TABLE `modified_pastes`
  ADD CONSTRAINT `modified_paste_fk` FOREIGN KEY (`paste_name`) REFERENCES `pastes` (`paste_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `pastes`
--
ALTER TABLE `pastes`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `connectiontable` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
