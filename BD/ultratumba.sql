-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2020 a las 03:35:31
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ultratumba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `difuntos`
--

CREATE TABLE `difuntos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ape_pa` varchar(15) NOT NULL,
  `ape_ma` varchar(15) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_def` date NOT NULL,
  `ubicacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `difuntos`
--

INSERT INTO `difuntos` (`id`, `nombre`, `ape_pa`, `ape_ma`, `fecha_nac`, `fecha_def`, `ubicacion`) VALUES
(9, 'abelardo', 'fghj', 'gh', '2020-04-05', '2020-04-02', '1-1-2'),
(10, 'rtyu', 'fghj', 'fgh', '2020-04-05', '2020-04-07', '1-1-3'),
(11, 'Abelardo', 'Suarez', 'Vergara', '2020-04-01', '2020-04-10', '1-1-6'),
(12, 'sdfg', 'fgh', 'fghj', '2020-03-29', '2020-04-09', '1-1-5'),
(13, 'fghj', 'fghjk', 'ghjk', '2019-12-31', '2020-04-10', '1-1-7'),
(14, 'sdfgh', 'fghj', 'fghj', '2020-04-14', '2020-04-23', '1-1-8'),
(15, 'dfgh', 'fvgh', 'dfgh', '2020-03-29', '2020-04-06', '1-1-4'),
(16, 'rfghj', 'fghj', 'fghj', '2020-04-19', '2020-04-09', '1-1-9'),
(17, 'rtgh', 'fghj', 'fvgbhnj', '2020-04-21', '2020-04-17', '1-1-10'),
(18, 'rtgh', 'rfgth', 'vgbnu', '2020-04-06', '2020-04-17', '1-2-1'),
(19, 'tyi', 'vbn', 'tvybun', '2020-04-06', '2020-04-21', '1-1-11'),
(20, 'drftgbhnj', 'cvgbhnj', 'xcfgvbhnj', '2020-04-01', '2020-04-23', '1-1-12'),
(21, '', '', '', '0000-00-00', '0000-00-00', '1-1-13'),
(22, 'rftvbynu', 'cfvybuhn', 'ctfvgbhuni', '2020-04-23', '0000-00-00', '1-1-14'),
(23, '', '', '', '0000-00-00', '0000-00-00', '1-1-16'),
(24, '', '', '', '0000-00-00', '0000-00-00', '1-2-2'),
(25, '', '', '', '0000-00-00', '0000-00-00', '1-2-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fosas`
--

CREATE TABLE `fosas` (
  `ubicacion` varchar(10) NOT NULL,
  `s_top` varchar(30) NOT NULL,
  `s_left` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fosas`
--

INSERT INTO `fosas` (`ubicacion`, `s_top`, `s_left`, `estado`) VALUES
('1-1-1', '145', '560', 'apartada'),
('1-1-10', '150.988', '791.991', 'ocupada'),
('1-1-11', '132.988', '684.991', 'ocupada'),
('1-1-12', '151.988', '421.991', 'ocupada'),
('1-1-13', '190.988', '467.991', 'apartada'),
('1-1-14', '248', '766', 'apartada'),
('1-1-15', '23', '1023', 'Libre'),
('1-1-16', '217', '956', 'apartada'),
('1-1-17', '93', '1038', 'Libre'),
('1-1-2', '54', '268', 'ocupada'),
('1-1-3', '53', '325', 'ocupada'),
('1-1-4', '56', '378', 'ocupada'),
('1-1-5', '58', '433', 'pagos_lib'),
('1-1-6', '57', '474', 'pagos_oc'),
('1-1-7', '64', '517', 'pagos_lib'),
('1-1-8', '293', '393', 'ocupada'),
('1-1-9', '270', '533', 'ocupada'),
('1-2-1', '86', '443', 'ocupada'),
('1-2-2', '109', '673', 'apartada'),
('1-2-3', '240', '592', 'apartada'),
('1-2-4', '253', '942', 'Libre'),
('1-2-5', '216', '1141', 'Libre'),
('1-2-6', '48', '962', 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gobierno`
--

CREATE TABLE `gobierno` (
  `id` int(11) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `presidente` varchar(50) NOT NULL,
  `nombre_logo` varchar(30) NOT NULL,
  `imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE `objetos` (
  `id_num` int(50) NOT NULL,
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_top` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_left` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`) VALUES
('1', 'Sección 1'),
('2', 'Sección 2'),
('3', 'Sección 3'),
('4', 'Sección 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsecciones`
--

CREATE TABLE `subsecciones` (
  `id_num` int(11) NOT NULL,
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seccion` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subsecciones`
--

INSERT INTO `subsecciones` (`id_num`, `id`, `nombre`, `seccion`) VALUES
(1, '1', 'Subsección 1', '1'),
(2, '2', 'Subsección 2', '1'),
(3, '3', 'Subsección 3', '1'),
(4, '4', 'Subsección 4', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `User` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `User`, `password`, `Usuario`) VALUES
(0, 'Carlos', '$2y$10$NPoGdr1Pi2ZeBA/Zht/ScOtZMC/Hbo1SNfOqVsRDbPgqS4laSRVN6', 'Carlos'),
(0, 'Eduardo12', '$2y$10$Awn1eT9kJtuvKpspUBqUz.sOv7ZZBm/DX1B.3P42EDBRmiryIUePG', 'Eduardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `nombre_c` varchar(30) NOT NULL,
  `ape_pa` varchar(15) NOT NULL,
  `ape_ma` varchar(15) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `colonia` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `num_recibo` varchar(50) NOT NULL,
  `id_difunto` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `presidente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `nombre_c`, `ape_pa`, `ape_ma`, `calle`, `numero`, `colonia`, `fecha`, `referencia`, `num_recibo`, `id_difunto`, `usuario`, `presidente`) VALUES
(9, 'fghj', 'ghj', 'gfhj', 'fghj', 45, 'fgthyju', '2020-04-09', '', '345678', 9, 'jaime0', ''),
(10, 'ghj', 'ghj', 'ghjui', 'erty7u8', 5, 'dfrgtyu', '2020-04-09', '', '3456789', 10, 'jaime0', ''),
(11, 'Carlos', 'Vargas', 'Salazar', 'gonzales', 57, 'veracruz', '2020-04-10', '', '002', 11, 'jaime0', ''),
(12, 'tyuj', 'gvbhnjm', 'cvgbhnj', 'yubhinjkm', 9876, 'yvgbuhinj', '2020-04-10', '', '9876', 12, 'jaime0', ''),
(13, 'ghjk', 'hnjk', 'gbhjk', 'ghj', 987, 'hnjmkl', '2020-04-10', '', '098765678987', 13, 'jaime0', ''),
(14, 'fghj', 'ghjk', 'ghjk', '', NULL, '', '2020-04-10', '', '', 14, 'jaime0299', ''),
(15, 'fghj', 'fghj', 'fvghj', '', NULL, '', '2020-04-10', '', '', 15, 'jaime0299', ''),
(16, 'fgbhnj', 'fvgbhnj', 'fvgbhnjm', '', NULL, '', '2020-04-10', '', '', 16, 'jaime0299', ''),
(17, 'ftgyhu', 'crtvybun', 'crtvybun', '', NULL, '', '2020-04-10', '', '', 17, 'jaime0299', ''),
(18, 'fvtbynu', 'cvtbynu', 'cfvgb', '', NULL, '', '2020-04-10', '', '', 18, 'jaime0299', ''),
(19, 'vgbhnj', 'cfgvbhnj', 'cfgvbhnj', '', 0, '', '2020-04-10', '', '', 19, 'jaime0', ''),
(20, 'fvgbhnjmk', 'vtgbhnjm', 'cvgbhnjm', '', 0, '', '2020-04-10', '', '', 20, 'jaime0', ''),
(21, 'ftbynu', 'cvtbynuim', 'cvtbynu', '', 0, '', '2020-04-10', '', '', 21, 'jaime0', ''),
(22, 'ctfvgybhn', 'cftvybuhn', 'cftvybuhnij', '', 0, '', '2020-04-11', '', '', 22, 'jaime0', ''),
(23, 'drftgyh', 'crvtbynu', 'crvtbynu', '', 0, '', '2020-04-11', '', '', 23, 'jaime0', ''),
(24, 'ecrtvbynu', 'vtbynuim', 'cvtbynu', '', 0, '', '2020-04-11', '', '', 24, 'jaime0', ''),
(25, 'rftgbhnjm', 'cvtbynumi', 'cvtbyhnum', '', 0, '', '2020-04-11', '', '', 25, 'jaime0', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `difuntos`
--
ALTER TABLE `difuntos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ubicacion` (`ubicacion`);

--
-- Indices de la tabla `fosas`
--
ALTER TABLE `fosas`
  ADD PRIMARY KEY (`ubicacion`);

--
-- Indices de la tabla `gobierno`
--
ALTER TABLE `gobierno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objetos`
--
ALTER TABLE `objetos`
  ADD PRIMARY KEY (`id_num`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subsecciones`
--
ALTER TABLE `subsecciones`
  ADD PRIMARY KEY (`id_num`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`User`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_difunto` (`id_difunto`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `difuntos`
--
ALTER TABLE `difuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `gobierno`
--
ALTER TABLE `gobierno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objetos`
--
ALTER TABLE `objetos`
  MODIFY `id_num` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subsecciones`
--
ALTER TABLE `subsecciones`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `difuntos`
--
ALTER TABLE `difuntos`
  ADD CONSTRAINT `difuntos_ibfk_1` FOREIGN KEY (`ubicacion`) REFERENCES `fosas` (`ubicacion`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_difunto`) REFERENCES `difuntos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
