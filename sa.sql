-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2024 às 12:48
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `professor` tinyint(1) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `container`
--

CREATE TABLE `container` (
  `id` int(11) NOT NULL,
  `placa_caminhao` varchar(7) NOT NULL,
  `nome_motorista` varchar(200) NOT NULL,
  `container` varchar(25) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `lacre` varchar(10) NOT NULL,
  `lacre_sif` int(11) NOT NULL,
  `temperatura` double NOT NULL,
  `IMO` int(11) NOT NULL,
  `n_onu` varchar(200) NOT NULL,
  `desgastado` tinyint(1) NOT NULL,
  `avaria_esquerda` tinyint(1) NOT NULL,
  `avaria_direita` tinyint(1) NOT NULL,
  `avaria_teto` tinyint(1) NOT NULL,
  `avaria_frente` tinyint(1) NOT NULL,
  `sem_lacre` tinyint(1) NOT NULL,
  `adesivo_avaria` tinyint(1) NOT NULL,
  `execesso_altura` tinyint(1) NOT NULL,
  `execesso_direita` int(11) NOT NULL,
  `execesso_esquerda` tinyint(1) NOT NULL,
  `execesso_frontal` tinyint(1) NOT NULL,
  `painel_avaria` tinyint(1) NOT NULL,
  `sem_caboenergia` tinyint(1) NOT NULL,
  `sem_lona` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `container`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadoscliente`
--

CREATE TABLE `dadoscliente` (
  `cnpj` varchar(15) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dadoscliente`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `danfe`
--

CREATE TABLE `danfe` (
  `id` int(11) NOT NULL,
  `codbarra` int(11) NOT NULL,
  `n` varchar(255) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `operacao` tinyint(1) NOT NULL,
  `data_emissao` date NOT NULL,
  `hora_emissao` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `danfe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `pedido` int(11) NOT NULL,
  `produto` varchar(200) NOT NULL,
  `unidades` varchar(255) NOT NULL,
  `quantidades` int(11) NOT NULL,
  `valor` float NOT NULL,
  `total` float NOT NULL,
  `ncm` int(11) NOT NULL,
  `cst` int(11) NOT NULL,
  `cfop` int(11) NOT NULL,
  `doca` varchar(10) NOT NULL,
  `faltando` tinyint(11) NOT NULL,
  `avaria` tinyint(11) NOT NULL,
  `totalcompra` float NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `id_danfe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id` int(11) NOT NULL,
  `solicitacao` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `unidades` varchar(255) NOT NULL,
  `quantidades` int(11) NOT NULL,
  `valor` float NOT NULL,
  `totalcompra` float NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `doca` varchar(10) NOT NULL,
  `vistoria` varchar(255) NOT NULL,
  `carregado` tinyint(4) NOT NULL,
  `id_danfe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacoes`
--

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dadoscliente`
--
ALTER TABLE `dadoscliente`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `danfe`
--
ALTER TABLE `danfe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `container`
--
ALTER TABLE `container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `danfe`
--
ALTER TABLE `danfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
