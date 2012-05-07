-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2012 at 10:13 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it3`
--

-- --------------------------------------------------------

--
-- Table structure for table `web_configs`
--

CREATE TABLE IF NOT EXISTS `web_configs` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `begin_work_time` time NOT NULL,
  `end_work_time` time NOT NULL,
  `time_unit` varchar(10) NOT NULL,
  `request_expense` int(11) NOT NULL,
  `detroy_expense` int(11) NOT NULL,
  `punish_expense` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_configs`
--

INSERT INTO `web_configs` (`id`, `begin_work_time`, `end_work_time`, `time_unit`, `request_expense`, `detroy_expense`, `punish_expense`) VALUES
(1, '08:00:00', '23:00:00', 'P0DT0H30M', 10000, 5000, 100000);
