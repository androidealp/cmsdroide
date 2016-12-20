-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 192.168.1.35    Database: bd_amormeu
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `xsdml_adm_config`
--

DROP TABLE IF EXISTS `xsdml_adm_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_adm_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `encryption` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `key_remote_access` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_adm_config`
--

LOCK TABLES `xsdml_adm_config` WRITE;
/*!40000 ALTER TABLE `xsdml_adm_config` DISABLE KEYS */;
INSERT INTO `xsdml_adm_config` VALUES (1,'mail.next4host.com.br','teste@next4host.com.br','p1¬b°ôD(lH#Z¯59d143d47f4af96cf78b2d370bcb1fa746f888868cda3c7fd09b0552e2e1dea9wMõP®ùüëAÖïÞ8æ*çóL\\\n¸Ú¯(,K¨',25,'none','dsfdssd54dsd4sd4f');
/*!40000 ALTER TABLE `xsdml_adm_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_adm_grupos`
--

DROP TABLE IF EXISTS `xsdml_adm_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_adm_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `menu_permissoes` text NOT NULL,
  `atrib_permissoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_adm_grupos`
--

LOCK TABLES `xsdml_adm_grupos` WRITE;
/*!40000 ALTER TABLE `xsdml_adm_grupos` DISABLE KEYS */;
INSERT INTO `xsdml_adm_grupos` VALUES (1,'Administrator','[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\"]','[\"editar\",\"criar\",\"deletar\",\"avaliar_comentarios\",\"alertas_sistema\",\"receber_contatos\",\"receber_news\"]'),(2,'Editor de conteúdo','[\"1\",\"2\",\"3\",\"4\"]','[\"criar\"]'),(4,'Publicador','[\"1\",\"2\",\"3\"]','[\"editar\"]');
/*!40000 ALTER TABLE `xsdml_adm_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_adm_menu`
--

DROP TABLE IF EXISTS `xsdml_adm_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_adm_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parente` int(11) NOT NULL,
  `item_nome` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `ordem` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `detectar_recurso` tinyint(2) NOT NULL,
  `controller` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_adm_menu`
--

LOCK TABLES `xsdml_adm_menu` WRITE;
/*!40000 ALTER TABLE `xsdml_adm_menu` DISABLE KEYS */;
INSERT INTO `xsdml_adm_menu` VALUES (1,0,'Painel de controle','painel/','fa fa-tachometer',0,1,0,'painel','index'),(2,0,'Gerenciador de conteúdo','#','fa fa-book',0,1,0,'gerenciadorconteudo',''),(3,2,'Categorias','gerenciadorconteudo/categorias','',0,1,0,'gerenciadorconteudo','categorias'),(4,2,'Conteúdo','gerenciadorconteudo/conteudo','',0,1,0,'gerenciadorconteudo','conteudo'),(5,0,'Gerenciador de Mídias','mediamanager/','fa fa-camera-retro',0,1,0,'mediamanager','index'),(6,0,'Gerenciador de usuários','#','fa fa-users',0,1,0,'usermanager',''),(7,0,'Configurações','#','fa fa-cogs',0,1,0,'confmanager',''),(8,6,'Administradores','usermanager/admins','',0,1,0,'usermanager','admins'),(9,6,'Assinantes','usermanager/assinantes','',0,1,0,'usermanager','assinantes'),(10,7,'Temas','confmanager/temas','',0,1,0,'confmanager','temas'),(11,7,'Sistema','confmanager/sistema','',0,1,0,'confmanager','sistema'),(12,7,'Métodos de pagamento','metodospagamento/','',0,1,0,'metodospagamento',''),(13,0,'WidgetEffects','widget-effects/','fa fa-cubes',0,1,0,'widget-effects',''),(14,2,'Comentários','gerenciadorconteudo/comentarios','',0,1,0,'gerenciadorconteudo','comentarios');
/*!40000 ALTER TABLE `xsdml_adm_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_adm_user`
--

DROP TABLE IF EXISTS `xsdml_adm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_adm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupos_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `status_acesso` tinyint(2) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_ult_acesso` datetime NOT NULL,
  `parametros_extra` text NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_xsdml_adm_user_xsdml_adm_grupos_idx` (`grupos_id`),
  CONSTRAINT `fk_xsdml_adm_user_xsdml_adm_grupos` FOREIGN KEY (`grupos_id`) REFERENCES `xsdml_adm_grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_adm_user`
--

LOCK TABLES `xsdml_adm_user` WRITE;
/*!40000 ALTER TABLE `xsdml_adm_user` DISABLE KEYS */;
INSERT INTO `xsdml_adm_user` VALUES (1,1,'Admin','andre@next4.net.br','$2y$13$R.EeZL3yze.oJCiDlr32DuOvqNvpCl2nY.aIITx7Ik3p/nGsViOq2','',1,'2016-01-12 00:00:00','0000-00-00 00:00:00','','',''),(2,1,'Ricardo','ricardo@next4.com.br','$2y$13$5sspklK/.U/xeQw5lQCkM.z0T.Lyrl4rPuVM0ho3TEeYKvxT2Mo16','media/mustafary.jpg',1,'2016-12-01 14:21:53','0000-00-00 00:00:00','','Programador','Este é o Ser Humaninho ricardo, baiano que caiu da espaçonave.'),(4,2,'João','joao@amormeu.com.br','$2y$13$7oWbmdTNT5szTDvGY0reXuVyMPyQs6KDN73HkDk.1e/XzE.qdbJHi','',1,'2016-12-12 17:38:57','0000-00-00 00:00:00','','Jornalista','');
/*!40000 ALTER TABLE `xsdml_adm_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_buscas`
--

DROP TABLE IF EXISTS `xsdml_buscas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_buscas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `termo` varchar(100) NOT NULL,
  `dt_criacao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_buscas`
--

LOCK TABLES `xsdml_buscas` WRITE;
/*!40000 ALTER TABLE `xsdml_buscas` DISABLE KEYS */;
/*!40000 ALTER TABLE `xsdml_buscas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_categorias_conteudo`
--

DROP TABLE IF EXISTS `xsdml_categorias_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_categorias_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linguagem_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `dt_criacao` datetime NOT NULL,
  `status` tinyint(2) NOT NULL,
  `parametros_extra` text NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_xsdml_categorias_conteudo_xsdml_linguagem1_idx` (`linguagem_id`),
  CONSTRAINT `fk_xsdml_categorias_conteudo_xsdml_linguagem1` FOREIGN KEY (`linguagem_id`) REFERENCES `xsdml_linguagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_categorias_conteudo`
--

LOCK TABLES `xsdml_categorias_conteudo` WRITE;
/*!40000 ALTER TABLE `xsdml_categorias_conteudo` DISABLE KEYS */;
INSERT INTO `xsdml_categorias_conteudo` VALUES (1,1,'Institucional','institucional','2016-11-29 16:33:45',1,'{\"size_imagem_intro\":\"500|360\",\"size_imagem_content\":\"860|500\"}',NULL),(2,1,'Blog','blog','2016-12-08 17:53:40',1,'{\"size_imagem_intro\":\"500|350\",\"size_imagem_content\":\"870|480\",\"seo_keywords\":\"Blog amormeu, relacionamentos, meu encontro, dicas de relacionamentos, primeiro encontro\",\"seo_description\":\"O blog para verificar novidades e dicas de relacionamentos, para manter ou primeiro encontro.\"}',NULL),(4,1,'Primeiro encontro teste','primeiro-encontro-teste','2016-12-12 17:14:22',1,'{\"size_imagem_intro\":\"510|350\",\"size_imagem_content\":\"870|480\",\"seo_keywords\":\"\",\"seo_description\":\"\"}',2),(6,1,'Romance','romance','2016-11-29 16:33:27',1,'{\"size_imagem_intro\":\"510|350\",\"size_imagem_content\":\"870|480\"}',2),(7,1,'Eventos','eventos','2016-12-06 16:45:03',1,'',2),(8,1,'Amizades','amizades','2016-12-06 16:45:52',1,'',2),(9,1,'Paqueras','paqueras','2016-12-06 16:46:37',0,'',2),(10,1,'Encontro','encontro','2016-12-12 18:27:17',1,'{\"size_imagem_intro\":\"500|360\",\"size_imagem_content\":\"860|500\",\"seo_keywords\":\"\",\"seo_description\":\"\"}',2);
/*!40000 ALTER TABLE `xsdml_categorias_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_comentarios`
--

DROP TABLE IF EXISTS `xsdml_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_comentarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(45) NOT NULL,
  `mensagem` text NOT NULL,
  `dt_publicacao` datetime NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `status_comentario` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_comentarios`
--

LOCK TABLES `xsdml_comentarios` WRITE;
/*!40000 ALTER TABLE `xsdml_comentarios` DISABLE KEYS */;
INSERT INTO `xsdml_comentarios` VALUES (10,'mensagem com sucesso','isso foi salvo agora','2016-12-13 11:14:50',2,1),(11,'teste nova mensagem','agora recebo e-mail','2016-12-13 13:19:30',2,1);
/*!40000 ALTER TABLE `xsdml_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_comentarios_has_user`
--

DROP TABLE IF EXISTS `xsdml_comentarios_has_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_comentarios_has_user` (
  `comentarios_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`comentarios_id`,`user_id`),
  KEY `fk_xsdml_comentarios_has_xsdml_user_xsdml_user1_idx` (`user_id`),
  KEY `fk_xsdml_comentarios_has_xsdml_user_xsdml_comentarios1_idx` (`comentarios_id`),
  CONSTRAINT `fk_xsdml_comentarios_has_xsdml_user_xsdml_comentarios1` FOREIGN KEY (`comentarios_id`) REFERENCES `xsdml_comentarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_xsdml_comentarios_has_xsdml_user_xsdml_user1` FOREIGN KEY (`user_id`) REFERENCES `xsdml_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_comentarios_has_user`
--

LOCK TABLES `xsdml_comentarios_has_user` WRITE;
/*!40000 ALTER TABLE `xsdml_comentarios_has_user` DISABLE KEYS */;
INSERT INTO `xsdml_comentarios_has_user` VALUES (10,16),(11,16);
/*!40000 ALTER TABLE `xsdml_comentarios_has_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_compartilhe`
--

DROP TABLE IF EXISTS `xsdml_compartilhe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_compartilhe` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_do_remetente` bigint(20) NOT NULL,
  `nome_remetente` varchar(150) NOT NULL,
  `email_remetente` varchar(150) NOT NULL,
  `email_do_amigo` varchar(150) NOT NULL,
  `data_de_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash_email` varchar(250) NOT NULL,
  `status_confirme_email` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COMMENT='Tabela para armazer convites de amigos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_compartilhe`
--

LOCK TABLES `xsdml_compartilhe` WRITE;
/*!40000 ALTER TABLE `xsdml_compartilhe` DISABLE KEYS */;
INSERT INTO `xsdml_compartilhe` VALUES (48,0,'fsdfjjyuturewrwe rwerwe','Emai@email.com.br','emailamigo@com.br','2016-12-09 10:22:47','0QsfrUKVVmW5VLanUjtfQAV7XcJYyIIT',0);
/*!40000 ALTER TABLE `xsdml_compartilhe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_conteudo`
--

DROP TABLE IF EXISTS `xsdml_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorias_conteudo_id` int(11) NOT NULL,
  `linguagem_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `alias` varchar(70) NOT NULL,
  `texto_introdutorio` varchar(250) NOT NULL,
  `conteudo_total` text NOT NULL,
  `imagem_pre` varchar(100) NOT NULL,
  `imagem_pos` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `dt_publicacao` datetime NOT NULL,
  `dt_criacao` datetime NOT NULL,
  `parametros_extra` text NOT NULL,
  `destaque` tinyint(2) NOT NULL DEFAULT '0',
  `id_autor` bigint(20) NOT NULL DEFAULT '0',
  `video_url` varchar(100) NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_xsdml_conteudo_xsdml_categorias_conteudo1_idx` (`categorias_conteudo_id`),
  KEY `fk_xsdml_conteudo_xsdml_linguagem1_idx` (`linguagem_id`),
  CONSTRAINT `fk_xsdml_conteudo_xsdml_categorias_conteudo1` FOREIGN KEY (`categorias_conteudo_id`) REFERENCES `xsdml_categorias_conteudo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_xsdml_conteudo_xsdml_linguagem1` FOREIGN KEY (`linguagem_id`) REFERENCES `xsdml_linguagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_conteudo`
--

LOCK TABLES `xsdml_conteudo` WRITE;
/*!40000 ALTER TABLE `xsdml_conteudo` DISABLE KEYS */;
INSERT INTO `xsdml_conteudo` VALUES (1,1,1,1,'Quem somos','quem-somos','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, apliquei mais informacao. mais elementos.','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n','','','Admin','2016-12-16 10:27:45','2016-11-28 15:27:49','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\",\"seo_keywords\":\"quem somos, sobre n\\u00f3s, sobre o amor meu, sobre a empresa amor meu\",\"seo_description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, apliquei mais informacao. mais elementos.\"}',0,1,'https://www.youtube.com/watch?v=kPLXS8arK8A',38),(2,4,1,1,'Como reagir ao primeiro encontro','como-reagir-ao-primeiro-encontro','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n','media/primeiro-encontro.jpg','media/primeiro-encontro-full.jpg','Admin','2016-11-30 11:47:50','2016-11-28 19:21:47','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\"}',0,1,'',200),(3,2,1,1,'Titulo do blog do artigo','titulo-do-blog-do-artigo','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n','media/primeiro-encontro.jpg','','Admin','2016-12-07 19:13:04','2016-12-06 10:34:24','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\"}',0,1,'',1),(4,2,1,1,'Titulo do blog do artigo 2','titulo-do-blog-do-artigo-2','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n','media/posts-blog/place3-full.jpg','','Admin','2016-12-08 11:51:08','2016-12-06 10:35:12','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\"}',0,1,'',2),(5,8,1,1,'Titulo do artigo 2','titulo-do-artigo-2','É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação.','<p><strong>Lorem Ipsum</strong>&nbsp;&eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu n&atilde;o s&oacute; a cinco s&eacute;culos, como tamb&eacute;m ao salto para a editora&ccedil;&atilde;o eletr&ocirc;nica, permanecendo essencialmente inalterado. Se popularizou na d&eacute;cada de 60, quando a Letraset lan&ccedil;ou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editora&ccedil;&atilde;o eletr&ocirc;nica como Aldus PageMaker</p>','','','Ricardo','2016-12-07 10:15:09','2016-12-07 10:15:09','',0,2,'',25),(6,8,1,1,'Richard McClintock, um professor de latim','richard-mcclintock-um-professor-de-latim-do-hampden-sydney-college','Existem muitas variações disponíveis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteração, seja por inserção de passagens com humor, ou palavras aleatórias que não parecem nem um ','<p>Ao contr&aacute;rio do que se acredita, Lorem Ipsum n&atilde;o &eacute; simplesmente um texto rand&ocirc;mico. Com mais de 2000 anos, suas ra&iacute;zes podem ser encontradas em uma obra de literatura latina cl&aacute;ssica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre cita&ccedil;&otilde;es da palavra na literatura cl&aacute;ssica, descobriu a sua indubit&aacute;vel origem. Lorem Ipsum vem das se&ccedil;&otilde;es 1.10.32 e 1.10.33 do &quot;de Finibus Bonorum et Malorum&quot; (Os Extremos do Bem e do Mal), de C&iacute;cero, escrito em 45 AC. Este livro &eacute; um tratado de teoria da &eacute;tica muito popular na &eacute;poca da Renascen&ccedil;a. A primeira linha de Lorem Ipsum, &quot;Lorem Ipsum dolor sit amet...&quot; vem de uma linha na se&ccedil;&atilde;o 1.10.32.</p>\r\n\r\n<p>O trecho padr&atilde;o original de Lorem Ipsum, usado desde o s&eacute;culo XVI, est&aacute; reproduzido abaixo para os interessados. Se&ccedil;&otilde;es 1.10.32 e 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot; de Cicero tamb&eacute;m foram reproduzidas abaixo em sua forma exata original, acompanhada das vers&otilde;es para o ingl&ecirc;s da tradu&ccedil;&atilde;o feita por H. Rackham em 1914.</p>\r\n','','','Ricardo','2016-12-07 16:00:14','2016-12-07 10:27:58','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\"}',0,2,'',8),(7,2,1,1,'Artigo fsdfsdfsdfsdfs','artigo-fsdfsdfsdfsdfs','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n','','','Ricardo','2016-12-07 15:27:35','2016-12-07 15:25:03','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\"}',0,2,'',5),(8,10,1,1,'Teste','teste','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','<p><strong>Lorem ipsum dolor sit</strong> amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>\r\n','media/posts-blog/redes-sociais1.jpg','','Admin','2016-12-12 17:30:08','2016-12-12 17:22:22','{\"ativar_titulo\":\"1\",\"ativar_comentario\":\"1\",\"ativar_redes_sociais\":\"1\",\"seo_keywords\":\"\",\"seo_description\":\"\"}',0,1,'https://www.youtube.com/watch?v=5UoAIXIlTnk',3);
/*!40000 ALTER TABLE `xsdml_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_estados`
--

DROP TABLE IF EXISTS `xsdml_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_estados`
--

LOCK TABLES `xsdml_estados` WRITE;
/*!40000 ALTER TABLE `xsdml_estados` DISABLE KEYS */;
INSERT INTO `xsdml_estados` VALUES (1,'AC'),(2,'AL'),(3,'AP'),(4,'AM'),(5,'BA'),(6,'CE'),(7,'DF'),(8,'ES'),(9,'GO'),(10,'MA'),(11,'MT'),(12,'MS'),(13,'MG'),(14,'PA'),(15,'PB'),(16,'PR'),(17,'PE'),(18,'PI'),(19,'RJ'),(20,'RN'),(21,'RS'),(22,'RO'),(23,'RR'),(24,'SC'),(25,'SP'),(26,'SE'),(27,'TO');
/*!40000 ALTER TABLE `xsdml_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_ip_bloqueado`
--

DROP TABLE IF EXISTS `xsdml_ip_bloqueado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_ip_bloqueado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) NOT NULL,
  `campo_login` varchar(100) NOT NULL,
  `data_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash_desative` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_ip_bloqueado`
--

LOCK TABLES `xsdml_ip_bloqueado` WRITE;
/*!40000 ALTER TABLE `xsdml_ip_bloqueado` DISABLE KEYS */;
/*!40000 ALTER TABLE `xsdml_ip_bloqueado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_linguagem`
--

DROP TABLE IF EXISTS `xsdml_linguagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_linguagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_linguagem`
--

LOCK TABLES `xsdml_linguagem` WRITE;
/*!40000 ALTER TABLE `xsdml_linguagem` DISABLE KEYS */;
INSERT INTO `xsdml_linguagem` VALUES (1,'Português','pt-BR','pt-BR',1);
/*!40000 ALTER TABLE `xsdml_linguagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_list_permissoes`
--

DROP TABLE IF EXISTS `xsdml_list_permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_list_permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_list_permissoes`
--

LOCK TABLES `xsdml_list_permissoes` WRITE;
/*!40000 ALTER TABLE `xsdml_list_permissoes` DISABLE KEYS */;
INSERT INTO `xsdml_list_permissoes` VALUES (1,'editar'),(2,'criar'),(3,'deletar'),(4,'avaliar_comentarios'),(5,'alertas_sistema'),(6,'receber_contatos'),(7,'receber_news');
/*!40000 ALTER TABLE `xsdml_list_permissoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_newsletter`
--

DROP TABLE IF EXISTS `xsdml_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_newsletter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `black_list` tinyint(2) NOT NULL,
  `dt_criacao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_newsletter`
--

LOCK TABLES `xsdml_newsletter` WRITE;
/*!40000 ALTER TABLE `xsdml_newsletter` DISABLE KEYS */;
INSERT INTO `xsdml_newsletter` VALUES (1,'fdsfsdffsdfdsf','fsdf@amau.com.br',0,'2016-12-08 15:21:30'),(8,'fdsfsdffsdfdsf','fsdf@email.com.br',0,'2016-12-09 10:31:58'),(9,'Ricardo Lopes','ricardo@next4.com.br',0,'2016-12-09 15:19:17'),(10,'fdsfsdffsdfdsf','fsdf@rererwe.com.br',0,'2016-12-09 15:21:43'),(11,'fdsfsdffsdfdsf','fsdffsdfs@email.com',0,'2016-12-09 15:22:08'),(12,'fdsfsdffsdfdsf','Email@email.com.br',0,'2016-12-09 15:22:42'),(13,'andre','and4563@gmail.com',0,'2016-12-14 17:05:59'),(14,'andre','and4563@gmail.com',0,'2016-12-14 17:06:49'),(15,'andre','joroao@gmail.com',0,'2016-12-14 17:10:42');
/*!40000 ALTER TABLE `xsdml_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_perfil`
--

DROP TABLE IF EXISTS `xsdml_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_perfil`
--

LOCK TABLES `xsdml_perfil` WRITE;
/*!40000 ALTER TABLE `xsdml_perfil` DISABLE KEYS */;
INSERT INTO `xsdml_perfil` VALUES (1,'Registrado');
/*!40000 ALTER TABLE `xsdml_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_respostas`
--

DROP TABLE IF EXISTS `xsdml_respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_respostas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comentarios_id` bigint(20) NOT NULL,
  `resposta` text NOT NULL,
  `status_resposta` tinyint(2) NOT NULL,
  `dt_resposta` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_xsdml_respostas_xsdml_comentarios1_idx` (`comentarios_id`),
  CONSTRAINT `fk_xsdml_respostas_xsdml_comentarios1` FOREIGN KEY (`comentarios_id`) REFERENCES `xsdml_comentarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_respostas`
--

LOCK TABLES `xsdml_respostas` WRITE;
/*!40000 ALTER TABLE `xsdml_respostas` DISABLE KEYS */;
INSERT INTO `xsdml_respostas` VALUES (2,10,'agora salva isso aqui',1,'2016-12-14 14:54:55'),(3,10,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.',1,'2016-12-14 17:38:45');
/*!40000 ALTER TABLE `xsdml_respostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_respostas_has_user`
--

DROP TABLE IF EXISTS `xsdml_respostas_has_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_respostas_has_user` (
  `respostas_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`respostas_id`,`user_id`),
  KEY `fk_xsdml_respostas_has_xsdml_user_xsdml_user1_idx` (`user_id`),
  KEY `fk_xsdml_respostas_has_xsdml_user_xsdml_respostas1_idx` (`respostas_id`),
  CONSTRAINT `fk_xsdml_respostas_has_xsdml_user_xsdml_respostas1` FOREIGN KEY (`respostas_id`) REFERENCES `xsdml_respostas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_xsdml_respostas_has_xsdml_user_xsdml_user1` FOREIGN KEY (`user_id`) REFERENCES `xsdml_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_respostas_has_user`
--

LOCK TABLES `xsdml_respostas_has_user` WRITE;
/*!40000 ALTER TABLE `xsdml_respostas_has_user` DISABLE KEYS */;
INSERT INTO `xsdml_respostas_has_user` VALUES (2,16),(3,16);
/*!40000 ALTER TABLE `xsdml_respostas_has_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_status_user`
--

DROP TABLE IF EXISTS `xsdml_status_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_status_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_status_user`
--

LOCK TABLES `xsdml_status_user` WRITE;
/*!40000 ALTER TABLE `xsdml_status_user` DISABLE KEYS */;
INSERT INTO `xsdml_status_user` VALUES (1,'Ativo'),(2,'Pendente'),(3,'Cancelado');
/*!40000 ALTER TABLE `xsdml_status_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_user`
--

DROP TABLE IF EXISTS `xsdml_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status_user_id` int(11) NOT NULL,
  `status_conf_email` tinyint(2) NOT NULL COMMENT 'validar e-mail',
  `hash_mail` varchar(100) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_ult_acesso` datetime NOT NULL,
  `parametros_extra` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_xsdml_user_xsdml_status_user1_idx` (`status_user_id`),
  KEY `fk_xsdml_user_xsdml_perfil1_idx` (`perfil_id`),
  CONSTRAINT `fk_xsdml_user_xsdml_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `xsdml_perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_xsdml_user_xsdml_status_user1` FOREIGN KEY (`status_user_id`) REFERENCES `xsdml_status_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_user`
--

LOCK TABLES `xsdml_user` WRITE;
/*!40000 ALTER TABLE `xsdml_user` DISABLE KEYS */;
INSERT INTO `xsdml_user` VALUES (1,'user teste',1,'teste@teste.com.br','$2y$13$R.EeZL3yze.oJCiDlr32DuOvqNvpCl2nY.aIITx7Ik3p/nGsViOq2',1,1,'','0000-00-00 00:00:00','2016-12-16 17:09:58',''),(16,'Leandro Brito',1,'leandro@next4.com.br','$2y$13$vKdYaeblmeIbOe3e.565LexHbb8nqQJYxJ.iO3HoyfT3SXFYQplT6',1,1,'','2016-12-09 16:48:11','2016-12-14 17:32:30','');
/*!40000 ALTER TABLE `xsdml_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_user_cadastro`
--

DROP TABLE IF EXISTS `xsdml_user_cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_user_cadastro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `genero` varchar(70) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefones` text NOT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estados_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_xsdml_user_cadastro_xsdml_user1_idx` (`user_id`),
  KEY `fk_xsdml_user_cadastro_xsdml_estados1_idx` (`estados_id`),
  CONSTRAINT `fk_xsdml_user_cadastro_xsdml_estados1` FOREIGN KEY (`estados_id`) REFERENCES `xsdml_estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_xsdml_user_cadastro_xsdml_user1` FOREIGN KEY (`user_id`) REFERENCES `xsdml_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_user_cadastro`
--

LOCK TABLES `xsdml_user_cadastro` WRITE;
/*!40000 ALTER TABLE `xsdml_user_cadastro` DISABLE KEYS */;
INSERT INTO `xsdml_user_cadastro` VALUES (1,1,'masculino','0000-00-00','11 5555-5555','05833-230','Rua mateus de peruggia','São Paulo',25),(15,16,'masculino','1994-03-27','','02872030','Rua Gomes Leal','Sao Paulo',25);
/*!40000 ALTER TABLE `xsdml_user_cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_user_menu`
--

DROP TABLE IF EXISTS `xsdml_user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parente` int(11) NOT NULL,
  `item_nome` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `ordem` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `detectar_recurso` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_user_menu`
--

LOCK TABLES `xsdml_user_menu` WRITE;
/*!40000 ALTER TABLE `xsdml_user_menu` DISABLE KEYS */;
INSERT INTO `xsdml_user_menu` VALUES (1,0,'Painel','painel','',0,1,0);
/*!40000 ALTER TABLE `xsdml_user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xsdml_widget_effects_map`
--

DROP TABLE IF EXISTS `xsdml_widget_effects_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xsdml_widget_effects_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `effect_key` varchar(45) NOT NULL,
  `nome_effect` varchar(45) NOT NULL,
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xsdml_widget_effects_map`
--

LOCK TABLES `xsdml_widget_effects_map` WRITE;
/*!40000 ALTER TABLE `xsdml_widget_effects_map` DISABLE KEYS */;
INSERT INTO `xsdml_widget_effects_map` VALUES (1,'slideshow','Slide Show','fa fa-tags'),(2,'parallax','Parallax Banner','fa fa-picture-o'),(3,'static','Static Banner','fa fa-image');
/*!40000 ALTER TABLE `xsdml_widget_effects_map` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-20 10:28:31
