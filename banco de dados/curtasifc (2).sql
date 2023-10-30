-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2023 às 21:37
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curtasifc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ano`
--

CREATE TABLE `ano` (
  `descricao` varchar(255) DEFAULT NULL,
  `cod` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curta`
--

CREATE TABLE `curta` (
  `cod` int(11) NOT NULL,
  `protagonista` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `duracao` time DEFAULT NULL,
  `Ano` int(11) DEFAULT NULL,
  `Tema` int(11) DEFAULT NULL,
  `Genero` int(11) DEFAULT NULL,
  `turma` varchar(255) DEFAULT NULL,
  `poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `descricao` varchar(255) DEFAULT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `premiacao`
--

CREATE TABLE `premiacao` (
  `Des` varchar(255) DEFAULT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `ano` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `curta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tema`
--

CREATE TABLE `tema` (
  `descricao` varchar(255) DEFAULT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cod` int(1) NOT NULL,
  `data_nasc` varchar(40) NOT NULL,
  `adm` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `email`, `senha`, `cod`, `data_nasc`, `adm`) VALUES
('victor', 'foda@gmail.com', '456', 1, '2006-04-12', 0),
('Victor2', 'teste5@gmail.com', '456', 2, '2006-08-21', 1),
('felipe', 'felipe@gmail.com', '321', 3, '1990-05-11', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ano`
--
ALTER TABLE `ano`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `ano` (`ano`);

--
-- Índices de tabela `curta`
--
ALTER TABLE `curta`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `Ano` (`Ano`),
  ADD KEY `Tema` (`Tema`),
  ADD KEY `Genero` (`Genero`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `premiacao`
--
ALTER TABLE `premiacao`
  ADD PRIMARY KEY (`curta`);

--
-- Índices de tabela `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ano`
--
ALTER TABLE `ano`
  ADD CONSTRAINT `ano` FOREIGN KEY (`ano`) REFERENCES `curta` (`Ano`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `curta`
--
ALTER TABLE `curta`
  ADD CONSTRAINT `curta_ibfk_1` FOREIGN KEY (`Ano`) REFERENCES `ano` (`cod`),
  ADD CONSTRAINT `curta_ibfk_2` FOREIGN KEY (`Tema`) REFERENCES `tema` (`cod`),
  ADD CONSTRAINT `curta_ibfk_3` FOREIGN KEY (`Genero`) REFERENCES `genero` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
