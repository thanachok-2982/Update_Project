-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 10:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vmproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_info`
--

CREATE TABLE `ad_info` (
  `ad_id` int(11) NOT NULL,
  `ad_img` text NOT NULL,
  `ad_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_info`
--

INSERT INTO `ad_info` (`ad_id`, `ad_img`, `ad_time`) VALUES
(1, 'pic/bn1.png', '2023-04-24 18:33:11'),
(2, 'pic/bn2.png', '2023-04-24 18:33:11'),
(3, 'pic/bn3.png', '2023-04-24 18:33:25'),
(4, 'pic/bn4.png', '2023-04-24 18:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `l_id` int(11) NOT NULL,
  `l_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_his`
--

CREATE TABLE `order_his` (
  `o_id` int(10) NOT NULL,
  `price` int(3) NOT NULL,
  `u_id` int(10) NOT NULL,
  `p_id` int(13) NOT NULL,
  `vm_id` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_his`
--

INSERT INTO `order_his` (`o_id`, `price`, `u_id`, `p_id`, `vm_id`, `time`, `method`) VALUES
(1, 15, 1, 3, 0, '2023-02-27 16:55:18', ''),
(2, 5, 1, 1, 0, '2023-02-27 16:55:18', ''),
(3, 5, 1, 1, 0, '2023-02-27 16:55:18', ''),
(4, 10, 1, 2, 0, '2023-02-27 16:55:18', ''),
(5, 10, 1, 2, 0, '2023-02-27 16:55:18', ''),
(6, 15, 0, 3, 0, '2023-02-27 16:55:18', ''),
(7, 15, 1, 3, 0, '2023-02-27 16:55:18', ''),
(8, 20, 1, 2, 0, '2023-02-27 16:55:18', ''),
(9, 10, 1, 1, 0, '2023-02-27 16:55:18', ''),
(10, 30, 1, 3, 0, '2023-02-27 16:55:42', ''),
(11, 10, 1, 1, 0, '2023-02-27 17:04:38', ''),
(12, 10, 1, 1, 0, '2023-02-27 17:05:37', ''),
(13, 10, 1, 1, 0, '2023-02-27 17:12:22', 'points'),
(14, 5, 1, 1, 0, '2023-02-27 17:14:28', 'credit'),
(15, 15, 1, 3, 0, '2023-02-27 17:25:17', 'credit'),
(16, 20, 1, 2, 0, '2023-02-27 17:28:18', 'points'),
(17, 15, 1, 3, 0, '2023-02-27 17:33:01', 'credit'),
(18, 15, 1, 3, 0, '2023-02-27 17:34:14', 'cash'),
(19, 5, 1, 1, 0, '2023-02-27 18:11:34', 'cash'),
(20, 5, 1, 1, 0, '2023-02-27 18:15:17', 'cash'),
(21, 5, 0, 1, 0, '2023-02-27 18:18:10', 'cash'),
(22, 5, 1, 1, 0, '2023-02-27 18:20:28', 'cash'),
(23, 5, 1, 1, 0, '2023-02-27 18:21:09', 'cash'),
(24, 10, 1, 2, 0, '2023-02-27 18:22:08', 'cash'),
(25, 10, 0, 2, 0, '2023-02-28 01:49:15', 'cash'),
(26, 10, 0, 2, 0, '2023-02-28 02:10:48', 'cash'),
(27, 10, 0, 2, 0, '2023-02-28 02:15:20', 'cash'),
(28, 10, 15, 2, 0, '2023-02-28 02:37:00', 'cash'),
(29, 10, 1, 2, 0, '2023-02-28 02:55:40', 'cash'),
(30, 10, 1, 2, 0, '2023-02-28 02:55:58', 'cash'),
(31, 10, 1, 2, 0, '2023-02-28 02:57:57', 'cash'),
(32, 10, 1, 2, 0, '2023-02-28 02:59:51', 'cash'),
(33, 15, 1, 3, 0, '2023-02-28 03:01:38', 'cash'),
(34, 15, 1, 3, 0, '2023-02-28 03:02:00', 'cash'),
(35, 15, 1, 3, 0, '2023-02-28 03:03:17', 'cash'),
(36, 15, 1, 3, 0, '2023-02-28 03:05:22', 'cash'),
(37, 15, 1, 3, 0, '2023-02-28 03:06:17', 'cash'),
(38, 5, 1, 1, 0, '2023-02-28 03:06:58', 'cash'),
(39, 5, 1, 1, 0, '2023-02-28 03:14:09', 'cash'),
(40, 5, 1, 1, 0, '2023-02-28 03:14:48', 'cash'),
(41, 5, 0, 1, 0, '2023-02-28 03:17:27', 'cash'),
(42, 5, 1, 1, 0, '2023-02-28 03:18:11', 'cash'),
(43, 5, 20, 1, 0, '2023-02-28 03:22:05', 'cash'),
(44, 5, 32, 1, 0, '2023-02-28 03:26:27', 'cash'),
(45, 5, 10, 1, 0, '2023-02-28 03:28:00', 'cash'),
(46, 5, 1, 1, 0, '2023-02-28 03:31:17', 'cash'),
(47, 5, 11, 1, 0, '2023-02-28 03:32:03', 'cash'),
(48, 5, 12, 1, 0, '2023-02-28 03:44:54', 'cash'),
(49, 5, 13, 1, 0, '2023-02-28 03:47:43', 'cash'),
(50, 5, 1, 1, 0, '2023-02-28 03:48:54', 'cash'),
(51, 5, 14, 1, 0, '2023-02-28 13:15:46', 'cash'),
(52, 5, 1, 1, 0, '2023-03-06 20:50:01', 'cash'),
(53, 5, 1, 1, 0, '2023-03-18 12:59:24', 'cash'),
(54, 5, 1, 1, 0, '2023-03-18 13:46:31', 'cash'),
(55, 5, 1, 1, 0, '2023-03-18 13:52:39', 'cash'),
(56, 10, 1, 2, 0, '2023-03-18 14:06:19', 'cash'),
(57, 10, 9, 1, 0, '2023-03-18 14:12:06', 'points'),
(58, 5, 1, 1, 0, '2023-03-18 14:13:13', 'cash'),
(59, 5, 18, 1, 0, '2023-03-20 11:15:16', 'cash'),
(60, 5, 1, 1, 0, '2023-03-27 13:13:50', 'cash'),
(61, 15, 1, 3, 0, '2023-03-27 13:16:48', 'credit'),
(62, 10, 1, 2, 0, '2023-04-17 16:02:57', 'cash'),
(63, 5, 1, 1, 0, '2023-04-18 15:51:00', 'cash'),
(64, 5, 1, 1, 0, '2023-04-18 15:52:36', 'credit'),
(65, 5, 1, 1, 0, '2023-04-18 15:52:59', 'cash'),
(66, 5, 1, 1, 0, '2023-04-18 15:53:33', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(13) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `img` text NOT NULL,
  `p_price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `text`, `img`, `p_price`) VALUES
(1, 'ไมโล สูตรออริจินัล ', '', 'pic/6.png', 5),
(2, 'แลคตาซอย รสหวาน', '', 'pic/7.png', 10),
(3, 'เทส', '', 'pic/8.png', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `balance` int(6) NOT NULL,
  `points` int(6) NOT NULL,
  `roles` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `phone`, `pin`, `balance`, `points`, `roles`) VALUES
(0, 'admin', 'admin', 0, 0, 'admin'),
(1, '0962218203', '123456', 25, 27, 'user'),
(2, '0123456777', '123456', 50, 30, 'user'),
(3, '1234567890', '123456', 30, 50, 'user'),
(9, '0897457722', '772234', 50, 90, 'user'),
(10, '1234123422', '123456', 0, 1, 'user'),
(13, '2315468213', '852147', 0, 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vm_info`
--

CREATE TABLE `vm_info` (
  `vm_id` int(10) NOT NULL,
  `mac_address` text NOT NULL,
  `vm_name` text NOT NULL,
  `product1` int(2) NOT NULL,
  `product2` int(2) NOT NULL,
  `product3` int(2) NOT NULL,
  `coin_one` int(3) NOT NULL,
  `coin_two` int(3) NOT NULL,
  `coin_five` int(3) NOT NULL,
  `coin_ten` int(3) NOT NULL,
  `coin_now` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vm_info`
--

INSERT INTO `vm_info` (`vm_id`, `mac_address`, `vm_name`, `product1`, `product2`, `product3`, `coin_one`, `coin_two`, `coin_five`, `coin_ten`, `coin_now`) VALUES
(1, '1c:57:dc:47:6a:e5', 'BU1234', 3, 7, 9, 0, 0, 0, 0, 0),
(2, '14:88:E6:07:B6:2D', 'BU4567', 10, 10, 10, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_info`
--
ALTER TABLE `ad_info`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `order_his`
--
ALTER TABLE `order_his`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vm_info`
--
ALTER TABLE `vm_info`
  ADD PRIMARY KEY (`vm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_info`
--
ALTER TABLE `ad_info`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_his`
--
ALTER TABLE `order_his`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vm_info`
--
ALTER TABLE `vm_info`
  MODIFY `vm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
