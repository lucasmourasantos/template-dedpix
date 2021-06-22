-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Maio-2021 às 01:46
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ded2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idprofessor` int(10) UNSIGNED NOT NULL,
  `instituicao_idinstituicao` int(10) UNSIGNED NOT NULL,
  `disciplina_iddisciplina` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idprofessor`, `instituicao_idinstituicao`, `disciplina_iddisciplina`, `nome`) VALUES
(1, 2, 2, 'Lucas de Moura Santos'),
(3, 0, 2, 'Paulo José de Moura Leal'),
(4, 0, 1, 'FULANO DE TAL'),
(5, 1, 2, 'FULANO DE TAL'),
(6, 1, 2, 'FULANO DE TAL'),
(7, 0, 2, 'Paulo José de Moura Leal');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idprofessor`),
  ADD KEY `professor_FKIndex1` (`disciplina_iddisciplina`),
  ADD KEY `professor_FKIndex2` (`instituicao_idinstituicao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idprofessor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
