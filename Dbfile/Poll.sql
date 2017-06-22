-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2015 at 02:18 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gibson`
--

-- --------------------------------------------------------

--
-- Table structure for table `Poll`
--

CREATE TABLE IF NOT EXISTS `Poll` (
`id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ownername` varchar(30) NOT NULL,
  `owneremail` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `content` varchar(1000) NOT NULL,
  `result` varchar(200) DEFAULT NULL,
  `cre_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=ucs2;

--
-- Indexes for table `Poll`
--
ALTER TABLE `Poll`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Poll`
--
ALTER TABLE `Poll`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
