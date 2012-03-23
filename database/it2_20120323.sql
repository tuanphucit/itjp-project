CREATE DATABASE  IF NOT EXISTS `it2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `it2`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: it2
-- ------------------------------------------------------
-- Server version	5.5.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `room_types`
--

DROP TABLE IF EXISTS `room_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_types`
--

LOCK TABLES `room_types` WRITE;
/*!40000 ALTER TABLE `room_types` DISABLE KEYS */;
INSERT INTO `room_types` VALUES (0,'会議室',NULL),(1,'会議ブース',NULL);
/*!40000 ALTER TABLE `room_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'NNN001','admin@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055','Admin',1,'','126','0000-00-00 00:00:00','0000-00-00 00:00:00','2012-03-23 02:03:39',0,1,2),(7,'FPT001','d.toan@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055','Dinh Toan',3,'','158','2012-03-19 02:03:32','0000-00-00 00:00:00','2012-03-19 02:03:32',0,1,2),(13,'LTT001','Oanh@t09.com','a9a15920514081b5c1e8e420cb174c8246bd1884','Nguyen Toan',2,'','132','2012-03-19 03:03:40','0000-00-00 00:00:00','2012-03-23 02:03:26',0,1,2),(14,'LTT002','tuananah@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055','Tuan Anh',2,'','753','2012-03-19 03:03:41','0000-00-00 00:00:00','2012-03-19 03:03:41',0,1,2),(15,'NEC004','v.toan@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055','Viet Toan',4,'','235','2012-03-19 07:03:45',NULL,'2012-03-19 07:03:07',-1,1,2),(16,'NNN002','admin2@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055',NULL,0,'','123','0000-00-00 00:00:00','0000-00-00 00:00:00','2012-03-16 08:03:00',NULL,1,1),(18,'NNN003','admin3@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055',NULL,0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00','2012-03-16 08:03:00',NULL,1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'NNN','Other Company'),(2,'LTT','Lifetimetech Ltd,.Co'),(3,'FPT','FPT Viet Nam'),(4,'NEC','NEC Japan');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment1s`
--

DROP TABLE IF EXISTS `equipment1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment1s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment1s`
--

LOCK TABLES `equipment1s` WRITE;
/*!40000 ALTER TABLE `equipment1s` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'A',0,20,'1',30000,'',''),(2,'B',0,30,'1',40000,'','');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_details`
--

DROP TABLE IF EXISTS `request_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestid` int(11) NOT NULL,
  `begin_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_request_details_requests1` (`requestid`),
  CONSTRAINT `fk_request_details_requests1` FOREIGN KEY (`requestid`) REFERENCES `requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_details`
--

LOCK TABLES `request_details` WRITE;
/*!40000 ALTER TABLE `request_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
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
  KEY `fk_requests_rooms1` (`roomid`),
  CONSTRAINT `fk_requests_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_users1` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,'1',1,7,'2012-03-19 02:03:32',NULL,4,'2012-03-19 02:03:32'),(2,'1',2,7,'2012-03-19 02:03:32','thu hang',7,'2012-03-19 02:03:32');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions_of_equipments`
--

DROP TABLE IF EXISTS `positions_of_equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions_of_equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `equipmentid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `move_time` datetime NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_positions_of_equipments_rooms1` (`roomid`),
  KEY `fk_positions_of_equipments_equipments1` (`equipmentid`),
  CONSTRAINT `fk_positions_of_equipments_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `positions_of_equipments_ibfk_1` FOREIGN KEY (`equipmentid`) REFERENCES `equipment1s` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions_of_equipments`
--

LOCK TABLES `positions_of_equipments` WRITE;
/*!40000 ALTER TABLE `positions_of_equipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `positions_of_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL COMMENT 'ký tự đầu là chữ cái : E :error, W:warning, N:noteis. 4 ký tự tiếp theo là chữ số : VD: E0003',
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_logs_users1` (`userid`),
  CONSTRAINT `fk_logs_users1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-23 14:51:11
