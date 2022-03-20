-- MariaDB dump 10.19  Distrib 10.5.10-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hospital
-- ------------------------------------------------------
-- Server version	10.5.10-MariaDB

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idcitas` int(11) NOT NULL AUTO_INCREMENT,
  `idcita` varchar(20) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idconsultorio` int(11) NOT NULL,
  `iddoctor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `emailpac` varchar(150) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `feccreate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idcitas`),
  KEY `fk_citas_consultorio_idx` (`idconsultorio`),
  KEY `fk_citas_doctor_idx` (`iddoctor`),
  CONSTRAINT `fk_citas_consultorio` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_doctor` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultorio`
--

LOCK TABLES `consultorio` WRITE;
/*!40000 ALTER TABLE `consultorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultorio` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallefactura`
--

LOCK TABLES `detallefactura` WRITE;
/*!40000 ALTER TABLE `detallefactura` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallefactura` ENABLE KEYS */;
UNLOCK TABLES;

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
  `username` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passwd` varchar(150) NOT NULL,
  `fecnac` date NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `codpostal` varchar(20) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `biografica` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `fecCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`iddoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

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
  `usuario` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `passwd` varchar(150) NOT NULL,
  `fecIngreso` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `idpapel` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `feccreate` datetime DEFAULT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `fk_empleado_papel_idx` (`idpapel`),
  CONSTRAINT `fk_empleado_papel` FOREIGN KEY (`idpapel`) REFERENCES `papel` (`idpapel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feriados`
--

LOCK TABLES `feriados` WRITE;
/*!40000 ALTER TABLE `feriados` DISABLE KEYS */;
/*!40000 ALTER TABLE `feriados` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencias`
--

LOCK TABLES `licencias` WRITE;
/*!40000 ALTER TABLE `licencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `licencias` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'40023528','EDGAR','APAZA CHOQUE','EDGARAPAZAC@GMAIL.COM','10/05/2021','MASCULINO','AV. FLORAL 2344 BARRIO SAN JOSE PUNO','ANAPIA','HUANCANE','TAQUILE','LIMA 1','935017466','BLACK2.JPG',1,'2021-05-22 15:27:37'),(4,'01234567','MIA','COLUCHI','MIA@GMIAL.COM','01/05/2021','FEMENINO','JR. MATARA 2893 URB VILLA DEL CAMRNE ALTO VILLA MARIA DEL TRINUNFO','ANAPIA','HUANCANE','LIMA','LIMA33','987654321','CV.JPG',1,'2021-05-22 16:03:30'),(5,'01247463','MARTHA','RIOS ARZUBIALDE','MARTHARIOS@HOTMAIL.COM','05/01/2021','FEMENINO','AV. LA CULTURA 204','TAQUILE','YUNGUYO','CUSCO','','972345678','UNIDAD.JPEG',1,'2021-05-23 08:09:02'),(6,'02377263','JULIO','QUISPE PANCA','','12/06/1999','MASCULINO','AMANTANI KANCULLANI PATA','TAQUILE','CHUCUITO','PUNO','','951235689','UNIDAD.JPEG',1,'2021-05-23 08:31:37');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `papel`
--

LOCK TABLES `papel` WRITE;
/*!40000 ALTER TABLE `papel` DISABLE KEYS */;
/*!40000 ALTER TABLE `papel` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipolicencia`
--

LOCK TABLES `tipolicencia` WRITE;
/*!40000 ALTER TABLE `tipolicencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipolicencia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-23 16:22:35
