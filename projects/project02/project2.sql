-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: project2_exercise_logger
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `exercise_log`
--

DROP TABLE IF EXISTS `exercise_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exercise_date` date DEFAULT NULL,
  `exercise_type` varchar(32) DEFAULT NULL,
  `time_in_minutes` varchar(32) DEFAULT NULL,
  `heartrate` int(3) DEFAULT NULL,
  `calories_burned` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `exercise_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `exercise_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_log`
--

LOCK TABLES `exercise_log` WRITE;
/*!40000 ALTER TABLE `exercise_log` DISABLE KEYS */;
INSERT INTO `exercise_log` VALUES (1,2,'2016-03-20','run','20',150,900),(4,2,'2016-03-20','walk','45',150,200),(9,2,'2016-03-20','walk','45',200,1076),(10,2,'2016-03-20','walk','45',150,737),(11,2,'2016-03-20','run','45',200,1076),(12,2,'2016-03-20','run','45',150,737),(13,1,'2016-03-20','other','450',100,4226),(14,2,'2016-03-21','lift','45',145,703),(15,2,'2016-03-21','other','141',85,928),(16,2,'2016-03-21','swim','45',150,737),(17,3,'2016-03-21','swim','45',200,765),(18,3,'2016-03-21','swim','45',200,766),(19,2,'2016-01-15','walk','45',150,737),(20,3,'2016-03-15','yoga','120',450,6567);
/*!40000 ALTER TABLE `exercise_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_user`
--

DROP TABLE IF EXISTS `exercise_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `weight` int(6) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_user`
--

LOCK TABLES `exercise_user` WRITE;
/*!40000 ALTER TABLE `exercise_user` DISABLE KEYS */;
INSERT INTO `exercise_user` VALUES (1,'fredward','8e79d816cf6a9d852a1ae83c04cf45391680d143','2016-03-20 19:29:19','Fred','OHara','M','1985-11-01',280,'Bob-Klocke-150x150.jpg'),(2,'barney','8e79d816cf6a9d852a1ae83c04cf45391680d143','2016-03-20 19:33:28','Barney','Rubble','M','1956-12-26',190,'barney-rubble-150x150.jpg'),(3,'Pinky','8e79d816cf6a9d852a1ae83c04cf45391680d143','2016-03-21 23:12:54','Pinky','Mouse','M','2016-01-01',2,'pinky.jpg.gif');
/*!40000 ALTER TABLE `exercise_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-22  0:08:44
