-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Dez-2020 às 02:31
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hudson`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_parceiro`
--

CREATE TABLE `cad_parceiro` (
  `idParceiro` int(4) UNSIGNED NOT NULL,
  `nomeParceiro` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `dataNascimento` date NOT NULL DEFAULT current_timestamp(),
  `sexo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT current_timestamp(),
  `cep` int(12) DEFAULT current_timestamp(),
  `endereco` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT current_timestamp(),
  `numero` int(10) DEFAULT current_timestamp(),
  `complemento` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT current_timestamp(),
  `bairro` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT current_timestamp(),
  `estado` varchar(2) DEFAULT current_timestamp(),
  `cidade` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT current_timestamp(),
  `situacao` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cad_parceiro`
--

INSERT INTO `cad_parceiro` (`idParceiro`, `nomeParceiro`, `dataNascimento`, `sexo`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `estado`, `cidade`, `situacao`) VALUES
(1, 'João Honório', '2069-05-01', 'Masculino', 41926, 'Rua Ipiranga', 221, 'Bloco 5 ap 202', 'Santa Crus', 'BA', 'Salvador', 'Excluido'),
(9, 'Daniela Lucia', '1970-01-13', 'Feminino', 0, '', 0, '', '', '', '', 'Excluido'),
(10, 'Maria Francisca', '1975-08-03', 'Feminino', 59122, 'Rua José Soares', 222, 'casa A', 'Redinha', 'RN', 'Natal', 'Ativo'),
(11, 'Amauri Grosso da Costa', '1965-06-05', 'Masculino', 58407, 'Rua Antônio Telha', 555, '', 'José Pinheiro', 'PB', 'Campina Grande', 'Ativo'),
(12, 'Luana Modric', '2001-02-01', 'Feminino', 0, '', 0, '', '', '', '', 'Ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cad_parceiro`
--
ALTER TABLE `cad_parceiro`
  ADD PRIMARY KEY (`idParceiro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cad_parceiro`
--
ALTER TABLE `cad_parceiro`
  MODIFY `idParceiro` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
