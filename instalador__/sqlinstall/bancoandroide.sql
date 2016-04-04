-- MySQL dump 10.13  Distrib 5.6.27, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: cmsdroide
-- ------------------------------------------------------
-- Server version	5.6.27-0ubuntu1

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
-- Table structure for table `csdm_adm_config`
--

DROP TABLE IF EXISTS `csdm_adm_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcao_mail_smtp` int(11) NOT NULL,
  `default_email` varchar(100) NOT NULL,
  `email_smtp` varchar(100) NOT NULL,
  `servidor_smtp` varchar(45) NOT NULL,
  `porta` int(11) NOT NULL,
  `requer_autenticacao` tinyint(2) NOT NULL,
  `ativar_cron` tinyint(2) NOT NULL,
  `url_cron` varchar(45) NOT NULL,
  `exec_segundos` int(11) NOT NULL,
  `manutencao_site` tinyint(2) NOT NULL,
  `exbir_previa_tempo_horas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_config`
--

LOCK TABLES `csdm_adm_config` WRITE;
/*!40000 ALTER TABLE `csdm_adm_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `csdm_adm_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_adm_emails_sys`
--

DROP TABLE IF EXISTS `csdm_adm_emails_sys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_emails_sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `tipo_form` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_emails_sys`
--

LOCK TABLES `csdm_adm_emails_sys` WRITE;
/*!40000 ALTER TABLE `csdm_adm_emails_sys` DISABLE KEYS */;
/*!40000 ALTER TABLE `csdm_adm_emails_sys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_adm_grupos`
--

DROP TABLE IF EXISTS `csdm_adm_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `atrib_permissoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_grupos`
--

LOCK TABLES `csdm_adm_grupos` WRITE;
/*!40000 ALTER TABLE `csdm_adm_grupos` DISABLE KEYS */;
INSERT INTO `csdm_adm_grupos` VALUES (1,'Super user','');
/*!40000 ALTER TABLE `csdm_adm_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_adm_menu`
--

DROP TABLE IF EXISTS `csdm_adm_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parente` int(11) NOT NULL,
  `item_nome` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `ordem` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `detectar_recurso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_menu`
--

LOCK TABLES `csdm_adm_menu` WRITE;
/*!40000 ALTER TABLE `csdm_adm_menu` DISABLE KEYS */;
INSERT INTO `csdm_adm_menu` VALUES (1,0,'Painel de controle','/_adm/painel','fa fa-tachometer',0,1,0),(2,0,'Gerenciador de conteúdo','#','fa fa-book',0,1,0),(3,2,'Categorias','gerenciadorconteudo/categorias','',0,1,0),(4,2,'Conteúdo','gerenciadorconteudo/conteudo','',0,1,0),(5,0,'Gerenciador de Mídias','/_adm/mediamanager/','fa fa-camera-retro',0,1,0),(6,0,'Gerenciador de usuários','#','fa fa-users',0,1,0),(7,0,'Configurações','#','fa fa-cogs',0,1,0),(8,6,'Administradores','/_adm/usermanager/admins','',0,1,0),(9,6,'Assinantes','/_adm/usermanager/assinantes','',0,1,0),(10,7,'Temas','/_adm/confmanager/temas','',0,1,0),(11,7,'Sistema','/_adm/confmanager/sistema','',0,1,0),(12,7,'Métodos de pagamento','/_adm/metodospagamento/','',0,1,0);
/*!40000 ALTER TABLE `csdm_adm_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_adm_methods`
--

DROP TABLE IF EXISTS `csdm_adm_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `url_acesso` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_methods`
--

LOCK TABLES `csdm_adm_methods` WRITE;
/*!40000 ALTER TABLE `csdm_adm_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `csdm_adm_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_adm_recursos`
--

DROP TABLE IF EXISTS `csdm_adm_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `url_recurso` varchar(100) NOT NULL,
  `niveis_grupos` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_recursos`
--

LOCK TABLES `csdm_adm_recursos` WRITE;
/*!40000 ALTER TABLE `csdm_adm_recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `csdm_adm_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_adm_user`
--

DROP TABLE IF EXISTS `csdm_adm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_adm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupos_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `parametros_extra` text NOT NULL,
  `status_acesso` tinyint(2) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_ult_acesso` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_adm_user`
--

LOCK TABLES `csdm_adm_user` WRITE;
/*!40000 ALTER TABLE `csdm_adm_user` DISABLE KEYS */;
INSERT INTO `csdm_adm_user` VALUES (1,1,'André Luiz','$2y$13$R.EeZL3yze.oJCiDlr32DuOvqNvpCl2nY.aIITx7Ik3p/nGsViOq2','and4563@gmail.com','','',1,'2015-11-19 07:33:01','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `csdm_adm_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_categorias_conteudo`
--

DROP TABLE IF EXISTS `csdm_categorias_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_categorias_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linguagem_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `dt_criacao` datetime NOT NULL,
  `status` tinyint(2) NOT NULL,
  `parametros_extra` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_categorias_conteudo`
--

LOCK TABLES `csdm_categorias_conteudo` WRITE;
/*!40000 ALTER TABLE `csdm_categorias_conteudo` DISABLE KEYS */;
INSERT INTO `csdm_categorias_conteudo` VALUES (2,1,'Conteúdos Institucionais','conteudos-institucionais','2015-12-22 02:20:04',1,''),(3,1,'Blog','blog','2015-12-22 02:22:26',1,'');
/*!40000 ALTER TABLE `csdm_categorias_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_conteudo`
--

DROP TABLE IF EXISTS `csdm_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorias_conteudo_id` int(11) NOT NULL,
  `linguagem_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `alias` varchar(70) NOT NULL,
  `texto_introdutorio` text NOT NULL,
  `imagem_pre` varchar(100) NOT NULL,
  `imagem_pos` varchar(100) DEFAULT NULL,
  `autor` varchar(100) NOT NULL,
  `parametros_extra` text NOT NULL,
  `dt_publicacao` datetime NOT NULL,
  `texto_completo` text NOT NULL,
  `destaque` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_conteudo`
--

LOCK TABLES `csdm_conteudo` WRITE;
/*!40000 ALTER TABLE `csdm_conteudo` DISABLE KEYS */;
INSERT INTO `csdm_conteudo` VALUES (1,3,1,1,'Novo CMS','novo-cms','Criado para ajudar no desenvolvimento de sistemas','',NULL,'André Luiz','','2015-12-31 02:46:13','<p>Ajuda <strong>principalmente</strong> na parte complexa de autentica&ccedil;&atilde;o de usu&aacute;rios.</p>\n\n<p>E prove melhorias na criacao de conteudo de blog como este.</p>',0);
/*!40000 ALTER TABLE `csdm_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_linguagem`
--

DROP TABLE IF EXISTS `csdm_linguagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_linguagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_linguagem`
--

LOCK TABLES `csdm_linguagem` WRITE;
/*!40000 ALTER TABLE `csdm_linguagem` DISABLE KEYS */;
INSERT INTO `csdm_linguagem` VALUES (1,'Português Brasil','br','pt-BR',1);
/*!40000 ALTER TABLE `csdm_linguagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `csdm_user`
--

DROP TABLE IF EXISTS `csdm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `csdm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `parametros` text NOT NULL,
  `status_acesso` tinyint(2) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_ult_acesso` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `csdm_user`
--

LOCK TABLES `csdm_user` WRITE;
/*!40000 ALTER TABLE `csdm_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `csdm_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-27 21:07:50
