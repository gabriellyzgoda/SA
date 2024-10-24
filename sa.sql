-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2024 às 12:53
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
  `cargo` varchar(255) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `email`, `senha`, `professor`, `cargo`, `id_turma`) VALUES
(13, 'gaby', 'gaby@sesi', 'a', 1, 'Professor', 0),
(15, 'chris', 'chris@sesi', 'a', 1, 'Professor', 0),
(18, 'prof lindo', 'pro@g.com', 'pro123', 1, 'Professor', 0),
(19, 'gabyy', 'gaby@sesis', 'chris', 1, 'Professor', 0),
(20, 'Amanda', 'amanda@sesi', 'prof', 1, 'Professor', 0),
(21, 'paula', 'paula@sesi', 'paula', 1, 'Professor', 0),
(22, 'Senai', 'senai@sesi', 'senai', 1, 'Professor', 0),
(23, 'Senai', 'senai@sesi', '123a', 1, 'Professor', 0),
(24, 'thaís', 'thais@senai', 'senai123', 1, 'Professor', 0),
(46, 'aluno1', 'aluno1@senai', '4711', 0, 'Aluno', 5),
(47, 'aluno2', 'aluno2@senai', '8781', 0, 'Aluno', 5),
(48, 'aluno3', 'aluno3@senai', '6772', 0, 'Aluno', 5),
(49, 'aluno4', 'aluno4@senai', '1007', 0, 'Aluno', 5),
(50, 'aluno5', 'aluno5@senai', '1936', 0, 'Aluno', 5),
(51, 'aluno6', 'aluno6@senai', '5003', 0, 'Aluno', 5),
(52, 'aluno7', 'aluno7@senai', '8928', 0, 'Aluno', 5),
(53, 'aluno8', 'aluno8@senai', '1361', 0, 'Aluno', 5),
(54, 'aluno9', 'aluno9@senai', '6070', 0, 'Aluno', 5),
(55, 'aluno10', 'aluno10@senai', '2113', 0, 'Aluno', 5),
(56, 'aluno11', 'aluno11@senai', '7207', 0, 'Aluno', 5),
(57, 'aluno12', 'aluno12@senai', '1391', 0, 'Aluno', 5),
(58, 'aluno13', 'aluno13@senai', '2186', 0, 'Aluno', 5),
(59, 'aluno14', 'aluno14@senai', '7870', 0, 'Aluno', 5),
(60, 'aluno15', 'aluno15@senai', '6634', 0, 'Aluno', 5),
(61, 'aluno16', 'aluno16@senai', '3883', 0, 'Aluno', 5),
(62, 'aluno17', 'aluno17@senai', '2237', 0, 'Aluno', 5),
(63, 'aluno18', 'aluno18@senai', '7244', 0, 'Aluno', 5),
(64, 'aluno19', 'aluno19@senai', '3175', 0, 'Aluno', 5),
(65, 'aluno20', 'aluno20@senai', '3461', 0, 'Aluno', 5),
(66, 'aluno1', 'aluno1@senai', '1863', 0, 'Aluno', 6),
(67, 'aluno2', 'aluno2@senai', '7319', 0, 'Aluno', 6),
(68, 'aluno3', 'aluno3@senai', '7705', 0, 'Aluno', 6),
(69, 'aluno4', 'aluno4@senai', '3062', 0, 'Aluno', 6),
(70, 'aluno5', 'aluno5@senai', '2461', 0, 'Aluno', 6),
(71, 'aluno6', 'aluno6@senai', '6174', 0, 'Aluno', 6),
(72, 'aluno7', 'aluno7@senai', '2046', 0, 'Aluno', 6),
(73, 'aluno8', 'aluno8@senai', '7630', 0, 'Aluno', 6),
(74, 'aluno9', 'aluno9@senai', '5095', 0, 'Aluno', 6),
(75, 'aluno10', 'aluno10@senai', '4223', 0, 'Aluno', 6),
(76, 'aluno11', 'aluno11@senai', '6614', 0, 'Aluno', 6),
(77, 'aluno12', 'aluno12@senai', '4635', 0, 'Aluno', 6),
(78, 'aluno13', 'aluno13@senai', '4632', 0, 'Aluno', 6),
(79, 'aluno14', 'aluno14@senai', '2007', 0, 'Aluno', 6),
(80, 'aluno15', 'aluno15@senai', '9949', 0, 'Aluno', 6),
(81, 'aluno16', 'aluno16@senai', '5917', 0, 'Aluno', 6),
(82, 'aluno17', 'aluno17@senai', '4889', 0, 'Aluno', 6),
(83, 'aluno18', 'aluno18@senai', '6834', 0, 'Aluno', 6),
(84, 'aluno19', 'aluno19@senai', '3328', 0, 'Aluno', 6),
(85, 'aluno20', 'aluno20@senai', '1909', 0, 'Aluno', 6),
(86, 'aluno1', 'aluno1@senai', '4726', 0, 'Aluno', 7),
(87, 'aluno2', 'aluno2@senai', '1851', 0, 'Aluno', 7),
(88, 'aluno3', 'aluno3@senai', '6495', 0, 'Aluno', 7),
(89, 'aluno4', 'aluno4@senai', '3842', 0, 'Aluno', 7),
(90, 'aluno5', 'aluno5@senai', '9170', 0, 'Aluno', 7),
(91, 'aluno6', 'aluno6@senai', '7750', 0, 'Aluno', 7),
(92, 'aluno7', 'aluno7@senai', '4454', 0, 'Aluno', 7),
(93, 'aluno8', 'aluno8@senai', '5489', 0, 'Aluno', 7),
(94, 'aluno9', 'aluno9@senai', '7441', 0, 'Aluno', 7),
(95, 'aluno10', 'aluno10@senai', '3624', 0, 'Aluno', 7),
(96, 'aluno11', 'aluno11@senai', '6757', 0, 'Aluno', 7),
(97, 'aluno12', 'aluno12@senai', '7943', 0, 'Aluno', 7),
(98, 'aluno13', 'aluno13@senai', '8030', 0, 'Aluno', 7),
(99, 'aluno14', 'aluno14@senai', '5003', 0, 'Aluno', 7),
(100, 'aluno15', 'aluno15@senai', '2373', 0, 'Aluno', 7),
(101, 'aluno16', 'aluno16@senai', '4342', 0, 'Aluno', 7),
(102, 'aluno17', 'aluno17@senai', '8598', 0, 'Aluno', 7),
(103, 'aluno18', 'aluno18@senai', '6240', 0, 'Aluno', 7),
(104, 'aluno19', 'aluno19@senai', '8741', 0, 'Aluno', 7),
(105, 'aluno20', 'aluno20@senai', '8548', 0, 'Aluno', 7);

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
  `data` date DEFAULT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `container`
