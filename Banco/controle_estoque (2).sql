-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2024 às 22:32
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
-- Banco de dados: `controle_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`) VALUES
(1, 'Avon'),
(2, 'Oboticário'),
(3, 'Natura');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `produto` varchar(80) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `validade` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `produto`, `descricao`, `preco`, `validade`, `quantidade`, `id_marca`) VALUES
(1, 'Floratta red', '100ml', 120.00, '2024-06-29', 2, 2),
(2, 'Essencial oud', '100ml', 150.00, '2024-12-31', 2, 3),
(4, 'Protetor solar', '30fps', 25.00, '2024-06-30', 2, 1),
(6, 'Luna', '75ml Feminino', 90.00, '2025-07-18', 5, 3),
(7, 'Essencial Tradicional', '100ml', 150.00, '2025-12-24', 2, 3),
(8, 'Body sprash(todo dia)', 'cereja e avelã', 40.00, '2028-05-30', 4, 3),
(9, 'Hidratante todo dia', 'Cereja e Avelã', 40.00, '2027-04-30', 4, 3),
(10, 'Kit egeo blue', 'Perfume e desodorante', 150.00, '2026-06-16', 1, 2),
(11, 'Egeo tradicional', 'perfume', 130.00, '2027-01-16', 1, 2),
(12, 'Egeo enjoy', 'Perfume unissex', 100.00, '2026-07-16', 1, 2),
(13, 'Accordes Harmonia', 'Perfume feminino', 160.00, '2026-10-16', 1, 2),
(14, 'Floratta blue', '75ml', 130.00, '2026-02-16', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `email`, `usuario`, `nome`, `telefone`, `senha`) VALUES
(1, 'maria.costa1394@aluno.ce.gov.br', 'Maria Fernanda Sombra Costa', 'Fernanda', '98889888', '123'),
(2, 'zildete@gmail.com', 'Zildete de Carvalho Sombra', 'Zildete', '88 99964789', '123'),
(3, 'jesusvaldecelio03@gmail.com', 'jesus costa', 'Jesus', '88996965806', 'abcd.1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
