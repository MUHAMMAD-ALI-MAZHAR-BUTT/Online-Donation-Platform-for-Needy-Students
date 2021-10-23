-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 06:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--



-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--


-- --------------------------------------------------------

--
-- Table structure for table `donation_record`
--

----------------------------------------------

--
-- Table structure for table `donators`
--

CREATE TABLE `donators` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `otp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donators`
--

INSERT INTO `donators` (`id`, `username`, `email`, `password`, `create_datetime`, `otp`) VALUES
(1, 'abc', 'a@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-10-10 13:23:51', NULL),
(2, 'jan', 'legend@gmail.com', '187ef4436122d1cc2f40dc2b92f0eba0', '2021-10-10 14:18:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--


--
-- Dumping data for table `feedback`
--
-----------------------------------------------------

--
-- Table structure for table `fee_category`
--

CREATE TABLE `fee_category` (
  `DonatorName` text NOT NULL,
  `Holder_Name` text NOT NULL,
  `Card_Number` text NOT NULL,
  `Card_Expiry_Month` int(4) NOT NULL,
  `Expiry_Year` int(11) NOT NULL,
  `Cvc` int(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_category`
--

INSERT INTO `fee_category` (`DonatorName`, `Holder_Name`, `Card_Number`, `Card_Expiry_Month`, `Expiry_Year`, `Cvc`, `Amount`, `Date`, `Time`) VALUES
('', 'Ali', '3782 822463 10005', 1, 2021, 1234, 50000, '2021-10-12', '10:58am'),
('', 'j', '3782 822463 10005', 1, 2021, 8377, 900, '2021-10-12', '12:37pm'),
('', 'j', '3782 822463 10005', 1, 2021, 8377, 900, '2021-10-12', '12:37pm'),
('', 'j', '3782 822463 10005', 1, 2021, 8377, 900, '2021-10-12', '12:37pm'),
('', '', '', 0, 0, 0, 0, '2021-10-12', '12:37pm'),
('', '', '', 0, 0, 0, 0, '2021-10-12', '12:38pm'),
('', '', '', 0, 0, 0, 0, '2021-10-12', '12:38pm'),
('', '', '', 0, 0, 0, 0, '2021-10-12', '12:39pm'),
('', 'jj', '3782 822463 10005', 1, 2021, 1234, 2147483647, '2021-10-12', '12:39pm'),
('', 'jj', '3782 822463 10005', 1, 2021, 1234, 2147483647, '2021-10-12', '12:40pm'),
('', '', '', 0, 0, 0, 0, '2021-10-12', '12:40pm'),
('', 'w', '3782 822463 10005', 1, 2021, 1234, 900, '2021-10-12', '12:42pm'),
('abc', 'w', '3782 822463 10005', 1, 2021, 9999, 900, '2021-10-12', '12:55pm'),
('abc', 'w', '3782 822463 10005', 1, 2021, 9999, 900, '2021-10-12', '12:56pm'),
('abc', 'w', '3782 822463 10005', 1, 2021, 9999, 900, '2021-10-12', '12:56pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '12:56pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '12:58pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:00pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:00pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:01pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:01pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:02pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:02pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:02pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:02pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:02pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:02pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:03pm'),
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:05pm');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--


--
-- Table structure for table `gallery_img`
--


-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `DonatorName` text NOT NULL,
  `Holder_Name` text NOT NULL,
  `Card_Number` text NOT NULL,
  `Card_Expiry_Month` int(4) NOT NULL,
  `Expiry_Year` int(11) NOT NULL,
  `Cvc` int(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--


--
-- Table structure for table `student`
--

----------------------------------------

--
-- Table structure for table `studyexpenses`
--

CREATE TABLE `studyexpenses` (
  `DonatorName` text NOT NULL,
  `Holder_Name` text NOT NULL,
  `Card_Number` text NOT NULL,
  `Card_Expiry_Month` int(4) NOT NULL,
  `Expiry_Year` int(11) NOT NULL,
  `Cvc` int(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `otp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`, `otp`) VALUES
(1, 'jan', 'ali123mazhar@gmail.com', '66c46c7cb33500310995aa9a6393491e', '2021-10-10 09:58:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--

--
-- Indexes for table `donation_record`
--

--
ALTER TABLE `donators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `emp`



--
-- Indexes for table `latest_news`
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`

-- AUTO_INCREMENT for table `donations`
--

--
-- AUTO_INCREMENT for table `donation_record`

--
-- AUTO_INCREMENT for table `donators`
--
ALTER TABLE `donators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `emp`
--

--
-- AUTO_INCREMENT for table `forms`

--
-- AUTO_INCREMENT for table `student`
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
