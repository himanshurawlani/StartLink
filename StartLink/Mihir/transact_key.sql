-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 08:00 PM
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
-- Table structure for table `transact_key`
--

CREATE TABLE `transact_key` (
  `unique_id` int(5) NOT NULL,
  `buyer_id` int(5) NOT NULL,
  `seller_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transact_key`
--
ALTER TABLE `transact_key`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `t_sell` (`seller_id`),
  ADD KEY `t_buy` (`buyer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transact_key`
--
ALTER TABLE `transact_key`
  MODIFY `unique_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transact_key`
--
ALTER TABLE `transact_key`
  ADD CONSTRAINT `t_buy` FOREIGN KEY (`buyer_id`) REFERENCES `transaction` (`buyer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_sell` FOREIGN KEY (`seller_id`) REFERENCES `transaction` (`seller_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
