-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2022 a las 03:26:03
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.27

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
  `cateCodi` bigint(20) NOT NULL,
  `cateNomb` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cateDesc` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cateFech` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cateCodi`, `cateNomb`, `cateDesc`, `portada`, `cateFech`, `ruta`, `status`) VALUES
(1, 'Reloj', 'clases de reloj', 'img_0d94ea1a93bdbb0fef9e6ce72ea8a021.jpg', '2021-04-22 07:52:23', 'clases de reloj', 1),
(2, 'Aceites vegetales', 'Nacionales', 'img_039a4af911234d2c89fba5be5f359649.jpg', '2020-11-20 15:35:09', '', 1),
(3, 'Jean Hombre', 'jean y camisas', 'img_6d6fee82a3ed62ed7d966065f6708a08.jpg', '2020-11-21 09:11:32', '', 1),
(4, 'Chaqueta', 'Chaqueta x', 'img_4710eff0e6acf0ab39b1e237b1913ff4.jpg', '2020-11-21 09:11:56', 'Licor importado', 1),
(5, 'Camiseta Mujer', 'camisas y blusas', 'img_29f3c2c6525d5fbbecc36c22e8142705.jpg', '2020-11-28 16:03:51', 'Camiseta Mujer', 1),
(6, 'Correas', 'Propia fabricación nacional', 'img_8aa4e13526442e0a6c3d5ab76d8d9b86.jpg', '2020-12-01 21:38:53', 'Correas', 1),
(7, 'Licor Nacional', 'cerveceria bavaria', 'img_bd3561d4221e547a00dcc23fcbd637fd.jpg', '2021-02-03 07:19:21', '', 1),
(8, 'Camisetas Hombre', 'Camisetas', 'img_6a94815633cb683c9593ffe17c689935.jpg', '2021-09-27 21:01:19', '', 1),
(9, 'Productos Doria', 'pastas y demás', 'img_81a49269bc894caa58172123659db2ab.jpg', '2021-09-27 21:02:50', '', 1),
(10, 'Café Nescle', 'todas las referencias', 'img_1c9bf1723be4124afb6a96417136a11a.jpg', '2021-09-27 21:04:11', '', 1),
(11, 'Licor Importado', 'todas las marcas', 'img_100dac750455ab8a1e0aece676ec62ed.jpg', '2021-10-03 19:00:50', '', 1),
(12, 'Gorras', 'Todas las marcas', 'img_1cadcb9df5420c5f9c016bb9b575a71a.jpg', '2021-10-04 22:54:30', '', 1),
(13, 'Morral', 'todas las marcas', 'img_6a33aa29d78af1f13806e4c6e7545df8.jpg', '2021-10-04 23:45:20', '', 1),
(14, 'Saco Hombres', 'Todos los estilos', 'img_3082a45036c9328ebf6b9d36c026ae64.jpg', '2021-10-05 00:06:20', '', 1),
(15, 'Faldas', 'Todas las marcas', 'img_540016460e378111fa199e7b3d0c123e.jpg', '2021-10-05 00:37:03', '', 1),
(16, 'Cerveza Nacional', 'Todas las marcas', 'img_214f1290cc3f7f99eba1e3796d402be4.jpg', '2021-10-05 00:37:38', '', 1),
(17, 'Cerveza Impotada', 'Todas las marcas', 'img_ba96acecb5ba05329b0e52041cf106d9.jpg', '2021-10-05 00:38:38', '', 1),
(18, 'Perfumeria', 'Todas marcas', 'img_30e4e78b34ac30875ed495758fda696b.jpg', '2021-10-05 00:40:00', '', 1),
(19, 'Gafas', 'todas marcas', 'img_130721fdb9775f65cf013e5d59bd3ab8.jpg', '2021-10-05 23:48:00', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `pedidoid`, `productoid`, `precio`, `cantidad`) VALUES
(1, 4, 31, '75000.00', 4),
(2, 6, 4, '2200.00', 1),
(3, 6, 2, '2200.00', 1),
(4, 6, 3, '2200.00', 3),
(5, 6, 6, '3500.00', 1),
(6, 7, 3, '2200.00', 1),
(7, 8, 3, '2200.00', 1),
(8, 9, 28, '8000.00', 2),
(9, 9, 2, '2200.00', 2),
(10, 11, 7, '1200.00', 1),
(11, 18, 31, '75000.00', 3),
(12, 48, 2, '2200.00', 3),
(13, 48, 26, '24000.00', 2),
(14, 49, 31, '75000.00', 3),
(15, 49, 28, '8000.00', 6),
(16, 49, 26, '24000.00', 2),
(17, 50, 8, '3500.00', 2),
(18, 50, 25, '13000.00', 2),
(19, 50, 6, '3500.00', 3),
(20, 52, 27, '35000.00', 3),
(21, 52, 6, '3500.00', 10),
(22, 52, 33, '12000.00', 3),
(23, 52, 34, '13000.00', 2),
(24, 52, 26, '24000.00', 2),
(25, 53, 26, '24000.00', 2),
(26, 53, 28, '8000.00', 5),
(27, 54, 34, '13000.00', 3),
(28, 54, 30, '5000.00', 10),
(29, 55, 28, '8000.00', 6),
(30, 55, 31, '75000.00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `transaccionid` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` bigint(20) NOT NULL,
  `productoId` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `productoId`, `img`) VALUES
