-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2024 a las 10:03:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rsvp_planner`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `nombre` varchar(45) NOT NULL,
  `apaterno` varchar(45) NOT NULL,
  `amaterno` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombre`, `apaterno`, `amaterno`, `email`, `password`) VALUES
('Ana', 'Medina', 'Angeles', 'ana.medina.angeles@gmail.com', 'ana12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anfitrion`
--

CREATE TABLE `anfitrion` (
  `id_anfitrion` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apaterno` varchar(45) NOT NULL,
  `amaterno` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `anfitrion`
--

INSERT INTO `anfitrion` (`id_anfitrion`, `nombre`, `apaterno`, `amaterno`, `email`, `password`) VALUES
(1, 'Jair', 'Sánchez', 'Martínez', 'gearssix19@gmail.com', '12345'),
(2, 'Elias', 'Pacheco', 'Ortega', 'elias@gmail.com', '54321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(10) NOT NULL,
  `id_anfitrion` int(10) NOT NULL,
  `nombre_evento` varchar(25) NOT NULL,
  `fecha_evento` date NOT NULL,
  `ubicacion` varchar(90) NOT NULL,
  `detalles` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `id_anfitrion`, `nombre_evento`, `fecha_evento`, `ubicacion`, `detalles`) VALUES
(1, 1, 'Fiesta1', '2024-01-26', 'CDMX', 'sin detalles'),
(2, 1, 'Fiesta2', '2024-01-26', 'CDMX', 'sin detalles'),
(3, 2, 'Evento1', '2024-01-31', 'CDMX', 'sin detalles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitaciones`
--

CREATE TABLE `invitaciones` (
  `id_invitacion` int(10) NOT NULL,
  `id_evento` int(10) NOT NULL,
  `diseno` int(10) NOT NULL,
  `mensaje` varchar(40) NOT NULL,
  `formato_pdf` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado`
--

CREATE TABLE `invitado` (
  `id_invitado` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apaterno` varchar(45) NOT NULL,
  `amaterno` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados_eventos`
--

CREATE TABLE `invitados_eventos` (
  `id_invitado_evento` int(10) NOT NULL,
  `id_evento` int(10) NOT NULL,
  `id_invitado` int(10) NOT NULL,
  `estado_confirmacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `anfitrion`
--
ALTER TABLE `anfitrion`
  ADD PRIMARY KEY (`id_anfitrion`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_anfitrion` (`id_anfitrion`);

--
-- Indices de la tabla `invitaciones`
--
ALTER TABLE `invitaciones`
  ADD PRIMARY KEY (`id_invitacion`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `invitado`
--
ALTER TABLE `invitado`
  ADD PRIMARY KEY (`id_invitado`);

--
-- Indices de la tabla `invitados_eventos`
--
ALTER TABLE `invitados_eventos`
  ADD PRIMARY KEY (`id_invitado_evento`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_invitado` (`id_invitado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anfitrion`
--
ALTER TABLE `anfitrion`
  MODIFY `id_anfitrion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `invitaciones`
--
ALTER TABLE `invitaciones`
  MODIFY `id_invitacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invitado`
--
ALTER TABLE `invitado`
  MODIFY `id_invitado` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invitados_eventos`
--
ALTER TABLE `invitados_eventos`
  MODIFY `id_invitado_evento` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_anfitrion`) REFERENCES `anfitrion` (`id_anfitrion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `invitaciones`
--
ALTER TABLE `invitaciones`
  ADD CONSTRAINT `invitaciones_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `invitados_eventos`
--
ALTER TABLE `invitados_eventos`
  ADD CONSTRAINT `invitados_eventos_ibfk_1` FOREIGN KEY (`id_invitado`) REFERENCES `invitado` (`id_invitado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invitados_eventos_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
