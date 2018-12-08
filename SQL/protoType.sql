-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 08:13 PM
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
-- Database: `powerproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `offeres`
--

CREATE TABLE `offeres` (
  `offeres_id` int(11) NOT NULL,
  `des` text,
  `time` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `accep` tinyint(1) DEFAULT NULL,
  `id_Sev` int(11) NOT NULL,
  `id_user_serv` int(11) NOT NULL,
  `id_user_3ard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offeres`
--

INSERT INTO `offeres` (`offeres_id`, `des`, `time`, `money`, `accep`, `id_Sev`, `id_user_serv`, `id_user_3ard`) VALUES
(0, 'انا هعملك الموقع', 10, 100, 1, 0, 0, 5),
(1, 'انا اجمد حد بيعمل مواقع', 5, 150, NULL, 0, 0, 8),
(2, 'انا برنس اختارتك ', 7, 110, NULL, 0, 0, 11),
(3, 'انا هعملك اللوجو', 10, 100, NULL, 1, 1, 0),
(4, 'انا برنس الديزينات يا باشا', 8, 150, 1, 1, 1, 5),
(5, 'اخترنى و مش هتندم', 4, 40, NULL, 1, 1, 4),
(6, 'انا بترجم جامد جدا ', 2, 100, NULL, 2, 5, 1),
(7, 'انا اصلا من الصين و كل صحابي سلكين', 1, 100, NULL, 2, 5, 7),
(8, 'الصين حلوه ', 3, 300, 1, 2, 5, 8),
(9, 'انا هعملك الموقع حلو جدا', 12, 100, NULL, 3, 0, 5),
(10, 'انا هاظبطلك موقع رااايق ', 4, 20, NULL, 3, 0, 2),
(11, 'الموقع دا خلص قبل ما يبدا ', 1, 1000, NULL, 3, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `des` text,
  `time` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `Id_users` int(11) NOT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `title`, `des`, `time`, `money`, `Id_users`, `id_offer`) VALUES
(0, 'اريد موقع لبيع مستحضرات تجميل', 'يرجي دخول المحترفين فقط نظرا لفالهميه العمل بالنسبه لي \r\n', 16, 90, 0, 0),
(1, 'اريد شعار للموسسه حجي', 'اريد شعار احترافي للموسسه الخاصه بالحركات', 5, 150, 1, 4),
(2, 'اريد ترجمه 100 كلمه', 'اريد ترجمه ورقه بها 100 كلمه من الصينيه الى اليابانيه', 10, 60, 5, 8),
(3, 'اريد عمل موقع احترافي ', 'اريد عمل موقع احترافي ', 15, 150, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `name`) VALUES
(0, 'ahmed'),
(1, 'mostafa'),
(2, 'احمد'),
(3, 'محمد'),
(4, 'عاطف'),
(5, 'power'),
(6, 'نوسه'),
(7, 'نورا'),
(8, 'ايثار'),
(9, 'اسراء'),
(10, 'اسامه'),
(11, 'عشرى');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offeres`
--
ALTER TABLE `offeres`
  ADD CONSTRAINT `offeres_ibfk_1` FOREIGN KEY (`id_Sev`) REFERENCES `services` (`id_services`),
  ADD CONSTRAINT `offeres_ibfk_2` FOREIGN KEY (`id_user_3ard`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `offeres_ibfk_3` FOREIGN KEY (`id_user_serv`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`Id_users`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `services_ibfk_2` FOREIGN KEY (`id_offer`) REFERENCES `offeres` (`offeres_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
