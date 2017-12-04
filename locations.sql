-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2017 at 12:04 AM
-- Server version: 5.7.20
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

CREATE DATABASE locations;
USE locations;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estacionapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `domicilio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` point DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created_at`, `updated_at`, `deleted_at`, `domicilio`, `barrio`, `location`) VALUES
(1, NULL, NULL, NULL, 'JUFRE 141', 'VILLA CRESPO', '\0\0\0\0\0\0\0�h\0o�LA��^)�7M�'),
(2, NULL, NULL, NULL, 'DIAZ VELEZ AV. y LOBOS, ELEODORO, Dr.', 'CABALLITO', '\0\0\0\0\0\0\0��ʡMA�\0o��7M�'),
(3, NULL, NULL, NULL, 'BALBIN, RICARDO, DR. AV. 4750', 'SAAVEDRA', '\0\0\0\0\0\0\0,e�XGA�9EGr�?M�'),
(4, NULL, NULL, NULL, 'DE MAYO AV. 591', 'MONSERRAT', '\0\0\0\0\0\0\0vq\r�MA�9EGr�/M�'),
(5, NULL, NULL, NULL, 'PELLEGRINI, CARLOS 200', 'SAN NICOLAS', '\0\0\0\0\0\0\0/�$�MA��m4��0M�'),
(6, NULL, NULL, NULL, 'DEL LIBERTADOR AV. y PUEYRREDON AV.', 'RECOLETA', '\0\0\0\0\0\0\0��\0�JA��c�Z2M�'),
(7, NULL, NULL, NULL, 'SALGUERO, JERONIMO 3400', 'PALERMO', '\0\0\0\0\0\0\0T㥛�HA�z�):�3M�'),
(8, NULL, NULL, NULL, 'TUCUMAN y TALCAHUANO', 'SAN NICOLAS', '\0\0\0\0\0\0\0�rh��LA�S��:1M�'),
(9, NULL, NULL, NULL, 'OBLIGADO RAFAEL, Av.Costanera 5700', 'BELGRANO', '\0\0\0\0\0\0\0h��|?EA����8M�'),
(10, NULL, NULL, NULL, 'ROCA, JULIO A., PRESIDENTE AV. y PERU', 'MONSERRAT', '\0\0\0\0\0\0\0�_vONA���#��/M�'),
(11, NULL, NULL, NULL, 'GARCIA, MARTIN AV. y DEFENSA', 'SAN TELMO', '\0\0\0\0\0\0\0\0�~�:PA�s��A/M�'),
(12, NULL, NULL, NULL, 'GAONA AV. y ALVAREZ, DONATO, Tte. Gral.', 'CABALLITO', '\0\0\0\0\0\0\0�lV}�NA��\r�0�:M�'),
(13, NULL, NULL, NULL, 'CALDERON DE LA BARCA, PEDRO 1500', 'MONTE CASTRO', '\0\0\0\0\0\0\0��6\ZPA�Tt$��@M�'),
(14, NULL, NULL, NULL, 'FERNANDEZ DE LA CRUZ, F., GRAL. AV. y ESCALADA AV.', 'VILLA SOLDATI', '\0\0\0\0\0\0\0�\\�C�UA�����9M�'),
(15, NULL, NULL, NULL, 'ROCA, CNEL. AV. 3400', 'VILLA SOLDATI', '\0\0\0\0\0\0\0<Nё\\VA��ܵ�|8M�'),
(16, NULL, NULL, NULL, 'USPALLATA y MONTEAGUDO', 'PARQUE PATRICIOS', '\0\0\0\0\0\0\0����QA���4M�'),
(17, NULL, NULL, NULL, 'USPALLATA 2200', 'PARQUE PATRICIOS', '\0\0\0\0\0\0\0`��"�QA���+e2M�'),
(18, NULL, NULL, NULL, 'ALCORTA, AMANCIO AV. y BAIGORRI', 'BARRACAS', '\0\0\0\0\0\0\07\Z�[ QA�o���T1M�'),
(19, NULL, NULL, NULL, 'DIRECTORIO AV. y LACARRA', 'PARQUE AVELLANEDA', '\0\0\0\0\0\0\0�����RA�!�lV=M�'),
(20, NULL, NULL, NULL, 'JUNIN y LOPEZ, VICENTE', 'RECOLETA', '\0\0\0\0\0\0\0l	��gKA���	h2M�'),
(21, NULL, NULL, NULL, 'DEL LIBERTADOR AV. y CALLAO AV.', 'RECOLETA', '\0\0\0\0\0\0\0&䃞�JA�aTR\'�1M�'),
(22, NULL, NULL, NULL, 'VUELTA DE OBLIGADO y JURAMENTO AV.', 'BELGRANO', '\0\0\0\0\0\0\0���GA�C��6:M�'),
(23, NULL, NULL, NULL, 'CORRIENTES AV. y 9 DE JULIO AV.', 'SAN NICOLAS', '\0\0\0\0\0\0\0��4�8MA���D�0M�'),
(24, NULL, NULL, NULL, 'SANTA FE AV. 3951', 'PALERMO', '\0\0\0\0\0\0\0�\r�0�JA���e�c5M�'),
(25, NULL, NULL, NULL, 'ROCA, CNEL. AV. y LARRAZABAL AV.', 'VILLA LUGANO', '\0\0\0\0\0\0\0jM�VA���� �:M�'),
(26, NULL, NULL, NULL, 'ROCA, CNEL. AV. 5200', 'VILLA RIACHUELO', '\0\0\0\0\0\0\0�k	��WA����3:M�'),
(27, NULL, NULL, NULL, 'PERON, EVA AV. y CURAPALIGUE', 'PARQUE CHACABUCO', '\0\0\0\0\0\0\0~8gDQA���{��8M�'),
(28, NULL, NULL, NULL, 'PAZ, GRAL. AV. y CANTILO, Int.', 'NUÃ‘EZ', '\0\0\0\0\0\0\0?5^�IDA��{��P;M�'),
(29, NULL, NULL, NULL, 'ASAMBLEA AV. y CURAPALIGUE AV.', 'PARQUE CHACABUCO', '\0\0\0\0\0\0\0���K7QA�bX9�8M�'),
(30, NULL, NULL, NULL, 'YRIGOYEN, HIPOLITO AV. y DEFENSA', 'MONSERRAT', '\0\0\0\0\0\0\0vq\r�MA���?�/M�'),
(31, NULL, NULL, NULL, 'CORRIENTES AV. y ARENAL, CONCEPCION', 'CHACARITA', '\0\0\0\0\0\0\0���ׁKA��l���9M�'),
(32, NULL, NULL, NULL, 'MAGALLANES y GARIBALDI', 'BOCA', '\0\0\0\0\0\0\0�*��QA�-!�l.M�'),
(33, NULL, NULL, NULL, 'MERCEDES y PAREJA', 'VILLA DEVOTO', '\0\0\0\0\0\0\0x��#�LA�o�ŏAM�'),
(34, NULL, NULL, NULL, 'LEGUIZAMON, MARTINIANO y PATRON', 'LINIERS', '\0\0\0\0\0\0\0�,C�RA��o_�AM�'),
(35, NULL, NULL, NULL, 'ESCALADA AV. y CASTAÃ‘ARES AV.', 'VILLA SOLDATI', '\0\0\0\0\0\0\0���(UA������:M�'),
(36, NULL, NULL, NULL, 'ESCALADA AV. y CASTAÃ‘ARES AV.', 'VILLA SOLDATI', '\0\0\0\0\0\0\046<UA��&S;M�'),
(37, NULL, NULL, NULL, 'MOREAU DE JUSTO, ALICIA AV. y EYLE, PETRONA', 'PUERTO MADERO', '\0\0\0\0\0\0\0f�c]�NA�-C��.M�'),
(38, NULL, NULL, NULL, 'URUGUAY AV. 740', 'SAN NICOLAS', '\0\0\0\0\0\0\00*��LA���K7�1M�'),
(39, NULL, NULL, NULL, 'URIBURU JOSE E., Pres. 1022', 'RECOLETA', '\0\0\0\0\0\0\0��d�`LA�P��n3M�'),
(40, NULL, NULL, NULL, 'JUNIN 521', 'BALVANERA', '\0\0\0\0\0\0\0w��\Z/MA�_)��2M�'),
(41, NULL, NULL, NULL, 'BARCO CENTENERA del 2906', 'NUEVA POMPEYA', '\0\0\0\0\0\0\0����9SA�<Nё\\6M�'),
(42, NULL, NULL, NULL, 'SARANDI 1273', 'SAN CRISTOBAL', '\0\0\0\0\0\0\0V����OA�|��Pk2M�'),
(43, NULL, NULL, NULL, 'DIAZ VELEZ AV. 4558', 'CABALLITO', '\0\0\0\0\0\0\0ˡE��MA��ŏ17M�'),
(44, NULL, NULL, NULL, 'RIVADAVIA AV. 7202', 'FLORES', '\0\0\0\0\0\0\08��d�PA�O@a�;M�'),
(45, NULL, NULL, NULL, 'ROCA, CNEL. AV. 5252', 'VILLA RIACHUELO', '\0\0\0\0\0\0\0䃞ͪWA�n4��@:M�'),
(46, NULL, NULL, NULL, 'GORDILLO, TIMOTEO 2212', 'MATADEROS', '\0\0\0\0\0\0\0#��~jTA�\r�-��@M�'),
(47, NULL, NULL, NULL, 'BACACAY 3952', 'FLORESTA', '\0\0\0\0\0\0\0pΈ��PA�?��=M�'),
(48, NULL, NULL, NULL, 'BEIRO, FRANCISCO AV. 4629', 'VILLA DEVOTO', '\0\0\0\0\0\0\0��b�MA�����BM�'),
(49, NULL, NULL, NULL, 'MILLER 2751', 'VILLA URQUIZA', '\0\0\0\0\0\0\0�@���HA� A�c�=M�'),
(50, NULL, NULL, NULL, 'CABILDO AV. 3067', 'NUÃ‘EZ', '\0\0\0\0\0\0\0��?��FA��Zd;M�'),
(51, NULL, NULL, NULL, 'BERUTI 3325', 'PALERMO', '\0\0\0\0\0\0\0	�^)KA��e�c]4M�'),
(52, NULL, NULL, NULL, 'CORDOBA AV. 5690', 'CHACARITA', '\0\0\0\0\0\0\0B`��"KA�*:��8M�'),
(53, NULL, NULL, NULL, 'LAVALLEJA 924', 'VILLA CRESPO', '\0\0\0\0\0\0\0?�ܵ�LA�tF��7M�'),
(54, NULL, NULL, NULL, 'CASEROS AV. y URQUIZA, Gral.', 'PARQUE PATRICIOS', '\0\0\0\0\0\0\0(��QA�#J{�/4M�'),
(55, NULL, NULL, NULL, 'REPUBLICA BOLIVARIANA DE VENEZUELA 1538', 'MONSERRAT', '\0\0\0\0\0\0\0�\'�NA����B�1M�'),
(56, NULL, NULL, NULL, 'JURAMENTO 2937', 'BELGRANO', '\0\0\0\0\0\0\0U���NHA�z�,C;M�'),
(57, NULL, NULL, NULL, 'GUEMES 4601', 'PALERMO', '\0\0\0\0\0\0\0��	hJA��?6M�'),
(58, NULL, NULL, NULL, 'CORDOBA AV. 1558', 'SAN NICOLAS', '\0\0\0\0\0\0\0?W[��LA�o���1M�'),
(59, NULL, NULL, NULL, 'ENTRE RIOS AV. 1349', 'SAN CRISTOBAL', '\0\0\0\0\0\0\0r����OA�����2M�'),
(60, NULL, NULL, NULL, 'JANER, ANA MARIA y TORRES Y TENORIO, Pres.', 'FLORES', '\0\0\0\0\0\0\0	�c�RA������7M�'),
(61, NULL, NULL, NULL, 'ESCALADA AV. y DELLEPIANE, LUIS, TTE. GRAL.', 'VILLA LUGANO', '\0\0\0\0\0\0\0L�\nF%UA�x��#�<M�'),
(62, NULL, NULL, NULL, 'YRUPE 6741', 'MATADEROS', '\0\0\0\0\0\0\0/�$�UA�Ș���?M�'),
(63, NULL, NULL, NULL, 'RIESTRA AV. 5655', 'VILLA LUGANO', '\0\0\0\0\0\0\0�T���VA�?W[��<M�'),
(64, NULL, NULL, NULL, 'BAHIA BLANCA 4025', 'VILLA DEVOTO', '\0\0\0\0\0\0\0?�ܵLA���^AM�'),
(65, NULL, NULL, NULL, 'SOLDADO DE LA FRONTERA AV. 5210', 'VILLA LUGANO', '\0\0\0\0\0\0\0H�z�WA�OjM;M�'),
(66, NULL, NULL, NULL, 'LA PAMPA 2215', 'BELGRANO', '\0\0\0\0\0\0\0�`TR\'HA�����9M�'),
(67, NULL, NULL, NULL, 'LA PAMPA y 11 DE SEPTIEMBRE DE 1888', 'BELGRANO', '\0\0\0\0\0\0\0�A�f�GA�(~��k9M�'),
(68, NULL, NULL, NULL, 'GALLARDO, ANGEL AV. y MARECHAL, LEOPOLDO', 'CABALLITO', '\0\0\0\0\0\0\0Z��ڊMA�d]�F8M�'),
(69, NULL, NULL, NULL, 'ALGARROBO 1041', 'BARRACAS', '\0\0\0\0\0\0\0yX�5�SA�j�t�0M�'),
(70, NULL, NULL, NULL, 'RIVADAVIA AV. y ESMERALDA', 'SAN NICOLAS', '\0\0\0\0\0\0\0KY�8�MA�F��_0M�'),
(71, NULL, NULL, NULL, 'CALDERON DE LA BARCA, PEDRO 1550', 'MONTE CASTRO', '\0\0\0\0\0\0\0+��	PA���k	�@M�'),
(72, NULL, NULL, NULL, 'NUEVA YORK 3952', 'VILLA DEVOTO', '\0\0\0\0\0\0\0�����LA�(~��kAM�'),
(73, NULL, NULL, NULL, 'PILAR 950', 'LINIERS', '\0\0\0\0\0\0\0HP�SA���H.�AM�'),
(74, NULL, NULL, NULL, 'CANGALLO y PATRICIAS ARGENTINAS AV.', 'CABALLITO', '\0\0\0\0\0\0\0�%䃞MA��ڊ�e7M�'),
(75, NULL, NULL, NULL, 'DON PEDRO DE MENDOZA AV. 1795', 'BOCA', '\0\0\0\0\0\0\0��y�QA����.M�'),
(76, NULL, NULL, NULL, 'COUTURE, EDUARDO J. y LIBRES DEL SUR AV.', 'RECOLETA', '\0\0\0\0\0\0\0�"��~JA�s��1M�'),
(77, NULL, NULL, NULL, 'RAMALLO 4389', 'SAAVEDRA', '\0\0\0\0\0\0\0�i�q�FA�;pΈ�>M�'),
(78, NULL, NULL, NULL, 'JURAMENTO AV. 2291', 'BELGRANO', '\0\0\0\0\0\0\0V����GA��d�`T:M�'),
(79, NULL, NULL, NULL, 'MITRE, EMILIO 954', 'PARQUE CHACABUCO', '\0\0\0\0\0\0\0�C���PA��!��u8M�'),
(80, NULL, NULL, NULL, 'DON PEDRO DE MENDOZA AV. 501', 'BOCA', '\0\0\0\0\0\0\0c�=yPA���1��-M�'),
(81, NULL, NULL, NULL, 'GUZMAN 90', 'CHACARITA', '\0\0\0\0\0\0\0����KA���K7�9M�'),
(82, NULL, NULL, NULL, 'ARTIGAS, JOSE GERVASIO, GRAL. 2262', 'VILLA DEL PARQUE', '\0\0\0\0\0\0\0�=yX�MA�>yX�5=M�'),
(83, NULL, NULL, NULL, '24 DE NOVIEMBRE 1679', 'PARQUE PATRICIOS', '\0\0\0\0\0\0\0T㥛�PA��G�z4M�'),
(84, NULL, NULL, NULL, 'BRIN, Ministro 843', 'BOCA', '\0\0\0\0\0\0\0�:p�PA���ͪ�-M�'),
(85, NULL, NULL, NULL, 'COCHABAMBA 2622', 'SAN CRISTOBAL', '\0\0\0\0\0\0\0��MbPA��9#J{3M�'),
(86, NULL, NULL, NULL, 'SAN JUAN AV. 350', 'SAN TELMO', '\0\0\0\0\0\0\0V-��OA���C�l/M�'),
(87, NULL, NULL, NULL, 'DEFENSA 219', 'MONSERRAT', '\0\0\0\0\0\0\0<�R�!NA���?�/M�'),
(88, NULL, NULL, NULL, 'SALMUN FEIJOO, JOSE AARON 555', 'BARRACAS', '\0\0\0\0\0\0\0��y�QA���JY�0M�'),
(89, NULL, NULL, NULL, 'JAURES, JEAN 735', 'BALVANERA', '\0\0\0\0\0\0\0i\0o�MA���W�24M�'),
(90, NULL, NULL, NULL, 'SUIPACHA 1422', 'RETIRO', '\0\0\0\0\0\0\02U0*�KA�8��d�0M�'),
(91, NULL, NULL, NULL, 'PUJOL 642', 'CABALLITO', '\0\0\0\0\0\0\0�^)�OA�R���9M�'),
(92, NULL, NULL, NULL, 'ISABEL, INFANTA AV. 555', 'PALERMO', '\0\0\0\0\0\0\0~��k	IA�gDio�5M�'),
(93, NULL, NULL, NULL, 'DEL LIBERTADOR AV. 2373', 'PALERMO', '\0\0\0\0\0\0\0|a2U0JA��p=\n�3M�'),
(94, NULL, NULL, NULL, 'DIRECTORIO AV. 4344', 'PARQUE AVELLANEDA', '\0\0\0\0\0\0\0{�/L�RA�K�4>M�'),
(95, NULL, NULL, NULL, 'GUTIERREZ, RICARDO 3253', 'VILLA DEL PARQUE', '\0\0\0\0\0\0\0>�٬�LA�����?M�'),
(96, NULL, NULL, NULL, 'CAFFARENA, AGUSTIN R. 49', 'BOCA', '\0\0\0\0\0\0\0j�t�PA�h��s�-M�'),
(97, NULL, NULL, NULL, 'CORRIENTES AV. 1530', 'SAN NICOLAS', '\0\0\0\0\0\0\0�٬�\\MA�����1M�'),
(98, NULL, NULL, NULL, 'DE LOS ITALIANOS AV. y SAENZ, MANUELA', 'PUERTO MADERO', '\0\0\0\0\0\0\0Y��\0NA��_vO.M�'),
(99, NULL, NULL, NULL, 'CASEROS AV. 1750', 'BARRACAS', '\0\0\0\0\0\0\0p_�QA�}��b1M�'),
(100, NULL, NULL, NULL, 'SANTA FE AV. 3917', 'PALERMO', '\0\0\0\0\0\0\0��(\\�JA��j+��5M�');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
