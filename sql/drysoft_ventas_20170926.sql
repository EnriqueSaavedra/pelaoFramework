-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2017 a las 10:27:40
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drysoft_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `token` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`token`, `id_usuario`, `id_prod`, `cantidad`, `fecha`) VALUES
('bff73580812dd5aa3565a121d96836ad', 1, 1, 1, '2017-09-25 09:11:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `id_provincia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `nombre`, `id_provincia`) VALUES
(1, 'Iquique', 3),
(2, 'Alto Hospicio', 3),
(3, 'Pozo Almonte', 4),
(4, 'Camiña', 4),
(5, 'Colchane', 4),
(6, 'Huara', 4),
(7, 'Pica', 4),
(8, 'Antofagasta', 5),
(9, 'Mejillones', 5),
(10, 'Sierra Gorda', 5),
(11, 'Taltal', 5),
(12, 'Calama', 6),
(13, 'Ollagüe', 6),
(14, 'San Pedro de Atacama', 6),
(15, 'Tocopilla', 7),
(16, 'María Elena', 7),
(17, 'Copiapó', 8),
(18, 'Caldera', 8),
(19, 'Tierra Amarilla', 8),
(20, 'Chañaral', 9),
(21, 'Diego de Almagro', 9),
(22, 'Vallenar', 10),
(23, 'Alto del Carmen', 10),
(24, 'Freirina', 10),
(25, 'Huasco', 10),
(26, 'La Serena', 11),
(27, 'Coquimbo', 11),
(28, 'Andacollo', 11),
(29, 'La Higuera', 11),
(30, 'Paihuano', 11),
(31, 'Vicuña', 11),
(32, 'Illapel', 12),
(33, 'Canela', 12),
(34, 'Los Vilos', 12),
(35, 'Salamanca', 12),
(36, 'Ovalle', 13),
(37, 'Combarbalá', 13),
(38, 'Monte Patria', 13),
(39, 'Punitaqui', 13),
(40, 'Río Hurtado', 13),
(41, 'Valparaíso', 14),
(42, 'Casablanca', 14),
(43, 'Concón', 14),
(44, 'Juan Fernández', 14),
(45, 'Puchuncaví', 14),
(46, 'Quintero', 14),
(47, 'Viña del Mar', 14),
(48, 'Isla de Pascua', 15),
(49, 'Los Andes', 16),
(50, 'Calle Larga', 16),
(51, 'Rinconada', 16),
(52, 'San Esteban', 16),
(53, 'La Ligua', 17),
(54, 'Cabildo', 17),
(55, 'Papudo', 17),
(56, 'Petorca', 17),
(57, 'Zapallar', 17),
(58, 'Quillota', 18),
(59, 'La Calera', 18),
(60, 'Hijuelas', 18),
(61, 'La Cruz', 18),
(62, 'Nogales', 18),
(63, 'San Antonio', 19),
(64, 'Algarrobo', 19),
(65, 'Cartagena', 19),
(66, 'El Quisco', 19),
(67, 'El Tabo', 19),
(68, 'Santo Domingo', 19),
(69, 'San Felipe', 20),
(70, 'Catemu', 20),
(71, 'Llay Llay', 20),
(72, 'Panquehue', 20),
(73, 'Putaendo', 20),
(74, 'Santa María', 20),
(75, 'Quilpué', 21),
(76, 'Limache', 21),
(77, 'Olmué', 21),
(78, 'Villa Alemana', 21),
(79, 'Rancagua', 22),
(80, 'Codegua', 22),
(81, 'Coinco', 22),
(82, 'Coltauco', 22),
(83, 'Doñihue', 22),
(84, 'Graneros', 22),
(85, 'Las Cabras', 22),
(86, 'Machalí', 22),
(87, 'Malloa', 22),
(88, 'Mostazal', 22),
(89, 'Olivar', 22),
(90, 'Peumo', 22),
(91, 'Pichidegua', 22),
(92, 'Quinta de Tilcoco', 22),
(93, 'Rengo', 22),
(94, 'Requínoa', 22),
(95, 'San Vicente', 22),
(96, 'Pichilemu', 23),
(97, 'La Estrella', 23),
(98, 'Litueche', 23),
(99, 'Marchihue', 23),
(100, 'Navidad', 23),
(101, 'Paredones', 23),
(102, 'San Fernando', 24),
(103, 'Chépica', 24),
(104, 'Chimbarongo', 24),
(105, 'Lolol', 24),
(106, 'Nancagua', 24),
(107, 'Palmilla', 24),
(108, 'Peralillo', 24),
(109, 'Placilla', 24),
(110, 'Pumanque', 24),
(111, 'Santa Cruz', 24),
(112, 'Talca', 25),
(113, 'Constitución', 25),
(114, 'Curepto', 25),
(115, 'Empedrado', 25),
(116, 'Maule', 25),
(117, 'Pelarco', 25),
(118, 'Pencahue', 25),
(119, 'Río Claro', 25),
(120, 'San Clemente', 25),
(121, 'San Rafael', 25),
(122, 'Cauquenes', 26),
(123, 'Chanco', 26),
(124, 'Pelluhue', 26),
(125, 'Curicó', 27),
(126, 'Hualañé', 27),
(127, 'Licantén', 27),
(128, 'Molina', 27),
(129, 'Rauco', 27),
(130, 'Romeral', 27),
(131, 'Sagrada Familia', 27),
(132, 'Teno', 27),
(133, 'Vichuquén', 27),
(134, 'Linares', 28),
(135, 'Colbún', 28),
(136, 'Longaví', 28),
(137, 'Parral', 28),
(138, 'Retiro', 28),
(139, 'San Javier', 28),
(140, 'Villa Alegre', 28),
(141, 'Yerbas Buenas', 28),
(142, 'Concepción', 29),
(143, 'Coronel', 29),
(144, 'Chiguayante', 29),
(145, 'Florida', 29),
(146, 'Hualqui', 29),
(147, 'Lota', 29),
(148, 'Penco', 29),
(149, 'San Pedro de la Paz', 29),
(150, 'Santa Juana', 29),
(151, 'Talcahuano', 29),
(152, 'Tomé', 29),
(153, 'Hualpén', 29),
(154, 'Lebu', 30),
(155, 'Arauco', 30),
(156, 'Cañete', 30),
(157, 'Contulmo', 30),
(158, 'Curanilahue', 30),
(159, 'Los Álamos', 30),
(160, 'Tirúa', 30),
(161, 'Los Ángeles', 31),
(162, 'Antuco', 31),
(163, 'Cabrero', 31),
(164, 'Laja', 31),
(165, 'Mulchén', 31),
(166, 'Nacimiento', 31),
(167, 'Negrete', 31),
(168, 'Quilaco', 31),
(169, 'Quilleco', 31),
(170, 'San Rosendo', 31),
(171, 'Santa Bárbara', 31),
(172, 'Tucapel', 31),
(173, 'Yumbel', 31),
(174, 'Alto Biobío', 31),
(175, 'Chillán', 32),
(176, 'Bulnes', 32),
(177, 'Cobquecura', 32),
(178, 'Coelemu', 32),
(179, 'Coihueco', 32),
(180, 'Chillán Viejo', 32),
(181, 'El Carmen', 32),
(182, 'Ninhue', 32),
(183, 'Ñiquén', 32),
(184, 'Pemuco', 32),
(185, 'Pinto', 32),
(186, 'Portezuelo', 32),
(187, 'Quillón', 32),
(188, 'Quirihue', 32),
(189, 'Ránquil', 32),
(190, 'San Carlos', 32),
(191, 'San Fabián', 32),
(192, 'San Ignacio', 32),
(193, 'San Nicolás', 32),
(194, 'Treguaco', 32),
(195, 'Yungay', 32),
(196, 'Temuco', 33),
(197, 'Carahue', 33),
(198, 'Cunco', 33),
(199, 'Curarrehue', 33),
(200, 'Freire', 33),
(201, 'Galvarino', 33),
(202, 'Gorbea', 33),
(203, 'Lautaro', 33),
(204, 'Loncoche', 33),
(205, 'Melipeuco', 33),
(206, 'Nueva Imperial', 33),
(207, 'Padre las Casas', 33),
(208, 'Perquenco', 33),
(209, 'Pitrufquén', 33),
(210, 'Pucón', 33),
(211, 'Saavedra', 33),
(212, 'Teodoro Schmidt', 33),
(213, 'Toltén', 33),
(214, 'Vilcún', 33),
(215, 'Villarrica', 33),
(216, 'Cholchol', 33),
(217, 'Angol', 34),
(218, 'Collipulli', 34),
(219, 'Curacautín', 34),
(220, 'Ercilla', 34),
(221, 'Lonquimay', 34),
(222, 'Los Sauces', 34),
(223, 'Lumaco', 34),
(224, 'Purén', 34),
(225, 'Renaico', 34),
(226, 'Traiguén', 34),
(227, 'Victoria', 34),
(228, 'Puerto Montt', 37),
(229, 'Calbuco', 37),
(230, 'Cochamó', 37),
(231, 'Fresia', 37),
(232, 'Frutillar', 37),
(233, 'Los Muermos', 37),
(234, 'Llanquihue', 37),
(235, 'Maullín', 37),
(236, 'Puerto Varas', 37),
(237, 'Castro', 38),
(238, 'Ancud', 38),
(239, 'Chonchi', 38),
(240, 'Curaco de Vélez', 38),
(241, 'Dalcahue', 38),
(242, 'Puqueldón', 38),
(243, 'Queilén', 38),
(244, 'Quellón', 38),
(245, 'Quemchi', 38),
(246, 'Quinchao', 38),
(247, 'Osorno', 39),
(248, 'Puerto Octay', 39),
(249, 'Purranque', 39),
(250, 'Puyehue', 39),
(251, 'Río Negro', 39),
(252, 'San Juan de la Costa', 39),
(253, 'San Pablo', 39),
(254, 'Chaitén', 40),
(255, 'Futaleufú', 40),
(256, 'Hualaihué', 40),
(257, 'Palena', 40),
(258, 'Coyhaique', 41),
(259, 'Lago Verde', 41),
(260, 'Aysén', 42),
(261, 'Cisnes', 42),
(262, 'Guaitecas', 42),
(263, 'Cochrane', 43),
(264, 'O\'Higgins', 43),
(265, 'Tortel', 43),
(266, 'Chile Chico', 44),
(267, 'Río Ibáñez', 44),
(268, 'Punta Arenas', 45),
(269, 'Laguna Blanca', 45),
(270, 'Río Verde', 45),
(271, 'San Gregorio', 45),
(272, 'Cabo de Hornos', 46),
(273, 'Antártica', 46),
(274, 'Porvenir', 47),
(275, 'Primavera', 47),
(276, 'Timaukel', 47),
(277, 'Natales', 48),
(278, 'Torres del Paine', 48),
(279, 'Santiago', 49),
(280, 'Cerrillos', 49),
(281, 'Cerro Navia', 49),
(282, 'Conchalí', 49),
(283, 'El Bosque', 49),
(284, 'Estación Central', 49),
(285, 'Huechuraba', 49),
(286, 'Independencia', 49),
(287, 'La Cisterna', 49),
(288, 'La Florida', 49),
(289, 'La Granja', 49),
(290, 'La Pintana', 49),
(291, 'La Reina', 49),
(292, 'Las Condes', 49),
(293, 'Lo Barnechea', 49),
(294, 'Lo Espejo', 49),
(295, 'Lo Prado', 49),
(296, 'Macul', 49),
(297, 'Maipú', 49),
(298, 'Ñuñoa', 49),
(299, 'Pedro Aguirre Cerda', 49),
(300, 'Peñalolén', 49),
(301, 'Providencia', 49),
(302, 'Pudahuel', 49),
(303, 'Quilicura', 49),
(304, 'Quinta Normal', 49),
(305, 'Recoleta', 49),
(306, 'Renca', 49),
(307, 'San Joaquín', 49),
(308, 'San Miguel', 49),
(309, 'San Ramón', 49),
(310, 'Vitacura', 49),
(311, 'Puente Alto', 50),
(312, 'Pirque', 50),
(313, 'San José de Maipo', 50),
(314, 'Colina', 51),
(315, 'Lampa', 51),
(316, 'Tiltil', 51),
(317, 'San Bernardo', 52),
(318, 'Buin', 52),
(319, 'Calera de Tango', 52),
(320, 'Paine', 52),
(321, 'Melipilla', 53),
(322, 'Alhué', 53),
(323, 'Curacaví', 53),
(324, 'María Pinto', 53),
(325, 'San Pedro', 53),
(326, 'Talagante', 54),
(327, 'El Monte', 54),
(328, 'Isla de Maipo', 54),
(329, 'Padre Hurtado', 54),
(330, 'Peñaflor', 54),
(331, 'Valdivia', 35),
(332, 'Corral', 35),
(333, 'Lanco', 35),
(334, 'Los Lagos', 35),
(335, 'Máfil', 35),
(336, 'Mariquina', 35),
(337, 'Paillaco', 35),
(338, 'Panguipulli', 35),
(339, 'La Unión', 36),
(340, 'Futrono', 36),
(341, 'Lago Ranco', 36),
(342, 'Río Bueno', 36),
(343, 'Arica', 1),
(344, 'Camarones', 1),
(345, 'Putre', 2),
(346, 'General Lagos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `token_carrito` text NOT NULL,
  `detalle` text NOT NULL,
  `monto` double NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token_tbk` text NOT NULL,
  `carrito` text NOT NULL,
  `rut` varchar(11) NOT NULL,
  `razon` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `comuna` int(4) NOT NULL,
  `region` int(4) NOT NULL,
  `giro` varchar(255) NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `token_carrito`, `detalle`, `monto`, `fecha`, `id_usuario`, `token_tbk`, `carrito`, `rut`, `razon`, `direccion`, `comuna`, `region`, `giro`, `telefono`, `email`, `estado`) VALUES
(1, '93434b74bbbe0402b29dfb8c87460dc8', '{\"accountingDate\":\"0915\",\"buyOrder\":\"1160099600\",\"cardDetail\":{\"cardNumber\":\"123\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"923454\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"289000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"1160099600\"},\"sessionId\":\"93434b74bbbe0402b29dfb8c87460dc8\",\"transactionDate\":\"2017-09-15T01:31:55.007-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 289000, '2017-09-15 01:31:55', 1, 'e02bad3c79c4095e1577fca454c3c1afb73b26d7ddf47c86d4c7f1484c512f68', '[{}]', '', '', '', 0, 0, '', 0, '', 0),
(2, 'add22a8c7c59a3fd5d285121478a7a0c', '{\"accountingDate\":\"0915\",\"buyOrder\":\"522522462\",\"cardDetail\":{\"cardNumber\":\"123\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"181705\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"289000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"522522462\"},\"sessionId\":\"add22a8c7c59a3fd5d285121478a7a0c\",\"transactionDate\":\"2017-09-15T01:32:55.973-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 289000, '2017-09-15 01:32:55', 1, 'e5930e2729052720002a7f51ff018cdb7cfe753ea757f1f8d3ae0ac75f4b3a79', '[{}]', '', '', '', 0, 0, '', 0, '', 0),
(3, 'a7078f941785fa338408fea9be1ddd35', '{\"accountingDate\":\"0915\",\"buyOrder\":\"1195019578\",\"cardDetail\":{\"cardNumber\":\"123\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"993172\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"289000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"1195019578\"},\"sessionId\":\"a7078f941785fa338408fea9be1ddd35\",\"transactionDate\":\"2017-09-15T01:46:48.951-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 289000, '2017-09-15 01:46:48', 1, 'eae695cac63947bc4254623853e37902da70c65f6e94d22fdecd818642cb2fd1', '[{}]', '', '', '', 0, 0, '', 0, '', 0),
(4, '957efff2fb2aaeb8fa78ec94aba59052', '{\"accountingDate\":\"0915\",\"buyOrder\":\"1736528711\",\"cardDetail\":{\"cardNumber\":\"123\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"217873\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"289000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"1736528711\"},\"sessionId\":\"957efff2fb2aaeb8fa78ec94aba59052\",\"transactionDate\":\"2017-09-15T02:10:14.109-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 289000, '2017-09-15 02:10:14', 1, 'e2c65aa2228bde9916f2b5b1908ba177fca737a41990cf60de681582882d04cb', '[{\"token\":\"957efff2fb2aaeb8fa78ec94aba59052\",\"id_usuario\":\"1\",\"id_prod\":\"1\",\"cantidad\":\"1\",\"fecha\":\"2017-09-15 07:49:19\",\"producto\":{\"id\":\"1\",\"nombre\":\"SISTEMA DE CONTABILIDAD GENERAL\",\"alcance\":\"Sistema basico para 1 usuario, 1 PC.\",\"ruta_imagen\":\"contabilidad.png\",\"descripcion\":\"\",\"monto\":\"361250\",\"activo\":null,\"montoOferta\":289000,\"porcentajeOferta\":\"20\"}}]', '', '', '', 0, 0, '', 0, '', 0),
(5, 'fa1fd843c5b1579c4b52baf562cce574', '{\"accountingDate\":\"0915\",\"buyOrder\":\"850461814\",\"cardDetail\":{\"cardNumber\":\"123\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"204713\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"289000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"850461814\"},\"sessionId\":\"fa1fd843c5b1579c4b52baf562cce574\",\"transactionDate\":\"2017-09-15T02:25:14.274-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 289000, '2017-09-15 02:25:14', 1, 'e27b39c8150ad57431280af0335e85e42544f0db65c6d87772fd24eca46ca122', '[{\"token\":\"fa1fd843c5b1579c4b52baf562cce574\",\"id_usuario\":\"1\",\"id_prod\":\"1\",\"cantidad\":\"1\",\"fecha\":\"2017-09-15 08:25:04\",\"producto\":{\"id\":\"1\",\"nombre\":\"SISTEMA DE CONTABILIDAD GENERAL\",\"alcance\":\"Sistema basico para 1 usuario, 1 PC.\",\"ruta_imagen\":\"contabilidad.png\",\"descripcion\":\"\",\"monto\":\"361250\",\"activo\":null,\"montoOferta\":289000,\"porcentajeOferta\":\"20\"}}]', '', '', '', 0, 0, '', 0, '', 0),
(6, '691c9247925d56b0a06f8fe35fe7b197', '{\"accountingDate\":\"0915\",\"buyOrder\":\"17948976\",\"cardDetail\":{\"cardNumber\":\"4656\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"150299\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"847000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"17948976\"},\"sessionId\":\"691c9247925d56b0a06f8fe35fe7b197\",\"transactionDate\":\"2017-09-15T04:59:45.313-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 847000, '2017-09-15 04:59:45', 1, 'e8b56c125303e7d12abb88da1f27e1101be9b29f6f48018ae0c39392090f1669', '[{\"token\":\"691c9247925d56b0a06f8fe35fe7b197\",\"id_usuario\":\"1\",\"id_prod\":\"1\",\"cantidad\":\"1\",\"fecha\":\"2017-09-15 10:38:49\",\"producto\":{\"id\":\"1\",\"nombre\":\"SISTEMA DE CONTABILIDAD GENERAL\",\"alcance\":\"Sistema basico para 1 usuario, 1 PC.\",\"ruta_imagen\":\"contabilidad.png\",\"descripcion\":\"\",\"monto\":\"361250\",\"activo\":null,\"montoOferta\":289000,\"porcentajeOferta\":\"20\"}},{\"token\":\"691c9247925d56b0a06f8fe35fe7b197\",\"id_usuario\":\"1\",\"id_prod\":\"3\",\"cantidad\":\"2\",\"fecha\":\"2017-09-15 10:40:28\",\"producto\":{\"id\":\"3\",\"nombre\":\"SISTEMA DE REMUNERACIONES\",\"alcance\":\"Sistema basico para 1 usuario, 1 PC.\",\"ruta_imagen\":\"remuneraciones.png\",\"descripcion\":\"\",\"monto\":\"348750\",\"activo\":null,\"montoOferta\":279000,\"porcentajeOferta\":\"20\"}}]', '', '', '', 0, 0, '', 0, '', 0),
(7, 'd78942afcd8a2cd32eefef1b567d1ea9', '{\"accountingDate\":\"0922\",\"buyOrder\":\"1182677048\",\"cardDetail\":{\"cardNumber\":\"3123\",\"cardExpirationDate\":null},\"detailOutput\":{\"authorizationCode\":\"292898\",\"paymentTypeCode\":\"VD\",\"responseCode\":0,\"sharesNumber\":0,\"amount\":\"568000\",\"commerceCode\":\"597020000541\",\"buyOrder\":\"1182677048\"},\"sessionId\":\"d78942afcd8a2cd32eefef1b567d1ea9\",\"transactionDate\":\"2017-09-22T19:12:29.221-04:00\",\"urlRedirection\":\"https:\\/\\/webpay3gint.transbank.cl\\/filtroUnificado\\/voucher.cgi\",\"VCI\":\"TSY\"}', 568000, '2017-09-22 19:12:29', 1, 'ecf7debdd02c7b52acd610bb9c80aa363b00479131e2cf133e57b1a29b93ce3f', '[{\"token\":\"d78942afcd8a2cd32eefef1b567d1ea9\",\"id_usuario\":\"1\",\"id_prod\":\"1\",\"cantidad\":\"1\",\"fecha\":\"2017-09-23 01:08:35\",\"producto\":{\"id\":\"1\",\"nombre\":\"SISTEMA DE CONTABILIDAD GENERAL\",\"alcance\":\"Sistema basico para 1 usuario, 1 PC.\",\"ruta_imagen\":\"contabilidad.png\",\"descripcion\":\"\",\"monto\":\"361250\",\"activo\":null,\"montoOferta\":289000,\"porcentajeOferta\":\"20\"}},{\"token\":\"d78942afcd8a2cd32eefef1b567d1ea9\",\"id_usuario\":\"1\",\"id_prod\":\"3\",\"cantidad\":\"1\",\"fecha\":\"2017-09-23 01:10:33\",\"producto\":{\"id\":\"3\",\"nombre\":\"SISTEMA DE REMUNERACIONES\",\"alcance\":\"Sistema basico para 1 usuario, 1 PC.\",\"ruta_imagen\":\"remuneraciones.png\",\"descripcion\":\"\",\"monto\":\"348750\",\"activo\":null,\"montoOferta\":279000,\"porcentajeOferta\":\"20\"}}]', '', '', '', 0, 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `prod_id` int(11) NOT NULL,
  `porcentaje` double NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`prod_id`, `porcentaje`, `fecha_fin`, `activo`) VALUES
(1, 20, '2100-01-01 23:59:59', 1),
(2, 20, '2100-01-01 23:59:59', 1),
(3, 20, '2100-01-01 23:59:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `alcance` text NOT NULL,
  `ruta_imagen` text NOT NULL,
  `descripcion` text NOT NULL,
  `monto` double NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `alcance`, `ruta_imagen`, `descripcion`, `monto`, `activo`) VALUES
(1, 'SISTEMA DE CONTABILIDAD GENERAL', 'Sistema basico para 1 usuario, 1 PC.', 'contabilidad.png', '', 361250, 1),
(2, 'SISTEMA DE CONTABILIDAD GENERAL IFRS', 'Sistema basico para 1 usuario, 1 PC.', 'contabilidad.png', '', 423750, 1),
(3, 'SISTEMA DE REMUNERACIONES', 'Sistema basico para 1 usuario, 1 PC.', 'remuneraciones.png', '', 348750, 1),
(4, 'SISTEMA DE GESTION COMERCIAL', 'Sistema basico para 1 usuario, 1 PC.', 'gestion.png', '', 431250, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(3) NOT NULL DEFAULT '0',
  `nombre` varchar(23) DEFAULT NULL,
  `id_region` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`, `id_region`) VALUES
(1, 'Arica', 15),
(2, 'Parinacota', 15),
(3, 'Iquique', 1),
(4, 'Tamarugal', 1),
(5, 'Antofagasta', 2),
(6, 'El Loa', 2),
(7, 'Tocopilla', 2),
(8, 'Copiapó', 3),
(9, 'Chañaral', 3),
(10, 'Huasco', 3),
(11, 'Elqui', 4),
(12, 'Choapa', 4),
(13, 'Limarí', 4),
(14, 'Valparaíso', 5),
(15, 'Isla de Pascua', 5),
(16, 'Los Andes', 5),
(17, 'Petorca', 5),
(18, 'Quillota', 5),
(19, 'San Antonio', 5),
(20, 'San Felipe de Aconcagua', 5),
(21, 'Marga Marga', 5),
(22, 'Cachapoal', 6),
(23, 'Cardenal Caro', 6),
(24, 'Colchagua', 6),
(25, 'Talca', 7),
(26, 'Cauquenes', 7),
(27, 'Curicó', 7),
(28, 'Linares', 7),
(29, 'Concepción', 8),
(30, 'Arauco', 8),
(31, 'Biobío', 8),
(32, 'Ñuble', 8),
(33, 'Cautín', 9),
(34, 'Malleco', 9),
(35, 'Valdivia', 14),
(36, 'Ranco', 14),
(37, 'Llanquihue', 10),
(38, 'Chiloé', 10),
(39, 'Osorno', 10),
(40, 'Palena', 10),
(41, 'Coihaique', 11),
(42, 'Aisén', 11),
(43, 'Capitán Prat', 11),
(44, 'General Carrera', 11),
(45, 'Magallanes', 12),
(46, 'Antártica Chilena', 12),
(47, 'Tierra del Fuego', 12),
(48, 'Última Esperanza', 12),
(49, 'Santiago', 13),
(50, 'Cordillera', 13),
(51, 'Chacabuco', 13),
(52, 'Maipo', 13),
(53, 'Melipilla', 13),
(54, 'Talagante', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` int(2) NOT NULL DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `nombre`) VALUES
(1, 'Tarapacá'),
(2, 'Antofagasta'),
(3, 'Atacama'),
(4, 'Coquimbo'),
(5, 'Valparaíso'),
(6, 'Región del Libertador Gral. Bernardo O’Higgins'),
(7, 'Región del Maule'),
(8, 'Región del Biobío'),
(9, 'Región de la Araucanía'),
(10, 'Región de Los Lagos'),
(11, 'Región Aisén del Gral. Carlos Ibáñez del Campo'),
(12, 'Región de Magallanes y de la Antártica Chilena'),
(13, 'Región Metropolitana de Santiago'),
(14, 'Región de Los Ríos'),
(15, 'Arica y Parinacota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `rut` int(10) NOT NULL,
  `empresa` tinyint(1) NOT NULL,
  `token` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `rut`, `empresa`, `token`, `pass`) VALUES
(1, 'enrique@gmail.com', 18247021, 0, '', '9a286406c252a3d14218228974e1f567'),
(6, 'enrique.s@gmail.com', 18247021, 0, '', '9a286406c252a3d14218228974e1f567'),
(7, 'enrique.saa@gmail.com', 18247021, 0, '', '202cb962ac59075b964b07152d234b70'),
(8, 'test@gmail.com', 18247021, 0, '', '9a286406c252a3d14218228974e1f567');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_usuario`,`id_prod`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COMUNA_PROVINCIA_ID` (`id_provincia`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PROVINCIA_REGION_ID` (`id_region`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
