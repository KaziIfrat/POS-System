-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 10:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(6, 'Hasin', 'Tushar', 'hh@gmail.com', '01111111111', 'tttt'),
(8, 'Imran', 'Saimun', 'ss@gmail.com', '01111111111', 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `Generic` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Date_Received` date NOT NULL,
  `Date_Expire` date NOT NULL,
  `Original_Price` float NOT NULL,
  `Selling_Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Quantity_Left` int(11) NOT NULL,
  `Total_BDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `brand_name`, `Generic`, `Category`, `Date_Received`, `Date_Expire`, `Original_Price`, `Selling_Price`, `Quantity`, `Quantity_Left`, `Total_BDT`) VALUES
(4, 'Agro', 'Green veg', 'Grocery ', '2018-05-03', '2018-05-17', 50, 52, 100, 71, -404),
(5, 'RFL', 'Spice tray', 'Utensils ', '2018-05-02', '2018-06-08', 200, 220, 100, 100, 22000),
(6, 'Remington-999', 'Hair Straightner', 'Electronics ', '2018-05-02', '2018-06-08', 2000, 2500, 100, 100, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(4, 'Beauty'),
(3, 'Electronics'),
(5, 'Fastfood'),
(1, 'Grocery'),
(2, 'Hygin'),
(6, 'Utensils');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `invoice_no` int(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantty` int(11) DEFAULT NULL,
  `Amount` double NOT NULL,
  `profit` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `invoice_no`, `product_id`, `quantty`, `Amount`, `profit`, `Date`) VALUES
(30, 119451087, 4, 1, 52, 2, '2018-05-23'),
(40, 227898808, 4, 1, 52, 2, '2018-05-23'),
(49, 380201626, 4, 1, 52, 2, '2018-05-23'),
(52, 1700329137, 4, 1, 52, 2, '2018-05-23'),
(53, 377397467, 4, 1, 52, 2, '2018-05-23'),
(54, 377397467, 4, 1, 52, 2, '2018-05-23'),
(55, 1787179655, 4, 1, 52, 2, '2018-05-23'),
(56, 1787179655, 4, 1, 52, 2, '2018-05-23'),
(57, 1787179655, 4, 1, 52, 2, '2018-05-23'),
(58, 1787179655, 4, 1, 52, 2, '2018-05-23'),
(59, 1705852011, 4, 1, 52, 2, '2018-05-23'),
(60, 1705852011, 4, 1, 52, 2, '2018-05-23'),
(61, 65033374, 4, 2, 104, 4, '2018-05-23'),
(62, 377820881, 4, 1, 52, 2, '2018-05-23'),
(63, 377820881, 4, 1, 52, 2, '2018-05-23'),
(64, 1747715663, 4, 1, 52, 2, '2018-05-23'),
(65, 1576146580, 4, 1, 52, 2, '2018-05-23'),
(66, 568499158, 4, 1, 52, 2, '2018-05-23'),
(67, 1910636103, 4, 1, 52, 2, '2018-05-23'),
(68, 935159891, 4, 1, 52, 2, '2018-05-23'),
(69, 493963060, 4, 1, 52, 2, '2018-05-23'),
(70, 2048245227, 4, 1, 52, 2, '2018-05-23'),
(71, 182364271, 4, 1, 52, 2, '2018-05-23'),
(72, 26726790, 4, 1, 52, 2, '2018-05-23'),
(73, 26726790, 4, 1, 52, 2, '2018-05-23'),
(74, 264780350, 4, 1, 52, 2, '2018-05-23'),
(75, 264780350, 4, 1, 52, 2, '2018-05-23'),
(76, 264780350, 4, 1, 52, 2, '2018-05-23'),
(77, 1733974968, 4, 1, 52, 2, '2018-05-23'),
(80, 958245369, 4, 1, 52, 2, '2018-05-23'),
(82, 1282170838, 5, 2, 1040, 40, '2018-05-23'),
(84, 952603982, 4, 1, 52, 2, '2018-05-23'),
(85, 611639938, 4, 1, 52, 2, '2018-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `position`) VALUES
(6, 'Ananya', 'aaaa', 'Admin'),
(7, 'Tori', 'tttt', 'Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `UC` (`category_name`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `product_category` (`category_name`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
