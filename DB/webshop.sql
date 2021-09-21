-- MySQL dump 10.15  Distrib 10.0.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: webshop
-- ------------------------------------------------------
-- Server version	10.0.38-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `webshop`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `webshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `webshop`;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cust_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `bought` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,1,1,'2021-09-20 13:24:04'),(2,4,2,'2021-09-20 13:24:15'),(1,4,1,'2021-09-20 13:24:04'),(4,3,2,'2021-09-20 13:24:23'),(4,1,1,'2021-09-20 13:24:23'),(4,2,1,'2021-09-20 13:24:23'),(4,3,1,'2021-09-20 13:24:23'),(4,4,1,'2021-09-20 13:24:23'),(8,6,1,'2021-09-21 14:43:11'),(9,8,1,'2021-09-21 14:40:30'),(8,5,1,'2021-09-21 14:43:11'),(8,6,1,'2021-09-21 14:43:11'),(8,7,1,'2021-09-21 14:47:48'),(8,5,1,'2021-09-21 14:47:48'),(9,6,1,'2021-09-21 14:48:41'),(9,6,1,'2021-09-21 14:48:41'),(9,6,1,'2021-09-21 14:48:41'),(9,8,1,'2021-09-21 14:48:41'),(4,5,1,'2021-09-21 15:42:01'),(4,5,1,'2021-09-21 15:42:01'),(4,6,1,'2021-09-21 15:42:01'),(4,6,1,'2021-09-21 15:42:01');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Mayer','Hans','hans.mayer@gmail.com','pa55w.rd1234'),(2,'Brunner','Gregor','gregor.brunner@gmail.com','pa55w.rd1234'),(4,'Mayer','Hans','hans.mayer01@gmail.com','pa55w.rd1234'),(5,'Doe','John','john.doe@gmail.com','pa55w.rd1234'),(6,'Doe','Jane','jane.doe@gmail.com','pa55w.rd1234'),(7,'Harrison','George','george.harrison@beatles.co.uk','Pa55w.rd1234'),(12,'John','Lennon','john.lennon@beatles.co.uk','Pa55w.rd1234'),(15,'Paul','McCartney','paul.mccartney@beatles.co.uk','Pa55w.rd1234'),(17,'Ringo','Starr','ringo.starr@beatles.co.uk','Pa55w.rd1234'),(19,'Mustermann','Manfred','manfred.mustermann@t-online.de','Pa55w.rd1234'),(21,'Mustermann','Martina','martina.mustermann@webmail.de','Pa55w.rd1234'),(23,'Kent','Clark','clark.kent@superman.org','Pa55w.rd1234'),(24,'Rambo','John','john.rambo@usarmy.gov','Pa55w.rd1234'),(25,'Stampfli','Heinz','heinz.st@mpf.li','Pa55w.rd1234');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (5,'Banjo',799.99,'pictures/banjo.png'),(6,'Guitar',499.99,'pictures/guitar.png'),(7,'Violin',599.99,'pictures/violin.png'),(8,'Accordeon',699.99,'pictures/ziach.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'hans.mayer@gmail.com','pa55w.rd1234','2021-09-16 16:13:34'),(3,'gregor.brunner@gmail.com','pa55w.rd1234','2021-09-16 16:13:34'),(4,'hans.mayer01@gmail.com','pa55w.rd1234','2021-09-16 16:13:34'),(5,'john.doe@gmail.com','pa55w.rd1234','2021-09-16 16:13:34'),(6,'jane.doe@gmail.com','pa55w.rd1234','2021-09-16 16:13:34'),(7,'george.harrison@beatles.co.uk','Pa55w.rd1234','2021-09-16 16:13:34'),(8,'john.lennon@beatles.co.uk','Pa55w.rd1234','2021-09-16 16:13:34'),(9,'paul.mccartney@beatles.co.uk','Pa55w.rd1234','2021-09-16 16:13:34'),(10,'ringo.starr@beatles.co.uk','Pa55w.rd1234','2021-09-16 16:13:34'),(11,'manfred.mustermann@t-online.de','Pa55w.rd1234','2021-09-16 16:13:34'),(12,'martina.mustermann@webmail.de','Pa55w.rd1234','2021-09-16 16:13:34'),(13,'clark.kent@superman.org','Pa55w.rd1234','2021-09-16 16:13:34'),(14,'john.rambo@usarmy.gov','Pa55w.rd1234','2021-09-16 16:13:34'),(15,'heinz.st@mpf.li','Pa55w.rd1234','2021-09-16 16:13:34'),(16,'heinz.mayer@gmail.de','$2y$10$PFUs0X02eQBaG1lKSC33L.7zHDhMX1fJtL3USh.IvSWCOhENhJqPu','2021-09-18 14:07:43');
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

-- Dump completed on 2021-09-21 15:53:51
