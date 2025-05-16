-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2025 a las 23:12:31
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
-- Base de datos: `gestor_tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_tarea`
--

CREATE TABLE `sub_tarea` (
  `idSubTarea` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT 'Definido',
  `fecha_de_vencimiento` date NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `idResponsable` int(11) DEFAULT NULL,
  `idTarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sub_tarea`
--

INSERT INTO `sub_tarea` (`idSubTarea`, `titulo`, `descripcion`, `prioridad`, `estado`, `fecha_de_vencimiento`, `comentario`, `idResponsable`, `idTarea`) VALUES
(10, 'Subtarea baja 3', 'descripcion', 'Alta', 'Completado', '2025-04-10', NULL, NULL, 16),
(27, 'Segunda SubTarea', 'descripcion', 'Alta', 'En proceso', '2025-05-22', NULL, 11, 14),
(28, '', '', '', 'En proceso', '0000-00-00', NULL, 12, 14),
(30, 'PRUEBA', 'descripcion', 'Normal', 'Completado', '0000-00-00', NULL, NULL, 15),
(31, 'PRUEBA', 'descripcion', 'Baja', 'Completado', '2025-05-07', NULL, NULL, 15),
(33, 'Primera tarea', 'descripcion modificada', 'Alta', 'Completado', '2025-05-13', NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `idTarea` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT 'Definido',
  `fecha_de_vencimiento` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTarea`, `titulo`, `descripcion`, `prioridad`, `estado`, `fecha_de_vencimiento`, `idUsuario`) VALUES
(14, 'Alta prueba', 'descripcion alta', 'Alta', 'Completado', '2025-05-16', 8),
(15, 'Segunda Tarea', 'descripcion segunda', 'Normal', 'Completado', '2025-04-09', 8),
(16, 'Tercera Tarea', 'descripcion tercera', 'Baja', 'Completado', '2025-05-05', 8),
(24, 'PRUEBA', 'PRUEBA', 'Alta', 'Definido', '2025-05-22', 8),
(25, 'PRUEBA', 'PRUEBA', 'Baja', 'Definido', '2025-05-17', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `email`, `contraseña`, `apellido`) VALUES
(8, 'Jeronimo', 'jeronimostur@hotmail.com', '$2y$10$3X6gab2T4WwUhqZiI.5ZB.dkeu9zN2ra5Ij4A0xCk7cqexKTQiFwi', 'Sturniolo'),
(11, 'Bruno', 'brunoSturniolo@gmail.com', '$2y$10$.YJ85iW56pTq.gXu2H16E.qV2yo58gt5zc0VSYy.kEE6eABSCclr6', 'Sturniolo'),
(12, 'Agustin', 'agustinSturniolo@gmail.com', '$2y$10$v/bhofpgfhdN1iF.K4aJ5uhgdkFzqUOPf1241aQLDm3jL76ksuViu', 'Sturniolo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sub_tarea`
--
ALTER TABLE `sub_tarea`
  ADD PRIMARY KEY (`idSubTarea`),
  ADD KEY `idResponsable` (`idResponsable`),
  ADD KEY `idTarea` (`idTarea`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `fk_tarea_usuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sub_tarea`
--
ALTER TABLE `sub_tarea`
  MODIFY `idSubTarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sub_tarea`
--
ALTER TABLE `sub_tarea`
  ADD CONSTRAINT `sub_tarea_ibfk_1` FOREIGN KEY (`idResponsable`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `sub_tarea_ibfk_2` FOREIGN KEY (`idTarea`) REFERENCES `tareas` (`idTarea`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `fk_tarea_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
