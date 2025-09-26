-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2025 a las 21:58:23
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id`, `Denominacion`) VALUES
(1, 'Desarrollo Nuevas funcionalidades'),
(2, 'Reporte de error'),
(3, 'Soporte Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE IF NOT EXISTS `iva` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoIva` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`Id`, `Denominacion`, `CodigoIva`) VALUES
(1, 'Consumidor Final', 'CF'),
(2, 'Responsable Inscripto', 'RI'),
(3, 'Exento', 'EX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`Id`, `Descripcion`) VALUES
(1, 'Cordoba Capital'),
(2, 'Rio IV'),
(3, 'Villa Maria'),
(4, 'Jesus Maria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`Id`, `Denominacion`) VALUES
(1, 'Administrador'),
(2, 'Usuario Normal'),
(3, 'Vendedor'),
(4, 'Encargado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preoridades`
--

CREATE TABLE IF NOT EXISTS `preoridades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `preoridades`
--

INSERT INTO `preoridades` (`Id`, `Denominacion`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(10) NOT NULL,
  `Categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FechaAlta` date NOT NULL,
  `Activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Descripcion`, `Precio`, `Stock`, `Categoria`, `FechaAlta`, `Activo`) VALUES
(1, 'Shampoo PH Neutro', 'Shampoo para el lavado del automotor', '399890.00', 10, 'Shampoo', '2025-09-08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Denominacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Codigo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`Id`, `Denominacion`, `Codigo`) VALUES
(1, 'Cordoba', 'X'),
(2, 'Buenos Aires', 'BA'),
(3, 'Santa Fe', 'SF'),
(4, 'La Rioja', 'LR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `TextoConsulta` text COLLATE utf8_spanish_ci NOT NULL,
  `IdUsuarioCarga` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FechaCarga` datetime NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdPrioridad` int(11) NOT NULL,
  `Respondida` tinyint(1) NOT NULL,
  `Resolucion` text COLLATE utf8_spanish_ci NOT NULL,
  `FechaResolucion` datetime NOT NULL,
  `IdUsuarioResolucion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Id`, `Titulo`, `TextoConsulta`, `IdUsuarioCarga`, `FechaCarga`, `IdCategoria`, `IdPrioridad`, `Respondida`, `Resolucion`, `FechaResolucion`, `IdUsuarioResolucion`) VALUES
(1, 'El monitor enciende, pero con brillo muy bajo', 'Al encender el equipo, el monitor enciende pero con muy poco brillo (las primeras 20 palabras)...', '2', '2025-07-11 00:00:00', 3, 1, 1, 'si', '2025-07-14 00:00:00', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Dni` int(11) NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Cp` int(11) NOT NULL,
  `Email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Cuit` int(11) DEFAULT NULL,
  `IngresoBruto` int(100) NOT NULL,
  `Clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdNivel` int(11) NOT NULL,
  `IdProvincia` int(11) NOT NULL,
  `IdLocalidad` int(11) NOT NULL,
  `IdIva` int(11) NOT NULL,
  `FechaCarga` date NOT NULL,
  `Sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellido`, `Dni`, `Direccion`, `Cp`, `Email`, `Telefono`, `Cuit`, `IngresoBruto`, `Clave`, `IdNivel`, `IdProvincia`, `IdLocalidad`, `IdIva`, `FechaCarga`, `Sexo`, `Imagen`, `Activo`) VALUES
(1, 'Sue', 'Palacios', 30258677, 'AV. Colon 34 Centro', 5000, 'sue@gmail.com', 0, 2147483647, 0, '202cb962ac59075b964b07152d234b70', 1, 1, 1, 1, '2025-07-09', 'F', 'sue.png', 1),
(2, 'Mario', 'Gomez', 44358679, '27 Abril 780 Centro', 5000, 'mario@gmail.com', 0, NULL, 0, '202cb962ac59075b964b07152d234b70', 4, 1, 1, 1, '2025-07-09', 'M', 'team-1.png', 1),
(3, 'Marta', 'Ramirez', 28461235, 'Arenales 22 Jorge Newbery', 5012, 'marta@gmail.com', 0, NULL, 0, '202cb962ac59075b964b07152d234b70', 3, 2, 2, 2, '2025-07-09', 'F', 'team-2.png', 1),
(4, 'Ariel', 'Lopez', 11358952, 'Maria B Postorino 3064', 5012, 'ariel@gmail.com', 0, NULL, 0, '202cb962ac59075b964b07152d234b70', 2, 3, 3, 2, '2025-07-09', 'M', 'user.png', 1),
(5, 'Carlos', 'Pellegrini', 13586395, 'Jose Melian 2583', 5012, 'carlos@gmail.com', 0, NULL, 0, '202cb962ac59075b964b07152d234b70', 2, 1, 4, 2, '2025-07-09', 'M', NULL, 1),
(6, 'German', 'Lopez', 25687523, 'Gral. Paz 17 Centro', 5000, 'german@gmail.com', 0, NULL, 0, '202cb962ac59075b964b07152d234b70', 2, 1, 1, 3, '2025-07-09', 'M', NULL, 1),
(7, 'Martin Emanuel', 'Diaz', 0, 'Esquiu 996', 0, 'martin49@gmail.com', 2147483647, 0, 0, '202cb962ac59075b964b07152d234b70', 2, 1, 2, 1, '2025-09-06', 'M', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
