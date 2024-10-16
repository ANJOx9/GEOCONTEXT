-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/10/2024 às 02:54
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `geocontext`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`, `latitude`, `longitude`) VALUES
(1, 'São Paulo', 'SP', '-23.5506507', '-46.6333824'),
(2, 'Rio de janeiro', 'RJ', '-22.9110137', '-43.2093727'),
(3, 'Santa Catarina', 'SC', '-27.0628367', '-51.114965'),
(4, 'Acre', 'AC', '-9.0478679', '-70.5264976'),
(5, 'Bahia', 'BA', '-12.285251', '-41.9294776'),
(6, 'Amazonas', 'AM', '-4.479925', '-63.5185396'),
(7, 'Minas Gerais', 'MG', '-18.5264844', '-44.1588654'),
(8, 'Pernambuco', 'PE', '-8.4116316', '-37.5919699'),
(9, 'Amapá', 'AP', '1.3545442', '-51.9161977'),
(10, 'Pará', 'PA', '-4.7493933', '-52.8973006'),
(11, 'Alagoas', 'AL', '-9.6611661', '-36.6502426'),
(12, 'Ceará', 'CE', '-5.3264703', '-39.7156073'),
(13, 'Distrito Federal', 'DF', '-15.7754462', '-47.7970891'),
(14, 'Espírito Santo', 'ES', '-19.5687682', '-40.1721991'),
(15, 'Goiás', 'GO', '-15.9323662', '-50.1392928'),
(16, 'Maranhão', 'MA', '-5.2085503', '-45.3930262'),
(17, 'Mato Grosso', 'MT', '-12.2115009', '-55.5716547'),
(18, 'Mato Grosso do Sul', 'MS', '-19.5852564', '-54.4794731'),
(19, 'Paraíba', 'PB', '-7.1219366', '-36.7246845'),
(20, 'Piauí', 'PI', '-7.6992782', '42.5043787'),
(21, 'Rio Grande do Norte', 'RN', '-5.6781175', '-36.4781776'),
(22, 'Rio Grande do Sul', 'RS', '-29.8425284', '-53.7680577'),
(23, 'Rondônia', 'RO', '-10.943145', '-62.8277863'),
(24, 'Roraima', 'RR', '2.135138', '-61.3631922'),
(25, 'Sergipe', 'SE', '-10.6743911', '-37.3773519'),
(26, 'Tocantins', 'TO', '-10.8855129', '-48.3716912'),
(28, 'Paraná', 'PR', '-24.4842187', '-51.8148872');

-- --------------------------------------------------------

--
-- Estrutura para tabela `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem_fundo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `players`
--

INSERT INTO `players` (`id`, `nome`, `senha`, `imagem_fundo`) VALUES
(1, 'dias', '$2y$10$VgcDv.DZnE6hzCFthf4.a.4GyhRxxsZDQ/jbNhHRU3tOtlU1jkWfC', ''),
(2, 'carlos', '$2y$10$GK3N7Se0B8IHlyNZ0E6thukJY5ZIHatjkN2PQPTcrMHyM86sXxKum', ''),
(3, 'tulio', '$2y$10$QahtEI6.HCJxWr2b8FZ5AOzUKW.SxPxk3RSmkR0kng5vplOuXyaTy', ''),
(4, 'Rei de tpo', '$2y$10$7Ww8AXkkckDUinvdRTvzD.09P9IMbXIok7/yJC33DqXg6XKA3JvLq', '1729125019_brazil.jpg'),
(5, 'pedri', '$2y$10$4Wb8o8JXogmiJ0bNWRgQC.19a7xFy.hYQPrs7gcmyFhqNkVQLNO5G', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
