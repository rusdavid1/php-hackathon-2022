-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 03:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evozon`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(512) NOT NULL,
  `programme_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `full_name`, `programme_id`) VALUES
(2, 'John Doe', 2),
(3, 'Rus David', 1),
(5, 'Dn Goe', 4);

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `max_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `title`, `room_id`, `start_date`, `end_date`, `max_participants`) VALUES
(1, 'Pilates', 1, '2022-02-01 11:00:00', '2022-02-03 15:00:00', 28),
(2, 'Aerobic', 3, '2022-01-31 12:00:00', '2022-01-31 15:00:00', 20),
(3, 'Kangoo Jumps', 4, '2022-02-11 16:26:06', '2022-02-12 16:26:06', 28),
(4, 'Fitness', 6, '2022-02-15 12:00:00', '2022-02-16 15:00:00', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_id` (`programme_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
