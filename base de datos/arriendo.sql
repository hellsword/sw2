-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2017 a las 06:08:20
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

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
  `tipo_servicio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `region` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `comuna` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `forma_pago` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`id_anuncio`, `titulo`, `descripcion`, `condicion`, `rut`, `patente`, `precio_serv`, `tipo_servicio`, `id_categoria`, `region`, `provincia`, `comuna`, `forma_pago`, `total`) VALUES
(1, 'werw543453r', '<p>ewqeqweqw</p>', 1, NULL, 'wqeqwe', 23233, 'arriendo', 2, '5', '52', '5201', 1, 26450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `nombre_completo`) VALUES
(1, 'servicio_personas', 'Servicios de personas'),
(2, 'servicio_vehiculos', 'Servicios de vehículos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_vehiculo`
--

CREATE TABLE `categoria_vehiculo` (
  `cod` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria_vehiculo`
--

INSERT INTO `categoria_vehiculo` (`cod`, `nombre`) VALUES
('auto', 'Automóvil'),
('bus', 'Bus'),
('camion', 'Camión'),
('camion2', 'Camion 3/4'),
('camioneta', 'Camioneta'),
('furgon', 'Furgón');

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
(9),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `COMUNA_ID` int(5) NOT NULL DEFAULT '0',
  `COMUNA_NOMBRE` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `COMUNA_PROVINCIA_ID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`COMUNA_ID`, `COMUNA_NOMBRE`, `COMUNA_PROVINCIA_ID`) VALUES
