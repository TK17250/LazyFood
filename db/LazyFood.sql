-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2023 at 08:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `Menu`
--

CREATE TABLE `Menu` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_type` varchar(255) NOT NULL,
  `m_price` int(11) NOT NULL,
  `m_image` varchar(255) NOT NULL,
  `m_promotion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`m_id`, `m_name`, `m_type`, `m_price`, `m_image`, `m_promotion`) VALUES
(19, 'น้ำเปล่า', 'เครื่องดื่ม', 10, '20231207133936_5008.png', 0),
(20, 'เค้ก', 'ของหวาน', 199, '20231207134112_5637.png', 0),
(21, 'ไอติม', 'ของหวาน', 50, '20231207134316_6695.jpg', 0),
(42, 'ส้มตำ', 'อาหาร', 80, '20231208190452_3162.png', 1),
(50, 'กระเพราหมูสับ', 'อาหาร', 35, '20231209164220_3172.png', 1);

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
(1, 'TK Kg', 'TK17250', 'TK@KG', '$2y$10$v6bP/WPvgIwh5dF3rrdFUeQ6VeZ01z.qJnYEn1LVaxN0yIbbEX8w.', 'ผู้จัดการ'),
(2, 'ABCD EFGHI', 'admin', 'admin@admin', '$2y$10$um4E2ZUjIeD8pJlrvFmqHul2VWRMeq.EBkXLlIGTLCvku2OSuNjTG', 'ผู้จัดการ'),
(3, 'ณฐภัทร แสนใจพรม', 'PlayX', 'kaow322@gmail.com', '$2y$10$zyYxnuO0pe5HA9GO2wS15O7f/nOoh1eEpE5Ulr.OCOeTmCOuNAQia', 'สมาชิก'),
(13, '123', '123', '123@123', '$2y$10$.gf70GTnX2A3kdjvNB22heK.yoIxZctVHcfM7u6h01zobZxaoxeNW', 'สมาชิก'),
(14, 'dfsgdf', 'dfg', 'dfg@dfg', '$2y$10$7Xi2und6TufD/SLp6fuJ4uH0w0.S1ENMTsDZqRVRVeO0Ji1bBN0Ga', 'สมาชิก'),
(21, 'asd', 'asd', 'asd@asd', '$2y$10$opu0I49TMh9GVS.DlQ3D0.AJ5z4.3yNExUq7tW0qkTaF0hiEd6lvS', 'สมาชิก');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
