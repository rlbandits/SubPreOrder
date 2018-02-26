-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 04:37 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `order_code` varchar(50) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `name`, `email`, `order_code`, `order_time`) VALUES
(7, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:26:02'),
(8, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:34:18'),
(9, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:36:05'),
(10, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:37:02'),
(11, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:41:25'),
(12, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:44:21'),
(13, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:46:17'),
(14, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C3V10-2-7-8', '2018-02-25 13:51:18'),
(15, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 13:54:13'),
(16, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 14:13:26'),
(17, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C3V10-2-7-8', '2018-02-25 14:18:35'),
(18, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 14:22:49'),
(19, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 14:24:57'),
(20, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 14:28:59'),
(21, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C3V10-2-7-8', '2018-02-25 14:31:54'),
(22, '', '', '', '2018-02-25 14:40:08'),
(23, '', '', '', '2018-02-25 14:41:22'),
(24, '', '', '', '2018-02-25 14:42:05'),
(25, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C3V10-2-7-8', '2018-02-25 14:44:04'),
(27, 'Ralph', 'ralphbandian@gmail.com', 'B2S1-3ST2C1V10-2-7-8', '2018-02-25 15:17:15'),
(28, 'Ralph', 'ralphbandian@gmail.com', 'B2SST2C3V10-2-7-8', '2018-02-26 03:07:55'),
(29, 'Ralph', 'ralphbandian@gmail.com', 'B2SST2C1V10-2-7-8', '2018-02-26 03:09:20'),
(30, 'Ralph', 'ralphbandian@gmail.com', 'B3SST2C3V10-2-7-8', '2018-02-26 03:12:18'),
(31, 'Ralph', 'ralphbandian@yahoo.com', 'B3S1ST4C1V10-2-7-8', '2018-02-26 03:15:40'),
(32, 'Ralph', 'ralphbandian@gmail.com', 'B2S1ST3C1V10-2-7-8', '2018-02-26 03:19:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
