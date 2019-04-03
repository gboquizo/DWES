-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-03-2019 a las 21:59:35
-- Versión del servidor: 5.7.25-0ubuntu0.18.04.2
-- Versión de PHP: 7.2.16-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jobeet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `affiliate`
--

CREATE TABLE `affiliate` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `affiliates_categories`
--

CREATE TABLE `affiliates_categories` (
  `affiliate_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'Design', 'design'),
(2, 'Programming', 'programming'),
(3, 'Manager', 'manager'),
(4, 'Administrator', 'administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `how_to_apply` longtext COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `job`
--

INSERT INTO `job` (`id`, `category_id`, `type`, `company`, `logo`, `url`, `position`, `location`, `description`, `how_to_apply`, `token`, `is_public`, `is_activated`, `email`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'full-time', 'Sensio Labs', 'sensio-labs.gif', 'http://www.sensiolabs.com/', 'Web Developer', 'Paris, France', 'You\'ve already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.', 'Send your resume to fabien.potencier [at] sensio.com', 'job_sensio_labs', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2012-10-10 00:00:00', '2012-10-10 00:00:00'),
(2, 1, 'part-time', 'Extreme Sensio', 'extreme-sensio.gif', 'http://www.extreme-sensio.com/', 'Web Designer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.', 'Send your resume to fabien.potencier [at] sensio.com', 'job_extreme_sensio', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2012-10-10 00:00:00', '2012-10-10 00:00:00'),
(3, 2, 'full-time', 'Sensio Labs', 'sensio-labs.gif', 'http://www.sensiolabs.com/', 'Web Developer Expired', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_expired', 1, 1, 'job@example.com', '2005-12-01 00:00:00', '2005-12-01 00:00:00', '2005-12-01 00:00:00'),
(4, 2, 'full-time', 'Company 100', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_100', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(5, 2, 'full-time', 'Company 101', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_101', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(6, 2, 'full-time', 'Company 102', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_102', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(7, 2, 'full-time', 'Company 103', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_103', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(8, 2, 'full-time', 'Company 104', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_104', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(9, 2, 'full-time', 'Company 105', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_105', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(10, 2, 'full-time', 'Company 106', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_106', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(11, 2, 'full-time', 'Company 107', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_107', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(12, 2, 'full-time', 'Company 108', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_108', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(13, 2, 'full-time', 'Company 109', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_109', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(14, 2, 'full-time', 'Company 110', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_110', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(15, 2, 'full-time', 'Company 111', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_111', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(16, 2, 'full-time', 'Company 112', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_112', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(17, 2, 'full-time', 'Company 113', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_113', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(18, 2, 'full-time', 'Company 114', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_114', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(19, 2, 'full-time', 'Company 115', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_115', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(20, 2, 'full-time', 'Company 116', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_116', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(21, 2, 'full-time', 'Company 117', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_117', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(22, 2, 'full-time', 'Company 118', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_118', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(23, 2, 'full-time', 'Company 119', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_119', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(24, 2, 'full-time', 'Company 120', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_120', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(25, 2, 'full-time', 'Company 121', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_121', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(26, 2, 'full-time', 'Company 122', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_122', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(27, 2, 'full-time', 'Company 123', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_123', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(28, 2, 'full-time', 'Company 124', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_124', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(29, 2, 'full-time', 'Company 125', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_125', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(30, 2, 'full-time', 'Company 126', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_126', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(31, 2, 'full-time', 'Company 127', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_127', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(32, 2, 'full-time', 'Company 128', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_128', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(33, 2, 'full-time', 'Company 129', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_129', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00'),
(34, 2, 'full-time', 'Company 130', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] dolor.sit', 'job_130', 1, 1, 'job@example.com', '2019-10-10 00:00:00', '2019-02-28 00:00:00', '2019-03-01 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_597AA5CF5F37A13B` (`token`);

--
-- Indices de la tabla `affiliates_categories`
--
ALTER TABLE `affiliates_categories`
  ADD PRIMARY KEY (`affiliate_id`,`category_id`),
  ADD KEY `IDX_87BE21809F12C49A` (`affiliate_id`),
  ADD KEY `IDX_87BE218012469DE2` (`category_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`);

--
-- Indices de la tabla `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FBD8E0F85F37A13B` (`token`),
  ADD KEY `IDX_FBD8E0F812469DE2` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `affiliates_categories`
--
ALTER TABLE `affiliates_categories`
  ADD CONSTRAINT `FK_87BE218012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_87BE21809F12C49A` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_FBD8E0F812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