--

INSERT INTO `container` (`id`, `placa_caminhao`, `nome_motorista`, `container`, `navio`, `cliente`, `tipo`, `lacre`, `lacre_sif`, `temperatura`, `IMO`, `n_onu`, `desgastado`, `avaria_esquerda`, `avaria_direita`, `avaria_teto`, `avaria_frente`, `sem_lacre`, `adesivo_avaria`, `execesso_altura`, `execesso_direita`, `execesso_esquerda`, `execesso_frontal`, `painel_avaria`, `sem_caboenergia`, `sem_lona`, `data`, `id_turma`) VALUES
(4, '6D', 'gael', 'g', '', 'g', 'g', 'g', 6, 7, 0, 'g', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
(5, '56HD', 'HD', 'HVH', '', 'V', 'JHGH', 'V', 6, 0, 67, 'UG6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-01', 0),
(6, '5AS7CGA', '76s7g6', '6DT76A', '', 'G76R', '76R7', 'F7F', 76, 0, 0, 'F7FF', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-09', 0),
(8, '76SDG', 'Gabriel', 'Senai', 'Senai', 'Senai', 'Senai', 'Senai', 63367, 30, 0, 'Senai', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
(9, '76DG', 'Gabriel', 'Senai', 'Senai', 'Senai', 'Senai', 'Senai', 43674367, 30, 0, 'Senai', 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0),
(10, '5DG', 'HGH', 'GHGH', 'GHGH', 'GHGH', 'HGGH', 'GHHG', 676767, 0, 0, 'GUGU', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-10', 0),
(11, '5DSG', '666GG', 'GGG', 'GGG', 'G', 'GG', 'G', 66, 0, 0, 'G', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-10', 0),
(12, '567SD', 'G', 'G', 'G', 'G', 'G', 'G', 7, 0, 0, 'G', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-12', 0),
(13, '7DH', 'G', 'G', 'G', 'G', 'G', 'G', 6, 6, 6, '6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-10-16', 5);

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
  `data` date NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dadoscliente`
--

INSERT INTO `dadoscliente` (`cnpj`, `nome`, `endereco`, `telefone`, `email`, `data`, `id_turma`) VALUES
('56', '56567', '567', '56755756', '5656', '2024-10-16', 0),
('64', '5', '5', '4646464546', '54665566', '2024-10-16', 0),
('674336743', 'nome', 'rua', '4798851512', 'email@email', '2024-10-09', 0),
('676767', '9', '9', '67676767', '67676767', '2024-10-16', 0),
('7843784343', 'gguggu', 'guuug', '572372367', '823678232378', '2024-10-16', 0);

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
  `hora_emissao` time NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `danfe`
--

INSERT INTO `danfe` (`id`, `codbarra`, `n`, `serie`, `operacao`, `data_emissao`, `hora_emissao`, `id_turma`) VALUES
(565656, 565656, '565656', '565656', 1, '2024-10-09', '07:58:00', 0),
(6367843, 678437843, '67844673', '6746743', 1, '2024-10-16', '11:49:00', 5),
(7843783, 2147483647, '567567567', '566567', 0, '2024-10-16', '10:28:00', 0);

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
  `id_danfe` varchar(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `pedido`, `produto`, `unidades`, `quantidades`, `valor`, `total`, `ncm`, `cst`, `cfop`, `doca`, `faltando`, `avaria`, `totalcompra`, `posicao`, `cnpj`, `id_danfe`, `id_turma`) VALUES
(97, 5, 'garraf', '5', 5, 5, 25, 55, 5, 5, '', 0, 0, 644, '', '674336743', '565656', 0),
(98, 5, 'notebook', '7', 7, 77, 539, 7, 7, 7, '', 0, 0, 644, '', '674336743', '565656', 0),
(99, 5, 'anel', '8', 8, 8, 64, 8, 88, 8, '', 0, 0, 644, '', '674336743', '565656', 0),
(100, 5, 'mouse', '4', 4, 4, 16, 4, 4, 4, '', 0, 0, 644, '', '674336743', '565656', 0),
(101, 56356, 'g', '5', 5, 5, 25, 5, 5, 5, '', 0, 0, 191, '', '7843784343', '', 0),
(102, 56356, 'f', '6', 6, 6, 36, 6, 6, 6, '', 0, 0, 191, '', '7843784343', '', 0),
(103, 56356, 'h', '7', 7, 7, 49, 7, 7, 7, '', 0, 0, 191, '', '7843784343', '', 0),
(104, 56356, 'l', '9', 9, 9, 81, 9, 9, 9, '', 0, 0, 191, '', '7843784343', '', 0),
(105, 343, 'g', '6', 6, 6, 36, 6, 6, 6, '', 0, 0, 217, '', '676767', '', 0),
(106, 343, 'h', '6', 6, 6, 36, 6, 6, 6, '', 0, 0, 217, '', '676767', '', 0),
(107, 343, 'j', '8', 8, 8, 64, 8, 8, 8, '', 0, 0, 217, '', '676767', '', 0),
(108, 343, 'l', '9', 9, 9, 81, 9, 9, 9, '', 0, 0, 217, '', '676767', '', 0),
(109, 8988, '8', '8', 88, 8, 704, 8, 8, 8, '', 0, 0, 1085, '', '64', '', 0),
(110, 8988, '99', '9', 9, 9, 81, 99, 9, 9, '', 0, 0, 1085, '', '64', '', 0),
(111, 8988, '5', '55', 5, 5, 25, 5, 5, 55, '', 0, 0, 1085, '', '64', '', 0),
(112, 8988, '55', '5', 55, 5, 275, 5, 5, 5, '', 0, 0, 1085, '', '64', '', 0),
(113, 545454, '54', '54', 5, 46, 230, 54, 54, 54, '', 0, 0, 886, '', '56', '6367843', 5),
(114, 545454, '6', '6', 6, 6, 36, 66, 6, 6, '', 0, 0, 886, '', '56', '6367843', 5),
(115, 545454, '7', '7', 7, 77, 539, 7, 7, 7, '', 0, 0, 886, '', '56', '6367843', 5),
(116, 545454, '99', '9', 9, 9, 81, 99, 9, 9, '', 0, 0, 886, '', '56', '6367843', 5);

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
  `id_danfe` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id`, `solicitacao`, `produto`, `unidades`, `quantidades`, `valor`, `totalcompra`, `observacoes`, `posicao`, `doca`, `data`, `vistoria`, `carregado`, `id_danfe`, `id_turma`) VALUES
(57, 7, 'g', '7', 7, 7, 179, 'dhdfh\r\n', '', '', '2024-10-16', '', 0, 7843783, 0),
(58, 7, 'h', '7', 7, 7, 179, 'dhdfh\r\n', '', '', '2024-10-16', '', 0, 7843783, 0),
(59, 7, 'k', '9', 9, 9, 179, 'dhdfh\r\n', '', '', '2024-10-16', '', 0, 7843783, 0),
(60, 7, 'l', '0', 0, 0, 179, 'dhdfh\r\n', '', '', '2024-10-16', '', 0, 7843783, 0),
(61, 8, '8', '8', 8, 8, 896, '8', '', '', '2024-10-16', '', 0, 0, 5),
(62, 8, '8', '88', 8, 8, 896, '8', '', '', '2024-10-16', '', 0, 0, 5),
(63, 8, '8', '8', 88, 8, 896, '8', '', '', '2024-10-16', '', 0, 0, 5),
(64, 8, '8', '8', 8, 8, 896, '8', '', '', '2024-10-16', '', 0, 0, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `id_professor`) VALUES
(5, 'aaaaaaa1', 13),
(6, 'hsdhsd5', 20),
(7, 'turma 2', 13);

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
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de tabela `container`
--
ALTER TABLE `container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `danfe`
--
ALTER TABLE `danfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
