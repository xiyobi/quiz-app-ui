-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: quiz_app
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `result_id` int NOT NULL,
  `option_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `answers_fk2` (`option_id`),
  KEY `result_id` (`result_id`),
  CONSTRAINT `answers_fk2` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (12,51,108),(13,51,111),(14,52,111),(15,52,108),(16,53,112),(17,53,108),(18,54,112),(19,54,109);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `options_fk1` (`question_id`),
  CONSTRAINT `options_fk1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (108,45,'Option 1',1,'2025-01-24 18:27:20','2025-01-24 18:27:20'),(109,45,'Option 2',0,'2025-01-24 18:27:20','2025-01-24 18:27:20'),(110,46,'Option 1',1,'2025-01-24 18:27:20','2025-01-24 18:27:20'),(111,46,'Option 2',0,'2025-01-24 18:27:20','2025-01-24 18:27:20'),(112,46,'Option 3',0,'2025-01-24 18:27:20','2025-01-24 18:27:20');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question_text` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `questions_fk1` (`quiz_id`),
  CONSTRAINT `questions_fk1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (45,10,'Question 1 text','2025-01-24 18:27:20','2025-01-24 18:27:20'),(46,10,'Question 2 text','2025-01-24 18:27:20','2025-01-24 18:27:20');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizzes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unique_value` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time_limit` int NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `unique_value` (`unique_value`),
  KEY `quizzes_fk1` (`user_id`),
  CONSTRAINT `quizzes_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
INSERT INTO `quizzes` VALUES (10,'679386fc32a01',1,'JavaScript Fundamentals Quiz 123','JavaScript Fundamentals Quiz Description',15,'2025-01-24 17:26:36','2025-01-24 17:26:36');
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `started_at` datetime NOT NULL,
  `finished_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `results_fk1` (`user_id`),
  KEY `results_fk2` (`quiz_id`),
  CONSTRAINT `results_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `results_fk2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (51,1,10,'2025-01-29 20:44:49','2025-01-29 20:59:49'),(52,12,10,'2025-01-29 21:24:17','2025-01-29 21:39:17'),(53,15,10,'2025-01-29 21:26:59','2025-01-29 21:41:59'),(54,17,10,'2025-01-29 21:28:11','2025-01-29 21:43:11');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_api_tokens`
--

DROP TABLE IF EXISTS `user_api_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_api_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_api_tokens_fk2` (`user_id`),
  CONSTRAINT `foreign_key_user_api_token` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_api_tokens_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_api_tokens`
--

