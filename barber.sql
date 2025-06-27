-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 05:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barber`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `appoint_date` date DEFAULT NULL,
  `appoint_time` time DEFAULT NULL,
  `appoint_description` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `sale` double(5,2) NOT NULL,
  `cusID` int(11) DEFAULT NULL,
  `barber_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `barber_id` int(11) NOT NULL,
  `barber_name` varchar(100) DEFAULT NULL,
  `barber_phone_num` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `cust_name` varchar(100) DEFAULT NULL,
  `cust_phone_num` varchar(15) DEFAULT NULL,
  `cust_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customerservice`
--

CREATE TABLE `customerservice` (
  `cusID` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `cusID` int(11) DEFAULT NULL,
  `appoint_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_method` varchar(50) DEFAULT NULL,
  `pay_amount` decimal(10,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `appoint_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `service_price` decimal(10,2) DEFAULT NULL,
  `service_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(99) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `username`, `password`, `role`) VALUES
(1, 'afiq', 'admin', '$2a$12$Tmx0/DhbolhdeOhSxQGPSeCyEf0g20Yj2x6ldgrhn3VsactPVej.m', 'admin'),
(2, 'hai', 'fawwaz', '$2a$12$Tmx0/DhbolhdeOhSxQGPSeCyEf0g20Yj2x6ldgrhn3VsactPVej.m', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `cusID` (`cusID`),
  ADD KEY `barber_id` (`barber_id`);

--
-- Indexes for table `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`barber_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `customerservice`
--
ALTER TABLE `customerservice`
  ADD PRIMARY KEY (`cusID`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `cusID` (`cusID`),
  ADD KEY `appoint_id` (`appoint_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `appoint_id` (`appoint_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`cusID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`barber_id`) REFERENCES `barber` (`barber_id`);

--
-- Constraints for table `customerservice`
--
ALTER TABLE `customerservice`
  ADD CONSTRAINT `customerservice_ibfk_1` FOREIGN KEY (`cusID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `customerservice_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cusID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`appoint_id`) REFERENCES `appointment` (`appoint_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`appoint_id`) REFERENCES `appointment` (`appoint_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
