-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2016 a las 05:02:54
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ova_decimodos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_conocimiento`
--

CREATE TABLE IF NOT EXISTS `areas_conocimiento` (
  `id_area_conocimiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_area_conocimiento` varchar(45) DEFAULT NULL,
  `descripcion_area_conocimiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_area_conocimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `areas_conocimiento`
--

INSERT INTO `areas_conocimiento` (`id_area_conocimiento`, `nombre_area_conocimiento`, `descripcion_area_conocimiento`) VALUES
(1, 'Matematicas', 'Area fundamental'),
(2, 'Informática', 'Área fundamental'),
(3, 'Biología', 'Área funfamental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_docentes`
--

CREATE TABLE IF NOT EXISTS `asignacion_docentes` (
  `id_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  KEY `fk_id_curso_idx` (`id_curso`),
  KEY `fk_id_docente_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_estudiantes`
--

CREATE TABLE IF NOT EXISTS `asignacion_estudiantes` (
  `id_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  KEY `fk_id_curso_idx` (`id_curso`),
  KEY `fk_id_estudiante_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(45) DEFAULT NULL,
  `descripcion_curso` varchar(45) DEFAULT NULL,
  `id_area_conocimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `fk_curso_area_conocimiento1_idx` (`id_area_conocimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `descripcion_curso`, `id_area_conocimiento`) VALUES
(2, 'Conociendo los poligonos', 'Aqui aprenderas todo sobre los poligonos', 1),
(3, 'Algoritmos', 'Fundamental para la programación', 2),
(4, 'La célula', 'Teoría y fundamentos ', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evaluacion` varchar(45) DEFAULT NULL,
  `id_leccion` int(11) NOT NULL,
  PRIMARY KEY (`id_evaluacion`),
  KEY `fk_evaluaciones_leccion1_idx` (`id_leccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones_preguntas`
--

CREATE TABLE IF NOT EXISTS `evaluaciones_preguntas` (
  `id_evaluacion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  KEY `fk_id_evaluacion_idx` (`id_evaluacion`),
  KEY `fk_id_pregunta_idx` (`id_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id_imagenes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `link_imagenes` varchar(45) DEFAULT NULL,
  `fk_id_leccion` int(11) NOT NULL,
  PRIMARY KEY (`id_imagenes`),
  KEY `fk_imagenes_leccion1_idx` (`fk_id_leccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leccion`
--

CREATE TABLE IF NOT EXISTS `leccion` (
  `id_leccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_leccion` varchar(45) DEFAULT NULL,
  `descripcion_leccion` varchar(45) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_leccion`),
  KEY `fk_leccion_curso1_idx` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`id_leccion`, `nombre_leccion`, `descripcion_leccion`, `id_curso`) VALUES
(1, 'Reconociendo poligonos', 'En esta lecciÃ³n se pretende..', 2),
(2, 'Seleccionando polÃ­gonos', 'En esta lecciÃ³n se busca', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_respuestas`
--

CREATE TABLE IF NOT EXISTS `preguntas_respuestas` (
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `value` float NOT NULL DEFAULT '0',
  KEY `fk_id_pregunta_idx` (`id_pregunta`),
  KEY `fk_id_respuesta_idx` (`id_respuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE IF NOT EXISTS `recursos` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_recurso` varchar(45) DEFAULT NULL,
  `link_recurso` varchar(45) DEFAULT NULL,
  `id_leccion` int(11) NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  PRIMARY KEY (`id_recurso`),
  KEY `fk_animacion_leccion1_idx` (`id_leccion`),
  KEY `fk_recursos_tipo_recurso1_idx` (`id_tipo_recurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) DEFAULT NULL,
  `descripcion_roles` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `descripcion_roles`) VALUES
(1, 'Administrador', 'Operaciones CRUD'),
(2, 'Docente', 'Administración de cursos'),
(3, 'Estudiante', 'Mirar cursos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_recursos`
--

CREATE TABLE IF NOT EXISTS `tipos_recursos` (
  `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_recurso` varchar(45) DEFAULT NULL,
  `descripcion_tipo_recurso` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_recurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipos_recursos`
--

INSERT INTO `tipos_recursos` (`id_tipo_recurso`, `nombre_tipo_recurso`, `descripcion_tipo_recurso`) VALUES
(1, 'Video', 'Inserta el link del video.'),
(2, 'Imagen', 'Sube tu imagen (mapa conceptual)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `numero_identificacion` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_roles_idx` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo_identificacion`, `numero_identificacion`, `nombre_usuario`, `password`, `id_rol`) VALUES
(1, 'Cedula de ciudadania', 1085269729, 'luis', '123', 1),
(2, 'Cedula de ciudadania', 1085000000, 'marcela', '123', 3),
(3, 'Cedula de ciudadania', 1085000000, 'daniel', '123', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_docentes`
--
ALTER TABLE `asignacion_docentes`
  ADD CONSTRAINT `fk_id_curso_ad` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_docente_ad` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignacion_estudiantes`
--
ALTER TABLE `asignacion_estudiantes`
  ADD CONSTRAINT `fk_id_curso_ae` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_estudiante_ae` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_curso_area_conocimiento1` FOREIGN KEY (`id_area_conocimiento`) REFERENCES `areas_conocimiento` (`id_area_conocimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `fk_evaluaciones_leccion1` FOREIGN KEY (`id_leccion`) REFERENCES `leccion` (`id_leccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluaciones_preguntas`
--
ALTER TABLE `evaluaciones_preguntas`
  ADD CONSTRAINT `fk_id_evaluacion_ep` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_pregunta_ep` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagenes_leccion1` FOREIGN KEY (`fk_id_leccion`) REFERENCES `leccion` (`id_leccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `leccion`
--
ALTER TABLE `leccion`
  ADD CONSTRAINT `fk_leccion_curso1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  ADD CONSTRAINT `fk_id_pregunta_pr` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_respuesta_pr` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id_respuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `fk_animacion_leccion1` FOREIGN KEY (`id_leccion`) REFERENCES `leccion` (`id_leccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recursos_tipo_recurso1` FOREIGN KEY (`id_tipo_recurso`) REFERENCES `tipos_recursos` (`id_tipo_recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
