-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2023 at 03:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ampowl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ampoules`
--

CREATE TABLE `ampoules` (
  `id` int NOT NULL,
  `date_amp` date NOT NULL,
  `floor` enum('0','1','2','3','4','5','6','7','8') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `side` enum('Nord','Sud','Est','Ouest') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Nord',
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ampoules`
--

INSERT INTO `ampoules` (`id`, `date_amp`, `floor`, `side`, `price`) VALUES
(1, '2023-05-15', '2', 'Ouest', 6.00),
(3, '2023-01-11', '7', 'Est', 8.50),
(4, '2023-01-31', '4', 'Nord', 8.34),
(5, '2023-05-09', '3', 'Est', 5.60),
(6, '2023-05-09', '2', 'Est', 5.00),
(7, '2023-05-03', '3', 'Sud', 10.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ampoules`
--
ALTER TABLE `ampoules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ampoules`
--
ALTER TABLE `ampoules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
