CREATE DATABASE  IF NOT EXISTS `it3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `it3`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: it3
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
-- Table structure for table `equips`
--

DROP TABLE IF EXISTS `equips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equips`
--

LOCK TABLES `equips` WRITE;
/*!40000 ALTER TABLE `equips` DISABLE KEYS */;
INSERT INTO `equips` VALUES (2,'FAN001','Quat may Dien Co',12000,10,'2012-04-05 09:57:21','Quat may dien co, nhap khau tu Viet Nam');
/*!40000 ALTER TABLE `equips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `errors`
--

DROP TABLE IF EXISTS `errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `errors`
--

LOCK TABLES `errors` WRITE;
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
  KEY `fk_users_companies` (`companyid`),
  CONSTRAINT `fk_users_companies1` FOREIGN KEY (`companyid`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'HED001','admin@t09.com','a133cb607700eed8e06cd5ab5a12a482a7834055','administrator',2,'01656121568','1231','1','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','1','-1','20 - Tran Dai Nghia - Hai Ba Trung - Ha Noi','hust_k52'),(8,'FPT001','oanhnn@fpt.com.vn','b5fec100218a6fd122290148ddd63ad067a54799','Nguyen Ngoc Oanh',3,'01234743838','234','2','2012-05-05 04:08:09','2012-04-05 11:19:45','0000-00-00 00:00:00','1','-1','5 - Huynh Thuc Khang - Ha Noi','oanhnn'),(11,'NNN001','tuananh.hedspi@gmail.com','a133cb607700eed8e06cd5ab5a12a482a7834055','Thieu Tuan Anh',1,'84934443137','123','2','2012-05-05 13:05:54','2012-05-05 13:05:54','0000-00-00 00:00:00','2','-1','Thu vien Ta Quang Buu - so 1 - Da Co Viet','anhtt'),(12,'FPT002','nguyentoan1212@gmail.com','a133cb607700eed8e06cd5ab5a12a482a7834055','Nguyen Toan',3,'01656121568','236','2','2012-05-06 01:36:50','2012-05-06 01:36:50','0000-00-00 00:00:00','1','-1','Toa nha Parkson - Ha Noi','toannd'),(13,'NNN002','gon@gmail.com','89d178601f687e13af3df8db3b07dfb10d7ca413','æ¨©ã€€ä»£',1,'01234567890','1234','2','2012-05-06 19:05:22','2012-05-06 19:05:22','0000-00-00 00:00:00','1','-1','79- Thai Ha - Dong Da - Ha Noi','gonshyo1'),(14,'NNN003','gon2@gmail.com','89d178601f687e13af3df8db3b07dfb10d7ca413','gon2 dai',1,'01234567899','1223','2','2012-05-06 19:05:25','2012-05-06 19:05:25','0000-00-00 00:00:00','0','-1','43 - Nguyen Chi Thanh - Ha Noi','gonshyo2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_configs`
--

