-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2015 às 21:14
-- Versão do servidor: 5.5.41-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `db_lavivencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `FUNCIONARIO`
--

CREATE TABLE IF NOT EXISTS `FUNCIONARIO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FKFUNCAO` int(11) NOT NULL,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `INSCRICAO` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ENDERECO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SUBBAIROO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `BAIRRO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `REFERENCIAS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FKMUNICIPIO` int(11) NOT NULL,
  `UF` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `CEP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IDENTIDADE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ORGAO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NUMCARTEIRA` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `NUMPIS` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `NUMCNH` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONES` text COLLATE utf8_unicode_ci,
  `DTNASCIMENTO` date NOT NULL,
  `DTCADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DTADMISSAO` date NOT NULL,
  `NOME_MAE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FKNATURALIDADE` int(11) NOT NULL,
  `FKESCOLARIDADE` int(11) NOT NULL,
  `FKINDICACAO` int(11) DEFAULT NULL,
  `NUM_FILHOS` int(11) DEFAULT NULL,
  `ESTADOCIVIL` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SALARIO` decimal(10,2) NOT NULL,
  `OBSERVACAO` text COLLATE utf8_unicode_ci,
  `TURNO` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `INDICADO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `FOTO` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `FUNCIONARIO`
--

INSERT INTO `FUNCIONARIO` (`ID`, `FKFUNCAO`, `NOME`, `INSCRICAO`, `ENDERECO`, `SUBBAIROO`, `BAIRRO`, `REFERENCIAS`, `FKMUNICIPIO`, `UF`, `CEP`, `EMAIL`, `IDENTIDADE`, `ORGAO`, `NUMCARTEIRA`, `NUMPIS`, `NUMCNH`, `TELEFONES`, `DTNASCIMENTO`, `DTCADASTRO`, `DTADMISSAO`, `NOME_MAE`, `FKNATURALIDADE`, `FKESCOLARIDADE`, `FKINDICACAO`, `NUM_FILHOS`, `ESTADOCIVIL`, `SALARIO`, `OBSERVACAO`, `TURNO`, `INDICADO`, `FOTO`, `STATUS`) VALUES
(1, 1, 'Ivan Rufino Martins', '09878901742', 'Rua Madureira', '', 'Vilar dos Teles', '', 1, 'RJ', '25565-241', 'ivan.rufino.m@gmail.com', '12345678901', 'dic', '3456789', '456789', '6545678', '567899876\r\n456789098765\r\n4567890098\r\n456789098', '1984-04-02', '2015-05-12 23:37:34', '2015-05-04', 'Lourdes', 1, 1, NULL, 1, 'Solteiro', 4556.00, NULL, 'noite', '', 'ivan.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSFUNCAO`
--

CREATE TABLE IF NOT EXISTS `SYSFUNCAO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `SYSFUNCAO`
--

INSERT INTO `SYSFUNCAO` (`ID`, `NOME`) VALUES
(1, 'incluir'),
(2, 'alterar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSMODULO`
--

CREATE TABLE IF NOT EXISTS `SYSMODULO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `SYSMODULO`
--

INSERT INTO `SYSMODULO` (`ID`, `NOME`) VALUES
(1, 'Funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSPERFIL`
--

CREATE TABLE IF NOT EXISTS `SYSPERFIL` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `SYSPERFIL`
--

INSERT INTO `SYSPERFIL` (`ID`, `NOME`) VALUES
(1, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSPERFIL_SYSFUNCAO`
--

CREATE TABLE IF NOT EXISTS `SYSPERFIL_SYSFUNCAO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERFIL` int(11) NOT NULL,
  `ID_MODULO` int(11) NOT NULL,
  `ID_FUNCAO` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_PERFIL` (`ID_PERFIL`),
  KEY `ID_MODULO` (`ID_MODULO`),
  KEY `ID_FUNCAO` (`ID_FUNCAO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `SYSPERFIL_SYSFUNCAO`
--

INSERT INTO `SYSPERFIL_SYSFUNCAO` (`ID`, `ID_PERFIL`, `ID_MODULO`, `ID_FUNCAO`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSUSUARIO`
--

CREATE TABLE IF NOT EXISTS `SYSUSUARIO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `FK_SYSPERFIL` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `SYSUSUARIO`
--

INSERT INTO `SYSUSUARIO` (`ID`, `LOGIN`, `SENHA`, `ID_FUNCIONARIO`, `FK_SYSPERFIL`) VALUES
(1, 'ivanrufino', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `SYSPERFIL_SYSFUNCAO`
--
ALTER TABLE `SYSPERFIL_SYSFUNCAO`
  ADD CONSTRAINT `SYSPERFIL_SYSFUNCAO_ibfk_3` FOREIGN KEY (`ID_FUNCAO`) REFERENCES `SYSFUNCAO` (`ID`),
  ADD CONSTRAINT `SYSPERFIL_SYSFUNCAO_ibfk_1` FOREIGN KEY (`ID_PERFIL`) REFERENCES `SYSPERFIL` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `SYSPERFIL_SYSFUNCAO_ibfk_2` FOREIGN KEY (`ID_MODULO`) REFERENCES `SYSMODULO` (`ID`);

