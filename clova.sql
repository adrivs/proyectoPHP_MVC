-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2019 a las 19:01:29
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id_guia` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `apellidos` text COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `guia`
--

INSERT INTO `guia` (`id_guia`, `nombre`, `apellidos`, `email`, `contrasena`) VALUES
(21, 'Juan', 'Doe', 'juan@doe.com', '$2y$10$8NXElDSAlEw7hanlRY3IZemp6CMQmPmcZnrhigaZkoLPHi1SogxMi'),
(22, 'adri', 'villalba', 'adrian@gmail.com', '$2y$10$Yu6Ta5uPnMnYKfOn01osgexHpyc6CVHaBfNDRrXEtGyNGVeJ9rQJq'),
(23, 'la claudiya', 'villalba', 'claudiya@gmail.com', '$2y$10$DlyauIbNbFsDWO5fWe6Z9.1P9kcuK3pHCWOv7EaLcFhU5BGfh5fQ.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(10) NOT NULL,
  `inicio` varchar(100) COLLATE utf8_bin NOT NULL,
  `final` varchar(100) COLLATE utf8_bin NOT NULL,
  `hora` text COLLATE utf8_bin NOT NULL,
  `asistentes` int(10) NOT NULL,
  `dia` date NOT NULL,
  `id_guia` int(10) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `inicio`, `final`, `hora`, `asistentes`, `dia`, `id_guia`, `descripcion`) VALUES
(28, 'Campillos', 'Teba', '15:30', 13, '2019-03-04', 21, 'ExcursiÃ³n por el pueblo de Campillos y Teba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD KEY `id_guia` (`id_guia`) USING BTREE;

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_guia` (`id_guia`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id_guia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_guia`) REFERENCES `guia` (`id_guia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
