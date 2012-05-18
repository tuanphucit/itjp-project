-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2012 at 02:49 PM
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
-- Table structure for table `phats`
--

CREATE TABLE IF NOT EXISTS `phats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phats`
--

INSERT INTO `phats` (`id`, `time`, `userid`, `note`) VALUES
(1, '2012-05-18 14:19:38', 15, NULL),
(2, '2012-05-18 14:20:34', 15, NULL),
(3, '2012-05-18 14:23:27', 15, NULL);

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
  `begin_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `rent_expense` int(11) NOT NULL,
  `request_expense` int(11) NOT NULL,
  `detroy_expense` int(11) NOT NULL,
  `punish_expense` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_requests_users` (`create_by`),
  KEY `fk_requests_users1` (`update_by`),
  KEY `fk_requests_rooms1` (`roomid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `code`, `status`, `roomid`, `begin_time`, `end_time`, `rent_expense`, `request_expense`, `detroy_expense`, `punish_expense`, `paid`, `note`, `create_by`, `create_time`, `update_by`, `update_time`) VALUES
(1, 'xb16oif61a', '5', 1, '2012-05-17 09:30:00', '2012-05-17 11:30:00', 240000, 20000, 0, 0, 0, '', 12, '2012-05-17 09:10:01', 1, '2012-05-17 09:10:01'),
(4, 'jhrrbwqpas', '5', 8, '2012-05-18 08:00:00', '2012-05-19 08:00:00', 720000, 20000, 0, 0, 0, '', 8, '2012-05-17 09:11:09', 1, '2012-05-17 09:11:09'),
(5, 'djt5owwj2e', '4', 13, '2012-05-21 08:00:00', '2012-05-21 10:00:00', 0, 20000, 10000, 0, 0, '', 15, '2012-05-17 09:33:27', 1, '2012-05-17 09:57:21'),
(6, 'ta41ch9bja', '4', 13, '2012-05-21 08:30:00', '2012-05-21 09:30:00', 0, 20000, 10000, 0, 0, '', 15, '2012-05-17 09:35:02', 1, '2012-05-17 10:27:33'),
(7, 'z72u9ud02a', '4', 13, '2012-05-21 08:00:00', '2012-05-21 09:30:00', 0, 20000, 10000, 0, 0, '', 12, '2012-05-17 10:36:27', 1, '2012-05-17 10:37:20'),
(8, 'lpkkyn875x', '4', 13, '2012-05-21 08:30:00', '2012-05-21 09:00:00', 0, 20000, 10000, 0, 0, '', 12, '2012-05-17 10:37:49', 1, '2012-05-17 10:40:38'),
(9, 'j7d73yb8jp', '1', 13, '2012-05-21 08:00:00', '2012-05-21 10:00:00', 40000, 20000, 0, 0, 0, 'cc1', 15, '2012-05-17 10:41:27', 1, '2012-05-17 10:41:27'),
(10, '3assh70667', '1', 13, '2012-05-22 08:00:00', '2012-06-05 08:00:00', 6720000, 20000, 0, 0, 0, 'cc2', 15, '2012-05-17 10:45:44', 1, '2012-05-17 10:45:44'),
(11, 'lm4nyamuaq', '5', 6, '2012-05-18 00:00:00', '2013-05-18 00:00:00', 262800000, 20000, 0, 0, 0, '1Y', 15, '2012-05-17 10:49:52', 1, '2012-05-17 10:49:52'),
(12, 'sfbwerajh1', '5', 13, '2012-05-17 11:00:00', '2012-05-17 11:30:00', 10000, 20000, 0, 0, 0, '', 15, '2012-05-17 10:54:11', 1, '2012-05-17 10:54:11'),
(13, '9jy5dr1c0y', '5', 6, '2012-05-17 12:00:00', '2012-05-17 12:30:00', 15000, 20000, 0, 0, 0, '', 1, '2012-05-17 11:00:22', 1, '2012-05-17 11:00:22'),
(14, 'gx3gmvt5jr', '4', 6, '2012-05-17 12:30:00', '2012-05-17 13:00:00', 0, 20000, 10000, 0, 0, '', 15, '2012-05-17 11:01:51', 1, '2012-05-17 11:02:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `typeid`, `quantity_seat`, `status`, `renting_fee`, `image`, `description`) VALUES
(1, 'A', 1, 20, '0', 60000, 'room_img01.png', 'aaaaa'),
(2, 'B', 1, 6, '0', 20000, 'room_img05-0.png', 'bbbbbbbbbbb'),
(3, 'C', 1, 6, '0', 20000, 'room_img02.png', 'eewt'),
(4, 'D', 1, 4, '0', 15000, 'room_img03.png', 'fewr'),
(5, 'F', 1, 4, '0', 15000, 'room_img03-0.png', 'sdfewfwef'),
(6, 'G', 1, 4, '0', 15000, 'room_img02-0.png', 'gerge'),
(7, 'H', 2, 4, '0', 15000, 'room_img.jpg', '4wt34t'),
(8, 'E', 1, 4, '0', 15000, 'room_img05.png', 'segewg'),
(9, 'I', 2, 4, '0', 10000, 'room_img01-0.png', 'ewfewg'),
(10, 'J', 2, 4, '0', 10000, 'room_img02-1.png', 'egrege'),
(11, 'L', 2, 5, '0', 20000, 'room_img03-1.png', 'klkl'),
(12, 'new', 2, 20, '0', 100000, '1328687336_co_ban_ca_tinh_30-0.jpg', 'phong super vip'),
(13, 'K', 1, 5, '0', 10000, NULL, 'Add by Gon');

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
(1, 'ä¼šè­°å®¤', 'ä¼šè­°å®¤'),
(2, 'ä¼šè­°ãƒ–ãƒ¼ã‚¹', 'ä¼šè­°ãƒ–ãƒ¼ã‚¹'),
(4, 'å€‰åº«', 'è¨­å‚™ã®å€‰åº«\r\n');

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
  `address` varchar(1000) DEFAULT NULL,
  `bank_account` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usercode_UNIQUE` (`usercode`),
  KEY `fk_users_companies` (`companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usercode`, `email`, `password`, `fullname`, `companyid`, `phone`, `local_phone`, `role`, `created_time`, `last_access`, `last_booked`, `status`, `ws_critical`, `address`, `bank_account`) VALUES
(1, 'HED001', 'admin@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'administrator', 2, '01656121568', '1231', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '-1', '20 - Tran Dai Nghia - Hai Ba Trung - Ha Noi', 'hust_k52'),
(8, 'FPT001', 'oanhnn@fpt.com.vn', 'b5fec100218a6fd122290148ddd63ad067a54799', 'Nguyen Ngoc Oanh', 3, '01234743838', '234', '2', '2012-05-05 04:08:09', '2012-04-05 11:19:45', '0000-00-00 00:00:00', '1', '-1', '5 - Huynh Thuc Khang - Ha Noi', 'oanhnn'),
(11, 'NNN001', 'tuananh.hedspi@gmail.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'Thieu Tuan Anh', 1, '84934443137', '123', '2', '2012-05-05 13:05:54', '2012-05-05 13:05:54', '0000-00-00 00:00:00', '2', '-1', 'Thu vien Ta Quang Buu - so 1 - Da Co Viet', 'anhtt'),
(12, 'FPT002', 'nguyentoan1212@gmail.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'Nguyen Toan', 3, '01656121568', '236', '2', '2012-05-06 01:36:50', '2012-05-06 01:36:50', '0000-00-00 00:00:00', '1', '-1', 'Toa nha Parkson - Ha Noi', 'toannd'),
(13, 'NNN002', 'gon@gmail.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'æ¨©ã€€ä»£', 1, '01234567890', '1234', '2', '2012-05-06 19:05:22', '2012-05-06 19:05:22', '0000-00-00 00:00:00', '-1', '-1', '79- Thai Ha - Dong Da - Ha Noi', 'gonshyo1'),
(14, 'NNN003', 'gon2@gmail.com', '89d178601f687e13af3df8db3b07dfb10d7ca413', 'gon2 dai', 1, '01234567899', '1223', '2', '2012-05-06 19:05:25', '2012-05-06 19:05:25', '0000-00-00 00:00:00', '-1', '-1', '43 - Nguyen Chi Thanh - Ha Noi', 'gonshyo2'),
(15, 'NNN004', 'gonsyo@gmail.com', '89d178601f687e13af3df8db3b07dfb10d7ca413', 'æ¨©ã€€ç¥¥', 1, '01234567890', '104', '2', '2012-05-17 09:05:57', '2012-05-17 09:05:57', '0000-00-00 00:00:00', '1', '-1', 'bach khoa', NULL);

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
  `limit_time` varchar(20) NOT NULL DEFAULT 'P2Y',
  `detroy_time` varchar(20) NOT NULL DEFAULT 'P0DT2H',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_configs`
--

INSERT INTO `web_configs` (`id`, `begin_work_time`, `end_work_time`, `time_unit`, `request_expense`, `detroy_expense`, `punish_expense`, `limit_time`, `detroy_time`) VALUES
(1, '00:00:00', '23:59:00', 'P0DT0H30M', 20000, 10000, 200000, 'P6M', 'P0DT2H');

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
