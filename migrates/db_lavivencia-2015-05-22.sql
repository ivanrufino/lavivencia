-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/05/2015 às 13h00min
-- Versão do Servidor: 5.5.41
-- Versão do PHP: 5.5.24-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `db_lavivencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `CLIENTE`
--

CREATE TABLE IF NOT EXISTS `CLIENTE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `CLIENTE`
--

INSERT INTO `CLIENTE` (`ID`, `NOME`) VALUES
(1, 'Ivan Rufino'),
(2, 'Outro ivan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ESCOLARIDADE`
--

CREATE TABLE IF NOT EXISTS `ESCOLARIDADE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `ESCOLARIDADE`
--

INSERT INTO `ESCOLARIDADE` (`ID`, `NOME`) VALUES
(1, 'Alfabetizado'),
(2, 'Segundo Grau Incompleto'),
(3, 'São João de Meriti'),
(4, 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `FUNCAO`
--

CREATE TABLE IF NOT EXISTS `FUNCAO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `FUNCAO`
--

INSERT INTO `FUNCAO` (`ID`, `NOME`) VALUES
(1, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `FUNCIONARIO`
--

CREATE TABLE IF NOT EXISTS `FUNCIONARIO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FKFUNCAO` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`ID`),
  KEY `FKFUNCAO` (`FKFUNCAO`),
  KEY `FKESCOLARIDADE` (`FKESCOLARIDADE`),
  KEY `FKMUNICIPIO` (`FKMUNICIPIO`),
  KEY `FKNATURALIDADE` (`FKNATURALIDADE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `FUNCIONARIO`
--

INSERT INTO `FUNCIONARIO` (`ID`, `FKFUNCAO`, `NOME`, `INSCRICAO`, `ENDERECO`, `SUBBAIROO`, `BAIRRO`, `REFERENCIAS`, `FKMUNICIPIO`, `UF`, `CEP`, `EMAIL`, `IDENTIDADE`, `ORGAO`, `NUMCARTEIRA`, `NUMPIS`, `NUMCNH`, `TELEFONES`, `DTNASCIMENTO`, `DTCADASTRO`, `DTADMISSAO`, `NOME_MAE`, `FKNATURALIDADE`, `FKESCOLARIDADE`, `FKINDICACAO`, `NUM_FILHOS`, `ESTADOCIVIL`, `SALARIO`, `OBSERVACAO`, `TURNO`, `INDICADO`, `FOTO`, `STATUS`) VALUES
(1, 1, 'Ivan Rufino Martins', '09878901742', 'Rua Madureira', '', 'Vilar dos Teles', '', 1, 'RJ', '25565-241', 'ivan.rufino.m@gmail.com', '12345678901', 'dic', '3456789', '456789', '6545678', '567899876\r\n456789098765\r\n4567890098\r\n456789098', '1984-04-02', '2015-05-13 17:26:35', '2015-05-04', 'Lourdes', 1, 1, NULL, 1, 'Solteiro', 4556.00, NULL, 'noite', '', 'ivan.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `MEDICAO`
--

CREATE TABLE IF NOT EXISTS `MEDICAO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRESSAO` int(11) NOT NULL,
  `DIA` int(11) NOT NULL,
  `PS` int(11) NOT NULL,
  `PD` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_PRESSAO` (`ID_PRESSAO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `MEDICAO`
--

INSERT INTO `MEDICAO` (`ID`, `ID_PRESSAO`, `DIA`, `PS`, `PD`) VALUES
(1, 1, 1, 120, 150),
(2, 1, 2, 120, 80),
(3, 2, 2, 120, 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `MUNICIPIO`
--

CREATE TABLE IF NOT EXISTS `MUNICIPIO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `MUNICIPIO`
--

INSERT INTO `MUNICIPIO` (`ID`, `NOME`) VALUES
(1, 'São João de Meriti'),
(2, 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PRESSAO_ARTERIAL_MENSAL`
--

CREATE TABLE IF NOT EXISTS `PRESSAO_ARTERIAL_MENSAL` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) NOT NULL,
  `MES` int(2) NOT NULL,
  `ANO` year(4) NOT NULL,
  `OBSERVACAO` text COLLATE utf8_unicode_ci NOT NULL,
  `RESPONSAVEL_TECNICO` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `RESPONSAVEL_ANOTACAO` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `PRESSAO_ARTERIAL_MENSAL`
--

INSERT INTO `PRESSAO_ARTERIAL_MENSAL` (`ID`, `ID_CLIENTE`, `MES`, `ANO`, `OBSERVACAO`, `RESPONSAVEL_TECNICO`, `RESPONSAVEL_ANOTACAO`) VALUES
(1, 1, 5, 2015, '', '', ''),
(2, 2, 5, 2015, 'outros', 'oitros', 'outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSFUNCAO`
--

CREATE TABLE IF NOT EXISTS `SYSFUNCAO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `SYSFUNCAO`
--

INSERT INTO `SYSFUNCAO` (`ID`, `NOME`) VALUES
(0, 'visualizar'),
(1, 'incluir'),
(2, 'alterar'),
(3, 'excluir'),
(4, 'relatorio'),
(5, 'visualizar pressão arterial'),
(6, 'marcar pressão arterial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSMODULO`
--

CREATE TABLE IF NOT EXISTS `SYSMODULO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `SLUG` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `CHILD` int(11) NOT NULL DEFAULT '0',
  `MENU_PRINCIPAL` int(11) NOT NULL DEFAULT '0',
  `OUTROS` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `CHILD` (`CHILD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `SYSMODULO`
--

INSERT INTO `SYSMODULO` (`ID`, `NOME`, `SLUG`, `CHILD`, `MENU_PRINCIPAL`, `OUTROS`) VALUES
(1, 'Configuração Geral', 'up', 0, 0, 0),
(2, 'Funcionário', 'funcionario', 1, 1, 0),
(3, 'Medicamento', 'medicamento', 1, 0, 0),
(4, 'Cliente', 'cliente', 1, 0, 0),
(5, 'Doenças', 'doencas', 1, 0, 0),
(6, 'Doenças Nivel alfa', 'doencas_nivel_alfa', 5, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `SYSPERFIL`
--

CREATE TABLE IF NOT EXISTS `SYSPERFIL` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `GERAL` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `SYSPERFIL`
--

INSERT INTO `SYSPERFIL` (`ID`, `NOME`, `GERAL`) VALUES
(1, 'Gerente', 1),
(2, 'Usuario', NULL),
(3, 'Visitante', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `SYSPERFIL_SYSFUNCAO`
--

INSERT INTO `SYSPERFIL_SYSFUNCAO` (`ID`, `ID_PERFIL`, `ID_MODULO`, `ID_FUNCAO`) VALUES
(1, 2, 2, 0),
(2, 2, 1, 0),
(3, 2, 4, 0),
(4, 2, 4, 1),
(5, 2, 4, 2);

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
  PRIMARY KEY (`ID`),
  KEY `FK_SYSPERFIL` (`FK_SYSPERFIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `SYSUSUARIO`
--

INSERT INTO `SYSUSUARIO` (`ID`, `LOGIN`, `SENHA`, `ID_FUNCIONARIO`, `FK_SYSPERFIL`) VALUES
(1, 'ivanrufino', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `v_acesso`
--
CREATE TABLE IF NOT EXISTS `v_acesso` (
`ID_PERFIL` int(11)
,`ID_MODULO` int(11)
,`MODULO` varchar(60)
,`MODULO_SLUG` varchar(80)
,`ID_FUNCAO` int(11)
,`FUNCAO` varchar(60)
);
-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `v_login`
--
CREATE TABLE IF NOT EXISTS `v_login` (
`ID` int(11)
,`LOGIN` varchar(15)
,`SENHA` varchar(100)
,`PERFIL` varchar(60)
,`GERAL` tinyint(4)
,`ID_PERFIL` int(11)
,`NOME` varchar(80)
,`EMAIL` varchar(50)
,`STATUS` tinyint(1)
,`FOTO` varchar(250)
);
-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `v_moduloMenu`
--
CREATE TABLE IF NOT EXISTS `v_moduloMenu` (
`ID` int(11)
,`NOME` varchar(60)
,`SLUG` varchar(80)
,`CHILD` int(11)
,`MENU_PRINCIPAL` int(11)
,`ID_PERFIL` int(11)
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `v_pressao_cliente`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_lavivencia`.`v_pressao_cliente` AS select `C`.`ID` AS `ID_CLIENTE`,`C`.`NOME` AS `NOME`,`PAM`.`MES` AS `MES`,`PAM`.`ANO` AS `ANO`,`PAM`.`OBSERVACAO` AS `OBSERVACAO`,`PAM`.`RESPONSAVEL_TECNICO` AS `RESPONSAVEL_TECNICO`,`PAM`.`RESPONSAVEL_ANOTACAO` AS `RESPONSAVEL_ANOTACAO`,`M`.`DIA` AS `DIA`,`M`.`PS` AS `PS`,`M`.`PD` AS `PD`,str_to_date(concat(`PAM`.`MES`,'/',`M`.`DIA`,'/',`PAM`.`ANO`),'%m/%d/%Y') AS `data` from ((`db_lavivencia`.`CLIENTES` `C` join `db_lavivencia`.`PRESSAO_ARTERIAL_MENSAL` `PAM` on((`PAM`.`ID_CLIENTE` = `C`.`ID`))) join `db_lavivencia`.`MEDICAO` `M` on((`M`.`ID_PRESSAO` = `PAM`.`ID`)));
-- em uso (#1356 - View 'db_lavivencia.v_pressao_cliente' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Estrutura para visualizar `v_acesso`
--
DROP TABLE IF EXISTS `v_acesso`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_acesso` AS select `SP`.`ID` AS `ID_PERFIL`,`SM`.`ID` AS `ID_MODULO`,`SM`.`NOME` AS `MODULO`,`SM`.`SLUG` AS `MODULO_SLUG`,`SF`.`ID` AS `ID_FUNCAO`,`SF`.`NOME` AS `FUNCAO` from (((`SYSPERFIL` `SP` join `SYSPERFIL_SYSFUNCAO` `SPS` on((`SPS`.`ID_PERFIL` = `SP`.`ID`))) join `SYSMODULO` `SM` on((`SM`.`ID` = `SPS`.`ID_MODULO`))) join `SYSFUNCAO` `SF` on((`SF`.`ID` = `SPS`.`ID_FUNCAO`)));

-- --------------------------------------------------------

--
-- Estrutura para visualizar `v_login`
--
DROP TABLE IF EXISTS `v_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_login` AS select `SU`.`ID` AS `ID`,`SU`.`LOGIN` AS `LOGIN`,`SU`.`SENHA` AS `SENHA`,`SP`.`NOME` AS `PERFIL`,`SP`.`GERAL` AS `GERAL`,`SU`.`FK_SYSPERFIL` AS `ID_PERFIL`,`F`.`NOME` AS `NOME`,`F`.`EMAIL` AS `EMAIL`,`F`.`STATUS` AS `STATUS`,`F`.`FOTO` AS `FOTO` from ((`SYSUSUARIO` `SU` join `SYSPERFIL` `SP` on((`SP`.`ID` = `SU`.`FK_SYSPERFIL`))) join `FUNCIONARIO` `F` on((`F`.`ID` = `SU`.`ID_FUNCIONARIO`))) group by `SU`.`ID`;

-- --------------------------------------------------------

--
-- Estrutura para visualizar `v_moduloMenu`
--
DROP TABLE IF EXISTS `v_moduloMenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_moduloMenu` AS select distinct `SM`.`ID` AS `ID`,`SM`.`NOME` AS `NOME`,`SM`.`SLUG` AS `SLUG`,`SM`.`CHILD` AS `CHILD`,`SM`.`MENU_PRINCIPAL` AS `MENU_PRINCIPAL`,`SPS`.`ID_PERFIL` AS `ID_PERFIL` from ((`SYSMODULO` `SM` left join `SYSPERFIL_SYSFUNCAO` `SPS` on((`SPS`.`ID_MODULO` = `SM`.`ID`))) left join `SYSPERFIL` `SP` on((`SPS`.`ID_PERFIL` = `SP`.`ID`)));

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `FUNCIONARIO`
--
ALTER TABLE `FUNCIONARIO`
  ADD CONSTRAINT `FUNCIONARIO_ibfk_1` FOREIGN KEY (`FKFUNCAO`) REFERENCES `FUNCAO` (`ID`),
  ADD CONSTRAINT `FUNCIONARIO_ibfk_2` FOREIGN KEY (`FKESCOLARIDADE`) REFERENCES `ESCOLARIDADE` (`ID`),
  ADD CONSTRAINT `FUNCIONARIO_ibfk_3` FOREIGN KEY (`FKMUNICIPIO`) REFERENCES `MUNICIPIO` (`ID`),
  ADD CONSTRAINT `FUNCIONARIO_ibfk_4` FOREIGN KEY (`FKNATURALIDADE`) REFERENCES `MUNICIPIO` (`ID`);

--
-- Restrições para a tabela `MEDICAO`
--
ALTER TABLE `MEDICAO`
  ADD CONSTRAINT `MEDICAO_ibfk_1` FOREIGN KEY (`ID_PRESSAO`) REFERENCES `PRESSAO_ARTERIAL_MENSAL` (`ID`);

--
-- Restrições para a tabela `PRESSAO_ARTERIAL_MENSAL`
--
ALTER TABLE `PRESSAO_ARTERIAL_MENSAL`
  ADD CONSTRAINT `PRESSAO_ARTERIAL_MENSAL_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `CLIENTE` (`ID`);

--
-- Restrições para a tabela `SYSPERFIL_SYSFUNCAO`
--
ALTER TABLE `SYSPERFIL_SYSFUNCAO`
  ADD CONSTRAINT `SYSPERFIL_SYSFUNCAO_ibfk_1` FOREIGN KEY (`ID_PERFIL`) REFERENCES `SYSPERFIL` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `SYSPERFIL_SYSFUNCAO_ibfk_2` FOREIGN KEY (`ID_MODULO`) REFERENCES `SYSMODULO` (`ID`),
  ADD CONSTRAINT `SYSPERFIL_SYSFUNCAO_ibfk_3` FOREIGN KEY (`ID_FUNCAO`) REFERENCES `SYSFUNCAO` (`ID`);

--
-- Restrições para a tabela `SYSUSUARIO`
--
ALTER TABLE `SYSUSUARIO`
  ADD CONSTRAINT `SYSUSUARIO_ibfk_1` FOREIGN KEY (`FK_SYSPERFIL`) REFERENCES `SYSPERFIL` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
