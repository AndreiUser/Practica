-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 04:58 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iesc`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `index` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  `zi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`index`, `data`, `zi`) VALUES
(1, 'luni', 27),
(2, 'marti', 28),
(3, 'miercuri', 29),
(4, 'joi', 30),
(5, 'vineri', 31),
(6, 'sambata', 1),
(7, 'duminica', 2),
(15, 'luni', 3),
(16, 'luni', 4),
(17, 'marti', 5),
(18, 'miercuri', 6),
(19, 'joi', 7),
(20, 'vineri', 8),
(21, 'sambata', 9),
(22, 'duminica', 10),
(23, 'luni', 11),
(24, 'marti', 12),
(25, 'miercuri', 13),
(26, 'joi', 14),
(27, 'vineri', 15),
(28, 'sambata', 16),
(29, 'duminica', 17),
(30, 'luni', 18),
(31, 'marti', 19),
(32, 'miercuri', 20),
(33, 'joi', 21),
(34, 'vineri', 22),
(35, 'sambata', 23),
(36, 'duminica', 24),
(37, 'luni', 25),
(38, 'marti', 26),
(39, 'miercuri', 27),
(40, 'joi', 28),
(41, 'vineri', 29),
(42, 'sambata', 30),
(43, 'duminica', 31),
(44, 'luni', 1),
(45, 'marti', 2),
(46, 'miercuri', 3),
(47, 'joi', 4),
(48, 'vineri', 5),
(49, 'sambata', 6),
(50, 'duminica', 7);

-- --------------------------------------------------------

--
-- Table structure for table `durata`
--

CREATE TABLE `durata` (
  `id` int(11) NOT NULL,
  `durata` varchar(10) NOT NULL,
  `valoare` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `durata`
--

INSERT INTO `durata` (`id`, `durata`, `valoare`) VALUES
(1, 'o ora', 1),
(2, '2 ore', 2),
(3, '3 ore', 3),
(4, '4 ore', 4);

-- --------------------------------------------------------

--
-- Table structure for table `examene`
--

CREATE TABLE `examene` (
  `id` int(11) NOT NULL,
  `data` int(2) NOT NULL,
  `sala` varchar(10) NOT NULL,
  `grupa` varchar(10) NOT NULL,
  `ora` int(10) NOT NULL,
  `durata` int(1) NOT NULL,
  `Profesor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examene`
--

INSERT INTO `examene` (`id`, `data`, `sala`, `grupa`, `ora`, `durata`, `Profesor`) VALUES
(103, 27, 'VIII5', '4LF892', 8, 1, 'Informatica aplicata'),
(104, 30, 'VIII5', '4LF892', 8, 1, 'Mecanica Fluidelor'),
(105, 4, 'VIII5', '4LF892', 8, 1, 'Rezistenta Materiale'),
(106, 14, 'VIII5', '4LF892', 8, 1, 'Analiza'),
(107, 31, 'KI11', '4LF892', 8, 1, 'PCLP'),
(108, 27, 'VIII5', '4LF574', 8, 1, 'Mecanica Fluidelor'),
(109, 27, 'VIII5', '4LF491', 13, 1, 'Informatica aplicata'),
(110, 27, 'VIII5', '4LF574', 17, 1, 'Informatica aplicata'),
(111, 27, 'VIII5', '4LF702', 14, 1, 'Informatica aplicata'),
(112, 3, 'VIII5', '4LF891', 8, 1, 'Informatica aplicata'),
(113, 12, 'VIII5', '4LF884', 8, 1, 'Informatica aplicata');

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

CREATE TABLE `grupe` (
  `id` int(11) NOT NULL,
  `grupa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`id`, `grupa`) VALUES
(1, '4LF892'),
(2, '4LF491'),
(3, '4LF574'),
(4, '4LF702'),
(5, '4LF891'),
(6, '4LF884');

-- --------------------------------------------------------

--
-- Table structure for table `ore`
--

CREATE TABLE `ore` (
  `id` int(11) NOT NULL,
  `ora` varchar(6) NOT NULL,
  `valoare` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ore`
--

INSERT INTO `ore` (`id`, `ora`, `valoare`) VALUES
(1, '8:00', 8),
(2, '9:00', 9),
(3, '10:00', 10),
(4, '11:00', 11),
(5, '12:00', 12),
(6, '13:00', 13),
(7, '14:00', 14),
(8, '15:00', 15),
(9, '16:00', 16),
(10, '17:00', 17),
(11, '18:00', 18),
(12, '19:00', 19),
(13, '20:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id` int(11) NOT NULL,
  `obiect` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id`, `obiect`) VALUES
(1, 'Informatica aplicata'),
(2, 'Mecanica Fluidelor'),
(3, 'Rezistenta Materiale'),
(4, 'Analiza'),
(5, 'PCLP');

-- --------------------------------------------------------

--
-- Table structure for table `sali`
--

CREATE TABLE `sali` (
  `id` int(11) NOT NULL,
  `sala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sali`
--

INSERT INTO `sali` (`id`, `sala`) VALUES
(1, 'VIII5'),
(2, 'CP3'),
(3, 'PIV16'),
(4, 'BII5'),
(5, 'KI11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `durata`
--
ALTER TABLE `durata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examene`
--
ALTER TABLE `examene`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupe`
--
ALTER TABLE `grupe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ore`
--
ALTER TABLE `ore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sali`
--
ALTER TABLE `sali`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `durata`
--
ALTER TABLE `durata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examene`
--
ALTER TABLE `examene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ore`
--
ALTER TABLE `ore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sali`
--
ALTER TABLE `sali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
