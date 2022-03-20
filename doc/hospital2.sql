-- MariaDB dump 10.19  Distrib 10.5.11-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hospital
-- ------------------------------------------------------
-- Server version	10.5.11-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'APT-0001',1,1,1,'2021-05-25','02:00:00','e','4','m','2021-05-02 00:00:00',1,NULL),(2,'APT-0002',1,1,3,'05/05/2021','5:15 PM','edgar@gmail.com','952368745','cita ','2021-05-31 17:05:32',1,NULL),(3,'APT-0003',6,2,2,'06/05/2021','3:00 PM','maria@gmail.com','985263524','Mensaje','2021-05-31 17:12:19',1,NULL),(4,'APT-0004',1,1,3,'07/06/2021','5:45 PM','edgarapazac@gmail.com','923554433','mensaaj','2021-06-05 19:09:25',1,NULL),(5,'APT-0005',4,1,2,'09/06/2021','8:07 AM','','99','','2021-06-08 20:07:34',1,NULL),(6,'APT-0001',7,3,2,'30/06/2021','5:58 PM','','951457889','m','2021-06-30 17:59:57',1,NULL),(7,'APT-0001',6,4,1,'24/06/2021','6:00 PM','','951235689','','2021-06-30 18:00:23',1,NULL),(8,'APT-0001',1,5,3,'10/07/2021','11:26 PM','EDGARAPAZAC@GMAIL.COM','935017466','','2021-07-10 23:26:08',1,NULL),(9,'APT-0001',8,3,2,'10/07/2021','11:39 PM','MIO@GMIL.COM','951457889','ads','2021-07-10 23:40:00',1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultorio`
--

LOCK TABLES `consultorio` WRITE;
/*!40000 ALTER TABLE `consultorio` DISABLE KEYS */;
INSERT INTO `consultorio` VALUES (1,'DENTAL','CONSULTORIO DENTAL',1),(2,'MEDICINA GENERAL','MEDICINA GENERAL',1),(3,'OBSTETRICIA','',1),(4,'TRIAJE','',1),(5,'AFASD','DFASFASDF',1),(6,'TTTTTT','GSDFDFG',1);
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
  `fecnac` varchar(20) NOT NULL,
  `sexo` varchar(12) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (1,'SANTIAGO','LIPA SANCHEZ','santiago','santiago.ormeno@gmail.com','123','05/05/2021','MASCULINO','AV. LOS PROCESERES DEL PACIFICO 4390','LIMA','LIMA','LA MOLINA','PEDIATRA','987654321','','MEDICO CIRUJANO',1,'2021-05-27 21:30:32'),(2,'FRANCISCO','APAZA','MARU','AMRU@GMAIL.COM','123','27/05/2021','MASCULINO','AV. UNO','LIMA','LIMA','LIMA','ODOTOLOGO','923554433','doctor-thumb-09.jpg','ESPECIALIDAD PROTESIS',1,'2021-05-27 21:45:36'),(3,'PILAR','SANCHES DUARTE','pilar.sanchez','pilar.sanchez@gmail.com','abc','19/01/2021','FEMENINO','JR. PINTO 455','AREQUIPA','AREQUIPA','AREQUIPA','GIENCOLOGIA','933737494','doctor-thumb-08.jpg','PEDIATRIA GENERAL',1,'2021-05-27 22:12:41'),(4,'SANTIAGO','AFLASDFASDF SANCHEZ','santiago','santiago.ormeno@gmail.com','123','05/05/2021','MASCULINO','AV. LOS PROCESERES DEL PACIFICO 4390','LIMA','LIMA','LA MOLINA','PEDIATRA','987654321','','MEDICO CIRUJANO',1,'2021-06-16 22:16:17'),(5,'J','H','k','l@l.com','k','01/06/2021','MASCULINO','S','D','D','F','F','sfg','Archivo14_5folio.pdf','AAA',1,'2021-07-10 00:00:00');
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
  PRIMARY KEY (`idhc`),
  KEY `fk_historiaclinica_paciente_idx` (`idpaciente`),
  KEY `fk_historiaclinica_consultorio_idx` (`idconsultorio`),
  KEY `fk_historiaclinica_doctor_idx` (`iddoctor`),
  CONSTRAINT `fk_historiaclinica_consultorio` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historiaclinica_doctor` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historiaclinica_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpac`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiaclinica`
--

LOCK TABLES `historiaclinica` WRITE;
/*!40000 ALTER TABLE `historiaclinica` DISABLE KEYS */;
INSERT INTO `historiaclinica` VALUES (1,'01234567',4,'10/06/2021','7:08 PM',21,'MOTIVO','SIGN','RELATO','V','A','KL','K','J','L','NO','NO','JHJH','NO','NO','JJJJ','JH','10','11','12','13','14','15','16','17','SDF','P','CC','T','S','DFGD','S','ASDF','FFF','FDFF','11/06/2021','VV','2021-06-10 19:09:10',1,'2021-06-10 19:09:10',1),(9,'01234567',4,'11/06/2021','7:43 PM',23,'ALGUN MOTIVO','SINTIMOA','RELATO CORNOLOGICO','VANCUNAS HBK873283','SI','SI','SI','SI','SI','NO','NO','MOQUEGUA','NO','NO','FUR NALGO','EXAMEN FISICO','36','98','9','7','80','1.56','87','238','DIAGNISTICO','P','CIEX QUE ES','APLICACION UN TRATAMIENTO','ORAL','4','LMV','MEDIDAS HIGIENICAS','EXAMENES AUXLIARES','MEDIDAS PREVENTIVAS','14/06/2021','OBSERVACIONE ADICIONAL','2021-06-11 19:46:15',1,'2021-06-11 19:46:15',1),(12,'02377263',6,'16/06/2021','8:39 PM',41,'SIENTE DOLOR EN EL CUERPO DESDE HACE VARIOS DIAS.\r\nSIENTE DOLOR DE CABEZA POR 3 DIAS Y PRESENTA FIEBRE','FIEBRE Y MALESTRAR GENERAL\r\nSE PUEDE APRECIAR QUE TIENE PUNTOS ROJOS EN LA PIEL, PUEDE SER CAUSADO POR ALGUNA BACTERIA','EL 15 DE JUNIO FUE A LA CHARA Y SOLO COMIO EN LA CHACRA Y DESPUES DE SINTIó MAL.\r\nAL DIA SIGUIENTE AMANECIO CON FIEBRE Y OTROS DOLORES.\r\nDESPUES DE 2 DIAS EL DOLOR DE CABEZA ES CONSTANTE.','VACUNA H1N1 15 ABRIL DE 2021','NO','NO','3 HORAS','MUY AMARILLA','SI','SI','SI','MACUSANI','NO','SI','ALGUN SINTOMA','PRESENTA PUNTOS ROJOS EN EL CUERPO','39','98/120','45','25','79.56','1.77','98','120','CUADRO DE DIABETIS','P','CIEX','IBOPROFENO 4 TABLETAS','ORAL','3 VECES AL DIA','L-M -V','LAVARSE LAS MANOS CADA VEZ QUE SALGA DEL BAñO\r\nMANTENER REPOSO POR 3 DIAS Y TOMAR SUS MEDICAMENTOS.\r\nNO EXPONERSE AL SOL U OTRAS SALIDAS','EXAMENES DE ORINA REVELA GRAN CANTIDAD DE UREA CON OLOR FUERTE','COMER UNA DIETA SALUDABLE SIN GRASAS \r\nINGESTA DE FRUTA Y VERDURAS\r\nGELATINA','18/06/2021','VIVE EN LA COMUNIDAD DE AMANTANI','2021-06-16 20:54:26',2,'2021-06-16 20:54:26',1),(13,'01247463',5,'16/06/2021','9:38 PM',78,'ALGUN MOTIVO','ALGUN SINTOMA','UN RELATO\r\nKJDSFHADLSFAD\r\nFA\r\nDF\r\nASD\r\nFASD','HEPATYISITS B6','SI','SI','NO','SI','SI','SI','SI','TAQUILE','SI','SI','12 DE ABRIL 1956','','36','98/120','54','21','45','15','65','54','TOMAR PASTILLAS','P','CIEX','IBUPROFENO','ORAL','4','TODAS LAS NOCHES','MEDIDAS','EXAMEN','ALGUNA MEDIDA','19/06/2021','NINGUNA','2021-06-16 21:41:16',1,'2021-06-16 21:41:16',1),(14,'01234654',8,'17/06/2021','10:16 PM',45,'','','','','','','','','','NO','NO','','NO','NO','','','2','2','0','0','0','0','0','0','','P','','','','','','','','','17/06/2021','OS','2021-06-17 22:17:03',3,'2021-06-17 22:17:03',2);
/*!40000 ALTER TABLE `historiaclinica` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'40023528','EDGAR','APAZA CHOQUE','EDGARAPAZAC@GMAIL.COM','10/05/2021','MASCULINO','AV. FLORAL 2344 BARRIO SAN JOSE PUNO','ANAPIA','HUANCANE','TAQUILE','LIMA 1','935017466','BLACK2.JPG',1,'2021-05-22 15:27:37'),(4,'01234567','MIA','COLUCHI','MIA@GMIAL.COM','01/05/2021','FEMENINO','JR. MATARA 2893 URB VILLA DEL CAMRNE ALTO VILLA MARIA DEL TRINUNFO','ANAPIA','HUANCANE','LIMA','LIMA33','987654321','CV.JPG',1,'2021-05-22 16:03:30'),(5,'01247463','MARTHA','RIOS ARZUBIALDE','MARTHARIOS@HOTMAIL.COM','05/01/2021','FEMENINO','AV. LA CULTURA 204','TAQUILE','YUNGUYO','CUSCO','','972345678','UNIDAD.JPEG',1,'2021-05-23 08:09:02'),(6,'02377263','JULIO','QUISPE PANCA','','12/06/1999','MASCULINO','AMANTANI KANCULLANI PATA','TAQUILE','CHUCUITO','PUNO','','951235689','UNIDAD.JPEG',1,'2021-05-23 08:31:37'),(7,'01234654','FILOMENA','CHARAJA FRANCO','','16/06/2021','FEMENINO','COMUNIDAD INKATIANA','JULI','CHUCUITO','COCHIRA','0','951457889','',1,'2021-06-16 23:13:32'),(8,'01234654','FILOMENA','CHARAJA','MIO@GMIL.COM','16/06/2021','FEMENINO','COMUNIDAD INKATIANA','CHU','CHUCUITO','COCHIRA','0','951457889','',1,'2021-06-16 23:31:43');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referencia`
--

LOCK TABLES `referencia` WRITE;
/*!40000 ALTER TABLE `referencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `referencia` ENABLE KEYS */;
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

-- Dump completed on 2021-07-17  4:18:48
