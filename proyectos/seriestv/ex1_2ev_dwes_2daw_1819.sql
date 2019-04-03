-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2019 a las 16:58:17
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ex1_2ev_dwes_2daw_1819`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `ex_encuestas` (
  `id` int(11) NOT NULL,
  `Titulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaHoraInicio` datetime DEFAULT NULL,
  `fechaHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `ex_encuestas` (`id`, `Titulo`, `fechaHoraInicio`, `fechaHoraFinal`) VALUES
(1, 'Usabilidad de la aplicación', '2019-03-06 00:00:00', '2019-03-14 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_preguntas`
--

CREATE TABLE `ex_encuestas_preguntas` (
  `id` int(11) NOT NULL,
  `idEncuesta` int(11) DEFAULT NULL,
  `pregunta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas_preguntas`
--


INSERT INTO `ex_encuestas_preguntas` (`id`, `idEncuesta`, `pregunta`) VALUES
(1, 1, 'Usabilidad de la aplicación'),
(2, 1, 'Actualidad de las series'),
(3, 1, 'Atención al cliente'),
(4, 1, 'Calidad de las series'),
(5, 1, 'Grado de satisfacción');

INSERT INTO `ex_encuestas_preguntas` (`id`, `idEncuesta`, `pregunta`) VALUES
(6, 2, 'Usabilidad de la aplicación'),
(7, 2, 'Actualidad de las series'),
(8, 2, 'Atención al cliente'),
(9, 2, 'Calidad de las series'),
(10, 2, 'Grado de satisfacción');

INSERT INTO `ex_encuestas` (`id`, `Titulo`, `fechaHoraInicio`,`fechaHoraFinal`) VALUES
(2, 'Encuesta 2', null, null);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_respuestas`
--

CREATE TABLE `ex_encuestas_respuestas` (
  `id` int(11) NOT NULL,
  `idEncuestaPregunta` int(11) NOT NULL,
  `Valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas_respuestas`
--

INSERT INTO `ex_encuestas_respuestas` (`id`, `idEncuestaPregunta`, `Valor`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 3),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `ex_perfiles` (
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `ex_perfiles` (`perfil`) VALUES
('admin'),
('rol1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `ex_series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `ex_series` (`id`, `titulo`) VALUES
(1, 'Juego de Tronos'),
(2, 'Arde Madrid'),
(3, 'Breaking Bad'),
(4, 'Mad Men'),
(5, 'The Big Bang Theory'),
(6, 'Friends'),
(7, 'Perdidos'),
(8, 'Paquita Salas'),
(9, 'Prision Break');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series_user`
--

CREATE TABLE `ex_series_user` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `series_user`
--

INSERT INTO `ex_series_user` (`id`, `idUser`, `idSerie`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 5),
(5, 1, 6),
(6, 2, 1),
(7, 2, 3),
(8, 2, 5),
(9, 3, 1),
(10, 3, 3),
(11, 3, 5),
(12, 3, 7),
(13, 3, 8),
(14, 4, 1),
(15, 4, 3),
(16, 4, 5),
(17, 4, 6),
(18, 4, 2),
(19, 5, 1),
(20, 5, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `ex_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `passwd` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `ex_usuarios` (`id`, `usuario`, `nombre`, `passwd`, `perfil`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'user1', 'user1', 'user1', 'rol1'),
(3, 'user2', 'user2', 'user2', 'rol1'),
(4, 'user3', 'user3', 'user3', 'rol1'),
(5, 'user4', 'user4', 'user4', 'rol1'),
(6, 'user5', 'user5', 'user5', 'rol1'),
(7, 'user6', 'user6', 'user6', 'rol1'),
(8, 'user7', 'user7', 'user7', 'rol1'),
(9, 'user8', 'user8', 'user8', 'rol1'),
(10, 'user9', 'user9', 'user9', 'rol1'),
(11, 'user10', 'user10', 'user10', 'rol1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `ex_encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas_preguntas`
--
ALTER TABLE `ex_encuestas_preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEncuesta` (`idEncuesta`),
  ADD KEY `pregunta` (`pregunta`);

--
-- Indices de la tabla `encuestas_respuestas`
--
ALTER TABLE `ex_encuestas_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEncuestaPregunta` (`idEncuestaPregunta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `ex_perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `ex_series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series_user`
--
ALTER TABLE `ex_series_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSerie` (`idSerie`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `ex_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil` (`perfil`),
  ADD KEY `perfil_2` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `ex_encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `encuestas_preguntas`
--
ALTER TABLE `ex_encuestas_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encuestas_respuestas`
--
ALTER TABLE `ex_encuestas_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `ex_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `series_user`
--
ALTER TABLE `ex_series_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `ex_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `ex_encuestas`
  ADD CONSTRAINT `encuestas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ex_encuestas_preguntas` (`idEncuesta`);

--
-- Filtros para la tabla `encuestas_respuestas`
--
ALTER TABLE `ex_encuestas_respuestas`
  ADD CONSTRAINT `encuestas_respuestas_ibfk_1` FOREIGN KEY (`idEncuestaPregunta`) REFERENCES `ex_encuestas_preguntas` (`id`);

--
-- Filtros para la tabla `series_user`
--
ALTER TABLE `ex_series_user`
  ADD CONSTRAINT `series_user_ibfk_1` FOREIGN KEY (`idSerie`) REFERENCES `ex_series` (`id`),
  ADD CONSTRAINT `series_user_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `ex_usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `ex_usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `ex_perfiles` (`perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
