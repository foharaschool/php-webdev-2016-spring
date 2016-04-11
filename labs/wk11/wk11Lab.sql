-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: wk11Lab
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `prod_type` varchar(3) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(10) NOT NULL,
  `tool_shipping_provider` varchar(5) DEFAULT NULL,
  `tool_weight` varchar(10) DEFAULT NULL,
  `electronic_recycle` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'gen','Thingamajig','It rolls but is not round','5.99',NULL,NULL,NULL),(2,'gen','Thing2','It does not roll','5',NULL,NULL,NULL),(3,'gen','GenProd','GenProd Test','4.15',NULL,NULL,NULL),(4,'tls','ToolTest','Tool TestDesc','200','ups','25.4',NULL),(5,'elc','ElectronicProd','ElectronicProdTestDesc','208.99',NULL,NULL,1),(6,'gen','Generic Final Test','Final test for generic product type','25.99',NULL,NULL,NULL),(7,'tls','Tool Test Final','Final tool test','15.45','fedex','900',NULL),(8,'elc','Final Electronic Test','Final testing for electronic type','9000',NULL,NULL,1),(9,'gen','For real last test','Blah blah','99999.45',NULL,NULL,NULL),(10,'gen','Widgets','Awesome widgets','4.95',NULL,NULL,NULL),(11,'tls','Buzzsaw','To infinity and beyond','2014','fedex','320',NULL),(12,'elc','Bitcoin machine','Make some money','39000',NULL,NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-05  0:01:21
