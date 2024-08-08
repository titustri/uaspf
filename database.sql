-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: kasir
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `barang_id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `stock` int NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'Minyak Goreng 1LT',15000,10,'minyak.jpg'),(2,'Mie Goreng Indomie',2500,30,'indomie.jpg'),(3,'Air Mineral 600ML',3500,30,'lemineral.jpg'),(4,'Permen Asem',16000,25,'permen.jpg'),(5,'Tisu Basah Mitu',6700,23,'mitu.jpg'),(6,'Tissu Kering',22000,23,'nice.jpg'),(7,'Tissu Toilet',16000,12,'paseo.jpg'),(8,'Paracetamol',5500,34,'paracetamol.jpg'),(9,'Saos Tiram',5300,33,'saos.jpg');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Bukan Member','085735633257','2024-08-03 01:08:45'),(2,'irfan','085743527863','2024-08-03 01:08:45'),(3,'nofiana','085764578987','2024-08-03 01:09:00');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_transaksi`
--

DROP TABLE IF EXISTS `detail_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_transaksi` (
  `detail_transaksi_id` int NOT NULL AUTO_INCREMENT,
  `transaksi_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `jumlah_satuan` int NOT NULL,
  `total_harga` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`detail_transaksi_id`),
  UNIQUE KEY `id` (`detail_transaksi_id`),
  KEY `detail_transaksi_id` (`detail_transaksi_id`),
  KEY `barang_id` (`barang_id`),
  KEY `detail_transaksi_id_2` (`detail_transaksi_id`),
  KEY `transaksi_id` (`transaksi_id`),
  CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_transaksi`
--

LOCK TABLES `detail_transaksi` WRITE;
/*!40000 ALTER TABLE `detail_transaksi` DISABLE KEYS */;
INSERT INTO `detail_transaksi` VALUES (1,1,2,10,25000,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,2,5,12500,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,4,2,12000,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,8,3,23000,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,5,7,3,23000,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,5,5,2,13400,'2024-08-08 03:26:44','2024-08-08 03:26:44'),(15,5,1,1,15000,'2024-08-08 04:05:32','2024-08-08 04:05:32'),(16,5,6,3,66000,'2024-08-08 04:05:40','2024-08-08 04:05:40'),(17,5,2,3,7500,'2024-08-08 04:18:49','2024-08-08 04:18:49'),(23,5,1,1,15000,'2024-08-08 05:36:26','2024-08-08 05:36:26'),(24,9,1,3,45000,'2024-08-08 06:12:07','2024-08-08 06:12:07'),(25,9,2,0,0,'2024-08-08 06:13:51','2024-08-08 06:13:51'),(26,9,2,0,0,'2024-08-08 06:14:17','2024-08-08 06:14:17'),(27,9,2,0,0,'2024-08-08 06:16:32','2024-08-08 06:16:32'),(28,9,2,0,0,'2024-08-08 06:16:57','2024-08-08 06:16:57'),(29,9,2,0,0,'2024-08-08 06:17:23','2024-08-08 06:17:23'),(30,9,3,0,0,'2024-08-08 06:17:45','2024-08-08 06:17:45'),(31,9,1,2,30000,'2024-08-08 06:17:50','2024-08-08 06:17:50'),(32,10,1,3,45000,'2024-08-08 06:18:08','2024-08-08 06:18:08'),(33,10,3,1,3500,'2024-08-08 06:18:14','2024-08-08 06:18:14'),(34,10,5,4,26800,'2024-08-08 06:18:22','2024-08-08 06:18:22'),(35,11,1,1,15000,'2024-08-08 06:27:12','2024-08-08 06:27:12'),(36,11,1,1,15000,'2024-08-08 06:27:17','2024-08-08 06:27:17'),(37,11,1,1,15000,'2024-08-08 06:27:21','2024-08-08 06:27:21'),(38,11,1,1,15000,'2024-08-08 06:27:22','2024-08-08 06:27:22'),(39,11,1,1,15000,'2024-08-08 06:27:25','2024-08-08 06:27:25'),(40,11,1,1,15000,'2024-08-08 06:27:28','2024-08-08 06:27:28'),(41,11,1,1,15000,'2024-08-08 06:27:31','2024-08-08 06:27:31'),(42,11,1,1,15000,'2024-08-08 06:27:33','2024-08-08 06:27:33'),(43,11,1,1,15000,'2024-08-08 06:27:35','2024-08-08 06:27:35'),(44,11,1,1,15000,'2024-08-08 06:29:24','2024-08-08 06:29:24'),(45,11,1,1,15000,'2024-08-08 06:29:51','2024-08-08 06:29:51'),(46,11,1,1,15000,'2024-08-08 06:30:13','2024-08-08 06:30:13'),(47,11,1,1,15000,'2024-08-08 06:30:48','2024-08-08 06:30:48'),(48,11,1,1,15000,'2024-08-08 06:32:15','2024-08-08 06:32:15'),(49,11,1,1,15000,'2024-08-08 06:33:19','2024-08-08 06:33:19');
/*!40000 ALTER TABLE `detail_transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi` (
  `transaksi_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_transaksi` int NOT NULL,
  `status` smallint NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaksi_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,1,'2024-08-03 01:10:17',50000,1,'0000-00-00 00:00:00'),(2,3,'2024-08-03 01:10:17',23000,1,'0000-00-00 00:00:00'),(3,2,'2024-08-03 01:10:30',5000,1,'0000-00-00 00:00:00'),(4,3,'2024-08-03 01:10:30',75000,1,'0000-00-00 00:00:00'),(5,3,'2024-08-03 07:49:51',139900,1,'2024-08-08 05:48:16'),(9,1,'2024-08-08 06:12:02',75000,1,'2024-08-08 06:17:55'),(10,1,'2024-08-08 06:18:04',75300,1,'2024-08-08 06:18:24'),(11,1,'2024-08-08 06:19:58',225000,1,'2024-08-08 06:35:27'),(16,1,'2024-08-08 06:59:16',0,0,'2024-08-08 06:59:16');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-08  7:13:08
