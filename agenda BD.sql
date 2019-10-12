-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
--  Esse script SQL cria o banco de dados liccomp com alguns registros de exemplo 
--
-- Host: 127.0.0.1
-- Generation Time: 16-Maio-2018 às 14:38
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: liccomp
--

DROP DATABASE IF EXISTS ti205;

CREATE DATABASE IF NOT EXISTS ti205  
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE ti205;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `cep` char(8) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fonetipo`
--

DROP TABLE IF EXISTS `fonetipo`;
CREATE TABLE IF NOT EXISTS `fonetipo` (
  `codtipofone` int(11) NOT NULL AUTO_INCREMENT,
  `nometipofone` varchar(20) NOT NULL,
  PRIMARY KEY (`codtipofone`),
  UNIQUE KEY `nometipofone` (`nometipofone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `codfone` int(11) NOT NULL AUTO_INCREMENT,
  `codend` int(11) NOT NULL,
  `telefone` char(11) NOT NULL,
  `tipofone` int(11) NOT NULL,
  PRIMARY KEY (`codfone`),
  KEY `codend` (`codend`),
  KEY `tipofone` (`tipofone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restrições para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `codend_fk` FOREIGN KEY (`codend`) REFERENCES `agenda` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipofone_fk` FOREIGN KEY (`tipofone`) REFERENCES `fonetipo` (`codtipofone`);
-- --------------------------------------------------------

--
-- Insere alguns registros na tabela 'fonetipo'
--
INSERT INTO `fonetipo`(`nometipofone`) VALUES ('Fixo');
INSERT INTO `fonetipo`(`nometipofone`) VALUES ('Celular');
INSERT INTO `fonetipo`(`nometipofone`) VALUES ('Comercial');
INSERT INTO `fonetipo`(`nometipofone`) VALUES ('Contato');
INSERT INTO `fonetipo`(`nometipofone`) VALUES ('Casa');

--
-- Insere alguns registros na tabela 'agenda'
--
INSERT INTO `agenda`(`nome`, `endereco`, `complemento`, `bairro`, `cidade`, `cep`) 
VALUES ('Antonio Pedro','Avenida Nilo Peçanha','casa 100','Cemtro','Valença','27600000');

INSERT INTO `agenda`(`nome`, `endereco`, `complemento`, `bairro`, `cidade`, `cep`) 
VALUES ('Maria José','Rua Padre Luna','casa 1','Centro','Valença','27600000');

INSERT INTO `agenda`(`nome`, `endereco`, `complemento`, `bairro`, `cidade`, `cep`) 
VALUES ('Bruno Lemos','Rua 33','nº 132','Vila Santa Cecília','Volta Redonda','22222222');

--
-- Insere alguns registros na tabela 'telefone'
--

INSERT INTO `telefone`(`codend`, `telefone`, `tipofone`) 
VALUES (1,'2424532453',1);

INSERT INTO `telefone`(`codend`, `telefone`, `tipofone`) 
VALUES (1,'2424531111',3);

INSERT INTO `telefone`(`codend`, `telefone`, `tipofone`) 
VALUES (1,'2499999999',2);

INSERT INTO `telefone`(`codend`, `telefone`, `tipofone`) 
VALUES (2,'3199999999',2);

INSERT INTO `telefone`(`codend`, `telefone`, `tipofone`) 
VALUES (3,'3245456767',1);