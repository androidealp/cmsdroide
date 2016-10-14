-- MySQL Script generated by MySQL Workbench
-- Qui 13 Out 2016 22:27:31 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cmsdroide
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `csdm_adm_grupos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_adm_grupos` ;

CREATE TABLE IF NOT EXISTS `csdm_adm_grupos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `menu_permissoes` TEXT NOT NULL COMMENT '',
  `atrib_permissoes` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_adm_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_adm_user` ;

CREATE TABLE IF NOT EXISTS `csdm_adm_user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `grupos_id` INT NOT NULL COMMENT '',
  `nome` VARCHAR(100) NOT NULL COMMENT '',
  `email` VARCHAR(150) NOT NULL COMMENT '',
  `senha` VARCHAR(100) NOT NULL COMMENT '',
  `avatar` VARCHAR(150) NOT NULL COMMENT '',
  `status_acesso` TINYINT(2) NOT NULL COMMENT '',
  `dt_cadastro` DATETIME NOT NULL COMMENT '',
  `dt_ult_acesso` DATETIME NOT NULL COMMENT '',
  `parametros_extra` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_csdm_adm_user_csdm_adm_grupos_idx` (`grupos_id` ASC)  COMMENT '',
  CONSTRAINT `fk_csdm_adm_user_csdm_adm_grupos`
    FOREIGN KEY (`grupos_id`)
    REFERENCES `csdm_adm_grupos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_status_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_status_user` ;

CREATE TABLE IF NOT EXISTS `csdm_status_user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_perfil` ;

