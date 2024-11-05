-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2024 a las 03:37:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id_lavado` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id_lavado`, `id_empleado`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cliente`, `telefono`, `correo`) VALUES
(1, 'Christian ', '4612313890', 'chris@itcelaya.edu.mx'),
(7, 'Robin', '4611233456', 'robin@gmail.com'),
(9, 'Ted', '4612226789', 'ted@gmail.com'),
(13, 'Marshall', '4612348970', 'marshal@gmail.com'),
(25, 'James', '5467889025', 'james@gmail.com'),
(27, 'Tyler', '4612222222', 'tyler@gamil.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `empleado` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `empleado`, `telefono`, `foto`, `id_usuario`) VALUES
(1, 'ChrisssTiann', '46133333', 'foto', 1),
(4, 'Natalia', '4612313890', 'foto', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavadoproductos`
--

CREATE TABLE `lavadoproductos` (
  `id_lavado` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavados`
--

CREATE TABLE `lavados` (
  `id_lavado` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_servicio` int(11) NOT NULL,
  `marca_vehiculo` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `placas` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `hora_entrada` time NOT NULL DEFAULT current_timestamp(),
  `hora_salida` time NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lavados`
--

INSERT INTO `lavados` (`id_lavado`, `id_cliente`, `id_servicio`, `marca_vehiculo`, `color`, `placas`, `fecha`, `hora_entrada`, `hora_salida`, `estado`) VALUES
(1, 1, 1, 'kia', 'rojo', 'ABC-123-HGG', '2024-10-09', '22:45:05', '00:00:00', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_lavado` int(11) DEFAULT NULL,
  `metodo` enum('Efectivo','Tarjeta') DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`, `descripcion`, `imagen`, `precio`, `stock`) VALUES
(1, 'Little Trees Aromatizante Colgante con Aroma a Bla', 'descripcion', 'p1', 120.00, 20),
(2, 'Little Trees Escencia Black Ice Aromatizante de Ambiente Fiber Can 1.05 oz', 'descripcion', 'p2\r\n', 120.00, 20),
(3, 'Spray Limpiador Meguiar\'s Rapido para Detalles Interiores 16oz', 'descrip', 'p3', 120.00, 20),
(4, 'Aposito Protector Satinado de Vinilo, Caucho y Plastico Silk Shine, 16 Onzas Chemical Guys', 'descrip', 'p4', 120.00, 20),
(5, 'Armor All Toallas Protector Original de 30 piezas', 'descrip', 'p5', 120.00, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `rol_permiso` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id_rol`, `id_permiso`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(2, 1),
(2, 2),
(2, 6),
(2, 10),
(2, 14),
(2, 22),
(2, 23),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `p_ubertaxi` int(11) DEFAULT NULL,
  `p_carro` int(11) DEFAULT NULL,
  `p_camioneta` int(11) DEFAULT NULL,
  `p_van` int(11) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `servicio`, `descripcion`, `p_ubertaxi`, `p_carro`, `p_camioneta`, `p_van`, `imagen`) VALUES
(1, 'basic', 'lavado, brillo llantas, aspirado interior básico y cajuela', 90, 100, 110, 1250, 'imagen'),
(2, 'ejecutivo', 'lavado, brillo llantas, aspirado interior y cajuela, acondicionado de interiores (puertas y tablero).', 125, 155, 185, 200, 'imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'Christian', '7363a0d0604902af7b70b271a0b96480'),
(2, 'Natalia', 'd16fb36f0911f878998c136191af705e'),
(3, 'Miller', 'd16fb36f0911f878998c136191af705e'),
(6, 'Dios', '202cb962ac59075b964b07152d234b70'),
(7, 'Barney', '202cb962ac59075b964b07152d234b70'),
(8, 'Nuevo', 'e26c062fedf6b32834e4de93f9c8b644');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario`, `id_rol`) VALUES
(1, 1),
(2, 2),
(3, 3),
(6, 1),
(7, 2),
(8, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD KEY `IDLavado` (`id_lavado`),
  ADD KEY `IDEmpleado` (`id_empleado`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `empleados_usuario_id_usuario_fk` (`id_usuario`);

--
-- Indices de la tabla `lavadoproductos`
--
ALTER TABLE `lavadoproductos`
  ADD KEY `IDLavado` (`id_lavado`),
  ADD KEY `IDProducto` (`id_producto`);

--
-- Indices de la tabla `lavados`
--
ALTER TABLE `lavados`
  ADD PRIMARY KEY (`id_lavado`),
  ADD KEY `IDCliente` (`id_cliente`),
  ADD KEY `IDServicio` (`id_servicio`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `IDLavado` (`id_lavado`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id_rol`,`id_permiso`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lavados`
--
ALTER TABLE `lavados`
  MODIFY `id_lavado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`id_lavado`) REFERENCES `lavados` (`id_lavado`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_usuario_id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `lavadoproductos`
--
ALTER TABLE `lavadoproductos`
  ADD CONSTRAINT `lavadoproductos_ibfk_1` FOREIGN KEY (`id_lavado`) REFERENCES `lavados` (`id_lavado`),
  ADD CONSTRAINT `lavadoproductos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `lavados`
--
ALTER TABLE `lavados`
  ADD CONSTRAINT `lavados_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `lavados_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);

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