DROP TABLE IF EXISTS `web_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_configs` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `begin_work_time` time NOT NULL,
  `end_work_time` time NOT NULL,
  `time_unit` varchar(10) NOT NULL,
  `request_expense` int(11) NOT NULL,
  `detroy_expense` int(11) NOT NULL,
  `punish_expense` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_configs`
--

LOCK TABLES `web_configs` WRITE;
/*!40000 ALTER TABLE `web_configs` DISABLE KEYS */;
INSERT INTO `web_configs` VALUES (1,'00:00:00','23:59:00','P0DT0H30M',20000,10000,200000);
/*!40000 ALTER TABLE `web_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'NNN','Other Company'),(2,'HED','HEDSPI T09 Company'),(3,'FPT','FPT Software'),(4,'NES','NES System');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_types`
--

LOCK TABLES `room_types` WRITE;
/*!40000 ALTER TABLE `room_types` DISABLE KEYS */;
INSERT INTO `room_types` VALUES (1,'ä¼šè­°å®¤','ä¼šè­°å®¤'),(2,'ä¼šè­°ãƒ–ãƒ¼ã‚¹','ä¼šè­°ãƒ–ãƒ¼ã‚¹'),(4,'å€‰åº«','è¨­å‚™ã®å€‰åº«\r\n');
/*!40000 ALTER TABLE `room_types` ENABLE KEYS */;
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
  `quantity_seat` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `renting_fee` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rooms_room_types1` (`typeid`),
  CONSTRAINT `fk_rooms_room_types1` FOREIGN KEY (`typeid`) REFERENCES `room_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'A',1,20,'0',60000,'tuyendung.docx','aaaaa'),(2,'B',1,6,'0',20000,NULL,'bbbbbbbbbbb'),(3,'C',1,6,'0',20000,NULL,'eewt'),(4,'D',1,4,'0',15000,NULL,'fewr'),(5,'F',1,4,'0',15000,NULL,'sdfewfwef'),(6,'G',1,4,'0',15000,NULL,'gerge'),(7,'H',2,4,'0',15000,NULL,'4wt34t'),(8,'E',1,4,'0',15000,NULL,'segewg'),(9,'I',2,4,'0',10000,NULL,'ewfewg'),(10,'J',2,4,'0',10000,NULL,'egrege'),(11,'L',2,5,'0',20000,'error-0.jpg','klkl');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
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
  KEY `fk_requests_rooms1` (`roomid`),
  CONSTRAINT `fk_requests_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_users1` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (10,'f51vcbscef','0',1,'2012-05-15 08:00:00','2012-05-15 09:30:00',0,0,0,0,0,'',1,'2012-05-05 14:56:20',1,'2012-05-05 14:56:20'),(11,'ytqxce9jsi','4',1,'2012-05-16 14:30:00','2012-05-16 17:30:00',0,0,5000,0,0,'',1,'2012-05-06 05:50:35',1,'2012-05-06 05:50:35'),(13,'s1h33g3g4o','4',1,'2012-05-16 18:30:00','2012-05-16 20:00:00',0,0,0,0,0,'',12,'2012-05-06 08:48:33',1,'2012-05-06 08:48:33'),(14,'zlmx5hdvfb','5',1,'2012-05-18 09:30:00','2012-05-18 11:30:00',180000,10000,0,0,0,'',12,'2012-05-06 17:32:48',1,'2012-05-06 17:32:48'),(15,'jupep8zht0','5',1,'2012-05-18 13:00:00','2012-05-18 15:30:00',135000,10000,5000,100000,0,'',11,'2012-05-06 17:39:51',1,'2012-05-06 17:39:51'),(21,'l5zc4nxydg','1',11,'2012-05-20 13:00:00','2012-05-20 17:00:00',0,20000,0,0,0,'aaaaa',14,'2012-05-06 19:40:40',1,'2012-05-06 19:40:40'),(22,'dx4aqjltr9','1',1,'2012-05-21 10:00:00','2012-05-21 12:00:00',0,20000,0,0,0,'aaaa',14,'2012-05-06 19:47:39',1,'2012-05-06 19:47:39');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_of_equips`
--

DROP TABLE IF EXISTS `pos_of_equips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_of_equips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `equipmentid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `move_time` datetime NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_positions_of_equipments_rooms1` (`roomid`),
  KEY `fk_positions_of_equipments_equipments1` (`equipmentid`),
  CONSTRAINT `fk_positions_of_equipments_equipments1` FOREIGN KEY (`equipmentid`) REFERENCES `equips` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_positions_of_equipments_rooms1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_of_equips`
--

LOCK TABLES `pos_of_equips` WRITE;
/*!40000 ALTER TABLE `pos_of_equips` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_of_equips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `logid` int(11) NOT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `time` varchar(64) DEFAULT NULL,
  `action` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `userid` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`logid`)
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

-- Dump completed on 2012-05-12  8:33:14
