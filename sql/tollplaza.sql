-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: tollplaza
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toll_access`
--

LOCK TABLES `toll_access` WRITE;
/*!40000 ALTER TABLE `toll_access` DISABLE KEYS */;
INSERT INTO `toll_access` VALUES (5,2,1,2,'2018-02-04 01:05:44'),(6,3,3,2,'2018-02-04 01:05:44'),(10,2,4,2,'2018-02-05 20:00:04'),(11,1,5,1,'2018-02-05 20:00:10'),(12,2,4,1,'2018-02-05 20:00:31'),(13,1,4,1,'2018-02-05 20:01:21'),(23,43,9,1,'2018-02-05 23:15:54');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toll_access_logs`
--

LOCK TABLES `toll_access_logs` WRITE;
/*!40000 ALTER TABLE `toll_access_logs` DISABLE KEYS */;
INSERT INTO `toll_access_logs` VALUES (1,1,2,'2018-02-04 00:07:29'),(2,1,5,'2018-02-04 00:07:29'),(3,1,3,'2018-02-04 00:07:29'),(4,1,4,'2018-02-04 00:07:29'),(5,1,3,'2018-02-04 00:07:29'),(6,1,1,'2018-02-04 00:07:29'),(7,1,2,'2018-02-04 00:07:29'),(8,1,1,'2018-02-04 00:07:37'),(9,1,4,'2018-02-04 00:08:39'),(10,1,1,'2018-02-04 00:27:29'),(11,1,1,'2018-02-05 16:41:50'),(12,1,4,'2018-02-05 16:42:03'),(13,1,4,'2018-02-05 16:42:09'),(14,1,3,'2018-02-05 16:42:11'),(15,1,4,'2018-02-05 16:42:17'),(16,1,2,'2018-02-05 16:42:30'),(17,1,2,'2018-02-05 16:42:31'),(18,1,2,'2018-02-05 17:00:17'),(19,1,4,'2018-02-05 17:00:36'),(20,1,1,'2018-02-05 17:00:42'),(21,1,3,'2018-02-05 17:51:27');
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tolls`
--

LOCK TABLES `tolls` WRITE;
/*!40000 ALTER TABLE `tolls` DISABLE KEYS */;
INSERT INTO `tolls` VALUES (1,'a','','0','1',1,1,1,1,1,1,'a','$2y$10$VxudbJJUXtlRxfRaw8AMrO8pFOvVjoPJ4EICIRk4CChNdxKFZm4Jy','toll'),(2,'kshitij','','0','77',150,250,95,170,53,90,'z','$2y$10$Tk1.chY9d1vSpGfmqH5/Guwla6O5ChebaAI/fTPNh4x9yZG89tdeO','toll'),(17,'kshitija','','0','77',150,250,95,170,53,90,'ca','$2y$10$ENM/J7knKW5keo2WhFRkluM1vwOFaBUA//q.1aHkHsUPI8nRkiZ/2','toll'),(18,'kshitijab','','0','77',150,250,95,170,53,90,'vca','$2y$10$tAZXTn/jMk0ircXbejaPUuCwX2mWo7FptjW/Ire6T8cG460Gd.51q','toll'),(19,'asdj','','0','77',150,250,95,170,53,90,'asd','$2y$10$dMJOJA3TGvG6FJyz4pqh8uGaK6WKww2pXXZ1HQaKHlXjMec2ShWzq','toll'),(20,'asdf','','0','77',12556,2252,125,256,12,125,'ik','$2y$10$IstWTLvdxkbe28o/yHNNc.Dh1P7q4kY18q6SJR7EUHoeGXfppYDmq','toll'),(21,'asdfa','','0','77',12556,2252,125,256,12,125,'ika','$2y$10$9hpg4BJJn1EBfow5YbJ4ueOxVf0mjsnxfi/s/zX/1TQElfBP5aUTK','toll'),(22,'asdfaa','','0','77',12556,2252,125,256,12,125,'ccc','$2y$10$0cNz6zkw6H9.17VqPFmvR.0uskkihuoOy.QZGc9EkHt9drnowOUqO','toll'),(41,'ghhjasdf',NULL,'27.7896','2.365',4,4,4,4,4,4,'lopffghjk','$2y$10$UbXFRiR/hpwDpYqUqkRLMu9NaXVAsgV6xdrSh6fpEYRDYmoKsEuom','toll'),(42,'prashant',NULL,'27.8910','77.8427',536,325,4,2,45,45,'prashant','$2y$10$ZnMgaDJY3.NhVrXV7pcXuOY46oN971p2JYR4TT/xohzyjRFEwnSwq','toll'),(43,'ahsjj',NULL,'29.864860','77.896579',4,4,4,4,4,4,'pv','$2y$10$beljbo8AMYUYksygydbv5OeGSy9kaYrl7finyruGNCZKOXayXn6CK','toll');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (1,1,2,4),(2,1,1,40),(3,1,7,150),(4,2,4,50),(5,9,4,50),(6,9,1,250),(7,9,1,135),(8,9,4,244),(9,9,43,4),(10,9,43,4),(11,9,43,4),(12,9,43,4),(13,9,43,4),(14,9,43,4),(15,9,43,4),(16,9,43,4),(17,9,43,4);
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
  `balance` int(6) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `password` varchar(260) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `vehicleNo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `vehicleSize` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'prashant','light','Red','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','prash','Big'),(2,'nikhil','light','green','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','nikhil','Medium'),(3,'mehak mittal','light','blue','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','mehak',NULL),(4,'kshitij pratap singh','light','black','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','kshitij','Light'),(5,'Ravi Dwivedi','light','brown','A89745654',1502,'male','user','afq$ft&#gsdGHty','12-25-6398','9919431223','UP 40 A 1258','ravi',NULL),(6,'a','light',NULL,NULL,1502,NULL,NULL,NULL,NULL,NULL,NULL,'a@gmail.com',NULL),(7,'a','light','fghjkl','s',1502,'male','user','$2y$10$UihSiePEP6gtS6Quh00sOekK9QzVSP0vEaY76HpC8/PqzJpoEEePC','2017-12-30','9919431223','fghjk','a@gmail.com1',NULL),(8,'q','light','fghjkl','s',1502,'male','user','$2y$10$iw5TQOuVxC5iFX7As4Qwou5/V087oO.qLG3g7AJdc9tX4X0fDaqNu','2018-12-30','9919431223','fghjk','a@gmail.com2',NULL),(9,'a','light','fghjkl','s',1498,'male','user','$2y$10$ke/cC/hEtxGx0HtEqpMSUeh4pnztuQmf7xTj8qrdLBeRhwgjr7zve','2018-12-31','9919431223','fghjk','a',NULL),(10,'v','light','fghjkl','s',1502,'male','user','$2y$10$dKb2P8ReFvRTLI6Xhc02hOT4.t1Con7ztV4wwRCXGq.s/z/3gMQ/K','2018-01-01','9919431223','fghjk','v',NULL),(11,'v','light','fghjkl','s',1502,'male','user','$2y$10$zACOCp74drxVIb8DlkcxGucXr5P2JR8/whjvB15zaUaA/TWo5gP8O','2018-01-01','9919431223','fghjk','4',NULL),(12,'v','light','fghjkl','s',1502,'male','user','$2y$10$T8Fk5.brgWcOwhG9c46Pi.eurWfTsu6VbKGHhFUpT0vzqJ8AveE6.','2018-01-01','9919431223','fghjk','5',NULL),(13,'a','light','fghjkl','s',1502,'male','user','$2y$10$vvcbMk7tDy2Xid7CKtZlP.lFIWYFsxbt9EgSDbEBV.V85TEzjDtzO','','9919431223','fghjk','k',NULL),(14,'s','light','fghjkl','s',1502,'male','user','$2y$10$Lpys8PfbJ4o601SgICpdV.hnCtW78xGszuOM4zaqwhlRaKRfanOKW','2018-01-01','9919431223','fghjk','s',NULL),(15,'s','light','fghjkl','s',1502,'male','user','$2y$10$Vr0RBlPeFAOF04SXiwW16On4T1v5iP1nLhfmfldXClxLBx7.1Vjwi','2018-01-01','9919431223','fghjk','jjk',NULL);
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

-- Dump completed on 2018-02-06 22:16:05
