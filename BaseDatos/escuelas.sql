-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2015 a las 16:22:21
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `escuelas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `Rol` tinyint(2) unsigned NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombreUsuario` (`nombreUsuario`(7))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `Rol`, `nombreUsuario`, `clave`, `token`, `fecha`) VALUES
(2, 'adminar', '', 1, 'adminar', 'adminar', 'bd1b3012793e4c0babebedf831b7a90b', '2010-08-31 19:03:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `escuela` varchar(255) NOT NULL,
  `curso` int(20) NOT NULL,
  `cursoNombre` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `nombrePadre` varchar(255) NOT NULL,
  `apellidoPadre` varchar(255) NOT NULL,
  `cuilPadre` varchar(255) NOT NULL,
  `MarcaNetbook` int(11) NOT NULL,
  `nombreMarcaNetbook` varchar(255) NOT NULL,
  `numSerie` varchar(15) NOT NULL,
  `prestado` int(11) NOT NULL,
  `cargador` varchar(255) NOT NULL,
  `bateria` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `estadoNetbook` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Volcar la base de datos para la tabla `alumno`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE IF NOT EXISTS `correo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asunto` varchar(255) NOT NULL,
  `nombreOrigen` varchar(255) NOT NULL,
  `nombreDestino` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `correo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(2555) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcar la base de datos para la tabla `curso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosescuela`
--

CREATE TABLE IF NOT EXISTS `datosescuela` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `nombreDirector` varchar(255) NOT NULL,
  `apellidoDirector` varchar(255) NOT NULL,
  `dniDirector` varchar(255) NOT NULL,
  `cuilDirector` varchar(255) NOT NULL,
  `numeroEscuela` varchar(255) NOT NULL,
  `nombreEscuela` varchar(255) NOT NULL,
  `cueEscuela` varchar(255) NOT NULL,
  `seccionEscuela` varchar(255) NOT NULL,
  `domicilioEscuela` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `datosescuela`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadostecnico`
--

CREATE TABLE IF NOT EXISTS `estadostecnico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `estadostecnico`
--

INSERT INTO `estadostecnico` (`id`, `nombre`) VALUES
(1, 'S.Tecnico-Escuela'),
(2, 'S.Tecnico-Enviado'),
(3, 'S.Tecnico-Reparado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `marca`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `netbook`
--

CREATE TABLE IF NOT EXISTS `netbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `MarcaNetbook` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `netbook`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `prestamo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `materia` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `revista` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `ingreso` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `profesor`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'AdministradorAr'),
(2, 'AdministradorSecretaria'),
(3, 'AdministradorBiblioteca\r\n'),
(4, 'AdministradorPreceptoria'),
(5, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE IF NOT EXISTS `tecnico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreAlumno` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `numeroSerie` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `idreclamo` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `estadoFin` int(11) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `tecnico`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `nombre`) VALUES
(1, 'MaÃ±ana'),
(2, 'Tarde'),
(3, 'Vespertino');
