-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2025 às 00:53
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
-- Banco de dados: `sistema_agendamento`
--
CREATE DATABASE IF NOT EXISTS `sistema_agendamento` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sistema_agendamento`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_agendamento`
--

CREATE TABLE `tbl_agendamento` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT 'Agendamento',
  `id_cliente` int(11) NOT NULL,
  `data` date NOT NULL,
  `estado_agendamento` varchar(50) NOT NULL DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_agendamento`
--

INSERT INTO `tbl_agendamento` (`id`, `tipo`, `id_cliente`, `data`, `estado_agendamento`) VALUES
(11, 'Agendamento', 9, '2025-05-19', 'Aprovado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `BI` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `telefone1` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `localizacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id`, `nome`, `BI`, `telefone`, `telefone1`, `email`, `localizacao`) VALUES
(9, 'NP tech Lda', '5432325351', '921710891', '938893435', 'nptech@gmail.com', 'Lua Av. 21 de Jan. Morro Bento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `nif` varchar(30) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `morada` text NOT NULL,
  `logo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`nif`, `empresa`, `email`, `telefone`, `morada`, `logo`) VALUES
('5432325351', 'Pró-servir Comércio', 'rosariolucas977@gmail.com', '9398934356', 'patriota-honga,luanda                        ', '6827b81cbb87e.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_itens_servico`
--

CREATE TABLE `tbl_itens_servico` (
  `id` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `id_agendamento` int(11) NOT NULL,
  `qtd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_itens_servico`
--

INSERT INTO `tbl_itens_servico` (`id`, `id_servico`, `id_agendamento`, `qtd`) VALUES
(11, 1, 11, 1),
(12, 2, 11, 1),
(13, 4, 11, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_mensagem`
--

CREATE TABLE `tbl_mensagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(50) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_mensagem`
--

INSERT INTO `tbl_mensagem` (`id`, `nome`, `email`, `assunto`, `mensagem`) VALUES
(2, 'Noé Samulunda', 'noesamulunda1995@gmail.com', 'Testar', 'Queremos apenas testar o sistema');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_orcamento`
--

CREATE TABLE `tbl_orcamento` (
  `id` int(11) NOT NULL,
  `data_orcamento` date NOT NULL,
  `id_agendamento` int(11) NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_orcamento`
--

INSERT INTO `tbl_orcamento` (`id`, `data_orcamento`, `id_agendamento`, `valor`, `id_usuario`) VALUES
(6, '2025-05-19', 11, 100000.00, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_projeto`
--

CREATE TABLE `tbl_projeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagem` varchar(20) NOT NULL,
  `endereco` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_projeto`
--

INSERT INTO `tbl_projeto` (`id`, `nome`, `categoria`, `imagem`, `endereco`) VALUES
(1, 'Construção de Prédio', 'Construção', '6827205744c79.jpg', 'Luanda, Futungo de Belas'),
(2, 'Manutenção de estradas', 'Montagem', '682724faee65c.jpg', 'Benguela, municipio de cubal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_sevico`
--

CREATE TABLE `tbl_sevico` (
  `id` int(11) NOT NULL,
  `servico` varchar(100) NOT NULL,
  `imagem` varchar(20) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_sevico`
--

INSERT INTO `tbl_sevico` (`id`, `servico`, `imagem`, `categoria`) VALUES
(1, 'Construção de Pontes', 'Construção', '6826a40d43ba8.jpg'),
(2, 'Montagem de Barragem', 'Montagem', '68269cb10dae8.jpg'),
(4, 'Manutenção de estradas', 'Construção', '68271b53bcdcc.jpg'),
(6, 'construção de estradas', 'Construção', '6827b901aab9c.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_testemunho`
--

CREATE TABLE `tbl_testemunho` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `testemunho` text NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `imagem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_testemunho`
--

INSERT INTO `tbl_testemunho` (`id`, `nome`, `testemunho`, `cargo`, `imagem`) VALUES
(1, 'Bernardo Kapepula', '&quot;Estou muito satisfeito com os serviços prestados pela equipe de construção. Foram profissionais do início ao fim, cumpriram os prazos combinados e entregaram um trabalho de qualidade. Recomendo a todos que procuram um serviço sério e bem-feito.&quot;', 'Gestor de Redes', '68294df10edf3.jpg'),
(2, 'Madalena Fonseca', 'É uma plataforma agradavel e eficaz para todo os cliente ou empresa no geral', 'Gestora', '682a513be7db7.jpg'),
(3, 'Madalena', 'bons servicos e atentimento ', 'Gestor de Redes', '682a60eddb92f.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `sobrenome`, `perfil`, `email`, `senha`, `imagem`, `status`) VALUES
(2, 'Noé', 'Samulunda', 'Admin', 'noesamulunda1995@gmail.com', '$2y$10$rBqVGZZu6MKXFctKNQ2Wu.SD6VGo93SHVB/NjtMCQ52b.LQrN/Fva', '6827bad6b31a3.jpg', 'Activo'),
(4, 'Madalena', 'Fonseca', 'Admin', 'teste@gmail.com', '$2y$10$ohtU6ce1r6o9A3qhRHqImuIGl4eAzCTp9glJYwLQtrEqDJ3FPVNja', '6827b8946ef17.jpg', 'Activo'),
(5, 'Rosário', 'Lucas', 'Atendente', 'rosariolucas97@gmail.com', '$2y$10$jFOElmJeggS2Bz90sZtkHed4DsudsgvZcslhdUBhjZrZF2WU0rrOy', '682a5324228f6.jpg', 'Activo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_agendamento`
--
ALTER TABLE `tbl_agendamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_agendamento` (`id_cliente`);

--
-- Índices de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`nif`);

--
-- Índices de tabela `tbl_itens_servico`
--
ALTER TABLE `tbl_itens_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servico_itens_servico` (`id_servico`),
  ADD KEY `agendamento_itens_servico` (`id_agendamento`);

--
-- Índices de tabela `tbl_mensagem`
--
ALTER TABLE `tbl_mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendamento_orcamento` (`id_agendamento`),
  ADD KEY `orcamento_usuario` (`id_usuario`);

--
-- Índices de tabela `tbl_projeto`
--
ALTER TABLE `tbl_projeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_sevico`
--
ALTER TABLE `tbl_sevico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_testemunho`
--
ALTER TABLE `tbl_testemunho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_agendamento`
--
ALTER TABLE `tbl_agendamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbl_itens_servico`
--
ALTER TABLE `tbl_itens_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbl_mensagem`
--
ALTER TABLE `tbl_mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbl_projeto`
--
ALTER TABLE `tbl_projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_sevico`
--
ALTER TABLE `tbl_sevico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_testemunho`
--
ALTER TABLE `tbl_testemunho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_agendamento`
--
ALTER TABLE `tbl_agendamento`
  ADD CONSTRAINT `cliente_agendamento` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_itens_servico`
--
ALTER TABLE `tbl_itens_servico`
  ADD CONSTRAINT `agendamento_itens_servico` FOREIGN KEY (`id_agendamento`) REFERENCES `tbl_agendamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servico_itens_servico` FOREIGN KEY (`id_servico`) REFERENCES `tbl_sevico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  ADD CONSTRAINT `agendamento_orcamento` FOREIGN KEY (`id_agendamento`) REFERENCES `tbl_agendamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orcamento_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
