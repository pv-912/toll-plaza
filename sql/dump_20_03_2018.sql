-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: tollplaza
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Current Database: `tollplaza`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `tollplaza` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tollplaza`;

--
-- Table structure for table `toll_access`
--

DROP TABLE IF EXISTS `toll_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toll_access` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `toll_id` int(16) DEFAULT NULL,
  `user_id` int(16) DEFAULT NULL,
  `round` tinyint(1) NOT NULL DEFAULT '0',
  `payTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toll_access`
--

LOCK TABLES `toll_access` WRITE;
/*!40000 ALTER TABLE `toll_access` DISABLE KEYS */;
INSERT INTO `toll_access` VALUES (5,2,1,2,'2018-02-04 01:05:44'),(6,3,3,2,'2018-02-04 01:05:44'),(10,2,4,2,'2018-02-05 20:00:04'),(11,1,5,1,'2018-02-05 20:00:10'),(12,2,4,1,'2018-02-05 20:00:31'),(13,1,4,1,'2018-02-05 20:01:21'),(23,1,5,1,'2018-02-05 23:15:54'),(27,1,2,2,'2018-02-07 23:56:51'),(28,1,3,2,'2018-02-07 23:56:54'),(29,1,4,2,'2018-02-07 23:56:58'),(30,1,9,1,'2018-02-07 23:57:08'),(31,43,20,1,'2018-03-12 02:58:10'),(33,44,20,1,'2018-03-12 03:01:49'),(34,57,19,1,'2018-03-06 17:55:56'),(36,59,19,2,'2018-03-07 16:01:28'),(37,52,19,2,'2018-03-08 11:09:50'),(38,51,19,1,'2018-03-08 11:10:07'),(39,42,23,1,'2018-03-20 21:59:56'),(40,55,23,2,'2018-03-20 22:00:14'),(41,54,23,2,'2018-03-20 22:01:05'),(42,64,23,2,'2018-03-20 22:01:09'),(44,59,23,1,'2018-03-20 22:04:16'),(46,65,23,2,'2018-03-20 22:04:49'),(52,66,23,1,'2018-03-20 22:27:01');
/*!40000 ALTER TABLE `toll_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toll_access_logs`
--

DROP TABLE IF EXISTS `toll_access_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toll_access_logs` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `toll_id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `timeOfPass` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toll_access_logs`
--

LOCK TABLES `toll_access_logs` WRITE;
/*!40000 ALTER TABLE `toll_access_logs` DISABLE KEYS */;
INSERT INTO `toll_access_logs` VALUES (1,1,2,'2018-02-04 00:07:29'),(2,1,5,'2018-02-04 00:07:29'),(3,1,3,'2018-02-04 00:07:29'),(4,1,4,'2018-02-04 00:07:29'),(5,1,3,'2018-02-04 00:07:29'),(6,1,1,'2018-02-04 00:07:29'),(7,1,2,'2018-02-04 00:07:29'),(8,1,1,'2018-02-04 00:07:37'),(9,1,4,'2018-02-04 00:08:39'),(10,1,1,'2018-02-04 00:27:29'),(11,1,1,'2018-02-05 16:41:50'),(12,1,4,'2018-02-05 16:42:03'),(13,1,4,'2018-02-05 16:42:09'),(14,1,3,'2018-02-05 16:42:11'),(15,1,4,'2018-02-05 16:42:17'),(16,1,2,'2018-02-05 16:42:30'),(17,1,2,'2018-02-05 16:42:31'),(18,1,2,'2018-02-05 17:00:17'),(19,1,4,'2018-02-05 17:00:36'),(20,1,1,'2018-02-05 17:00:42'),(21,1,3,'2018-02-05 17:51:27'),(22,9,1,'2018-02-07 23:56:33'),(23,1,9,'2018-02-08 00:41:53'),(24,44,20,'2018-03-12 03:00:46'),(25,63,22,'2018-03-05 17:01:28'),(26,59,19,'2018-03-06 17:57:12'),(27,59,19,'2018-03-06 17:59:30'),(28,59,19,'2018-03-06 18:10:30'),(29,59,19,'2018-03-07 16:01:11'),(30,64,19,'2018-03-08 11:22:18'),(31,66,19,'2018-03-20 20:30:19'),(32,66,23,'2018-03-20 22:03:46'),(33,66,23,'2018-03-20 22:05:43'),(34,66,23,'2018-03-20 22:23:58'),(35,66,23,'2018-03-20 22:24:13'),(36,66,23,'2018-03-20 22:26:11'),(37,66,23,'2018-03-20 22:26:24'),(38,66,23,'2018-03-20 22:26:43');
/*!40000 ALTER TABLE `toll_access_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tolls`
--

DROP TABLE IF EXISTS `tolls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tolls` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lng` varchar(15) DEFAULT NULL,
  `heavy_rate` int(5) DEFAULT NULL,
  `heavy_return_rate` int(5) DEFAULT NULL,
  `medium_rate` int(5) DEFAULT NULL,
  `medium_return_rate` int(5) DEFAULT NULL,
  `light_rate` int(5) DEFAULT NULL,
  `light_return_rate` int(5) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tolls`
--

LOCK TABLES `tolls` WRITE;
/*!40000 ALTER TABLE `tolls` DISABLE KEYS */;
INSERT INTO `tolls` VALUES (1,'a','','0','1',1,1,1,1,1,1,'a','$2y$10$VxudbJJUXtlRxfRaw8AMrO8pFOvVjoPJ4EICIRk4CChNdxKFZm4Jy','toll'),(2,'kshitij','','0','77',150,250,95,170,53,90,'z','$2y$10$Tk1.chY9d1vSpGfmqH5/Guwla6O5ChebaAI/fTPNh4x9yZG89tdeO','toll'),(17,'kshitija','','0','77',150,250,95,170,53,90,'ca','$2y$10$ENM/J7knKW5keo2WhFRkluM1vwOFaBUA//q.1aHkHsUPI8nRkiZ/2','toll'),(18,'kshitijab','','0','77',150,250,95,170,53,90,'vca','$2y$10$tAZXTn/jMk0ircXbejaPUuCwX2mWo7FptjW/Ire6T8cG460Gd.51q','toll'),(19,'asdj','','0','77',150,250,95,170,53,90,'asd','$2y$10$dMJOJA3TGvG6FJyz4pqh8uGaK6WKww2pXXZ1HQaKHlXjMec2ShWzq','toll'),(20,'asdf','','0','77',12556,2252,125,256,12,125,'ik','$2y$10$IstWTLvdxkbe28o/yHNNc.Dh1P7q4kY18q6SJR7EUHoeGXfppYDmq','toll'),(21,'asdfa','','0','77',12556,2252,125,256,12,125,'ika','$2y$10$9hpg4BJJn1EBfow5YbJ4ueOxVf0mjsnxfi/s/zX/1TQElfBP5aUTK','toll'),(22,'asdfaa','','0','77',12556,2252,125,256,12,125,'ccc','$2y$10$0cNz6zkw6H9.17VqPFmvR.0uskkihuoOy.QZGc9EkHt9drnowOUqO','toll'),(41,'ghhjasdf',NULL,'27.7896','2.365',4,4,4,4,4,4,'lopffghjk','$2y$10$UbXFRiR/hpwDpYqUqkRLMu9NaXVAsgV6xdrSh6fpEYRDYmoKsEuom','toll'),(42,'Dehradun Roorkee','Dehradun Highway','27.8910','77.8427',536,325,4,2,45,45,'prashant','$2y$10$ZnMgaDJY3.NhVrXV7pcXuOY46oN971p2JYR4TT/xohzyjRFEwnSwq','toll'),(43,'ahsjj',NULL,'29.864860','77.896579',4,4,4,4,4,4,'pv','$2y$10$beljbo8AMYUYksygydbv5OeGSy9kaYrl7finyruGNCZKOXayXn6CK','toll'),(44,'Nikhil Mehra',NULL,'29.8710','77.8955',41,75,14,51,12,34,'nik123','$2y$10$d3WVk/QyZpTzXcV0xSseqORDmHWiMa71o.YgTqt3JGqB46QipCyKm','toll'),(48,'Dehradun-Roorkee','Haridwar Road','27.8910','77.8427',NULL,NULL,NULL,NULL,100,150,'dr420','',''),(51,'Delhi-Roorkee','Dehradun Road','27.8910','77.8427',NULL,NULL,NULL,NULL,100,150,'dr421','',''),(52,'Delhi-Mouradabad','Delhi Road','27.8910','77.8427',NULL,NULL,NULL,NULL,100,150,'dr4211','',''),(54,'Lucknow-Roorkee','Gwalior Road','27.8910','77.8427',NULL,NULL,NULL,NULL,124,110,'dr441','',''),(55,'China-Roorkee','Tibet Road','27.8910','77.8427',NULL,NULL,NULL,NULL,244,510,'dr4121','',''),(57,'Saranhpur-Roorkee','Meerut Road','27.8910','77.8427',NULL,NULL,NULL,NULL,214,380,'dr151','',''),(59,'test 12421',NULL,'27.8910','77.8427',150,250,95,170,53,90,'test12421','$2y$10$HDdEU.kHgeI28I77Ghlq9OWBaI8DNN3Fp2VJyfSoriLbHrERYD3/y','toll'),(63,'Testing Toll',NULL,'29.8710','77.8955',17,19,15,17,12,15,'test12234','$2y$10$PKzE0AvyfyeS8ZhDIlsU3.lRnEagmM8m5L.MRo5ikF1CFbf7GDqTG','toll'),(64,'aSA',NULL,'27.8910','77.8427',21,99,15,18,11,15,'nikhil12132ee412312321','$2y$10$R9Mzqhw5iJQRgZTIXLkYMuDj/slRfwzcXSNaH0mWCwZzqeXW6Ss/a','toll'),(65,'fukka',NULL,'27.8910','77.8427',21,99,15,18,11,15,'lkkasd','$2y$10$b1tEaSGNmUjIyfNDuPoKaejpMOh3FlPYHDReDO4kivt7mC7NkqaPe','toll'),(66,'fukka2','ssdsaklnas asdsjkhbasd asnhkjsadnjk','27.8910','77.8427',21,99,15,18,11,15,'dsadsada','$2y$10$AONoy0JucHVRd96wddj9gesoZjgHyIY3oULu5AYlPtShWI064Z0qS','toll');
/*!40000 ALTER TABLE `tolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logs` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` int(16) DEFAULT NULL,
  `toll_id` int(16) DEFAULT NULL,
  `payment` int(16) DEFAULT NULL,
  `payTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (9,19,59,90,'2018-03-20 22:19:31'),(10,19,59,90,'2018-03-20 22:19:31'),(11,19,52,150,'2018-03-20 22:19:31'),(12,19,51,150,'2018-03-20 22:19:31'),(13,19,64,15,'2018-03-20 22:19:31'),(14,19,66,15,'2018-03-20 22:19:31'),(15,23,42,2,'2018-03-20 22:19:31'),(16,23,64,18,'2018-03-20 22:19:31'),(17,23,66,18,'2018-03-20 22:19:31'),(18,23,59,170,'2018-03-20 22:19:31'),(19,23,66,18,'2018-03-20 22:19:31'),(20,23,65,18,'2018-03-20 22:19:31'),(21,23,66,18,'2018-03-20 22:23:36'),(22,23,66,18,'2018-03-20 22:24:09'),(23,23,66,18,'2018-03-20 22:24:25'),(24,23,66,18,'2018-03-20 22:26:20'),(25,23,66,18,'2018-03-20 22:26:39'),(26,23,66,18,'2018-03-20 22:27:01');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `carVariant` varchar(255) DEFAULT NULL,
  `carColor` varchar(255) DEFAULT NULL,
  `licenseNo` varchar(255) DEFAULT NULL,
  `balance` int(6) DEFAULT '0',
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `password` varchar(260) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `vehicleNo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `vehicleSize` varchar(10) DEFAULT NULL,
  `qr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'prashant','light','Red','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','prash','Big','123'),(2,'nikhil','light','green','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','nikhil','Medium',NULL),(3,'mehak mittal','light','blue','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','mehak',NULL,NULL),(4,'kshitij pratap singh','light','black','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','kshitij','Light',NULL),(5,'Ravi Dwivedi','light','brown','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','ravi',NULL,NULL),(6,'a','light',NULL,NULL,1502,NULL,NULL,NULL,NULL,NULL,NULL,'a@gmail.com',NULL,NULL),(7,'a','light','fghjkl','s',1502,'male','user','$2y$10$UihSiePEP6gtS6Quh00sOekK9QzVSP0vEaY76HpC8/PqzJpoEEePC','2017-12-30','9919431223','fghjk','a@gmail.com1',NULL,NULL),(8,'q','light','fghjkl','s',1502,'male','user','$2y$10$iw5TQOuVxC5iFX7As4Qwou5/V087oO.qLG3g7AJdc9tX4X0fDaqNu','2018-12-30','9919431223','fghjk','a@gmail.com2',NULL,NULL),(10,'v','light','fghjkl','s',1502,'male','user','$2y$10$dKb2P8ReFvRTLI6Xhc02hOT4.t1Con7ztV4wwRCXGq.s/z/3gMQ/K','2018-01-01','9919431223','fghjk','v',NULL,NULL),(11,'v','light','fghjkl','s',1502,'male','user','$2y$10$zACOCp74drxVIb8DlkcxGucXr5P2JR8/whjvB15zaUaA/TWo5gP8O','2018-01-01','9919431223','fghjk','4',NULL,NULL),(12,'v','light','fghjkl','s',1502,'male','user','$2y$10$T8Fk5.brgWcOwhG9c46Pi.eurWfTsu6VbKGHhFUpT0vzqJ8AveE6.','2018-01-01','9919431223','fghjk','5',NULL,NULL),(13,'a','light','fghjkl','s',1502,'male','user','$2y$10$vvcbMk7tDy2Xid7CKtZlP.lFIWYFsxbt9EgSDbEBV.V85TEzjDtzO','','9919431223','fghjk','k',NULL,NULL),(14,'s','light','fghjkl','s',1502,'male','user','$2y$10$Lpys8PfbJ4o601SgICpdV.hnCtW78xGszuOM4zaqwhlRaKRfanOKW','2018-01-01','9919431223','fghjk','s',NULL,NULL),(15,'s','light','fghjkl','s',1502,'male','user','$2y$10$Vr0RBlPeFAOF04SXiwW16On4T1v5iP1nLhfmfldXClxLBx7.1Vjwi','2018-01-01','9919431223','fghjk','jjk',NULL,NULL),(19,'Nikhil Mehra','light','Orange','A89745654',940,'male','user','$2y$10$IsiovCLUeMbnUeYCQGV9cu9M5XPWAHMc/iRcY9FiyxeSp16Lrx5G6','1998-10-23','9876543210','UP 40 A 125z','random_nikhil',NULL,NULL),(20,'Test 1213','light','Orange','A89745654',1028,'male','user','$2y$10$rpC4J4VxkVdwUXTEayg/8eBW7DGgDuPlCm8R9Jq3Vj7QYQ6eu3e7y','1998-10-23','9876543210','UP 40 A 125z','test1213',NULL,NULL),(22,'kshitij 3131','heavy','daas','35136514',81,'male','user','$2y$10$.6yQm3Sf3OHVH/5HeArdzeLlPNuO9TqVh0h9mDs84lZqCN.YxhzcK','275760-04-12','9877654321','4465456','kshitij3131',NULL,NULL),(23,'Test 12421','medium','black','35136514',9748,'male','user','$2y$10$8uRIEWmXMKNtWwhi2tx/LeydTmdphT/kBUPDSvS4v5NSd/8NGNdBO','1998-10-23','9877654321','4465456','test12132342',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-21  3:59:15