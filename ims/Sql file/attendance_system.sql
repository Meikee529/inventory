-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 08:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `adminid` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `UserName`, `firstname`, `lastname`, `Password`, `updationDate`) VALUES
(1, '123', 'sehun', 'se', 'hun', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-04-21 06:50:21'),
(2, '12', 'LU LU', 'LU', 'LU', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-04-21 06:49:24'),
(3, '33', 'inti international', 'inti', 'int', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-04-22 14:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `c_id` int(11) NOT NULL,
  `classroom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`c_id`, `classroom`) VALUES
(1, 'L506');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `course`) VALUES
(1, 'DEEI'),
(2, 'ICT'),
(3, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `l_id` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `l_email` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`l_id`, `UserName`, `firstname`, `lastname`, `Password`, `l_email`, `gender`) VALUES
(1, 'Steven1', 'steven', 'tan', '5f4dcc3b5aa765d61d8327deb882cf99', 'stventan1@hotmail.com', ''),
(2, '122', '12', '12', '12@12', 'c20ad4d76fe97759aa27a0c99bff6710', 'Male'),
(3, 'angela', 'angela', 'qw', '5f4dcc3b5aa765d61d8327deb882cf99', 'weiwei@hotmial.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `p_id` int(11) NOT NULL,
  `p_username` varchar(100) NOT NULL,
  `p_firstname` varchar(100) NOT NULL,
  `p_lastname` varchar(100) NOT NULL,
  `p_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_birth` date NOT NULL,
  `s_phone` int(11) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_course` varchar(200) NOT NULL,
  `s_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_birth`, `s_phone`, `s_email`, `s_course`, `s_register`, `s_pic`) VALUES
(1, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(2, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(3, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(4, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(5, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(6, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(7, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(8, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(9, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(10, '1323', '2019-04-11', 13, '231', 'DEEI', '2019-04-16 16:00:00', 'sehun LU LU '),
(11, 'aa', '2019-04-13', 123, 'aa', 'DEEI', '2019-04-02 16:00:00', 'LU LU '),
(12, 'zzz', '2019-04-25', 111, 'fff', 'ICT', '2019-04-23 16:00:00', 'LU LU '),
(13, 'ss', '2019-04-25', 44, 'ff', 'ICT', '2019-04-28 16:00:00', 'sehun '),
(14, 'dd', '2019-04-30', 111, 'aa', 'ICT', '2019-10-21 16:00:00', 'LU LU ');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
