-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2018 at 09:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `heavy_rate` varchar(255) NOT NULL,
  `heavy_return_rate` varchar(255) NOT NULL,
  `medium_rate` varchar(255) NOT NULL,
  `medium_return_rate` varchar(255) NOT NULL,
  `light_rate` varchar(255) NOT NULL,
  `light_return_rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolls`
--

INSERT INTO `tolls` (`id`, `name`, `address`, `lat`, `lng`, `heavy_rate`, `heavy_return_rate`, `medium_rate`, `medium_return_rate`, `light_rate`, `light_return_rate`) VALUES
(1, 'Testing Toll One', 'Roorkee, Haridwar', '12.312331', '213.231312', '100', '81', '150', '125', '201', '175');

-- --------------------------------------------------------

--
-- Table structure for table `toll_access`
--

CREATE TABLE `toll_access` (
  `id` int(16) NOT NULL,
  `toll_id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `round` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `car_variant` varchar(255) NOT NULL,
  `car_color` varchar(255) NOT NULL,
  `licence_no` varchar(255) NOT NULL,
  `balance` int(16) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `car_variant`, `car_color`, `licence_no`, `balance`, `gender`) VALUES
(1, 'Nikhil One', '23-10-1998', 'light', '#ff0000', 'AB-1234', 1000, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `toll_id` int(16) NOT NULL,
  `payment` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `toll_id`, `payment`) VALUES
(1, 8, 10, 175);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tolls`
--
ALTER TABLE `tolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toll_access`
--
ALTER TABLE `toll_access`
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
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `toll_access`
--
ALTER TABLE `toll_access`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;