-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 05:06 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timeclock2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `dayDate` date DEFAULT NULL,
  `signInTime` time DEFAULT NULL,
  `SignOutTime` time DEFAULT NULL,
  `sickDay` date DEFAULT NULL,
  `vacationStart` date DEFAULT NULL,
  `vacationEnd` date DEFAULT NULL,
  `officeManager` varchar(50) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `dayDate`, `signInTime`, `SignOutTime`, `sickDay`, `vacationStart`, `vacationEnd`, `officeManager`, `user_id`) VALUES
(1, '2016-03-22', '09:00:00', '17:35:23', NULL, NULL, NULL, NULL, NULL),
(2, '2016-03-22', '17:39:51', '17:51:00', NULL, NULL, NULL, NULL, NULL),
(4, '2016-03-22', '17:41:55', '21:21:50', NULL, NULL, NULL, NULL, NULL),
(5, '2016-03-22', '17:46:40', '17:49:38', NULL, NULL, NULL, NULL, NULL),
(6, '2016-03-23', '17:35:19', '17:35:23', NULL, NULL, NULL, NULL, NULL),
(7, '2016-03-23', '21:21:46', '21:21:50', NULL, NULL, NULL, NULL, NULL),
(8, '2018-03-01', '07:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2018-03-01', '08:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2018-03-01', '09:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2018-03-02', '01:22:00', NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2018-03-05', '02:09:00', NULL, NULL, NULL, NULL, 'DJ', 1),
(28, '2018-03-01', NULL, '02:53:00', NULL, NULL, NULL, 'Melissa', 3),
(34, '2018-03-03', '10:18:00', NULL, NULL, NULL, NULL, 'DJ', 2),
(35, '2018-03-03', NULL, '22:18:00', NULL, NULL, NULL, 'DJ', 2),
(36, '2018-03-03', NULL, NULL, NULL, '2018-03-10', '2018-03-17', 'DJ', 2),
(37, NULL, NULL, NULL, '2018-03-06', NULL, NULL, 'DJ', 2),
(38, '2018-02-27', '11:14:00', NULL, NULL, NULL, NULL, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`startTime`, `endTime`) VALUES
('06:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `punchclock`
--

CREATE TABLE `punchclock` (
  `id` int(11) NOT NULL,
  `dayDate` date DEFAULT NULL,
  `officeManager` varchar(50) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `signInTime` time DEFAULT NULL,
  `SignOutTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punchclock`
--

INSERT INTO `punchclock` (`id`, `dayDate`, `officeManager`, `user_id`, `signInTime`, `SignOutTime`) VALUES
(8, '2018-03-07', '', 2, '09:14:00', NULL),
(9, '2018-03-09', 'DJ', 2, NULL, '11:20:00'),
(10, '2018-03-10', 'DJ', 2, '07:48:00', NULL),
(11, '2018-03-10', 'DJ', 2, '17:48:00', NULL),
(12, '2018-04-04', 'DJ', 2, '07:40:00', NULL),
(13, '2018-04-04', 'DJ', 2, NULL, '19:47:00'),
(14, '2018-04-04', 'DJ', 2, '08:05:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sickdays`
--

CREATE TABLE `sickdays` (
  `id` int(11) NOT NULL,
  `officeManager` varchar(50) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `sickDay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sickdays`
--

INSERT INTO `sickdays` (`id`, `officeManager`, `user_id`, `sickDay`) VALUES
(1, 'DJ', 2, '2018-03-09'),
(8, 'DJ', 2, '2018-03-08'),
(9, 'DJ', 2, '2018-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Jose', '25f9e794323b453885f5181f1b624d0b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `id` int(11) NOT NULL,
  `dayDate` date DEFAULT NULL,
  `vacationStart` date DEFAULT NULL,
  `vacationEnd` date DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `officeManager` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`id`, `dayDate`, `vacationStart`, `vacationEnd`, `user_id`, `officeManager`) VALUES
(1, '2018-03-03', '2018-03-10', '2018-03-10', 2, 'DJ'),
(8, '2018-03-03', '2018-03-18', '2018-03-25', 2, 'DJ'),
(9, '2018-04-04', '2018-04-05', '2018-04-06', 2, 'DJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punchclock`
--
ALTER TABLE `punchclock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sickdays`
--
ALTER TABLE `sickdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `punchclock`
--
ALTER TABLE `punchclock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sickdays`
--
ALTER TABLE `sickdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
