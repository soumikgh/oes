-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: oes
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.2

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
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_body` varchar(200) NOT NULL,
  `q_ans1` varchar(30) NOT NULL,
  `q_ans2` varchar(30) NOT NULL,
  `q_ans3` varchar(30) NOT NULL,
  `q_ans4` varchar(30) NOT NULL,
  `q_correct_ans` int(11) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Who is the current President of India?','Phunsukh Wangdu','A. P. J. Abdul Kalam','Pranab Mukherjee','Pratibha Patil',3),(2,'Who is the current President of the United States of America?','Barack Obama','Mitt Romney','John McCain','Joe Biden',1),(3,'Who is the current Prime Minister of India?','Sashi Tharoor','Imhotep','Dr. Manmohan Singh','Enrique Iglesias',3),(4,'What is the capital of India?','Thiruvananthapuram','New Delhi','Ooty','Kolkata',2),(5,'What is the capital of West Bengal?','Malda','Murshidabad','Bankura','Kolkata',4),(6,'An example of a fuel-efficient, popular Indian car is Maruti _______ 800.','Skoda','Ferrari','Suzuki','Salman',3),(7,'Select the appropriate word: \"Why this __________, __________, __________ Di?\"','Godaveri','Kolaveri','Blackberry','Strawberry',2),(8,'Which recent British exploitation film based on slums in Mumbai which won an Oscar, and needlessly excited a lot of Indians is?','SlamCat Billionaire','Bombay Dreams','Bend It Like Beckham','Slumdog Millionaire',4),(9,'Which function is commonly used to send formatted output to stdout in C?','System.out.print()','out','get_out()','printf()',4),(10,'The tallest mountain in the world is in this mountain range.','Andes','Himalayas','Appalachian','Rocky',2);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_pass` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test',NULL,'test');
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

-- Dump completed on 2012-11-22 14:29:11
