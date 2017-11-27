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
-- Table structure for table `descuentos_espacios`
--

DROP TABLE IF EXISTS `descuentos_espacios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `descuentos_espacios` (
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
  CONSTRAINT `idEspacioDesc` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descuentos_espacios`
--

LOCK TABLES `descuentos_espacios` WRITE;
/*!40000 ALTER TABLE `descuentos_espacios` DISABLE KEYS */;
/*!40000 ALTER TABLE `descuentos_espacios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diasyhorarios_espacios`
--

DROP TABLE IF EXISTS `diasyhorarios_espacios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diasyhorarios_espacios` (
  `id` int(10) unsigned NOT NULL,
  `idEspacio` int(10) unsigned NOT NULL,
  `dia` varchar(45) NOT NULL,
  `horaComienzo` time NOT NULL,
  `horaFin` time NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEspacio_idx` (`idEspacio`),
  CONSTRAINT `idEspacio` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diasyhorarios_espacios`
--

LOCK TABLES `diasyhorarios_espacios` WRITE;
/*!40000 ALTER TABLE `diasyhorarios_espacios` DISABLE KEYS */;
/*!40000 ALTER TABLE `diasyhorarios_espacios` ENABLE KEYS */;
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
  `cantBicis` int(10) unsigned DEFAULT NULL,
  `aptoDiscapacitados` varchar(2) DEFAULT NULL,
  `aptoElectricos` varchar(2) DEFAULT NULL,
  `infopublica` varchar(250) DEFAULT NULL,
  `infoprivada` varchar(250) DEFAULT NULL,
  `estadiaMinima` int(10) unsigned DEFAULT NULL,
  `estadiaMaxima` int(10) unsigned DEFAULT NULL,
  `anticipacion` int(10) unsigned DEFAULT NULL,
  `precioAutosMinuto` decimal(6,2) unsigned DEFAULT NULL,
  `precioMotosMinuto` decimal(6,2) unsigned DEFAULT NULL,
  `precioBicisMinuto` decimal(6,2) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `_idx` (`idUser`),
  CONSTRAINT `` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios`
--

LOCK TABLES `espacios` WRITE;
/*!40000 ALTER TABLE `espacios` DISABLE KEYS */;
/*!40000 ALTER TABLE `espacios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacios_fotos`
--

DROP TABLE IF EXISTS `espacios_fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacios_fotos` (
  `id` int(10) unsigned NOT NULL,
  `photoname` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  KEY `idEspacioFoto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacios_fotos`
--

LOCK TABLES `espacios_fotos` WRITE;
/*!40000 ALTER TABLE `espacios_fotos` DISABLE KEYS */;
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
  `birthDate` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mariano','alvarez','0000-00-00','mariano@estacionar.com','$2y$10$gd.TFxgFCQX.ZKxAjRuSJuOAhq8UhXFCIKzaLVL7tubwf/5s/x9ku',NULL,'2017-11-21 20:04:13.673634',NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00.000000',NULL),(5,'joaco','joaco','0000-00-00','joaquin@estacionar.com','$2y$10$k/TnVRV4VW0zwMvE7Ntp5.mKLgznAIpAr0TKc5kCpk8T00IhqcLC2','AvDI05inlMwRXELxM5IqJATZxsWFG2nxSBiL1gguDOXASop0nbIdfcq6uuEA','2017-11-24 00:51:34.216881',NULL,NULL,NULL,NULL,NULL,'2017-11-24 01:51:09.000000',NULL);
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

-- Dump completed on 2017-11-26 22:28:31
