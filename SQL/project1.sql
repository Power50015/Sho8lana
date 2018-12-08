-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 09:31 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `al3kobat`
--

CREATE TABLE `al3kobat` (
  `id_al3kobh` varchar(11) NOT NULL,
  `des` text NOT NULL,
  `tare5_albd2` date NOT NULL,
  `tare5_alentha2` date NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `almharat`
--

CREATE TABLE `almharat` (
  `id_almharh` varchar(11) NOT NULL,
  `mharh_name` varchar(100) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `almo5alfat`
--

CREATE TABLE `almo5alfat` (
  `id_almo5alfh` varchar(11) NOT NULL,
  `des` text NOT NULL,
  `id_admin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alshakawy`
--

CREATE TABLE `alshakawy` (
  `id_alshakwh` varchar(11) NOT NULL,
  `tare5_alshakwh` date NOT NULL,
  `des_alshakwh` text NOT NULL,
  `id_admin` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alshhadat`
--

CREATE TABLE `alshhadat` (
  `id_alshhadh` varchar(11) NOT NULL,
  `shhadh_name` varchar(100) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_mess` varchar(11) NOT NULL,
  `des` text NOT NULL,
  `tare5_alersal` date NOT NULL,
  `id_mokdem_al5edma` varchar(11) NOT NULL,
  `id_mokdem_ al3rd` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offeres`
--

CREATE TABLE `offeres` (
  `offeres_id` varchar(11) NOT NULL,
  `des` text,
  `time` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `accep` tinyint(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id_Sev` int(11) NOT NULL,
  `id_user_serv` int(11) NOT NULL,
  `id_user_3ard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rabett_ala3mal`
--

CREATE TABLE `rabett_ala3mal` (
  `id_al3ml` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id_section` varchar(11) NOT NULL,
  `name_section` varchar(11) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `des` text,
  `time` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `Id_users` int(11) NOT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_sections`
--

CREATE TABLE `sub_sections` (
  `id_sub_section` varchar(11) NOT NULL,
  `name_sub_section` varchar(100) NOT NULL,
  `id_section` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` varchar(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `E-mail` varchar(50) NOT NULL,
  `passowrd` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `paypal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offeres`
--
ALTER TABLE `offeres`
  ADD PRIMARY KEY (`offeres_id`),
  ADD KEY `id_Sev` (`id_Sev`),
  ADD KEY `id_user_3ard` (`id_user_3ard`),
  ADD KEY `id_user_serv` (`id_user_serv`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `Id_users` (`Id_users`),
  ADD KEY `id_offer` (`id_offer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
