-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: db_mahasiswa
-- ------------------------------------------------------
-- Server version	8.0.46-0ubuntu0.24.04.5

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
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `program_studi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (3,'24781066','Az Zahra Juas Dinda Dinat','Manajemen Informatika','Bandar Lampung'),(4,'24781082','Putri Sari Rizkiyah','Manajemen Informatika','Lampung Selatan'),(10,'24781086','Rizqi Akbar','Manajemen Informatika','Sumatra Barat'),(12,'24781072','Fatir Kausar','Manajemen Informatika','Bandar Lampung'),(13,'24781076','M.Chaesar Abdullah','Manajemen Informatika','Bandar Lampung'),(14,'24781070','Eka Nursani','Manajemen Informatika','Bandar Lampung'),(15,'24781084','Riani Azzahra Saridewi','Manajemen Informatika','Bandar Lampung'),(16,'24781067','Citra Zainah','Manajemen Informatika','Bandar Lampung'),(17,'24781074','Imarotul Hafidzoh','Manajemen Informatika','Bandar Lampung'),(18,'24781081','Nur Aziza','Manajemen Informatika','Bandar Lampung'),(19,'24781087','Sania Karima','Manajemen Informatika','Bandar Lampung'),(20,'24781073','Gilang Ardyan Wijaya','Manajemen Informatika','Bandar Lampung'),(21,'24781083','Rasyida Messy Hidayat','Manajemen Informatika','Bandar Lampung'),(22,'24781068','Dede Aulya Ramadhan','Manajemen Informatika','Bandar Lampung'),(23,'24781078','M.Putara Meca Abzanro','Manajemen Informatika','Bandar Lampung'),(24,'24781063','Affan Fazle Mawla','Manajemen Informatika','Bandar Lampung'),(25,'24781112','Raffi Ramadhan Oktaviansyah','Manajemen Informatika','Bandar Lampung'),(26,'24781117','Silvia Nanda Agustin','Manajemen Informatika','Bandar Lampung'),(27,'24781120','Yayuk Febriat Praba','Manajemen Informatika','Bandar Lampung'),(28,'24781069','Devnis Arga Vanis Setiawan','Manajemen Informatika','Bandar Lampung'),(29,'24781092','Yuda Aditya Putra','Manajemen Informatika','Bandar Lampung'),(30,'24781088','Shofiyyah Nabila Putri','Manajemen Informatika','Bandar Lampung'),(31,'24781079','Nabilla Ramadhani','Manajemen Informatika','Bandar Lampung'),(32,'24781119','Tri Rizki Amelia','Manajemen Informatika','Bandar Lampung'),(33,'24781111','Nurul Aliya','Manajemen Informatika','Bandar Lampung'),(34,'24781109','Nadina Putri Khairani','Manajemen Informatika','Bandar Lampung'),(35,'24781122','Ahmad Aslamsyah Attoriq','Manajemen Informatika','Bandar Lampung'),(36,'24781110','Nandy Thaher Ulga','Manajemen Informatika','Bandar Lampung'),(37,'24781113','Refha Ardinata M.N.','Manajemen Informatika','Bandar Lampung'),(38,'24781115','Riski Amalia','Manajemen Informatika','Bandar Lampung'),(39,'24781116','Sarifah Elizabeth Simamora','Manajemen Informatika','Bandar Lampung');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-16 23:35:53
