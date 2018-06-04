-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2018 a las 06:32:14
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `idaudit` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `evento` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `tabla` varchar(20) COLLATE utf32_spanish_ci NOT NULL,
  `idregistro` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `oldval` varchar(500) COLLATE utf32_spanish_ci NOT NULL,
  `newval` varchar(500) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`idaudit`, `iduser`, `evento`, `tabla`, `idregistro`, `fechahora`, `oldval`, `newval`) VALUES
(1, 1, 'insert', 'turno', 1, '2018-03-28 11:18:31', 'null', 'idturno:1 idpaciente:3, idprofesional:5 idprestacion:1 idestado:1 observaciones: sd'),
(2, 1, 'insert', 'turno', 2, '2018-03-28 11:21:29', 'null', 'idturno:2 idpaciente:3, idprofesional:5 idprestacion:1 idestado:1 observaciones: xaxcad'),
(3, 1, 'insert', 'turno', 3, '2018-03-28 12:00:24', 'null', 'idturno:3 idpaciente:3, idprofesional:5 idprestacion:1 idestado:1 observaciones: sd'),
(4, 1, 'insert', 'turno', 4, '2018-03-28 12:05:29', 'null', 'idturno:4 idpaciente:3, idprofesional:5 idprestacion:1 idestado:1 observaciones: df'),
(5, 1, 'insert', 'turno', 5, '2018-03-30 17:22:47', 'null', 'idturno:5 idpaciente:3, idprofesional:5 idprestacion:1 idestado:1 observaciones: sd'),
(6, 1, 'insert', 'turno', 6, '2018-03-31 21:43:14', 'null', 'idturno:6 idpaciente:3, idprofesional:5 idprestacion:1 idestado:1 observaciones: sd'),
(7, 1, 'insert', 'turno', 7, '2018-03-31 21:43:51', 'null', 'idturno:7 idpaciente:4, idprofesional:5 idprestacion:1 idestado:1 observaciones: sd'),
(8, 1, 'insert', 'turno', 8, '2018-04-09 14:59:54', 'null', 'idturno:8 idpaciente:4, idprofesional:5 idprestacion:2 idestado:1 observaciones: sd'),
(9, 1, 'insert', 'turno', 9, '2018-04-09 15:04:00', 'null', 'idturno:9 idpaciente:4, idprofesional:5 idprestacion:4 idestado:1 observaciones: sd'),
(10, 2, 'insert', 'turno', 1, '2018-04-23 09:12:09', 'null', 'idturno:1 idpaciente:3, idprofesional:6 idprestacion:100 idestado:1 observaciones: sd'),
(11, 2, 'insert', 'turno', 2, '2018-04-23 09:12:38', 'null', 'idturno:2 idpaciente:4, idprofesional:6 idprestacion:100 idestado:1 observaciones: sd'),
(12, 2, 'insert', 'turno', 3, '2018-04-23 09:51:29', 'null', 'idturno:3 idpaciente:4, idprofesional:6 idprestacion:100 idestado:1 observaciones: sd'),
(13, 2, 'insert', 'turno', 4, '2018-04-24 18:12:21', 'null', 'idturno:4 idpaciente:3, idprofesional:5 idprestacion:100 idestado:1 observaciones: sd'),
(14, 2, 'insert', 'turno', 5, '2018-04-25 21:39:09', 'null', 'idturno:5 idpaciente:3, idprofesional:6 idprestacion:100 idestado:1 observaciones: hjhjkh'),
(15, 2, 'insert', 'turno', 6, '2018-05-22 16:40:32', 'null', 'idturno:6 idpaciente:4, idprofesional:5 idprestacion:100 idestado:1 observaciones: sd'),
(16, 2, 'insert', 'turno', 7, '2018-05-22 16:41:14', 'null', 'idturno:7 idpaciente:4, idprofesional:5 idprestacion:100 idestado:1 observaciones: sd'),
(17, 2, 'insert', 'turno', 8, '2018-05-22 17:04:00', 'null', 'idturno:8 idpaciente:4, idprofesional:5 idprestacion:100 idestado:1 observaciones: sd'),
(18, 2, 'insert', 'turno', 9, '2018-05-22 17:11:01', 'null', 'idturno:9 idpaciente:3, idprofesional:6 idprestacion:100 idestado:1 observaciones: sd'),
(19, 2, 'insert', 'turno', 10, '2018-05-22 18:32:28', 'null', 'idturno:10 idpaciente:3, idprofesional:6 idprestacion:56 idestado:1 observaciones: sd'),
(20, 2, 'insert', 'turno', 11, '2018-05-22 18:37:11', 'null', 'idturno:11 idpaciente:4, idprofesional:6 idprestacion:100 idestado:1 observaciones: '),
(21, 2, 'insert', 'turno', 12, '2018-05-22 18:40:20', 'null', 'idturno:12 idpaciente:3, idprofesional:5 idprestacion:100 idestado:1 observaciones: '),
(22, 2, 'insert', 'turno', 13, '2018-05-22 18:41:28', 'null', 'idturno:13 idpaciente:4, idprofesional:6 idprestacion:100 idestado:1 observaciones: ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idciudad` int(4) NOT NULL,
  `idprovincia` smallint(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `cp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `idprovincia`, `nombre`, `cp`) VALUES
(1, 1, 'Posadas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `idconsultorio` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `sillas` int(11) NOT NULL,
  `estado` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `consultorio`
--

INSERT INTO `consultorio` (`idconsultorio`, `numero`, `piso`, `sillas`, `estado`, `direccion`) VALUES
(1, 15, 4, 1, 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) NOT NULL,
  `idInsumos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_compra` decimal(10,0) DEFAULT NULL,
  `precio_uso` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `iddetalle_pedido` int(11) NOT NULL,
  `idpieza` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_transaccion`
--

CREATE TABLE `detalle_transaccion` (
  `iddetalletransaccion` int(11) NOT NULL,
  `idtransaccion` int(11) NOT NULL,
  `num_comprobante` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `idprestacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_turno`
--

CREATE TABLE `estado_turno` (
  `idestado_turno` int(11) NOT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `estado_turno`
--

INSERT INTO `estado_turno` (`idestado_turno`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Finalizado '),
(3, 'En consultorio'),
(4, 'En sala de espera'),
(5, 'Todos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `idfecha` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora_idhora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `idformadepago` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`idformadepago`, `tipo`) VALUES
(1, 'EFECTIVO'),
(2, 'TRANSFERENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora`
--

CREATE TABLE `hora` (
  `idhora` int(11) NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `horame` time DEFAULT NULL,
  `horams` time DEFAULT NULL,
  `horate` time DEFAULT NULL,
  `horats` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idhorario` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idhorario`, `hora`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(7, '10:30:00'),
(8, '11:00:00'),
(9, '11:30:00'),
(10, '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `tipo_comprobante` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `serie_comprobante` int(11) DEFAULT NULL,
  `num_comprobante` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `impuesto` decimal(10,0) DEFAULT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `idinsumo` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) DEFAULT NULL,
  `descripcion` varchar(512) COLLATE utf32_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf32_spanish_ci DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `unidad` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`idinsumo`, `codigo`, `stock`, `stock_min`, `descripcion`, `nombre`, `costo`, `estado`, `unidad`, `updated_at`, `created_at`) VALUES
(1, 24135134, 41, 5, 'GUANTES DE LATEX', 'GUANTES', NULL, 'Activo', 'unidad', '2018-05-22 18:41:28', '2018-03-27 16:13:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `idliquidacion` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idprofesional` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `coseguro` int(11) NOT NULL,
  `idprestacion` int(11) NOT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `idobrasocial` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`idliquidacion`, `idpaciente`, `idprofesional`, `fecha`, `coseguro`, `idprestacion`, `estado`, `idobrasocial`, `codigo`, `orden`) VALUES
(1, 3, 6, '2018-05-21 16:42:35', 21312, 1, 'Activo', 1, 123123, 0),
(2, 3, 6, '2018-05-21 16:42:35', 555, 16, 'Activo', 1, 555, 0),
(3, 3, 6, '2018-05-21 16:42:35', 21312, 1, 'Activo', 1, 123123, 0),
(4, 3, 6, '2018-05-21 16:42:35', 21312, 1, 'Activo', 1, 123123, 0),
(5, 3, 6, '2018-05-21 16:42:35', 555, 16, 'Activo', 1, 555, 0),
(6, 3, 6, '2018-05-21 16:42:35', 21312, 1, 'Activo', 1, 123123, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `idmecanico` int(11) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_04_04_122052_create_events_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obrasocial`
--

CREATE TABLE `obrasocial` (
  `idobrasocial` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `obraSocialcol` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `obrasocial`
--

INSERT INTO `obrasocial` (`idobrasocial`, `nombre`, `telefono`, `email`, `obraSocialcol`, `numero`, `estado`, `updated_at`, `created_at`) VALUES
(1, 'SANCOR', 2147483647, 'sancor@gmail.com', NULL, 695952959, 'Activo', '2018-04-17 09:35:22', '2018-04-17 09:35:22'),
(3, 'OSECAC', 2147483647, 'osecac@gmail.com', NULL, 5665919, 'Activo', '2018-04-17 09:36:57', '2018-04-17 09:36:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `idodontograma` int(11) NOT NULL,
  `idtratamiento` int(11) NOT NULL,
  `estados` int(11) DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf32_spanish_ci NOT NULL,
  `fecharegistro` date DEFAULT NULL,
  `paciente_idpaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idobra_social` int(11) NOT NULL,
  `id_obrasocial2` int(11) NOT NULL,
  `tipo_sangre` varchar(10) COLLATE utf32_spanish_ci DEFAULT NULL,
  `contradicciones` varchar(150) COLLATE utf32_spanish_ci DEFAULT NULL,
  `condicion` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `carnet` int(11) NOT NULL,
  `alerta` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `saldo` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `idpersona`, `idobra_social`, `id_obrasocial2`, `tipo_sangre`, `contradicciones`, `condicion`, `carnet`, `alerta`, `saldo`, `updated_at`, `created_at`) VALUES
(3, 4, 1, 0, 'A−', 'TOMA MEDICAMENTOS ', 'Activo', 456898, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 10, 3, 0, 'A−', 'NADA', 'Activo', 7885669, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `iso`, `nombre`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paisesss`
--

CREATE TABLE `paisesss` (
  `idpais` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `idmecanico` int(11) NOT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `fecha_hora` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `observaciones` varchar(150) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `idciudad` int(11) NOT NULL,
  `idtipo_documento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `observaciones` varchar(150) COLLATE utf32_spanish_ci DEFAULT NULL,
  `contradicciones` varchar(500) COLLATE utf32_spanish_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `idciudad`, `idtipo_documento`, `documento`, `nombre`, `apellido`, `nacimiento`, `edad`, `dni`, `telefono`, `email`, `direccion`, `condicion`, `observaciones`, `contradicciones`, `updated_at`, `created_at`) VALUES
(4, 1, 1, 38456789, 'ANDRES', 'INIESTA', '1995-10-17', 0, 0, 2147483647, 'iniestagol@gmail.com', 'CALLE 2', 0, NULL, 'TOMA MEDICAMENTOS ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 1, 56565656, 'JORGE', 'BRUNA', '1995-10-17', 0, 0, 2147483647, 'bruna@gmail.com', 'CALLE 2', 0, 'SD \r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 1, 356897845, 'ARIEL', 'OJEDA', '1995-12-12', 0, 0, 2147483647, 'marcosstevens2012@gmail.com', 'CALLE 23', 0, NULL, 'NADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 1, 35689789, 'CARLOS ', 'AVELLANEDA', '1995-12-15', 0, 0, 2147483647, 'carlos@gmail.com', 'CALLE 2', 0, ' ASD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `idpieza` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postliquidacion`
--

CREATE TABLE `postliquidacion` (
  `id` int(11) NOT NULL,
  `idpreliquidacion` int(11) NOT NULL,
  `idprestacion` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha` int(11) NOT NULL,
  `diente` int(11) NOT NULL,
  `cara` varchar(4) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preliquidacion`
--

CREATE TABLE `preliquidacion` (
  `id` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idprofesional` int(11) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `estados` text COLLATE utf32_spanish_ci,
  `fecha_hora` datetime DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `liquidado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `preliquidacion`
--

INSERT INTO `preliquidacion` (`id`, `idpaciente`, `idprofesional`, `orden`, `estados`, `fecha_hora`, `mes`, `liquidado`) VALUES
(1, 3, 6, 0, 'D14_C2_1-DIENTE INTACTO__D12_C4_16-CARIES__D16_C4_1-DIENTE INTACTO__D11_C4_1-DIENTE INTACTO__D26_C2_16-CARIES__D15_C5_1-DIENTE INTACTO', '2018-05-19 14:52:45', 0, 0),
(3, 5, 5, 0, 'asd', '2018-04-24 00:00:00', 0, 0),
(4, 6, 5, 0, 'asd', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestacion`
--

CREATE TABLE `prestacion` (
  `idprestacion` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `tiempo` time DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `prestacion`
--

INSERT INTO `prestacion` (`idprestacion`, `nombre`, `tiempo`, `codigo`, `created_at`, `updated_at`) VALUES
(55, 'DIENTE INTACTO', '00:30:00', 1, '2018-04-19 17:51:24', '2018-04-19 17:51:24'),
(56, 'DIENTE AUSENTE', '00:30:00', 2, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(57, 'REMANENTE RADICULAR', '00:30:00', 3, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(58, 'EXTRUSION', '00:30:00', 4, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(59, 'INTRUSION', '00:30:00', 5, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(60, 'GIROVERSION', '00:30:00', 6, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(61, 'MIGRACION', '00:30:00', 7, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(62, 'MICRODONCIA', '00:30:00', 8, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(63, 'MACRODONCIA', '00:30:00', 9, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(64, 'ECTOPICO', '00:30:00', 10, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(65, 'TRANSPOSICION', '00:30:00', 11, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(66, 'CLAVIJA', '00:30:00', 12, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(67, 'FRACTURA', '00:30:00', 13, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(68, 'DIENTE DISCROMICO', '00:30:00', 14, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(69, 'GEMINACION', '00:30:00', 15, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(70, 'CARIES', '00:30:00', 16, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(71, 'OBTURACION TEMPORAL', '00:30:00', 17, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(72, 'AMALGAMA', '00:30:00', 18, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(73, 'RESINA', '00:30:00', 19, '2018-04-19 17:51:25', '2018-04-19 17:51:25'),
(74, 'INCRUSTACION', '00:30:00', 20, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(75, 'ENDODONCIA', '00:30:00', 21, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(76, 'DESGASTADO', '00:30:00', 22, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(77, 'DIASTEMA', '00:30:00', 23, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(78, 'MOVILIDAD', '00:30:00', 24, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(79, 'CORONA TEMPORAL', '00:30:00', 25, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(80, 'CORONA COMPLETA', '00:30:00', 26, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(81, 'CORONA VEENER', '00:30:00', 27, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(82, 'CORONA FEXESTRADA', '00:30:00', 28, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(83, 'CORONA TRES CUARTOS', '00:30:00', 29, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(84, 'CORONA PORCELANA', '00:30:00', 30, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(85, 'PROTESIS FIJA ', '00:30:00', 31, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(86, 'PROTESIS REMOVIBLE', '00:30:00', 32, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(87, 'ODONTULO TOTAL', '00:30:00', 33, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(88, 'APARATO. ORT. FIJO', '00:30:00', 34, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(89, 'APARATO. ORT. REMOV.', '00:30:00', 35, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(90, 'IMPLANTE', '00:30:00', 36, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(91, 'SUPERNUMERARIO', '00:30:00', 37, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(92, 'DIENTE POR EXTRAER', '00:30:00', 38, '2018-04-19 17:51:26', '2018-04-19 17:51:26'),
(100, 'CONSULTA', '00:30:00', NULL, '2018-03-15 08:21:00', '2018-03-15 08:22:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestacion_insumo`
--

CREATE TABLE `prestacion_insumo` (
  `idprestacion` int(11) NOT NULL,
  `idinsumo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `prestacion_insumo`
--

INSERT INTO `prestacion_insumo` (`idprestacion`, `idinsumo`, `cantidad`, `updated_at`, `created_at`) VALUES
(2, 1, 1, '2018-03-27 17:39:59', '2018-03-27 17:39:59'),
(100, 1, 2, '2018-05-22 00:00:00', '2018-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestacion_obrasocial`
--

CREATE TABLE `prestacion_obrasocial` (
  `idprestacionprof` int(11) NOT NULL,
  `idobrasocial` int(11) NOT NULL,
  `idprestacion` int(11) NOT NULL,
  `coseguro` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `prestacion_obrasocial`
--

INSERT INTO `prestacion_obrasocial` (`idprestacionprof`, `idobrasocial`, `idprestacion`, `coseguro`, `codigo`, `orden`, `updated_at`, `created_at`) VALUES
(3, 1, 55, 21312, 123123, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 64, 12312, 123, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 85, 11212, 1233, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 73, 343, 1233, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 62, 112, 444, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 70, 555, 555, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 55, 1232, 123123, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 64, 132, 3431, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 85, 4433, 443, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 72, 45, 18, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 62, 111, 111, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, 70, 867, 768, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 94, 500, 101, 6594, '2018-03-15 08:22:22', '2018-03-15 08:21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `idprofesional` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `consultorio` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`idprofesional`, `idpersona`, `matricula`, `consultorio`, `updated_at`, `created_at`) VALUES
(5, 9, 565656565, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 11, 5669874, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `idcontacto1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idprovincia` smallint(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `idpais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idprovincia`, `nombre`, `idpais`) VALUES
(1, 'Misiones', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', '2018-05-08 00:00:00', '2018-05-08 00:00:00'),
(2, 'PROFESIONAL', '2018-05-08 00:00:00', '2018-05-08 00:00:00'),
(3, 'SECRETARIA', '2018-05-08 00:00:00', '2018-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipo_documento` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idtipo_documento`, `nombre`) VALUES
(1, 'DNI'),
(2, 'PASAPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todontograma`
--

CREATE TABLE `todontograma` (
  `codigoOdontograma` int(15) NOT NULL,
  `codigoPaciente` char(15) COLLATE utf32_spanish_ci NOT NULL,
  `codigoProfesional` int(11) NOT NULL,
  `codigoOrden` int(11) NOT NULL,
  `estados` text COLLATE utf32_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf32_spanish_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimaliq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `todontograma`
--

INSERT INTO `todontograma` (`codigoOdontograma`, `codigoPaciente`, `codigoProfesional`, `codigoOrden`, `estados`, `descripcion`, `fechaRegistro`, `ultimaliq`) VALUES
(36, '3', 6, 123123, 'D15_C5_1-DIENTE INTACTO', 'wqeqwe', '2018-05-16 00:32:43', 0),
(37, '3', 6, 123123, 'D11_C4_1-DIENTE INTACTO__D26_C2_16-CARIES__D15_C5_1-DIENTE INTACTO', 'asdasd', '2018-05-17 11:06:53', 0),
(38, '3', 6, 13, 'D12_C4_16-CARIES__D16_C4_1-DIENTE INTACTO__D11_C4_1-DIENTE INTACTO__D26_C2_16-CARIES__D15_C5_1-DIENTE INTACTO', 'sd', '2018-05-18 00:08:51', 0),
(39, '3', 6, 13123, 'D14_C2_1-DIENTE INTACTO__D12_C4_16-CARIES__D16_C4_1-DIENTE INTACTO__D11_C4_1-DIENTE INTACTO__D26_C2_16-CARIES__D15_C5_1-DIENTE INTACTO', 'qwdasd', '2018-05-19 14:52:45', 6);

--
-- Disparadores `todontograma`
--
DELIMITER $$
CREATE TRIGGER `odontograma_preliquidacion` AFTER INSERT ON `todontograma` FOR EACH ROW BEGIN
		UPDATE preliquidacion SET estados = new.estados, fecha_hora = new.fechaRegistro, idprofesional = new.codigoProfesional WHERE idpaciente = NEW.codigoPaciente;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `idtransaccion` int(11) NOT NULL,
  `detalles` varchar(512) COLLATE utf32_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `num_comprobante` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `monto` int(11) DEFAULT NULL,
  `idpaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `idtratamientos` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `idturno` int(11) NOT NULL,
  `idprestacion` int(11) NOT NULL,
  `idprofesional` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `asistencia` int(11) DEFAULT NULL,
  `observaciones` varchar(150) COLLATE utf32_spanish_ci DEFAULT NULL,
  `consultorio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `user` int(11) NOT NULL,
  `tiempo_at` int(11) NOT NULL,
  `idconsultorio` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Disparadores `turno`
--
DELIMITER $$
CREATE TRIGGER `tr_turno_insertar` AFTER INSERT ON `turno` FOR EACH ROW BEGIN
		insert into auditoria(iduser,evento,tabla,idregistro,fechahora,oldval,newval)
		values(new.user,"insert","turno",new.idturno,now(),"null",
		concat('idturno:',new.`idturno`,space(1),'idpaciente:',new.`idpaciente`,',',space(1),'idprofesional:',new.`idprofesional`,space(1),'idprestacion:',new.`idprestacion`,space(1),'idestado:',new.`idestado`,space(1),'observaciones:',new.`observaciones`));	
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_estado`
--

CREATE TABLE `turno_estado` (
  `id_turnoestado` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `idestado_turno` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `observaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipoUsuario`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Marcos Stevens', 'marcosstevens2012@gmail.com', '$2y$10$O2gAPJ0qgjEj3EUEZlfSqO5NQCdKcdOo.xFTy.FCc8K/6IYF8ibdm', 1, 'apVht99fyajucnlpAY4SLfSCE8nIfq8exrbahWRBU3vrsiSn6pItM9kesPcR', '2018-04-18 01:52:11', '2018-05-22 19:43:17'),
(3, 'Doctor Roberto', 'roberto@gmail.com', '$2y$10$2/s/Tyu2lGlxJxhc1tuIveLtumJe.u68JB8M1NiY4bJW/WH0v5j/S', 2, 'PJ7XIXgLsMQj8aTSYKql2X5UVXpZ6ejsu3n6T6uSdm3YFaMWsIUUOCctqjVv', '2018-05-08 13:04:12', '2018-05-09 03:22:41'),
(4, 'Anastasia Olmedo ', 'ana@gmail.com', '$2y$10$yrCfIhoRA9ZkyiLHh4YLVu0Q02vJkgsF8XaeBODJdcq266l9JIeyW', 3, 'D46TbqUMUcLZ7YDr2z4kUvhd7hqFaw83FN7tBPCViHXx2poLkZddZGAHx3Ad', '2018-05-09 02:35:06', '2018-05-21 21:41:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`idaudit`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idciudad`),
  ADD KEY `fk_ciudad_provincia1_idx` (`idprovincia`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`idconsultorio`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `fk_detalle_ingreso_ingreso1_idx` (`idingreso`),
  ADD KEY `fk_detalle_ingreso_Insumos1_idx` (`idInsumos`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`iddetalle_pedido`),
  ADD KEY `fk_detalle_pedido_pieza1_idx` (`idpieza`),
  ADD KEY `fk_detalle_pedido_pedido1_idx` (`idpedido`);

--
-- Indices de la tabla `detalle_transaccion`
--
ALTER TABLE `detalle_transaccion`
  ADD PRIMARY KEY (`iddetalletransaccion`),
  ADD KEY `fk_detalle_transaccion_transaccion1_idx` (`idtransaccion`),
  ADD KEY `fk_detalle_transaccion_prestacion1_idx` (`idprestacion`);

--
-- Indices de la tabla `estado_turno`
--
ALTER TABLE `estado_turno`
  ADD PRIMARY KEY (`idestado_turno`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`idfecha`),
  ADD KEY `fk_fecha_hora1_idx` (`hora_idhora`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`idformadepago`);

--
-- Indices de la tabla `hora`
--
ALTER TABLE `hora`
  ADD PRIMARY KEY (`idhora`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_proveedor1_idx` (`idproveedor`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`idinsumo`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`idliquidacion`),
  ADD KEY `fk_liquidacion_obrasocial` (`idobrasocial`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`idmecanico`),
  ADD KEY `fk_mecanico_persona1_idx` (`idpersona`);

--
-- Indices de la tabla `obrasocial`
--
ALTER TABLE `obrasocial`
  ADD PRIMARY KEY (`idobrasocial`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`idodontograma`),
  ADD KEY `fk_odontograma_tratamientos1_idx` (`idtratamiento`),
  ADD KEY `fk_odontograma_paciente1_idx` (`paciente_idpaciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`),
  ADD KEY `fk_paciente_persona1_idx` (`idpersona`),
  ADD KEY `fk_paciente_obrasocial1_idx` (`idobra_social`),
  ADD KEY `fk_paciente_obrasocial2` (`id_obrasocial2`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `paisesss`
--
ALTER TABLE `paisesss`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedido_mecanico1_idx` (`idmecanico`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `fk_persona_ciudad1_idx` (`idciudad`),
  ADD KEY `fk_persona_tipo_documento1_idx` (`idtipo_documento`);

--
-- Indices de la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD PRIMARY KEY (`idpieza`);

--
-- Indices de la tabla `postliquidacion`
--
ALTER TABLE `postliquidacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preliquidacion`
--
ALTER TABLE `preliquidacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestacion`
--
ALTER TABLE `prestacion`
  ADD PRIMARY KEY (`idprestacion`);

--
-- Indices de la tabla `prestacion_obrasocial`
--
ALTER TABLE `prestacion_obrasocial`
  ADD PRIMARY KEY (`idprestacionprof`),
  ADD KEY `fk_prestacion_obrasocial` (`idobrasocial`),
  ADD KEY `fk_prestacion_prestacion` (`idprestacion`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`idprofesional`),
  ADD KEY `fk_profesional_persona1_idx` (`idpersona`),
  ADD KEY `fk_profesional_consultorio1_idx` (`consultorio`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `fk_proveedor_persona1_idx` (`idpersona`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idprovincia`),
  ADD KEY `fk_provincia_pais1_idx` (`idpais`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idtipo_documento`);

--
-- Indices de la tabla `todontograma`
--
ALTER TABLE `todontograma`
  ADD PRIMARY KEY (`codigoOdontograma`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`idtransaccion`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`idtratamientos`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`idturno`),
  ADD KEY `fk_turno_profesional1_idx` (`idprofesional`),
  ADD KEY `fk_turno_prestacion1_idx` (`idprestacion`),
  ADD KEY `fk_turno_paciente1_idx` (`idpaciente`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `idaudit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `idconsultorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_transaccion`
--
ALTER TABLE `detalle_transaccion`
  MODIFY `iddetalletransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_turno`
--
ALTER TABLE `estado_turno`
  MODIFY `idestado_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `idformadepago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `idinsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `idliquidacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `idmecanico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obrasocial`
--
ALTER TABLE `obrasocial`
  MODIFY `idobrasocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `idodontograma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `pieza`
  MODIFY `idpieza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postliquidacion`
--
ALTER TABLE `postliquidacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preliquidacion`
--
ALTER TABLE `preliquidacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prestacion`
--
ALTER TABLE `prestacion`
  MODIFY `idprestacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `prestacion_obrasocial`
--
ALTER TABLE `prestacion_obrasocial`
  MODIFY `idprestacionprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `idprofesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `todontograma`
--
ALTER TABLE `todontograma`
  MODIFY `codigoOdontograma` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `idtransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `idturno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad_provincia1` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `fk_detalle_ingreso_Insumos1` FOREIGN KEY (`idInsumos`) REFERENCES `insumo` (`idinsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ingreso_ingreso1` FOREIGN KEY (`idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_detalle_pedido_pedido1` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_pedido_pieza1` FOREIGN KEY (`idpieza`) REFERENCES `pieza` (`idpieza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_transaccion`
--
ALTER TABLE `detalle_transaccion`
  ADD CONSTRAINT `fk_detalle_transaccion_prestacion1` FOREIGN KEY (`idprestacion`) REFERENCES `prestacion` (`idprestacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_transaccion_transaccion1` FOREIGN KEY (`idtransaccion`) REFERENCES `transaccion` (`idtransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD CONSTRAINT `fk_fecha_hora1` FOREIGN KEY (`hora_idhora`) REFERENCES `hora` (`idhora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_proveedor1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD CONSTRAINT `fk_mecanico_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD CONSTRAINT `fk_odontograma_paciente1` FOREIGN KEY (`paciente_idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_odontograma_tratamientos1` FOREIGN KEY (`idtratamiento`) REFERENCES `tratamiento` (`idtratamientos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_mecanico1` FOREIGN KEY (`idmecanico`) REFERENCES `mecanico` (`idmecanico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_ciudad1` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_tipo_documento1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `fk_profesional_consultorio1` FOREIGN KEY (`consultorio`) REFERENCES `consultorio` (`idconsultorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesional_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_pais1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `fk_turno_paciente1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_prestacion1` FOREIGN KEY (`idprestacion`) REFERENCES `prestacion` (`idprestacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_profesional1` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`idprofesional`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
