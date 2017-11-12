--FINAL LIMPIA
-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2017 a las 16:57:35
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `id_fase`, `nombre_actividad`, `descripcion_actividad`, `estado`, `orden`) VALUES
(1, 1, 'Introducción', 'Introducción', 1, 1),
(2, 3, 'justificación', 'Justificación', 1, 2),
(3, 3, 'Descripción del problema', 'Descripción del problema', 1, 3),
(4, 3, 'Planteamiento del problema', 'Planteamiento del problema', 1, 4),
(5, 4, 'Tipo de investigación', 'Tipo de investigación', 1, 5),
(6, 4, 'Instrumentos de recolección', 'Instrumentos de recolección', 1, 6),
(8, 4, 'Muestra poblacional', 'Muestra poblacional', 1, 8),
(9, 4, 'Resultados de la investigación', 'Resultados de la investigación', 1, 9),
(10, 4, 'Conclusiones de la investigación', 'Conclusiones de la investigación', 1, 10),
(11, 2, 'Objetivos', 'Objetivos', 1, 11),
(12, 2, 'Alcance', 'Alcance', 1, 12),
(13, 2, 'Limitaciones', 'Limitaciones', 1, 13),
(14, 5, 'Agradecimientos', 'Agradecimientos', 1, 14),
(15, 5, 'Dedicatoria', 'Dedicatoria', 1, 15),
(16, 5, 'Resumen', 'Resumen', 1, 16),
(17, 5, 'Recomendaciones', 'Recomendaciones', 1, 17),
(18, 5, 'Prospectiva', 'Prospectiva', 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL,
  `MAT_CODIGO` varchar(100) NOT NULL,
  `GRU_CODIGO` varchar(100) NOT NULL,
  `id_parametrizacion` int(11) NOT NULL,
  KEY `id_parametrizacion` (`id_parametrizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id_config`, `MAT_CODIGO`, `GRU_CODIGO`, `id_parametrizacion`) VALUES
(0, 'LNALS', '800', 1),
(0, 'LNALS', '801', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `conteoporfases`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `conteoporfases`;
CREATE TABLE IF NOT EXISTS `conteoporfases` (
`nombre_idea` varchar(100)
,`id_grupo` int(11)
,`faseuno` bigint(21)
,`fasedos` bigint(21)
,`fasetres` bigint(21)
,`fasecuatro` bigint(21)
,`fasecinco` bigint(21)
,`estado` int(11)
,`id_idea` int(11)
);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entregable`
--

INSERT INTO `entregable` (`id_entregable`, `id_parametrizacion`, `id_actividad`, `nombre_entregable`, `descripcion_entregable`, `texto_ayuda`, `estado`) VALUES
(1, 1, 1, 'Introducción', 'Introduccion a la idea del proyecto de grado a desarrollar', 'En este item ustedes deben especificar de que que se tratara su  futuro proyecto', 1),
(2, 1, 11, 'Objetivos de la idea', 'Complemento de las objetivos generales y especificos del proyecto', 'Aqui deben escribir sus objetivos generales y especificos orientados a su idea de proyecto de grado', 1),
(3, 1, 12, 'Determinacion del alcance', 'Determinacion de alcanze de proyecto', 'Aqui ustedes deben  concretar hasta donde va a llegar su idea de proyecto de grado ', 1),
(4, 1, 13, 'Las limitaciones', 'Especificacion de las limitaciones de proyecto', 'Aqui ustedes deben identificar las limitaciones las cuales cuentan para el proyecto de grado', 1),
(5, 1, 2, 'Justificación', 'Justificacion del  proyecto', 'Aqui usted debe especificar el porque de su idea  ', 1),
(6, 1, 18, 'La Prospectiva', 'Propectiva del proyecto', 'Aqui deben mostrar la prospectiva que tienen del proyecto ', 1),
(7, 1, 17, 'Recomendaciones', 'Recomendaciones', 'Aqui ustedes deben agregar las recomendaciones  para el proyecto ', 1),
(8, 1, 3, 'La descripcion del problema', 'Descripcion del problema', 'Aqui se agrega la descripcion del proyecto de grado', 1),
(9, 1, 4, 'Planteamiento del problema', 'Planteamiento del problema', 'Aqui ustedes deben agregar el planteamiento del problema a solucionar ', 1),
(10, 1, 5, 'Tipo de Investigacion', 'Tipo de investigacion', 'Aqui deben agregar el tipo de inverstigacion utilizado en la recoleccion de la informacion ', 1),
(11, 1, 6, 'Instrumentos de recolección', 'Instrumentos de recoleccion de investigacion', 'Aqui deben especificar los instrumentos de recoleccion de informacion', 1),
(12, 1, 8, 'Muestra poblacional', 'La muestra poblacional', 'Aqui agrega la muestra poblacional de la investigacion ', 1),
(13, 1, 9, 'Resultados de la investigación', 'Los resultados de investigacion', 'Aqui deben agregar los resultados los cuales fueron recaudados de la investigacion ', 1),
(14, 1, 10, 'Conclusiones de investigación', 'Las conclusiones de investigacion', 'Aqui las conclusiones despues de la investigacion', 1),
(15, 1, 14, 'Agradecimientos', 'Los agradecimientos', 'Aqui los agradecimientos del proyecto', 1),
(16, 1, 15, 'Dedicatoria', 'Descripcion de la dedicatoria el proyecto', 'Aqui la dedicatoria del proyecto de grado ', 1),
(17, 1, 16, 'Resumen', 'Descripcion del resumen', 'Aqui la descripcion del resumen', 1);

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
  KEY `id_idea` (`id_idea`),
  KEY `id_idea_2` (`id_idea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `faltantes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `faltantes`;
CREATE TABLE IF NOT EXISTS `faltantes` (
`id_idea` int(11)
,`id_entregable` int(11)
,`id_version` int(11)
,`id_usuario` int(11)
);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`id_fase`, `nombre_fase`, `descripcion`, `orden`, `estado`) VALUES
(1, 'Registro de idea', 'Descripción de la fase', 1, 1),
(2, 'Analisis de factibilidad', 'Analisis de factibilidad', 2, 1),
(3, 'Analisis del problema', 'Determinación del alcance', 3, 1),
(4, 'Metodología de investigación', 'Metodología de Investigación', 4, 1),
(5, 'Consolidación', 'Consolidación', 5, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `gestorcierre`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `gestorcierre`;
CREATE TABLE IF NOT EXISTS `gestorcierre` (
`aprobados` bigint(21)
,`total` bigint(21)
,`id_idea` int(11)
);

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
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado de la Idea (1 registrada , 2 rechazada ,3 aprobada , 4 Terminada )',
  `objetivo_general` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Objetivos Generales de la Idea',
  `objetivo_especifico` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Objetivos Especificos de la Idea',
  PRIMARY KEY (`id_idea`),
  KEY `id_linea` (`id_linea`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ideas_banco`
--

DROP TABLE IF EXISTS `ideas_banco`;
CREATE TABLE IF NOT EXISTS `ideas_banco` (
  `id_idea` int(11) NOT NULL AUTO_INCREMENT,
  `id_linea` int(11) NOT NULL COMMENT 'Identificador de la Linea',
  `nombre_idea` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Idea',
  `descripcion_idea` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Idea',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado de la Idea',
  `objetivo_general` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Objetivos Generales de la Idea',
  `objetivo_especifico` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Objetivos Especificos de la Idea',
  PRIMARY KEY (`id_idea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ideas_banco`
--

INSERT INTO `ideas_banco` (`id_idea`, `id_linea`, `nombre_idea`, `descripcion_idea`, `estado`, `objetivo_general`, `objetivo_especifico`) VALUES
(1, 1, 'EATAPP', 'la idea es generar una apliacion para que se puedan pedir domicilios', 1, 'Generar una aplicacion para generar domicilios de forma facil', 'Desarrollar una aplicacion');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `informebancoideas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `informebancoideas`;
CREATE TABLE IF NOT EXISTS `informebancoideas` (
`id_idea` int(11)
,`nombre_linea` varchar(100)
,`nombre_idea` varchar(100)
,`descripcion_idea` varchar(200)
,`objetivo_general` text
,`objetivo_especifico` text
);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id_linea`, `nombre_linea`, `descripcion_linea`, `estado`) VALUES
(1, 'Comidas', 'prUEBA DE LINEAS', 1),
(2, 'Impacto Social', 'Aplicado a areas de educacion', 1),
(3, 'Educacion', 'aplicaca a instutuciones educativas', 1);

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
-- Estructura Stand-in para la vista `notificacioninicial`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `notificacioninicial`;
CREATE TABLE IF NOT EXISTS `notificacioninicial` (
`conteo` bigint(21)
,`id_usuario` int(11)
,`id_idea` int(11)
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
(1, 'Marco de Trabajo de Ingenieria de Software', 'Descripcion del marco de trabajo para los estudiantes de materia de anteproyecto ', 0, 1);

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
-- Estructura Stand-in para la vista `resumenentregablesgenerales`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `resumenentregablesgenerales`;
CREATE TABLE IF NOT EXISTS `resumenentregablesgenerales` (
`id_parametrizacion` int(11)
,`id_fase` int(11)
,`ordenfase` int(11)
,`nombre_fase` varchar(100)
,`id_actividad` int(11)
,`nombre_actividad` varchar(100)
,`ordenactividad` int(11)
,`id_entregable` int(11)
,`nombre_entregable` varchar(100)
,`conteoentregable` bigint(21)
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
(1, '77234bff7923691dd8c1985c7ae75ae3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Estructura Stand-in para la vista `vista_parametrizacion`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_parametrizacion`;
CREATE TABLE IF NOT EXISTS `vista_parametrizacion` (
`id_parametrizacion` int(11)
,`nom_parametrizacion` varchar(100)
,`nombre_fase` varchar(100)
,`descripcion` varchar(150)
,`nombre_actividad` varchar(100)
,`descripcion_actividad` varchar(200)
,`nombre_entregable` varchar(100)
,`descripcion_entregable` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `conteoporfases`
--
DROP TABLE IF EXISTS `conteoporfases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `conteoporfases`  AS  select `ideas`.`nombre_idea` AS `nombre_idea`,`ideas`.`id_grupo` AS `id_grupo`,(select count(0) from (((`versiones` join `entregable` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_actividad`))) where ((`fases`.`id_fase` = 1) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `faseuno`,(select count(0) from (((`versiones` join `entregable` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_actividad`))) where ((`fases`.`id_fase` = 2) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `fasedos`,(select count(0) from (((`versiones` join `entregable` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_actividad`))) where ((`fases`.`id_fase` = 3) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `fasetres`,(select count(0) from (((`versiones` join `entregable` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_actividad`))) where ((`fases`.`id_fase` = 4) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `fasecuatro`,(select count(0) from (((`versiones` join `entregable` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_actividad`))) where ((`fases`.`id_fase` = 5) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `fasecinco`,`ideas`.`estado` AS `estado`,`ideas`.`id_idea` AS `id_idea` from `ideas` where (`ideas`.`estado` in (3,4)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `faltantes`
--
DROP TABLE IF EXISTS `faltantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `faltantes`  AS  select `ideas`.`id_idea` AS `id_idea`,`versiones`.`id_entregable` AS `id_entregable`,`versiones`.`id_version` AS `id_version`,`equipos`.`id_usuario` AS `id_usuario` from ((`ideas` join `equipos` on((`ideas`.`id_idea` = `equipos`.`id_idea`))) join `versiones` on((`versiones`.`id_idea` = `ideas`.`id_idea`))) where (`versiones`.`estado` = 4) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `gestorcierre`
--
DROP TABLE IF EXISTS `gestorcierre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gestorcierre`  AS  select (select count(0) from `versiones` where ((`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 3))) AS `aprobados`,(select count(0) from `entregable` where ((`entregable`.`id_parametrizacion` = `config`.`id_parametrizacion`) and (`entregable`.`estado` = 1))) AS `total`,`ideas`.`id_idea` AS `id_idea` from (`ideas` join `config` on((`ideas`.`id_grupo` = `config`.`GRU_CODIGO`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `informebancoideas`
--
DROP TABLE IF EXISTS `informebancoideas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `informebancoideas`  AS  select `ideas_banco`.`id_idea` AS `id_idea`,`linea`.`nombre_linea` AS `nombre_linea`,`ideas_banco`.`nombre_idea` AS `nombre_idea`,`ideas_banco`.`descripcion_idea` AS `descripcion_idea`,`ideas_banco`.`objetivo_general` AS `objetivo_general`,`ideas_banco`.`objetivo_especifico` AS `objetivo_especifico` from (`ideas_banco` join `linea` on((`linea`.`id_linea` = `ideas_banco`.`id_linea`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `mostraversiones`
--
DROP TABLE IF EXISTS `mostraversiones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostraversiones`  AS  select `resumengeneral`.`id_entregable` AS `id_entregable`,`resumengeneral`.`nombre_entregable` AS `nombre_entregable`,`resumengeneral`.`id_idea` AS `id_idea`,`resumengeneral`.`id_parametrizacion` AS `id_parametrizacion`,`resumengeneral`.`id_actividad` AS `id_actividad`,`resumengeneral`.`id_grupo` AS `id_grupo`,`resumengeneral`.`conteoentregable` AS `conteoentregable`,`resumengeneral`.`conteoentregablesaprobados` AS `conteoentregablesaprobados`,`versiones`.`entregable` AS `entregable` from (`resumengeneral` join `versiones` on((`versiones`.`id_idea` = `resumengeneral`.`id_idea`))) where ((`resumengeneral`.`id_entregable` = `versiones`.`id_entregable`) and (`versiones`.`estado` = 3)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `notificacioninicial`
--
DROP TABLE IF EXISTS `notificacioninicial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notificacioninicial`  AS  select (select count(0) from `versiones` where (`versiones`.`id_idea` = `ideas`.`id_idea`)) AS `conteo`,`equipos`.`id_usuario` AS `id_usuario`,`ideas`.`id_idea` AS `id_idea` from (`ideas` join `equipos` on(((`equipos`.`id_idea` = `ideas`.`id_idea`) and (`ideas`.`estado` = 3)))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pendientesactuales`
--
DROP TABLE IF EXISTS `pendientesactuales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendientesactuales`  AS  select `ideas`.`id_grupo` AS `grupo` from (`ideas` join `versiones` on(((`versiones`.`id_idea` = `ideas`.`id_idea`) and (`ideas`.`estado` = 3)))) where (`versiones`.`estado` = 2) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `recordatorios`
--
DROP TABLE IF EXISTS `recordatorios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recordatorios`  AS  select count(0) AS `conteo`,`ideas`.`id_grupo` AS `id_grupo` from `ideas` where (`ideas`.`estado` = 1) group by `ideas`.`id_grupo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumenentregablesgenerales`
--
DROP TABLE IF EXISTS `resumenentregablesgenerales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumenentregablesgenerales`  AS  select `entregable`.`id_parametrizacion` AS `id_parametrizacion`,`fases`.`id_fase` AS `id_fase`,`fases`.`orden` AS `ordenfase`,`fases`.`nombre_fase` AS `nombre_fase`,`actividad`.`id_actividad` AS `id_actividad`,`actividad`.`nombre_actividad` AS `nombre_actividad`,`actividad`.`orden` AS `ordenactividad`,`entregable`.`id_entregable` AS `id_entregable`,`entregable`.`nombre_entregable` AS `nombre_entregable`,(select count(0) from `versiones` where (`versiones`.`id_entregable` = `entregable`.`id_entregable`)) AS `conteoentregable` from ((`entregable` join `actividad` on(((`actividad`.`id_actividad` = `entregable`.`id_actividad`) and (`entregable`.`estado` = 1)))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_fase`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumengeneral`
--
DROP TABLE IF EXISTS `resumengeneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumengeneral`  AS  select `entregable`.`id_entregable` AS `id_entregable`,`entregable`.`nombre_entregable` AS `nombre_entregable`,`ideas`.`id_idea` AS `id_idea`,`para`.`id_parametrizacion` AS `id_parametrizacion`,`actividad`.`id_actividad` AS `id_actividad`,`config`.`GRU_CODIGO` AS `id_grupo`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `conteoentregable`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 3))) AS `conteoentregablesaprobados` from ((((`parametrizacion` `para` join `config` on((`config`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `ideas` on((`ideas`.`id_grupo` = `config`.`GRU_CODIGO`))) join `entregable` on(((`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`entregable`.`estado` = 1)))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaconteopendientes`  AS  select `ideas`.`id_idea` AS `id_idea`,`ideas`.`nombre_idea` AS `nombre_idea`,`ideas`.`id_grupo` AS `id_grupo`,(select count(0) from `versiones` where ((`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 2))) AS `conteo` from (`config` join `ideas` on(((`config`.`GRU_CODIGO` = `ideas`.`id_grupo`) and (`ideas`.`estado` = 3)))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_parametrizacion`
--
DROP TABLE IF EXISTS `vista_parametrizacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_parametrizacion`  AS  select `parametrizacion`.`id_parametrizacion` AS `id_parametrizacion`,`parametrizacion`.`nom_parametrizacion` AS `nom_parametrizacion`,`fases`.`nombre_fase` AS `nombre_fase`,`fases`.`descripcion` AS `descripcion`,`actividad`.`nombre_actividad` AS `nombre_actividad`,`actividad`.`descripcion_actividad` AS `descripcion_actividad`,`entregable`.`nombre_entregable` AS `nombre_entregable`,`entregable`.`descripcion_entregable` AS `descripcion_entregable` from (((`fases` join `actividad` on((`fases`.`id_fase` = `actividad`.`id_fase`))) join `entregable` on((`entregable`.`id_actividad` = `actividad`.`id_actividad`))) join `parametrizacion` on((`parametrizacion`.`id_parametrizacion` = `entregable`.`id_parametrizacion`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fases` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `config`
--
ALTER TABLE `config`
  ADD CONSTRAINT `config_ibfk_1` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizacion` (`id_parametrizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `entregable_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entregable_ibfk_2` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizacion` (`id_parametrizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id_idea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD CONSTRAINT `versiones_ibfk_1` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id_idea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `versiones_ibfk_2` FOREIGN KEY (`id_entregable`) REFERENCES `entregable` (`id_entregable`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
