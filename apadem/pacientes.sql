-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2026 a las 18:04:31
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
-- Base de datos: `apadem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `diagnostico` varchar(200) DEFAULT NULL,
  `hospital` varchar(150) DEFAULT NULL,
  `medicamentos` text DEFAULT NULL,
  `responsable` varchar(100) DEFAULT NULL,
  `cedula_responsable` varchar(30) DEFAULT NULL,
  `telefono_responsable` varchar(30) DEFAULT NULL,
  `parentesco` varchar(50) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `proxima_consulta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `nacimiento`, `cedula`, `telefono`, `direccion`, `diagnostico`, `hospital`, `medicamentos`, `responsable`, `cedula_responsable`, `telefono_responsable`, `parentesco`, `observaciones`, `proxima_consulta`) VALUES
(1, 'María González', '1992-05-10', '4123456', '0981123456', 'Hohenau', 'Labio Leporino', 'Hospital General de Itapúa', 'Acetaminofén', 'Ana González', '1234567', '0981555555', 'Hermana', 'Cirugía pospuesta', NULL),
(2, 'Juan Carlos Ramírez', '2001-03-15', '5123456', '0981222333', 'Obligado', 'Síndrome de Down', 'Centro de Salud de Obligado', 'Ácido Fólico, Lorazepam', 'Pedro Ramírez', '2222222', '0972434567', 'Padre', 'Control periódico', '2026-06-23'),
(3, 'Laura Benítez', '2008-08-20', '6234567', '0981777888', 'Bella Vista', 'Autismo', 'Centro de Salud de Bella Vista', 'Risperidona', 'Claudia Benítez', '3333333', '0981999888', 'Madre', 'Asiste a terapia ocupacional', '2026-07-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
