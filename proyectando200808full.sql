-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2017 a las 06:19:16
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
CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL COMMENT 'Identificador de la Actividad',
  `id_fase` int(11) NOT NULL COMMENT 'Relacion con las Fase',
  `nombre_actividad` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Actividad',
  `descripcion_actividad` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Actividad',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Actividad',
  `orden` int(11) NOT NULL DEFAULT '1' COMMENT 'Orden de Muestra'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `id_fase`, `nombre_actividad`, `descripcion_actividad`, `estado`, `orden`) VALUES
(1, 1, 'Introduccion', 'Descripcion de la  Introduccion', 1, 1),
(2, 1, 'Justificacion', 'Descripcion de la  Justificacion', 1, 2),
(3, 2, 'Descripción del Problema ', 'Descripción del Problema ', 1, 1),
(4, 2, 'Planteamiento del Problema ', 'Planteamiento del Problema ', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id_cursos` int(11) NOT NULL COMMENT 'Identificacion de Curso',
  `id_grupo` int(11) NOT NULL COMMENT 'Relacion con el Grupo',
  `id_usuario` int(11) NOT NULL COMMENT 'Relacion con el Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cursos`, `id_grupo`, `id_usuario`) VALUES
(1, 1, 3),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregable`
--

DROP TABLE IF EXISTS `entregable`;
CREATE TABLE `entregable` (
  `id_entregable` int(11) NOT NULL COMMENT 'Identificacion del Entregable',
  `id_parametrizacion` int(11) NOT NULL COMMENT 'Relacion con Parametrizacion',
  `id_actividad` int(11) NOT NULL COMMENT 'Relacion del Entregable con la Actividad',
  `nombre_entregable` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Entregable',
  `descripcion_entregable` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del Entregable',
  `texto_ayuda` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Mensaje de Ayuda Para Estudiantes',
  `estado` int(11) NOT NULL COMMENT 'Estado de publicacion del Entregable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entregable`
--

