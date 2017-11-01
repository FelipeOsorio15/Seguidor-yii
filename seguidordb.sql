-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2015 a las 21:16:30
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `seguidordb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `idactividad` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `begindate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `registrationdate` date NOT NULL,
  `updatedate` datetime NOT NULL,
  `idproyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idcomentario` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `registrationdate` date NOT NULL,
  `idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idproyecto` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `begindate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `manager` int(11) NOT NULL,
  `registrationdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `docid` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_proyecto`
--

CREATE TABLE IF NOT EXISTS `user_proyecto` (
  `iduser` int(11) NOT NULL,
  `idproyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`), ADD KEY `idproyecto` (`idproyecto`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`), ADD KEY `idactividad` (`idactividad`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idproyecto`), ADD KEY `manager` (`manager`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `user_proyecto`
--
ALTER TABLE `user_proyecto`
  ADD PRIMARY KEY (`iduser`,`idproyecto`), ADD KEY `fk_user_has_proyecto_proyecto1_idx` (`idproyecto`), ADD KEY `fk_user_has_proyecto_user_idx` (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idproyecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_proyecto`
--
ALTER TABLE `user_proyecto`
ADD CONSTRAINT `fk_user_has_proyecto_proyecto1` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user_has_proyecto_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
