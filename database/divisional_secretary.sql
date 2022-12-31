-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 08:40 PM
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
-- Database: `divisional_secretary`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` varchar(500) NOT NULL,
  `upload_Name` varchar(100) NOT NULL,
  `downloads` smallint(11) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `description`, `upload_Name`, `downloads`, `upload_date`) VALUES
(1, 'Application for get income tax', 'ආදායම් සහතිකයක් ලබා ගැනීම සදහා අයදුම් පත', 'ආදයම_සහතක_අයදමපත.pdf', 38, '2021-03-02 21:35:06'),
(5, 'Application for cutting down trees', 'කොස් ගස් කැපීම සදහා අයදුම් පත', 'කසගස_කපම_අයදමපත.pdf', 30, '2021-03-03 21:47:23');

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
(1, 'School Problem', 'sc'),
(2, 'Religous', 'rl'),
(3, 'Personal', 'pl'),
(4, 'Organization', 'so'),
(5, 'Job', 'jo');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `status`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `business_registration`
--

CREATE TABLE `business_registration` (
  `f_id` int(11) NOT NULL,
  `b_name` varchar(200) NOT NULL,
  `b_form` varchar(300) NOT NULL,
  `b_address` varchar(200) NOT NULL,
  `b_date` date NOT NULL,
  `b_emp_count` int(11) NOT NULL,
  `b_sub_name` varchar(200) NOT NULL DEFAULT 'No',
  `b_owner_address` varchar(300) NOT NULL,
  `b_contact` varchar(15) CHARACTER SET latin1 NOT NULL,
  `b_citizenship` varchar(200) NOT NULL,
  `b_email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `b_ownership` varchar(200) NOT NULL,
  `b_grama_division` varchar(200) CHARACTER SET latin1 NOT NULL,
  `grama_niladhari_approval` int(11) DEFAULT 0,
  `secretary_approval` int(11) DEFAULT 0,
  `submitted_by` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_date` datetime DEFAULT NULL,
  `grama_niladhari_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `secretary_sign` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_registration`
--

INSERT INTO `business_registration` (`f_id`, `b_name`, `b_form`, `b_address`, `b_date`, `b_emp_count`, `b_sub_name`, `b_owner_address`, `b_contact`, `b_citizenship`, `b_email`, `b_ownership`, `b_grama_division`, `grama_niladhari_approval`, `secretary_approval`, `submitted_by`, `date`, `approved_date`, `grama_niladhari_sign`, `secretary_sign`) VALUES
(19, 'Abhiru', 'Software company', '0', '2021-03-27', 5, 'aaa', 'Deepthi', '2147483647', 'Sri lankan', 'tiranharsha2323@gmail.com', 'Own business', '165 Bopitiya', 1, 1, 1, '2021-03-10 21:01:45', '2021-03-11 07:16:12', 'IT18208672', 'Samantha'),
(23, 'Abhiru', 'Software development', 'Deepthi Adhikarigoda Kalutara Sri Lanka', '2021-03-15', 10, 'no', 'Deepthi Adhikarigoda Kalutara Sri Lanka', '+94769036197', 'Sri Lankan', 'tiran2323@gmail.com', 'Own', '166 Nugape', 0, 0, 1, '2021-03-17 15:39:44', NULL, NULL, NULL),
(24, '', '2', '', '0000-00-00', 0, '', '0', '', '', '', ' ', '', 0, 0, 1, '2022-12-26 01:04:16', NULL, NULL, NULL),
(25, '', '', '', '0000-00-00', 0, '', '', '', '', '', ' ', '', 0, 0, 1, '2022-12-26 01:16:24', NULL, NULL, NULL),
(26, '', '', '', '0000-00-00', 0, '', '', '', '', '', ' ', '', 0, 0, 1, '2022-12-26 01:17:12', NULL, NULL, NULL);

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
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `application_type` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `application_id`, `application_type`, `amount`, `date`) VALUES
(3, 34, 1, 120, '2021-03-15 14:16:10'),
(5, 36, 1, 120, '2021-03-15 14:16:10'),
(6, 5, 1, 120, '2021-03-15 14:52:50'),
(7, 6, 2, 120, '2021-03-15 14:54:58'),
(8, 7, 2, 120, '2021-03-15 14:59:54'),
(9, 8, 2, 120, '2021-03-15 15:01:28'),
(10, 23, 1, 120, '2021-03-17 15:39:44'),
(11, 24, 1, 0, '2022-12-26 01:04:16'),
(12, 25, 1, 0, '2022-12-26 01:16:24'),
(13, 26, 1, 0, '2022-12-26 01:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `pid` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grama_niladhari_division` varchar(200) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`pid`, `first_name`, `last_name`, `email`, `grama_niladhari_division`, `gender`, `contact_number`, `address`, `password`) VALUES
(1, 'Janage Tiran', 'Jayawardana', 'tiran2323@gmail.com', '164/A Maha Pamunugama', 'male', 2147483647, '12379', 'tiran123'),
(6, 'Tiran', 'Harsha', 'tiranharsha2323@gmail.com', '164/A Maha Pamunugama', 'male', 2147483647, 'Deepthi', 'WWwv1b4@'),
(7, 'Tiran', 'Harsha', 'tiranharsha2323@gmail.com', '164 Pamunugama', 'male', 2147483647, 'Deepthi', 'A^:AA<bf2^'),
(8, 'test', 'test', 'tiran2323@gmail.com', '164 Pamunugama', 'male', 0, 'ddd', '*A1F#aFA^j'),
(9, 'test', 'test', 'tiran2323@gmail.com', '164 Pamunugama', 'male', 0, 'ddd', '*A1F#aFA^j');

