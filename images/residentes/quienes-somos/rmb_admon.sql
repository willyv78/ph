-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-12-2015 a las 17:02:19
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rmb_admon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_aptos`
--

CREATE TABLE IF NOT EXISTS `rmb_aptos` (
`rmb_aptos_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_aptos_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_torres_id` int(8) NOT NULL DEFAULT '1' COMMENT 'Torre/Interior/Manzana',
  `rmb_taptos_id` int(8) NOT NULL COMMENT 'Tipo de apartamento',
  `rmb_aptos_dir` varchar(100) DEFAULT NULL COMMENT 'Dirección',
  `rmb_aptos_tel` varchar(50) DEFAULT NULL COMMENT 'Teléfono',
  `rmb_aptos_area` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Área Total',
  `rmb_aptos_priv` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Área Privada',
  `rmb_aptos_banos` varchar(10) NOT NULL DEFAULT '0' COMMENT 'No. Baños',
  `rmb_aptos_coc` varchar(10) NOT NULL DEFAULT '0' COMMENT 'No. Cocinas',
  `rmb_aptos_hab` varchar(10) NOT NULL DEFAULT '0' COMMENT 'No. Habitaciones',
  `rmb_aptos_balc` varchar(10) NOT NULL DEFAULT '0' COMMENT 'No. Balcones',
  `rmb_est_id` int(8) NOT NULL COMMENT 'Estado',
  `rmb_aptos_obs` blob NOT NULL COMMENT 'Observación',
  `rmb_aptos_inm` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Tiene inmobiliaria? (SI = 1 o No = 0) por default 0',
  `rmb_aptos_habita` bit(1) NOT NULL DEFAULT b'1' COMMENT 'Esta Habitado? (SI = 1 o No = 0) por default 1',
  `rmb_aptos_parq` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Tiene parqueadero? (SI = 1, NO = 0, default = 0)',
  `rmb_aptos_dep` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Tiene deposito? (SI = 1, NO = 0, default = 0)',
  `rmb_aptos_coef` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Coeficiente de area en %.',
  `rmb_aptos_terr` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Número de terrazas',
  `rmb_aptos_vul` bit(1) NOT NULL DEFAULT b'0' COMMENT 'El apartamento presenta vulnerabilidad (si / no).',
  `rmb_aptos_banco` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Esta pignorado por entidad financiera?',
  `rmb_aptos_serv` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Alcobas de servicio',
  `rmb_aptos_est` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Estudio',
  `rmb_aptos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de Ingreso',
  `rmb_aptos_user` int(8) NOT NULL COMMENT 'Usuario'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los apartamentos del un proyecto.';

--
-- Truncar tablas antes de insertar `rmb_aptos`
--

TRUNCATE TABLE `rmb_aptos`;
--
-- Volcado de datos para la tabla `rmb_aptos`
--

INSERT INTO `rmb_aptos` (`rmb_aptos_id`, `rmb_aptos_nom`, `rmb_torres_id`, `rmb_taptos_id`, `rmb_aptos_dir`, `rmb_aptos_tel`, `rmb_aptos_area`, `rmb_aptos_priv`, `rmb_aptos_banos`, `rmb_aptos_coc`, `rmb_aptos_hab`, `rmb_aptos_balc`, `rmb_est_id`, `rmb_aptos_obs`, `rmb_aptos_inm`, `rmb_aptos_habita`, `rmb_aptos_parq`, `rmb_aptos_dep`, `rmb_aptos_coef`, `rmb_aptos_terr`, `rmb_aptos_vul`, `rmb_aptos_banco`, `rmb_aptos_serv`, `rmb_aptos_est`, `rmb_aptos_fecha`, `rmb_aptos_user`) VALUES
(1, '101', 1, 1, '', '', '116,15', '104,5', '1', '1', '3', '0', 0, 0x457863656c656e74652065737461646f, b'1', b'1', b'1', b'1', '0,965', '0', b'1', b'1', '0', '0', '2015-11-19 18:16:01', 1),
(2, '102', 1, 1, 'Carrera2 con calle2', '6882222', '116,15', '104,5', '1', '1', '3', '0', 18, 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204d6f72626920616c69717565742065726174206e69736c2c20757420636f6e64696d656e74756d206c696265726f206c6163696e69612065742e20496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20496e74656765722069642073617069656e2070757275732e20496e746567657220636f6e73657175617420736f64616c657320646f6c6f72206375727375732074696e636964756e742e20446f6e65632070656c6c656e74657371756520656765737461732070757275732c2075742070686172657472612073617069656e2070656c6c656e746573717565206e65632e20457469616d20766974616520707572757320696e20616e7465206c616f72656574206375727375732061206e6f6e206e6962682e20517569737175652061646970697363696e67206469616d20657420616e74652061646970697363696e67206c6f626f727469732e2043726173207375736369706974206e756c6c61206d657475732c20696420696163756c6973206469616d20626c616e64697420696e2e204e756c6c616d206e65717565206e69736c2c2074656d70757320696e2066656c697320612c206665756769617420636f6e64696d656e74756d2065726f732e204d616563656e61732068656e64726572697420657569736d6f642065726f732c20616320656765737461732065737420666163696c6973697320636f6e6775652e20457469616d2072686f6e63757320736f64616c657320766573746962756c756d2e20447569732068656e64726572697420706f7375657265206d61676e612e2053757370656e646973736520636f6e73656374657475722066656c69732061206d6175726973206d6174746973206d6f6c65737469652e20447569732064696374756d2073697420616d6574206e696268206e656320706f72747469746f722e, b'0', b'1', b'0', b'0', '0,965', '0', b'0', b'0', '0', '0', '2015-11-10 20:11:55', 1),
(3, '103', 1, 1, NULL, '', '116,15', '104,5', '1', '1', '3', '0', 3, 0x486162697461646f20706f7220656c2070726f706965746172696f, b'0', b'1', b'0', b'0', '0,965', '0', b'0', b'0', '0', '0', '2015-11-10 20:20:41', 1),
(4, '104', 1, 2, NULL, '', '114,30', '104,5', '1', '1', '3', '', 3, '', b'0', b'1', b'0', b'0', '0,965', '', b'0', b'0', '0', '0', '2015-11-10 20:20:21', 1),
(5, '105', 2, 2, NULL, '', '114,30', '104,5', '1', '1', '3', '', 3, '', b'0', b'1', b'0', b'0', '0,965', '', b'0', b'0', '0', '0', '2015-11-10 20:21:24', 1),
(6, '106', 2, 2, 'Carrera con calle', '6881111', '114,30', '104,5', '1', '1', '3', '', 17, '', b'0', b'1', b'1', b'1', '0,965', '', b'1', b'1', '0', '0', '2015-11-10 20:21:38', 1),
(7, '107', 2, 3, NULL, '', '141', '128,48', '1', '1', '3', '', 3, '', b'0', b'1', b'0', b'0', '1,192', '', b'0', b'0', '0', '0', '2015-11-10 20:21:50', 1),
(8, '108', 2, 3, NULL, '', '141', '128,48', '1', '1', '3', '', 3, '', b'0', b'1', b'0', b'0', '1,192', '', b'0', b'0', '0', '0', '2015-11-10 20:22:05', 1),
(9, '109', 1, 3, 'Carrera con calle', '4556633', '141', '128,48', '1', '0', '3', '', 17, '', b'0', b'0', b'0', b'0', '1,192', '', b'0', b'0', '0', '0', '2015-11-10 20:20:55', 1),
(10, '201', 1, 1, NULL, '', '116,15', '104,5', '1', '0', '3', '', 17, '', b'0', b'1', b'1', b'1', '0,965', '0', b'0', b'0', '0', '0', '2015-10-09 22:33:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_aptos_x_taptos`
--

CREATE TABLE IF NOT EXISTS `rmb_aptos_x_taptos` (
  `rmb_aptos_nom` varchar(50) NOT NULL COMMENT 'Apartamento',
  `rmb_taptos_id` int(8) NOT NULL COMMENT 'Tipo',
  `rmb_aptos_x_taptos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha',
  `rmb_aptos_x_taptos_user` int(8) NOT NULL DEFAULT '1' COMMENT 'Usuario'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_aptos_x_taptos`
--

TRUNCATE TABLE `rmb_aptos_x_taptos`;
--
-- Volcado de datos para la tabla `rmb_aptos_x_taptos`
--

INSERT INTO `rmb_aptos_x_taptos` (`rmb_aptos_nom`, `rmb_taptos_id`, `rmb_aptos_x_taptos_fecha`, `rmb_aptos_x_taptos_user`) VALUES
('1201', 1, '2015-11-10 20:11:29', 1),
('1008', 1, '2015-11-10 20:11:29', 1),
('1007', 1, '2015-11-10 20:11:29', 1),
('1001', 1, '2015-11-10 20:11:29', 1),
('1002', 1, '2015-11-10 20:11:29', 1),
('808', 1, '2015-11-10 20:11:29', 1),
('807', 1, '2015-11-10 20:11:29', 1),
('802', 1, '2015-11-10 20:11:29', 1),
('801', 1, '2015-11-10 20:11:29', 1),
('608', 1, '2015-11-10 20:11:29', 1),
('607', 1, '2015-11-10 20:11:29', 1),
('602', 1, '2015-11-10 20:11:29', 1),
('601', 1, '2015-11-10 20:11:29', 1),
('408', 1, '2015-11-10 20:11:29', 1),
('1107', 2, '2015-11-10 20:13:33', 1),
('1102', 2, '2015-11-10 20:13:33', 1),
('1101', 2, '2015-11-10 20:13:33', 1),
('908', 2, '2015-11-10 20:13:33', 1),
('907', 2, '2015-11-10 20:13:33', 1),
('902', 2, '2015-11-10 20:13:33', 1),
('901', 2, '2015-11-10 20:13:33', 1),
('708', 2, '2015-11-10 20:13:33', 1),
('707', 2, '2015-11-10 20:13:33', 1),
('702', 2, '2015-11-10 20:13:33', 1),
('701', 2, '2015-11-10 20:13:33', 1),
('508', 2, '2015-11-10 20:13:33', 1),
('507', 2, '2015-11-10 20:13:33', 1),
('502', 2, '2015-11-10 20:13:33', 1),
('501', 2, '2015-11-10 20:13:33', 1),
('308', 2, '2015-11-10 20:13:33', 1),
('307', 2, '2015-11-10 20:13:33', 1),
('1103', 3, '2015-11-10 20:13:57', 1),
('1004', 3, '2015-11-10 20:13:57', 1),
('1003', 3, '2015-11-10 20:13:57', 1),
('904', 3, '2015-11-10 20:13:57', 1),
('903', 3, '2015-11-10 20:13:57', 1),
('804', 3, '2015-11-10 20:13:57', 1),
('803', 3, '2015-11-10 20:13:57', 1),
('704', 3, '2015-11-10 20:13:57', 1),
('703', 3, '2015-11-10 20:13:57', 1),
('604', 3, '2015-11-10 20:13:57', 1),
('603', 3, '2015-11-10 20:13:57', 1),
('504', 3, '2015-11-10 20:13:57', 1),
('503', 3, '2015-11-10 20:13:57', 1),
('404', 3, '2015-11-10 20:13:57', 1),
('403', 3, '2015-11-10 20:13:57', 1),
('304', 3, '2015-11-10 20:13:57', 1),
('303', 3, '2015-11-10 20:13:57', 1),
('1106', 4, '2015-11-10 17:13:27', 1),
('1105', 4, '2015-11-10 17:13:27', 1),
('1006', 4, '2015-11-10 17:13:27', 1),
('1005', 4, '2015-11-10 17:13:27', 1),
('906', 4, '2015-11-10 17:13:27', 1),
('905', 4, '2015-11-10 17:13:27', 1),
('806', 4, '2015-11-10 17:13:27', 1),
('805', 4, '2015-11-10 17:13:27', 1),
('706', 4, '2015-11-10 17:13:27', 1),
('705', 4, '2015-11-10 17:13:27', 1),
('606', 4, '2015-11-10 17:13:27', 1),
('605', 4, '2015-11-10 17:13:27', 1),
('506', 4, '2015-11-10 17:13:27', 1),
('505', 4, '2015-11-10 17:13:27', 1),
('406', 4, '2015-11-10 17:13:27', 1),
('405', 4, '2015-11-10 17:13:27', 1),
('306', 4, '2015-11-10 17:13:27', 1),
('305', 4, '2015-11-10 17:13:27', 1),
('206', 4, '2015-11-10 17:13:27', 1),
('205', 4, '2015-11-10 17:13:27', 1),
('PH 07', 5, '2015-11-10 17:13:35', 1),
('PH 02', 5, '2015-11-10 17:13:35', 1),
('PH 06', 6, '2015-11-10 17:13:49', 1),
('PH 03', 6, '2015-11-10 17:13:49', 1),
('407', 1, '2015-11-10 20:11:29', 1),
('402', 1, '2015-11-10 20:11:29', 1),
('401', 1, '2015-11-10 20:11:29', 1),
('208', 1, '2015-11-10 20:11:29', 1),
('207', 1, '2015-11-10 20:11:29', 1),
('202', 1, '2015-11-10 20:11:29', 1),
('201', 1, '2015-11-10 20:11:29', 1),
('302', 2, '2015-11-10 20:13:33', 1),
('301', 2, '2015-11-10 20:13:33', 1),
('204', 3, '2015-11-10 20:13:57', 1),
('203', 3, '2015-11-10 20:13:57', 1),
('1204', 4, '2015-11-10 17:13:27', 1),
('1205', 4, '2015-11-10 17:13:27', 1),
('1304', 4, '2015-11-10 17:13:27', 1),
('1305', 4, '2015-11-10 17:13:27', 1),
('1208', 1, '2015-11-10 20:11:29', 1),
('102', 1, '2015-11-10 20:11:29', 1),
('103', 1, '2015-11-10 20:11:29', 1),
('1108', 2, '2015-11-10 20:13:33', 1),
('104', 2, '2015-11-10 20:13:33', 1),
('105', 2, '2015-11-10 20:13:33', 1),
('106', 2, '2015-11-10 20:13:33', 1),
('1104', 3, '2015-11-10 20:13:57', 1),
('107', 3, '2015-11-10 20:13:57', 1),
('108', 3, '2015-11-10 20:13:57', 1),
('109', 3, '2015-11-10 20:13:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_bitacora`
--

CREATE TABLE IF NOT EXISTS `rmb_bitacora` (
`rmb_bitacora_id` int(8) NOT NULL,
  `rmb_tbitacora_id` int(8) NOT NULL,
  `rmb_bitacora_fini` datetime DEFAULT NULL,
  `rmb_bitacora_ffin` datetime DEFAULT NULL,
  `rmb_aptos_id` int(8) DEFAULT NULL,
  `rmb_residente_id` int(8) DEFAULT NULL,
  `rmb_bitacora_obs` blob,
  `rmb_emp_id` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los registros de bitácora de cada porteria.';

--
-- Truncar tablas antes de insertar `rmb_bitacora`
--

TRUNCATE TABLE `rmb_bitacora`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_calendario`
--

CREATE TABLE IF NOT EXISTS `rmb_calendario` (
`rmb_calendario_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_calendario_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_proyecto_id` int(8) DEFAULT NULL COMMENT 'Id del proyecto al que pertenece.',
  `rmb_context_id` int(8) NOT NULL DEFAULT '1' COMMENT 'Contexto',
  `rmb_tcal_id` int(8) DEFAULT NULL COMMENT 'Tipo Calendario',
  `rmb_est_id` int(8) DEFAULT NULL COMMENT 'Estado',
  `rmb_mod_id` int(8) DEFAULT NULL COMMENT 'Modulo',
  `rmb_icono_id` int(11) DEFAULT '1' COMMENT 'Icono a mostrar',
  `rmb_calendario_desc` blob COMMENT 'Descripción',
  `rmb_calendario_fini` datetime DEFAULT NULL COMMENT 'Fecha de Inicio',
  `rmb_calendario_repite` int(1) NOT NULL DEFAULT '0',
  `rmb_calendario_cada` int(1) NOT NULL,
  `rmb_calendario_det_cada` varchar(255) NOT NULL,
  `rmb_calendario_final` int(1) NOT NULL,
  `rmb_calendario_det_final` int(8) NOT NULL,
  `rmb_calendario_padre` int(8) NOT NULL,
  `rmb_calendario_ffin` datetime DEFAULT NULL COMMENT 'Fecha de finalización',
  `rmb_calendario_img` longblob COMMENT 'Imagen',
  `rmb_calendario_fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de Ingreso',
  `rmb_calendario_user` int(8) DEFAULT NULL COMMENT 'Ususario que Ingresa'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los eventos de calendario registrados.';

--
-- Truncar tablas antes de insertar `rmb_calendario`
--

TRUNCATE TABLE `rmb_calendario`;
--
-- Volcado de datos para la tabla `rmb_calendario`
--

INSERT INTO `rmb_calendario` (`rmb_calendario_id`, `rmb_calendario_nom`, `rmb_proyecto_id`, `rmb_context_id`, `rmb_tcal_id`, `rmb_est_id`, `rmb_mod_id`, `rmb_icono_id`, `rmb_calendario_desc`, `rmb_calendario_fini`, `rmb_calendario_repite`, `rmb_calendario_cada`, `rmb_calendario_det_cada`, `rmb_calendario_final`, `rmb_calendario_det_final`, `rmb_calendario_padre`, `rmb_calendario_ffin`, `rmb_calendario_img`, `rmb_calendario_fecha`, `rmb_calendario_user`) VALUES
(1, 'Ejemplo de evento', NULL, 1, 1, NULL, 0, 1, 0x4573746120657320756e61206f62736572766163696f6e20646520656a656d706c6f206465206576656e746f20656e20656c2063616c656e646172696f206465207068, '2015-11-10 07:00:00', 0, 0, '', 0, 0, 0, '2015-11-10 17:30:00', NULL, '2015-11-09 20:42:56', 1),
(2, 'Prueba de evento', NULL, 1, 1, NULL, 1, 1, 0x507275656261206465206576656e746f, '2015-11-12 07:00:00', 0, 0, '', 0, 0, 0, '2015-11-12 17:30:00', 0x2e2e2f696d616765732f63616c656e646172696f2f325f63616c2e706e67, '2015-11-13 20:31:07', 1),
(3, 'Prueba de circular', NULL, 1, 2, NULL, 1, 1, 0x7072756562612064652063697263756c6172, '2015-11-20 07:00:00', 0, 0, '', 0, 0, 0, '2015-11-20 17:30:00', 0x2e2e2f696d616765732f63616c656e646172696f2f335f63616c2e6a7067, '2015-11-13 20:44:42', 1),
(4, 'Prueba Calsificado', NULL, 1, 3, NULL, 1, 1, 0x50727565626120646520636c61736966696361646f, '2015-11-19 07:00:00', 0, 0, '', 0, 0, 0, '2015-11-19 17:30:00', 0x2e2e2f696d616765732f63616c656e646172696f2f345f63616c2e6a7067, '2015-11-13 21:02:43', 1),
(5, 'Prueba Tarea', NULL, 1, 4, NULL, 1, 1, 0x507275656261206465207461726561, '2015-11-18 07:00:00', 0, 0, '', 0, 0, 0, '2015-11-18 17:30:00', 0x2e2e2f696d616765732f63616c656e646172696f2f355f63616c2e6a706567, '2015-11-13 21:03:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_carg`
--

CREATE TABLE IF NOT EXISTS `rmb_carg` (
`rmb_carg_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_carg_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los cargos que ocuparan los miembros del consejo y administrador.';

--
-- Truncar tablas antes de insertar `rmb_carg`
--

TRUNCATE TABLE `rmb_carg`;
--
-- Volcado de datos para la tabla `rmb_carg`
--

INSERT INTO `rmb_carg` (`rmb_carg_id`, `rmb_carg_nom`) VALUES
(1, 'Master'),
(2, 'Consejo'),
(3, 'Administrador'),
(4, 'Aseo'),
(5, 'Vigilante'),
(6, 'Residente'),
(7, 'Escolta'),
(8, 'Domestica'),
(9, 'Seguridad'),
(10, 'Enfermera(o)'),
(11, 'Niñera(o)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_cdoc`
--

CREATE TABLE IF NOT EXISTS `rmb_cdoc` (
`rmb_cdoc_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_cdoc_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las categorias o tipo de documentos';

--
-- Truncar tablas antes de insertar `rmb_cdoc`
--

TRUNCATE TABLE `rmb_cdoc`;
--
-- Volcado de datos para la tabla `rmb_cdoc`
--

INSERT INTO `rmb_cdoc` (`rmb_cdoc_id`, `rmb_cdoc_nom`) VALUES
(1, 'ACTAS'),
(2, 'CIRCULARES'),
(3, 'INFORMES REVISORIA FISCAL'),
(4, 'INFORMES CONTABLES'),
(5, 'REGLAMENTO'),
(6, 'MANUAL DE CONVIVENCIA'),
(7, 'INFORMES ADMINISTRATIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_contac`
--

CREATE TABLE IF NOT EXISTS `rmb_contac` (
`rmb_contac_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_residente_id` int(8) NOT NULL COMMENT 'Residente',
  `rmb_tcont_id` int(8) NOT NULL COMMENT 'Tipo de Contacto',
  `rmb_context_id` int(8) DEFAULT NULL COMMENT 'Contexto',
  `rmb_contac_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_contac_titulo` varchar(50) DEFAULT NULL COMMENT 'Titulo',
  `rmb_contac_tel` varchar(50) DEFAULT NULL COMMENT 'Numero Telefonico'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los contactos de cada residente.';

--
-- Truncar tablas antes de insertar `rmb_contac`
--

TRUNCATE TABLE `rmb_contac`;
--
-- Volcado de datos para la tabla `rmb_contac`
--

INSERT INTO `rmb_contac` (`rmb_contac_id`, `rmb_residente_id`, `rmb_tcont_id`, `rmb_context_id`, `rmb_contac_nom`, `rmb_contac_titulo`, `rmb_contac_tel`) VALUES
(1, 5, 1, 1, 'MÃ“VIL DE URGENCIAS', 'URGENCIAS', '1234'),
(2, 5, 2, 1, 'ADMINISTRACIÃ“N EFICIENTE S.A.S.', 'ADMNISTRACIÃ“N', '7511084'),
(3, 5, 3, 1, 'POLICIA DEL DUADRANTE', 'POLICIA', '320124569'),
(4, 5, 4, 1, 'BOMBEROS DE LA LOCALIDAD', 'BOMBEROS', '1234567'),
(5, 5, 5, 1, 'CODENSA', 'ENERGIA', '1234567'),
(6, 2, 6, 2, 'COCINA GOURMET', 'RESTAURANTE', '1234567'),
(7, 2, 6, 2, 'SOPAS DE LA ABUELA', 'RESTAURANTE', '1234567'),
(8, 2, 7, 2, 'LA REBAJA', 'DROGUERIA', '1234567'),
(9, 2, 8, 2, 'SUPERMARKER', 'SUPERMERCADO', '1234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_context`
--

CREATE TABLE IF NOT EXISTS `rmb_context` (
`rmb_context_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_context_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tipos de contexto (Edificio, barrio)';

--
-- Truncar tablas antes de insertar `rmb_context`
--

TRUNCATE TABLE `rmb_context`;
--
-- Volcado de datos para la tabla `rmb_context`
--

INSERT INTO `rmb_context` (`rmb_context_id`, `rmb_context_nom`) VALUES
(1, 'Público'),
(2, 'Privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_cvulnera`
--

CREATE TABLE IF NOT EXISTS `rmb_cvulnera` (
`rmb_cvulnera_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_cvulnera_nom` varchar(100) DEFAULT NULL COMMENT 'Nombre de la categoria.'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='categorias de las vulnerabilidades.';

--
-- Truncar tablas antes de insertar `rmb_cvulnera`
--

TRUNCATE TABLE `rmb_cvulnera`;
--
-- Volcado de datos para la tabla `rmb_cvulnera`
--

INSERT INTO `rmb_cvulnera` (`rmb_cvulnera_id`, `rmb_cvulnera_nom`) VALUES
(1, 'Estructural'),
(2, 'Enfermedad'),
(3, 'Tercera Edad'),
(4, 'Seguridad'),
(5, 'Menores de Edad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_depos`
--

CREATE TABLE IF NOT EXISTS `rmb_depos` (
`rmb_depos_id` int(8) NOT NULL COMMENT 'Id',
  `rmb_depos_nom` varchar(50) DEFAULT NULL COMMENT 'Número',
  `rmb_aptos_id` int(8) NOT NULL COMMENT 'Apartamento',
  `rmb_zonas_id` int(8) DEFAULT NULL COMMENT 'Zona',
  `rmb_depos_obs` blob COMMENT 'Observación'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los depósitos de cada apartamento.';

--
-- Truncar tablas antes de insertar `rmb_depos`
--

TRUNCATE TABLE `rmb_depos`;
--
-- Volcado de datos para la tabla `rmb_depos`
--

INSERT INTO `rmb_depos` (`rmb_depos_id`, `rmb_depos_nom`, `rmb_aptos_id`, `rmb_zonas_id`, `rmb_depos_obs`) VALUES
(1, '1', 1, 14, 0x4e7565766f20646570c3b37369746f206465736465206c61206f706369c3b36e20646520646570c3b37369746f7320656e20656c20646574616c6c652064656c206170617274616d656e746f2e),
(2, '2', 0, 14, ''),
(3, '3', 1, 14, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_document`
--

CREATE TABLE IF NOT EXISTS `rmb_document` (
`rmb_document_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_document_nom` varchar(100) DEFAULT NULL COMMENT 'Nombre',
  `rmb_proyecto_id` int(8) DEFAULT NULL COMMENT 'Id del proyecto',
  `rmb_cdoc_id` int(8) NOT NULL COMMENT 'Tipo Documento',
  `rmb_document_desc` blob COMMENT 'Descripción',
  `rmb_context_id` int(8) DEFAULT NULL COMMENT '¿A Quien va Dirigido?',
  `rmb_document_img` varchar(255) DEFAULT NULL COMMENT 'Documento',
  `rmb_est_id` int(8) DEFAULT NULL COMMENT 'Estado',
  `rmb_document_fini` date DEFAULT NULL COMMENT 'Fecha Publicación',
  `rmb_document_ffin` date DEFAULT NULL COMMENT 'Fecha Final',
  `rmb_document_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se ingresa o actualiza el registro',
  `rmb_document_user` int(8) DEFAULT NULL COMMENT 'Usuario que actualiza o crea el registro.'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los documentos de interés y publicos.';

--
-- Truncar tablas antes de insertar `rmb_document`
--

TRUNCATE TABLE `rmb_document`;
--
-- Volcado de datos para la tabla `rmb_document`
--

INSERT INTO `rmb_document` (`rmb_document_id`, `rmb_document_nom`, `rmb_proyecto_id`, `rmb_cdoc_id`, `rmb_document_desc`, `rmb_context_id`, `rmb_document_img`, `rmb_est_id`, `rmb_document_fini`, `rmb_document_ffin`, `rmb_document_fecha`, `rmb_document_user`) VALUES
(1, 'Reglamento de prueba', NULL, 5, 0x507275656261206465206e7565766f20646f63756d656e746f207469706f207265676c616d656e746f, 1, '../images/archivos/doc_1.pdf', 1, '2015-11-01', '2016-10-31', '2015-11-13 12:49:05', 1),
(2, 'Manual de convivencia', NULL, 6, 0x507275656261206465206e7565766f206d616e75616c20646520636f6e766976656e6369612e, 1, '../images/archivos/doc_2.pdf', 1, '2015-11-13', '2015-12-31', '2015-11-13 13:08:11', 1),
(5, 'Circular Informativa', NULL, 2, 0x507275656261206465206e756576612063697263756c6172, 1, '../images/archivos/doc_5.jpeg', 1, '2015-11-13', '2016-01-31', '2015-11-13 13:46:15', 1),
(6, 'Informe administrativo No. 1', NULL, 7, 0x4573746520657320756e20646f63756d656e746f20646520656a656d706c6f20646520696e666f726d652061646d696e69737472617469766f, 1, '../images/archivos/doc_6.pdf', 1, '2015-12-01', '2015-12-31', '2015-12-09 16:17:01', 1),
(7, 'Informe administrativo No. 2', NULL, 7, 0x4573746520657320756e206e7565766f20656a656d706c6f206465206e7565766f20646f63756d656e746f2061646d696e69737472617469766f2e, 1, '../images/archivos/doc_7.xls', 1, '2015-12-02', '2015-12-30', '2015-12-09 16:17:57', 1),
(8, 'Informe Contable No. 1', NULL, 4, 0x4573746520657320756e20656a656d706c6f206465206e7565766f20646f63756d656e746f20636f6e7461626c652e, 1, '../images/archivos/doc_8.doc', 1, '2015-12-03', '2015-12-29', '2015-12-09 16:55:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_emp`
--

CREATE TABLE IF NOT EXISTS `rmb_emp` (
`rmb_emp_id` int(8) NOT NULL,
  `rmb_temp_id` int(8) NOT NULL,
  `rmb_emp_nom` varchar(100) DEFAULT NULL,
  `rmb_emp_dir` varchar(100) DEFAULT NULL,
  `rmb_emp_tel` varchar(50) DEFAULT NULL,
  `rmb_emp_doc` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las empresas.';

--
-- Truncar tablas antes de insertar `rmb_emp`
--

TRUNCATE TABLE `rmb_emp`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_emp_x_proyecto`
--

CREATE TABLE IF NOT EXISTS `rmb_emp_x_proyecto` (
  `rmb_emp_id` int(8) NOT NULL,
  `rmb_proyecto_id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las empresas por cada proyecto.';

--
-- Truncar tablas antes de insertar `rmb_emp_x_proyecto`
--

TRUNCATE TABLE `rmb_emp_x_proyecto`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_equipos`
--

CREATE TABLE IF NOT EXISTS `rmb_equipos` (
`rmb_equipos_id` int(8) NOT NULL,
  `rmb_equipos_nom` varchar(50) DEFAULT NULL,
  `rmb_proyecto_id` int(8) DEFAULT NULL COMMENT 'Id del proyecto al que pertenece.',
  `rmb_equipos_marc` varchar(50) DEFAULT NULL,
  `rmb_equipos_mod` varchar(50) DEFAULT NULL,
  `rmb_equipos_fab` varchar(50) DEFAULT NULL,
  `rmb_equipos_fcom` date DEFAULT NULL,
  `rmb_equipos_val` int(8) DEFAULT NULL,
  `rmb_est_id` int(8) DEFAULT NULL,
  `rmb_equipos_obs` blob,
  `rmb_teq_id` int(8) DEFAULT NULL COMMENT 'Tipo de Equipo',
  `rmb_equipos_foto` longblob COMMENT 'Imagen',
  `rmb_equipos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de ingreso',
  `rmb_equipos_user` int(8) NOT NULL COMMENT 'Usuario que ingresa'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los equipos instalados en cada proyecto.';

--
-- Truncar tablas antes de insertar `rmb_equipos`
--

TRUNCATE TABLE `rmb_equipos`;
--
-- Volcado de datos para la tabla `rmb_equipos`
--

INSERT INTO `rmb_equipos` (`rmb_equipos_id`, `rmb_equipos_nom`, `rmb_proyecto_id`, `rmb_equipos_marc`, `rmb_equipos_mod`, `rmb_equipos_fab`, `rmb_equipos_fcom`, `rmb_equipos_val`, `rmb_est_id`, `rmb_equipos_obs`, `rmb_teq_id`, `rmb_equipos_foto`, `rmb_equipos_fecha`, `rmb_equipos_user`) VALUES
(1, 'Bomba hidráulica', NULL, 'Dynapower', 'Bomba hidrÃ¡ulica de pistones axiales de cilindrad', 'Eaton', '2014-05-30', 3000000, 8, 0x427573717565206c617320626f6d626173206465204561746f6e2044796e61706f776572c2ae20646f6e64657175696572612071756520656c2074726162616a6f2073656120656c206dc3a17320726573697374656e7465207920656c20616d6269656e746520657320656c206dc3a17320c3a1737065726f2e20456e74726567616e646f2066756e63696f6e616d69656e746f20636c6173652d71756520636f6e6475636520706f7220746f646f20656c206d756e646f2c206c617320626f6d626173206465204561746f6e2044796e61706f77657220657374c3a16e20646973706f6e69626c657320656e20636f6e66696775726163696f6e65732066696a61646173207920766f6c756dc3a97472696361732c20636f6e20756e6120616d706c69612067616d612064652074616d61c3b16f732079206465206361726163746572c3ad73746963617320646973706f6e69626c65732e204c6120636f6d62696e616369c3b36e206465206573746173206f7063696f6e657320696e6e6f7661646f726173207920636f6e66696775726163696f6e657320666c657869626c6573206461206c75676172206120756e2073697374656d612068796472c3a1756c69636f2071756520657374c3a92065636f6ec3b36d6963616d656e7465207920616d6269656e74616c6d656e7465206176616e7ac3b32e, 14, 0x2e2e2f696d616765732f65717569706f732f312e6a706567, '2015-10-15 14:00:00', 1),
(9, 'Ascensor 2 de torre 1', NULL, 'Volvo', 'volvo-01', 'Volvo', '2010-02-02', 32000000, 8, 0x417363656e736f72206e756d65726f2032206465206c6120746f7272652031, 1, 0x2e2e2f696d616765732f65717569706f732f392e6a7067, '2015-10-16 15:46:18', 1),
(10, 'Ascensor 1 torre 2', NULL, 'Misubishi', 'rto-2131', 'Misubishi', '2010-01-05', 35000000, 8, 0x417363656e736f72206e756d65726f2031206465206c6120746f72726520322e, 1, 0x2e2e2f696d616765732f65717569706f732f31302e6a7067, '2015-10-16 15:47:50', 1),
(11, 'Ascensor 2 de torre 2', NULL, 'Misubishi', 'rto-2131', 'Misubishi', '2010-01-05', 35000000, 8, 0x417363656e736f722032206465206c6120746f72726520322e, 1, 0x2e2e2f696d616765732f65717569706f732f31312e6a7067, '2015-10-16 15:48:50', 1),
(12, 'Planta Eléctrica torre 2', NULL, 'Yamaha', 'yama-2131', 'Yamaha', '2011-03-02', 12000000, 8, 0x506c616e746120656c65637472696361206465206c6120746f72726520312e, 3, 0x2e2e2f696d616765732f65717569706f732f31322e6a7067, '2015-10-16 15:50:24', 1),
(13, 'Planta Eléctrica Gimnasio', NULL, 'Yamaha', 'yama-1231', 'Yamaha', '2011-03-03', 5400000, 8, 0x506c616e746120656cc3a96374726963612064656c2067696d6e6173696f2e, 3, 0x2e2e2f696d616765732f65717569706f732f31332e6a7067, '2015-10-16 15:51:40', 1),
(14, 'Planta Eléctrica Salón Comunal', NULL, 'Yamaha', 'yama-1231', 'Yamaha', '2011-03-03', 12000000, 8, 0x506c616e746120656cc3a96374726963612064656c2073616cc3b36e20636f6d756e616c2e, 3, 0x2e2e2f696d616765732f65717569706f732f31342e6a7067, '2015-10-16 15:53:08', 1),
(15, 'Planta Eléctrica Biblioteca', NULL, 'Yamaha', 'yama-1231', 'Yamaha', '2011-03-09', 11000000, 8, 0x506c616e746120656cc3a9637472696361206465206c61206269626c696f746563612e, 3, 0x2e2e2f696d616765732f65717569706f732f31352e6a7067, '2015-10-16 15:54:10', 1),
(2, 'Planta Eléctrica torre 1', NULL, 'Duromax', 'XP4000S', 'DuroMax', '2014-04-29', 2000000, 8, 0x506c616e746120456e657267696120456c656374726963612047656e657261646f7220456c6563747269636f20343030302057617474, 3, 0x2e2e2f696d616765732f65717569706f732f322e6a7067, '2015-10-16 15:50:33', 1),
(7, 'Brilladora', NULL, 'Oster', 'oster-0102', 'Oster', '2015-10-01', 3500000, 8, '', 10, 0x2e2e2f696d616765732f65717569706f732f372e706e67, '2015-10-14 21:47:26', 1),
(8, 'BBQ Torre 1', NULL, 'Icasa', 'bbq-icasa 0302', 'Icasa', '2013-02-28', 400050, 8, '', 13, 0x2e2e2f696d616765732f65717569706f732f382e706e67, '2015-10-14 21:49:14', 1),
(3, 'Circuito cerrado de tv', NULL, 'Zmodo', 'Cctv Dvr 8 Canales', 'Zmodo', '2014-04-01', 500000, 8, 0x486f6c612c206c61732063c3a16d61726173206d6f7374726164617320656e2065737461207075626c6963616369c3b36e2073697276656e207061726120696e746572696f726573206f206578746572696f7265732e20436164612063c3a16d6172612061646963696f6e616c20637565737461202439302c303030206520696e636c757965206361626c6561646f2e20456c207365742064652063756174726f2063c3a16d617261732061646963696f6e616c657320636f6e206361626c6561646f20792061636365736f72696f732063756573746120243335302c3030302e20556e20646973636f206475726f206465203530302067696761732070617261206f63686f2063c3a16d6172617320616374697661732064652036303074766c2064757261206dc3a178696d6f206170726f78696d6164616d656e746520646f732073656d616e61732e2056656e64656d6f7320646973636f73206475726f73206465203120544220706f7220243133352c3030302e20536920547520636f6e657869c3b36e206120496e7465726e65742065732064652069702066696a612c2073696d706c69666963617320656c2070726f6365736f20646520636f6e657869c3b36e2064656c20445652206120496e7465726e65742e20536920656c207265636570746f722064652074752063c3a16d61726120696e616cc3a16d6272696361207469656e652073616c6964612064652076c3ad64656f20424e432073692070756564657320757361726c6120636f6e2065737465204456522e, 4, 0x2e2e2f696d616765732f65717569706f732f332e706e67, '2015-10-14 21:20:42', 1),
(4, 'Ascensor Mitsubishi', NULL, 'Mitsubishi', 'ELENESSA Series-AP VersiÃ³n2', 'Mitsubishi', '2014-01-01', 50000000, 8, 0x456c657661746f727320757375616c6c792074726176656c207573696e6720706f7765722066726f6d206120706f77657220737570706c79200d0a28706f7765726564206f7065726174696f6e293b20686f77657665722c207768656e20746865792074726176656c20646f776e2077697468206120636172206c6f6164206f7220757020776974682061206c6967687420636172206c6f61642028726567656e65726174697665206f7065726174696f6e292c207472616374696f6e206d616368696e652066756e6374696f6e73206173206120706f7765722067656e657261746f722e20416c74686f75676820706f7765722067656e65726174656420647572696e67207472616374696f6e206d616368696e65206f7065726174696f6e20697320757375616c6c7920617320686561742c2074686520526567656e6572617469766520436f6e766572746572207472616e736d6974732074686520706f776572206261636b20746f2074686520646973747269627574696f6e207472616e73666f726d657220616e6420666565647320697420696e746f2074686520656c656374726963616c206e6574776f726b20696e20746865206275696c64696e6720616c6f6e67207769746820656c6563747269636974792066726f6d2074686520706f77657220737570706c79, 1, 0x2e2e2f696d616765732f65717569706f732f342e6a7067, '2015-10-15 13:58:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_est`
--

CREATE TABLE IF NOT EXISTS `rmb_est` (
`rmb_est_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_est_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_est_mod` varchar(50) DEFAULT NULL COMMENT 'Modulo'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los diferentes estados que se manejan en la aplicación.';

--
-- Truncar tablas antes de insertar `rmb_est`
--

TRUNCATE TABLE `rmb_est`;
--
-- Volcado de datos para la tabla `rmb_est`
--

INSERT INTO `rmb_est` (`rmb_est_id`, `rmb_est_nom`, `rmb_est_mod`) VALUES
(1, 'Activo', '4'),
(2, 'Deshabilitado', '4'),
(3, 'Habitado', '3'),
(4, 'No Habitado', '3'),
(5, 'Sin leer', '5'),
(6, 'Visto', '5'),
(7, 'Por Responder', '5'),
(8, 'Activo', '6'),
(9, 'Fuera de Servicio', '6'),
(10, 'En Mantenimiento', '6'),
(11, 'Generado', '7'),
(12, 'En Mora', '7'),
(13, 'Pagado', '7'),
(14, 'Paz y Salvo', '7'),
(15, 'Realizada', '2'),
(16, 'No Realizada', '2'),
(17, 'Al Día', '8'),
(18, 'Mora de 1 mes', '8'),
(19, 'Mora de 2 meses', '8'),
(20, 'Mora de más de 2 meses', '8'),
(21, 'Residente', '9'),
(22, 'Visitante', '9'),
(23, 'Activo', '10'),
(24, 'Inactivo', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_fpago`
--

CREATE TABLE IF NOT EXISTS `rmb_fpago` (
`rmb_fpago_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_fpago_nom` varchar(50) NOT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las formas de pago.';

--
-- Truncar tablas antes de insertar `rmb_fpago`
--

TRUNCATE TABLE `rmb_fpago`;
--
-- Volcado de datos para la tabla `rmb_fpago`
--

INSERT INTO `rmb_fpago` (`rmb_fpago_id`, `rmb_fpago_nom`) VALUES
(1, 'Efectivo'),
(2, 'ConsignaciÃ³n'),
(3, 'Transferencia'),
(4, 'Cheque'),
(6, 'Baloto'),
(7, 'VISA'),
(8, 'MasterCard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_gen`
--

CREATE TABLE IF NOT EXISTS `rmb_gen` (
`rmb_gen_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_gen_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los géneros.';

--
-- Truncar tablas antes de insertar `rmb_gen`
--

TRUNCATE TABLE `rmb_gen`;
--
-- Volcado de datos para la tabla `rmb_gen`
--

INSERT INTO `rmb_gen` (`rmb_gen_id`, `rmb_gen_nom`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_horarios`
--

CREATE TABLE IF NOT EXISTS `rmb_horarios` (
`rmb_horarios_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_horarios_dia` int(8) DEFAULT NULL COMMENT 'dia de la semana para el que aplica el horario.',
  `rmb_horarios_hent` time DEFAULT NULL COMMENT 'Hora de entrada al edificio.',
  `rmb_horarios_hsal` time DEFAULT NULL COMMENT 'Hora de salida del edificio.',
  `rmb_horarios_fini` date DEFAULT NULL COMMENT 'Fecha desde que aplica el horario.',
  `rmb_horarios_ffin` date DEFAULT NULL COMMENT 'Fecha hasta la que aplica el horario.',
  `rmb_horarios_obs` varchar(225) DEFAULT NULL COMMENT 'Observación relacionada al horario.',
  `rmb_residente_id` int(8) NOT NULL COMMENT 'Id del personal, residente u otros al que aplica el horario.',
  `rmb_horarios_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se ingresa el registro.',
  `rmb_horarios_user` int(8) NOT NULL COMMENT 'Usuario que realiza el registro.'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_horarios`
--

TRUNCATE TABLE `rmb_horarios`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_icono`
--

CREATE TABLE IF NOT EXISTS `rmb_icono` (
`rmb_icono_id` int(11) NOT NULL COMMENT 'Id del icono',
  `rmb_icono_nom` varchar(45) DEFAULT NULL COMMENT 'Nombre del icono',
  `rmb_icono_img` longblob COMMENT 'Imagen icono.'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_icono`
--

TRUNCATE TABLE `rmb_icono`;
--
-- Volcado de datos para la tabla `rmb_icono`
--

INSERT INTO `rmb_icono` (`rmb_icono_id`, `rmb_icono_nom`, `rmb_icono_img`) VALUES
(1, 'Agua', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464c5a304642515551355130465a5155464251573944524870335155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546446457784b556b56475657564f636e4e755a6a6c344d6d746e5657644f597a4d725569743151573552566d644464556c5953555a4b516c4e5a566d35475545493055584650566b4a4462306c4d5a304e356546565a5332707162304644636e6332576a4a6d536d393655444a51635852304e6e5a3262546c464e4774365a306b3357445532596a55354d6b70574d446851656a673359305a484e6c526b54585255636d524b6457387a5a53744b4d546c3162544e54596d457a596b6c61516d70754b32397465486f784b7a51354b31426c64486c4b53485a6c625870544f544d7757453543556d4e71596d524d6333553457446c594e6c5261554851314d6b6834656a4e564e4456616446565152433969644535306131633154454a484d6a4a6e4e566c7365466836546d523457465a734e47673263546b354d315651526e7049646c6436546d646f59575935556d4d784f554a43636a5a5153334a504d7a41784b305a4b5a574e764d3270685a306c585a3031704d466b7252314232645738346253744e65584274593064585546643356584a69644735614b3145344e32464853326446617a5533536b746b647a424f55324a3055336452566d46614e5745796447525853545a74566b316c62545a6e596c4972616e45354d576b356355684452484a565647317854484e53575768575a3346704e6e68694d7a6b3255485645546b6c495557465856464a704d3359344d43744f623277795a6d31474d6d4e4c51584e46656c557256574a754f544630547973315a314a4f656a424e526974514f5751315932395a64545a4c656b526d57437431625538306154646c6157396155464d344e325a4557545633614846594f5546354b7a51765a484979626c566d4f557830555667344b7a59354c32357156587055616e464d626a5a6a6131704a5a57704962475a31627a51724f48644d566d704a5546646f556a6731576d4d784c334a32615759314b30686d6454466a54336b35526c52524d6a68434d5564505530704b5a48417765574933565851775632347a64325a426145527857446c524e43746e566d64784d576f7255584e6c61455a6b53585636655652445557526b6348706c4f4868344d324a714e455a5963305a695348646b5546686d61317075636b5a4c645770434e6c6c3057586c6a6546683556455a4c61545a53517a59304e456c56524442485247394a513264495745646e5a58703062476f3252485a7a4f4564535648527261445a4e5a455a46626d706c4c334648646b4931565442514f454e5756484a7063306b3064555a5961564e304f474654656a6858593352524e6e705253544a70596b737262475a4a4c324e765a6d4a524d6e4e764e47786a574752754c3234336258567364557856546e5a4c4b327372516d343462486c47644373335a47786c566c6f3061574d346548684561307734636e6c71624338314f5767765a4768524f57777a566a6c585169393155316c784d484d3562324e704d6a566b4c326c7353445a6a65574a6f646c6c6f61465679596e4d7962475932614868684f5756475179396a4e6a46324d32677a566e5a434d315a335653395965445a685255396d4e485a686130394f5a484270566d5a6c4e485a354f48705459334e5452577852576d59794d557444554442304e5464714d6d3034644338784b32704364474a6d4d474a306445564a543270695a6d5a48636b5a3155584e504c7a64684e5642355a464a5a626c41765a484644626b68735545646e56446c52546b6b334e6a5657636c4634626d747a635559775a69733459575a424e5546496547564d553035574e7a56586357464c4f574a765931647357587030546b6c506445683459586778613363304d6e42684d30526b55544535574531355747465857474e5762334e775a573872596b557256464232646a6c4f627a6b3257476c44596e4a544e4445304d43395a57446432546e7031623035474d48464c544751314e55517863557734626b6853654456465246685163325269646d593256336b31576b677856564e516254643663465579636c6834556c4d354e4864325443397453326b77647a56516232564f51553968596b7055536b784a4f54564b5132747859573834593349356457733062464271646d5a52576c6c694e47684a4c335a576445343562584e7a4c3142525256524c4d53744c526d5a575a30646e55555a4351565a42565556435555464255555a52526b4a425655464252554a5255555932516b52744e484a305244563262476f35656b7776554752485a6b67354d6b5a6c5a6e4a744e47517a536c523355305a356332707061797436566a4635536d315956475a344e325179646c597956335a46556c4e4c5357744d5431684564544e5161446c574d4739565444564f62465644546d396a535856595932526d5a6e646f52575a6b5a6a424c556b4a4c4c305a735345686f52446c6d64466377596d746d646d707a636c4e426545565355327377526d3032576e513463566842566c70505579737a516c68324d544e4755576c685244464a533234776555784c5a4864764e5559354e6d78515245567252334a465632785354585a696332557a4f544d7a596a527852565647596c4e3161336c32646c41784b324651567a4e7464464270635373315256424b576c52785a464a514d3059794d326c6d62465a525645343363576c4e4d3245724e30525a5932567762457476615574584e3039705932467456307046516b4e3151305273566b7448596b4e514e6b453264306c7861556c50566d4d315a574e72516d3143526a4278546b6835526d7049516d317851586c3062486c546558464653574a574d573172644655785244686e536a46705332397755464e466357683363314a73517a566954464a4556484a42623346504c31526e516b4e336230316e536c706e566b5a55616b467963554a5352564d72555556784e456c3153316c715158467851586c4e4d314a4f597a424d5a44464d53474e4d626b7830646a5a33566d6c4c51305a56616e52355a327473516a565259584e36656c46715630557a654538345a6a685061476c4f6230525161304a5064554e426347684e4f46524b616a6c465648706e5a46564a55335a5252544234523155305a32704e556e5242536d4e76536d785259574d77527a466e5630354c596c703355456c5a566b49304d6e686b5557317453586c6e5553745252586b30536b39685245743353477446516d6c4c5155466155564e4f5955524b5156564a51314e6e5a306c6e533046445130467653554e4a5132646e53304644513046705157394a513264425a32644c513046705157394253556c445a32644a5a3074445157394253556c4453554e6e5a30744251304e5263693831556b4a514f48673559546c32543356775130463262693830646b78576454647354464d775357466f6544557a62464a544f46417652557431625535774f4759344d574a7859334251616e4656637939544e317030626a4d7a64575a6963474d7265556c745a7a6c695246464564446b324f45597a646a4e6a646c525a56466c5655325978615739344d533961656d68785a6d3546646b52344f4374565456677a62444e744e69396853455a6f643164505a58524d53586c6955444a7a56555653644567314d6b3971596e525664464a4e656b566f5547317654335a715757316e4e316c6f4e6e417962544a68596c7068626c687a646c7072596c4a534e45467554484e35574868364e6a5a6b6344593555444647634670574c3270486369383356334a6b5a4746434d30526b5a45517961545a73633146745132393363316c684f474a4b64446c464e544251543268754e314253626b56756355524a5632677a576b704e52454e564d304a48516c4652526b4643516b465652554a46516c466e5a4868564c307776524464565955523052554a5763326836626e46305355356a635567726255645a63544e484d4446426157646b51565646516c464251564647516b465751565642515556435556464755555a43515656425155564356554a5255555a4251554a425655564356554a5251554652526b4a42566b465652554a5251554652526c4647516b465651554646516c5643555646475130467a63326c366257453162304a795245744357546c745157784a4f45464a53554e6e5a306c6e533046445130467653554e4a5132646e59554e6b4e43737a4e587044526a6c525a574e73635774744e316732596d467261586845565564705447355255446b344e4445315a5668334d456c68623074474b7938354e7a46494b7a526b644464735247646865453543597939566547356d4e484671616a426f4d57526f63554a6b526c5658626e466d4d4852306148424b52444e52596b74694e33527662576f315a317034543155764b304e4d613035525179745154324d77616c4a6b5258557a6132564a64477045646d59304d484649516b6c445a32355a4e44637a56485247565468534e47784356475935596d70365345464e6155744a536d464857475254546b70496156637956324669616a6c794c307833646d707562446443537a424b5231526b6455747856444a6a4b3035535448564c5644527464476858596b396a4d6c687056554e4a63576473576d31754d69746c52314277646e684c513230725258424c51323478636c6c454f57524952574a52647a4a6d636b396a55585a4964793957556c567565584178524456314e6c686e57577035536d394a5a556f774b7a645162466b31536e684d646c41786346426f593346574d48564c5754413254334a6154444e554f464652597974744f577848534867335957746c65456856565731774c3370576146424661555247625442796448497253464e4665456856566b64774c3073355656413256323946526c4e5a5231563264484a53635649325657353652336879566a4e36576b3556564864526447354f636b686f62797457566b3435616c4654546d34764b30773065556846516e59335933425963566c59636e6f774e5670704e3263354d487052543034775a564245636d3179556c70364d45704e5658597656484e74545756724b335930535539755a544a79626d74584b3251305656524a52557850646c453052584e7465564247596d644365546476643352574c3259785232497a5247646c4e6e686f6332745355327779656a68574f544d774d456c455a305a564e6b465364456477614852455a464e5952573543546b565052484e4255315a30526d6f784e327435556e647a63446c5264334e4c63484a42525735575a6d4d314d325275595441314f44524d616e4e4753586c6e566d4651626a4e3062474e5857464a4d526b45785244424c63486c5856584a30636a5a4e623277314d4468474e314a784f557854567a4a734f4770734e5442706246424357444244636c49344b326f34563052524f464a3361793943595442685547457962575278536d394a5355785053335636616a426d626a4630515374706355646c51314a6f6346707861314a51626a566f557a426d63327868536c5a7961455a4a5754645565484a464e6a5a4d5a576c61627a4a52616d39544d6b565655585255646e4a68515870574d7a56436544684d4e537434616b5646576b7732535756704d464632564441765930777a526b517863304e3563555a52644774694e4668355432356f626c6871613352506347645964474d76555774705a316c7a4e6b354c526a68336148563463555a48516d457959544e72546d6855536e457a5331646f597a683255485659574764324d556c79556b704365454a524d336c435157564f55576330536b3946536c464a59577875555531706456673362444a5a4e336c6a595531424e6a464b56327061656d64714e57645764306c4862304e6e55324e4564464a4b627a4e736455784d6430397a53473953566b4a354d466c4d626e4a72536e427054573830656c4a76556d524252476476536d7852593356745957673351304a68576c526d54576c57544764575a3046446179733155466455526b6c42516e42495a32677854575a494e305a45526c5a76636d5a5762326c70637a684559545a4a615763355a314a4f53327469556d74426357314f576e4646536d466e63334a7561486b305a486869626e4644536c425653466874644846784f45786b4d6e4a7a4c315976576b564a595778515558567353324a4d546e51334d4552495931684857444532596b56354d47646159316c31635645354f546435525652314c31687553466c4353446c5253553574546d394b533256494d335a6a546d6c32613352434d55497265486847576d56334e56465752474a4656464e4d62335a6a4f574a4b597a566a646d395355566f775630356b536c706e4e5459776156703555544e4e626e42545556497856334e594d6e426a546d744362544a48526d3430536d317857445a79656a425a5a44686854336b77634756446157397a64474a4a546d74554d586b72615374764d4339554d31426a517a424d614655335579747651305647557a52455532706b636a5270597939735a6e67314e554e7653544650516b6b774c3068744e325a5065476c32516d396c57556c74636b5a5355316778544374595356704c565578504f4546574d57316f62327846624441314b7a6c5061576f76627a6c774e6c51774c3264705957746c61466c36635574766256707065466b794d5735794f47466e4e336847636e68594c315177574568305a4668336333457664444e6b52453944626d315062307459563345775a7a56686130684b546e42465646464c634555784d58564b6356563252557433533031585957687a566d74725a31704a5544684c545546435a48564865476f326446647a6155464251554642516b705356545646636d744b5a32646e5054303d),
(2, 'Luz', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464b4e4546425155527a5130465a5155464251305a69654374345155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e736246424251554646526e524b556b56475657564f636e4e755a6a45784d6e705a574868784f5445346269395651324e4b54566c4856554e4e6545354662564e4565554a475257357052457043626c467353315178516a566e6347566c62314252525842545932394f57555a6d574374316557397462564e426130523351546845656d354a55477034636c5a7a52585a3665475a3152476f30645578774e6c6c725a3164714e6a4d785745394d6345737a6132553264334a334f5338314f45353353324657626d7868655452305955597752554e434e4552475558526a4e57526d4d305578656b68325755524a54464577546e686f5245464c4d455a6965546c6a554530334d30395364305633524646475256673452307843544649785244466a4e58526b614659334e6c5a73515563765a5778744d476f335a4574364e546855567a6846575764365155686c55454a5254474a4f4f454e4457546730546d74356130466964307079516e55334d47517954566b33575868795230467062484a425157564e545552304e566779626e46435533517653564d315a30465164304647515767345255526a54316c42596e566d633264315930307a61574a3352307332646b526f5443383355554e6c6257786955316c575a4764344d57395464326b3565454e325247457a55334576626d51345a475a4d5a7a67795248597a63324e4e4e30465951566333626d4e34617a4132536a5a555a7a593365556f77546b526b636a427853585a72626c4e7a57575a485433567552566c31546b7454544549775445525459544e6d62453568646b7059616c5a7a4e4778684f5752724c31524d6545354652304a576432453355484e35634842764e57564f4e4468584c30637263584a49593074574b3355325954597a63556c484e6c6459576d4a4d4e445235616e55354e4868335a55314964454e6c4c326872626e564b526d6f7a57566c755547633451544e356145747a63315a3664464e7365564e694d6b35366356566d4d324e70626a4e7a4c3078474e48425955537455616d77355657747a61455572636d465562446730543230796545645964316c7552335a32637a5a3657484e6f574567315a486859647a684b4d7a564464575270546c70724e6939524d3170515a69747354325676566c426e596d565551325a57576b637662584e334b304a68515870736144564b576e64425a6b4a5052485233623056316245467a4d3231456430785465455273643249775455564a513370366344683063304e4d655534346147743657565a47536a56316555354a4e4734304d326873513167315453737263577335534564735a6e5976546a5a434e314233614467725a4646585448647254585679635446444f444e3563315a6d596a413262573972576b686c4f574a35535568534d6c677953564e7456453146635446495a6a6c79656a453255564d76526a52435a335a4c64544e7159585a7455433972566d67326157553557477331565752315332706d5243397761556c584d3056785644644651533876544735495a6d4650516b59346447464964585659643345786154424c626d677852303076526e6852656d6445647938324e48424f536d68744f45744961574e55535755345179737765585a6f4e4456705957673553326c6f646d6c334e6e703551576c6c547a6b725632704b516e5a474d453945654730766230686f59544e514d5551786255645a637a645957475130614668324e556859646a5650576d56304d336b78634770325348426e633252724c7a417a55574a354d585972526b7070626d303452315a70546a4d7a5545785764336372636a524a5748565a646939796444566161307433617a513364465a3564565279616d5647644545784f57737a5a6a464957546c574d43746851314a5965576861646b74684e45466f5745396854466f3155456331614564355745705754475130546d39506446566e557a553065466c76566c593364576c6a5458453451584a364b3356735445706a526c5a6a54464a4c537a67324e444a77645531355a69747056574646556a6c4d526a524e4e6b644565455243543035555569744d516a4a31626c7032526c6c50536e524d6479747664466c504d6e4e6b616c4e72595642584e6b78434e6e4e59596e4d724d485231526d74505a335a4559585a59576e5a4861564645636e687563336f79654870614d56706e596b3878537a466c4d6a424d5557356a5a575233556c4268546e6b795a314a4955545a4f636c5134635735784e6c6c334e3039486331686e536c4e78645446305a467070626e5a77516b4a4f51564e70516d70685648513264587078526e59304f4768735632453562574d78623046764f475a7162546b335754517857486c7462307474567a4a365a6e5247654642796331525151324a5562446377516e5a515a476859596b35504e566475593031694d437470596e5668536b39536132527459584e554d7a46754b33707263335534516d706b4c307451556e706a596b4e3364334a506344466d6358644e52316f79566a6470566b5a566132646d4b30395664335a4f64585a575a5849784e6c5a79646a493252566f7a59326f3563335259616e67325a7a684559546853576a4a595a6a566d517a597654587077616a6868516d3179596e4e7a53477835526d313063484643625539476448464c4e334a5a544735724e584e6b5554497a4e30787364335a3452444a4c645445784e445a74596b6856546e70354c314a535a474d354e32524d61464532525731775631637652324651596e4a744c3031305957526956566c6e4f5570554d6e703361314677576e56325933683654444a456447705156326843564870505a6d67765556426b4d5664694d306848596c56425956463355565a4b5a576468546d5a435a7a686c6432314853577036656e4e555231705a655668464e44566e546a6c57526e6b765933684b64484a53576a4a366547787651553833626c707a5644644751575a425a6e6477626b4d7a4e79747154553571564739795347685351554d764e5846564b325934596a6c326557463551586f784e4374754d57566c5644647463564a75566d686863474e6c4e6b68535554686f564756695a3235334e305a744f58424e5748467857557849517a46574d334245596e70465a455a7756574676533142425a6a563259577442534752504d48457961476c55615463304e325a765132527563474a72544746524e565a3661586873516e4e6c62574a4456574e5659565a704d58565363574d78614664324e55387a546b6c6c547a52615545673054484e45645846324f57395852466852566e4e75655763774f557430536e426f4d6b5a5a646a4a4a5243745955314e7a63566732626d317161327372526a417a62315279646c517962575a3361314269596c565764465a3654467036545578786357464963475a6b576c684364336835644642594d584e7a566a6378563073356445513461464e59537a637a5347316e516c5a786432354856544e685669744c4e545a34596d3935644535355a32646f4e316c5153456455564578584d5578334f46427961554d315a304a325545686c4e33424d5a47706d59574a4764585647635739555a5574584e7a646d64455134616e4256516a4e77555563344f474e44636e6730536e42355330314b646e4a7559576334556c4668593039455348567a61475134566a5679516a4d31593170535654685051334269636e46504e56646d52306446654852586558457853575976533264335555677a63544a42624564774f467078654552755a48527454564e4d51325a6e6432353356484e4a596b526b6131686f576e4e4555476b32656d707952485a73633068335a6e52474e316c5864573133636e6331517a465859314e736457565461544d794d31644653304a616244424d525863304f45646f546a46454d7a6c4b64334a4859545a766244563362307477626d77795547566c51574a36616d4e4662306c6f5632457251306454636b646e52474a4459545273536c4e7062324e69656b7843646d6454593251724d6b5a614b33686c5330687959314a4757564933643167795333463453555a314f5531555a4764476545786c6145743557464e6e533268755658423655324d7a4d576b34597a687765556f776354466a633046314d45566f64537474576d395956306b7863576b775353746e65585131556e564857486c324e485a734d6a466c637a42466369747956484a48566a4133556a5659556d467362445276536b4a4461466f33576c70585657746e4d557457556b4a36623352335333687856474d7a656e4a54566c6c5356546c5163324650647a5579637939735a554e47646b38766157357a59585a495930356e4c336856643256435930784354484e325a7a68354e334e5a55484a6e554859334e56466e646d64495a6c56454e485258596a4273646e41724e6d64586131706d626d3158563239714f575672623345785557777263307475513352686243394d5930395665697479556c5a68556c6334616b353559584e344d554e6d54793973563164545547785a556d7068556b51764e484e556455313459585a585a30316163586c5a63304a7a4f573476626a6c4e575649324e446b354c3345335256684f4d5656454f576861547a5a364e3270615432357053564e6c6432395365475a765a31706a56484677566d49335a48643662566335623039735245684a5747394b64557846564642446447743463545645576b524b635646484d32644a597a5269516a643355584a4d6231646c53454d7a4c314d79516c4e76656d357a6331687162566c6c62326f31644852425a7939315a47683454484e49564452345a4846534c334a71625563774f45733453317034637a59315956424a596b3831536c52515233685964336c74636d777753454661636c6c7a656c4a495a476c7352474668626a4e306332567053474a4f646e5a424e6d637753473576646c6333624564424d6e68704f45354d645731696554513254326842616a68516231643356574d7a5a5868454d336c774e5864684c305261646c45314e484a68556b4e32556b314d4d546845596d6c78644774684e6d52695a564e486147786e565652474d6d4e7856307071567974526148687759334e75654756555133426b574755784d31526852473177557a6878543352506458417665545a4c4e6e4e6f523152325555566162564d77626d4e735631427064454e774f5774754d56524a64574d7961335a6963335a58545842474d453543526a46774f566854614855325630394e597a4636526d303463456836595868596343394755456c6b555746325631685a646e70556445356c615642504e6e424d51326c614f584a7054315a684d575248596a56464d564e4d6147746d65544e4d5a30316d645468424e316f765230744962466c326232524e53546c34656d64684e6e4e585232783164305a7863586434516c644d6448426b62574d30623352684c32673563465a5663316c54643351315a6e4e484e454a4b4e544e72574852505a5842444d544a756446687a555663334d48686955484a6d61586c56647a6372556a4e6963444a755254457a4d336f7a526c6c4c4f54647162574d354d45307664316c77644842594f4578595332733355586f33554652794d3356354f4656354b31417854316c6c6145524d6347706c5931424955305279645456564d5535455244526955316c7064315a69656c64796355396f56454a5556445a3655457036624735685a323961576d314e52444e61526b6b79566a5a724c3078715648464e64567072566e4e7164315655635868765430645156457876566c59795347705255336479515568695a446b7859336c594f56565555336c325a44524a5a57564d4d584d7856476c336257644c4e58526e4e336c5363586b7a596e56765a6b77794f5751724d545a68534373794e5870774f555a424e32315a634578785a6d383256324a4d4d7a6458556939705a306445616b3554513168486157746b65484a4f596c45324d6a4e525a6c4674636e6876636d396c63556c7765545a5761575274513278315955787651565a77566d396d5244553162577332576e5a4b654868544d7a6c474d48426b4e576f334b314932656e644d57475a4356314255644763774c305a42597a4259636d78745a30467a4e556c50656e68524e6b786157484a5055475533627a427655334e6f4e304a5864336c6f4f47343356473579516c5a305a46706f55314e6d523346334e48466d4b7a6853554446344d304a514d484a5061444e3364545a7952577879626b6448536d5278596b685a64565a70626c4236613263334e477051566c6c61564555344c305a4e4e325a76656b703152467078536d677256475a615748644464305a4f64465a7a566b4e6a4e544a32567a68596343745152305a435545744463474648534670704d7a5a4d566d5978623056696557786e4e55524d55574a6d63304a6d4e555279656c45795346526b596d73354e336b784d467072616b706f59585a7353544e4c5158637665553145546b51305357463359304e776456706855464979564459334d6c6851626e526e4d454e5963446b314d3078774b326c6b566c4e485748564c4e6b78525257563563457777626d45774b7a56434f5535465a446c4e616c4668646d4e42636a4e5a616b35426230387a57577475636b45325247784a5133526962577074633256516257396855455a4e516a4a4b5a46564f5a6e425357553945526a424d52315a3059325278567a6b304f474a5655577479523078305557356c4d45396c513370564d6e46564d6c466a52585a6f4e465678546c4a4762584e716354497a53324e305a554a5253474e6e4f566873576c67766447745465466c4c52546c724e6c5670623152754b79733352584d775344564b644856355a456c33625545785746643456573543566d4e6c5a7a5a6c59565a4d51584972644856365a54597264553131623351794e475a76616c68724e6e7030615459784d3046345233633552477045566c704d54455a79523370354b334e4361485578636e5930636e5236615746464d6a4a59567a4d7855585976647a644a4d56684d596c5271625456314d585a6a536a5a46535852594e6d39694f4846794f464e78636c593352304e77536b647a636d6c72566d644a564770614f444a4764584a4e656c6872557a524b6246706965485644646b4a4c6444684e554452794d3270694e7a4e5053307777646b4a345355396c6132704e4d45566d524670344e6a52756148564f6269395662484e6d63575243616a52475755524951315268556e6c4a4e6a564c576e646d576e6c6e55473969616c5a6d64485274517a557a53336c335a47526a516b46555a5545304d444243636d745a4f4746684d6a56474e5768694f544d3563334249616e6c6a556d3976593078526556565756484277637a647262587076616b34794e5735736156557753544579566b314b615456436444426856316c71546c68706346684f56316453616a5a6d57587049516c526d53553559626e4e4a626e4632654568584f44645454574972627a5231536d4a7159564a484e545a365a454d7951576c34596e5a7561567068646e4a585754684c59544e6a645539335a5535506230784e516b6c7657555a495933564f656e4a444e3359724e305a684d58426a4e585652596d5659536d5a4f4e5864685a6d6c61516b31315155356c52315632546d4a5857576f346547633459546832574668525a564234564531695a48704f4e6b3942574456785930645854324a7253306874644551344d5773794e797431576e4d3164545632526c4a36515845345a79387657584636525773764e53395351307858596c64505648637a5a585576623263314d337050526a5661595730774d6b647564585657616c5a4a626a4e765343397657454a614b316b3456446c31626c46495a336330516b5a4f57445176526b6f76516a5978656d744b6432525756334d78656b6b304e7a5a6a63546857616a5655556d524a55304e6d54453431646b354e554768765931644e4d7a6c525658687a635574744e544e7362554e555154677864586f33593030315a79746d59556c504e45493051556334646d39764f47565752586c6e523256745a54526d5157307964554e43646b46445930786b4e4746554d454a79643045764c3278724e30593451324a4c616d686c51574a35643364616445744b61464172516d4e445248686163304e325158706e6432564d516a46525354684b4e303936536d4e425247564755473877646b564955475a32644731544e6b464f4d56646a526e70725456686e4e33637261585236516b52364d456454655756475931646855486f72626a526155546c3354334e325a6e46435644644d626c5a30574768366331524c55484e49616a4a4f54566835596c5a6c53465a495758565954314e6a624463304d33646d5a446b335544523451303978626c424d5a444e72526b343055584a614e4578444e6a6c4e5346704f646d526e5156424652473548574764735a6b6836643367786155523561545930567a513363485a77536d7057556d686a5345564354336853536a6c465a334d30576b67794f585657635468534e305a33626e6c56536a4a79646a4a46526a4a4c4f474a784d455a4661466377646d686f4d6b526f524652695a6e6c5064325979554864685155784b5931684d634539586453383351544e7752575a4c64564e304d33706a5158566863545236556b74706155707853464d726355677a4e7a4a59656a4a5856306c6863475a6c4d5746364e6b74594d58704e624651725630783453556c425346465251564242626d6452516c42425a3264485a45356a5530525154454e4e554852754d6a5a4564445a48616e4a4e576d78345531646c526d6474623256514f4752525348643462453546654870484e7a424a516e4a42626b4a4f5247786159324e43527a687757465177516a524b575738314f44464865584130596b39744b32644d5a4668746256646b5754557651566c345a6a6445656d68794d5539336358557a5a6b70305a46567752793945566e4679566b78474b334e685a554e32647a466c61303542546a5a4261564659613264576430524d4f474e7151544e6f56454e43566b4e515a5774694d54644b595752795743396e636b5a484f46524d4e455a43576e5a48554567774d455534647a6c72576a4d31546d6b315355733154323159525735594e45637a526939495a324e56655539365a473032646b566f5a326c6e4d32566a654535324f4446355647643363305a595269746b6433564f4e6b637a626d70524d5774334f454e44536c4a46535539494e335647614746425558644a545546495a314643554546715a3146535245466e6430466c516b46565346687362566c4b647a647262566873556b316a6347773451306b32624764594e305a78616c4930526d314d544652744e6c6c7a5a46593453476c6853307447616b64695346466b557a453551575a4252305a79646c5a47546b4d356132784e596d5a5764305a714d544e4d536c5a6f4e33425a54305649637a527a526d3543644642574e453032516e4a474d573476616a426e567a6444516a647255575134515642494b7a4243534764524e554a734e444a48565563345155526c656b6c556147784a52315a464d484656546d5672616b3955553034316255744e64486457616d497655315249536e55335a46685953324a5155474d765a314a3254444e4d63544646596c6833563142345a6b3878546e64484e6c686165585179546b307761444272523052576431643355455233646d684863464e78596d685756476c6859334a6d4e6b396f5955465264306c4e5155686e55554a515157706e55564a455157633565565a364e6e52555357707854324e6c574641335932313465484e4e61304e5962474d31564452566158686d56474e5955325a344c337074646b5a6d616c5276524749724c7a5642555735544d55705a516e7050576d4a78646d644b596b566a63455244524735485633647851565634647a63726157686f64306f305131425653554a35593156775348523453556379636e553565554e58616c5a32647a5a336230497a624856306545467959576c6e5a485a34596b78304d474a5651565178566e4a68596e42735457394c54544a335247566a5545566e6453744c4d6c6c334e47564c636b52734e6b524c515534775554685851316c73536b744261474a30554655766431565a51555a536348526c576b4e5757475a48515546425155464662455a5561314e315557314451773d3d),
(3, 'Gas', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464c61304642515552335130465a51554642516a6457525646525155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e736246424251554645576a6c4b556b56475657564f636e4e755a6e51784d6a425a56486856597a51725769383453326c43593264685a307453526d526e6457644d556b5a566158564a5257644753444579516d395263454e5756304e785a32746e566b4a4c6232646151565650536a467661305a4256314e6c54336871576e5a6d5a574d315154527a56544a4361586776645642495958683155476f314f486c6b516a6376557a42504e574533627a68535557684f59305a4a53444a755a6b686d4f4746594e7a6c4359554e48566a525a6147564c5a6b597a63537376534339334d304a4459315a765633417a564545334b7a4d335a6d526a5757566f5a31704f537a424d55554a56546c6c3064326f305a327853616e46454d31564556554a496458425a596a5a524f5442715644525856476830537a684359554a33566b56425955684f537a4a5a6245525964544a5054566c56547a51354e6c643451325a58616d70754c335a6c57475a4e5a484e6a523146335a3234355a556470623367314c7a643453303944613264736147357851576c7551575a4b546c5176576d5647656b5651636d687754545977633142524e574e47556b464c614456545a304677535735545a7a4e5a536b5a735655687463444e34556a5242566b6c6959334a576231704853574e4759554e7059304a7863326c30636b354e646c68574d5768535646517751553555644842495454686c51584e72576e6457525546786346644251334642616a4d786446597a52326854614567774e334655574642515a30314b556b465861335a545255314a62304e4d59335178536b3876656a424f5232747653533959516c4e72557a524c556a52585648526f57566855516b316f4e58644b53476861547973774d564652623068435656464f623239705979395051544654525374365a6d467255433958565446306146425463574d35536a6861634842495a7a673454586c514d4546786233467653484642616a4e534e565a554b303430623146714b324e5754444a4d6432784656475135533074615446646c4e45746f647a42715a57464c555663775a485252557a52554e6b357862445a365548465654324631656d685163314d3256565a6b533252715a533879536a4577534764745a334a48556a4d344e484e6b4d4852704d6b564d4b32684354475247616e7075597a6778656a52494e55597264445a555a576c6f533370724f47466a646e6c594d565a7755316c75566c52355757684b5969747261585a555744673063565a4a574770534d564578623239545630394a574530325558424c5357307863555248527973316544424d5532463462314a6a5247467756465277656b553259566c77646e4a78637a4e5453585235555656785456527763454e3357464a4e616939544e6c5a6e526b39706230704b636b7330634864324e584269536b5270536d4a58646e4d78536b786f53485661615735745233465a4b326c74576c644c65565675614739744c305a7a4d55783652307731535578464e584532656c557a63314e7453306857536d6c6a566b733059557851635670324f466c72545846764e6e46475356466a4d476c4257464644526d7335537a6c69546c4e7a5655464c626c4a6a4c30733256336c4f595663355930394c615452425a6a513265564978636c4e75644774495333566b55544e31543356305331553456335a485a45746a4d47783264467046646d4e746455784b616e64764e58465763315a5a527a46526547497655315632526e4a6b566b7330635549774f57744a536c704c595446505132686c4d565976523078494d48564f56473978537a4e794e4374744c30465155305a49556d6c354e6d746162456c795a6d307a61475a6e576b4675556c5a546347525351314e6f645774355256686b5532563656584654576b6c474d305253546b467a6346525562484253566d684a4e47743161575272596c4930635646475156425663584a32556e70505232773365474a52556e4a70596e686d646a42705a477469556a524c55555a425154465855306c7357544a705a6d52545647357257564276656e4a4a53544d72635655335956467352314a4765555249536b45795954426162303956626c46445254524c526a6c585532353459554535537a425861457068564535514d55746e56467045617a466e4e47396c565774574d585655626a4e795a45497856326c7265466c42566b68534b7a5a714d4535724b3246725a6b706c61545654556d5a594f47787152444656595842486446553552334a44646e4a6a534374545530597265477442566c4a594d6e5a695632784b52555a684e485278636d74795a544a73516c4a4a5a565a6c4f465a4764453932536b5271565756744e5338776232564763555a4a6555567356474a36626c5a68656d5275536e427754555a4f4e577455613064574e457452526d396c566c56474e444655597a6c46556a6c6e566b4a3561475a73546d35464e446b784d57395a65486f78534731475a6b5278556b786e5a7a5a6d4d45645355555a3363454a4d563039466245786b4d31466a646e423154464e434e6d6c36633267305556564d6147396d6355353562486c5854304a3051304e7a5933567765545269565656564d4464744f57744f5157316f55475647644570475a46524862454a6b556e4a7a636e68555748646f53554d7754457732566d67785a6e633356555977566b5978526d6479634552365555347252486c6153465976513278534d6e464c4d6c4e7a526a6c7661474a5251577330554442535348426c6546686f544778756357355161555a6b52555a775430357955323078656d564a5955354355305532556d703153326f78626b5535524745726357464d544868756558686c613074684f586c6a61473161546b74355a557476575664565644526e656c467264456f785a6d6b76526c493259544a7665546c516347357564545272644570365933464b4e3235734d5464344d336378654655355a5646365a326430536e6734566938775444525057545a48526b5a4864556c565633673152575934646b3547646e647a4c33686f626e4a504e6a643152555a4c64574d76516d4e76524864795431565355327458543156566348564c57466846616d5256535374305a57704c5347523365474655645449775648463555557470556b465061574577626b564a57465677544567764e33467962544a68547a646f557a4275545574784d30497a5a6c6c75526c51794e554a354f56685a54464a72556b6b346255787756473032595768696545524a54325654646b7853646b565254464e4859555a344d7a426c566a51344f57564455444e6c636d5a316255357052305a704f484645624578565532354b4f4664516155646b52564a794d32747356556c365653396156474e6c4b306c4657477032636a6779626d3432527a464d51693831643035544c335a4c57466c4c4d6a4e75616e6f72626b733459554e355a324a314b33423456473959576e426d4e6a5934554870364d57644b5645307a4e474e77626c52736345467a515539725a3268496245687459586c6864457869566e64485a5456534d474e316454644a4c7a6c5552323559616c6f774f57523352584259526c467563456858614573724d7a567852484e596130314b526a6c565358464e5a587051596c564e53305935566c59795569733355564e544d5552705a6b6852547a424d53315a365657707159554a6d4d7a564363335a6857474676557a42556433564c57475a524e79744d53326c44643068755455357a5a464130553031434e6d4e6d5758683054304e6f5a54464a6557745064476c5a4e586f775955357464486b77537a5a53656a564c536c493153303930537a4a7a536b6c554f565176523156426357517761564e7a62326f77596b316f6131424a4d6d5a73616e426152475a4e5533524c5531704d5532744b626c4e33576c645257464e5052326c6a56553832535652726448465961325a54545756725769394f56305261537a5a484e545256546a557a4d576459556b396c515578566347786151336f77645574744d54637a5a314a54614642314e56464d4f58424f4d6a424553314e546431644f5a485a55615464455331687863574a6b62306c56544842775233464f4f56684c5a55466a634777775a327068526d646c6155453163336c78624764325233464c55486c6c4c30737761466856556c4e4e536c6874576d64324f57704a4c7a425651793977576e564b4b7a5a695a303577524563304e6b685a646e6849533356475a6b777854576c30526a51335957303454334e4d6348566a5a3370595a6b6877643268366430524a5a33464c56336c7a5558526b55553959626b6c4a4d6d786c596a673251573932646e565863453576566a5a4c4f445572526b354a5958466d626e52706230463265553876546c524c61486b7653323545516d565554474e5565573150536c6875626d354e52473579626b35736345645162315670593078774d466846623167315a6e5a7959575a6c59564e3352446b786347686d556d74315353743063576f354d30565765556830526b78345431424c546b68486358707a4f47743455305a4e536a6c5a5a6a5535656d4a33656c464a4d31425354486c7a4e464a454c316448516e4e49556a5249614852424d6e49354e4746756347463053584a4255314a315a6b3974643070784b7a4e325a6d74594e6c64724c306833626a5a4a4d6d4e6c5546645654326c74624846764d7a466b614374556557564a6430645664464531566c424856564a47613368455355395651336772576c565a52586c6951336f34516c567162555a54615568725545394461314a326456466a5a7a5259647a6c505a33425a567938764d6b78775545526851575249616d6830515339775445704d516b78444d54686f5a7a417a616d5a464f55467053445a775a56425a535578584d576c48543239744d6e466c5756527862456c4f4f48424f613268304e573943526d394d4b3077306457354255325a6d4e3342454f47704854564651526e55764d6e4e6d62584e79636a46435a4856424f4656726154567a5544513562457051527a524c54464273633035534d7a5a6a62566b7a5746493054305572516d746f544546614f4670584f58524b55584a714c3059355358413464456471656e52476247686b55314d306257383353474a7a556b466862586468626e4a774e6b30765131525564454e78626a4972646d35554e444a58644845784e44593256446843526d64355a327030536a567a54316454556b4e4555484a46536b52746557646d546d67305433525863486845556c4a425a30526c55326c695558467654576c4762557472524746325a45706a516d4930576b6872626a4a57627a5a42546b394c5133466c62473569556c4250556c6c5052797436525763335a544a7463574a726231565a515539436379396b59545579656b5236526b686d616d677a4c315247516c4e47624756745932745652444654535868326248464d4b314576536e64776232744951314278636a566d61584a46525642765244427352556c3153327732596c5a4c54555651626a6377513364786256686e4e6d5572646c46754d7a5a555a58423053544650635731464e56684463445532536d56764e5768485530394761336c466131493261555a42543270525746643154336c42566b73305330465353554654626c56475a457049536d566a595459305755777752327830546c527263466845556b35515645647252335a69554770514d564a5a567a4e3556334a3462564e725357396c63553533565739534e6c4e4c647a4a4861554a47596e705364465a6161307076655374445648684a64554e72616a6c4b4f457442526b3978595773776355633553556852527a4178576a4a36623235795958527563565a564f57784d51307734616a6c78553056504b3141765446565957564a52524442715a6e704f4d55784264307442555739425654426e5a6e426f64486b7656584a3164466c75636d525a5758703563316f766448526e62464e73634652495a4642484e484e48656a557955465a745747593461574576615534775354453554454e5a516e424459326861556c6443516e644454464e6c5648497761575672526a426c4d6d64786232387a516d4a7363575532646e424657445533646d7055555870525a47347a54464e72527a5a4c65464e524e6b6c5156564a555a57746a634564585a7a4e4355555a724d33704f634556455331646e56457453655568614f4852474b3164795a555a735543746e656a526d4d46686e615578545a554e7252464d766355395159326475617a677a556c4d3263586377566b68716269394864544a6f4e6b5273536a4a3062537442526c424d6132393063797472546d4657646d383461554e785257567252466c58656d686a64485134656a4d34576a64364c3368485953744b54455a6d5933557653464172545551774d57307857467036513078615a7a4530644642425332687a656c51775656524a4d314a3054584e50536d647a537a68436348424c516d784a65544a504c7a425257464e4557566877626c564d6147786c4b303955647a51764c7974554e334e4d636e56435a5656714e3056516554564f63574e70624538765a575249616c685854324e5255453570566b357a544656454e6d6433614756796158523364453949627a6778656c6876637a5a325a586873526974726230314763324a7462336c34566e686b4b3259725555347264456735624570324d5738724d6c4e734e45564c617a646f4e533835616c5a764f457071556d746d4f5574734e575a335657744e6231526f4b305a79556a55724f584261576b78526232523162334e7a536a6c6955455a4257555a72635668454e444a595a6c567a616d5172575756466248705755465251636b4e344f453944537a684b5532394b516d59355257467757584e316257746b57445678635456435957644a4d3239595746526962464a6b596d5572595870724d7a5a34566b567351324e6c5a576c444b323830516c6333656e68524e327733646d68304e45646b5455464c62306c315748464e61445a324e5870724f5759795457684b62544a444f54686156335a5252545a6a4e334a3152486f7a4d6d31756144426a526a5645595546435631424f57574e53656e6c61563170494c7a46515a57566f54325a57597a5a6157545632516e5a32516c4e69644442516248686b64306876616b465a633368595647787752466c6a526c63336358597861486b7757457732564546505a6b467557553432556b4a525a53746a6431564c4f4863334d6b78534d454a6c65584e4a563235714f574d794f57637a4f585a4f4c3146495a6d7034526e5661526b4631636b785457574d304e6e52684e4746525630395753565931595452454e6d4e30536a6c534b7a4e684f454934556d527565444a495a56704d65566c454e6d6879556a4977655339564e315a74634745785644645563533949556b524c5a335a7a55446c32635746744e48567a655646476144685a616974354d6c6479595445794d47314b4f574e75526b74534d58464762465172647a4661516e7058525739595932317a55316b3355465a495a5539485648557761304e355a3046504d55315a55465a6b6148566d52574647646d467a63324e5763466c425a6c525557444248625556356431464e52334a6c576c42795a6b315665546c5355306c75536c45334c314a33536d7472564670445533566954323478527a5a7965564a305179383355335a6c534668554d45396d626e5134576c5632526a4a455645354251565a31596b39695446426a4e79387252554a6b536a6c4463565a69557974495a445979596b684a55585675597a52734f544a6853323933646e67724b7939494f466b72516d357a53477456535655304b305636635739554d6c706e646a5533536c5a6c637a42425648426d65575a6a566e4932527a527662304d3559584673543356784c7a6855517a64736445566a57464654566d59355958707264444a6959326b35516d5a525a30397264466461625442444e454a68625852424d546c55646e68585131424b62325630536b6835556c524f523264794d444e764e4846744d3363314d6d355365574977616a684962556c46516d5a55543155725354424854475671555455325a555a476455525153445a44516938305a30686c515535435432644f5957686d553278344e307853513356754f554a475a324a586556493262326b77556b526d65446c424e7a5a7552474a705330466b536d687856304d3456487057527a6442646e426e654846315579397a56336c70517a56545956684d5630733154325934616b564962306b78526a42565933704f634664485448686c56477436576d523155484244636b464962314179526a6c78564563326545463363456851557a46586243746863555a4b6343396153793830524846794d574a464d57396d566b7846624746344e553953643156794d45395864456f76616e6c4b574456304f564a77616c59765133704251566732576e686a517a46544f554a46515546425155465456565a50556b733151316c4a5354303d),
(4, 'Advertencia', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155465061304642515552435130465a5155464251584635536d55305155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e736246424251554644627a564b556b56475657564f636e4e755a555a344d6e705a5657644b4f546b76567a6c305755685a513039345430567555305231516b5a46626d74456345493251544a5651324e77545656485a554e50516b3556626d6c4565554a7a4e4556796244524e4d6d4a4b54564e68555556465a7939424f546b7a65445a304e4456305a33703351586732535767345a5652344f4752495a32566e627a4e59567a563253584a735a474a49616d55724b3167784d6b6f314d314d32646e566d646e5a424d44425a52486c6b5355646e4d5668684f575a6161315176636d4a75626c59336130705a536b6c56616b64444d6e5a78596e5a505a585a765a466731596c683654544a355a3074535a314e4e4e5535326153743263314631546e64535132354f53555531566e464b4f456473516c45315a6a4e354b335647625446535347526e533152336247744c5a556831636a684e4e304e6a6254423659306c4753464e4b5657644c636a4a6d55485661646b354d53304e456545526a4d33463353314e616379394e643039354e574578595752464c7a527059574532545668495a7a644e5a6a5131544446364e4755776256684a563231505a33493255445651543256315979744d63555670595778685156687257444631556b565755304a46566c5652526b6c46556c5a52613268534d30314661454977565446545a537470536e425662306f7256453934646c46735557745555566b356446524b536a6c484b7a6446516b6c6c6130525365554e75617a5a4563466c3552326c4854545a5862327471576c566963317073536a4646597a52594f55526b55304a76596d7868564870765332704f4b334a5462586b315254424b626c49334e47784f62575933546d31554d444e775a576c54546b746d656b784f5747396e4e305657557a6777643278756348686a643277306133705a4e304e3655316b316233645156555a6959304e7262473950597a6735623268734b33704c5657745055306476543235554d4373775158705157564d35536b5272614846706145557a4e564a7a4d486c6852327448576b525651334a7654314268593170486330356c5555354d5a7a5a4864336876556d746854314a6a5a58424452334242555768365a445a4f536b6861647a6c535a45746e57575530526e706a516b466f6356457953316c524d48564d5956464e62326c7255574670526c426b52335656555751336344426e4e6b64485545704f4c3168325655566e576c4a4f54454a5a5253387759305255576d6331556b4a4b547a426b5658597254324a364c304e5961565230616c5a4d553074355a7a4a4f54336c6b53573174646c6c544e584a4c616a6c764f47646b4e334177616e4675595731524b33566a56454a7164327335565846504e565a454e6a5676533364474d4774614f5756505356526e63574642565777354d305670617939325655526c4e6d524a5a577052526b6c57626e5a56527a524755316b725131426b534768736146427a626c4e4b634670356155684e6258705a5533685a5747747559554e515a45686f623252335332747559576c4e614552744c334a484f46526e536d4d784e4568455747744555335a6c61473975626b303162457044576c464c5555314a6257747959327734596d68594e6b46524e327457536b3477596a56795357353561304e4b6345565a63486847596e46594e555a345744464364554a5661324a785554425052334a7353453552567a4e4b576b7431523046326246564c6430354564586c6b53585672656d7846546a5671595668715a557053596c466b5447354e536d5a5655446430613167794e47786b4d47784d633170324e6c4a354e334a354f48686c535664744b316c584e585172554539345669397151314a45536b39485933686156584e7861485a4c56586449646c6c70595656615555527056537454596b31306444564c636e42455653745361485935526b5670595649775a6b687255484a495a7a5a504d3170476248564b5647524b6154526f5130707553306c744f556472613370485533426e646d7856546b745a646d4a51595538344d5570566333466f4e304e6c56324a614b334e565a317036613170536555745062564a55596d315757454e5464454e49543152775454526f4e303078516c566f4d58524b654559765a48527054307078546b3172564649725430394955324a57613146484f473159567a42735a46566e4d586f795933427656445a334d79743365456f304e6c46525658593565556c6c62486c4c6557784d56323551646c70725657787059566c4e63476c796346644f5357396f4d55787057473131557a4e5564453556566b784c6232565354477431566c645663464d77526e5a6152576f78626d4a345654563553316c5063464e576230747857437331617a46354e5778615557744b5a6c5651566d6c53566d4a70565778545533524b636e68335332525a4e6b39444d3356534d553571546d35505332497752476f305a6c5271536d784764457053566b7844574551766369746b56464661536c6c4455324e4e56464e366131565a515552515658524b5132565061334d335132493259326c3165464d326357706154584133623270334e4468725546566c4e6d4e34557a4e7662445a694f4570715956464e5a69737857556b726258647a51325a4c636b3477566c5259535842725746453053323168576c686e59537378533278714c305230616d7847556b68336432785064314647525664584e47785361327836517a4e4f4e575650553167325458463065454e616345706d62546c4457544a7a627a6833534374775a32744d57564a355330313657575a7961556c4c5a586c4f5532524a59576f316158685156575273516c704d4e6c45775a546b354d3264465347397462544e4662303172627a52724e7a6c544c3046774f545a4a4e4842355333704753566472646d566c4e6b704a4d6e59764f55355654464e336557314759326c6e54554a324d6b6832556c645453476733625446795a33704854324e614c79737962586b324d566c73636c524c4c303168516c6c61613268685647525454466c6b513064486231687a4b315a58636b56775332314a6457744a56454a61596e4e586158424b556b525a55304a6e5a32704263324654523156524d4568546330706e636e5179536b355661444e4754304e6a53323955526c5a69633164546345527456564636613056556330564e616a5a73655573325a55646963314e685a545a4e556a46315a47684e526b353165466c7861305a585258567a4e315a435957643064466b77526c4e4959544e5a52586377544446534b32464e566b5a3165466c4c6132684d624764745a555273566d744b5446646e6258426d4e464e7159316c544f5664566347464454315a525130566d616b6c4861545673576b4e545258565a655655345a45564b575564545547744b536c4e716131566164584a5a513078614d30647254464d7a5458566f555578366233684953315a6e4e6c4d7863304e6a537a6857535642325648645a5632784a5a4768546155677763444a54536d7042566a6c735958425463584671656a52334b32686e55566c30546e704c6130704d63545a4e54325678546a4978526d35525547553154314e7353456c7661304a79626c4530567a6c524d4778684d445a6c55556c4a543156586547784456576778644539484e54464951315a4f61306376575449335a5774506333424e4e6c566b53575a454d433971566d785453466459575555795631645561444a4f526d746a65464e72627a564754576c475747784e527973315331566a61576c52527a6379566c6372624577776147786f636d786b5357644a4b3052316279743364486335536d52555644565453446b3152445a6d515642794d334e755a6c6c6f5331644664584d7a5645395553486b7a63566335536b74355344464d656c6b304f4563784f473932535842785754526c6245564e516a68476548563459575672626b68426145784a5746685656315a6f55315a4d5332395351316433625855344e316f795a5756796344564c646e464652314a795a54524c57474e705a7a6c4b59544a48544764436132466b646d743451326c72634456575155453562325535566c4e6f536b745a59336c4d51565a4f52554d7853477857637a566c57486734554642555a6e7076556e46444d453535646a6433563142684d5570585954524e4d444d76526d744b536e46344c7a56496458644f4d4452326356457755475a525930786c62585a5252545a6a4f5546694d6d6332556c5a4659304e35635556425345773154546447566c4e71595774776148644b6430394b4d30787957464e57566b314f593068715355464953575248627a5a4e4b30704c56574e446230466d54334656545852775631566a615764425a6e5a725a307857545563794d48424c54314a5251533834656d466f54444630536b4d79526d4e705a30466d5a454e784d305678596c704a59555a56527a4e435457356d54445935596a45774e33686f6256684d63484a77536d39355133703252335a796457316b4c7a49765430314c5556557865546377533278484f57316d53323570656a6c3256315a314e476c4e596b5a4954477070553068595645357763324a344b7a42494e6d3072513278515a544a364d5774554b32356a536b70365a334e72543259346456645353575a5555466868524568694e445a3157486f776554684d546e46494f44593455305534624664344e576c4d556b35566244497663304e6b635767796332347857564275626a4e326169746f63464a334d3142585a464e6162455a7956577868546c6871656a5534616e466f617974546330353464476c61536e67345445524a6158513461316449635649344d305a526554426c4f454a694d6e5a78544842335a455644553155795a31517a51585a6c643268344f546b775a7a46464e4539364b7974354f5852534b324e3559546c52624546365645466a56315a4f65574532536a5a7464487058596d3571596d4e48516b466c56465a444e454e6d516a64494e465235636b5a695633427854573154564663774e473974645552565356646c546c42435a316c6b535535705333424f4e55745059564a6a656a4e425644677a555374435a6e6f356379744a61577335646d646857554d78635746615130464b4c31526156557872645846554e48644a646d3568516d354e5247347252316469636b46366254593154454e715958644a545764454e6a464a56485a4b634570544f584a45524545355231427a5a574e79616b46534f4777326358424a5633644f4d484530517a4a61626a4178546d315656304a6b59577735557a4e724f4570555a6b4a4c556b4a3059306c78617a6c4461584d7a516a457861466b784d545a4c636e685452444275516b3544623342454e444a4e6146526b5231426e5933427662316c72516c4e5262444646566c4d325255524b576e64426133526a4d6a5642565735485a454650553264734d55704f546c52734c324a4f53554e756447394d5257637852554a59546d6f3256464671616e4a5256334254517a4a5257577832595531615645354d4e57706b516b683364584e30524656314e6d3943626b3156633278334d6e6c4663557449646d31536156633563464a7554574e31596a59314d306c4255564673656d4a6d535752545a55315364466b7252437453636d6c68635774564d334a4b6257777864565a575454683256573132566e5a786169395463334d7a5554646c613252494d3142455233466962546c595646685263464234593068465546565057556870526e493256324a74596a5a34516e7068543151314d336f7862573973513256435a484269554867775a79743164485a4d656e426c4d58524a5a586c72646b7834516b643653476f304f574d33557a6c595a6b49785333684f6132686f4e55597964486c72616d74564f586c44633273725a6b52316356524e634764455231707353446c5a616a4e715530566d5a3245356230644a5247677a63335a686357746a4d6a423352584a4a5555464a53587059616a6c6d4e324535556b707151336c42516d677252584d7965584a764d6c4e6963445a5156484e4252453130626d466a6157597a626c6c4c576e553254554a76516d677251307069524778556330397863573153636a68714f55465962323558646c706a5a4549764d7a4e7555315a6c616b7833655646424c7939344d455658645445324e585a68534642775a576c6d6356704f5a3168336547356b4e586c6e553349354d7a46714d6a6876545552354e57557663314135593046424e474a32596c5670567939534e5767354d4578614f586b324d7a59304c32684b5433706e516a42724d564259626d39574d484a4a516e686853544a714d6e59776557355762533877646a5242567a6473656d7378636d677863445a6b4d336f724e32357964446445536e4a4e646c52776248646d6245565254586c75525442784d5756446146413152585a5456474e784d564d7759314671613252436558566f656d317962546849516e59774b334a694d6e5a705647524b64546478596b744f63325a424d57647559316868636b787157585649636d786d64305648515546555133425555484a79616b4a36515546425155464662455a5561314e315557314451773d3d);
INSERT INTO `rmb_icono` (`rmb_icono_id`, `rmb_icono_nom`, `rmb_icono_img`) VALUES
(5, 'Clasificado', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c523264765155464251553554565768465657644251554650643046425155517a5130465a5155464251575633636d684e5155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e73624642425155464a5430354b556b56475657564f636e4e595653744a536b563059533832576c45785355347754466c4d57487071624455335347396e6332686c576d354a54566858576d67325a5778735547355a5433646f6431593154314a6b516d744b4d474e465348647563444e794d3364554e5863784f4734794f46425464334e7156575651564770616330466b5547317a54304e7661445274567a684852455932646e67315332317a5a55387254484a684b32704a65585976556c645352314a494e4339445448493257444a615631706d656e6b354f46677a5448673364446b7a6447644e516e70444f47704556326834534770505243744e6254685153574e6a643246714e576c3352456c6c55556872576a4a4852324d78646a4d725545704f4e303435555535684f454a346145394a5247744e53334a455a556b7861335a554d6b31474e475a344d4664474f446455513256494f474a6b57565a3359314a7a525574354d6b4a4e5a336871546a4e495544677661466c57566d316d4e6e4a7751334e614d47706e626b467554466c4a654568575255684e536939704f56564e4f45357162444a4565575a33595339364e6d46764d6d354e6145645854576c5261565a7a5533525353314e77565456475a456c6c624464455457687056326c5163554a7255465668656d523563323878536d3153527a4a5956455a6e5233643465566478536a5a446355706c5258464a4c32673252327078513274494f446b33615664555a477472576d70455455564557455a4a56553077546a5a705432686852544534524851344c324a6e626a68576247684855586c70626b4d72556e4a4a533239554e555a7261474647656b5a4961474e74546e4d326247685856316c615332396e616e683055577053546c645052306c5563454a3562476c795447684856316c4e5253394754335a56513359334f555256656d637a55556876536d7456516c4a68646a55725a586871554552315458526d536c685065554e5a6547637a52304e78515664784d304656557a6c5356574e515930706b526c5a565554686e4d6c4d355554564b5a5556304b334930546a4250616a4e454e6e64725a5641345a6e70716445565352564e7963553076533370574f554630624846785533526a52444533614446614e5459325354423057564a5763477043643356304f476c6a62324e5152323561536b64614d456c58623064344c30464e53555a746555466c646b684b55334679535539614e31424e4e4870365a43396b626b4e44616e564c4e46417255473977516b6f31636e704457586876647a4a7754584a6e5a6c4e345747303263454a5a53327779656d3578554842544f477732616d56534e3268505431566a624746764f456c4263587033636b7874517a4653596d4e615530466b566c5a795343743252485650564546546354565354306c485748687151554e7a64573956656a564351554a7354475a524c32315a4e6d7442556a6734655535695344644953446c494d555257616d73315a33684f4e6b73725a31644f5a48467351334e735a5663785756565856584e704f45565a5a5339526545553151335a5653484e4b56316c4262556b7962484a32516a52544e466452567a4e7162314a694e3052434f45395457456c6a5454686d556c4979556c466d546e423159546776525746736455553556566c56536b396856474e795a54565a5433466f5a56706d526b463154564e6d556939704c325176616e7031646b3159524664775a6c466a5247786b4d48705a5a564e4a51334d33526c565456486c4b6444527753334a77574445325a334d3462486c444e5652444f54687863576f3453324e6e53464d78576d6f786369744355556c32593231695248704a4d6d3948576d31506347784c65554e4c55446b3552305934626c4e7564557731645731515248564f554452494e446c69515578494f55314a4e324e6f4d484a4f536b355763334e7454326c715332687663545277625339524b3049325a586c55546d673155556c616231687062334674545574335430647852336834556d73724f485a454b306c505233597a4b304a594d5339714d586c7a4f486873575868354f484e554e6a46544e55357a4d58677657484e47524374306158465953306857556d646e5130317a616a4a4d52546871543364335a485a7a616d6c7a54306c45556e633353584e6d4f484a755444684f576a52694f456857516d5a774f475a5361307372574374515a6e425a5a4649335a48566f654641725644424d4d6d5a6e634864326255683253304e6f6333564662487075626c4a49656b3152566e6f30556d7877513351725a3346594d553936526e646b56577457576b4a554e314a79524664735432463552474a446248706f61474a44616d7070644774736257394d5333525259304e4f556d784c636b4e754e577372616e70365347343154487030544773796358463462455234566d4e72563039724b306857574467335a474976554441796246423254476c535547684a53574649536c6479554739574b7a565865485a75624668554f4339434f53737a596c70564e565a6d617a6c534c326f324d484d30526e467a4d32395a556d70306432314b633368506355526f516c4572556a4255546d643561555a745132314d636c564d5756564661465230646e64545757466c57544248655668355a6b6732546b7052636c4e555433524754323877526e6c4856557836526c52476143394659556478646c4e4e5a565a72626c564555484a4753444a4e4e4752754d6b6c504e6d646c5a4552345a6c4e794e797450566d7836644339574e484a3457454d7a616c5534535546424c3238315a3070354e576c446355564a4e56413452446c6a636c524955466c744e6c4a3154485a725a6e704463456732536e4a364c30464e5756465464464e435531637965557035646a51345a5649794d3256504f455a4952585a356232686962575642565768735a437434617a68684e3056424d305a47633031795a6c6b324d7a4676556c4a4c616e7074516e4e4e615535436554424a4f4452795233524b536c4e4c615778354c3278554e473545537a6859563230765244644861314a4a53477479655664455a6d77724d57564c656a49315348493557466c6c54554a49625559776455357354476c7654303833626d67765256686f533145335a6b4d79535468724d327733656d5130534568724f585977624373784b31686f5256705053464a4c636e684762474e7557584a4456585a47626b77344d6c566b646b3573545664434e6a6c52656c4533576d4a4a54314e5963456c4759556c4c5a335a3561306c566247686f4c797459533246784e6b705a5558425063457049524842794e456c434f55566861326c486357343264555649626c513459306875646d4e766555746c57564a544d54427853335a7256465a4f557a6c7262306377556e5a4f6557686c5a46524e4e564a5461464e364d444a70557a56734e466c4a6254564d616a6436553230724e334a754e546c79626b39776258645152334a4f6545784b62544e55616a4242553052346356684c54335a4853486c776233493164564e57635652345633493353326732557a41775133684d57573152575574314d6c6c6b4b306873566c42684e45464b6553744e5a56566b566a46615631705a516d566f52584a5563473148526b68445a6a524e55585254536d5a324e6b645a656b6379593168775444526c55544a4b566e5a71576e4a4265474a4d4f545a785445704f62444a6f5258424563464d35516d464d6355703163544e6c4d486868635846335769746d4b30744c5433567451544a7354473932615464736444566c56545a514d465a5856545645614852485445525763555652593159314e564269546c413063576c594d6a4a3656454a4c54555647516c704755446c50654870696454686e57545a445a566c6e5531463661546b335a32557862484530636c5a69613342574d554a7a5a6974565a565a4a626a63354f4870354f44644b6232523353457061616e465a546d6c78556b5634536a687a5632466f625651344d7a5a4d63556455596a67795a6b5650596c466f576e4a5863584a4d626b64484e544277576e49355957786f5a56426d5179733454457735616b563262474a734e584a5765454e7057456854576e45784d47746953316430576b64305a6b3147596b34724d314a43544339696547356c545746724d7a5a435543394b616e4a5a555535495157356963565632593274425a6939325243744f4d7a424e65584e684e5852444f4452576247356c616e5a495931706d4e4756314d6b356854336b7659334a49614339476169394f6132705a626d4a4d5a4770484d79744d4e7938335645497251544d764d6c6776516c5a774f445176614564504d587036566b30784e574a56646a6b7a646c64514d6a6879565856574e6e5a6f5243395162305a6a59574a7a523268334e45395753445679615845334d466870596c5a334d4842714e6d4e54545846614d6974724d577872636c425565564a49525531464e575278626c52524c304677556e6b7a4f4731716156646f4e45747a56305a54655759304b335a4d62485256633038344d334a775955706852574933626e51316369394765474a435133706f4d6d4a7764314e475a6d68585a6e4e6b537a5a4756584e57556d567456565a4e544338326157777762457457656c5258576c4a724d584a614e3346484f576f794d4456764d30744e6445686a6158465664564e614e5855785a554e5256314a475532787a636a56324f544a4464454a47654764754d6e70334e6c4630526c4d76656c4276516a64745546647a5430644d51325672596c5659536b39515279737a546d564b53444e4d553246536546426a536b39696456467362474633644570744d484e6854477469566c6861516e6b724b30593056554a555448707757545a746548687162544656566c4d3365575a494d457454526c4178623063775a45744b4b33557953464e4d63323134646d647062485a30557a4d34616e4e744e45785465444646556b5178525574716332354852486776576e705263334255655759304e6a4231634656306445705a5253395257566730556c46584b3346716557704a556e413262457857597a4e4d636c6c6862316435556c466b6455706a51325a73596b355262554672636c6c774e555a4e556d4e735a57746e613170584e697436535338764e6e52694e6b6452613046765247314a656c5234526b78774d444e35636b394a4d6a5a50533368584e557876617a526b597a464f596b526d554442495958567a53554572634551324e6c64494f46686a5a557449516974494d4374574d30684a5a5852714e6c5658526d3150634574566244517a4e555a464b306b344e6b70324c30785853336b3065473476516a4635646b314951334a6f4d6b557a654642334c3270734e56464451554a78626e705661336842517a424e6130356d4e485a6a554451315931413054475a364e7a557951335a6f5a584a566555316e4f56647553574e7362553977644549355531707a517a6857516a46515957316c523078345532785552335656546d6c5a4c797434575755354d5642734f445a6f5230784a52324a6a616d68695a6e4e6a61334a524c314a6951566c52546c4e4a566b74785a5746714b315648533274616558686d52577454596d5257656c42724d6e42444d44424c57585271536b6c484e437450516a4a7a616b4e426156647664577870636c6871563342774d6d4a4d523073316331517763476876636b785a62484258647939575954526f4d465a5556545a465a324a684d5645324d7a4e3056587053536a5972556a4a49595538325347464a576b3936537a46746432316c5631557664444133565570516356644a5647465263314d30624735314e5463774f474e724e577874595768744e6d784b544870564d55396862545930616c5a3659335a5954453177636e4a5a57454673556a42555748466a637a6c4d536c4256516a644e656e566b4d3142355257743255445a56646d6b765748684c5545314b4f5770735a6d6734557a64334b33644c54323136646b593153465a6b536d4e6e6444686c643039335748524f527a56615a4863335745784c6346564d5658426a595645334f446c6c56557447597a64325a6b7858576b4d785358464659556331536d6c4c57564256563142735a55686c5257784664486c7265546c4b646e6c515a47527662314a4459334e4e626c463463557732564870476155564b553252784d31644d6557565251326c695347396b59325a715a587046525446784b3068704e546879546c56564e334674625778584e6b356c5a6c464c63455a56617a5252556e4d7761324a59646d746b6544464c4e3277344f557076625456515a555a50616d3179566e4e7954564a6f5754425056464653593346356347687a4e4670595a6d4e54655445794c3063794b30784f5a476b776357525664316870546c41335958425961474d784e486733634652705a56563059324e4b566e645a64306c544d556456646c5a6f56326777556b637a6555783054324a75513346786457784c565752685a566b78526a42746131463653477850557a6c6f4d56704b647974574d3046535246646b5133677861566c53576d467a656d4657515777356545517864584e75636b5268566c6c53554759324e6a566956334530556d7057556b343465486c6a536c525857545a735548463653336c5763574630566a463259334679597a6846616a565959545634574770585669747861315a4f5a4652444e45686f63576450566a4e4a576c4d3365464651536c67796256567859544e36635538305957466c536b4e7861464e7656545657546d786c55473535626e567164545643626e6c7956316470626b313062544e4659545258656b73334e327049636e6f336147356c5956426962484678596b743563474535574752615546644863546878595446786157303263565631576a4644596e6c70636e4a4856305a4f6544464a616d397361464a354d31524454334a4f4d6c68595430353163315176556b78734b7a6c6d5a54565a64445a324f54686d64576c52566a565852314e685255355059564e5555325934636e4d3165455a4c57456475546c4e575a455a6a627a644d596b5a7a4e4770595a476875567a4e50547a68765645747864566c345a464e5362473173537a56564b3056725347644657454a76555756544d544679656b313055305633556e5a5863585a586357463359546c7162455a78526d70715a465a614d327076637a4130595538354e584a705933685556465134636e565257545a7363564934536d4e7a4c317079625374705a323179565441344e6c5a4d5a6b70695a54564c57574a4964553031545339365330704856315a75576e6c3364485677557a46355a5468785a6e4e68596a59345956703053446c4556465a735a465933596e564e546b355562486c7a64437455614752326247525454455a56626d56314f565648533164484b306f7761585a6d4d544e5451334674646e6853626d5a5062324530596c4e3063305679656c6c4e5445453164326c795432785a59584179537a64525a7a563563466c785a476c79556c4655566e4a4f656a467159323556576c5a48656e6b72616d31484e556c4a4e31525761574a7a5a464d32626d747455324e4c633255764d5339574e556b725955314864487071574730724e474e7555457430637a42346157686e4d5339594e475a58526d68324f5645794b7a56704d6a6456644464544e484a424e566430576d314f4e6a46784d46526b5432553153544530625642355a6b56614c3268584e585934544668484e54684d4d6b557a574842544e574a79614668774d6d3551596b3034524752735432686e555731575648707352476c335a3046595645644d56484e5756465a525a46687262305a75566e4a43526c5a6f4e553032564856585455356f56556450546d567a6154426c575456595a5856344d557859536a5a77556a4a7561556f344e5849784e484672597a4e685745646c59565a554d6c5132526b465565466c6155324e75636b7378575574754d5846355a544271646e52315533524d53486c6b4d6e5654636b7442596d785654474e575933524661445a49624752366554524e533052555a5642526247457664454a6b5a326c565233707a516b397451336c756444424a4e6e6834567a6333513035774d6e70494b324e51524374494d314e74616b30314d464a59643052694e6974334d6e4e78624756305a6a526a4f55746b52586873576b645063554e494c79397162586442536c6b764d30644b4d4535544c3367326147383253477776616a64774e466b725a7a5a595530467357446c59616a4649643151305a306f3165464531656d646d5457786c59315279576d7078566c4d354d564a345a7a686d56445a556133567357466431557a56724b31703454455a7056484632576b784563565a365748465a4e307879624868436356425755327077617a4d785557747a53304a4f56325254614746506556685356544a3359575a4854314673536c704b596b524e4c30744b4f56526c534468696445564e5a69744e6455354f554574684d584d78516a46795a585a575633464c5555704456473173556b56744c3268324c337042596a68594e47467157437451623270575232467863334a6c6132396d5a334253534763355933423555446850557939345a584e78633059346555353365544e434c3056615544644861584e6f55465a775a6d4a4b4d53393561464a6f5279394e4d4552574e6d357661317053636d3552576e5a445a307454526d6c7857556378546b31566558597a4f556873575468515132644e523052315630397a5648673554565a424f44646f64486456513268705a446c48625735504d7a6c525a32356c4c7a427456314d31614855725a454e6c5179394c4e7a68685333426163445258634664465445647a5448424c57484931565864555a4467774e6c424d616e46706456706b556a685863545933596b74716246645954326c53646d564c62474e354e54564e533342506131526a615774365646644657466477615852584d554e5952445670596d687a4e47557854566c76536e466c536d3150634745304d47356c56326b314d30646a53306c595632737a5a6c566e596c56364b324a36543264685455497a62335678535731365448677a5132744e5655527a52464e785332465053476847596e5a7864566f774e6e5932626d6f32616b7071534856734e556b30616e6b7656474d315745744462314a725a6d55795557785664477851566e41775a6b64774d6b4e574d44564464484e6f5a54465a576c687a55565a724d5773334d334e3355316c436332597965485a6a61584578636a4976536b68494d576c73555842615a6a64424c7a6c71656d4646556b6c314f53397752316f32636d70775a457072547a5577655446695a6a646c55305a755454647457486c314e55317855336857636e6f33636c427362454a766558424e4d46524c516e5a3163304e3264477079527a4d764c7a6c585344686f4e6b74565433524c64555a4f565738775448466e64474a4f64486c4d623038775548703057576c68656a4a724e565648515545354d544a3255314e69546c526962564a435748417663555a4d616d4d354d324d346356637852575932536d4e524f565a4256335a775555745556564274624668455a4756534e326873656e4a4e65477849544764355a3268504d324a4e57555979536b74556354463659554a32645856684b3142515243744f526d67765255394f566a564e4e6d397263455a455933566865456c564d6d4e6a616b6c7659564649566a464465576c55655856356245745564554d7a656b4d7757476732616d395463473531656d3552537a4e706245746d5632786c63444e31546b564e574735594b7939764e6a4a4d636a4572575463315631647a6158493161564679566c4d7956584a71556d6b33516d524f5a30526c613070314d465654576e686d62306c42564646754d4668614e564535544870795a6d4a304d4863784d3035334e6c4a795a6a4a4f52314258617a56564d6e46466432394264584e6853315a7a626a6477525845344d56566c6545354956546c30636c464b4d55673556326c766547393356324a31516c63354e6a42594f5842734b33644765444a45595868766348647657546c57516d78564d465a6c4b335254516e706a644339354c3359305a4778726332704b63473557554670306147746154334a4b4d4642585232746c5458493263557436595731694b7a417653305635625578524d6b4e3354545a6c4f58427755466435523068535547564c4d54424f516b3568534468585544687559576f355a6b3568656a46724b3255306546707959553932547a4578556d35545433525453486874645670685532524c63574a485347567452315655596c55724f484231526b646c54316851644870354d31685455476c4e62573556654773354e5578504f574a44626c6c7257465643517a4249576b63794d445a68654339685a7a4933536d526b556d316a6232566a56576861557a4e34646a5a3353476846644730355758564f5155644a63546c344e474a4d4e7a6c7952326c7154455a49546a52696157746c4d576c564d305a7464454a5359574e4b526a6472616d397763304649614745784e445677553059346548703554565a344b33417a5969737a4e6b46615a4734326154566a6233524e59314132555538796331677a5a537444526e5661646b564e656d315053304e30526c56344d47567761326c6c596a497957576c744e3268585956463652324671636c7068644778534e4667785a445232625856354e6a524364473550526a64584e306c57636b597a5a56686c55484a3253546c4b5a6b317854464a564d326c766131564e5a45566f626d5a574d5535796454426b65556c7a556b5a6a5a555a50644539344e6a4e684e58646963576734636e557963314e4d59546c5453484a745a6d705263484a4f4b323969626c49725a44646c644842534d5668524f58523354565a4c526a6b7a5244425359545279644670424b31597a596c644f526c4e6c556b6c4e6558526957544d724b326877547a5978553231504d5852736458427961317035536b78735a544e53544859335a4759774f473579563146516247517a5a54557854316c61596e707952485131647a597662444a3057437479637973324f465673636d7335646a68455a334a6d53444a4d5958703165475a794d30566b5a5739306147646e61554d304d6e6c304e574a5953315a6d4e444e6e6231417862453179646b5933596a59786255637a63325a52596d6b7a596e645a64455a6c65445a30516a64716455343455324e71634664465245597953464a30646c5a464e5868695a546477633274724d57706f4f484a3264584e685330746e4d6a563163464a5a536d4e78595652315a6e6448593031345254467459327447565546776343394f5255356b6458703663314935517a59764e6e6876636c4e6f555559795746566e596c5a785648646f576b3430536d6c344e564a56543346554e315661646a4632656d64556446597a4e31687755545578635442344d6e5268546b525955335a556446564a55544a315757784b4f4738334d57784e4d3170795444497961456843546b7871546c524a4c304e6e52466f334e6a42536132493162573574546b31784f54564b4e576f304e6d3575513146354d3070484f465931636d4a4c626d5652615468754c33686f55484d34566b784459314e6a4f465531616e46325758644362565a5361537471547a64335979744e6232513554464e776458497a4d316c36636b4a354f585232536b52596345684e62305a7a617a645a63484e4c63565a74556d307a654868734f55395154555a30536c426954484a5462485232576d4e57616d396e6179745255456f3463456c514d45784c614646485247394f5a47704a516b52504d5578585a456c7253453556547a597659555673576c5a58556d74484d6b4a4c517a4e6f517a4e6b535667765354686c59544e5064334a6d5345704e62315668526b707a4d58684c52445a35555570524d5564585932524965445669646b457262576c5651584a55526d687365445674626c5a334f554e77656a49345630745865586830624442545345746d5933517861566b724d6d4658526d7045625556775a33464465474e594d6e4a6f54544a5455474e5a5a6b4e42526b393453577872556c5631656e5a4f656e56555a6c67355a454e4954316c69646e45354d325a31556d465855545a524f486b77614455774f58686f4d3073334e3342314e6b4e345456645762554649626d78725757784456444e78566a453265456b764d444135527974426558566c625746744e6c513354444231516a5978636c6c5164305a6d5555706a616c4270644864595346457265576458546e425954334a5362544534596c42734e5846705333704755306452526c42464f4570334d485a6b533270444e3345766156706f5a6e4e55655770794d6c466d624752574e465a304f55644a4e54647063444e34566b5a706553743259554a785754673551324a455754457a59554a4e4d4570454e586b356158673053486c57526d777265574976616a5179566c466953304e4257465a615647746f5631464b53565a4363464579546c6834546b566d546c524c656c52595a45343064454a724e324647546e7032536d3145557a4e4d63554a5a5a55645463574e74635774755957393557474a714f45784a62455a48556d39365757393356446c3557484e4561324e544b30393552314a474d6a5a49646d526e5547314e62314e48617a4e53614452514e6c6c525458706b636c5a57576974366247316d546c4e364f5764516454466861486451555852494b336731526a4673625864574e6e68785231706f64566f3551546734575734325a57357a5a5578425557566f536e4248636b7474646e6c785a544a54523274485a7a633064465a576279746d546c7043575552456556464b54334673627a413052477434546d64545347564c516b31334e6e5a7265574a3463327846626e647a5648526f6448425a5757684b5645356c656e52455245464b576d644c55474a335a485643596e5668656c704c536a566d637939734f57395551315a6852304a454d325a4d4f5552464d6b68465a4670755354426c596d4d3062316b31576b6c4c647a52725769394e5446466c545738794f57396c54553079574746704e6a6c794d557853655651354c335a465533426b4e4870785557707057566c5654566c6f62336458633052754c30316b59304576616b3972646a4a356433704561464e496256683664545273616c5661615549766555564763544e7553326c704c335a46654339324d46637261574d794e30704564303159556e4a49536a564e4f56427355573545526d6849656e6734546a427156334a344e6b31564e314a78534564746330525959564e4853456c6b5433646a59576c354f574a4f536a4a79544577315544647255586832546b67334e577854596a42364e4845794e7a5657627a4534533164334e6a686f636d39726156643059315274556d64514e7a46366143746b4e57704459544e4564574e484d584a48645664565753744a61315572646d4e544e574d30546b7836557a68366558685a52315135556d31594e5452345256527351544a4d616b64335a6b315655445a506544673351584a4f5447316d6432354855457047546d744e566c68465544466c5645394e5344633465484650626c5a355a545234656a597959314252536b64474d314a485658704b635867794f484a755531644d6430466d5a553533526e646e596e705a6557394e556b777852465234633235514c3046586244425a55484a74646a56595a453578616c4a5657566c596244685552316c4c59334e364b316c43546a6869636e5645516a4a515132523064474a765a306731656e5a7261544e524f484a724e48524c4d444a465a466855557a64725444565955565a74613268585233424e63315a7854456c3464555979523074504e6c51355258704951545131616c6c7153305a496233565765585a745256424e647a4e50516e4a756555314d51304a6c57476453646d316b517a5673526d4e734f5663784d6e564853336c55536b4a6f61544a705a6e464361314256595455775a6c646b627a645a56555a6f57465a4f596b56484c303930526d4d335654524e4f574d334f474e52614574545a464a684e3368614e544a595633643054455931625552514b31597a64485268646b52494f48524a4e553546636c466f576c705a5a3230325648557a526d685a646c6443544446464d566c7765484e34555559776455355a56304e4664304e6161454d7a51793876537a644f6457394e654578744e446c32626d4677626b4e6b616e4656546d6468647a427953564d314d484670536a4e564d69744e61545a795343396a65446b35516b7849593067354c334657633156785a486f7761564a68567a4d775a304a746247464f535374485479746a54566c6e595764475a456c356248567265466c685a7a517652325a75536e6c61617a4d304d43396c64564e4261564a494d554e70516e46434e5752366430315261474a6e576e5a735a44423457584d785a324675517a6831656e64586147354a546d6c7859545255566d684d4d574a7455315a4f5746687164574e494d58564b4b3152704e464e575a4746745133464b5a55567854556c32617a52344e58705a63314a35564534794b314977564446724c304d33614864715957646852316b3261797446516c706e4c31424a4e30707865575a6f517a426b5a56517656316c786253744653474a7a4f4770305647684d4d45466962485a54576d30784d30686e614768775745706861545a594e6c46736158427a625539574d7a56754f474e4961324a705a4531334e56706c4e47303551577471646b5a6f4d474676645752544e6b557a556b5978656c566155584a325a5539555932685257575678516c5a724e55565755455a335a6a526d56327851566c6c7861797446516c4a704d79394c4e544269525574485131424955575a6c595764575a465248616b3476513031615755744e526b6c7a4d56526d517a427156334d335a444e32564555795155307a513270554d56684a4e6d707656316c6856306f724e455534595564545358687362576c5464477050536c63324e6b396c5445706b62565a5359564e4e4e45357161325a446454564c57444976526d314f63564a364d6d4a6c4f57684d626a4a56646e6c7a4e3252334f5546614e326454613070484f4530306146464662556f3555314533646d646f5a3351335247395361545a495657395556565a4e4e48527765546c52564656305a6c423251555a34543256314e454a346558553554544e77553156505958426b4d6e4a6f635552705a4864514e566c78626b704456486778536a6c575a476c34566b5a614e4373764e306f3055455a6a4d31463257466f7a56544576596d74744b305244654668314e444a4b4e46645756444659596a565959327874517a4a4c656e4274636e68305744463461454a615754646e5a6c4e34565768486457527063565130564778304e5452744e465643536d3076567a4a4856304e4d61556c4354546c30544731796279387763314a5757545a75516b564f56565a724e57706c545570304e33704a623249354f45686e4f466333516d6f765957784f636b4a46546c5233656d524d64326875564668474c7a5275633039536230686d5a3156305a5339356558646e4e565258576e5a735a486856593068576432316a515455725a44524e5979747551546c4e4d326b3455477830636c4e315744424e63466c6851573146636e4e474f5374614e33424b64476c704d3231736330645751557874633342794e6e4a4a566d7831556e5630557a4d77544555355532783664444272566d73796444553159556c584e456861646e4a6b4d33684f52564a506456467457476c69566e526c4d464e4c5332685a5957646e53304e36516b3872576a4e774e4455336147643557444134636e4e7362584531626b553564314278576e704365455a4b52456c68647a42584d6a4a584d7974575a335a314c335243556e637a646c4678566e4a4256316b334f4767764d4442424e464e6b55544e6a544468315a46525753473979634573795245684c4e7a4a35627a6c335630564857697457576b7777575468554e306c4b565746336332525455554e4664465977526d4931574645316256426a57564e364d304e705446707463327069616c64785331457759316c50554842524e6b4a544d4452754d564a356558566d6457513257464a4761585a6d5a7939754e6e645557576833656c647852484a495a6a5172566d5a72574578505333425a5957317a526c4647596d55784b306f31564864356445737857437443617a6c4d566a5674656c4a4b54486c335a433933656c424a576c5a365a484a4956555643566c645561486c69614646475447354b5a7a4a30656d5134515667316447747065556b34626b74444f444e775747773462307372654546474d6b4d794c7a493053446c4d614574324f46677852556877616b463455564a724c315a6d4e45747255337061636b77325644466f537a4646644578724e7a5a3359554a77544642465257783665486f345a6b64756254424b54557036646a6c7964305a3161454a4854564d774c31647a656d4e4a51584e4d654731764d304e775447704f516d4d764d30316e5633513152485633536b527659586446556e6479596c6f3251323568516a566f5331466b5953394d5a556c7362486c48546d5531535778514f45567a64484a6b65574a30616b46724e32787a635573304e7a5a694e457777536e6f725a31646f65544a7a6431553361564277543164445a4856765a30786156565a776355706965566f32616a4e6d4e485a3155566c5662454e336432646b55546442526b7074596c4643525768695a306449537a52305a586c766130396b654546555a47394e61335a35566d35455a6d313463564a364d6b7447636e6b345132314b5a4530795a30464a547a42694e57355863554e4e4e576b775647314961444269563039315a6e526b51584e6d62574e4a6548413451566f3064486458646b4e52633363336454557a56455a7662557861646b566f62326872633370445a7a64756430314f627a6c6157566831645577345a6d457656545a6c4e3370724b306c4361584e3053336c33534846706332645152454e69633063356145464f56316473576c6c4d4d565258576e5a745a45527056314d3561544e3665476c7463336c4d4d57686f5746565a54566c35656973314d45394c56445276656e426e646d7332623349335a5645306158633256304d304b335a3257554a345a48497656466c5a5431513157566f314e554653576b46694f4664465547637953326432554849784f464d78566d49314d314e735655394562475652554764506357527a536d7833536e5235515846466445314d63564e77615863336358467a4e32517a646a4a786158526c526d686a516c526e4c324644547a424f5758646d6243733151315a766347643259323872636a4a466248684855336c59574464594e565a76655468454b3351345554526d556b78775232465162456b334e6a683256314e7464564635546e564453564e73617a686f625374574d475930635464435444686d5655746853303954566d3955576b45795533524c5256465761454a72616c424c4e334a73616d6c61516b5a6c576c706d616e52365a456c72517a644d513278316130355662466372646a645852555642626e687351556c44656b4a6c4b3159785a6e4a4b517a68684d475a4a4b336732536b6c61536b4a7862306458616d4e306133426c4f444d356344497753564a474d6e7051535464464b314e4f61324a34616b35554b3270435a6b70455530647854485245596b7054613235795a466c6d52327442616e4a6e4f484a5853574e69536b745a646c466f4e5577305a6e6376616b677a52317052535752305344524d5446704c565642796147633456474a4253577069517a42505a6d64794f45677257446c4d616d3035557a686c6548526b65433942536c4a714f4468504e48646a5646685864475977627a564b566e5535536b64346347684259566c7752454a714e793958566d744957486c4d55486c7a5933564d59585677536a4a44636b557a626d52346230784451546731616b5a304b303535576c4a4c656d683164336c714d314d304d3046495953733064553161636c51345a30733052306444556c6c6e53304d7261466b725345566e53326831616d39714e47673163486f304d3356564f575531635655785a316435565778364e546875515642565630564761454a6b565778304f5852515132467862553145646d744c647a42555a4551784f544e53533246574d4770784f454675646e42715232395463584e7555454a5562475134546c4652555641776548563264303034644564475632786b576b647a526b356c6233524e4e53743663555678544531444d4456595a446c70553239744f48646a65586c6c566974785532343059575261564842595632527953554e6d645464705a557054646e4e4f53304533636c673452574a79636e67315744517a533170744e45347a516a424e62315a355344427953486c56636d6869526c70564e6b6c546246707761334a6f55555a4f556b307a515568684b335a55555573335532785a536b6f79547a466a65554a7a516b383256544d78526c5256556b525565465a6e63577335566d6777615456745455564663584e764e30744951304e786455493257466b3262453078615535724d6a567452555a59576a67344e3142445279394265444a4f4d32465657574e5a4c306c31624870774d6e4e4c6348704a615778795456704d5446466d574773795358684f566c524753575a5a4e6d784e4d585a304e4546334e47745765586874546b64724d6c4e4b616e704656586c6a51306f76527a6330615846596330563465484a76524768764f545251596c684c656d397464316b726543744b4e47746856576c36566b4a4662306c774d444e4d4e5670546132356a6332467363556c444f4374574d324d3061577874613046444e4664336330357262584e6b627a5a466246705152314a4853454675523039775a6c70486157466a62577461576b3830526c6c524e566b325444684d61305a554e336c565a564e34656e704c556e646b56466c344e6c6777535738724b7a566c643031714e79747065473150625778544f473559576d63325a315a365247565859584e7953304e5a567a41314d32706d566a4234575755726146526d615756575658684b566d314f555859305432687657573552626d4a54614464464e444979636a6734597a45335131566e527a4e4c4e7a4a4b4e4731515646467764477379627a5577554739465246524e61464a5a56474a435758704961586c475431464b646a5258534668535957786a626b6c7a4d5649314d697446516a68494f554933633352774d6c707a4e45744c4e533933526c4a334f585a484c32683151334e6b5a6d56775a6b6b77613349316347645761457042536e426a5445744761555a36536a5a33617a6453596a4232575546475a315a4e62557477554664475a456c3557575572596e644864586c79615849305354567556584a3451557471547a6479647a52536248564a57555633633231486132704456316c4d5347637259305a33524552734f44565861303544556d52766331565754566446595739775444424c6130785452484d3253316c7a51586859535670344f54457664336734516e46584e464a6c525549764f567042547939455530673462307070656b526b57564e52524664586332315364574a34515870594e46687a4d6d784f534539704e6e6c335245593455545268555339746558526156316446576c427853454e355744677a566a644a65566c53625374765a6c4e466445355a59577445546d684856445a54546e4177616c646162586445526974535a7a5632576c564f59544d35625552445457353362546468637a5672566c6442646d4e545455564a614464505557563563334e4a6556467251554d774e6c6c33616e4a795245685463334e4a64314a4e624645774d5374755956567954454e4e52555243526b35305557746c4f4756356432704b5131557863454a765545315265574e7653336c3361464a685a47526e546a6447615442734d317074596b4e4e4d456442656b637963464e7a616b706f52314e485645356e625535795258685a556e4e6e5557686c4c31425265556c795254565a556b397554445268646974715355316e635864474e576c3462486c4a5a5374724e3164576247684857453943563030355a5373774e566457624770484d305a4451575a726331644d4f47704c51334e315755637755303035636a4a32576b6459513031315955647761464a48634468755332684857453173596c464b5545563563324e4b4e6e4e55526d7048574574476256457a62454a5761566c7a575373326131686d6445565762306776526a4a425155464759565a6e57545a494d6e464a515546425155465456565a50556b733151316c4a5354303d),
(6, 'Reunión', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464f61304642515552575130465a515546425247466d526c564f5155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e73624642425155464652455a4b556b56475657564f636e4e755a5446344e48706e5532683064585576557a6c6b516b396152316c484e45553061314a6e5432644d5645565a6432316e64455a4654553576535652465933646a5a314e745357786e634764785457705051327444626a644364577879624756545531704a5a6b525551546b324d576c685632397a613146555556517a593052435355644d4d546c6b57455678635556714b3368335645453553486c324b335a5161574e684e546c725a57706f4d475a744f5670754f44493453584e786230784a576b4a4f52324668565641795a553979646e5a4463305a586446523361557443616b6c47566b30335348526152445979524535765379383263316c54536c4668536b467763304676527a5a356355457262456477576e4e725346567264456c4d52314a556147317664557448544445775a46426f56304e4c62476844556b4a73616b4a5a5332354b546b6c7862336f7857546c695930685452456c444b31464b56336c465a4456495745685851305275525530794e574e6e4d57703565486c6b57555a4f62466872526d4d30536e4e5263474636556a5572545856444e316875516e4a5954554e3162334a5663305177565851314f455934616b4977654570515a48593354445a6c55555648555774726155593253574677516b5a7055467046644568794d445a704d6c6c565930564a576b7077556d4a4a6256426165576732616e4a795233707a62454e4b516a6c7862314643645442684d57466c645649774d47527661464278644451765a6c566b5332644c4e6c6447646b356a4f453142556e4932576b4645545531745a3278785a3068774e484a464b323150636b46594e6b647861305277517a5670554670735130315a5155524e5a6a425359573943613146354e48525562555273566d7455596d564663565a70616d68726557784e647974765348463259574d7a4b7a4e536246644e5244644c5253737952566b3254454632546c524e61314636563031794d446c5851577043626d316f5255645256566c59655752524d4739474b32394764575277627a68765a584e4d656b4a5451306c61634859724e4777346232453163576c48593156446254426f575530784c3356535a323135533246765a325a7a5a31647851546c4654584e6e5a46706f615770745746465863556c484e306b77545551725a465656575870764f47464e636e686a5330564f623267775a3267774f544e425156464b61327444576d7454526b5a7263466c33536e466e52314652574746576232647961576433655756464e5552775530357354484d3161484a6d5647686c5648683463533974644570694e453578627a645a654535684d33464757466c305532784b5a6a5a706547387953316c6f59544e795a6b6c585a44427255586c54526e6c746133646856576b785a30314f567a4253634868315a4645314f473943523146544f5864574e48684851316c755333466f6569396c536e705564305661546b5a6962444e4c5a586c31596a6474616b744f59554e7a6157647a5957746e5a445a3052484579646a6853576b68515430464b617a42465a6b466d513363334f464a42656d464a516b3175625846515332464d554752574d47565a617a426b526c6452646e4e50646c4a524e574652616b74474d546c6c6548524861553572546d5634595778455757567962473154616c4274636c5a345647686a656c4647563146584e306871566d7478615468725956706c5a55633063484e786144686e617a5a5657455131626b5a52625545355445644c52574a424c7a644761556859524845345a3231584c3056364d6b744c576e426c5a55646f597a597a5a6b597a5246707356555a6952544268636c423153585261596d784b5258464b5a7a5a3263444269654339705a545251646c6c5665565671616c706a6455525a6157706d636a4279534445315453745457474e54557a68774e445a6952314a765743394c4f574e4c65556c536148646b536b46305131464e5a335a32555735315669747454336447617a6470526c5271596e6c42646c6832634755766157396b655868364e455671534852724e6e46445558566b645852524d7a687954556852553268326545597652554e4b61307377597974335a6c4e6d595756766432396e5458684564585270627a52714e454d315331706d614578536447685062476c4a656c64494e326877566a5644553246615a5649724e454e5052564e43596b5a7a4e3070364e7a564f6247684f526b64474e3239745548704f64564674616d4a555558644f5a6b453265556856516e70446247394b51586f3163576378526b5178616c46464d57316b4d32393664486c314d475261513070436448686e5156706a55334236616a527162564a454c306f7a5931525a533239454e6c644e57464678516d4e6851336470626a4e4552466c4259316f7257486c73656a524e56586852566d6852536b643153474a30574452745257687a566e684f65584d765132343264546734513345325345317757556378566a4a3059584e4e556d4a524d4664765a304a4f63326c46646e683363466f3064305a57556c427a516b5a724e5574535a6e4e324d30706b4f546443626a6c796544425a56326c5956566c68627a5a784d6b313461473931516d303363477333515442344d5339475a46517655544a6c55455a344b3052756143747a636a567a4d6e5a6d566e4d794b334e55626e4678547a56474d6d70544e6a4e3353467032656e5a526154685165455a6b53484a694e326c78616e513555466335516a6c3062484a56646d565956574a706257387657445652576b637252466843616d4e756158707365484278546b524c4e446c734d33567657574a54616a4e4d5348426953437452646c4a49534574556330677a4f5642765a6b55325755526e53336c30636b567a556d644d596b6b325a486c5064335248626a64595158557953316c564e485277624538355345354964453978574756425245784564453959566d4a506458637a546c41774e584e77647a49725a30784f4d574a51516a5a44516e4a4f4e5870354f57356a556a6c4d62566469543145336157786c6456465a6332464e526d565264465a505a32354a596e52504b3364715958457757584a4a636b64764e46524d596d4a315a4446746431524e56484e30634456434f574a4e553231724d7a68715455644b566d4a4855584a48636d5256645859765a47743254586c4e566d6446655552554e3249344d486734643152576148464863554e6d636d3946536d4e48626d5646616e64365632466c63466c444d6d4a474b31466a53325a4c595756684e6d4e434b336477596c52725a7a417a4f456c6855456855616e4645546e566a4d32746a4e3252534d31707064486450526d64466555453152335a704d316c345a445a6e4f55383452334d3155586c4b545456434f5845334e474a534d57464f646c45785132685265554e6e61456779616b6c5a5a314642576b4a6e51586c44623052514e6b525756586454616c5a365354567a516b524456325253655752785a3074505a324a7a4f46497856465a4c4e6e59315a3164364d6d64695a32467a533239775a304a435a3052494b3035535557307652446433565535744f47353464335645623064754e55597657697443636e56734f574e725155353551304a7753335a6e647a6c615179383364316c615332314c59575645626a427059546c6d6231553452314e5a516b786c5a6a424954577031544868755a6e466b63303933566d6855535339745630464d524451786379746e566c68475a566330534667316454465059585258516b7872517a5644636e4a525a303934546a5a514d48417a52466b30634759354c316332656c424f556d39766156593361454e4b535852456557396e4d32706e516c517762444e5a536e6c6c4e7a63325a58426a4e6e5a576244466a61324e46526c565354456f304d47745057474a3655484a79645464795932683164557856546d52544d6d746e556b784c643278615232593155556c74523234796332784f655374775348524f4e7a523264304671536d394e523052514e556376614730324e6c463656444e6a567a644e51334e33616c4672517a5270556c4a3561586f315958427a656a4e6e4d464e5864485269626b4e476555706163455677535870314e445a595a6e4273554855355646686b646a645a5157646e517a4134636d7479546a6b78567a646e4d7a457a4d54425663454643626c68576132315464446c4f5747787156324e4b527a46795932565062324a42636b6c424b7a4a48557a6c6f646d3931646b397862454a754d454d765354424e64314e526147464f557a4a514d584e4553433951556d593563304e6a615764566558424a4d32394c6430383455475a6a4e565579576d39425455397757484654526b357661324e34596c685253336c4e5330745a65455577563355775957395864476735656a463453453077515731594d30396f4f546456536b5a4d5445646a555556354e6b63724e5735325a47354a4e556c77596c6c595a4855356347686851584a4a5355396a5a54457853577377643168546246684b51554a71617a464352555a425157704d5357315353314e505a554e6f63455231544645795357743164305a7256554a61556c646862336778656b566e617a5a7a4d456c7461444a5a4e6a56715555466953586830623235684d55703555554669535739726269383562553930575442426256593155456c356155313462577377516b6453556c524b53334e4762484e51536d637a4e334d3261456f7657444247644768474e6d5654536c597254326c345645686c61446c42656b70424d584e744e457330554734324c3356744f446869656d5a59633151776131684a62466861616b78555a32646e4d586f77654452694f455277516b4a465156524a5355784e5955316f5579394362564652576b786b646e5252546d74465231457a61323077515564525646707156566b7853556c505a7a683463545a715155466e5a336c4554475a5463454643613064584b7a46545155524a53584e53656b6c5553314e6a5a326434524570495355464c65554e4352584e7154334642516d74464d6c6b78617a5a4b546b4a4651306c6153556c514f445a46565646785355464e6157784a4d5656724e554643644778575557315a5632357261304a485556466b4d5868594d334132575552425655396d52456c4d547a5a4962304668516d34765a47644d53556c5061486f7752334a4f644573344e45684e4f57704351586c52555667774d5452686156566b5a31527a57574e35566b4a6a6157647659554657576a63315647706f4d486452515746615155387a61454a485a30747a5248525652564e445248704661554a306455497663544248556b5a52516a64474d566c5261477436634538334d446c544e553834625652335a3263305356687661475a54556c466f5130704a554468544d444246636e56736447703152334235596e64774f5463786256467a645863315748563256485a334f574668567a4a6e51586835515842566558686f56693832637a5a54566a52685955685a4e324e4a4d31526952444a575155704a546b5654525664795633706954556c6b636e647a5a565276566d6835543039694d30356b596c46776446517864586c6b5a585177553256454b32644464325275513035735a555a364e33527162315a54636a4a34566b6c614d5552596453745363487044625546475445564262555933544531766355633256553157624856445a48704d4d33637961324a50613264474e79744352314a6f523039764d3152764f554e575457343564476f7653444a766155464d51586430523152695a45355264575972544755726447565156546472646b46365a307452616c5642596b4a314d6e67304c3252574f553131526e425756565a534e315a53544668434e6a686d636a5a44646b314f545864564e303433646d6c75636a6871566c5a4e527a643056444278656a413362454e7156304577525774444d56424762566c6e625568695157316d56486c574c32745a526d314d556b6c4f6456684c596c49316455687355453573566a684b596c6c5461315a5a596a4255546e4a59624574464d6b684f526b3142536d45796558424459314e6d6457464e64586448644735724e32397761304e4d5233565757566876517a68315969744c4b33525862314e45656d5a435530685a4c316478636a6b7a614574424f556732646d34726344526b616d5a715a7a4a51593342524f444972626b45324e575934596d745851546732556b684a4e47777a4e4374315332303352456c6d567a4d304d3035735154673256484e554d7a42305956424e6247387a4e476878644642764e5456784e6b35525246684a6456646e5558705763326c6b633155764e5852594e32684c5553396c4c316b305a6c4931656a645451574643625768314d473970643064356445746d5748517962573931613252315255733255476877627a6468623256476346526957553949536a51774d566c56546a5979566c4e5564486b7a5532525553466869596d46364e584d72564845794b3231355a6d706c65566f7751303076566a6c77576a5a715a58563555445a4d62475676556d64784d57356b516d315964325669635659345755645a526e684463476c794f484532546e4979556d6c6f4b32313657544a5a5958703551586c454d576c3364545a746348423061324d32646a6c4454315a465a48526b54465258526c645264585a4d4f553477526e6445576d644e4d44453052467042545441785755566151574e33523170794e4842775555567a546b524b563349785431524856586875563170344e58413252476c4b62585a33644578326355517a61475a685231704a6156427564446851554535495744526b64456436536d773053446b315a6d35684d584258526e5a3351334a714b3038324e55524654303557525656334d7a493465475a34626e64555458457a617a4a6e59325230535735784e3045354e444a4f5269397556546c3352554a5551566c42556a4d7755475a6852466c7552324e7a5257784f5569397a4e4739574b3159766157553553544e61596c464b6256524d6330733153326861636d743557464d78536d7032636d4e354f564a426257316153315a3365546879626b7454637a5669535652534f5735616433563559574d345330706a646c45324c316c43536b4d7756574d354d57704252305a50633270614e545a5055484e73623068696131525953554e77537a4e6e4f47566b576d644e646c4e4b4e54424a536c42764e6b685554477442646b746f61484a4f5a457450576b786a5a32744f62546455595559795657744e656d783662574a565a6c4a42626b6f3162474a47556c6458646d6c314d555247575764546431593253446b7a53336c56625855346330524d59307456556b4e584e454e6964303579613064585130526d55324631627a463355316c5a63325242554852585a324a4b5a477055556e56694b33685256566c6b4d445979576a525164575a535a4546484d6c567153316c424d6e6c4b5545524c553156744b7a427a52457872516e4932616d7334624642705255786d5a48566a595646554d30744d4d4531726432706864314e30617a427756564a4352477456526e524c516b6c46515564525755467a546b5a5762325270614442355255706d53474a5a547a52434e544e424c793931567a4e7a52467052656b64556154564959557453566b4a4b516e5243646a566b4b3359795346564259585a72526c5653546b7845617a645a636c6446596c4a43546c704a6557704353336c6959324d77576b4a57516a52364e45704d633031785930523259537330576b315357573959623170575645647155554e735330646d574770535533646a5a55467557564a5765557054563264536447394d56464a73574564324d454a575757746a655374334d48524b4d31685862334242596b70545755464e4c3274304e6b6b785655706e4e437479597a41774e6d647a4f5852794d32784e6244424f625852545745355265476861617a426f63466c4f5954643161545a5555306475616d52764e537435526b3969633278785553394f5179394f4d6c64755a6d6f724d6b5a6b544746445333466955474d315a454e72536b67795a5752304f46497a544756566269397751316c34655578475355646a5a6a647a4e47567063336f766156465a5331527951565a484d555a31536b70324d5567764e54426862455644554535424e325671596c5935596e4e424d317034636b31755a6d464961474a3661335a355a5468764d545a50516a464d646e6475526c686a4d44644453486b344d303975544456424d6a4e4e5a446470556b4d78626d70545a544134566c6b7963476f3463306c5559555a305246527a635735725744527154545a5052585a6f656a493052444257574555775557526e4d3246444e57356d4d574e564d5746464f57746b62474e595a466f3356574e56557a644b4e3031455755317854324a6f4d445a446555396962484a705932686c4b33466e6446707a5645526962585a70626c466d616d70785755396b61325a77536e4e3656574a364e5531424e474934626b396a4e6a5257624468494d6d684a5a58524e56575a305757466d546e684f5355397056553879565339584e57686c636b685159564636556a4a58575663356233523054306b795a484a495644567153305649566e5135646b557262585a486247784a595578574e55633362546c7a596c4e3056466c5065544644556d355559303969536a4d7a563142784e334e58516b684d4d586448597a467352564a5164455a4f4d573946645777724d486b7a4d6d70474e574a69643142684b7a4257554755784f573174616b3877596a645353336433636b70345a6d313461306435626b77346446646b55326431596e704459303975526e706956314a5456315675566c686b62464e6959304a68654749795a574a724e577859536d353464566f3163324a54636a68354f484a5155477734626e5269546c56524c32733455466853656c49794f57343254577331616b5a56564373356247387954316c3563327051656b4a5a6548565a4d6c423259576732545449306158687a524735336130466e5157704f63545972613039585a5546545479746b616c566e52326c334f554577576e4e4265466778563368584e474e6b556a4e75633352336544567451546c7853334a306155706153334e424e47677a63576c5262304a345247387a5333425252477049516b7457536c64535132633255486b315657644259587034556b6455516d6455566c463151576458633068615746525251555a7955697458634577346157744263566c45625778555157524651315244536d645059555a4a516a5a335632463557464a5357474a425630524761566778526b647351574d34565768724e6d7871635739514f577058515373354f48706855466453646a49776232704a4d55783062444a704f484657516e644c6345464252334e705632354661304e784f473949517a4a51546b6842556b4e48516b355352484d7961305a43553039456330525957475a775a3342705331704263586448575664754d6a466152444633525456705631425353557452627a4e4f5957457a626d5a6856314a35547a6433523163305557566b5a57464956454a485532687751325675616b525254487049633256544d57783556484a46625764615957686c59544d76526a5258636a497854316f77526b524a4f484e42636e426e526e526e616b746e524578694e6d314654576444656c68475a326c44596c646a5679394361307448524568355655464265554d766355687957544d79656e5a7752584e6f616c46535a32313663446b7a596d457951574e3563456c72555752474e3352465a45356c4e6d564a5932644653464658597a4e68613039735230317255586844546b744e576e4a78556b52475255316e616c4e7162564d3161304a6c6230396e646c49304d46567257455a615746427852474e4a4d48524b4c325244536c7071646e4644535563786245397751327878517a684a4d47396b54556f784d5468535744464361307869563277325a305244544574794c33647a64304642536c52545447644b53474635543046425155464252577847564774546456467451304d3d);
INSERT INTO `rmb_icono` (`rmb_icono_id`, `rmb_icono_nom`, `rmb_icono_img`) VALUES
(7, 'Fiesta', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c523264765155464251553554565768465657644251554651545546425155526b5130465a51554642516e5656525649315155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546444f57524b556b56475657564f636e4e755a5778344e44685a56314a7363334d7665474e6b5157567253576c42656b567056304e5a5a32566e5357356f655549355530743353456c4863454e4c655570335230464662476c4b4e4731426145315356454a5157474a775a474674547a525a547939314d69746b565739545a335a4e655574585a79397a4d57567a53465a304d69396d52455655536939484d484a61526e5132626e64324e5463784c325a3064544e69566d354c6233644953305a36546b643362484d77536e5a48616a51314d7a55764d6973335a6e526e54306846536d73315132314863584a704c335a5559797376616e6c76546e6c45643268576448464f51306833656a42314b32645461553136616b5a534f573569656a49344d3346704d79397a61565a6d635670564e45524e4d4559355a33557a4d453876526a4d72537a46565957744361314e47536d6478616d4e36555546545a6e64695555786d62464e78546e7047516d6f72596d4a6b55324a584e315231655464564e6c645352315652513355354d473879516d5678546b524b56476853566b4a7356574a7454455a705448684b4b3159334b325679566b396e5346527161336c684e4870544f58564b5a56704d596d5a6c4f57347a6157747a51573157546d303361316877556d4e6953476454635535365457784d5a6b746c6431425665565a5362566c72516e46764d45317054586857556e465252316c74616e4935536c633251324e50516c524c534456464e326c4a6145777a4e5452305358706b56457470536d74774d304e6a574552594f555131545567305445316b4d486332526b45316157785a6253396c566b35324e48646c57474e36616c6c584f55316d4e48427257485a504e464e4362576f34526c4d30646c4a306148566d646c4a6c556a5a73633349315a6b394762566f304f565a4a564374325955567a616d4d77656d4e744c33646c596e5274626e704563314a78565468695a476c746547566b64455269546e4a54655552345358424f4e57784763574e6d4e575661566d70595554683065444e5552465a5659573155633368474e4730335647394b4e446c68536d396b5655744e4f47746e526c64344e7a56496231673457456c355930524c596e4d334e3167335757646c5447524b626e4635563074446555353557556c696357466d6347466964315a6e6158704d4d6a4932596e42755932646f576a686957576c6b5a485271656c704c4c336c4965586869596d4e364c314a6a52797448533230334d58423456584a6b5a45677964335a6d4b316c524b30786e4c325258654642564e6c64534b31523264587059515642315344523557566c6a625856765743383361546c564e30566c63474a79523363324f576c58634774775546524c656a6c3653566377596c67345a464e50556b68464d7a5a4e4f46564952584e4357485a724d56526d5754677951574a585647355a61585a49636e6b7a4d6d6832563168345346673263465250566974564e33553163584e434c7a67335757357955316446636a6b3563574e6b63336f3059314d79646b6c6d64565248646a42544d6d5a74524446564d69396e57564177596d566d626b354b536b68684e6c4a744e456870643278745356424f5230787755336831626d6c31543035585244686b6433704f596b645a6230354c57564261597a4978576a687161584a36626b35424b30747159335632554759324f485a535344685557566858566c70725448466a59584a725743395161533972575452455346644559573533544735534c7938726231426d61584a615248524b6456527956545a695a564648554531544e5739566232354d646c42585a454a3156555645536d31314e57566e544442595957566a4f474a565633686b565563796545343254326875625339526247733156567073645535774e54646f4d5556596257706d62566c5a56465177555464735748565462577451533270445a6e59764c30526165576478546b6b354b30644961546c7552545652595863725a475647566b526d4e475935656b7330633159355244677952464e496544465755324a7657545a7a596e4d796445737652304a5a5647704d62336c47655570356355747453323434656e687256576831566b35695a4868455a5670494e444a5062316b3152465979593068706432777957556c78626a4a57645455304e47466a597a463359797458593249354c7a68344e336c3156465244626e6c764f555636576e4a72655451765556637a5257706a646d7451556d56485647567055336c6f4f466f344d6d777a536e7044596c563565565533576b35555646637664476c694c7a493565585a7759573948615456744d6939714e6c7050536a56435a58425964564e6f64556b765a3255796154644e64564e5459303158526d677661304e574d6c517a62326c31624752345a334e55654868776148426a536e4932523052485344566f524778524e47646a6555683063554a585345356f645670774f5864324d6e524a56486c53656a5a70564656595a6c49334e7a5668627a42544c7a5a504d5564695a5731715a32566b52565976646b70596454463456485131624535304e6d45786145316a53454a4c616b31705469744f526a68694e6b59326258427157575930516c7056596d7372517938305345633156335a454e6d35774f486c4a524552495a484a4d53335977624446735a6d744361326c4b556e4e784d3146596256686d62575a574d47356e526d6834566c687857465531566e564c4e30394f4d584a6b5930733151556b3562484a4f576d7049516c645664564a705a46703361576c4d557a633157453572636a6c4f4b7a5672556e56554b335a3561537474526b3431656e4249634767766147747056446c78547a42356348704c616b5a585a4670585a553555614570705333637661585a616247316b616a4e57596d74334c7974365132686a5933643156486479563045334e3342684e5574754d6d39364d6a5579636b524b5457316f62574a7a576c673552465661625442594d336c3257577049516a4a5262564a544d46466c61467059556b35344b7a4e54526e68725a444532553167316169397454586333647a4e366130316b52544a4e62573179595559354b32786c63574e6153484678654374344e7a4a5452566c454d44464d516a4a7364577070567a4e4e5543747a566d7046555756596431647063584a36556d3547656b784d6133453355334a36565849304e44646c556e427a52335274636c4a59633149325632643259586c7455334a325379394a56456c724d307471623073784e573430626b6c6d63465a6c65476b32656c4254617a6734536e466c6246427a4d7a6456563251794e6b6f32533368514e566c7653544a616269394563544a4461797470596b6b7763314d786245684c535670305446645355474932626b4a724b304a6c56544a52576d35325458686d576b356154326c784f5570564e585a4557544a57556e4a724f474a76627a5a475a584e724e6c5a77616b74794e555a77615745726547524a547a56735a5868436347786857586c564e6b6469615778335957567165576c7964457056576d6c794d45706b59556b7a5448424c596a5642576d354f51336871516b4e364d475a46646c4a484e546c456230317a4b32527a626c70324f484e6a59557452544463795631517663584e6f4b30597a4f4338336130394e556a59785345357753444d7662553551556e565062544e4f556b397a517a6c4b53445672656d30356247784b5a44684653544933646b5230513078476257786d4d546c454e586c7955575a72615867765631467663336c594d6d3143547a684c566e4e4f4e5870326379743562464e764f4841355a484a52614456344d4778524e4767344e3278764e58643054324a454f485535565452316155314f5158677a65476f3461484275636d4a615333683556487050576e706e556d5578656d746d62455a5a59565972546e55794e6e4e3363545656595456775258646c6444427764576776565778474e57747a57484179645759724f5578754d585669596e6b795a44564a61306c69535735534d455251635646564e46424e62446c78516e5a31516e704d62576c4a616b31465a574e7463566772566b7733626b63304d5656475432786a4e566331595664355a6a42364e6b68575332387754584a6c5544645955334a52576c4a57523342745347706c4d5373724d33684b596b6c6a6348463655586c714e446832645641765657356b5a30395556326b3462554e4265586735545373354e6c5a7553304e594e45354963446c45616b74754d465132626c64334d4856576257787256484a6b4f56527959324657556e466154544a705a69737856325135626d7474566c4a78576a677963575a4d4f444d7a56446b7863473535645841776332644e65446479566d464b4b323534557a6c324d6e644e6556453155466c55636d52684c303935556b646d636b566b6247465561566c6e5a6b3942564646465a6d4d774f57526e546e5a544e44527a574442446355313355584e754d33567753325269616d4e7654576c5952545256643051344f584a754c314e6d63324e745530563453335275533055724d33707759555a69616c706e546e467361324a3164466476656b74445130707952546c704d6b6432655546354e586875576a46784f47746e54537453535441794e4446574f544a55615538794d473152523246465a6a46785457785362576448576b557a4e6a4a48656b46455648526a4f546b3259537453523156435743733564316832526d557a5232704a5247684c545467344b7a6c6955336f7a616d564254473942536d744361304a725157744361304672516d744261304a7251573152525546745555566e515670725445526f4f55465155464e61546d56574e45356c4f55517861584a61626e497855454648614642685648464e51554a30517a5675546a673559314979637a413054326c424e6c467563336c4a52484244516e70464d5555356431597a545649305157315a4f4645324e6e6c776146643653475231616d785451315a495a4531705a555a4c5a45463162565a68544739735a5446585354684252456c79525667784c33424b535770506357646f4d577069656a464451545a4b546a6c74556e5669656e5a4b4e464632543152525155524a616b396e51586c4b655867325957566f52454979556c64434e45357351557072656b5a6b4d565a6b4d454a74576b5a5a513263795631457255336c7a62545577543152525a6b784a534846745355684e5a5739735a556451626c517852557851656d687a52586c30536d746f54546c49634645775a47315651576c45576c7042576b56434d6c46485646524257554a7361304a72556b6861625646485647464d4e32647963316c714f48646c4f55524f5244644d5130564752457045516e4a525a455a685a545a4565444a615356566d556c5a524e6c6476597a424e52556f766232356b636b313551587052616b4e754e7a424b52567052535735766555463555576450615778315a486c49616e4e3351576c59526e467a545864455457644f6133704a654552425355524e51556c455455464a524531425355524e5155316e5455464e5a3031425545684d596b746c575464556255564253456852576a6c4553556f7654586735626c4677567a46494e31684951306c425956706f635642755457786d61316c6b4d5842754c324a69546c4a6d516b4e6d636a646f4d454651525664616254646a53336c684d6973795954423353564679616b745156574d7a636e4e784f44525955554a3465573535547a6872535446794d47517a635770725a324d7954475a734d6d3950623056536258467162454643616b7055656c4648576b3072576c564f5747526b59556859576e466c59554636535735345a6b564d4d6e56575a6b49765a576850546c466b6131527664305178556e6c5262566477543035525a47747763473945535568516354466964335650654535594e454e5261486779576b524f4b3239364d43743652336843566b466161315a52656c7046576d3168626d316e5458704a564552565346704a596d3958556e4e5862474e6f527a567a5a544d3359327734646c426e537a6874516e42585130704c626d4e344d544e43646e525461464231616d5a4f515535565a6d31465745683263444d7a4d6b4a495a586c424f56566a5258424d4e55685164474647553256355654677963445676626b746d535739594f48704654584e7153323431655539454c3231775a5777314d6d68796232354b4d304e68655442354e31427a4e584a596279397a5332316b54314e31563278725444425764306c71646c5a51536e5278636d747562574d31534752694e5531554d6d46756255747864445645616b746d4e4846324e53397a52574a72576a4678626d31334d586f78626d314f6345686b4c3146364e565a7554573472655842746256493454565233635464535346705965466c75637974535347787661457059556e6477656c56755a57703551306f33595651305a585a4353466f34655642765257784757457857535449774b3270684f444a784b325976516b646153325668616a464d546e4a33576d394e6154684f596a4e4e59306c79537a64754e455a784d334e745a6e453152325a6d654568614b7a42594d6e6c71516d684b56575a4c544846754d3074305245526951306f334f5468716456417a5a32707a6155353659307074536a644e54336c4f4c7a6b724f455661613149725957394a596b6c5152546c735445526e63336c3464334653646c593561334a3365487036536b553159323971637a4e54546a6461576d6871616e4e33536c4a7559573077524664455432566953573547654774794d325a7a52546c75596c497a595459776345453156335a36576b35494e444661647a4a794e5842484f55354e643368534d6c6c7064546879535464795a6b70705a58704a5645645357454a7555453172576d354a626d3147613252364f47704e656b6c554d6c4a57523252704d587036536b64616555453153456c756448417763485271616e4e3452575270536a64424d55745a575451335456464855575a5054457333626a5646576d6c506430744a4d33527365484135616d707a65454661515468564d6c6c6c5a566b304e30315252314e5161555131656e704b5256707054336c4b556e5a5a5532315a53456c79616b3935596a6476593073795555644a636e4e5461304a745354644e5a30315252314a49576d64426155393653555246546d3153523156434d5670465a4731425131645353467072516d7846556a4a615156705252585274556b6456516b70615257527451554e58556b686161304a7352564979576b46615555563062564a4856554a4b576c41724c30464254554644535664325a326c6859326b3064304642515546425531565754314a4c4e554e5a53556b39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_maestros`
--

CREATE TABLE IF NOT EXISTS `rmb_maestros` (
`rmb_maestros_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_maestros_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_maestros_tabla` varchar(50) DEFAULT NULL COMMENT 'Tabla'
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los nombres de las tablas maestro.';

--
-- Truncar tablas antes de insertar `rmb_maestros`
--

TRUNCATE TABLE `rmb_maestros`;
--
-- Volcado de datos para la tabla `rmb_maestros`
--

INSERT INTO `rmb_maestros` (`rmb_maestros_id`, `rmb_maestros_nom`, `rmb_maestros_tabla`) VALUES
(1, 'Maestros', 'rmb_maestros'),
(2, 'Tipo Documento', 'rmb_tdoc'),
(3, 'Cargos', 'rmb_carg'),
(4, 'CategorÃ­a Documentos', 'rmb_cdoc'),
(5, 'Contexto', 'rmb_context'),
(6, 'Estados', 'rmb_est'),
(7, 'GÃ©nero', 'rmb_gen'),
(8, 'MÃ³dulos', 'rmb_mod'),
(9, 'PerfÃ­les', 'rmb_perf'),
(10, 'Permisos', 'rmb_perm'),
(11, 'Tipo BitÃ¡cora', 'rmb_tbitacora'),
(12, 'Tipo Contacto', 'rmb_tcont'),
(13, 'Tipo Empresa', 'rmb_temp'),
(14, 'Tipo de Pago', 'rmb_tpago'),
(15, 'Tipo de Proyecto', 'rmb_tproyecto'),
(16, 'Tipo de Residente', 'rmb_tres'),
(17, 'Tipo de VehÃ­culo', 'rmb_tveh'),
(18, 'Tipos de Equipo', 'rmb_teq'),
(19, 'Forma de pago', 'rmb_fpago'),
(20, 'Tipo Calendario', 'rmb_tcal'),
(21, 'Contactos', 'rmb_contac'),
(22, 'Iconos', 'rmb_icono'),
(23, 'Torres', 'rmb_torres'),
(24, 'Tipo de Apartamento', 'rmb_taptos'),
(25, 'Proyecto', 'rmb_proyecto'),
(26, 'Vinculos', 'rmb_vinculo'),
(27, 'Vulnerabilidades', 'rmb_tvulnera'),
(28, 'Categoria Vulnerabilidad', 'rmb_cvulnera'),
(29, 'Tipo de Mascota', 'rmb_tmascotas'),
(30, 'Zonas', 'rmb_zonas'),
(31, 'Parqueaderos', 'rmb_parq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_mant`
--

CREATE TABLE IF NOT EXISTS `rmb_mant` (
`rmb_mant_id` int(8) NOT NULL,
  `rmb_equipos_id` int(8) NOT NULL,
  `rmb_mant_fmant` date DEFAULT NULL,
  `rmb_mant_fprox` date DEFAULT NULL,
  `rmb_mant_obs` blob,
  `rmb_mant_val` int(8) DEFAULT NULL,
  `rmb_est_id` int(8) DEFAULT NULL,
  `rmb_emp_id` int(8) DEFAULT NULL,
  `rmb_mant_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de Ingreso',
  `rmb_mant_user` int(8) NOT NULL COMMENT 'Usuario que ingresa'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los mantenimientos futuros y pasados de los equipos.';

--
-- Truncar tablas antes de insertar `rmb_mant`
--

TRUNCATE TABLE `rmb_mant`;
--
-- Volcado de datos para la tabla `rmb_mant`
--

INSERT INTO `rmb_mant` (`rmb_mant_id`, `rmb_equipos_id`, `rmb_mant_fmant`, `rmb_mant_fprox`, `rmb_mant_obs`, `rmb_mant_val`, `rmb_est_id`, `rmb_emp_id`, `rmb_mant_fecha`, `rmb_mant_user`) VALUES
(2, 4, '2014-06-04', '2014-07-04', 0x4d616e74656e696d69656e746f20636f727265637469766f2c2073652063616d626961726f6e206c6f732066757369626c65732064656c20636f6e74726f6c206465206d616e646f20706f72206465746572696f726f2c20656c2065717569706f2071756564612066756e63696f6e616e646f206269656e2e, 162300, 8, NULL, '2014-07-04 12:35:02', 2),
(3, 1, '2014-01-01', '2014-07-01', 0x4d616e74656e696d69656e746f20636f727265637469766f2c2073652063616d626961726f6e206c6f7320656d706171756573206465206c612073616c69646120706f72206465746572696f726f2c20656c2065717569706f2073652064656a612066756e63696f6e616e646f20636f7272656374616d656e74652c2073652070726f6772616d61206d616e74656e696d69656e746f2070726576656e7469766f20706172612064656e74726f2064652036206d657365732e, 54600, 8, NULL, '2014-07-04 12:40:17', 2),
(4, 4, '2015-10-15', '2015-12-15', 0x507275656261206465206e7565766f206d616e74656e696d69656e746f2c2073652065737461626c6563652070726f78696d6f206d616e74656e696d69656e746f20706172612064656e74726f20646520444f53206d657365732063616c656e646172696f2e, 250000, 8, NULL, '2015-10-16 15:40:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_mascotas`
--

CREATE TABLE IF NOT EXISTS `rmb_mascotas` (
`rmb_mascotas_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_mascotas_nom` varchar(45) DEFAULT NULL COMMENT 'Nombre de la mascota.',
  `rmb_mascotas_raza` varchar(45) DEFAULT NULL COMMENT 'Raza de la mascota.',
  `rmb_mascotas_vac` varchar(100) DEFAULT NULL COMMENT 'link de archivo cargado de las vacunas.',
  `rmb_tmascotas_id` int(8) DEFAULT NULL COMMENT 'Tipo de mascota.',
  `rmb_aptos_id` int(8) DEFAULT NULL COMMENT 'Apartamento a la que pertenece la mascota.',
  `rmb_mascotas_fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se ingresa el registro.',
  `rmb_mascotas_user` int(8) DEFAULT NULL COMMENT 'Usuario que ingresa el registro.'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_mascotas`
--

TRUNCATE TABLE `rmb_mascotas`;
--
-- Volcado de datos para la tabla `rmb_mascotas`
--

INSERT INTO `rmb_mascotas` (`rmb_mascotas_id`, `rmb_mascotas_nom`, `rmb_mascotas_raza`, `rmb_mascotas_vac`, `rmb_tmascotas_id`, `rmb_aptos_id`, `rmb_mascotas_fecha`, `rmb_mascotas_user`) VALUES
(5, 'Tony', 'Pequines', '../images/mascotas/5_vac.pdf', 1, 1, '2015-10-19 20:25:11', 1),
(6, 'Copito', 'Criollo', '../images/mascotas/6_vac.pdf', 1, 1, '2015-09-24 14:03:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_mens`
--

CREATE TABLE IF NOT EXISTS `rmb_mens` (
`rmb_mens_id` int(8) NOT NULL,
  `rmb_mens_asunto` varchar(255) DEFAULT NULL,
  `rmb_mens_mens` blob,
  `rmb_mens_fenv` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rmb_mens_frec` datetime DEFAULT NULL,
  `rmb_est_id` int(8) DEFAULT NULL,
  `rmb_mens_flee` datetime DEFAULT NULL COMMENT 'Fecha en que es leído el mensaje.'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los mensajes de cada residente.';

--
-- Truncar tablas antes de insertar `rmb_mens`
--

TRUNCATE TABLE `rmb_mens`;
--
-- Volcado de datos para la tabla `rmb_mens`
--

INSERT INTO `rmb_mens` (`rmb_mens_id`, `rmb_mens_asunto`, `rmb_mens_mens`, `rmb_mens_fenv`, `rmb_mens_frec`, `rmb_est_id`, `rmb_mens_flee`) VALUES
(1, 'Mensaje a tres destinatarios', 0x507275656261206465204d656e73616a65206120747265732064657374696e61746172696f732e, '2015-10-28 21:29:13', NULL, 6, NULL),
(2, 'Mensaje a un solo destinatario', 0x507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e20507275656261206465206d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e, '2015-10-28 21:48:02', NULL, 5, NULL),
(3, 'Envio a dos destinatarios', 0x50727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e50727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e50727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e2050727565626120646520656e76696f206120646f732064657374696e61746172696f732e, '2015-10-28 21:49:58', NULL, 5, NULL),
(4, '4 destinatarios', 0x4d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e204d656e73616a6520646520707275656261206120342064657374696e61746172696f732e, '2015-10-28 21:53:10', NULL, 5, NULL),
(5, 'Nuevo mensaje a un destinatario', 0x5072756562612064656d656e73616a65206120756e20736f6c6f2064657374696e61746172696f2e, '2015-10-28 22:13:42', NULL, 5, NULL),
(6, 'Otro mensaje a un destinatario', 0x4e75657661206d707275656261206120756e2064657374696e61746172696f2e, '2015-10-28 22:15:54', NULL, 6, NULL),
(7, 'Otra prueba 1 destinatario', 0x4e756576612070727565626120646520656e76696f206465206d656e73616a65206120756e2064657374696e61746172696f2e, '2015-10-28 22:17:34', NULL, 5, NULL),
(12, 'FW: Mensaje a tres destinatarios', 0x4d656e73616a6520646520726573707565737461, '2015-10-30 16:56:59', NULL, 5, NULL),
(13, 'FW: 4 destinatarios', 0x4d656e73616a65207265656e766961646f206120446965676f204265726d7564657a, '2015-11-03 16:46:34', NULL, 5, NULL),
(14, 'FW: Mensaje a tres destinatarios', 0x4d656e73616a65207265656e766961646f20612046726564792056656c616e646961, '2015-11-03 17:08:30', NULL, 5, NULL),
(15, 'FW: Mensaje a tres destinatarios', 0x4d656e73616a65207265656e766961646f20612063756174726f2064657374696e61746172696f733c62723e44653a20313036202d204a75616e2043616e63696e6f3c62723e4173756e746f3a204d656e73616a65206120747265732064657374696e61746172696f733c62723e4d656e73616a653a20507275656261206465204d656e73616a65206120747265732064657374696e61746172696f732e, '2015-11-03 17:51:19', NULL, 5, NULL),
(16, 'FW: Mensaje a tres destinatarios', 0x5265656e76696f206465206d656e73616a65206120646f732064657374696e61746172696f732e3c62723e44653a20313036202d204a75616e2043616e63696e6f3c62723e4173756e746f3a204d656e73616a65206120747265732064657374696e61746172696f733c62723e4d656e73616a653a20507275656261206465204d656e73616a65206120747265732064657374696e61746172696f732e3c62723e456e766961646f3a20323031352d31302d32382031363a32393a3133, '2015-11-03 17:57:41', NULL, 5, NULL),
(17, 'Mensaje nuevo en servidor local', 0x45737465206d656e73616a6520657320646520707275656261206573206e7565766f206120756e20736f6c6f2064657374696e61746172696f2e, '2015-11-03 19:54:43', NULL, 5, NULL),
(18, 'Dos destinatarios', 0x4e7565766f206d656e73616a65207061726120646f732064657374696e61746172696f732e, '2015-11-03 19:57:57', NULL, 5, NULL),
(19, 'Mensaje a un solo destinatario', 0x4573746120657320756e6120707275656261206465207265737075657374612061206d656e6a736120726563696269646f, '2015-11-03 19:59:50', NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_mens_dest`
--

CREATE TABLE IF NOT EXISTS `rmb_mens_dest` (
`rmb_mens_dest_id` int(8) NOT NULL,
  `rmb_mens_id` int(8) NOT NULL,
  `rmb_residente_id` int(8) DEFAULT NULL,
  `rmb_mens_dest_tipo` varchar(50) DEFAULT NULL COMMENT 'tipo destinatario para, cc, cco'
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los destinatarios de un mensaje.';

--
-- Truncar tablas antes de insertar `rmb_mens_dest`
--

TRUNCATE TABLE `rmb_mens_dest`;
--
-- Volcado de datos para la tabla `rmb_mens_dest`
--

INSERT INTO `rmb_mens_dest` (`rmb_mens_dest_id`, `rmb_mens_id`, `rmb_residente_id`, `rmb_mens_dest_tipo`) VALUES
(1, 1, 1, 'para'),
(2, 1, 6, 'de'),
(3, 1, 7, 'para'),
(4, 1, 9, 'para'),
(5, 2, 7, 'de'),
(6, 3, 1, 'de'),
(7, 3, 7, 'para'),
(8, 3, 6, 'para'),
(9, 4, 1, 'de'),
(10, 4, 5, 'para'),
(11, 4, 6, 'para'),
(12, 4, 7, 'para'),
(13, 4, 9, 'para'),
(14, 2, 1, 'para'),
(15, 5, 1, 'de'),
(16, 5, 6, 'para'),
(17, 6, 1, 'de'),
(18, 6, 9, 'para'),
(19, 7, 1, 'de'),
(20, 7, 5, 'para'),
(27, 12, 1, 'de'),
(28, 12, 6, 'para'),
(29, 13, 1, 'de'),
(30, 13, 7, 'para'),
(31, 14, 1, 'de'),
(32, 14, 9, 'para'),
(33, 15, 1, 'de'),
(34, 15, 6, 'para'),
(35, 15, 7, 'para'),
(36, 15, 9, 'para'),
(37, 15, 5, 'para'),
(38, 16, 1, 'de'),
(39, 16, 9, 'para'),
(40, 16, 5, 'para'),
(41, 17, 1, 'de'),
(42, 17, 9, 'para'),
(43, 18, 1, 'de'),
(44, 18, 9, 'para'),
(45, 18, 6, 'para'),
(46, 19, 1, 'de'),
(47, 19, 7, 'para');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_mod`
--

CREATE TABLE IF NOT EXISTS `rmb_mod` (
`rmb_mod_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_mod_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los modulos que se tendrán en la aplicación.';

--
-- Truncar tablas antes de insertar `rmb_mod`
--

TRUNCATE TABLE `rmb_mod`;
--
-- Volcado de datos para la tabla `rmb_mod`
--

INSERT INTO `rmb_mod` (`rmb_mod_id`, `rmb_mod_nom`) VALUES
(1, 'Calendario'),
(2, 'Tareas'),
(3, 'Inmuebles'),
(4, 'Documentos'),
(5, 'Mensajes'),
(6, 'Equipos'),
(7, 'Contabilidad'),
(8, 'Apartamento'),
(9, 'Parqueaderos'),
(10, 'Residentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_obs_cal`
--

CREATE TABLE IF NOT EXISTS `rmb_obs_cal` (
`rmb_obs_cal_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_calendario_id` int(8) NOT NULL COMMENT 'Calendario/Tarea',
  `rmb_obs_cal_obs` blob NOT NULL COMMENT 'Observación',
  `rmb_obs_cal_fini` datetime NOT NULL COMMENT 'Fecha de Ingreso',
  `rmb_obs_cal_user` int(8) NOT NULL COMMENT 'Usuario que Ingreso'
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las observaciones realizadas a las tareas en el calendario.';

--
-- Truncar tablas antes de insertar `rmb_obs_cal`
--

TRUNCATE TABLE `rmb_obs_cal`;
--
-- Volcado de datos para la tabla `rmb_obs_cal`
--

INSERT INTO `rmb_obs_cal` (`rmb_obs_cal_id`, `rmb_calendario_id`, `rmb_obs_cal_obs`, `rmb_obs_cal_fini`, `rmb_obs_cal_user`) VALUES
(1, 1, 0x4573746120657320756e6120707275656261206465206f6273657276616369c3b36e2070617261206c61207461726561206e756d65726f20756e6f, '2014-05-19 19:36:26', 1),
(2, 1, 0x536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a, '2014-05-19 19:52:28', 1),
(3, 1, 0x536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a536567756e64612070727565626120646520696e677265736f206465206f62736572766163696f6e65732e0a, '2014-05-19 19:53:00', 1),
(4, 2, 0x4573746120657320756e612070727565626120646520696e677265736f206465206f6273657276616369c3b36e20656e207461726561206e756d65726f2032, '2014-05-19 19:55:54', 1),
(5, 2, 0x4f74726120707275656261206d6173206465206f62736572766163696f6e657320656e2074617265612032, '2014-05-19 19:57:15', 1),
(6, 2, 0x4e756576612070727565626120646520696e677265736f206465206f6273657276616369c3b36e207461726561206e756d65726f2032, '2014-05-19 19:59:12', 1),
(7, 2, 0x556e612076657a206d61732070727565626120646520696e677265736f206465206f62736572766163696f6e2074617265612032, '2014-05-19 20:01:19', 1),
(8, 1, 0x556e61206e75657661207072756562612070617261206c61207461726561206e756d65726f2031, '2014-05-19 20:05:26', 1),
(9, 2, 0x5175696e74612070727565626120646520696e677265736f206465206f6273657276616369c3b36e20656e2074617265612032, '2014-05-19 20:08:25', 1),
(10, 1, 0x5175696e74612070727565626120646520696e677265736f206465206f62736572766163696f6e657320656e206c61207461726561206e756d65726f20756e6f, '2014-05-19 20:30:47', 1),
(11, 1, 0x5175696e74612070727565626120646520696e677265736f206465206f62736572766163696f6e657320656e206c61207461726561206e756d65726f20756e6f, '2014-05-19 20:31:31', 1),
(12, 1, 0x5175696e74612070727565626120646520696e677265736f206465206f62736572766163696f6e657320656e206c61207461726561206e756d65726f20756e6f, '2014-05-19 20:31:31', 1),
(13, 1, 0x5175696e74612070727565626120646520696e677265736f206465206f62736572766163696f6e657320656e206c61207461726561206e756d65726f20756e6f, '2014-05-19 20:31:32', 1),
(14, 2, 0x50686173656c6c757320657569736d6f6420756c747269636573206573742c20696420616363756d73616e206475692073656d70657220696e2e2041656e65616e206573742065726f732c20666175636962757320717569732073617069656e206e6f6e2c20696163756c69732074656d706f72206c696265726f2e205072616573656e742073697420616d657420736f6c6c696369747564696e206d617373612e20566976616d7573206574207075727573206e6f6e2074757270697320656c656966656e6420636f6e64696d656e74756d2076697461652075742072697375732e2043757261626974757220747269737469717565206c6967756c61207365642076656e656e6174697320636f6e7365717561742e204e756c6c616d207175616d20616e74652c2070756c76696e6172206174206e69626820717569732c2061646970697363696e67206469676e697373696d206e756e632e2044756973207365642075726e61206e6962682e2044756973206f7263692073617069656e2c20636f6d6d6f646f2076656c20706f72747469746f7220717569732c20636f6e76616c6c6973206574206c6967756c612e20446f6e6563206e6f6e20766573746962756c756d20656e696d2c20657420766976657272612070757275732e204e756c6c61206e656320656c656966656e64206475692c20696d706572646965742074656d7075732072697375732e204e756c6c61206c75637475732c2073617069656e20766974616520636f6e76616c6c697320756c7472696365732c206175677565206d65747573206d6f6c65737469652073656d2c206574206665726d656e74756d2066656c69732074656c6c7573206964206c6f72656d2e20496e20656c656d656e74756d207665686963756c61206e69736c20736f6c6c696369747564696e2061646970697363696e672e2053656420617420636f6d6d6f646f2074656c6c75732e204e756c6c61207472697374697175652061207175616d206e6f6e20677261766964612e204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e, '2014-05-19 20:32:16', 1),
(15, 1, 0x50686173656c6c757320657569736d6f6420756c747269636573206573742c20696420616363756d73616e206475692073656d70657220696e2e2041656e65616e206573742065726f732c20666175636962757320717569732073617069656e206e6f6e2c20696163756c69732074656d706f72206c696265726f2e205072616573656e742073697420616d657420736f6c6c696369747564696e206d617373612e20566976616d7573206574207075727573206e6f6e2074757270697320656c656966656e6420636f6e64696d656e74756d2076697461652075742072697375732e2043757261626974757220747269737469717565206c6967756c61207365642076656e656e6174697320636f6e7365717561742e204e756c6c616d207175616d20616e74652c2070756c76696e6172206174206e69626820717569732c2061646970697363696e67206469676e697373696d206e756e632e2044756973207365642075726e61206e6962682e2044756973206f7263692073617069656e2c20636f6d6d6f646f2076656c20706f72747469746f7220717569732c20636f6e76616c6c6973206574206c6967756c612e20446f6e6563206e6f6e20766573746962756c756d20656e696d2c20657420766976657272612070757275732e204e756c6c61206e656320656c656966656e64206475692c20696d706572646965742074656d7075732072697375732e204e756c6c61206c75637475732c2073617069656e20766974616520636f6e76616c6c697320756c7472696365732c206175677565206d65747573206d6f6c65737469652073656d2c206574206665726d656e74756d2066656c69732074656c6c7573206964206c6f72656d2e20496e20656c656d656e74756d207665686963756c61206e69736c20736f6c6c696369747564696e2061646970697363696e672e2053656420617420636f6d6d6f646f2074656c6c75732e204e756c6c61207472697374697175652061207175616d206e6f6e20677261766964612e204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e, '2014-05-19 20:36:13', 1),
(16, 2, 0x496e206d6f6c6573746965206469676e697373696d206d6f6c65737469652e20447569732074656d707573206f7263692071756973206a7573746f20646170696275732076656e656e617469732e20416c697175616d206469616d2073617069656e2c20756c747269636573206e6f6e2074656c6c75732061742c206f726e61726520656765737461732065726f732e2050686173656c6c757320766f6c75747061742073617069656e2073697420616d6574206e756c6c61206c616f726565742c2076656c206469676e697373696d207175616d206d61747469732e20416c697175616d20636f6e736571756174207269737573206163206d6f6c6c6973207665686963756c612e204e756c6c6120617420706f72747469746f72206c656f2e20566976616d75732061742074696e636964756e7420617263752e20446f6e656320666163696c697369732061756775652065752074656d706f722070686172657472612e, '2014-05-19 20:38:09', 1),
(17, 2, 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e756c6c616d2061206f64696f2068656e6472657269742c2066657567696174206d692065742c20616c697175657420746f72746f722e20496e7465676572206120616e746520696e2074757270697320616c697175616d2074726973746971756520696e206174206d61676e612e20446f6e65632068656e6472657269742064696374756d206f7263692e20566976616d7573207175616d2076656c69742c20616363756d73616e2076656c20636f6e76616c6c6973206e6f6e2c206d616c65737561646120757420646f6c6f722e2043756d20736f63696973206e61746f7175652070656e617469627573206574206d61676e6973206469732070617274757269656e74206d6f6e7465732c206e61736365747572207269646963756c7573206d75732e20446f6e656320696e207669766572726120746f72746f722e20446f6e656320706f73756572652c206d617373612065742063757273757320656c656966656e642c20617263752061756775652076656e656e61746973206c65637475732c20696e20736f64616c657320697073756d206e697369206e6563206f64696f2e20446f6e656320656e696d207475727069732c2065676573746173207669746165206c61637573206e6f6e2c2074696e636964756e74207363656c65726973717565206c696265726f2e, '2014-05-19 20:39:15', 1),
(18, 2, 0x4d6175726973206c616f7265657420616c697175657420707572757320617420636f6e76616c6c69732e2051756973717565206665726d656e74756d206d6574757320617420646f6c6f722070686172657472612c20657420626962656e64756d20616e74652072686f6e6375732e20416c697175616d20736f6c6c696369747564696e2061206f7263692065752064696374756d2e204d6f72626920656e696d2065726f732c20766f6c757470617420736564206d692061632c207375736369706974206c6f626f72746973206d61676e612e20566976616d757320636f6d6d6f646f206c696265726f207475727069732c206e656320756c747269636573206d657475732072686f6e637573207365642e204475697320706c616365726174206c616375732061207475727069732072757472756d2c207175697320657569736d6f6420616e74652070686172657472612e204675736365206174206c61637573207175616d2e20496e20616c6971756574206574206d617572697320657420756c747269636965732e2053656420697073756d20657261742c206d6f6c6573746965206575207363656c657269737175652073697420616d65742c20696163756c697320766974616520656e696d2e20566573746962756c756d206e6563207175616d20612074757270697320706861726574726120766f6c75747061742069642073656420697073756d2e204e756c6c616d2076756c707574617465206661756369627573206c6967756c612069642074696e636964756e742e20496e207669746165206e756e632064617069627573206e69626820666175636962757320736f64616c65732e, '2014-05-19 20:40:14', 1),
(19, 1, 0x4d6175726973206c616f7265657420616c697175657420707572757320617420636f6e76616c6c69732e2051756973717565206665726d656e74756d206d6574757320617420646f6c6f722070686172657472612c20657420626962656e64756d20616e74652072686f6e6375732e20416c697175616d20736f6c6c696369747564696e2061206f7263692065752064696374756d2e204d6f72626920656e696d2065726f732c20766f6c757470617420736564206d692061632c207375736369706974206c6f626f72746973206d61676e612e20566976616d757320636f6d6d6f646f206c696265726f207475727069732c206e656320756c747269636573206d657475732072686f6e637573207365642e204475697320706c616365726174206c616375732061207475727069732072757472756d2c207175697320657569736d6f6420616e74652070686172657472612e204675736365206174206c61637573207175616d2e20496e20616c6971756574206574206d617572697320657420756c747269636965732e2053656420697073756d20657261742c206d6f6c6573746965206575207363656c657269737175652073697420616d65742c20696163756c697320766974616520656e696d2e20566573746962756c756d206e6563207175616d20612074757270697320706861726574726120766f6c75747061742069642073656420697073756d2e204e756c6c616d2076756c707574617465206661756369627573206c6967756c612069642074696e636964756e742e20496e207669746165206e756e632064617069627573206e69626820666175636962757320736f64616c65732e, '2014-05-19 20:40:31', 1),
(20, 2, 0x4d6175726973206c616f7265657420616c697175657420707572757320617420636f6e76616c6c69732e2051756973717565206665726d656e74756d206d6574757320617420646f6c6f722070686172657472612c20657420626962656e64756d20616e74652072686f6e6375732e20416c697175616d20736f6c6c696369747564696e2061206f7263692065752064696374756d2e204d6f72626920656e696d2065726f732c20766f6c757470617420736564206d692061632c207375736369706974206c6f626f72746973206d61676e612e20566976616d757320636f6d6d6f646f206c696265726f207475727069732c206e656320756c747269636573206d657475732072686f6e637573207365642e204475697320706c616365726174206c616375732061207475727069732072757472756d2c207175697320657569736d6f6420616e74652070686172657472612e204675736365206174206c61637573207175616d2e20496e20616c6971756574206574206d617572697320657420756c747269636965732e2053656420697073756d20657261742c206d6f6c6573746965206575207363656c657269737175652073697420616d65742c20696163756c697320766974616520656e696d2e20566573746962756c756d206e6563207175616d20612074757270697320706861726574726120766f6c75747061742069642073656420697073756d2e204e756c6c616d2076756c707574617465206661756369627573206c6967756c612069642074696e636964756e742e20496e207669746165206e756e632064617069627573206e69626820666175636962757320736f64616c65732e, '2014-05-19 20:41:34', 1),
(21, 1, 0x496e7465676572206e6f6e20766172697573206c65637475732e204e756e6320756c74726963657320656c656d656e74756d206c65637475732c206174206c7563747573206a7573746f20696163756c6973206e6f6e2e20457469616d206d61747469732074696e636964756e74207175616d20656765742074656d706f722e20566573746962756c756d2073697420616d657420657374206e656320657374206665756769617420666163696c697369732e2051756973717565207669746165206e696268206d61757269732e20557420656765742074696e636964756e74207175616d2c20757420736f64616c6573206a7573746f2e2050656c6c656e746573717565206964206d6175726973206d692e20496e206a7573746f206f7263692c2068656e6472657269742075742064696374756d2065742c2076756c707574617465207669746165206a7573746f2e2050656c6c656e7465737175652065676574206661756369627573206e657175652c2069642068656e6472657269742070757275732e2043757261626974757220766974616520616e74652070686172657472612c20636f6e677565206e69736c2073697420616d65742c206d616c657375616461207475727069732e204d616563656e617320617563746f7220706f7375657265206d6f6c6c69732e20496e206c6163696e6961207068617265747261206e69736c2c2073697420616d6574206c6f626f7274697320647569206c75637475732065742e20536564206f726e617265206661756369627573206c6163696e69612e2043726173206964207661726975732072697375732e, '2014-05-19 20:42:33', 1),
(22, 2, 0x496e7465676572206e6f6e20766172697573206c65637475732e204e756e6320756c74726963657320656c656d656e74756d206c65637475732c206174206c7563747573206a7573746f20696163756c6973206e6f6e2e20457469616d206d61747469732074696e636964756e74207175616d20656765742074656d706f722e20566573746962756c756d2073697420616d657420657374206e656320657374206665756769617420666163696c697369732e2051756973717565207669746165206e696268206d61757269732e20557420656765742074696e636964756e74207175616d2c20757420736f64616c6573206a7573746f2e2050656c6c656e746573717565206964206d6175726973206d692e20496e206a7573746f206f7263692c2068656e6472657269742075742064696374756d2065742c2076756c707574617465207669746165206a7573746f2e2050656c6c656e7465737175652065676574206661756369627573206e657175652c2069642068656e6472657269742070757275732e2043757261626974757220766974616520616e74652070686172657472612c20636f6e677565206e69736c2073697420616d65742c206d616c657375616461207475727069732e204d616563656e617320617563746f7220706f7375657265206d6f6c6c69732e20496e206c6163696e6961207068617265747261206e69736c2c2073697420616d6574206c6f626f7274697320647569206c75637475732065742e20536564206f726e617265206661756369627573206c6163696e69612e2043726173206964207661726975732072697375732e, '2014-05-19 20:42:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_pagos`
--

CREATE TABLE IF NOT EXISTS `rmb_pagos` (
`rmb_pagos_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla',
  `rmb_pagos_fpago` date DEFAULT NULL COMMENT 'Fecha en que se realiza el pago.',
  `rmb_pagos_valor` varchar(100) NOT NULL DEFAULT '0' COMMENT 'Valor pagado',
  `rmb_pagos_obs` varchar(255) DEFAULT NULL COMMENT 'Observación',
  `rmb_tesoreria_id` int(8) DEFAULT NULL COMMENT 'Id de la deuda a pagar.',
  `rmb_fpago_id` int(8) DEFAULT NULL COMMENT 'Forma en que se realiza el pago.',
  `rmb_pagos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha en que se genera el registro.',
  `rmb_pagos_user` int(8) DEFAULT NULL COMMENT 'Usuario que ingresa el registro'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_pagos`
--

TRUNCATE TABLE `rmb_pagos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_parq`
--

CREATE TABLE IF NOT EXISTS `rmb_parq` (
`rmb_parq_id` int(8) NOT NULL COMMENT 'Id',
  `rmb_parq_nom` varchar(45) NOT NULL COMMENT 'Número ',
  `rmb_parq_obs` blob COMMENT 'Observación',
  `rmb_aptos_id` int(8) NOT NULL DEFAULT '0' COMMENT 'Apartamento',
  `rmb_zonas_id` int(8) DEFAULT NULL COMMENT 'Zona'
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='tabla que almacena los parqueaderos de cada apartamento.';

--
-- Truncar tablas antes de insertar `rmb_parq`
--

TRUNCATE TABLE `rmb_parq`;
--
-- Volcado de datos para la tabla `rmb_parq`
--

INSERT INTO `rmb_parq` (`rmb_parq_id`, `rmb_parq_nom`, `rmb_parq_obs`, `rmb_aptos_id`, `rmb_zonas_id`) VALUES
(1, '1', NULL, 1, 14),
(2, '2', NULL, 0, 14),
(3, '3', NULL, 0, 14),
(4, '4', NULL, 0, 14),
(5, '5', NULL, 0, 14),
(6, '6', NULL, 0, 14),
(7, '7', NULL, 0, 14),
(8, '8', NULL, 0, 14),
(9, '9', NULL, 0, 14),
(10, '10', NULL, 0, 14),
(11, '11', '', 0, 29),
(12, '12', NULL, 0, 29),
(13, '13', NULL, 0, 29),
(14, '14', NULL, 0, 29),
(15, '15', NULL, 0, 29),
(16, '16', NULL, 0, 29),
(17, '17', NULL, 0, 29),
(18, '18', NULL, 0, 29),
(19, '19', NULL, 0, 29),
(20, '20', NULL, 0, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_perf`
--

CREATE TABLE IF NOT EXISTS `rmb_perf` (
`rmb_perf_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_perf_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los perfiles que se utilizaran en la aplicación.';

--
-- Truncar tablas antes de insertar `rmb_perf`
--

TRUNCATE TABLE `rmb_perf`;
--
-- Volcado de datos para la tabla `rmb_perf`
--

INSERT INTO `rmb_perf` (`rmb_perf_id`, `rmb_perf_nom`) VALUES
(1, 'Master'),
(2, 'Administrador'),
(3, 'Consejo'),
(4, 'Residente'),
(5, 'Contador'),
(6, 'Revisor Fiscal'),
(7, 'Seguridad'),
(8, 'Aseo'),
(9, 'Comite de Convivencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_perm`
--

CREATE TABLE IF NOT EXISTS `rmb_perm` (
`rmb_perm_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_perm_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de permiso permitidos para los perfiles.';

--
-- Truncar tablas antes de insertar `rmb_perm`
--

TRUNCATE TABLE `rmb_perm`;
--
-- Volcado de datos para la tabla `rmb_perm`
--

INSERT INTO `rmb_perm` (`rmb_perm_id`, `rmb_perm_nom`) VALUES
(1, 'Ingresar'),
(2, 'Editar'),
(3, 'Borrar'),
(4, 'Consultar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_perm_perf`
--

CREATE TABLE IF NOT EXISTS `rmb_perm_perf` (
  `rmb_perf_id` int(8) NOT NULL,
  `rmb_perm_id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los permisos por perfil que se darán.';

--
-- Truncar tablas antes de insertar `rmb_perm_perf`
--

TRUNCATE TABLE `rmb_perm_perf`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_port`
--

CREATE TABLE IF NOT EXISTS `rmb_port` (
`rmb_port_id` int(8) NOT NULL,
  `rmb_proyecto_id` int(8) NOT NULL,
  `rmb_port_nom` varchar(50) DEFAULT NULL,
  `rmb_port_dir` varchar(100) DEFAULT NULL,
  `rmb_port_tel` varchar(50) DEFAULT NULL,
  `rmb_port_cel` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los datos de las porterías por cada proyecto.';

--
-- Truncar tablas antes de insertar `rmb_port`
--

TRUNCATE TABLE `rmb_port`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_proyecto`
--

CREATE TABLE IF NOT EXISTS `rmb_proyecto` (
`rmb_proyecto_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_tproyecto_id` int(8) NOT NULL COMMENT 'Id del tipo de proyecto.',
  `rmb_proyecto_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre del proyecto (conjunto residencial, edificio, etc.).',
  `rmb_proyecto_dir` varchar(100) DEFAULT NULL COMMENT 'Dirección global del proyecto, conjunto.',
  `rmb_proyecto_tel` varchar(50) DEFAULT NULL COMMENT 'Teléfono del proyecto.',
  `rmb_proyecto_cel` varchar(50) DEFAULT NULL COMMENT 'Número de telefono del proyecto.',
  `rmb_proyecto_area` int(8) DEFAULT NULL COMMENT 'Área total que abarca el proyecto.',
  `rmb_proyecto_tdoc` int(8) DEFAULT NULL COMMENT 'Tipo de Documento',
  `rmb_proyecto_ndoc` varchar(50) DEFAULT NULL COMMENT 'Número de Documento',
  `rmb_proyecto_email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `rmb_proyecto_foto` longblob COMMENT 'Imagen',
  `rmb_proyecto_obs` blob COMMENT 'Observación',
  `rmb_proyecto_plantilla` int(8) DEFAULT NULL COMMENT 'Plantilla que utilizara el cliente.',
  `rmb_proyecto_finiadmin` int(11) NOT NULL DEFAULT '1' COMMENT 'Día de inicio para pago de administración',
  `rmb_proyecto_ffinadmin` int(11) NOT NULL DEFAULT '30' COMMENT 'Día limite de pago de administración',
  `rmb_proyecto_fdescadmin` int(11) NOT NULL DEFAULT '15' COMMENT 'Día limite de descuento por pronto pago de administración.',
  `rmb_proyecto_fecha` datetime DEFAULT NULL COMMENT 'Fecha en que se ingresa el registro.',
  `rmb_proyecto_user` int(8) DEFAULT NULL COMMENT 'Usuario que ingresa el registro.'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los proyectos registrados en la base de datos, estos serian cada uno de los clientes que se tendrían.';

--
-- Truncar tablas antes de insertar `rmb_proyecto`
--

TRUNCATE TABLE `rmb_proyecto`;
--
-- Volcado de datos para la tabla `rmb_proyecto`
--

INSERT INTO `rmb_proyecto` (`rmb_proyecto_id`, `rmb_tproyecto_id`, `rmb_proyecto_nom`, `rmb_proyecto_dir`, `rmb_proyecto_tel`, `rmb_proyecto_cel`, `rmb_proyecto_area`, `rmb_proyecto_tdoc`, `rmb_proyecto_ndoc`, `rmb_proyecto_email`, `rmb_proyecto_foto`, `rmb_proyecto_obs`, `rmb_proyecto_plantilla`, `rmb_proyecto_finiadmin`, `rmb_proyecto_ffinadmin`, `rmb_proyecto_fdescadmin`, `rmb_proyecto_fecha`, `rmb_proyecto_user`) VALUES
(1, 1, 'Beamonte', 'Carrera con calle', '5555555', '3205555555', 1000, 6, '800900700-1', 'admin@gaia.com', NULL, NULL, 1, 1, 30, 15, '2015-09-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_residente`
--

CREATE TABLE IF NOT EXISTS `rmb_residente` (
`rmb_residente_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_residente_nom` varchar(50) NOT NULL COMMENT 'Nombres',
  `rmb_residente_ape` varchar(50) DEFAULT NULL COMMENT 'Apellidos',
  `rmb_residente_doc` varchar(30) DEFAULT NULL COMMENT 'No. Documento',
  `rmb_residente_dir` varchar(100) DEFAULT NULL COMMENT 'Dirección',
  `rmb_residente_tel` varchar(50) DEFAULT NULL COMMENT 'Teléfono',
  `rmb_residente_cel` varchar(50) DEFAULT NULL COMMENT 'Celular',
  `rmb_residente_pass` varchar(50) DEFAULT NULL COMMENT 'Contraseña',
  `rmb_residente_email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `rmb_residente_fnac` date DEFAULT NULL COMMENT 'Fecha Nacimiento',
  `rmb_residente_nom2` varchar(100) DEFAULT NULL COMMENT 'Razón Social',
  `rmb_residente_obs` blob COMMENT 'Observación',
  `rmb_residente_fini` date DEFAULT NULL COMMENT 'Fecha registro',
  `rmb_residente_ffin` date DEFAULT NULL COMMENT 'Fecha alta',
  `rmb_residente_foto` longblob COMMENT 'Foto',
  `rmb_gen_id` int(8) DEFAULT NULL COMMENT 'Genero.',
  `rmb_residente_hijo` bit(1) DEFAULT NULL COMMENT 'Tiene hijos?',
  `rmb_residente_vive` bit(1) DEFAULT NULL COMMENT 'Vive en el Apto.',
  `rmb_residente_perm` longblob COMMENT 'Permisos de un empleado o personal autorizado para el ingreso al edificio.',
  `rmb_perf_id` int(8) NOT NULL DEFAULT '4' COMMENT 'Perfil (master, administrador, consejo, residente, contador, revisor fiscal, seguridad, aseo, comité convivencia).',
  `rmb_carg_id` int(8) DEFAULT NULL COMMENT 'Cargo (Administrador, Consejo, Presidente consejo, suplente, etc.).',
  `rmb_vinculo_id` int(8) DEFAULT NULL COMMENT 'Vinculo con el propietario o que ocupa en el nucleo familiar (para el caso de habitantes).',
  `rmb_tdoc_id` int(8) NOT NULL DEFAULT '1' COMMENT 'Tipo Documento',
  `rmb_est_id` int(8) DEFAULT NULL COMMENT 'Estado',
  `rmb_residente_fecha` datetime DEFAULT NULL COMMENT 'Fecha en que se ingresa el registro.',
  `rmb_residente_user` int(8) DEFAULT NULL COMMENT 'Usuario que ingresa el registro.'
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los propietarios, residentes, administradores y otro de un proyecto.';

--
-- Truncar tablas antes de insertar `rmb_residente`
--

TRUNCATE TABLE `rmb_residente`;
--
-- Volcado de datos para la tabla `rmb_residente`
--

INSERT INTO `rmb_residente` (`rmb_residente_id`, `rmb_residente_nom`, `rmb_residente_ape`, `rmb_residente_doc`, `rmb_residente_dir`, `rmb_residente_tel`, `rmb_residente_cel`, `rmb_residente_pass`, `rmb_residente_email`, `rmb_residente_fnac`, `rmb_residente_nom2`, `rmb_residente_obs`, `rmb_residente_fini`, `rmb_residente_ffin`, `rmb_residente_foto`, `rmb_gen_id`, `rmb_residente_hijo`, `rmb_residente_vive`, `rmb_residente_perm`, `rmb_perf_id`, `rmb_carg_id`, `rmb_vinculo_id`, `rmb_tdoc_id`, `rmb_est_id`, `rmb_residente_fecha`, `rmb_residente_user`) VALUES
(1, 'Wilson Giovanny', 'Velandia Barreto', '79888205', 'Cale 145A No. 9B-41', '3002325', '3204274564', 'gemelo22', 'willyv78@gmail.com', '1978-08-04', '', '', '2014-02-25', '2015-09-02', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c5232647651554642515535545657684656576442515546566330464251555643525546525155464251557733576b356a5155464251554674536b78534d4651764c336854636b316a4d4546425155464b5930566f576d4e3351554642525764425155464353554646596b7068656a524251554642536d5275516b4a61643046425156567a5155464252554a4254546471526a4a52515546455447645456564a43566b68715954646b4d544e31516e68574d3146455a325179576e5a4661456c4a5347465452544e7563314a7755474e7456466c7662306c4d4d556c46556b5a7761576c6e5a6c686163554e47516e4e6e53464e3551556c4d4d6e4a765a6d4e3161304642516b4a4253557054595768774f53733354546b345a566f324e7a4d77614546534d6a6b72596a4e51637a6b31656e5636637a64306558704e4e3355765a544a695432315954556c4a575646525557646e61476843516b4e44513064465255564a53556c5a555646525a32646f61454a4351304e445230564652556c4a53566c525556466e5a32686f516b4a4451304e4852555a7152544677635846584b7a5649546d6430626a5572646e5a4e54574a5359575a35556c524d59324d7761445a6c53444a695444524b626d46744e316448567a4a76547a4a4c4e304534654731434e6a6c484e7a424364334e6f61453172637a59785458524d5356526d61325972536d5a6d576d6f355a55684e565646584f554659645867794b3170724d544669646d5655554778354c7a5a4b4e7a597251324a6a62444e794e3246365657566c523063764d307052646d64784e556b776456464b5a334e505a314258564570714d6b6b7263336b355330566a556939614f57354a4e575a564b3370434f555a50656e637963334e6d6558525862306777633346364c30646b546e5a544e7a4e716555566b615570475a546c744d556c3061314179513346724e5768775a57523454546c6e52457453626938305255564c5756645064564645593070356255457752444172636e426d4f46647054544658646a4a5a645374324d6c645163444e6f61555a6c636d356a55477032655751346133553064324a4f4d6b64315a7a46734d3039494d55647251544e724d55597265566c6d5631426b576c5a495632567362555a324e58686c63487030566b63794d3159325453396d5157646f5a6b7079545338344e45397a61473033636d49324c336c7a4f4764744e574579565446724f566b306448686857444a325a3146366347394465465231646c426c64464131626a4636534855324c3368705747593265456c4e63334e724f566b764b304e4e4d6c41305257786f626b683156556b304e6d35436245644e4f585a48563045774d316c714e3341796257644a5356525464464978545449324f48567a4c324d724d47354b4f56633156325654626a553256335234636b5a4c57484e3357555631645667314d576c554b33423256576733525468584f486335536c643151555a785630524565574a724e3256744b304a56646a644e52574a69656b6831513078694e306455644752346344565954585259636b6835626b77344d6c4976536e5a7a57485278626c6378556e45355a7a424a535655335756707a556a64614e334e346545684863303031636a524f5431644b4d6a567964556731574749344b305a32645859305158677a4b31426b617a5a785a3356444c32786e4f544a444e554a4656573078536e4d344b3068424d6c70755a5731615a6a637864575a77537939714d6c4e3565545649626a466d576a5a7761446c4d636e68464f484a5a4d5856705a455a4653316c7a6256645a516e46315556426a574531774e314254626d52334e457442567a46684e533972646d704e4e485a715a6d4a494f4374455179394d5255453065575935556b39444e454a5156546b3252474e78626d383453335659526b566b55325a556330637754306c556158704c4e7a4e45536d31514d7a6c36513051344f576470656d394d646e417253315a6b645534725645395853484e6b56546c6863584d79656d5132576a52566433466854474a534d6e52775558646a645570694f4655724d6b7078615735584e31687954474a4e5a6e7077546d4a4a4c325a4e576a4a306330597a633063794d585a555754686f4e32355256444a796148707151554e694d6b703464455631546b394a5a46493352575972534751306457566c6146646164476c4c517a593162577453546c6b30616c5a6c53484d77546d5a69614456425a445a6b5132347865466c4c546a4e595a326c6f4e5468316133687755475531526c413156303944576e565a4d6d78694d6c6449546a4a704c32353254464178523256724b3064586355316b596a4e77636a52584f574e4e634577326248466f4b7a4a6d5a6b70764f56466c624535355a7a513254484634635739435a444e515a6d56556553747556485a59656d5a695a6c525051336c4754556469636c5976646b35616454566857485530553259764e4530336347314953584669656e704259553833516a684454314e52615564754e56644c533234724e304e77556a6456534456425a6c4a45616b39366147786d4e7a6434516b59344e32786959577035517a5a524e335a54576d46785353746b5557646f56456c555431464d61314e30596c68554e4735795248566d4d576c5063446334624564434d6e6c775931564b5244687757554532636c5672526e686b4d58497a654546454d6b6456555374564f575a496555646d63446c77626d6c53623264526433426b61554647626c5a454d30745157474a754e6c4a4d575339734c327858553039325632354b5a6c4a344d555a6a5648597752486c326345684264484259613164686157564a553268505969746d615449355a48637a575551725a54646a4f55357a636d785554533930646d383459316f774f47684552466f785932705955306c32596e707a5233597a4d6c68504f4756334c3068365a6c42364f453575593141354d58524b4f55646c553235734d7a63765130464f617a6b33576b783556574a306569383565553033546a4d784d30315057484e4657565a4e54453557527a6378524646335a7a6b774f46567762544e73566a6c7764554a34595464745a306f774e545a4465544a59576d7335616e56505332466864484a6f4e325253646e51325a316c47625730324e574a6b53444e6b633146465a6c5a555a57316b5647527161304e6d6556466d516e5a534f58704c5255314b626d526e5344644e5a4770684d545668626a6b356345356d546d356e4c336c6f645841764e3035435a31684b59315a334d6e6f76626e41784c325a4a4e586c76593170324d6c6f324e334a535746557862484a69656c49326344525a5557567965585a49597a4a5064444e4553545172656a566957474530617a45355a48704c61544e7864484a734e6b4669563078454b32466f6245517756446832626e5a6a54584d31656b526b574870464c3370744c7a42755a33686f57584e596346564954324a72563370795a457378646e5668626c706b51574a6c55445661595868774e6b787a4f557878563077784e6d4a56534664304f5556474e32784d593152364e6b74324c7a5a4e4d7a6b7652325a324d445669564539355a6c4e71626d4a49564842526347685a4d466b79616e566d5632356d536b73794f48686f4d5578335456685a53566c475630646b4e555a32627a4e3457457856614442745a4446495430316957464e43645374534c3145304d5778734b3142504d6c5a71636c467a596939745633646a4d3230354d445a5653556c51565852485a4773355956684852586869636a4a474f5339616347647355484e4d4e576f724d6e5272635339706147307259306f33536c6c5252326c4c523370746448593256306b7963467074544652494c30394d617a56754d6c5a73575756524f4752704d5642786144424b65473544547a4a7656574e35516e64696548644855574e57646b773052544a694c336858526c67795255564c5756704f5658526e636c683065554d3162584e574d6a526b4d575a4c4d7a46455a6e4a5152544634597a6c4f535374725757747759564232615649356247773157465a614f58524864455a4355474a545556707865564a6f517a567159314e364d556b7261487047654852306553744d53466c345244564e4e4442314d30465562315236575556744e3068435355395a57564a516446637857464232525339514d32684f57564a33596b7331576c646e6269743657445675516c517a5656683056456473576e523261316c59596d644c4d4774684f55517255574679534530774d55706c64546c535479394f63544a3165486c365a545a6e51305a4e63554670563370684d47745064305a795755497a5630685654475a3455326c5065445258546b7830643056486279737a5330593562546c4f62553136576d7733576e4e79596d4e61565452475554686f5645465a52486c4a4f5531704c335631566c68564f456777516a56576145356a616a5635575852445a6b5a525a46517a576b784e61445a6d546d7430656c59324e54525a555756764e6d705664466b7952466c51625739576555565a6330567851556779566d39336345356f62464a6a56464273524768764f5735795755673052446c734f56644c626c4a50656d31464d46424c6555633552456456626c4254554739556558593156433953656d30724f474e47646d39735354464c53455a34563031765a6c646155315a7365557069616974334e32314d4e314a6c656e46464d45354b635339575479737a596c5a574d455a7457446831535731445344566d536b45796269396f52455a764f586f775156417a543151314f4852704f44647762314e57525545774f58706c65565a735154525a647a64436555746156455649574731304d4864694e6b46745932314961306f7a54564a7064486b766369745a4f5451764e476448656d5a5361474e316145303456454579617a42305745706e655841344b326772597a4a5a546d466b5332565a625463355a6d3972626a464364437443643368734d305932655339544e7a4e59537a5934625731345a54686957474a6e5556463164545a4a4d6c6735597a425a593155784d7a4e684c3152774f5574524d44686e654534725a476c6d54546b7664545a6955477733656c4932536a526a64306c6c535442325332787353445a534f47357064566c6b6147357a616e686c63556f34597a4e31626c4a6d643031365531685564584a4e52553543546d6b764b3078304d7a5a485255705561546c51647a5679576a4235626e4a6d553152725754457a596e4a334f5449334d466c594e304631636c4d30517a426b4d564a3662555931524446474d45387961464a5a5555356a646d3130626c424c61476b7253556853616d5a754d6b644d55324a6a4e3370304d323933626a4243625668544c79737a52453078527a466b51305577646d6474566c524c656d524f4b325242566d56494f475636624731475a433872516b357a623152484d54493254444a4259797474536b5269546e52305746466f546b7730536d786a4e6e4e744f545a77644867304d585a4e57456c7651336b3254545134615373784b32704456474a366332467663554935544731425231566157445a354e58566b5332784451307378646d6c615644457a62305273546e5668646c5978516d56525a6a4d31636e4a30615664704d6a46754e546435616c4531543234324d4663354e476c4952554e68574339424f4842324d6b467365584e6c634849775a6c6f775a6d7042546a6c48634763304e555a4c54575a354d32526d56466f326348524c56574a7a52486b775a31527a54324a584d6d5a716548647761336c3652477442526e647a5a474a5763486852516c5233656d35766479744d5348424e5a6d7832536d6b324d46465654456c6d55556c6c5746597a655442694c314e55567a4172613352575647457a5a554a4d57455a7056586f78596a5a6d4f445278623142685a6c6f7a656b357962314253656b4d314e473168576c567a62306734557a597a55484e4c656e686d617a677852474e795531645157444e61566e6c775a6c6c494f553555656d6c764e6e425a5931464b6343396852454e755a6a5233616b74755330744f4f485279527a46345557347263474a49627a46514b7a567955444258636e593259306c6a4d5756314b306446534846505a325270596d5a7a546a526c4d4864575a6b6461636d5a51513249795157466c4b334e71565774754c316830523152694e465a574f485a6b5254644f4e4652514d44524c626d4e5754327445526d5a714d4735525248704463316730526a4e4c526c4a775a484e4a624656764d58646d596d5a34616d59346353397254437450536e68305a484e43516b4e364d305a4265584a4c566e566d546a5635646d5677646a6c4f6156685a5a3356774d7a51724e57527463314252645731774c316c6b59324e30616d4642526c4a7a4d6e646b55544e42626a56594d45307a5555467956556b33556c64734d6b6b316355786a5245786b55316433566e5a5a4d4456704c335a4555533944536c6c30627a513363555a56616e424f4f546844634464434e314a6e6132706c596c524463566c70563364304c306b3363316f765a454e794d466c5653316c56536b567a5233646b4e7a464f59323077575659764f475a615245513254544a7656565674576d46775746705a646d74364c30356c656d5a334e6d73305756526d62454a764d484e575558566f576e46316444597259326c564e7a4e345154466a624463334f574a776230343365456c50565452436154564e4e31525465574576513235536453395a5255564d55453136563064725544686d5a6c5a695a3235314d6e466e5447787a526c7044595756544e33684a5a46466d63444635565545305a5731714d564269623252464e30354a564646764b3155765579397259576f7852484e52574556774e565247546a4e45536d56776548684d5a5664614e6e5a4e5448457953584a7a54466849546b31765648644b5a57314765474e7364564e6e4c793959634445724d53396b636d64785244525857475a31524556364e586c474e55316d4d316c785a5868685a44425654556c594e32493453485236536c56714c327776556b56566144464e4f464e71625373345755683457537473547a5a3164465133633142515344597a53793877644867314d44524a4e465630567a6c58544739755257497964326447566a64595447564b5a326c4e626a4e5253314271654535484d564e585345685263565a78576c68704e31526e614868434e6d644964334a4d54554635576a6c434b305172567a4273536d4d775744424f55474e595a457433656e525a4c335230566a4a68593168595a47524451305972516b68495a56527956555a30564663305a6d35724e304a504c7a646a4b3039454e47396d5557733557474e774c7a6832646e46314e564179556a4a4f4d32357261476844624539795647395755437452546e6c74534656454e6b633464486474513170485a58526a6156424c576a4e754f574a6c59545273523364594f484a755255644b5757686f537a6c52556d773352457078647a524b4c31673363586c45566c4a444d327034574864774c797372616b524d5a793973564774694d30396e5a45597753316c7a6256453054464d7a4d6b3961513168734e6c6f346258564c5a6d3174596a4a344b3074434d553171656a647954584e516144553565556776557a5a434d46683363314e4c5179743564484a6a556d5a35537a56724d306475597a6c464d484e55626b56554d6d68775a45394862554671656d4a7a55545934626e6c6d4e6b6c6a576d6c774d46465654466c58536b5a7a52336735616a56445746644b526d4a554f466458576b4e5664574659517a5579624564715a554935626d4d354d326845517a645559335a4864454a775933526f52454a7365573432516b6461616a56694c336f7a4d30747955467068626e68306569393161325a4c65475533524642445957317a64474a7259585a695a454e44526b38774c3031685657347a63303134566d7078615870594e466431566c5273525468344e477831633352455a446c6161564933516a523153537334526b524451544a54617a55725346706b616d646e5958427454324a356548646954477035576c466d4f53746c6357704f597a466c6157564754554e756157317457464256526b747a55314130645751764d6d45794f584a4b56445a695755646c4f444678525868596347354c4f565a7054574a524b7a41345645733562454a706230394a5a6c4a6e4b31513556485a735969397862316b7a534756594d544232516d39594d31684f4f484a7856556733576b7057596c6b765530354f53576843516b4e524c31684364573153596d74744c304a49597a6c53616e46444b316474546b39334b334e7963485a36637a51335254417956577053576c4e70525442445647463162484669646939734d576c73625738764e564a35547a4576644442484d327078546a6c484f4646354d7a4e4b4d3074724b7a4a42646d387a5a564654526a68565745684f6332316c634655354b31493352564a31563342774c7939775244685353584a6f565764304d4374535631565a555867325653395a6146633156455a6d4d4652694b33425556473949545746705646684a556a5643644570734d30527151304668555731705253394f615656794d33644a556c6b7a4e6a4131557938725158427862446c584d54426d62324e4c55693878547a63314e3074744d43394b546e4e6b517a465a526a4e4d53334a79546d78304d574e4b5657706b4e584a4a5756467755336b76633152754e45356164556470656d467a5232777a547a5a55634556755a545642637939504f575535535456495653383363557468656e646a61584254644768716258687a4f58684c647a56734f44685057584e3554546c754d32565062554930516b30305648645759334e484e4864796255687a5346466e6557354856544e525a6d7068614538725a6c7072513070545a47523362446c525548524b59575a75576d68576244427162464e504d6d73764f5849336446466d626e5a4c5a48707665485a6c4e3070524d57706e4d5856784e54637859305a71647a647953566c54646c5243566e6334645849724f4538355a47784a536c51724e57355664445a554b307036634664776455343154334d326243394d4f4642754d46705159304a77564456545a4655796557303159544e5962584a796230777855545a786558524f52327874545441774d433949537a644f4d574a6c543070334c3270685a485a6e6453746b4b3345784c3252774f55453054556c56647a566c645539334e6d355259325933616e426a6430786d65454636634446314d6a42314c326447556d5258646a67326369395a4c3239594d48517654486f726246647163473177636c704a5a556871536e706b596e426c4d4641334e335249656b51315a6c5268536d6f785a6c64365630347662545a514e6e597a556d6c554d6b55345331684c64584a4b633142586231686a4f557457646c4242633151344c30637a4d6d5a734f5546504e467055655770494e6d513461575a4d57554e526556565757544a35627a4630546a6c4b59335a6b646a4e775a6b7778635739555a445a7259544a48547a56716146685a5954685457455a4d5957356e63564e36623039545a6d356d4f584669646d35304d6a4a7a555842305454564d4c326c48643252695358685763314a4462574576564539455530677754456f78616c64314e31683056334a586554566f645445324e306772576c6b34646d3549566d6c754d3259316431524c52445a774f4642716358457259334a6d5a6c6c695a4649325a4852615a44686e6454647159574e4d5a465132596e707863334a555a6b4e6b57475a485a4646304f45706956533831646e6c6c4b325274637a423157537461566c41725648637a617a6b78546d4a584e32467763566b7955433973566a565154314e794d47347951546c55536b5a7a5a46497857485670576d687751323144517a6c784c33677a4e5531304d484a584e5464746248466b4c327832656e6c515a46513053334a6d4b304a74546b39504d6c56304d554576636e467a544442304d56427a625870575955704f5a6b784d566a4177654664725454644c63486c424e6d78364e47733454584277615552515655354c5a4374795233427253336c6e5a5739494f5338784f5445314b326442646b647a5a6a6c6f636b684e616b45314e304976516c417a63324a4e566e464d4d55453356455a78654446494e307879565778355a485a4b596e6c515a6c42755658703661545272563367784d316c69626e46365a45677654306c5263465a485a6e526861444a35646a564f4f57343265545a77616d70364e4464334d48564d6369743155446875626b684c55477870576b4e6c4e6a427962306b78576d705055444e774f446c3263546778646d684656334a324f5563334d6a6b7664464a684d6d4674523370794b314e73656a5a76545842364c33524a63544e36626c68554f444e564d6e6f784e46524b4d444e4e4e44644c656b3576523345324e5773354b3252364e43737265575268646e4d76627a564d54474d3551793935525768695a47316f633067774d6c704c63485972524546344e315a3663565178516a6c714e7a4a344e58647059306c5a6433426a646b3955646d787a6453394d523034326447646c566b31575355747a51565a306545523464334e56556a4e56526e4931645374355658464d5a444977626c4132536d4674546e4976636e424e61554a6c615559774e6d30314d324a7464474d726154524265693971563356714e44464b4d6e423153576c50595746714c7a685154335a7657545972626a4a464d30315054484a45546a5a4b536a5669617a5a595a5455354e43396a546d70314d336f3455555a6e656d70715a5738305a6e64724c32566153533943596b684261326c354c30687552584e334d316447566c67355131423552474e73646e644c656d524c4e573835526b564d5356683662484e714b326c4d4e30396b65537430524574535a576776626e564c4f5746745a6c466a5a584249647a564c4f5467765432527a4f5446325969737954564661566b517a634338346443394a5344685663584a515458564957585252524574554f445252557a423253475a58546d3072616a4e4a65476c4f5456646c4d55557261316c345a3251765632706d6269394d62464e6c4f47347264545a325a575a6154574a794e6c467a4e6a64724b79396c65693951547a42795a485a30597a64345154467162476c56626c4a7951323149533274735746525154586734524449345a546c706255493152554e31626c6c476444647852444e755a465669566e6c4e4c3164305a54677a4e5339565a30524a4d57707053325a43656b3533647a5931566e4a69544668615444563659555a585331703562444a7656476c4e4b32777a56546b3252697468625846424e6d707054477071543341784e6d6c32613164784d546c6864573947654652495654643665486c6b63325250655756454d6d707361456477576a64784f585a755a584a36537a51784e7a4a4653316c6e527a564c5a6c4a554e4852324d576c69616d34784e4856344f485a5959334a574f5464514c3078706544593457575a6d5657707a596b387856564251635655794d6d52744e46553263324672656d45725a7939785a555a466446684f59316870557a64715a446832546c4e6c4e323974563238326346643256475a77556e6c6c636e4e5856314d7854584e544d7a46484d6e59355155316b6455677a656e5932566d4d325757687462575655576a6875567a63334e6d354b61314652627939544b3246505a555a7a644467315447746d5a486b7964533952545663764e455268655867354e5373794d3273314b30316857474a6a61575a7363576478515570735a476c794e56526d5646426c57465179635778614e58704a5a546444656c5a6b4e6d6c3657484261556b78566148684d65433835556c68775546637a656b6b785a6d45305a33593065484e49626b5a69576d646e4f5652734f5531535644525564474a574d546c69626e4e51536c5a6a526b77764c7a684764586c704f473132536e51345247677855584a51655467305a4552614b3068466443746c566d38345a6a6b34635656444e5668595757566a625578315255646f4d4452504b7a6c5254334176654463325747784a4e6d56315548567761556776626b314a575646584d58457a4d6d78364d7a464c5953397753455630655545796354637752466c6d4d6c6858575546695469396e596a6b78533078586357527562474e47563370784e6a46514b33565261304d3053314e72616b394a6148687456584e575a7a42366244637a567a5a4254574e526347677764564a5551546830555768484f5670615a33684f4d3238344f585a786447566a4e58524f5548417664444d794f445a464e6b6c50624846584d6c704964545933576c4a56627a4d3254546732553031304d307379563039706145686b5a7a42565932784a4d566379574852474e334a484e5864336148524c52453942546d6c59563352564e57553256314e304e56704b5543396864485931596c6331576d4e71536a6c7a51544a3652446c57576e6f775643746959556455546a46314d6a4e344f444652546c426d62546c4c5a446c6e575752784d3342714e4578345955686b5232786e5955686d5557314e5a466776556b6872593151334d30744f554339434f4778565a6a426f516b4e444b33467a51324d3257554a7a4e6b46575a6a6444567a46316130677a656b6734576e685856437432596b527256575934635568774f4751335448426b5a574d785557527961323476546d6777575441764d464a5764445a496331423562575a6165564e324e3155304e57784c536e7076636c4a58636c5a474b7a6c43636d3142654652594d444d305a476b78574752785545744b646b4656656d684f516d397459545653614842686144646b5a48426c5956686f646c42475353747a523141794e573535646a46364e573076556d4d33556c4e6a61456f78634855315432356161336f3552566c6b5a586c3655324a574f5851355a6e644d4b3252725348525353484a30655845794c33464a54486c51566c645259574e4256585a474f5845335a6b6c32533251764f56644d55327853636b465255584632627a64435579746a5a47597855325a716255644f4e6e46535a323178544441314f56566a6355523153453149566b524e645852704d6b64745a473034523356316558464a544751726279746f574464795a446378546b356f5747354a63545a72614770734b33644463464a69566a684962486b316153747663455a77524642575245744c4c326372526e5a54576a67335a6d457656454a4565555934646e4d33596a64325957683061476f79564645764e33706a54336779656b527464464e775556427355555a7a56334a524d316772633264575632394d576c4e48576a52504c324a46595456435a55314c65573035647974484e58426d5a544276626a4e355346523057476c755a43746a4f4770594e7a41334e484935596a42765748466f54316331645446514b31565956466859635667774c3077314d79744256324672546b56465545466f5a454d775957784c64316476647a684b4c3351314d544651596c687a4d47706f4d32593564306c305348457a6430553559574e5a4f58683056325a3561546c3062544e6c624530354f55397855473176626e6c564f576772624655725a6d5978616b5671596c566b4c32567152336c795932645057557469546d5658636d354c616b4d764d464a575755646f4e324e326231525654564e55624852344f5652495758424d5279387862454e44526a687a635842556445687659544e4c53465172636a6c6e4e4538724e6c6857646d4a71534574434e6e5a49516a4651547a426d52304657533142514e586c6a5a5777315a6a4a78526e56324e6d737962554670636b78726257637962474a725a6d355a646d3151624574465a6e5a725a6e526b4b32356f4d6c4e30566d646c5530467964464257556d646c4d5577724d6d45315a464677646a4d35536e4e3054334655646e5a7951326c464d47706a4e6a64614e6c6c7053446c684d575632625534725a585a534d31647855315978536939314d32383461335a4a624539754e6d524963446b7853555a73646a68305a6e646c52334a30656e593354306855546c467961334135546d7078635655765a554a454e6b4a364f484a454c325244644567785a48466c4c337049624730764d475a34566e6777616b74524f484a6c5a6c644c554468595445747a5232357459325677547938306445457265573153646a6b315557646f536b6f79516e4e78517a4a6c6248466a4b3149784b793952576d705963586c444e556c7556556732595468545233425a5231597a4f5856485a4534725a6c5576634755784f584e324b314e4d56584572556d5279543364715a6e7036626c68545230704c626c564d4f4468325a6a5176524870454f56526b53334e715157517a537a4230523252705544567263336b34516c4d765a5656514d6d52314d3349794e6d5a6d4c326431563239575345316c63326c42656b5134526a426152446c774f554a6a61326851517938724e325636596d394f596d5a515a445a75616e56714d6e63354e4578734d565179574670795a314d325631526d61334a50596b354e62546b33596a4a544b33643061444e3157574935635456515430394f566b744254474668626b7849616e425352324933547a4a77613045326379387a5357466a4c3070554d446851556a6c78646d5a6c4c3142484c7a4e57546c525656544a31546e564a55555a776258677963575a36615768485356467461573936616e5271566d74344e5849764d44513459326c315344493353467077555339796144557a4e7a67344e47787553554634596c4e4e4d6a51764d5734324e6a4a6a4d6c63784d3163765a316f79626e687364577476636a5a6d4b336c3562316c5754475977616c703554454a6d4e564a3256793961636d6c4d62484132576a673559335a5453557836526d6c77556e4932574774304d7a5572563170785a6d4e71554556326379394b5a56644d526e4a706444685255576c4f5655356a63446876576c5251646c4a614d33705756465a4b525751774d564a7954446c764b324d72626d4a5062484a6f4e586c7a4f574a305a484a5055554e3363465256637a644a537a4a694f43746b4f474e49596a4632615664784e315a555a476b34576d523462457857646b347a4e584932566b6475574374545a6a566b5a556b3361546474636b39754d3352745354464e546c42324e3356754f57317755335130546e6c4d52566830567a56704d5442574b316c4653317046566c4e4f53315a75566a6849616b4630616a4661516e4a5854556435635739584b3064746448707a5657317353325a336547705654553944564751724e5446514d7a64594e544a304d6c6c706244465962323535547a52305a5656474d5652325344413353446c61556c427a4d3341784b3351784e573569556c64555958563359544a6d4c33706c4f5446444f57684f525531544b32743055314a3162554e576169394c646c705951564a6b63316c4c6233493562454e4a4d6c464956555979523141775544564e5258464c5446597a656d35764e446c71546b396c4f5374704e446c784d43394d646e46344d5856695232704f5331465961455268644668525953746d4d6e4253654530724d6d6f7662546c784d6b7850626c6c505156644752466731556e5a594f565a7a6156424b4f57314c62575659624768454f484273635659344f57685257457436646c466b6557686b63456734516e6c744b3031534f4855775953395a4d45705a56584a55517a645062576459636d68755333467955335a3165444e58635652754d3159354f45684d533074356146425a546c5a6165554a5a5a7a4d33624849344f57314853316f764d6b4e4b4e6e565561575a794d32566c61457468636a64316332563456446c57623274554f55647957484a6d596d646b5745466d5657783564475675636b3551646938325631687854537452624734355646526b615664494e4735576546644551556c5965565a686446566e526d78305745686a626e4a4c4d485255534656365155513362466c50645664514c314e7a546d706e53453877616c55324d4552714d466c6b4e6d354857474e484e565a485658677a647a5242534752565154497663335979576a5a554c7a52705a6e42594e6d46454e336448645664314d554935636d647852465a33526c526a5556527256456b784f576c3262556330616d3135613039435656413055335236533352724c336c4a4e326779626a42774c7a424d534339734d6a4632637938335256686a4f4731724e6b354d4d7a4a7a4d6e5131546a4a4c5a4849344c32786f53325134623346335448684c6543396d556d316c616e70684b316855635339305a4652794e6e4e505269394c597a6c4f4d446c4c5633593162454e684e56686b616d744f4f54526863444a5857544644626a4e6b54304e3465544635654452785247313456486c684b326b7a53556c47656a4a595a466c615643397755466c4851326851565777324f4468444d6a4134546c4532596c5673633046574d31593364324e5a6346637a5a32497a535846495457565a616b6332626a5a615546706853335659526d5a6c556b77344e6b343363305232526c4e55616b467355485a6b65565244527a644456457471546a4a3157584a485a4574694f55786d63455977636b746956575a5355454e576556637652575251654464554d6e457963334e4c5254466d636b64574f57526d4c337043597a4a734e324a5a5453747a646a4e53533259356248526b4d7a59766445737751325178636d78714f553472556c637a5a474978646e46585a5841334d4577315a474e79636e4172516d4531565752794e47513553697457566939795a6d4a324e3278704c7a426b4b326b345431644a4c7a5245546c7055656d565a576b64494f464a5063326c4d52565176646c707a64484255574668786546645153336c79556e52775233526f513164615a6d4a78526b35304f5642734e57707559584a6865484e7064565a525a6b3952574452436546644363306c794e444e4e536a5534527a52785a6e4e315633526953446858654668735a477836627a5a6f4e30564d53566833536a687164464e6d62466b78523063764f544a34546c707a4e6e6c74596c417a6144527761556430626e4d72646c417a54334654576e566c4e6d4532654770754e4451355a454d324f5656764e5863726447743463444647616e466c64486772626e5a4a656d6c42526b35745a445a4955485649576c704952576731536d30764d566c7653444e7a51585a61635556614c327377544738305a6b733356573433536a4d32636b46305a6d35464c316c45596c6777636a5670553039784e32597754486b785657497a4e473434556a64534f5768335a533956567a4576626d73344e48525365564934614756784d433945616a46784f454d326548524f52557444595578575631684e543342366346423655464532636a6c32616d6458625374455245687363454e75525451786248704b62446c58623064346232746b62304e495a6b5275565664326430677a565570355457497856324a3162335a7052464276545738764f456f78556e5a504b31426e4d6e4e77566c5259636e704d626b746c64336b355554526f4c336f34556e5572593070735645517954464a326554597a576c70705a53747a553370475a6a68714c7a4a31616b4e6f5a454e454e565a595a6e6c4a646d56785632397a4d7a56784e4731724e58686b4f48426d523156795a6d78686355355764485a4e596e4e434d487045613035794c32463257476f764d306f79656d706f536c4576546e686a626a63784d6e52314e48703553315a51543264436247593053464d34646d4a764f474e6b56466474536a63345a6d4e365a445a484f56567453486c70576e5273593346305345777a4c3342454f574a715548684d4d446c484e46453251544268656a4a4d4b3364476247777663566849626b684d656b5230546d4e354f566c75566b64334e7a5a6f527a425653316f7664457449576a68485a33527056476c33614768705444644b516d35686556457652565178626a4a59545868504f464e6b5a477777516b4e44536b35595a6d307a5330517a64566f3461574a7864533973575445314e31425554546c554d7a5131655642465a484e724e324a57566d645959335a4d6357563064456c77616b6f72547a686e54307444576d31785a4852355347457851314a5163565a58646a424559564a334f453534547a645751575179616a426b4b32394e55477846656d4a4c4e5770465545647a65693949556d784c5344685a6254566f567a524365577875556d6b33567a4e556246426b4d576776534868574d7a4e6f5a6d513162555931646d39344c31704463437433616c6477635663334c3051784e6c4a34546d46306557686a4f58644d4f466c344f54497a4d475634656a6c775a6d314d4e47706a56336431553168694e4468615630644a4d3039715957787553544e35566e684f4d7939686432394c57485a364f585a4a6330314d656d453363574a564e32737a5446637655327832536e6f32536d6c694e473532546b6c464e554979557a4e7553466776614564694d6e68454c335a5752325932546b4d3253305532634464585a466c52575564575744426f4e69744e626939765a6d4a56597a42575a6e5671566d4659646a56704e315230624456684d7a4a35647a6c4f4c7a5a57536d646e64314254617a6c52636a4a68595856516430396b5379747963444a5059564a794f584a52635652534e586470546b70596555646d535578485646644c516a6469526b3977556b777255476f354d6a55356245784f617a423153544e30556a6c48636c417256324673546c645a615464516332647754484e6b5a5773724e5770434e55784a5a6e5a5a513145335544686d5656517855485a555a6c6c4f4c7a647a636b747955336c44536d4a4f4e575535617a6379515446696448685562584e7961474a45654846335a314269566b39725a545659536b397363445a6b546c706862693944546a564f56585a72636b4e50624664536369395565486f7665574672613167315a476c465358524e6433705a616e4e444c3170345a456c3063544e49546e513457455a714e6c633164455a475a6b457a5a4870334d486b344f464e5154564671626c6c34516a4a7964586c735a58413357564a6c4c31524363476853646e4278597a5a4b65444e55636a6c465a6e52765a6e42455357464556544e6962325632556a64724c30786b59585132616b645064586c3456566433596b4d305a444a4a6544685556574a30643035744d3274444d554a6c5555526c4d453557557939596130746862475a7051584a6959573034567a4a774c7a55795a573179516d466f537a426953476c7155444a3355465a4b52444e7657476c4b536d4e69656d3556633342476555316d536d67794e3346474d6b644e516d7873576b343462553830646e425764557453626a466a546c42524f55355953335130543170774e6d34765644527151303979596d526d4e474d335633563262564655546b6c794d44424755693971626b6c75626e51325a69396e646d684f5a3368794f554a6a636c524b63573958564746734f47747865553959616d356d5a7a51356143394a5a6c70495a4578524e6e465752546444516b524754314a79575339614d6b63304f45457a4e6b524b4e577034547a6c57636a6c74646a42774b336c6f54334e6e5748424b61564a34597a6c6e626a6458654642795631527752473158555764705646566b4c3156766344464f556d5534626d56505a7a4235613068566244557a53544a745631704364565676557a4132623064765a32567951324a6953335a4d527a4534516a5a69533342554f5574474e4764575a6d315a5547396b65564a5a61303878516a424b5633426156574a4f63315274545739344e557776616d5a4754474e334d484e4b515442764b79743352574a705431523161456735523064326569396962566b3464324a6c63544a78567a5661645534766345453556337068567a6871636d316c627a4135546a5a474f473532647a68325179743157466c5a643356585746413065454e584d6d3945654659785a544673616a42756333425a656d70496344466d4c3252324d7974494d6b786864574531596e424f56554651636e6c5861324e3457456c56526939494e6c4d3465446c4e5a4778694e56417852586b7a5a306c724d5664484d32467962466c556554684764565669526b74315753744f534574714e6b706a626d35474f55644d566c4a305a54644e536d646e6231425562465a734d455532534774324e557732646b784a554735434d4768735a454a4e6431464b6356427365574a6d526b5677656a68754c314e7159544d354f5452784b325a4f5648683356457474634739496155526a614778485545316e5930347952555a7a615531684c324e56533056354b3356585647457a556a68705431524a646a4e4d5354677865556f7651545a5354336871566e68594c7a6833616e4e496254457a546a64765248706b62486c4963464a795457564e537a4e45627a647561556c695248467a535734314c306c5665453879556e4e776269733559544e3062336778566d6c4c574670785a7a466f556e426e624642345345315651544e7362556c6f5a6a5643546d6b764e553178533268774e6c68465a6a6468625659724e554a6b5a7a423255474e71656e59345a6a63325a6c463164456c7055324a50526a423653316c6b654556464c33417a643070694e6d5a75535731444d6d6c79616b6b7a5548644861793872516d4e7454566332597a4a78516d5659524670476455746d4d3246305355314f6233704a5132355854336477636d70705a455659645652554d444d3162304a714f55745a5645707661316f7252564a616248413557464e68566a4d35643031685a6c647259574572546c4a345a4531774c3034784d445a305347737656454e7a635578544d47686861574a4f636a513054446855535642494e5870314e484e7253445231556b64476558684e624568616357517952544e6b636d3152516c593554305a6a636e4e4f6457745a61486c5a57486469535778735458526f52455650646a564e566d7734516b52736556563655575a6c533268505a6c5244526d52534c3146794f48525052326433556e4251566e4e4b6354526b64473477535778704d6d68495356525154564533537939455531566f6146426a575749305a324a585957466a62585a524d7973794d31706a516c46356246684b636e52545245784d556a6c50536d465456335930517a4979656c56554b3031475631707163464d77634531325443733061325a585532747865544654614756775a446c4f5a454a3653484a52554570614e6b383456575a36656d457963464a7a4d6e644f4e486c6f4d3363336554686c53476732626b786d616d74565756684d52586c565245395153576873534756346454646d576c6f32654778494f47784965554e44576c5a5054466c4f6132464e63334a494f464a4a646c68764e464931533039734f464d78524745726245356b5a316847595564615a5735714d797458626c566d543278545957463664304e616345394c5755357259564e7a636c67776455783662446c494b31553265554a346548426b63305245556e467451316c324e4339364d6b6778546e426f6445773456304578563159774d444a7156334244536c6c30627a5a35645652694e4442444b797335535735564d33566954464a775558426d553056744d6b707a56584a36524774325a54557255464d346143394a6258465856464e315131706c64445244636a42616458647a646e704a56574661593368494d3170766555524451546443613356364c33637257566c524e3346584e55566b61546332546b78745244523151576c58636c644e575852724d4535424d6a6c3161315a68566b39365a545a565430564d537a687253326c7654567056554551355a7a6442537a4a6a4f486853644646336254413052586b35596e6842644774514f464a6b5a585a705958524c645752795a45744951305931576d6851536d4a4464446c73626d526857574a53626d784c546d524759324645536e5271557a564262556442646d74534f55353259316c794d574a546354566b636c4e3059335a7654446c315957567752793955534555724f44417a544851315a6d7032545756764f5746595a55707a57574e6955334253637a4a335a4749315133527156484a455a54427264445648546b5a765233687352324a69513064366155786e4c7a5644646a633356586f345a477876616b7855566b4e4b57585277556e6c36576c4e5162576857524846524d3068696548526b63577043536b397a61487035646d7861575768464d6e563355474a565a4852694d5864714d306c5a553070564d584d314e5756324d6a5a71596a41784e48464f53444e76637a4270553230345746464e63444635575764585547395155585a614d7939484f453949546d394862456436596b4e75624739546243396b65533948626b6b724d3074544f58526b53323544536b6431616a4676646d6c574e6e6c345346647a5a464e4d617a4572595852704b3078686255566a52336c30566e6c5463327048544531324e334a74516a557a546e4a7755566c61536d7874515456754e444a76543142716458524d644339465a6b744a596c565754306c5a546d7868576d7473576c68705a6d5a76566d387a596d464e54455a54595578506447356d53306776516d31795a58683361693955626c6b764e566b304d4856585257647056307868565468794d6c56324c7a524353586732645446744d315932526b74476557464b527a46775a6d6c424c32393164305533616e4e544d5664345430744f5447783553566c4f62484649613368614b7a5651565751324c3164325a45527655573959536e42724e53744e646a644f52476f35624446314b32746a56585636546e68305a484e4352454a7a64466777564446744d6b6c6b62584978596e453055446436626e6c4f546e684d566a566f6347746d4e544e745154685365544a5059314a5053566c4f624746506357524e646c457655465a6a63336877526d5a51613164475a57354a62325a7a54334d774f555a315457707163324659596b46526431524c5255707756475a7255566f335748566154315a715a305931656c4d32556b4e47645842336357677956314e5a5a325a4a4e584e734b3368334d54424e4c30566c616b4e3456326c6161477844545374765a3256346455687a55445a77656c427056464a6f5932395354544235614564695657786e57554a4d627a6c74646d70695631426159334a4862444a745331593052586c34513245774f446c54626a68325954464865486451566d5a6a4d69746e5131526c626d6c4f52486c464e577854646c7032516a6872636c6858595668536146466e56457846536e4257616d56335245784e56554e3455314a325446563565554e4b5757684f53324e54637a5a59526c646e655663775a315270625731565358706862577432536e5a7a574841314e58513552305a44556b567a55544a6f5630396a566b4d78546d4a714b33517765466f325455784f5331644d57554a73517a6835626c4a6f4f584a50616b677954475a36656c45325155744764556469576d467163456836596a5a614f484247635539544e797335656e6461654659335757356d6330646a59793932523277795a30564e52336b78565864756446704d4b3264786548704e63585172616c4d315657314c647a5a434d474661526a5a306553396f633368616257783661556445576c567a636e4a5652325a7a61584a544c3156784d546861526b73795230707754314a735257356d4e5846594c7a68744d5559795346705361474e7861455a6956476f76654642685a6b6772656d525154576451574456746255497964327470564577334d31646b56586851636b6469656e4a4f4d316b32517a6c6c61557077624846346245356b616e4a58634756354f475a71625730775756564c617a41774e3252705653397455475576654652724d33426b57455a6b5354423156306c71567a6847595652545a45354a55456c59636e457a565868794d3152514d466c324e6b4a30564449304c3078475a5564474e6e4e706333426b4e57707254466c6b536b5a71574577786245747064446c5251793974537a4e6b59556778616c553456444231566e4a4e4b7a564e656d7876556a6b31535852705544677964573542614764745655784c62446c4c4b324e3255465a44646d31694d314e4b64323155556d307a536d707a614663314e3155775a553830536e4e366357394d56566779553352344e473158576e6c486444553163553930656a4e364f47466157585133643235785245557956314e4d4d46673056456f314f55744e57566f3453324e794e3063784d6a527252564e33596b51794f565630596c637957465a765a6b744e54455a44576c70525744466f5957704f6544563655474d725954465664336c366257784a4e544e6c4e6b314d5230394a4d485a4356303554644735694d6a466c554670345646684d566e526154797330626e5a33596d4a6a546d4a4f62456772644568744f484e426256685561556445576d567863476450596b7836636b644562564a6f59323955536b706c526b6c51535652315547566e566e644f55545a754d7a6c694b337070546b464e535778704d6d353163566b31555852576169745161575972645845306547704e553068725a556f794d55646c56453878534652475554464463574a5462486c36596b5178566d4e44656e5678654456495544683256315a68546a526e646e68574e323479543063315932316d4e55673264444e434e323933633168516158687862484579626a5a734c7a565a6257563357457445556b4a5263475a545357316f576b77786545357059335633646d6b3363475a516430453255574a4652556c5561566445576d567a576c5979596b68574e445a72595668685248646f556c4656557a564f64486c364d55686a63303569576b686b556e7044575751774d6d6b775958704b654564304e545a7861484249546e4a6f4e6b68454b334578644531314d316f79656b6469596d6331515559775345564f644570515669394f4e3342334e46704f526e4e48647a6c7555544134626c52595445645165544d355a6c4e705a5570494f475a504e7a6c465a4755345645356152335a564d6a5a7556466732656d7068614539424d585a515a546c595632566b535535514d474a595955463356574e69616b744f65464172556d6475544773314e55526d6257463152574e466558465a566b356a646c6456656c6833524642725a574a7a56304d7763577730546b466e4d4859796232647354306c4b4f484935656e6f78656d4e4f51314131643352544d33646f4d6b354d625551305a454a46633163774c3235685747706d4e6d3548593268795a5539455457565352474659616b4e4a4e474e35646d685965574d76523168305748706a5554493255324e57634756506458417262466858546e45775a57517a656d684d575664324d6d3171635641776148706e5a446b77546a646d566e6c56576c4e6b535764584f45745a5748646954444636536d56355a574935574642594e554a755355737a5a335a484e47643264335661536e6b345130684c6556637652555271527a457751574e4f626d6b3555486378644538336558426953466c4f52576377513341325654457252444a7565474e6d6144557a4e3273334d6b4e7a5632465a62564e6f62476845516e4e79566c566e5a456c745645686b5448526d65454a7664334e575548526a4e486c30646b70554d6b527a4b3268344f555659575770314e433935526c68495a485654566b567a5233646b52324e685645685a53325258563046784e6d525264454a765a4852695a3167325655593152325a705931686959324a555444564a4f564535526b68595158427952314a46633163775457307659577050613055324f5867335248465a624574716430563661573174565870356557644961334d7a524756355a48673062553572545456466446553357473553537a4a35556d4e534c33526b595646764d446469656a5a714c3268744b30395a4b315a43563070794f4842725756684d626e6c785a476c7357544e72576a4a515443746b626c4e48646d74574d565578553342716545746e5630566e5a584a31563168545457467756466331596a5a3565586b35536b5a6a546d39324c3252735231424a4c33526962314676576c42575955356a5333637a516a6c3163477733544646485753397961464e7164334e315a33464754555a73617a5a4b545664684f453555646e4e544c30645953544661565731345655317954474e5756575678596d35545a553178636e46534b32464964533878656a4e52545467315a58493065484e5762464a42625849356358564c5669747865484e32544842534f5756344e6d7078516e707462554e5a536b4e7753537475535856594d5567325644673056335677646c55764d6b644a5955783062306c52536d393064577055567a466e5532786d5a6c686d4b7973784e465a4c54575259554468714d32317051573953554849775755787254486855544656364d6c686b63446c4b6548704a4c79387252455650636c4e4a5957564b6345784b644655324e58464b6445517263484a7a6454647a5745524e53454532595768505358426854445a75544442455530354d62586f30556b4e5963555a424b327874645646734e544e495347743155324a56596e643157465a76634563784d306c465348464a4d6d733555335a304e3342325345354e566d464e59305a7157457473613264476546647153317053625456445a30347965454a586345457a62306c5a566b6f784d576c6f556b39354c3277324e4868734d555a32566e52684c306878654339704e6b4e5a53554a775253744f4d31566a626d5a4b5a6c5a735469733154575257654870746258526e4d57684662465630627a4e724d58426a517a597a4d6d5a56626c5a585a335a4d646a5a46575456305a6b4a4453546c45626e426d5757394f4d476c71623249794d304e495131424b4e576c4d646b7833536d7844536b354d5a4774755332773165555a4f65545a775158565863315668546e4e745a4652615158493156565a6864584e43625735505a6a6c344e576443646a6c455558566f516a687162556c756455786d63335a354d55526c636c553362444e4a4d554d7956326c795432394d6157524f4b325270656d746d5353747752553546566a4a475558426f597a68744b32737654326c785a48524b6546466d5655527153445a56636c704f527a4259526e4a58616a5a79637a46614e5549785756563059323952536e4230566c6459647a51304e545a75625570516156413155575255556b464253577378575746785a6d4e7053457075556d38355a7a6861626e68524c306b72616d59316157686a613235555a79746864336f77593256444d6a6c6b4e6c424a65564a6a56473835527a4272616d464c556a68755a6a564f63484172597a6b33576b314e63437472626c526d6446466957474e42647a5a68536c526c6245395a5a444a764d6e59775132463652334178616b4a49534842735656565853564a7a53546c765448703064305a364e556b7661546c466156565157566b345755357a5133467a4f58646b597a4a774c3264344d6d52696230383262474a4552697461616b644d65453550656d4675596939734d335172556e5a56576a6c43575868795a453949517a564355454a7a6157317a5431464a4e31566e4e30524f627a42315646453556565a326131464553334658536a686b62477072536e46325247747055465234656c4e6c62305a5857577376546d5a775247673461334a6e62565a5556306730526a464e62485a4659575230574452616357343159584a56516e6c4255793878646c4650566b70726245397a55306730523051354d307455566d5654656c564c4e57646c61555649633074594e474e57626e4673596c5932576e566e576d4a6c626e426a4e4464754e324a79644730314d6d6c7a4e4464764e7a567655446c68517a6872534846554e6d5a494b336f7955327074566e52344d466f766254424d6233646c627a645761693942644456765a3356515645465751336c524f4849724f48705261324a6b63544a324c797472616e64584f576c306248567564556b3365564a734e6d5a706547357465474d3161564e306331463261336c4f52476c5a4f553530565842454e6c68465a586372656e6451566e426d4b7a67305a307048596e42305a44424d52577731576d5a594e6a6c76626d4a6d63325661533151724d6e56714e6c70756556704f566e68355a4442496457643152324a61534552785344633063537473576b355956485978566d7851656e4a446244646a62457861576e566c556c59786448464d65437468626a6c70556b5a6d4f48457a63466733534739355a4764314b30317756486c555a6d35595a6d5931533074346455466955464e4e5a5864695546464952445a48534746755a303579533256744b7a5a7155473561575642316145704d4d44645a536d4a6b4f556f724d7a4e74546a64734e486f794e6d34315a4339324f5851335548565a543346516253394c5444466e5a324a5464575a5461484a5a546a4a78566b6c5965445659616e567a4b32684864544e5255554a7761575673524746795644566c64466c6a656c6c7a5556673155544a315a445630655456684b79733353485577543345784b7a56495a574e47626b4a4e64326c515669383462575a495a6c704a5630526a5533593151566b7a4b305a7656586443596d673362575a535245784d576e526e5a305255617a464b52303961576a4e594d6c417265446c504b33706e4e5556324d6e493154334a4a556d4659626c5a50627a686a5631497953475a6b54553542625668774e486c515644457261316c55626d73315a43393551544a74624773344b3049795456644f616b4e474b7a4a4c4f445a715a6b6c794e6d52614f533872614752776432784e65453142567a645a56485a544f53387863566f764f5663784d33707a633052584d55356b55476b35526e52354e3352775a4463324f46427653486c735a5770354b303971576c6856646e6334636d52306157464963475a695a4535485a6a524f5132314653574e6a574445785132706f616a5233546b31714d484131655851354e326833566d56345a6d567862573159626b464554475268623077314e7a64315633517a4b31704f4c7a56555346704e54457456576a42444e6b49786557706b4e44527062445a794e4656556330786d623268434e304e574d6b6455596d46304e566372596e6b30597a645561314e5a644568565748686d536e427759324632636b31455a5445334d574d33646c683052465245566c6855636c70585432705853454a534c3273334f544132636b686a5457394f6555787162584532616e67344f4735474e5667324e475a7752793877546b4e745255747a5a554e6d52324a61636d526c636a523365566c4a54576f77627a466d6457737653317061655549326255356f5655646d633070434e6b743462474a72616e5132595464574b33637861444a4a626c5a30614746735a6d6476646c4246616939344c30564e4d6c5532546939325955564e51315931616b5231574739436545307659575a70645856596130527761555256636a56495a46686b546a646c556e46324d7a6b77593034316458526a4d44684b4e697332516c4d7a4f45316f5a5531764e6d684855585176646e7050627a45354d336f345a6c4e485255773561335a684e56467163564d765a53745052464d774d55703451584e59646b6459613264544b79746c4f57356b64433958636b686d4f5570764e5852576348566b5632394d5a4449785a584a595a437450626a4a55544856754d5546474f58704c5a5468514e465233536c7074534852685a577032535868705a546877516b70324e57553156576c6d626b3977566a646d53325273554339754e54683565466c30636e5172576b68574c3359726132644b5a47673262584a3456697453656b35516345784661306c425654497653584d3164464a75613245356457745a5630465954586c7756334a7262325a764f45746d4c7a4d3361336f7a57485279646a4a6c52484642554651726245465156444a6a636a6c6d5a6b703065574576516d68614c3370756145524462445a4f4d6c4a7a6346425856444d356255316d4f57684a4e6c7078566a6c455931465962466b3556314251635456735a6d343363556842656d705853584933533068685a314277616a5a4a626c513461574a49636e42315a485a7457537477524442324e31426b645773775a4374424d46423661586475556c5235516d566f5630704b62464a3253466c4e4d326f35647a6772574459785345394a63444258646d6c4e546c6430633142326555453351585a3156475a5355475a3461546834644870545a31453263303173526b704c4d7a68564e6d5a7655566734556e7073596e7042596b787852546859556e4a72575730724f484132646a46506458565859334e3552585134626a4e346248466d4c31646d646d35615a58517663326c3353533946617a565a555531766145647456554a46633230345545316c516d5a714b325a5a62475a50546b6c476148704a5558513562446c6e6456706c5755564b4d303031636a464e4b327059536e5a7a574856345233526f516b64725546645551584e365a44466b4f484a4e53584a7a54457033636b4a6862335a6c636e526c576a4a434b334a6e636e46694d473175636a5a595655465964325a3563585a4a63484e474d4778425a464669627a55314f454a55624546755a304a7a4f555979543145325a6c424d6444457852693831575546325a56413162464a69575863345a797447596b307a53566459646a68794e486776614842794e453136633274506343393662445645645774765957564b575535735930527a556e4259555338334c7a524963486f79596b63794e577776524856695a6d686d626d315a5754557654546c6c5a446c504f5577764c7a564e5a6c4e535643396153537436656c6732515442335a545657546a4232545531494d6a56425a6e68315a325172543046526557316b4e57563652455a5864336f35526a49724c33646964693831644445335a553834647939326332497a64444a4d4d5463335448564e646a565a51693948636d4d335754566d6247644b4f5846594b7a56524c3039424d3256754c30523561464e73556b4a4e646d3156536b35785a485a50556a4d77526974494f466432533049334b7a644d5a6a45794e4868615447316862554972625339494f564231656e526b5633426b5a4464365245644e4e6c646862544636656b303565476f3157485a6e516d4d794e5530335530686a556c41775531707162566c585a6a5a48517a64445445777659575231516e56794d466730563077764d6c6b7261467072566a464e54307032633070334d6e51344f454e36576d686c55586f34546d4669524559795356683263336b7662465a6c5433423154306c69615746765a574e345a6d784952325a5a63314a304f554579545449765548684a61464a4754585a34656d64735a6d5a455a4734344d5578695158683055584a7652476f774b3268434e574a4e61566c4a575646525a32646f61454a4351304e445230564652556c4a53566c525556466e5a32686f516b4a4451304e485255564653556c4a575646525557646e61476843516b4e44513064465255564a53556c525648637665476c364f566c4c555551786454564251554642536c6853526c6449556d745a57464a735432314f65567058526a42615555463554555246656b78555154424d56456c36566b52424e55397156544250616b30795333704265553971515863334b306c754d6d644251554644566a4253566d6777576b64474d467055634852694d6c4a77576d3572515531715158684e65544233546b4d77655530785558645056473878546b5276656b35706333644e616d393354556f324c32347957554642515546755a45565757575249516d7461616e424a59565a4b62474d77536e5a6b567a567259566331626c46744f54524252456c3554304d30643031595a33705052453131545552564d6b743651584a4e52544e6e4c305a4e515546425156566b52565a5a5a4568436131707163466461574570365956633564554647516b565361544234544770565a304a57643078505555464251554643536c4a564e5556796130706e5a32633950513d3d, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL);
INSERT INTO `rmb_residente` (`rmb_residente_id`, `rmb_residente_nom`, `rmb_residente_ape`, `rmb_residente_doc`, `rmb_residente_dir`, `rmb_residente_tel`, `rmb_residente_cel`, `rmb_residente_pass`, `rmb_residente_email`, `rmb_residente_fnac`, `rmb_residente_nom2`, `rmb_residente_obs`, `rmb_residente_fini`, `rmb_residente_ffin`, `rmb_residente_foto`, `rmb_gen_id`, `rmb_residente_hijo`, `rmb_residente_vive`, `rmb_residente_perm`, `rmb_perf_id`, `rmb_carg_id`, `rmb_vinculo_id`, `rmb_tdoc_id`, `rmb_est_id`, `rmb_residente_fecha`, `rmb_residente_user`) VALUES
(2, 'Wilson', 'Velandia', '79888205', 'Carrera con calle', '3002325', '3204274564', 'gemelo22', 'wilsonvelandia@editoreshache.com', '1978-08-04', '', '', '2014-05-08', '2015-09-01', 0x5a474630595470706257466e5a5339716347566e4f324a68633255324e4377764f576f764e45464255564e72576b70535a304643515646425155465251554a42515551764c3264424e314578536b5a52566c4a51565770765a316f7955585268626b4a73576e6c434d6b31544e48644a51326778597a4a7364567035516b705461324e6e55327843526c4a35516a4a4f616b6c7754454e4365475258526e4e6857464931535551775a303955515573764f584e42555864425245466e535552425a306c455158644e52454a42545552435156564a516c465652554a425655744364324e485130463353305242643078445a334e4d52464530553056424d4539465554524d513368425630564352565247516c5657526c463355455a345a316447516d6454526b4a56565338356330465264305645516b4652526b4a42565570435556564b526b45775445525355565647516c4656526b4a5256555a4355565647516c4656526b4a5256555a4355565647516c4656526b4a5256555a4355565647516c4656526b4a5256555a4355565647516c4656526b4a5256555a4355565647516c46564c7a6842515556525a30467851554e76515864466155464253564a425555315351575976525546434f4546425155564751564646516b465252554a4251554642515546425155464251554a425a303146516c465a53454e42613074444c793946515578565555464253554a4264303144516b464e526b4a5255555642515546435a6c464651304633515556465556565453565247516b4a6f546c4a5a55574e7059314a5265576461523268445130354463324e46566c56305348644b524535705932394a536b4e6f57566848516d7468536c4e5a626b74446133464f52465579546e706e4e553972546b5653565670495530567353315578556c5a576247525a56315a77616c7048566d31614d6d68775957354f4d475259576a4e6c534777325a7a5254526d68765a556c7057584654617a5654566d78775a566c74576e4670627a5a54624842785a57397859584635637a64544d5852795a545231596e4a44647a6855526e687a5a6b6c3559334a544d446c55566a46305a6c6b795a484a6f4e485651617a566c596d3432543235784f475a4d656a6c51574449354c326f314b335976525546434f454a425155314351564646516b465252554a4255555642515546425155464251554a425a303146516c465a53454e42613074444c79394651557856556b464253554a425a3146465158645253454a5255555642515556445a486442516b466e54564a435156566f5456465a553146575255685a574556555357704c516b4e43556b4e725955643464314672616b307854486447563070354d464676563070455647684b5a6b565952304a72595570705932394c55323878546d706a4e4539556345525352565a48556a426f536c4e73546c5657566c705956305a7359566b79556d78616257527659566477656d5249566a4a6b4d3267315a57394c5247684a5630646f4e476c4b6158424c5647784b563164734e576c616258464c616e424c563231774e6d6c7763584a4c656e524d567a4a304e326b3164584e4d5248684e574564344f47704b6558524d5644464f574663784f5770614d6e564d616a5650574730314b3270774e6e5a4d656a6c51574449354c326f314b3359765955464264305242555546445256464e556b46454f454576566b397061576c6e51573976623239425330744c5330464461576c705a304679656d6f30646d5a30526d5a45574452444d6b566b4d7a51354f466b325a44526b5631466f5754646c576e704b59314e61656d64795245644861316c6a5347744d5a3251324f446b76596e557659574e704c3170694b30466c635459765956524a646d6c3256586c6b546a4248536d78454c7a5a564e6d737259565a51516c644b5558707553586454526c55765a5849725a6b52345244526f4d565234576e4a6b4e334a4864445a715a474630635445335331707962537432576d31736257316a4f5664614d6b704b554446765153397663484e514d6a4e6d5a305a785632706d4d6e42454f46686d51314e584d6a4e6d4e57523463574e6a545374514f4546796154564662575a69596d317a574863354c336456544339614d54685659545a31613164516546557761457834616e5245574442564f58424256433933516d5277627a42714c33644553484576626d64766230457663556b3453575a46544864304f46466955314d324f45786c536d52494f464d794d465269574730775a533970645442524b326868546d6c4259545a44646a566f5a6d68554f466451526c68335644686a59575130644468495958524f627974305630786f6132787055486c3554473431627a56474e6b39715a454e774e45356d64486772654751766431566b4f456f76644663326145493056485a305447343454433946516b7853636d6c5465566c7055337032546d347263303530536d356b613051316157706e5255525051797377625764454e304e76623239765155744c5330744251326c7061576442623239766230464c5330744c51554e7061576c6e51573976623239425330744c53304651655545764e45786c5a55704b596d343063575a455746464554565245576d464d5931683361486f354d5842774f5768694f464a695a325934516e49315544684261466f726433593459693942535441725133524c4f46686c52485a424f4731794b30686b564731725a3352794e7a646d595864786547706a627a6447576b705757557448566d777a52566c35634849325253383054456376524770345a6e42324e314a57646a51784d554e36645570325169747759574a684d6b39744e6d6c43645768706132705765546c7a564339444b7a6436536b46454d555272616b39486543746e5343394354555233626e46596145673561587033536b687862546c6154433833566e4656545577766430524d54304e684e4752766332563654476c554c335277555549725931423451693830536b4e6d53464233564452515646647951545a474e485632526b46684e44426d556d4a77656d5253616b685755453553526d74344d304e7555473948636a5572596a6c7253445179536a527763793945616d5a444d33685464584e59593146756158523663484e6e516d7051527a5675654852565154684663314a6e4f574e574c314e57556c46434c3034334f465a514d6b3532616c5134526d52445a6c6376523142334f44465955335249616b464e645739534b31686b5556466e61304648556a52585a466b346132646d54564a35555539305a486f76643152504d5856354d45513564444d305956684f4e6a4278634570515a444a725a6d787154317061636b396c536b457a6448566a5669737656335532526e417a61575a53596a6454546c687a623035544d4855725a32557964584a504e6d70466131557756476478655531774e456c4a536b4a475a6d70364b3368304f456c32524642705643396e6355593061324a33556e42784d6d356e554864535a5746735a44497756574e71656c466f575864695630786953546446626b317a626d314d6132354a5747706e593046494e3073775656565651555a47526b5a42516c4a53556c46425656565656554647526b5a4751554a53556c4a525156565656565642526b5a47526b4649656b59766431566a4b304e734c7a68425346513562474a594f555977564652775a465534556c644f4e5746686248427364454e6f5a444a7356316c4a4b30464256433978576c703162475a525a6d6479643352685a554a32516e566e4b30633555456379647a426c643263774b7a4e4854566c7161577058546d597756565a3056565642526b5a47526b46465269394554474d79546e6845524531695a574654546d74545655524b556d6c4e516e5a335545356d53306776516b35754f5778354e433961645374434d47743261556855616c706c55464246566a4e4b597a5a344e585a4e6132465364545a584f45396c4e6d686a65575a58576e5a68646e4a68616e4a525156565656565642526b5a47526b4643556c4a53555546565656565651555a47526b5a42516c4a53556c46425656565656554647526b5a4751554e4963464d77566b45784e47746b4d484e46625656616547314e626d387663554933616e4a714d4455335345464355464a53556a42765155744c6354497865574a3156585631526d64494d304e6c633234724d5339314b3235794d545a5a656d46765155744c5330744251326c7061576442623239766230464c5330744c51554e7061576c6e51573976623239425330744c5330464461585a51646d6b7a4f475a32614463345245354c546a6b304e44685859575276513278544d475232546b78316456706f4c7a42366146684e61693834516c55724f575a755669737754693933566a4978616c6777645852474b305179616b35765a484d795656427054466446566a6476616a46705a7a565455444a4d6248706e4c3252564d476877546d3479534373794c7973785748426d4e303476647a4672557a46326230706d523231785545684563437475536b6c4554577453596a6b3354336b35566c464a53454669645456565a5856516232464e4d6a4576576e68475a484d356245397865564a4e543231455a3346534e6d527052444976533359316456424653476c4d566e5a4764584d7a56334e684e58466b4d584a48636c686962564d30646d4932576e426163466335563170705532457662305976576d6b3456475934536e4172656d3434546e52585a43394f6133566d52446c72536d3035576b5a6f566b70514c3068735957314f63586732513352325a544a3652564a595131684655545a534d304e72543142695a55387a4d5656754d55354b4f57787461316c325a5652764f456b3152555654525574554c3352466132783257574e454d6c42485447464f5a7a6448554870456231517a53484a5556564179614851764c3046446555677a5a6a684259546b7663445a6d626a5a5652573535624339335655517659564578656a6c74646e64714e454d78646e63324d466f785a54553455576c54595442754e577031636c4e5051315654643351325153746153486c5061445649546d55345a6b4a4d4e486b7253475a714e54684f64456b3459575648544770365a4642326133684b5154564962544a7a647938786130316e4e3039774c30315a53586c4451325a366253383054456b7253335a305a6e68434b306851614739514f4545345a5564734d3039766332347657475656556d64754c336442516d705965466734536e5a714f5468524c32645163584a68614452464f465659645768734d30517a526d31714b31706857454a4953446435526e4e764e5868346132704a4e305656526e425955693953556c4a594e546776637a49764f455a68646b4e6d616b74504d6a42694e484e5859537445644746505255647a4d6d4651536e41774e546c595747773052444176646e4978536c70536546677a64473949615568544c305a586131637963545a4d63565a7763537474574573334e45777964323558595564575a6c5a59565774465a6c4577636a4e4b59584e68526b5a47526b31525656565656554647526b5a4751554a53556c4a5251565656565656425a5534766445746d6446646c516d597957485a446544465165464a6c4c32464f566d31594c31464f516e4d7a566e4a354e3070365a3268445a6d7871516b4a3653544e35616b6450564764494f484632616c677664315a474b30317565464e31544730794d454d766169744964576832624656305a45597664304e51623349794d7a4e4d52475a314f54517654456830574563764f454643556b52345769393362556733575668345348564662453172526d786b6432466952334269535652355447524a626b453555473557656a6c545953746a54324636596b355a6546685664445a7963546b76636a4a76656a5a6f63575133593246715a6e7030646d78314e33565763467061527a6c58576d6c5456446c6861335248536c5645576e5249636a597855314a70616d6330656d6378635545335a304e505557464a62453158646a4a6a4c316c4d4f465a6c536e52574c316c724f456b766430524454586379566a4e78543278354d7a4675533351774e557846517a56725a46466e4e45645263326b3452546c784c306450646a46794c30465051314259615749335a446846646b6458614530794e6c5255644755724d5546614b7a5a724d585a485156427762555a32656b356852564d7954336f78596a52334b303961596e5654537a63785a54526e62476c6a6354424a61464e5157564a3355565a44616a687157484576643077345647564f646b647365474e595a57396863584e31616c64774f485232546e51774d314e5452566f79635646425a55465255314e6c4e446c6c54303476595773775a474a4d65474a776444646163455a49536d56586544677659575a74576d786951566c714e6b564555475a4964466878626a6450636b746d614670774e444a786333463656454e56636939464d323149516c4232644449785746463655486c6d4f4545725133426d615645324e537378656e4a47626e56364c316b726256644f61486779656b59356279383451574a7163466835556c68794c3364444d6b5130626c427152446c7854445276595778314f486843636a463659586832626a6435555641315332746c4d6a4a4e566a5643565731784d6b74474d306c544d6b4e74647974774e7a457a534864734b31423265454972516e56785a6d49765153397062533877516d315a5545786964336c69636d565a4c7a684256464e47633238764f454633536c52595356684d61456c556131704b4e45464f576a4e4f576c425362473432595339436269396e6332706a55557043576d5a47544864614f584234614663785a6e63774e465a364e3352695530356e626e5654633264496233526d5a43393353793968614374484c7a64534f58426c65537443554556424d564d30633056715a54687a63484a6c557a4e75644863725a4855315746566153486c7562464e334e4459784c3038306230704a526d5a596269394354456834646b3430566939684f544251564446724f4855794f464579526a56776133644b4e45394a616b39754c326f345132646d56323174656b3534567a55724d335247526b5a6852316c565656565651555a47526b5a42516c566b656d4e53563278325446424e4e47706f615646314e335177566c464e613234345332747965444d35633078346431426f4d5374354c33644552587059516b6f3156584e6c615651796330316e54304e7a4d44513461556b765a7a68784d45466d5a3159345553394761323571656a526e4b306f7652544131554731684d58466b4d5846454e335631576c70586131413264466850613056465a7a42754e444131646d31565346424a4e464135533364505a324a6e4b33525954453955537974585a573831526c557665484177596d314f6433645155323175575552564c3074324d4645764e456b7a5a55745163335a345179744a646d6833646e706d5956686959576446656939366432784c52533872564646794f44646e64316c425a7a6846566a6c5a5a6a684664314247576a684f4c33526c4b30687955584e5a4e4852686332497a56473551555759326133704c52446c586146566d57455a69523249795544424a4c3246504d5759724d475a70547a6c7a636d5a4d57544977593064434d486c525746413451545a48516974475a486f72656e413061326377626a526c4b306b31544851345557466154546b3153574d765a476f34623055764f45467664484534547a686859586451525642704d315935557a4e696133566963564e54554468424d3035344d6d6f3463315a534f46466d52554a5151575933554735346232746856564a355746426f6356644853545633556b784a5a6e4d324e446b344d30464f566a6c72655663314b31525864445a30546e49726447466f63575177555446365a587035574556774f56646b61586776565446554c3046446347466f645670325447705155456f30526c527a596b5a584e6d7334655652424e6b5270623031494d584a7a64456b72524668715a6e68434f453835556a686b4e6d49305754464d565642445432355953444a544e7a46684d32684d65464654596c46344d316b315155464c4e574a484d474a6e51314654537a517a4f474633576c6b315556467953485977526d56354c334e614e6e55796143393057475a446154564365485934556c64736369744663326470554468424e6b6859616c52454e565a494e44457a646a64514d54684f5443745157486379646c4d794d46637a61566855576c4e6d56474a6b65473472624546494f55686b526b5a47596d3550526b5a47526b4643556c4a53555546574f46566d4f455a6a646b56364e6b6772655842456344686a614667724d6d5a46526d3561655574454f545646553163304c30786b51573432566a6c794d5374694c793942515664714d585a355545463264336777616d52714e316878566a566b4e324d355a6b7470616c68514c30464b52793958617a6c6f636d4d76533168424f57466a6455314e554656564d326c735557706a55486c7952544e4664314258616b45355955394c543074425447527354486456656a4131526d566e4c304a4965474a6a4b304a3261533830554445794d57744e5657787563574e4552693953553364574c7a6842654446715747317055484e5a54553976636c5a70624539566132704b566d686f5a336450513052586331644b626a5a3657555a6c52575a306257564a5544644b4b30564363305672576c63785579746f5a31704754303535544731564e546c52524564754e4452794d6d4a334f5845325a556c5152444a7359584674546d777659564a5959545132575774525431417759585a72656a6c31626e6844536e5a46554768755557786961544e30576b77784d55493262564a3063545572626d78304b32526854545530636c557257475a3663585a686347497a4b334652556c686b4d6b78484d46706e636a4e4b5558593159546c366445684b4b32784d5a46526952586450636d5a3563576834563156754d45396f534464435a6b4e714c32647654697436536a68454c3268556231686e4e3363315a4459304d6d3032566d46705356467155306846637a647562564e534f47744c56325235656b68755231523465476c325a7a6335636d343062693942656a52784b306c484d576f3059537444546c4934536a5a77533368684e47746e62464e48656e56705a6a5271596d4a6a556e5176645556424f4456485a574572596e564c566b31696144646a4d56424e536c4a7a5244517a534735776546593355553558596c466b5a54417a5654513462564e3564566b3361474e6c635531485344687862324e5659315a4b55693955636d4a595257517a596e685564334e49615778525432704562315a4a65555256644756595a6e4e314b3031564f475a6d637a557652474a59566d74466332777862303574536a4a43656973725530705a4e56497252576c50554864794d556430656d354461576c705a3046766232397651557376533349765a33524b63544e744b30315161474a7762574e704d334e694e6a56344e6d5661536b4e324c33524d4f557376566c64326544677664304e44655564775231673562327033624670424e56637a4f4578535532746c6147553264575932556d6c7762484e5753474d72513031714d484531627a4a7555484a48637a4a48626e68454f54566b656e4269636a6c58575574514e54465565575a546453737657693933516b3476644859304f4339455a6c5270645452595a6d6c5956466c445546686b5a464a794c31647a616c6c33646d6c4d4e4656724f45457652556834546a526162586c6164456378547a59774e586b7a5657314c566d3936626939326258566c65564254646d38334c3264765a4452564c7a52524c7a6842596b59725354463252323079517a68314e47525455545130596e6f335a5539576169387a4d6a64714f455259656d70724b32784f615646615348425763586c744e5574494e6d6c78645651325657395a5a326471635574464e3052514d484976515564614f575a4961555130535756474e5564695a453569654642616557557a62486c4e61576f76646d644a5a6e68794e44677659576334556b523452446869554556556147645a596b6f7763327335646b7852516d67764d7a4e32636a49764f57677665473544626d644965465a776448684b63326b774d6a56486232356b4c325272616a4a31556a6c515355646d4f5452574f47646c533035696244457a563077724c3231364e546b3559314e59565734724f44644761697477636c703255586c544d56707265586b725954564b4e6d5278576d746c624564554e6c566155484258516e4648556a5a5662306b314e44645662565132566d4a714d444932624442314e44464753576c6954304e6854304e5457484e796555733353564234525651764f54677751565a4e616a427665564254616b6f35533031754d4739424c324a6d4c30464a536c49725356704f59533961517a42314d47746a645856724e6e526d56314e424c33646e65554e6953445636534467324b3363324b305a514b304e5061334a545a6e4e345a556b78596d39756154593256575a554e306861626974305a6d526b596b785a643255305656565656586843556c4a53555546574b3074324c304642566e457851544e324e316471647a56364f576f7752336c6f4b323155537939335244645157446457566974485743394356556335546a4d724d6d67304d47703661316430646e4177574441764d4539474c7939425232567762484e5953474d72565856684f5759765155645254474d7a5a6a64564c3364745557704a53476c6c64325976646d316b5279397757477448524459784e6a63726555706c616c51764d6e426d6146424e4e30464c5a6b5572626e686a4f5851774e6b77764e303558595535485a6c4a324c304a5a554863314c31706d4e314e3161445a775232314a4f565534543146504e32567a63324d34655567766430466b5257526d51335a4f5a6e424f4c33645862485256564868694f45784d5a30466c576b705a4d7a686155484e7a61304a494c323953636a6779593067786232783153303933597a426a4d466c51636c4a6e4b33524a627a64754e466b765256646964305a454e484670565735354f566b7759574a556330527a656d786a546a6c52515863765233564a5a47316b6156517a634856454e6a425a55484a575745465059553968545567786233646d563342425432457261475a43626d6457576e597952335a70566a52785956426a4e69744e546b68304d474e714e335a7264316850593259345157645a554442794e545a335a6c64326455683361466c534d693876515546545644686965576f334f4339715a55395a626e5a72523370554b314d774d464e364e475531627a567664325a58616b493559564a534b33677664305233556a466f5955773562557834525867325532564d636e42344f56427a5a4731514e6c59354d544534563259345257746952544a754e3070365532745a4b7a466c53557835574468736156517664304a72636a6455636c70695230517a51326c706157314a5330744c53304644646d31454e48566d4f455532646d684f4f474a6d61574a79554770796546466b5a573478636c5a7152574a6f54475a56516b5a4455457870553070526357684e616a565a4d546475626b3547526b464855466b764f45567a646a4a6c636c52496253744864464e32554374314b334d7a53533835515670684e6e4a334d53393356486376576a6b3453545a365757463063475a334c3056486346644e4f475236596c684d4e6e5a6d655535495332704361324e4363486c4e5a32644963444a76623342585554647a4f55457254556733546d5a334d53745162487077617939714d3364325244526f625441785347703053477831576a527152584a735533644962485631593278574e6974735a574a545a6a6842516b347a4f57354856484934546d39534c33553264475a714b315535526b5a4e5447786b4c79744459556733546e6f765156424f5430465163484a6c62326f765155353153334a545a6a684665464179593167325a554531627938354d3163334c336445636c4253556c4e7a5a3356356445777664314d324c316f79613370304f45677a633259724e334a574e475931655564784d473476516b7376643052614e325a774e475178553141765a4446744e4339784d555a47526d74474d6c5a754c336444513156756430466d634842586448417664545a325369395863584e754c304a4b626a5244646a4230646b56565a697333635859725331565656566452574670586179393351304e534c33644c5a6e424b4e4842554c325178556c41326546597a4d576f7264304934546a6c514b304a4863433944553078565545566d4c304e4b4e6d687865545a36544856325757706a54453947556d4e4c4c32785a51325a314d55394e5347355155453547526b5a72526a4a6c59553476643046465a69396e61575674636d564e62437474634663764c30464e616a46484d79394353484930536e51774d587034633359774d5563784c7974536355744c54456c4d63797476646d64494f45525152433833543235334d584e6d516b686f625755766458524c64457061634446754d553953536b6f7a59564a354e305a74556b565963574e455132706e51335a535330744c5757647662323976515338764f577339, NULL, NULL, NULL, NULL, 4, 6, NULL, 1, 1, NULL, NULL),
(5, 'Eliecer', 'Campusano', '12345678', '', '', '', '1234', 'willyv78@hotmail.com', '2011-04-03', '', '', '2015-07-05', '2015-09-30', 0x5a474630595470706257466e5a5339716347566e4f324a68633255324e4377764f576f764e45464255564e72576b70535a304643515646425155465251554a42515551764d6e64445255464261306443647a425252554a425430526e4f4642465154425152486377555552524f4642455554684f52464530546b5a535556644765465653526b4a52575568545a326448516d39735233685256556c555257684b6557743054476b3064555a344f4870505245317a546e6c6e6445787063304a445a32394c524763775430646f515646476558647253454a336330784464334e4d5133647a54454e336330784464334e4d5133647a54454e336330784464334e4d5133647a54454e336330784464334e4d51334e7a54454e336330784464334e4d5133647a54454e336330784463334e4d5543394251554a465355464d61304a46515531435256464251305652525552465555677665454642596b4642525546425a30314351564642515546425155464251554642515546425155463357554a435156564451693876525546466331464251556c435158644652554a426130684451566c4d515546425155464251554a425a303146525646565230567052586852566b5a6f5931466a56456c71536e6c6e576b643464314e535132733252336c7a4f55565653586c5761566b79556e70764d453554566b6854557a426f5758704f52564a555a33425461586431534863764f46464252326446516b464254554a4255555642515546425155464251554642515546425155464651304633565556436469394651554d34556b465251554e4255556c47515764525230466e545546425155464251554642516b466e545556465556565453565247516b31715456524a62455a34526c4e4f5131567452304a4f54455656613246494c7a4a6e51553142643056425157684652455652515339425548564a5155464251554642515546425155463351554642516e5642515546425155464252314e4b61304e525155464251554642515546425155464855554642515546425155464e5156704264304a7251554a6e51554a6f636c424261566b7a5a315a7555557377636d453163545a6d566d4a6a536e565759544273536a67774b3030305a6b677652574d76564668755347566a546e5a325132786d62334d314d465a33515546425155464c4f585255593370744e6d5271556d59314d6a566c536b356d4d4752475a57524b4b334a4b656a6c5959544533556d68794e546376576c4d7a563252755a4851325333423361465271626d526f5230315a4e57565961457844655339565a545a7a596c4a7a6457744d515546425155464251554642515546615155464251554642516d6442515546425155464251554633516c673563325250626c5677537a52764f4578744d6d5a7159565259546a5130644752325447777a4f566f305a46707062566c71536c6778566c563053477870616e52615557785263444657523152785647647553323571527a564d634652724b7a4e515358703559315234566e4a32646e5a4c536e6c524e56597a6445356b557a68365a4842796332703255444a7a4e57315561544a544d334271576c673061335657567a466c4e325a50646c593556544e494d3068754c336444576d35304d334e6a4d4852614e6e5a6b636e706961585935536b6f724f485a59566c70764c315632563251774f55526952793977646e6c77555846794b334a565a3239324d553950524445304b306b3153546c59566e427a633064744e325658624652355954686156557474543235354e6d4e314e6c4d315a585249556e67324e6d78764e6a6c4b556b31555247457956584235636e567763565a53546b38304f4730795644563364455576536d5a5a4e564235645464435a6c51774d32316a617a6b314c7a42795630353163586875636c644251554642515546425155464252456c425155464251554642523046425155464251554646516d7445654656785330746a6254684b597a4a3564446453563034314e30563663334572636a5a32533342745255313463446831534539595a6974434f4446795a557058646e5a54626c4e4962485a734d7a6450536b354953326c485930355863586b345446457853334a4f5356686f6356527864474e7155306473596d4a4f4b7a45784b304e714e485632596a42684d464178623070555747524b527a464d59335a6f4e6c427065474a314e4664765a55746a626b7472626b6445596e6843646d557a566a4661536d6c444d48637a4f57313063584a706557747664485677596b3472566c4e694e486733575642765a6a46514e6e6f7a59575a5756336735536a644a4d6a4e6d567a6c4f4d554e73593156764d58464e62457475546d4e494d4841355456643161473833546b783459553430566d4a535930464251554642515546425155464251554642515546425245464251554642515546445155356e566d35586446466a4d6a52525a6d74535a56425462444675656b68464f574a364d6a564c4f57396c574578724d7a5a524e4442725932564855304e765747684e546c647856326861634446704f4578524d474634636b4d77546c4e6163454d34535570486130783453307468544578535448513353474a5265584e7865544e744d32497852327858614870344d5652544e6a4533616a49325746566d524852305546704d4e3078556258424b55326b774e486c54593164315332466d536d38335656523161445a4b515546425155464251554642515546425155464251554a6e5155464251554642515552754e6a466b596d78515132564b564468735a4746595579395a597a647056334172524767325a4455325454683064566479617a4a47636b6459523245314f456c794f56687a55473530546d6c71544759314c30784462466b794e6e5a506347465153304d7a4e475657526b784e624442344c3055355a58493057474a49574735774d576432616d31794e575a304c33526f56584e614d445a4751323544566c646a554564546246557a626b4e465458524b536b707954474a554e6d5648516e633355565a364d5730354e545a534d445a4b6544413164545a5557533968566a4d3553324a75516c46795658424c545446476448647262584e7856574d34566a4134524642594e6b394f5547464f63445a546254466c5631685a6357357061455254636b6b7861565a7659577377574768685255307757476868526b307961444a73636c566961444278553268314d446b7a5a6a4e764e574d794d4735364e6b5a6f627a64506244426b5444527664474a32537a684d556d4657526c5a774d445a7856305a56616b645457464e7a636b6f30596a4131596c52594e6b706d566c42436448463663565661567a417a62575245527a567562545a4d4e5756344b7a6c49565442585747317965586f30526e6c51593046425155464251554642515546425155464251554645515546425155464251554647597a4532636e5a57566b68765a32747a5a484930646a524965544e4854585a4f62576c324d475655554538344e30353656466c694d6a5972567a5231557a5972563052696147314c544449316344684f54574e696545673455453877566a46314d4446445444517854545535526b68794e4852785a565247526d457663533877626b78695955357352444632643255774f566c71646e567a4e325630556a6874626c5a5755486870613235345931705365584e7963445535536d783357473431544652324d464a6f4d324d7a55546c7459575675556e465653586f34596c426d5a6d704c645464314e7a6471647a524d62314a3664556c6861544a59544531554d6d68584d4464354d307470554570424d557470546b6c5552466478556b78795355703454464a4c574549785a6c707861474e57526c64744e564a73643155354d30644b63474e7a4e545a5562316c4f596d5a495647786f596d5178636d5674623342525533684853314e706458424d614764356154417964485a516246705a5a476b33646e684f4e5646734d465a484e6b30724e6d5a435a6a6b794e6d5679557a4d315932744655484a344d6a426e515546425155464251554642515546335a30316e5155464851554642515546425155464c616e464e637a467861693942526a4a32576e6372516a68556545646b4f564a694e335a4762446c56646b35444e323555596a4e59656a55314e47316c5246593154553834566d3531636c6461616e4d784e336c3253324a365444464d62314e4c4e574d7863334d336557356d5a485a58526a6c4c526b686a63464a6a6343745954324931556d6c3164446c6d5154645062544659647a684656586834646b7858613370304d465a78637a49794d69744d596d4a694e6a4a6a61566f3163473161566d467a4d46646f576b4a50536e4244575646556156645855564e6e5646683153584177626a464863315a7359556874526b3035546b6c4f4d4778446348565753564e5954303558626b706c6348427162544a3253444e5552446470616a5a4c54336b33536b6c4251554642515546425155464252305643613046425158644251554642546c42565a464a774d455a745a56684b4b324a475a574e3665545a75566a513452575a4f55465a584d573978636e4d356444523462476c57516a647865544978563264775756685663466c555a6c70724f465a50537a463055466432556b5a694e334a4763475677565578746258463051325535526a68494d464e7154484271536d52455432787165544635566a567865585a464e335a754b7a46314d44464c4d3356616432685263564e6a576e5a346133425556556c356244413361586372516e6430576d38345631684d554578504d437459626e5a54536d78355354646d56316735536b4e3052433973616b356d56546776565756485a55593155455a7662465130565339574e6c637a56327432626d4d33646e425659586b72646d524c4c326874627974754c3341345433706c637a6c31546b70565332746d65586c6f62574e4b556c526b564751306447525059306379554649326157746c61565932654746515246457664304a4a5a45396d537a68305a69747663433970575868766379397461793835535456615a5570684d56706b526a46694c3151774c336442557a42685745347265565533553264784e6e68614c7a4a744d79747563433970563235554e5859795532356856335251567a6447597a64784d7974756343397056456473656e6f7261565533557a45326254424f5a3359354e6d396c635739775a545232574649314c7a4a54626d465654546c774f56417664304e50626a5a4e53326f72516a5a684e6c684f4e57685153326c7164455a685548706164485a764e457451524446744d55354b5a6e704b637a5a585a3246735954464c4f455a6a4d44597763565677556c4d34566b39505933517654316450537a6474625745784d47784a62557032537a42524b3263335a574a6a556e4e61537a4a76533030336456566b4e54637957454e71516a68744d48566a626a424a4f58566d546a685054326b794e6d785864544e6c634464366245383062457851536b7447526c46554e315a314f46597a546d5131656a55785a564e4b4d7a4e55526d3834646d3872654855774e6e5a765531553063555a3456464e6b5530743664564e704c323534656a426b626c466c4c3152686155317a5a6e6c6f576b5178515546425155464251554642515546425155464251554633643074716354466c526c526d5657787063485978534859344c306c70626d6c4c4f576c516245355362584273646d464d5a446b724c7a686d556a5669564870546233567664336b34626d78774d6c52456232564561546c735533597651554a4857485659526b3977646e4a5152486872526e5a535a6e465461335a585a484a6f644339744e575a444b30396c636e457a616d685664574a74525452346132785962584e546158424d4d6b303155455a50595731766448524d54457777637a4133636c7071564846745a44597a5a3230726255527352445a724f456871636e4a6a4d57557862466c3054476f7a56336458626c4d31556e46534e3341314f545a51566c68705a57464762335a4d62544632516e70615a455a546358593454437443646c68704d6c673254475a46624842575a6b4a34596a6c475a5745334e6d4e594f4652685430777a4c324630656e6b786343744562573476595567355258593451553168556e68684d7a64564f446876626a525063575935623259775579393652693933515664304b7a4651554578444f45677854484231536d5678613277345569744c4d693968626d31734e6d707a53474a79626c6478646e565652564972533164754f557036536c6c695231646a5a574a786554633163475531524339754e5570505956643652466f7965576871526b785163464e735444527354445a79536c42726157517a57484e4d595735445a45744e53564a70626c5a775445565a63564236624446485a6b35684d584533656a566f554778334f584a78616e466864475a5057456847647a524d64576473526d5a566132524556315230536c707a567a46316330684f64474a76636e563153476372614856596330316d54334178566b78316547354964464e515a47394b4b32526863335a78576a497864304642515546425155464251554642515546425155466152576c6f595859314d44457856473433656a5259554641314f545176625668714c315a4c637a4e784e573130576c686c5a476b7a4b3278795748517653314231576d35584e466f33615446504e334d7863466b78517a6c594e32597a65476c36647a6859616a6732566d4d7a5a44427161584e56566c59724e5564744b7a5a58646b313251337059635564725446466e625668585558704d5130645354557053655578534d314e7061324a57525656354d5841326347687a56307376547a42474d54453253444930624459726457347a614642735630356d5a5752574d5551724b3168444f577379616e42684d3356585a464d77574545315a43743563544e69516c49725633673353315a534b7a566d52546b7652485a6b4c33426c636a5a685a44466a515546425155464251554642515546425155464251566c5a526b63786247565956546c505a6e5a51614535574c32737a4b7a6832536c42786246644d65474e36553345775355357263466b785a586f33576c59784c30707853465930596a64704f5538336446686d524656794d79744d534464315246424d6547597a576c5a354f544e56556e63795130747657484673524531325133705763556472536d68435354426f5955564e655656766345563362455a4a64454e565657706862327073656b7075645731484d584270656c68304d537334565642306545354e5a6c684b56446433626e6c7854334651543342594e79396d636e6f334d6c49775a46677a61334d33566e4a355431706d633346315347637657486c304f57784463446330626c4530596a64754f5577785a6c4e5564584a6e51554642515546425155464251554642515546425245524a526b6f786447565956546c505a6e5a51614852614c3278594b7a6435567a6c566358526c5a4570686354424f5646707161484578624339466353396a4d5552795930343565555a785a444e6c646a4572617a637a4b3070544b7a5677626d30306544647054584a78536d4e455a334e46566c4632566b7444576e424456335256546b6c5961484a365448647a614731545358424761323977526d3954616d746955556b7a656b55354d4863794f55685965576b7957446436596939696157453054335658626a4e584f4846615a485a50623168794e6a63794f4373356132524956325131556c6f7a636c687259335532635455725248686d5333413562454e594d6a5249556a52614e327376576d56714e6b746b4d574e42515546425155464251554642515546425155464257566c47544445785a6d354c626e424e4b3067784f474a686353387a5a564d7663577857636e6846566c646f627a645159303556633234724d6d7432596c5274616e4a6a546a6c35526e466b4d576778536d5a77557a6733576c56594c3070776255684857544a3553586c316257783354304a4d516b5a56544446546147747156334e4b59585252646b4d34546d565359555a7254586b77536c4a5454454e4c556d4646627a56764d5556695131633562314d72566c637a4f5452764c324653644842325a5849354d57383363564a51616d557a596a593364545a6d4f444a534e7a6c6155466457596b784359584a6e59336c35526a45345347457256565a594b3367764f45464c536a417252697431566a5a32623074504e48564251554642515546425155464251554642515546425455314462545934646e7073574442325a326f30616d6c56596d4631656e6c594f574e786447527962565678644552524d46426f63565a724c7a4e6f5a6c6848556a463153475533517a46504e6e6c686445673553316851595846494d3156455447705964575977616b777a5a454a49656a687a52565a5264465a4e5458686f4e55396c4f445a4853456734625456314e544656647a6830535745346554424d53567076633278475357745355314a68525738316258647153564d3252336f77597a4e6b644339496348597954544d77646e59774b7a59775a44464a6146526864584a715333637664304677645530354c32704b53484d786179394f53334e79516d4a534e45684f646b74474d7a68495656423664475135566b39444f584e754b30497864555a6c63586b35566a68504d6e5642515546425155464251554642515546425155464251555a554d6d6c77596e525856475a4c5a5564314d566c54576a687565466855656b64774e533946646b3572616a56304d56523253574e36626e6851565767304d6c67774d6d52595655786c553168724d467050636b34355132704755456830617a4271636a684e61574a615a57356f5957746b57474d7864573571565746364e6a51775a6e4e4b5a6b46364e444533626a6c4a656d517964326f314b7a424e52575252646c4a6853484649625755774e6d56494d6a426c57453978626d747564585a4556323155517a5a48556d4643526b6c3051315669556d46325a45745059553561553270335555397363336c32624752324c305a554b3342756354426b5a446735566d38336457683057484e555544684253306f7a5a484a455a6d6857617a557859574e6d554768565a6d355461585673546a686c646b78614d47526b63457779626d35774d5578575955357562303534536e464c627a464e4f584e49526b7832596a5649534770554e5463794d6d6c7a635868466369397a4e5738326447466956486332637a4a755657453159303956566a4a4d4e4734775a576b774d33644c596c517a626e55776155357557464268613046425155464251554642515546425155464251554642546d45356333466b59553831565664574d45356a536c4a6d5632315a576a6c515645355962485a44536d706b643346316555314b554468424d5442304d33457a5354637a6443383553457376516b74694b33466b6247565453466b77646c4e78546e5247654842536547357153315130656d30724d5735576432466c625564314d566c586155357357444a6e6144683061797431526c417a5348703252306f7654793977616d77336156684555465a71536e67334e4456746454684e52565a56636e6b34633146745348464962584d354b30746d6554426c56326857556a564b4e33524a5954417756454e3552314e4d536c4a35556c6c53545852585a584656545870555a6d4e6c54554e4664584a7a63335a73624859325969743653546c3161446b3263566b33646e466f4f553877515546425155464251554642515546425155464251554642515546425155464251335269557a4a71566c4e4f576d4e7462456459575446755343387a57575a504f46703356485a485630387a576d7073616e6b78596c42774e335a70597a64544f5751354d3278314d584a775a565636656a5a714d55785757576731636b356a5653394a626e6b7759584651546d4a31646b525962556c5855586c5359554a466554424b556c4e5359557054615774704f45523361314e7357546c70546c4273547a5257596b6872565655794d7a4636595746544b33527a4e6d5a4554574d7965574d7661555a7864797470534442544e4546425155464251554642515546425130464251554642515546425155464251554e50646c4e7154307871536b70345954527762575655534663355a5663775a45704759335a4f526e4a564d335a5657485a334e6b6b316545356b626d466d55445572526a564e5a485669524446714e6b314d57585a764e57526c627a413456476b3065545a77536e686d4d57354d656c5a3052546459636e524d554774745257467957566445533356556247705a4e56564e656b396156326c46525452715a45744856564d775532784953304a6959314a35634774345331644a56334e77554556564d6a4e35553152694f576877563078584e6c5a715932517a564535724e6a4179626c5976546c4532597a6868616c685a64576f78626c4d774c30524e6444557a646a426f5a55747964466b79566b3971516c553256575179537a6c795a6c637a4d484d726148685a595452784f48525a57474a4363554642515546425155464251554642515546425155464251554642515546425155464251574e5959586c48596d5172626b517a626b3030636b566d5157315754573577565539305333424754455675656d5a5152464274576e4a464d57687152585250636e466b56314253526a6b325a6a52726547687954557059544646305257706a4d6a464c646b746a62336c78556d4a6861577330634456684e466f33616e4e5a5a55565a4e7a5130644870554d574653553052584f554a6f596a493559585a48593342546348646a62455a7853326b7a4d5642435431686e4b303973536e523656444255546c6b795658564862315a4b536e5a6b5a334e4f54477372626c42694d6b684b4b304a5962444e61596e4e55645846794b32527164564e535256566f54445a4763306c7a4d6d4e615547704b4d55743156797469654578795548426c534656795230644b615563785a586c34626c4a5451554642515546425155464251554642515546425155464251554642515546425155464251586872524773335648593154793955634373344e544e4753544e33553342724f5574704d32453057545a77557974434f44466c546d38794c32786f52476c5963474675576d513555444a506244686f64485a525a6a4a775344466c617a6c74646a4a69556a4a544e315632546d356a54446c744c3256705a465933546e5a7a56444a6d5458465755486c594e6c566d61575a4d4f566c7754455235616e4534524574705744426d575651765758466d596b39304f5852754d4339454c316c6f6445686157574e7564564e6151586c42515546425155464251554642515546425155464251554642515546425158644251586379516a526a5a30396d636b5a4d654852485a45355a4d3231724e466f31596e6c6c566a647152465530646d6b304e584679595534304d6d5a5054486b335631705361335179553273354e6b7730546c4d3256586f31596c42716445553356455244537a6450596c426c63587071564842795a57354b4e464e59646d5a5661544a45524745356447396f634556516355647363553548616c4e7665475657564768485432563063474e594e6a4e73626a46585332354b55307376556e4a44557a5a796547784456556f3457565271533031734b33457861477879566d6b77596c4e5162575677566b6869656d4e4c616e70494e5852554e584d30636d787563575a5a5a6c4132636c4e61533370306444425a656c526152466f334d58704f56545a58527a497254585a74556c68584d6c6c5a5a455a72646d4a69576d464c646e4579613156765657464f54327045616b644656584d764d57353659335a584f484d726248685a4e48677761584e6c52327076556d746852444a74516d744553554642515546425155464252456c425155464251566c5a516b46615155464251556448516d64455246464659327443636a46785431464c4e584572655752484e47553555475656646a597757485635654446615454645a6356633364306b3554544a546346564962555273626e4269596d4a6d636b7079616e4a594d4864504d31527a4f455a344e32527761305257636a5a49556e466c5a6b4e4e64546c4b5a32567956464678526c423653564a714d30704a524841774e6b3942536a523451546c77515670425355524a515546425155464251556452515546425155463364304e42655546425155464e5155464e51575658516a565a53476c525230464e515670525231465155304535535551775a30316e52554a72515546425155464251554643613046434c793835617a303d, NULL, NULL, NULL, NULL, 2, 3, NULL, 1, 1, NULL, NULL),
(6, 'Juan', 'Cancino', '12345678', 'Carrera con calle', '3002325', '3204274564', '12345678', 'juancancino@tributarasesores.com.co', '1993-08-04', '', 0x5072756562612064652070726f706965746172696f207265736964656e746520636f6e2068696a6f73, '2014-05-08', '2015-09-01', NULL, 1, b'1', b'1', NULL, 4, 0, NULL, 1, 23, '2015-09-04 19:15:18', 1),
(7, 'Diego', 'Bermudez', '12345678', 'Calle con carrera', '3002325', '3204274564', '12345678', 'diegobermudez@editoreshache.com', '1990-08-04', '', 0x50727565626120646520696e677265736f2070726f706965746172696f, '2014-05-08', '2015-09-01', NULL, 1, b'0', b'0', NULL, 4, 0, NULL, 1, 23, '2015-09-04 18:18:37', 1),
(8, 'Maria Ramos', '', '', 'Calle 72', '5446677', '8779900', '', '8779900', NULL, 'Bancolombia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, '2015-09-07 09:25:33', 1),
(9, 'Jhon Fredy', 'Velandia Barreto', '79914666', 'Carrera 139 con calle 132', '6881335', '3108657710', 'jfvb79', 'jfvb79@gmail.com', '1979-08-06', NULL, 0x50727565626120646520696e677265736f2064652070726f706965746172696f2061206170617274616d656e746f2079612063726561646f2c207469656e652068696a6f2c20657320686f6d6272652c207669766520656e20656c206170617274616d656e746f2c20636f6e2070657266696c206465207265736964656e74652e, NULL, NULL, NULL, 1, b'1', b'1', NULL, 4, 0, NULL, 1, 23, '2015-10-07 08:36:54', 1),
(10, 'Margarita Ortega', '', '700.300.200-3', 'Plaza Imperial', '3221122', '3221122 ext 2012', '', 'margarita.ortega@davivienda.com', NULL, 'Davivienda', 0x456c6c6120736520656e636172676120646520746f646f206c6f2072656c6163696f6e61646f20636f6e206c6f73207061676f732064656c206170617274616d656e746f2e, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 6, 23, '2015-09-11 09:30:18', 1),
(11, 'Javier Augusto', 'Espitia Sepulveda', '79888302', 'Calle 132 con carrera 117', '6870007', '3105768594', 'javinet', 'javinet@gmail.com', '1978-09-12', NULL, 0x4573746520657320756e20656a656d706c6f20646520617272656e6461746172696f2c207469656e652068696a6f732065732070616472652079207469656e652070657266696c206465207265736964656e74652e, NULL, NULL, NULL, 1, b'1', b'1', NULL, 4, 0, NULL, 1, 23, '2015-09-08 10:52:59', 1),
(12, 'Brayan Steeven', 'Velandia Barreto', '000803047', 'Carrera con calle', '9887766', '3124356576', 'brayanvegueta', 'brayanvegueta@hotmail.com', '2000-01-08', NULL, 0x50727565626120646520756e2068696a6f2073696e2068696a6f7320636f6e2070657266696c207265736964656e7465, NULL, NULL, NULL, 1, b'0', b'1', NULL, 4, 0, 3, 2, 23, '2015-09-08 15:01:34', 1),
(13, 'Maria Antonieta', 'Salamanca Anaya', '32456765', '', '', '3145434343', 'mariaantonieta', 'mariaantonieta@gmail.com', '1982-05-10', NULL, 0x456a656d706c6f206465206e7565766f206861626974616e74652076696e63756c6f206573706f736120636f6e2068696a6f7320792067656e65726f2066656d656e696e6f20636f6e2070657266696c207265736964656e7465, NULL, NULL, NULL, 0, b'1', b'1', NULL, 4, 0, 4, 1, 23, '2015-09-08 16:07:37', 1),
(14, 'Carlos Andres', 'Bermudez Chavez', '12345654', '', '', '', '', '', '1958-09-10', NULL, 0x50727565626120646520696e677265736f20646520706572736f6e61206175746f72697a61646120636f6e206461746f73206dc3ad6e696d6f732e, NULL, NULL, NULL, 1, b'1', b'0', NULL, 4, 0, 1, 1, 23, '2015-09-08 17:23:15', 1),
(15, 'Rosita', 'Gutierrez', '12345654', '', '4332212', '3124356475', '', '', '0000-00-00', NULL, 0x456a656d706c6f20646520696e677265736f20646520706572736f6e6120656e206361736520646520656d657267656e636961, NULL, NULL, NULL, 0, b'0', b'0', NULL, 4, NULL, 0, 1, 23, '2015-09-10 14:28:38', 1),
(18, 'Roso', 'Salamanca', '13425346', '', '', '3145647585', '', '', '0000-00-00', NULL, 0x4f7472612070727565626120646520696e677265736f20646520706572736f6e6120656e206361736f20646520656d657267656e636961, NULL, NULL, NULL, 1, b'0', b'0', NULL, 4, NULL, 0, 1, 23, '2015-09-10 14:21:24', 1),
(19, 'Bernabe', 'Velandia', '19220812', 'Carrera 139 con 132', '6881335', '3104536475', '', '', '0000-00-00', NULL, 0x4e756576612070727565626120656e206361736f20646520656d657267656e636961, NULL, NULL, NULL, 1, b'1', b'0', NULL, 4, NULL, 1, 1, 23, '2015-09-10 14:38:12', 1),
(20, 'Lilia', 'Barreto', '52645765', '', '6881335', '', '', '', '0000-00-00', NULL, 0x456a656d706c6f20646520696e677265736f20706572736f6e61206175746f72697a616461207061726120696e67726573617220616c206170617274616d656e746f2e, NULL, NULL, 0x2e2e2f696d616765732f666f746f732f32305f666f746f2e706e67, 0, b'1', b'0', NULL, 4, NULL, 1, 1, 23, '2015-10-19 10:44:50', 1),
(21, 'Flor', 'Anaya', '65789678', '', '', '3214356453', '', '', '1956-09-06', NULL, 0x50727565626120646520696e677265736f20646520706572736f6e616c20646520736572766963696f, NULL, NULL, 0x2e2e2f696d616765732f666f746f732f32315f666f746f2e706e67, 0, b'1', b'1', 0x2e2e2f696d616765732f7265736964656e7465732f70617361646f2d6a7564696369616c2d32312e706466, 4, 10, 0, 1, 23, '2015-10-20 14:46:17', 1),
(22, 'Teresita', 'Vargas', '9876778', '', '', '', '', '', '0000-00-00', NULL, 0x456a656d706c6f206465206e7565766f20706572736f6e616c20646520736572766963696f20636f6e20666f746f, NULL, NULL, 0x2e2e2f696d616765732f666f746f732f32325f666f746f2e6a7067, 0, b'1', b'1', 0x2e2e2f696d616765732f7265736964656e7465732f70617361646f2d6a7564696369616c2d32322e646f6378, 4, NULL, NULL, 1, 23, '2015-10-19 10:29:23', 1),
(23, 'Maria Goméz', NULL, '800.321.543-1', 'Av Suba con calle 127', '6885746', '5443322', NULL, 'maria.gomez@fincaraiz.com', NULL, 'Finca Raíz', 0x417469656e64656e206465206c756e65732061206a75657665732064652038616d20612034706d2e, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 6, 23, '2015-09-11 09:19:01', 1),
(24, 'Juan David', 'Velandia Huelgos', '1234567876', '', '', '', '', '', '2015-09-12', NULL, 0x507275656261206465206e7565766f206861626974616e74652070657266696c207265736964656e74652076696e63756c6f2068696a6f, NULL, NULL, NULL, 1, b'0', NULL, NULL, 4, NULL, 3, 2, 23, '2015-09-23 11:27:10', 1),
(25, 'Margarita', 'Ortega', '123443211', '', '', '', '', '', '0000-00-00', NULL, '', NULL, NULL, 0x2e2e2f696d616765732f666f746f732f32355f666f746f2e706e67, 0, b'0', b'1', NULL, 4, NULL, NULL, 1, 23, '2015-09-23 17:16:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_residente_x_aptos`
--

CREATE TABLE IF NOT EXISTS `rmb_residente_x_aptos` (
  `rmb_residente_id` int(8) NOT NULL,
  `rmb_aptos_id` int(8) NOT NULL,
  `rmb_tres_id` int(8) NOT NULL,
  `rmb_residente_x_aptos_fini` datetime DEFAULT NULL,
  `rmb_residente_x_aptos_ffin` datetime DEFAULT NULL,
  `rmb_residente_x_aptos_obs` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los residentes asociados a un apartamento.';

--
-- Truncar tablas antes de insertar `rmb_residente_x_aptos`
--

TRUNCATE TABLE `rmb_residente_x_aptos`;
--
-- Volcado de datos para la tabla `rmb_residente_x_aptos`
--

INSERT INTO `rmb_residente_x_aptos` (`rmb_residente_id`, `rmb_aptos_id`, `rmb_tres_id`, `rmb_residente_x_aptos_fini`, `rmb_residente_x_aptos_ffin`, `rmb_residente_x_aptos_obs`) VALUES
(6, 6, 1, '2015-08-02 00:00:00', '2016-08-31 00:00:00', NULL),
(7, 2, 1, '2015-01-01 00:00:00', '2015-12-31 00:00:00', NULL),
(8, 6, 6, NULL, NULL, NULL),
(9, 1, 1, NULL, NULL, NULL),
(10, 1, 6, NULL, NULL, NULL),
(11, 2, 3, NULL, NULL, NULL),
(13, 2, 2, NULL, NULL, NULL),
(12, 2, 2, NULL, NULL, NULL),
(14, 2, 7, NULL, NULL, NULL),
(15, 2, 9, NULL, NULL, NULL),
(18, 2, 9, NULL, NULL, NULL),
(19, 1, 9, NULL, NULL, NULL),
(20, 1, 7, NULL, NULL, NULL),
(21, 1, 5, NULL, NULL, NULL),
(22, 1, 5, NULL, NULL, NULL),
(23, 1, 8, NULL, NULL, NULL),
(24, 1, 2, NULL, NULL, NULL),
(25, 1, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_taptos`
--

CREATE TABLE IF NOT EXISTS `rmb_taptos` (
`rmb_taptos_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_taptos_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre del tipo.',
  `rmb_taptos_area` varchar(50) DEFAULT NULL COMMENT 'Área total.',
  `rmb_taptos_priv` varchar(50) DEFAULT NULL COMMENT 'Área privada.',
  `rmb_taptos_banos` varchar(50) DEFAULT NULL COMMENT 'Número de baños.',
  `rmb_taptos_coc` varchar(50) DEFAULT NULL COMMENT 'Número de cocinas.',
  `rmb_taptos_hab` varchar(50) DEFAULT NULL COMMENT 'Número de habitaciones.',
  `rmb_taptos_balc` varchar(50) DEFAULT NULL COMMENT 'Número de balcones.',
  `rmb_taptos_coef` varchar(50) DEFAULT NULL COMMENT 'Coeficiente.',
  `rmb_taptos_est` varchar(50) DEFAULT NULL COMMENT 'Estudios',
  `rmb_taptos_serv` varchar(50) DEFAULT NULL COMMENT 'Servicio',
  `rmb_taptos_terr` varchar(50) DEFAULT NULL COMMENT 'Terrazas',
  `rmb_taptos_admin` int(11) NOT NULL DEFAULT '0' COMMENT 'Valor Administración',
  `rmb_taptos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se realiza el registro.',
  `rmb_taptos_user` int(8) DEFAULT NULL COMMENT 'Usuario que realiza el ingreso del registro.'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de apartamento.';

--
-- Truncar tablas antes de insertar `rmb_taptos`
--

TRUNCATE TABLE `rmb_taptos`;
--
-- Volcado de datos para la tabla `rmb_taptos`
--

INSERT INTO `rmb_taptos` (`rmb_taptos_id`, `rmb_taptos_nom`, `rmb_taptos_area`, `rmb_taptos_priv`, `rmb_taptos_banos`, `rmb_taptos_coc`, `rmb_taptos_hab`, `rmb_taptos_balc`, `rmb_taptos_coef`, `rmb_taptos_est`, `rmb_taptos_serv`, `rmb_taptos_terr`, `rmb_taptos_admin`, `rmb_taptos_fecha`, `rmb_taptos_user`) VALUES
(1, 'Tipo 1', '116,15', '104,5', '1', '1', '3', '0', '0,965', '0', '0', '0', 200000, '2015-11-10 20:11:29', 1),
(2, 'Tipo 2', '114,30', '104,5', '1', '1', '3', '', '0,965', '0', '0', '', 220000, '2015-11-10 20:13:33', 1),
(3, 'Tipo 3', '141', '128,48', '1', '1', '3', '', '1,192', '0', '0', '', 240000, '2015-11-10 20:13:57', 1),
(4, 'Tipo 4', '143,9', '128,48', '1', '1', '3', '', '1,192', '0', '0', '', 260000, '2015-11-10 17:13:27', 1),
(5, 'Tipo 5', '205,39', '170,68', '1', '1', '3', '', '1,591', '0', '0', '', 280000, '2015-11-10 17:13:35', 1),
(6, 'Tipo 6', '243,35', '206,05', '1', '1', '3', '', '1,92', '0', '0', '', 300000, '2015-11-10 17:13:49', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tbitacora`
--

CREATE TABLE IF NOT EXISTS `rmb_tbitacora` (
`rmb_tbitacora_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tbitacora_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de bitácora a registrar.';

--
-- Truncar tablas antes de insertar `rmb_tbitacora`
--

TRUNCATE TABLE `rmb_tbitacora`;
--
-- Volcado de datos para la tabla `rmb_tbitacora`
--

INSERT INTO `rmb_tbitacora` (`rmb_tbitacora_id`, `rmb_tbitacora_nom`) VALUES
(1, 'Ingreso'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tcal`
--

CREATE TABLE IF NOT EXISTS `rmb_tcal` (
`rmb_tcal_id` int(8) NOT NULL COMMENT 'Id',
  `rmb_tcal_nom` varchar(50) NOT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de calendario que se publicaran.';

--
-- Truncar tablas antes de insertar `rmb_tcal`
--

TRUNCATE TABLE `rmb_tcal`;
--
-- Volcado de datos para la tabla `rmb_tcal`
--

INSERT INTO `rmb_tcal` (`rmb_tcal_id`, `rmb_tcal_nom`) VALUES
(1, 'Eventos'),
(2, 'Circulares'),
(3, 'Clasificados'),
(4, 'Tarea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tcont`
--

CREATE TABLE IF NOT EXISTS `rmb_tcont` (
`rmb_tcont_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tcont_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_tcont_icono` longblob COMMENT 'Icono'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de contacto con su icono.';

--
-- Truncar tablas antes de insertar `rmb_tcont`
--

TRUNCATE TABLE `rmb_tcont`;
--
-- Volcado de datos para la tabla `rmb_tcont`
--

INSERT INTO `rmb_tcont` (`rmb_tcont_id`, `rmb_tcont_nom`, `rmb_tcont_icono`) VALUES
(1, 'EMERGENCIAS', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546435a55354b556b56475657564f636e4e7556455a7a4d6a425a5757686c56544a524e45465863556c6a517a46535756593564554a505757706a516b4e57513278704e7a46475a30523161327372563278544e466c7853475236536e4e4a634530345630707351303545546a4643537a525251586433625464526130746f515552486157316e5a7a526a53315a55576a5644556e704251574a354d58493365566456513370795a55686a4f476c7856446c495a32644f546d6c5965546479646a63764d325a724f474a6f643251325a45466156574e6d6331467953576435535641346355524a5a337033627a687051564270616e704a5a336c4a55476c71656b6c6e65556c514f48464553576436643238346155465161577033627a68705156425463556c69563151324e5649765a546b796558597a4e31413362586c6c6257493357564268626a4a505a693956546c425563577878534646694d48686c53335135565846454f464e77524574704e6c64355355317052437469656e425157437376536a4658533274616231467a535764714d464577534545345a58563056336f344d553930596e6f78575745324d56686d62564d346333457652475a726331684364465231546c70724c3056305344526b523152335446465052545646526d525a654456614e327048536a565155477876646c4277656c56594e5642324e6d394b4f54684355476476536d5a4c62466c45634538314f465658543363764e6c5235576c526c4f57517a4e464a525246564b517a593254455a6f4c3168744d303578567939574f576c4f4d7a5976636e52344d54566b646d633563554a5156564d3062323555636e4e514e6c4a53533074365255394c556d52714d55357163307468526c42744f474a4d4e585172533256514e32777a53544e30536b747353585a335a7973765a6d30794d327734553035574d32525859577430526c4933555374455154524e5a6d6449616d633351565277517a646b5357396e4b3351785a6e5976556a6c6e4c32526d534668776543746d5130315051315a536243394f52585a5a536c4a4d4d79745559556c4a616e70474e546c69614667796130743365445a365332645a4f485a704e5456784e445a484e314e75624864795a58645462465a45557a5273523142795a446c566355524e54314e4454464a53516b784952575634593168545a7a64564f585659526c4d72576a41304c3270576344526b656d6c4764305a4a4e45354e55326f785a564e744d6e5242516c4e7a536b59306443744c617939534d6b564963315a7a616d737a553064465232645561336c51526b685853564a614d6e466e4d6d52524d6e684f5a7a6c46556e4e756148686152476c685657597861476c6f5957744a525770525455355651324d775230356e526b5a46533277304b7a5a4462533977566c6f764d457853556b4a30546d7446597a525a536a52586132647654334a364e6d7433545456745a5646704f465a5a4e6d6c5162336c5a635535335a453545616a464a62554a7554325a595257565655544a355533526e5747784e633046784c335a6161335a72555649305657566151556853556a64725556704953465a57576b63314f453561645668594e474a59546b4934644373355a576b72524645785a6a4a454c30746e65556c4e4f457451535764454e47383465556c4e61555176533264355356413256554a744f575a795748457854585636536e68614d575a575a47777762317072536d73306148453263304e61536d4649596b493355566c4f556c51304e5563765a4870466546683156324e344f473577527a6c68595739304e6d5a324f55396b4e484533546a5176644664685a475a69536b70575355686d59575a76537a55774e545235596a564a4b3038334e7a51724f58525a636d706c4f48467156546c315a6e4e6863573433535749335747463259575a684d485a4852537453656d5a46535645764e3078575333685359307444646e684b56584e4c4d44566b576d704d5a6b737a59316c715a46424a5232466e5a474e5a61466c6b5548593062586c334d315a7463473969646d746d56445978636e4a304e544e744f57685152314a79616c46476445687753556f35525764784d6b78425248464c52456859547a426e5a4735554f47396f646d7456593273724e4739725a55785756474651536a51784c33424b53464e6d656a6c685957564352475177526e63726432737861304a6a553355764e545a50526a526e52576c6e4d476c4955557450646c5931646c70435646643161577051576a5a4254305a455448557a5a5578356230784a5330644f51553136644759335a4464315754564d4e6b46785330645853586c744b3342505745524d626b6c6d53566c36624578535656466e647a565753565a754d32744b576c6c51556a6435616d6377596b647557484e4254485a745958565151316f355348527854797430614735315a576c6e654442524b7a644b566c645352556c4f5247745a4f575a446355646d63454e5a4e575a304d57566b616e68574e6e5a50516d70684d4842744e5764305130777a516e7073637a5279624739565255557264304e6a5a33426c53316c34576e464e635578576144684c62565a6d626b68505a4841765233513554533971525642305a45564f52454e5a5255684b625441314b30785354314e4f5579745854315a4957454e6a4d6b38774f57673361565a5164445a5a576e4979576a466d526b4e4b6457493253324e4f616c6c565156646f636c704a4f474d7a4d6d68474e484245626e6454566d4a7457455a4c64555a4f4d5552305257687561453158646c6471575564705533493256553177656b565a543070474d4468765a474e6a54484a5a644764794e3364784e4764546256497963466c3454473555635459304f58644e4e465a36646b51305956426b61564249614549306253397156575a31643364444d54466a546c6846576a557661575652656e5978595670486247683556564e444f566c4e5a556b76636b34765230396854556871544864615755746e4c3149315645467861464642557a4252625556754f5551765130466e4d455251516d464562546442523264584d7a64364e79747352476c43656c424c596e685954484270516c684b55466c5863465a364b305a734c31647365566c726354524a6256706c526d354d5548706d636e524a59555a6a5748646c54455a505a5668725157524753485653516d746a597a4531535568345156647a6446463665586c315a556f32576e46564e32314f5747316a55314e6b565656474f56644759335a46634373764d6939475a48686c56304e4c57553559566a5675617a67345a475675566d747256584a325a58427a52315a4f6545316c5430313452485134623341336145784d57533935635778764b793979536d396a4f48557a576e5650645464694f446c50596d347a4b315a6c55334a705954525761565a6b4c793951596d3872574446714d544a51614339556156526965466332656d704c596b6475526b4a47635464326432744d55554a49546a6855614452565a56704253464a534e46566c576b4649556c4933613146615255686c566b5272555649305657566151556853556a52565a56704253464a534e327452576b56495a565a45613146534e46566c566b527255564930565756615155684756533876513052425157686b5556427a4d586473646d746a515546425155465456565a50556b733151316c4a5354303d),
(2, 'ADMINISTRACIÓN', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546436145704b556b56475657564f636e4e7556446c76527a466a59336732566b56475255564654315679516a5a77535739505156597a4d4768564e6b644853306c51526d784d61566c4a4f57524f546a46444d326c764d304e48576d31786144427856485a464e6d31425357524a5a7a42535758524362316c7a4f4374526430747454474645516b4a724f444a44516e597762456c5659305644525552514d305a574e564e795643396b4d4751724b3273354e5464314b7a6856525649334e4464754b7a6c36646e6f76646e5a6b4c7a6c4d636a6332536b4669536d393564545243543046435a31466b4e46465051554a49614549305a30466a52556877526c56526331645556476c584d57786857454e7559566444626e4e735a464d784e6a4e51616e70305a4655314e6a646d4d544a305a4441784d575656556c59794e69746153444931576b395553306c336545396b596e46496454677755334e5752314a344f565a69543170595454527a5a553472646e4a354f54553461327476656b347762484a74625459345a6a6c425a47354c615570536556597664456450576d6c50645852344e44526c526a5576556e5a7a4d54464755456f725330353254565933656b4a4855306332626d526d51556c5965464d7a65565577526a4a51526c4a425a6c6c34516c4a57656a565851546472613235735a46464e4f48646f564559314d6e7074596e56455a4574544d4564714e554e6b526d4d7664575131596e566e5657565a56335242655735465a46464c5332397964306c514c3246305445464356486c6e54325659516c413464797449647a6442535870554d5549784d3268535455687162337071626d45784f4752324e464d76513278504f5646695a6c52515a56526e4d46464455477447565870424e4464514b7a524e656e5268575655785a554a4354476c31575449356248564854576c3263476c4c4e6e4e785a546c7163546c6b5a484230596e6c784d465a4c63303945593352686447467a4e446446623074345a444653556d4a3265576777646e4a6e6453396d524641764e53744762335a47646a426f4c3368575a326c77536d7034645567334c7a5249566d52345a6b5a6e57453159626b5257536b70695654417a4f484a7761466732526a5a504d3368365256645a59586c784d45704c63793945636e4a54563239544b3278684d484a7a565731514f533949576d46614f44684b64584d7a536a413561577834656a4934516a51764c30644b516c52765a335a305a446c755930745363453930627a52694e553179613170355432703265556c4865465a35576c6f774d6c464257574a35576e427463486c4e5630524a6330647155585256616d6c694d6d6f7a4b336455644868325445705659564a75513346775930564a63584d76616a55794e474a495954427952446c6b4d573032566b78544e574a4652317055547939524f445652656e46484e307850546b4a5462445a6d5232646a5a566c6a5645644d563234304f47744b636d567552587059643064514f465a77576b7473616d786f544452314e6b745854576b7665565a79655539525457457a5356597a62326c7562324e575454524b556e525164545a435a544a744d336c5155546331566e5268566a4134524373346548637952576c4964303542546d7843546b56514d325633536c59794f446875616a42776555684d4e466435513274305a5573344d575255656c45765545686f6456517a64456b334d30524e62445a36536c5a47516a5a5359586834516b68454e6b6b76566b524864474931564646556257786e5a4735615954413564325658576c51325557394a61797470536c706953485a69516a5270544442364e57394653466f31567a42724e475a6d4d565a354d7a464562576c51516d49316357354d4e3263335430704a4d31706d5447743155323174644768515247644957577331626e686162697461636d35305a4655335232637955485976576e49315254647a52337074613035464b7a4a455a6c56335a464243616a4e6d637a427a637a464e6258423656324e55636b6c5154326c61616d31714d3345766233425551575635524735615448687153565242575452334d57564a61325933527a467259305a75556e4e6e4f544a5861587045556b70686356424e596d5532597a52724d6b746d544546764b3364466430566c624864574c305a57516e566859584e59534739334d4552514e55746e53444233643239335455746159564e51546e6c48536d77316254524f626b524864555631557a42725a556334633277314c304e4f646b30794e6e513156553153644764594e334a4c565456495258526c57444e495455387a4d30313153445576565568694e446c4c646e704462566478646b6445613052334d555278656d565155564e454f45686e646d6c74517a524d5430677253326847564664524f45783665475a555432784965465a6853454e44524642444c317059595642485356684355306c6f6347314951315532643238356153745354324e58533246454f467068566b397a6156424c5555357a5630744c51546c77576a64475a306776516c6846623264346354426e6347787a51326c6b4c326c7954564a4c4e47786f4e564a4964575a4564325232614563335a575a4d62307449566b4e5a6155314a556b56734e47566a53565977575551345954597752336c68574870456331457952444e45563055344f585232566e4e534e6d4e5164486c6d5531564e5758686e61306c69554556754d476f324d6b6330596e707064586379557a64516347353652444a4354326b7654587031516e4e53535456324f584d32596e42334f4441306454567a64566432636c524d556c64574e45773264314a4853464e47617a5a4c5757686c54445a6b4c3235705a56426e61793957526d4e3057446335616d314e53445a755a45464b4d454a4863325a6c613249305954464f4d454d355930787056576b724e5756756133527762585a74537a464e4e303072655659724d47523553565276556b467063584e574e47524961314671524663355956413561314669644570594f57355a4d314534646d4e786455786c57556c30645859325330316c5a31517251573959654545724e554a434e326442575556495a5556455a3046534e46466c53554649516b49335a30465a52556843516a646e51566c465347564652476442556a52525a556c4253454a434e314e7055455a765130686f54564e354d7a4e76625731435969397054574a324d31597a624568736445356b4d6e5272534856454e334a6e5356566964484a70626d4a704d566c535548684555456c6d51554645643263346430644f4e6a68325355566f646d517a5a6e5a444f464252597a68516257707053797436623056764b316c3055316b3552564e30596c6878633256454e33497a574867794c3170486546464e4f4856714e7a6b775a566879576b56514e557779516d527a6358685a4c33526f6455687457693969596b35696445357253305a7a566c684f64564e4e555374336458684d566a4976624456454d6a566b4b797449516a5976636d343257537430656d5a6a4e6c457654325a744d5467354e6b777865545a5854693936626e597657466854646c4249576d777657556875656e4a6b647a686d4d53737a4b32564f526c644b4e533949566b6f7963574e78546c6379616d56345a316c6e6546424b5646644d53446c7452557474595768495a793972645868434e47644259335642574768424e4546465a555649615546436431466c4e454648516b497a61454530515567355643383453303142515468434e556461546c6330646c64335155464251554a4b556c553152584a72536d646e5a7a3039),
(3, 'POLICIA', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546446555354b556b56475657564f636e4e5956305a76567a6c6a566e527164585a6a59573145526d5a7752476473523274555556707554455653625652744d6b6c6f4b31684657556b794d5852536230677a54454d7851327071526e4a6e54336f784e6c4631644552424d305a795530526c5346644b517a4179564656764f484276564468444d576c69556c4176596c6c78515441795a466c6b544456454b3070335132395353564e43516a46356347645265457835575455354d4449785a4559334b334535576974755a4373724e6c51334d45564a4d6a564c62446b724e544e36656d356d5432566c5a57557264564232526a4275556c4a344e5652424e6b4a345255394c6545565161556c5657476c4a5a6b645253585a485557564661564a6c525763346345566e4f4842465a7a684b516a5654536b49324d6d78425954637a4d454e6d4e7a5a5555446459597a565155476331613259314f45705362457861556b7779646c6f784e6973355753393162484645525468484e556f76597a42734c336735535463784f4642714e6c56365a444a354e44417a4f545650597a6c305a314a716232347664565a504b7a6471656d4d77635777356555393064305275563142694f5373765a58564d545730345630463156466b7954305130576c64454d323433644534764d6d70455930464a4e32465357473579647a684b4e7a4131643370435a554d764d4734784f4452456548423654464e484f45646d4f476b34596b466c52454e4b4e4467775a6b51324d545a595643744b61464253616d5a314e55357454693833556b787752466c334d7a6c565245465a556e56514d4770434d44553464545657546c705354564e454e485a4356554e42516c423459575a6b53573150516974365458426c52335a5a5345354e4b31525565464e615a6c466c52304a485644637757565a565a4468575555786a4d475a4d596b637a5a537372527a5279537939495757645a4d545a775a6d5a6b4d474930576d467a556c68775a58687959334e4c5a464249614452594d455269536c644c4b3368505a6a4a75647a593457445a595245314453554e6162474a464d476372626e637a547a5a694d6c6b7754556c4e6348705057484934634731574b335a764e6a68444e554a51535739764b326446613146304d6c527053326c4f5645397752537475543052494c3352354f545a54556e5130526a4e535a474e31556b356b625851724e32786b616e4e6c593035774f585a77543068584c334e4f646e597653324e7161586c47524749304e5734764f5374685348684c643056785333706b616a42544f485a58536d6c3464445a694b3046595930354b4d306330546d52704d5641795a33566d5958424859304e575556564565586c6b4f55397965564a7064314e68553168686145315163303135625642524e6d5a344b7a6c7a4f5768545a544e5956554e44655464325630316a5755687663445636543152545931427a597a52486133637a5a6d644e5a456b3057453877656b4a6f4d54565952484a784e7a6854616974444e3146756254423156473472526e597a636a517953554d305a553146525778574d546b335a32687462565245536d645a4b7a5a49625456365a6a56584f586479576c644d517a4a6c5258686e546e564651336873624452446547314a61584e4b523035444e4864474e304e7054464179526e6730616b704e535752775a6e686b5746707154326f316179747a5a5746594e446c44593064444e6c5a594d6b564e6458645152326c36516b52755530314e4e3239484d303945576e6c47525664754f486c72554731704e6c5a544d6b704663566c48627a6477646c45306548424b546e4632555564445558646861316c535a6b704e4f47786c4d7938315a484d344c314e424e30524b54484a7961475245637a6c785a57527a546b3144596a5a514d6b67774e3163354f5374706554643452454e794b335a734e554a79596a4577556b565157464a794b326c746354524651554e3451544a4e4e6d5a766233426f4d6c4e574d7a6b794b327735646a646f543039595543743061325172626a647463487051534868784e5339564d464d32646d6c454d323571513263355347347962325a6152574676636e6b79523230344e48686f5547684856446b7263466c706130343259576c504f53395053476c686556457864303833636c464c6145644d646974684f57497764334a494f44686c534770324f466c6152323435646c42515230497964556f35636b67345256687a5532647453326f334f474a4c556a4e744d7a4179626e557a4e6e4572616d4669527a4a4661444e7255336f3256303135516c6c516130314d526e684f4c3352455a324a7a5357567a5a315a34534730725a6d493164465a745533564c4e473072526b78356356707559334a6c656d5275597a4655626a6430534468585a5659785a564671557a465159334e485a5539434f56466a626d78434d306c45515567326432394f546d5a75626c637a62454e745932354557556c78536b4e4c646a687159325a574e3030304c7a553463304a6c554670764e55745254446c5a4b32777963306445616b684a536b6879616b705755466f32536e426b543170684e6d357a5a323550566c6432515735465a6a5977566b564855454d78543234355a6d786e656a5257647a6451515445354e336c335156424552464a56516b74776456704352304652637a55725457644756456b784e466c4d566e4d335a6e52554f5452315246684a5a5652585556686d646c5a6b523273775a6a6458656d70594e56564a5331526c4e3235584d55355556544a6c4e544630536b4d3555324e6c566c4a5a5556524655444247516b466156316c77564535534f554651656a4e6c5a6e685a4b32706f574652746331524755326c5152304645613142444f4731564d6b6c7a526b5253553270355357705a5969383151574642636d6878516a4a72526e5a576345313463544a355a454a596144423055567047567a4e7462455a6f5156464e51334e46637a5635516a525a4d30685254325930595534354e3252325233564e52326432626b6772537a56365a6e6b3361433946616b784f556c4a7a646a523362464d334e473146646b527a63693968626d35715a3152435756704d5a464a4a61545a496454686965474e4f6248457259576c5461545a34576c424651334a69535646494c7a59314d544e7561554532566b7077616b4e436333463155585a6f55545a466133705854454a33536b4532626b777a637a5648616c5931596b524763557435613159314b7a6c6c546a4a6863557436635870575757307a5a304671536b4e6d534856345a306c4e51584e594e58497854476c5a6153394b526a52515a45744d5131564655306f3156457735646d673163576470626d5a724e324d776446526e55456858526b6844544768364f566c324d564a59563141326432315a4e484e696132557a4e335653576c68484e335a4751314676557a417652326835554574516354467a65446c506354424e5a47355a5a32527a64554671656d6c6a4b7a4e575a32686e57446c57636c6c7761316c495545307a65487075534652564d5856336157396f536a55355a4730785a4778455a3142495744424d4f544e6b536a4a745533644e5345307857454a68613064355255464a5548684464566c755a30686d65564e78516b6c69626b4e6d526d526e63464977513049354d325277643031365344644b5932317a643052714e47356e57455a59616d314d6446593252564d7255555a7751564e554d465a364d474644553278715133705653546c74523152566354637257466c344d577079536e4d34527a466f596e4670636a64434e4556435632526e51577057626a566d626d464961565649656b39754d47733051797450623270595631467751693978596b703151305679517a4648635868345a55343063444d3053464a76576c644355334a61534774455a4849764f57706e59793942596b4d7a576d6442547a49324b30784462574e765455593264316479627a466b4e566c7661444d7a565746784c314e774d57497264336735536a5a6a5a6d4e48636b355154444e6154315a6957566c4a53466c58574578794e464e7854336b3164325a7453693971626a4673556d6c4b5a31464b637a4a7263566b304d455a6b593239444e554e6954335576535846425554637951574e586356463263324e54654735544d47493457584e4f5a3063344d574a495a57524865456c6e55564576526b5935635442585a6a4979546b706c56567050616c6c456157644c53314a6852476772636b356f636d464d5a3256455a5568496547704952556876516a4e4c4e47525855304d3451335a744e575a6951315532575574464f444a506354637259315a4f64484e74655570434d31566c5a316f3455586b78513039775a576c74645539485647705554574d335a6c46735a47524e565864315a31564d643164474e584a746246465a4d335a774d546b35636c5657576b397865484a7062544a4b556a526162445a354d444643546b64504d565658596c4642656e6876526e41314d317074624652565458686e616e4e4c6544466855793835556a593559566b724e5746585631464f61555a6f5158703455306458646a417253334254567a4e5051326c6c4c3231766556686c4d316475513364334d456476544863354e47686c54586c444d55465a4e6e4257616b68465a33707956445253644446505a5851775a6b6c704d45673156456c735a56683356485a306157394c54556c774f566733525868554e6e6f304e58466f4d316852524531355a586c795533465a625564694d7a63774e6d787853314e464e46466b64584230546d644a65554e6b654570735557643355446c736258687359304e496130553556457076636e5652616d564f5646706f5a6d6f7655336c7a4d57527a4f4752455358524254314e495656565455454658595468565969387a4e6d686e633030324e6e4d324d556877596b744b5932687a4d54524b4e6c4249534764534d326c4d5447777a534842686445744b636d706d4b7a6c50656b5a6a616b56494d55707963454a5554335a53656d746b626d743252445a3463486842527a5251635531426546644f5a304642516d706e4d574a52596a463552433872534574585a4759795246497a4d5646314b7a5a7465557873636e67774d325a556332396e52304934546e49726330633057486f7951537442556b517954476c554f4752514e6d493164453545516d707057456c5a5332524a515552424e305a58626a643454325a71545846344b7a4e68656b347a576a5a49626d78554f4756316155567851566c4e55446c6c5131684d4e456455523078755931526e4d484e5054314e4764457733565451355a6a4a4856454a554d30686e5a7a45764d324a3064335679526b39455156637865485178513267355969744e4b337032637a5633526d6f784c3064785553746f536c7046554652614b3231585a544579546c70324d5845316548423557464274616d67795932564962305576546e465a516b56615232354c52584931626c64694e475243536d524c4e5556515232527a51544e354d30355251324532526a564f646b73725a325a57546c42594e56463065546844534667355957343157475a54644739304c31593054457053576e4a59637a59345244526d5a7a46735430395464324e4665585a51575452474e31497761584e4d616b527a59544e4d64575a6a5448677a4f5646446454597654316f3261554e6a4b32397364327844543251325369397a55454a7a526d3932636e526c5658464654574d32654852706445746e5a54464c4e325646516d4e7761474a5a636c5130646b394c62304e4d4d546c6d553364764e6e4d7862555535644731594d6b4e4a4d47317255433878565845766232786d546a45774c3070544d554a345a46706d4d7a525662553134646a6c794f5546515645524c5a4556704d476f315754686b4b7a4930633278596344647a5655526a64564250526a426a5432354c51544a6d515546545330704263446443545374764e5868746130527059324d725a32354d6144646d596c64584c7a4e6a6356633264336c45546c6432656a6c4c6432315a4f565a5a52584a446348466a5344566a63565933516b6c45646c4a494f575a4b4e454e4a593351305a477043537a52365646426c51564257566e413455446b765330645365577331647a464f4d4773725a585a7a654842315a6939724e6c45344b7a52465432343455566b774d6d78324d464a6e656c6c425631424e4d3352694d6a5268636b3544556a423364323472616939534d6b56745a566f724e316461626d70564c31684459314e366133524a5955564b5a555243555864595555644c64565674546c56434f54566c61475a6e535649795154647362316c4f553070315669746d6432524e536e6c4952304a6a55465a725644426955324a7254544a5156464e354e47355a4d5564614b3039454e4730796230564d55533953545868796545643563315a3253585a4c546b524b57475632646c4e776256684a64557035536a5a6d546e42774b31466e53334e4954306c4e4c32387a64546c305956425a636b6b3352567033656c4d785255744c65486875556d5133656e6c534e7a643259307471614642355644466851554e6f59326b7a4c3239304d48524d595534345957645a526d564d656d4a5a523055765a6b4a525746417851586733616e566b63476c6e56486c32536d314a5654646f5a54525855456c78516e6c6c4f45343055464d316157785a536d746b5769397252304533596d733164474a366548465661445a5555586c4565477444544868725347684a6131686f5356424c556b6c515131466c56576c525a55566e4f4842465a7a687752576372536d68345530706f4f464a4561584e5352445270526b59306155683461304e4d65477444544868725347684a4d4670454c304e365155457961486734556d465a4e4374774d454642515546425531565754314a4c4e554e5a53556b39),
(4, 'BOMBEROS', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546435458524b556b56475657564f636e4e755644467652544a46575867324d46564c566d64336155354254575a6f6554425a516b466f546e645a56573179627a426e4d6b4a4261444933536b7449576b704957464d774e6b395461566852636d6c5a644864574e6e685a57474a6a52304e74643273305a45784257585178556c565663577454556b3543534738775a556c3256465230646d5a6d62564e6c4e7a4e4b4f4535344d546b314e7a6b764e3356756279387a4e6a526862574a316545526c636c4e6d533239425347646e597a68465248706e5a325642516b52335556426c5130493053556871515545345255524961576c33614778575a48705656474e49556a4a4b6546644f54334657655442564e56707a646b7379566e52346344466c54464a4d5958566d4b7a566b5a6b356955584d34656d6c546558566d56485a36636d684c5a4664586457314e576d563059585978535668565a475634565773336432597257544e306444464f4f574a4c4f485245636e4e6b5758466d54575a305748417854456861513035314e3274594d576734513074784f45683664574a4d536e4e515156523356573159536c59356233493451544d7664584977634446745748685263574d33546b5130566a4d34636b394b4e303079576b6f344d3274524f565a6b556a6c534c32704e5a4752755653746f4d335a6f6358647263565a7857456c6c523359794e57783453544a484e574e706246463463546c434f575654616d677a4c335133626e4a57634738356158467754554a735654646a4b31424956477477646a426e62476434636e5257564735685356637656546777526e5172546c683456305a6a567a68465647526d4e31464855455a6c544655795256564a576b677762474e345a444a59616a4d30555441345a4856475a31463653573135574339434e33426b646d347651575a314b3046535a4774786230786961464d3263797376546d706152465252617a6c36515841314d6b784f5745645559793947626b38325a454e4653464a334e30703463315a5653564a7351314933636b67304f565253566b4d304f544d344d69395151334e594e324e42596e4e71596d5972567a55725432567354546c74626c6c4a4e556447626d4e7057533970616a68434e456c4955455a454c7a564a55484a3057584a43616d396b4e487048617a4977576e5a305a6b705664334a43626d314556445a5165465a4d516c6c4d5a326c4e56335236536b7333576c6c695a7a6c4455576c345669396e55454a424f54524a5347704251537474546d51764d324654616d5a78566c4632656e6f345331646152473555596d3433596c4633576d4a6d4f444e354d6b77326446644f537a42335a55526f5a6a525154484275614764794c30466d5130493364314651513046434f5574695a6a4e52646b4e6c5555354561487034536d354f4d453957615773726430457a5432703465566c61656c644d6569394257476c474e48644255454a426544524a534856525a6b4a3155544e7556573569534538724f545a584d6e513353475645516d686a566b314e6247707a53325a486557784f62445252595868574c326451516b45354e4739474e7a63344e4551324d6e526f4f446c486347686b567a464b6432685957464e545a57513553315a5653574a33556a567757484670646d70754d467048575778505658524d64303951646a4678646c5a6c59557468557a683562484278557a4d33546e6b345a474a4e61335a495330566f537a4e734c3074305354424a52586c586547315255553157526d5a61635738764e69744757566c756356524d576a63774d53394f635578576447466b65587079596d68505930706c5a484e76656b465a4c325a58615864574c30684b527a4a544f556845576e42465a5652514f454e32535464475247746c54446c6c567a6c7565444257655846576158677759554d34556e5a355a484e555a4649304e31527153586f79546e6c354e444e78655642574f55397a5a6d4d34596b6861564459794f556f32656a4a5163325270536e7072616b394b636b74746558527765455646566c4234616b4e764f4867725a486730566d4e55516d35364e5868744d3273345a5664595456466e4b336f336255316c4d32307652334a78656a564a65577433596d5a3455545577536c465865464134526c70685644553054475a305a3078505754686d636c686e6256686e65456857536b4a6165456c59656b4a5a4d4373795a47785051323176596d59764d574a455232745656576f354d6d773255314d354b3146756547523164474930563274715930567153487046526d35756348523551564a3165564a6f5a45685064486832527a526c65577857595573306230464a4c7939595a546472644731476233644d62697479634535314c3256685432784c536e6f3455325a685a437448516a52425256424351546b305355686e54584e31656d78494e48567364334133574534314e445a515a6b34344c32316d51554e3361586c48636e6b785a47356f4e31424a54474e726345684b596c677765475a43536a647756585a6f636d73344f5556595a47354e64335a43656a64514e546458554546694d45316a534738775a6c41315358633463466c694e3030724d324a684c30565a556d6877536e467756565a344e48563664324d31555446324e305a6d575574335555316c6355637661544e5a51697435515442584f4846794f566c484d57593461476c515369393251306379646d357a5a4664765a533879646b567552575648516a64344b7a6832646c4234636d686d556a4978527a4e565a545a545546684b6247527653565a49574468754d474e3356316f794f575a595a484675546a64455469394953574931517a68465248646e51575644516e703355564242576b3835646b70436546427a516b52335556426c5130493064304651516b46344e456c495a32646c4f455645643264425a554e43656e645255453944516a524a526d453556585642515646445a316c7a56544177636d49726447644251554642516b705356545646636d744b5a32646e5054303d),
(5, 'ENERGIA', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e736246424251554644556b4a4b556b56475657564f636e4e7556446c76527a4e6a565867315654427352554645546c5a756332395351305a6152454e73575568566345466e5a584652545556685132685a6231453554455934634546544f454a434e564e556354425352323158543274506445524c523268485533684f4e6c4a43564768544e314e57516c5a7a4d4535695644567852556430576b314e61474a785556467a5769746a655373725748553563316469636d5a754d33517a5a6d6335616939465a6974355a6d4d724f5338334f575a314c7a4e314d5535594e7a4a575253744e614842565755683352554a465a586472546b566c5157645152575646614642465530566f4c3046525256493061586472546a5270515764514e464e48615578485a564d724e6a6c6d626e4e745a45393664444532537a6b7252337076646c67724d4578454b3031424e584a4c526c684d5955464d4e6d4675544739344b7a68554b3359765a316c57576a6c455a45685563474a504e6a4a725745394e634339316455517755445644636d354b6248527555584e6e65456435646d5a50615452365644526e4d6b684f627a5670636d785155465a54656b35366457646852544255656e5978564751335a474a695a57704461314272526d64784d555a5254556c78526c557955455a425a555a6e634446715747463451576478616c6330546c5a476147517662484e59517a46364b305a54556b784f65693831576e5a59564463344e6d5a744e3068335a4730725a6b396d646c493156306c315a5464564c7a5a5153586847517a5134525578525a6c68484c30353665545648534731474d7a4a4a4f45466a62566c78567a683364433876566e6c7052314a4e4e6e4e464d326430654842325a4570574f555a48556d4d325a444e36636a553363446452516b7035626a493455316f775a6a4e7564456469655568356155513564314d356131704b526b686c554373354c3031365658686c4d6a52464b30785563324e5151585a6861797445636e644f55456b7661556c42645456775957557a626b744f6353393256486f7751565645545852335a6d464361306851646b35316356684655325654516d30325355786f516d354f644442535a7a56535758684a4e485646516c49324c7a4e74616a4d334d6b35324c306869525556756546566b566e70735a6d70565658704e593364756432744652454a795357463256486c5257437449524845724f4655324f4846574e477079635556326445706a51586334624764764d55557256544e5451304e724b7a527a57556442635573345457706e54575255546b7036626b7877595570305a6a5259596e5277655339795747524e4f47733053564e4e61553876516c687357464261616b5a5464574e75636e426e4d7a4a32576a567452326b335330786e54565179566a466c63305259566b387263445531527a677256304a43546d5a6a556b3948645564574f4641334e584268534739686457706a63486c524e44526c64567061546b5533534568524d306443656a4a6a53475a52556e466d4d55704d596e4e77593078745646525354337073566e64314e576c7163557030566c6c736230686a61304e4b5930397763544e33515768514b305644596e6c31526a4978617a4a6f576a526e523152574e57784d63486c5463546455556e647864306c4252314653655664585a6c457a5a4456775a4670334d334254566c464857584251545538324d6c6b32546d39304b314e324e57316b54476c70554545784e6b5a4851544652646d6c6a53566772554670505957564f576d5252516b6c5362444a5864573549656a527253445a4e615646316255356c4f48706a4d6c64764e564e3454537335636e70554e46644d5a6b4a485357464a4e474e345746684d56316457614468766554426161554e7a5255677a636a647254334577646d317965556b3555454e71617a527555456858546c4d78575867344d6a68786448424c4c31565655576b3155306c4a556a426d4f566c4d4f546c59637a467751306433576c5a53576e4234656b38774e464a6a63454e6c4e466c6c6433467152334a4a616e5a346433645a55453876565852526154646c51304e795a54644f566e427759585a71546b5a464d315646526c6836644468485279393656324e585a6c4934565841344e45553462574e76626b4e5a656b6c774e545a7a51576443516e6c4b4e314234645577775330314f556b6453516d46426569397057576c4a526a6c545a466772524864766145744c555339784d546846616b644c64584e734e3342486257383256475a344f476c58536e684562474e45543368316446685165566459516c6b724e33425a59554d3362577834546a4654576a566f616c464a6145643564564630616a5934565459325431687a4e4764495757303455316c59524735525657315362444a6e5130524e54455268526a4e51576c4631547a49304f584a68527a52345246523555586f77553078766230637664334a6b55546b7863584a4e617a5678576b63316455316d534868595430354e546c4e3352486c6c644668514e564e50626c4a6d556a465453473544596c647263484e464b7a6c4c4e6d744d614668314f56466d5a44466a596e4a6b634463314d6c5657553055315245524a55474a6a4f484e4d525730795955317956433948643056514e334a5a63564d3061316b3551336c31654846554e446432566d6c584e47396b53306778556c6c4e516c464c61544a684d304a78567a64545a6b52795a5842515131427a4d6b397454476c4c646e42736144513462585a765130383556537332535446574f5759764f555a7463456858637a684d516c56754d585a69566a4a4753574535637a644d4d556b7857444a4d626a56325357355957473975656d46365a465131576a524a53314a69645531594f444647565730725931424b4f555a695332564f615456345a6e646f5469394a615564504e6d4a33526b704965444a735954593263544a344e6c4230546b313364474a765a6e524a654846514d3164465a6a4a58515764475a58685a4e6d5a54654731734b314a5154793957566a5279636939774f4764454f44526a546b4a7063554a334b33597755455a584c3246435a6c646f656a42356131424c616974735557317a52446476636c4a6a595446585a544e7553554e514e3146554c30644d5a3264536458525663576f3164466c44646a52524d6d6475563035595332464364553949526e6c6c6245517a4c30643663486c74656b70514e56526d6547564e526b5178646b77725157343152316836636a6c6d61464e584d585a365a3045784f576443516b646f6256646e4d47643451564672526d70564d466379656a687a5354637252305670595552545448566c636c4a345657393152553143545852335a554e444d3270794e6a647363545a55516e6f314f5467325179746f55564632545764445254687864326b7764553956556d4a456547644f546e424c633149325755396a576d4a79656c6c4c5957565a516d645654556b325157686c516c706a546a4e544d465a68644464465446526f644856694d6d6331517a566e55545a535a6b7778556b46765a6d684e566b6c454e564a324d69396f543346755443396953446c4a534646505132687061306c444d57745255566c774e553149546c42306444566c5a48644a535664574d455a4a553278464e33706e4e54564b5346685956336f32525734355a555251646a63764d584576636939315a477733556b38775555746c5a564a505630746152446879526a6c6d646a6b7763476c7554484e494c79744a4d5552354d47393065484a544c325655515651784c32396e5a3231534e4539336157524a64306c4262454e68526a67314b32704b53304d78537a68784f544a3451577458636b566a4b32684f55475a3361335647556d51344e6b7372623070585a576c79576d6f7254545a335430525254564a51536c684f5345526b4b30686f553146744f544d335632396965566f336347466b646a4e5a524868326544683551335a77596a524a523342715456564b656c5a774b314533556e417a52544e424f444e3661334930633152586256417a546c524565485a68566e705056486842547a4e4f63455252636b56744d45784e616e593254325a565a5531434c324a774d3363344e6a68354e323177645670494c7a6b76554374755657467763324a4a52475a7a656e637864334253534868774d7a5a71556d4a6951544a325957746959305634516e5a454d6d5a485a7a4a434e5768335532393362564a48644459304e576c50536b3171556d68754d58523554316455614652695a465258627a425564303546655656334e47744865475a68544667324e30524d4b7a4e48566d5a3065445672554468615544564252573547563056435a324a68656d4e6153304572656a49304d6e6f794e6e5249557a4e335a7a687454564a334d5770365a32686c64315642596c4d7253577033625870745355356f556b3174516a5252626d64465a544269523252544c324a4a537a513265445671533274776546644e527a6c30616d7431546e6731576b45334e6d6446595577305a32493562325a455554597a643156504d314e4761444a616247686b5a6c5a34655339324e6d4a4254545268525456345557397a5a556c35646c6c79575642586256424c627973774d486877624756715432463557554a3659336c755448565152457831546b34765244463254473954593038315132557a52473554517a566d4e6b396c4e5756746330317a656c42424d6d646d64456c7455316776537a4133656a4277546c5a425248647a646a564d59316f33595856785a575530536b644a61445a7062573945626d4d314e4739725a574d336154633459566332616b5258645642484d3034786145673152324d344d55357a52315177554531736543746f656e5a6f526d56594f48566162584a494d586449624651764b7a4e435269394f576d78764e6d5a334f465a4c6432526963486478534856615433645a656a4e705746704b4e574a47636d4a494d6b4e695a6b68436257396c4e3039686358426d566d7050654652754d793948635852575655644b63446c47654739534e334e5051544e50566c4e494d7a6835656d4a47646d51726154633455314e6163446b7755445633616d5932533170346445524e626d68765a6b394464306f7659544e73533256725547396b576d684d5a455a686547737961337075566c6f3562474e33616e41726255743161546455647a564a625441344b307335566d354464325531637a644d4e4770354c336b315a6b686a534339336330785659325658646d6856596b78615a546455576e4533547a6b325a314e7a52444a774d446b7665566869516c4233646b4674534746354e544252626d31525a55517754545a5a59574648516a524a536a687051556f7a4d576c4f4e5442784d54427554307047616e6b72613352524d454a485755566c59336377566a5269576b64705931553262565534554549336330684c4b306473616c637a5a44553155564a6e553164794e6d74765a6a684c5530644265446c4c6547353662585176536a52585344465059326c33613034306155466e5544525452576c5152564e4661433942555556534e304e524d46493051304534556a52545254685353564e49615559764b305a585155464f6155387954573145636d5a3162304642515546425531565754314a4c4e554e5a53556b39),
(6, 'RESTAURANTE', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546434e48424b556b56475657564f636e4e75566a464d5354466a5933687154585a5659305979656d46685a334a69516c5a544e574e786455643552576853576a5a7a5a577873636a64545a6c464d5a475a5a5445316d623052554e304e6163546b324e544e6164546b325769395255574a76596a4276544552535532395a535668346146564661464a57564574764d4731724c3146615554644f616c687a5956705056324e3554546875656b6c4a63303575556d5a514e7939345a6e6f3162557046646e597854577468526c4a706355686e524864764f476c4255476c71656b6c6e65556c514f48464553576436643238346355524a5a337033627a687051564270616e704a5a336c4a5544687852456c6e65556c514f48464553556c3654464e764d3163336356567262473954646c67764e5849766257524564336c5a4d484257596a567a4e48466d4d57553353464e325544597a525746464c315642626a566d636d6f77624570785a55316e5345317165584e51536e6857646b6f3261316c7a5a456b76656d564d5a6d706b536b5a464e7973775a31704853465635546c6b724d47684f4d7a46465a6c523562437475554339336332647556457461647a4644645468684e55644853466c58546d464357573031593164575a30597a4d54457863326c6d6147646f54546845643146445a47465459573161567a6772655539345156644962476f3465474e7a5a553533526a4661613052345155466f616e644e4e6c6447654659794f4642455745354b5930465653554a6e5a546c705558644c536d6c7554554a7663455a76546d3956595464484e576c6b615870304d32646b635664615432466e6169744a4f4556454d6b524a5a6e5278596b4a5165456372637a6c685a586c45643359764d5452556545396a4e3368324e7a6c6d576a466d4d584a5257454977544574315a6a45305a56644361556f794c334935646b307262574e495930394c527a6c61546c4e4c6454646155327045546a4133637a4532655755304b335a784d476c3453566b346556413364485a5056326878555374344d6c51764e446469516a645957564a355257383557486846526d67725246705a545646336357564b6556424c52564246555374565933427162565271654641354e53746b613342774d457055647a56514e564a434e56566b616c4e4e5530686e55574e4c4e30354c533155314b31523259575261613146455232463054446449595574684e6c4644545556505448525752454e56636c56565a4570314e7a4e6a523231344e7a4d76647a637264316c72595442735a6d4e4d654774494e446877626e6733566a59774d6c6c44616b743462336f324f43746a645770314d5778695a574a614f5859304d573078634545724f484e594f464d344c315a4256473478633074465358564b51326330656d356e5445593155444a4d4f564e765932785157456b796269394a6457785551324e4b5444646d4e3035685a6a644f5a444e796445314f64555a4352537444616c706f4e6a683354555179556d687a625846476254685754557443615759314b33704d5932526957465531636c7053546e4649626b4e35636a566d4f576476526a557962545674524531425256566b646c42324e6d77784e55683253544a7964557836576b5132537a5a544d6d6854567939346457704763316449644578485347466962475934596c64745658457a57565a4661334a4d616c64724d544645643046334e7939745755394863325658646b5a4b4d327732564668534b7a427352305931524464554e565a61535531756132645157475a764d4374465347356f4d466b7a4b7a4e57574455304d6a4e4361475a454d31417762474e6d5933564f626d647a576d46794d6c7030566b7854576d5a5963584a5162454a5a4c303145555568714b306c505757465353335259595373325248644e5a454a3553576c576244684654474d7a556939435233565a516a64354f486732574374695132526c52574a565a485232656c4253645764364e43394e636b7032616c68456547464459325669616b3158566a686a61545134643252484b315a4d4d4446695a3073726547685854485655625535784e464e724c337069557a464864314a74645570615669744a4d6a5232626b64494b33706156315670613146505244466a4e577855566b6868616e4d32643249324e6d733555556c79626a6c79565755345a564e746455677a4e47354f4f56524f525574696256647555476c535a46525059544e58526d644d5532307654453878543270596233567263303135636b4e7256475a7a5932354961545a49574556305330314b54586446536d6855636d70685133644e4f566c6965444e34647a5176537a6430596c5678526939505a4855304d555648656b31785330686e4e474a6163454e744f56465862323575526e4e34566c4632614442754d6e45325431525052324636595841775a69747463574e71537a4a55647a4e716556684961693950646e687a5333704a59555a454d6a6c6d4e334a42515552576447643664697478543067724d336b794e4539526431463064556853544777775645354a556d73326445685355336471534664345a57787a4f484676633039615a6e4650525739314b7a4670567a46515a45784452336c77566a525564464533576b35505a556c335a446c3464473545613038346547525a4b3246426247315859556b34596b5a4a616b64444f48466e55464a31524656564d5746764e6b747a4e3364474f455a615330355365573876534746475a326b3165564e4753575a4354575a456348425852304e584e7a467751326442534755325956646d646e497656566b775346424d4f457448536b6c43546e564d55577033553256304f584a6b4e6d4e61556c466c4f574e5561544e71614449775a7a6c364e7a464754316c4652454a314c3078346558527464335532537a6b77626974615130353563485a584e576454563342454e576479565552436145347a6333417764586c516147684e4f464d304e336331595731564f58564d4d5570524e544e6d4f4642534e6b745963314e30645463355a6b6c6d654764566454684a4e303148526e6b724d6e64556247784f57456776636a677a4e48465162326b7a5a4774426145497a55475633557a427a4e6d55795930525356335979656a5a715a475a4e5346707155336c7057584a5954575636645764424d3264685556466d5533707256546461646a4d3556544d7a51325232636c70534d6b5132537a4e744e79747161304577656974345347707863567050516b4e5a56457061547a4a704d6e6c6d4d33646b644568315a484977616a5a59534456764d3155765556564a523063795a6b52465a5746584f554a44596c4976624468454d4574445a7a6c7757465a33654567334e464d7953475533625778535448465561486c535956467554306b7256466457537a5a6851565249623368784e6b746f6344565354327844595468576148644e515556474d33646852566c6c4e324e755a6d355a61555a6d64456f765753394962334e6f52565a614e6e6447626d35344e314230566d597a4e6e566b515468356453396b4d45493152476f72516e644352444e574e6b6b344c303430516b5a544d6d677a516b5a4e53305655656a4e6d6430706c566d6c4f55546c53596b745165697478526b4e4b4e79396a61455130627a68355355314c53584972533168595a6c704e636c42785957354c617a425454465236576a677965455a6d55464a515433497a535577795a455a69616e5a484e5652545a533958556b567655573956625752745531644e527a4e764e4846535556646f556a6378526b394a654764505a6d704a4e6d5a495654527953553176626a4e4a65444d79626a426b55556c6e4f465a6c616a6835546d4673647a5a496445746152584e454f446b78614846554f454e6c57444668536b4e546554646a525464714d6b7473565652464e4374454d47733463306c614e337035555670524f5764514d557872576b5131654468704e6d63355655645662336b7254326c6c556b6451596d6b79566e643163793971516b78335a3142454b32513356306c57596e4a4555575a58654374504f576c6c64464a334e55706d56575653516b686f556a5671544574464d58464f59566731596b4e52596e6853626b5a6c5969746b546b6456524864564e6d5572516d6c69636b31306431646b574852475a6d685656304e686545466f5a6d5930616e566f54474d77513370485a7a5a57613277344e6b343053476c3365475230636c524a544770465a585a3661334535556d7831513046705545706e65546b796354467564554e6e64564e436554645162444e7a4e54424e64325670616a564f53336c495a5870534f466c504d544931616b315462475a6c61554e43516a493061585a5763324a6a55314a514f5856305531467862574e6c636b4e47576b52525a4445725232777257556c7661314932536c5a61544668764f5570554e576c32625445325a6c5a46553064435a45565a56304e574f545230536c5252656d4576516b6831536c64764d79396d5254677a4d544a7551306f76565652356230317052464244616e6c4a5153744c5545317052456c6e4c336c7654576c45535763766557394e6155525151327035535545725331424e6155524a5a79744c5545317052456c6e4c336c7654576c4555454e7165556c424f58466a554842515a3046465155707564464a7565555251596c5276515546425155465456565a50556b733151316c4a5354303d);
INSERT INTO `rmb_tcont` (`rmb_tcont_id`, `rmb_tcont_nom`, `rmb_tcont_icono`) VALUES
(7, 'DROGUERIA', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546445a6a464b556b56475657564f636e4e755a585278527a426a56586733566d464c55545930556b733052433974516e644a5a324e4e53324a6f525546565453383553553957536a5271656b4a47523256765457395565456779513356464f4645315557357855455646566d464c52555a524d6c4a785530314255586c356130565a6232687961464a7763314e35646a46324e5841795545593264465a70646e597a526c6b726144564a625856784d544a6d626b313159797469545774615544553556464a45575738786132465261556c4364323534535549306133684a546a5272516b4e5151317061593256794f545a6a593239775747356d53304a565a44687a5345686a595455334d4468445a6e67775357566f543341355a48553162546c515a56564e5a54417a54486b79654373336254526c5a485a47626e56314e3039545a456732646b5a3653584a704b7a5278643156754c3278324d6c517a646e4a494e3370685556706b4e486c4b5531705951566c725a6e426f4d3077765a6a49335a55356c576d4a6c56454e705431644261445a735956646d656d30786555566b5757397756444e5a4e7a6c7064457378626a525a4f566376656e6c58526b4659615870735957747a4e54527752565653633064574f573948554455335331644a4e3064595169744a62335655515452726333426a624735705455786d51566f7762555a3364336459546b6c344e5770545346686c646d466b65586c4c65544658616d4a354f457451596c63324e314e5464304d79626c5a5a636d45325a486c47526e7073566a4648546d5a49536a5132536d303161557448654452445932564a64314a71536b64584d566c524c7a526b5545355a62544e564d484e755a556c344f47637862307732646b4a4656584e55616d354653544277567a6c6a4e316f30626c68705756706a4e6b566e4c307778616e4a465a7a52534e45564a4f565670527a4a696148526965444a4f5754645252574e6b4d473835535746614e584531566b5a325a466c735347785061584d775347356b63334533513364556232566b5754467164456875575570534e6d6f335a46567957474e4f5655387651306c344d6d70614b307470524867346455527962544e504d305a4a5a54684d5233464d57485a4d65545a344c7a68446554686b4d485a59534456595a46527a644652786230746c4e57744264544e5565574576596e42695a46567a5930383157455132646c553163485a4354454a6c5632525654485a35564852325958553357545a5964307479536c4a6c536b51725546423062315a31554549774f44564453304a7455556c4e65545a3259315531516c4243536b6c75615751774e7a4671555864564c316c6d54315671546d5661656d6c735445353465444d774e4538765755557961693930566d5a6c4f4852436556566a64457857646a5a53597a684c645768494f4756794d445248516c467351314676633035534e6d5651516c7044596d356e6557356d5930567956444a6b536c68716247704e513046685357786c6458524961465244656d685952304a5153316c5a533067355633564b516b317364334e5155574a43655735454e48646e4d793979545452755446566c53464932526a526b6433647756465230636b34725232786d556d5a30516a646f596c6f31654568695532347a543068496445313354475a56635531305a6d6c6864554e4653324a6f4f544532655456695933557a613256765a6a42585a6e5a36544452356179395155466836574652734e6d70475747677964484e50646973335a564e734e546844634564344f46645853314e534e6b6c58565556705a456c754d7a6c534c79394c55574e7a566d46505657777a5a304d3059305a5061446c6a647a464b5a6e706e5745706f4e43387759334e78576a424264574a706243745759307442654867314e6a52354e5468764f5552795379746a547a5a49516e5a6b636d4e684d4668544e32357455335133565656534d4552574f46564464544e464c3067725256423452456c45533070455933457754576772516d314557575a565457394a537a566e61473171646a6477574574334c324e4962545254525870454e6d5644517a4e4b65476330526c646c6244524b52466c594e6b4e4752564a325247314552586473576d394d4e45784e4e6c6c6a516d567164336c55575531484e584e6c5355524b4d465a6e516d67724f5459345158706957486334546a4651566e5a6861446776645445725648644c5a486735627a425955573136636b78736555786a4e6c49346457464b4e6b6469613168434d55747a54477057636e56344d6b56454e45593064484248646939565547356f4d6d314c526b4a73533078524d6b70456233564e4d574a756154686165465932515738305a584d354d325a51533038724d32387a5130746c6546647a555670424f54646e56466c725431457862574678656b39474d475254513363775131426157586477646a5a54637a5645526a6b30526d6735516d5645626a64324f454a5a6144427656444e51526a6b7861464e4b635735495a466778646e4e78576d49354e30347a656b3477536d393364446852553052745932565a53584e4b625774335479744257446c754d464d784d7a4a75515852465a46645362555a7063586f7a4b334531596b5972655445774d57524c595451315a6d7469646c4a3452314a4354585131636c4531613239715530773051555672636c5235643049774b3164365246647264306c36626d457664314a6c4f455a4e4c316855556e6b765a335a6d52584e59633039556255644a51555a6f5247393164457048523364774e574a4465574655516a6459554735594e544572515863305445644d5679737a635735735a546849616b777a5a564678576e5a365a46564e5457355656314d78566c4250515456574f44457855444a444e335276526b5a45516e644565544646547a5a345745786c5a554d354b7a56496547314562315a5659316845596c426a5930526e54544a72655852494f57497a53445534623363354f454d356155786e54554e734d6a5a4c4d556c53536c523561573134566e4a4654446432546b704f656e564f646d64725130703561475a364d546c544f57524a6545355051314572596b643455586c515657643156554a46566a4a56596a56424d575a7a6543395857454e464f575a49626c51354e5670325a314d33526d31596448687855446c71634864424b31426b5a5459795a6b6c4f626b5249637a687854315658536e564c616d31705a546c33513252465647707a4d304a55656b645555556c704f5568364d484a7155486f724d573173646a565a54307045596a5a34566c4d7253486b304d575a45575546464e6d523362456c6b55453147656d4e4e4d69396a59316872623068516233557759566c4f516d31426147523663574a55555564514b30557962464642536e70494d473952597a566c565568526233426963444a4f63454e4b635545784b326c524d6e563462585a4f6569396e5a6d517755454a4b57453136534468594f456c4a5331646954454a564f466c754d4731544c30356b5357677952546c6163585a4d625339684d464a6854574979556b4a484c327076515468755a6a4d784d6e4a4d4b32524555544a5464553476526e4a5859564a32535442795a5641345a6b316c6246424c616a4e52566e63726369737655334a525a32394e5547315952325176647a425054455a6f62566451526d3553546a424b636d644b625464474d476f724d586c4d57486c73555456345158525a64444a47526b704863324a3555474a6c4e46684464304a425a325a4a56477048556e6c354d575931524870345a6d5177543078765a6d395a63556842626d56434d584a7a53304a5264554a36596a52614b326454526c645a56473434546a56714f566468566939796457395856446c3354454a484e55743352316c69516b4e304c326877544778705a586c784e46687a53456c535632394c5757705859315a745a6a5a30656c52774f466433574574304d32355a52586f3564444e4653585a7a536c49334b327378636d6c78626a59766330745159305642644452485245683563324636553264514e456871526b643362326c5963484e50656974324d304a3657455672523142774e6b4d764c7a4e33624746445a6e4661636a4e4c627a6457636e4275636e6f72554442474f58684f4e457335633235495a6b6777556b317a5a6a42345248646951575a4256334e3564484a696231567365565a7757564533574770344e3039695a486b3155585654547939695445707253446b3454305273613345775279744c62556c6d56446c46646c5a755230645665466c3353484a494e54427261444668516b4e746557705054326f355a32703357476f7255466f7263474e4d62484d795657464d536c686d5247564451314e61616a686e55566832525459355a4663334f574e5a626d39536455396e4d485172544752565a47313255586c4c616d74525647785054304e31556d52544f4646754e316c305531645953455a6b52584646615746535257525151557057546d684a656d387851586c4e57475661626b316c4d6d465357464a3364564233555739585347464c626b55326344564d556a6c7061576c70556c565054303975524770556348677a6132646b52456869625578354e6b497a556b5a474e544a336546707165456b325245746c55564674596b4e42566b777956537470623364554b335655536a557a5233677a64454a535257524c53556731646c464252545972646c4a4a644556304f453557596d5a76553152705a327068646d64364e46564655325a42556b746c5631677763453158566a52685347316f4f544e72536d6b7755304933646e425a6245685255474a304e6a4a6b6545706c544752765930684e61566b775633637264334e4e59323571655578516547524d4e31705856307454556e6c774b32745164307334596b4a55556d785a6255746f574777725a6c7075517a42504d316c35567a4a6864546b355a6a517a4d466c3654455a79516c685764325651566c6c6b5a6a55335a5870435647316d51574d77635463344b7a4671646a64556454425563306f3059584a6161305a6a53455131596c4130533163774e58703661314a6157566c53526d73355a5764684c7a5579564746784e45466b613035315a56686c537a5a6c646b7830526d4d34646d6c52643245764f476b34596c70684d57784f5653395a54556f31526b3533545845794e6c64354d6b4633566b704f566b7858616e646b4e4863774d6c4e30567a6c444e58557a6132307754555a424e3278705a5663794b7a6c7261323574643239356454466e4c3035365158426d5a58466a57477445576c52524d5651314e57316b615568435430744a6431597851315255654664444d445931613056594f486379636b3946536a5a4c4e545a4361586872566a51784c7a464864546436616938785a6d4e686169396b4f446c70524459764d69744a6545784d566d6436655442475a5339584d585235553363794c3146545345643051327377566d4e794d44597a556d63775330705164565648654446304e544a34536b5a70646a4e495248647365466c7862325a3556476c7a576c684a536d38765a6b677a4b334a4d5a6b4633525549315a55464f616e7034526b56596230566f526c597964315a4c546d5256616b453163454a59635864504f4534724d444254646d3552617a6c7a616d677951316c45575564615a577851533059776557566b617a683052445a5a6247395753464635526b457862454e4c4d46525656307847535538336447645a5133685063446835545735306132513057555a425a564a4b527a6c685a6c68594f5767325a326b3265474e755a464a34646e70496232527056576478597a46734d53395a546b30335a48466859574e46564574455530703159545a484b7a6c73596e6c5855486842574856444e6b5a7363473033554731445a574a4f62475648556b704a52454a5662566f78575852354d30526d57584647563070784d546c5a54576f7a6355784c6147784a55446c4c64307045564552524b307050636c4e4a65455a6d5447316152537479596d6836523364545753744b4e7a4e5963476b7857566c4a62324e6b59336734536d5a774f55356d53575a4b54564e455a55704255555172536b4a52616e6c4a516e647565456c434e477434535539465a554a4255455631536b4a5152576c4a516939465a31565462693944616b46424d454e3663474d785345497a626b56425155464251564e56566b3953537a564457556c4a50513d3d),
(8, 'CONTACTO', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e73624642425155464363554a4b556b56475657564f636e4e595a546c785357786a565751766556524753564e6b4d4546565447686c6557466f59304631596b5a72544374575247396f4f5739756355633455546c33626c64516130684e527a566e626e464962554d326146425655555134527a467951304a4751557853636b7042554864766231646f526d6c6b62564931636b397a4e6d4674566d3035656e4978656a5576636a646d55576843616c70494e7a6731656e70504b32566c5a5459305679737a545656424e6c4e43516d6f3351554a335153743351574e4255484e42534546454e304643643045726430466a5156426e52486442564452424f4546464b797448515735485533527452585a5354446461554670496247356e5354423556585a724d6c56756556677753314979654764535345786d6547637a614868694e454e425a6b35595433424f5632354e4b324e71595863346347527161475a7453564d76646b704461793971517a4a5255575a30537a465a61566c505547744b515752736448706d576e706a526a425656546844525746475444466b53444d724b334a57526c4642556a687052454e4c646e70364f46425459573571616e5646566a564d4d6e4e434c30553452305657596a4e564c797334646c6456616b3531556c5a696157463652564656554751304b7a4a4f544752715430637759586868646b6f72513052714d6e51324f5656455230524c556e4a7a4b3259764f564135596d4a5a636d56324b7a4933614452315a6b78355a55356e55577776526c6835527a525455305252515670534d32347764326c74636c683255454a4a54304e774e304e6b6145683354576c7364474e614d3074575a56423053474d72626d3159616b5a475643746c547a463153573072646b6f7755566b335130313356553571555555314e5642365744526f63444655646e56544f54593156565a5454575577596b706f4c32746a516a56755a6b303356586f31576d4a77556e517a6231565759307478576a6c524c3035595547773353554a74625851335547355a56476450554752304d6c677a646c707a633045354d6d64566457453262334e32597a5a614b327855646d6f786256425353336b7656553161526e637253326b355645397554484a68526d52495530673156793833627a6479566b6c75616d745555325a4465484e7a51327779544552726158686c4d4463356245466a5a54427954323432555864494d6d5a544e6a4d32566a5631616d5a5a574746344e6e643164326c6854474a6c4d54637962465a614b33647962476436655642714f4551785a315a514e31566f555670485458427857444e474f46704d5a54466b4d6e567a566a4e594c7a52584c30706a576b68585933526d555651725447645a4c327433646e52694c316472596a644f62325653616e6776615452756269396f655445355546686d615667765a5778614d3142325354553457554e7953564272624667324d6e49325a444e7852336c734d315257646e5a585a564e57555842725331564d633263725a6d4a526547303356485a7965545a4c5a6e706853477830596d74695431466f55326c4f62585a426448526c656d563059585258646b354e626d4632643045314c3070524e454a565a334d72515774454e7a4e6e53575a4661544670575864424b3342476245557762464a786444465454484e764b314a6b596e59795432784c5232395855314255656d703457544178536d5671527a424752576f7a536b317955444a54636e524f6147343165544e475a6d4e6b633146354f475a5659586779613235715544466c5958457755586b32556a4e74566e70585a6c646c64564e4761326c505957706a63325a4461446c765347397a5447746e4e7a6474576a524e546c643064306b3154325a574e334e76566e41314d305643646b565355576f765933466f63326836625442514d6b466c5545744d5332467059577059526b4e7857475a58557a4e305a474a43595739745355647564433972644739495447563263476c764d564d774e6a5930576e683061456c3153465579654774684d586330656a5a7155305a546332524957544a4265554e4f4c336c695a306f344f45564c4e584d33544864575744525a55554e36597a6779623030315533707364466372575668365a58593464303969636b67785246427a4c307057646b5a5764553533596e4e716447314e536b645a5632646c6154564d53564261614535535932686f5156524a576974494d466c554d6c56325156423155586c465a6c644851574e7151336836536d3575656d52464b7a4278556c6879523277324d4842785744467562556f335331707053484a68566a5669655545316455707853325135536c7076646e6c7951585a76634463796247466e4f48673351585a76634463796247463059316474634535436358527553544976557a5a726554527353584e514e576c4f55486c6e65554a7357455572546c5a304e6d5649536d3573526d39484b30466e5a5768685a6e677a4d546c3163564268566d4e6964585135623278534b7a46694d3273335156424d62554572626b4a434d546454646e426b626c4a3659556f7764304a59576a643651577469615842734e4530315a586c6d64486c78646c56796254426f636e4e5a647a5a6d4e4752554b79744d566d784e5357637751327876544863774e555278566d5a4c4d6a5931516b4d78527a5a5a566d744e516e55774e30633465544633534442764f565678634449795a446843646c51315a3035616544466a513256544f47526b52475a47623159765647646d64473532537a4a4a645746734d45314d56584249626b78485a444e78636a52365931417a636a4d78646a46596357307765475131536c517a4d5735736254527462304e5165693936554556586447354a636b5a444d4846424c334e6d5444593062544133526b4933533067725a564a53634578434c3252484e4463304e7a564a5432645959325233654464424d7a6834645856564e69744356445578616d31715754526d593368734e6e706863314652634670754e6a6c7755336b354d485a70596e6c53536e68774f47744d637a51305646706865566f3165464a774e3035784b304632636b5930576d316d596d746a633255304e565a50596b6c6f4f555a35575752305357773352464d34566a41784d47564852446c4b5179394d6556643259564273565339434c306f7256464e7861576b784e793951656c646f5557673355453559526b34324f555247526b4632564570704f586473554842355747313152326430576a4e5952584172524642584c3352484e30686e544641324c327849526a6478565339435a6e4d784e6e424861446836636a4e59597a52565445705a55316c6c64585a68546a5a324d3235714e6a686852476455547973306233425861486b3253466b76616c64325a553432626b63346432685754456f3462336b7964474d7262326870537a6c764d4846494b7a4a53654664734d6d3476546b6449646b6868546a684d53465a54626e453463454d76656d646e614668326445644f5744644e647a643053455659516b3433563356514e53394363446c514e69745055545534546d786d61326f7a54566776614739495747746b654770315a6e64685a6c526c55316478643052345a6a5259544845325248563656586f7a566c4271526b315357473957654549725554426c54564979567a4254556a517862306c575546646c6257597651564a564d6d395a516a6836516b6870624768586455564a515374585a6e684d646b6378596d783664564a5954577848534552344e6c56705479743156544a764f464d33566e4a32636a425054455572617a6c345269394a576c5a784e444e4c53555677533346774d6e566d5a336c5a65564e71593151345757517a62475a4b5746527455323568566a4d3459315a32536d6472576e457a4c79746d6543393464444a316355466851576c7951315a6f576c426f65467033636c526b4e31684e4f56707263446468624445355548464a526a6842525374425545464355476445643046554e4545345155557251564242516c426e52486442575546514f4546485155517651554a6e5153393351566c425544684252304645643049345a30453451575a4a5156426e51544d76513270425158466c4b306f7a5a4373724f44566e515546425155465456565a50556b733151316c4a5354303d),
(9, 'FERRETERIA', 0x5a474630595470706257466e5a533977626d6337596d467a5a5459304c476c57516b3953647a424c52326476515546425155355456576846565764425155464a5655464251554e475130464a5155464252445a31533368795155464251554e59516b6c585745314251554a6a55304642515668465a305a75626a6c4b553046425155464857464a475630685356474979576a426b4d6b5a35576c4643516c70484f576c6155304a4b596c6447626c7057536d785a5631493159324e7362464242515546435a33424b556b56475657564f636e4d7a566a46784e44465a5655497651584979567a524c533168485756467657556379615646455a314a52625770434c7a5a59626d4e47656c453363566456527a6c6f534646494e32647662584d30536a5a576245464f4f5568485a30527a4d55524a5a4549305632746f6347394e52584648516b707a563151794d6d687157545248566e4d324f5374714e6c4e325a4339745357513155307453535641354d335a4d4d4338355a45747a555446765531425764304651516b52365a32645a51556851516b52335a30466a51306832516b46335155314352444e6e5a7a5242525642435248706e5a316c42534642435248645254555245633346706454684f4e303472646a6c6d55533834625464304c3063345245527563324a32625568594d334e4f4f566b354b335a6b637a4e59646e64614f54646c65485977596b5a6d6433704459306b3051304e6a54325675614456364e7a687061485261616e5933574777334e6e6731625667306547704756444d334f47354b4d574e5263473143647a6c5454307730637a68764d31633363455978543274334e32783452304a425456426162586858566c646c646e46704f4868774f557372615556785a6c5a3156484a574e5645784f5749764e4646435955526e6233466a534455355630387a64565a3655334a54654374785533685a54557077574655724e326378616d5644656b4a44536a64584d32786b6547746e4d484532623231465532353261315a334f4568575630644f57565a45565573726355686e4d6e42796554526d53486435626d706154446c78524539504c32564d526d5a526145706d5344684f61336c796146417762477053636c4d7a4d566446626b7431516e5a4357574578545535544e4852714c316f794e575630534573344e48687851337077534852555a7a68684e7a5669593031365a6b5a754d7a5a4e6448637a5956423663455a4c4d7a5670574646734d55645057456c3263444268656a644c4f4374774e57354c644451774f484933626e425a4b3142455a6d4a735a444978656e64595547467053314e5762544a6f555339555a5856354e7a5a4453466c44616e4e6b6548453552484e614e6d3946616c465163545a36554656455a58706c626d737855446c44565770434e6a4a30656b3151567a6b79546d356b62455a4464444a3262475a7452473977536d4e774d58424763566449646e70686144465163445269655756715a6c526e5a575248636a4e535a444d355255397a4c31517a5132677952574e4d647a684955314e535a6b357a644564455a58647451334e7162697451626e417255444a695a5763355430645a654452695546526f6258526b517974686332704a4d6b4e58566c706f567a5a4a576b67324e57705a4f4451325530394e4d553548646d3876555339556556527a5933493265446479646d6c52576a686c636939445a334e745231453457585232574452354e5568774e484a49645868514e797454646e70495632557a616b4572576c457a53335677566d5a4e56306b32655451774d546b3151544e744d6c4e3651573872526a42694c32677661557079595534726144687a546e645052476c714d544a765546687a617a687052306f30544546774d6a563554335a324e324a525654645065575652656b643652575a73546c703154444e30616b387a575641354e6d4a564c336c57656e4268567a4234547a687659314e6f4f556f31576c6459576c64594e6a4a4c5a4652554e5468334d6e68494f556331597a67795269396d553170684e5656304d6b5248636e4e594d6d457a4d455659517a64735a576f35516d396c4d5842545531564e636e466d566a6c73566d64475a6c6834576a645662546c7352466f3355306854534456314d554a6954554a6852586c764f5756764e6d4e3556554e4e536d6c4f4d5773304f446c3263477858626b395456587058623264596145704862554a464d446c36575446795154644861464254546d673354586c774d457331544770525669393461544d77596b38724d57566f4d306836596b5a55627a6c4e53457048596e4a59613370446554685852545a6d4d4746784e4531496545644a655734306547307955464673566e684664586452623252615933424c53474a566257746d55306734516a4648634670794e6b526e53473076576b394c516c5a54563068695430704a4d584a58575667305632784e57693832545770784d584231566b5a794d446c335631424564556c70554552784e304d774e3352524e6b677864564e68656a4a695446644256556c696253383063334e72615752616447567a547a51765a485a5a61326c52615646325379733157475a4855307855574845784d553532636d5674636e4657536e4e755a335277516d74545a314a305558686c5957784f576e564d6330567555307846647a4652513070365a464e7753554e724d6c4e6d63465a334d326c536157783557564e755747307a53336c55536e5674555464576545784b4e6a464b576a683057466f72537a426b4d31687263464e59616e49314e47747263445a68615468465630526a546b7876616c4e36536e553159564e7a52474e3662306c615746527163793935553035554d44557a655578726232396e5a33566d4e6b5a4d554664584d6d52435531453252303079656a425451325a325247356d4c325a7859546c6c6245396d56473833545577794e6d35755558557a4e6a4a726258553159574d345a3170344e7a4d76516e557a52565642596a4a554d48646c4c335670556c523462485572623055765757646f62566857536e706e4d484e70536b394a57546c475a4570455a48413361484d34564652325756677a5a6a4e524d6a457a656a64724e544d324f433974574530354d6d5a574d486c71566e4655576b5a7953576c5853324d335253737a5755745163315a48553068534e69744a4e587032636d744455305a70615868484f473434556b56784b3263314d6a4a3655314a70556b4a72543074775332645554576c744c324a324e486c4e64454d33626b49315248424c62466b3051573135516d746e65566c5a6156464753485a44593345306130524265446c726330705153553072536d684a4d6d6854566b74485132597a6155704b62316c50615646735631644261464e4453304e3355316c77656a524a57455653536b4a4552575a4d5244424655324e526545646a4e6c4a7a517a684d52586c3453315248533346564e54426c65464e6c4e544e3661485a48565564564f586f776455563452486c48533230334c315a61636c453257466c7256575a4e5755706d5a464661636e4e6b62474e324f576c55576a42785357687153304a6d54326436556b524a616c566c4e574e5252304e4962565254523056765a4467315448705a4f555646525530315a4667316445687055336c48545845784f44525362464e6a5558687353564275547a4231556a564a5232677a52486832567a553461307033656d77335547357554326c554e566c54615668364e6c427561325654537a52695555686e65564a325245356a4f55317752566c3353554a495632684a656b6451516b6c5356306c4e5158673354464e5665476c335230314b615664465457564464326c4e5753746f55326f344b336c4a644774345a454a4c5a485250513267784d6b49765157396c51306871515546335256426c5130526e515645345256425051304a6e51574e4453485a4351586442545756445347704251586446554756445247646e57554e49596d5a48646b4642545546534b323136595539336155686b56554642515546425531565754314a4c4e554e5a53556b39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tdoc`
--

CREATE TABLE IF NOT EXISTS `rmb_tdoc` (
`rmb_tdoc_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tdoc_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Esta Tabla Almacena los tipos de documento de los residentes';

--
-- Truncar tablas antes de insertar `rmb_tdoc`
--

TRUNCATE TABLE `rmb_tdoc`;
--
-- Volcado de datos para la tabla `rmb_tdoc`
--

INSERT INTO `rmb_tdoc` (`rmb_tdoc_id`, `rmb_tdoc_nom`) VALUES
(1, 'CÃ©dula de ciudadanÃ­a'),
(2, 'Tarjeta de Identidad'),
(3, 'Registro Civil'),
(4, 'Pasaporte'),
(5, 'CÃ©dula de extranjerÃ­a'),
(6, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_temp`
--

CREATE TABLE IF NOT EXISTS `rmb_temp` (
`rmb_temp_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_temp_nom` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de empresas que ingresan al edificio.';

--
-- Truncar tablas antes de insertar `rmb_temp`
--

TRUNCATE TABLE `rmb_temp`;
--
-- Volcado de datos para la tabla `rmb_temp`
--

INSERT INTO `rmb_temp` (`rmb_temp_id`, `rmb_temp_nom`) VALUES
(1, 'Servicios PÃºblicos'),
(2, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_teq`
--

CREATE TABLE IF NOT EXISTS `rmb_teq` (
`rmb_teq_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_teq_nom` varchar(50) NOT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de equipos instalados en el edificio.';

--
-- Truncar tablas antes de insertar `rmb_teq`
--

TRUNCATE TABLE `rmb_teq`;
--
-- Volcado de datos para la tabla `rmb_teq`
--

INSERT INTO `rmb_teq` (`rmb_teq_id`, `rmb_teq_nom`) VALUES
(1, 'Ascensor'),
(2, 'Maquinaria'),
(3, 'Planta Eléctrica'),
(4, 'Equipos / Cámaras'),
(5, 'Implementos de Oficina'),
(6, 'Comunicaciones'),
(7, 'Juegos Infantiles'),
(8, 'Herramientas'),
(9, 'Seguridad'),
(10, 'Aseo'),
(11, 'Mobiliario'),
(12, 'Carro Mercado'),
(13, 'BBQ'),
(14, 'Otros'),
(15, 'Objetos Deportivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tesoreria`
--

CREATE TABLE IF NOT EXISTS `rmb_tesoreria` (
`rmb_tesoreria_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tesoreria_fpag` date DEFAULT NULL COMMENT 'Fecha de pago oportuno',
  `rmb_tesoreria_fven` date DEFAULT NULL COMMENT 'Fecha limite de pago',
  `rmb_tesoreria_obs` blob COMMENT 'Observación',
  `rmb_tesoreria_val` int(8) DEFAULT NULL COMMENT 'Valor Total',
  `rmb_aptos_id` int(8) DEFAULT NULL COMMENT 'Apartamento',
  `rmb_est_id` int(8) DEFAULT NULL COMMENT 'Estado de la factura',
  `rmb_tesoreria_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de ingreso',
  `rmb_tesoreria_user` int(11) NOT NULL COMMENT 'Usuario que hace el ingreso'
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los pagos pendientes o por realizar de cada apartamento.';

--
-- Truncar tablas antes de insertar `rmb_tesoreria`
--

TRUNCATE TABLE `rmb_tesoreria`;
--
-- Volcado de datos para la tabla `rmb_tesoreria`
--

INSERT INTO `rmb_tesoreria` (`rmb_tesoreria_id`, `rmb_tesoreria_fpag`, `rmb_tesoreria_fven`, `rmb_tesoreria_obs`, `rmb_tesoreria_val`, `rmb_aptos_id`, `rmb_est_id`, `rmb_tesoreria_fecha`, `rmb_tesoreria_user`) VALUES
(1, '2014-07-02', '2014-07-12', 0x5061676f2041646d696e69737472616369c3b36e2c204173656f207920566967696c616e6369612064656c206d6573206465204a756c696f2e, -178000, 3, 18, '2014-07-02 21:49:08', 1),
(2, '2014-08-01', '2014-08-10', 0x5061676f2064652041646d696e69737472616369c3b36e2c204173656f207920566967696c616e636961206d65732064652041676f73746f, 226000, 3, 19, '2014-07-02 21:56:46', 1),
(3, '2015-03-16', '2015-03-26', 0x7365727461776561207765722061772065722061736466, 250000, 3, 20, '2015-03-16 15:44:36', 1),
(4, '2014-09-01', '2014-09-10', NULL, 25000, 3, 17, '2015-03-16 15:44:36', 1),
(5, '2015-11-01', '2015-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(6, '2015-10-01', '2015-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(7, '2015-09-01', '2015-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(8, '2015-08-01', '2015-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(9, '2015-07-01', '2015-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(10, '2015-06-01', '2015-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(11, '2015-05-01', '2015-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(12, '2015-04-01', '2015-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(13, '2015-03-01', '2015-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(14, '2015-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(15, '2015-01-01', '2015-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 1, NULL, '2015-11-10 20:25:26', 1),
(16, '2014-12-01', '2014-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(17, '2014-11-01', '2014-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(18, '2014-10-01', '2014-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(19, '2014-09-01', '2014-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(20, '2014-08-01', '2014-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(21, '2014-07-01', '2014-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(22, '2014-06-01', '2014-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(23, '2014-05-01', '2014-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(24, '2014-04-01', '2014-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(25, '2014-03-01', '2014-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(26, '2014-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(27, '2014-01-01', '2014-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 1, NULL, '2015-11-10 20:25:32', 1),
(28, '2015-11-01', '2015-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(29, '2015-10-01', '2015-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(30, '2015-09-01', '2015-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(31, '2015-08-01', '2015-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(32, '2015-07-01', '2015-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(33, '2015-06-01', '2015-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(34, '2015-05-01', '2015-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(35, '2015-04-01', '2015-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(36, '2015-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(37, '2015-01-01', '2015-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:25:52', 1),
(38, '2014-12-01', '2014-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(39, '2014-11-01', '2014-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(40, '2014-10-01', '2014-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(41, '2014-06-01', '2014-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(42, '2014-05-01', '2014-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(43, '2014-04-01', '2014-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(44, '2014-03-01', '2014-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(45, '2014-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(46, '2014-01-01', '2014-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:25:58', 1),
(47, '2013-12-01', '2013-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:49', 1),
(48, '2013-11-01', '2013-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(49, '2013-10-01', '2013-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(50, '2013-09-01', '2013-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(51, '2013-08-01', '2013-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(52, '2013-07-01', '2013-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(53, '2013-06-01', '2013-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(54, '2013-05-01', '2013-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(55, '2013-04-01', '2013-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(56, '2013-03-01', '2013-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(57, '2013-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(58, '2013-01-01', '2013-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:50', 1),
(59, '2012-12-01', '2012-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(60, '2012-11-01', '2012-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(61, '2012-10-01', '2012-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(62, '2012-09-01', '2012-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(63, '2012-08-01', '2012-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(64, '2012-07-01', '2012-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(65, '2012-06-01', '2012-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(66, '2012-05-01', '2012-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(67, '2012-04-01', '2012-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(68, '2012-03-01', '2012-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(69, '2012-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(70, '2012-01-01', '2012-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:51', 1),
(71, '2011-12-01', '2011-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(72, '2011-11-01', '2011-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(73, '2011-10-01', '2011-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(74, '2011-09-01', '2011-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(75, '2011-08-01', '2011-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(76, '2011-07-01', '2011-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(77, '2011-06-01', '2011-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(78, '2011-05-01', '2011-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(79, '2011-04-01', '2011-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(80, '2011-03-01', '2011-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(81, '2011-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(82, '2011-01-01', '2011-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(83, '2010-12-01', '2010-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(84, '2010-11-01', '2010-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(85, '2010-10-01', '2010-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(86, '2010-09-01', '2010-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(87, '2010-08-01', '2010-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(88, '2010-07-01', '2010-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(89, '2010-06-01', '2010-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(90, '2010-05-01', '2010-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(91, '2010-04-01', '2010-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(92, '2010-03-01', '2010-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(93, '2010-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(94, '2010-01-01', '2010-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:52', 1),
(95, '2009-12-01', '2009-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(96, '2009-11-01', '2009-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(97, '2009-10-01', '2009-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(98, '2009-09-01', '2009-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(99, '2009-08-01', '2009-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(100, '2009-07-01', '2009-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(101, '2009-06-01', '2009-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(102, '2009-05-01', '2009-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(103, '2009-04-01', '2009-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(104, '2009-03-01', '2009-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(105, '2009-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(106, '2009-01-01', '2009-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(107, '2008-12-01', '2008-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(108, '2008-11-01', '2008-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(109, '2008-10-01', '2008-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(110, '2008-09-01', '2008-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(111, '2008-08-01', '2008-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(112, '2008-07-01', '2008-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(113, '2008-06-01', '2008-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(114, '2008-05-01', '2008-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(115, '2008-04-01', '2008-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(116, '2008-03-01', '2008-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(117, '2008-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(118, '2008-01-01', '2008-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:54', 1),
(119, '2007-12-01', '2007-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(120, '2007-11-01', '2007-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(121, '2007-10-01', '2007-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(122, '2007-09-01', '2007-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(123, '2007-08-01', '2007-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(124, '2007-07-01', '2007-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(125, '2007-06-01', '2007-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(126, '2007-05-01', '2007-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(127, '2007-04-01', '2007-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(128, '2007-03-01', '2007-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(129, '2007-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(130, '2007-01-01', '2007-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(131, '2006-12-01', '2006-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(132, '2006-11-01', '2006-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(133, '2006-10-01', '2006-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(134, '2006-09-01', '2006-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(135, '2006-08-01', '2006-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(136, '2006-07-01', '2006-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(137, '2006-06-01', '2006-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(138, '2006-05-01', '2006-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(139, '2006-04-01', '2006-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(140, '2006-03-01', '2006-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(141, '2006-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(142, '2006-01-01', '2006-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:55', 1),
(143, '2005-12-01', '2005-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(144, '2005-11-01', '2005-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(145, '2005-10-01', '2005-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(146, '2005-09-01', '2005-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(147, '2005-08-01', '2005-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(148, '2005-07-01', '2005-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(149, '2005-06-01', '2005-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(150, '2005-05-01', '2005-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(151, '2005-04-01', '2005-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(152, '2005-03-01', '2005-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(153, '2005-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(154, '2005-01-01', '2005-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:56', 1),
(155, '2004-12-01', '2004-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(156, '2004-11-01', '2004-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(157, '2004-10-01', '2004-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(158, '2004-09-01', '2004-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(159, '2004-08-01', '2004-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(160, '2004-07-01', '2004-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(161, '2004-06-01', '2004-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(162, '2004-05-01', '2004-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(163, '2004-04-01', '2004-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(164, '2004-03-01', '2004-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(165, '2004-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(166, '2004-01-01', '2004-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(167, '2003-12-01', '2003-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(168, '2003-11-01', '2003-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(169, '2003-10-01', '2003-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(170, '2003-09-01', '2003-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(171, '2003-08-01', '2003-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(172, '2003-07-01', '2003-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(173, '2003-06-01', '2003-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(174, '2003-05-01', '2003-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(175, '2003-04-01', '2003-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(176, '2003-03-01', '2003-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(177, '2003-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(178, '2003-01-01', '2003-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:57', 1),
(179, '2002-12-01', '2002-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(180, '2002-11-01', '2002-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(181, '2002-10-01', '2002-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(182, '2002-09-01', '2002-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(183, '2002-08-01', '2002-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(184, '2002-07-01', '2002-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(185, '2002-06-01', '2002-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(186, '2002-05-01', '2002-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(187, '2002-04-01', '2002-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(188, '2002-03-01', '2002-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(189, '2002-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(190, '2002-01-01', '2002-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:58', 1),
(191, '2001-12-01', '2001-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(192, '2001-11-01', '2001-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(193, '2001-10-01', '2001-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(194, '2001-09-01', '2001-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(195, '2001-08-01', '2001-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(196, '2001-07-01', '2001-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(197, '2001-06-01', '2001-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(198, '2001-05-01', '2001-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(199, '2001-04-01', '2001-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(200, '2001-03-01', '2001-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(201, '2001-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(202, '2001-01-01', '2001-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:36:59', 1),
(203, '2000-12-01', '2000-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(204, '2000-11-01', '2000-11-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204e6f7669656d627265, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(205, '2000-10-01', '2000-10-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204f637475627265, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(206, '2000-09-01', '2000-09-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465205365707469656d627265, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(207, '2000-08-01', '2000-08-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652041676f73746f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(208, '2000-07-01', '2000-07-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756c696f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(209, '2000-06-01', '2000-06-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204a756e696f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(210, '2000-05-01', '2000-05-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61796f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(211, '2000-04-01', '2000-04-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520416272696c, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(212, '2000-03-01', '2000-03-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204d61727a6f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(213, '2000-02-01', '0000-00-00', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d6573206465204665627265726f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(214, '2000-01-01', '2000-01-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520456e65726f, 200000, 3, NULL, '2015-11-10 20:37:01', 1),
(215, '2015-00-01', '2015-00-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d657320646520, 200000, 1, NULL, '2015-11-12 13:43:45', 1),
(216, '2015-12-01', '2015-12-30', 0x5061676f2064652061646d696e69737472616369c3b36e2064656c206d65732064652044696369656d627265, 200000, 1, NULL, '2015-12-09 20:35:05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tes_concep`
--

CREATE TABLE IF NOT EXISTS `rmb_tes_concep` (
`rmb_tes_concep_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tesoreria_id` int(8) NOT NULL COMMENT 'Factura',
  `rmb_tpago_id` int(8) NOT NULL COMMENT 'Tipo de Pago',
  `rmb_tes_concep_cant` int(2) DEFAULT '1' COMMENT 'Cantidad',
  `rmb_tes_concep_val` int(10) NOT NULL DEFAULT '0' COMMENT 'Valor Concepto'
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los valores pagados en cada concepto de una factura.';

--
-- Truncar tablas antes de insertar `rmb_tes_concep`
--

TRUNCATE TABLE `rmb_tes_concep`;
--
-- Volcado de datos para la tabla `rmb_tes_concep`
--

INSERT INTO `rmb_tes_concep` (`rmb_tes_concep_id`, `rmb_tesoreria_id`, `rmb_tpago_id`, `rmb_tes_concep_cant`, `rmb_tes_concep_val`) VALUES
(18, 1, 5, 1, 5000),
(17, 1, 1, 1, 125000),
(16, 1, 2, 1, 35000),
(9, 2, 3, 1, 45000),
(8, 2, 2, 1, 36000),
(7, 2, 1, 1, 125000),
(10, 2, 9, 1, 20000),
(15, 1, 3, 1, 23000),
(19, 3, 10, 1, 1),
(20, 3, 4, 1, 2),
(21, 3, 5, 1, 1),
(22, 6, 1, 1, 200000),
(23, 7, 1, 1, 200000),
(24, 8, 1, 1, 200000),
(25, 9, 1, 1, 200000),
(26, 10, 1, 1, 200000),
(27, 11, 1, 1, 200000),
(28, 12, 1, 1, 200000),
(29, 13, 1, 1, 200000),
(30, 14, 1, 1, 200000),
(31, 15, 1, 1, 200000),
(32, 16, 1, 1, 200000),
(33, 17, 1, 1, 200000),
(34, 18, 1, 1, 200000),
(35, 19, 1, 1, 200000),
(36, 20, 1, 1, 200000),
(37, 21, 1, 1, 200000),
(38, 22, 1, 1, 200000),
(39, 23, 1, 1, 200000),
(40, 24, 1, 1, 200000),
(41, 25, 1, 1, 200000),
(42, 26, 1, 1, 200000),
(43, 27, 1, 1, 200000),
(44, 28, 1, 1, 200000),
(45, 29, 1, 1, 200000),
(46, 30, 1, 1, 200000),
(47, 31, 1, 1, 200000),
(48, 32, 1, 1, 200000),
(49, 33, 1, 1, 200000),
(50, 34, 1, 1, 200000),
(51, 35, 1, 1, 200000),
(52, 36, 1, 1, 200000),
(53, 37, 1, 1, 200000),
(54, 38, 1, 1, 200000),
(55, 39, 1, 1, 200000),
(56, 40, 1, 1, 200000),
(57, 41, 1, 1, 200000),
(58, 42, 1, 1, 200000),
(59, 43, 1, 1, 200000),
(60, 44, 1, 1, 200000),
(61, 45, 1, 1, 200000),
(62, 46, 1, 1, 200000),
(63, 47, 1, 1, 200000),
(64, 47, 1, 1, 200000),
(65, 48, 1, 1, 200000),
(66, 49, 1, 1, 200000),
(67, 50, 1, 1, 200000),
(68, 51, 1, 1, 200000),
(69, 52, 1, 1, 200000),
(70, 53, 1, 1, 200000),
(71, 54, 1, 1, 200000),
(72, 55, 1, 1, 200000),
(73, 56, 1, 1, 200000),
(74, 57, 1, 1, 200000),
(75, 58, 1, 1, 200000),
(76, 59, 1, 1, 200000),
(77, 60, 1, 1, 200000),
(78, 61, 1, 1, 200000),
(79, 62, 1, 1, 200000),
(80, 63, 1, 1, 200000),
(81, 64, 1, 1, 200000),
(82, 65, 1, 1, 200000),
(83, 66, 1, 1, 200000),
(84, 67, 1, 1, 200000),
(85, 68, 1, 1, 200000),
(86, 69, 1, 1, 200000),
(87, 70, 1, 1, 200000),
(88, 71, 1, 1, 200000),
(89, 72, 1, 1, 200000),
(90, 73, 1, 1, 200000),
(91, 74, 1, 1, 200000),
(92, 75, 1, 1, 200000),
(93, 76, 1, 1, 200000),
(94, 77, 1, 1, 200000),
(95, 78, 1, 1, 200000),
(96, 79, 1, 1, 200000),
(97, 80, 1, 1, 200000),
(98, 81, 1, 1, 200000),
(99, 82, 1, 1, 200000),
(100, 83, 1, 1, 200000),
(101, 84, 1, 1, 200000),
(102, 85, 1, 1, 200000),
(103, 86, 1, 1, 200000),
(104, 87, 1, 1, 200000),
(105, 88, 1, 1, 200000),
(106, 89, 1, 1, 200000),
(107, 90, 1, 1, 200000),
(108, 91, 1, 1, 200000),
(109, 92, 1, 1, 200000),
(110, 93, 1, 1, 200000),
(111, 94, 1, 1, 200000),
(112, 95, 1, 1, 200000),
(113, 96, 1, 1, 200000),
(114, 97, 1, 1, 200000),
(115, 98, 1, 1, 200000),
(116, 99, 1, 1, 200000),
(117, 100, 1, 1, 200000),
(118, 101, 1, 1, 200000),
(119, 102, 1, 1, 200000),
(120, 103, 1, 1, 200000),
(121, 104, 1, 1, 200000),
(122, 105, 1, 1, 200000),
(123, 106, 1, 1, 200000),
(124, 107, 1, 1, 200000),
(125, 108, 1, 1, 200000),
(126, 109, 1, 1, 200000),
(127, 110, 1, 1, 200000),
(128, 111, 1, 1, 200000),
(129, 112, 1, 1, 200000),
(130, 113, 1, 1, 200000),
(131, 114, 1, 1, 200000),
(132, 115, 1, 1, 200000),
(133, 116, 1, 1, 200000),
(134, 117, 1, 1, 200000),
(135, 118, 1, 1, 200000),
(136, 119, 1, 1, 200000),
(137, 120, 1, 1, 200000),
(138, 121, 1, 1, 200000),
(139, 122, 1, 1, 200000),
(140, 123, 1, 1, 200000),
(141, 124, 1, 1, 200000),
(142, 125, 1, 1, 200000),
(143, 126, 1, 1, 200000),
(144, 127, 1, 1, 200000),
(145, 128, 1, 1, 200000),
(146, 129, 1, 1, 200000),
(147, 130, 1, 1, 200000),
(148, 131, 1, 1, 200000),
(149, 132, 1, 1, 200000),
(150, 133, 1, 1, 200000),
(151, 134, 1, 1, 200000),
(152, 135, 1, 1, 200000),
(153, 136, 1, 1, 200000),
(154, 137, 1, 1, 200000),
(155, 138, 1, 1, 200000),
(156, 139, 1, 1, 200000),
(157, 140, 1, 1, 200000),
(158, 141, 1, 1, 200000),
(159, 142, 1, 1, 200000),
(160, 143, 1, 1, 200000),
(161, 144, 1, 1, 200000),
(162, 145, 1, 1, 200000),
(163, 146, 1, 1, 200000),
(164, 147, 1, 1, 200000),
(165, 148, 1, 1, 200000),
(166, 149, 1, 1, 200000),
(167, 150, 1, 1, 200000),
(168, 151, 1, 1, 200000),
(169, 152, 1, 1, 200000),
(170, 153, 1, 1, 200000),
(171, 154, 1, 1, 200000),
(172, 155, 1, 1, 200000),
(173, 156, 1, 1, 200000),
(174, 157, 1, 1, 200000),
(175, 158, 1, 1, 200000),
(176, 159, 1, 1, 200000),
(177, 160, 1, 1, 200000),
(178, 161, 1, 1, 200000),
(179, 162, 1, 1, 200000),
(180, 163, 1, 1, 200000),
(181, 164, 1, 1, 200000),
(182, 165, 1, 1, 200000),
(183, 166, 1, 1, 200000),
(184, 167, 1, 1, 200000),
(185, 168, 1, 1, 200000),
(186, 169, 1, 1, 200000),
(187, 170, 1, 1, 200000),
(188, 171, 1, 1, 200000),
(189, 172, 1, 1, 200000),
(190, 173, 1, 1, 200000),
(191, 174, 1, 1, 200000),
(192, 175, 1, 1, 200000),
(193, 176, 1, 1, 200000),
(194, 177, 1, 1, 200000),
(195, 178, 1, 1, 200000),
(196, 179, 1, 1, 200000),
(197, 180, 1, 1, 200000),
(198, 181, 1, 1, 200000),
(199, 182, 1, 1, 200000),
(200, 183, 1, 1, 200000),
(201, 184, 1, 1, 200000),
(202, 185, 1, 1, 200000),
(203, 186, 1, 1, 200000),
(204, 187, 1, 1, 200000),
(205, 188, 1, 1, 200000),
(206, 189, 1, 1, 200000),
(207, 190, 1, 1, 200000),
(208, 191, 1, 1, 200000),
(209, 192, 1, 1, 200000),
(210, 193, 1, 1, 200000),
(211, 194, 1, 1, 200000),
(212, 195, 1, 1, 200000),
(213, 196, 1, 1, 200000),
(214, 197, 1, 1, 200000),
(215, 198, 1, 1, 200000),
(216, 199, 1, 1, 200000),
(217, 200, 1, 1, 200000),
(218, 201, 1, 1, 200000),
(219, 202, 1, 1, 200000),
(220, 203, 1, 1, 200000),
(221, 204, 1, 1, 200000),
(222, 205, 1, 1, 200000),
(223, 206, 1, 1, 200000),
(224, 207, 1, 1, 200000),
(225, 208, 1, 1, 200000),
(226, 209, 1, 1, 200000),
(227, 210, 1, 1, 200000),
(228, 211, 1, 1, 200000),
(229, 212, 1, 1, 200000),
(230, 213, 1, 1, 200000),
(231, 214, 1, 1, 200000),
(232, 5, 1, 1, 200000),
(233, 215, 1, 1, 200000),
(234, 216, 1, 1, 200000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tmascotas`
--

CREATE TABLE IF NOT EXISTS `rmb_tmascotas` (
`rmb_tmascotas_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla',
  `rmb_tmascotas_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre del tipo de mascota.'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de mascota.';

--
-- Truncar tablas antes de insertar `rmb_tmascotas`
--

TRUNCATE TABLE `rmb_tmascotas`;
--
-- Volcado de datos para la tabla `rmb_tmascotas`
--

INSERT INTO `rmb_tmascotas` (`rmb_tmascotas_id`, `rmb_tmascotas_nom`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Ave'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_torres`
--

CREATE TABLE IF NOT EXISTS `rmb_torres` (
`rmb_torres_id` int(8) NOT NULL COMMENT 'id',
  `rmb_torres_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_proyecto_id` int(8) NOT NULL COMMENT 'Proyecto',
  `rmb_torres_nasc` int(8) DEFAULT NULL COMMENT '# Ascensores.',
  `rmb_torres_nparqr` int(8) DEFAULT NULL COMMENT '# Parqueaderos Privados',
  `rmb_torres_nparqv` int(8) DEFAULT NULL COMMENT '# Parqueaderos Visitantes',
  `rmb_torres_fecha` datetime DEFAULT NULL COMMENT 'Fecha registro.',
  `rmb_torres_user` int(8) DEFAULT NULL COMMENT 'Usuario registro.'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las torres, interiores, manzanas, bloques en que este dividido un proyecto.';

--
-- Truncar tablas antes de insertar `rmb_torres`
--

TRUNCATE TABLE `rmb_torres`;
--
-- Volcado de datos para la tabla `rmb_torres`
--

INSERT INTO `rmb_torres` (`rmb_torres_id`, `rmb_torres_nom`, `rmb_proyecto_id`, `rmb_torres_nasc`, `rmb_torres_nparqr`, `rmb_torres_nparqv`, `rmb_torres_fecha`, `rmb_torres_user`) VALUES
(1, 'Torre 1', 1, 1, 92, 7, '2015-09-02 00:00:00', 1),
(2, 'Torre 2', 1, 1, 92, 6, '2015-09-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tpago`
--

CREATE TABLE IF NOT EXISTS `rmb_tpago` (
`rmb_tpago_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tpago_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `rmb_tpago_ope` int(1) NOT NULL DEFAULT '1' COMMENT 'Operación a realizar'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de pago a realizar (conceptos).';

--
-- Truncar tablas antes de insertar `rmb_tpago`
--

TRUNCATE TABLE `rmb_tpago`;
--
-- Volcado de datos para la tabla `rmb_tpago`
--

INSERT INTO `rmb_tpago` (`rmb_tpago_id`, `rmb_tpago_nom`, `rmb_tpago_ope`) VALUES
(1, 'Servicio de AdministraciÃ³n', 1),
(2, 'Servicio de Aseo', 1),
(3, 'Servicio de Vigilancia', 1),
(4, 'Caja menor', 1),
(5, 'Descuento por miembro consejo', 2),
(6, 'Descuento por pronto pago', 2),
(7, 'Otros Descuentos', 2),
(8, 'Intereses por mora', 1),
(9, 'Otros Intereses', 1),
(10, 'Alquiler zonas comunes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tproyecto`
--

CREATE TABLE IF NOT EXISTS `rmb_tproyecto` (
`rmb_tproyecto_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tproyecto_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tipos de proyecto, casas, apartamentos, fincas, otros';

--
-- Truncar tablas antes de insertar `rmb_tproyecto`
--

TRUNCATE TABLE `rmb_tproyecto`;
--
-- Volcado de datos para la tabla `rmb_tproyecto`
--

INSERT INTO `rmb_tproyecto` (`rmb_tproyecto_id`, `rmb_tproyecto_nom`) VALUES
(1, 'Apartamentos'),
(2, 'Casas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tres`
--

CREATE TABLE IF NOT EXISTS `rmb_tres` (
`rmb_tres_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tres_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de residentes (Inmobiliaria, Banco, habitante, arrendatario, escaso de emergencia, personal, personas autorizadas).';

--
-- Truncar tablas antes de insertar `rmb_tres`
--

TRUNCATE TABLE `rmb_tres`;
--
-- Volcado de datos para la tabla `rmb_tres`
--

INSERT INTO `rmb_tres` (`rmb_tres_id`, `rmb_tres_nom`) VALUES
(1, 'Propietario'),
(2, 'Residente'),
(3, 'Arrendatario'),
(4, 'Visitante'),
(5, 'Empleado'),
(6, 'Banco'),
(7, 'Persona Autorizada'),
(8, 'Inmobiliaria'),
(9, 'Emergencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tveh`
--

CREATE TABLE IF NOT EXISTS `rmb_tveh` (
`rmb_tveh_id` int(8) NOT NULL COMMENT 'ID',
  `rmb_tveh_nom` varchar(50) DEFAULT NULL COMMENT 'Nombre'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipo de vehículos a registrar en la aplicación.';

--
-- Truncar tablas antes de insertar `rmb_tveh`
--

TRUNCATE TABLE `rmb_tveh`;
--
-- Volcado de datos para la tabla `rmb_tveh`
--

INSERT INTO `rmb_tveh` (`rmb_tveh_id`, `rmb_tveh_nom`) VALUES
(1, 'AutomÃ³vil'),
(2, 'Moto'),
(3, 'Bicicleta'),
(4, 'Cuatrimoto'),
(5, 'Camioneta'),
(6, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_tvulnera`
--

CREATE TABLE IF NOT EXISTS `rmb_tvulnera` (
`rmb_tvulnera_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_tvulnera_nom` varchar(100) DEFAULT NULL COMMENT 'Nombre del tipo de vulnerabilidad.',
  `rmb_cvulnera_id` int(8) DEFAULT NULL COMMENT 'Categoria de la vulnerabilidad.'
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de vulnerabilidad que se pueden presentar en un apartamento.';

--
-- Truncar tablas antes de insertar `rmb_tvulnera`
--

TRUNCATE TABLE `rmb_tvulnera`;
--
-- Volcado de datos para la tabla `rmb_tvulnera`
--

INSERT INTO `rmb_tvulnera` (`rmb_tvulnera_id`, `rmb_tvulnera_nom`, `rmb_cvulnera_id`) VALUES
(1, 'Inundación', 1),
(2, 'Deterioro', 1),
(3, 'Incendio', 1),
(4, 'Niños', 5),
(5, 'Incapacidad', 2),
(6, 'Embarazo', 2),
(7, 'Adulto mayor solo', 3),
(8, 'Robo', 4),
(9, 'Obra', 1),
(10, 'Gas', 4),
(11, 'Otro', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_veh`
--

CREATE TABLE IF NOT EXISTS `rmb_veh` (
`rmb_veh_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_veh_placa` varchar(10) DEFAULT NULL COMMENT 'Placa del vehículo.',
  `rmb_veh_marca` varchar(50) DEFAULT NULL COMMENT 'Marca del vehículo.',
  `rmb_veh_mod` varchar(45) DEFAULT NULL COMMENT 'Modelo del vehículo.',
  `rmb_veh_color` varchar(45) DEFAULT NULL COMMENT 'Color del vehículo.',
  `rmb_veh_obs` blob COMMENT 'Observaciones a tener en cuenta del vehículo.',
  `rmb_tveh_id` int(8) NOT NULL COMMENT 'Tipo de vehículo.',
  `rmb_parq_id` int(8) DEFAULT NULL COMMENT 'Id del parqueadero asignado.',
  `rmb_aptos_id` int(8) DEFAULT NULL COMMENT 'Id del apartamento al que esta relacionado.',
  `rmb_veh_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de Ingreso',
  `rmb_veh_user` int(8) NOT NULL COMMENT 'Usuario que ingresa'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='tabla que registra los vehículos de cada apartamento.';

--
-- Truncar tablas antes de insertar `rmb_veh`
--

TRUNCATE TABLE `rmb_veh`;
--
-- Volcado de datos para la tabla `rmb_veh`
--

INSERT INTO `rmb_veh` (`rmb_veh_id`, `rmb_veh_placa`, `rmb_veh_marca`, `rmb_veh_mod`, `rmb_veh_color`, `rmb_veh_obs`, `rmb_tveh_id`, `rmb_parq_id`, `rmb_aptos_id`, `rmb_veh_fecha`, `rmb_veh_user`) VALUES
(1, 'BYL43', 'Auteco', '2007', 'Azul', 0x50727565626120646520696e677265736f206465207661686963756c6f2e, 2, 1, 1, '2015-09-23 20:22:26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_veh_x_aptos`
--

CREATE TABLE IF NOT EXISTS `rmb_veh_x_aptos` (
  `rmb_veh_id` int(8) NOT NULL,
  `rmb_aptos_id` int(8) NOT NULL,
  `rmb_tres` int(8) DEFAULT NULL,
  `rmb_veh_x_aptos_fini` datetime DEFAULT NULL,
  `rmb_veh_x_aptos_ffin` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_veh_x_aptos`
--

TRUNCATE TABLE `rmb_veh_x_aptos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_vinculo`
--

CREATE TABLE IF NOT EXISTS `rmb_vinculo` (
`rmb_vinculo_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_vinculo_nom` varchar(100) NOT NULL COMMENT 'Nombre del vinculo.'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los tipos de vínculos que se presenten entre los propietarios/arrendadores y los habitantes.';

--
-- Truncar tablas antes de insertar `rmb_vinculo`
--

TRUNCATE TABLE `rmb_vinculo`;
--
-- Volcado de datos para la tabla `rmb_vinculo`
--

INSERT INTO `rmb_vinculo` (`rmb_vinculo_id`, `rmb_vinculo_nom`) VALUES
(1, 'Padre / Madre'),
(2, 'Nieto(a)'),
(3, 'Hijo(a)'),
(4, 'Esposo(a)'),
(5, 'Amigo(a)'),
(6, 'Abuelo(a)'),
(7, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_vulnera`
--

CREATE TABLE IF NOT EXISTS `rmb_vulnera` (
`rmb_vulnera_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_vulnera_obs` varchar(255) DEFAULT NULL COMMENT 'Observación acerca de la vulnerabilidad.',
  `rmb_tvulnera_id` int(8) DEFAULT NULL COMMENT 'Tipo de vulnerabilidad presentada.',
  `rmb_aptos_id` int(8) DEFAULT NULL COMMENT 'Id del apartamento a que hace referencia.',
  `rmb_vulnera_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se realiza el ingreso del registro.',
  `rmb_vulnera_user` int(8) DEFAULT NULL COMMENT 'Usuario que ingresa el dato.'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacenara las vulnerabilidad de cada apartamento.';

--
-- Truncar tablas antes de insertar `rmb_vulnera`
--

TRUNCATE TABLE `rmb_vulnera`;
--
-- Volcado de datos para la tabla `rmb_vulnera`
--

INSERT INTO `rmb_vulnera` (`rmb_vulnera_id`, `rmb_vulnera_obs`, `rmb_tvulnera_id`, `rmb_aptos_id`, `rmb_vulnera_fecha`, `rmb_vulnera_user`) VALUES
(1, 'El apartamento presenta problemas de inundacion cuando llueve debido a que las ventanas estan rotas.', 1, 1, '2015-09-24 14:42:46', 1),
(2, 'En horas de la tarde despues de la 1pm dos menores de edad permanecen solos hasta las 6 pm.', 4, 1, '2015-09-24 14:44:17', 1),
(3, 'El apartamento presenta inseguridad ya que se encuentra en un segundo piso.', 8, 1, '2015-09-24 14:45:06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmb_zonas`
--

CREATE TABLE IF NOT EXISTS `rmb_zonas` (
`rmb_zonas_id` int(8) NOT NULL COMMENT 'Id del registro en la tabla.',
  `rmb_zonas_nom` varchar(150) NOT NULL COMMENT 'Nombre',
  `rmb_torres_id` int(8) DEFAULT NULL COMMENT 'Torre'
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `rmb_zonas`
--

TRUNCATE TABLE `rmb_zonas`;
--
-- Volcado de datos para la tabla `rmb_zonas`
--

INSERT INTO `rmb_zonas` (`rmb_zonas_id`, `rmb_zonas_nom`, `rmb_torres_id`) VALUES
(1, 'Piso 1', 1),
(2, 'Piso 2', 1),
(3, 'Piso 3', 1),
(4, 'Piso 4', 1),
(5, 'Piso 5', 1),
(6, 'Piso 6', 1),
(7, 'Piso 7', 1),
(8, 'Piso 8', 1),
(9, 'Piso 9', 1),
(10, 'Piso 10', 1),
(11, 'Piso 11', 1),
(12, 'Piso 12', 1),
(13, 'Piso 13', 1),
(14, 'Sótano 1', 1),
(15, 'Sótano 2', 1),
(16, 'Piso 1', 2),
(17, 'Piso 2', 2),
(18, 'Piso 3', 2),
(19, 'Piso 4', 2),
(20, 'Piso 5', 2),
(21, 'Piso 6', 2),
(22, 'Piso 7', 2),
(23, 'Piso 8', 2),
(24, 'Piso 9', 2),
(25, 'Piso 10', 2),
(26, 'Piso 11', 2),
(27, 'Piso 12', 2),
(28, 'Piso 13', 2),
(29, 'Sótano 1', 2),
(30, 'Sótano 2', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rmb_aptos`
--
ALTER TABLE `rmb_aptos`
 ADD PRIMARY KEY (`rmb_aptos_id`), ADD KEY `rmb_aptos_FKIndex1` (`rmb_torres_id`);

--
-- Indices de la tabla `rmb_bitacora`
--
ALTER TABLE `rmb_bitacora`
 ADD PRIMARY KEY (`rmb_bitacora_id`), ADD KEY `rmb_bitacora_FKIndex1` (`rmb_tbitacora_id`);

--
-- Indices de la tabla `rmb_calendario`
--
ALTER TABLE `rmb_calendario`
 ADD PRIMARY KEY (`rmb_calendario_id`), ADD KEY `rmb_calendario_FKIndex1` (`rmb_context_id`);

--
-- Indices de la tabla `rmb_carg`
--
ALTER TABLE `rmb_carg`
 ADD PRIMARY KEY (`rmb_carg_id`);

--
-- Indices de la tabla `rmb_cdoc`
--
ALTER TABLE `rmb_cdoc`
 ADD PRIMARY KEY (`rmb_cdoc_id`);

--
-- Indices de la tabla `rmb_contac`
--
ALTER TABLE `rmb_contac`
 ADD PRIMARY KEY (`rmb_contac_id`), ADD KEY `rmb_contac_FKIndex1` (`rmb_tcont_id`), ADD KEY `rmb_contac_FKIndex2` (`rmb_residente_id`);

--
-- Indices de la tabla `rmb_context`
--
ALTER TABLE `rmb_context`
 ADD PRIMARY KEY (`rmb_context_id`);

--
-- Indices de la tabla `rmb_cvulnera`
--
ALTER TABLE `rmb_cvulnera`
 ADD PRIMARY KEY (`rmb_cvulnera_id`);

--
-- Indices de la tabla `rmb_depos`
--
ALTER TABLE `rmb_depos`
 ADD PRIMARY KEY (`rmb_depos_id`), ADD KEY `rmb_depos_FKIndex1` (`rmb_aptos_id`);

--
-- Indices de la tabla `rmb_document`
--
ALTER TABLE `rmb_document`
 ADD PRIMARY KEY (`rmb_document_id`), ADD KEY `rmb_document_FKIndex1` (`rmb_cdoc_id`);

--
-- Indices de la tabla `rmb_emp`
--
ALTER TABLE `rmb_emp`
 ADD PRIMARY KEY (`rmb_emp_id`), ADD KEY `rmb_emp_FKIndex1` (`rmb_temp_id`);

--
-- Indices de la tabla `rmb_emp_x_proyecto`
--
ALTER TABLE `rmb_emp_x_proyecto`
 ADD PRIMARY KEY (`rmb_emp_id`,`rmb_proyecto_id`), ADD KEY `rmb_emp_has_rmb_proyecto_FKIndex1` (`rmb_emp_id`), ADD KEY `rmb_emp_has_rmb_proyecto_FKIndex2` (`rmb_proyecto_id`);

--
-- Indices de la tabla `rmb_equipos`
--
ALTER TABLE `rmb_equipos`
 ADD PRIMARY KEY (`rmb_equipos_id`);

--
-- Indices de la tabla `rmb_est`
--
ALTER TABLE `rmb_est`
 ADD PRIMARY KEY (`rmb_est_id`);

--
-- Indices de la tabla `rmb_fpago`
--
ALTER TABLE `rmb_fpago`
 ADD PRIMARY KEY (`rmb_fpago_id`);

--
-- Indices de la tabla `rmb_gen`
--
ALTER TABLE `rmb_gen`
 ADD PRIMARY KEY (`rmb_gen_id`);

--
-- Indices de la tabla `rmb_horarios`
--
ALTER TABLE `rmb_horarios`
 ADD PRIMARY KEY (`rmb_horarios_id`);

--
-- Indices de la tabla `rmb_icono`
--
ALTER TABLE `rmb_icono`
 ADD PRIMARY KEY (`rmb_icono_id`);

--
-- Indices de la tabla `rmb_maestros`
--
ALTER TABLE `rmb_maestros`
 ADD PRIMARY KEY (`rmb_maestros_id`);

--
-- Indices de la tabla `rmb_mant`
--
ALTER TABLE `rmb_mant`
 ADD PRIMARY KEY (`rmb_mant_id`), ADD KEY `rmb_mant_FKIndex1` (`rmb_equipos_id`);

--
-- Indices de la tabla `rmb_mascotas`
--
ALTER TABLE `rmb_mascotas`
 ADD PRIMARY KEY (`rmb_mascotas_id`);

--
-- Indices de la tabla `rmb_mens`
--
ALTER TABLE `rmb_mens`
 ADD PRIMARY KEY (`rmb_mens_id`);

--
-- Indices de la tabla `rmb_mens_dest`
--
ALTER TABLE `rmb_mens_dest`
 ADD PRIMARY KEY (`rmb_mens_dest_id`), ADD KEY `rmb_mens_dest_FKIndex1` (`rmb_mens_id`);

--
-- Indices de la tabla `rmb_mod`
--
ALTER TABLE `rmb_mod`
 ADD PRIMARY KEY (`rmb_mod_id`);

--
-- Indices de la tabla `rmb_obs_cal`
--
ALTER TABLE `rmb_obs_cal`
 ADD PRIMARY KEY (`rmb_obs_cal_id`);

--
-- Indices de la tabla `rmb_pagos`
--
ALTER TABLE `rmb_pagos`
 ADD PRIMARY KEY (`rmb_pagos_id`);

--
-- Indices de la tabla `rmb_parq`
--
ALTER TABLE `rmb_parq`
 ADD PRIMARY KEY (`rmb_parq_id`);

--
-- Indices de la tabla `rmb_perf`
--
ALTER TABLE `rmb_perf`
 ADD PRIMARY KEY (`rmb_perf_id`);

--
-- Indices de la tabla `rmb_perm`
--
ALTER TABLE `rmb_perm`
 ADD PRIMARY KEY (`rmb_perm_id`);

--
-- Indices de la tabla `rmb_perm_perf`
--
ALTER TABLE `rmb_perm_perf`
 ADD PRIMARY KEY (`rmb_perf_id`,`rmb_perm_id`), ADD KEY `rmb_perf_has_rmb_perm_FKIndex1` (`rmb_perf_id`), ADD KEY `rmb_perf_has_rmb_perm_FKIndex2` (`rmb_perm_id`);

--
-- Indices de la tabla `rmb_port`
--
ALTER TABLE `rmb_port`
 ADD PRIMARY KEY (`rmb_port_id`), ADD KEY `rmb_port_FKIndex1` (`rmb_proyecto_id`);

--
-- Indices de la tabla `rmb_proyecto`
--
ALTER TABLE `rmb_proyecto`
 ADD PRIMARY KEY (`rmb_proyecto_id`), ADD KEY `rmb_proyecto_FKIndex1` (`rmb_tproyecto_id`);

--
-- Indices de la tabla `rmb_residente`
--
ALTER TABLE `rmb_residente`
 ADD PRIMARY KEY (`rmb_residente_id`), ADD KEY `rmb_residente_FKIndex1` (`rmb_tdoc_id`), ADD KEY `rmb_residente_FKIndex2` (`rmb_perf_id`), ADD KEY `rmb_residente_FKIndex3` (`rmb_carg_id`);

--
-- Indices de la tabla `rmb_residente_x_aptos`
--
ALTER TABLE `rmb_residente_x_aptos`
 ADD KEY `rmb_residente_has_rmb_aptos_FKIndex1` (`rmb_residente_id`), ADD KEY `rmb_residente_has_rmb_aptos_FKIndex2` (`rmb_aptos_id`);

--
-- Indices de la tabla `rmb_taptos`
--
ALTER TABLE `rmb_taptos`
 ADD PRIMARY KEY (`rmb_taptos_id`);

--
-- Indices de la tabla `rmb_tbitacora`
--
ALTER TABLE `rmb_tbitacora`
 ADD PRIMARY KEY (`rmb_tbitacora_id`);

--
-- Indices de la tabla `rmb_tcal`
--
ALTER TABLE `rmb_tcal`
 ADD PRIMARY KEY (`rmb_tcal_id`);

--
-- Indices de la tabla `rmb_tcont`
--
ALTER TABLE `rmb_tcont`
 ADD PRIMARY KEY (`rmb_tcont_id`);

--
-- Indices de la tabla `rmb_tdoc`
--
ALTER TABLE `rmb_tdoc`
 ADD PRIMARY KEY (`rmb_tdoc_id`);

--
-- Indices de la tabla `rmb_temp`
--
ALTER TABLE `rmb_temp`
 ADD PRIMARY KEY (`rmb_temp_id`);

--
-- Indices de la tabla `rmb_teq`
--
ALTER TABLE `rmb_teq`
 ADD PRIMARY KEY (`rmb_teq_id`);

--
-- Indices de la tabla `rmb_tesoreria`
--
ALTER TABLE `rmb_tesoreria`
 ADD PRIMARY KEY (`rmb_tesoreria_id`);

--
-- Indices de la tabla `rmb_tes_concep`
--
ALTER TABLE `rmb_tes_concep`
 ADD PRIMARY KEY (`rmb_tes_concep_id`);

--
-- Indices de la tabla `rmb_tmascotas`
--
ALTER TABLE `rmb_tmascotas`
 ADD PRIMARY KEY (`rmb_tmascotas_id`);

--
-- Indices de la tabla `rmb_torres`
--
ALTER TABLE `rmb_torres`
 ADD PRIMARY KEY (`rmb_torres_id`), ADD KEY `rmb_torres_FKIndex1` (`rmb_proyecto_id`);

--
-- Indices de la tabla `rmb_tpago`
--
ALTER TABLE `rmb_tpago`
 ADD PRIMARY KEY (`rmb_tpago_id`);

--
-- Indices de la tabla `rmb_tproyecto`
--
ALTER TABLE `rmb_tproyecto`
 ADD PRIMARY KEY (`rmb_tproyecto_id`);

--
-- Indices de la tabla `rmb_tres`
--
ALTER TABLE `rmb_tres`
 ADD PRIMARY KEY (`rmb_tres_id`);

--
-- Indices de la tabla `rmb_tveh`
--
ALTER TABLE `rmb_tveh`
 ADD PRIMARY KEY (`rmb_tveh_id`);

--
-- Indices de la tabla `rmb_tvulnera`
--
ALTER TABLE `rmb_tvulnera`
 ADD PRIMARY KEY (`rmb_tvulnera_id`);

--
-- Indices de la tabla `rmb_veh`
--
ALTER TABLE `rmb_veh`
 ADD PRIMARY KEY (`rmb_veh_id`), ADD UNIQUE KEY `rmb_veh_placa` (`rmb_veh_placa`), ADD KEY `rmb_veh_FKIndex1` (`rmb_tveh_id`);

--
-- Indices de la tabla `rmb_veh_x_aptos`
--
ALTER TABLE `rmb_veh_x_aptos`
 ADD PRIMARY KEY (`rmb_veh_id`,`rmb_aptos_id`), ADD KEY `rmb_veh_has_rmb_aptos_FKIndex1` (`rmb_veh_id`), ADD KEY `rmb_veh_has_rmb_aptos_FKIndex2` (`rmb_aptos_id`);

--
-- Indices de la tabla `rmb_vinculo`
--
ALTER TABLE `rmb_vinculo`
 ADD PRIMARY KEY (`rmb_vinculo_id`);

--
-- Indices de la tabla `rmb_vulnera`
--
ALTER TABLE `rmb_vulnera`
 ADD PRIMARY KEY (`rmb_vulnera_id`);

--
-- Indices de la tabla `rmb_zonas`
--
ALTER TABLE `rmb_zonas`
 ADD PRIMARY KEY (`rmb_zonas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rmb_aptos`
--
ALTER TABLE `rmb_aptos`
MODIFY `rmb_aptos_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rmb_bitacora`
--
ALTER TABLE `rmb_bitacora`
MODIFY `rmb_bitacora_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rmb_calendario`
--
ALTER TABLE `rmb_calendario`
MODIFY `rmb_calendario_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rmb_carg`
--
ALTER TABLE `rmb_carg`
MODIFY `rmb_carg_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `rmb_cdoc`
--
ALTER TABLE `rmb_cdoc`
MODIFY `rmb_cdoc_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rmb_contac`
--
ALTER TABLE `rmb_contac`
MODIFY `rmb_contac_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `rmb_context`
--
ALTER TABLE `rmb_context`
MODIFY `rmb_context_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rmb_cvulnera`
--
ALTER TABLE `rmb_cvulnera`
MODIFY `rmb_cvulnera_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rmb_depos`
--
ALTER TABLE `rmb_depos`
MODIFY `rmb_depos_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rmb_document`
--
ALTER TABLE `rmb_document`
MODIFY `rmb_document_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `rmb_emp`
--
ALTER TABLE `rmb_emp`
MODIFY `rmb_emp_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rmb_equipos`
--
ALTER TABLE `rmb_equipos`
MODIFY `rmb_equipos_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `rmb_est`
--
ALTER TABLE `rmb_est`
MODIFY `rmb_est_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `rmb_fpago`
--
ALTER TABLE `rmb_fpago`
MODIFY `rmb_fpago_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `rmb_gen`
--
ALTER TABLE `rmb_gen`
MODIFY `rmb_gen_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rmb_horarios`
--
ALTER TABLE `rmb_horarios`
MODIFY `rmb_horarios_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.';
--
-- AUTO_INCREMENT de la tabla `rmb_icono`
--
ALTER TABLE `rmb_icono`
MODIFY `rmb_icono_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del icono',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rmb_maestros`
--
ALTER TABLE `rmb_maestros`
MODIFY `rmb_maestros_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `rmb_mant`
--
ALTER TABLE `rmb_mant`
MODIFY `rmb_mant_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `rmb_mascotas`
--
ALTER TABLE `rmb_mascotas`
MODIFY `rmb_mascotas_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rmb_mens`
--
ALTER TABLE `rmb_mens`
MODIFY `rmb_mens_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `rmb_mens_dest`
--
ALTER TABLE `rmb_mens_dest`
MODIFY `rmb_mens_dest_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `rmb_mod`
--
ALTER TABLE `rmb_mod`
MODIFY `rmb_mod_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rmb_obs_cal`
--
ALTER TABLE `rmb_obs_cal`
MODIFY `rmb_obs_cal_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `rmb_pagos`
--
ALTER TABLE `rmb_pagos`
MODIFY `rmb_pagos_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla';
--
-- AUTO_INCREMENT de la tabla `rmb_parq`
--
ALTER TABLE `rmb_parq`
MODIFY `rmb_parq_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id',AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `rmb_perf`
--
ALTER TABLE `rmb_perf`
MODIFY `rmb_perf_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `rmb_perm`
--
ALTER TABLE `rmb_perm`
MODIFY `rmb_perm_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rmb_port`
--
ALTER TABLE `rmb_port`
MODIFY `rmb_port_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rmb_proyecto`
--
ALTER TABLE `rmb_proyecto`
MODIFY `rmb_proyecto_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rmb_residente`
--
ALTER TABLE `rmb_residente`
MODIFY `rmb_residente_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `rmb_taptos`
--
ALTER TABLE `rmb_taptos`
MODIFY `rmb_taptos_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `rmb_tbitacora`
--
ALTER TABLE `rmb_tbitacora`
MODIFY `rmb_tbitacora_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rmb_tcal`
--
ALTER TABLE `rmb_tcal`
MODIFY `rmb_tcal_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rmb_tcont`
--
ALTER TABLE `rmb_tcont`
MODIFY `rmb_tcont_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `rmb_tdoc`
--
ALTER TABLE `rmb_tdoc`
MODIFY `rmb_tdoc_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rmb_temp`
--
ALTER TABLE `rmb_temp`
MODIFY `rmb_temp_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rmb_teq`
--
ALTER TABLE `rmb_teq`
MODIFY `rmb_teq_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `rmb_tesoreria`
--
ALTER TABLE `rmb_tesoreria`
MODIFY `rmb_tesoreria_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT de la tabla `rmb_tes_concep`
--
ALTER TABLE `rmb_tes_concep`
MODIFY `rmb_tes_concep_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT de la tabla `rmb_tmascotas`
--
ALTER TABLE `rmb_tmascotas`
MODIFY `rmb_tmascotas_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rmb_torres`
--
ALTER TABLE `rmb_torres`
MODIFY `rmb_torres_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rmb_tpago`
--
ALTER TABLE `rmb_tpago`
MODIFY `rmb_tpago_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rmb_tproyecto`
--
ALTER TABLE `rmb_tproyecto`
MODIFY `rmb_tproyecto_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rmb_tres`
--
ALTER TABLE `rmb_tres`
MODIFY `rmb_tres_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `rmb_tveh`
--
ALTER TABLE `rmb_tveh`
MODIFY `rmb_tveh_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rmb_tvulnera`
--
ALTER TABLE `rmb_tvulnera`
MODIFY `rmb_tvulnera_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `rmb_veh`
--
ALTER TABLE `rmb_veh`
MODIFY `rmb_veh_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rmb_vinculo`
--
ALTER TABLE `rmb_vinculo`
MODIFY `rmb_vinculo_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rmb_vulnera`
--
ALTER TABLE `rmb_vulnera`
MODIFY `rmb_vulnera_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rmb_zonas`
--
ALTER TABLE `rmb_zonas`
MODIFY `rmb_zonas_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro en la tabla.',AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
