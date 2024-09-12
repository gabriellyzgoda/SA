-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Set-2024 às 15:54
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

INSERT INTO `cadastro` (`id`, `nome`, `email`, `senha`, `professor`, `cargo`) VALUES
(13, 'gaby', 'gaby@sesi', 'a', 1, 'Professor'),
(14, 'aluno', 'a@1', 'aluno', 0, 'Admin'),
(15, 'chris', 'chris@sesi', 'a', 1, 'Professor'),
(16, 'thamiris', 'chris@aluno', 'thamiris', 0, 'supervisora'),
(18, 'prof lindo', 'pro@g.com', 'pro123', 1, 'Professor'),
(19, 'gabyy', 'gaby@sesis', 'chris', 1, 'Professor'),
(20, 'Amanda', 'amanda@sesi', 'prof', 1, 'Professor'),
(21, 'paula', 'paula@sesi', 'paula', 1, 'Professor'),
(22, 'Senai', 'senai@sesi', 'senai', 1, 'Professor'),
(23, 'Senai', 'senai@sesi', '123a', 1, 'Professor'),
(24, 'thaís', 'thais@senai', 'senai123', 1, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `container`
--

CREATE TABLE `container` (
  `id` int(11) NOT NULL,
  `placa_caminhao` varchar(7) NOT NULL,
  `nome_motorista` varchar(200) NOT NULL,
  `container` varchar(25) NOT NULL,
  `navio` varchar(255) NOT NULL,
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
  `sem_lona` tinyint(1) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `container`
--

INSERT INTO `container` (`id`, `placa_caminhao`, `nome_motorista`, `container`, `navio`, `cliente`, `tipo`, `lacre`, `lacre_sif`, `temperatura`, `IMO`, `n_onu`, `desgastado`, `avaria_esquerda`, `avaria_direita`, `avaria_teto`, `avaria_frente`, `sem_lacre`, `adesivo_avaria`, `execesso_altura`, `execesso_direita`, `execesso_esquerda`, `execesso_frontal`, `painel_avaria`, `sem_caboenergia`, `sem_lona`, `data`) VALUES
(4, '6D', 'gael', 'g', '', 'g', 'g', 'g', 6, 7, 0, 'g', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(5, '56HD', 'HD', 'HVH', '', 'V', 'JHGH', 'V', 6, 0, 67, 'UG6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-01'),
(6, '5AS7CGA', '76s7g6', '6DT76A', '', 'G76R', '76R7', 'F7F', 76, 0, 0, 'F7FF', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-09'),
(8, '76SDG', 'Gabriel', 'Senai', 'Senai', 'Senai', 'Senai', 'Senai', 63367, 30, 0, 'Senai', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(9, '76DG', 'Gabriel', 'Senai', 'Senai', 'Senai', 'Senai', 'Senai', 43674367, 30, 0, 'Senai', 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL),
(10, '5DG', 'HGH', 'GHGH', 'GHGH', 'GHGH', 'HGGH', 'GHHG', 676767, 0, 0, 'GUGU', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-10'),
(11, '5DSG', '666GG', 'GGG', 'GGG', 'G', 'GG', 'G', 66, 0, 0, 'G', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-10'),
(12, '567SD', 'G', 'G', 'G', 'G', 'G', 'G', 7, 0, 0, 'G', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-12');

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

INSERT INTO `dadoscliente` (`cnpj`, `nome`, `endereco`, `telefone`, `email`, `data`) VALUES
('5', 'G', 'G', '5', '5', '2024-09-12'),
('9', '9', '9', '9', '9', '2024-09-12');

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

INSERT INTO `danfe` (`id`, `codbarra`, `n`, `serie`, `operacao`, `data_emissao`, `hora_emissao`) VALUES
(5, 63464356, '6565', '5656', 0, '2024-08-08', '08:08:00'),
(354, 2147483647, '55656', '5656', 1, '2024-08-08', '08:08:00'),
(1234, 2147483647, '567890', '5678', 1, '2024-08-21', '03:59:00'),
(4554, 0, '', '', 1, '0000-00-00', '00:00:00'),
(7823, 2147483647, '3232', '65656', 1, '0008-08-08', '08:08:00'),
(56756, 2147483647, '5656', '5656', 1, '2024-08-29', '07:07:00'),
(123467, 0, '', '', 1, '0000-00-00', '00:00:00'),
(363673, 6, '6', '6', 1, '0006-06-06', '06:06:00'),
(6345454, 6, '6', '6', 0, '0006-06-06', '06:06:00'),
(24523253, 56, '56', '56', 0, '0005-05-05', '05:05:00'),
(32655623, 2356232, '6356723', '562356723', 1, '0003-03-03', '03:03:00');

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

INSERT INTO `pedidos` (`id`, `pedido`, `produto`, `unidades`, `quantidades`, `valor`, `total`, `ncm`, `cst`, `cfop`, `doca`, `faltando`, `avaria`, `totalcompra`, `posicao`, `cnpj`, `id_danfe`) VALUES
(89, 5656, 'G', '5', 5, 5, 25, 5, 55, 5, '', 0, 0, 100, '', '5', ''),
(90, 5656, 'G', '5', 5, 5, 25, 5, 5, 5, '', 0, 0, 100, '', '5', ''),
(91, 5656, 'G', '5', 5, 5, 25, 5, 5, 5, '', 0, 0, 100, '', '5', ''),
(92, 5656, 'G', '5', 5, 5, 25, 5, 5, 5, '', 0, 0, 100, '', '5', ''),
(93, 6767, '6', '6', 6, 6, 36, 6, 6, 6, '', 0, 0, 230, '', '9', ''),
(94, 6767, '7', '7', 7, 7, 49, 77, 7, 7, '', 0, 0, 230, '', '9', ''),
(95, 6767, '8', '8', 8, 8, 64, 88, 8, 8, '', 0, 0, 230, '', '9', ''),
(96, 6767, '9', '9', 9, 9, 81, 9, 9, 9, '', 0, 0, 230, '', '9', '');

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
  `data` date DEFAULT NULL,
  `vistoria` varchar(255) NOT NULL,
  `carregado` tinyint(4) NOT NULL,
  `id_danfe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id`, `solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `posicao`, `doca`, `data`, `vistoria`, `carregado`, `id_danfe`) VALUES
(17, 7, 'garrafa', '6', 6, 6, 213, 'está errado', 'A4', '8', NULL, 'fdfdgrgr', 1, 4),
(18, 7, 'pet', '7', 7, 7, 213, 'certo', 'B2', '8', NULL, 'wrgrherherherhee', 1, 4),
(19, 7, 'travesseiro', '8', 8, 8, 213, 'furado', 'B3', '8', NULL, '', 1, 4),
(20, 7, 'café', '8', 8, 8, 213, 'bom', 'B2', '8', NULL, '', 1, 4),
(37, 8, 'garfo', 'UN', 8, 8, 219, 'senai senai senai\r\n', 'A3', '4', NULL, '', 0, 5),
(38, 8, 'dinheiro', 'UN', 9, 9, 219, 'senai senai senai\r\n', 'B2', '4', NULL, '', 0, 5),
(39, 8, 'carregador', 'UN', 7, 7, 219, 'senai senai senai\r\n', '', '', NULL, '', 0, 5),
(40, 8, 'tecla', 'UN', 5, 5, 219, 'senai senai senai\r\n', '', '', NULL, '', 0, 5),
(41, 5, 'garrafa', '7', 7, 7, 139, 'senai senai senai', '', '', NULL, '', 0, 0),
(42, 5, 'garfo', '7', 7, 7, 139, 'senai senai senai', '', '', NULL, '', 0, 0),
(43, 5, 'tecnologia', '5', 5, 5, 139, 'senai senai senai', '', '', NULL, '', 0, 0),
(44, 5, 'mouse', '4', 4, 4, 139, 'senai senai senai', '', '', NULL, '', 0, 0),
(45, 4, 'gar', '8', 8, 8, 186, '554', 'B3', '6', NULL, '', 1, 0),
(46, 4, 'navio', '9', 9, 9, 186, 'oi oi oi', '', '', NULL, '', 0, 0),
(47, 4, 'celular', '4', 4, 4, 186, '5454', 'C1', '6', NULL, '', 1, 0),
(48, 4, 'fone', '5', 5, 5, 186, 'oi oi oi', '', '', NULL, '', 0, 0),
(49, 3, 'não', '5', 5, 5, 126, 'aaa', 'A3', '5', NULL, '', 1, 0),
(50, 3, 'sei', '4', 4, 4, 126, 'e ai', 'B1', '5', NULL, '', 1, 0),
(51, 3, 'lá', '7', 7, 7, 126, 'oi oi oi ', '', '', NULL, '', 0, 0),
(52, 3, 'onde', '6', 6, 6, 126, 'oi oi oi ', '', '', NULL, '', 0, 0),
(53, 6, '6', '6', 6, 6, 468, '6', '', '', '2024-09-12', '', 0, 0),
(54, 6, '6', '6', 6, 6, 468, '6', '', '', '2024-09-12', '', 0, 0),
(55, 6, '6', '6', 6, 66, 468, '6', '', '', '2024-09-12', '', 0, 0),
(56, 6, '6', '6', 6, 0, 468, '6', '', '', '2024-09-12', '', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `container`
--
ALTER TABLE `container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `danfe`
--
ALTER TABLE `danfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
