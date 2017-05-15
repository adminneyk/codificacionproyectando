-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2017 a las 00:12:40
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectando`
--
DROP DATABASE proyectando;
CREATE DATABASE IF NOT EXISTS `proyectando` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectando`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL COMMENT 'Identificador de la etapa',
  `nombre_actividad` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'Nombre de la etapa ',
  `id_fase` int(11) NOT NULL,
  `descripcion_actividad` text COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre_actividad`, `id_fase`, `descripcion_actividad`) VALUES
(1, 'Introduccion', 1, ''),
(2, 'Justificacion', 1, ''),
(3, 'Descripción del Problema ', 2, ''),
(4, 'Planteamiento del Problema ', 2, ''),
(5, 'Tipo de investigación ', 3, ''),
(6, 'Instrumentos de recoleccion', 3, ''),
(7, 'Resultados de instrumentos', 3, ''),
(8, 'Muestra Poblacional', 3, ''),
(9, 'Resultados de la investigación', 3, ''),
(10, 'Concluciones de la investigación', 3, ''),
(11, 'Objetivos', 4, ''),
(12, 'Alcance', 4, ''),
(13, 'Limitaciones', 4, ''),
(14, 'Agradecimientos', 5, ''),
(15, 'Dedicatoria', 5, ''),
(16, 'Resumen', 5, ''),
(17, 'Recomendaciones', 5, ''),
(18, 'Prospectiva', 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_versiones`
--

