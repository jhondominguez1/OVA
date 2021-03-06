-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2016 a las 09:32:16
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `ova_decimodos`
--
CREATE DATABASE IF NOT EXISTS `ova_decimodos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ova_decimodos`;

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

--
-- Volcado de datos para la tabla `asignacion_docentes`
--

INSERT INTO `asignacion_docentes` (`id_curso`, `id_usuario`) VALUES
(2, 4),
(3, 5);

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

--
-- Volcado de datos para la tabla `asignacion_estudiantes`
--

INSERT INTO `asignacion_estudiantes` (`id_curso`, `id_usuario`) VALUES
(4, 2),
(3, 2),
(2, 2),
(2, 6);

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
(2, 'pedagogia', 'fundamentos de pedagogia', 2),
(3, 'Algoritmos', 'Fundamento de programacion', 2),
(4, 'multimedia', 'Fundamento de Multimedia', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_evaluacion`, `nombre_evaluacion`, `id_leccion`) VALUES
(1, 'examen diagnostico', 1);

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

--
-- Volcado de datos para la tabla `evaluaciones_preguntas`
--

INSERT INTO `evaluaciones_preguntas` (`id_evaluacion`, `id_pregunta`) VALUES
(1, 1),
(1, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`id_leccion`, `nombre_leccion`, `descripcion_leccion`, `id_curso`) VALUES
(1, 'leccin 1 para pedagogia', 'En esta lecciÃ³n se pretende..', 2),
(2, 'leccion 2 para pedagogia', 'En esta lecciÃ³n se busca', 2),
(3, 'leccion 1 algorit', 'descrip lec 1 curso algoritmos', 3),
(4, 'leccion 2 algorit', 'descrip lec 2 curso algoritmos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`) VALUES
(1, ' ¿Cuál es el rasgo más notorio en el sistema de enseñanza de los jesuitas?'),
(2, '¿Con que otro nombre se lo conoce a la Pedagogía Tradicional?'),
(3, '¿A quién se le considera el Padre de la Didáctica por su influencia en la ciencia Pedagógica?');

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

--
-- Volcado de datos para la tabla `preguntas_respuestas`
--

INSERT INTO `preguntas_respuestas` (`id_pregunta`, `id_respuesta`, `value`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(2, 3, 0),
(1, 4, 0),
(2, 4, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `nombre_recurso`, `link_recurso`, `id_leccion`, `id_tipo_recurso`) VALUES
(1, 'recurso para pedagogia', 'https://www.youtube.com/watch?v=N2IUGAGDYws', 1, 2),
(2, 'recurso 2 curso 1 leccion 1', 'https://www.youtube.com/watch?v=LmcYu8mpmNc', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `respuesta`) VALUES
(1, 'respuesta correcta para la pregunta 1'),
(2, 'respuesta correcta para la pregunta 2'),
(3, 'a'),
(4, 'b'),
(5, 'c'),
(6, 'd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo_identificacion`, `numero_identificacion`, `nombre_usuario`, `password`, `id_rol`) VALUES
(1, 'Cedula de ciudadania', 1085269729, 'luis', '123', 1),
(2, 'Cedula de ciudadania', 10850, 'marcela', '123', 3),
(3, 'Cedula de ciudadania', 1085000000, 'daniel', '123', 1),
(4, 'Cedula de ciudadanÃ­a', 105897983, 'milton', '123', 2),
(5, 'Cedula Ciudadania', 2110102134, 'victor', '123', 2),
(6, 'Cedula Ciudadania', 2147483647, 'diana', '123', 3);

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
