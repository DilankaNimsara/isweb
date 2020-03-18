-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 03:05 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nic` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `tp` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nic`, `email`, `name`, `address`, `tp`, `password`) VALUES
('', 'induwarajayalath@gmail.com', 'Induwara Jayalath', '8, Sunethradevi Road,', '0766449000', 'd41d8cd98f00b204e9800998ecf8427e'),
('12345', 'admin@gmail.com', 'ucsc', 'ucsc', '94766449000', 'd32934b31349d77e70957e057b1bcd28');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(2550) NOT NULL,
  `gender` char(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tp` varchar(12) NOT NULL,
  `jobseekernic` varchar(12) NOT NULL,
  `jobsjobid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `nic` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `tp` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`nic`, `email`, `name`, `address`, `tp`, `password`) VALUES
('1234567v', 'employer@gmail.com', 'employer', 'ucsc', '94714669000', 'd32934b31349d77e70957e057b1bcd28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(10) NOT NULL,
  `joname` varchar(255) NOT NULL,
  `jobdescription` varchar(2000) DEFAULT NULL,
  `jobsalary` int(6) NOT NULL,
  `jobqualifications` varchar(5000) DEFAULT NULL,
  `jobtypejobtypeid` int(10) NOT NULL,
  `employernic` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `joname`, `jobdescription`, `jobsalary`, `jobqualifications`, `jobtypejobtypeid`, `employernic`) VALUES
(12, 'tykilkyt', 'hgfdhjyk', 34567, 'asdasd', 1, '1234567v'),
(14, 'isuri ta kade yaama', 'sdvsdvsd', 23, 'asvvrdv', 1, '1234567v'),
(15, 'lo', 'tfghgjdfkfyitfytif', 546, 'fvdfvdfvdfv', 1, '1234567v');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `nic` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `tp` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`nic`, `email`, `name`, `address`, `tp`, `password`, `status`) VALUES
('123456v', 'ucsc@gmail.com', 'jobseeker', 'ucsc', '94714669000', 'd32934b31349d77e70957e057b1bcd28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `jobtypeid` int(10) NOT NULL,
  `jobtypename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`jobtypeid`, `jobtypename`) VALUES
(1, 'typeOne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD KEY `FKapplicatio677975` (`jobsjobid`),
  ADD KEY `FKapplicatio245055` (`jobseekernic`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `jobid` (`jobid`),
  ADD KEY `FKjobs339205` (`employernic`),
  ADD KEY `FKjobs283856` (`jobtypejobtypeid`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`jobtypeid`),
  ADD KEY `jobtypeid` (`jobtypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `jobtypeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FKapplicatio245055` FOREIGN KEY (`jobseekernic`) REFERENCES `jobseeker` (`nic`),
  ADD CONSTRAINT `FKapplicatio677975` FOREIGN KEY (`jobsjobid`) REFERENCES `jobs` (`jobid`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FKjobs283856` FOREIGN KEY (`jobtypejobtypeid`) REFERENCES `jobtype` (`jobtypeid`),
  ADD CONSTRAINT `FKjobs339205` FOREIGN KEY (`employernic`) REFERENCES `employer` (`nic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
