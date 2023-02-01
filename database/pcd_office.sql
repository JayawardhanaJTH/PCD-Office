-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 08:09 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcd_office`
--
CREATE DATABASE IF NOT EXISTS `pcd_office` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pcd_office`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `application_summary` (IN `fromDate` DATE, IN `toDate` DATE)   BEGIN  
    SELECT COUNT(a.applicationId) As Total FROM application a WHERE a.date BETWEEN fromDate AND toDate;
	SELECT COUNT(a.applicationId) As Pending FROM application a WHERE a.date BETWEEN fromDate AND toDate AND a.approval = 0;
    SELECT COUNT(a.applicationId) As Approved FROM application a WHERE a.date BETWEEN fromDate AND toDate AND a.approval = 1;
	SELECT COUNT(a.applicationId) As Rejected FROM application a WHERE a.date BETWEEN fromDate AND toDate AND a.approval = 3;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationId` int(11) NOT NULL,
  `applicationNo` varchar(100) NOT NULL,
  `applicantName` varchar(200) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `birthday` date NOT NULL,
  `maritalStatus` bit(1) NOT NULL,
  `childAbove18` int(11) NOT NULL,
  `childBelow18` int(11) NOT NULL,
  `contact` varchar(15) CHARACTER SET latin1 NOT NULL,
  `electoralSeat` varchar(200) NOT NULL,
  `referredPerson` varchar(200) CHARACTER SET latin1 NOT NULL,
  `villageDomain` varchar(200) NOT NULL,
  `regionalDivision` varchar(200) CHARACTER SET latin1 NOT NULL,
  `reason` varchar(200) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `approval` int(11) DEFAULT 0,
  `approved_date` datetime DEFAULT NULL,
  `approved_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `comment` varchar(5000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `application_category`
--

CREATE TABLE `application_category` (
  `applicationCategoryId` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_category`
--

INSERT INTO `application_category` (`applicationCategoryId`, `categoryName`, `categoryCode`) VALUES
(1, 'School Problem', 'SC'),
(2, 'Religous', 'RL'),
(3, 'Personal', 'PL'),
(4, 'Organization', 'SO'),
(5, 'Job', 'JO'),
(6, 'Other', 'OT');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(5000) NOT NULL,
  `replies` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi | hello | hey', 'Hi!, How can I help you?');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_date` date NOT NULL,
  `e_image` varchar(500) CHARACTER SET latin1 NOT NULL,
  `e_description` varchar(500) NOT NULL,
  `e_postDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `e_name`, `e_date`, `e_image`, `e_description`, `e_postDate`) VALUES
(2, 'සමෘද්ධි සහනාධාර', '2021-04-03', 'samurdi.jpg', 'සමෘද්ධි සහනාධාර ලබා දෙන දිනය 2021.4.3\r\n ', '2021-03-03'),
(3, 'අධ්‍යයාපන ආධාර ලබා දීම ', '2021-04-25', 'donation.jpg', 'අඩු ආදායම් ලාභී පවුල් වල ළමුන්ට අධ්‍යයාපන ආධාර ලබා දෙන දිනය 2021.4.25\r\n', '2021-03-17'),
(4, 'test', '2023-01-26', 'MicrosoftTeams-image.png', ' ', '2023-01-02'),
(5, 'test2', '2023-01-13', 'MicrosoftTeams-image.png', ' ', '2023-01-03'),
(6, 'test3', '2023-01-28', 'logo.png', ' ', '2023-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `feedback` varchar(5000) NOT NULL,
  `peopleNic` varchar(20) NOT NULL,
  `applicationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `peopleId` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `nic` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `electoralseat` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `contactNumber` varchar(10) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `email`, `username`, `gender`, `contactNumber`, `nic`, `address`, `password`, `type`) VALUES
(1, 'samantha', 'samantha123@', 'samantha@gmail.com', 'Admin', 'male', '2147483647', '', '12379', '75be1117cc1397ecea7fec6440f9e9c2', 1),
(23, 'staff', 'Staff123@', 'staff@gmail.com', 'staff', 'male', '2222222222', '111111111D', 'test address', 'c3a4565fa4cd39fcbbe98e7178aef508', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationId`);

--
-- Indexes for table `application_category`
--
ALTER TABLE `application_category`
  ADD PRIMARY KEY (`applicationCategoryId`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`peopleId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_category`
--
ALTER TABLE `application_category`
  MODIFY `applicationCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `peopleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
