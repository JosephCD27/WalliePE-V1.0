-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: wallie
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ambiente`
--

DROP TABLE IF EXISTS `ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambiente` (
  `Amb_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Amb_Num` varchar(30) DEFAULT NULL,
  `Bita_Cod` int(20) DEFAULT NULL,
  `Bloq_Cod` int(20) DEFAULT NULL,
  `SubT_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`Amb_Cod`),
  KEY `Bita_Cod` (`Bita_Cod`),
  KEY `Bloq_Cod` (`Bloq_Cod`),
  KEY `SubT_Cod` (`SubT_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambiente`
--

LOCK TABLES `ambiente` WRITE;
/*!40000 ALTER TABLE `ambiente` DISABLE KEYS */;
/*!40000 ALTER TABLE `ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bit_elemen`
--

DROP TABLE IF EXISTS `bit_elemen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bit_elemen` (
  `Bit_El_Cod` int(11) NOT NULL,
  `Elem_Cod` int(20) DEFAULT NULL,
  `Bita_Cod` int(20) DEFAULT NULL,
  PRIMARY KEY (`Bit_El_Cod`),
  KEY `Bita_Cod` (`Bita_Cod`),
  KEY `Elem_Cod` (`Elem_Cod`),
  CONSTRAINT `bit_elemen_ibfk_1` FOREIGN KEY (`Bita_Cod`) REFERENCES `bitacora` (`Bita_Cod`),
  CONSTRAINT `bit_elemen_ibfk_2` FOREIGN KEY (`Elem_Cod`) REFERENCES `elemento` (`Elem_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bit_elemen`
--

LOCK TABLES `bit_elemen` WRITE;
/*!40000 ALTER TABLE `bit_elemen` DISABLE KEYS */;
/*!40000 ALTER TABLE `bit_elemen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `Bita_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Bita_Desc` varchar(60) DEFAULT NULL,
  `Bita_Fecha` date DEFAULT NULL,
  `Bita_Hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Bita_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloque`
--

DROP TABLE IF EXISTS `bloque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloque` (
  `Bloq_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Bloq_Nombre` varchar(60) DEFAULT NULL,
  `Bloq_Desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Bloq_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloque`
--

LOCK TABLES `bloque` WRITE;
/*!40000 ALTER TABLE `bloque` DISABLE KEYS */;
/*!40000 ALTER TABLE `bloque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_control`
--

DROP TABLE IF EXISTS `detalle_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_control` (
  `DetC_Cod` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`DetC_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_control`
--

LOCK TABLES `detalle_control` WRITE;
/*!40000 ALTER TABLE `detalle_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elemento`
--

DROP TABLE IF EXISTS `elemento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elemento` (
  `Elem_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Elem_Nombre` varchar(100) DEFAULT NULL,
  `Elem_Marca` varchar(60) DEFAULT NULL,
  `Elem_Serial` int(11) DEFAULT NULL,
  `Elem_FechaReg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Amb_Cod` int(11) DEFAULT NULL,
  `SubT_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`Elem_Cod`),
  KEY `Amb_Cod` (`Amb_Cod`),
  KEY `SubT_Cod` (`SubT_Cod`),
  CONSTRAINT `Amb_Cod` FOREIGN KEY (`Amb_Cod`) REFERENCES `ambiente` (`Amb_Cod`),
  CONSTRAINT `elemento_ibfk_1` FOREIGN KEY (`SubT_Cod`) REFERENCES `sub_tipo` (`SubT_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elemento`
--

LOCK TABLES `elemento` WRITE;
/*!40000 ALTER TABLE `elemento` DISABLE KEYS */;
/*!40000 ALTER TABLE `elemento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `Est_Cod` int(11) NOT NULL,
  `Est_Nombre` varchar(60) DEFAULT NULL,
  `Est_Desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Est_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha` (
  `Ficha_Num` int(11) NOT NULL,
  `Ficha_Fecha_Inic` date DEFAULT NULL,
  `Ficha_Fecha_Fin` date DEFAULT NULL,
  `Pro_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`Ficha_Num`),
  KEY `Pro_Cod` (`Pro_Cod`),
  CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`Pro_Cod`) REFERENCES `programa` (`Pro_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novedad`
--

DROP TABLE IF EXISTS `novedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `novedad` (
  `Nov_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Nov_Desc` varchar(200) DEFAULT NULL,
  `Nov_Evidencia` varchar(60) DEFAULT NULL,
  `Nov_Fecha` date DEFAULT NULL,
  `Nov_Hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `SubT_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`Nov_Cod`),
  KEY `SubT_Cod` (`SubT_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novedad`
--

LOCK TABLES `novedad` WRITE;
/*!40000 ALTER TABLE `novedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `novedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `Perm_Cod` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Perm_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programa`
--

DROP TABLE IF EXISTS `programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programa` (
  `Pro_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Nom` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Pro_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programa`
--

LOCK TABLES `programa` WRITE;
/*!40000 ALTER TABLE `programa` DISABLE KEYS */;
/*!40000 ALTER TABLE `programa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `Rol_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Rol_Nombre` varchar(60) DEFAULT NULL,
  `Rol_Desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Rol_Cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (2,'instructor','instruye'),(4,'Aprendiz','aprende');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_per`
--

DROP TABLE IF EXISTS `rol_per`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol_per` (
  `RP_Cod` int(11) NOT NULL,
  `Rol_Cod` int(11) DEFAULT NULL,
  `Perm_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`RP_Cod`),
  KEY `Perm_Cod` (`Perm_Cod`),
  KEY `Rol_Cod` (`Rol_Cod`),
  CONSTRAINT `rol_per_ibfk_1` FOREIGN KEY (`Rol_Cod`) REFERENCES `rol` (`Rol_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_per`
--

LOCK TABLES `rol_per` WRITE;
/*!40000 ALTER TABLE `rol_per` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol_per` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_tipo`
--

DROP TABLE IF EXISTS `sub_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_tipo` (
  `SubT_Cod` int(11) NOT NULL,
  `SubT_Nombre` varchar(60) DEFAULT NULL,
  `SubT_Desc` varchar(200) DEFAULT NULL,
  `Tipo_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`SubT_Cod`),
  KEY `Tipo_Cod` (`Tipo_Cod`),
  CONSTRAINT `Tipo_Cod` FOREIGN KEY (`Tipo_Cod`) REFERENCES `tipo` (`Tipo_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_tipo`
--

LOCK TABLES `sub_tipo` WRITE;
/*!40000 ALTER TABLE `sub_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `Tipo_Cod` int(11) NOT NULL,
  `Tipo_Desc` varchar(200) DEFAULT NULL,
  `Tipo_Nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Tipo_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (0,'Accesorios de los dispositivos','Perifericos');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documento` (
  `Docu_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Docu_Nom` varchar(20) DEFAULT NULL,
  `Docu_des` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Docu_Cod`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (9,'tarjeta de identidad','menores de edad (18 años)'),(10,'Cedula de Ciudadania','mayores de edad (18 años en adelante)'),(14,'Cedula Extranjera','persona que no pertenece a colombia');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_elemento`
--

DROP TABLE IF EXISTS `tipo_elemento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_elemento` (
  `Tipo_Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Desc` varchar(200) DEFAULT NULL,
  `Tipo_Nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Tipo_Cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_elemento`
--

LOCK TABLES `tipo_elemento` WRITE;
/*!40000 ALTER TABLE `tipo_elemento` DISABLE KEYS */;
INSERT INTO `tipo_elemento` VALUES (2,'Accesorios de los dispositivos','Perifericos'),(3,'dispositivos','electronico');
/*!40000 ALTER TABLE `tipo_elemento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Usu_Id` int(11) NOT NULL,
  `Usu_Nombre` varchar(15) DEFAULT NULL,
  `Usu_Apellido` varchar(255) DEFAULT NULL,
  `Usu_Correo` varchar(60) DEFAULT NULL,
  `Usu_Telefono` int(11) DEFAULT NULL,
  `Usu_Contraseña` varchar(60) DEFAULT NULL,
  `Usu_Imagen` int(11) DEFAULT NULL,
  `Rol_Cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`Usu_Id`),
  KEY `Rol_Cod` (`Rol_Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (222,'Sebastian','Ortugoza','dada@gmail.com',2147483647,'ddd',NULL,NULL),(1144,'Mauricio','Sepulveda','aaa@gmail.com',23223,'sss',NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-15  1:11:47
