-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-03-2019 a las 20:12:38
-- Versión del servidor: 5.7.25-0ubuntu0.18.04.2
-- Versión de PHP: 7.2.16-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `symblog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `blog` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `blog`, `image`, `tags`, `created`, `updated`) VALUES
(16, 'A day with Symfony2', 'dsyph3r', 'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.', 'beach.jpg', 'symfony2, php, paradise, symblog', '2019-02-14 10:01:47', '2019-02-14 10:01:47'),
(17, 'The pool on the roof must have a leak', 'Zero Cool', 'Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.', 'pool_leak.jpg', 'pool, leaky, hacked, movie, hacking, symblog', '2011-07-23 06:12:33', '2011-07-23 06:12:33'),
(18, 'Misdirection. What the eyes see and the ears hear, the mind believes', 'Gabriel', 'Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'misdirection.jpg', 'misdirection, magic, movie, hacking, symblog', '2011-07-16 16:14:06', '2011-07-16 16:14:06'),
(19, 'The grid - A digital frontier', 'Kevin Flynn', 'Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.', 'the_grid.jpg', 'grid, daftpunk, movie, symblog', '2011-06-02 18:54:12', '2011-06-02 18:54:12'),
(20, 'You\'re either a one or a zero. Alive or dead', 'Gary Winston', 'Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'one_or_zero.jpg', 'binary, one, zero, alive, dead, !trusting, movie, symblog', '2011-04-25 15:34:18', '2011-04-25 15:34:18'),
(25, 'Periquito va al oeste', 'Guillermo', 'Blog de prueba', 'prueba.jpg', 'Oeste, prueba', '2019-02-20 19:32:30', '2019-02-20 19:32:30'),
(26, 'Periquito va al oeste 2', 'Guillermo', 'Blog de prueba 2', 'prueba.jpg', 'Probando probando', '2019-02-20 19:40:05', '2019-02-20 19:40:05'),
(27, 'Periquito va al oeste 3', 'Paquito Perales', 'Blog de prueba 3', 'prueba.jpg', 'Probando 3', '2019-02-20 19:45:53', '2019-02-20 19:45:53'),
(28, 'Periquito va al oeste returns', 'Paquito Perales Parrales', 'Blog de prueba, y van...', 'prueba.jpg', 'Yo qué sé ya', '2019-02-20 19:47:51', '2019-02-20 19:47:51'),
(31, 'Periquito va al oeste 5', 'Guillermo', 'Ahora con más oeste', '5fd36967e4553bb21df30c6658fb1d81.jpeg', 'Oeste++', '2019-02-21 10:01:34', '2019-02-21 10:01:34'),
(32, 'Periquito va al oeste 6', 'Paquito Perales Parrales', 'Con oeste++', '8312618a17bb4d984e25c3128272bf05.bmp', 'Malditos tags', '2019-02-21 10:03:10', '2019-02-21 10:03:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `user`, `comment`, `approved`, `created`, `updated`) VALUES
(1, 16, 'symfony', 'To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.', 1, '2019-02-14 10:01:47', '2019-02-14 10:01:47'),
(2, 16, 'David', 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!', 1, '2019-02-14 10:01:48', '2019-02-14 10:01:48'),
(3, 17, 'Dade', 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.', 1, '2019-02-14 10:01:48', '2019-02-14 10:01:48'),
(4, 17, 'Kate', 'Are you challenging me? ', 1, '2011-07-23 06:15:20', '2019-02-14 10:01:48'),
(5, 17, 'Dade', 'Name your stakes.', 1, '2011-07-23 06:18:35', '2019-02-14 10:01:48'),
(6, 17, 'Kate', 'If I win, you become my slave.', 1, '2011-07-23 06:22:53', '2019-02-14 10:01:48'),
(7, 17, 'Dade', 'Your SLAVE?', 1, '2011-07-23 06:25:15', '2019-02-14 10:01:48'),
(8, 17, 'Kate', 'You wish! You\'ll do shitwork, scan, crack copyrights...', 1, '2011-07-23 06:46:08', '2019-02-14 10:01:48'),
(9, 17, 'Dade', 'And if I win?', 1, '2011-07-23 10:22:46', '2019-02-14 10:01:48'),
(10, 17, 'Kate', 'Make it my first-born!', 1, '2011-07-23 11:08:08', '2019-02-14 10:01:48'),
(11, 17, 'Dade', 'Make it our first-date!', 1, '2011-07-24 18:56:01', '2019-02-14 10:01:48'),
(12, 17, 'Kate', 'I don\'t DO dates. But I don\'t lose either, so you\'re on!', 1, '2011-07-25 22:28:42', '2019-02-14 10:01:48'),
(13, 18, 'Stanley', 'It\'s not gonna end like this.', 1, '2019-02-14 10:01:48', '2019-02-14 10:01:48'),
(14, 18, 'Gabriel', 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.', 1, '2019-02-14 10:01:48', '2019-02-14 10:01:48'),
(15, 20, 'Mile', 'Doesn\'t Bill Gates have something like that?', 1, '2019-02-14 10:01:48', '2019-02-14 10:01:48'),
(16, 20, 'Gary', 'Bill Who?', 1, '2019-02-14 10:01:48', '2019-02-14 10:01:48'),
(17, 17, 'guillermo', 'Probando añadir comentarios', 1, '2019-02-15 09:10:45', '2019-02-15 09:10:45'),
(18, 16, 'Shang Tsung', 'I\'ll steal your soul', 1, '2019-02-15 09:14:01', '2019-02-15 09:14:01'),
(19, 19, 'Guillermo', 'Probando', 1, '2019-02-15 09:16:11', '2019-02-15 09:16:11'),
(21, 16, 'Guillermo', 'Qué maravilla', 1, '2019-02-15 12:04:30', '2019-02-15 12:04:30'),
(22, 19, 'Guillermo', 'Prueba 2', 1, '2019-02-15 14:46:13', '2019-02-15 14:46:13'),
(23, 16, 'Guillermo', 'Probando nullable = false', 1, '2019-02-15 18:12:12', '2019-02-15 18:12:12'),
(24, 16, 'Sub-zero', 'Under zero degrees', 1, '2019-02-15 18:45:51', '2019-02-15 18:45:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20190214084045');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `email`, `is_active`) VALUES
(1, 'guillermoboquizosanchez@gmail.com', '$2y$13$wqZOSN4Mz514.aqzWMxx1ei9nRKix6UkoZDmJbB6mtaU62L.KsCd2', 'guillermoboquizosanchez@gmail.com', 1),
(2, 'prueba@prueba', '$2y$13$2k/HVopEMXNxjwDQk4s4au4nFbXjfUfscl416Y3w4fVFYNmpuOZDm', 'prueba@prueba', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CDAE07E97` (`blog_id`);

--
-- Indices de la tabla `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CDAE07E97` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
