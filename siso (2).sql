-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2021 a las 11:08:19
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cateCodi` int(11) NOT NULL,
  `cateNomb` varchar(30) NOT NULL,
  `cateFech` timestamp NOT NULL DEFAULT current_timestamp(),
  `cateDesc` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cateCodi`, `cateNomb`, `cateFech`, `cateDesc`, `status`) VALUES
(0, 'pijamas', '2021-04-22 07:52:23', 'ropa', 1),
(1, 'licor nacional', '2020-11-20 15:35:09', 'licores nacionales', 1),
(2, 'Aseo Personal', '2020-11-21 09:11:32', 'jabón para baño personal', 1),
(3, 'Licor importado', '2020-11-21 09:11:56', 'licores finos', 1),
(4, 'Dulceria', '2020-11-28 16:03:51', 'Dulces y chocolates importados', 1),
(5, 'ropa interior', '2020-12-01 21:38:53', 'Propia fabricación', 1),
(6, 'Perfumeria', '2021-02-03 07:19:21', 'productos de belleza', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `moduId` bigint(20) NOT NULL,
  `moduTitu` varchar(255) NOT NULL,
  `moduDesc` varchar(255) NOT NULL,
  `moduFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`moduId`, `moduTitu`, `moduDesc`, `moduFech`, `status`) VALUES
(1, 'categorias', 'categorias de la tienda', '2021-04-20 06:49:22', 1),
(2, 'DashBoard', 'panel principal', '2021-04-20 06:49:56', 1),
(3, 'Proveedores', 'Modulo donde se registra proveedores y facturas', '2021-04-20 06:50:06', 1),
(4, 'usuarios', 'modulo de los usuarios de la aplicacion', '2021-04-20 06:50:18', 1),
(5, 'modulos', 'muestra en menu', '2021-04-21 05:19:31', 1),
(6, 'Configuracion', 'Configuracion Inicial', '2021-04-21 06:11:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pediCodi` int(11) NOT NULL,
  `pediNombProd` varchar(100) NOT NULL,
  `pediCodiClie` int(11) NOT NULL,
  `pediFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pediPrec` float NOT NULL,
  `pediCant` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pediCodi`, `pediNombProd`, `pediCodiClie`, `pediFech`, `pediPrec`, `pediCant`, `status`) VALUES
(1, 'crema colgate', 0, '2021-01-28 07:50:02', 2400, 2, 1),
(2, 'Club Roja', 0, '2021-01-28 08:14:21', 22000, 10, 1),
(3, 'Jabon Palmolive', 0, '2021-01-28 08:14:21', 4400, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `permId` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`permId`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(673, 1, 1, 1, 1, 1, 1),
(674, 1, 2, 1, 1, 1, 1),
(675, 1, 3, 1, 1, 1, 1),
(676, 1, 4, 1, 1, 1, 1),
(677, 1, 5, 1, 1, 1, 1),
(678, 1, 6, 1, 1, 1, 1),
(698, 2, 1, 1, 1, 1, 1),
(699, 2, 2, 1, 1, 1, 1),
(700, 2, 3, 1, 1, 1, 1),
(701, 2, 4, 1, 1, 1, 1),
(702, 2, 5, 1, 1, 1, 1),
(703, 2, 6, 1, 1, 1, 1),
(704, 3, 1, 0, 0, 0, 0),
(705, 3, 2, 1, 0, 0, 0),
(706, 3, 3, 1, 0, 0, 0),
(707, 3, 4, 0, 0, 0, 0),
(708, 3, 5, 0, 0, 0, 0),
(709, 3, 6, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `persId` int(11) NOT NULL,
  `persIden` varchar(30) NOT NULL,
  `persNomb` varchar(30) NOT NULL,
  `persApel` varchar(30) NOT NULL,
  `persTele` varchar(256) NOT NULL,
  `persEmail` varchar(100) NOT NULL,
  `persFech` timestamp NOT NULL DEFAULT current_timestamp(),
  `persPass` varchar(75) NOT NULL,
  `persToke` varchar(200) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`persId`, `persIden`, `persNomb`, `persApel`, `persTele`, `persEmail`, `persFech`, `persPass`, `persToke`, `rolid`, `status`) VALUES
(1, '13456765', 'Maria Claudia', 'Osorio', '3216545587', 'cludia23@gmail.com', '2020-11-20 18:37:42', 'eb045d78d273107348b0300c01d29b7552d622abbc6faf81b3ec55359aa9950c', '', 2, 1),
(2, '14345600', 'Harold G', 'Uruena', '2517731', 'harold@yahoo.com', '2021-02-15 10:14:42', '4c3804a4b28679b2d03f134cce4bbe8e4eeb6971659de77b7c6ce0de8ba5d0d4', '7775f4eb2a9553c60665-f1d6245f7d01b6a90517-db0cab189165fa626e7f-3be496391136822c7', 1, 1),
(3, '12345432', 'Monica', 'Tatiana', '343434', 'monica@gmail.com', '2021-04-22 07:40:18', 'bf98dad23ab21ddb1fac7d35f9610c62f2b77b46d1f0eb682b440a0f7a2929cf', '', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prodCodi` int(11) NOT NULL,
  `prodNomb` varchar(100) NOT NULL,
  `prodCodiCate` int(11) NOT NULL,
  `prodFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prodPrec` float NOT NULL,
  `prodMode` varchar(50) NOT NULL,
  `prodMarc` varchar(50) NOT NULL,
  `prodStock` int(11) NOT NULL,
  `prodNitProv` int(11) NOT NULL,
  `adminNomb` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `prodImag` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prodCodi`, `prodNomb`, `prodCodiCate`, `prodFech`, `prodPrec`, `prodMode`, `prodMarc`, `prodStock`, `prodNitProv`, `adminNomb`, `status`, `prodImag`) VALUES
(1, 'Club Dorada', 1, '2020-11-21 09:08:42', 2200, '375 Cm3', 'Bavaria', 120, 1, 0, 1, ''),
(2, 'Jabon Palmilive', 2, '2020-11-21 09:21:06', 2200, '75 G', 'Palmolive', 100, 3, 0, 1, ''),
(3, 'Club Roja', 1, '2020-11-21 09:22:02', 2200, '375 Cm3', 'Bavaría', 30, 1, 0, 1, ''),
(4, 'Jabon Palmolive', 2, '2020-11-28 09:29:53', 2200, '75 G', 'Palmolive', 100, 2, 0, 1, ''),
(5, 'Masmelo', 4, '2020-11-28 16:05:38', 100, 'Unidad', 'Colombina', 50, 2, 0, 1, ''),
(6, 'tangas', 5, '2021-04-22 08:03:05', 3500, 'Unidad', 'Juanpizza', 35, 1, 0, 1, ''),
(7, 'Crema Colgate', 2, '2020-12-16 03:57:59', 1200, '50 Gramos', 'Colgate', 35, 3, 0, 1, ''),
(8, 'Tangas', 5, '2021-04-22 08:06:36', 3500, 'Unidad', 'Juanpizza', 35, 1, 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `provCodi` int(11) NOT NULL,
  `provNit` int(11) NOT NULL,
  `provNomb` varchar(80) NOT NULL,
  `provFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `provDire` varchar(80) NOT NULL,
  `provTele` varchar(80) NOT NULL,
  `provEmail` varchar(80) NOT NULL,
  `provDeta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`provCodi`, `provNit`, `provNomb`, `provFech`, `provDire`, `provTele`, `provEmail`, `provDeta`, `status`) VALUES
(1, 80678899, 'Bavaria S.a', '2020-11-21 09:07:51', 'Cra 45 # 23 -78', '3433553', 'bavaaria@colombia.com', 'Cerveceria De Colombia', 1),
(2, 860532255, 'Zuluaga Y Soto', '2020-11-21 09:14:47', 'Cra 89 # 17B-02', '4567654', 'zulusoto@distribu.com', 'Licor Nacional', 1),
(3, 2147483647, 'Franco Monroy Sas', '2020-11-21 09:17:14', 'Cra 34 # 12-45B', '3456632', 'franco@monroy.com', 'Productos De Ducales Y Colombina', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_facturas`
--

CREATE TABLE `proveedores_facturas` (
  `provFactId` int(11) NOT NULL,
  `provFactCodi` int(11) NOT NULL,
  `provNumeFact` int(11) NOT NULL,
  `provValoFact` float DEFAULT NULL,
  `provFactFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` bigint(20) NOT NULL,
  `roleNomb` varchar(50) NOT NULL,
  `roleDesc` text NOT NULL,
  `roleFech` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `roleNomb`, `roleDesc`, `roleFech`, `status`) VALUES
(1, 'Administrador', 'Tienda de la primera de mayo', '2020-11-20 16:06:07', 1),
(2, 'Propietario', 'tienda de kennedy', '2020-12-01 21:15:07', 1),
(3, 'supervisor', 'adm de punto', '2021-04-22 05:46:08', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cateCodi`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`moduId`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`permId`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`persId`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prodCodi`),
  ADD KEY `prodCodiCate` (`prodCodiCate`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`provCodi`);

--
-- Indices de la tabla `proveedores_facturas`
--
ALTER TABLE `proveedores_facturas`
  ADD PRIMARY KEY (`provFactId`),
  ADD KEY `provFactCodi` (`provFactCodi`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `moduId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `permId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulos` (`moduId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`prodCodiCate`) REFERENCES `categorias` (`cateCodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores_facturas`
--
ALTER TABLE `proveedores_facturas`
  ADD CONSTRAINT `proveedores_facturas_ibfk_1` FOREIGN KEY (`provFactCodi`) REFERENCES `proveedores` (`provCodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