INSERT INTO `entregable` (`id_entregable`, `id_parametrizacion`, `id_actividad`, `nombre_entregable`, `descripcion_entregable`, `texto_ayuda`, `estado`) VALUES
(1, 1, 3, 'entregable 001', 'Descripcion ', 'Ayuda', 1),
(2, 1, 1, 'entregable 003', 'Descripcion ', 'ayuda', 1),
(3, 1, 2, 'ingenieria civil', 'des', 'ayuda de ingenieria', 1),
(4, 1, 4, 'Justficacion del problema', 'Descripcion', 'Texto de ayuda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL COMMENT 'Identificador del Registro',
  `id_idea` int(11) NOT NULL COMMENT 'Identificador de la Idea',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del Usuario',
  `estado` int(11) NOT NULL COMMENT 'Estado del Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

DROP TABLE IF EXISTS `fases`;
CREATE TABLE `fases` (
  `id_fase` int(11) NOT NULL COMMENT 'identificador de la fase dela idea',
  `nombre_fase` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'nombre de la fase de la idea',
  `descripcion` varchar(150) COLLATE utf16_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '1' COMMENT 'Orden de Mostrar',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Fase'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`id_fase`, `nombre_fase`, `descripcion`, `orden`, `estado`) VALUES
(1, 'Registro de la Idea', 'Registro de Idea', 1, 1),
(2, 'Analisis de Factibilidad', 'Descripcion de Factibilidad', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL COMMENT 'Identificable del Grupo',
  `nombre_grupo` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Grupo',
  `id_responsable` int(11) NOT NULL COMMENT 'Relacion con Usuario Responsable',
  `id_parametrizacion` int(11) NOT NULL DEFAULT '0' COMMENT 'Identificador de la Parametrizacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre_grupo`, `id_responsable`, `id_parametrizacion`) VALUES
(1, 'Grupo 800', 2, 1),
(2, 'Grupo 801', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ideas`
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE `ideas` (
  `id_idea` int(11) NOT NULL COMMENT 'Identificador de la  Idea',
  `id_grupo` int(11) NOT NULL COMMENT 'Identificador del Grupo',
  `id_linea` int(11) NOT NULL COMMENT 'Identificador de la Linea',
  `nombre_idea` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Idea',
  `descripcion_idea` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Idea',
  `estado` int(11) NOT NULL DEFAULT '1' COMMENT 'Estado de la Idea'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ideasgrupo`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `ideasgrupo`;
CREATE TABLE `ideasgrupo` (
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
CREATE TABLE `linea` (
  `id_linea` int(11) NOT NULL COMMENT 'Identificador de la Linea Tematica',
  `nombre_linea` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la Linea Tematic',
  `descripcion_linea` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Linea Tematica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostraversiones`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `mostraversiones`;
CREATE TABLE `mostraversiones` (
`id_entregable` int(11)
,`nombre_entregable` varchar(100)
,`id_idea` int(11)
,`id_parametrizacion` int(11)
,`id_actividad` int(11)
,`id_grupo` int(11)
,`conteoentregable` bigint(21)
,`conteoentregablesaprobados` bigint(21)
,`entregable` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL COMMENT 'Identificador del Mensaje',
  `id_usuario` int(11) NOT NULL COMMENT 'Persona destinataria',
  `mensaje` text NOT NULL COMMENT 'Mensaje Contreto',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Notificacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrizacion`
--

DROP TABLE IF EXISTS `parametrizacion`;
CREATE TABLE `parametrizacion` (
  `id_parametrizacion` int(11) NOT NULL COMMENT 'Identificador de la Parametrizacion ',
  `nom_parametrizacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre de la Parametrizacion',
  `descripcion_parametrizacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la Parametrizacion',
  `id_responsable` int(11) NOT NULL COMMENT 'Responsable de la Parametrizacion',
  `estado` int(11) NOT NULL COMMENT 'Estado de la Parametrizacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametrizacion`
--

INSERT INTO `parametrizacion` (`id_parametrizacion`, `nom_parametrizacion`, `descripcion_parametrizacion`, `id_responsable`, `estado`) VALUES
(1, 'parametrizacion 001', 'Parametriacion deprueba', 2, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pendientesactuales`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `pendientesactuales`;
CREATE TABLE `pendientesactuales` (
`conteo` bigint(21)
,`nombre_grupo` varchar(100)
,`id_responsable` int(11)
,`id_grupo` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL COMMENT 'Identificador de perfil',
  `nombre_perfil` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Perfil',
  `permisos` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Permisos Suministrados por Perfil',
  `visible` int(11) NOT NULL COMMENT 'Oculta los Perfiles'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`, `permisos`, `visible`) VALUES
(1, 'Administrador', 'perfiles', 0),
(2, 'Profesor', 'reportes,parametrizacion,revision,banco,paramcurso', 0),
(3, 'Estudiante', 'ideas', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `recordatorios`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `recordatorios`;
CREATE TABLE `recordatorios` (
`entregable` int(11)
,`estado` int(11)
,`responsable` int(11)
,`usuario` int(11)
,`grupo` int(11)
,`idea` int(11)
,`nombreidea` varchar(100)
,`nombregrupo` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resumengeneral`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `resumengeneral`;
CREATE TABLE `resumengeneral` (
`id_entregable` int(11)
,`nombre_entregable` varchar(100)
,`id_idea` int(11)
,`id_parametrizacion` int(11)
,`id_actividad` int(11)
,`id_grupo` int(11)
,`conteoentregable` bigint(21)
,`conteoentregablesaprobados` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resumenpendientes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `resumenpendientes`;
CREATE TABLE `resumenpendientes` (
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
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL COMMENT 'Autoincremental de usuarios',
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre Completo',
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Usuario',
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Clave de Acceso de Usuario',
  `id_perfil` int(11) NOT NULL COMMENT 'Relacion con Perfil '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `usuario`, `clave`, `id_perfil`) VALUES
(1, 'Administrador del Sistema', 'admin', 'admin', 1),
(2, 'Carlos Donoso', 'cdonoso', 'p1234', 2),
(3, 'Yudy Bran', 'ybransa', 'p1234', 3),
(4, 'Omar Bonilla', 'obonilla', 'p1234', 3);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariosporgrupo`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuariosporgrupo`;
CREATE TABLE `usuariosporgrupo` (
`id_usuario` int(11)
,`nombre_usuario` varchar(100)
,`id_grupo` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

DROP TABLE IF EXISTS `versiones`;
CREATE TABLE `versiones` (
  `id_version` int(11) NOT NULL COMMENT 'Identificacion de la Versiono',
  `id_idea` int(11) NOT NULL COMMENT 'Relacion con la Idea ',
  `id_entregable` int(11) NOT NULL COMMENT 'Relacion con el Entregable',
  `fecharegistro` datetime NOT NULL COMMENT 'Registro Fecha de Creacion ',
  `entregable` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Entregable Redactado',
  `revision` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Revision del Entregable',
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Comentario del Responsable',
  `estado` int(11) NOT NULL COMMENT 'Estado de las Version del Entregable (1 registrado 2 enviado 3 aprobado 4 devuelto 5 cerrado)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistaconteopendientes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vistaconteopendientes`;
CREATE TABLE `vistaconteopendientes` (
`id_idea` int(11)
,`nombre_idea` varchar(100)
,`id_grupo` int(11)
,`id_responsable` int(11)
,`conteo` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_parametrizacion`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_parametrizacion`;
CREATE TABLE `vista_parametrizacion` (
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
-- Estructura para la vista `mostraversiones`
--
DROP TABLE IF EXISTS `mostraversiones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostraversiones`  AS  select `resumengeneral`.`id_entregable` AS `id_entregable`,`resumengeneral`.`nombre_entregable` AS `nombre_entregable`,`resumengeneral`.`id_idea` AS `id_idea`,`resumengeneral`.`id_parametrizacion` AS `id_parametrizacion`,`resumengeneral`.`id_actividad` AS `id_actividad`,`resumengeneral`.`id_grupo` AS `id_grupo`,`resumengeneral`.`conteoentregable` AS `conteoentregable`,`resumengeneral`.`conteoentregablesaprobados` AS `conteoentregablesaprobados`,`versiones`.`entregable` AS `entregable` from (`resumengeneral` join `versiones` on((`versiones`.`id_idea` = `resumengeneral`.`id_idea`))) where ((`resumengeneral`.`id_entregable` = `versiones`.`id_entregable`) and (`versiones`.`estado` = 3)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pendientesactuales`
--
DROP TABLE IF EXISTS `pendientesactuales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendientesactuales`  AS  select count(0) AS `conteo`,`grupo`.`nombre_grupo` AS `nombre_grupo`,`grupo`.`id_responsable` AS `id_responsable`,`grupo`.`id_grupo` AS `id_grupo` from (`ideas` join `grupo` on((`grupo`.`id_grupo` = `ideas`.`id_grupo`))) where (`ideas`.`estado` = 1) group by `grupo`.`id_grupo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `recordatorios`
--
DROP TABLE IF EXISTS `recordatorios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recordatorios`  AS  select `versiones`.`id_entregable` AS `entregable`,`versiones`.`estado` AS `estado`,`grupo`.`id_responsable` AS `responsable`,`equipos`.`id_usuario` AS `usuario`,`grupo`.`id_grupo` AS `grupo`,`ideas`.`id_idea` AS `idea`,`ideas`.`nombre_idea` AS `nombreidea`,`grupo`.`nombre_grupo` AS `nombregrupo` from (((`versiones` join `ideas` on((`ideas`.`id_idea` = `versiones`.`id_idea`))) join `equipos` on((`equipos`.`id_idea` = `ideas`.`id_idea`))) join `grupo` on((`ideas`.`id_grupo` = `grupo`.`id_grupo`))) where (`versiones`.`estado` in (2,4)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumengeneral`
--
DROP TABLE IF EXISTS `resumengeneral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumengeneral`  AS  select `entregable`.`id_entregable` AS `id_entregable`,`entregable`.`nombre_entregable` AS `nombre_entregable`,`ideas`.`id_idea` AS `id_idea`,`para`.`id_parametrizacion` AS `id_parametrizacion`,`actividad`.`id_actividad` AS `id_actividad`,`grupo`.`id_grupo` AS `id_grupo`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`))) AS `conteoentregable`,(select count(0) from `versiones` where ((`versiones`.`id_entregable` = `entregable`.`id_entregable`) and (`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`) and (`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 3))) AS `conteoentregablesaprobados` from ((((`actividad` join `entregable` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `parametrizacion` `para` on((`entregable`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `grupo` on((`grupo`.`id_parametrizacion` = `para`.`id_parametrizacion`))) join `ideas` on((`ideas`.`id_grupo` = `grupo`.`id_grupo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resumenpendientes`
--
DROP TABLE IF EXISTS `resumenpendientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resumenpendientes`  AS  select `versiones`.`id_version` AS `id_version`,`fases`.`nombre_fase` AS `nombre_fase`,`actividad`.`nombre_actividad` AS `nombre_actividad`,`entregable`.`nombre_entregable` AS `nombre_entregable`,`entregable`.`descripcion_entregable` AS `descripcion_entregable`,`versiones`.`id_idea` AS `id_idea`,`versiones`.`estado` AS `estado` from (((`fases` join `actividad` on((`fases`.`id_fase` = `actividad`.`id_fase`))) join `entregable` on((`actividad`.`id_actividad` = `entregable`.`id_entregable`))) join `versiones` on((`versiones`.`id_entregable` = `entregable`.`id_entregable`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariosporgrupo`
--
DROP TABLE IF EXISTS `usuariosporgrupo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariosporgrupo`  AS  select `usuario`.`id_usuario` AS `id_usuario`,`usuario`.`nombre_usuario` AS `nombre_usuario`,`cursos`.`id_grupo` AS `id_grupo` from (`cursos` join `usuario` on((`cursos`.`id_usuario` = `usuario`.`id_usuario`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistaconteopendientes`
--
DROP TABLE IF EXISTS `vistaconteopendientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaconteopendientes`  AS  select `ideas`.`id_idea` AS `id_idea`,`ideas`.`nombre_idea` AS `nombre_idea`,`ideas`.`id_grupo` AS `id_grupo`,`grupo`.`id_responsable` AS `id_responsable`,(select count(0) from `versiones` where ((`versiones`.`id_idea` = `ideas`.`id_idea`) and (`versiones`.`estado` = 2))) AS `conteo` from (`ideas` join `grupo` on((`ideas`.`id_grupo` = `grupo`.`id_grupo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_parametrizacion`
--
DROP TABLE IF EXISTS `vista_parametrizacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_parametrizacion`  AS  select `parametrizacion`.`nom_parametrizacion` AS `PARAMETRIZACION`,`fases`.`nombre_fase` AS `FASE`,`actividad`.`nombre_actividad` AS `ACTIVIDAD`,`entregable`.`nombre_entregable` AS `ENTREGABLE`,`usuario`.`usuario` AS `USUARIO`,(case `entregable`.`estado` when 1 then 'Activo' when 0 then 'Inactivo' else 'Sin Estado' end) AS `ESTADO` from ((((`parametrizacion` join `entregable` on((`entregable`.`id_parametrizacion` = `parametrizacion`.`id_parametrizacion`))) join `actividad` on((`actividad`.`id_actividad` = `entregable`.`id_actividad`))) join `fases` on((`fases`.`id_fase` = `actividad`.`id_fase`))) join `usuario` on((`parametrizacion`.`id_responsable` = `usuario`.`id_usuario`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cursos`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grupo_2` (`id_grupo`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD PRIMARY KEY (`id_entregable`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_parametrizacion` (`id_parametrizacion`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_idea` (`id_idea`);

--
-- Indices de la tabla `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_responsable` (`id_responsable`),
  ADD KEY `id_parametrizacion` (`id_parametrizacion`);

--
-- Indices de la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id_idea`),
  ADD KEY `id_linea` (`id_linea`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `parametrizacion`
--
ALTER TABLE `parametrizacion`
  ADD PRIMARY KEY (`id_parametrizacion`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id_version`),
  ADD KEY `id_idea` (`id_idea`),
  ADD KEY `id_entregable` (`id_entregable`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Actividad', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_cursos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de Curso', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `entregable`
--
ALTER TABLE `entregable`
  MODIFY `id_entregable` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del Entregable', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Registro';
--
-- AUTO_INCREMENT de la tabla `fases`
--
ALTER TABLE `fases`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la fase dela idea', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificable del Grupo', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id_idea` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la  Idea';
--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Linea Tematica';
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Mensaje';
--
-- AUTO_INCREMENT de la tabla `parametrizacion`
--
ALTER TABLE `parametrizacion`
  MODIFY `id_parametrizacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Parametrizacion ', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfil', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Autoincremental de usuarios', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id_version` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de la Versiono';
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fases` (`id_fase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `entregable_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entregable_ibfk_2` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizacion` (`id_parametrizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ideas_ibfk_2` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parametrizacion`
--
ALTER TABLE `parametrizacion`
  ADD CONSTRAINT `parametrizacion_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
