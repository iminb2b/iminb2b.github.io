-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: n01274584_a
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `lab5`
--

DROP TABLE IF EXISTS `lab5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab5` (
  `userid` varchar(20) NOT NULL,
  `fullname` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `uphone` decimal(10,0) DEFAULT NULL,
  `son` varchar(20) DEFAULT NULL,
  `unum` decimal(5,0) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab5`
--

LOCK TABLES `lab5` WRITE;
/*!40000 ALTER TABLE `lab5` DISABLE KEYS */;
INSERT INTO `lab5` VALUES ('n01274584','Nhung Nguyen','205 Humber Blvd','9999999999','Black Rouge','1212'),('n01342424','Hang Nguyen','205 Humber Blvd','5423444845','Merzy','12'),('n013424344','An Nguyen','205 Humber Blvd','542333245','Ink','14'),('n01342434','An Nguyen','205 Humber Blvd','542333245','Ink','14'),('N01284584','Nhu Nguyen','205 Humber Blvd','542333245','3CE','10'),('n0127484','Nhu Nguyen','205 Humber Blvd','542333245','3CE','10'),('n01245543','Nhu Nguyen','205 Humber Blvd','542333245','3CE','10'),('n01245541','Mai Nguyen','125 Humber blvd','647247647','Black Rouge','0'),('n0127480','NhungNguyen','205 Humber blvd','647647647','Array','0');
/*!40000 ALTER TABLE `lab5` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-28 11:13:58