LOCK TABLES `user_api_tokens` WRITE;
/*!40000 ALTER TABLE `user_api_tokens` DISABLE KEYS */;
INSERT INTO `user_api_tokens` VALUES (1,'ce692d911ffb1492ef827e76245c4bcce2d58b3c5fe62dabc5415317f98b394687bcee1dba8ab4a6',1,'2025-01-02 13:53:36','2024-12-26 18:53:36'),(2,'d7c03924f9fe3f3e10181666d5d473bb1dfad79cb7f6dd85918a218bc1dda0d255bda848c2953179',2,'2025-01-02 13:54:05','2024-12-26 18:54:05'),(3,'a42da54714d20d3e367a567fea024df90088d161fe30ce9067cf76569144e6cd111d71daf8330286',3,'2025-01-02 13:54:16','2024-12-26 18:54:16'),(4,'ec64d64a703b30f9b44f1b8c04b7b69aa6a567193a96420f7800d94f1c46eab7317108330782a320',4,'2025-01-02 13:54:34','2024-12-26 18:54:34'),(5,'f190b0b944f24150f9f9f63d7dea8240b0978cae6c1b17572e082e1a61a8bb441d7157b032df90d8',5,'2025-01-02 13:54:46','2024-12-26 18:54:46'),(6,'af4d45921c1b96e0d0c4880385ca9d50d97370b8503d7b0f1760ac7615148259bd5339928891b7f6',7,'2025-01-02 13:55:35','2024-12-26 18:55:35'),(7,'45b0fc9376739a78ceba1faec84bbd98a114aa2b9136dd7e9afa24cf24379b31cbf15cfaecc1a1e1',1,'2025-01-02 13:56:27','2024-12-26 18:56:27'),(8,'73a50b480dd1fe4518be74bae054496ac77bffa96542997b635f53d0d892c81da290c391431d0371',1,'2025-01-03 12:21:48','2024-12-27 17:21:48'),(9,'080ee0cd6ec4e4a29392c248f1d0ac5ee737fdf91aa47dfcad986c9f6c5542823688d044c06a1e4f',1,'2025-01-14 11:33:23','2025-01-07 16:33:23'),(10,'f299b54a36b8afe35cf5f1b11d3308970ee201d1e44153651d5cd122bdf9b1a4a50b5bd736950a62',10,'2025-01-14 12:57:50','2025-01-07 17:57:50'),(11,'047040d99c37849f586e4bc5e08abfc0576587787ec99f2022d529ea63a82e14cce636028ec6ed37',1,'2025-01-15 12:27:54','2025-01-08 17:27:54'),(12,'f074052ea987c8b8953e1a063769508ba04532ad0e5c954f5f158335873625ce19ef18e8cd432452',1,'2025-01-15 13:59:27','2025-01-08 18:59:27'),(13,'a674b47a285634057d866e763aef21722a135ac14888af0adeffa96183221f3a61bb6aebce17b9b5',1,'2025-01-15 14:10:12','2025-01-08 19:10:12'),(14,'65a2a67a2733db9e6662fbb04a5ebd71229e700d8594277f7f91e41e1e9d4dedb1e0c5ec5d523c72',1,'2025-01-15 14:10:31','2025-01-08 19:10:31'),(15,'841bfbd7cfc61c2e354bd7c1755b70b4b1ffb4403d93541431980cfacc8f26d65f0ab7da68fee2fe',1,'2025-01-15 14:11:56','2025-01-08 19:11:56'),(16,'1634f4d73ab6889261d3354ccbd1fb3c82955b2a97299d8da9b6caa9512852e71f24e1a3b21665ff',1,'2025-01-15 14:13:18','2025-01-08 19:13:18'),(17,'79241ecaaf3ffd7710cb8f3f4d6124d7a3930cb00651f03fbf0147e4bd492e82034fa67a270c0be4',1,'2025-01-15 14:13:51','2025-01-08 19:13:51'),(18,'e7d0f2bab4ddaa7bc5fd90a28fd9e3005443fd994b6fd3e2c186f2e6703caa4d105407e22fcc5805',1,'2025-01-15 15:02:00','2025-01-08 20:02:00'),(19,'708e8116f83a6ac86c128ffaf12270e8721892d9cb3766d1400984dcfd3526c3cecbb6d1d778e62c',1,'2025-01-16 14:07:35','2025-01-09 19:07:35'),(20,'4f7a38717f2b77d3815ced5f0c9abcbb6019d39e6c61fca0c66b81f439eacd54214975e7db1d1fa0',1,'2025-01-16 14:09:28','2025-01-09 19:09:28'),(21,'d04ca164681b9b81a21067967dc9bca07c5d696c59a602d0b4f4390ef05afba72b866983bc72d7f1',1,'2025-01-16 14:11:17','2025-01-09 19:11:17'),(22,'5242644940d56381188afaa006c0103cdc8f1e7c2140439e795a07451165a629e29ecf6976f79fb5',1,'2025-01-16 14:11:22','2025-01-09 19:11:22'),(23,'87063c14d5b2fa6ecb8f5794d8fd56cbe3eae5b1b7b24c8484475e7dc9d3bf7019bd666cdfabc727',1,'2025-01-16 14:11:28','2025-01-09 19:11:28'),(24,'56ef7ba7b8b35017fda7f081c18c01e2884e083c6dba859664684d2151113fb176827602098cbdd1',1,'2025-01-16 14:12:36','2025-01-09 19:12:36'),(25,'886c450c1d21b584f6e6fe5ba198cfb5ed4881784ed28854924cc6168b4687c982b147d719511a91',1,'2025-01-16 14:23:32','2025-01-09 19:23:32'),(26,'e94bcbe33c1b8b5d766a279192806b15b4627622cdec56b57e5a3cdd26cc4bd98da48b058db3b6ed',1,'2025-01-17 15:02:00','2025-01-10 20:02:00'),(27,'1b7f28221702aec07003bb14e0d12a16c45b67ebc158df160d0a54f84e7f7003ea8e038db5d34e7f',1,'2025-01-17 15:04:55','2025-01-10 20:04:55'),(28,'299a16da3be51230a483b0ea36334df2884cf7260695ca6588a23b5bf18842b6dca3a67576d10030',1,'2025-01-20 11:28:38','2025-01-13 16:28:38'),(29,'ca32a3dd04bd3492bb6129cee20f9be93bd253739c81025585e9a120a1307897aaf9bf5fb71f2fc5',1,'2025-01-20 14:37:57','2025-01-13 19:37:57'),(30,'520713b6b317c496a6fb7245e12c56c3f52915ebd81ef58f2b1fb4b3243ece8d821595f7bbad5829',1,'2025-01-21 11:50:21','2025-01-14 16:50:21'),(31,'16ee34e4e070569a18a24e5f8ea04577c7af0c186c958f98cc89528f5a396b5604e5e571d386b72f',1,'2025-01-21 12:39:43','2025-01-14 17:39:43'),(32,'da34cd0339a04fc93c89f04b3507595666eca3796391aa6cee1b2bca949ed52be025f6b6550a0f38',11,'2025-01-21 12:51:59','2025-01-14 17:51:59'),(33,'86563d3f8ed9cdb6f5ca6e9f04ee70422ffeddc1d481390a69bebce27566363cc9621120a2f1feb5',1,'2025-01-28 09:56:01','2025-01-21 14:56:01'),(34,'77d1a8f167fa9721535092d32ad9c6101bcd44491644e5cee21ff9077efb20f3f3baab608d9359f0',1,'2025-01-28 15:26:02','2025-01-21 20:26:02'),(35,'c6cd5e163d3eeab24f4b95a1907c6b1a1f1c601b593ed18ad46b13a30593a56dfb06444980a20783',1,'2025-01-28 15:27:10','2025-01-21 20:27:10'),(36,'3853b3e8ae1fbe4bbd6174724e374d0aa2dcfe5ba18b9327b5d377d51a576bc7c48e248293394340',1,'2025-01-29 21:37:55','2025-01-22 21:37:55'),(37,'646b02971d7b872b3d8b5faf26294e13e032c1a32a5d95fcc09c7034c840b51cd5054a1e2aaae809',1,'2025-01-31 17:56:19','2025-01-24 17:56:19'),(38,'dc26efd64fc5137365e80a484fe05a984a68ff0750cb70ce3601a5b725b2cb118b8934f4871c18db',1,'2025-02-03 21:25:06','2025-01-27 21:25:06'),(39,'857a10321234ad903d227bc8de5f011c1b352f826ee79703fc00394fb3b25e95b25e2c30a9dea5d2',12,'2025-02-05 21:23:21','2025-01-29 21:23:21'),(40,'7b402f58bab1620ccc03d65aab748af56f33fdafdd30b467b272bee3c369f61c515e0d10ea2dc9da',15,'2025-02-05 21:26:47','2025-01-29 21:26:47'),(41,'87db136fcfb8854d7704b13562a7e1d09f16c0bee72363b7b07dfd4f652f067d7eb70234e3cf7d96',17,'2025-02-05 21:28:04','2025-01-29 21:28:04');
/*!40000 ALTER TABLE `user_api_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Abdullajon','abdullajon@gmail.com','$2y$10$g9Gj0nFmqyVzO/44L3phzOklT4G3RTkySHvVk3j8jK4c2eNfJicK.','2024-12-26 18:53:36','2024-12-26 18:53:36'),(2,'Abdullajon','abdullajon1@gmail.com','$2y$10$UV5ZbhOuLCpm4RhrDxdKTOZEhjqHE1QZ3OrCLCPUaPvo4Wfw8PnO6','2024-12-26 18:54:05','2024-12-26 18:54:05'),(3,'Abdullajon','abdullajon12@gmail.com','$2y$10$vScKTafS/c.qyGp4cFtYbODFTEuCnZBw0VdvFOoOorgnB5VS9yK1S','2024-12-26 18:54:16','2024-12-26 18:54:16'),(4,'Abdullajon','abdullajon123@gmail.com','$2y$10$.5n1Yb6T038jsT324bEy.ObJ2O6i9M1y0UoDDp630xVTE9h09UwoK','2024-12-26 18:54:34','2024-12-26 18:54:34'),(5,'Abdullajon','abdullajon1234@gmail.com','$2y$10$ddrG1DDq3np2scjjwEAJX.hIsGFWLmpIsTogHwEiqfIrZEHrLcXv.','2024-12-26 18:54:46','2024-12-26 18:54:46'),(7,'Abdullajon','abdullajon12345@gmail.com','$2y$10$m5pGoLDAbXwnxyH.UoWcR.IbStqa/8dJRHhfBNlUHqqqBCeHSwyMu','2024-12-26 18:55:35','2024-12-26 18:55:35'),(10,'Abdullajon','abdullajon9@gmail.com','$2y$10$ur0D6xTEy/Qrw.ONqVLRt.b40aw37wX//0fw/Cox4QxWNze3lMRQO','2025-01-07 17:57:50','2025-01-07 17:57:50'),(11,'Sanjarbek Ro\'ziyev','sanjarbek@gmail.com','$2y$10$lduTDq4OgpkDAuhUkgnQ4OYkGa5I67slPEtwHQUhZarLlqH5g20RK','2025-01-14 17:51:59','2025-01-14 17:51:59'),(12,'Test admin','admin@admin.com','$2y$10$NV4yJBmgN/IP5rwMEHAoMuUoD.1SI2Rg99np4d7zOTdzb3WN2osem','2025-01-29 21:23:21','2025-01-29 21:23:21'),(15,'Test Admin 2','admin2@admin.com','$2y$10$uc3BACXm6Kut9jc9E9gkpuLobZVww38ILxFLUMGlNCytKY.p0eBTm','2025-01-29 21:26:47','2025-01-29 21:26:47'),(17,'Test admin 3','admin3@admin.com','$2y$10$9Bk4rLQznN90BUG0LfU.uuiOJ7FpYmeVfXSCAZKK4I/2Yt/5RSbkC','2025-01-29 21:28:04','2025-01-29 21:28:04');
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

-- Dump completed on 2025-02-03 19:26:41
