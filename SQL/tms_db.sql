-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 03:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_userid` varchar(255) NOT NULL,
  `t_userid` varchar(10) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `postalcode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_userid`, `t_userid`, `pass`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `district`, `postalcode`) VALUES
('b-62', 'masud-79', '827ccb0eea8a706c4c34a16891f84e7b', 'B', 'D', 'bd@gmail.com', '0147895', 'H1,R5, Gulshan', 'Dhaka', 'Dhaka', 546),
('martin-39', 'masud-79', '827ccb0eea8a706c4c34a16891f84e7b', 'Martin', 'Roger', 'martin@gmail.com', '0178596582', 'House 1, Road 5, Rampura', 'Dhaka', 'Dhaka', 4312),
('md-69', 'masud-79', '81dc9bdb52d04dc20036dbd8313ed055', 'Md', 'Kabil', 'kabilbiswas566@gmail.com', '01521410912', 'kda', 'khulna', 'khulna', 9100),
('sinha-47', 'masud-79', '202cb962ac59075b964b07152d234b70', 'Sinha', 'Afroz', 'sinhaafroz16@gmail.com', '0152372742', 's/2', 'Dhanmondi', 'Dhaka', 1207);

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE `dress` (
  `designid` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `required_measurement` varchar(255) DEFAULT NULL,
  `productcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `mateid` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material_orders_dress`
--

CREATE TABLE `material_orders_dress` (
  `Materialmateid` varchar(255) NOT NULL,
  `Orders_DressOrdersorderno` int(10) NOT NULL,
  `Orders_DressDressdesignid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `c_userid` varchar(255) NOT NULL,
  `height` int(10) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `neck` int(10) DEFAULT NULL,
  `chest` int(10) DEFAULT NULL,
  `waist` int(10) DEFAULT NULL,
  `hips` int(10) DEFAULT NULL,
  `shoulder` int(10) DEFAULT NULL,
  `sleeve` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`c_userid`, `height`, `weight`, `neck`, `chest`, `waist`, `hips`, `shoulder`, `sleeve`) VALUES
('b-62', 70, 65, 18, 25, 30, 32, 20, 16),
('sinha-47', 65, 50, 2, 11, 2, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderno` int(10) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderno` int(10) NOT NULL,
  `c_userid` varchar(255) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_dress`
--

CREATE TABLE `orders_dress` (
  `Ordersorderno` int(10) NOT NULL,
  `Dressdesignid` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `orderno` int(10) NOT NULL,
  `trans_no` varchar(255) DEFAULT NULL,
  `paydate` date DEFAULT NULL,
  `payamount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

CREATE TABLE `tailor` (
  `t_userid` varchar(10) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tailor`
--

INSERT INTO `tailor` (`t_userid`, `pass`, `fname`, `lname`, `email`, `phone`, `address`) VALUES
('masud-79', 'acf6b443c56e67e0dbd86323e8751121', 'Mr', 'Tailor', 'tailor@gmail.com', '01875698', 'House 1, Road 3, Banani, Dhaka'),
('sayed', '827ccb0eea8a706c4c34a16891f84e7b', 'Tailor', 'Shop', 'tailor1@gmail.com', '015898', 'Uttara, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`productcode`),
  ADD UNIQUE KEY `productname` (`productname`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `FKCustomer496508` (`t_userid`);

--
-- Indexes for table `dress`
--
ALTER TABLE `dress`
  ADD PRIMARY KEY (`designid`),
  ADD KEY `FKDress63043` (`productcode`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mateid`),
  ADD KEY `FKMaterial96906` (`designid`);

--
-- Indexes for table `material_orders_dress`
--
ALTER TABLE `material_orders_dress`
  ADD PRIMARY KEY (`Materialmateid`,`Orders_DressOrdersorderno`,`Orders_DressDressdesignid`),
  ADD KEY `FKMaterial_O147670` (`Materialmateid`),
  ADD KEY `FKMaterial_O750518` (`Orders_DressOrdersorderno`,`Orders_DressDressdesignid`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`c_userid`),
  ADD KEY `FKMeasuremen866508` (`c_userid`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderno`),
  ADD KEY `FKOrderDetai45992` (`orderno`),
  ADD KEY `FKOrderDetai398445` (`productcode`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderno`),
  ADD KEY `FKOrders106494` (`c_userid`);

--
-- Indexes for table `orders_dress`
--
ALTER TABLE `orders_dress`
  ADD PRIMARY KEY (`Ordersorderno`,`Dressdesignid`),
  ADD KEY `FKOrders_Dre310325` (`Ordersorderno`),
  ADD KEY `FKOrders_Dre881533` (`Dressdesignid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`orderno`),
  ADD UNIQUE KEY `trans_no` (`trans_no`),
  ADD KEY `FKPayments173611` (`orderno`);

--
-- Indexes for table `tailor`
--
ALTER TABLE `tailor`
  ADD PRIMARY KEY (`t_userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderno` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FKCustomer496508` FOREIGN KEY (`t_userid`) REFERENCES `tailor` (`t_userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dress`
--
ALTER TABLE `dress`
  ADD CONSTRAINT `FKDress63043` FOREIGN KEY (`productcode`) REFERENCES `category` (`productcode`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `FKMaterial96906` FOREIGN KEY (`designid`) REFERENCES `dress` (`designid`);

--
-- Constraints for table `material_orders_dress`
--
ALTER TABLE `material_orders_dress`
  ADD CONSTRAINT `FKMaterial_O147670` FOREIGN KEY (`Materialmateid`) REFERENCES `material` (`mateid`),
  ADD CONSTRAINT `FKMaterial_O750518` FOREIGN KEY (`Orders_DressOrdersorderno`,`Orders_DressDressdesignid`) REFERENCES `orders_dress` (`Ordersorderno`, `Dressdesignid`);

--
-- Constraints for table `measurement`
--
ALTER TABLE `measurement`
  ADD CONSTRAINT `FKMeasuremen866508` FOREIGN KEY (`c_userid`) REFERENCES `customer` (`c_userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FKOrderDetai398445` FOREIGN KEY (`productcode`) REFERENCES `category` (`productcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKOrderDetai45992` FOREIGN KEY (`orderno`) REFERENCES `orders` (`orderno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FKOrders106494` FOREIGN KEY (`c_userid`) REFERENCES `customer` (`c_userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_dress`
--
ALTER TABLE `orders_dress`
  ADD CONSTRAINT `FKOrders_Dre310325` FOREIGN KEY (`Ordersorderno`) REFERENCES `orders` (`orderno`),
  ADD CONSTRAINT `FKOrders_Dre881533` FOREIGN KEY (`Dressdesignid`) REFERENCES `dress` (`designid`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FKPayments173611` FOREIGN KEY (`orderno`) REFERENCES `orders` (`orderno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
