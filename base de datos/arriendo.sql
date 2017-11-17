-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2017 a las 21:13:14
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arriendo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(800) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL,
  `rut` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `patente` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio_serv` int(11) DEFAULT NULL,
  `tipo_servicio` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `region` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `comuna` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`) VALUES
(2),
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `COMUNA_ID` int(5) NOT NULL DEFAULT '0',
  `COMUNA_NOMBRE` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `COMUNA_PROVINCIA_ID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `medio` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `contacto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `medio`, `contacto`) VALUES
(5, 'facebook', 'https://www.facebook.com/ccontreras'),
(5, 'telefono', '887323273283'),
(7, 'facebook', 'https://www.facebook.com/apatamala'),
(7, 'telefono', '8556y3534543'),
(8, 'facebook', 'https://www.facebook.com/scasdsd'),
(8, 'telefono', '94238428374823'),
(9, 'facebook', 'https://www.facebook.com/pperez'),
(9, 'telefono', '9321931298424');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_cliente` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `num_pago` int(11) NOT NULL,
  `modo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `anexo` blob,
  `fecha_pago` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `foto` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `num_pago` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio_uni` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `duracion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_secretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `rut` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `profesion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `años_experiencia` int(11) DEFAULT NULL,
  `curriculum` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`rut`, `nombre`, `apellido`, `profesion`, `años_experiencia`, `curriculum`) VALUES
('7.435.657-2', 'Juan', 'Jara', 'mecánico', 12, 'Mecánica clásica'),
('sds', 'ewew', 'wew', 'eweewew', 12, 'ewew');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `PROVINCIA_ID` int(3) NOT NULL DEFAULT '0',
  `PROVINCIA_NOMBRE` varchar(23) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PROVINCIA_REGION_ID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`PROVINCIA_ID`, `PROVINCIA_NOMBRE`, `PROVINCIA_REGION_ID`) VALUES
(11, 'Iquique', 1),
(14, 'Tamarugal', 1),
(21, 'Antofagasta', 2),
(22, 'El Loa', 2),
(23, 'Tocopilla', 2),
(31, 'Copiapó', 3),
(32, 'Chañaral', 3),
(33, 'Huasco', 3),
(41, 'Elqui', 4),
(42, 'Choapa', 4),
(43, 'Limarí', 4),
(51, 'Valparaíso', 5),
(52, 'Isla de Pascua', 5),
(53, 'Los Andes', 5),
(54, 'Petorca', 5),
(55, 'Quillota', 5),
(56, 'San Antonio', 5),
(57, 'San Felipe de Aconcagua', 5),
(58, 'Marga Marga', 5),
(61, 'Cachapoal', 6),
(62, 'Cardenal Caro', 6),
(63, 'Colchagua', 6),
(71, 'Talca', 7),
(72, 'Cauquenes', 7),
(73, 'Curicó', 7),
(74, 'Linares', 7),
(81, 'Concepción', 8),
(82, 'Arauco', 8),
(83, 'Biobío', 8),
(91, 'Cautín', 9),
(92, 'Malleco', 9),
(101, 'Llanquihue', 10),
(102, 'Chiloé', 10),
(103, 'Osorno', 10),
(104, 'Palena', 10),
(111, 'Coihaique', 11),
(112, 'Aisén', 11),
(113, 'Capitán Prat', 11),
(114, 'General Carrera', 11),
(121, 'Magallanes', 12),
(122, 'Antártica Chilena', 12),
(123, 'Tierra del Fuego', 12),
(124, 'Última Esperanza', 12),
(131, 'Santiago', 13),
(132, 'Cordillera', 13),
(133, 'Chacabuco', 13),
(134, 'Maipo', 13),
(135, 'Melipilla', 13),
(136, 'Talagante', 13),
(141, 'Valdivia', 14),
(142, 'Ranco', 14),
(151, 'Arica', 15),
(152, 'Parinacota', 15),
(161, 'Punilla', 16),
(162, 'Itata', 16),
(163, 'Diguillín', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `REGION_ID` int(2) NOT NULL DEFAULT '0',
  `REGION_NOMBRE` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ISO_3166_2_CL` varchar(5) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`REGION_ID`, `REGION_NOMBRE`, `ISO_3166_2_CL`) VALUES
