-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 19:49:20
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citasSistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `fecha` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_vehiculo` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `fecha`, `id_usuario`, `id_vehiculo`) VALUES
(1, '26 de Abril', 6, '1111ggg'),
(2, '27 de Abril', 7, '2222fff'),
(3, '30 de Abril', 7, '4444rtg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `nombre`, `texto`) VALUES
(4, 'Guiller', 'Hola me parece maravilloso este sitio web!'),
(5, 'Peter', 'Es alucinante! Jeje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasena` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `telefono`, `direccion`) VALUES
(1, 'prueba1', 'prueba1', 'prueba1@mail.com', 'q1w2e3r4t5y6', 123456789, 'prueba 1'),
(3, 'Guille', 'A B', 'guille@mail.com', '1234', 12211221, 'mi direccion 31'),
(5, 'admin', 'admin', 'admin@mail.com', 'admin', 111111111, 'admin 11'),
(6, 'guille', 'A B', 'prueba12@mail.com', '1111', 1111111, 'calle desconocida 12'),
(7, 'Reina', 'De la tortuguera', 'peter@mail.com', '1111', 111111111, 'calle de la selva 11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `id_usuario`) VALUES
('1111ggg', 6),
('2222fff', 7),
('4444rtg', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`matricula`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
