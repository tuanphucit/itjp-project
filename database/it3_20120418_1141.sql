-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2012 at 06:41 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it3`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `code`, `name`) VALUES
(1, 'NNN', 'Other Company'),
(2, 'HED', 'HEDSPI T09 Company'),
(3, 'FPT', 'FPT Software'),
(4, 'NES', 'NES System');

-- --------------------------------------------------------

--
-- Table structure for table `equips`
--

CREATE TABLE IF NOT EXISTS `equips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `equips`
--

INSERT INTO `equips` (`id`, `code`, `name`, `price`, `quantity`, `start_time`, `description`) VALUES
(2, 'FAN001', 'Quat may Dien Co', 12000, 10, '2012-04-05 09:57:21', 'Quat may dien co, nhap khau tu Viet Nam');

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE IF NOT EXISTS `errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logid` int(11) NOT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `time` varchar(64) DEFAULT NULL,
  `action` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `userid` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pos_of_equips`
--

CREATE TABLE IF NOT EXISTS `pos_of_equips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `equipmentid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `move_time` datetime NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_positions_of_equipments_rooms1` (`roomid`),
  KEY `fk_positions_of_equipments_equipments1` (`equipmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `status` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `roomid` int(11) NOT NULL,
  `date` date NOT NULL,
  `begin_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `create_by` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_requests_users` (`create_by`),
  KEY `fk_requests_users1` (`update_by`),
  KEY `fk_requests_rooms1` (`roomid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `typeid` int(11) NOT NULL,
  `quantity_seat` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `renting_fee` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rooms_room_types1` (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `typeid`, `quantity_seat`, `status`, `renting_fee`, `image`, `description`) VALUES
(1, 'A', 1, 50, '0', 20000, 'tuyendung.docx', 'aaaaa'),
(2, 'B', 2, 30, '0', 15000, NULL, 'bbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE IF NOT EXISTS `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `description`) VALUES
(1, 'Phong hop lon', 'Phong hop lon, so nguoi khoang tren 50 nguoi'),
(2, 'Phong hop vua', 'So nguoi khoang 20 den 50 nguoi'),
(3, 'Phong hop nho', 'So nguoi duoi 20 nguoi'),
(4, 'Kho', 'PhÃ²ng chá»©a Ä‘á»“ hiá»‡n Ä‘ang khÃ´ng sá»­ dá»¥ng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usercode` varchar(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `companyid` int(11) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `local_phone` varchar(45) NOT NULL,
  `role` enum('1','2') NOT NULL DEFAULT '2',
  `created_time` datetime NOT NULL,
  `last_access` datetime NOT NULL,
  `last_booked` datetime NOT NULL,
  `status` enum('0','1','2','-1') NOT NULL,
  `ws_critical` enum('-1','0','1') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usercode_UNIQUE` (`usercode`),
  KEY `fk_users_companies` (`companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usercode`, `email`, `password`, `fullname`, `companyid`, `phone`, `local_phone`, `role`, `created_time`, `last_access`, `last_booked`, `status`, `ws_critical`) VALUES
(1, 'HED001', 'admin@t09.com', '57c420af3661921c7a5040040c9c0442fb5baa43', 'administrator', 2, '0123456789', '999', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '-1'),
(8, 'FPT001', 'oanhnn@fpt.com.vn', '8472802aa58e95f70945b615bac0c28c7a752bb0', 'Nguyen Ngoc Oanh', 3, '01234743838', '234', '2', '2012-04-05 11:19:45', '2012-04-05 11:19:45', '0000-00-00 00:00:00', '2', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `web_configs`
--

CREATE TABLE IF NOT EXISTS `web_configs` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `begin_work_time` time NOT NULL,
  `end_work_time` time NOT NULL,
  `time_unit` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_configs`
--

INSERT INTO `web_configs` (`id`, `begin_work_time`, `end_work_time`, `time_unit`) VALUES
(1, '08:00:00', '22:00:00', 'P0DT0H30M');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pos_of_equips`
--
ALTER TABLE `pos_of_equips`
  ADD CONSTRAINT `fk_positions_of_equipments_equipments1` FOREIGN KEY (`equipmentid`) REFERENCES `equips` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_positions_of_equipments_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_requests_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_users1` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_room_types1` FOREIGN KEY (`typeid`) REFERENCES `room_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_companies1` FOREIGN KEY (`companyid`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
