-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 05:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `available` bigint(20) NOT NULL,
  `donated` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `total`, `available`, `donated`) VALUES
(1, 500, 400, 100);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `required` bigint(20) NOT NULL,
  `status` enum('complete','incomplete','','') NOT NULL DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Faisalabad'),
(4, 'Rawalpindi'),
(5, 'Multan'),
(6, 'Hyderabad'),
(7, 'Gujranwala'),
(8, 'Peshawar'),
(9, 'Quetta'),
(10, 'Islamabad'),
(11, 'Sargodha'),
(12, 'Sialkot'),
(13, 'Bahawalpur'),
(14, 'Sukkur'),
(15, 'Jhang'),
(16, 'Sheikhupura'),
(17, 'Larkana'),
(18, 'Gujrat'),
(19, 'Mardan'),
(20, 'Kasur'),
(21, 'Rahim Yar Khan'),
(22, 'Sahiwal'),
(23, 'Okara'),
(24, 'Wah'),
(25, 'Dera Ghazi Khan'),
(26, 'Mirpur Khas'),
(27, 'Nawabshah'),
(28, 'Mingora'),
(29, 'Chiniot'),
(30, 'Kamoke'),
(31, 'Mandi Burewala'),
(32, 'Jhelum'),
(33, 'Sadiqabad'),
(34, 'Jacobabad'),
(35, 'Shikarpur'),
(36, 'Khanewal'),
(37, 'Hafizabad'),
(38, 'Kohat'),
(39, 'Muzaffargarh'),
(40, 'Khanpur'),
(41, 'Gojra'),
(42, 'Bahawalnagar'),
(43, 'Muridke'),
(44, 'Pak Pattan'),
(45, 'Abottabad'),
(46, 'Tando Adam'),
(47, 'Jaranwala'),
(48, 'Khairpur'),
(49, 'Chishtian Mandi'),
(50, 'Daska'),
(51, 'Dadu'),
(52, 'Mandi Bahauddin'),
(53, 'Ahmadpur East'),
(54, 'Kamalia'),
(55, 'Khuzdar'),
(56, 'Vihari'),
(57, 'Dera Ismail Khan'),
(58, 'Wazirabad'),
(59, 'Nowshera');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `donation_record`
--

