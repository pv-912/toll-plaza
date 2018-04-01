-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 08:14 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tollplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tolls`
--

CREATE TABLE `tolls` (
  `id` int(16) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lng` varchar(15) DEFAULT NULL,
  `heavy_rate` int(5) DEFAULT NULL,
  `heavy_return_rate` int(5) DEFAULT NULL,
  `medium_rate` int(5) DEFAULT NULL,
  `medium_return_rate` int(5) DEFAULT NULL,
  `light_rate` int(5) DEFAULT NULL,
  `light_return_rate` int(5) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolls`
--

INSERT INTO `tolls` (`id`, `name`, `address`, `lat`, `lng`, `heavy_rate`, `heavy_return_rate`, `medium_rate`, `medium_return_rate`, `light_rate`, `light_return_rate`, `username`, `password`, `role`) VALUES
(69, 'Delhi-Ajmer', 'Delhi Road Highway', '27.10', '77.1', 300, 350, 200, 250, 100, 150, 'toll1', '$2y$10$O9md42JJX6EB7hiUy6fZmeYQE1BhTsxO4kGlJ/S9WKp6pN/sGczga', 'toll'),
(70, 'Jaipur-Ajmer', 'Ajmer Road', '27.2', '77.2', 400, 500, 300, 400, 200, 300, 'toll2', '$2y$10$PRQGddixu0/qdolqXlIuT.8ZfpB63m.F2fiSWfKygPv9GxYBJi4By', 'toll'),
(71, 'Bhopal-Delhi', 'Bhopal Highway', '27.25', '77.25', 300, 350, 200, 250, 100, 150, 'toll3', '$2y$10$lNp/PUXOPgDT31.yWMN2dOefivdKKTTaPFdkyoz/RoNvfdXYgKhcW', 'toll'),
(72, 'Bhopal-Gwalior', 'Gwalior Highway', '27.3', '77.3', 200, 225, 150, 175, 100, 125, 'toll4', '$2y$10$jvPy3kROgJUuo0IvaNUrsOCQDfTrn6fzMGf9gyi4CY8NlUN7NZO.G', 'toll'),
(73, 'Jaipur-Roorkee', 'Jaipur Road', '27.4', '77.4', 400, 450, 250, 300, 150, 200, 'toll5', '$2y$10$l.QJHVR8ZxWYUxMdkkOFpujZBjOb6eBq1ZsaZhu9.u/us2Ox.B.EK', 'toll'),
(74, 'Jhansi-Roorkee', 'Roorkee Highway', '27.45', '77.45', 250, 300, 150, 200, 50, 100, 'toll6', '$2y$10$ExOtnU.hqOfKY/6wzippxODMMfO6AGbzForU2OhOFAnHK2am2yW7i', 'toll'),
(75, 'Beena-Lalitpur', 'Beena Road', '27.5', '77.5', 320, 350, 220, 250, 100, 150, 'toll7', '$2y$10$nxuNAF7fRgxMdR4jnk.3KOCCpUcXb.eKdjLGBnKfDcznGi3RliqOq', 'toll'),
(76, 'Kanpur-Delhi', 'Kanpur Highway', '27.6', '77.6', 700, 800, 500, 600, 100, 200, 'toll8', '$2y$10$sULi2k5goFKo.EH/Lyr69.xbnCJ8B9sZxZrmWc.4p6ke/AsUQs0S.', 'toll'),
(77, 'Kanpur-Roorkee', 'Roorkee Highway', '27.7', '77.7', 120, 150, 80, 100, 40, 60, 'toll9', '$2y$10$9xbEUpfeBHlHxuhlEWKFheNlYkSTeqBV0R3tODlq0HnhY0lMoChoe', 'toll'),
(78, 'Khadkpur-Delhi', 'Delhi Road', '27.75', '77.75', 400, 480, 240, 320, 80, 160, 'toll10', '$2y$10$syKAa2ACmkKT1XWnH0Fciu9mobQetODV/PxTfL6UMu2Za6luLHSqy', 'toll'),
(79, 'Khadkpur-Kanpur', 'Kanpur Road', '27.8', '77.8', 600, 700, 400, 500, 200, 300, 'toll11', '$2y$10$/MatJC8ePOPKE7iOlk9XEuBYTraMNsRIHuUPQzeI2FMw3WK2z9NZC', 'toll'),
(80, 'Kolkata-Roorkee', 'Kolkata Highway', '27.9', '77.9', 150, 175, 100, 125, 50, 75, 'toll12', '$2y$10$8DXwt1e1VkuT6OdR1aS0hORo7Jd5JIqljU8SwtgHJWOxf1ViUvoWm', 'toll'),
(81, 'Dehradun-Delhi', 'Dehradun Road', '28', '78', 520, 620, 320, 420, 120, 220, 'toll13', '$2y$10$x1i313WH7qTfOB5i5k4ni.ivLfEG.1JVgrrgoy8AKP3AWSjnVplRm', 'toll'),
(82, 'Agra-Delhi', 'Agra Highway', '26', '76', 300, 350, 200, 250, 100, 150, 'toll14', '$2y$10$l79rKNSrAvorWR1bYsv9s.Rvl/e3pn3/01JNGohBVOtGWnj8abfSO', 'toll'),
(84, 'Agra-Roorkee', 'Agra Highway', '27.85', '77.85', 200, 300, 100, 150, 25, 50, 'toll15', '$2y$10$VLhy5XshDn54RH.4CNyoe.sJZui/mPjHbbz9BgL0HzYEhaTTHP74m', 'toll');

-- --------------------------------------------------------

--
-- Table structure for table `toll_access`
--

CREATE TABLE `toll_access` (
  `id` int(16) NOT NULL,
  `toll_id` int(16) DEFAULT NULL,
  `user_id` int(16) DEFAULT NULL,
  `round` tinyint(1) NOT NULL DEFAULT '0',
  `payTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toll_access`
--

INSERT INTO `toll_access` (`id`, `toll_id`, `user_id`, `round`, `payTime`) VALUES
(38, 82, 23, 1, '2018-03-20 17:39:00'),
(40, 69, 23, 2, '2018-03-20 17:51:39'),
(42, 71, 23, 2, '2018-03-20 17:52:43'),
(43, 72, 23, 1, '2018-03-20 17:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `toll_access_logs`
--

CREATE TABLE `toll_access_logs` (
  `id` int(16) NOT NULL,
  `toll_id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `timeOfPass` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toll_access_logs`
--

INSERT INTO `toll_access_logs` (`id`, `toll_id`, `user_id`, `timeOfPass`) VALUES
(27, 69, 23, '2018-03-20 17:44:29'),
(28, 70, 23, '2018-03-20 17:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `carVariant` varchar(255) DEFAULT NULL,
  `carColor` varchar(255) DEFAULT NULL,
  `licenseNo` varchar(255) DEFAULT NULL,
  `balance` int(6) DEFAULT '0',
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `password` varchar(260) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `vehicleNo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `vehicleSize` varchar(10) DEFAULT NULL,
  `qr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `carVariant`, `carColor`, `licenseNo`, `balance`, `gender`, `role`, `password`, `dob`, `contact`, `vehicleNo`, `username`, `vehicleSize`, `qr`) VALUES
(23, 'kshtiij', 'medium', 'black', '12345678', 8500, 'male', 'user', '$2y$10$yJWcVosbvnUIndPcwvRif.FDWPNMz9L2KY2CAWvNEIUhNVnDjswIe', '1997-09-08', '9131829188', 'MP-04-2846', 'kshitij', NULL, NULL),
(24, 'nikhil', 'light', 'red', '654321', 0, 'male', 'user', '$2y$10$n11qcIB0iBZWfGMBi685We0laNlOVxemr.eDloYAwcN0BeCOUgfqW', '1998-05-05', '9116891112', 'RJ-14-5846', 'nikhil', NULL, NULL),
(25, '', '', '', '', 0, '', 'user', '$2y$10$jMsI3TOn36xcb5p.O/3a6usE.YA5zihFJt1AJPeHSlJq8F5TGs6MO', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(16) NOT NULL,
  `user_id` int(16) DEFAULT NULL,
  `toll_id` int(16) DEFAULT NULL,
  `payment` int(16) DEFAULT NULL,
  `payTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `toll_id`, `payment`, `payTime`) VALUES
(7, 23, 82, 250, '2018-03-20 17:39:00'),
(8, 23, 69, 250, '2018-03-20 17:39:12'),
(9, 23, 69, 200, '2018-03-20 17:51:39'),
(10, 23, 70, 400, '2018-03-20 17:51:47'),
(11, 23, 71, 250, '2018-03-20 17:52:43'),
(12, 23, 72, 150, '2018-03-20 17:52:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tolls`
--
ALTER TABLE `tolls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `toll_access`
--
ALTER TABLE `toll_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toll_access_logs`
--
ALTER TABLE `toll_access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tolls`
--
ALTER TABLE `tolls`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `toll_access`
--
ALTER TABLE `toll_access`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `toll_access_logs`
--
ALTER TABLE `toll_access_logs`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
