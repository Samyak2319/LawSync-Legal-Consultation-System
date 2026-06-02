-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: lawsyncmain
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `lawyer_id` bigint unsigned NOT NULL,
  `appointment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_lawyer_id_foreign` (`lawyer_id`),
  CONSTRAINT `bookings_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (3,1,1,'',NULL,'accepted','2026-04-23 01:19:27','2026-04-23 01:21:42'),(5,5,1,'',NULL,'rejected','2026-04-23 03:13:01','2026-04-23 23:06:06'),(7,1,3,'',NULL,'pending','2026-04-26 01:28:50','2026-04-26 01:28:50'),(8,13,3,'',NULL,'pending','2026-04-28 04:08:46','2026-04-28 04:08:46'),(9,14,1,'',NULL,'accepted','2026-04-29 07:26:48','2026-05-06 23:45:37'),(10,14,3,'',NULL,'pending','2026-04-29 07:28:16','2026-04-29 07:28:16'),(11,1,10,'online','I am having an family land and property issue with my brother so your consult will be helpful. Thank you.','accepted','2026-05-07 08:46:11','2026-05-07 23:23:17'),(12,1,9,'offline','Hehe','pending','2026-05-07 08:49:24','2026-05-07 08:49:24'),(13,22,10,'offline','property issue','accepted','2026-05-09 00:58:59','2026-05-09 00:59:39'),(14,1,1,'online','hihi','pending','2026-05-28 03:18:45','2026-05-28 03:18:45');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `case_histories`
--

DROP TABLE IF EXISTS `case_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `case_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lawyer_id` bigint unsigned NOT NULL,
  `case_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filing_date` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `hearing_date` date DEFAULT NULL,
  `status` enum('Pending','Running','Closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `case_histories_lawyer_id_foreign` (`lawyer_id`),
  CONSTRAINT `case_histories_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `case_histories`
--

LOCK TABLES `case_histories` WRITE;
/*!40000 ALTER TABLE `case_histories` DISABLE KEYS */;
INSERT INTO `case_histories` VALUES (1,1,'Property dispute regarding ancestral land ownership','2024-01-10','2025-02-08','2024-06-12','Closed','2026-05-07 11:01:27','2026-05-07 11:01:27'),(2,1,'Criminal bail application in fraud case','2025-05-12','2025-05-13','2025-08-17','Pending','2026-05-07 11:02:19','2026-05-07 11:02:19');
/*!40000 ALTER TABLE `case_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lawyers`
--

DROP TABLE IF EXISTS `lawyers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lawyers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_address` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `lawyers_user_id_foreign` (`user_id`),
  CONSTRAINT `lawyers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lawyers`
--

LOCK TABLES `lawyers` WRITE;
/*!40000 ALTER TABLE `lawyers` DISABLE KEYS */;
INSERT INTO `lawyers` VALUES (1,2,'Criminal Lawyer','Experienced criminal lawyer with 10+ years handling complex cases in district and high courts.','10 years','Kolkata','2026-04-20 12:15:44','2026-05-07 10:58:47',1,NULL,'lawyers/LLXFuNLqR7oxq0jGH4OxjNiG0s71erELqaoEPaKn.jpg','WB/2436/2012','LLB, LLM','Girish Park, Kolkata'),(3,10,'Family Lawyer','Negotiating child custody disputes and parenting plans, often focusing on the \"best interests of the child\"','6 years','Agartala','2026-04-26 00:45:37','2026-04-26 01:12:46',1,NULL,NULL,NULL,NULL,NULL),(6,15,'Criminal Lawyer','huhuhuh','8 years','Badge Badge','2026-05-05 02:46:27','2026-05-05 02:47:18',1,'certificates/P9wNeBwSYqH0LsPZcjskcbhCNj3nh5XZqbJxyBAV.pdf',NULL,NULL,NULL,NULL),(7,16,'Divorce Lawyer','Hi I am Zubair','8 years','Malda','2026-05-05 03:32:02','2026-05-05 03:48:51',1,'certificates/TSiPkj3AihUBX39uoXoM54vIXBMwqYl2Q4wFZKN6.pdf',NULL,NULL,NULL,NULL),(9,17,'Criminal Lawyer','I am lawyer','2 years','Chennai','2026-05-05 03:47:55','2026-05-05 03:48:34',1,'certificates/je8UCUVtZkWftvQmyVanFWBjClyOwwUwV17mbhg8.pdf',NULL,NULL,NULL,NULL),(10,21,'Civil Lawyer','Civil litigation advocate experienced in land disputes, property partition suits, contract disputes, and consumer protection cases in district and high courts.','7 years','Barrackpore','2026-05-07 07:39:14','2026-05-07 07:48:41',1,'certificates/4ymVtbjw8pculcNogenpgOlTHOYEp6c3dwKH10Ox.pdf','lawyers/jV0zFf8RtD8quNXsKpSXynuxkyifjt2C4Y0tBLpp.jpg','WB/2788/2017','LLB','Court Road, Barrackpore, West Bengal');
/*!40000 ALTER TABLE `lawyers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_20_161617_add_role_to_users_table',2),(5,'2026_04_20_173606_create_lawyers_table',3),(6,'2026_04_20_181150_create_bookings_table',4),(7,'2026_04_25_044413_add_approved_to_lawyers_table',5),(8,'2026_04_26_070128_add_profile_fields_to_users_table',6),(9,'2026_05_05_035331_add_certificate_to_lawyers_table',7),(10,'2026_05_07_121528_add_extra_fields_to_lawyers_table',8),(11,'2026_05_07_135409_add_appointment_fields_to_bookings_table',9),(12,'2026_05_07_161025_create_case_histories_table',10),(13,'2026_05_08_084805_create_reviews_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('samyakghosh43@gmail.com','$2y$12$tPk5EDbmcCzffwBR6AcYReraUaVQN4ckyyj1b/xVWkzuYeLWlYMa6','2026-05-09 00:54:31');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `lawyer_id` bigint unsigned NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_lawyer_id_foreign` (`lawyer_id`),
  CONSTRAINT `reviews_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,4,10,5,'Good','2026-05-08 04:18:06','2026-05-08 04:18:06');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('2AOCz1TQvDL9la3S1uvQsUF7jl2dTpxGAlawAn65',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVJwOUoyanB6bU9oYzNad1FYbzAxMlJTaUNISVRVUEVXREJEb1o2VyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/bG9jYXRpb249Q2hlbm5haSZzcGVjaWFsaXphdGlvbj1DcmltaW5hbCUyMExhd3llciI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1778496739),('bMmtv8774cj2AQnh3ZlAqw0nvlWgR19DShISpIe5',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDc2eHJ2MnVyTVQzY1F0UUxVdEpaNHpJME9Vb1FaY1AxQnlYWHk4aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/bG9jYXRpb249S29sa2F0YSZzcGVjaWFsaXphdGlvbj0iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fX0=',1778310788),('ffcRDovviPYsnUlHLOF7LV2K73rAZLgnVKB4ySOK',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFVlbGRxd1ZNbFNsc3ZLcHlPWkx2U2JocVhZV1BSVG9zUFpKanNSRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1779957834),('kkqoJTpVi47QLzrBclQb82872xMJUpyxbHANn1V6',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.119.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1dyVG1OT200dlpEMUlWcG9IbTRMWmVQMlVPVlp0dGp4ejdQUzRUYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1779957821),('qa3XxHhAlsm9RhevQJMYBzDUVEvDnn8OtHm7Ssar',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmoxUlRhYkVadXhoelFwcWx6OHVJUDZKM1BYUUxPcTFPdmhMc2sydCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==',1779958281),('rHVSeviKdDW7uIVmtve8RXcTkhW8X2xa7VQzxupG',7,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnA2UTJmWlpYQ3N2b2RhMlB3WDFkVGxvdUdLYjhnNlo2eXRGa01XQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==',1778308264);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Samyak Ghosh','samyakghosh43@gmail.com',NULL,'$2y$12$4pvMWPfP/xID8lCQhJG1T.AxMX3pV.xSoddq325FbXJdZIT.4P3C2','ub3y95IsYGyAvWazzMiLHO578zXdgpWQYaB5qCkSBT1BtYYgNX9KXWi4U8KJ','2026-04-20 10:59:09','2026-05-07 11:20:30','customer','8910247269','317 JGR Kolkata','profiles/iBWvVEqnFOL33T3SNKRH6ibDVWl0sHFwTFEygFTq.jpg'),(2,'Ankita Baul','ankitabaul2003@gmail.com',NULL,'$2y$12$n11endw8T3ckEgaN4ieeM.zNualWLhFEfv6ulJLrbK11QizjTSEP6','CoZ9qsXHPtVl8pLP25yiPWX2pUuiMX24MjGVDy3t8xF9CcfQU8FeKHwujbtG','2026-04-20 11:00:16','2026-05-06 23:45:08','lawyer',NULL,NULL,NULL),(4,'samy','samy@gmail.com',NULL,'$2y$12$UyJckRbKgL8V.29hMKbUA.uSSjPEh/vnFRD3Ou6vNcQtJqNbv4lJm',NULL,'2026-04-23 02:09:18','2026-04-23 02:09:18','customer',NULL,NULL,NULL),(5,'anki','anki@gmail.com',NULL,'$2y$12$deEQ5.OYz.bE0heqwvQFc.euv1YP..TxFH9zvzfeKK4mG/r6P57TS',NULL,'2026-04-23 03:12:48','2026-04-23 03:12:48','customer',NULL,NULL,NULL),(6,'soumik','soumik@gmail.com',NULL,'$2y$12$/uWa3d68p.3VWtq7fgHyc.6sEVObqzlsROw5NbSNRxMwb6ljOJW7y',NULL,'2026-04-23 23:05:19','2026-04-23 23:05:19','customer',NULL,NULL,NULL),(7,'Admin','admin@lawsync.com',NULL,'$2y$12$8QpXGwSMqehsT5Kv0EsIk..88fGpgKBD1FOVQSAFoKtEaeBVK8ZFK',NULL,'2026-04-24 23:00:01','2026-04-24 23:04:02','admin',NULL,NULL,NULL),(8,'pratima','pratima@gmail.com',NULL,'$2y$12$J/yNjgDX8spvHnb.AOjMIuYvlUiD4JGlv1E4ejq851hK23tnD7HiS',NULL,'2026-04-24 23:20:55','2026-04-24 23:20:55','lawyer',NULL,NULL,NULL),(9,'pratima','pratimabaul@gmail.com',NULL,'$2y$12$KoSNjjRqUfDkl70zS4orU.lrEx.qmZZjjBGW4uEAVeNoyKVnGTef2',NULL,'2026-04-24 23:49:57','2026-04-24 23:49:57','lawyer',NULL,NULL,NULL),(10,'Samyak Ghosh','sg@gmail.com',NULL,'$2y$12$ojm9ikQ8S6NGm7TRdwGf4OAWVfIJ9nMUMpKYOu9HLQqAahBVPW7SO',NULL,'2026-04-26 00:36:16','2026-04-26 00:36:16','lawyer',NULL,NULL,NULL),(11,'Sohon Nandi','sohon@gmail.com',NULL,'$2y$12$0ifaYmvIvdeQA3CsDV70RuDq11IAsUFQxMzgXsxMg2Tf7xu/O/dJi',NULL,'2026-04-28 03:49:07','2026-04-28 03:49:07','customer',NULL,NULL,NULL),(12,'Suresh Raina','suresh@gmail.com',NULL,'$2y$12$XSSJJz4XbOucvW3I0Xz5hezPlofwr//mvyUtl3a4neMLzp16FLpCy',NULL,'2026-04-28 03:56:31','2026-04-28 03:56:31','customer',NULL,NULL,NULL),(13,'Aniket','aniket@gmail.com',NULL,'$2y$12$tUAMSijncWqCIrvcRZRYuePTl7tcuQI/yc71uP/OKO4OPSdRbxJoa',NULL,'2026-04-28 04:08:23','2026-04-28 04:08:23','customer',NULL,NULL,NULL),(14,'Amal','amal@gmail.com',NULL,'$2y$12$tmgucF6wiSEJzxDglWyD1.ujIckAxGxrGPOXY/ciQ/95B5gnPu2aq',NULL,'2026-04-29 07:23:26','2026-04-29 07:23:26','customer',NULL,NULL,NULL),(15,'Anit','anit@gmail.com',NULL,'$2y$12$0xemMz8r7zb9KayflsV5Auadph2J7knJ.buIgUAILUqDWmaJdbgvq',NULL,'2026-05-05 02:44:39','2026-05-05 02:44:39','lawyer',NULL,NULL,NULL),(16,'Zubair','zubair@gmail.com',NULL,'$2y$12$cOo9CB/XM0OW1IkV6JWjtOnhGd8lt.k2uvUxKueCzdN31OWNIEsP6',NULL,'2026-05-05 03:31:09','2026-05-05 03:31:09','lawyer',NULL,NULL,NULL),(17,'Aninda','aninda@gmail.com',NULL,'$2y$12$GO4R6mplWRtR7TLpSBJPxuvTeNFt9O/O2JUIfd44vMSh/IlxApXAu',NULL,'2026-05-05 03:47:11','2026-05-05 03:47:11','lawyer',NULL,NULL,NULL),(18,'Tapas','tapaspal3245@gmail.com',NULL,'$2y$12$xtE0B3DQlOcrWT6iTqNR.eCP3W6lJknK1zCjLKImJZUFIMoHAlSxK',NULL,'2026-05-06 23:58:24','2026-05-06 23:58:24','customer',NULL,NULL,NULL),(19,'Saumitra','sau.tknr@gmail.com',NULL,'$2y$12$Ps/Qg3qgoSGCTUgSpI9hu.zt/fljHZubuYMJTYdnzvxUoqoyoY2SG',NULL,'2026-05-07 00:03:32','2026-05-07 00:03:32','customer',NULL,NULL,NULL),(20,'Harish','harish@gmail.com',NULL,'$2y$12$cxBvsH6nVfunPIFIj0KGCOvgr3zYaHqZ0nJxTgtwEew6FynDB2ze2',NULL,'2026-05-07 07:04:27','2026-05-07 07:04:27','lawyer',NULL,NULL,NULL),(21,'Sudhar','samygamerpubg@gmail.com',NULL,'$2y$12$h7V98cZXMwDLjCuaFm3R4umCnNBNGz8CvQVgq8Xys5bj2c9VaBfMe',NULL,'2026-05-07 07:28:02','2026-05-07 07:28:02','lawyer',NULL,NULL,NULL),(22,'Samyak','samyak@yopmail.com','2026-05-09 00:57:37','$2y$12$cnfmejhs2zffL6CM6rXrdu6Zx3c8YfmFrX2hdcPjh6MmIlabK.4sS',NULL,'2026-05-09 00:57:10','2026-05-09 00:57:37','customer',NULL,NULL,NULL);
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

-- Dump completed on 2026-05-28 14:54:48
