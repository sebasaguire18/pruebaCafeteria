-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2022 a las 01:15:32
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'id del producto',
  `prod_nombre` varchar(510) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre del producto',
  `prod_ref` varchar(300) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'referencia del producto',
  `prod_precio` int(60) NOT NULL COMMENT 'precio del producto',
  `prod_peso` int(60) NOT NULL COMMENT 'peso del producto',
  `prod_cat` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'categoría del producto',
  `prod_stock` int(255) NOT NULL COMMENT 'stock disponible del producto',
  `prod_fecha` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación del registro, automático',
  `prod_usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'id del usuario que creó el registro',
  `prod_status` int(11) NOT NULL DEFAULT 1 COMMENT '0:Eliminado; 1:Activo;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_nombre` varchar(510) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_pass` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'contraseña encriptada',
  `usu_status` int(11) NOT NULL DEFAULT 1 COMMENT '0: inactivo; 1: Activo (por defecto)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_correo`, `usu_pass`, `usu_status`) VALUES
('62223a6e31e99', 'Administrador', 'admin@mail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'id de la venta realizada',
  `venta_id_producto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'id del producto',
  `venta_cantidad` int(255) NOT NULL COMMENT 'cantidad de unidades que se vendió del producto',
  `venta_fecha` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación del registro, automático',
  `venta_usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'id del usuario que creó el registro',
  `venta_status` int(11) NOT NULL DEFAULT 1 COMMENT '0:Eliminado; 1:Activo;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
