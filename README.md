# Site-Simples-PHP

## Feedback 

Não consegui executar seu projeto. Além de não ter um README.md explicando como o site funciona, as fixtures não criam as páginas.

## Explicações

1. Criei uma tabela no banco de dados chamada pagina e colunas =>(id, pagina(nome da pagina), rota(path) e conteudo(conteudo interno da pagina));
2. Criei uma página conteudo que faz um select no banco de dados trazendo o conteudo referente a página solicitada na rota (url do browser);
3. Assim eliminei as seguintes páginas (home, empresa, produtos e serviços) substituindo-as pela página conteúdo.
4. A fixture faz a mesma coisa que a que vocês criaram no vídeo uma tabela teste. colunas=> (id, nome) e faz os inserts nessa tabela.

## Abaixo segue meu BD exportado (Caso possa importar para não precisar criar uma nova fixture para esse BD agradeço e não for possível me fala que crio uma fixture):

CREATE DATABASE  IF NOT EXISTS `site_simples` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `site_simples`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: site_simples
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.10.1

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
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagina` varchar(50) NOT NULL,
  `rota` varchar(255) NOT NULL,
  `conteudo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (1,'home','src/home','Home'),(2,'empresa','src/empresa','Empresa'),(3,'contato','src/contato','Contato'),(4,'produtos','src/produto','Produtos'),(5,'servicos','src/servicos','Serviços'),(6,'exibe_dados','exibe_dados',NULL);
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-06 16:27:52


