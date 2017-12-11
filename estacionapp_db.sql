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
  `idEspacio` int(10) unsigned NOT NULL,
  `idVehiculo` int(10) unsigned NOT NULL,
  `idUserLocatario` int(10) unsigned NOT NULL,
  `fechaComienzoAlquiler` datetime NOT NULL,
  `fechaFinAlquiler` datetime NOT NULL,
  `precioPorMinutoConDesc` decimal(6,2) unsigned NOT NULL,
  `monto` decimal(8,2) unsigned NOT NULL,
  `rating` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEspacioAlquiler_idx` (`idEspacio`),
  KEY `idVehiculoAlquiler_idx` (`idVehiculo`),
  KEY `idUserLocatarioAlquiler_idx` (`idUserLocatario`),
  CONSTRAINT `idEspacioAlquiler` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`),
  CONSTRAINT `idUserLocatarioAlquiler` FOREIGN KEY (`idUserLocatario`) REFERENCES `users` (`id`),
  CONSTRAINT `idVehiculoAlquiler` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `idUser` int(10) unsigned NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `dpto` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `tipoEspacio` varchar(45) DEFAULT NULL,
  `cantAutos` int(10) unsigned DEFAULT NULL,
  `cantMotos` int(10) unsigned DEFAULT NULL,
  `cantBicicletas` int(10) unsigned DEFAULT NULL,
  `aptoDiscapacitados` varchar(45) DEFAULT NULL,
  `aptoElectricos` varchar(45) DEFAULT NULL,
  `infopublica` varchar(250) DEFAULT NULL,
  `infoprivada` varchar(250) DEFAULT NULL,
  `estadiaMinimaMinutos` int(10) unsigned DEFAULT NULL,
  `estadiaMaximaMinutos` int(10) unsigned DEFAULT NULL,
  `anticipacionMinutos` int(10) unsigned DEFAULT NULL,
  `precioAutosMinuto` decimal(6,2) unsigned DEFAULT NULL,
  `precioMotosMinuto` decimal(6,2) unsigned DEFAULT NULL,
  `precioBicicletasMinuto` decimal(6,2) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  `location` point DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `_idx` (`idUser`),
  CONSTRAINT `` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios`
--

LOCK TABLES `espacios` WRITE;
/*!40000 ALTER TABLE `espacios` DISABLE KEYS */;
INSERT INTO `espacios` VALUES (1,10,'Tu Calle 223',NULL,'Argentina','CABA','ciudad','1100','Cochera Privada',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-12-02 18:41:12.101807','2017-12-02 21:41:12.000000',NULL,NULL),(2,9,'Argentina 7','9','Argentina','Buenos Aires','ciudad','1100','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-12-02 21:36:30.000000','2017-12-02 21:36:30.000000',NULL,NULL),(3,9,'Avenida Belgrano 822','3B','Argentina','CABA','ciudad','1090','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,NULL,NULL,30,180,15,1.20,1.20,1.20,'2017-12-09 22:12:47.630051','2017-12-10 01:12:47.000000',NULL,NULL),(5,9,'Calle de Prueba 1291',NULL,'Argentina','Buenos Aires','ciudad','9999','Cochera Privada',1,2,2,'Apto para Discapacitados',NULL,'Solamente estoy probando cargar una cochera.','Nada importante.',30,360,30,1.00,1.00,1.00,'2017-12-06 19:30:15.806358','2017-12-06 22:30:15.000000',NULL,NULL),(7,11,'Calle Falsa 123',NULL,'Argentina','Buenos Aires','ciudad','1111','Cochera Privada',1,0,0,'Apto para Discapacitados','Apto para Electricos',NULL,NULL,15,240,15,1.00,1.00,1.00,'2017-12-07 02:31:34.833303','2017-12-07 05:31:34.000000',NULL,NULL);
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
  `idEspacio` int(10) unsigned NOT NULL,
  `tipoVehiculo` varchar(45) NOT NULL,
  `hora` int(10) unsigned NOT NULL,
  `descuento` decimal(3,2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEspacioDesc_idx` (`idEspacio`),
  KEY `idEspacioDescuentos_idx` (`idEspacio`),
  CONSTRAINT `idEspacioDesc` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idEspacioDescuentos` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_descuentos`
--

LOCK TABLES `espacios_descuentos` WRITE;
/*!40000 ALTER TABLE `espacios_descuentos` DISABLE KEYS */;
INSERT INTO `espacios_descuentos` VALUES (1,3,'Todos',1,0.30,'2017-12-10 04:19:38.274858','2017-12-10 07:19:38.000000',NULL),(2,3,'Todos',6,0.35,'2017-12-09 21:51:46.693008','2017-12-10 00:51:46.000000',NULL),(3,3,'Todos',24,0.65,'2017-12-09 21:51:46.696012','2017-12-10 00:51:46.000000',NULL),(7,5,'Todos',1,0.20,'2017-12-06 22:30:15.000000','2017-12-06 22:30:15.000000',NULL),(8,5,'Todos',6,0.40,'2017-12-06 22:30:15.000000','2017-12-06 22:30:15.000000',NULL),(9,5,'Todos',24,0.80,'2017-12-06 22:30:15.000000','2017-12-06 22:30:15.000000',NULL),(13,7,'Todos',1,0.20,'2017-12-07 05:31:34.000000','2017-12-07 05:31:34.000000',NULL),(14,7,'Todos',6,0.35,'2017-12-07 05:31:34.000000','2017-12-07 05:31:34.000000',NULL),(15,7,'Todos',24,0.70,'2017-12-07 05:31:34.000000','2017-12-07 05:31:34.000000',NULL);
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
  `idEspacio` int(10) unsigned NOT NULL,
  `dia` varchar(45) NOT NULL,
  `horaComienzo` varchar(5) NOT NULL,
  `horaFin` varchar(5) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEspacio_idx` (`idEspacio`),
  CONSTRAINT `idEspacio` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_diasyhorarios`
