-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 08/11/2015 às 11:17
-- Versão do servidor: 5.6.25
-- Versão do PHP: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cmsdroide`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_adm_config`
--

DROP TABLE IF EXISTS `csdm_adm_config`;
CREATE TABLE IF NOT EXISTS `csdm_adm_config` (
  `id` int(11) NOT NULL,
  `funcao_mail_smtp` tinyint(4) NOT NULL,
  `default_email` varchar(100) NOT NULL,
  `email_smtp` varchar(100) NOT NULL,
  `servidor_smtp` varchar(45) NOT NULL,
  `porta` int(11) NOT NULL,
  `requer_autenticacao` tinyint(2) NOT NULL,
  `ativar_cron` tinyint(2) NOT NULL,
  `url_cron` varchar(45) NOT NULL,
  `exec_segundos` int(11) NOT NULL,
  `manutencao_site` tinyint(2) NOT NULL,
  `exbir_previa_tempo_horas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_adm_emails_sys`
--

DROP TABLE IF EXISTS `csdm_adm_emails_sys`;
CREATE TABLE IF NOT EXISTS `csdm_adm_emails_sys` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo_form` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_adm_grupos`
--

DROP TABLE IF EXISTS `csdm_adm_grupos`;
CREATE TABLE IF NOT EXISTS `csdm_adm_grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `atrib_permissoes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `csdm_adm_grupos`
--

INSERT INTO `csdm_adm_grupos` (`id`, `nome`, `atrib_permissoes`) VALUES
(1, 'admin', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_adm_menu`
--

DROP TABLE IF EXISTS `csdm_adm_menu`;
CREATE TABLE IF NOT EXISTS `csdm_adm_menu` (
  `id` int(11) NOT NULL,
  `item_nome` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `id_parente` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `detectar_recurso` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `csdm_adm_menu`
--

INSERT INTO `csdm_adm_menu` (`id`, `item_nome`, `url`, `icon`, `id_parente`, `ordem`, `status`, `detectar_recurso`) VALUES
(1, 'Painel', 'painel/index', 'fa fa-dashboard', 0, 1, 1, 0),
(2, 'Artigos', '#', 'fa fa-book', 0, 1, 1, 0),
(3, 'Conteúdo', 'artigos/conteudo', '', 2, 1, 1, 0),
(4, 'Categorias', 'artigos/categorias', '', 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_adm_recursos`
--

DROP TABLE IF EXISTS `csdm_adm_recursos`;
CREATE TABLE IF NOT EXISTS `csdm_adm_recursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `url_recurso` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `niveis_grupos` varchar(45) NOT NULL COMMENT 'multiplos grupos id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_adm_user`
--

DROP TABLE IF EXISTS `csdm_adm_user`;
CREATE TABLE IF NOT EXISTS `csdm_adm_user` (
  `id` int(11) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `status_acesso` tinyint(2) NOT NULL,
  `parametros_extra` text NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_ult_acesso` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `csdm_adm_user`
--

INSERT INTO `csdm_adm_user` (`id`, `grupos_id`, `nome`, `email`, `senha`, `avatar`, `status_acesso`, `parametros_extra`, `dt_cadastro`, `dt_ult_acesso`) VALUES
(1, 1, 'André luiz', 'and4563@gmail.com', '$2y$13$uWcPSbZVx81jxgPvak5lkOLxD7svw135xfrNFZpj6v3dDdbODaWTa', '', 1, '', '2015-11-06 08:16:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_categorias_conteudo`
--

DROP TABLE IF EXISTS `csdm_categorias_conteudo`;
CREATE TABLE IF NOT EXISTS `csdm_categorias_conteudo` (
  `id` int(11) NOT NULL,
  `linguagem_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `dt_criacao` datetime NOT NULL,
  `status` tinyint(2) NOT NULL,
  `parametros_extra` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_conteudo`
--

DROP TABLE IF EXISTS `csdm_conteudo`;
CREATE TABLE IF NOT EXISTS `csdm_conteudo` (
  `id` int(11) NOT NULL,
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
  `parametros_extra` text NOT NULL,
  `dt_publicacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_linguagem`
--

DROP TABLE IF EXISTS `csdm_linguagem`;
CREATE TABLE IF NOT EXISTS `csdm_linguagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `csdm_user`
--

DROP TABLE IF EXISTS `csdm_user`;
CREATE TABLE IF NOT EXISTS `csdm_user` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status_acesso` tinyint(2) NOT NULL,
  `parametros` varchar(100) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_ult_acesso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `csdm_adm_config`
--
ALTER TABLE `csdm_adm_config`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `csdm_adm_emails_sys`
--
ALTER TABLE `csdm_adm_emails_sys`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `csdm_adm_grupos`
--
ALTER TABLE `csdm_adm_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `csdm_adm_menu`
--
ALTER TABLE `csdm_adm_menu`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `csdm_adm_recursos`
--
ALTER TABLE `csdm_adm_recursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `csdm_adm_user`
--
ALTER TABLE `csdm_adm_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_csdm_adm_user_csdm_adm_grupos_idx` (`grupos_id`);

--
-- Índices de tabela `csdm_categorias_conteudo`
--
ALTER TABLE `csdm_categorias_conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_csdm_categorias_conteudo_csdm_linguagem1_idx` (`linguagem_id`);

--
-- Índices de tabela `csdm_conteudo`
--
ALTER TABLE `csdm_conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_csdm_conteudo_csdm_categorias_conteudo1_idx` (`categorias_conteudo_id`),
  ADD KEY `fk_csdm_conteudo_csdm_linguagem1_idx` (`linguagem_id`);

--
-- Índices de tabela `csdm_linguagem`
--
ALTER TABLE `csdm_linguagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `csdm_user`
--
ALTER TABLE `csdm_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `csdm_adm_config`
--
ALTER TABLE `csdm_adm_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `csdm_adm_emails_sys`
--
ALTER TABLE `csdm_adm_emails_sys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `csdm_adm_grupos`
--
ALTER TABLE `csdm_adm_grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `csdm_adm_menu`
--
ALTER TABLE `csdm_adm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `csdm_adm_recursos`
--
ALTER TABLE `csdm_adm_recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `csdm_adm_user`
--
ALTER TABLE `csdm_adm_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `csdm_categorias_conteudo`
--
ALTER TABLE `csdm_categorias_conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `csdm_conteudo`
--
ALTER TABLE `csdm_conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `csdm_linguagem`
--
ALTER TABLE `csdm_linguagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `csdm_user`
--
ALTER TABLE `csdm_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `csdm_adm_user`
--
ALTER TABLE `csdm_adm_user`
  ADD CONSTRAINT `fk_csdm_adm_user_csdm_adm_grupos` FOREIGN KEY (`grupos_id`) REFERENCES `csdm_adm_grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `csdm_categorias_conteudo`
--
ALTER TABLE `csdm_categorias_conteudo`
  ADD CONSTRAINT `fk_csdm_categorias_conteudo_csdm_linguagem1` FOREIGN KEY (`linguagem_id`) REFERENCES `csdm_linguagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `csdm_conteudo`
--
ALTER TABLE `csdm_conteudo`
  ADD CONSTRAINT `fk_csdm_conteudo_csdm_categorias_conteudo1` FOREIGN KEY (`categorias_conteudo_id`) REFERENCES `csdm_categorias_conteudo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_csdm_conteudo_csdm_linguagem1` FOREIGN KEY (`linguagem_id`) REFERENCES `csdm_linguagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
