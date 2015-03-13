-- MySQL dump 10.13  Distrib 5.5.33, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: idb
-- ------------------------------------------------------
-- Server version	5.5.33-0+wheezy1

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
-- Table structure for table `accidents`
--

DROP TABLE IF EXISTS `accidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accidents` (
  `reportNumber` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reportNumber`),
  KEY `accidents_user_id_foreign` (`user_id`),
  CONSTRAINT `accidents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accidents`
--

LOCK TABLES `accidents` WRITE;
/*!40000 ALTER TABLE `accidents` DISABLE KEYS */;
INSERT INTO `accidents` VALUES (1,'ublock fff','2015-03-18',1,NULL,'2015-03-13 05:54:31','2015-03-13 08:27:41',NULL),(2,'buea - molyko','2015-03-16',1,NULL,'2015-03-13 08:45:23','2015-03-13 08:46:54',NULL),(3,'Kumba','2015-03-10',1,NULL,'2015-03-13 09:47:10','2015-03-13 09:47:10',NULL),(4,'Kumba','2015-03-11',1,NULL,'2015-03-13 09:47:21','2015-03-13 09:49:27',NULL);
/*!40000 ALTER TABLE `accidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `regno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`regno`),
  KEY `cars_user_id_foreign` (`user_id`),
  CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES ('ce 884 eb','mitshibitshi',1960,1,NULL,'2015-03-13 04:55:47','2015-03-13 04:55:47',NULL),('en 444 ca','toyota',1980,1,NULL,'2015-03-13 04:38:14','2015-03-13 04:38:14',NULL),('es 773 lo','hummer',2004,1,NULL,'2015-03-13 04:55:00','2015-03-13 04:55:00',NULL),('lt 100 sa','Toyota Corolla',2014,1,NULL,'2015-03-13 04:56:37','2015-03-13 07:42:27',NULL),('no 333 fd','humer',2003,1,NULL,'2015-03-13 04:37:30','2015-03-13 04:37:30',NULL),('nw 222 aa','humer',2002,1,NULL,'2015-03-13 04:37:07','2015-03-13 04:37:07',NULL),('so 623 ca','ferrari',2012,1,NULL,'2015-03-13 04:54:27','2015-03-13 04:54:27',NULL),('sw 111 no','mitshibitshi',1999,1,NULL,'2015-03-12 21:52:24','2015-03-13 07:42:35','2015-03-13 07:42:35'),('SW 3878 F','Toyota Corolla',2003,1,NULL,'2015-03-13 08:55:22','2015-03-13 08:56:09','2015-03-13 08:56:09'),('SW 935 AB','Toyota Corolla',2006,1,NULL,'2015-03-13 09:39:27','2015-03-13 09:39:58','2015-03-13 09:39:58'),('we 555 sa','ferrari',2012,1,NULL,'2015-03-13 04:38:43','2015-03-13 04:38:43',NULL);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drivers` (
  `driver_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`driver_id`),
  KEY `drivers_user_id_foreign` (`user_id`),
  CONSTRAINT `drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES ('121-229 21 111','Bonduma - Buea','M','Fongoh Martin Tayong Bosz','2015-03-10','+237 679574561',1,NULL,'2015-03-13 05:22:43','2015-03-13 05:23:32',NULL),('20','limbe','M','waba2','2015-03-25','+2376665544',1,NULL,'2015-03-13 09:42:25','2015-03-13 09:44:08','2015-03-13 09:44:08'),('22','Muea','M','Theophilus Waba','2015-03-05','+237 674104216',1,NULL,'2015-03-13 07:59:57','2015-03-13 07:59:57',NULL),('6','buea','M','nasali','2015-03-18','+237 652 76 82 53',1,NULL,'2015-03-13 08:38:58','2015-03-13 08:43:00','2015-03-13 08:43:00');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_01_01_100001_create_session_table',1),('2015_01_01_132453_user_account',1),('2015_01_02_031110_drivers',1),('2015_01_03_031231_cars',1),('2015_01_04_031338_owns',1),('2015_01_05_031358_accidents',1),('2015_01_06_031320_participants',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owns`
--

DROP TABLE IF EXISTS `owns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owns` (
  `regno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `driver_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`regno`,`driver_id`),
  UNIQUE KEY `owns_regno_unique` (`regno`),
  KEY `owns_user_id_foreign` (`user_id`),
  KEY `owns_driver_id_foreign` (`driver_id`),
  CONSTRAINT `owns_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`),
  CONSTRAINT `owns_regno_foreign` FOREIGN KEY (`regno`) REFERENCES `cars` (`regno`),
  CONSTRAINT `owns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owns`
--

LOCK TABLES `owns` WRITE;
/*!40000 ALTER TABLE `owns` DISABLE KEYS */;
INSERT INTO `owns` VALUES ('ce 884 eb','20',1,NULL,'2015-03-13 09:42:25','2015-03-13 09:42:41','2015-03-13 09:42:41'),('en 444 ca','6',1,NULL,'2015-03-13 08:42:48','2015-03-13 08:42:48',NULL),('es 773 lo','22',1,NULL,'2015-03-13 08:35:35','2015-03-13 08:35:35',NULL),('nw 222 aa','22',1,NULL,'2015-03-13 07:59:57','2015-03-13 08:35:38','2015-03-13 08:35:38'),('sw 111 no','121-229 21 111',1,NULL,'2015-03-13 05:22:43','2015-03-13 05:22:43',NULL),('we 555 sa','20',1,NULL,'2015-03-13 09:43:40','2015-03-13 09:43:40',NULL);
/*!40000 ALTER TABLE `owns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `reportNumber` int(10) unsigned NOT NULL,
  `regno` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `driver_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `damage_amount` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `participants_user_id_foreign` (`user_id`),
  KEY `participants_reportnumber_foreign` (`reportNumber`),
  KEY `participants_regno_foreign` (`regno`),
  KEY `participants_driver_id_foreign` (`driver_id`),
  CONSTRAINT `participants_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`),
  CONSTRAINT `participants_regno_foreign` FOREIGN KEY (`regno`) REFERENCES `cars` (`regno`),
  CONSTRAINT `participants_reportnumber_foreign` FOREIGN KEY (`reportNumber`) REFERENCES `accidents` (`reportNumber`),
  CONSTRAINT `participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,'lt 100 sa','121-229 21 111',25000,1,NULL,NULL,'2015-03-13 05:54:31','2015-03-13 05:54:31'),(1,'lt 100 sa','121-229 21 111',45000,1,NULL,NULL,'2015-03-13 05:56:22','2015-03-13 05:56:22'),(1,'es 773 lo','121-229 21 111',4,1,NULL,NULL,'2015-03-13 08:04:38','2015-03-13 08:04:38'),(2,'es 773 lo','22',76000,1,NULL,NULL,'2015-03-13 08:45:23','2015-03-13 08:46:35'),(2,'no 333 fd','121-229 21 111',56000,1,NULL,NULL,'2015-03-13 08:46:14','2015-03-13 08:46:14'),(4,'no 333 fd','22',2000,1,NULL,NULL,'2015-03-13 09:47:21','2015-03-13 09:47:21'),(2,'ce 884 eb','121-229 21 111',4000,1,NULL,NULL,'2015-03-13 09:48:31','2015-03-13 09:48:31');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adminstrator','fongohmartin@gmail.com','admin','$2y$10$xCDFPufw4Ev2JJCzn1PrJuVXIS5te/YI4lvsarIM6Hz6zxnAbbk6u','A','v2uEZtBPQlcCdeEhpnzLbvEKFv2wJqSz2a8rQb5vgmcJp211H5v8eznvu1x4','2015-03-12 21:50:09','2015-03-13 08:58:22',NULL),(2,'tany','fongohwk@gmail.com','fongoh','$2y$10$QOTCprjbTISzB833t2TFyumACCqfnmaRKbXAMDuP1raQ8gaD2kKhm','A','l2LZF64j5UVISxmyOTUpYcHhq0vZBNkAAt1JpRSvFgN6AoquX7bkrT1qAaW9','2015-03-13 09:51:42','2015-03-13 09:51:42',NULL);
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

-- Dump completed on 2015-03-13 12:23:32
