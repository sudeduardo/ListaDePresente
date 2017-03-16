
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 16/03/2017 às 18:27:48
-- Versão do Servidor: 10.0.28-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u910052122_lista`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `produto_id` int(11) NOT NULL,
  `lista_id` int(11) NOT NULL,
  PRIMARY KEY (`produto_id`,`lista_id`),
  KEY `fk_item_lista1_idx` (`lista_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuario_id`),
  KEY `fk_lista_usuario1_idx` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lista`
--

INSERT INTO `lista` (`id`, `nome`, `link`, `usuario_id`) VALUES
(0, 'Do', '69020354d93aaeb5602d2207c14e210f', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `nome`, `foto`, `senha`, `data_cadastro`) VALUES
(0, 'sudeduardo@hotmail.com.br', 'sudeduardo@hotmail.com.br', '69020354d93aaeb5602d2207c14e210f3321.jpg', 'ab780f4f91afc82de586ff8a27ee1ece', '2016-12-05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
