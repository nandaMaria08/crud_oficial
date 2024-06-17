-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17/06/2024 às 23:02
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

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

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`) VALUES
(1, 'Avon'),
(3, 'Natura'),
(28, 'Oboticário');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `produto` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `validade` date NOT NULL,
  `quantidade` int NOT NULL,
  `id_marca` int NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_marca` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `produto`, `descricao`, `preco`, `validade`, `quantidade`, `id_marca`) VALUES
(2, 'Essencial oud', '100ml', 150.00, '2024-12-31', 2, 3),
(6, 'Luna', '75ml Feminino', 90.00, '2025-07-18', 5, 3),
(7, 'Essencial Tradicional', '100ml', 150.00, '2025-12-24', 2, 3),
(8, 'Body sprash(todo dia)', 'cereja e avelã', 40.00, '2028-05-30', 4, 3),
(9, 'Hidratante todo dia', 'Cereja e Avelã', 40.00, '2027-04-30', 4, 3),
(25, 'Accordes Harmonia', 'Feminino', 160.00, '2028-06-17', 1, 28),
(26, 'Egeo tradicional', 'Perfume unissex', 130.00, '2025-11-11', 2, 28),
(27, 'Protetor solar', '30fps', 25.00, '2025-06-23', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `email`, `usuario`, `nome`, `telefone`, `senha`) VALUES
(1, 'maria.costa1394@aluno.ce.gov.br', 'Maria Fernanda Sombra Costa', 'Fernanda', '98889888', '123'),
(2, 'zildete@gmail.com', 'Zildete de Carvalho Sombra', 'Zildete', '88 99964789', '123'),
(3, 'jesusvaldecelio03@gmail.com', 'jesus costa', 'Jesus', '88996965806', 'abcd.1234'),
(4, 'victor.mendonca@aluno.ce.gov.br', 'vic', 'adjl', '88993647451', '123'),
(5, 'luana.cordeiro3@aluno.ce.gov.br', 'Luana', 'Luana', '8989898989', '123');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE,
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