(1101, 'Iquique', 11),
(1107, 'Alto Hospicio', 11),
(1401, 'Pozo Almonte', 14),
(1402, 'Camiña', 14),
(1403, 'Colchane', 14),
(1404, 'Huara', 14),
(1405, 'Pica', 14),
(2101, 'Antofagasta', 21),
(2102, 'Mejillones', 21),
(2103, 'Sierra Gorda', 21),
(2104, 'Taltal', 21),
(2201, 'Calama', 22),
(2202, 'Ollagüe', 22),
(2203, 'San Pedro de Atacama', 22),
(2301, 'Tocopilla', 23),
(2302, 'María Elena', 23),
(3101, 'Copiapó', 31),
(3102, 'Caldera', 31),
(3103, 'Tierra Amarilla', 31),
(3201, 'Chañaral', 32),
(3202, 'Diego de Almagro', 32),
(3301, 'Vallenar', 33),
(3302, 'Alto del Carmen', 33),
(3303, 'Freirina', 33),
(3304, 'Huasco', 33),
(4101, 'La Serena', 41),
(4102, 'Coquimbo', 41),
(4103, 'Andacollo', 41),
(4104, 'La Higuera', 41),
(4105, 'Paihuano', 41),
(4106, 'Vicuña', 41),
(4201, 'Illapel', 42),
(4202, 'Canela', 42),
(4203, 'Los Vilos', 42),
(4204, 'Salamanca', 42),
(4301, 'Ovalle', 43),
(4302, 'Combarbalá', 43),
(4303, 'Monte Patria', 43),
(4304, 'Punitaqui', 43),
(4305, 'Río Hurtado', 43),
(5101, 'Valparaíso', 51),
(5102, 'Casablanca', 51),
(5103, 'Concón', 51),
(5104, 'Juan Fernández', 51),
(5105, 'Puchuncaví', 51),
(5107, 'Quintero', 51),
(5109, 'Viña del Mar', 51),
(5201, 'Isla de Pascua', 52),
(5301, 'Los Andes', 53),
(5302, 'Calle Larga', 53),
(5303, 'Rinconada', 53),
(5304, 'San Esteban', 53),
(5401, 'La Ligua', 54),
(5402, 'Cabildo', 54),
(5403, 'Papudo', 54),
(5404, 'Petorca', 54),
(5405, 'Zapallar', 54),
(5501, 'Quillota', 55),
(5502, 'La Calera', 55),
(5503, 'Hijuelas', 55),
(5504, 'La Cruz', 55),
(5506, 'Nogales', 55),
(5601, 'San Antonio', 56),
(5602, 'Algarrobo', 56),
(5603, 'Cartagena', 56),
(5604, 'El Quisco', 56),
(5605, 'El Tabo', 56),
(5606, 'Santo Domingo', 56),
(5701, 'San Felipe', 57),
(5702, 'Catemu', 57),
(5703, 'Llay Llay', 57),
(5704, 'Panquehue', 57),
(5705, 'Putaendo', 57),
(5706, 'Santa María', 57),
(5801, 'Quilpué', 58),
(5802, 'Limache', 58),
(5803, 'Olmué', 58),
(5804, 'Villa Alemana', 58),
(6101, 'Rancagua', 61),
(6102, 'Codegua', 61),
(6103, 'Coinco', 61),
(6104, 'Coltauco', 61),
(6105, 'Doñihue', 61),
(6106, 'Graneros', 61),
(6107, 'Las Cabras', 61),
(6108, 'Machalí', 61),
(6109, 'Malloa', 61),
(6110, 'Mostazal', 61),
(6111, 'Olivar', 61),
(6112, 'Peumo', 61),
(6113, 'Pichidegua', 61),
(6114, 'Quinta de Tilcoco', 61),
(6115, 'Rengo', 61),
(6116, 'Requínoa', 61),
(6117, 'San Vicente', 61),
(6201, 'Pichilemu', 62),
(6202, 'La Estrella', 62),
(6203, 'Litueche', 62),
(6204, 'Marchihue', 62),
(6205, 'Navidad', 62),
(6206, 'Paredones', 62),
(6301, 'San Fernando', 63),
(6302, 'Chépica', 63),
(6303, 'Chimbarongo', 63),
(6304, 'Lolol', 63),
(6305, 'Nancagua', 63),
(6306, 'Palmilla', 63),
(6307, 'Peralillo', 63),
(6308, 'Placilla', 63),
(6309, 'Pumanque', 63),
(6310, 'Santa Cruz', 63),
(7101, 'Talca', 71),
(7102, 'Constitución', 71),
(7103, 'Curepto', 71),
(7104, 'Empedrado', 71),
(7105, 'Maule', 71),
(7106, 'Pelarco', 71),
(7107, 'Pencahue', 71),
(7108, 'Río Claro', 71),
(7109, 'San Clemente', 71),
(7110, 'San Rafael', 71),
(7201, 'Cauquenes', 72),
(7202, 'Chanco', 72),
(7203, 'Pelluhue', 72),
(7301, 'Curicó', 73),
(7302, 'Hualañé', 73),
(7303, 'Licantén', 73),
(7304, 'Molina', 73),
(7305, 'Rauco', 73),
(7306, 'Romeral', 73),
(7307, 'Sagrada Familia', 73),
(7308, 'Teno', 73),
(7309, 'Vichuquén', 73),
(7401, 'Linares', 74),
(7402, 'Colbún', 74),
(7403, 'Longaví', 74),
(7404, 'Parral', 74),
(7405, 'Retiro', 74),
(7406, 'San Javier', 74),
(7407, 'Villa Alegre', 74),
(7408, 'Yerbas Buenas', 74),
(8101, 'Concepción', 81),
(8102, 'Coronel', 81),
(8103, 'Chiguayante', 81),
(8104, 'Florida', 81),
(8105, 'Hualqui', 81),
(8106, 'Lota', 81),
(8107, 'Penco', 81),
(8108, 'San Pedro de la Paz', 81),
(8109, 'Santa Juana', 81),
(8110, 'Talcahuano', 81),
(8111, 'Tomé', 81),
(8112, 'Hualpén', 81),
(8201, 'Lebu', 82),
(8202, 'Arauco', 82),
(8203, 'Cañete', 82),
(8204, 'Contulmo', 82),
(8205, 'Curanilahue', 82),
(8206, 'Los Álamos', 82),
(8207, 'Tirúa', 82),
(8301, 'Los Ángeles', 83),
(8302, 'Antuco', 83),
(8303, 'Cabrero', 83),
(8304, 'Laja', 83),
(8305, 'Mulchén', 83),
(8306, 'Nacimiento', 83),
(8307, 'Negrete', 83),
(8308, 'Quilaco', 83),
(8309, 'Quilleco', 83),
(8310, 'San Rosendo', 83),
(8311, 'Santa Bárbara', 83),
(8312, 'Tucapel', 83),
(8313, 'Yumbel', 83),
(8314, 'Alto Biobío', 83),
(8401, 'Chillán', 163),
(8402, 'Bulnes', 163),
(8403, 'Cobquecura', 162),
(8404, 'Coelemu', 162),
(8405, 'Coihueco', 163),
(8406, 'Chillán Viejo', 163),
(8407, 'El Carmen', 163),
(8408, 'Ninhue', 162),
(8409, 'Ñiquén', 161),
(8410, 'Pemuco', 163),
(8411, 'Pinto', 163),
(8412, 'Portezuelo', 162),
(8413, 'Quillón', 162),
(8414, 'Quirihue', 162),
(8415, 'Ránquil', 162),
(8416, 'San Carlos', 161),
(8417, 'San Fabián', 161),
(8418, 'San Ignacio', 163),
(8419, 'San Nicolás', 161),
(8420, 'Treguaco', 162),
(8421, 'Yungay', 163),
(9101, 'Temuco', 91),
(9102, 'Carahue', 91),
(9103, 'Cunco', 91),
(9104, 'Curarrehue', 91),
(9105, 'Freire', 91),
(9106, 'Galvarino', 91),
(9107, 'Gorbea', 91),
(9108, 'Lautaro', 91),
(9109, 'Loncoche', 91),
(9110, 'Melipeuco', 91),
(9111, 'Nueva Imperial', 91),
(9112, 'Padre las Casas', 91),
(9113, 'Perquenco', 91),
(9114, 'Pitrufquén', 91),
(9115, 'Pucón', 91),
(9116, 'Saavedra', 91),
(9117, 'Teodoro Schmidt', 91),
(9118, 'Toltén', 91),
(9119, 'Vilcún', 91),
(9120, 'Villarrica', 91),
(9121, 'Cholchol', 91),
(9201, 'Angol', 92),
(9202, 'Collipulli', 92),
(9203, 'Curacautín', 92),
(9204, 'Ercilla', 92),
(9205, 'Lonquimay', 92),
(9206, 'Los Sauces', 92),
(9207, 'Lumaco', 92),
(9208, 'Purén', 92),
(9209, 'Renaico', 92),
(9210, 'Traiguén', 92),
(9211, 'Victoria', 92),
(10101, 'Puerto Montt', 101),
(10102, 'Calbuco', 101),
(10103, 'Cochamó', 101),
(10104, 'Fresia', 101),
(10105, 'Frutillar', 101),
(10106, 'Los Muermos', 101),
(10107, 'Llanquihue', 101),
(10108, 'Maullín', 101),
(10109, 'Puerto Varas', 101),
(10201, 'Castro', 102),
(10202, 'Ancud', 102),
(10203, 'Chonchi', 102),
(10204, 'Curaco de Vélez', 102),
(10205, 'Dalcahue', 102),
(10206, 'Puqueldón', 102),
(10207, 'Queilén', 102),
(10208, 'Quellón', 102),
(10209, 'Quemchi', 102),
(10210, 'Quinchao', 102),
(10301, 'Osorno', 103),
(10302, 'Puerto Octay', 103),
(10303, 'Purranque', 103),
(10304, 'Puyehue', 103),
(10305, 'Río Negro', 103),
(10306, 'San Juan de la Costa', 103),
(10307, 'San Pablo', 103),
(10401, 'Chaitén', 104),
(10402, 'Futaleufú', 104),
(10403, 'Hualaihué', 104),
(10404, 'Palena', 104),
(11101, 'Coyhaique', 111),
(11102, 'Lago Verde', 111),
(11201, 'Aysén', 112),
(11202, 'Cisnes', 112),
(11203, 'Guaitecas', 112),
(11301, 'Cochrane', 113),
(11302, 'O\'Higgins', 113),
(11303, 'Tortel', 113),
(11401, 'Chile Chico', 114),
(11402, 'Río Ibáñez', 114),
(12101, 'Punta Arenas', 121),
(12102, 'Laguna Blanca', 121),
(12103, 'Río Verde', 121),
(12104, 'San Gregorio', 121),
(12201, 'Cabo de Hornos', 122),
(12202, 'Antártica', 122),
(12301, 'Porvenir', 123),
(12302, 'Primavera', 123),
(12303, 'Timaukel', 123),
(12401, 'Natales', 124),
(12402, 'Torres del Paine', 124),
(13101, 'Santiago', 131),
(13102, 'Cerrillos', 131),
(13103, 'Cerro Navia', 131),
(13104, 'Conchalí', 131),
(13105, 'El Bosque', 131),
(13106, 'Estación Central', 131),
(13107, 'Huechuraba', 131),
(13108, 'Independencia', 131),
(13109, 'La Cisterna', 131),
(13110, 'La Florida', 131),
(13111, 'La Granja', 131),
(13112, 'La Pintana', 131),
(13113, 'La Reina', 131),
(13114, 'Las Condes', 131),
(13115, 'Lo Barnechea', 131),
(13116, 'Lo Espejo', 131),
(13117, 'Lo Prado', 131),
(13118, 'Macul', 131),
(13119, 'Maipú', 131),
(13120, 'Ñuñoa', 131),
(13121, 'Pedro Aguirre Cerda', 131),
(13122, 'Peñalolén', 131),
(13123, 'Providencia', 131),
(13124, 'Pudahuel', 131),
(13125, 'Quilicura', 131),
(13126, 'Quinta Normal', 131),
(13127, 'Recoleta', 131),
(13128, 'Renca', 131),
(13129, 'San Joaquín', 131),
(13130, 'San Miguel', 131),
(13131, 'San Ramón', 131),
(13132, 'Vitacura', 131),
(13201, 'Puente Alto', 132),
(13202, 'Pirque', 132),
(13203, 'San José de Maipo', 132),
(13301, 'Colina', 133),
(13302, 'Lampa', 133),
(13303, 'Tiltil', 133),
(13401, 'San Bernardo', 134),
(13402, 'Buin', 134),
(13403, 'Calera de Tango', 134),
(13404, 'Paine', 134),
(13501, 'Melipilla', 135),
(13502, 'Alhué', 135),
(13503, 'Curacaví', 135),
(13504, 'María Pinto', 135),
(13505, 'San Pedro', 135),
(13601, 'Talagante', 136),
(13602, 'El Monte', 136),
(13603, 'Isla de Maipo', 136),
(13604, 'Padre Hurtado', 136),
(13605, 'Peñaflor', 136),
(14101, 'Valdivia', 141),
(14102, 'Corral', 141),
(14103, 'Lanco', 141),
(14104, 'Los Lagos', 141),
(14105, 'Máfil', 141),
(14106, 'Mariquina', 141),
(14107, 'Paillaco', 141),
(14108, 'Panguipulli', 141),
(14201, 'La Unión', 142),
(14202, 'Futrono', 142),
(14203, 'Lago Ranco', 142),
(14204, 'Río Bueno', 142),
(15101, 'Arica', 151),
(15102, 'Camarones', 151),
(15201, 'Putre', 152),
(15202, 'General Lagos', 152);

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
(2, 'facebook', 'https://www.facebook.com/dsa'),
(2, 'telefono', '943543534543'),
(5, 'facebook', 'https://www.facebook.com/ccontreras'),
(5, 'telefono', '887323273283'),
(7, 'facebook', 'https://www.facebook.com/apatamala'),
(7, 'telefono', '8556y3534543'),
(8, 'facebook', 'https://www.facebook.com/scasdsd'),
(8, 'telefono', '94238428374823'),
(9, 'facebook', 'https://www.facebook.com/pperez'),
(9, 'telefono', '9321931298424'),
(11, 'facebook', 'https://www.facebook.com/wre'),
(11, 'telefono', '887323273283'),
(12, 'facebook', 'https://www.facebook.com/rewr'),
(12, 'telefono', '8556y3534543'),
(13, 'facebook', 'https://www.facebook.com/qweqw'),
(13, 'telefono', '8435245r3242342'),
(14, 'facebook', 'https://www.facebook.com/rtet'),
(14, 'telefono', '98327423472333'),
(15, 'facebook', 'https://www.facebook.com/dsa'),
(15, 'telefono', '94238428374823'),
(16, 'facebook', 'https://www.facebook.com/treter'),
(16, 'telefono', '94238428374823'),
(17, 'facebook', 'https://www.facebook.com/scsdadasdsd'),
(17, 'telefono', '94382748236464'),
(18, 'facebook', 'https://www.facebook.com/rwerwe'),
(18, 'telefono', '543534534535455'),
(19, 'facebook', 'https://www.facebook.com/qweqwq'),
(19, 'telefono', '333543634543543'),
(20, 'facebook', 'https://www.facebook.com/zzzdfhfdhd'),
(20, 'telefono', '98554473747347'),
(21, 'facebook', 'https://www.facebook.com/h1'),
(21, 'telefono', '567888456'),
(22, 'facebook', 'https://www.facebook.com/h2'),
(22, 'telefono', '34654654'),
(23, 'facebook', 'https://www.facebook.com/h3'),
(23, 'telefono', '46546456464'),
(24, 'facebook', 'https://www.facebook.com/h4'),
(24, 'telefono', '46456445747'),
(25, 'facebook', 'https://www.facebook.com/h5'),
(25, 'telefono', '64564564564'),
(26, 'facebook', 'https://www.facebook.com/h6'),
(26, 'telefono', '645475657474'),
(27, 'facebook', 'https://www.facebook.com/h7'),
(27, 'telefono', '46485686746'),
(28, 'facebook', 'https://www.facebook.com/h8'),
(28, 'telefono', '44567484636'),
(29, 'facebook', 'https://www.facebook.com/h9'),
(29, 'telefono', '48647474745'),
(30, 'facebook', 'https://www.facebook.com/h9'),
(30, 'telefono', '87978987987'),
(31, 'facebook', 'https://www.facebook.com/hx'),
(31, 'telefono', '938423747347');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `id_anuncio` int(11) NOT NULL,
  `cupon` mediumblob NOT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`id_anuncio`, `cupon`, `id_cliente`) VALUES
