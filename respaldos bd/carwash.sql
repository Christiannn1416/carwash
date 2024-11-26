-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-11-2024 a las 01:08:02
-- Versión del servidor: 11.3.2-MariaDB
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carwash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cliente`, `telefono`, `correo`) VALUES
(63, 'Natalia Castro', '4612313890', 'nataliacastrodiaz4756@gmail.com'),
(64, 'Natalia Diaz', '4152435213', '23031037@itcelaya.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `fotografia` varchar(100) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `empleados_usuario_id_usuario_fk` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavadoproductos`
--

DROP TABLE IF EXISTS `lavadoproductos`;
CREATE TABLE IF NOT EXISTS `lavadoproductos` (
  `id_lavado` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  KEY `IDLavado` (`id_lavado`),
  KEY `IDProducto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavados`
--

DROP TABLE IF EXISTS `lavados`;
CREATE TABLE IF NOT EXISTS `lavados` (
  `id_lavado` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `marca_vehiculo` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `placas` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `hora_entrada` time NOT NULL DEFAULT current_timestamp(),
  `hora_salida` time DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente',
  `id_servicio` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lavado`),
  KEY `IDCliente` (`id_cliente`),
  KEY `lavados_ibfk_2` (`id_servicio`),
  KEY `fk_id_empleado` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_lavado` int(11) DEFAULT NULL,
  `metodo` enum('Efectivo','Tarjeta') DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `IDLavado` (`id_lavado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(30) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `permiso`) VALUES
(1, 'index'),
(2, 'Ver productos'),
(3, 'Nuevo producto'),
(4, 'Modificar producto'),
(5, 'Eliminar producto'),
(6, 'Ver clientes'),
(7, 'Agregar cliente'),
(8, 'Modificar cliente'),
(9, 'Eliminar cliente'),
(10, 'Ver lavados'),
(11, 'Nuevo lavado'),
(12, 'Modificar lavado'),
(13, 'Eliminar lavado'),
(14, 'Ver servicios'),
(15, 'Agregar servicio'),
(16, 'Modificar servicio'),
(17, 'Eliminar servicio'),
(18, 'Ver empleados'),
(19, 'Agregar empleado'),
(20, 'Modificar empleado'),
(21, 'Eliminar empleado'),
(22, 'Ver tickets'),
(23, 'Ver asigaciones'),
(24, 'Agregar nuevo usuario'),
(25, 'Modificar usuario'),
(26, 'Eliminar usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`, `descripcion`, `imagen`, `precio`, `stock`) VALUES
(22, 'Aromatizante Black Ice ', '', '7e2deed099632f82f3387026b6970bde.png', 79.00, 20),
(23, 'Aromatizante en aerosol Black Ice ', '', '9d83946143b314e1b3f1c367fa8773d9.png', 99.00, 20),
(24, 'AerosolLimpieza Interior Chemical Guys ', '', '2d2e43b3ef6579e15142a0c5908d3c7f.png', 299.00, 20),
(25, ' Limpiador de Alfombra ', '', '0362e1efd9838e0a1dbd573e8f5b9967.png', 269.00, 20),
(26, 'Limpiador de Vidrio y Repelente de Lluvia ', '', '77747585aa72eb5084de9bb4d17cecd3.png', 159.00, 20),
(27, 'Armor All Toallas Protector', '', 'c9d2107ee78ada9be0ba4f1c99b6b6df.png', 139.00, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'empleado'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

DROP TABLE IF EXISTS `rol_permiso`;
CREATE TABLE IF NOT EXISTS `rol_permiso` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_permiso`),
  KEY `id_permiso` (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id_rol`, `id_permiso`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(2, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(2, 22),
(1, 23),
(2, 23),
(1, 24),
(1, 25),
(1, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `servicio`, `descripcion`, `imagen`, `precio`) VALUES
(6, 'Lavado Exterior BÃ¡sico', 'Limpieza de la carrocerÃ­a del vehÃ­culo con agua, jabÃ³n especializado y secado manual o automÃ¡tico.', NULL, 90),
(7, 'Lavado Completo', 'Incluye el lavado de la carrocerÃ­a, limpieza de vidrios, llantas y aspirado del interior del vehÃ­culo (asientos, alfombras y maletero).', NULL, 150),
(8, 'Pulido y Encerado', 'Se aplica cera para proteger la pintura y se pule la carrocerÃ­a para mejorar el brillo y eliminar rayones superficiales.', NULL, 300),
(9, 'Limpieza de Motor', 'Limpieza con productos desengrasantes y herramientas de baja presiÃ³n para eliminar suciedad y grasa acumulada en el compartimento del motor.', NULL, 400),
(10, 'Limpieza de TapicerÃ­a', 'Limpieza profunda de los asientos (puede incluir lavado en seco o uso de productos quÃ­micos para eliminar manchas y olores).', NULL, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'Christian', 'd16fb36f0911f878998c136191af705e'),
(2, 'Natalia', 'd16fb36f0911f878998c136191af705e'),
(3, 'Miller', 'd16fb36f0911f878998c136191af705e'),
(6, 'Dios', '202cb962ac59075b964b07152d234b70'),
(7, 'Barney', '202cb962ac59075b964b07152d234b70'),
(8, 'Nuevo', 'e26c062fedf6b32834e4de93f9c8b644');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_rol`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario`, `id_rol`) VALUES
(1, 1),
(6, 1),
(2, 2),
(7, 2),
(3, 3),
(8, 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_usuario_id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `lavadoproductos`
--
ALTER TABLE `lavadoproductos`
  ADD CONSTRAINT `lavadoproductos_ibfk_1` FOREIGN KEY (`id_lavado`) REFERENCES `lavados` (`id_lavado`) ON DELETE CASCADE,
  ADD CONSTRAINT `lavadoproductos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `lavados`
--
ALTER TABLE `lavados`
  ADD CONSTRAINT `fk_id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE SET NULL,
  ADD CONSTRAINT `lavados_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE SET NULL,
  ADD CONSTRAINT `lavados_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`) ON DELETE SET NULL;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_lavado`) REFERENCES `lavados` (`id_lavado`);

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id_permiso`),
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
