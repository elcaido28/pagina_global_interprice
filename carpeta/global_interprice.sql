-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 00:17:59
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `global_interprice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_dscrp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_dscrp`) VALUES
(1, 'ACCESORIOS TECNOLOGICOS'),
(2, 'ACCESORIOS Y BISUTERIA/JOYERIA'),
(3, 'ALIMENTOS Y BEBIDAS'),
(4, 'AUTOPARTES'),
(5, 'BELLEZA Y CUIDADO PERSONAL'),
(6, 'CALZADO'),
(7, 'COMPUTADORAS Y PARTES'),
(8, 'DEPORTES Y ACTIVIDADES AL AIRE LIBRE'),
(9, 'ELECTRODOMESTICOS'),
(10, 'FOTOGRAFIA Y VIDEO'),
(11, 'GADGETS Y TECNOLOGIA'),
(12, 'HERRAMIENTAS Y FERRETERIA'),
(13, 'HOBBIES Y OCIO'),
(14, 'HOGAR E INTERIORES'),
(15, 'INSTRUMENTO MEDICO/CIENTIFICO'),
(16, 'JUGUETES NIÑOS Y BEBES'),
(17, 'MASCOTAS'),
(18, 'MATERIAL IMPRESO'),
(19, 'MUSICA E INSTRUMENTOS'),
(20, 'OFICINA E INSTITUCIONAL'),
(21, 'PIEZAS/REPUESTOS MAQUINARIA'),
(22, 'ROPA Y TEXTILES'),
(23, 'SALUD Y MEDICAMENTOS'),
(24, 'VIDEOJUEGOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_paquete`
--

CREATE TABLE `estado_paquete` (
  `estadop_id` int(11) NOT NULL,
  `estadop_dscrp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_paquete`
--

INSERT INTO `estado_paquete` (`estadop_id`, `estadop_dscrp`) VALUES
(1, 'Entregado'),
(2, 'Por Entregar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais_origen`
--

CREATE TABLE `pais_origen` (
  `pais_origen_id` int(11) NOT NULL,
  `pais_origen_dscrp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais_origen`
--

INSERT INTO `pais_origen` (`pais_origen_id`, `pais_origen_dscrp`) VALUES
(1, 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_paquetes`
--

CREATE TABLE `registro_paquetes` (
  `paq_id` int(11) NOT NULL,
  `paq_nombre` varchar(250) NOT NULL,
  `paq_archivo` text NOT NULL,
  `paq_num_trac` varchar(250) NOT NULL,
  `paq_remitente` varchar(250) NOT NULL,
  `paq_codigo` varchar(100) NOT NULL,
  `paq_valor` varchar(50) NOT NULL,
  `paq_tipo_moneda` varchar(20) NOT NULL,
  `paq_fecha_ingreso` date NOT NULL,
  `paq_observacion` text NOT NULL,
  `pais_origen_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `estadop_id` int(11) NOT NULL,
  `ru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_paquetes`
--

INSERT INTO `registro_paquetes` (`paq_id`, `paq_nombre`, `paq_archivo`, `paq_num_trac`, `paq_remitente`, `paq_codigo`, `paq_valor`, `paq_tipo_moneda`, `paq_fecha_ingreso`, `paq_observacion`, `pais_origen_id`, `categoria_id`, `estadop_id`, `ru_id`) VALUES
(1, 'teclado gamer', 'paquetes_img/teclado.png', '45B23', 'Amazon', '09500399877', '23.22', 'USD', '2019-11-10', 'observacion', 1, 7, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuario`
--

CREATE TABLE `registro_usuario` (
  `ru_id` int(11) NOT NULL,
  `ru_nombres` varchar(250) NOT NULL,
  `ru_apellidos` varchar(250) NOT NULL,
  `ru_tipo_usu` varchar(20) NOT NULL,
  `ru_tipo_ide` varchar(100) NOT NULL,
  `ru_numero_id` varchar(100) NOT NULL,
  `ru_correo` varchar(300) NOT NULL,
  `ru_direccion` varchar(400) NOT NULL,
  `ru_departamento` varchar(150) NOT NULL,
  `ru_ciudad` varchar(150) NOT NULL,
  `ru_clave` varchar(50) NOT NULL,
  `ru_telefono` varchar(50) NOT NULL,
  `ru_celular` varchar(50) NOT NULL,
  `ru_dia` int(10) NOT NULL,
  `ru_mes` int(10) NOT NULL,
  `ru_year` int(10) NOT NULL,
  `ru_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_usuario`
--

INSERT INTO `registro_usuario` (`ru_id`, `ru_nombres`, `ru_apellidos`, `ru_tipo_usu`, `ru_tipo_ide`, `ru_numero_id`, `ru_correo`, `ru_direccion`, `ru_departamento`, `ru_ciudad`, `ru_clave`, `ru_telefono`, `ru_celular`, `ru_dia`, `ru_mes`, `ru_year`, `ru_codigo`) VALUES
(5, 'admin', 'admin', 'Persona Natural', '1', '09500399877', 'bryan@gmail.com', 'los ceibos Mz.19 Sl.15', '1', '1', 'admin123', '2502729', '0997750271', 1, 1, 1, 2147483647),
(6, 'eveling', 'miranda', 'Persona Natural', '1', '0929061919', 'emiranda@gmail.com', 'guasmo sur', 'Guayas', 'Guayaquil', '123', '4939827', '0999228271', 17, 11, 1991, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `test_id` int(11) NOT NULL,
  `test_comentador` varchar(300) NOT NULL,
  `test_email_comentador` varchar(250) NOT NULL,
  `test_comentario` text NOT NULL,
  `test_fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`test_id`, `test_comentador`, `test_email_comentador`, `test_comentario`, `test_fecha_creacion`) VALUES
(1, 'Ana MarÃ­a', 'ales@gmail.com', 'pijoioj', '2019-11-01'),
(2, 'carlos walter', '', 'mensaje sin correo', '2019-11-01'),
(3, 'Erlin Alexis', 'no tengo', 'que pasa puto', '2019-11-05'),
(4, 'hoyy lunes', '', 'ajajjaja', '2019-11-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `estado_paquete`
--
ALTER TABLE `estado_paquete`
  ADD PRIMARY KEY (`estadop_id`);

--
-- Indices de la tabla `pais_origen`
--
ALTER TABLE `pais_origen`
  ADD PRIMARY KEY (`pais_origen_id`);

--
-- Indices de la tabla `registro_paquetes`
--
ALTER TABLE `registro_paquetes`
  ADD PRIMARY KEY (`paq_id`),
  ADD KEY `pais_origen_id` (`pais_origen_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `estadop_id` (`estadop_id`),
  ADD KEY `ru_id` (`ru_id`);

--
-- Indices de la tabla `registro_usuario`
--
ALTER TABLE `registro_usuario`
  ADD PRIMARY KEY (`ru_id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `estado_paquete`
--
ALTER TABLE `estado_paquete`
  MODIFY `estadop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pais_origen`
--
ALTER TABLE `pais_origen`
  MODIFY `pais_origen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_paquetes`
--
ALTER TABLE `registro_paquetes`
  MODIFY `paq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_usuario`
--
ALTER TABLE `registro_usuario`
  MODIFY `ru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro_paquetes`
--
ALTER TABLE `registro_paquetes`
  ADD CONSTRAINT `registro_paquetes_ibfk_1` FOREIGN KEY (`pais_origen_id`) REFERENCES `pais_origen` (`pais_origen_id`),
  ADD CONSTRAINT `registro_paquetes_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `registro_paquetes_ibfk_3` FOREIGN KEY (`estadop_id`) REFERENCES `estado_paquete` (`estadop_id`),
  ADD CONSTRAINT `registro_paquetes_ibfk_4` FOREIGN KEY (`ru_id`) REFERENCES `registro_usuario` (`ru_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
