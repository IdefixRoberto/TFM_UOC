-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2024 a las 21:32:25
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
-- Base de datos: `db_tfm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `options` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `datecreated`, `status`, `options`) VALUES
(1, 'Ameritrash', 'Jocs cooperatius', '2025-01-09 03:05:53', 1, ''),
(2, 'Filler', 'Jocs ràpids', '2014-08-05 03:06:02', 1, ''),
(3, 'Rol', 'Rol', '2024-10-16 03:04:33', 1, ''),
(4, 'Cartes', 'Jocs de cartes', '2024-09-30 03:04:46', 1, ''),
(5, 'Familiars', 'Jocs fàcils de jugar', '2024-10-22 03:05:23', 1, ''),
(6, 'Accesoris', 'Elements complementaris', '2024-10-04 02:52:12', 2, ''),
(7, 'Adults', 'Adults', '2024-10-17 13:05:32', 1, ''),
(8, 'LoveCraft', '', '2024-10-20 03:05:45', 1, ''),
(9, 'Kickstarter', '', '2024-10-04 00:00:00', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id` bigint(20) NOT NULL,
  `idproductoDetallComanda` bigint(20) DEFAULT NULL,
  `pedidoIDDetallComanda` bigint(20) DEFAULT NULL,
  `preu` decimal(10,2) DEFAULT NULL,
  `quantitatComandaDetall` int(11) DEFAULT NULL,
  `nomproductePedidoDetall` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id`, `idproductoDetallComanda`, `pedidoIDDetallComanda`, `preu`, `quantitatComandaDetall`, `nomproductePedidoDetall`, `subtotal`) VALUES
(1, 1, 36, 39.99, 1, '7 Wonders', 40.00),
(2, 6, 36, 29.99, 2, 'Carcassonne', 60.00),
(3, 8, 36, 34.99, 1, 'Circus Fun', 35.00),
(4, 14, 36, 39.99, 1, 'Dino Aventure', 40.00),
(5, 20, 36, 22.99, 1, 'Fairy Castle', 23.00),
(6, 23, 36, 14.99, 1, 'Aventura Animal', 15.00),
(7, 1, 37, 39.99, 1, '7 Wonders', 39.99),
(8, 6, 37, 29.99, 2, 'Carcassonne', 59.98),
(9, 8, 37, 34.99, 1, 'Circus Fun', 34.99),
(10, 14, 37, 39.99, 1, 'Dino Aventure', 39.99),
(11, 20, 37, 22.99, 1, 'Fairy Castle', 22.99),
(12, 23, 37, 14.99, 1, 'Aventura Animal', 14.99),
(13, 16, 38, 24.99, 1, 'Dragon’s Lair', 24.99),
(14, 26, 38, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(15, 11, 38, 24.99, 1, 'Codenames', 24.99),
(16, 16, 39, 24.99, 1, 'Dragon’s Lair', 24.99),
(17, 26, 39, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(18, 11, 39, 24.99, 1, 'Codenames', 24.99),
(19, 16, 40, 24.99, 1, 'Dragon’s Lair', 24.99),
(20, 26, 40, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(21, 11, 40, 24.99, 1, 'Codenames', 24.99),
(22, 16, 41, 24.99, 3, 'Dragon’s Lair', 74.97),
(23, 26, 41, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(24, 11, 41, 24.99, 1, 'Codenames', 24.99),
(25, 16, 42, 24.99, 3, 'Dragon’s Lair', 74.97),
(26, 26, 42, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(27, 11, 42, 24.99, 1, 'Codenames', 24.99),
(28, 16, 43, 24.99, 1, 'Dragon’s Lair', 24.99),
(29, 11, 43, 24.99, 1, 'Codenames', 24.99),
(30, 27, 43, 19.99, 1, 'Kitty Quest', 19.99),
(31, 9, 44, 59.99, 1, 'City Adventures', 59.99),
(32, 12, 44, 29.99, 1, 'Cubes de Recursos', 29.99),
(33, 35, 44, 40.00, 1, 'Pandemic', 40.00),
(34, 33, 44, 51.00, 1, 'Mysterium', 51.00),
(35, 4, 44, 64.99, 1, 'Apocalypse Rising', 64.99),
(36, 3, 45, 24.99, 1, 'Alien Invasion', 24.99),
(37, 5, 46, 44.99, 1, 'Azul', 44.99),
(38, 5, 47, 44.99, 1, 'Azul', 44.99),
(39, 5, 48, 44.99, 1, 'Azul', 44.99),
(40, 5, 49, 44.99, 1, 'Azul', 44.99),
(41, 5, 50, 44.99, 1, 'Azul', 44.99),
(42, 5, 51, 44.99, 1, 'Azul', 44.99),
(43, 5, 52, 44.99, 1, 'Azul', 44.99),
(44, 17, 53, 34.99, 2, 'Dungeon Siege', 69.98),
(45, 17, 54, 34.99, 2, 'Dungeon Siege', 69.98),
(46, 17, 54, 34.99, 2, 'Dungeon Siege', 69.98),
(47, 13, 54, 79.99, 7, 'Descent', 559.93),
(48, 13, 54, 79.99, 7, 'Descent', 559.93),
(49, 21, 54, 59.99, 3, 'Galactic Wars', 179.97),
(50, 21, 54, 59.99, 3, 'Galactic Wars', 179.97),
(51, 22, 54, 139.99, 3, 'Gloomhaven', 419.97),
(52, 22, 54, 139.99, 3, 'Gloomhaven', 419.97),
(53, 16, 55, 24.99, 5, 'Dragon’s Lair', 124.95),
(54, 16, 55, 24.99, 5, 'Dragon’s Lair', 124.95),
(55, 26, 55, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(56, 26, 55, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(57, 16, 56, 24.99, 5, 'Dragon’s Lair', 124.95),
(58, 16, 56, 24.99, 5, 'Dragon’s Lair', 124.95),
(59, 26, 56, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(60, 26, 56, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(61, 16, 57, 24.99, 5, 'Dragon’s Lair', 124.95),
(62, 16, 57, 24.99, 5, 'Dragon’s Lair', 124.95),
(63, 26, 57, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(64, 26, 57, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(65, 16, 58, 24.99, 5, 'Dragon’s Lair', 124.95),
(66, 16, 58, 24.99, 5, 'Dragon’s Lair', 124.95),
(67, 26, 58, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(68, 26, 58, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(69, 16, 59, 24.99, 5, 'Dragon’s Lair', 124.95),
(70, 16, 59, 24.99, 5, 'Dragon’s Lair', 124.95),
(71, 26, 59, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(72, 26, 59, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(73, 16, 60, 24.99, 5, 'Dragon’s Lair', 124.95),
(74, 16, 60, 24.99, 5, 'Dragon’s Lair', 124.95),
(75, 26, 60, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(76, 26, 60, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(77, 16, 61, 24.99, 5, 'Dragon’s Lair', 124.95),
(78, 16, 61, 24.99, 5, 'Dragon’s Lair', 124.95),
(79, 26, 61, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(80, 26, 61, 12.99, 5, 'Midnight Haunt: Party Edition', 64.95),
(81, 12, 62, 29.99, 1, 'Cubes de Recursos', 29.99),
(82, 12, 62, 29.99, 1, 'Cubes de Recursos', 29.99),
(83, 9, 62, 59.99, 1, 'City Adventures', 59.99),
(84, 9, 62, 59.99, 1, 'City Adventures', 59.99),
(85, 33, 62, 51.00, 1, 'Mysterium', 51.00),
(86, 33, 62, 51.00, 1, 'Mysterium', 51.00),
(87, 5, 62, 44.99, 1, 'Azul', 44.99),
(88, 5, 62, 44.99, 1, 'Azul', 44.99),
(89, 10, 62, 44.99, 1, 'Clank', 44.99),
(90, 10, 62, 44.99, 1, 'Clank', 44.99),
(91, 15, 62, 29.99, 1, 'Dixit', 29.99),
(92, 15, 62, 29.99, 1, 'Dixit', 29.99),
(93, 31, 62, 19.99, 1, 'Kingdomino', 19.99),
(94, 31, 62, 19.99, 1, 'Kingdomino', 19.99),
(95, 3, 62, 24.99, 1, 'Alien Invasion', 24.99),
(96, 3, 62, 24.99, 1, 'Alien Invasion', 24.99),
(97, 11, 63, 24.99, 1, 'Codenames', 24.99),
(98, 11, 63, 24.99, 1, 'Codenames', 24.99),
(99, 16, 63, 24.99, 1, 'Dragon’s Lair', 24.99),
(100, 16, 63, 24.99, 1, 'Dragon’s Lair', 24.99),
(101, 26, 63, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(102, 26, 63, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(103, 27, 63, 19.99, 1, 'Kitty Quest', 19.99),
(104, 27, 63, 19.99, 1, 'Kitty Quest', 19.99),
(105, 5, 63, 44.99, 1, 'Azul', 44.99),
(106, 5, 63, 44.99, 1, 'Azul', 44.99),
(107, 7, 63, 49.99, 1, 'Catan', 49.99),
(108, 7, 63, 49.99, 1, 'Catan', 49.99),
(109, 2, 63, 54.99, 1, 'Agricola', 54.99),
(110, 2, 63, 54.99, 1, 'Agricola', 54.99),
(111, 15, 63, 29.99, 1, 'Dixit', 29.99),
(112, 15, 63, 29.99, 1, 'Dixit', 29.99),
(113, 10, 63, 44.99, 1, 'Clank', 44.99),
(114, 10, 63, 44.99, 1, 'Clank', 44.99),
(115, 23, 63, 14.99, 1, 'Aventura Animal', 14.99),
(116, 23, 63, 14.99, 1, 'Aventura Animal', 14.99),
(117, 1, 63, 39.99, 1, '7 Wonders', 39.99),
(118, 1, 63, 39.99, 1, '7 Wonders', 39.99),
(119, 36, 63, NULL, 1, 'Shadow II: The Dark Dungeons', 0.00),
(120, 36, 63, NULL, 1, 'Shadow II: The Dark Dungeons', 0.00),
(121, 36, 64, 89.99, 1, 'Shadow II: The Dark Dungeons', 89.99),
(122, 36, 64, 89.99, 1, 'Shadow II: The Dark Dungeons', 89.99),
(123, 23, 64, 14.99, 1, 'Aventura Animal', 14.99),
(124, 23, 64, 14.99, 1, 'Aventura Animal', 14.99),
(125, 1, 65, 39.99, 2, '7 Wonders', 79.98),
(126, 1, 65, 39.99, 2, '7 Wonders', 79.98),
(127, 16, 65, 24.99, 1, 'Dragon’s Lair', 24.99),
(128, 16, 65, 24.99, 1, 'Dragon’s Lair', 24.99),
(129, 11, 65, 24.99, 1, 'Codenames', 24.99),
(130, 11, 65, 24.99, 1, 'Codenames', 24.99),
(131, 3, 65, 24.99, 1, 'Alien Invasion', 24.99),
(132, 3, 65, 24.99, 1, 'Alien Invasion', 24.99),
(133, 8, 65, 34.99, 1, 'Circus Fun', 34.99),
(134, 8, 65, 34.99, 1, 'Circus Fun', 34.99),
(135, 9, 65, 59.99, 3, 'City Adventures', 179.97),
(136, 9, 65, 59.99, 3, 'City Adventures', 179.97),
(137, 35, 65, 40.00, 1, 'Pandemic', 40.00),
(138, 35, 65, 40.00, 1, 'Pandemic', 40.00),
(139, 33, 65, 51.00, 1, 'Mysterium', 51.00),
(140, 33, 65, 51.00, 1, 'Mysterium', 51.00),
(141, 6, 65, 29.99, 1, 'Carcassonne', 29.99),
(142, 6, 65, 29.99, 1, 'Carcassonne', 29.99),
(143, 9, 66, 59.99, 1, 'City Adventures', 59.99),
(144, 9, 66, 59.99, 1, 'City Adventures', 59.99),
(145, 33, 66, 51.00, 1, 'Mysterium', 51.00),
(146, 33, 66, 51.00, 1, 'Mysterium', 51.00),
(147, 5, 66, 44.99, 1, 'Azul', 44.99),
(148, 5, 66, 44.99, 1, 'Azul', 44.99),
(149, 2, 66, 54.99, 1, 'Agricola', 54.99),
(150, 2, 66, 54.99, 1, 'Agricola', 54.99),
(151, 35, 66, 40.00, 1, 'Pandemic', 40.00),
(152, 35, 66, 40.00, 1, 'Pandemic', 40.00),
(153, 31, 66, 19.99, 1, 'Kingdomino', 19.99),
(154, 31, 66, 19.99, 1, 'Kingdomino', 19.99),
(155, 3, 66, 24.99, 1, 'Alien Invasion', 24.99),
(156, 3, 66, 24.99, 1, 'Alien Invasion', 24.99),
(157, 23, 67, 14.99, 1, 'Aventura Animal', 14.99),
(158, 23, 67, 14.99, 1, 'Aventura Animal', 14.99),
(159, 2, 67, 54.99, 1, 'Agricola', 54.99),
(160, 2, 67, 54.99, 1, 'Agricola', 54.99),
(161, 15, 67, 29.99, 1, 'Dixit', 29.99),
(162, 15, 67, 29.99, 1, 'Dixit', 29.99),
(163, 10, 67, 44.99, 1, 'Clank', 44.99),
(164, 10, 67, 44.99, 1, 'Clank', 44.99),
(165, 33, 67, 51.00, 1, 'Mysterium', 51.00),
(166, 33, 67, 51.00, 1, 'Mysterium', 51.00),
(167, 35, 67, 40.00, 1, 'Pandemic', 40.00),
(168, 35, 67, 40.00, 1, 'Pandemic', 40.00),
(169, 16, 68, 24.99, 1, 'Dragon’s Lair', 24.99),
(170, 16, 68, 24.99, 1, 'Dragon’s Lair', 24.99),
(171, 26, 68, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(172, 26, 68, 12.99, 1, 'Midnight Haunt: Party Edition', 12.99),
(173, 15, 69, 29.99, 1, 'Dixit', 29.99),
(174, 15, 69, 29.99, 1, 'Dixit', 29.99),
(175, 2, 69, 54.99, 1, 'Agricola', 54.99),
(176, 2, 69, 54.99, 1, 'Agricola', 54.99),
(177, 12, 69, 29.99, 1, 'Cubes de Recursos', 29.99),
(178, 12, 69, 29.99, 1, 'Cubes de Recursos', 29.99),
(179, 33, 69, 51.00, 1, 'Mysterium', 51.00),
(180, 33, 69, 51.00, 1, 'Mysterium', 51.00),
(181, 12, 70, 29.99, 4, 'Cubes de Recursos', 119.96),
(182, 12, 70, 29.99, 4, 'Cubes de Recursos', 119.96),
(183, 9, 70, 59.99, 1, 'City Adventures', 59.99),
(184, 9, 70, 59.99, 1, 'City Adventures', 59.99),
(185, 17, 70, 34.99, 3, 'Dungeon Siege', 104.97),
(186, 17, 70, 34.99, 3, 'Dungeon Siege', 104.97),
(187, 21, 70, 59.99, 1, 'Galactic Wars', 59.99),
(188, 21, 70, 59.99, 1, 'Galactic Wars', 59.99),
(189, 17, 71, 34.99, 1, 'Dungeon Siege', 34.99),
(190, 17, 71, 34.99, 1, 'Dungeon Siege', 34.99),
(191, 21, 71, 59.99, 1, 'Galactic Wars', 59.99),
(192, 21, 71, 59.99, 1, 'Galactic Wars', 59.99),
(193, 21, 72, 59.99, 1, 'Galactic Wars', 59.99),
(194, 21, 72, 59.99, 1, 'Galactic Wars', 59.99),
(195, 4, 72, 64.99, 1, 'Apocalypse Rising', 64.99),
(196, 4, 72, 64.99, 1, 'Apocalypse Rising', 64.99),
(197, 35, 72, 40.00, 3, 'Pandemic', 120.00),
(198, 35, 72, 40.00, 3, 'Pandemic', 120.00),
(199, 8, 72, 34.99, 1, 'Circus Fun', 34.99),
(200, 8, 72, 34.99, 1, 'Circus Fun', 34.99),
(201, 23, 72, 14.99, 1, 'Aventura Animal', 14.99),
(202, 23, 72, 14.99, 1, 'Aventura Animal', 14.99),
(203, 25, 72, 18.99, 1, 'ShadowFall', 18.99),
(204, 25, 72, 18.99, 1, 'ShadowFall', 18.99),
(205, 30, 72, 24.99, 1, 'Jungle Safari', 24.99),
(206, 30, 72, 24.99, 1, 'Jungle Safari', 24.99),
(207, 36, 72, 89.99, 1, 'Shadow II: The Dark Dungeons', 89.99),
(208, 36, 72, 89.99, 1, 'Shadow II: The Dark Dungeons', 89.99),
(209, 27, 73, 19.99, 2, 'Kitty Quest', 39.98),
(210, 27, 73, 19.99, 2, 'Kitty Quest', 39.98),
(211, 6, 73, 29.99, 1, 'Carcassonne', 29.99),
(212, 6, 73, 29.99, 1, 'Carcassonne', 29.99),
(213, 15, 73, 29.99, 1, 'Dixit', 29.99),
(214, 15, 73, 29.99, 1, 'Dixit', 29.99),
(215, 25, 74, 18.99, 1, 'ShadowFall', 18.99),
(216, 25, 74, 18.99, 1, 'ShadowFall', 18.99),
(217, 32, 74, 19.99, 1, 'Magic Garden', 19.99),
(218, 32, 74, 19.99, 1, 'Magic Garden', 19.99),
(219, 30, 74, 24.99, 1, 'Jungle Safari', 24.99),
(220, 30, 74, 24.99, 1, 'Jungle Safari', 24.99),
(221, 29, 74, 60.89, 1, 'Midnight Haunt', 60.89),
(222, 29, 74, 60.89, 1, 'Midnight Haunt', 60.89),
(223, 9, 74, 59.99, 1, 'City Adventures', 59.99),
(224, 9, 74, 59.99, 1, 'City Adventures', 59.99),
(225, 35, 74, 40.00, 2, 'Pandemic', 80.00),
(226, 35, 74, 40.00, 2, 'Pandemic', 80.00),
(227, 6, 75, 29.99, 1, 'Carcassonne', 29.99),
(228, 4, 75, 64.99, 1, 'Apocalypse Rising', 64.99),
(229, 5, 75, 44.99, 1, 'Azul', 44.99),
(230, 10, 75, 44.99, 1, 'Clank', 44.99),
(231, 7, 75, 49.99, 0, 'Catan', 0.00),
(232, 14, 75, 39.99, 0, 'Dino Aventure', 0.00),
(233, 24, 75, 16.99, 1, 'Joc Infantil 2', 16.99),
(234, 23, 76, 14.99, 1, 'Aventura Animal', 14.99),
(235, 35, 76, 40.00, 1, 'Pandemic', 40.00),
(236, 29, 76, 60.89, 1, 'Midnight Haunt', 60.89),
(237, 15, 76, 29.99, 1, 'Dixit', 29.99),
(238, 28, 77, 15.99, 2, 'Shadow', 31.98),
(239, 31, 77, 19.99, 1, 'Kingdomino', 19.99),
(240, 24, 77, 16.99, 1, 'Joc Infantil 2', 16.99),
(241, 32, 77, 19.99, 1, 'Magic Garden', 19.99),
(242, 31, 78, 19.99, 2, 'Kingdomino', 39.98),
(243, 15, 78, 29.99, 2, 'Dixit', 59.98),
(244, 16, 78, 24.99, 5, 'Dragon’s Lair', 124.95),
(245, 19, 78, 19.99, 1, 'Fairytales', 19.99),
(246, 7, 79, 49.99, 1, 'Catan', 49.99),
(247, 34, 79, 31.00, 1, 'Mystic Quest', 31.00),
(248, 14, 79, 39.99, 1, 'Dino Aventure', 39.99),
(249, 16, 80, 24.99, 1, 'Dragon’s Lair', 24.99),
(250, 30, 80, 24.99, 1, 'Jungle Safari', 24.99),
(251, 27, 80, 19.99, 1, 'Kitty Quest', 19.99),
(252, 36, 80, 113.00, 1, 'Shadow II: The Dark Dungeons', 113.00),
(253, 20, 80, 22.99, 1, 'Fairy Castle', 22.99),
(254, 33, 81, 51.00, 1, 'Mysterium', 51.00),
(255, 22, 81, 139.99, 1, 'Gloomhaven', 139.99),
(256, 30, 81, 24.99, 1, 'Jungle Safari', 24.99),
(257, 29, 82, 60.89, 1, 'Midnight Haunt', 60.89),
(258, 25, 83, 19.00, 1, 'Shadow Fall', 19.00),
(259, 11, 83, 24.99, 1, 'Codenames', 24.99),
(260, 23, 83, 14.99, 3, 'Aventura Animal', 44.97),
(261, 30, 84, 24.99, 5, 'Jungle Safari', 124.95),
(262, 25, 84, 19.00, 3, 'Shadow Fall', 57.00),
(263, 9, 85, 59.99, 2, 'City Adventures', 119.98),
(264, 21, 85, 59.99, 5, 'Galactic Wars', 299.95),
(265, 15, 86, 29.99, 5, 'Dixit', 149.95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `idDetallComanda` bigint(20) NOT NULL,
  `productoidDetall` bigint(20) DEFAULT NULL,
  `preu` decimal(11,2) DEFAULT NULL,
  `quantitatDetall` int(11) DEFAULT NULL,
  `toke` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuaris', 'Usuaris del sistema', 1),
(3, 'Clients', 'Clients de la tenda', 1),
(4, 'Productes', 'Todos los productes', 1),
(5, 'Comandes', 'Comandes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` bigint(20) NOT NULL,
  `personaid` bigint(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `tipopago` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nomComprador` varchar(255) NOT NULL,
  `cognomComprador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `personaid`, `fecha`, `importe`, `tipopago`, `status`, `nomComprador`, `cognomComprador`) VALUES
