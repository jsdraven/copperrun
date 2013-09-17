-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2013 at 12:37 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `copperrun`
--

-- --------------------------------------------------------

--
-- Table structure for table `raceCat`
--

CREATE TABLE `raceCat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `TwoMileF` varchar(7) NOT NULL,
  `TwoMileM` varchar(7) NOT NULL,
  `HalfMileF` varchar(7) NOT NULL,
  `HalfMileM` varchar(7) NOT NULL,
  `TenKF` varchar(7) NOT NULL,
  `TenKM` varchar(7) NOT NULL,
  `year` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `runners`
--

CREATE TABLE `runners` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Age` tinyint(3) NOT NULL,
  `Bib` tinyint(4) NOT NULL,
  `Date` int(14) NOT NULL,
  `HalfMile` varchar(8) NOT NULL,
  `TenK` varchar(8) NOT NULL,
  `TwoMile` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `runners`
--

INSERT INTO `runners` (`id`, `FName`, `LName`, `Gender`, `Age`, `Bib`, `Date`, `HalfMile`, `TenK`, `TwoMile`) VALUES
(1, 'FName', 'Lname', '', 0, 0, 0, '', 'TenK', ''),
(2, 'Sam', 'Kane', 'M', 12, 113, 0, '', '13:33.9', ''),
(3, 'Michael', 'Singleton', 'M', 41, 123, 0, '', '39:35.6', ''),
(4, 'Steve', 'Ware', 'M', 40, 127, 0, '', '41:22.4', ''),
(5, 'Michael', 'Groevich', 'M', 26, 109, 0, '', '42:10.6', ''),
(6, 'Ernesto', 'Ramirez', 'M', 49, 119, 0, '', '42:55.5', ''),
(7, 'Chris', 'Smith', 'M', 55, 124, 0, '', '43:18.5', ''),
(8, 'Michael', 'Waterhouse', 'M', 58, 127, 0, '', '47:39.0', ''),
(9, 'Isaak', 'McCamey', 'M', 14, 127, 0, '', '48:36.4', ''),
(10, 'Julie', 'Oliver', 'F', 36, 127, 0, '', '48:54.3', ''),
(11, 'Dick', 'Chimenti', 'M', 69, 101, 0, '', '49:20.3', ''),
(12, 'Joseph', 'Miramontes', 'M', 12, 127, 0, '', '51:55.1', ''),
(13, 'Jonathan', 'Miramontes', 'M', 12, 127, 0, '', '52:01.9', ''),
(14, 'Efren', 'Meza', 'M', 59, 127, 0, '', '52:06.8', ''),
(15, 'Tim', 'Hicks', 'M', 68, 127, 0, '', '52:19.1', ''),
(16, 'Juliette', 'Torres', 'F', 36, 125, 0, '', '53:08.7', ''),
(17, 'Chris', 'Rupe', 'M', 35, 127, 0, '', '53:13.0', ''),
(18, 'Bill', 'Magladry', 'M', 50, 127, 0, '', '54:04.4', ''),
(19, 'Hedi', 'Hovatter', 'F', 41, 112, 0, '', '54:44.5', ''),
(20, 'Tim', 'Mueller', 'M', 51, 117, 0, '', '55:03.4', ''),
(21, 'Hunter', 'Vanvliet', 'M', 12, 127, 0, '', '55:40.2', ''),
(22, 'Levi', 'Rollings', 'M', 14, 127, 0, '', '55:45.4', ''),
(23, 'Jacob', 'McGee', 'M', 12, 127, 0, '', '56:09.1', ''),
(24, 'Jayton', 'Dillashaw', 'M', 13, 104, 0, '', '56:19.0', ''),
(25, 'Chloe', 'Barnes', 'F', 12, 127, 0, '', '56:27.2', ''),
(26, 'Ken', 'Swanner', 'M', 50, 127, 0, '', '56:30.5', ''),
(27, 'Dayna', 'DeCristoferi', 'F', 41, 127, 0, '', '57:48.5', ''),
(28, 'Tyler', 'Tafjen', 'M', 14, 127, 0, '', '57:33.8', ''),
(29, 'Marie Jo', 'Barr', 'F', 48, 127, 0, '', '57:48.2', ''),
(30, 'Lacey', 'Rupe', 'F', 29, 127, 0, '', '57:50.4', ''),
(31, 'Aimme', 'Campiutti', 'F', 31, 127, 0, '', '58:04.8', ''),
(32, 'Lark', 'Lieb', 'F', 53, 127, 0, '', '58:11.1', ''),
(33, 'Nate', 'Green', 'M', 32, 108, 0, '', '58:12.0', ''),
(34, 'Tiffany', 'Nunes', 'F', 25, 118, 0, '', '58:24.2', ''),
(35, 'Matt', 'Sheehan', 'M', 43, 127, 0, '', '58:52.0', ''),
(36, 'Jim', 'Roehl', 'M', 41, 121, 0, '', '59:21.2', ''),
(37, 'Sandra', 'Sturzenacker', 'F', 29, 127, 0, '', '00:03.9', ''),
(38, 'Aric', 'Richey', 'M', 13, 120, 0, '', '00:42.1', ''),
(39, 'Lisa', 'Freitas', 'F', 37, 106, 0, '', '00:59.3', ''),
(40, 'Mark', 'Barnes', 'M', 42, 127, 0, '', '01:29.0', ''),
(41, 'Damon', 'Chipester', 'M', 45, 127, 0, '', '01:37.3', ''),
(42, 'Laura', 'Hoffman', 'F', 30, 111, 0, '', '02:53.7', ''),
(43, 'Jamie', 'Luppes', 'M', 35, 114, 0, '', '02:53.9', ''),
(44, 'Dan', 'Tafjen', 'M', 45, 127, 0, '', '03:52.5', ''),
(45, 'Rose', 'Wine', 'F', 13, 126, 0, '', '04:21.7', ''),
(46, 'Baylee', 'Barnes', 'F', 14, 127, 0, '', '04:22.0', ''),
(47, 'Darryl', 'Beardall', 'M', 75, 100, 0, '', '04:28.7', ''),
(48, 'Jennifer', 'Walker', 'F', 28, 127, 0, '', '05:06.9', ''),
(49, 'Caitlin', 'Freitas', 'F', 17, 105, 0, '', '05:28.3', ''),
(50, 'Kenny', 'Worden', 'M', 51, 127, 0, '', '06:05.3', ''),
(51, 'Natalya', 'Morris', 'F', 14, 127, 0, '', '07:03.1', ''),
(52, 'Madyson', 'Wilson', 'F', 14, 127, 0, '', '07:03.7', ''),
(53, 'Camren', 'Herrin', 'M', 15, 127, 0, '', '07:04.8', ''),
(54, 'Elena', 'Saenz', 'F', 43, 127, 0, '', '07:05.2', ''),
(55, 'Dalton', 'Kaua', 'M', 13, 127, 0, '', '07:30.4', ''),
(56, 'Liberty', 'Garcia', 'F', 8, 127, 0, '', '07:43.7', ''),
(57, 'Sara', 'Tutthill', 'F', 35, 127, 0, '', '08:08.7', ''),
(58, 'Sean', 'Campbell', 'M', 26, 127, 0, '', '08:08.9', ''),
(59, 'James', 'Aprile', 'M', 31, 127, 0, '', '08:33.2', ''),
(60, 'Brynne', 'Aprile', 'F', 29, 127, 0, '', '08:36.2', ''),
(61, 'Carol Beck', 'Crosby', 'F', 58, 127, 0, '', '09:18.8', ''),
(62, 'Amie', 'Caton', 'F', 35, 127, 0, '', '12:57.8', ''),
(63, 'Damien', 'Caton', 'M', 36, 127, 0, '', '12:58.2', ''),
(64, 'Robin', 'Kane', 'F', 47, 127, 0, '', '13:56.0', ''),
(65, 'Tyler', 'Carlson', 'M', 13, 127, 0, '', '17:16.4', ''),
(66, 'Jack', 'Malerbi', 'M', 13, 127, 0, '', '19:42.4', ''),
(67, 'Nancy', 'Mitrick', 'F', 68, 116, 0, '', '19:47.2', ''),
(68, 'Amanda', 'Cox', 'F', 13, 102, 0, '', '19:48.4', ''),
(69, 'Izzy', 'Herrin', 'F', 12, 127, 0, '', '20:01.4', ''),
(70, 'Steven', 'Cox', 'M', 39, 103, 0, '', '21:48.4', ''),
(71, 'Marlene', 'Gideon', 'F', 49, 107, 0, '', '22:19.2', ''),
(72, 'Carleen', 'Sargenti-Mansour', 'F', 57, 127, 0, '', '28:27.6', ''),
(73, 'Russell', 'Hamilton', 'M', 48, 110, 0, '', '29:25.2', ''),
(74, 'Kate', 'Sheehan', 'F', 46, 122, 0, '', '29:25.9', '');
