-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hospital
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atencion`
--

LOCK TABLES `atencion` WRITE;
/*!40000 ALTER TABLE `atencion` DISABLE KEYS */;
INSERT INTO `atencion` VALUES
(2,'','34234','',34,'Seguro Integral de Salud','Consulta Ambulatoria','Medicina','',0,'2021-11-13 19:43:07',1,19),
(13,'9857423','654','ERIKA SALAS BORU',65,'INTERVENCIóN SANITARIA','EMERGENCIA','CIRUGIA','',5,'2021-11-13 20:11:59',1,17),
(14,'65798798','67467','MARTIN SALAZAR QUISPE',54,'DEMANDA','CONSULTA AMBULATORIA','MEDICINA','',0,'2021-11-13 20:14:29',1,9),
(15,'69857432','3154','CARLOS PALAO QUISOCALA',56,'DEMANDA','CONSULTA AMBULATORIA','CIRUGIA','',0,'2021-11-13 20:32:21',1,13),
(23,'69857432','3154','CARLOS PALAO QUISOCALA',56,'DEMANDA','CONSULTA AMBULATORIA','CIRUGIA','',18,'2021-11-13 20:35:09',1,13),
(24,'452163258','132165','BERTHA MAMANI LIMA',34,'SEGURO INTEGRAL DE SALUD','CONSULTA AMBULATORIA','MEDICINA','',19,'2021-11-14 10:50:10',1,12),
(31,'40023529','','SANDRA MAMANI TICA',34,'DEMANDA','CONSULTA AMBULATORIA','GINECOLOGIA','',22,'2021-11-27 21:30:52',1,16),
(32,'452163258','','BERTHA MAMANI LIMA',26,'DEMANDA','CONSULTA AMBULATORIA','GINECOLOGIA','',23,'2021-11-27 21:32:44',1,12),
(33,'65798798','54125','MARTIN SALAZAR QUISPE',19,'DEMANDA','CONSULTA AMBULATORIA','','',0,'2022-03-17 01:31:29',12,9);
/*!40000 ALTER TABLE `atencion` ENABLE KEYS */;
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
  CONSTRAINT `fk_citas_consultorio` FOREIGN KEY (`idconsultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_doctor` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpac`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES
(10,'APT-0001',20,2,14,'14/03/2022','10:24 AM','EDGARAPAZAC@GMAIL.COM','935017466','','2022-03-12 10:24:55',1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultorio`
--

LOCK TABLES `consultorio` WRITE;
/*!40000 ALTER TABLE `consultorio` DISABLE KEYS */;
INSERT INTO `consultorio` VALUES
(1,'DENTAL','CONSULTORIO DENTAL',1),
(2,'MEDICINA GENERAL','MEDICINA GENERAL',1),
(7,'GINECOLOGIA','PARA MUJERES',1),
(8,'NINGUNO','MAS',0),
(9,'UNO','DOS',1);
/*!40000 ALTER TABLE `consultorio` ENABLE KEYS */;
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
  `oculto` int(11) DEFAULT 0,
  `firma` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`iddoc`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES
(1,'PILAR JULIA','SANCHES DUARTE','pilar.sanchez@gmail.com','19/01/2021','FEMENINO','CMP 323232','JR. PINTO 455','AREQUIPA','AREQUIPA','AREQUIPA','GIENCOLOGIA','933737494','','MEDICINA GENERAL',1,'2021-05-27 22:12:41',0,NULL),
(12,'FRANCO','ROJAS QUISPE','frank@gmail.com','15/11/2021','MASCULINO','CMP 999855','AV. EL SOL 34534','PUNO','PUNO','PUNO','CIRUJANO DENTISTA','MEDICO CIRUJANO','','MI BIOGRAFIA2',1,'2021-11-19 00:00:00',0,NULL),
(13,'EDGAR','APAZA CHOQUE','edgarapaza@gmail.com','15/04/1978','MASCULINO','CMP 1223','PASAJE','PUNO','PUNO','PUNO','INGENEIRO DE SISTEMAS','935017466','','MEDICINA GENERAL - GINECOLOGIA',1,'2021-11-19 00:00:00',0,NULL),
(14,'JUAN','BARRIOS SANCHO','juansancho@gmial.com','02/11/2021','MASCULINO','125486','AV. PUNO 2384','PUNO','PUNO','PUNO','ING ESTADISTICO','3215465456','LOMO_medidas.jpg','',1,'2021-11-30 00:00:00',0,NULL),
(24,'LIONEL','MESSI CONTRERAS','messi@gmail.com','15/03/2022','MASCULINO','92828','JR. COLOMBIA 135','PUNO','PUNO','PUNO','MEDICO CIRUJANO','963852741','./assets/img/user.jpg','CIRRUJANO',1,'2022-03-13 21:41:14',0,NULL),
(31,'EDASDF','DFFF','ert@a.com','18/03/2022','FEMENINO','23432','SFD','JJ','GGG','FF','ZZ','6666','./assets/img/user.jpg','FF',1,'2022-03-17 00:43:36',0,NULL),
(32,'QQ','WW','rr@r.com','08/03/2022','MASCULINO','COP 6542','YY','UU','II','OO','PP','22','./assets/img/user.jpg','AA',1,'2022-03-17 00:51:03',0,NULL);
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educacion`
--

LOCK TABLES `educacion` WRITE;
/*!40000 ALTER TABLE `educacion` DISABLE KEYS */;
INSERT INTO `educacion` VALUES
(1,1,'ahhhhh','ummmm','tim'),
(2,1,'Centro de salud azangaro','Jefe de operaciones','2003-2005'),
(3,1,'Hospital de Salud de Salcedo','Odontologia','2005 - 2007'),
(4,1,'Centro de rehabilitacion rebagliati','Jefe de Piso','2007 - 2009'),
(5,1,'curso','centro','mayo 2000'),
(6,1,'Aseveracion 1','Universidad Nacional de Altiplano','mayo 2009'),
(7,1,'Aseveracion 1','Universidad Nacional de Altiplano','mayo 2009'),
(8,1,'Aseveracion 1','Universidad Nacional de Altiplano','mayo 2009'),
(9,1,'Aseveracion 1','Universidad Nacional de Altiplano','mayo 2009'),
(10,1,'Aseveracion 1','Universidad Nacional de Altiplano','mayo 2009'),
(11,1,'Aseveracion 1','Universidad Nacional de Altiplano','mayo 2009'),
(12,1,'NULO','CENTROK KSAKSKSKS','MSMS'),
(13,1,'NUEVO CURSOS','CENTRO DE ESTUDIOS NUEVOS','JUNIO A DICIEMBRE 2021'),
(14,1,'CUROS AA','CURO 44','MAU'),
(15,12,'KSKSKS','KDKDKD','MMAMAM');
/*!40000 ALTER TABLE `educacion` ENABLE KEYS */;
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
  `email` varchar(150) DEFAULT NULL,
  `fecIngreso` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `idpapel` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `feccreate` datetime DEFAULT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES
(1,'Edgar','Apaza','edgarapazac@gmail.com','2021-04-15','935017466',1,1,'2021-04-15 00:00:00');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiencia`
--

LOCK TABLES `experiencia` WRITE;
/*!40000 ALTER TABLE `experiencia` DISABLE KEYS */;
INSERT INTO `experiencia` VALUES
(1,1,'MINSA','-5-2000','-12-2006',6,7),
(2,1,'CENTRO DE SALUD DE HUACULLANI','12-11-2006','31-12-2007',1,1),
(3,1,'hospital iii de santa anita','12-4-2009','15-9-2019',10,5),
(4,1,'HOSPITAL MANUEL NUñEZ BUTRON','-7-2001','-7-2009',8,0),
(5,1,'HOSPITAL REBAGLIATI','-4-2000','-6-2006',6,2),
(6,1,'UNO','23-4-2099','34-11-2999',900,7),
(7,1,'DOS','-3-2001','-6-2021',20,3),
(8,12,'','--','--',0,0),
(9,12,'TRES','-3-2999','-3-29999',27000,0),
(10,12,'KMLKASJDF','-3-2009','-12-2021',12,9);
/*!40000 ALTER TABLE `experiencia` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiaclinica`
--

LOCK TABLES `historiaclinica` WRITE;
/*!40000 ALTER TABLE `historiaclinica` DISABLE KEYS */;
INSERT INTO `historiaclinica` VALUES
(15,'40023528',16,'13/11/2021','2:43 PM',26,'','','','','','','','','','NO','NO','','NO','NO','','','6','20/80','','','','','','','MALO','P','','PASTILLAS','','','','','','','15/11/2021','','2021-11-13 14:44:22',2,'2021-11-13 14:44:22',1,NULL),
(16,'9857423',17,'13/11/2021','8:12 PM',45,'','','','','','','','','','NO','NO','','NO','NO','','','35','98/100','','','','','','','DIARREA','P','','2 CAPULAS','','','','','','','15/11/2021','','2021-11-13 20:13:06',2,'2021-11-13 20:13:06',1,NULL),
(17,'69857432',13,'09/11/2021','8:38 PM',45,'','','','','','','','','','NO','NO','','NO','NO','','','45','2','','','','','','','PPPP','P','','PPPP','','','','','','','15/11/2021','','2021-11-13 20:38:55',2,'2021-11-13 20:38:55',1,NULL),
(18,'69857432',13,'09/11/2021','8:38 PM',45,'','','','','','','','','','NO','NO','','NO','NO','','','45','2','','','','','','','PPPP','P','','PPPP','','','','','','','15/11/2021','','2021-11-13 20:42:43',2,'2021-11-13 20:42:43',1,NULL),
(19,'452163258',12,'14/11/2021','10:50 AM',35,'FUERTE DOLOR ADDOMINLA','DOLOR DE CABEZA','','','','','','','','NO','NO','','NO','NO','','','35','90/100','','','','','','','INFECCION ESTOMACAL / DIARREA','P','','DEBE TOMAR:\r\n1) DEXAMETAZOL 80 GR C/HORAS POR 5 DIAS\r\n   PRESENTACION DE VACUNAS Y \r\n2) IBUPROFENO C/8 HORAS   MAñA / TARDE / NOCHE\r\n3) LIQUIDOS ABUNDANTES\r\n4) SALES REHIDRATANTES','','','','','','','14/11/2021','','2021-11-14 10:54:31',2,'2021-11-14 10:54:31',1,NULL),
(22,'40023529',16,'27/11/2021','9:30 PM',34,'EXAMEN DE PAP NICOLAO','','','','','','','','','NO','NO','','NO','NO','','','34','108/100','','','','','','','NO SE ENCUENTRA NINGUN SINTOMA DE QUISTES EN EL OVARIO','P','','DESCANDO POR 3 DIAS','','','','','','','30/11/2021','','2021-11-27 21:31:51',7,'2021-11-27 21:31:51',1,NULL),
(23,'452163258',12,'27/11/2021','9:32 PM',26,'EXAMEN DE PAPA NICALOI','','','','','','','','','NO','NO','','NO','NO','','','35','108/100','','','','','','','NO SE ENCUENTRA NINGUN SINTOMA DE QUSITES','P','','DESCANSO POR 3 DIAS','','','','','','','29/11/2021','','2021-11-27 21:33:30',7,'2021-11-27 21:33:30',1,NULL);
/*!40000 ALTER TABLE `historiaclinica` ENABLE KEYS */;
UNLOCK TABLES;

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
  `idadmin` int(11) DEFAULT 0,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES
(1,'admin','21232f297a57a5a743894a0e4a801fc3',0,1,1,1,1),
(2,'pilar','202cb962ac59075b964b07152d234b70',1,0,2,1,0),
(3,'1','c4ca4238a0b923820dcc509a6f75849b',12,0,2,1,0),
(4,'ed','b5f3729e5418905ad2b21ce186b1c01d',13,0,2,1,0),
(5,'juan','202cb962ac59075b964b07152d234b70',14,0,2,1,0),
(6,'messi','eccbc87e4b5ce2fe28308fd9f2a7baf3',28,0,2,1,0),
(7,'messi','eccbc87e4b5ce2fe28308fd9f2a7baf3',29,0,2,1,0),
(8,'messi','eccbc87e4b5ce2fe28308fd9f2a7baf3',30,0,2,1,0),
(9,'qwe','c81e728d9d4c2f636f067f89cc14862c',31,0,2,1,0),
(10,'ee','a87ff679a2f3e71d9181a67b7542122c',32,0,2,1,0);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES
(1,'01247463','MARTHA','RIOS ARZUBIALDE','MARTHARIOS@HOTMAIL.COM','05/01/2021','FEMENINO','AV. LA CULTURA 204','TAQUILE','YUNGUYO','CUSCO','','972345678','UNIDAD.JPEG',1,'2021-05-23 08:09:02'),
(9,'65798798','MARTIN','SALAZAR QUISPE','UNO@GMAIL.COM','27/03/2002','MASCULINO','INKATIANA','PUNO','PUNO','ICHU','0','987984654','',1,'2021-11-08 22:33:14'),
(10,'98786542','ABEL','PACHO RIVAS','','08/02/2000','MASCULINO','ISLA ANAPIA','YUNGUYO','YUNGUYO','ANAPIA','0','654654','',1,'2021-11-08 22:33:52'),
(11,'32154546','ANDREA','SANTOS MIRAVAL','','10/02/1985','FEMENINO','ISLA DE LOS UROS','PUNO','PUNO','PUNO','0','234234','',1,'2021-11-08 22:34:29'),
(12,'452163258','BERTHA','MAMANI LIMA','','23/12/2000','FEMENINO','ISLA TAQUILE','PUNO','PUNO','PUNO','0','2342134','',1,'2021-11-08 22:35:05'),
(13,'69857432','CARLOS','PALAO QUISOCALA','ADSFAS@COM.COM','05/07/1969','MASCULINO','','','','','0','3453','',1,'2021-11-08 22:36:03'),
(14,'05621254','DANY','SONCO AGUILAR','ASDFKASD@HASHDS.COM','01/11/1981','FEMENINO','','','','','0','12','',1,'2021-11-08 22:36:35'),
(15,'6523897','DANIELA','SOTO PAREDES','UNO@JAJS.COM','08/11/2021','FEMENINO','','','','','0','22','',1,'2021-11-08 22:37:19'),
(16,'40023529','SANDRA','MAMANI TICA','SANDRA@GMAIL.COM','16/04/1979','FEMENINO','ISLA PUNTA CANA','PUNO','PUNO','PUNO','0','935017466','',1,'2021-11-08 22:37:48'),
(17,'9857423','ERIKA','SALAS BORU','CKAKS@MSMS.COM','06/06/1980','FEMENINO','','','','','0','2','',1,'2021-11-08 22:38:14'),
(18,'12536987','FILOMENA','QUISPE MAMANI','LADSJFDKAS@COM.COM','05/08/1999','FEMENINO','','','','','0','2','',1,'2021-11-08 22:38:56'),
(19,'98563214','GEORGINA','MARCOS TINTAYA','','08/11/2021','FEMENINO','','','','','0','6','',1,'2021-11-08 22:39:50'),
(20,'40023528','EDGAR','APAZA CHOQUE','EDGARAPAZAC@GMAIL.COM','15/04/1978','MASCULINO','PASAJE MANUEL ASENCION SEGURA 144','PUNO','PUNO','PUNO','0','935017466','',1,'2021-11-09 00:16:47'),
(30,'987653221','LUIS','VALCARCEL SANCHEZ','EUNO@A.COM','03/03/2022','MASCULINO','COMUNIDAD INKATIANA','PUNO','PUNO','UROS','0','951412363','./ASSETS/IMG/USER.JPG',1,'2022-03-17 01:03:37');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-17  2:45:28