(2, 4, '2024-01-10 14:35:00', 49.99, '1', 1, '', ''),
(3, 5, '2024-01-11 09:12:00', 29.99, '2', 1, '', ''),
(4, 6, '2024-01-12 16:45:00', 59.99, '3', 1, '', ''),
(5, 7, '2024-01-13 11:20:00', 99.99, '1', 2, '', ''),
(6, 8, '2024-01-14 08:50:00', 19.99, '2', 1, '', ''),
(7, 9, '2024-01-15 17:30:00', 39.99, '3', 1, '', ''),
(8, 10, '2024-01-16 12:40:00', 44.99, '1', 2, '', ''),
(9, 11, '2024-01-17 15:15:00', 79.99, '1', 1, '', ''),
(10, 12, '2024-01-18 10:10:00', 69.99, '2', 2, '', ''),
(11, 13, '2024-01-19 18:55:00', 24.99, '1', 1, '', ''),
(12, 18, '2024-10-18 21:42:03', 159.96, '', 2, 'Laura ', 'Cognom'),
(13, 18, '2024-10-18 21:42:03', 219.94, '', 2, 'Laura ', 'Cognom'),
(14, 18, '2024-10-18 21:42:06', 159.96, 'transferencia', 2, 'Laura ', 'Cognom'),
(15, 18, '2024-10-18 21:42:06', 219.94, 'transferencia', 2, 'Laura ', 'Cognom'),
(16, 18, '2024-10-18 21:58:27', 159.96, '', 2, 'Laura ', 'Cognom'),
(17, 18, '2024-10-18 21:58:27', 219.94, '', 2, 'Laura ', 'Cognom'),
(18, 18, '2024-10-18 21:58:57', 199.95, '', 2, 'Laura ', 'Cognom'),
(19, 18, '2024-10-18 21:58:57', 259.93, '', 2, 'Laura ', 'Cognom'),
(20, 18, '2024-10-18 21:58:57', 294.92, '', 2, 'Laura ', 'Cognom'),
(21, 18, '2024-10-18 21:58:57', 334.91, '', 2, 'Laura ', 'Cognom'),
(22, 18, '2024-10-18 21:58:57', 357.90, '', 2, 'Laura ', 'Cognom'),
(23, 18, '2024-10-18 21:58:57', 372.89, '', 2, 'Laura ', 'Cognom'),
(24, 18, '2024-10-18 21:59:06', 199.95, 'transferencia', 2, 'Laura ', 'Cognom'),
(25, 18, '2024-10-18 21:59:06', 259.93, 'transferencia', 2, 'Laura ', 'Cognom'),
(26, 18, '2024-10-18 21:59:06', 294.92, 'transferencia', 2, 'Laura ', 'Cognom'),
(27, 18, '2024-10-18 21:59:06', 334.91, 'transferencia', 2, 'Laura ', 'Cognom'),
(28, 18, '2024-10-18 21:59:06', 357.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(29, 18, '2024-10-18 21:59:06', 372.89, 'transferencia', 2, 'Laura ', 'Cognom'),
(30, 18, '2024-10-18 22:05:29', 39.99, 'transferencia', 2, 'Laura ', 'Cognom'),
(31, 18, '2024-10-18 22:05:29', 99.97, 'transferencia', 2, 'Laura ', 'Cognom'),
(32, 18, '2024-10-18 22:05:29', 134.96, 'transferencia', 2, 'Laura ', 'Cognom'),
(33, 18, '2024-10-18 22:05:29', 174.95, 'transferencia', 2, 'Laura ', 'Cognom'),
(34, 18, '2024-10-18 22:05:29', 197.94, 'transferencia', 2, 'Laura ', 'Cognom'),
(35, 18, '2024-10-18 22:05:29', 212.93, 'transferencia', 2, 'Laura ', 'Cognom'),
(36, 18, '2024-10-18 22:36:37', 0.00, 'transferencia', 2, 'Laura ', 'Cognom'),
(37, 18, '2024-10-18 22:42:47', 0.00, 'transferencia', 2, 'Laura ', 'Cognom'),
(38, 18, '2024-10-18 22:49:05', 0.00, 'bizzum', 2, 'Laura ', 'Cognom'),
(39, 18, '2024-10-18 22:49:14', 0.00, 'transferencia', 2, 'Laura ', 'Cognom'),
(40, 18, '2024-10-18 22:49:58', 0.00, 'transferencia', 2, 'Laura ', 'Cognom'),
(41, 18, '2024-10-18 22:51:24', 0.00, 'bizzum', 2, 'Laura ', 'Cognom'),
(42, 18, '2024-10-18 22:52:18', 0.00, 'transferencia', 2, 'Laura ', 'Cognom'),
(43, 18, '2024-10-18 23:02:06', 0.00, 'transferencia', 2, 'Laura ', 'Cognom'),
(44, 18, '2024-10-18 23:16:56', 245.97, 'bizzum', 2, 'Laura ', 'Cognom'),
(45, 18, '2024-10-18 23:24:22', 180.93, 'transferencia', 2, 'Laura ', 'Cognom'),
(46, 18, '2024-10-18 23:29:49', 674.87, 'bizzum', 2, 'Laura ', 'Cognom'),
(47, 18, '2024-10-18 23:34:27', 674.87, 'transferencia', 2, 'Laura ', 'Cognom'),
(48, 18, '2024-10-18 23:35:45', 674.87, 'transferencia', 2, 'Laura ', 'Cognom'),
(49, 18, '2024-10-18 23:39:31', 674.87, 'transferencia', 2, 'Laura ', 'Cognom'),
(50, 18, '2024-10-18 23:41:28', 674.87, 'transferencia', 2, 'Laura ', 'Cognom'),
(51, 18, '2024-10-18 23:41:59', 674.87, 'transferencia', 2, 'Laura ', 'Cognom'),
(52, 18, '2024-10-18 23:43:18', 674.87, 'transferencia', 2, 'Laura ', 'Cognom'),
(53, 18, '2024-10-18 23:44:57', 1229.85, 'transferencia', 2, 'Laura ', 'Cognom'),
(54, 18, '2024-10-18 23:47:48', 1229.85, 'transferencia', 2, 'Laura ', 'Cognom'),
(55, 18, '2024-10-18 23:49:39', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(56, 18, '2024-10-18 23:51:29', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(57, 18, '2024-10-18 23:52:46', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(58, 18, '2024-10-18 23:56:13', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(59, 18, '2024-10-19 00:03:51', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(60, 18, '2024-10-19 00:04:43', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(61, 18, '2024-10-19 00:06:13', 189.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(62, 18, '2024-10-20 02:46:30', 305.93, 'bizzum', 2, 'Laura ', 'Cognom'),
(63, 18, '2024-10-20 02:47:55', 362.89, 'bizzum', 2, 'Laura ', 'Cognom'),
(64, 18, '2024-10-20 22:47:46', 104.98, 'transferencia', 2, 'Laura ', 'Cognom'),
(65, 18, '2024-10-21 08:12:54', 490.90, 'transferencia', 2, 'Laura ', 'Cognom'),
(66, 18, '2024-10-21 09:31:02', 295.95, 'bizzum', 2, 'Laura ', 'Cognom'),
(67, 18, '2024-10-21 09:32:03', 235.96, 'transferencia', 2, 'Laura ', 'Cognom'),
(68, 18, '2024-10-21 09:33:43', 37.98, 'transferencia', 2, 'Laura ', 'Cognom'),
(69, 18, '2024-10-21 09:39:35', 165.97, 'bizzum', 2, 'Laura ', 'Cognom'),
(70, 18, '2024-10-21 14:46:35', 344.91, 'bizzum', 2, 'Laura ', 'Cognom'),
(71, 18, '2024-10-21 14:53:11', 94.98, 'transferencia', 2, 'Laura ', 'Cognom'),
(72, 18, '2024-10-21 14:54:05', 428.93, 'bizzum', 2, 'Laura ', 'Cognom'),
(73, 18, '2024-10-21 14:55:52', 99.96, 'bizzum', 2, 'Laura ', 'Cognom'),
(74, 18, '2024-10-21 14:57:38', 264.85, 'bizzum', 2, 'Laura ', 'Cognom'),
(75, 18, '2024-10-21 14:59:56', 201.95, 'bizzum', 2, 'Laura ', 'Cognom'),
(76, 18, '2024-10-21 15:25:31', 145.87, 'bizzum', 2, 'Laura ', 'Cognom'),
(77, 18, '2024-10-23 15:16:16', 88.95, 'transferencia', 2, 'Laura', 'Cognom'),
(78, 18, '2024-10-23 16:11:23', 244.90, 'bizzum', 2, 'Laura', 'Cognom'),
(79, 23, '2024-10-23 16:13:43', 120.98, 'transferencia', 2, 'Client VIP Extre', 'CLIENT VIP'),
(80, 18, '2024-10-23 16:28:15', 205.96, 'transferencia', 2, 'Laura', 'Cognom'),
(81, 26, '2024-10-23 16:30:11', 215.98, 'bizzum', 2, 'Eqwq', 'Q23r2'),
(82, 18, '2024-11-25 23:42:33', 60.89, 'bizzum', 2, 'Laura', 'Cognom'),
(83, 18, '2024-11-26 21:53:16', 88.96, 'bizzum', 2, 'Laura', 'Cognom'),
(84, 30, '2024-11-26 22:25:22', 181.95, 'bizzum', 2, 'Sscc', 'Ccc'),
(85, 30, '2024-11-26 22:41:14', 419.93, 'bizzum', 2, 'Sscc', 'Ccc'),
(86, 32, '2024-11-27 21:08:00', 149.95, 'bizzum', 2, 'Fasqr34', 'Ddd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `u` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `d`, `u`) VALUES
(11, 2, 1, 1, 0, 0, 1),
(12, 2, 2, 1, 1, 1, 1),
(13, 2, 3, 1, 1, 1, 1),
(14, 2, 4, 1, 1, 1, 1),
(15, 2, 5, 1, 1, 1, 1),
(41, 3, 1, 0, 0, 0, 0),
(42, 3, 2, 1, 1, 0, 1),
(43, 3, 3, 1, 1, 0, 0),
(44, 3, 4, 1, 0, 0, 0),
(45, 3, 5, 0, 0, 0, 0),
(66, 7, 1, 0, 0, 0, 1),
(67, 7, 2, 0, 0, 0, 1),
(68, 7, 3, 0, 0, 0, 0),
(69, 7, 4, 0, 0, 0, 0),
(70, 7, 5, 0, 0, 0, 0),
(76, 9, 1, 0, 0, 0, 0),
(77, 9, 2, 0, 0, 0, 0),
(78, 9, 3, 0, 1, 0, 0),
(79, 9, 4, 1, 0, 0, 0),
(80, 9, 5, 0, 0, 0, 0),
(106, 6, 1, 0, 0, 0, 0),
(107, 6, 2, 0, 0, 0, 0),
(108, 6, 3, 0, 0, 0, 0),
(109, 6, 4, 0, 0, 0, 0),
(110, 6, 5, 0, 0, 0, 0),
(126, 10, 1, 1, 1, 1, 1),
(127, 10, 2, 0, 1, 0, 1),
(128, 10, 3, 0, 1, 0, 0),
(129, 10, 4, 0, 0, 0, 0),
(130, 10, 5, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) DEFAULT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `nomproducte` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `oferta` int(1) DEFAULT NULL,
  `reserva` tinyint(1) DEFAULT NULL,
  `fechaLanzamiento` date DEFAULT NULL,
  `outlet` int(11) DEFAULT NULL,
  `dificultat` varchar(10) DEFAULT NULL,
  `edat` varchar(5) DEFAULT NULL,
  `tempsDeJoc` int(2) DEFAULT NULL,
  `jugadores` int(17) DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`idproducto`, `categoriaid`, `codigo`, `nomproducte`, `descripcion`, `precio`, `stock`, `imagen`, `datecreated`, `status`, `oferta`, `reserva`, `fechaLanzamiento`, `outlet`, `dificultat`, `edat`, `tempsDeJoc`, `jugadores`, `idioma`, `editorial`) VALUES
(1, 1, 'LGTBI001', '7 Wonders', 'Joc de taula de civilitzacions de cartes.', 39.99, 15, '7wondes', '2024-10-04 09:24:49', 1, 1, 0, '2019-11-15', 0, 'Fàcil', '10+', 30, 2, 'Català', 'Asmodee'),
(2, 3, 'EURO002', 'Agricola', 'Eurogame sobre la gestió d’una granja.', 54.99, 12, 'agricola', '2024-10-04 09:24:49', 1, 0, 1, '2020-05-22', 0, 'Mitjana', '12+', 90, 1, 'Español', 'Devir'),
(3, 4, 'KIDS003', 'Alien Invasion', 'Joc infantil de supervivència espacial.', 24.99, 20, 'jocAliens', '2024-10-04 09:24:49', 1, 0, 0, '2021-02-10', 0, 'Fàcil', '6+', 20, 2, 'Anglès', 'Hasbro'),
(4, 2, 'COOP004', 'Apocalypse Rising', 'Joc cooperatiu de supervivència apocalíptica.', 64.99, 8, 'apocalypseRising', '2024-10-04 09:24:49', 1, 0, 1, '2023-01-10', 0, 'Difícil', '14+', 60, 1, 'Español', 'Edge'),
(5, 3, 'EURO005', 'Azul', 'Joc abstracte de creació de mosaics.', 44.99, 18, 'azul', '2024-10-04 09:24:49', 1, 0, 0, '2022-06-30', 0, 'Mitjana', '8+', 30, 2, 'Català', 'Plan B Games'),
(6, 1, 'LGTBI006', 'Carcassonne', 'Joc de construcció de ciutats i territoris.', 29.99, 25, 'Carcassonne', '2024-10-04 09:24:49', 1, 0, 0, '2022-10-05', 0, 'Fàcil', '7+', 30, 2, 'Català', 'Devir'),
(7, 3, 'EURO007', 'Catan', 'Clàssic joc de comerç i colonització d’illes.', 49.99, 10, 'catan', '2024-10-04 09:24:49', 1, 0, 1, '2019-09-01', 0, 'Mitjana', '10+', 60, 3, 'Español', 'Kosmos'),
(8, 4, 'KIDS008', 'Circus Fun', 'Joc infantil d’habilitat dins el món del circ.', 34.99, 14, 'circusFun', '2024-10-04 09:24:49', 1, 0, 0, '2024-05-01', 0, 'Fàcil', '6+', 20, 2, 'Anglès', 'Ludonova'),
(9, 2, 'COOP009', 'City Adventures', 'Joc cooperatiu d’aventures urbanes amb missions.', 59.99, 9, 'cityAdventures', '2024-10-04 09:24:49', 1, 0, 1, '2020-11-20', 0, 'Mitjana', '12+', 90, 1, 'Español', 'Edge'),
(10, 3, 'EURO010', 'Clank', 'Joc de creació de masmorres i recollida de tresors.', 44.99, 11, 'clank', '2024-10-04 09:24:49', 1, 0, 0, '2022-03-10', 0, 'Mitjana', '8+', 45, 2, 'Español', 'Dire Wolf Digital'),
(11, 5, 'PARTY011', 'Codenames', 'Joc competitiu d’endevinar paraules clau.', 24.99, 30, 'codenames', '2024-10-04 09:24:49', 1, 0, 0, '2019-12-01', 0, 'Fàcil', '12+', 15, 2, 'Català', 'Czech Games Edition'),
(12, 2, 'COOP012', 'Cubes de Recursos', 'Joc de gestió de recursos cooperatiu.', 29.99, 20, 'cubesderecursos', '2024-10-04 09:24:49', 1, 0, 0, '2022-07-20', 0, 'Mitjana', '16+', 30, 2, 'Català', 'Edge'),
(13, 6, 'COMP015', 'Descent', '\"Descent\" és un joc de taula d’aventures que combina elements de fantasia amb exploració de masmorres. Originalment publicat per Fantasy Flight Games, aquest joc ofereix una experiència immersiva en què un grup de jugadors assumeix els rols de valents herois que s’endinsen en terres perilloses per derrotar enemics i complir missions èpiques. Un altre jugador actua com el senyor fosc, el vilà, i controla monstres i trampes per desafiar els herois.', 79.99, 7, 'descent', '2024-10-04 09:24:49', 1, 0, 1, '2018-10-10', 0, 'Difícil', '14+', 120, 1, 'Español', 'Fantasy Flight Games'),
(14, 4, 'KIDS016', 'Dino Aventure', 'Joc infantil d’aventures amb dinosaures.', 39.99, 15, 'dinoAventure', '2024-10-04 09:24:49', 1, 0, 0, '2023-02-25', 0, 'Fàcil', '8+', 45, 2, 'Català', 'Pandasaurus Games'),
(15, 3, 'EURO017', 'Dixit', 'Joc de cartes per explicar històries amb imatges.', 29.99, 22, 'dixit', '2024-10-04 09:24:49', 1, 0, 0, '2022-01-15', 0, 'Fàcil', '8+', 30, 3, 'Español', 'Libellud'),
(16, 5, 'PARTY018', 'Dragon’s Lair', '\"Dragon’s Lair\" és un joc de taula d\'aventura èpica, on els jugadors s\'embarquen en una missió per explorar coves i castells plens de perills per enfrontar-se a dracs llegendaris. Cada jugador controla un heroi amb habilitats úniques, i junts hauran de col·laborar per superar trampes, monstres i, finalment, el poderós drac que guarda els tresors ocults.', 24.99, 18, 'dragoLair', '2024-10-04 09:24:49', 1, 0, 0, '2023-03-01', 0, 'Mitjana', '10+', 20, 2, 'Español', 'Edge'),
(17, 6, 'COMP019', 'Dungeon Siege', 'Joc competitiu de defensa de masmorres.', 34.99, 13, 'dungeonSiege', '2024-10-04 09:24:49', 1, 0, 0, '2024-09-15', 0, 'Fàcil', '8+', 45, 2, 'Català', 'Asmodee'),
(18, 3, 'EURO020', 'Everdell', 'Eurogame de gestió de recursos i desenvolupament.', 64.99, 10, 'everdell', '2024-10-04 09:24:49', 1, 0, 0, '2021-08-22', 0, 'Difícil', '14+', 60, 1, 'Español', 'Starling Games'),
(19, 4, 'KIDS021', 'Fairytales', 'Joc infantil basat en contes de fades.', 19.99, 25, 'fairytales', '2024-10-04 09:24:49', 1, 0, 0, '2023-03-10', 0, 'Fàcil', '6+', 20, 2, 'Anglès', 'Ludonova'),
(20, 4, 'KIDS022', 'Fairy Castle', 'Joc infantil de construcció d’un castell de fades.', 22.99, 30, 'fairycastle', '2024-10-04 09:24:49', 1, 0, 0, '2023-06-05', 0, 'Fàcil', '5+', 15, 1, 'Català', 'Haba'),
(21, 6, 'COMP026', 'Galactic Wars', 'Joc competitiu d’estratègia espacial.', 59.99, 12, 'galacticWars', '2024-10-04 09:26:16', 1, 0, 0, '2024-07-11', 0, 'Difícil', '12+', 90, 2, 'Español', 'Edge'),
(22, 6, 'COMP027', 'Gloomhaven', 'Joc cooperatiu de masmorres i aventures.', 139.99, 6, 'gloomhaven', '2024-10-04 09:26:16', 1, 0, 0, '2022-09-15', 0, 'Difícil', '14+', 120, 1, 'Anglès', 'Cephalofair Games'),
(23, 4, 'KIDS028', 'Aventura Animal', 'Els jugadors han de moure les seves fitxes amb forma d\'animal a través de diferents camins en un entorn natural ple de rius, muntanyes i arbres. Cada tirada dels daus amb símbols permet avançar, saltar obstacles com rius o recollir estrelles. És un joc senzill i divertit que ajuda els nens a desenvolupar la coordinació i la comprensió de les regles bàsiques mentre gaudeixen d\'una aventura en la natura.', 14.99, 50, 'Aventura_Animal', '2024-10-04 09:26:16', 1, 1, 0, '2023-03-10', 0, 'Fàcil', '4+', 10, 2, 'Català', 'Haba'),
(24, 4, 'KIDS029', 'Joc Infantil 2', 'Joc d’habilitat per a infants.', 16.99, 45, 'jocinfantil2', '2024-10-04 09:26:16', 1, 1, 0, '2023-06-05', 0, 'Fàcil', '5+', 15, 2, 'Català', 'Haba'),
(25, 1, 'KIDS030', 'Shadow Fall', '\"Shadowfall\" és un joc de taula d\'aventura i estratègia ambientat en un món de fantasia fosca, on els jugadors assumeixen el paper de herois lluitant contra criatures ombrívoles i forces malignes. El joc combina exploració, combats tàctics i la utilització de poderosos artefactes màgics per superar els perills que es troben en terres envoltades de foscor.', 19.00, 40, 'Shadowfall', '2024-10-04 09:26:16', 1, 0, 0, '2023-09-10', 0, 'Fàcil', '5+', 15, 2, 'Català', 'Haba'),
(26, 5, 'KIDS031', 'Midnight Haunt: Party Edition', '\"Midnight Haunt: Party Edition\" és una versió divertida i festiva del clàssic joc de cartes, ideal per a festes i reunions familiars. Amb una temàtica lleugerament esgarrifosa però alegre, els jugadors competeixen en desafiaments senzills i divertits mentre exploren un món ple de fantasmes simpàtics, bruixes i elements màgics.', 12.99, 60, 'jocFantasmes', '2024-10-04 09:26:16', 1, 0, 0, '2024-01-01', 0, 'Fàcil', '3+', 10, 2, 'Català', 'Haba'),
(27, 5, 'KIDS032', 'Kitty Quest', '\"Kitty Quest\" és un joc de cartes infantil dissenyat per als més petits, on els jugadors s\'embarquen en una divertida aventura amb gats simpàtics. A través d’una mecànica senzilla i dinàmica, els nens ajuden els gats a explorar mons fantàstics, descobrir tresors i completar missions mentre es diverteixen.', 19.99, 55, 'KittyQuest', '2024-10-04 09:26:16', 1, 0, 0, '2024-02-01', 0, 'Fàcil', '6+', 20, 2, 'Català', 'Haba'),
(28, 4, 'KIDS033', 'Shadow', '\"Shadow\" és un joc de cartes estratègic ambientat en un món de màgia fosca i criatures misterioses. Els jugadors han de construir un poderós conjunt de cartes per controlar forces ocultes, explorar camins secrets i derrotar monstres ombrívols. L\'objectiu és dominar la màgia de les ombres i utilitzar-la de manera tàctica per vèncer els altres jugadors o complir objectius màgics.', 15.99, 52, 'CartesShadow', '2024-10-04 09:26:16', 1, 0, 0, '2024-03-01', 0, 'Fàcil', '4+', 10, 2, 'Català', 'Haba'),
(29, 4, 'KIDS034', 'Midnight Haunt', '\"Midnight Haunt\" és un joc de cartes d\'horror sobrenatural, on els jugadors es troben atrapats en una ciutat coberta per la foscor i el misteri. Al llarg de la partida, han d\'investigar llocs encantats, enfrontar-se a criatures sobrenaturals i descobrir secrets ocults per sobreviure a la nit. Amb una atmosfera fosca i opressiva, el joc està ple d\'intrigues, encanteris i perills sobrenaturals.', 60.89, 48, 'midnighthaunt', '2024-10-04 09:26:16', 1, 0, 0, '2023-10-01', 0, 'Fàcil', '5+', 15, 2, 'Català', 'Haba'),
(30, 4, 'KIDS035', 'Jungle Safari', 'Joc d’aventures ambientat a la selva per a nens.', 24.99, 25, 'jungleSafari', '2024-10-04 09:26:16', 1, 0, 0, '2023-04-01', 0, 'Mitjana', '6+', 30, 2, 'Español', 'Haba'),
(31, 3, 'EURO036', 'Kingdomino', 'Joc de creació de regnes amb dominó.', 19.99, 22, 'Kingdomino', '2024-10-04 09:26:16', 1, 0, 0, '2022-05-10', 0, 'Fàcil', '8+', 15, 2, 'Català', 'Blue Orange Games'),
(32, 4, 'KIDS037', 'Magic Garden', 'Joc infantil d’aventures al jardí màgic.', 19.99, 30, 'magicGarden', '2024-10-04 09:26:16', 1, 0, 0, '2023-07-01', 0, 'Fàcil', '5+', 20, 2, 'Català', 'Haba'),
(33, 2, 'COOP042', 'Mysterium', 'Jocs cooperatius on els jugadors deuen unir les seues forces', 51.00, 2, 'mysterium', '2024-10-04 09:26:16', 1, 0, 1, '2024-10-18', 0, 'Mitjana', '10+', 1, 0, '1', '1'),
(34, 4, 'KIDS043', 'Mystic Quest', 'Jocs infantils', 31.00, 20, 'mysticQuest', '2024-10-04 09:26:16', 1, 0, 1, '2024-10-30', 1, 'Mitjana', '8+', 0, 0, '1', '0'),
(35, 2, 'COOP044', 'Pandemic', 'Jocs cooperatius on els jugadors deuen unir les seues forces', 40.00, 25, 'pandemic', '2024-10-04 09:26:16', 1, 0, 0, '2021-08-15', 0, 'Mitjana', '10+', 45, 2, 'Español', 'Z-Man Games'),
(36, 4, NULL, 'Shadow II: The Dark Dungeons', '\"Shadow II: The Dark Dungeons\" és la segona entrega del misteriós joc de cartes \"Shadow, que aprofundeix encara més en els perills i secrets d’un món de fantasia fosc. En aquesta expansió, els jugadors es troben atrapats en profundes masmorres plenes de criatures monstruoses, trampes antigues i tresors oblidats. Cada jugador assumeix el rol d\'un heroi amb habilitats úniques, i junts han de descobrir la sortida mentre desentranyen els misteris ocults a les ombres.', 113.00, 1, 'shadow2', NULL, 1, 1, 1, '2024-10-30', 1, '9', '14++', 100, 5, 'Espanyol', 'Noad'),
(37, 1, NULL, 'Hechiceras: Duel de Poder', 'Hechiceras: Duel de Poder', 145.00, 1, 'LluitaBruixes', NULL, 1, NULL, 1, '2024-10-24', 1, NULL, NULL, 100, 4, 'English', 'Bruixes'),
(38, 1, NULL, 'Regnes Enfrontats', 'En \"Regnes Enfrontats\", els jugadors assumeixen el rol de líders de diferents regnes de fantasia. L\'objectiu és expandir el teu territori, formar aliances amb altres regnes i defensar-te de les invasions enemigues mentre gestiones els teus recursos. Els jugadors hauran de prendre decisions estratègiques per construir ciutats, reclutar herois i guerrers, i fer ús de màgia per obtenir avantatges sobre els seus rivals. El joc combina elements de construcció de regnes amb tàctiques de combat.', 199.00, 1, 'Regnes_Enfrontats', NULL, 1, NULL, 1, '2025-03-21', 1, NULL, NULL, 100, 4, 'Catala', 'Amics dels jocs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre_rol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Té accés complet a totes les funcions del sistema', 1),
(2, 'Usuari final', 'Usuari normal amb accés limitat', 1),
(3, 'Moderador', 'Pot gestionar certs aspectes com comentaris o contingut que consideren', 1),
(4, 'Becaris', 'Becaris', 0),
(5, 'Becari', 'Becari', 0),
(6, 'Clients', 'Clients', 1),
(7, 'Beta', 'Rol en proves', 1),
(8, '', '', 0),
(9, 'Rol9', 'Rol9', 1),
(10, 'Rol id 10', '10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `cognoms` varchar(100) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `contrasenya` varchar(250) NOT NULL,
  `naixement` date DEFAULT NULL,
  `newsletter` int(11) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `toke` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `rolid` bigint(20) DEFAULT NULL,
  `identificacio` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `estat` int(1) NOT NULL,
  `sitaucio` int(1) NOT NULL,
  `direccio` varchar(255) NOT NULL,
  `imatgeUsuari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nom`, `cognoms`, `email`, `contrasenya`, `naixement`, `newsletter`, `sexe`, `toke`, `status`, `rolid`, `identificacio`, `telefono`, `estat`, `sitaucio`, `direccio`, `imatgeUsuari`) VALUES
(4, 'Joan', 'Garcia', 'joan.garcia@example.com', 'password123', '1985-06-15', 1, 'M', 'token1', 2, 2, 'DNI123456A', '7777777', 1, 0, '', 'Usuari1'),
(5, 'Maria', 'López', 'maria.lopez@example.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', '1990-02-25', 1, 'F', 'token2', 0, 3, 'DNI789101B', '666666666', 2, 0, '', ''),
(6, 'Pere', 'Sánchez', 'pere.sanchez@example.com', '965f69baefb60286c60262b40dcf40717a2227eef5db00c9b717d5de24453511', '1982-11-10', 1, 'M', 'token3', 1, 1, 'DNI111213C', '600000000', 1, 0, '', ''),
(7, 'Laura', 'Martínez', 'laura.martinez@example.com', '$2y$10$8OQ5T4eB//QmH0bCIhHygegc2asuEKNDEOgncjjJ8fvao7M9FjXRe', '1995-04-20', 0, 'F', 'token4', 0, 1, 'DNI141516D', '666666666', 1, 0, '', ''),
(8, 'Salvador', 'Peiro', 'prova5@prova.prova', '$2y$10$NECXTV7TZiN7xbzaGlj8re37vbs3fF.OkB/hPIoDZmnjykitbZCua', NULL, NULL, NULL, NULL, 0, 2, 'dnifFALSE', '666000001', 1, 0, '', ''),
(9, 'Asdfqrg', 'Qerde', 'peipal@uoc.edu', '$2y$10$hrs0ovHujGKAdCSOGmjPcukIadEJnd3dDSmM1vGmoHYjDPH9I8tka', NULL, NULL, NULL, NULL, 0, 1, 'Salva', '666666666', 2, 0, '', ''),
(10, 'Dgerwhr', 'Brhwrt', 'prova@prova.prova', '$2y$10$k5X3zoCD/OdfB4PfwskMkuAmK9BbL5OB/WBRCCphXEzETyH0hWI4m', NULL, NULL, NULL, NULL, 0, 1, 'adger', '666666666', 1, 0, '', ''),
(11, 'Provs', 'Proves', 'proves@proves2.gmail.com', '$2y$10$7j5XcwxX6brRigAs/GYfROhK.lKvwdPDaHk0W6CCBZc.V3hm8SDNK', NULL, NULL, NULL, NULL, 0, 2, 'Proves', '0', 2, 0, '', ''),
(12, 'Ahsrt', 'Sjtry', 'prova32@prova.prova', '$2y$10$MAw4ucB1CP8FpQ6Q7bslN.6DAKXISZru638XUkB.k4P2i6RKHtoey', NULL, NULL, NULL, NULL, 0, 1, 'gaaegse', '666666666', 1, 0, '', ''),
(13, 'Bzdzs', 'Bfzds', 'prova12@prova.prova', '$2y$10$x8caB0MiZCrmvENP0NqXQuwzANch6s83wjLpV8yx2NlTeXQ9JDCLy', NULL, NULL, NULL, NULL, 0, 1, 'baavwrbyn', '666666666', 1, 0, '', ''),
(14, 'Glvmorwgmbw', 'Bfzds', 'prova88@prova.prova', '$2y$10$0v3w2vklq24N4G5wa/drZOX4LwzM1rIY9pq5wVig3OUoWx7EIiQIu', NULL, NULL, NULL, NULL, NULL, 1, 'gaaegse435', '666666666', 1, 0, '', ''),
(15, 'Glvmorwgmbw', 'Oinwerfvowr', 'prova15@prova.prova', '$2y$10$crZtNVJ8peYA/XvXoGQvvufg8kJ6aivTNXE9.jKGch.PVcA.Wd93W', NULL, NULL, NULL, NULL, 0, 1, 'gaaegse43555', '666666666', 0, 0, '', ''),
(16, 'Prou', '2222', '2@2.com', '$2y$10$3LifUqpiulwoPPg3R0hUDeDBWhi.VMW/G0MA6NGIPhsd0zqyFSabO', NULL, NULL, NULL, NULL, 0, 1, '12', '22222', 0, 0, '', ''),
(17, '2', '2', '2@2.2', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 0, 2, '2', '222222', 1, 0, '', ''),
(18, 'Laura', 'Cognom', 'laura.1@1.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 1, 1, 'Laura81', '1324', 1, 0, '', 'Usuaria1'),
(19, 'Idefix', 'Roberto', '7@7.7.7', 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', NULL, NULL, NULL, NULL, 0, 1, 'idefix', '77777', 0, 0, '', ''),
(20, 'Idefix', 'Roberto', 'prova132@prova.prova', '6258a5e0eb772911d4f92be5b5db0e14511edbe01d1d0ddd1d5a2cb9db9a56ba', NULL, NULL, NULL, NULL, 0, 1, 'idefix2014', '666222222', 0, 0, '', ''),
(21, 'Nou Client', 'Nou Client', 'client@client.com', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', NULL, NULL, NULL, NULL, 1, 6, 'Nou Client', '666666666', 0, 0, '', ''),
(22, 'Client VIP', 'CLIENT VIP', 'client.vip@client.vip', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', NULL, NULL, NULL, NULL, 0, 2, 'B37141453', '900000000', 0, 0, '', ''),
(23, 'Client VIP Extre', 'CLIENT VIP', 'prova382@prova.prova', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 1, 6, 'B37141496', '900000000', 0, 0, '', ''),
(24, 'Client VIP2', 'CLIENT VIP2', 'prova3266@prova.prova', '6258a5e0eb772911d4f92be5b5db0e14511edbe01d1d0ddd1d5a2cb9db9a56ba', NULL, NULL, NULL, NULL, 0, 1, 'B37141451', '900000000', 0, 0, '', ''),
(25, '2', '2', 'provax32@prova.prova', 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', NULL, NULL, NULL, NULL, 0, 1, 'b00000000', '600000000', 0, 0, '', ''),
(26, 'Eqwq', 'Q23r2', 'laura.71@1.com', 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', NULL, NULL, NULL, NULL, 0, 6, 'B37147453', '900000000', 0, 0, '', ''),
(27, 'Sss', 'Sss', 'laura.5@1.com', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', NULL, NULL, NULL, NULL, 0, 6, '00000001T', '700000000', 0, 0, '', ''),
(28, 'EEE3333', 'EEE', 'laura.55881@1.com', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', NULL, NULL, NULL, NULL, 0, 2, '00000000r', '700000000', 0, 0, '', ''),
(29, 'Qqq222', 'Qqq', 'laura.sss1@1.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 0, 6, 'b00000001', '700000000', 0, 0, '', ''),
(30, 'Sscc', 'Ccc', 'laura2523.1@1.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 1, 6, 'a00000001', '700000000', 0, 0, '', ''),
(31, 'FFFFFF', 'FFF', 'laura.1113563@1.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 0, 6, 'A00000006', '700000000', 0, 0, '', ''),
(32, 'Fasqr34', 'Ddd', 'laura.th6441@1.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', NULL, NULL, NULL, NULL, 1, 6, 'a00000004', '700000000', 0, 0, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproducto` (`idproductoDetallComanda`),
  ADD KEY `pedidoID` (`pedidoIDDetallComanda`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`idDetallComanda`),
  ADD KEY `productoid` (`productoidDetall`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rolid` (`rolid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `idDetallComanda` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idproductoDetallComanda`) REFERENCES `productes` (`idproducto`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`pedidoIDDetallComanda`) REFERENCES `pedido` (`idpedido`);

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoidDetall`) REFERENCES `productes` (`idproducto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`);

--
-- Filtros para la tabla `productes`
--
ALTER TABLE `productes`
  ADD CONSTRAINT `productes_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
