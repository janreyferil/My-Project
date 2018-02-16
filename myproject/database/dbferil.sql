-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 08:29 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbferil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `ad_uid` varchar(256) NOT NULL,
  `ad_pwd` varchar(256) NOT NULL,
  `ad_credential` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `ad_uid`, `ad_pwd`, `ad_credential`) VALUES
(2, 'Admin', '$2y$10$nt62rMClA6YpGXhpKsvOVuRCwlSNJgbKiEZsk80HlXENasw5Iu5i6', '$2y$10$W2idy3vmCvRPFl/ChDP.ruVBX6ns0e80pO/0ZqoqT3t5LunvPlJ7y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(11) NOT NULL,
  `pro_code` varchar(256) NOT NULL,
  `pro_name` varchar(256) NOT NULL,
  `pro_price` double NOT NULL,
  `pro_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `pro_code`, `pro_name`, `pro_price`, `pro_stock`) VALUES
(2, 'AB30', 'Bear Brand', 11.75, 38),
(3, 'AC40', 'Mik Mik', 0.75, 500),
(4, 'BD23', 'Vitasoy', 28.75, 55),
(5, 'AN18', 'Patatas', 5.75, 120),
(6, 'AD76', 'Beng Beng', 6.25, 160),
(7, 'CD42', 'Bread Pan', 10, 210);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total`
--

CREATE TABLE `tbl_total` (
  `id` int(11) NOT NULL,
  `get_code` varchar(256) NOT NULL,
  `pro_transac` varchar(256) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_class` varchar(256) NOT NULL,
  `pro_total` double NOT NULL,
  `pro_total_vat` double NOT NULL,
  `created_at` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_total`
--

INSERT INTO `tbl_total` (`id`, `get_code`, `pro_transac`, `pro_quantity`, `pro_class`, `pro_total`, `pro_total_vat`, `created_at`) VALUES
(26, 'BD23', 'OTJ6Y7', 5, 'Senior', 143.75, 128.8, '2018-02-13 01:08 pm'),
(27, 'CD42', 'JOVT2E', 20, 'None', 200, 224, '2018-02-14 10:24 pm'),
(28, 'BD23', 'DROLGM', 10, 'None', 287.5, 322, '2018-02-16 12:06 pm'),
(29, 'AB30', 'G2HJ5X', 10, 'None', 117.5, 131.6, '2018-02-16 12:22 pm'),
(30, 'BD23', '3X6BY7', 10, 'None', 287.5, 322, '2018-02-16 12:32 pm'),
(31, 'BD23', '6YAKFU', 20, 'Senior', 575, 515.2, '2018-02-16 12:36 pm'),
(32, 'BD23', 'SPTLBY', 10, 'Senior', 287.5, 257.6, '2018-02-16 07:53 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transac`
--

CREATE TABLE `tbl_transac` (
  `id` int(11) NOT NULL,
  `get_transac` varchar(256) NOT NULL,
  `pro_payment` double NOT NULL,
  `pro_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transac`
--

INSERT INTO `tbl_transac` (`id`, `get_transac`, `pro_payment`, `pro_balance`) VALUES
(6, 'OTJ6Y7', 200, 71.2),
(7, 'JOVT2E', 400, 176),
(8, 'DROLGM', 400, 78),
(9, '6YAKFU', 600, 84.8),
(10, 'SPTLBY', 300, 42.4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uri`
--

CREATE TABLE `tbl_uri` (
  `id` int(11) NOT NULL,
  `uri` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_uri`
--

INSERT INTO `tbl_uri` (`id`, `uri`) VALUES
(1, '?total=success&code=BD23&transac=SPTLBY&finaltotal=257.60&vat=34.5&senior=64.40&discount=');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `uid`, `pwd`) VALUES
(1, 'Janrey', '$2y$10$oHwJ.0GGevHZtmI9rfsc8u3PunL79ajrLUayhIPhof2/w3i.UIM2i'),
(2, 'Mary', '$2y$10$PiCHUrIhMEvXPEGVY0y2AudAniF9tBd2PhrI/02ndvlsPYT7SDBdG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vat`
--

CREATE TABLE `tbl_vat` (
  `id` int(11) NOT NULL,
  `pro_vat` double NOT NULL,
  `pro_senior` double NOT NULL,
  `pro_discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vat`
--

INSERT INTO `tbl_vat` (`id`, `pro_vat`, `pro_senior`, `pro_discount`) VALUES
(1, 0.12, 0.2, 0.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_total`
--
ALTER TABLE `tbl_total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transac`
--
ALTER TABLE `tbl_transac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uri`
--
ALTER TABLE `tbl_uri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_total`
--
ALTER TABLE `tbl_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_transac`
--
ALTER TABLE `tbl_transac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_uri`
--
ALTER TABLE `tbl_uri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
