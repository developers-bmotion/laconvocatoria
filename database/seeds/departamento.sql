-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2020 a las 21:29:57
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtualt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

-- CREATE TABLE `departamento` (
--   `id` int(11) NOT NULL,
--   `codigo` varchar(10) NOT NULL,
--   `descripcion` varchar(100) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `codigo`, `descripcion`) VALUES
(1, '5', 'ANTIOQUIA'),
(2, '8', 'ATLANTICO'),
(3, '11', 'BOGOTA'),
(4, '13', 'BOLIVAR'),
(5, '15', 'BOYACA'),
(6, '17', 'CALDAS'),
(7, '18', 'CAQUETA'),
(8, '19', 'CAUCA'),
(9, '20', 'CESAR'),
(10, '23', 'CORDOBA'),
(11, '25', 'CUNDINAMARCA'),
(12, '27', 'CHOCO'),
(13, '41', 'HUILA'),
(14, '44', 'LA GUAJIRA'),
(15, '47', 'MAGDALENA'),
(16, '50', 'META'),
(17, '52', 'NARIÃ?O'),
(18, '54', 'N. DE SANTANDER'),
(19, '63', 'QUINDIO'),
(20, '66', 'RISARALDA'),
(21, '68', 'SANTANDER'),
(22, '70', 'SUCRE'),
(23, '73', 'TOLIMA'),
(24, '76', 'VALLE DEL CAUCA'),
(25, '81', 'ARAUCA'),
(26, '85', 'CASANARE'),
(27, '86', 'PUTUMAYO'),
(28, '88', 'SAN ANDRES'),
(29, '91', 'AMAZONAS'),
(30, '94', 'GUAINIA'),
(31, '95', 'GUAVIARE'),
(32, '97', 'VAUPES'),
(33, '99', 'VICHADA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
