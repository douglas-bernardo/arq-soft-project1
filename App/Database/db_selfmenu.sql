-- -----------------------------------------------------
-- Schema menu_digital
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `menu_digital` ;
CREATE DATABASE menu_digital default charset utf8 collate utf8_general_ci;
use self_menu;

-- -----------------------------------------------------
-- Table `menu_digital`.`categoria`
-- -----------------------------------------------------
CREATE TABLE categoria (
	id int(11) NOT NULL AUTO_INCREMENT,
	descricao varchar(100) NULL,
    ativo TINYINT(1) NULL DEFAULT 1,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------------------------------
-- Table `menu_digital`.`produto`
-- -----------------------------------------------------
CREATE TABLE produto (
	id int(11)  NOT NULL AUTO_INCREMENT,
    categoria_id int(11) NOT NULL,
	nome varchar(100) NULL,
    descricao text,
    url_image varchar(300) null,
    qtd_estoque int(11) null,
	PRIMARY KEY (id),
	created_at TIMESTAMP(2) NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP(2) NULL ON UPDATE CURRENT_TIMESTAMP,
    INDEX fk_categoria_produto_idx (categoria_id ASC),
    constraint fk_categoria_produto foreign key (categoria_id) references categoria (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
