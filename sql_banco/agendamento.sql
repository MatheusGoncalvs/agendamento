-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Out-2018 às 02:09
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `tipo_servico` varchar(100) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `cod_cliente` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `tipo_servico`, `dia`, `mes`, `ano`, `horario`, `cod_cliente`) VALUES
(1, 'Servico1', 22, 10, 2018, '10:00', 'admin'),
(2, 'Servico2', 22, 10, 2018, '10:00', 'matheus'),
(3, 'Servico 3', 7, 10, 2018, '20:46', 'admin'),
(4, 'Servico exibir somente no user Matheus', 24, 10, 2018, '20:35', '00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_horario`
--

CREATE TABLE `servico_horario` (
  `cod_horario` int(11) NOT NULL,
  `data_horario` varchar(80) NOT NULL,
  `horario` varchar(80) NOT NULL,
  `cod_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico_horario`
--

INSERT INTO `servico_horario` (`cod_horario`, `data_horario`, `horario`, `cod_servico`) VALUES
(2, '22/10/2018', '10:00', 1),
(3, '08/10/2018', '19:56', 1),
(4, '22/10/2018', '10:00', 2),
(5, '24/10/2018', '20:35', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin'),
(2, 'matheus', '123'),
(3, 'sa', 'sa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_agendamento`
--

CREATE TABLE `usuario_agendamento` (
  `cod_agendamento` int(11) NOT NULL,
  `cod_usuario` varchar(80) NOT NULL,
  `cod_servico` int(11) NOT NULL,
  `cod_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_agendamento`
--

INSERT INTO `usuario_agendamento` (`cod_agendamento`, `cod_usuario`, `cod_servico`, `cod_horario`) VALUES
(18, 'admin', 1, 2),
(19, 'admin', 2, 4),
(36, 'matheus', 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico_horario`
--
ALTER TABLE `servico_horario`
  ADD PRIMARY KEY (`cod_horario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indexes for table `usuario_agendamento`
--
ALTER TABLE `usuario_agendamento`
  ADD PRIMARY KEY (`cod_agendamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servico_horario`
--
ALTER TABLE `servico_horario`
  MODIFY `cod_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario_agendamento`
--
ALTER TABLE `usuario_agendamento`
  MODIFY `cod_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
