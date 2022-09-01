-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 03:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL DEFAULT '0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `pwd`) VALUES
(1, 'gandalf', 'the Gray', 'gandelfthegray@lotr.com', '$2y$10$XF9W.pnlw.DdTPcsHz3pyOzmssT29LlEHfjxrB/vOBaKr1cpm6htW');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `dosage` int(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `type`, `price`, `company`, `qty`, `dosage`, `description`) VALUES
(1, 'ibrufen', 'tablet', 4, 'glaxo smith kline', 500, 500, 'fever breaker '),
(12, 'calpol', 'syrup', 5, 'frisco', 1000, 500, 'syrup for your sore throat'),
(13, 'flagel', 'tablet', 8, 'glaxo smith kline', 600, 400, 'tummy aches and growly poops'),
(15, 'kestine', 'vials/injection', 20, 'glaxo smith kline', 0, 40, 'gas for that asthmatic @ss');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(100) NOT NULL,
  `s_id` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_name` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `s_id`, `time`, `p_name`, `qty`, `price`, `total`) VALUES
(1, 1, '2022-02-10 21:14:30', 'ibrufen', 7, 28, 0),
(3, 1, '2022-02-14 09:53:27', 'flagel', 3, 8, 24),
(4, 1, '2022-02-14 09:54:13', 'flagel', 3, 8, 24),
(5, 1, '2022-02-14 09:56:21', 'flagel', 3, 8, 24),
(6, 1, '2022-02-14 09:56:21', 'calpol', 2, 5, 10),
(7, 1, '2022-02-14 10:14:32', 'flagel', 3, 8, 24),
(8, 1, '2022-02-14 10:14:32', 'calpol', 2, 5, 10),
(9, 1, '2022-02-14 10:21:24', 'flagel', 3, 8, 24),
(10, 1, '2022-02-14 10:21:24', 'calpol', 2, 5, 10),
(11, 1, '2022-02-14 10:25:00', 'flagel', 3, 8, 24),
(12, 1, '2022-02-14 10:25:00', 'calpol', 2, 5, 10),
(13, 1, '2022-02-14 10:25:06', 'ibrufen', 1, 4, 4),
(14, 1, '2022-02-14 10:27:01', 'ibrufen', 3, 4, 12),
(15, 1, '2022-02-14 10:40:29', 'calpol', 2, 5, 10),
(16, 1, '2022-02-14 10:40:53', 'calpol', 2, 5, 10),
(17, 1, '2022-02-14 10:40:53', 'calpol', 2, 5, 10),
(18, 1, '2022-02-14 10:54:58', 'flagel', 1, 8, 8),
(19, 1, '2022-02-14 10:55:23', 'flagel', 2, 8, 16),
(20, 1, '2022-02-14 10:55:47', 'calpol', 5, 5, 25),
(21, 1, '2022-02-14 13:19:41', 'ibrufen', 4, 4, 16),
(22, 1, '2022-02-14 13:19:41', 'calpol', 3, 5, 15),
(23, 1, '2022-02-14 13:19:41', 'flagel', 2, 8, 16),
(24, 1, '2022-02-14 13:22:43', 'ibrufen', 5, 4, 20),
(25, 1, '2022-02-14 13:22:43', 'calpol', 10, 5, 50),
(26, 1, '2022-02-14 13:22:43', 'flagel', 1, 8, 8),
(27, 1, '2022-02-14 14:24:30', 'calpol', 2, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL DEFAULT '$2y$10$8h/8jlcO9.IXLeQEpCWuSugELv8ZA5vamqlfo.3kLiZ0E5wuoZaRe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`id`, `fname`, `lname`, `email`, `pwd`) VALUES
(1, 'sauron', 'the white', 'sauronthewhite@lotr.com', '$2y$10$0QQKe.x4n2bdWNghlmEXXuPrM7/lRq1jp6zkQL3Wk989aEVlcdN92'),
(2, 'seller', 'prime', 'seller@mail.com', '$2y$10$8h/8jlcO9.IXLeQEpCWuSugELv8ZA5vamqlfo.3kLiZ0E5wuoZaRe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
