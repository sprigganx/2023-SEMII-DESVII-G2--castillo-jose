-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2023 a las 01:29:26
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
-- Base de datos: `labsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial2`
--

CREATE TABLE `parcial2` (
  `ID` int(11) NOT NULL,
  `N` int(11) NOT NULL,
  `Factorial` int(11) NOT NULL,
  `Sumatoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parcial2`
--

INSERT INTO `parcial2` (`Field_name`, `Min_value`, `Max_value`, `Min_length`, `Max_length`, `Empties_or_zeros`, `Nulls`, `Avg_value_or_avg_length`, `Std`, `Optimal_fieldtype`) VALUES
(0x6c61627364622e7061726369616c322e4944, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c),
(0x6c61627364622e7061726369616c322e4e, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c),
(0x6c61627364622e7061726369616c322e466163746f7269616c, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c),
(0x6c61627364622e7061726369616c322e53756d61746f726961, NULL, NULL, 0, 0, 0, 0, 0x302e30, 0x302e30, 0x43484152283029204e4f54204e554c4c);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `parcial2`
--
ALTER TABLE `parcial2`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `parcial2`
--
ALTER TABLE `parcial2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
