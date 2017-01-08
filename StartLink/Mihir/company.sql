-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 08:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(5) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `product` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `isPremium` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `email_id`, `password`, `phone`, `description`, `address`, `product`, `country`, `isPremium`) VALUES
(1, 'Zomato', 'zomato@gmail.com', '12345678', 8918390019, 'Food', 'Bandra', 'ServiceApp', 'India', 'YES'),
(2, 'Food Panda', 'foodpanda@gmail.com', '12345678', 8929310019, 'Food', 'Dadar', 'Delivery App', 'India', 'NO'),
(3, 'Swiggy', 'swiggy@gmail.com', '12345678', 9293194028, 'Food', 'Chembur', 'Delivery App', 'India', 'YES'),
(4, 'Box8', 'box8@gmail.com', '12345678', 9220110901, 'Food', 'Borivali', 'Delivery App', 'India', 'NO'),
(5, 'Grab', 'grab@gmail.com', '12345678', 9222348228, 'Food', 'Sion', 'Delivery App', 'India', 'NO'),
(6, 'Ola', 'ola@gmail.com', '12345678', 9200390192, 'Taxi Service', 'Byculla', 'Cab Service App', 'India', 'YES'),
(7, 'Uber', 'uber@gmail.com', '12345678', 8039238619, 'Taxi Service', 'Kurla', 'Cab Service App', 'India', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