--

LOCK TABLES `espacios_diasyhorarios` WRITE;
/*!40000 ALTER TABLE `espacios_diasyhorarios` DISABLE KEYS */;
INSERT INTO `espacios_diasyhorarios` VALUES (1,3,'Lunes','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(2,3,'Martes','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(3,3,'Miércoles','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(4,3,'Jueves','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(5,3,'Viernes','1200','1410','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(6,3,'Sábado','600','1200','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(7,3,'Domingo','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(15,5,'Lunes','1080','1260','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(16,5,'Martes','1140','1260','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(17,5,'Miércoles','0','0','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(18,5,'Jueves','1200','1380','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(19,5,'Viernes','900','1260','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(20,5,'Sábado','0','0','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(21,5,'Domingo','0','0','2017-12-06 22:21:22.000000','2017-12-06 22:21:22.000000',NULL),(29,7,'Lunes','0','0','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL),(30,7,'Martes','1140','1290','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL),(31,7,'Miércoles','0','0','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL),(32,7,'Jueves','0','0','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL),(33,7,'Viernes','0','0','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL),(34,7,'Sábado','1200','1380','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL),(35,7,'Domingo','600','840','2017-12-07 05:31:19.000000','2017-12-07 05:31:19.000000',NULL);
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
  `idEspacio` int(10) unsigned NOT NULL,
  `photoname` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`id`),
  KEY `idFotoEspacio_idx` (`idEspacio`),
  CONSTRAINT `idFotoEspacio` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_fotos`
--

LOCK TABLES `espacios_fotos` WRITE;
/*!40000 ALTER TABLE `espacios_fotos` DISABLE KEYS */;
INSERT INTO `espacios_fotos` VALUES (1,1,'1-1.jpeg','2017-12-02 06:07:47.000000','2017-12-02 06:07:47.000000'),(2,2,'2-1.jpeg','2017-12-02 21:36:30.000000','2017-12-02 21:36:30.000000'),(3,1,'1-1.jpeg','2017-12-02 21:41:12.000000','2017-12-02 21:41:12.000000'),(9,3,'3-1.jpeg','2017-12-06 00:38:12.000000','2017-12-06 00:38:12.000000'),(11,3,'3-3.jpeg','2017-12-06 05:54:58.000000','2017-12-06 05:54:58.000000'),(12,5,'5-1.jpeg','2017-12-06 22:14:44.000000','2017-12-06 22:14:44.000000');
/*!40000 ALTER TABLE `espacios_fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `domicilio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` point NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6,'2017_12_03_023306_create_locations_table',1),(7,'2017_12_10_204858_agrega_latlng_a_espacios',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthDate` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `phoneNumber` varchar(25) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `profilePic` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phoneNumber_UNIQUE` (`phoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mariano','alvarez','0000-00-00','mariano@estacionar.com','$2y$10$gd.TFxgFCQX.ZKxAjRuSJuOAhq8UhXFCIKzaLVL7tubwf/5s/x9ku','o8KW51yW00uRZFAeTshLvIbs3HQWqyOXx3pVaJyAXAOFkNwohS01pmWCBVwq','2017-11-27 20:18:06.122381',NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00.000000',NULL),(9,'test1','test1','09-09-1999','test1@test1.com','$2y$10$zWV/yRV7iUArH7LZYR5PQeWWfvD0QDmKAClvqkvIkhoe2canD7RCK','MSsTeRyyDltxzAWmIL6ZACeRrfofO1uiALadsMb95Z2ZTaDtoI8GvvO3zR9L','2017-12-07 02:19:55.045658',NULL,NULL,NULL,NULL,'test1@test1.com_profilePic.jpeg','2017-12-02 01:57:53.000000',NULL),(10,'Joaquín','Paños','09-08-1994','joaquin@estacionar.com','$2y$10$PakmmZWLQWW7yfTJBQLGPeSAngGMKLNhgLuJK2szKnLcyef4fvSzG',NULL,'2017-12-02 06:05:36.000000',NULL,NULL,NULL,NULL,'joaquin@estacionar.com_profilePic.jpeg','2017-12-02 06:05:36.000000',NULL),(11,'Test2','Test2','09-09-1999','test2@test2.com','$2y$10$a8fTVkDHYfQgis20FxFjiuEftK9mbcOh73luOMNmynEscQBM99DEy','vedC8PpWTlx205V7Fp4ObQfY564BMVGzaSDApqGkBmQ0I1Ne937HvaHAjjMr','2017-12-06 23:25:03.079852',NULL,NULL,NULL,NULL,'test2@test2.com_profilePic.jpeg','2017-12-07 00:34:41.000000',NULL);
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
  `tipoVehiculo` varchar(20) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `color` varchar(45) NOT NULL,
  `patente` varchar(10) DEFAULT NULL,
  `idUser` int(10) unsigned NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,'Automovil','16','Fit','Gris','ABA199',9,'2017-12-10 21:38:42.082533','2017-12-11 00:38:42.000000','2017-12-11 00:38:42.000000'),(2,'Automovil','14','500','Gris','AAA999',9,'2017-12-11 01:07:59.000000','2017-12-11 01:07:59.000000',NULL);
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

-- Dump completed on 2017-12-11  1:21:03
