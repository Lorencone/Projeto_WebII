CREATE DATABASE  IF NOT EXISTS `filmes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `filmes`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: filmes
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

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
-- Table structure for table `classificacao`
--

DROP TABLE IF EXISTS `classificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificacao` (
  `id_classificacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `idade` int(11) NOT NULL,
  PRIMARY KEY (`id_classificacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificacao`
--

LOCK TABLES `classificacao` WRITE;
/*!40000 ALTER TABLE `classificacao` DISABLE KEYS */;
INSERT INTO `classificacao` VALUES (1,'Livre',0),(2,'10 anos',10);
/*!40000 ALTER TABLE `classificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_czech_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_equipe`),
  KEY `fk_equipe_pais1_idx` (`id_pais`),
  CONSTRAINT `fk_equipe_pais1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipe`
--

LOCK TABLES `equipe` WRITE;
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipe_trabalho`
--

DROP TABLE IF EXISTS `equipe_trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipe_trabalho` (
  `id_equipe_trabalho` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) NOT NULL,
  `id_trabalho` int(11) NOT NULL,
  PRIMARY KEY (`id_equipe_trabalho`),
  KEY `fk_equipe_trabalho_equipe1_idx` (`id_equipe`),
  KEY `fk_equipe_trabalho_trabalho1_idx` (`id_trabalho`),
  CONSTRAINT `fk_equipe_trabalho_equipe1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_trabalho_trabalho1` FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id_trabalho`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipe_trabalho`
--

LOCK TABLES `equipe_trabalho` WRITE;
/*!40000 ALTER TABLE `equipe_trabalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipe_trabalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme` (
  `id_filme` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `estreia` date NOT NULL,
  `estudio` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `bilheteria` int(11) DEFAULT NULL,
  `duracao` time NOT NULL,
  `sinopse` text COLLATE utf8_czech_ci NOT NULL,
  `critica` text COLLATE utf8_czech_ci,
  `trailer` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `assistir` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `indicacao` int(11) DEFAULT NULL,
  `gasto` int(11) DEFAULT NULL,
  `imagem` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `id_classificacao` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_filme`),
  KEY `fk_filme_classificacao1_idx` (`id_classificacao`),
  KEY `fk_filme_pais1_idx` (`id_pais`),
  CONSTRAINT `fk_filme_classificacao1` FOREIGN KEY (`id_classificacao`) REFERENCES `classificacao` (`id_classificacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_filme_pais1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme`
--

LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme_equipe_trabalho`
--

DROP TABLE IF EXISTS `filme_equipe_trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme_equipe_trabalho` (
  `id_filme_equipe_trabalho` int(11) NOT NULL AUTO_INCREMENT,
  `id_filme` int(11) NOT NULL,
  `id_equipe_trabalho` int(11) NOT NULL,
  PRIMARY KEY (`id_filme_equipe_trabalho`),
  KEY `fk_filme_equipe_trabalho_filme1_idx` (`id_filme`),
  KEY `fk_filme_equipe_trabalho_equipe_trabalho1_idx` (`id_equipe_trabalho`),
  CONSTRAINT `fk_filme_equipe_trabalho_equipe_trabalho1` FOREIGN KEY (`id_equipe_trabalho`) REFERENCES `equipe_trabalho` (`id_equipe_trabalho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_filme_equipe_trabalho_filme1` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id_filme`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme_equipe_trabalho`
--

LOCK TABLES `filme_equipe_trabalho` WRITE;
/*!40000 ALTER TABLE `filme_equipe_trabalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `filme_equipe_trabalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme_genero`
--

DROP TABLE IF EXISTS `filme_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme_genero` (
  `id_filme_genero` int(11) NOT NULL AUTO_INCREMENT,
  `id_filme` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_filme_genero`),
  KEY `fk_filme_genero_genero1_idx` (`id_genero`),
  KEY `fk_filme_genero_filme1_idx` (`id_filme`),
  CONSTRAINT `fk_filme_genero_filme1` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id_filme`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_filme_genero_genero1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme_genero`
--

LOCK TABLES `filme_genero` WRITE;
/*!40000 ALTER TABLE `filme_genero` DISABLE KEYS */;
/*!40000 ALTER TABLE `filme_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme_idioma`
--

DROP TABLE IF EXISTS `filme_idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme_idioma` (
  `id_filme_idioma` int(11) NOT NULL AUTO_INCREMENT,
  `id_filme` int(11) NOT NULL,
  `id_idioma` int(11) NOT NULL,
  PRIMARY KEY (`id_filme_idioma`),
  KEY `fk_filme_idioma_idioma1_idx` (`id_idioma`),
  KEY `fk_filme_idioma_filme1_idx` (`id_filme`),
  CONSTRAINT `fk_filme_idioma_filme1` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id_filme`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_filme_idioma_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `idioma` (`id_idioma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme_idioma`
--

LOCK TABLES `filme_idioma` WRITE;
/*!40000 ALTER TABLE `filme_idioma` DISABLE KEYS */;
/*!40000 ALTER TABLE `filme_idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme_legenda`
--

DROP TABLE IF EXISTS `filme_legenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme_legenda` (
  `id_filme_legenda` int(11) NOT NULL AUTO_INCREMENT,
  `id_filme` int(11) NOT NULL,
  `id_legenda` int(11) NOT NULL,
  PRIMARY KEY (`id_filme_legenda`),
  KEY `fk_filme_legenda_legenda1_idx` (`id_legenda`),
  KEY `fk_filme_legenda_filme1_idx` (`id_filme`),
  CONSTRAINT `fk_filme_legenda_filme1` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id_filme`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_filme_legenda_legenda1` FOREIGN KEY (`id_legenda`) REFERENCES `legenda` (`id_legenda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme_legenda`
--

LOCK TABLES `filme_legenda` WRITE;
/*!40000 ALTER TABLE `filme_legenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `filme_legenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `imagem` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Ação','ação.jpg'),(2,'Comédia','comedia.jpg');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idioma` (
  `id_idioma` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idioma`
--

LOCK TABLES `idioma` WRITE;
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
INSERT INTO `idioma` VALUES (1,'Inglês'),(2,'Espanhol');
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legenda`
--

DROP TABLE IF EXISTS `legenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legenda` (
  `id_legenda` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_legenda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legenda`
--

LOCK TABLES `legenda` WRITE;
/*!40000 ALTER TABLE `legenda` DISABLE KEYS */;
INSERT INTO `legenda` VALUES (1,'Inglês'),(2,'Português');
/*!40000 ALTER TABLE `legenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `caminho` varchar(100) NOT NULL,
  `publica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pagina`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina`
--

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` VALUES (1,'Login','usuario/login.php',1),(2,'Usuario','usuario/index.php',0),(3,'Formulario_Usuario','usuario/formulario.php',1),(4,'Trabalho','trabalho/index.php',0),(5,'Formulario_Trabalho','trabalho/formulario.php',0),(6,'Perfil','perfil/index.php',0),(7,'Formulario_Perfil','perfil/formulario.php',0),(8,'País','pais/index.php',0),(9,'Formulario_Pais','pais/formulario.php',0),(10,'Página','pagina/index.php',0),(11,'Formulario_Pagina','pagina/formulario.php',0),(12,'Legenda','legenda/index.php',0),(13,'Formulario_Legenda','legenda/formulario.php',0),(14,'Idioma','idioma/index.php',0),(15,'Formulario_Idioma','idioma/formulario.php',0),(16,'Genêro','genero/index.php',0),(17,'Formulario_Genero','genero/formulario.php',0),(18,'Filme','filme/index.php',0),(19,'Formulario_Filme','filme/formulario.php',0),(20,'Equipe','equipe/index.php',0),(21,'Formulario_Equipe','equipe/formulario.php',0),(22,'Classificação','classificacao/index.php',0),(23,'Formulario_Classificação','classificacao/formulario.php',0),(24,'Categoria','categoria/index.php',1),(25,'Categoria_Filmes','categoria/filmes.php',1),(26,'Categoria_descricao','categoria/descricao.php',1);
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'AFEGANISTÃO'),(2,'ACROTÍRI E DECELIA'),(3,'ÁFRICA DO SUL'),(4,'ALBÂNIA'),(5,'ALEMANHA'),(6,'AMERICAN SAMOA'),(7,'ANDORRA'),(8,'ANGOLA'),(9,'ANGUILLA'),(10,'ANTÍGUA E BARBUDA'),(11,'ANTILHAS NEERLANDESAS'),(12,'ARÁBIA SAUDITA'),(13,'ARGÉLIA'),(14,'ARGENTINA'),(15,'ARMÉNIA'),(16,'ARUBA'),(17,'AUSTRÁLIA'),(18,'ÁUSTRIA'),(19,'AZERBAIJÃO'),(20,'BAHAMAS'),(21,'BANGLADECHE'),(22,'BARBADOS'),(23,'BARÉM'),(24,'BASSAS DA ÍNDIA'),(25,'BÉLGICA'),(26,'BELIZE'),(27,'BENIM'),(28,'BERMUDAS'),(29,'BIELORRÚSSIA'),(30,'BOLÍVIA'),(31,'BÓSNIA E HERZEGOVINA'),(32,'BOTSUANA'),(33,'BRASIL'),(34,'BRUNEI DARUSSALAM'),(35,'BULGÁRIA'),(36,'BURQUINA FASO'),(37,'BURUNDI'),(38,'BUTÃO'),(39,'CABO VERDE'),(40,'CAMARÕES'),(41,'CAMBOJA'),(42,'CANADÁ'),(43,'CATAR'),(44,'CAZAQUISTÃO'),(45,'CENTRO-AFRICANA REPÚBLICA'),(46,'CHADE'),(47,'CHILE'),(48,'CHINA'),(49,'CHIPRE'),(50,'COLÔMBIA'),(51,'COMORES'),(52,'CONGO'),(53,'CONGO REPÚBLICA DEMOCRÁTICA'),(54,'COREIA DO NORTE'),(55,'COREIA DO SUL'),(56,'COSTA DO MARFIM'),(57,'COSTA RICA'),(58,'CROÁCIA'),(59,'CUBA'),(60,'DINAMARCA'),(61,'DOMÍNICA'),(62,'EGIPTO'),(63,'EMIRADOS ÁRABES UNIDOS'),(64,'EQUADOR'),(65,'ERITREIA'),(66,'ESLOVÁQUIA'),(67,'ESLOVÉNIA'),(68,'ESPANHA'),(69,'ESTADOS UNIDOS'),(70,'ESTÓNIA'),(71,'ETIÓPIA'),(72,'FAIXA DE GAZA'),(73,'FIJI'),(74,'FILIPINAS'),(75,'FINLÂNDIA'),(76,'FRANÇA'),(77,'GABÃO'),(78,'GÂMBIA'),(79,'GANA'),(80,'GEÓRGIA'),(81,'GIBRALTAR'),(82,'GRANADA'),(83,'GRÉCIA'),(84,'GRONELÂNDIA'),(85,'GUADALUPE'),(86,'GUAM'),(87,'GUATEMALA'),(88,'GUERNSEY'),(89,'GUIANA'),(90,'GUIANA FRANCESA'),(91,'GUINÉ'),(92,'GUINÉ EQUATORIAL'),(93,'GUINÉ-BISSAU'),(94,'HAITI'),(95,'HONDURAS'),(96,'HONG KONG'),(97,'HUNGRIA'),(98,'IÉMEN'),(99,'ILHA BOUVET'),(100,'ILHA CHRISTMAS'),(101,'ILHA DE CLIPPERTON'),(102,'ILHA DE JOÃO DA NOVA'),(103,'ILHA DE MAN'),(104,'ILHA DE NAVASSA'),(105,'ILHA EUROPA'),(106,'ILHA NORFOLK'),(107,'ILHA TROMELIN'),(108,'ILHAS ASHMORE E CARTIER'),(109,'ILHAS CAIMAN'),(110,'ILHAS COCOS (KEELING)'),(111,'ILHAS COOK'),(112,'ILHAS DO MAR DE CORAL'),(113,'ILHAS FALKLANDS (ILHAS MALVINAS)'),(114,'ILHAS FEROE'),(115,'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL'),(116,'ILHAS MARIANAS DO NORTE'),(117,'ILHAS MARSHALL'),(118,'ILHAS PARACEL'),(119,'ILHAS PITCAIRN'),(120,'ILHAS SALOMÃO'),(121,'ILHAS SPRATLY'),(122,'ILHAS VIRGENS AMERICANAS'),(123,'ILHAS VIRGENS BRITÂNICAS'),(124,'ÍNDIA'),(125,'INDONÉSIA'),(126,'IRÃO'),(127,'IRAQUE'),(128,'IRLANDA'),(129,'ISLÂNDIA'),(130,'ISRAEL'),(131,'ITÁLIA'),(132,'JAMAICA'),(133,'JAN MAYEN'),(134,'JAPÃO'),(135,'JERSEY'),(136,'JIBUTI'),(137,'JORDÂNIA'),(138,'KIRIBATI'),(139,'KOWEIT'),(140,'LAOS'),(141,'LESOTO'),(142,'LETÓNIA'),(143,'LÍBANO'),(144,'LIBÉRIA'),(145,'LÍBIA'),(146,'LISTENSTAINE'),(147,'LITUÂNIA'),(148,'LUXEMBURGO'),(149,'MACAU'),(150,'MACEDÓNIA'),(151,'MADAGÁSCAR'),(152,'MALÁSIA'),(153,'MALAVI'),(154,'MALDIVAS'),(155,'MALI'),(156,'MALTA'),(157,'MARROCOS'),(158,'MARTINICA'),(159,'MAURÍCIA'),(160,'MAURITÂNIA'),(161,'MAYOTTE'),(162,'MÉXICO'),(163,'MIANMAR'),(164,'MICRONÉSIA'),(165,'MOÇAMBIQUE'),(166,'MOLDÁVIA'),(167,'MÓNACO'),(168,'MONGÓLIA'),(169,'MONTENEGRO'),(170,'MONTSERRAT'),(171,'NAMÍBIA'),(172,'NAURU'),(173,'NEPAL'),(174,'NICARÁGUA'),(175,'NÍGER'),(176,'NIGÉRIA'),(177,'NIUE'),(178,'NORUEGA'),(179,'NOVA CALEDÓNIA'),(180,'NOVA ZELÂNDIA'),(181,'OMÃ'),(182,'PAÍSES BAIXOS'),(183,'PALAU'),(184,'PALESTINA'),(185,'PANAMÁ'),(186,'PAPUÁSIA-NOVA GUINÉ'),(187,'PAQUISTÃO'),(188,'PARAGUAI'),(189,'PERU'),(190,'POLINÉSIA FRANCESA'),(191,'POLÓNIA'),(192,'PORTO RICO'),(193,'PORTUGAL'),(194,'QUÉNIA'),(195,'QUIRGUIZISTÃO'),(196,'REINO UNIDO'),(197,'REPÚBLICA CHECA'),(198,'REPÚBLICA DOMINICANA'),(199,'ROMÉNIA'),(200,'RUANDA'),(201,'RÚSSIA'),(202,'SAHARA OCCIDENTAL'),(203,'SALVADOR'),(204,'SAMOA'),(205,'SANTA HELENA'),(206,'SANTA LÚCIA'),(207,'SANTA SÉ'),(208,'SÃO CRISTÓVÃO E NEVES'),(209,'SÃO MARINO'),(210,'SÃO PEDRO E MIQUELÃO'),(211,'SÃO TOMÉ E PRÍNCIPE'),(212,'SÃO VICENTE E GRANADINAS'),(213,'SEICHELES'),(214,'SENEGAL'),(215,'SERRA LEOA'),(216,'SÉRVIA'),(217,'SINGAPURA'),(218,'SÍRIA'),(219,'SOMÁLIA'),(220,'SRI LANCA'),(221,'SUAZILÂNDIA'),(222,'SUDÃO'),(223,'SUÉCIA'),(224,'SUÍÇA'),(225,'SURINAME'),(226,'SVALBARD'),(227,'TAILÂNDIA'),(228,'TAIWAN'),(229,'TAJIQUISTÃO'),(230,'TANZÂNIA'),(231,'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO'),(232,'TERRITÓRIO DAS ILHAS HEARD E MCDONALD'),(233,'TIMOR-LESTE'),(234,'TOGO'),(235,'TOKELAU'),(236,'TONGA'),(237,'TRINDADE E TOBAGO'),(238,'TUNÍSIA'),(239,'TURKS E CAICOS'),(240,'TURQUEMENISTÃO'),(241,'TURQUIA'),(242,'TUVALU'),(243,'UCRÂNIA'),(244,'UGANDA'),(245,'URUGUAI'),(246,'USBEQUISTÃO'),(247,'VANUATU'),(248,'VENEZUELA'),(249,'VIETNAME'),(250,'WALLIS E FUTUNA'),(251,'ZÂMBIA'),(252,'ZIMBABUÉ');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Usuario'),(2,'Editor'),(3,'Administrativo');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  PRIMARY KEY (`id_permissao`),
  KEY `fk_permissao_perfil1_idx` (`id_perfil`),
  KEY `fk_permissao_pagina1_idx` (`id_pagina`),
  CONSTRAINT `fk_permissao_pagina1` FOREIGN KEY (`id_pagina`) REFERENCES `pagina` (`id_pagina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,1,1),(2,2,1),(3,3,1),(4,3,2),(7,3,3),(8,2,4),(9,3,4),(10,2,5),(11,3,5),(12,3,6),(13,3,7),(14,2,8),(15,3,8),(16,2,9),(17,3,9),(18,3,10),(19,3,11),(20,2,12),(21,3,12),(22,2,13),(23,3,13),(24,2,14),(25,3,14),(26,2,15),(27,3,15),(28,2,16),(29,3,16),(30,2,17),(31,3,17),(32,2,18),(33,3,18),(34,2,19),(35,3,19),(36,2,20),(37,3,20),(38,2,21),(39,3,21),(40,2,22),(41,3,22),(42,2,23),(43,3,23),(44,1,24),(45,2,24),(46,3,24),(47,1,25),(48,2,25),(49,3,25),(50,1,26),(51,2,26),(52,3,26);
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabalho`
--

DROP TABLE IF EXISTS `trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabalho` (
  `id_trabalho` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_trabalho`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabalho`
--

LOCK TABLES `trabalho` WRITE;
/*!40000 ALTER TABLE `trabalho` DISABLE KEYS */;
INSERT INTO `trabalho` VALUES (1,'Atores'),(2,'Diretor');
/*!40000 ALTER TABLE `trabalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_perfil1_idx` (`id_perfil`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Mateus Lorençone Moreira','mateus@iesb.br','827ccb0eea8a706c4c34a16891f84e7b',3),(2,'Israel Carlos','israel@iesb.br','827ccb0eea8a706c4c34a16891f84e7b',2),(3,'Anderson Andre','andre@iesb.br','827ccb0eea8a706c4c34a16891f84e7b',1);
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

-- Dump completed on 2018-11-20 11:27:26
