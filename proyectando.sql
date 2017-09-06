-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2017 a las 06:09:29
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectando20`
--
DROP DATABASE proyectando20;
CREATE DATABASE IF NOT EXISTS `proyectando20` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectando20`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Actividad',
  `id_fase` int(11) NOT NULL COMMENT 'Relacion con las Fase',
  `nombre_actividad` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Actividad',
  `descripcion_actividad` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Actividad',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Actividad',
  `orden` int(11) NOT NULL DEFAULT '1' COMMENT 'Orden de Muestra',
  PRIMARY KEY (`id_actividad`),
  KEY `id_fase` (`id_fase`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `id_fase`, `nombre_actividad`, `descripcion_actividad`, `estado`, `orden`) VALUES
(1, 1, 'Actividad de prueba', 'Descripcion de actividad', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL,
  `MAT_CODIGO` varchar(100) NOT NULL,
  `GRU_CODIGO` varchar(100) NOT NULL,
  `id_parametrizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id_config`, `MAT_CODIGO`, `GRU_CODIGO`, `id_parametrizacion`) VALUES
(1, 'LNALS', '800', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregable`
--

DROP TABLE IF EXISTS `entregable`;
CREATE TABLE IF NOT EXISTS `entregable` (
  `id_entregable` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del Entregable',
  `id_parametrizacion` int(11) NOT NULL COMMENT 'Relacion con Parametrizacion',
  `id_actividad` int(11) NOT NULL COMMENT 'Relacion del Entregable con la Actividad',
  `nombre_entregable` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Entregable',
  `descripcion_entregable` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del Entregable',
  `texto_ayuda` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Mensaje de Ayuda Para Estudiantes',
  `estado` int(11) NOT NULL COMMENT 'Estado de publicacion del Entregable',
  PRIMARY KEY (`id_entregable`),
  KEY `id_actividad` (`id_actividad`),
  KEY `id_parametrizacion` (`id_parametrizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entregable`
--

INSERT INTO `entregable` (`id_entregable`, `id_parametrizacion`, `id_actividad`, `nombre_entregable`, `descripcion_entregable`, `texto_ayuda`, `estado`) VALUES
(1, 1, 1, 'Entregable', 'Descripcion del entregable', 'Texto de ayuda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Registro',
  `id_idea` int(11) NOT NULL COMMENT 'Identificador de la Idea',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del Usuario',
  `estado` int(11) NOT NULL COMMENT 'Estado del Usuario',
  PRIMARY KEY (`id_equipo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_idea` (`id_idea`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `id_idea`, `id_usuario`, `estado`) VALUES
(1, 1, 1033759479, 1),
(2, 2, 1033759479, 1),
(3, 2, 2147483647, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

DROP TABLE IF EXISTS `fases`;
CREATE TABLE IF NOT EXISTS `fases` (
  `id_fase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la fase dela idea',
  `nombre_fase` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'nombre de la fase de la idea',
  `descripcion` varchar(150) COLLATE utf16_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '1' COMMENT 'Orden de Mostrar',
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT 'Estado de la Fase',
  PRIMARY KEY (`id_fase`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`id_fase`, `nombre_fase`, `descripcion`, `orden`, `estado`) VALUES
(1, 'FASE 001', 'Descripcion de la fase', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ideas`
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE IF NOT EXISTS `ideas` (
  `id_idea` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la  Idea',
  `id_grupo` int(11) NOT NULL COMMENT 'Identificador del Grupo',
  `id_linea` int(11) NOT NULL COMMENT 'Identificador de la Linea',
  `nombre_idea` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Idea',
  `descripcion_idea` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Idea',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado de la Idea',
  `objetivo_general` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Objetivos Generales de la Idea',
  `objetivo_especifico` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Objetivos Especificos de la Idea',
  PRIMARY KEY (`id_idea`),
  KEY `id_linea` (`id_linea`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ideas`
--

INSERT INTO `ideas` (`id_idea`, `id_grupo`, `id_linea`, `nombre_idea`, `descripcion_idea`, `estado`, `objetivo_general`, `objetivo_especifico`) VALUES
(1, 800, 1, 'Nombre de la idea', 'Descripcion de la idea totaal', 3, 'objetivo general', 'objetivo especifico'),
(2, 800, 1, 'IDEA DE PRUEBA FINAL', 'DESCRIPCION DE LA IDEA DE PRUEBA FINAL', 3, 'Objetivo General', 'Objetivo Especifico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

DROP TABLE IF EXISTS `linea`;
CREATE TABLE IF NOT EXISTS `linea` (
  `id_linea` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Linea Tematica',
  `nombre_linea` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Linea Tematic',
  `descripcion_linea` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Linea Tematica',
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id_linea`, `nombre_linea`, `descripcion_linea`, `estado`) VALUES
(1, 'Liea de prueba', 'prUEBA DE LINEAS', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostraversiones`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `mostraversiones`;
CREATE TABLE IF NOT EXISTS `mostraversiones` (
`id_entregable` int(11)
,`nombre_entregable` varchar(100)
,`id_idea` int(11)
,`id_parametrizacion` int(11)
,`id_actividad` int(11)
,`id_grupo` varchar(100)
,`conteoentregable` bigint(21)
,`conteoentregablesaprobados` bigint(21)
,`entregable` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrizacion`
--

DROP TABLE IF EXISTS `parametrizacion`;
CREATE TABLE IF NOT EXISTS `parametrizacion` (
  `id_parametrizacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Parametrizacion ',
  `nom_parametrizacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre de la Parametrizacion',
  `descripcion_parametrizacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Parametrizacion',
  `id_responsable` int(11) NOT NULL COMMENT 'Responsable de la Parametrizacion',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Parametrizacion',
  PRIMARY KEY (`id_parametrizacion`),
  KEY `id_responsable` (`id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametrizacion`
--

INSERT INTO `parametrizacion` (`id_parametrizacion`, `nom_parametrizacion`, `descripcion_parametrizacion`, `id_responsable`, `estado`) VALUES
(1, 'Parametrizacion 001', 'Descripcion de la parametrizacion', 0, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pendientesactuales`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `pendientesactuales`;
CREATE TABLE IF NOT EXISTS `pendientesactuales` (
`grupo` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `recordatorios`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `recordatorios`;
CREATE TABLE IF NOT EXISTS `recordatorios` (
`conteo` bigint(21)
,`id_grupo` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resumengeneral`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `resumengeneral`;
CREATE TABLE IF NOT EXISTS `resumengeneral` (
`id_entregable` int(11)
,`nombre_entregable` varchar(100)
,`id_idea` int(11)
,`id_parametrizacion` int(11)
,`id_actividad` int(11)
,`id_grupo` varchar(100)
,`conteoentregable` bigint(21)
,`conteoentregablesaprobados` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resumenpendientes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `resumenpendientes`;
CREATE TABLE IF NOT EXISTS `resumenpendientes` (
`id_version` int(11)
,`nombre_fase` varchar(100)
,`nombre_actividad` varchar(100)
,`nombre_entregable` varchar(100)
,`descripcion_entregable` varchar(200)
,`id_idea` int(11)
,`estado` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `CLI_NUMDCTO` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `CLI_NUMDCTO`) VALUES
(1, '0eb33bb157c40fef3884fa3faad1b418');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

DROP TABLE IF EXISTS `versiones`;
CREATE TABLE IF NOT EXISTS `versiones` (
  `id_version` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de la Versiono',
  `id_idea` int(11) NOT NULL COMMENT 'Relacion con la Idea ',
  `id_entregable` int(11) NOT NULL COMMENT 'Relacion con el Entregable',
  `fecharegistro` datetime NOT NULL COMMENT 'Registro Fecha de Creacion ',
  `entregable` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Entregable Redactado',
  `revision` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Revision del Entregable',
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Comentario del Responsable',
  `estado` int(11) NOT NULL COMMENT 'Estado de las Version del Entregable (1 registrado 2 enviado 3 aprobado 4 devuelto 5 cerrado)',
  PRIMARY KEY (`id_version`),
  KEY `id_idea` (`id_idea`),
  KEY `id_entregable` (`id_entregable`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id_version`, `id_idea`, `id_entregable`, `fecharegistro`, `entregable`, `revision`, `comentarios`, `estado`) VALUES
(1, 1, 1, '2017-09-06 02:59:18', '<p>entregable de prueba</p>', '', 'Aprobado el entregable', 3),
(2, 2, 1, '2017-09-06 04:31:32', '<p>version de prueba 001</p>', '', 'Correcto', 3);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistaconteopendientes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vistaconteopendientes`;
CREATE TABLE IF NOT EXISTS `vistaconteopendientes` (
`id_idea` int(11)
,`nombre_idea` varchar(100)
,`id_grupo` int(11)
,`conteo` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `mostraversiones`
--
DROP TABLE IF EXISTS `mostraversiones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostraversiones`  AS  select `resumengeneral`.`id_entregable` AS `id_entregable`,`resumengeneral`.`nombre_entregable` AS `nombre_entregable`,`resumengeneral`.`id_idea` AS `id_idea`,`resumengeneral`.`id_parametrizacion` AS `id_parametrizacion`,`resumengeneral`.`id_actividad` AS `id_actividad`,`resumengeneral`.`id_grupo` AS `id_grupo`,`resumengeneral`.`conteoentregable` AS `conteoentregable`,`resumengeneral`.`conteoentregablesaprobados` AS `conteoentregablesaprobados`,`versiones`.`entregable` AS `entregable` from (`resumengeneral` join `versiones` on((`versiones`.`id_idea` = `resumengeneral`.`id_idea`))) where ((`resumengeneral`.`id_entregable` = `versiones`.`id_entregable`) and (`versiones`.`estado` = 3)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pendientesactuales`
--
DROP TABLE IF EXISTS `pendientesactuales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendientesactuales`  AS  select `ideas`.`id_grupo` AS `grupo` from (`versiones` join `ideas` on((`ideas`.`id_idea` = `versiones`.`id_idea`))) where (`versiones`.`estado` = 2) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `recordatorios`
--
DROP TABLE IF EXISTS `recordatorios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recordatorios`  AS  select count(0) AS `conteo`,`ideas`.`id_grupo` AS `id_grupo` from `ideas` where (`ideas`.`estado` = 1) group by `ideas`.`id_grupo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumengeneral`
--
DROP TABLE IF EXISTS `resumengeneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumengeneral`  AS  select `entregable`.`id_entregable` AS `id_entregable`,`entregable`.`nombre_entregable` AS `nombre_entregable`,`ideas`.`id_idea` AS `id_idea`,`para`.`id_parametrizacion` AS `id_parametrizacion`,`actividad`.`id_actividad` AS `id_actividad`,`config`.`GRU_CODIGO` AS `id_grupo`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `conteoentregable`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 3))) AS `conteoentregablesaprobados` from ((((`parametrizacion` `para` join `config` on((`config`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `ideas` on((`ideas`.`id_grupo` = `config`.`GRU_CODIGO`))) join `entregable` on((`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumenpendientes`
--
DROP TABLE IF EXISTS `resumenpendientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumenpendientes`  AS  select `versiones`.`id_version` AS `id_version`,`fases`.`nombre_fase` AS `nombre_fase`,`actividad`.`nombre_actividad` AS `nombre_actividad`,`entregable`.`nombre_entregable` AS `nombre_entregable`,`entregable`.`descripcion_entregable` AS `descripcion_entregable`,`versiones`.`id_idea` AS `id_idea`,`versiones`.`estado` AS `estado` from (((`fases` join `actividad` on((`fases`.`id_fase` = `actividad`.`id_fase`))) join `entregable` on((`actividad`.`id_actividad` = `entregable`.`id_entregable`))) join `versiones` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistaconteopendientes`
--
DROP TABLE IF EXISTS `vistaconteopendientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaconteopendientes`  AS  select `ideas`.`id_idea` AS `id_idea`,`ideas`.`nombre_idea` AS `nombre_idea`,`ideas`.`id_grupo` AS `id_grupo`,(select count(0) from `versiones` where ((`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 2))) AS `conteo` from (`config` join `ideas` on((`config`.`GRU_CODIGO` = `ideas`.`id_grupo`))) ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
