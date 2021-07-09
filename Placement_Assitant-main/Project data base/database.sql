-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 01:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hire_here`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyID` int(11) NOT NULL,
  `cname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `cindustry` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `cfounded` int(4) NOT NULL,
  `cceo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `clocation` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `cemail` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `ccontact` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `cprofilepic` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `cdescription` varchar(1000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyID`, `cname`, `cindustry`, `cfounded`, `cceo`, `clocation`, `cemail`, `ccontact`, `cprofilepic`, `cdescription`) VALUES
(14, 'Tata', 'Chemicals', 2021, 'Helly', 'Ahmedabad', 'xyz1@gmail.com', '1234567890', 'upload/2.jpg', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `eemail` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `interest1` varchar(255) NOT NULL,
  `interest2` varchar(255) NOT NULL,
  `interest3` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `ename`, `city`, `contactno`, `eemail`, `dob`, `interest1`, `interest2`, `interest3`, `experience`, `about`, `education`, `profilepic`) VALUES
(12, 'XYZ', 'Ahmedabad', '1234567890', 'xyz@gmail.com', '2021-07-21', 'Web', '', '', 'None', 'None', 'None', 'upload/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobid` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `jtitle` varchar(100) NOT NULL,
  `srange` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `jdesc` varchar(2500) NOT NULL,
  `jloc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobid`, `cname`, `cemail`, `jtitle`, `srange`, `ddate`, `jdesc`, `jloc`) VALUES
(1, 'Tata', 'xyz@gmail.com', 'Junior Web Developer', '10,000 - 20,000 Rs.', '20/03/2021 - 21/03/2021', 'Proficient understanding of web markup, including HTML5, CSS3\r\nBasic knowledge of image authoring jehuidwgeugweugucjdbcudbckdgcudhcujc.', 'Ahmedabad'),
(2, 'Tatvasoft', 'tatvasoft@gmail.com', 'Web Developer', '30,000 - 50,000 Rs.', '21/03/2021 to 25/05/2021', 'Hello', 'Gujarat, Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `selector` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `selector`) VALUES
(26, 'xyz@gmail.com', 'e65075d550f9b5bf9992fa1d71a131be', 'Job_Seeker'),
(27, 'xyz1@gmail.com', 'e65075d550f9b5bf9992fa1d71a131be', 'Company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyID`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `contactno` (`contactno`),
  ADD UNIQUE KEY `emailid` (`eemail`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobid`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
