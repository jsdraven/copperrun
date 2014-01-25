-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2014 at 05:12 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `copperrun`
--
CREATE DATABASE IF NOT EXISTS `copperrun` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `copperrun`;

-- --------------------------------------------------------

--
-- Table structure for table `racecat`
--

CREATE TABLE IF NOT EXISTS `racecat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `TwoMileF` varchar(7) NOT NULL,
  `TwoMileM` varchar(7) NOT NULL,
  `HalfMileF` varchar(7) NOT NULL,
  `HalfMileM` varchar(7) NOT NULL,
  `TenKF` varchar(7) NOT NULL,
  `TenKM` varchar(7) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `TwoMileF` (`TwoMileF`,`TwoMileM`,`HalfMileF`,`HalfMileM`,`TenKF`,`TenKM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `racecat`
--

INSERT INTO `racecat` (`id`, `TwoMileF`, `TwoMileM`, `HalfMileF`, `HalfMileM`, `TenKF`, `TenKM`, `year`) VALUES
(1, '', '', '', '', '5', '', 2014),
(2, '', '', '', '', '13', '', 2014),
(3, '', '', '', '', '20', '', 2014),
(4, '', '', '', '', '30', '', 2014),
(5, '', '', '', '', '40', '', 2014),
(6, '', '', '', '', '50', '', 2014),
(7, '', '', '', '', '60', '', 2014),
(8, '', '', '', '', '70', '', 2014),
(9, '', '', '', '', '80', '', 2014),
(10, '', '', '', '', '', '5', 2014),
(11, '', '', '', '', '', '13', 2014),
(12, '', '', '', '', '', '20', 2014),
(13, '', '', '', '', '', '30', 2014),
(14, '', '', '', '', '', '40', 2014),
(15, '', '', '', '', '', '50', 2014),
(16, '', '', '', '', '', '60', 2014),
(17, '', '', '', '', '', '70', 2014),
(18, '', '', '', '', '', '80', 2014),
(19, '', '', '0', '', '', '', 2014),
(20, '', '', '6', '', '', '', 2014),
(21, '', '', '8', '', '', '', 2014),
(22, '', '', '10', '', '', '', 2014),
(23, '', '', '', '0', '', '', 2014),
(24, '', '', '', '6', '', '', 2014),
(25, '', '', '', '8', '', '', 2014),
(26, '', '', '', '10', '', '', 2014),
(27, '6', '', '', '', '', '', 2014),
(28, '14', '', '', '', '', '', 2014),
(29, '20', '', '', '', '', '', 2014),
(30, '30', '', '', '', '', '', 2014),
(31, '40', '', '', '', '', '', 2014),
(32, '50', '', '', '', '', '', 2014),
(33, '60', '', '', '', '', '', 2014),
(34, '70', '', '', '', '', '', 2014),
(35, '80', '', '', '', '', '', 2014),
(36, '', '6', '', '', '', '', 2014),
(37, '', '14', '', '', '', '', 2014),
(38, '', '20', '', '', '', '', 2014),
(39, '', '30', '', '', '', '', 2014),
(40, '', '40', '', '', '', '', 2014),
(41, '', '50', '', '', '', '', 2014),
(42, '', '60', '', '', '', '', 2014),
(43, '', '70', '', '', '', '', 2014),
(44, '', '80', '', '', '', '', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `runners`
--

CREATE TABLE IF NOT EXISTS `runners` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Age` int(3) NOT NULL,
  `Bib` int(4) NOT NULL,
  `Date` varchar(14) NOT NULL,
  `HalfMile` varchar(8) NOT NULL,
  `TenK` varchar(8) NOT NULL,
  `TwoMile` varchar(8) NOT NULL,
  `TenKOverAll` int(3) NOT NULL,
  `HalfMileOverAll` int(3) NOT NULL,
  `TwoMileOverAll` int(3) NOT NULL,
  `TenTwoHalf` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
