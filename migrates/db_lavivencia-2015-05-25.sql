-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/05/2015 às 16h08min
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
  `FOTO` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OBSERVACAO` text COLLATE utf8_unicode_ci,
  `DT_ALTERACAO` datetime DEFAULT NULL,
  `DT_NASCIMENTO` datetime DEFAULT NULL,
  `QUARTO` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAMA` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TEMPORARIO` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `FK_PLANO_SAUDE` int(11) NOT NULL,
  `COBRE_INTERNACAO` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `COBRE_REMOCAO` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `FK_CONTATO` int(11) NOT NULL,
  `INSCRICAO` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `DT_SAIDA` datetime NOT NULL,
  `FK_DIETA` int(11) NOT NULL,
  `IDENTIDADE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ORGAO` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `DIAGNOSTICO` text COLLATE utf8_unicode_ci NOT NULL,
  `CPF` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `EST_CIVIL` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MOTIVO_SAIDA` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ATIVO` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `DT_CADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ORIGEM` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PLANO_SAUDE` (`FK_PLANO_SAUDE`),
  KEY `FK_CONTATO` (`FK_CONTATO`),
  KEY `FK_DIETA` (`FK_DIETA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `CLIENTE`
--

INSERT INTO `CLIENTE` (`ID`, `NOME`, `FOTO`, `OBSERVACAO`, `DT_ALTERACAO`, `DT_NASCIMENTO`, `QUARTO`, `CAMA`, `TEMPORARIO`, `FK_PLANO_SAUDE`, `COBRE_INTERNACAO`, `COBRE_REMOCAO`, `FK_CONTATO`, `INSCRICAO`, `DT_SAIDA`, `FK_DIETA`, `IDENTIDADE`, `ORGAO`, `DIAGNOSTICO`, `CPF`, `EST_CIVIL`, `MOTIVO_SAIDA`, `ATIVO`, `DT_CADASTRO`, `ORIGEM`) VALUES
(1, 'Ivan Rufino', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 1, 'N', 'N', 1, '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 'S', '0000-00-00 00:00:00', ''),
(2, 'Outro ivan', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 1, 'N', 'N', 2, '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 'S', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CONTATO`
--

CREATE TABLE IF NOT EXISTS `CONTATO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `PARENTESCO` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ENDERECO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SUBBAIRRO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `BAIRRO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `REFERENCIAS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_MUNICIPIO` int(11) NOT NULL,
  `UF` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `CEP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIDADE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ORGAO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TELEFONES` text COLLATE utf8_unicode_ci NOT NULL,
  `DT_NASCIMENTO` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `CONTATO`
--

INSERT INTO `CONTATO` (`ID`, `NOME`, `PARENTESCO`, `ENDERECO`, `SUBBAIRRO`, `BAIRRO`, `REFERENCIAS`, `FK_MUNICIPIO`, `UF`, `CEP`, `EMAIL`, `IDENTIDADE`, `ORGAO`, `TELEFONES`, `DT_NASCIMENTO`) VALUES
(1, 'Ivan Rufino', '', '', '', '', '', 0, '', '', '', '', '', '', '0000-00-00 00:00:00'),
(2, 'Outro ivan', '', '', '', '', '', 0, '', '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `DIETA`
--

CREATE TABLE IF NOT EXISTS `DIETA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `DIETA`
--

INSERT INTO `DIETA` (`ID`, `NOME`) VALUES
(1, 'TUDO LIBERADO');

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
  `SUBBAIRRO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `FUNCIONARIO` (`ID`, `FKFUNCAO`, `NOME`, `INSCRICAO`, `ENDERECO`, `SUBBAIRRO`, `BAIRRO`, `REFERENCIAS`, `FKMUNICIPIO`, `UF`, `CEP`, `EMAIL`, `IDENTIDADE`, `ORGAO`, `NUMCARTEIRA`, `NUMPIS`, `NUMCNH`, `TELEFONES`, `DTNASCIMENTO`, `DTCADASTRO`, `DTADMISSAO`, `NOME_MAE`, `FKNATURALIDADE`, `FKESCOLARIDADE`, `FKINDICACAO`, `NUM_FILHOS`, `ESTADOCIVIL`, `SALARIO`, `OBSERVACAO`, `TURNO`, `INDICADO`, `FOTO`, `STATUS`) VALUES
(1, 1, 'Ivan Rufino Martins', '09878901742', 'Rua Madureira', 'indisponivel', 'Vilar dos Teles', '', 1, 'RJ', '25565-241', 'ivan.rufino.m@gmail.com', '12345678901', 'dic', '3456789', '456789', '6545678', '567899876\r\n456789098765\r\n4567890098\r\n456789098', '1984-04-02', '2015-05-22 17:31:45', '2015-05-04', 'Lourdes', 2, 1, NULL, 1, 'Solteiro', 4556.00, NULL, 'noite', '', 'ivan.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `MEDICAO`
--

INSERT INTO `MEDICAO` (`ID`, `ID_PRESSAO`, `DIA`, `PS`, `PD`) VALUES
(1, 1, 1, 120, 150),
(2, 1, 2, 120, 80),
(3, 2, 2, 120, 80),
(4, 3, 2, 120, 80),
(5, 3, 3, 120, 80),
(6, 3, 4, 120, 80);

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
-- Estrutura da tabela `PLANO_SAUDE`
--

CREATE TABLE IF NOT EXISTS `PLANO_SAUDE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `TELEFONE_PLANO` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE_AMBULANCIA` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONES` text COLLATE utf8_unicode_ci,
  `ATIVO` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `DT_CADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `PLANO_SAUDE`
--

INSERT INTO `PLANO_SAUDE` (`ID`, `NOME`, `TELEFONE_PLANO`, `TELEFONE_AMBULANCIA`, `TELEFONES`, `ATIVO`, `DT_CADASTRO`) VALUES
(1, 'AMIL', NULL, NULL, NULL, 'S', '2015-05-25 14:57:24');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `PRESSAO_ARTERIAL_MENSAL`
--

INSERT INTO `PRESSAO_ARTERIAL_MENSAL` (`ID`, `ID_CLIENTE`, `MES`, `ANO`, `OBSERVACAO`, `RESPONSAVEL_TECNICO`, `RESPONSAVEL_ANOTACAO`) VALUES
(1, 1, 5, 2015, '', '', ''),
(2, 2, 5, 2015, 'outros', 'oitros', 'outros'),
(3, 1, 6, 2015, '', '', '');

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
-- Estrutura stand-in para visualizar `v_pressao_cliente`
--
CREATE TABLE IF NOT EXISTS `v_pressao_cliente` (
`ID_CLIENTE` int(11)
,`NOME` varchar(80)
,`MES` int(2)
,`ANO` year(4)
,`OBSERVACAO` text
,`RESPONSAVEL_TECNICO` varchar(500)
,`RESPONSAVEL_ANOTACAO` varchar(500)
,`DIA` int(11)
,`PS` int(11)
,`PD` int(11)
,`data` date
);
-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `v_relatorio_funcionario`
--
CREATE TABLE IF NOT EXISTS `v_relatorio_funcionario` (
`ID` int(11)
,`FUNCAO` varchar(60)
,`NOME` varchar(80)
,`INSCRICAO` varchar(15)
,`ENDERECO` varchar(50)
,`SUBBAIRRO` varchar(80)
,`BAIRRO` varchar(80)
,`MUNICIPIO` varchar(80)
,`UF` varchar(2)
,`CEP` varchar(10)
,`EMAIL` varchar(50)
,`IDENTIDADE` varchar(15)
,`ORGAO` varchar(10)
,`NUMCARTEIRA` varchar(15)
,`NUMPIS` varchar(15)
,`NUMCNH` varchar(15)
,`TELEFONES` text
,`DTNASCIMENTO` date
,`DTCADASTRO` timestamp
,`DTADMISSAO` date
,`NOME_MAE` varchar(50)
,`NATURALIDADE` varchar(80)
,`ESCOLARIDADE` varchar(80)
,`NUM_FILHOS` int(11)
,`ESTADOCIVIL` varchar(20)
,`SALARIO` decimal(10,2)
,`OBSERVACAO` text
,`TURNO` varchar(30)
,`INDICADO` varchar(80)
,`FOTO` varchar(250)
,`STATUS` tinyint(1)
);
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

-- --------------------------------------------------------

--
-- Estrutura para visualizar `v_pressao_cliente`
--
DROP TABLE IF EXISTS `v_pressao_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pressao_cliente` AS select `C`.`ID` AS `ID_CLIENTE`,`C`.`NOME` AS `NOME`,`PAM`.`MES` AS `MES`,`PAM`.`ANO` AS `ANO`,`PAM`.`OBSERVACAO` AS `OBSERVACAO`,`PAM`.`RESPONSAVEL_TECNICO` AS `RESPONSAVEL_TECNICO`,`PAM`.`RESPONSAVEL_ANOTACAO` AS `RESPONSAVEL_ANOTACAO`,`M`.`DIA` AS `DIA`,`M`.`PS` AS `PS`,`M`.`PD` AS `PD`,str_to_date(concat(`PAM`.`MES`,'/',`M`.`DIA`,'/',`PAM`.`ANO`),'%m/%d/%Y') AS `data` from ((`CLIENTE` `C` join `PRESSAO_ARTERIAL_MENSAL` `PAM` on((`PAM`.`ID_CLIENTE` = `C`.`ID`))) join `MEDICAO` `M` on((`M`.`ID_PRESSAO` = `PAM`.`ID`)));

-- --------------------------------------------------------

--
-- Estrutura para visualizar `v_relatorio_funcionario`
--
DROP TABLE IF EXISTS `v_relatorio_funcionario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_relatorio_funcionario` AS select `FN`.`ID` AS `ID`,`FU`.`NOME` AS `FUNCAO`,`FN`.`NOME` AS `NOME`,`FN`.`INSCRICAO` AS `INSCRICAO`,`FN`.`ENDERECO` AS `ENDERECO`,`FN`.`SUBBAIRRO` AS `SUBBAIRRO`,`FN`.`BAIRRO` AS `BAIRRO`,`M`.`NOME` AS `MUNICIPIO`,`FN`.`UF` AS `UF`,`FN`.`CEP` AS `CEP`,`FN`.`EMAIL` AS `EMAIL`,`FN`.`IDENTIDADE` AS `IDENTIDADE`,`FN`.`ORGAO` AS `ORGAO`,`FN`.`NUMCARTEIRA` AS `NUMCARTEIRA`,`FN`.`NUMPIS` AS `NUMPIS`,`FN`.`NUMCNH` AS `NUMCNH`,`FN`.`TELEFONES` AS `TELEFONES`,`FN`.`DTNASCIMENTO` AS `DTNASCIMENTO`,`FN`.`DTCADASTRO` AS `DTCADASTRO`,`FN`.`DTADMISSAO` AS `DTADMISSAO`,`FN`.`NOME_MAE` AS `NOME_MAE`,`M2`.`NOME` AS `NATURALIDADE`,`E`.`NOME` AS `ESCOLARIDADE`,`FN`.`NUM_FILHOS` AS `NUM_FILHOS`,`FN`.`ESTADOCIVIL` AS `ESTADOCIVIL`,`FN`.`SALARIO` AS `SALARIO`,`FN`.`OBSERVACAO` AS `OBSERVACAO`,`FN`.`TURNO` AS `TURNO`,`FN`.`INDICADO` AS `INDICADO`,`FN`.`FOTO` AS `FOTO`,`FN`.`STATUS` AS `STATUS` from ((((`FUNCIONARIO` `FN` left join `FUNCAO` `FU` on((`FN`.`FKFUNCAO` = `FU`.`ID`))) join `MUNICIPIO` `M` on((`FN`.`FKMUNICIPIO` = `M`.`ID`))) join `MUNICIPIO` `M2` on((`FN`.`FKNATURALIDADE` = `M2`.`ID`))) join `ESCOLARIDADE` `E` on((`FN`.`FKESCOLARIDADE` = `E`.`ID`))) where 1;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD CONSTRAINT `CLIENTE_ibfk_3` FOREIGN KEY (`FK_DIETA`) REFERENCES `DIETA` (`ID`),
  ADD CONSTRAINT `CLIENTE_ibfk_1` FOREIGN KEY (`FK_PLANO_SAUDE`) REFERENCES `PLANO_SAUDE` (`ID`),
  ADD CONSTRAINT `CLIENTE_ibfk_2` FOREIGN KEY (`FK_CONTATO`) REFERENCES `CONTATO` (`ID`);

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
