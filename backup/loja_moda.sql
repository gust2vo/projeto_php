-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 09/06/2024 às 23:52
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
-- Banco de dados: `loja_moda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dataNascimento` date NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `cpf`, `email`, `senha`, `dataNascimento`, `grupo`) VALUES
(1, 'admin', '78952631455', 'admin@admin.com', '$2y$10$8lgkEOXEE1E23jsG4nSIAeZgEEu8pcBcUqKmYyoHMPckF7sMo4vwG', '0012-12-12', 1),
(28, 'Gustavo', '45678912355', 'asd@gmail.com', '$2y$10$KHSjwQATjhJfShtF6zEaduSgh6ZklWW9o4uNh/Tcs0mF73g5UZ8LC', '0012-12-12', 0),
(29, 'Joao', '37518465111', 'asdasd@asdasd.com', '$2y$10$zLcYUMyxOgRxDim2ao8KYeCvnFZnY7FZnFdxZ.0fLeIfdFty8Rs0u', '0012-12-12', 0),
(30, 'teste', '75395175322', 'abc@abc.com', '$2y$10$/ovDEEhpzI6sw7Vwxk7GNu6IWDW02fQante5RrEq2g5xWTz3b1Kdi', '0012-12-12', 0),
(31, 'Rogerio', '79531682544', 'asd@123.com', '$2y$10$nUq3IDhADluD0gtdOMa1EeILhpE5be1tsPkhziICOxO99zs21tHgK', '0012-12-12', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `quantidade_solicitada` int(11) NOT NULL,
  `quantidade_recebida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `nome`, `quantidade_solicitada`, `quantidade_recebida`) VALUES
(2, 'Venus', 25, 25),
(4, 'Aurora', 40, 35),
(5, 'Rebirth', 33, 33);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `quantidade`) VALUES
(8, 'Camisa', '50.00', 47),
(9, 'Tenis', '200.00', 5),
(10, 'Calça', '90.00', 5),
(11, 'Bermuda', '90.00', 4),
(12, 'Terno', '400.00', 47),
(14, 'Chinelo Infantil', '60.00', 145);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
