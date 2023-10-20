-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 05:00 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(5) NOT NULL,
  `countryid` int(5) DEFAULT NULL,
  `stateid` int(5) DEFAULT NULL,
  `cityname` varchar(250) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `countryid`, `stateid`, `cityname`, `creationdate`) VALUES
(1, 1, 1, 'Port Blair', '2022-07-08 13:06:25'),
(2, 1, 1, 'Neil Island', '2022-07-08 13:07:30'),
(3, 1, 1, 'Ross Island ', '2022-07-08 13:07:53'),
(4, 1, 1, 'Diglipur', '2022-07-08 13:09:29'),
(5, 1, 1, 'Long Island', '2022-07-08 13:09:53'),
(6, 1, 2, 'Kakinada', '2022-07-08 13:11:04'),
(7, 1, 2, 'Rajahmundry', '2022-07-08 13:11:29'),
(8, 1, 2, 'East Godavari', '2022-07-08 13:11:52'),
(9, 1, 5, 'Patna', '2022-07-08 13:12:36'),
(10, 1, 5, 'Bagalpur', '2022-07-08 13:12:55'),
(11, 1, 5, 'Aara', '2022-07-08 13:13:15'),
(12, 2, 6, 'Canberra', '2022-07-08 13:14:53'),
(13, 2, 6, 'drawin', '2022-07-08 13:15:54'),
(14, 2, 6, 'hyawi', '2022-07-08 13:16:21'),
(15, 2, 9, 'Brisbane', '2022-07-08 13:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(5) NOT NULL,
  `countryname` varchar(250) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryname`, `creationdate`) VALUES
(1, 'India', '2022-07-08 07:41:13'),
(2, 'Austraila', '2022-07-08 07:42:27'),
(3, 'USA', '2022-07-08 07:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StCode` int(11) NOT NULL,
  `countryid` int(5) DEFAULT NULL,
  `StateName` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StCode`, `countryid`, `StateName`) VALUES
(1, 1, 'Andaman and Nicobar Island (UT)'),
(2, 1, 'Andhra Pradesh'),
(3, 1, 'Arunachal Pradesh'),
(4, 1, 'Assam'),
(5, 1, 'Bihar'),
(6, 2, 'Australian Capital Territory'),
(7, 2, 'New South Wales'),
(8, 2, 'Northern Territory'),
(9, 2, 'Queensland'),
(10, 2, 'South Australia'),
(11, 2, 'Tasmania'),
(12, 2, 'Victoria'),
(13, 3, 'Alabama'),
(14, 3, 'Alaska'),
(15, 3, 'Arizona'),
(16, 3, 'Arkansas'),
(17, 3, 'Iowa'),
(18, 3, 'Kansas'),
(19, 3, 'Louisiana'),
(20, 3, 'Maryland'),
(21, 3, 'Michigan'),
(22, 3, 'New Jersey'),
(23, 3, 'New Mexico'),
(24, 3, 'Vermont'),
(25, 3, 'Washington'),
(26, NULL, 'Odisha'),
(27, NULL, 'Puducherry (UT)'),
(28, NULL, 'Punjab'),
(29, NULL, 'Rajastha'),
(30, NULL, 'Sikkim'),
(31, NULL, 'Tamil Nadu'),
(32, NULL, 'Telangana'),
(33, NULL, 'Tripura'),
(34, NULL, 'Uttarakhand'),
(35, NULL, 'Uttar Pradesh'),
(36, NULL, 'West Bengal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
