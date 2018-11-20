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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-20 11:26:07
