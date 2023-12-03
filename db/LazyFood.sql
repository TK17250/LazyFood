-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2023 at 10:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LazyFood`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_rank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`u_id`, `u_fname`, `u_username`, `u_email`, `u_pass`, `u_rank`) VALUES
(1, 'TK Kg', 'TK17250', 'TK@KG', '$2y$10$v6bP/WPvgIwh5dF3rrdFUeQ6VeZ01z.qJnYEn1LVaxN0yIbbEX8w.', 'สมาชิก'),
(2, 'ABCD EFGHI', 'admin', 'admin@admin', '$2y$10$v6bP/WPvgIwh5dF3rrdFUeQ6VeZ01z.qJnYEn1LVaxN0yIbbEX8w.', 'ผู้จัดการ'),
(3, 'ณฐภัทร แสนใจพรม', 'PlayX', 'kaow322@gmail.com', '$2y$10$zyYxnuO0pe5HA9GO2wS15O7f/nOoh1eEpE5Ulr.OCOeTmCOuNAQia', 'สมาชิก'),
(4, 'asd', 'asd', 'asd@asd', '$2y$10$Aog5DNu6BoZc3LecKLRLF.C3hK0ofGEinrZuzWqO77fhw/BJqhQoe', 'สมาชิก');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
