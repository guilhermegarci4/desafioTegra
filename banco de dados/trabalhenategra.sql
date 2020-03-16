-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/03/2020 às 23:06
-- Versão do servidor: 10.4.8-MariaDB
-- Versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalhenategra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nome`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, 'Administrador Desafio', 'adm@tegra.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2020-03-10 19:40:22.000000', '2020-03-10 19:40:22.000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_cupons`
--

CREATE TABLE `tbl_cupons` (
  `id_cupom` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL DEFAULT 0,
  `autor` varchar(250) NOT NULL DEFAULT '-',
  `desconto` int(11) NOT NULL,
  `cupom` varchar(100) NOT NULL,
  `dataExpiracao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbl_cupons`
--

INSERT INTO `tbl_cupons` (`id_cupom`, `id_livro`, `autor`, `desconto`, `cupom`, `dataExpiracao`) VALUES
(7, 0, 'Martin Fowler	', 10, 'TrabalheNaTegra', '2020-03-20'),
(8, 0, 'Robert C. Martin	', 20, 'TrabalheNaTegra', '2020-03-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_livros`
--

CREATE TABLE `tbl_livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `preco` varchar(30) NOT NULL,
  `qtdEstoque` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbl_livros`
--

INSERT INTO `tbl_livros` (`id_livro`, `titulo`, `autor`, `preco`, `qtdEstoque`, `image`) VALUES
(25, 'O Programador Pragmático: De Aprendiz a Mestre	', 'Andrew Hunt, David Thomas', '125,50', 50, '15842985785e6e7a52df2df.jpg'),
(26, 'The Mythical Man-Month: Essays on Software Engineering', 'Frederick P. Brooks Jr.', '170,19', 32, '15842986375e6e7a8d06156.jpg'),
(27, 'Expressões Regulares - Uma Abordagem Divertida', 'Aurelio Marinho Jargas	', '47,20', 10, '15842986845e6e7abc36af3.jpg'),
(28, 'Domain-Driven Design: Tackling Complexity in the Heart of Software', 'Eric Evans	', '251,14', 32, '15842988985e6e7b926b72c.jpg'),
(29, 'Padrões de Arquitetura de Aplicações Corporativas', 'Martin Fowler', '101,59', 25, '15842989445e6e7bc019455.jpg'),
(30, 'The Design of Design: Essays from a Computer Scientist	', 'Frederick P. Jr. Brooks', '161,75', 5, '15842998285e6e7f3422b57.jpg'),
(31, 'Shell Script Profissional	', 'Aurelio Marinho Jargas	', '62,35', 37, '15842998795e6e7f67ec07f.jpg'),
(32, 'NoSQL Essencial: Um Guia Conciso para o Mundo Emergente da Persistência Poliglota	', 'Pramod J. Sadalage, Martin Fowler', '52,00', 19, '15842999145e6e7f8a85a34.jpg'),
(33, 'Refactoring: Improving the Design of Existing Code	', 'Martin Fowler	', '220,63', 43, '15842999875e6e7fd3755d9.jpg'),
(34, 'Clean Code: A Handbook of Agile Software Craftsmanship	', 'Robert C. Martin	', '180,04', 16, '15843002245e6e80c0cdac1.jpg'),
(35, 'Clean Agile: Back to Basics	', 'Robert C. Martin	', '174,20', 29, '15843002695e6e80ed64f68.jpg'),
(36, 'Building Microservices: Designing Fine-Grained Systems	', 'Sam Newman', '209,30', 6, '15843003395e6e8133ae26f.jpg'),
(37, 'Designing Data-Intensive Applications: The Big Ideas Behind Reliable, Scalable, and Maintainable Systems	', 'Martin Kleppmann', '82,99', 37, '15843003875e6e8163bbc2b.jpg'),
(38, 'Clean Architecture: A Craftsman\'s Guide to Software Structure and Design', 'Robert C. Martin	', '148,61', 1, '15843001615e6e808198b0b.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_cupons`
--
ALTER TABLE `tbl_cupons`
  ADD PRIMARY KEY (`id_cupom`);

--
-- Índices de tabela `tbl_livros`
--
ALTER TABLE `tbl_livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices de tabela `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_cupons`
--
ALTER TABLE `tbl_cupons`
  MODIFY `id_cupom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbl_livros`
--
ALTER TABLE `tbl_livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
