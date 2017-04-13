-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2017 at 09:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aMoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(110) NOT NULL,
  `admin_id` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alloted`
--

CREATE TABLE `alloted` (
  `adm_no` varchar(8) NOT NULL,
  `rank` int(5) NOT NULL,
  `hostel` varchar(10) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `enc_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `all_details`
--

CREATE TABLE `all_details` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(32) NOT NULL,
  `adm_no` varchar(8) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `rank` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_details`
--

INSERT INTO `all_details` (`u_id`, `u_name`, `adm_no`, `email_id`, `rank`) VALUES
(1, 'SATENDER', 'U14CO052', 'satenderjpr@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `u_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `adm_no` varchar(8) NOT NULL,
  `contact` int(10) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(10) NOT NULL,
  `u_name` varchar(32) NOT NULL,
  `adm_no` varchar(32) NOT NULL,
  `hostel` varchar(32) NOT NULL,
  `room_no` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `adm_no` varchar(11) NOT NULL,
  `room_no` varchar(11) NOT NULL,
  `hostel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`adm_no`, `room_no`, `hostel`) VALUES
('U14CO052', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `rank` int(5) NOT NULL,
  `adm_no` varchar(8) NOT NULL,
  `p1` int(8) NOT NULL,
  `p2` int(8) NOT NULL,
  `p3` int(8) NOT NULL,
  `p4` int(8) NOT NULL,
  `p5` int(8) NOT NULL,
  `p6` int(8) NOT NULL,
  `p7` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `valid_con`
--

CREATE TABLE `valid_con` (
  `adm_no` varchar(8) NOT NULL,
  `rank` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valid_con`
--

INSERT INTO `valid_con` (`adm_no`, `rank`) VALUES
('U14CO052', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alloted`
--
ALTER TABLE `alloted`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `all_details`
--
ALTER TABLE `all_details`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`adm_no`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`adm_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
