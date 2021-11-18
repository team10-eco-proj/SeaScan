-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: seascan-master-sql: 3306
-- Generation Time: Nov 18, 2021 at 01:54 AM
-- Server version: 5.7.36
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seascan`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_role`
--

CREATE TABLE `sub_role` (
  `role_pk` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_role`
--

INSERT INTO `sub_role` (`role_pk`, `role`) VALUES
(-1, 'Unknown'),
(1, 'General'),
(2, 'Fisher'),
(3, 'Scientist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_role`
--
ALTER TABLE `sub_role`
  ADD PRIMARY KEY (`role_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_role`
--
ALTER TABLE `sub_role`
  MODIFY `role_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
