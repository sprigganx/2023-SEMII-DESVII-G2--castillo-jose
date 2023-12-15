-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2023 a las 16:24:44
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_votos` (IN `param_votos1` VARCHAR(255), IN `param_votos2` VARCHAR(255))  BEGIN
	SET @s = CONCAT("UPDATE votos SET votos1=", param_votos1 ,", votos2=", param_votos2);
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_factorial` (IN `pN` INT, IN `pFactorial` INT, IN `pSumatoria` DECIMAL(10,2))  BEGIN
    INSERT INTO parcial2 (N, Factorial, Sumatoria) VALUES (pN, pFactorial, pSumatoria);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias` ()  BEGIN

	SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_filtro` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))  BEGIN
	
    SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen
                    FROM noticias WHERE ", param_campo ," LIKE CONCAT('%", param_valor, "%')");
    PREPARE	stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_votos` ()  BEGIN
	SELECT votos1, votos2 FROM votos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_tabla` ()  BEGIN
    SELECT * FROM parcial2 ORDER BY ID ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_navegacion_noticias` (IN `comienzo` INT, IN `num` INT)  BEGIN
  SELECT * FROM noticias LIMIT comienzo, num;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_usuario` (IN `param_user` VARCHAR(255), IN `param_pass` VARCHAR(255))  BEGIN

	SET @s = CONCAT("SELECT count(*) FROM usuarios
                    WHERE usuario = '", param_user ,"' AND clave = '" , param_pass,"'");
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costos') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Ciudad Cristal', '145 viviendas \r\nde lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Ultimas viviendas junto al rio', 'Apartamentos de 1 \r\ny 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(3, 'Apartamentos en el Puerto de San Martin', 'En la \r\nPlaya del Sol, en primera linea de playa. Pisos reformados y completamente \r\namueblados.', '', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Palmera', 'Dos \r\nplantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle \r\ntranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Costa Mar', 'Con vistas al campo de \r\ngolf, magnificas calidades, entorno ajardinado con piscina y servicio de \r\nvigilancia.', '', '2019-02-09', 'apartamento9.jpg'),
(6, 'Nueva promocion en Ciudad Bella', '200 viviendas \r\nen una comunidad cerrada con hermosos jardines. No te lo pierdas!', 'promociones', '2019-02-10', NULL),
(7, 'Apartamentos en el Centro Historico', 'Amplios apartamentos de 3 dormitorios en el corazon de la ciudad. Vive en el centro!', 'ofertas', '2019-02-11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial2`
--

CREATE TABLE `parcial2` (
  `ID` int(11) NOT NULL,
  `N` int(11) NOT NULL,
  `Factorial` int(11) NOT NULL,
  `Sumatoria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parcial2`
--

INSERT INTO `parcial2` (`ID`, `N`, `Factorial`, `Sumatoria`) VALUES
(1, 5, 120, '3.55'),
(2, 6, 720, '4.41'),
(3, 10, 3628800, '7.98'),
(4, 3, 6, '1.92'),
(5, 5, 120, '3.98'),
(6, 3, 6, '2.02'),
(7, 10, 3628800, '8.97');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `clave` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'testuser', 'teXB5LK3JWG6g');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 54, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parcial2`
--
ALTER TABLE `parcial2`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `parcial2`
--
ALTER TABLE `parcial2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
