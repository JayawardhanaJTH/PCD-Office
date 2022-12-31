-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 05:20 PM
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
  `date` date NOT NULL DEFAULT current_timestamp(),
  `approved_date` datetime DEFAULT NULL,
  `grama_niladhari_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `secretary_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationId`, `applicationNo`, `applicantName`, `nic`, `address`, `birthday`, `maritalStatus`, `childAbove18`, `childBelow18`, `contact`, `electoralSeat`, `referredPerson`, `villageDomain`, `regionalDivision`, `reason`, `description`, `grama_niladhari_approval`, `secretary_approval`, `date`, `approved_date`, `grama_niladhari_sign`, `secretary_sign`) VALUES
(29, 'PCD/CE/SC/22/12/29/1', 'Test', '962841180V', 'test address', '2022-12-30', b'1', 0, 0, '1111111111', 'CE', 'test', 'aa', 'Dehiwala', 'SC', ' test', 0, 0, '2022-12-29', NULL, NULL, NULL),
(30, 'PCD/KO/RL/22/12/31/1', 'People test123@', '962841180V', 'address', '2022-12-30', b'1', 4, 5, '0761234567', 'KO', '55', '4', 'Kolonnawa', 'RL', ' 555', 0, 0, '2022-12-31', NULL, NULL, NULL),
(31, 'PCD/KL/SO/22/12/31/1', 'People test123@', '962841180V', 'address', '2022-12-26', b'1', 3, 4, '0761234567', 'KL', 'dd', 'dd', 'Moratuwa', 'SO', ' dd', 0, 0, '2022-12-31', NULL, NULL, NULL),
(32, 'PCD/KL/JO/22/12/31/3', 'People test123@', '962841180V', 'address', '2022-12-14', b'1', 1, 1, '0761234567', 'KL', 'test', 'aa', 'Kolonnawa', 'JO', ' tre', 0, 0, '2022-12-31', NULL, NULL, NULL);

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
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `electoralseat` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`peopleId`, `firstname`, `lastname`, `username`, `email`, `contact`, `nic`, `address`, `password`, `electoralseat`, `date`) VALUES
(1, 'People', 'test123@', 'People', 'tiranharsha2323@gmail.com', '761234567', '962841180V', 'address', 'dd019d2558f6e70837033950dbfe587a', 'CE', '2021-03-10 21:21:01');

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
(2, 'Staff', 'd', 'tiran2323@gmail.com', 'Staff', 'female', '2147483643', '333333333h', 'Deepthi', '2d6daf8be267352db0a04a5c26002bb3', 2),
(12, 'qq', 'qq', 'tiranharsha2323@gmail.com', 'qq', 'female', '1111111111', '111111111tgggggg', '1', '8dbbbaa275d6771870962de8b7a235d7', 2),
(13, 'aa', 'aa', 'tiran2323@gmail.com', 'aa', 'female', '1111111111', '111111111A', '11', '996f87c3f97cf35ffd18cba18102419c', 2),
(14, 'd', 'd', 'samantha@gmail.com', 'd', 'female', '2222222222', '111111111A', '2', '3dd172a2b3e860083a2dc05ea31aa93d', 2),
(15, 's', 's', 'test@test.com', 's', 'male', '2222222222', '111111111A', '2', 'd216c9fdaa60144c4dd39c21ff68daa1', 2),
(16, 'aa', 'a', 'tiranharsha2323@gmail.com', 'a', 'male', 'aa', '111111111S', 'aa', '0fc68dbf85e96c9858d29016e072f2a6', 2),
(17, 'aa', 'a', 'tiranharsha2323@gmail.com', 'a', 'male', 'aa', '111111111S', 'aa', '0fc68dbf85e96c9858d29016e072f2a6', 2),
(18, 'aa', 'a', 'tiranharsha2323@gmail.com', 'a', 'male', 'aa', '111111111S', 'aa', '0fc68dbf85e96c9858d29016e072f2a6', 2),
(19, 'aa', 'a', 'tiranharsha2323@gmail.com', 'a', 'male', 'aa', '111111111S', 'aa', '0fc68dbf85e96c9858d29016e072f2a6', 2),
(20, 'aa', 'a', 'tiranharsha2323@gmail.com', 'a', 'male', 'aa', '111111111S', 'aa', '0fc68dbf85e96c9858d29016e072f2a6', 2),
(21, 'aa', 'a', 'tiranharsha2323@gmail.com', 'a', 'male', 'aa', '111111111S', 'aa', '0fc68dbf85e96c9858d29016e072f2a6', 2),
(22, 'aa', 'aa', 'samantha@gmail.com', 'aa', 'female', '1111111111', '111111111k', '2', '6d35779af58a917fda6068128a4e13c0', 2);

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
  MODIFY `applicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
