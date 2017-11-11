-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2017 a las 10:05:23
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_estudiantes`
--

DROP TABLE IF EXISTS `art_estudiantes`;
CREATE TABLE IF NOT EXISTS `art_estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EST_CODIGO` varchar(100) NOT NULL,
  `CLI_NOMBRES` varchar(100) NOT NULL,
  `CLI_APELLIDOS` varchar(100) NOT NULL,
  `CLI_NOMBRE_COMP` varchar(100) NOT NULL,
  `EST_EMAIL` varchar(100) NOT NULL,
  `CLI_NUMDCTO` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `art_estudiantes`
--

INSERT INTO `art_estudiantes` (`id`, `EST_CODIGO`, `CLI_NOMBRES`, `CLI_APELLIDOS`, `CLI_NOMBRE_COMP`, `EST_EMAIL`, `CLI_NUMDCTO`) VALUES
(1, 'COD20639', 'OMAR ', 'BONILLA', 'OMAR BONILLA', 'OBONILLAFR@UNINPAHU.EDU.CO', '1033759479'),
(3, 'COD123498', 'YUDY BRAN', 'Suarez', 'YUDY BRAN SANCHEZ\n', 'ybransa@gmail.com\n', '1231231'),
(4, 'COD1234981', 'Yeimy Paila ', 'Parada', 'YEIMY PAOLA PARADA', 'yparadami@uninpahu.edu.co', '3213213');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_histac_act`
--

DROP TABLE IF EXISTS `art_histac_act`;
CREATE TABLE IF NOT EXISTS `art_histac_act` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EST_CODIGO` varchar(100) NOT NULL,
  `MAT_CODIGO` varchar(100) NOT NULL,
  `GRU_CODIGO` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `art_histac_act`
--

INSERT INTO `art_histac_act` (`id`, `EST_CODIGO`, `MAT_CODIGO`, `GRU_CODIGO`) VALUES
(1, 'COD20639', 'LNALS', '800'),
(2, 'COD1234981', 'LNALS', '800'),
(3, 'COD123498', 'LNALS', '800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_horario`
--

DROP TABLE IF EXISTS `art_horario`;
CREATE TABLE IF NOT EXISTS `art_horario` (
  `MAT_CODIGO` varchar(100) NOT NULL,
  `GRU_CODIGO` varchar(100) NOT NULL,
  `CLI_NDCTO_PROF` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `art_horario`
--

INSERT INTO `art_horario` (`MAT_CODIGO`, `GRU_CODIGO`, `CLI_NDCTO_PROF`) VALUES
('LNALS', '800', '123456'),
('LNALS', '801', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_materias`
--

DROP TABLE IF EXISTS `art_materias`;
CREATE TABLE IF NOT EXISTS `art_materias` (
  `MAT_CODIGO` varchar(100) NOT NULL,
  `MAT_NOMBRE` varchar(100) NOT NULL,
  `MAT_SEMESTRE` varchar(100) NOT NULL,
  PRIMARY KEY (`MAT_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `art_materias`
--

INSERT INTO `art_materias` (`MAT_CODIGO`, `MAT_NOMBRE`, `MAT_SEMESTRE`) VALUES
('LNALS', 'MATERIA DE PRUEBA', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logueos`
--

DROP TABLE IF EXISTS `logueos`;
CREATE TABLE IF NOT EXISTS `logueos` (
  `LOGIN` varchar(100) NOT NULL,
  `CLI_NUMDCTO` varchar(100) NOT NULL,
  `USUARIO` varchar(100) NOT NULL,
  `CLAVE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logueos`
--

INSERT INTO `logueos` (`LOGIN`, `CLI_NUMDCTO`, `USUARIO`, `CLAVE`) VALUES
('', '1033759479', 'OBONILLA', 'OBONILLA'),
('', '123456', 'CDONOSO', 'CDONOSO'),
('', '1231231', 'asuarez', 'asuarez'),
('', '3213213', 'YPARADAMI', 'YPARADAMI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rct_clientes`
--

DROP TABLE IF EXISTS `rct_clientes`;
CREATE TABLE IF NOT EXISTS `rct_clientes` (
  `CLI_NUM_DCTO` varchar(100) NOT NULL,
  `CLI_NOMBRES` varchar(100) NOT NULL,
  `CLI_APELLIDOS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rct_clientes`
--

INSERT INTO `rct_clientes` (`CLI_NUM_DCTO`, `CLI_NOMBRES`, `CLI_APELLIDOS`) VALUES
('123456', 'CARLOS ', 'DONOSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaprueba`
--

DROP TABLE IF EXISTS `tablaprueba`;
CREATE TABLE IF NOT EXISTS `tablaprueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablaprueba`
--

INSERT INTO `tablaprueba` (`id`) VALUES
(1),
(2),
(3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
