-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2021 at 09:37 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atigala_invdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category_name`, `status`) VALUES
(1, 'Oil', '1'),
(2, 'Daily Care', '1'),
(7, 'Bams', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(1, 'thisara', '2020-11-06', 13200, 2376, 1000, 14576, 5000, 9576, 'Cash'),
(2, 'thisara', '2020-11-06', 13200, 2376, 0, 15576, 5000, 10576, 'Cheque'),
(3, 'Thisara', '2020-11-06', 60000, 10800, 0, 70800, 5000, 65800, 'Cash'),
(4, 'Thisara', '2020-11-06', 120, 21.599999999999998, 0, 141.6, 50, 91.6, 'Cash'),
(5, 'Thisara', '2020-11-06', 0, 0, 0, 0, 50, -50, 'Cheque'),
(6, 'Thisara', '2020-11-06', 13200, 2376, 0, 15576, 5000, 10576, 'Cash'),
(7, 'Thisara', '2021-05-01', 1200, 216, 100, 1316, 300, 1016, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_no` (`invoice_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(1, 1, 'kesha oil', 120, 110),
(2, 2, 'kesha oil', 120, 110),
(3, 3, 'kesha oil', 120, 500),
(4, 3, '', 0, 0),
(5, 6, 'Guli', 120, 110),
(6, 7, 'Atigala Mouth Wash 200ml', 120, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `product_name` (`product_name`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(22, 2, 'Atigala Mouth Wash 200ml', 120, 490, '2020-06-11', '1'),
(23, 2, 'Atigala Mouth Wash 500ml', 300, 500, '2020-06-11', '1'),
(24, 2, 'Atigala Toothpaste 50ml', 100, 500, '2020-06-11', '1'),
(25, 2, 'Atigala Face Cream 100ml', 250, 1000, '2020-06-11', '1'),
(26, 7, 'Atigala Foot Massage Bam 100g', 175, 1000, '2020-06-11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'Thisara', 'tdw@gmail.com', '$2y$08$xaDTZCniFFyQO6X9ZK76H.hHbmJQLcc1ufdr1kx6BXEBxH/YBpbya', 'Admin', '2020-06-05', '2021-05-15 06:05:50', ''),
(3, 'Dhananjana', 'dana@gmail.com', '$2y$08$7vF7hOD88PU8A57vXZHHseHhE.UeYEcyX4INzSwAH3/E4FxtyQ5PK', 'Other', '2020-06-09', '2020-06-12 03:06:02', ''),
(4, 'Test', 'tdw2@gmail.com', '$2y$08$MaMZlXH.j1vn.6CFQCDmwusW5KDeiBjbNhdDMdt3muKMIoiY1dGsW', 'Admin', '2021-01-15', '2021-01-15 00:00:00', ''),
(5, 'Test', 'tdwd@gmail.com', '$2y$08$C6d0fSGBzpe3AMEJBzPCGueELU0sgYOdP89wP0Zybp/ip.S8IY2G2', 'Admin', '2021-01-15', '2021-01-15 07:01:49', ''),
(6, 'Test', 'tdwd2@gmail.com', '$2y$08$BX1kxewgo85qJEkU8aNEOuI4VE24FJ1cgVFODE2ZK8wpcr3teSdDC', 'Admin', '2021-01-15', '2021-01-15 00:00:00', ''),
(7, 'Test', 'tdwde@gmail.com', '$2y$08$FPmPVUthTOZvba13P9GR8eTzvFn0SFb0CbNoXT40Bsynl8JvipCJW', 'Admin', '2021-01-15', '2021-01-15 07:01:00', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
