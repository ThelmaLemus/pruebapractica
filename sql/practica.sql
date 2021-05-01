-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-05-2021 a las 06:59:28
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `referencia` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `referencia`, `descripcion`) VALUES
(11, '1', 'Activos'),
(2, '1.1', 'Activo corriente'),
(3, '1.1.1', 'Caja y bancos'),
(4, '1.1.1.1', 'Caja general'),
(5, '1.1.1.1.1', 'Caja chica O&M'),
(6, '1.1.2', 'Bancos Quetzales'),
(7, '1.1.2.1', 'Banco G&T Cta. 1234567890 Q Test'),
(8, '1.2', 'Cuentas por cobrar'),
(9, '1.2.1', 'Clientes'),
(10, '1.2.1.1', 'Clientes Q'),
(12, '1.3', 'Activo no corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

DROP TABLE IF EXISTS `poliza`;
CREATE TABLE IF NOT EXISTS `poliza` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cuentaId` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DoH` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `concepto` char(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` double(15,2) DEFAULT NULL,
  `sumaDebe` double(15,2) DEFAULT NULL,
  `sumaHaber` double(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`id`, `no`, `fecha`, `cuentaId`, `DoH`, `concepto`, `saldo`, `sumaDebe`, `sumaHaber`) VALUES
(1, 1, '2021-04-30', '4', 'D', 'Prueba 1', 10.00, 30.00, 30.00),
(2, 1, '2021-04-30', '5', 'D', 'Prueba 1', 10.00, 30.00, 30.00),
(3, 1, '2021-04-30', '9', 'D', 'Prueba 1', 10.00, 30.00, 30.00),
(4, 1, '2021-04-30', '7', 'H', 'Prueba 1', 30.00, 30.00, 30.00),
(5, 2, '2021-04-30', '7', 'D', 'Prueba 2', 100.00, 160.00, 160.00),
(6, 2, '2021-04-30', '3', 'D', 'Prueba 2', 60.00, 160.00, 160.00),
(7, 2, '2021-04-30', '10', 'H', 'Prueba 2', 40.00, 160.00, 160.00),
(8, 2, '2021-04-30', '8', 'H', 'Prueba 2', 80.00, 160.00, 160.00),
(9, 2, '2021-04-30', '9', 'H', 'Prueba 2', 40.00, 160.00, 160.00),
(10, 3, '2021-05-01', '4', 'D', 'Prueba 3', 10.00, 10.00, 10.00),
(11, 3, '2021-05-01', '8', 'H', 'Prueba 3', 10.00, 10.00, 10.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