CREATE TABLE IF NOT EXISTS `csdm_perfil` (
  `id` INT NOT NULL COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_user` ;

CREATE TABLE IF NOT EXISTS `csdm_user` (
  `id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(100) NOT NULL COMMENT '',
  `perfil_id` INT NOT NULL COMMENT '',
  `user_nome` VARCHAR(45) NOT NULL COMMENT 'nome de usuário para login',
  `email` VARCHAR(150) NOT NULL COMMENT '',
  `senha` VARCHAR(100) NOT NULL COMMENT '',
  `status_user_id` INT NOT NULL COMMENT '',
  `status_conf_email` TINYINT(2) NOT NULL COMMENT 'validar e-mail',
  `hash_mail` VARCHAR(100) NOT NULL COMMENT '',
  `dt_cadastro` DATETIME NOT NULL COMMENT '',
  `dt_ult_acesso` DATETIME NOT NULL COMMENT '',
  `parametros_extra` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_csdm_user_csdm_status_user1_idx` (`status_user_id` ASC)  COMMENT '',
  INDEX `fk_csdm_user_csdm_perfil1_idx` (`perfil_id` ASC)  COMMENT '',
  CONSTRAINT `fk_csdm_user_csdm_status_user1`
    FOREIGN KEY (`status_user_id`)
    REFERENCES `csdm_status_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_csdm_user_csdm_perfil1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `csdm_perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_linguagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_linguagem` ;

CREATE TABLE IF NOT EXISTS `csdm_linguagem` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `tag` VARCHAR(20) NOT NULL COMMENT '',
  `alias` VARCHAR(45) NOT NULL COMMENT '',
  `status` TINYINT(2) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_categorias_conteudo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_categorias_conteudo` ;

CREATE TABLE IF NOT EXISTS `csdm_categorias_conteudo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `linguagem_id` INT NOT NULL COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `alias` VARCHAR(45) NOT NULL COMMENT '',
  `dt_criacao` DATETIME NOT NULL COMMENT '',
  `status` TINYINT(2) NOT NULL COMMENT '',
  `parametros_extra` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_csdm_categorias_conteudo_csdm_linguagem1_idx` (`linguagem_id` ASC)  COMMENT '',
  CONSTRAINT `fk_csdm_categorias_conteudo_csdm_linguagem1`
    FOREIGN KEY (`linguagem_id`)
    REFERENCES `csdm_linguagem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_conteudo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_conteudo` ;

CREATE TABLE IF NOT EXISTS `csdm_conteudo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `categorias_conteudo_id` INT NOT NULL COMMENT '',
  `linguagem_id` INT NOT NULL COMMENT '',
  `status` TINYINT NOT NULL COMMENT '',
  `titulo` VARCHAR(70) NOT NULL COMMENT '',
  `alias` VARCHAR(70) NOT NULL COMMENT '',
  `texto_introdutorio` VARCHAR(250) NOT NULL COMMENT '',
  `conteudo_total` TEXT NOT NULL COMMENT '',
  `imagem_pre` VARCHAR(100) NOT NULL COMMENT '',
  `imagem_pos` VARCHAR(100) NOT NULL COMMENT '',
  `autor` VARCHAR(100) NOT NULL COMMENT '',
  `dt_publicacao` DATETIME NOT NULL COMMENT '',
  `dt_criacao` DATETIME NOT NULL COMMENT '',
  `parametros_extra` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_csdm_conteudo_csdm_categorias_conteudo1_idx` (`categorias_conteudo_id` ASC)  COMMENT '',
  INDEX `fk_csdm_conteudo_csdm_linguagem1_idx` (`linguagem_id` ASC)  COMMENT '',
  CONSTRAINT `fk_csdm_conteudo_csdm_categorias_conteudo1`
    FOREIGN KEY (`categorias_conteudo_id`)
    REFERENCES `csdm_categorias_conteudo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_csdm_conteudo_csdm_linguagem1`
    FOREIGN KEY (`linguagem_id`)
    REFERENCES `csdm_linguagem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_adm_menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_adm_menu` ;

CREATE TABLE IF NOT EXISTS `csdm_adm_menu` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_parente` INT NOT NULL COMMENT '',
  `item_nome` VARCHAR(45) NOT NULL COMMENT '',
  `url` VARCHAR(45) NOT NULL COMMENT '',
  `icon` VARCHAR(45) NOT NULL COMMENT '',
  `ordem` INT NOT NULL COMMENT '',
  `status` TINYINT(2) NOT NULL COMMENT '',
  `detectar_recurso` TINYINT(2) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_adm_config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_adm_config` ;

CREATE TABLE IF NOT EXISTS `csdm_adm_config` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `host` VARCHAR(50) NOT NULL COMMENT '',
  `username` VARCHAR(70) NOT NULL COMMENT '',
  `password` TEXT NOT NULL COMMENT '',
  `port` INT NOT NULL COMMENT '',
  `encryption` VARCHAR(45) NOT NULL COMMENT '',
  `key_remote_acccess` VARCHAR(200) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_estados` ;

CREATE TABLE IF NOT EXISTS `csdm_estados` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_user_cadastro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_user_cadastro` ;

CREATE TABLE IF NOT EXISTS `csdm_user_cadastro` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` BIGINT NOT NULL COMMENT '',
  `telefones` TEXT NOT NULL COMMENT '',
  `cep` VARCHAR(20) NOT NULL COMMENT '',
  `logradouro` VARCHAR(100) NOT NULL COMMENT '',
  `cidade` VARCHAR(70) NOT NULL COMMENT '',
  `estados_id` INT NOT NULL COMMENT '',
  `lat` VARCHAR(70) NOT NULL COMMENT '',
  `long` VARCHAR(70) NOT NULL COMMENT '',
  `descricao` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_csdm_user_cadastro_csdm_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_csdm_user_cadastro_csdm_estados1_idx` (`estados_id` ASC)  COMMENT '',
  CONSTRAINT `fk_csdm_user_cadastro_csdm_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `csdm_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_csdm_user_cadastro_csdm_estados1`
    FOREIGN KEY (`estados_id`)
    REFERENCES `csdm_estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_user_menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_user_menu` ;

CREATE TABLE IF NOT EXISTS `csdm_user_menu` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_parente` INT NOT NULL COMMENT '',
  `item_nome` VARCHAR(45) NOT NULL COMMENT '',
  `url` VARCHAR(45) NOT NULL COMMENT '',
  `icon` VARCHAR(45) NOT NULL COMMENT '',
  `ordem` INT NOT NULL COMMENT '',
  `status` TINYINT(2) NOT NULL COMMENT '',
  `detectar_recurso` TINYINT(2) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_comentarios` ;

CREATE TABLE IF NOT EXISTS `csdm_comentarios` (
  `id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `assunto` VARCHAR(45) NOT NULL COMMENT '',
  `mensagem` TEXT NOT NULL COMMENT '',
  `resposta` TINYINT(2) NOT NULL COMMENT '',
  `tipo` INT NOT NULL COMMENT '',
  `dt_publicacao` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_comentarios_has_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_comentarios_has_user` ;

CREATE TABLE IF NOT EXISTS `csdm_comentarios_has_user` (
  `comentarios_id` BIGINT NOT NULL COMMENT '',
  `user_id` BIGINT NOT NULL COMMENT '',
  PRIMARY KEY (`comentarios_id`, `user_id`)  COMMENT '',
  INDEX `fk_csdm_comentarios_has_csdm_user_csdm_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_csdm_comentarios_has_csdm_user_csdm_comentarios1_idx` (`comentarios_id` ASC)  COMMENT '',
  CONSTRAINT `fk_csdm_comentarios_has_csdm_user_csdm_comentarios1`
    FOREIGN KEY (`comentarios_id`)
    REFERENCES `csdm_comentarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_csdm_comentarios_has_csdm_user_csdm_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `csdm_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csdm_widget_effects_map`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csdm_widget_effects_map` ;

CREATE TABLE IF NOT EXISTS `csdm_widget_effects_map` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `effect_key` VARCHAR(45) NOT NULL COMMENT '',
  `nome_effect` VARCHAR(45) NOT NULL COMMENT '',
  `icon` VARCHAR(50) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `csdm_adm_grupos`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_adm_grupos` (`id`, `nome`, `menu_permissoes`, `atrib_permissoes`) VALUES (1, 'admin', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]', '[\"1\"]');

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_adm_user`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_adm_user` (`id`, `grupos_id`, `nome`, `email`, `senha`, `avatar`, `status_acesso`, `dt_cadastro`, `dt_ult_acesso`, `parametros_extra`) VALUES (1, 1, 'Admin', 'admin@admin.com', '$2y$13$R.EeZL3yze.oJCiDlr32DuOvqNvpCl2nY.aIITx7Ik3p/nGsViOq2', DEFAULT, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_status_user`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_status_user` (`id`, `nome`) VALUES (1, 'Ativo');
INSERT INTO `csdm_status_user` (`id`, `nome`) VALUES (2, 'Pendente');
INSERT INTO `csdm_status_user` (`id`, `nome`) VALUES (3, 'Cancelado');

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_perfil`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_perfil` (`id`, `nome`) VALUES (1, 'Registrado');

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_user`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_user` (`id`, `nome`, `perfil_id`, `user_nome`, `email`, `senha`, `status_user_id`, `status_conf_email`, `hash_mail`, `dt_cadastro`, `dt_ult_acesso`, `parametros_extra`) VALUES (1, 'user teste', 1, 'droide', 'teste@teste.com.br', '$2y$13$R.EeZL3yze.oJCiDlr32DuOvqNvpCl2nY.aIITx7Ik3p/nGsViOq2', 1, 1, 'feito', '0000-00-00 00:00:00', '0000-00-00 00:00:00', DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_linguagem`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_linguagem` (`id`, `nome`, `tag`, `alias`, `status`) VALUES (1, 'Português', 'pt-BR', 'pt-BR', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_categorias_conteudo`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_categorias_conteudo` (`id`, `linguagem_id`, `nome`, `alias`, `dt_criacao`, `status`, `parametros_extra`) VALUES (1, 1, 'Institucional', 'institucional', '2016-10-12 20:22:49', 1, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_adm_menu`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (1, 0, 'Painel de controle', 'painel/', 'fa fa-tachometer', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (2, 0, 'Gerenciador de conteúdo', '#', 'fa fa-book', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (3, 2, 'Categorias', 'gerenciadorconteudo/categorias', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (4, 2, 'Conteúdo', 'gerenciadorconteudo/conteudo', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (5, 0, 'Gerenciador de Mídias', 'mediamanager/', 'fa fa-camera-retro', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (6, 0, 'Gerenciador de usuários', '#', 'fa fa-users', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (7, 0, 'Configurações', '#', 'fa fa-cogs', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (8, 6, 'Administradores', 'usermanager/admins', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (9, 6, 'Assinantes', 'usermanager/assinantes', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (10, 7, 'Temas', 'confmanager/temas', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (11, 7, 'Sistema', 'confmanager/sistema', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (12, 7, 'Métodos de pagamento', 'metodospagamento', '', 0, 1, 0);
INSERT INTO `csdm_adm_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (13, 0, 'WidgetEffects', 'widget-effects/', 'fa fa-cubes', 0, 1, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_adm_config`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_adm_config` (`id`, `host`, `username`, `password`, `port`, `encryption`, `key_remote_acccess`) VALUES (1, 'mail.emailhost.com.br', 'usuario', 'critidadouser', 257, 'tls', '645dsfwesdf469w');

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_estados`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (1, 'AC');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (2, 'AL');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (3, 'AP');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (4, 'AM');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (5, 'BA');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (6, 'CE');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (7, 'DF');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (8, 'ES');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (9, 'GO');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (10, 'MA');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (11, 'MT');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (12, 'MS');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (13, 'MG');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (14, 'PA');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (15, 'PB');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (16, 'PR');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (17, 'PE');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (18, 'PI');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (19, 'RJ');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (20, 'RN');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (21, 'RS');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (22, 'RO');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (23, 'RR');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (24, 'SC');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (25, 'SP');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (26, 'SE');
INSERT INTO `csdm_estados` (`id`, `nome`) VALUES (27, 'TO');

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_user_cadastro`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_user_cadastro` (`id`, `user_id`, `telefones`, `cep`, `logradouro`, `cidade`, `estados_id`, `lat`, `long`, `descricao`) VALUES (1, 1, '11 5555-5555', '05833-230', 'Rua mateus de peruggia', 'São Paulo', 25, '0', '0', 'Usuário de testes');

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_user_menu`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_user_menu` (`id`, `id_parente`, `item_nome`, `url`, `icon`, `ordem`, `status`, `detectar_recurso`) VALUES (1, 0, 'Painel', 'painel', DEFAULT, 0, 1, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csdm_widget_effects_map`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `csdm_widget_effects_map` (`id`, `effect_key`, `nome_effect`, `icon`) VALUES (1, 'slideshow', 'Slide Show', 'fa fa-tags');

COMMIT;

