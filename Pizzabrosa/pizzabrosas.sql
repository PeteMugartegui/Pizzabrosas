-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2013 a las 19:21:31
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pizzabrosas`
--
CREATE DATABASE IF NOT EXISTS `pizzabrosas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzabrosas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tamano` varchar(15) NOT NULL,
  `especialidad` varchar(25) DEFAULT NULL,
  `ingredientes` varchar(250) DEFAULT NULL,
  `extra` varchar(20) NOT NULL,
  `precio` int(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID`, `tamano`, `especialidad`, `ingredientes`, `extra`, `precio`, `direccion`) VALUES
(28, 'Grande', NULL, 'a:1:{i:0;a:3:{i:0;s:9:"Pepperoni";i:1;s:5:"Jamon";i:2;s:5:"PiÃ±a";}}', 'Brownie', 190, ''),
(29, 'Grande', 'Vegetariana', NULL, 'Brownie', 150, ''),
(30, 'Grande', 'Vegetariana', NULL, 'Brownie', 150, ''),
(31, 'Grande', 'Vegetariana', NULL, 'Brownie', 150, ''),
(32, 'Grande', 'Vegetariana', NULL, 'Brownie', 150, ''),
(33, 'Grande', 'Vegetariana', NULL, 'Brownie', 150, ''),
(34, 'Grande', 'Vegetariana', NULL, 'Brownie', 150, ''),
(35, '', 'Mexicana', NULL, 'Refresco', 0, ''),
(36, 'Grande', 'Meat Lover', NULL, 'Refresco', 150, ''),
(37, 'Grande', 'Chicago', NULL, 'Brownie', 150, ''),
(38, 'Grande', 'Chicago', NULL, 'Brownie', 150, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombre`, `apellido`, `direccion`, `telefono`, `email`, `contrasena`) VALUES
(1, '', 'Pablo', 'Nulo', 'Candelaria 300', 25366472, 'peoe@jue.com', '12345'),
(3, '', '', 'Mugartegui', 'Tixmuxuy #14', 923817233, 'petemugartegui@gmail.com', '12345'),
(4, 'Pepe', 'Pedro', 'Mugartegui', 'Tixmuxuy #14', 13444444, 'petemugartegui@gmail.com', '12345'),
(5, 'Ballina', 'Alexis', 'Ballina', 'Calle 24', 123223435, 'ballina@hotmail.com', '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