(1, 'Tarapacá', 'CL-TA'),
(2, 'Antofagasta', 'CL-AN'),
(3, 'Atacama', 'CL-AT'),
(4, 'Coquimbo', 'CL-CO'),
(5, 'Valparaíso', 'CL-VS'),
(6, 'Región del Libertador Gral. Bernardo O’Higgins', 'CL-LI'),
(7, 'Región del Maule', 'CL-ML'),
(8, 'Región del Biobío', 'CL-BI'),
(9, 'Región de la Araucanía', 'CL-AR'),
(10, 'Región de Los Lagos', 'CL-LL'),
(11, 'Región Aisén del Gral. Carlos Ibáñez del Campo', 'CL-AI'),
(12, 'Región de Magallanes y de la Antártica Chilena', 'CL-MA'),
(13, 'Región Metropolitana de Santiago', 'CL-RM'),
(14, 'Región de Los Ríos', 'CL-LR'),
(15, 'Arica y Parinacota', 'CL-AP'),
(16, 'Región de Ñuble', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE `secretaria` (
  `id_secretaria` int(11) NOT NULL,
  `anuncios_pend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`id_secretaria`, `anuncios_pend`) VALUES
(3, 4),
(5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `num_pago` int(11) NOT NULL,
  `num_tarjeta` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `c_seguridad` int(11) DEFAULT NULL,
  `mes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `year` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `rut` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp(1) NULL DEFAULT NULL,
  `updated_at` timestamp(1) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rut`, `nombre`, `apellido`, `email`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '19.344.212-2', 'Boris', 'Mora', 'admin@ucm.cl', '$2y$10$aIZ6WaeH7CgP/EjyxmS3dOr20aG9cRsgnUMiXrBlyUZgBI80R6WxC', 'admin', 'wauQqwpd2JHTjS2zTKCONB5v8nA6n9kLdGKpiC4caQUCZyj0RWKSCMD79TKa', '2017-10-17 00:51:12.0', '2017-10-17 00:51:12.0'),
(2, '17.324.545-6', 'Flaco', 'Renegado', 'cliente@ucm.cl', '$2y$10$8fxHUBybt8ux4zVJ7eQmHOuZvLFJbilnnEMT65ei2Lw8dtqqN/qCS', 'cliente', 'YNtjeTBtiQoD11ByfSZ6q8xoPwRhzFaRGiJqcCsFyXIlhRyHnO03QqScHzlv', '2017-10-17 00:54:59.0', '2017-10-17 00:54:59.0'),
(3, '18938323-5', 'Fernanda', 'Fernandez', 'secretaria@ucm.cl', '$2y$10$tAoGISY0s4T0jikX4JCQpOBEGMDODSpmC34bDsMdenNU9eLcQ6aBy', 'secretaria', NULL, '2017-10-17 00:55:50.0', '2017-10-17 00:55:50.0'),
(5, '172232323-2', 'Constanza', 'Contreras', 'secretaria2@ucm.cl', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'secretaria', NULL, '2017-10-18 07:03:02.0', '2017-10-18 07:03:02.0'),
(7, '1832832324-5', 'Alfonso', 'Patamala', 'cliente4@ucm.cl', '$2y$10$1Nx0CdeN4yMYKEg6vCyjgev0PxA6N63iIXsSUh8b8uKpOfJQoGkMa', 'cliente', NULL, '2017-10-18 08:04:06.0', '2017-10-18 08:04:06.0'),
(8, '1734234234-5', 'Susana', 'Castillo', 'cliente2@ucm.cl', '$2y$10$oy5hmF1Fe/6qo5By742VweZrk.v9wvF5MOO7XqR0tgPIFSvJ0mz8u', 'cliente', NULL, '2017-10-18 21:01:18.0', '2017-10-18 21:01:18.0'),
(9, '173626363-k', 'Pedro', 'Perez', 'cliente3@ucm.cl', '$2y$10$/IG1.odVPfrb1wXauGNT7.RIMMdaEDwkQdQlU1YyOkQzJy7E5FisG', 'cliente', 'hmwnwwwKFaZ6V0sEeQctBeeZRCpuhQSnBqqjdVLpvPXbXUxnjKfakxipR7Ip', '2017-10-18 21:03:40.0', '2017-10-18 21:03:40.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `patente` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capacidad` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `fk_Anuncio_Persona1_idx` (`rut`),
  ADD KEY `fk_Anuncio_Vehiculo1_idx` (`patente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`COMUNA_ID`),
  ADD KEY `COMUNA_PROVINCIA_ID` (`COMUNA_PROVINCIA_ID`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`,`medio`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_cliente`,`id_anuncio`),
  ADD KEY `fk_favoritos2_idx` (`id_anuncio`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`num_pago`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`,`id_anuncio`),
  ADD KEY `fk_fotos` (`id_anuncio`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`num_pago`,`id_anuncio`,`id_cliente`),
  ADD KEY `orden_fk2_idx` (`num_pago`),
  ADD KEY `orden_fk3_idx` (`id_cliente`),
  ADD KEY `orden_fk4_idx` (`id_secretaria`),
  ADD KEY `orden_fk1_idx` (`id_anuncio`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`rut`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`PROVINCIA_ID`),
  ADD KEY `PROVINCIA_REGION_ID` (`PROVINCIA_REGION_ID`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`REGION_ID`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`id_secretaria`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`num_pago`,`num_tarjeta`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`patente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `num_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_Anuncio_Persona1` FOREIGN KEY (`rut`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Anuncio_Vehiculo1` FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`COMUNA_PROVINCIA_ID`) REFERENCES `provincia` (`PROVINCIA_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `fk_favoritos` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favoritos2` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncio` (`id_anuncio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncio` (`id_anuncio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_fk1` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncio` (`id_anuncio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_fk2` FOREIGN KEY (`num_pago`) REFERENCES `forma_pago` (`num_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_fk3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_fk4` FOREIGN KEY (`id_secretaria`) REFERENCES `secretaria` (`id_secretaria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`PROVINCIA_REGION_ID`) REFERENCES `region` (`REGION_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `fk_secretaria` FOREIGN KEY (`id_secretaria`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `fk_tarjeta` FOREIGN KEY (`num_pago`) REFERENCES `forma_pago` (`num_pago`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