DROP TABLE IF EXISTS `control_versiones`;
CREATE TABLE `control_versiones` (
  `id_version_control` int(11) NOT NULL,
  `id_entregable` int(11) NOT NULL,
  `id_version` int(11) NOT NULL,
  `cod_version` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_idea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_versiones`
--

INSERT INTO `control_versiones` (`id_version_control`, `id_entregable`, `id_version`, `cod_version`, `estado`, `id_idea`) VALUES
(1, 1, 1, 'CODVERSIONES', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

DROP TABLE IF EXISTS `fases`;
CREATE TABLE `fases` (
  `id_fase` int(11) NOT NULL COMMENT 'identificador de la fase dela idea',
  `nombre_fase` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'nombre de la fase de la idea',
  `descripcion` varchar(150) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`id_fase`, `nombre_fase`, `descripcion`) VALUES
(1, 'Registro de Idea', ''),
(2, 'Analisis de Factibilidad', ''),
(3, 'Metodologia de Investigación', ''),
(4, 'Determinación del Alcanze', ''),
(5, 'Consolidacion', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `id_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ideas`
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE `ideas` (
  `id_idea` int(11) NOT NULL COMMENT 'Identificador de la idea',
  `nombre_idea` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'Nombre de la idea',
  `id_linea` int(11) NOT NULL COMMENT 'Identificador de la linea tematica',
  `descripcion_idea` text COLLATE utf16_spanish_ci NOT NULL,
  `id_parametrizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `ideas`
--

INSERT INTO `ideas` (`id_idea`, `nombre_idea`, `id_linea`, `descripcion_idea`, `id_parametrizacion`) VALUES
(1, 'idea de prueba 001', 1, 'DESCRIPCION DE LA IDEA ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

DROP TABLE IF EXISTS `lineas`;
CREATE TABLE `lineas` (
  `id_linea` int(11) NOT NULL COMMENT 'Identificacion de la linea',
  `nombre_linea` varchar(100) COLLATE utf16_spanish_ci NOT NULL COMMENT 'Nombre de la linea',
  `descripcion_linea` text COLLATE utf16_spanish_ci NOT NULL COMMENT 'Descripcion de la linea'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`id_linea`, `nombre_linea`, `descripcion_linea`) VALUES
(1, 'Software', 'descripcion de la linea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrizaciones`
--

DROP TABLE IF EXISTS `parametrizaciones`;
CREATE TABLE `parametrizaciones` (
  `id_parametrizacion` int(11) NOT NULL,
  `nom_parametrizacion` varchar(100) NOT NULL,
  `descripcion_parametrizacion` text NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametrizaciones`
--

INSERT INTO `parametrizaciones` (`id_parametrizacion`, `nom_parametrizacion`, `descripcion_parametrizacion`, `id_responsable`, `estado`) VALUES
(1, 'Parametrizacion Inicial', 'Esta es una parametrizacion de un marco de proyevto inicial', 1, 1),
(2, 'parametrizacion 001', 'Prueba de guardado', 1, 1),
(3, 'ptrueba de iniciacion', 'fdsfdsfdfdgfhgjhjhgfdsjuhygfdhgfrd', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregable`
--

DROP TABLE IF EXISTS `entregable`;
CREATE TABLE `entregable` (
  `id_entregable` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_parametrizacion` int(11) NOT NULL,
  `nombre_entregable` varchar(100) NOT NULL,
  `descripcion_entregable` varchar(200) NOT NULL,
  `texto_ayuda` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregable`
--

INSERT INTO `entregable` (`id_entregable`, `id_actividad`, `id_parametrizacion`, `nombre_entregable`, `descripcion_entregable`, `texto_ayuda`, `estado`) VALUES
(1, 1, 1, 'entregable ', 'descripcion del entrgable de los datos', 'para esta gestion usted nesecita porder verificar toda la informacion de la base de datos', 1),
(2, 1, 1, 'entregable ', 'descripcion del entrgable de los datos 2', 'para esta gestion usted nesecita porder verificar toda la informacion de la base de datos', 0),
(3, 1, 1, 'entregable ', 'descripcion del entrgable de los datos 3 sdfsdf', 'para esta gestion usted nesecita porder verificar toda la informacion de la base de datos', 0),
(4, 1, 1, 'entregable 002', 'dedsdasdnmaskdmas', 'mensaje de ayuda para usuario', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `permisos` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`, `permisos`) VALUES
(1, 'Administrador', 'perfiles,usuarios,ideas,reportes,parametrizacion,revision'),
(2, 'Estudiante', 'ideas'),
(3, 'Profesor', 'reportes,parametrizacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_perfil`) VALUES
(1, 'admin', 'admin', 1),
(2, 'obonillafr', '1033759479', 2),
(4, 'carlos', '123456', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `version`
--

DROP TABLE IF EXISTS `version`;
CREATE TABLE `version` (
  `id_version` int(11) NOT NULL,
  `contenidorevisado` text COLLATE utf16_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf16_spanish_ci NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_revision` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `version`
--

INSERT INTO `version` (`id_version`, `contenidorevisado`, `comentarios`, `fecha_entrega`, `fecha_revision`, `estado`) VALUES
(1, 'este es mi mensaje de prueba ', '', '2017-05-15', '2017-05-15', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `fketapafase` (`id_fase`);

--
-- Indices de la tabla `control_versiones`
--
ALTER TABLE `control_versiones`
  ADD PRIMARY KEY (`id_version_control`),
  ADD KEY `id_version` (`id_version`),
  ADD KEY `id_entregable` (`id_entregable`),
  ADD KEY `id_idea` (`id_idea`),
  ADD KEY `id_idea_2` (`id_idea`);

--
-- Indices de la tabla `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id_idea`),
  ADD KEY `id_parametrizacion` (`id_parametrizacion`),
  ADD KEY `id_linea` (`id_linea`),
  ADD KEY `id_idea` (`id_idea`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `parametrizaciones`
--
ALTER TABLE `parametrizaciones`
  ADD PRIMARY KEY (`id_parametrizacion`),
  ADD KEY `id_responsable` (`id_responsable`),
  ADD KEY `id_responsable_2` (`id_responsable`);

--
-- Indices de la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD PRIMARY KEY (`id_entregable`),
  ADD KEY `id_parametrizacion` (`id_parametrizacion`),
  ADD KEY `id_actividad` (`id_actividad`);

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
  ADD KEY `fkperfilusuario` (`id_perfil`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id_version`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la etapa', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `control_versiones`
--
ALTER TABLE `control_versiones`
  MODIFY `id_version_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `fases`
--
ALTER TABLE `fases`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la fase dela idea', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id_idea` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la idea', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de la linea', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `parametrizaciones`
--
ALTER TABLE `parametrizaciones`
  MODIFY `id_parametrizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `entregable`
--
ALTER TABLE `entregable`
  MODIFY `id_entregable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `version`
--
ALTER TABLE `version`
  MODIFY `id_version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fases` (`id_fase`);

--
-- Filtros para la tabla `control_versiones`
--
ALTER TABLE `control_versiones`
  ADD CONSTRAINT `control_versiones_ibfk_1` FOREIGN KEY (`id_version`) REFERENCES `version` (`id_version`),
  ADD CONSTRAINT `control_versiones_ibfk_2` FOREIGN KEY (`id_entregable`) REFERENCES `entregable` (`id_entregable`);

--
-- Filtros para la tabla `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizaciones` (`id_parametrizacion`),
  ADD CONSTRAINT `ideas_ibfk_2` FOREIGN KEY (`id_linea`) REFERENCES `lineas` (`id_linea`);

--
-- Filtros para la tabla `parametrizaciones`
--
ALTER TABLE `parametrizaciones`
  ADD CONSTRAINT `parametrizaciones_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `entregable_ibfk_1` FOREIGN KEY (`id_parametrizacion`) REFERENCES `parametrizaciones` (`id_parametrizacion`),
  ADD CONSTRAINT `entregable_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