(1, 33, 'pro_91047e3363dd207bc0733a96808015b7.jpg'),
(2, 33, 'pro_649d2e7481cd2b3626bf2a6ec8b0e9d5.jpg'),
(3, 31, 'pro_e28ed68b8e453e3a90c431189194d403.jpg'),
(4, 34, 'pro_17187d21877d81f033ec8f02017ca82d.jpg'),
(5, 30, 'pro_c5132c23db71a2492f454621bd3edd9a.jpg'),
(6, 7, 'pro_043af7515728969407a7031ef1778f8b.jpg'),
(7, 7, 'pro_76cb431c301b2365c1aa2e1d17d139d8.jpg'),
(8, 1, 'pro_82ab2c6804a9fd8d0d9b8b4b6f96dec4.jpg'),
(9, 1, 'pro_210a41da472878599772e7741f4319e1.jpg'),
(10, 2, 'pro_06365ab10cd68ae1ed87acf6f84a8376.jpg'),
(11, 2, 'pro_82ab2c6804a9fd8d0d9b8b4b6f96dec4.jpg'),
(12, 2, 'pro_d4c10bca3df2218c8e19a03f3e5943fd.jpg'),
(13, 2, 'pro_5b992b9e7ccc73a8f1df63d3f7a1e5e8.jpg'),
(14, 4, 'pro_ca2be70acaa96bf888f338db634fb92c.jpg'),
(15, 4, 'pro_22c8dd15957d267d91d29abcad9e7179.jpg'),
(16, 4, 'pro_ce524b631aa5766cedcfedab0f8ae7ea.jpg'),
(17, 4, 'pro_c9eaa0e1ad564098a1ef6c8892d84f8b.jpg'),
(18, 5, 'pro_06365ab10cd68ae1ed87acf6f84a8376.jpg'),
(19, 5, 'pro_9d487c794ec017bcbd9610e697b3f0b3.jpg'),
(20, 5, 'pro_357e7f99f8b757c0f496d888eab68dbf.jpg'),
(21, 6, 'pro_02e65e32877aabfb1700c04a7e804c6e.jpg'),
(22, 6, 'pro_88e8d0beb6bebc04e852d65cd67f0955.jpg'),
(23, 6, 'pro_820e72b361d2c03812498721c75bce8e.jpg'),
(24, 8, 'pro_4b13e8ea1d37711e16d574419f0783bb.jpg'),
(25, 25, 'pro_c36e68b4c5dace4b535e431e5ac3bdb0.jpg'),
(26, 27, 'pro_01c8a35e357ed353996f44d08ef417c7.jpg'),
(27, 29, 'pro_d20588d9fc04621ffe7ffabefc0ae86d.jpg'),
(28, 28, 'pro_5a1a4950c90d2519c7de77cf4d4774a6.jpg'),
(29, 3, 'pro_c9eaa0e1ad564098a1ef6c8892d84f8b.jpg'),
(30, 26, 'pro_01c8a35e357ed353996f44d08ef417c7.jpg'),
(31, 34, 'pro_fb254fafd8b9c99ba3fad2c95c04ce55.jpg'),
(32, 31, 'pro_dd480f530b841a9da8ead9705efbb8bd.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` bigint(20) NOT NULL,
  `moduTitu` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `moduDesc` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `moduFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `moduTitu`, `moduDesc`, `moduFech`, `status`) VALUES
(1, 'categorias', 'categorias de la tienda', '2021-04-20 11:49:22', 1),
(2, 'DashBoard', 'panel principal', '2021-04-20 11:49:56', 1),
(3, 'Proveedores', 'Modulo donde se registra proveedores y facturas', '2021-04-20 11:50:06', 1),
(4, 'usuarios', 'modulo de los usuarios de la aplicacion', '2021-04-20 11:50:18', 1),
(5, 'modulos', 'muestra en menu', '2021-04-21 10:19:31', 1),
(6, 'Configuracion', 'Configuracion Inicial', '2021-04-21 11:11:51', 1),
(7, 'Roles', 'Configuración de permisos', '2021-10-05 20:13:17', 1),
(8, 'clientes', 'registra los clientes registrados', '2021-09-28 04:09:51', 1),
(9, 'Productos', 'inventarios', '2021-06-24 02:40:42', 1),
(10, 'Comercial', 'modulos de ventas', '2021-10-03 18:33:07', 1),
(11, 'ventas', 'ventas', '2021-10-03 18:33:57', 1),
(12, 'Pedidos', 'pedidos de ventas', '2021-10-03 18:37:29', 1),
(13, 'Facturas', 'registro de gastos', '2021-10-05 20:26:25', 1),
(14, 'tienda', 'ingreso de clientes', '2021-10-29 07:46:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` bigint(20) NOT NULL,
  `referenciacobro` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `idtransaccionpaypal` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `datospaypal` text COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `personaid` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `monto` decimal(11,2) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `direccion_envio` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `costo_envio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `referenciacobro`, `idtransaccionpaypal`, `datospaypal`, `personaid`, `fecha`, `monto`, `tipopagoid`, `direccion_envio`, `costo_envio`, `status`) VALUES
(2, '345453', '769520297X598962B', '{\n  \"id\": \"2AX342854R300435R\",\n  \"intent\": \"CAPTURE\",\n  \"status\": \"COMPLETED\",\n  \"purchase_units\": [\n    {\n      \"reference_id\": \"default\",\n      \"amount\": {\n        \"currency_code\": \"USD\",\n        \"value\": \"57300.00\"\n      },\n      \"payee\": {\n        \"email_address\": \"sb-6y9pv11020928@business.example.com\",\n        \"merchant_id\": \"C2DH3DWP7EBW6\"\n      },\n      \"description\": \"Compra de artículos en SISO por $57300 \",\n      \"soft_descriptor\": \"PAYPAL *TEST STORE\",\n      \"shipping\": {\n        \"name\": {\n          \"full_name\": \"John Doe\"\n        },\n        \"address\": {\n          \"address_line_1\": \"Free Trade Zone\",\n          \"admin_area_2\": \"Bogota\",\n          \"admin_area_1\": \"Bogota\",\n          \"postal_code\": \"110111\",\n          \"country_code\": \"CO\"\n        }\n      },\n      \"payments\": {\n        \"captures\": [\n          {\n            \"id\": \"9PH6073804817354E\",\n            \"status\": \"COMPLETED\",\n            \"amount\": {\n              \"currency_code\": \"USD\",\n              \"value\": \"57300.00\"\n            },\n            \"final_capture\": true,\n            \"seller_protection\": {\n              \"status\": \"ELIGIBLE\",\n              \"dispute_categories\": [\n                \"ITEM_NOT_RECEIVED\",\n                \"UNAUTHORIZED_TRANSACTION\"\n              ]\n            },\n            \"create_time\": \"2022-01-17T22:55:14Z\",\n            \"update_time\": \"2022-01-17T22:55:14Z\"\n          }\n        ]\n      }\n    }\n  ],\n  \"payer\": {\n    \"name\": {\n      \"given_name\": \"John\",\n      \"surname\": \"Doe\"\n    },\n    \"email_address\": \"sb-b0bn611022391@personal.example.com\",\n    \"payer_id\": \"DZKQXJX9926JE\",\n    \"address\": {\n      \"country_code\": \"CO\"\n    }\n  },\n  \"create_time\": \"2022-01-17T22:54:49Z\",\n  \"update_time\": \"2022-01-17T22:55:14Z\",\n  \"links\": [\n    {\n      \"href\": \"https://api.sandbox.paypal.com/v2/checkout/orders/2AX342854R300435R\",\n      \"rel\": \"self\",\n      \"method\": \"GET\"\n    }\n  ]\n}', 9, '2021-01-06 04:45:08', '55.00', 1, 'Bogota\r\nColombia', '0.00', 'Reembolsado'),
(3, NULL, '3WV372029R5575438', NULL, 1, '2022-01-19 02:19:02', '302500.00', 1, 'cra 12 # 23-45, bogota', '2500.00', 'Completo'),
(4, '56546756757', NULL, NULL, 1, '2022-01-28 13:11:49', '302500.00', 1, 'cra 12 # 23-45, bogota', '2500.00', 'Completo'),
(6, '33544343', NULL, NULL, 8, '2022-01-28 13:05:35', '17000.00', 4, 'cra 12 #12-12, bogotá', '2500.00', 'Completo'),
(7, '34234355', NULL, NULL, 8, '2022-01-28 13:05:26', '4700.00', 2, 'cra 12 # 12-34, Bogotá', '2500.00', 'Completo'),
(8, '45646547', NULL, NULL, 8, '2022-01-25 22:05:05', '4700.00', 2, 'cra 12 # 12-34, Bogotá', '2500.00', 'Completo'),
(9, '45465575757', NULL, NULL, 8, '2022-01-28 13:12:03', '22900.00', 1, 'cra 12 # 12-34, Bogotá', '2500.00', 'Completo'),
(11, '9786756544', NULL, NULL, 1, '2022-01-19 02:02:46', '3700.00', 3, 'cra 12, 12', '2500.00', 'Completo'),
(18, '6546466546546', NULL, NULL, 11, '2022-01-19 02:02:33', '227500.00', 2, 'cra 45-#13-65, pereira', '2500.00', 'Completo'),
(30, '64564565465', NULL, NULL, 1, '2022-01-19 02:02:19', '23500.00', 4, 'cra 23 # 23-45, bogotá', '2500.00', 'Completo'),
(32, '4565465657', NULL, NULL, 8, '2022-01-25 22:02:42', '55200.00', 4, 'calle 23 # 34-65, Cali', '2500.00', 'Completo'),
(34, '4565676576', NULL, NULL, 8, '2022-01-25 22:04:06', '55200.00', 1, 'cra 23 # 45-43, cali', '2500.00', 'Completo'),
(36, '656756755', NULL, NULL, 8, '2022-01-25 22:02:53', '55200.00', 2, 'cra 34 #34-54, cali', '2500.00', 'Completo'),
(40, '455465564', NULL, NULL, 8, '2022-01-28 13:02:59', '55200.00', 2, 'fdsgzg, gzdfgdxfgdfx', '2500.00', 'Completo'),
(42, '76574564', NULL, NULL, 8, '2022-01-28 13:02:42', '55200.00', 2, 'grgr, hreshrh', '2500.00', 'Completo'),
(44, '65657568568', NULL, NULL, 3, '2022-01-26 08:14:37', '55200.00', 4, 'efgaw, jrtsjtrsdj', '2500.00', 'Completo'),
(45, '645654654', NULL, NULL, 10, '2022-01-25 22:02:27', '55200.00', 3, 'fzddf, fdgxfxdf', '2500.00', 'Completo'),
(48, '23432532533', NULL, NULL, 1, '2022-01-19 02:17:28', '57100.00', 4, 'efwrfrgf, fdhxhxgffhx', '2500.00', 'Completo'),
(49, '7567876867', NULL, NULL, 5, '2022-01-28 13:02:27', '323500.00', 4, 'cra 34 -#6-7, cali', '2500.00', 'Completo'),
(50, NULL, '26H54727933059700', '{\"id\":\"0S301833FV8544416\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"46000.00\"},\"payee\":{\"email_address\":\"sb-6y9pv11020928@business.example.com\",\"merchant_id\":\"C2DH3DWP7EBW6\"},\"description\":\"Compra de artículos en SISO por $46000 \",\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"Free Trade Zone\",\"admin_area_2\":\"Bogota\",\"admin_area_1\":\"Bogota\",\"postal_code\":\"110111\",\"country_code\":\"CO\"}},\"payments\":{\"captures\":[{\"id\":\"26H54727933059700\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"46000.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2022-01-28T12:51:01Z\",\"update_time\":\"2022-01-28T12:51:01Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b0bn611022391@personal.example.com\",\"payer_id\":\"DZKQXJX9926JE\",\"address\":{\"country_code\":\"CO\"}},\"create_time\":\"2022-01-28T12:50:37Z\",\"update_time\":\"2022-01-28T12:51:01Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/0S301833FV8544416\",\"rel\":\"self\",\"method\":\"GET\"}]}', 5, '2022-01-28 13:07:19', '46000.00', 1, 'cra 56 #45-65, cali', '2500.00', 'Completo'),
(51, '53454646754', NULL, NULL, 5, '2022-01-28 13:10:56', '350000.00', 4, 'cra 34-#56-67', '0.00', 'Completo'),
(52, NULL, '9VS13876DK473561T', '{\"id\":\"1TW28898TL379561K\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"252500.00\"},\"payee\":{\"email_address\":\"sb-6y9pv11020928@business.example.com\",\"merchant_id\":\"C2DH3DWP7EBW6\"},\"description\":\"Compra de artículos en SISO por $252500 \",\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"Free Trade Zone\",\"admin_area_2\":\"Bogota\",\"admin_area_1\":\"Bogota\",\"postal_code\":\"110111\",\"country_code\":\"CO\"}},\"payments\":{\"captures\":[{\"id\":\"9VS13876DK473561T\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"252500.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2022-01-28T13:28:27Z\",\"update_time\":\"2022-01-28T13:28:27Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b0bn611022391@personal.example.com\",\"payer_id\":\"DZKQXJX9926JE\",\"address\":{\"country_code\":\"CO\"}},\"create_time\":\"2022-01-28T13:28:06Z\",\"update_time\":\"2022-01-28T13:28:27Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/1TW28898TL379561K\",\"rel\":\"self\",\"method\":\"GET\"}]}', 11, '2022-01-30 01:40:45', '252500.00', 1, 'cra 34 # 45-64, cali', '2500.00', 'Completo'),
(53, NULL, '3D822713JB048524J', '{\"id\":\"68X54965DC952410U\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"90500.00\"},\"payee\":{\"email_address\":\"sb-6y9pv11020928@business.example.com\",\"merchant_id\":\"C2DH3DWP7EBW6\"},\"description\":\"Compra de artículos en SISO por $90500 \",\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"Free Trade Zone\",\"admin_area_2\":\"Bogota\",\"admin_area_1\":\"Bogota\",\"postal_code\":\"110111\",\"country_code\":\"CO\"}},\"payments\":{\"captures\":[{\"id\":\"3D822713JB048524J\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"90500.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2022-01-30T01:33:20Z\",\"update_time\":\"2022-01-30T01:33:20Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b0bn611022391@personal.example.com\",\"payer_id\":\"DZKQXJX9926JE\",\"address\":{\"country_code\":\"CO\"}},\"create_time\":\"2022-01-30T01:33:00Z\",\"update_time\":\"2022-01-30T01:33:20Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/68X54965DC952410U\",\"rel\":\"self\",\"method\":\"GET\"}]}', 11, '2022-01-30 01:33:21', '90500.00', 1, 'cra 34- # 34-56, honda', '2500.00', 'Aprobado'),
(54, NULL, '24V72953M63481008', '{\"id\":\"94611822E5073270T\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"91500.00\"},\"payee\":{\"email_address\":\"sb-6y9pv11020928@business.example.com\",\"merchant_id\":\"C2DH3DWP7EBW6\"},\"description\":\"Compra de artículos en SISO por $91500 \",\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"Free Trade Zone\",\"admin_area_2\":\"Bogota\",\"admin_area_1\":\"Bogota\",\"postal_code\":\"110111\",\"country_code\":\"CO\"}},\"payments\":{\"captures\":[{\"id\":\"24V72953M63481008\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"91500.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2022-01-30T01:38:43Z\",\"update_time\":\"2022-01-30T01:38:43Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b0bn611022391@personal.example.com\",\"payer_id\":\"DZKQXJX9926JE\",\"address\":{\"country_code\":\"CO\"}},\"create_time\":\"2022-01-30T01:38:31Z\",\"update_time\":\"2022-01-30T01:38:43Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/94611822E5073270T\",\"rel\":\"self\",\"method\":\"GET\"}]}', 12, '2022-01-30 01:38:44', '91500.00', 1, 'cra 45 # 34-56, bogotá', '2500.00', 'Aprobado'),
(55, '7687687867', NULL, NULL, 12, '2022-01-30 02:23:30', '350500.00', 2, 'cra 23 # 23-45, honda', '2500.00', 'Pendiente');

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
(858, 4, 2, 1, 0, 0, 0),
(859, 4, 3, 0, 0, 0, 0),
(860, 4, 4, 0, 0, 0, 0),
(861, 4, 5, 0, 0, 0, 0),
(862, 4, 6, 0, 0, 0, 0),
(863, 4, 7, 0, 0, 0, 0),
(864, 4, 9, 1, 0, 0, 0),
(1004, 2, 1, 1, 0, 0, 0),
(1005, 2, 2, 1, 0, 0, 0),
(1006, 2, 3, 1, 0, 0, 0),
(1007, 2, 4, 0, 0, 0, 0),
(1008, 2, 5, 0, 0, 0, 0),
(1009, 2, 6, 0, 0, 0, 0),
(1010, 2, 7, 0, 0, 0, 0),
(1011, 2, 8, 1, 0, 0, 0),
(1012, 2, 9, 1, 0, 0, 0),
(1040, 5, 1, 1, 0, 0, 0),
(1041, 5, 2, 1, 0, 0, 0),
(1042, 5, 3, 1, 0, 0, 0),
(1043, 5, 4, 1, 0, 0, 0),
(1044, 5, 5, 0, 0, 0, 0),
(1045, 5, 6, 0, 0, 0, 0),
(1046, 5, 7, 0, 0, 0, 0),
(1047, 5, 8, 1, 1, 1, 1),
(1048, 5, 9, 1, 1, 0, 0),
(1342, 3, 1, 1, 1, 1, 1),
(1343, 3, 2, 1, 1, 1, 1),
(1344, 3, 3, 1, 1, 1, 1),
(1345, 3, 4, 1, 1, 1, 1),
(1346, 3, 5, 1, 1, 1, 1),
(1347, 3, 6, 1, 1, 1, 1),
(1348, 3, 7, 1, 1, 1, 1),
(1349, 3, 8, 1, 1, 1, 1),
(1350, 3, 9, 1, 1, 1, 1),
(1351, 3, 10, 1, 1, 1, 1),
(1352, 3, 11, 1, 1, 1, 1),
(1353, 3, 12, 1, 1, 1, 1),
(1354, 3, 13, 1, 1, 1, 1),
(1355, 3, 14, 1, 1, 1, 1),
(1384, 6, 1, 0, 0, 0, 0),
(1385, 6, 2, 1, 0, 0, 0),
(1386, 6, 3, 0, 0, 0, 0),
(1387, 6, 4, 0, 0, 0, 0),
(1388, 6, 5, 0, 0, 0, 0),
(1389, 6, 6, 0, 0, 0, 0),
(1390, 6, 7, 0, 0, 0, 0),
(1391, 6, 8, 0, 0, 0, 0),
(1392, 6, 9, 0, 0, 0, 0),
(1393, 6, 10, 0, 0, 0, 0),
(1394, 6, 11, 0, 0, 0, 0),
(1395, 6, 12, 1, 0, 0, 0),
(1396, 6, 13, 0, 0, 0, 0),
(1397, 6, 14, 1, 1, 1, 1),
(1412, 1, 1, 0, 0, 0, 0),
(1413, 1, 2, 1, 1, 1, 0),
(1414, 1, 3, 1, 1, 1, 0),
(1415, 1, 4, 0, 0, 0, 0),
(1416, 1, 5, 0, 0, 0, 0),
(1417, 1, 6, 0, 0, 0, 0),
(1418, 1, 7, 0, 0, 0, 0),
(1419, 1, 8, 1, 1, 1, 0),
(1420, 1, 9, 1, 1, 1, 0),
(1421, 1, 10, 1, 1, 1, 0),
(1422, 1, 11, 1, 1, 1, 0),
(1423, 1, 12, 1, 1, 1, 0),
(1424, 1, 13, 1, 1, 1, 0),
(1425, 1, 14, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `persFech` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `persFech`, `status`) VALUES
(1, '13456765', 'harold glasser', 'urueña', 3216545587, 'harold_uruena@yahoo.com', '4c3804a4b28679b2d03f134cce4bbe8e4eeb6971659de77b7c6ce0de8ba5d0d4', '14-327134', 'harold', 'cra 78 #34-56', '', 3, '2020-11-20 23:37:42', 1),
(2, '14345600', 'Harold g', 'Uruena', 2517731, 'harold@yahoo.com', '4c3804a4b28679b2d03f134cce4bbe8e4eeb6971659de77b7c6ce0de8ba5d0d4', '14324876', 'SISO S.A', 'cra 78 h # 34-54', '332fdf558cfba8587302-39e8e2b608cb925fcdf0-61863ec57f3da60ab018-4b1aadcf11d366a832e3', 1, '2021-02-15 15:14:42', 1),
(3, '12345432', 'Monica Tatiana', 'Bonilla', 34343434, 'monica@gmail.com', 'bf98dad23ab21ddb1fac7d35f', '', '', '', '', 2, '2021-04-22 12:40:18', 1),
(4, '14325678', 'Harold Glasser', 'Urueña', 3543543463, 'hrd@gmail.com', 'dea02dc1d77015709fbcba7af', '', '', '', '', 5, '2021-06-16 02:34:35', 1),
(5, '14327432', 'Maria Paula', 'Riaños Q', 3434343, 'maria@gmail.com', '4e74a51e6bee83ab24419f0ef51d597ceb9ba850454832265fc7c5048f1894fa', '14327681', 'SISO', 'Bogotá', '', 1, '2021-06-26 01:10:13', 1),
(6, '345665655', 'Pablo', 'Martinez', 454556, 'pablo@yahoo.com', 'c1761e6dff44a93b593ed7447d983c259a5aefdf3a11960b81c2196ca56772bc', '', '', '', '', 5, '2021-09-28 01:00:45', 1),
(7, '543545435', 'Jose Felipe', 'Ruiz', 54354543, 'felipe@gmail.com', '4f5b96a60a5848cc3860b5e06be270b697031a3d7da7b8c10f2bd463226a068a', '14544645', 'bavaria s.a', 'no aplica', '', 6, '2021-10-01 02:25:27', 0),
(8, '5435454567', 'Armando', 'Ruiz', 54354543, 'armando123@gmail.com', '4f5b96a60a5848cc3860b5e06be270b697031a3d7da7b8c10f2bd463226a068a', '14545466', 'no aplica', 'no aplica', '', 6, '2021-10-01 02:31:04', 1),
(9, '4353455', 'Paula Andrea', 'Romero', 4343343443, 'andrea123@gmail.com', 'c1dc5e53cd7015b206b147f6c55f0aa360dc30a451feabe75b6ae8e47f1c7bea', '4353455', 'No aplica', 'No aplica', '', 6, '2021-10-01 02:33:47', 1),
(10, '145677828', 'Abel Fernando', 'Castro', 609872, 'fernando@gmail.com', '617cff69e42db92d83ddadf65642580d36b41579b34fcf04c3657a9c95d4f953', '145677828', 'fernando', 'fernando', '', 6, '2021-10-01 03:21:12', 1),
(11, '8678585685', 'Pablo', 'Castiblanco', 454556, 'pablo@gmail.com', 'c1761e6dff44a93b593ed7447d983c259a5aefdf3a11960b81c2196ca56772bc', '', '', '', '', 6, '2022-01-13 05:27:48', 1),
(12, '', 'Jeny', 'Riaños', 5656754, 'jeny123@gmail.com', 'c1761e6dff44a93b593ed7447d983c259a5aefdf3a11960b81c2196ca56772bc', '', '', '', '', 6, '2022-01-30 01:37:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prodId` bigint(20) NOT NULL,
  `prodIdCate` bigint(20) NOT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `prodNomb` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `prodPrec` decimal(11,2) NOT NULL,
  `prodMode` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `prodNitProv` bigint(20) NOT NULL,
  `prodMarc` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `prodStock` int(11) NOT NULL,
  `adminNomb` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `prodFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ruta` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prodId`, `prodIdCate`, `codigo`, `prodNomb`, `descripcion`, `prodPrec`, `prodMode`, `prodNitProv`, `prodMarc`, `prodStock`, `adminNomb`, `imagen`, `prodFech`, `ruta`, `status`) VALUES
(1, 1, '78889', 'reloj', '<p>chaquetas</p>', '2200.00', '375 Cm3', 1, 'Bavaria', 120, 0, '', '2022-01-08 04:43:11', 'reloj', 1),
(2, 5, '878799', 'blusa ris', '<p>ropa</p>', '2200.00', '75 G', 3, 'Palmolive', 100, 0, '', '2021-10-16 01:36:06', 'blusa ris', 1),
(3, 17, '454646', 'corona', '<p>coronita</p>', '2200.00', '375 Cm3', 1, 'Bavaría', 30, 0, '', '2022-01-08 04:44:02', 'corona', 1),
(4, 1, '76778', 'reloj', '<p>nueva</p>', '2200.00', '75 G', 2, 'Palmolive', 100, 0, '', '2022-01-08 04:44:27', 'reloj', 1),
(5, 4, '878786', 'chaqueta', '<p>licor</p>', '100.00', 'Unidad', 2, 'Colombina', 50, 0, '', '2022-01-08 04:44:53', 'chaqueta', 1),
(6, 5, '98977899', 'camisa lana', '<p>camisas</p>', '3500.00', '500 g', 1, 'zucaritas', 35, 0, '', '2022-01-08 04:45:27', 'camisa lana', 1),
(7, 8, '656566', 'camisa sport', '<p>ropa para jovenes camisetas y pantalon</p>', '1200.00', '50 Gramos', 3, 'Colgate', 35, 0, '', '2022-01-08 04:45:57', 'camisa sport', 1),
(8, 5, '77760', 'Buso ajustado', '<p>egregrg</p>', '3500.00', '500 g', 1, 'zucaritas', 35, 0, '', '2022-01-08 04:46:40', 'buso ajustado', 1),
(25, 1, '668888', 'reloj casio', '<p>media</p>', '13000.00', '', 0, '', 89, 0, '', '2022-01-08 04:47:16', 'reloj casio', 1),
(26, 4, '778888', 'chaqueta cuero', '<p>caf&eacute;</p>', '24000.00', '<p>ron de caldas, ingreso principio semana.</p>', 0, '', 12, 0, '', '2022-01-08 04:47:57', 'chaqueta cuero', 1),
(27, 3, '677777', 'jean azul', '<p>jean</p>', '35000.00', '<p>ingresa 06/10/2021</p>', 0, '', 10, 0, '', '2022-01-08 04:48:44', 'jean azul', 1),
(28, 3, '12333', 'jean lana', '<p>hombre</p>', '8000.00', '<p>nectar verde</p>', 0, '', 12, 0, '', '2022-01-08 04:49:17', 'jean lana', 1),
(29, 1, '576688', 'reloj rolex', '<p>rolex estilo</p>', '5000.00', '', 0, '', 48, 0, '', '2022-01-08 04:50:05', 'reloj rolex', 1),
(30, 17, '56567', 'corona', '<p>Botella</p>', '5000.00', '', 0, '', 96, 0, '', '2022-01-08 04:50:31', 'corona', 1),
(31, 11, '66888', 'black while', '<p>pruebas</p>', '75000.00', '', 0, '', 12, 0, '', '2022-01-08 04:51:09', 'black while', 1),
(32, 9, '767566', 'producto 2', '<p>pruebas 3</p>', '12500.00', '', 0, '', 12, 0, '', '2021-10-08 04:53:16', '', 0),
(33, 17, '78787', 'corona 350', '<p>grande</p>', '12000.00', '', 0, '', 12, 0, '', '2022-01-08 04:52:03', 'corona 350', 1),
(34, 11, '786787', 'black while media', '<p>media</p>', '13000.00', '', 0, '', 24, 0, '', '2022-01-08 04:52:49', 'black while media', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `provCodi` bigint(20) NOT NULL,
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
(1, 80678899, 'Bavaria S.a', '2020-11-21 14:07:51', 'Cra 45 # 23 -78', '3433553', 'bavaaria@colombia.com', 'Cerveceria De Colombia', 1),
(2, 860532255, 'Zuluaga Y Soto', '2020-11-21 14:14:47', 'Cra 89 # 17B-02', '4567654', 'zulusoto@distribu.com', 'Licor Nacional', 1),
(3, 2147483647, 'Franco Monroy Sas', '2020-11-21 14:17:14', 'Cra 34 # 12-45B', '3456632', 'franco@monroy.com', 'Productos De Ducales Y Colombina', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_facturas`
--

CREATE TABLE `proveedores_facturas` (
  `provFactId` bigint(20) NOT NULL,
  `provFactCodi` bigint(20) NOT NULL,
  `provNumeFact` int(11) NOT NULL,
  `provValoFact` float DEFAULT NULL,
  `provFactFech` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores_facturas`
--

INSERT INTO `proveedores_facturas` (`provFactId`, `provFactCodi`, `provNumeFact`, `provValoFact`, `provFactFech`, `status`) VALUES
(1, 2, 1, 120000, '2021-10-05 20:34:16', 1),
(2, 1, 1, 50000, '2021-10-05 20:34:16', 1),
(3, 3, 3, 134000, '2021-10-05 23:40:36', 1),
(4, 1, 2, 50000, '2021-10-06 00:59:08', 1),
(5, 1, 4, 50000, '2021-10-06 01:00:38', 1),
(6, 1, 5, 50000, '2021-10-06 01:04:37', 1),
(7, 1, 6, 50000, '2021-10-06 01:06:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reembolsos`
--

CREATE TABLE `reembolsos` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `idtransaccion` varchar(255) NOT NULL,
  `datosreembolso` text NOT NULL,
  `observacion` text NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reembolsos`
--

INSERT INTO `reembolsos` (`id`, `pedidoid`, `idtransaccion`, `datosreembolso`, `observacion`, `status`) VALUES
(1, 2, 'pruebas de reembolso', '769520297X598962B', 'CAMBIO DE PRODUCTO', 'Reembolsado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` bigint(20) NOT NULL,
  `roleNomb` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `roleDesc` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `roleFech` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `roleNomb`, `roleDesc`, `roleFech`, `status`) VALUES
(1, 'administrador', 'supervisa la tienda', '2021-05-26 05:32:48', 1),
(2, 'ayudante', 'Tienda de la primera de mayo', '2020-11-20 21:06:07', 1),
(3, 'Propietario', 'tienda de kennedy', '2020-12-02 02:15:07', 1),
(4, 'supervisor', 'adm de punto', '2021-04-22 10:46:08', 1),
(5, 'operario', 'vendedor', '2021-05-22 05:20:02', 1),
(6, 'cliente', 'cliente de la tienda', '2021-10-01 02:05:42', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idtipopago` bigint(20) NOT NULL,
  `tipopago` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idtipopago`, `tipopago`, `status`) VALUES
(1, 'PayPal', 1),
(2, 'Efectivo', 1),
(3, 'cheque', 1),
(4, 'Tarjeta', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cateCodi`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoId` (`productoId`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `pediPersId` (`personaid`),
  ADD KEY `tipopagoid` (`tipopagoid`),
  ADD KEY `tipopagoid_2` (`tipopagoid`);

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
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prodId`),
  ADD KEY `prodIdCate` (`prodIdCate`),
  ADD KEY `prodNitProv` (`prodNitProv`);

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
-- Indices de la tabla `reembolsos`
--
ALTER TABLE `reembolsos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idtipopago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cateCodi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `permId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1426;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prodId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `provCodi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores_facturas`
--
ALTER TABLE `proveedores_facturas`
  MODIFY `provFactId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reembolsos`
--
ALTER TABLE `reembolsos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idtipopago` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedidos` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `productos` (`prodId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `productos` (`prodId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`productoId`) REFERENCES `productos` (`prodId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`tipopagoid`) REFERENCES `tipopago` (`idtipopago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `personas` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`moduloid`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`prodIdCate`) REFERENCES `categorias` (`cateCodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores_facturas`
--
ALTER TABLE `proveedores_facturas`
  ADD CONSTRAINT `proveedores_facturas_ibfk_1` FOREIGN KEY (`provFactCodi`) REFERENCES `proveedores` (`provCodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reembolsos`
--
ALTER TABLE `reembolsos`
  ADD CONSTRAINT `reembolsos_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedidos` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
