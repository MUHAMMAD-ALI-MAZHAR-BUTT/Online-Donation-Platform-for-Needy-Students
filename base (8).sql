-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 01:08 PM
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
  `total_in_fee` bigint(20) NOT NULL,
  `available_in_fee` bigint(20) NOT NULL,
  `donated_in_fee` bigint(20) NOT NULL,
  `total_in_health` bigint(20) NOT NULL,
  `available_in_health` bigint(20) NOT NULL,
  `donated_in_health` bigint(20) NOT NULL,
  `total_in_expense` bigint(20) NOT NULL,
  `available_in_expense` bigint(20) NOT NULL,
  `donated_in_expense` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `total_in_fee`, `available_in_fee`, `donated_in_fee`, `total_in_health`, `available_in_health`, `donated_in_health`, `total_in_expense`, `available_in_expense`, `donated_in_expense`) VALUES
(1, 4556, 4454, 102, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `donation_record`
--

CREATE TABLE `donation_record` (
  `id` bigint(20) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `category` enum('fee','health','expense') NOT NULL,
  `donator_id` int(11) NOT NULL,
  `Holder_Name` text NOT NULL,
  `Card_Number` text NOT NULL,
  `Card_Expiry_Month` int(11) NOT NULL,
  `Expiry_Year` int(11) NOT NULL,
  `cvc` int(150) NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_record`
--

INSERT INTO `donation_record` (`id`, `datetime`, `category`, `donator_id`, `Holder_Name`, `Card_Number`, `Card_Expiry_Month`, `Expiry_Year`, `cvc`, `amount`) VALUES
(10, '2021-12-07 22:37:30', 'fee', 22, 'swddwwd', '4929 0184 3368 1188', 10, 2021, 123, 4556);

-- --------------------------------------------------------

--
-- Table structure for table `donators`
--

CREATE TABLE `donators` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
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

INSERT INTO `donators` (`id`, `username`, `email`, `password`, `create_datetime`, `last_active`, `total_donated`, `fee_donated`, `expense_donated`, `health_donated`, `no_of_times`) VALUES
(22, 'abc', 'a@gmail.com', '1', '2021-12-07 18:06:54', '2021-12-07 22:37:30', 4556, 4556, 0, 0, 1);

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
(42, 'abb', 'dhaa@gmail.com', 3005679084, '2021-11-12', '9GfdLZiuKD', 0, 0, NULL);

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
(34, 3, 2, 'completed', 'true', NULL, NULL, '2021-12-08', '2021-11-09', 'fee', 100, '35404-9813320-1', '2010-01-01', 11, 'ebwdndwwdndwdw9dwbdwn9dwdwndwndwwndwd', 'efefefefef', 'adada', 'wfwwddw', 123455, 3, 'undergrad', 3446791011);

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
(69, 'abc', 'a@gmail.com', 'donor', 'Donor  has created account on the Platform', 'unread', '2021-12-07 22:06:54', 'newacc'),
(70, 'sxs', 'saa@gmail.com', 'student', 'Student sxs has created account on the Platform', 'unread', '2021-12-07 22:36:27', 'newacc'),
(71, 'abc', 'a@gmail.com', 'donor', 'Donor abc has donated 4556 rupees on the Platform in Fee Category', 'unread', '2021-12-07 22:37:30', 'donation'),
(72, 'a', 'ab@gmail.com', 'student', 'Student a has been accepted for grant by employee Nameww', 'unread', '2021-12-08 12:39:07', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `Id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_comp` date DEFAULT NULL,
  `amount_received` int(11) NOT NULL,
  `req_amount` bigint(20) NOT NULL DEFAULT 0,
  `Category` enum('fee','expense','health') NOT NULL,
  `easypaisa_acc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`Id`, `form_id`, `student_id`, `date_comp`, `amount_received`, `req_amount`, `Category`, `easypaisa_acc`) VALUES
(6, 34, 3, '2021-12-08', 102, 0, 'fee', 0);

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
(3, 'a', 'ab@gmail.com', 3446791011, '1', '2021-12-07 18:14:38', '2021-12-08 08:03:22', 3, 1, 0, '35404-9813320-1', '2010-01-01', 11);

-- --------------------------------------------------------

--
-- Table structure for table `stu_notification`
--

CREATE TABLE `stu_notification` (
  `idd` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `emp_name` varchar(500) NOT NULL,
  `dt` datetime DEFAULT NULL,
  `message` varchar(5000) NOT NULL,
  `venue` varchar(5000) NOT NULL,
  `status` enum('read','unread','','') NOT NULL,
  `date1` datetime DEFAULT NULL,
  `type` enum('i','s','a','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_notification`
--

INSERT INTO `stu_notification` (`idd`, `stu_id`, `emp_id`, `emp_name`, `dt`, `message`, `venue`, `status`, `date1`, `type`) VALUES
(48, 3, 2, 'Nameww', '2021-12-08 12:39:07', 'You have been Accepted for grant', 'NULL', 'unread', NULL, 's'),
(49, 3, 1, 'NULL', '2021-12-08 14:01:58', 'You have received your full grant', 'NULL', 'unread', NULL, 'a'),
(50, 3, 1, 'NULL', '2021-12-08 14:02:31', 'You have received your full grant', 'NULL', 'unread', NULL, 'a'),
(51, 3, 1, 'NULL', '2021-12-08 14:02:43', 'You have received your full grant', 'NULL', 'read', NULL, 'a'),
(52, 3, 1, 'NULL', '2021-12-08 14:18:33', 'You have received your full grant', 'NULL', 'read', NULL, 'a');

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

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
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`);

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
  ADD PRIMARY KEY (`Id`),
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
  ADD PRIMARY KEY (`idd`),
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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `donation_record`
--
ALTER TABLE `donation_record`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donators`
--
ALTER TABLE `donators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stu_notification`
--
ALTER TABLE `stu_notification`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

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
