-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `fingerprint`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificado`
--

CREATE TABLE IF NOT EXISTS `certificado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `ass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `certificado_FKIndex1` (`evento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `certificado`
--

INSERT INTO `certificado` (`id`, `evento_id`, `layout`, `ass`) VALUES
(1, 3, '85f72710e20602b3f593dd17a19ef465.jpg', '85f72710e20602b3f593dd17a19ef465.png'),
(2, 1, 'b5e39c518fd1ec92e72a99bb76dbf0ce.jpg', 'b5e39c518fd1ec92e72a99bb76dbf0ce.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `ministrante` varchar(255) DEFAULT NULL,
  `ch` int(10) unsigned DEFAULT NULL,
  `ch_min` int(10) unsigned DEFAULT NULL,
  `inicio` varchar(10) DEFAULT NULL,
  `fim` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_FKIndex1` (`evento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `evento_id`, `nome`, `ministrante`, `ch`, `ch_min`, `inicio`, `fim`) VALUES
(1, 1, 'SEGURANÇA PARA APLICAÇÕES WEB', 'Manoel Messias', 12, 8, '12/02/2019', '15/02/2019'),
(2, 1, 'DESIGN RESPONSIVO E UX', 'JP', 12, 8, '12/02/2019', '15/02/2019'),
(3, 1, 'CLOUD COMPUTING', 'RogÃ©rio', 12, 8, '12/02/2019', '15/02/2019'),
(4, 2, 'BANCO DE DADOS PARA WEB', 'Aislan', 12, 8, '12/02/2019', '15/02/2019'),
(5, 2, 'PROGRAMAÇÃO WEB BACK END', 'Ricardo Sekeff Budairoch', 12, 8, '12/02/2019', '15/02/2019'),
(6, 5, 'Ténicas de Enxerto ', 'Claudio', 12, 8, '12/02/2019', '15/02/2019'),
(7, 5, 'Semana da Ecologia', 'Bruna', 12, 8, '12/02/2019', '15/02/2019'),
(8, 4, 'Semana do Administrador ', 'JoÃ£o ', 12, 8, '12/02/2019', '15/02/2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `instituicao_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento_FKIndex1` (`instituicao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `instituicao_id`, `nome`) VALUES
(1, 1, 'EITEC'),
(2, 1, 'EDIFPI'),
(3, 3, 'SINFO'),
(4, 4, 'Semana Cientí­fica da Faculdade Rsá'),
(5, 2, 'SEMEAU'),
(6, 5, 'SINISTRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `nome`) VALUES
(1, 'Instituto Federal de Educação - IFPI'),
(2, 'Universidade Estadual - UESPI'),
(3, 'Universidade Federal - UFPI'),
(4, 'Faculdade Rsá - IESRSA'),
(5, 'Universidade Norte do Paraná - UNOPAR'),
(6, 'UNINTER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `data_nasc` varchar(10) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `f1` blob,
  `fone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `participante`
--

INSERT INTO `participante` (`id`, `nome`, `sexo`, `rg`, `cpf`, `data_nasc`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `f1`, `fone`) VALUES
(1, 'Lucas de Moura Santos', 'Masculino', '3.035.388', '046.028.433-95', '05/12/1991', '64603030', 'Avenida Frei Damião', 'Belo Norte', 'Picos', 'PI', NULL, '89988081210'),
(2, 'Bruna Fiori Castro', 'Feminino', '2.444.546', '299.016.263-15', '05/12/1991', '64600148', 'Avenida Nossa Senhora de Fátima', 'Canto da Varzea', 'Picos', 'PI', NULL, '89999151220'),
(3, 'Pedro Alcântara de Melo ', 'Masculino', '1.111.111', '662.502.933-53', '21/06/2001', '64600-613', 'Travessa Dona Mundica', 'Boa Vista', 'Picos', 'PI', NULL, '89999151220'),
(4, 'Thiago Lima Araújo', 'Masculino', '1.111.111', '662.502.933-53', '21/06/2001', '64604-510', 'Rua Joaquim Olegário', 'Ipueiras', 'Picos', 'PI', NULL, '89999151220'),
(5, 'Bruno Silva Sousa', 'Masculino', '2.453.907', '172.937.998-01', '21/06/2001', '64600-150', 'Rua Celso Eulálio', 'Canto da Varzea', 'Picos', 'PI', NULL, ''),
(6, 'Ana Beatriz Campos', 'Feminino', '4.665.998', '232.989.543-12', '21/06/2001', '64605-055', 'Rua Ursulino Cândido', 'Pedrinhas', 'Picos', 'PI', NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante_tem_curso`
--

CREATE TABLE IF NOT EXISTS `participante_tem_curso` (
  `participante_id` int(10) unsigned NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`participante_id`,`curso_id`),
  KEY `participante_has_curso_FKIndex1` (`participante_id`),
  KEY `participante_has_curso_FKIndex2` (`curso_id`),
  KEY `participante_tem_curso_FKIndex3` (`evento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `participante_tem_curso`
--

INSERT INTO `participante_tem_curso` (`participante_id`, `curso_id`, `evento_id`) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 8, 4),
(1, 6, 5),
(2, 7, 5),
(4, 7, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE IF NOT EXISTS `ponto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `participante_id` int(10) unsigned NOT NULL,
  `data_2` varchar(10) DEFAULT NULL,
  `hora_entrada` varchar(10) DEFAULT NULL,
  `hora_saida` varchar(10) DEFAULT NULL,
  `saldo_horas` varchar(10) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ponto_FKIndex1` (`participante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `senha` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`) VALUES
(2, 'admin', 'lucasmourasantos@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'lucas', 'lucasmourasantos@gmail.com', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
