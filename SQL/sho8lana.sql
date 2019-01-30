-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 12:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sho8lana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `Certificate_id` varchar(11) NOT NULL,
  `Certificate_name` varchar(100) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `Complaint_id` varchar(11) NOT NULL,
  `Complaint_date` date DEFAULT NULL,
  `Complaint__des` text,
  `dmin_id` varchar(11) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` varchar(11) NOT NULL,
  `message_des` text,
  `Sending_Date` date DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offeres`
--

CREATE TABLE `offeres` (
  `offeres_id` varchar(11) NOT NULL,
  `offere_des` text,
  `offere_time` int(11) DEFAULT NULL,
  `offere_money` int(11) DEFAULT NULL,
  `offere_accep` tinyint(1) DEFAULT NULL,
  `offere_title` varchar(50) DEFAULT NULL,
  `id_Sev` int(11) DEFAULT NULL,
  `id_user_serv` int(11) DEFAULT NULL,
  `id_user_3ard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pba`
--

CREATE TABLE `pba` (
  `pba_id` varchar(11) NOT NULL,
  `pba_name` varchar(100) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `punishment_id` varchar(11) NOT NULL,
  `punishment_des` text,
  `starting_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` varchar(11) NOT NULL,
  `section_name` varchar(11) DEFAULT NULL,
  `section_main` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_main`) VALUES
('1', 'برمجه', NULL),
('2', 'تصميم مواقع', '1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` varchar(11) NOT NULL,
  `service_title` varchar(100) DEFAULT NULL,
  `service_des` text,
  `service_time` date DEFAULT NULL,
  `service_needTime` varchar(11) DEFAULT NULL,
  `service_money` int(11) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `sections_services` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `service_title`, `service_des`, `service_time`, `service_needTime`, `service_money`, `user_id`, `offer_id`, `sections_services`) VALUES
('wnQwP2sW0TC', 'تجربه', 'sadsa', '2019-01-26', '2', 11, '123', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` varchar(11) NOT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_sections`
--

CREATE TABLE `sub_sections` (
  `sub_section_id` varchar(11) NOT NULL,
  `sub_section_name` varchar(100) DEFAULT NULL,
  `section_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` varchar(11) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `User_E-mail` varchar(50) NOT NULL,
  `User_passowrd` varchar(50) NOT NULL,
  `User_phone` varchar(11) DEFAULT NULL,
  `User_paypal` varchar(100) DEFAULT NULL,
  `User_Site` varchar(255) DEFAULT NULL,
  `User_Des` text,
  `User_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_E-mail`, `User_passowrd`, `User_phone`, `User_paypal`, `User_Site`, `User_Des`, `User_Img`) VALUES
('123', 'Power Mostafa', 'p@p.p', '123', NULL, NULL, '0', '', '0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `violation_id` varchar(11) NOT NULL,
  `violation_des` text,
  `admin_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `section_main` (`section_main`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_name` (`User_name`,`User_E-mail`),
  ADD UNIQUE KEY `User_phone` (`User_phone`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`section_main`) REFERENCES `sections` (`section_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