(1, 0x4a564245526930784c6a4d4b4d5341774947396961676f385043417656486c775a53417651324630595778765a776f765433563062476c755a584d674d6941774946494b4c3142685a32567a49444d674d4342534944342b436d56755a47396961676f794944416762324a71436a7738494339556558426c49433950645852736157356c6379417651323931626e51674d43412b5067706c626d5276596d6f4b4d7941774947396961676f385043417656486c775a5341765547466e5a584d4b4c3074705a484d67577a59674d434253436c304b4c304e76645735304944454b4c314a6c63323931636d4e6c6379413850416f7655484a7659314e6c644341304944416755676f76526d3975644341385043414b4c305978494467674d434253436939474d6941354944416755676f2b50676f7657453969616d566a644341385043414b4c306b78494445774944416755676f76535449674d5445674d434253436a342b436a342b4369394e5a57527059554a76654342624d4334774d4441674d4334774d4441674e6a45794c6a41774d4341334f5449754d44417758516f67506a344b5a57356b62324a71436a51674d434276596d6f4b57793951524559674c31526c654851674c306c745957646c51794264436d56755a47396961676f314944416762324a71436a773843693951636d396b64574e6c6369416f2f7638415a414276414730416341426b414759414941413841446b415a514268414467414e51417941474d414e41412b414341414b77416741454d41554142454145597043693944636d566864476c76626b5268644755674b4551364d6a41784e7a45784d6a6b784e7a41344d5467744d444d6e4d44416e4b516f765457396b524746305a53416f52446f794d4445334d5445794f5445334d4467784f4330774d7963774d436370436a342b436d56755a47396961676f324944416762324a71436a7738494339556558426c494339515957646c4369394e5a57527059554a76654342624d4334774d4441674d4334774d4441674e6a45794c6a41774d4341334f5449754d44417758516f76554746795a57353049444d674d43425343693944623235305a573530637941334944416755676f2b5067706c626d5276596d6f4b4e7941774947396961676f3850434176526d6c736447567949433947624746305a55526c5932396b5a516f76544756755a33526f494459774d79412b5067707a64484a6c5957304b654a783956454675327a415176507356653279426869457055684a376378796c534247377271506b557652415337537251694956305171516f6f2f71332f71427275773074516f367347414268475a6e646e613445306f6f705844383332306e467a6c45676c4157513849556f55704358734c354651654f70354276414c36386d6658746277756c676158654f6e6a3746664b506b4f56376145783448454f63526953577951484b67504558364f6f7568396e4e64626249732f664851495a6b556f6b786b68386a5755496931434346504974446c48464d42475542796f56723170304a7335304558645736634c4179316d783136554a385168456d5a414136746230744b68636d50496d6136615a43553176646165674d766e5a425669614a536c576f793138776330336275625732752f2b366a6447326849374259323970536d556b564942527170516b55525379794254664e4a696d3869673853446a436a6769354f6d50736a464f5768436854526b515353732f4d3255646a4b7a646b727a4f46376b74646e43512f726a4969763831573939664c36596566634446647a44374237585352547865583253716b526151594f78616f4d686a6547377654787967564552727a56314358666265586a423355384a795534774b636f6d586974517233426a464e68637968674d69496f594a5177464a4651307050666a383333766967744a4d51686c506c7036597156457777596f474f35735a362f58326332623867764b41736d4c36737872757933536642397362764f7566426d2b3678516b4d39744b3644787053487042523936367a78674539764e57787741485656366849656567506f59346433484f5a33382b7a714a7373504e2f436c5a4569545a43514e78724f6f683745592f7735385a5233794e6d324e394d344344727574395939427a71617956656d51647a6a6353304e684f774e50794f7147466a5430753671474a2f4139364d664b75384d357450323672677055523061694473733655704b6b61524a59316e4f485359476c3863372f632f686877714f557947487834792b522b2b332f334239504f524653514e48412b545748537a66352f41654c76592b7a436d56755a484e30636d56686251706c626d5276596d6f4b4f4341774947396961676f385043417656486c775a534176526d397564416f765533566964486c775a53417656486c775a54454b4c303568625755674c3059784369394359584e6c526d39756443417656476c745a584d74556d39745957344b4c3056755932396b6157356e4943395861573542626e4e705257356a62325270626d634b506a344b5a57356b62324a71436a6b674d434276596d6f4b504477674c315235634755674c305a76626e514b4c314e31596e5235634755674c315235634755784369394f5957316c494339474d676f76516d467a5a555a76626e51674c3152706257567a4c554a766247514b4c3056755932396b6157356e4943395861573542626e4e705257356a62325270626d634b506a344b5a57356b62324a71436a45774944416762324a71436a7738436939556558426c4943395954324a715a574e304369395464574a306558426c4943394a6257466e5a516f7656326c6b644767674d7a4534436939495a576c6e614851674d54417743693947615778305a5849674c305a735958526c5247566a6232526c436939455a574e765a47565159584a74637941385043417655484a6c5a476c6a64473979494445314943394462327876636e4d674d53417651323973645731756379417a4d5467674c304a7064484e515a584a44623231776232356c626e51674f44342b4369394462327876636c4e7759574e6c494339455a585a7059325648636d4635436939436158527a5547567951323974634739755a5735304944674b4c30786c626d6430614341794d6a672b5067707a64484a6c5957304b654a7a743045454a4144414d774d44364e37324b754d636f354253457a4175593377473374592b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a37535074492b306a797a7a71384c2b436d56755a484e30636d56686251706c626d5276596d6f4b4d5445674d434276596d6f4b5044774b4c315235634755674c316850596d706c5933514b4c314e31596e5235634755674c306c745957646c43693958615752306143417a4d54674b4c30686c6157646f644341784d44414b4c314e4e59584e72494445774944416755676f76526d6c736447567949433947624746305a55526c5932396b5a516f765247566a6232526c5547467962584d67504477674c3142795a57527059335276636941784e5341765132397362334a7a49444d674c304e7662485674626e4d674d7a4534494339436158527a5547567951323974634739755a5735304944672b50676f765132397362334a546347466a5a5341765247563261574e6c556b6443436939436158527a5547567951323974634739755a5735304944674b4c30786c626d6430614341784d7a4930506a344b633352795a574674436e696337647a6464617334474958687a5a515463696461735575414d754a544269724274494c75677474684c6f534a4d514c62435a7973622b5a3962704c6c434345534e7670424b356b6b535833666179724c7376487a2b5032745a7a352f74637850327642386d5732763853666e2b6b6e353332726e656a314c5a66376d6454312f726c662f46742b373976337576583845774343694335684564414754694335674574454654434b3667456c45467a434a3641496d455633414a4b494c6d455230415a4f494c6d41533051564d49727141535551584d496e6f416959525863416b6f677559524851426b34677559424c5242557769756f424a52426377696567434a684664774353694335684564414754694335674574454654434b3667456c45467a434a3641496d455633414a4b494c6d455230415a4f494c6d41533051564d49727141535551584d496e6f416959525863416b6f677559524851426b34677559424c5242557769756f424a52426377696567434a684664774353694335684564414754694335674574454654434b3667456c45467a434a3641496d455633414a4b494c6d455230415a4f494c6d41533051564d49727141535551584d496e6f416959525863416b6f677559524851426b34677559424c5242557769756f424a52426377696567434a684664774353694335684564414754737237766637734e4146354772777559524851426b34677559424c5233556e7737316d575a5657542b6d46545a517653355738714842562f776e65613152525a5669575044453378735035706d5851396b2f4c484c4d734b662f6c47532f46496a7a31307459752f333050647a6e39364c74662b4a496637493972445574457955666d4b3462794a6f394b6e7947386233395a357167586e78624f31352f67376348583355697678464b4b37692f596779626c38346359396c354c63655a366747506a4a496463413349576b4c525070576d335379593178713150746d5a7a332b756a3561755173397465474c54772b76683550524863585248635062526e37323657497873395071534e50626e4c49454b466b50495a75634b58666d315969355756356d4e635736334833655935483566576b7a44534538516d56534f5a776244776430643046633930644e4e354c4c6e6675554a5a534f5072306e504174386246376b79536e495776685641584a6e556f334c79705872672b3872345a4b7a6e332f5762714c4a4e32644f4853535a6d6434632f476a454d2f31326664395737354e6a67767053577a777879716f624439727879783350372f3937506750716d4e58302f663964513535337a454f766536734b37337659786636772b2b4c465434335134364e6d5532385233576348732b75347562794e32382f766844647a51336a7a4f474f6a68336a33597930572b6b746234655862546b2f396b66612b7144455844645a63696e6b342f41373966534a452b44726f796f397a4d596d474442764c507a785158496637727243584a615375756d59755675727748646a3253424a6238746c582b5a3069563865434d6569366c5465704452643746526b377a6558316c54464d656a51316f744c3474674d30643157434532514649376a2b382f4353314c777339656b7152586d747334566a7358316e617154704f61353937657a6438577056385268386d586845767837566a51717a33326466477138335377796e3653754b6f35656b69362b4f48726c3962676b4c726c4e6e7a7559494c7162616e7931304b4f4730327978366a4c76306c7a35325a5a53614d4b5133567a4c7130486674396958586e79524656586e366e4571753137505231744b616b4b515168785a644656782f2f6749565a356c57655533617a346b6f7275743048676c75744d343566502b7268744d72544172786e55594d7a7633346154676c7a726569792b79624269794875346e734b6e73446431677572716d7976497135485537766a522b6768763361547836766a776370654d31653079672f362f69485a2f61717854486b49664a396f624543764e4e4a554d517538516d6a62466b664b2b62476e6776746e427038576e59734c47346e6c7776584e72365168724c564473697574754a69386e70757a3847386e6f544c2b366d756e5a334e35574d55386470314d654f386157396b454e30303775705a763332354d6a5968302f4b5048353231477a4a324133523363714464356a7831682f75386764624b653754754e6b65356e5376757a6f382f75705230337559563137383075767569726e75566f4c767044793537556d53334c6c32557667543174654c33626d39376d532b2f624366423879644569556653633131472f2f6341704972502f756231574d70767238394d346639486679444738416b656c33414a4b494c6d455230415a4f494c6d445376326f417057494b5a57356b633352795a574674436d56755a47396961677034636d566d436a41674d54494b4d4441774d4441774d4441774d4341324e54557a4e53426d49416f774d4441774d4441774d444135494441774d44417749473467436a41774d4441774d4441774e7a51674d4441774d4441676269414b4d4441774d4441774d4445794d4341774d4441774d43427549416f774d4441774d4441774d7a4979494441774d44417749473467436a41774d4441774d44417a4e546b674d4441774d4441676269414b4d4441774d4441774d4455784f4341774d4441774d43427549416f774d4441774d4441774e6a4978494441774d44417749473467436a41774d4441774d4445794f5459674d4441774d4441676269414b4d4441774d4441774d5451774e5341774d4441774d43427549416f774d4441774d4441784e54457a494441774d44417749473467436a41774d4441774d4445354f4459674d4441774d4441676269414b64484a686157786c63676f3850416f7655326c365a5341784d676f76556d3976644341784944416755676f765357356d627941314944416755676f7653555262504759334d6a4d79596d4e694d6d566c596d457a4d7a55304f5445344f54426b597a51774d6a4d304e445177506a786d4e7a497a4d6d4a6a596a4a6c5a574a684d7a4d314e446b784f446b775a474d304d44497a4e4451304d443564436a342b436e4e3059584a3065484a6c5a676f7a4e5459354369556c5255394743673d3d, 2);

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
  `fecha_pago` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`num_pago`, `modo`, `fecha_pago`) VALUES
