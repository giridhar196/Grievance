-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 07:25 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievance`
--

-- --------------------------------------------------------

--
-- Table structure for table `grievance_registration`
--

CREATE TABLE `grievance_registration` (
  `TitlePrefex` varchar(225) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Gender` varchar(225) NOT NULL,
  `RegistrationNumber` varchar(225) NOT NULL,
  `Address` text NOT NULL,
  `EmailId` varchar(225) NOT NULL,
  `Nationality` varchar(225) NOT NULL,
  `Phone` varchar(225) NOT NULL,
  `RegistrationType` varchar(225) NOT NULL,
  `SubjectIfAny` varchar(225) NOT NULL,
  `GrievanceDetails` text NOT NULL,
  `UniqueId` varchar(225) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grievance_registration`
--
ALTER TABLE `grievance_registration`
  ADD UNIQUE KEY `UniqueId` (`UniqueId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
