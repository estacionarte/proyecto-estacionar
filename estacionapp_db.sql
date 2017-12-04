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
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `_idx` (`idUser`),
  CONSTRAINT `` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios`
--

LOCK TABLES `espacios` WRITE;
/*!40000 ALTER TABLE `espacios` DISABLE KEYS */;
INSERT INTO `espacios` VALUES (1,10,'Tu Calle 223',NULL,'Argentina','CABA','ciudad','1100','Cochera Privada',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-12-02 18:41:12.101807','2017-12-02 21:41:12.000000',NULL),(2,9,'Argentina 7','9','Argentina','Buenos Aires','ciudad','1100','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-12-02 21:36:30.000000','2017-12-02 21:36:30.000000',NULL),(3,9,'Avenida Belgrano 822','3B','Argentina','CABA','ciudad','1090','Cochera Privada',1,2,4,'Apto para Discapacitados',NULL,'Fácil acceso desde avenida.','Tocar timbre de departamento 3B y preguntar por Carlos.',20,330,15,1.00,1.00,1.00,'2017-12-04 04:32:26.156695','2017-12-04 01:59:15.000000',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_descuentos`
--

LOCK TABLES `espacios_descuentos` WRITE;
/*!40000 ALTER TABLE `espacios_descuentos` DISABLE KEYS */;
INSERT INTO `espacios_descuentos` VALUES (1,3,'Todos',1,0.20,'2017-12-04 01:59:15.000000','2017-12-04 01:59:15.000000',NULL),(2,3,'Todos',6,0.30,'2017-12-04 01:59:15.000000','2017-12-04 01:59:15.000000',NULL),(3,3,'Todos',24,0.60,'2017-12-04 01:59:15.000000','2017-12-04 01:59:15.000000',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_diasyhorarios`
--

LOCK TABLES `espacios_diasyhorarios` WRITE;
/*!40000 ALTER TABLE `espacios_diasyhorarios` DISABLE KEYS */;
INSERT INTO `espacios_diasyhorarios` VALUES (1,3,'Lunes','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(2,3,'Martes','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(3,3,'Miércoles','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(4,3,'Jueves','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(5,3,'Viernes','1200','1410','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(6,3,'Sábado','600','1200','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL),(7,3,'Domingo','0','0','2017-12-04 01:58:56.000000','2017-12-04 01:58:56.000000',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_fotos`
--

LOCK TABLES `espacios_fotos` WRITE;
/*!40000 ALTER TABLE `espacios_fotos` DISABLE KEYS */;
INSERT INTO `espacios_fotos` VALUES (1,1,'1-1.jpeg','2017-12-02 06:07:47.000000','2017-12-02 06:07:47.000000'),(2,2,'2-1.jpeg','2017-12-02 21:36:30.000000','2017-12-02 21:36:30.000000'),(3,1,'1-1.jpeg','2017-12-02 21:41:12.000000','2017-12-02 21:41:12.000000'),(4,3,'3-1.jpeg','2017-12-04 01:58:13.000000','2017-12-04 01:58:13.000000'),(5,3,'3-2.jpeg','2017-12-04 01:58:13.000000','2017-12-04 01:58:13.000000');
/*!40000 ALTER TABLE `espacios_fotos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mariano','alvarez','0000-00-00','mariano@estacionar.com','$2y$10$gd.TFxgFCQX.ZKxAjRuSJuOAhq8UhXFCIKzaLVL7tubwf/5s/x9ku','o8KW51yW00uRZFAeTshLvIbs3HQWqyOXx3pVaJyAXAOFkNwohS01pmWCBVwq','2017-11-27 20:18:06.122381',NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00.000000',NULL),(9,'test1','test1','09-09-1999','test1@test1.com','$2y$10$zWV/yRV7iUArH7LZYR5PQeWWfvD0QDmKAClvqkvIkhoe2canD7RCK',NULL,'2017-12-02 01:57:53.000000',NULL,NULL,NULL,NULL,'test1@test1.com_profilePic.jpeg','2017-12-02 01:57:53.000000',NULL),(10,'Joaquín','Paños','09-08-1994','joaquin@estacionar.com','$2y$10$PakmmZWLQWW7yfTJBQLGPeSAngGMKLNhgLuJK2szKnLcyef4fvSzG',NULL,'2017-12-02 06:05:36.000000',NULL,NULL,NULL,NULL,'joaquin@estacionar.com_profilePic.jpeg','2017-12-02 06:05:36.000000',NULL);
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
  `marca` varchar(45) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
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

-- Dump completed on 2017-12-04  2:19:32
