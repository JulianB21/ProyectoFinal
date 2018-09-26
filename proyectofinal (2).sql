-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2018 a las 05:31:19
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta_responsabilidad`
--

CREATE TABLE `acta_responsabilidad` (
  `IdActa` int(50) NOT NULL,
  `NumDocumentoAprendiz` int(50) NOT NULL,
  `IdEquipo` int(50) NOT NULL,
  `FechaActa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `IdAmbiente` int(50) NOT NULL,
  `IdPrograma` int(50) DEFAULT NULL,
  `NombreAmbiente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `UbicacionAmbiente` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`IdAmbiente`, `IdPrograma`, `NombreAmbiente`, `UbicacionAmbiente`) VALUES
(3, 38, 'ADSI 3', 'L'),
(4, 39, 'CASA SOLAR', 'ASDASD'),
(6, 38, 'L', 'FRENTE A TBT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `NumDocumentoAprendiz` int(50) NOT NULL,
  `NumeroFicha` int(50) NOT NULL,
  `NombreAprendiz` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TelefonoAprendiz` int(10) NOT NULL,
  `EmailAprendiz` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `IdArticulo` int(50) NOT NULL,
  `IdAmbiente` int(50) NOT NULL,
  `IdEquipo` int(50) DEFAULT NULL,
  `IdCategoria` int(50) NOT NULL,
  `TipoArticulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ModeloArticulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MarcaArticulo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CaracteristicaArticulo` text COLLATE utf8_spanish_ci,
  `EstadoArticulo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NumInventarioSena` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SerialArticulo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`IdArticulo`, `IdAmbiente`, `IdEquipo`, `IdCategoria`, `TipoArticulo`, `ModeloArticulo`, `MarcaArticulo`, `CaracteristicaArticulo`, `EstadoArticulo`, `NumInventarioSena`, `SerialArticulo`) VALUES
(9, 3, NULL, 2, 'MOUSE', 'FGDFG', 'SDFSF', '234324SDFSDF', 'ACTIVO', '343', '232'),
(11, 4, NULL, 2, 'Q', 'Q', 'Q', 'Q', 'DAÑADO', '1', 'q'),
(12, 4, NULL, 3, 'TECLADO', 'SDFS', 'HP', 'LAKSDJAKSDM ASDASD ASDK534 XCV', 'DAÑADO', 'djj58', 'hm6f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulonovedad`
--

CREATE TABLE `articulonovedad` (
  `IdArticulo` int(50) NOT NULL,
  `IdNovedad` int(50) NOT NULL,
  `TipoNovedad` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(50) NOT NULL,
  `NombreCategoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(2, 'IMPLEMENTOS DE DASDASDA'),
(3, 'TECNOLOGíAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `IdEquipo` int(50) NOT NULL,
  `TipoEquipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `EstadoEquipo` tinyint(1) NOT NULL,
  `ObservacionEquipo` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `NumeroFicha` int(50) NOT NULL,
  `IdPrograma` int(50) NOT NULL,
  `IdAmbiente` int(50) NOT NULL,
  `FechaInicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaFin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `JornadaFicha` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`NumeroFicha`, `IdPrograma`, `IdAmbiente`, `FechaInicio`, `FechaFin`, `JornadaFicha`) VALUES
(123123123, 38, 3, '11/11/2011', '22/02/2022', 'MAñANA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `IdNovedad` int(50) NOT NULL,
  `NumDocumentoUsuario` int(50) NOT NULL,
  `NumeroFicha` int(50) NOT NULL,
  `FechaNovedad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `IdPrograma` int(50) NOT NULL,
  `NombrePrograma` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DuracionPrograma` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TipoPrograma` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`IdPrograma`, `NombrePrograma`, `DuracionPrograma`, `TipoPrograma`) VALUES
(38, 'ADSI', '24 MESES', 'TECNOLOGO'),
(39, 'ANIMACIóN 3D', '24 MESES', 'TECNOLOGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NumDocumentoUsuario` int(50) NOT NULL,
  `IdPrograma` int(50) DEFAULT NULL,
  `NombreUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ContraseniaUsuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `RolUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FotoUsuario` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NumDocumentoUsuario`, `IdPrograma`, `NombreUsuario`, `ContraseniaUsuario`, `RolUsuario`, `FotoUsuario`) VALUES
(123, NULL, 'ADMINISTRADOR', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'ADMINISTRADOR', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta_responsabilidad`
--
ALTER TABLE `acta_responsabilidad`
  ADD PRIMARY KEY (`IdActa`),
  ADD KEY `NumDocumentoAprendiz` (`NumDocumentoAprendiz`),
  ADD KEY `IdEquipo` (`IdEquipo`);

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`IdAmbiente`),
  ADD KEY `IdPrograma` (`IdPrograma`);

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`NumDocumentoAprendiz`),
  ADD KEY `NumeroFicha` (`NumeroFicha`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`IdArticulo`),
  ADD KEY `IdAmbiente` (`IdAmbiente`),
  ADD KEY `IdEquipo` (`IdEquipo`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `articulonovedad`
--
ALTER TABLE `articulonovedad`
  ADD PRIMARY KEY (`IdArticulo`,`IdNovedad`),
  ADD KEY `IdNovedad` (`IdNovedad`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`IdEquipo`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`NumeroFicha`),
  ADD KEY `IdPrograma` (`IdPrograma`),
  ADD KEY `IdAmbiente` (`IdAmbiente`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`IdNovedad`),
  ADD KEY `NumDocumentoUsuario` (`NumDocumentoUsuario`),
  ADD KEY `NumeroFicha` (`NumeroFicha`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`IdPrograma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NumDocumentoUsuario`),
  ADD KEY `IdPrograma` (`IdPrograma`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta_responsabilidad`
--
ALTER TABLE `acta_responsabilidad`
  MODIFY `IdActa` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `IdAmbiente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `IdArticulo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `IdEquipo` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `IdNovedad` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `IdPrograma` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta_responsabilidad`
--
ALTER TABLE `acta_responsabilidad`
  ADD CONSTRAINT `acta_responsabilidad_ibfk_1` FOREIGN KEY (`NumDocumentoAprendiz`) REFERENCES `aprendiz` (`NumDocumentoAprendiz`),
  ADD CONSTRAINT `acta_responsabilidad_ibfk_2` FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`IdEquipo`);

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente_ibfk_1` FOREIGN KEY (`IdPrograma`) REFERENCES `programa` (`IdPrograma`);

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`NumeroFicha`) REFERENCES `ficha` (`NumeroFicha`);

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`IdAmbiente`) REFERENCES `ambiente` (`IdAmbiente`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`IdEquipo`),
  ADD CONSTRAINT `articulo_ibfk_3` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `articulonovedad`
--
ALTER TABLE `articulonovedad`
  ADD CONSTRAINT `articulonovedad_ibfk_1` FOREIGN KEY (`IdArticulo`) REFERENCES `articulo` (`IdArticulo`),
  ADD CONSTRAINT `articulonovedad_ibfk_2` FOREIGN KEY (`IdNovedad`) REFERENCES `novedad` (`IdNovedad`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`IdPrograma`) REFERENCES `programa` (`IdPrograma`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`IdAmbiente`) REFERENCES `ambiente` (`IdAmbiente`);

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`NumDocumentoUsuario`) REFERENCES `usuario` (`NumDocumentoUsuario`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`NumeroFicha`) REFERENCES `ficha` (`NumeroFicha`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdPrograma`) REFERENCES `programa` (`IdPrograma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
