-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 07:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `postcode` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `other_skills` varchar(300) DEFAULT NULL,
  `eoi_status` varchar(10) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi_tb`
--

INSERT INTO `eoi_tb` (`EOInumber`, `job_ref_no`, `first_name`, `last_name`, `street_address`, `suburb_town`, `state`, `postcode`, `email`, `phone_number`, `skills`, `other_skills`, `eoi_status`) VALUES
(13, 'NA23X', 'remy', 'amor', '63 zoo lane', 'melbourne', 'VIC', 3000, 'exampleemail@gmail.com', '0412 312 312', 'network_diagnostics, network_security, version_control', 'Other skills input here', 'New'),
(14, 'NA23X', 'remy', 'test', 'Test lane', 'tes town', 'WA', 3033, 'test@swinburne.com', '0490379973', 'cloud_technologies, network_diagnostics, programming', 'Ta', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_ref` varchar(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reports_to` varchar(100) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `summary` text NOT NULL,
  `responsibilities` text NOT NULL,
  `qualifications` text NOT NULL,
  `preferences` text NOT NULL,
  `benefits` text NOT NULL,
  `closing_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_ref`, `title`, `location`, `job_type`, `department`, `reports_to`, `salary`, `summary`, `responsibilities`, `qualifications`, `preferences`, `benefits`, `closing_date`) VALUES
('NA23X', 'Network Administrator', 'John St, Hawthorn VIC 3122', 'Full-Time', 'IT Administration', 'IT Manager / Senior Network Engineer', '$85,000 - $105,000 AUD', 'The Network Administrator ensures the secure and efficient operation of network infrastructure including LANs, WANs, VPNs, and cloud-based systems.', 'Configure and maintain: Routers and switches, Firewalls and wireless access points; Manage and monitor LAN/WAN performance; Implement network security measures; Document network topologies and procedures.', 'Degree in IT/Computer Science; 3+ years network administration experience; Experience with Cisco, Fortinet, and cloud platforms; Certifications: CCNA or Network+', 'Experience in managed service environments (MSP); Fortinet NSE Certification', 'Hybrid work options; Professional development support; Health insurance and paid leave', '2025-07-10'),
('SE41B', 'Software Engineer', '99 Collins St, Melbourne VIC 3000', 'Full-Time', 'Software Development', 'Lead Software Architect', '$95,000 - $115,000 AUD', 'The Software Engineer will design, build, and maintain scalable applications for clients in various industries using modern development frameworks and practices.', 'Design and develop web and desktop applications; Maintain clean and well-documented code; Participate in code reviews and agile meetings; Debug and test software systems; Collaborate with UI/UX designers and backend teams.', 'Bachelor’s degree in Computer Science or related field; Proficiency in Python, JavaScript, and SQL; 2+ years of software development experience; Familiarity with React.js and Node.js', 'Experience with cloud deployment (AWS, Azure); CI/CD tools and containerization (Docker, Jenkins)', 'Flexible working hours; Performance bonuses; Career growth opportunities', '2025-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `manager_details_tb`
--

CREATE TABLE `manager_details_tb` (
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_details_tb`
--

INSERT INTO `manager_details_tb` (`username`, `password`) VALUES
('admin', '$2y$10$sAhuCM35ZOzVCy26PF7t1.0lkFyyCLKFYoGpRH.zNq6pzYa9zgZj2'),
('remy', '$2y$10$Yv999Et1B/J7wxFSppFzCe6s.r8MsZ9ShRcWI2YfFGwSpNpKQxRsq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi_tb`
--
ALTER TABLE `eoi_tb`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_ref`);

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
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
