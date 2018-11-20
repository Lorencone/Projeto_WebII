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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-20  1:12:09
