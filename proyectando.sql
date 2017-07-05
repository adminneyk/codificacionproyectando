-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2017 a las 00:15:23
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
(1, 1, 'Introduccion', '', 1, 1),
(2, 1, 'Justificacion', '', 1, 2),
(3, 2, 'Descripción del Problema ', '', 1, 3),
(4, 2, 'Planteamiento del Problema ', '', 0, 1),
(5, 3, 'Tipo de investigación ', '', 0, 1),
(6, 3, 'Instrumentos de recoleccion', '', 0, 1),
(7, 3, 'Resultados de instrumentos', '', 0, 1),
(8, 3, 'Muestra Poblacional', '', 0, 1),
(9, 3, 'Resultados de la investigación', '', 0, 1),
(10, 3, 'Concluciones de la investigación', '', 0, 1),
(11, 4, 'Objetivos', '', 0, 1),
(12, 4, 'Alcance', '', 0, 1),
(13, 4, 'Limitaciones', '', 0, 1),
(14, 5, 'Agradecimientos', '', 0, 1),
(15, 5, 'Dedicatoria', '', 0, 1),
(16, 5, 'Resumen', '', 0, 1),
(17, 5, 'Recomendaciones', '', 0, 1),
(18, 5, 'Prospectiva', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_cursos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de Curso',
  `id_grupo` int(11) NOT NULL COMMENT 'Relacion con el Grupo',
  `id_usuario` int(11) NOT NULL COMMENT 'Relacion con el Usuario',
  PRIMARY KEY (`id_cursos`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_grupo_2` (`id_grupo`),
  KEY `id_usuario_2` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cursos`, `id_grupo`, `id_usuario`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5),
(4, 2, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entregable`
--

INSERT INTO `entregable` (`id_entregable`, `id_parametrizacion`, `id_actividad`, `nombre_entregable`, `descripcion_entregable`, `texto_ayuda`, `estado`) VALUES
(1, 1, 1, 'objetivos generales', 'Descripcion del entregable', 'Texto de ayuda', 1),
(2, 1, 1, 'entregable de prueba', 'descripcion del entregable', 'texto de ayuda', 1),
(3, 1, 2, 'entregable', 'descripción ', 'asdasdasdasd', 1),
(4, 2, 1, 'kfgkdg', 'zmxnkncxzc', 'zjxchjzxhcizxhchxzic', 1),
(5, 4, 1, 'Entregable de prueba 001', 'descripcon', 'ayuda de texto', 1),
(6, 4, 2, 'entregable de 002', 'DESCRIOPCIN ', 'sdasdasdasd', 1),
(7, 4, 3, 'actividad de entregable 003', 'erwrwer', 'wrwerewr', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `id_idea`, `id_usuario`, `estado`) VALUES
(1, 1, 5, 1),
(2, 1, 4, 1),
(3, 1, 3, 1),
(4, 7, 3, 1),
(5, 7, 4, 1),
(6, 7, 5, 1),
(7, 8, 3, 1),
(8, 8, 4, 1),
(9, 8, 5, 1),
(10, 9, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

DROP TABLE IF EXISTS `fases`;
CREATE TABLE IF NOT EXISTS `fases` (
  `id_fase` int(11) NOT NULL COMMENT 'identificador de la fase dela idea',
  `nombre_fase` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'nombre de la fase de la idea',
  `descripcion` varchar(150) COLLATE utf16_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '1' COMMENT 'Orden de Mostrar',
  PRIMARY KEY (`id_fase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`id_fase`, `nombre_fase`, `descripcion`, `orden`) VALUES
(1, 'Registro de Idea', '', 1),
(2, 'Analisis de Factibilidad', '', 1),
(3, 'Metodologia de Investigación', '', 1),
(4, 'Determinación del Alcanze', '', 1),
(5, 'Consolidacion', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificable del Grupo',
  `nombre_grupo` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Grupo',
  `id_responsable` int(11) NOT NULL COMMENT 'Relacion con Usuario Responsable',
  `id_parametrizacion` int(11) NOT NULL COMMENT 'Identificador de la Parametrizacion',
  PRIMARY KEY (`id_grupo`),
  KEY `id_responsable` (`id_responsable`),
  KEY `id_parametrizacion` (`id_parametrizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre_grupo`, `id_responsable`, `id_parametrizacion`) VALUES
(1, '800', 2, 1),
(2, '801', 2, 4);

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
  PRIMARY KEY (`id_idea`),
  KEY `id_linea` (`id_linea`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ideas`
--

INSERT INTO `ideas` (`id_idea`, `id_grupo`, `id_linea`, `nombre_idea`, `descripcion_idea`, `estado`) VALUES
(1, 1, 1, 'Nombre de la Idea', 'Esta es la idea la cual se desea manejar', 3),
(2, 1, 1, 'idea de proyecto', 'descripción de idea', 3),
(7, 1, 1, 'Proyecto de perros Calientes', 'Descripción de Idea1', 3),
(8, 1, 1, 'Idea 002', 'asdasdasd1', 3),
(9, 2, 1, 'Idea de prueba Nueva', 'Descripción de la idea de trazabilidad', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ideasgrupo`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `ideasgrupo`;
CREATE TABLE IF NOT EXISTS `ideasgrupo` (
`id_idea` int(11)
,`nombre_idea` varchar(100)
,`id_grupo` int(11)
,`id_parametrizacion` int(11)
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
  PRIMARY KEY (`id_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id_linea`, `nombre_linea`, `descripcion_linea`) VALUES
(1, 'Linea Tematica de Prueba', 'Descripcion de la linea Temantica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Mensaje',
  `id_usuario` int(11) NOT NULL COMMENT 'Persona destinataria',
  `mensaje` text NOT NULL COMMENT 'Mensaje Contreto',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Notificacion',
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `id_usuario`, `mensaje`, `estado`) VALUES
(19, 3, 'Su Idea Idea 002 Es viable para continuar!', 1),
(20, 5, 'Su Idea Idea 002 Es viable para continuar!', 1),
(21, 2, 'Su Idea Idea 002 Es viable para continuar!', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametrizacion`
--

INSERT INTO `parametrizacion` (`id_parametrizacion`, `nom_parametrizacion`, `descripcion_parametrizacion`, `id_responsable`, `estado`) VALUES
(1, 'Parametrizacion de Ingenieria de software', 'Descripcion de la parametrizacion de ingenieria de software', 2, 1),
(2, 'ingenieria civil', 'prueba yudy', 2, 0),
(3, 'Parametrizacion de ADSI', 'esta es la parametrizacion de entregable de adsi', 2, 0),
(4, 'Parametrizacion de Prueba', 'Descripción de gestion', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfil',
  `nombre_perfil` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Perfil',
  `permisos` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Permisos Suministrados por Perfil',
  `visible` int(11) NOT NULL COMMENT 'Oculta los Perfiles',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`, `permisos`, `visible`) VALUES
(1, 'Administrador', 'perfiles,usuarios,ideas,reportes,parametrizacion,revision,banco', 1),
(2, 'Profesor', 'reportes,parametrizacion,revision,banco', 1),
(3, 'Estudiante', 'ideas', 1),
(4, 'Perfil de Prueba', 'perfiles,banco', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resumengeneral`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `resumengeneral`;
CREATE TABLE IF NOT EXISTS `resumengeneral` (
`nombre_entregable` varchar(100)
,`id_idea` int(11)
,`id_parametrizacion` int(11)
,`id_actividad` int(11)
,`id_grupo` int(11)
,`conteoentregable` bigint(21)
,`conteoentregablesaprobados` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Autoincremental de usuarios',
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre Completo',
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Usuario',
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Clave de Acceso de Usuario',
  `id_perfil` int(11) NOT NULL COMMENT 'Relacion con Perfil ',
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `usuario`, `clave`, `id_perfil`) VALUES
(1, 'Administrador Del Sistema', 'admin', 'admin', 1),
(2, 'Carlos Donoso', 'cdonoso', 'p1234', 2),
(3, 'Yudy Viviana Bran Sanchez', 'ybransa', 'p1234', 3),
(4, 'Yeimy Parada Migue', 'yparadami', 'p1234', 3),
(5, 'Omar Bonilla Franco', 'obonillafr', 'p1234', 3),
(6, 'pruebas', 'prueba', 'p1234', 3);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariosporgrupo`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuariosporgrupo`;
CREATE TABLE IF NOT EXISTS `usuariosporgrupo` (
`id_usuario` int(11)
,`nombre_usuario` varchar(100)
,`id_grupo` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

DROP TABLE IF EXISTS `versiones`;
CREATE TABLE IF NOT EXISTS `versiones` (
  `id_version` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de la Versiono',
  `id_idea` int(11) NOT NULL COMMENT 'Relacion con la Idea ',
  `id_entregable` int(11) NOT NULL COMMENT 'Relacion con el Entregable',
  `entregable` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Entregable Redactado',
  `revision` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Revision del Entregable',
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Comentario del Responsable',
  `estado` int(11) NOT NULL COMMENT 'Estado de las Version del Entregable',
  PRIMARY KEY (`id_version`),
  KEY `id_idea` (`id_idea`),
  KEY `id_entregable` (`id_entregable`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id_version`, `id_idea`, `id_entregable`, `entregable`, `revision`, `comentarios`, `estado`) VALUES
(5, 1, 2, 'sdfsdfsdfsdfsdfsdf', 'sdfsdfsd', 'sdfsdfsdfsdfsdfsd', 3),
(6, 1, 3, 'entregable', 'sdfsdfsd', 'sdfsdfsdfsd', 2),
(7, 1, 1, 'ghjghjghjghj', 'ghjghjghjghjgh', 'jghjghjghjghjghjghjghj', 3);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_parametrizacion`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_parametrizacion`;
CREATE TABLE IF NOT EXISTS `vista_parametrizacion` (
`PARAMETRIZACION` varchar(100)
,`FASE` varchar(100)
,`ACTIVIDAD` varchar(100)
,`ENTREGABLE` varchar(100)
,`USUARIO` varchar(100)
,`ESTADO` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `ideasgrupo`
--
DROP TABLE IF EXISTS `ideasgrupo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ideasgrupo`  AS  select `ideas`.`id_idea` AS `id_idea`,`ideas`.`nombre_idea` AS `nombre_idea`,`ideas`.`id_grupo` AS `id_grupo`,`grupo`.`id_parametrizacion` AS `id_parametrizacion` from (`ideas` join `grupo` on((`ideas`.`id_grupo` = `grupo`.`id_grupo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumengeneral`
--
DROP TABLE IF EXISTS `resumengeneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumengeneral`  AS  select `entregable`.`nombre_entregable` AS `nombre_entregable`,`ideas`.`id_idea` AS `id_idea`,`para`.`id_parametrizacion` AS `id_parametrizacion`,`actividad`.`id_actividad` AS `id_actividad`,`grupo`.`id_grupo` AS `id_grupo`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `conteoentregable`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 3))) AS `conteoentregablesaprobados` from ((((`actividad` join `entregable` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `parametrizacion` `para` on((`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `grupo` on((`grupo`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `ideas` on((`ideas`.`id_grupo` = `grupo`.`id_grupo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariosporgrupo`
--
DROP TABLE IF EXISTS `usuariosporgrupo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariosporgrupo`  AS  select `usuario`.`id_usuario` AS `id_usuario`,`usuario`.`nombre_usuario` AS `nombre_usuario`,`cursos`.`id_grupo` AS `id_grupo` from (`cursos` join `usuario` on((`cursos`.`id_usuario` = `usuario`.`id_usuario`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_parametrizacion`
--
DROP TABLE IF EXISTS `vista_parametrizacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_parametrizacion`  AS  select `parametrizacion`.`nom_parametrizacion` AS `PARAMETRIZACION`,`fases`.`nombre_fase` AS `FASE`,`actividad`.`nombre_actividad` AS `ACTIVIDAD`,`entregable`.`nombre_entregable` AS `ENTREGABLE`,`usuario`.`usuario` AS `USUARIO`,(case `entregable`.`estado` when 1 then 'Activo' when 0 then 'Inactivo' else 'Sin Estado' end) AS `ESTADO` from ((((`parametrizacion` join `entregable` on((`entregable`.`id_parametrizacion` = `parametrizacion`.`id_parametrizacion`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_fase`))) join `usuario` on((`parametrizacion`.`id_responsable` = `usuario`.`id_usuario`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fases` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `entregable_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entregable_ibfk_2` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizacion` (`id_parametrizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizacion` (`id_parametrizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ideas_ibfk_2` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD CONSTRAINT `versiones_ibfk_1` FOREIGN KEY (`id_entregable`) REFERENCES `entregable` (`id_entregable`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `versiones_ibfk_2` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id_idea`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
