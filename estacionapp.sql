-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: estacionapp
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `alquileres`
--

DROP TABLE IF EXISTS `alquileres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alquileres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idEspacio` int(10) unsigned NOT NULL,
  `idVehiculo` int(10) unsigned NOT NULL,
  `fechaComienzoAlquiler` datetime NOT NULL,
  `fechaFinAlquiler` datetime NOT NULL,
  `precioPorMinutoConDesc` decimal(6,2) NOT NULL,
  `precioFinal` decimal(6,2) NOT NULL,
  `rating` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alquileres_idespacio_foreign` (`idEspacio`),
  KEY `alquileres_idvehiculo_foreign` (`idVehiculo`),
  CONSTRAINT `alquileres_idespacio_foreign` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`),
  CONSTRAINT `alquileres_idvehiculo_foreign` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquileres`
--

LOCK TABLES `alquileres` WRITE;
/*!40000 ALTER TABLE `alquileres` DISABLE KEYS */;
/*!40000 ALTER TABLE `alquileres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacios`
--

DROP TABLE IF EXISTS `espacios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idUser` int(10) unsigned NOT NULL,
  `direccion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dpto` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoEspacio` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantAutos` int(10) unsigned DEFAULT NULL,
  `cantMotos` int(10) unsigned DEFAULT NULL,
  `cantBicicletas` int(10) unsigned DEFAULT NULL,
  `aptoDiscapacitados` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aptoElectricos` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `infopublica` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `infoprivada` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estadiaMinimaMinutos` int(10) unsigned DEFAULT NULL,
  `estadiaMaximaMinutos` int(10) unsigned DEFAULT NULL,
  `anticipacionMinutos` int(10) unsigned DEFAULT NULL,
  `precioAutosMinuto` decimal(6,2) unsigned DEFAULT NULL,
  `precioMotosMinuto` decimal(6,2) unsigned DEFAULT NULL,
  `precioBicicletasMinuto` decimal(6,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `espacios_iduser_foreign` (`idUser`),
  CONSTRAINT `espacios_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios`
--

LOCK TABLES `espacios` WRITE;
/*!40000 ALTER TABLE `espacios` DISABLE KEYS */;
INSERT INTO `espacios` VALUES (1,'2017-12-27 17:56:24','2017-12-27 17:56:24',NULL,1,'Scalabrini Ortiz 1010','4B','Argentina','Ciudad de Buenos Aires','CABA','1000','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,'Cochera en edificio ubicada a metros de un McDonald\'s','Mi departamento es 4B',NULL,NULL,NULL,NULL,NULL,NULL),(2,'2017-12-27 17:58:27','2017-12-27 17:58:27',NULL,1,'Scalabrini Ortiz 1010','4B','Argentina','Ciudad de Buenos Aires','CABA','1000','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,'Cochera en edificio ubicada a metros de un McDonald\'s','Mi departamento es 4B',NULL,NULL,NULL,NULL,NULL,NULL),(3,'2017-12-27 17:59:59','2017-12-27 18:03:11',NULL,1,'Scalabrini Ortiz 1010','4B','Argentina','Ciudad de Buenos Aires','CABA','1000','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,'Cochera en edificio ubicado a metros de un McDonald\'s','Mi departamento es el 4B',15,360,15,0.75,0.75,0.75);
/*!40000 ALTER TABLE `espacios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacios_descuentos`
--

DROP TABLE IF EXISTS `espacios_descuentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacios_descuentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idEspacio` int(10) unsigned NOT NULL,
  `tipoVehiculo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` int(11) NOT NULL,
  `descuento` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `espacios_descuentos_idespacio_foreign` (`idEspacio`),
  CONSTRAINT `espacios_descuentos_idespacio_foreign` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_descuentos`
--

LOCK TABLES `espacios_descuentos` WRITE;
/*!40000 ALTER TABLE `espacios_descuentos` DISABLE KEYS */;
INSERT INTO `espacios_descuentos` VALUES (1,'2017-12-27 18:05:03','2017-12-27 18:05:43',NULL,3,'Todos',1,0.20),(2,'2017-12-27 18:05:03','2017-12-27 18:05:03',NULL,3,'Todos',6,0.35),(3,'2017-12-27 18:05:03','2017-12-27 18:05:43',NULL,3,'Todos',24,0.70);
/*!40000 ALTER TABLE `espacios_descuentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacios_diasyhorarios`
--

DROP TABLE IF EXISTS `espacios_diasyhorarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacios_diasyhorarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idEspacio` int(10) unsigned NOT NULL,
  `dia` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaComienzo` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaFin` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `espacios_diasyhorarios_idespacio_foreign` (`idEspacio`),
  CONSTRAINT `espacios_diasyhorarios_idespacio_foreign` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_diasyhorarios`
--

LOCK TABLES `espacios_diasyhorarios` WRITE;
/*!40000 ALTER TABLE `espacios_diasyhorarios` DISABLE KEYS */;
INSERT INTO `espacios_diasyhorarios` VALUES (1,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Lunes','0','0'),(2,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Martes','0','0'),(3,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Miércoles','0','0'),(4,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Jueves','0','0'),(5,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Viernes','0','0'),(6,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Sábado','0','0'),(7,'2017-12-27 18:02:53','2017-12-27 18:02:53',NULL,3,'Domingo','480','1200');
/*!40000 ALTER TABLE `espacios_diasyhorarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacios_fotos`
--

DROP TABLE IF EXISTS `espacios_fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacios_fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idEspacio` int(10) unsigned NOT NULL,
  `photoname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `espacios_fotos_idespacio_foreign` (`idEspacio`),
  CONSTRAINT `espacios_fotos_idespacio_foreign` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_fotos`
--

LOCK TABLES `espacios_fotos` WRITE;
/*!40000 ALTER TABLE `espacios_fotos` DISABLE KEYS */;
INSERT INTO `espacios_fotos` VALUES (1,'2017-12-27 17:56:24','2017-12-27 17:56:24',1,'1-1.jpeg'),(2,'2017-12-27 17:58:27','2017-12-27 17:58:27',2,'2-1.jpeg'),(3,'2017-12-27 17:59:59','2017-12-27 17:59:59',3,'3-1.jpeg');
/*!40000 ALTER TABLE `espacios_fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2017_11_27_185000_create_espacios_table',1),(16,'2017_11_27_205640_create_diasyhorarios_espacios_table',1),(17,'2017_11_28_190432_create_espacios_fotos_table',1),(18,'2017_12_01_193149_create_espacios_descuentos_table',1),(19,'2017_12_09_153817_create_vehiculos_table',1),(20,'2017_12_27_142405_create_alquileres_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DNI` int(10) unsigned DEFAULT NULL,
  `profilePic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'2017-12-27 17:54:01','2017-12-27 17:54:01',NULL,'Joaquín','Paños','09-08-1994','joaquin@test.com','$2y$10$9H5VgTJ8TbA4knZ6lSuekeKgnBEo24pQg2393Z5T2urJUliseUIvu','myhNGP5FBuCoYVhy2W3uOBvgFHjW4MzLKgqjoJv5kXt1hfDfQ05es3KbnXlI',NULL,NULL,NULL,NULL,'joaquin@test.com_profilePic.jpeg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `idUser` int(10) unsigned NOT NULL,
  `tipoVehiculo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patente` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehiculos_iduser_foreign` (`idUser`),
  CONSTRAINT `vehiculos_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,'2017-12-27 17:54:35','2017-12-27 17:54:35',NULL,1,'Automovil','HONDA','CRV','Rojo','ABB100');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-27 12:09:21
