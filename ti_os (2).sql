-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/12/2023 às 15:55
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
-- Banco de dados: `ti_os`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo_autorizacao`
--

CREATE TABLE `cargo_autorizacao` (
  `ID_CARGO` int(11) NOT NULL,
  `NOME_CARGO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo_autorizacao`
--

INSERT INTO `cargo_autorizacao` (`ID_CARGO`, `NOME_CARGO`) VALUES
(2, 'Técnico'),
(3, 'Usuário'),
(8, 'ADM');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID_TIPO_SERVICO` int(11) NOT NULL,
  `NOME_AREA_SERVICO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`ID_TIPO_SERVICO`, `NOME_AREA_SERVICO`) VALUES
(26, 'Hardware'),
(28, 'Infraestrutura'),
(31, 'Software'),
(43, 'Outras');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamado`
--

CREATE TABLE `chamado` (
  `ID_CHAMADO` int(11) NOT NULL,
  `DESCRICAO_DO_CHAMADO` varchar(255) DEFAULT NULL,
  `DATA_DE_ABERTURA` varchar(20) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_STATUS` int(11) DEFAULT NULL,
  `ID_TIPO_SERVICO` int(11) DEFAULT NULL,
  `ID_PRIORIDADE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamado`
--

INSERT INTO `chamado` (`ID_CHAMADO`, `DESCRICAO_DO_CHAMADO`, `DATA_DE_ABERTURA`, `ID_USUARIO`, `ID_STATUS`, `ID_TIPO_SERVICO`, `ID_PRIORIDADE`) VALUES
(66, 'Socorro não funciona', '06/12/2023 08:22:15', 8, 6, 26, 12),
(67, 'Em nome de Jesus faça esse computador funcionar..', '06/12/2023 08:22:49', 8, 6, 26, 8),
(77, 'Esta saindo Fumaça ', '06/12/2023 11:03:19', 8, 10, 26, 8),
(78, 'Joguei café no computador sem querer.', '06/12/2023 11:04:18', 8, 11, 26, 8),
(79, 'Esqueci a senha do meu PC', '06/12/2023 11:06:00', 8, 12, 26, 8),
(80, 'Preciso de ajuda eu sou maluco ', '06/12/2023 11:06:55', 8, 11, 26, 8),
(81, 'Meu pc não ta bom ', '06/12/2023 11:07:23', 8, 6, 26, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `prioridade`
--

CREATE TABLE `prioridade` (
  `ID_PRIORIDADE` int(11) NOT NULL,
  `NOME_PRIORIDADE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prioridade`
--

INSERT INTO `prioridade` (`ID_PRIORIDADE`, `NOME_PRIORIDADE`) VALUES
(8, 'Alta Prioridade'),
(9, 'Media Prioridade'),
(12, 'Baixa Prioridade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(11) NOT NULL,
  `NOME_STATUS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`ID_STATUS`, `NOME_STATUS`) VALUES
(6, 'Aguardando Execução'),
(10, 'Cancelada'),
(11, 'Em Execução'),
(12, 'Concluído');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(200) DEFAULT NULL,
  `SENHA` varchar(20) DEFAULT NULL,
  `DATA_DE_CADASTRO` varchar(10) DEFAULT NULL,
  `ID_CARGO` int(11) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOME`, `EMAIL`, `SENHA`, `DATA_DE_CADASTRO`, `ID_CARGO`, `TELEFONE`) VALUES
(8, 'WALLACE BENITES', 'wallacepuck@gmail.com', '123456', '28/11/2023', 8, '(61)98206-9825'),
(20, 'MIKE PATTON', 'wallacebenites6@gmail.com', '555', '03/12/2023', 2, '(61)9820-69824'),
(23, 'RODINEI MARCOS', 'wallacebenites7@gmail.com', '555', '05/12/2023', 3, '(61)98269-8277');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo_autorizacao`
--
ALTER TABLE `cargo_autorizacao`
  ADD PRIMARY KEY (`ID_CARGO`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_TIPO_SERVICO`);

--
-- Índices de tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`ID_CHAMADO`),
  ADD KEY `fk_chamado_usuario` (`ID_USUARIO`),
  ADD KEY `fk_chamado_status` (`ID_STATUS`),
  ADD KEY `fk_chamado_tipo_servico` (`ID_TIPO_SERVICO`),
  ADD KEY `fk_chamado_prioridade` (`ID_PRIORIDADE`);

--
-- Índices de tabela `prioridade`
--
ALTER TABLE `prioridade`
  ADD PRIMARY KEY (`ID_PRIORIDADE`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `fk_usuario_cargo` (`ID_CARGO`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo_autorizacao`
--
ALTER TABLE `cargo_autorizacao`
  MODIFY `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_TIPO_SERVICO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `ID_CHAMADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `prioridade`
--
ALTER TABLE `prioridade`
  MODIFY `ID_PRIORIDADE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `fk_chamado_prioridade` FOREIGN KEY (`ID_PRIORIDADE`) REFERENCES `prioridade` (`ID_PRIORIDADE`),
  ADD CONSTRAINT `fk_chamado_status` FOREIGN KEY (`ID_STATUS`) REFERENCES `status` (`ID_STATUS`),
  ADD CONSTRAINT `fk_chamado_tipo_servico` FOREIGN KEY (`ID_TIPO_SERVICO`) REFERENCES `categoria` (`ID_TIPO_SERVICO`),
  ADD CONSTRAINT `fk_chamado_usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cargo` FOREIGN KEY (`ID_CARGO`) REFERENCES `cargo_autorizacao` (`ID_CARGO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
