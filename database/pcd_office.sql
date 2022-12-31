-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 06:51 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
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
  `grama_niladhari_approval` int(11) DEFAULT 0,
  `secretary_approval` int(11) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_date` datetime DEFAULT NULL,
  `grama_niladhari_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `secretary_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationId`, `applicationNo`, `applicantName`, `nic`, `address`, `birthday`, `maritalStatus`, `childAbove18`, `childBelow18`, `contact`, `electoralSeat`, `referredPerson`, `villageDomain`, `regionalDivision`, `reason`, `description`, `grama_niladhari_approval`, `secretary_approval`, `date`, `approved_date`, `grama_niladhari_sign`, `secretary_sign`) VALUES
(28, 'PCD/KE/SC/22/12/29/1', 'Test', '111111111G', 'test address', '2022-12-16', b'1', 1, 1, '1111111111', 'KE', 'test', 'aa', 'Kotte', 'SC', ' test', 0, 0, '2022-12-29 23:20:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_category`
--

DROP TABLE IF EXISTS `application_category`;
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
(5, 'Job', 'JO');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_date` date NOT NULL,
  `e_image` varchar(500) CHARACTER SET latin1 NOT NULL,
  `e_description` varchar(500) NOT NULL,
  `e_postDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `e_name`, `e_date`, `e_image`, `e_description`, `e_postDate`) VALUES
(2, 'සමෘද්ධි සහනාධාර', '2021-04-03', 'samurdi.jpg', 'සමෘද්ධි සහනාධාර ලබා දෙන දිනය 2021.4.3\r\n ', '2021-03-03 20:24:38'),
(3, 'අධ්‍යයාපන ආධාර ලබා දීම ', '2021-04-25', 'donation.jpg', 'අඩු ආදායම් ලාභී පවුල් වල ළමුන්ට අධ්‍යයාපන ආධාර ලබා දෙන දිනය 2021.4.25\r\n', '2021-03-17 15:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `peopleId` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `nic` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `electoralseat` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`peopleId`, `firstname`, `lastname`, `username`, `email`, `contact`, `nic`, `password`, `electoralseat`, `date`) VALUES
(1, 'People', 'people123@', 'People', 'tiranharsha2323@gmail.com', '761234567', '962841180V', 'dd019d2558f6e70837033950dbfe587a', '', '2021-03-10 21:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
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
(2, 'Staff', 'staff123@', 'tiran2323@gmail.com', 'Staff', 'male', '2147483647', '', 'Deepthi', '2d6daf8be267352db0a04a5c26002bb3', 2);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

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
  MODIFY `applicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `application_category`
--
ALTER TABLE `application_category`
  MODIFY `applicationCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `peopleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
