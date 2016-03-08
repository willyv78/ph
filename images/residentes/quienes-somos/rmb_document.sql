-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-12-2015 a las 16:58:38
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
