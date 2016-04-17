-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: project3Blog
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
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `date` int(11) NOT NULL,
  `post` varchar(4000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'Test',1460246400,'Test Blog Entry'),(2,'Test2',1460073600,'Test 2'),(3,'Making sense of atomic design:',1447891200,'A year ago we wrote about building our first pattern library at FutureLearn and why we decided to use atomic design methodology. Overall, atomic design has worked out well for our team. It has helped us to build a shared understanding of the interface, make a transition towards a more modular system, and evolve our design language.\r\n\r\nWhile some concepts in atomic design were clear from the start, others felt a bit foggy. For example, one area that weâ€™re still trying to improve our understanding of, is the difference between molecules and organisms.\r\nMolecules and organisms\r\n\r\nBrad Frost defines molecules as â€œgroups of atoms bonded together, the smallest fundamental units of a compoundâ€, and organisms as â€œgroups of molecules joined together to form a relatively complex, distinct section of an interfaceâ€. \r\n\r\nWhile these definitions may sound simple in theory, weâ€™ve been struggling to understand exactly when a molecule is complex enough to become an organism, the defining difference between the two types, and even why we need both types in the first place. (The CSS part of organisms and molecules are quite similar, wouldnâ€™t it be simpler to just have smaller and larger molecules?)\r\nWhy have both types in the first place?\r\n\r\nWe felt that a separation between molecules and organisms brings (or could potentially bring) three main advantages.\r\n\r\n    From the front-end perspective, organisms are good candidates for separating their HTML parts into partials (molecules are probably too simple for this).\r\n    From the design perspective, it helps to understand the design, and see what parts it consists of. It also helps to find the right element quicker to use in your design (for example, â€œI need a supporting element here to enable sharing of this content, letâ€™s see what we haveâ€¦â€)\r\n    From the Pattern Library perspective, it helps to organise the elements and makes them easier to find (at least easier than the one long list we used to have).\r\n\r\nThe problem we were trying to address\r\n\r\nHowever, there was no shared understanding in the team about what the distinction is exactly. Is it about the visual presentation â€“ for example, size or visual complexity? Is it about the complexity or importance of the content? Is it about the function? What if the content alters the function? And what if the function is relative, depending on the context in which an element appears?\r\n\r\nAs a result, we used to spend a long time debating whether something is a molecule or an organism. The debates werenâ€™t always productive, and we couldnâ€™t afford to continue having them.\r\n\r\nSo we decided to run a workshop with designers and front-end developers, to see how we could become more efficient in classifying the elements.\r\nThe workshop\r\n\r\nAs always, we cut the interface elements out on paper (pictured above). We split into small teams and asked each group to sort the interface elements into groups (similar to a card sort), in the way that made sense to them, rather than the way they were already organised in the pattern library. The idea was just to see what groupings people would come up with.\r\nThe results\r\n\r\nThe results of the workshop were fairly inconclusive. The teams classified the modules in a variety of ways and ultimately ended up with different groupings.\r\n\r\nHowever, there were clearly two distinct types. We all picked up that some modules could be used on their own, while others could only work only as part of another module. For example, these two components are quite different, both on the functional and presentation levels:\r\n\r\nThe elements in the first group (which the top component represents) have more of a supporting function â€“ letâ€™s call them â€œhelpersâ€. The elements in the second group are more independent â€“ letâ€™s call them â€œstandaloneâ€.\r\n\r\nHelpers\r\n\r\nHelpers donâ€™t make sense on their own. Here are just a few typical representatives of this group. In our interface molecules are typically â€œhelpers'),(4,'Making Style Guides Happen',1460264400,'So how do we make these things happen? How do we establish pattern libraries in our work?\r\nSell it\r\n\r\nWell, first thing is you sort of have to sell it. And you have to talk about the benefits of pattern libraries. The first and biggest one is that pattern libraries promote UI consistency and cohesion. Jakob Nielson said:\r\n\r\n    Consistency is one of the most powerful usability principles: when things always behave the same, users donâ€™t have to worry about what will happen. Instead, they know what will happen based on earlier experience.\r\n    Jakob Nielson\r\n\r\nThis is tremendously powerful.\r\n\r\nPattern libraries lead to faster production. Anna and I interviewed Frederico Holgado from MailChimp and they have a really fantastic pattern library. He talked about the notion of the â€œdark cornersâ€ of their app â€“ things like legal documents and status pages that arenâ€™t actually priorities of their app.\r\n\r\n    We just copied and pasted a pattern, changed a few things, and in twenty minutes we had built a system that was responsive; it looked great on mobile and it was nice to look at. [The status page] was one of those pages that not a lot of people will see. We call them the dark corners.\r\n\r\n    By having a pattern you could actually use thatâ€™s already 95% of the way there, it brings up the quality of everything so those dark corners actually arenâ€™t so dark any more.\r\n\r\n    Federico Holgado\r\n\r\nBy establishing this pattern library that they used the primary 4 screens of their app to create, and then used and reused those puzzle pieces they already established to light up those dark corners. Suddenly, all those pages that arenâ€™t a priority have a first-class look and feel to them.\r\n\r\nPattern libraries establishes a better workflow between everyone involved in the project. The last speakers were talking about the importance of working together as designers and developers, and these pattern libraries definitely help establish this better workflow between designers and developers and business owners and everyone else.\r\n\r\nPattern libraries create a shared vocabulary between everyone in the organization. Lincoln Mongillo used to work at Starbucks, and whenever they launched their new responsive site, they launched alongside it their new pattern library as well.'),(5,'Tomorrow',1460350800,'Testing that this will show up on 4/11'),(6,'Something',1460350800,'This is a blog post'),(7,'test',1460437200,'test4');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-12  1:05:46