CREATE TABLE `donation_record` (
  `id` bigint(20) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `category` enum('fee','health','expense') NOT NULL,
  `donator_id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_record`
--

INSERT INTO `donation_record` (`id`, `datetime`, `category`, `donator_id`, `amount`) VALUES
(1, NULL, 'fee', 1, 70);

-- --------------------------------------------------------

--
-- Table structure for table `donators`
--

CREATE TABLE `donators` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `last_active` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_donated` bigint(20) NOT NULL DEFAULT 0,
  `fee_donated` bigint(20) NOT NULL DEFAULT 0,
  `expense_donated` bigint(20) NOT NULL DEFAULT 0,
  `health_donated` bigint(20) NOT NULL DEFAULT 0,
  `no_of_times` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donators`
--

INSERT INTO `donators` (`id`, `username`, `email`, `phone`, `password`, `create_datetime`, `last_active`, `total_donated`, `fee_donated`, `expense_donated`, `health_donated`, `no_of_times`) VALUES
(1, 'abc', 'a@gmail.com', 3446789101, '1', '2021-10-10 13:23:51', '2021-11-24 17:26:56', 0, 0, 0, 0, 0),
(2, 'jan', 'legend@gmail.com', 3221111111, '12', '2021-10-10 14:18:52', '2021-11-19 17:26:14', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `emp_id` int(11) NOT NULL,
  `emp_name` char(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_phone` bigint(15) NOT NULL,
  `emp_joindate` date NOT NULL,
  `pass` varchar(50) NOT NULL,
  `total_students` bigint(20) NOT NULL DEFAULT 0,
  `active_students` bigint(20) NOT NULL DEFAULT 0,
  `emp_leftdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`emp_id`, `emp_name`, `emp_email`, `emp_phone`, `emp_joindate`, `pass`, `total_students`, `active_students`, `emp_leftdate`) VALUES
(1, 'Name', 'email@gmail.co', 3445679195, '2021-10-11', 'vZEyALeGHm', 0, 0, NULL),
(2, 'Nameww', 'a@gmail.com', 3446791011, '2021-10-11', '1', 0, 0, NULL),
(3, 'Name', 'emssddail@gmail.com', 3445678901, '2021-10-11', 'lrbvoUNtOQ', 0, 0, '2021-10-17'),
(36, 'sasa', 'aba@gmail.co', 3445679393, '2021-10-16', 'cz7TbZCeIx', 0, 0, '2021-10-18'),
(37, 'rrrr', 'emassil@gmail.com', 3445791011, '2021-11-10', 'fupDwgeTLb', 0, 0, '2021-11-10'),
(38, 'dshadad', 'abdull@gmail.com', 3445678901, '2021-11-10', 'CUnKtuydgc', 0, 0, NULL),
(39, 'abaa', 'aa@gmail.com', 3446791011, '2021-11-10', 'A0SjB3rL5i', 0, 0, NULL),
(40, 'ahah', 'eme@gmail.com', 3115678191, '2021-11-10', '7wAbXWdCYU', 0, 0, NULL),
(41, 'ahsadb', 'feww@gmail.com', 3125687793, '2021-11-12', 'Rznly8BWo4', 0, 0, NULL),
(42, 'abb', 'dhaa@gmail.com', 3005679084, '2021-11-12', 'DYZh4Pye2x', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `status` enum('true','false','','') NOT NULL DEFAULT 'false',
  `reply` varchar(5000) DEFAULT NULL,
  `dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `subject`, `message`, `status`, `reply`, `dt`) VALUES
(26, 'ababa', 'aa@gmail.com', 'sdsd', 'sdsdsds', 'true', 'dsdad', NULL),
(27, 'dddd', 'ddd@yahoo.com', 'sfsfsf', 'sffsfsfssf', 'false', NULL, NULL),
(28, 'dssd', 'aa@gmail.com', 'fss', 'sddwdwwd', 'false', NULL, NULL),
(29, 'ss', 'a@gmail.com', 'adaa', 'sddsds', 'false', NULL, NULL),
(30, 'ssd', 'a@gmail.com', 'css', 'sdssds', 'false', NULL, NULL),
(31, 'ss', 'aa@gmail.com', 'sdsd', 'ssssd', 'false', NULL, NULL),
(32, 'abd', 'a@gmail.com', 'ddd', 'scsddsdsds', 'false', NULL, NULL),
(33, 'jan', 'ali123mazhar@gmail.com', 'dahaa', 'adjaajsasjdnwndwj', 'false', NULL, NULL),
(34, 'jan', 'ali123mazhar@gmail.com', 'sdd', 'dffefeef', 'false', NULL, NULL),
(35, 'jan', 'ali123mazhar@gmail.com', 'sds', 'dahaa', 'false', NULL, NULL),
(36, 'jan', 'ali123mazhar@gmail.com', 'ssd', 'feggrr', 'true', 'EFEFEFFEEF', '2021-11-26 22:46:13'),
(37, 'jan', 'ali123mazhar@gmail.com', 'fefefe', 'eggge', 'true', 'sjsdsdksdkdskddkdkdalldaldadlladladladldaladldaladladkddkadaddwd wwd  dww wddw dw dw wdw wdwdowdwd wd dw wd wdowdo wd wd dwwd dw wd  dw', NULL),
(38, 'SDD', 'as@gmail.com', 'ffw', 'wdwdwd', 'false', NULL, '2021-11-21 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category`
--

CREATE TABLE `fee_category` (
  `DonatorName` text NOT NULL,
  `Holder_Name` text NOT NULL,
  `Card_Number` text NOT NULL,
  `Card_Expiry_Month` int(100) NOT NULL,
  `Expiry_Year` int(100) NOT NULL,
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
('abc', '', '', 0, 0, 0, 0, '2021-10-12', '01:05pm'),
('abc', 'dadada', '3782 822463 10005', 4, 2034, 3442, 900, '2021-11-24', '01:29pm');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` enum('completed','pending','rejected','accepted') NOT NULL DEFAULT 'pending',
  `informed` enum('true','false','','') NOT NULL DEFAULT 'false',
  `date_of_reject` date DEFAULT NULL,
  `date_of_accept` date DEFAULT NULL,
  `date_of_complete` date DEFAULT NULL,
  `date_filled` date NOT NULL,
  `category` enum('fee','expense','health','') DEFAULT NULL,
  `amount_required` bigint(20) NOT NULL,
  `cnic` varchar(5000) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `institute_name` varchar(500) NOT NULL,
  `father` varchar(500) NOT NULL,
  `occupation` varchar(500) NOT NULL,
  `Monthly_income` bigint(20) NOT NULL,
  `city_id` int(50) NOT NULL,
  `study_level` enum('secondary','undergrad','postgrad','') DEFAULT NULL,
  `easypaisa_acc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `student_id`, `emp_id`, `status`, `informed`, `date_of_reject`, `date_of_accept`, `date_of_complete`, `date_filled`, `category`, `amount_required`, `cnic`, `dob`, `age`, `message`, `institute_name`, `father`, `occupation`, `Monthly_income`, `city_id`, `study_level`, `easypaisa_acc`) VALUES
(2, 2, 2, 'rejected', 'true', '2021-11-27', NULL, NULL, '2021-11-01', NULL, 0, '', '0000-00-00', 0, '', '', '', 'n', 0, 1, 'secondary', 0),
(32, 1, 42, 'completed', 'false', '2021-11-27', NULL, NULL, '2021-10-26', 'expense', 3442, '35202-9815543-3', '2010-01-01', 11, 'dwidwi  dwi wd iwd iwd iwdidw iwd wdw', 'fsfwfwwf', 'ssds', 'dwwwd', 42242, 19, 'undergrad', 3446791011);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_img`
--

CREATE TABLE `gallery_img` (
  `img_id` bigint(20) NOT NULL,
  `img_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_img`
--

INSERT INTO `gallery_img` (`img_id`, `img_path`) VALUES
(1, 'slider/slider-1.jpg'),
(3, 'slider/slider-2.jpg'),
(4, 'slider/slider-3.jpg'),
(5, 'slider/slider-4.jpg'),
(6, 'slider/slider-5.jpg'),
(7, 'slider/slider-6.jpg'),
(8, 'slider/slider-7.jpg');

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

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `category` char(20) DEFAULT NULL,
  `message` varchar(350) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `category`, `message`, `date`) VALUES
(1, 'Education/Fee', 'Get well', '2021-11-27 00:00:00'),
(2, 'Other Expenses', 'Yet to comesssszz', '2021-10-22 00:00:00'),
(3, 'Health', 'Yessssssddkkk', '2021-10-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `type` enum('donor','employee','student','anon') NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `type1` enum('account','resign','donation','accepted','newacc','forgot') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `email`, `type`, `message`, `status`, `date`, `type1`) VALUES
(15, 'Nameww', 'email@yahoo.com', 'employee', '                                      ', 'unread', '2021-11-08 22:35:03', 'resign'),
(16, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 14:50:32', 'account'),
(17, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 14:51:56', 'account'),
(18, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'read', '2021-11-12 14:52:04', 'account'),
(19, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 14:53:26', 'account'),
(20, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 14:54:16', 'account'),
(21, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'read', '2021-11-12 14:54:25', 'account'),
(22, '', 'abd@gmail.com', 'student', 'Student  has requested for new password as old password was forgotten', 'unread', '2021-11-12 16:10:21', 'forgot'),
(23, 'abd', 'abd@gmail.com', 'student', 'Student abd has requested for new password as old password was forgotten', 'unread', '2021-11-12 16:10:40', 'forgot'),
(24, 'abd', 'abd@gmail.com', 'student', 'Student abd has requested for new password as old password was forgotten', 'read', '2021-11-12 16:14:20', 'forgot'),
(25, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 18:57:04', 'account'),
(26, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 18:57:10', 'account'),
(27, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 18:57:44', 'account'),
(28, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 18:58:34', 'account'),
(29, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 18:59:08', 'account'),
(30, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 18:59:14', 'account'),
(31, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:00:15', 'account'),
(32, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:01:03', 'account'),
(33, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:01:10', 'account'),
(34, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:01:16', 'account'),
(35, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:03:44', 'account'),
(36, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:04:44', 'account'),
(37, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:06:27', 'account'),
(38, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:06:36', 'account'),
(39, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:07:31', 'account'),
(40, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:08:05', 'account'),
(41, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:08:30', 'account'),
(42, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'read', '2021-11-12 19:09:21', 'account'),
(43, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:10:45', 'account'),
(44, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:11:54', 'account'),
(45, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:12:46', 'account'),
(46, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:12:54', 'account'),
(47, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 19:13:53', 'account'),
(48, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-12 23:20:38', 'account'),
(49, 'jan', 'ali123mazhar@gmail.com', 'student', 'jan changed some account settings', 'unread', '2021-11-13 13:44:27', 'account'),
(50, '', 'email@gmail.co', 'employee', 'Employee  has requested for new password as old password was forgotten', 'unread', '2021-11-23 21:35:55', 'forgot'),
(51, '', 'email@gmail.co', 'employee', 'Employee  has requested for new password as old password was forgotten', 'read', '2021-11-23 21:36:01', 'forgot'),
(52, '', 'email@gmail.co', 'employee', 'Employee  has requested for new password as old password was forgotten', 'unread', '2021-11-23 21:36:07', 'forgot'),
(53, '', 'email@gmail.co', 'employee', 'Employee  has requested for new password as old password was forgotten', 'unread', '2021-11-23 21:36:13', 'forgot'),
(54, '', 'email@gmail.co', 'employee', 'Employee  has requested for new password as old password was forgotten', 'unread', '2021-11-23 21:36:19', 'forgot'),
(55, 'Name', 'email@gmail.co', 'employee', 'Employee Name has requested for new password as old password was forgotten', 'read', '2021-11-23 21:36:52', 'forgot');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_comp` date DEFAULT NULL,
  `amount_received` int(11) NOT NULL,
  `req_amount` bigint(20) NOT NULL DEFAULT 0,
  `category` enum('fee','expense','health') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `form_id`, `student_id`, `date_comp`, `amount_received`, `req_amount`, `category`) VALUES
(2, 2, 2, NULL, 0, 9, 'fee');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `last_active` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_of_forms` int(11) NOT NULL DEFAULT 0,
  `accepted_no` int(11) NOT NULL DEFAULT 0,
  `rejected_no` int(11) NOT NULL DEFAULT 0,
  `cnic` longtext NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `age` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone`, `password`, `create_datetime`, `last_active`, `no_of_forms`, `accepted_no`, `rejected_no`, `cnic`, `dob`, `age`) VALUES
(1, 'jan', 'ali123mazhar@gmail.com', 3456789016, '1', '2021-10-10 09:58:44', '2021-11-26 14:37:16', 38, 0, 0, '35202-9815543-3', '2010-01-01', 11),
(2, 'abd', 'abd@gmail.com', 3446791110, 'ausHo1cCIV', '2021-11-12 11:33:24', '2021-11-27 14:53:13', 2, 0, 4, '35202-9716610-1', '2010-01-01', 11);

-- --------------------------------------------------------

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
-- Table structure for table `stu_notification`
--

CREATE TABLE `stu_notification` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(500) NOT NULL,
  `dt` datetime DEFAULT NULL,
  `message` varchar(5000) NOT NULL,
  `venue` varchar(5000) NOT NULL,
  `status` enum('read','unread','','') NOT NULL,
  `date1` datetime NOT NULL,
  `type` enum('i','s','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_notification`
--

INSERT INTO `stu_notification` (`id`, `stu_id`, `emp_id`, `emp_name`, `dt`, `message`, `venue`, `status`, `date1`, `type`) VALUES
(1, 1, 2, 'ddd', '2021-11-21 00:03:05', 'dddd', 'ddddddd', 'unread', '0000-00-00 00:00:00', 'i'),
(2, 1, 2, 'Nameww', '2021-11-21 00:18:06', 'hgh', 'jjj', 'unread', '0000-00-00 00:00:00', 'i'),
(3, 1, 2, '', '2021-11-22 19:25:40', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's'),
(4, 1, 2, 'Nameww', '2021-11-22 19:26:38', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's'),
(5, 2, 2, 'Nameww', '2021-11-23 20:00:56', 'wddww', 'dsdwdwwd', 'unread', '0000-00-00 00:00:00', 'i'),
(6, 2, 2, 'Nameww', '2021-11-23 20:05:36', 'wwdwd', 'fww', 'unread', '0000-00-00 00:00:00', 'i'),
(7, 2, 2, 'Nameww', '2021-11-23 20:06:53', 'sd', 'wdwd', 'unread', '0000-00-00 00:00:00', 'i'),
(8, 2, 2, 'Nameww', '2021-11-23 20:07:16', 'efe', 'efeff', 'unread', '0000-00-00 00:00:00', 'i'),
(9, 2, 2, 'Nameww', '2021-11-23 20:17:46', 'ddwd', 'wdw', 'unread', '0000-00-00 00:00:00', 'i'),
(10, 2, 2, 'Nameww', '2021-11-23 20:19:26', 'dwdw', 'wdwd', 'unread', '0000-00-00 00:00:00', 'i'),
(11, 2, 2, 'Nameww', '2021-11-23 20:36:06', 'ddwwd', 'wwdwd', 'unread', '0000-00-00 00:00:00', 'i'),
(12, 1, 2, 'Nameww', '2021-11-23 20:37:39', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's'),
(13, 2, 2, 'Nameww', '2021-11-24 20:32:44', 'wdwd', 'wdwddw', 'unread', '0000-00-00 00:00:00', 'i'),
(14, 2, 2, 'Nameww', '2021-11-24 20:32:51', 'wdwd', 'wdwddw', 'unread', '0000-00-00 00:00:00', 'i'),
(15, 2, 2, 'Nameww', '2021-11-24 20:34:33', 'dswd', 'wddw', 'unread', '0000-00-00 00:00:00', 'i'),
(16, 2, 2, 'Nameww', '2021-11-24 20:34:58', 'wdwd', 'wddw', 'unread', '0000-00-00 00:00:00', 'i'),
(17, 2, 2, 'Nameww', '2021-11-24 20:38:17', 'ddw', 'wdwdw', 'unread', '0000-00-00 00:00:00', 'i'),
(18, 2, 2, 'Nameww', '2021-11-24 20:40:21', 'wdwd', 'dwdw', 'unread', '0000-00-00 00:00:00', 'i'),
(19, 2, 2, 'Nameww', '2021-11-24 20:40:57', 'sww', 'dwwddw', 'unread', '0000-00-00 00:00:00', 'i'),
(20, 2, 2, 'Nameww', '2021-11-24 20:42:30', 'dwdw', 'wddw', 'unread', '0000-00-00 00:00:00', 'i'),
(21, 2, 2, 'Nameww', '2021-11-24 20:44:18', 'wddw', 'wdwd', 'unread', '0000-00-00 00:00:00', 'i'),
(22, 2, 2, 'Nameww', '2021-11-27 12:20:35', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's'),
(23, 2, 2, 'Nameww', '2021-11-27 12:22:14', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's'),
(24, 2, 2, 'Nameww', '2021-11-27 12:25:03', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's'),
(25, 2, 2, 'Nameww', '2021-11-27 19:53:13', 'You have been rejected for grant', 'NULL', 'unread', '0000-00-00 00:00:00', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_record`
--
ALTER TABLE `donation_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donator_id` (`donator_id`);

--
-- Indexes for table `donators`
--
ALTER TABLE `donators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `gallery_img`
--
ALTER TABLE `gallery_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `stu_notification`
--
ALTER TABLE `stu_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stu_id` (`stu_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_record`
--
ALTER TABLE `donation_record`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donators`
--
ALTER TABLE `donators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gallery_img`
--
ALTER TABLE `gallery_img`
  MODIFY `img_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stu_notification`
--
ALTER TABLE `stu_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation_record`
--
ALTER TABLE `donation_record`
  ADD CONSTRAINT `donation_record_ibfk_1` FOREIGN KEY (`donator_id`) REFERENCES `donators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forms_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `emp` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forms_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD CONSTRAINT `payment_history_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `payment_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_history_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stu_notification`
--
ALTER TABLE `stu_notification`
  ADD CONSTRAINT `stu_notification_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_notification_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `emp` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;