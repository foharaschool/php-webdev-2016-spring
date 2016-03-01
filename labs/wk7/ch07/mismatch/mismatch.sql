-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: mismatch
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
-- Table structure for table `mismatch_user`
--

DROP TABLE IF EXISTS `mismatch_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mismatch_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mismatch_user`
--

LOCK TABLES `mismatch_user` WRITE;
/*!40000 ALTER TABLE `mismatch_user` DISABLE KEYS */;
INSERT INTO `mismatch_user` VALUES (1,'user1','b3daa77b4c04a9551b8781d03191fe098f325e67','2008-06-03 14:51:46','Sidney','Kelsow','F','1984-07-19','Tempe','AZ','sidneypic.jpg'),(2,'user2','a1881c06eec96db9901c7bbfe41c42a3f08e9cb4','2008-06-03 14:52:09','Nevil','Johansson','M','1973-05-13','Reno','NV','nevilpic.jpg'),(3,'user3','0b7f849446d3383546d15a480966084442cd2193','2008-06-03 14:53:05','Alex','Cooper','M','1974-09-13','Boise','ID','alexpic.jpg'),(4,'user4','06e6eef6adf2e5f54ea6c43c376d6d36605f810e','2008-06-03 14:58:40','Susannah','Daniels','F','1977-02-23','Pasadena','CA','susannahpic.jpg'),(5,'user5','7d112681b8dd80723871a87ff506286613fa9cf6','2008-06-03 15:00:37','Ethel','Heckel','F','1943-03-27','Wichita','KS','ethelpic.jpg'),(6,'user6','312a46dc52117efa4e3096eda510370f01c83b27','2008-06-03 15:00:48','Oscar','Klugman','M','1968-06-04','Providence','RI','oscarpic.jpg'),(7,'user7','7bdeecc97cf8f9b9188ba2751aa1755dad9ff819','2008-06-03 15:01:08','Belita','Chevy','F','1975-07-08','El Paso','TX','belitapic.jpg'),(8,'user8','a14c955bda572b817deccc3a2135cc5f2518c1d3','2008-06-03 15:01:19','Jason','Filmington','M','1969-09-24','Hollywood','CA','jasonpic.jpg'),(9,'user9','86f28434210631fa6bda6db990aba7391f512774','2008-06-03 15:01:51','Dierdre','Pennington','F','1970-04-26','Cambridge','MA','dierdrepic.jpg'),(10,'user10','d089da97b9e447158a0466d15fe291f2c43b982e','2008-06-03 15:02:02','Paul','Hillsman','M','1964-12-18','Charleston','SC','paulpic.jpg'),(11,'user11','3d5cbfed48ce23d2f0dc0a0baa3ec2ee93867b2b','2008-06-03 15:02:13','Johan','Nettles','M','1981-11-03','Athens','GA','johanpic.jpg'),(12,'derf04','acbab4bb5d7a00a413d6ace1207e0df7619d25cb','2016-03-01 01:43:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'derf05','54fbeb822cf3773e7f8408e231d0f2c0ce540175','2016-03-01 02:47:50','Fred','Ohara','M','2016-11-01','Peterson','MN','Deadpool_poster.jpg');
/*!40000 ALTER TABLE `mismatch_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-01  3:04:12
