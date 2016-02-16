-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: project1MadLibs
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
-- Table structure for table `madlib_entry`
--

DROP TABLE IF EXISTS `madlib_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `madlib_entry` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(50) NOT NULL,
  `ailment` varchar(50) NOT NULL,
  `noun1` varchar(50) NOT NULL,
  `bodypart1` varchar(50) NOT NULL,
  `adjective` varchar(50) NOT NULL,
  `bodypart2` varchar(50) NOT NULL,
  `noun2` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `fav_drink` varchar(50) NOT NULL,
  `noun3` varchar(50) NOT NULL,
  PRIMARY KEY (`entry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `madlib_entry`
--

LOCK TABLES `madlib_entry` WRITE;
/*!40000 ALTER TABLE `madlib_entry` DISABLE KEYS */;
INSERT INTO `madlib_entry` VALUES (1,'Name','Ailment','Noun1','bodypart1','adjective','bodypart2','noun2','medicine','fav drink','noun3'),(2,'Name2','ail2','noun2','body2','adj2','body22','noun22','med2','fav2','noun32'),(3,'Fred','Cold','car','chest','worse','leg','tree','aspirin','koolaid','broom'),(4,'Frank','fever','sink','neck','better','elbow','tree','aspirin','koolaid','leash'),(5,'Frank','Cold','bar','neck','better','armpit','tree','aspirin','koolaid','phone'),(6,'Bob','broken nose','car','cheek','warmer','toe','shoe','Preparation H','Vodka','track'),(7,'Frank','sore ankle','platypus','foot','colder','knee','shoe','oxycodone','capri sun','hydrant'),(8,'Frank','sore throat','bike','leg','colder','hand','hydrant','penicilin','koolaid','bark'),(9,'f','r','e','d','f','r','e','d','f','r'),(10,'Fred','cold','pants','foot','higher','knee','bicycle','neosporin','gatorade','curb'),(11,'Frank','Cold','car','foot','better','knee','tree','aspirin','koolaid','broom'),(12,'Frank','Cold','e','d','better','a','noun2','aspirin','fav2','broom'),(13,'Frank','Cold','e','d','better','a','noun2','aspirin','fav2','broom'),(14,'Frank','Cold','car','foot','better','knee','shoe','aspirin','koolaid','broom'),(15,'Frank','Cold','car','foot','better','knee','tree','aspirin','koolaid','broom'),(16,'Fred','cold','bike','shoulder','softer','knee','shoe','Morphine','Mountain Dew','pole'),(17,'Jared','Boils','hotdog','elbow','ugly','nostril','dog','Ecstasy','beer','poo');
/*!40000 ALTER TABLE `madlib_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `madlib_story`
--

DROP TABLE IF EXISTS `madlib_story`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `madlib_story` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `story` varchar(4000) NOT NULL,
  `time_submit` int(11) NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `madlib_story`
--

LOCK TABLES `madlib_story` WRITE;
/*!40000 ALTER TABLE `madlib_story` DISABLE KEYS */;
INSERT INTO `madlib_story` VALUES (1,'Test Story',1455392069),(2,'<h3>Doctor Visit</h3><p>Patient: Thank you very much for seeing me, Doctor Frank.</p>\n<p>Doctor: What seems to be the problem, young car?</p>\n<p>Patient: When I move my foot, it hurts.</p>\n<p>Doctor: Then, don\'t move your foot.</p>\n<p>Patient: Also, my knee aches. Could you give me some aspirin?</p>\n<p>Doctor: That may not be necessary, yet. Let me take a look. Open your tree wide. Good. Now, I\'m going to listen to your broom beat. Breathe in and out, slowly.</p>\n<p>Patient: Doctor Frank, what is wrong with me?</p>\n<p>Doctor: Unfortunately, you have a Cold, but don\'t worry. You will get better, soon. Take this medication, drink plenty of koolaid, rest, and call me if you feel better.</p>\n',1455392604),(3,'<h3>Doctor Visit</h3><p>Patient: Thank you very much for seeing me, Doctor Fred.</p>\n<p>Doctor: What seems to be the problem, young bike?</p>\n<p>Patient: When I move my shoulder, it hurts.</p>\n<p>Doctor: Then, don\'t move your shoulder.</p>\n<p>Patient: Also, my knee aches. Could you give me some Morphine?</p>\n<p>Doctor: That may not be necessary, yet. Let me take a look. Open your shoe wide. Good. Now, I\'m going to listen to your pole beat. Breathe in and out, slowly.</p>\n<p>Patient: Doctor Fred, what is wrong with me?</p>\n<p>Doctor: Unfortunately, you have a cold, but don\'t worry. You will get better, soon. Take this medication, drink plenty of Mountain Dew, rest, and call me if you feel softer.</p>\n',1455398697),(4,'<h3>Doctor Visit</h3><p>Patient: Thank you very much for seeing me, Doctor Jared.</p>\n<p>Doctor: What seems to be the problem, young hotdog?</p>\n<p>Patient: When I move my elbow, it hurts.</p>\n<p>Doctor: Then, don\'t move your elbow.</p>\n<p>Patient: Also, my nostril aches. Could you give me some Ecstasy?</p>\n<p>Doctor: That may not be necessary, yet. Let me take a look. Open your dog wide. Good. Now, I\'m going to listen to your poo beat. Breathe in and out, slowly.</p>\n<p>Patient: Doctor Jared, what is wrong with me?</p>\n<p>Doctor: Unfortunately, you have a Boils, but don\'t worry. You will get better, soon. Take this medication, drink plenty of beer, rest, and call me if you feel ugly.</p>\n',1455589682);
/*!40000 ALTER TABLE `madlib_story` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-16  2:41:26
