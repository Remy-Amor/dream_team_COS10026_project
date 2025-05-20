-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 11:33 AM
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
-- Database: `eoi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi_tb`
--

CREATE TABLE `eoi_tb` (
  `EOInumber` int(11) NOT NULL,
  `job_ref_no` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `suburb_town` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `network_admin_skills` tinyint(1) NOT NULL,
  `software_developer_skills` tinyint(1) NOT NULL,
  `other_skills` varchar(300) DEFAULT NULL,
  `eoi_status` varchar(10) NOT NULL DEFAULT 'New',
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi_tb`
--

INSERT INTO `eoi_tb` (`EOInumber`, `job_ref_no`, `first_name`, `last_name`, `street_address`, `suburb_town`, `state`, `post_code`, `email`, `phone_number`, `network_admin_skills`, `software_developer_skills`, `other_skills`, `status`) VALUES
(2, 'NA23X', 'Aman', 'ingewp', 'eoign', 'igoen', 'VIC', '3000', 'enidvvn@gmial.com', '0404040404', 0, 0, 'Hellowoow', 'New'),
(3, 'NA23X', 'Aman', 'ingewp', 'eoign', 'igoen', 'VIC', '3000', 'enidvvn@gmial.com', '0404040404', 0, 0, 'Hellowoow', 'New'),
(4, 'NA23X', 'Aman', 'ingewp', 'eoign', 'igoen', 'VIC', '3000', 'enidvvn@gmial.com', '0404040404', 0, 0, 'Hellowoow', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `manager_details_tb`
--

CREATE TABLE `manager_details_tb` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi_tb`
--
ALTER TABLE `eoi_tb`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `manager_details_tb`
--
ALTER TABLE `manager_details_tb`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi_tb`
--
ALTER TABLE `eoi_tb`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
