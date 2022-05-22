-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2022 a las 14:08:29
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `promedik`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `inserted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `inserted_at`) VALUES
(1, 'Ray', '2426@outlook.couk', 'NOW30LKQ4JY', NULL),
(2, 'Diana', 'de@icloud.edu', 'TXO17ELF8ST', NULL),
(3, 'Genevieve', '6436@google.net', 'EHT77SQK5OF', NULL),
(4, 'Sybill', '2249@icloud.couk', 'BOR43GOO5HY', NULL),
(5, 'Salvador', '4395@google.net', 'CIJ25GAG4PT', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `inserted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`id`, `customer_id`, `total_amount`, `status_id`, `inserted_at`) VALUES
(5, 5, 100, 1, NULL),
(6, 5, 100, 1, NULL),
(7, 5, 200, 1, NULL),
(8, 5, 200, 1, NULL),
(9, 5, 200, 1, NULL),
(10, 5, 300, 1, NULL),
(11, 5, 300, 1, NULL),
(12, 5, 300, 1, NULL),
(13, 5, 150, 1, NULL),
(14, 5, 150, 1, NULL),
(15, 5, 150, 1, NULL),
(16, 5, 150, 1, NULL),
(17, 5, 150, 1, NULL),
(18, 5, 150, 1, NULL),
(19, 5, 150, 1, NULL),
(20, 5, 150, 1, NULL),
(21, 5, 50, 1, NULL),
(22, 5, 50, 1, NULL),
(23, 5, 50, 1, NULL),
(24, 5, 3360, 1, '2022-05-22 14:07:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inserted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `order_line`
--

INSERT INTO `order_line` (`id`, `order_id`, `product_id`, `quantity`, `inserted_at`) VALUES
(3, 9, 1, 2, NULL),
(6, 15, 6, 1, NULL),
(7, 15, 6, 1, NULL),
(11, 19, 6, 1, NULL),
(12, 20, 6, 1, NULL),
(13, 21, 7, 1, NULL),
(14, 22, 7, 1, NULL),
(15, 23, 7, 1, NULL),
(16, 24, 1, 12, '2022-05-22 14:07:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `inserted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `stock`, `inserted_at`) VALUES
(1, 'KN95', 'https://cdn.discordapp.com/attachments/977886466904576000/977886511435501598/kn95.jpg', 280, 10, NULL),
(2, 'KF94', 'https://cdn.discordapp.com/attachments/977886466904576000/977886511066394644/kf94.jpg', 300, 10, NULL),
(3, 'N95', 'https://cdn.discordapp.com/attachments/977886466904576000/977886511783637012/n95.jpg', 200, 10, NULL),
(4, 'Bata', 'https://cdn.discordapp.com/attachments/975553476992053300/975553541156515911/kn95.png', 150, 10, NULL),
(5, 'Sabanas para hospital', 'https://cdn.discordapp.com/attachments/977886466904576000/977886510298849340/sabanas.jpg', 150, 10, NULL),
(6, 'Overol desechable', 'https://cdn.discordapp.com/attachments/977886466904576000/977886509980078110/overol.jpg', 150, 10, NULL),
(7, 'Gel Desinfectante', 'https://cdn.discordapp.com/attachments/977886466904576000/977887428843024424/gel.png', 50, 2, NULL),
(8, 'Botas sanitarias', 'https://cdn.discordapp.com/attachments/977886466904576000/977888126741663774/botas.png', 250, 2, NULL),
(9, 'Guantes', 'https://cdn.discordapp.com/attachments/977886466904576000/977888331843141683/guantes.png', 200, 5, NULL),
(10, 'Toallitas', 'https://cdn.discordapp.com/attachments/977886466904576000/977888596990230568/toalla.png', 60, 2, NULL),
(11, 'Desinfectante', 'https://cdn.discordapp.com/attachments/977886466904576000/977889114324074506/desinfectante.png', 160, 20, NULL),
(12, 'Careta protectora', 'https://cdn.discordapp.com/attachments/977886466904576000/977889428703952916/unknown.png', 50, 50, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `inserted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `inserted_at`) VALUES
(1, 'Solicitud de pedido', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_customer_name` (`name`),
  ADD UNIQUE KEY `uc_customer_email` (`email`),
  ADD KEY `idx_customer_name` (`name`),
  ADD KEY `idx_customer_email` (`email`);

--
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_customer_id` (`customer_id`),
  ADD KEY `fk_order_status_id` (`status_id`);

--
-- Indices de la tabla `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_line_with_order_id` (`order_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_product_name` (`name`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_status_name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_order_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `fk_order_line_with_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