(1, 'efectivo', '2017-12-09 01:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `foto` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto`, `id_anuncio`, `foto`) VALUES
(0, 1, 0x2f75706c6f6164732f69526a50434d4841486d6c6657663675616a66474a4e5375643356564f4356536c38575646345179384971376d71425850492d6e697373616e5f6164765f315f6774725f77616c6c70617065725f62795f73757065726765636b6f39392d6439646f79676d2e6a7067),
(1, 1, 0x2f75706c6f6164732f56777a647a3944456734796676767a6d313166636c4f4d33423078383875646577766159594f73324f676b784b6d5857306b2d566f6c6b73776167656e2d476f6c662d4754492d626c61636b2d636f6c6f722d6361722d726f61642d73756e7365745f3136303078313230302e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `num_pago` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_venc` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `precio_uni` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `duracion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_secretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`num_pago`, `id_anuncio`, `id_cliente`, `fecha`, `fecha_venc`, `precio_uni`, `duracion`, `id_secretaria`) VALUES
(1, 1, 2, '2017-12-09', '2018-05-09', '5290', '5', 3);

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
(3, 0),
(5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id_categoria` int(11) NOT NULL,
  `sub_categoria` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id_categoria`, `sub_categoria`, `nombre_completo`) VALUES
(1, 'mecanico', 'Mecánico'),
(1, 'otros_per', 'Otros servicios '),
(2, 'arriendo', 'Arriendo de vehículo'),
(2, 'transporte', 'Transportes/Mudanzas');

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
(1, '19.344.212-2', 'Boris', 'Mora', 'admin@ucm.cl', '$2y$10$aIZ6WaeH7CgP/EjyxmS3dOr20aG9cRsgnUMiXrBlyUZgBI80R6WxC', 'admin', 'S1TDcLZ3O9Oknz1y92dQqSfO67x9rkWtnbOKNkpUZrIpVsIlJ9U0XVRDz7Ft', '2017-10-17 00:51:12.0', '2017-10-17 00:51:12.0'),
(2, '17.324.545-6', 'Rodrigo', 'Rodirguez', 'cliente@ucm.cl', '$2y$10$8fxHUBybt8ux4zVJ7eQmHOuZvLFJbilnnEMT65ei2Lw8dtqqN/qCS', 'cliente', 'Cmpw3GNzFzUrIlFfqPR3sqNgLNDoipx2CGlZhdMnzsrahLW79qEkOpeBSVxO', '2017-10-17 00:54:59.0', '2017-10-17 00:54:59.0'),
(3, '18938323-5', 'Fernanda', 'Fernandez', 'secretaria@ucm.cl', '$2y$10$tAoGISY0s4T0jikX4JCQpOBEGMDODSpmC34bDsMdenNU9eLcQ6aBy', 'secretaria', 'MtgB744W6imLpgyvaWXQpHpKWKvBSY2YfXYNA5RrxwOdAaUW45IjX5W6qmpK', '2017-10-17 00:55:50.0', '2017-10-17 00:55:50.0'),
(5, '172232323-2', 'Constanza', 'Contreras', 'secretaria2@ucm.cl', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'secretaria', 'tQonfX7dlIlMjBe1lHnjnBJGJCxj65L5hXRH0ocYasE74eSvUVhu6gzKEO92', '2017-10-18 07:03:02.0', '2017-10-18 07:03:02.0'),
(7, '1832832324-5', 'Alfonso', 'Patamala', 'cliente4@ucm.cl', '$2y$10$1Nx0CdeN4yMYKEg6vCyjgev0PxA6N63iIXsSUh8b8uKpOfJQoGkMa', 'cliente', NULL, '2017-10-18 08:04:06.0', '2017-10-18 08:04:06.0'),
(8, '1734234234-5', 'Susana', 'Castillo', 'cliente2@ucm.cl', '$2y$10$oy5hmF1Fe/6qo5By742VweZrk.v9wvF5MOO7XqR0tgPIFSvJ0mz8u', 'cliente', '9BBXcyxnO5W09TEknEC8qhnMhiZSGx8tde67EqSBFT1byGo4H3Oa12SkLsQu', '2017-10-18 21:01:18.0', '2017-10-18 21:01:18.0'),
(9, '173626363-k', 'Pedro', 'Perez', 'cliente3@ucm.cl', '$2y$10$/IG1.odVPfrb1wXauGNT7.RIMMdaEDwkQdQlU1YyOkQzJy7E5FisG', 'cliente', 'aTIok9g6YbM8uVmYehM0apewFVMCAGuTtn1bJbNeGLTawsdkuWEC3eLEO6of', '2017-10-18 21:03:40.0', '2017-10-18 21:03:40.0'),
(11, '172232323-2', 'DANIEL EDUARDO', 'ALARCON CHAMBLES', 'daniel.alarcon.ch@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(12, '18573726-8', 'JUAN CARLOS', 'ALARCON VILLAMAN', 'j.alarconvillaman@outlook.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(13, '18575902-4', 'CARLOS ALBERTO', 'CARRERA ZUNIGA', 'carlosacz1994@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(14, '18692842-3', 'FRANCISCO JAVIER', 'DE LA FUENTE OPAZO', 'fco_delafuente_@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(15, '18656310-7', 'NICOLAS ANDRE', 'DURAN ENCINA', 'nicoooduran@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(16, '18344193-0', 'CARLOS ANDRES', 'FARFAN RETAMAL', 'lobo_100_solitario@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(17, '17322605-5', 'SANTIAGO ANDRES', 'FUENTES BENAVIDES', 'stgo90@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(18, '18329408-3', 'AMARU DAVID', 'GAJARDO MORALES', 'adgajardom@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(19, '18893801-9', 'SEBASTIAN IGNACIO', 'GARRIDO CACERES', 'sgarridocaceres@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(20, '19105900-K', 'EDUARDO ISRAEL', 'GONZALEZ TRONCOSO', 'israxx2@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(21, '18779791-8', 'ALEX FELIPE', 'HERRERA SARAVIA', 'wizwizcl@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(22, '18781115-5 ', 'MANUEL TOMAS', 'IBANEEZ BARRIOS', 'tomas.ib94@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(23, '19044801-0', 'CARLOS FELIPE', 'INOSTROZA BRAVO', 'krlos_erd@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(24, '18966705-1', 'IGNACIO JAVIER', 'LILLO TAPIA', 'lillo@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(25, '18877975-1', 'JOSE MATIAS', 'MANRIQUEZ TRONCOSO', 'josemtroncoso95@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(26, '17186568-9', 'MARTA VERONICA', 'MELLA VILLALOBOS', 'martii_mvi@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(27, '18780321-7', 'FUAD RICARDO', 'NAZAL JAQUE', 'fuad@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(28, '19106509-3', 'CARLOS MATIAS', 'ORELLANA FUENTES', 'carlosmof15@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(29, '118576067-7', 'RICARDO MATIAS', 'RIFFO ARAYA', 'rr.ricardo.riffo@gmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(30, '19105288-9', 'ESTEFANIA ANDREA', 'SILVA MOLINA', 'fanny.andrea@outlook.es', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0'),
(31, '18980990-5', 'JAIME MAURICIO', 'VALENZUELA MUNOZ', 'jiimy_94@hotmail.com', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'cliente', NULL, '2017-11-29 07:03:02.0', '2017-11-29 07:03:02.0');

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
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`patente`, `categoria`, `capacidad`) VALUES
('wqeqwe', 'auto', 'wqeqwe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `fk_Anuncio_Persona1_idx` (`rut`),
  ADD KEY `fk_Anuncio_Vehiculo1_idx` (`patente`),
  ADD KEY `fk_categoria` (`id_categoria`,`tipo_servicio`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categoria_vehiculo`
--
ALTER TABLE `categoria_vehiculo`
  ADD PRIMARY KEY (`cod`);

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
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`id_anuncio`);

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
-- Indices de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id_categoria`,`sub_categoria`);

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
  ADD PRIMARY KEY (`patente`),
  ADD KEY `fk_categoria_vehiculo` (`categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `num_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_Anuncio_Persona1` FOREIGN KEY (`rut`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Anuncio_Vehiculo1` FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`,`tipo_servicio`) REFERENCES `sub_categorias` (`id_categoria`, `sub_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD CONSTRAINT `fk_sub_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `fk_tarjeta` FOREIGN KEY (`num_pago`) REFERENCES `forma_pago` (`num_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_categoria_vehiculo` FOREIGN KEY (`categoria`) REFERENCES `categoria_vehiculo` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
