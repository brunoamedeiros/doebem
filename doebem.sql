-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jun-2018 às 10:44
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doebem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contribuicao`
--

CREATE TABLE `contribuicao` (
  `id_contribuicao` int(11) NOT NULL,
  `id_contribuinte` int(11) NOT NULL,
  `id_doacao` int(11) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contribuinte`
--

CREATE TABLE `contribuinte` (
  `id_contribuinte` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `anonimo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id_doacao` int(11) NOT NULL,
  `id_instituicao` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem_perfil` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `imagem_capa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id_instituicao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  `vinculo_api` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao_rede_social`
--

CREATE TABLE `instituicao_rede_social` (
  `id_instituicao` int(11) NOT NULL,
  `id_rede_social` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `id_doacao` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `quantidade` double NOT NULL,
  `valor` double NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `id_resultado` int(11) NOT NULL,
  `id_doacao` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribuicao`
--
ALTER TABLE `contribuicao`
  ADD PRIMARY KEY (`id_contribuicao`,`id_doacao`,`id_contribuinte`) USING BTREE,
  ADD KEY `id_contribuinte` (`id_contribuinte`),
  ADD KEY `id_doacao` (`id_doacao`);

--
-- Indexes for table `contribuinte`
--
ALTER TABLE `contribuinte`
  ADD PRIMARY KEY (`id_contribuinte`);

--
-- Indexes for table `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id_doacao`,`id_instituicao`) USING BTREE,
  ADD KEY `id_instituicao` (`id_instituicao`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id_instituicao`);

--
-- Indexes for table `instituicao_rede_social`
--
ALTER TABLE `instituicao_rede_social`
  ADD PRIMARY KEY (`id_rede_social`),
  ADD KEY `id_instituicao` (`id_instituicao`) USING BTREE;

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`,`id_doacao`) USING BTREE,
  ADD KEY `id_doacao` (`id_doacao`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id_resultado`,`id_doacao`),
  ADD KEY `id_doacao` (`id_doacao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribuicao`
--
ALTER TABLE `contribuicao`
  MODIFY `id_contribuicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contribuinte`
--
ALTER TABLE `contribuinte`
  MODIFY `id_contribuinte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id_doacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id_instituicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instituicao_rede_social`
--
ALTER TABLE `instituicao_rede_social`
  MODIFY `id_rede_social` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contribuicao`
--
ALTER TABLE `contribuicao`
  ADD CONSTRAINT `contribuicao_ibfk_2` FOREIGN KEY (`id_doacao`) REFERENCES `doacao` (`id_doacao`) ON DELETE CASCADE,
  ADD CONSTRAINT `contribuicao_ibfk_3` FOREIGN KEY (`id_contribuinte`) REFERENCES `contribuinte` (`id_contribuinte`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`id_instituicao`) REFERENCES `instituicao` (`id_instituicao`);

--
-- Limitadores para a tabela `instituicao_rede_social`
--
ALTER TABLE `instituicao_rede_social`
  ADD CONSTRAINT `instituicao_rede_social_ibfk_1` FOREIGN KEY (`id_instituicao`) REFERENCES `instituicao` (`id_instituicao`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_doacao`) REFERENCES `doacao` (`id_doacao`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `resultado_ibfk_1` FOREIGN KEY (`id_doacao`) REFERENCES `doacao` (`id_doacao`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `instituicao` ADD `instagram` VARCHAR(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL AFTER `vinculo_api`, ADD `facebook` VARCHAR(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL AFTER `instagram`, ADD `youtube` VARCHAR(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL AFTER `facebook`, ADD `twitter` VARCHAR(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL AFTER `youtube`;
