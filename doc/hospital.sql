CREATE DATABASE  IF NOT EXISTS `hospital` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `hospital`;
-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hospital
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

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
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `idasistencia` int(11) NOT NULL AUTO_INCREMENT,
  `idempleado` int(11) NOT NULL,
  `dia` datetime NOT NULL,
  `anio` char(4) NOT NULL,
  PRIMARY KEY (`idasistencia`),
  KEY `fk_asistencia_empleado_idx` (`idempleado`),
  CONSTRAINT `fk_asistencia_empleado` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `atencion`
--

DROP TABLE IF EXISTS `atencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atencion` (
  `idatencion` int(11) NOT NULL AUTO_INCREMENT,
  `numhistoria` varchar(20) DEFAULT NULL,
  `codsis` varchar(45) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `tipusuario` varchar(50) DEFAULT NULL,
  `tipatencion` varchar(45) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `otros` varchar(100) DEFAULT NULL,
  `idhc` int(11) DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  `iddoc` int(11) DEFAULT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idatencion`),
  KEY `fk_atencion_doctor_idx` (`iddoc`),
  KEY `fk_atencion_paciente_idx` (`idpaciente`),
  CONSTRAINT `fk_atencion_doctor` FOREIGN KEY (`iddoc`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_atencion_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpac`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idcitas` int(11) NOT NULL AUTO_INCREMENT,
  `codcita` varchar(20) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idconsultorio` int(11) NOT NULL,
  `iddoctor` int(11) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `hora` varchar(15) NOT NULL,
  `emailpac` varchar(150) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `feccreate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `idreferencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcitas`),
  KEY `fk_citas_consultorio_idx` (`idconsultorio`),
  KEY `fk_citas_doctor_idx` (`iddoctor`),
  KEY `fk_citas_paciente_idx` (`idpaciente`),
  KEY `fk_citas_referencia_idx` (`idreferencia`),
  CONSTRAINT `fk_citas_consultorio` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_doctor` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpac`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_referencia` FOREIGN KEY (`idreferencia`) REFERENCES `referencia` (`idreferencia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `consultorio`
--

DROP TABLE IF EXISTS `consultorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultorio` (
  `idconsultorio` int(11) NOT NULL AUTO_INCREMENT,
  `consultorio` varchar(200) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idconsultorio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `detallefactura`
--

DROP TABLE IF EXISTS `detallefactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallefactura` (
  `iddetfactura` int(11) NOT NULL AUTO_INCREMENT,
  `idfactura` int(11) NOT NULL,
  `articulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `impuesto` double DEFAULT NULL,
  `porctdsto` double DEFAULT NULL,
  `grantotal` double DEFAULT NULL,
  PRIMARY KEY (`iddetfactura`),
  KEY `fk_detallefactura_factura_idx` (`idfactura`),
  CONSTRAINT `fk_detallefactura_factura` FOREIGN KEY (`idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `iddoc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fecnac` varchar(20) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `numcolegiatura` varchar(20) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `distrito` varchar(30) DEFAULT NULL,
  `profesion` varchar(100) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `biografica` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`iddoc`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `educacion`
--

DROP TABLE IF EXISTS `educacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educacion` (
  `ideducacion` int(11) NOT NULL AUTO_INCREMENT,
  `iddoc` int(11) NOT NULL,
  `trabajo` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `tiempo` varchar(45) NOT NULL,
  PRIMARY KEY (`ideducacion`),
  KEY `fk_educacion_doctor_idx` (`iddoc`),
  CONSTRAINT `fk_educacion_doctor` FOREIGN KEY (`iddoc`) REFERENCES `doctor` (`iddoc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `fecIngreso` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `idpapel` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `feccreate` datetime DEFAULT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `fk_empleado_papel_idx` (`idpapel`),
  CONSTRAINT `fk_empleado_papel` FOREIGN KEY (`idpapel`) REFERENCES `papel` (`idpapel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `experiencia`
--

DROP TABLE IF EXISTS `experiencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiencia` (
  `idexperiencia` int(11) NOT NULL AUTO_INCREMENT,
  `iddoc` int(11) NOT NULL,
  `centrabajo` varchar(200) NOT NULL,
  `fechainicio` varchar(100) DEFAULT NULL,
  `fechafin` varchar(100) DEFAULT NULL,
  `totalanios` int(11) DEFAULT NULL,
  `totalmeses` int(11) DEFAULT NULL,
  PRIMARY KEY (`idexperiencia`),
  KEY `fk_experiencia_doctor_idx` (`iddoc`),
  CONSTRAINT `fk_experiencia_doctor` FOREIGN KEY (`iddoc`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `idpaciente` int(11) NOT NULL,
  `idconsultorio` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `idimpuesto` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `direcenvio` varchar(255) NOT NULL,
  `fecfactura` date DEFAULT NULL,
  `fecvencimiento` date DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  `iddetalle` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `impuesto` double DEFAULT NULL,
  `porctdsto` double DEFAULT NULL,
  `grantotal` double DEFAULT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feriados`
--

DROP TABLE IF EXISTS `feriados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriados` (
  `idferiado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreferiado` varchar(150) NOT NULL,
  `fechaferiado` date DEFAULT NULL,
  PRIMARY KEY (`idferiado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historiaclinica`
--

DROP TABLE IF EXISTS `historiaclinica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historiaclinica` (
  `idhc` int(11) NOT NULL AUTO_INCREMENT,
  `numhistclinica` varchar(45) DEFAULT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `fecconsulta` varchar(30) DEFAULT NULL,
  `horaconsulta` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `signos` varchar(255) DEFAULT NULL,
  `relato` varchar(255) DEFAULT NULL,
  `vacunas` varchar(45) DEFAULT NULL,
  `apetito` varchar(45) DEFAULT NULL,
  `sed` varchar(45) DEFAULT NULL,
  `sueno` varchar(45) DEFAULT NULL,
  `orina` varchar(45) DEFAULT NULL,
  `deposicion` varchar(45) DEFAULT NULL,
  `fiebre15` char(2) DEFAULT NULL,
  `viaje` char(2) DEFAULT NULL,
  `lugar` varchar(150) DEFAULT NULL,
  `tos15` char(2) DEFAULT NULL,
  `secresion` char(2) DEFAULT NULL,
  `fur` varchar(45) DEFAULT NULL,
  `examenfisico` varchar(255) DEFAULT NULL,
  `temp` varchar(20) DEFAULT NULL,
  `pa` varchar(20) DEFAULT NULL,
  `fc` varchar(20) DEFAULT NULL,
  `fr` varchar(20) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `talla` varchar(20) DEFAULT NULL,
  `pabd` varchar(20) DEFAULT NULL,
  `saturacion` varchar(30) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `tipoexamen` varchar(45) DEFAULT NULL,
  `ciex` varchar(50) DEFAULT NULL,
  `tratamiento` varchar(255) DEFAULT NULL,
  `via` varchar(50) DEFAULT NULL,
  `dosis` varchar(50) DEFAULT NULL,
  `frecuencia` varchar(50) DEFAULT NULL,
  `medidashigienicas` varchar(255) DEFAULT NULL,
  `examenesauxiliares` varchar(255) DEFAULT NULL,
  `medidaspreventivas` varchar(255) DEFAULT NULL,
  `proximaconsulta` varchar(30) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  `idconsultorio` int(11) DEFAULT NULL,
  `fecChange` datetime DEFAULT NULL,
  `iddoctor` int(11) DEFAULT NULL,
  `idatencion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idhc`),
  KEY `fk_historiaclinica_paciente_idx` (`idpaciente`),
  KEY `fk_historiaclinica_consultorio_idx` (`idconsultorio`),
  KEY `fk_historiaclinica_doctor_idx` (`iddoctor`),
  KEY `fk_historiaclinica_atencion_idx` (`idatencion`),
  CONSTRAINT `fk_historiaclinica_atencion` FOREIGN KEY (`idatencion`) REFERENCES `atencion` (`idatencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historiaclinica_consultorio` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historiaclinica_doctor` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historiaclinica_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpac`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `iddoctor` int(11) NOT NULL,
  `diasdispon` varchar(200) NOT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `fk_horario_doctor_idx` (`iddoctor`),
  CONSTRAINT `fk_horario_doctor` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `licencias`
--

DROP TABLE IF EXISTS `licencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licencias` (
  `idlicencia` int(11) NOT NULL AUTO_INCREMENT,
  `idtipolicencia` int(11) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `numdias` int(11) NOT NULL,
  `diasrestantes` int(11) NOT NULL,
  `razon` text DEFAULT NULL,
  `feccreate` datetime DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idlicencia`),
  KEY `fk_licencias_tipolicencia_idx` (`idtipolicencia`),
  KEY `fk_licencias_empleado_idx` (`idempleado`),
  CONSTRAINT `fk_licencias_empleado` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_licencias_tipolicencia` FOREIGN KEY (`idtipolicencia`) REFERENCES `tipolicencia` (`idtipolicencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `iddoctor` int(11) NOT NULL COMMENT 'tipo empleado: 1 Doctor, 2 empleado',
  `idpersonal` int(11) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 2 COMMENT '1 administrador, 2 doctor, 3 empleado',
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `idpac` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fecnac` varchar(10) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `distrito` varchar(40) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `codpostal` varchar(20) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`idpac`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `papel`
--

DROP TABLE IF EXISTS `papel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `papel` (
  `idpapel` int(11) NOT NULL AUTO_INCREMENT,
  `papel` varchar(200) NOT NULL,
  PRIMARY KEY (`idpapel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `referencia`
--

DROP TABLE IF EXISTS `referencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencia` (
  `idreferencia` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `motivo` varchar(45) DEFAULT NULL,
  `idcita` int(11) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  `idpersonal` int(11) DEFAULT NULL,
  `idhistclinica` int(11) DEFAULT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idreferencia`),
  KEY `fk_referencia_paciente_idx` (`idpaciente`),
  KEY `fk_referencia_personal_idx` (`idpersonal`),
  KEY `fk_referencia_histclinica_idx` (`idhistclinica`),
  CONSTRAINT `fk_referencia_histclinica` FOREIGN KEY (`idhistclinica`) REFERENCES `historiaclinica` (`idhc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_referencia_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpac`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_referencia_personal` FOREIGN KEY (`idpersonal`) REFERENCES `empleado` (`idempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipolicencia`
--

DROP TABLE IF EXISTS `tipolicencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipolicencia` (
  `idtipolicencia` int(11) NOT NULL AUTO_INCREMENT,
  `tipolicencia` varchar(60) NOT NULL,
  PRIMARY KEY (`idtipolicencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'hospital'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-27 12:15:52
