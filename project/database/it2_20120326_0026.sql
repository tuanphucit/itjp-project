-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2012 at 12:26 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it2`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `code`, `name`) VALUES
(1, 'NNN', 'Other Company'),
(2, 'LTT', 'Lifetimetech Ltd,.Co'),
(3, 'FPT', 'FPT Viet Nam'),
(4, 'NEC', 'NEC Japan');

-- --------------------------------------------------------

--
-- Table structure for table `equipment1s`
--

CREATE TABLE IF NOT EXISTS `equipment1s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL COMMENT 'ký tự đầu là chữ cái : E :error, W:warning, N:noteis. 4 ký tự tiếp theo là chữ số : VD: E0003',
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_logs_users1` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `positions_of_equipments`
--

CREATE TABLE IF NOT EXISTS `positions_of_equipments` (
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
  `status` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0' COMMENT '0: mới tạo\n1: đồng ý\n2: không đồng ý\n3: yêu cầu huỷ\n4: đồng ý huỷ\n5: kết thúc',
  `roomid` int(11) NOT NULL,
  `create_by` int(11) NOT NULL DEFAULT '0' COMMENT 'Người tạo',
  `create_time` datetime NOT NULL COMMENT 'Thời điểm tạo',
  `note` varchar(45) DEFAULT NULL,
  `update_by` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requests_users` (`create_by`),
  KEY `fk_requests_users1` (`update_by`),
  KEY `fk_requests_rooms1` (`roomid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `status`, `roomid`, `create_by`, `create_time`, `note`, `update_by`, `update_time`) VALUES
(1, '1', 1, 7, '2012-03-19 02:03:32', NULL, 4, '2012-03-19 02:03:32'),
(2, '1', 2, 7, '2012-03-19 02:03:32', 'thu hang', 7, '2012-03-19 02:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE IF NOT EXISTS `request_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestid` int(11) NOT NULL,
  `begin_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_request_details_requests1` (`requestid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `typeid` int(11) NOT NULL,
  `quantity_seat` int(11) NOT NULL COMMENT 'Số ghế',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0: free\n1: busy\n2: repair',
  `renting_fee` int(11) NOT NULL COMMENT 'Giá thuê',
  `image` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rooms_room_types1` (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `typeid`, `quantity_seat`, `status`, `renting_fee`, `image`, `description`) VALUES
(1, 'A', 0, 20, '1', 30000, '', ''),
(2, 'B', 0, 30, '1', 40000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE IF NOT EXISTS `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `description`) VALUES
(0, '会議室', NULL),
(1, '会議ブース', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usercode` varchar(6) NOT NULL COMMENT '3 chữ cái đầu là mã viết tắt của công ty. 3 ký tự tiết theo là stt của người đăng ký trong công ty. vd TYT002',
  `email` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `company_id` smallint(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `local_phone` varchar(45) NOT NULL,
  `created_time` datetime NOT NULL,
  `last_booked` datetime DEFAULT NULL,
  `last_access` datetime DEFAULT NULL,
  `ws_critical` tinyint(4) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usercode_UNIQUE` (`usercode`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usercode`, `email`, `password`, `fullname`, `company_id`, `phone`, `local_phone`, `created_time`, `last_booked`, `last_access`, `ws_critical`, `role`, `status`) VALUES
(4, 'NNN001', 'admin@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'Admin', 1, '', '126', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-03-23 02:03:39', 0, 1, 2),
(7, 'FPT001', 'd.toan@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'Dinh Toan', 3, '', '158', '2012-03-19 02:03:32', '0000-00-00 00:00:00', '2012-03-19 02:03:32', 0, 1, 2),
(13, 'LTT001', 'Oanh@t09.com', 'a9a15920514081b5c1e8e420cb174c8246bd1884', 'Nguyen Toan', 2, '', '132', '2012-03-19 03:03:40', '0000-00-00 00:00:00', '2012-03-23 02:03:26', 0, 1, 2),
(14, 'LTT002', 'tuananah@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'Tuan Anh', 2, '', '753', '2012-03-19 03:03:41', '0000-00-00 00:00:00', '2012-03-19 03:03:41', 0, 1, 2),
(15, 'NEC004', 'v.toan@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', 'Viet Toan', 4, '', '235', '2012-03-19 07:03:45', NULL, '2012-03-19 07:03:07', -1, 1, 2),
(16, 'NNN002', 'admin2@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', NULL, 0, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-03-16 08:03:00', NULL, 1, 1),
(18, 'NNN003', 'admin3@t09.com', 'a133cb607700eed8e06cd5ab5a12a482a7834055', NULL, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-03-16 08:03:00', NULL, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_users1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `positions_of_equipments`
--
ALTER TABLE `positions_of_equipments`
  ADD CONSTRAINT `fk_positions_of_equipments_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `positions_of_equipments_ibfk_1` FOREIGN KEY (`equipmentid`) REFERENCES `equipment1s` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_requests_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_users1` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `request_details`
--
ALTER TABLE `request_details`
  ADD CONSTRAINT `fk_request_details_requests1` FOREIGN KEY (`requestid`) REFERENCES `requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
