-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 04:39 AM
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
-- Table structure for table `veggies_tbl`
--

CREATE TABLE `veggies_tbl` (
  `id` int(10) NOT NULL,
  `veggy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veggies_tbl`
--

INSERT INTO `veggies_tbl` (`id`, `veggy`) VALUES
(1, 'Cucumber'),
(2, 'Lettuce'),
(3, 'Peppers - Banana'),
(4, 'Peppers - Jalapeno'),
(5, 'Peppers - Green & Red'),
(6, 'Pickles'),
(7, 'Spinach'),
(8, 'Tomato'),
(9, 'Olives'),
(10, 'Onions');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `veggies_tbl`
--
ALTER TABLE `veggies_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `veggies_tbl`
--
ALTER TABLE `veggies_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
