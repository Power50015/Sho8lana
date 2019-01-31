-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 10:43 PM
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
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `CatID` int(11) NOT NULL,
  `CatName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `CatMain` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`CatID`, `CatName`, `CatMain`) VALUES
(1, 'برمجة وتطوير', NULL),
(2, 'تسويق الكتروني', NULL),
(3, 'تصميم', NULL),
(4, 'كتابة وترجمة', NULL),
(5, 'برمجة CSS و HTML', 1),
(6, 'برمجة Java و .NET', 1),
(7, 'برمجة PHP', 1),
(8, 'برمجة تطبيقات جوال', 1),
(9, 'إعلانات المواقع', 2),
(10, 'التسويق على انستغرام', 2),
(11, 'مقالات ترويجية ونشر', 2),
(12, 'خدمات SEO', 2),
(13, 'تصميم بانرات إعلانية', 3),
(14, 'تصميم بطاقات أعمال', 3),
(15, 'تصميم شعارات', 3),
(16, 'خدمات تعديل الصور', 3),
(17, 'خدمات تدقيق لغوي', 4),
(18, 'خدمات ترجمة', 4),
(19, 'كتابة السيرة الذاتية', 4),
(20, 'كتابة مقالات ومراجعات', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` varchar(11) NOT NULL,
  `section_name` varchar(11) DEFAULT NULL,
  `section_main` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `sections_services` varchar(11) DEFAULT NULL,
  `services_stat` int(2) NOT NULL DEFAULT '0'
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
  `User_Img` varchar(255) NOT NULL DEFAULT '0.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_E-mail`, `User_passowrd`, `User_phone`, `User_paypal`, `User_Site`, `User_Des`, `User_Img`) VALUES
('123', 'Power Mostafa', 'p@p.p', '123', NULL, NULL, '0', '', '0.jpg'),
('5xuXLbSZ40', 'محمد مصطفي', 'powerismynickname2016@gmail.com', 'powerismynickname2016@gmail.com', NULL, 'power@power.power', 'http://powerware.site/', 'انا مبرمج محترف اعمل في مجال برمجه الويب منذ 7 سنين ... \r\nلدي خبره كبيره في WordPress و Joomla .\r\nعملت كا مستشار في شركه Powerware.site لاكثر من 3 سنين .', '1WIiRuBnra_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`CatID`),
  ADD KEY `CatMain` (`CatMain`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `CatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cats`
--
ALTER TABLE `cats`
  ADD CONSTRAINT `cats_ibfk_1` FOREIGN KEY (`CatMain`) REFERENCES `cats` (`CatID`);

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
