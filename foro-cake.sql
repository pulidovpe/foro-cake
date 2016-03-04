-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2016 at 11:25 PM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foro-cake`
--
DROP DATABASE `foro-cake`;
CREATE DATABASE IF NOT EXISTS `foro-cake` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `foro-cake`;

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comentario_foro`
--

CREATE TABLE IF NOT EXISTS `comentario_foro` (
`id` int(5) NOT NULL,
  `id_tema` int(5) NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `comentario` text NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'S',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foro_categorias`
--

CREATE TABLE IF NOT EXISTS `foro_categorias` (
`id` int(5) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foro_subforos`
--

CREATE TABLE IF NOT EXISTS `foro_subforos` (
`id` int(5) NOT NULL,
  `id_foro_categoria` int(5) NOT NULL,
  `subforo` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `temas` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foro_temas`
--

CREATE TABLE IF NOT EXISTS `foro_temas` (
`id` int(5) NOT NULL,
  `id_subforo` int(5) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'D',
  `comentarios` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(7) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `correo` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `facebook` varchar(250) NOT NULL,
  `google` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `fecharegistro` date NOT NULL,
  `ultimoacceso` date NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'N',
  `firma` text NOT NULL,
  `mensajes` int(5) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `ip_cliente` varchar(40) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_sessions`
--
ALTER TABLE `cake_sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario_foro`
--
ALTER TABLE `comentario_foro`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foro_categorias`
--
ALTER TABLE `foro_categorias`
 ADD PRIMARY KEY (`id`), ADD KEY `id_forocategoria` (`id`);

--
-- Indexes for table `foro_subforos`
--
ALTER TABLE `foro_subforos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foro_temas`
--
ALTER TABLE `foro_temas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario_foro`
--
ALTER TABLE `comentario_foro`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `foro_categorias`
--
ALTER TABLE `foro_categorias`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foro_subforos`
--
ALTER TABLE `foro_subforos`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `foro_temas`
--
ALTER TABLE `foro_temas`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
