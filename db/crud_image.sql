-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 08:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_image`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_price` varchar(50) NOT NULL,
  `pro_date` date NOT NULL DEFAULT current_timestamp(),
  `pro_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `type_id`, `pro_name`, `pro_price`, `pro_date`, `pro_image`) VALUES
(1, 0, 'aaa', '1000', '2021-02-02', 'Laravel1.png'),
(2, 0, 'bbb', '10', '2021-02-02', 'Laravel2.png'),
(3, 0, 'c', '10', '2021-02-02', 'image_601938f619523.png'),
(4, 0, 'd', '10', '2021-02-02', 'image_60194483db931.png'),
(6, 0, 'f', '10', '2021-02-02', 'image_601946bf98f21.png'),
(7, 0, 'g', '10', '2021-02-02', 'image_601968b8be1cf.png'),
(9, 1, 'zzz', '10', '2021-02-02', 'image_60197d836d548.png'),
(10, 1, 'abc', '10', '2021-07-27', 'image_60ffa9f2b6681.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type_id`, `type_name`, `date`) VALUES
(1, 'aaa', '2021-02-02'),
(2, 'bbb', '2021-02-02'),
(3, 'ccc', '2021-02-02'),
(4, 'ddd', '2021-02-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
