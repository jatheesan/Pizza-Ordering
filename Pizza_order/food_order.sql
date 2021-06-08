-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 07:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'Jathees', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `Id` int(10) NOT NULL,
  `Customer Name` varchar(30) NOT NULL,
  `phone_No` int(10) NOT NULL,
  `NIC_no` varchar(10) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Order_Status` enum('new order','delivered') NOT NULL DEFAULT 'new order',
  `Bill` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivered`
--

INSERT INTO `delivered` (`Id`, `Customer Name`, `phone_No`, `NIC_no`, `Date`, `Type`, `Size`, `Quantity`, `Order_Status`, `Bill`) VALUES
(1, 'Jatheesan', 786021241, '961260280v', '2020-06-27', 'Tandoor Chicken', 'personal', 1, 'new order', 0),
(2, 'senthu', 777653422, '966720280v', '2020-06-23', 'Chicken Trio', 'large', 1, 'delivered', 1000),
(3, 'Sri Jathee', 786021241, '961260280v', '2020-06-27', 'Fiery Chicken', 'large', 1, 'new order', 0),
(4, 'Jatheesan', 777653422, '966720280v', '2020-06-23', 'Mighty Meat - Chicken', 'personal', 1, 'delivered', 1200),
(5, 'srikaran', 775432762, '8567432176', '2020-06-23', 'Seafood Supremo', 'personal', 2, 'new order', 600),
(6, 'mery', 775432762, '961260280v', '2020-06-27', 'Tandoor Chicken', 'large', 1, 'new order', 0),
(7, 'subankan', 775432762, '956743872v', '2020-06-23', 'Tandoor Chicken', 'large', 1, 'new order', 1200),
(13, 'sri', 761234567, '8567432176', '2020-06-30', 'Tandoor Chicken', 'Medium', 1, 'new order', 0),
(14, 'jathu', 761234567, '961260280v', '2020-06-30', 'Mighty Meat - Chicken', 'large', 3, 'new order', 0),
(15, 'baba', 786021241, '8567432176', '2020-07-03', 'Chicken BBQ', 'medium', 2, 'delivered', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pizza_order`
--

CREATE TABLE `pizza_order` (
  `Id` int(10) NOT NULL,
  `Customer Name` varchar(10) NOT NULL,
  `Phone_no` varchar(10) NOT NULL,
  `NIC_no` varchar(20) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Order_Status` enum('new order','delivered') NOT NULL DEFAULT 'new order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizza_order`
--

INSERT INTO `pizza_order` (`Id`, `Customer Name`, `Phone_no`, `NIC_no`, `Date`, `Type`, `Size`, `Quantity`, `Order_Status`) VALUES
(1, 'Jatheesan', '0786021241', '961260280v', '2020-06-27', 'Tandoor Chicken', 'personal', 1, 'new order'),
(3, 'Sri Jathee', '0786021241', '961260280v', '2020-06-27', 'Fiery Chicken', 'large', 1, 'delivered'),
(5, 'srikaran', '0775432762', '8567432176v', '2020-06-23', 'Seafood Supremo', 'personal', 2, 'new order'),
(6, 'mery', '0775432762', '961260280v', '2020-06-27', 'Tandoor Chicken', 'large', 1, 'new order'),
(7, 'subankan', '0775432762', '956743872v', '2020-06-23', 'Tandoor Chicken', 'Medium', 1, 'new order'),
(13, 'sri', '0761234567', '8567432176v', '2020-06-30', 'Tandoor Chicken', 'medium', 1, 'new order'),
(14, 'jathu', '0761234567', '961260280v', '2020-06-30', 'Mighty Meat - Chicken', 'large', 3, 'new order');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `Pizza_type` varchar(30) NOT NULL,
  `Pizza_size` varchar(10) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`Pizza_type`, `Pizza_size`, `price`) VALUES
('Tandoor Chicken', 'personal', 500),
('Tandoor Chicken', 'medium', 800),
('Tandoor Chicken', 'large', 1200),
('Fiery Chicken', 'personal', 1000),
('Fiery Chicken', 'medium', 1500),
('Fiery Chicken', 'large', 2000),
('Chicken BBQ', 'personal', 1000),
('Chicken BBQ', 'medium', 1500),
('Chicken BBQ', 'large', 2000),
('Chicken Trio', 'personal', 400),
('Chicken Trio', 'medium', 600),
('Chicken Trio', 'large', 1000),
('Mighty Meat - Chicken', 'personal', 1200),
('Mighty Meat - Chicken', 'medium', 1500),
('Mighty Meat - Chicken', 'large', 1800),
('Seafood Supremo', 'personal', 300),
('Seafood Supremo', 'medium', 500),
('Seafood Supremo', 'large', 800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pizza_order`
--
ALTER TABLE `pizza_order`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pizza_order`
--
ALTER TABLE `pizza_order`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
