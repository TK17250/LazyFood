-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2023 at 08:56 PM
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
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `c_id` int(11) NOT NULL,
  `c_username` varchar(255) NOT NULL,
  `c_menuid` int(11) NOT NULL,
  `c_menuname` varchar(255) NOT NULL,
  `c_menuquan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(20, 'เค้ก', 'ของหวาน', 199, '20231207134112_5637.png', 1),
(21, 'ไอติม', 'ของหวาน', 20, '20231207134316_6695.jpg', 0),
(42, 'ส้มตำ', 'อาหาร', 45, '20231208190452_3162.png', 1),
(50, 'กระเพราหมูสับ', 'อาหาร', 35, '20231209164220_3172.png', 1),
(55, 'คัสตาร์ดพุดดิ้ง', 'ของหวาน', 75, '20231215203815_5883.png', 0),
(56, 'เฉาก๊วย', 'ของหวาน', 15, '20231215203835_6718.png', 0),
(57, 'บิงซูเมล่อน', 'ของหวาน', 80, '20231215203910_2902.png', 0),
(58, 'แพนเค้ก', 'ของหวาน', 150, '20231215203935_4462.png', 0),
(59, 'วาฟเฟิล', 'ของหวาน', 60, '20231215203955_2662.png', 0),
(60, 'โกโก้', 'เครื่องดื่ม', 35, '20231215204122_3888.png', 0),
(61, 'ชาเขียว', 'เครื่องดื่ม', 45, '20231215204149_3198.png', 0),
(62, 'ชาเย็น', 'เครื่องดื่ม', 25, '20231215204208_3403.png', 0),
(63, 'น้ำส้ม', 'เครื่องดื่ม', 10, '20231215204227_9778.png', 0),
(64, 'เป๊ปซี่', 'เครื่องดื่ม', 15, '20231215204248_9081.png', 1),
(65, 'ต้มจืด', 'อาหาร', 35, '20231215204326_3126.png', 0),
(66, 'ข้าวต้ม', 'อาหาร', 20, '20231215204353_9944.png', 0),
(67, 'ข้าวผัด', 'อาหาร', 25, '20231215204410_4630.png', 0),
(68, 'ข้าวผัดต้มยำ', 'อาหาร', 55, '20231215204434_7204.png', 0),
(69, 'ต้มยำกุ้ง', 'อาหาร', 60, '20231215204456_2895.png', 0),
(70, 'น้ำผลไม้', 'เครื่องดื่ม', 15, '20231215204527_9524.jpg', 0),
(71, 'หมูทอดกระเทียม', 'อาหาร', 35, '20231215204618_6551.png', 0),
(72, 'ปีกไก่ย่าง', 'อาหาร', 15, '20231215204640_1381.png', 1),
(73, 'ผัดซีอิ๊ว', 'อาหาร', 35, '20231215204704_5364.png', 0),
(74, 'ผัดผงกระหรี่', 'อาหาร', 35, '20231215204727_2651.png', 0),
(75, 'ผัดพริกแกง', 'อาหาร', 35, '20231215204744_8889.png', 0),
(76, 'ผัดพริกเผา', 'อาหาร', 45, '20231215204809_7145.png', 0),
(77, 'ผัดมักกะโรนี', 'อาหาร', 35, '20231215204832_8291.png', 0),
(78, 'พิซซ่า', 'อาหาร', 200, '20231215204849_2784.png', 0),
(79, 'มาม่าผัด', 'อาหาร', 25, '20231215204909_9098.png', 0),
(80, 'ราดหน้า', 'อาหาร', 35, '20231215204930_4592.png', 0),
(81, 'สปาเกตตี้ผัดขี้เมา', 'อาหาร', 70, '20231215204959_2361.png', 0);

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
(1, 'TK Kg', 'TK', 'TK@KG', '$2y$10$v6bP/WPvgIwh5dF3rrdFUeQ6VeZ01z.qJnYEn1LVaxN0yIbbEX8w.', 'ผู้จัดการ'),
(3, 'ณฐภัทร แสนใจพรม', 'PlayX', 'kaow322@gmail.com', '$2y$10$zyYxnuO0pe5HA9GO2wS15O7f/nOoh1eEpE5Ulr.OCOeTmCOuNAQia', 'สมาชิก'),
(37, 'admin', 'Vanda', 'Test@admin', '$2y$10$.omNv8kJV54OYoCGvdv9Ve.wxg6PhjoWY1P9smlEQZXXFL/EppLi.', 'ผู้จัดการ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`c_id`);

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
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
