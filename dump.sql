-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: quiz_app
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

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
-- Table structure for table `user_api_tokens`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Asad','asdasd@gmail.com','$2y$10$Htfy2GJ6THrWvU23czaM3.tXM3T1WoyRSvNE7GSXy.mNpZ3TcffG.','2024-12-25 11:05:20','2024-12-25 11:05:20'),(2,'Ulug\'bek','Ulug\'bek@gmail.com','$2y$10$sYssqYbsW1ZsO.fEWDFXtexQgkWknzvHt3GBkx7OOw8ro4CW0Emsi','2024-12-25 11:36:45','2024-12-25 11:36:45'),(3,'Shehroz','Shehroz@gmail.com','$2y$10$1xy8PVzeioaJQGJ4uLOi.u9zUsZWKC2im36wHTh.2yBiwJDsI75Cm','2024-12-25 12:37:38','2024-12-25 12:37:38'),(5,'Hasan','Daulet@gmail.com','$2y$10$ZMhve/rgt6dCAiCYZHtj/.jNEbrbZ6NJzE.UQWvPk9W0FTCGeS93G','2024-12-25 12:39:06','2024-12-25 12:39:06'),(6,'Hasanov','Dauletov@gmail.com','$2y$10$uVoloxWqrp8zZNfT1O84ZO2.y0iTTFcyfV.pGNWUhyAJ/bVwMZ8AW','2024-12-25 12:40:50','2024-12-25 12:40:50'),(8,'Hasanova','Dauletova@gmail.com','$2y$10$EriVpIJETNPNaKpsB1X82OMpvKKRdyKHOOrrnHM79cNrilYWNQwMG','2024-12-25 12:43:33','2024-12-25 12:43:33'),(10,'Hasanboy','hasan@gmail.com','$2y$10$Z/PhvkPZ1HVR4ZsBodDRfeE.hTRK3/FQn2zah2hFsbiMhXB6xhMDG','2024-12-25 12:44:26','2024-12-25 12:44:26'),(13,'Hasanboyev','hasanov@gmail.com','$2y$10$yP7dW1V22m4NIzX41vRFC.fIoZ7bxCEq1on6E4NHpx7A8tKclyTEm','2024-12-25 12:44:46','2024-12-25 12:44:46'),(14,'Hasanboyeva','hasanova@gmail.com','$2y$10$Nmw/RcCI5QSKuPKJX0D77uWZlqnngRM0YtKcDzUvt3mCRfJ6V1jZ6','2024-12-25 12:48:32','2024-12-25 12:48:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

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
                                   KEY `user_id` (`user_id`),
                                   CONSTRAINT `user_api_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_api_tokens`
--

LOCK TABLES `user_api_tokens` WRITE;
/*!40000 ALTER TABLE `user_api_tokens` DISABLE KEYS */;
INSERT INTO `user_api_tokens` VALUES (1,'5ed1346091644a9bc0ceebe3d8fbb7e2fa7c2cd992cb99f350c288ffab71d0a5a66a3120a505d4d5',14,'1970-01-01 00:00:00','2024-12-25 12:48:32');
/*!40000 ALTER TABLE `user_api_tokens` ENABLE KEYS */;
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-25 12:54:18