-- --------------------------------------------------------

--
-- Table structure for table `requirement_application`
--

CREATE TABLE `requirement_application` (
  `f_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `division` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `requirement` varchar(500) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `grama_approval` int(11) NOT NULL DEFAULT 0,
  `submitted_by` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_date` datetime DEFAULT NULL,
  `grama_niladhari_sign` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirement_application`
--

INSERT INTO `requirement_application` (`f_id`, `full_name`, `division`, `address`, `contact`, `email`, `requirement`, `nic`, `gender`, `grama_approval`, `submitted_by`, `date`, `approved_date`, `grama_niladhari_sign`) VALUES
(3, 'Tiran Harsha', '166 Nugape', 'Deepthi', '+10769036197', 'tiranharsha2323@gmail.com', 'To register company', '962841180v', 'Male', 0, 1, '2021-03-09 20:21:44', '2021-03-17 00:00:00', NULL),
(5, 'Janage Tiran Harsha Jayawardana', '164 Pamunugama', 'Deepthi', '+10769036197', 'it18216974@my.sliit.lk', 'To register company', '962841180v', 'Male', 0, 1, '2021-03-15 14:52:49', NULL, NULL),
(6, 'Tiran Harsha', '165/A Bopitiya', 'Deepthi', '+10769036197', 'tiranharsha2323@gmail.com', 'To register company', '962841180v', 'Male', 1, 1, '2021-03-15 14:54:58', '2021-03-17 00:00:00', 'Aruna'),
(7, 'Tiran Harsha', '164/A Maha Pamunugama', 'Deepthi', '+10769036197', 'tiranharsha2323@gmail.com', 'To register company', '962841180v', 'Male', 0, 1, '2021-03-15 14:59:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `contact`, `nic`, `password`, `electoralseat`, `date`) VALUES
(1, 'Samantha', 'Perera', 'samantha', 'tiran2323@gmail.com', '761234567', '962841180V', 'samantha123@gmail.com', '', '2021-03-10 21:21:01'),
(2, 'Janage Tiran', 'Jayawardana', 'IT18216974', 'tiranharsha2323@gmail.com', '2147483647', '962841180V', 'samantha123@', 'ASAS', '2021-03-10 21:21:01'),
(3, 'Janage Tiran', 'Jayawardana', 'IT18208672', 'samantha@gmail.com', '2147483647', '', 'samantha123@', '', '2021-03-10 21:21:01'),
(4, 'Janage Tiran', 'Jayawardana', 'Tiran Harsha', 'samantha@gmail.com', '2147483647', '', 'CC', '164 Pamunugama', '2021-03-10 21:21:01'),
(5, 'Tiran', 'Harsha', 'IT18216974', 'samantha@gmail.com', '+1076903619', '', 'AA', '167 Uswetakriyyawa', '2021-03-10 21:21:01'),
(6, 'Aruna', 'Harsha', 'IT18208672', 'samantha@gmail.com', '+1076903619', '', 'gg', '165/A Bopitiya', '2021-03-10 21:21:01'),
(13, 'test', 'test', 'test', 'test@test.com', '2222222222', '222222222G', 'ASDasd@123', 'HO', '2022-12-26 23:54:44'),
(14, 'dd', 'dd', 'dd', 'samantha@gmail.com', '6666666666', '666666666R', 'c8dae2ac93bd33ff6dfaeeda8eda2bff', 'DE', '2022-12-26 23:56:54'),
(15, 'teset', 'test', 'test', 'tiran2323@gmail.com', '1111111111', '222222222D', '6bd6fe5c118823a652f3da79238ab277', 'CN', '2022-12-27 00:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'Samantha', 'samantha@gmail.com', 'samantha123@', 1),
(2, 'IT18216974', 'tiranharsha2323@gmail.com', 'samantha123@', 2),
(6, 'Aruna', 'aruna@gmail.com', 'aruna123', 2),
(15, 'test', 'tiran2323@gmail.com', '6bd6fe5c118823a652f3da79238ab277', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_category`
--
ALTER TABLE `application_category`
  ADD PRIMARY KEY (`applicationCategoryId`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_registration`
--
ALTER TABLE `business_registration`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `fk_user` (`submitted_by`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `requirement_application`
--
ALTER TABLE `requirement_application`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `fk_user2` (`submitted_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `application_category`
--
ALTER TABLE `application_category`
  MODIFY `applicationCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_registration`
--
ALTER TABLE `business_registration`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requirement_application`
--
ALTER TABLE `requirement_application`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_registration`
--
ALTER TABLE `business_registration`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`submitted_by`) REFERENCES `people` (`pid`);

--
-- Constraints for table `requirement_application`
--
ALTER TABLE `requirement_application`
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`submitted_by`) REFERENCES `people` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
