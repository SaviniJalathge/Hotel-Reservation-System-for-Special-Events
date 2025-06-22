-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 02:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `password` char(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_experience`
--

CREATE TABLE `admin_experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `guests` int(11) NOT NULL,
  `event_packages` varchar(11) NOT NULL,
  `requests` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `checkin`, `checkout`, `guests`, `event_packages`, `requests`, `status`) VALUES
(2, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(3, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(4, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(5, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(6, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(7, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(8, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-10', 40, '', 'crerty', 'pending'),
(10, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-09', 34, '0', ' vcgfdfgh', 'pending'),
(11, 'ashan', 'arachchigeashan7@gmail.com', '2024-10-05', '2024-10-09', 34, '0', ' vcgfdfgh', 'pending'),
(12, 'Sunera imasha', 'suneraimasha3@gmail.com', '2024-10-24', '2024-10-31', 100, '0', 'dj music', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `faqs` varchar(250) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `email`, `faqs`, `reply`) VALUES
(8, 'suneraimasha3@gmail.com', 'how can i contact hotel', ''),
(9, 'suneraimasha3@gmail.com', 'Please give me an email', ''),
(10, 'kamal42@gmail.com', 'klnlojgfsdgb', ''),
(11, 'ashaasha3@gmail.com', 'erwferf43fqre', ''),
(12, 'jayanthaabeywickrama9@gmail.co', 'weekdays open time', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_back`
--

CREATE TABLE `f_back` (
  `Id` int(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_back`
--

INSERT INTO `f_back` (`Id`, `Email`, `Feedback`) VALUES
(6, 'suneraimasha3@gmail.com', 'dtfyguhijkl'),
(7, 'suneraimasha3@gmail.com', 'dtfyguhijkl'),
(8, 'kamal@gmail.com', 'super service...!'),
(9, 'sadun@gmail.com', 'great service. I enjoy my wedding day'),
(10, 'nadun@gmail.com', 'awesome....');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `faq_id` int(11) NOT NULL,
  `reply_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `faq_id`, `reply_text`, `created_at`) VALUES
(1, 8, '0712343141', '2024-10-07 09:51:21'),
(2, 12, '7.00 A.M - 8.00 P.M', '2024-10-07 09:52:08'),
(3, 9, 'SAMAShotel@gmail.com', '2024-10-07 09:55:05'),
(4, 10, 'ghytgrfe', '2024-10-07 09:56:38'),
(5, 11, 'tyhgrfe', '2024-10-07 09:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(5) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNumber` int(15) NOT NULL,
  `pswd` varchar(15) NOT NULL,
  `homenumber` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postalcode` varchar(5) NOT NULL,
  `province` varchar(100) NOT NULL,
  `userType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `phoneNumber`, `pswd`, `homenumber`, `street`, `city`, `postalcode`, `province`, `userType`) VALUES
(23, 'achintha', 'linuka', 'linukamanmith331@gmail.com', 0, '12345', '', '', '', '', '', 'client'),
(24, 'achintha', 'linuka', 'linukamanmith31@gmail.com', 2147483647, '12', 'sdc', 'sdvs', 'vd xv ', 'sdvs', ' vxv ', 'client'),
(25, 'sunera', 'imasha', 'suneraimasha3@gmail.com', 0, '1234', '', '', '', '', '', 'client'),
(27, 'sadun', 'sagara', 'sadun@gmail.com', 0, '1212', '', '', '', '', '', 'client'),
(28, 'saman', 'indika', 'indika@gmal.com', 0, '0000', '', '', '', '', '', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_experience`
--
ALTER TABLE `admin_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `f_back`
--
ALTER TABLE `f_back`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `faq_id` (`faq_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_experience`
--
ALTER TABLE `admin_experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `f_back`
--
ALTER TABLE `f_back`
  MODIFY `Id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`faq_id`) REFERENCES `faq` (`faq_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
