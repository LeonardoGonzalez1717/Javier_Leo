-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2023 a las 20:18:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_candelaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `curso`) VALUES
(1, '1er A?o'),
(2, '2do A?o'),
(3, '3er A?o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_div`
--

CREATE TABLE `curso_div` (
  `id` int(11) NOT NULL,
  `curso_div` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso_div`
--

INSERT INTO `curso_div` (`id`, `curso_div`) VALUES
(1, '4to a?o'),
(2, '5to A?o'),
(3, '6to A?o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `cedula` int(10) DEFAULT NULL,
  `id_seccion` int(10) DEFAULT NULL,
  `id_curso` int(10) DEFAULT NULL,
  `id_mencion` int(10) DEFAULT NULL,
  `id_curso_div` int(10) DEFAULT NULL,
  `id_materia` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre_completo`, `cedula`, `id_seccion`, `id_curso`, `id_mencion`, `id_curso_div`, `id_materia`) VALUES
(1, 'Leo', 30611935, 1, NULL, 1, 1, NULL),
(2, 'javi', 30500442, 2, 1, NULL, NULL, NULL),
(3, 'yere', 30611936, NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mencion`
--

CREATE TABLE `mencion` (
  `id` int(11) NOT NULL,
  `mencion` varchar(100) NOT NULL,
  `id_curso_div` int(10) DEFAULT NULL,
  `id_seccion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mencion`
--

INSERT INTO `mencion` (`id`, `mencion`, `id_curso_div`, `id_seccion`) VALUES
(1, 'Informática', NULL, 1),
(2, 'Administración Financiera', NULL, 2),
(3, 'Contabilidad', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `seccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `seccion`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso_div`
--
ALTER TABLE `curso_div`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_cedula` (`cedula`),
  ADD KEY `fk_id_div` (`id_curso_div`),
  ADD KEY `fk_id_materia` (`id_materia`),
  ADD KEY `fk_id_mencion` (`id_mencion`),
  ADD KEY `fk_id_seccion` (`id_seccion`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mencion`
--
ALTER TABLE `mencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_curso_div` (`id_curso_div`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `curso_div`
--
ALTER TABLE `curso_div`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mencion`
--
ALTER TABLE `mencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_div` FOREIGN KEY (`id_curso_div`) REFERENCES `curso_div` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_materia` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_mencion` FOREIGN KEY (`id_mencion`) REFERENCES `mencion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_seccion` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mencion`
--
ALTER TABLE `mencion`
  ADD CONSTRAINT `fk_id_curso_div` FOREIGN KEY (`id_curso_div`) REFERENCES `curso_div` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mencion_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
