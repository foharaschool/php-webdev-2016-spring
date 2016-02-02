-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: aliendatabase
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
-- Table structure for table `aliens_abduction`
--

DROP TABLE IF EXISTS `aliens_abduction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aliens_abduction` (
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `when_it_happened` varchar(30) DEFAULT NULL,
  `how_long` varchar(30) DEFAULT NULL,
  `how_many` varchar(30) DEFAULT NULL,
  `alien_description` varchar(100) DEFAULT NULL,
  `what_they_did` varchar(100) DEFAULT NULL,
  `fang_spotted` varchar(10) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aliens_abduction`
--

LOCK TABLES `aliens_abduction` WRITE;
/*!40000 ALTER TABLE `aliens_abduction` DISABLE KEYS */;
INSERT INTO `aliens_abduction` VALUES ('Alf','Nader','2000-07-12','one week','at least 12','It was a big non-recyclable shiny disc full of what appeared to be mutated labor union officials.','Swooped down from the sky and snatched me up with no warning.','no','That\'s it.','alf@nader.com'),('Don','Quayle','1991-09-14','37 seconds','dunno','They looked like donkeys made out of metal with some kind of jet packs attached to them.','I was sitting there eating a baked potatoe when \"Zwoosh!\", this beam of light took me away.','yes','I really do love potatos.','dq@iwasvicepresident.com'),('Rick','Nixon','1969-01-21','nearly 4 years','just one','They were pasty and pandering, and not very forgiving.','Impeached me, of course, then they probed me.','no','I\'m lonely.','rnixon@not'),('Belita','Chevy','2008-06-21','almost a week','27','Clumsy little buggers, had no rhythm.','Tried to get me to play bad music.','no','Looking forward to playing some Guitar Wars now that I\'m back.','belitac@rockin.net'),('Sally','Jones','2008-05-11','1 day','four','green with six tentacles','We just talked and played with a dog','yes','I may have seen your dog. Contact me.','sally@gregs-list.net'),('Meinhold','Ressner','2008-08-10','3 hours','couldn\'t tell','They were in a ship the size of a full moon.','Carried me to the top of a mountain and dropped me off.','no','Just want to thank those fellas for helping me out.','meinhold@icanclimbit.com'),('Mickey','Mikens','2008-07-11','45 minutes','hundreds','Huge heads, skinny arms and legs','Read my mind,','yes','I\'m thinking about designing a helmet to thwart future abductions.','mickey@stopreadingmymind.net'),('Shill','Watner','2008-07-05','2 hours','don\'t know','There was a bright light in the sky, followed by a bark or two.','They beamed me toward a gas station in the desert.','yes','I was out of gas, so it was a pretty good abduction.','shillwatner@imightbecaptkirk.com'),('Fred','OHara','3 days ago','','','','','yes','','fohara@madisoncollege.edu'),('Fred','OHara','3 days ago','4 hours','4','Short and quadripedal','Nothing','yes','t','fohara@madisoncollege.edu'),('Fred','OHara','3 days ago','4 hours','4','Short and quadripedal','Nothing','yes','','fohara@madisoncollege.edu'),('Fred','OHara','3 days ago','4 hours','4','Short and quadripedal','Nothing','yes','','fohara@madisoncollege.edu');
/*!40000 ALTER TABLE `aliens_abduction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-02  0:15:43
