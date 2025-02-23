-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2025 a las 23:47:41
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
-- Base de datos: `proyecto_sae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `programador` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `requisitos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `empresa`, `ciudad`, `fecha`, `tipo`, `programador`, `status`, `requisitos`) VALUES
(14, 'iujo', 'cabudare', '2025-02-07', 'Evaluacion', 'yo', 'En Espera', 'tienes que ser resposive, colores bonitos'),
(15, 'iujo', 'cabudare', '2025-02-08', 'asistencia tecnica', 'rafael', 'Asignado', 'proyecto de la chiqui'),
(16, 'iujo', 'barquisimeto', '2025-02-09', 'Evaluacion', 'yo, sarath, semanero, carlos, maria, eichner, manuel, angel', 'Terminado', 'asdasdasdasdasdadsasdasdadasdasdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(18, 'Desconocida', 'Desconocida', '2025-02-10', 'Evaluacion', 'Sin asignar', 'En Espera', 'asdasdasdasd'),
(19, '', '', '', 'sae pagos', '', '', 'tiene una gran cantidad de requisitos... etc...AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(20, 'Desconocida', 'Desconocida', '2025-02-10', 'Evaluacion', 'Sin asignar', 'En Espera', 'asdasdasd'),
(21, 'asdasdasd', 'asdasdasd', '2025-02-10', 'sae WEB + aula virtual', 'manuel, rafa', 'En Espera', 'asdasdasdas'),
(22, 'colegio maria santisima asdasdasdas', 'barquisimeto', '2025-02-10', 'sae WEB + aula virtual', 'TAIRIANA, MANUEL', 'En Proceso', 'tengo 20000 estudiantes y 200 profesores'),
(23, 'IUJO', 'Barquisimeto', '2025-02-14', 'sae pagos', 'muchos, muchos', 'En Proceso', 'no tenemos idea de los requisitos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `correo`, `contraseña`, `empresa`, `ciudad`) VALUES
(3, 'admin', 'admin@SAE.com', '123456', 'SAE', 'Barquisimeto'),
(4, 'carlos rodriguez', 'carlos@gmail.com', '12345678', 'Erfundenes Unternehm', 'München'),
(5, 'carlos rodriguez', 'augusto@gmail.com', 'SukOY298.$', 'Erfundenes Unternehm', 'barquisimeto'),
(6, 'carlos rodriguez', 'theshadowx171@gmail.com', '123', 'dsd', 'barquisimeto'),
(13, 'laurys', 'ejemplo@gmail.com', '123456', 'colegio maria santisima', 'barquisimeto'),
(14, 'rafa', 'ejemplo2@gmail.com', '123456', 'iujo', 'carora'),
(15, 'rafael alvarez', 'ejemplo3@gmail.com', '123456', 'iujo', 'barquisimeto'),
(17, 'rafael', 'ejemplo4@gmail.com', '31757781', 'iujo', 'barquisimeto'),
(19, 'rafael alvarez', 'alvarezrafaelat@gmail.com', '31757781', 'IUJO', 'barquisimeto'),
(20, 'rafael alvarez', 'ejemplo5@gmail.com', '123456', 'arrocera', 'acarigua'),
(22, 'andres alejandro', 'ale@gmail.com', '123456', 'arrocera', 'chispa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
