-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2016 at 04:38 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timeclock`
--

-- --------------------------------------------------------

--
-- Table structure for table `time_data`
--

CREATE TABLE `time_data` (
  `time_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `data_date` date DEFAULT NULL,
  `type_id` int(10) NOT NULL DEFAULT '0',
  `hours` double DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `time_periods`
--

CREATE TABLE `time_periods` (
  `period_id` int(10) NOT NULL,
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_periods`
--

INSERT INTO `time_periods` (`period_id`, `start_date`, `end_date`) VALUES
(1, '2016-02-01', '2016-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `time_types`
--

CREATE TABLE `time_types` (
  `type_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_types`
--

INSERT INTO `time_types` (`type_id`, `description`) VALUES
(2, 'sick'),
(3, 'vacation'),
(4, 'regular'),
(5, 'no pay');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `level` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'User',
  `username` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `passcode` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `fname`, `lname`, `level`, `username`, `passcode`) VALUES
(1, 'Admin', 'Admin', 'Administrator', 'Admin', '$2y$10$ZetX0AM6pBmo9TxF3YDlqehmcIByiMaLv/drKol/plECrE/2ZHQJ2'),
(3, 'Fred', 'Flintstone', 'User', 'fred', '$2y$10$21DLjjtYOVZwGxowv/b61ujucvqrZ.QubFLH5eTA0kzaI4cWE4gyO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `time_data`
--
ALTER TABLE `time_data`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `time_periods`
--
ALTER TABLE `time_periods`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `time_types`
--
ALTER TABLE `time_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `time_data`
--
ALTER TABLE `time_data`
  MODIFY `time_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `time_periods`
--
ALTER TABLE `time_periods`
  MODIFY `period_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `time_types`
--
ALTER TABLE `time_types`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
