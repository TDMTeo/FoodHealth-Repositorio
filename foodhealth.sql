-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2020 a las 19:51:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foodhealth`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(13) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(20) NOT NULL,
  `idNutricionista` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idSede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `idAlimento` int(11) NOT NULL,
  `idTipoAlimento` int(11) NOT NULL,
  `nombreAlimento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `idBarrio` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`idBarrio`, `nombre`, `idZona`, `idSede`) VALUES
(1, 'Popular 1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `idCalendario` int(11) NOT NULL,
  `idPlato` int(11) NOT NULL,
  `dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL,
  `Valoracion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chefs`
--

CREATE TABLE `chefs` (
  `idChef` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(13) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `estado`) VALUES
(1, 'Finalizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `celular` char(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `empresa` varchar(30) NOT NULL,
  `ocupacion` varchar(30) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `idValoracion` int(11) NOT NULL,
  `idDetalleSeguimiento` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idSede` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `n_Documento`, `celular`, `correo`, `empresa`, `ocupacion`, `idTipoDocumento`, `idCita`, `idValoracion`, `idDetalleSeguimiento`, `direccion`, `idSede`, `idVenta`, `idUsuario`) VALUES
(1, 'Mateo ', 'Arias', 1000757548, '3103857765', 'nautilius92@gmail.com', 'Xenco S.A', 'Desarrollador', 1, 1, 3, 1, 'Cr 108a #46-37', 1, 1, 3),
(2, 'Miguel', 'Ramirez', 1000234956, '31031952', 'Miguelito@gmail.com', 'Xenco SA', 'Desarrollador', 1, 1, 3, 1, 'Cr 120a #16-12', 1, 1, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocineros`
--

CREATE TABLE `cocineros` (
  `idCocinero` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(13) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `idPais`) VALUES
(1, 'Antioquia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleseguimiento`
--

CREATE TABLE `detalleseguimiento` (
  `idDetalleSeguimiento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleseguimiento`
--

INSERT INTO `detalleseguimiento` (`idDetalleSeguimiento`, `nombre`) VALUES
(1, 'Nombre del Primer Seguimiento ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_plato`
--

CREATE TABLE `detalle_plato` (
  `idDetallePlato` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idPlato` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `idBarrio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `direccion`, `idBarrio`) VALUES
(2, 'Cr 108a #46-37 int 105', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `iddomiciliario` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(13) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domiciliario`
--

INSERT INTO `domiciliario` (`iddomiciliario`, `idTipoDocumento`, `n_Documento`, `nombres`, `apellidos`, `telefono`, `idMunicipio`, `direccion`, `idUsuario`, `codigopostal`, `aboutme`, `estado`, `foto`) VALUES
(19, 1, 2147483647, 'Mateo', 'Domiciliario ', 1231231231, 1, '123123123123', 20, 1231231231, 'descripcion del domiciliario creado modificado sdasd\r\n\r\n', 1, 'photos/2147483647/thumb-1920-607701.png'),
(20, 1, 1000757548, 'Miguel', 'Ramirez Medina', 31231231, 1, 'Cr 120a #16-12', 23, 531222, 'Descripcion del domiciliario miguelddd\r\n', 1, NULL),
(60, 1, 233232, 'Domiciliario', 'De Prueba Modificado', 323223, 1, 'Cr 120a #16-12', 63, 3102, 'saasddasd', 0, 'photos/233232/'),
(61, 1, 1234567890, 'Domiciliario', 'de Prueba', 232323, 1, 'Cr 120a #16-12', 24, 31021233, 'Descripcion del domiciliario ', 1, 'photos/1234567890/55f8e9e7807f8ed261a3fec3f06538b80783f4fdd3ec8e6bab7940b5c269935f_1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `Estado`) VALUES
(1, 'En Espera'),
(2, 'En ruta'),
(3, 'Entregado'),
(4, 'En Complicaciones'),
(5, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefe_logistica`
--

CREATE TABLE `jefe_logistica` (
  `idjefe_logistica` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(13) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jefe_logistica`
--

INSERT INTO `jefe_logistica` (`idjefe_logistica`, `idTipoDocumento`, `n_Documento`, `nombres`, `apellidos`, `telefono`, `idMunicipio`, `direccion`, `idUsuario`, `codigopostal`, `aboutme`, `foto`) VALUES
(1, 1, 1000757548, 'Mateo', 'Arias Ruiz', 310385776, 1, 'Cr 108a #46-37 int 105', 1, 300300, 'Descripcion de mateo modificada ', 'photos/1000757548/a03cec8a0b031760ba0f44e8de1963bd.jpg'),
(2, 1, 1000757548, 'Jefe', 'logistica', 2147483647, 1, 'Cr 108a #46-37 int 105', 2, 232324, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idDeparamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `nombre`, `idDeparamento`) VALUES
(1, 'Medellin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `asunto` varchar(60) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL,
  `hora_envio` time DEFAULT NULL,
  `leido` varchar(30) DEFAULT NULL,
  `fecha_lectura` date DEFAULT NULL,
  `hora_lectura` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `de`, `para`, `asunto`, `mensaje`, `fecha_envio`, `hora_envio`, `leido`, `fecha_lectura`, `hora_lectura`) VALUES
(14, 20, 1, 'Cambio de estado en el pedido ', 'Se ha cambiado el estado de un pedido a complicaciones', '2020-03-31', '15:41:40', 'no', '2020-03-31', '15:41:40'),
(15, 20, 1, 'Cambio de estado en el pedido ', 'Se ha cambiado el estado de un pedido Probando', '2020-03-31', '15:41:40', 'no', '2020-03-31', '15:41:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutricionista`
--

CREATE TABLE `nutricionista` (
  `idNutricionista` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `n_Documento` int(13) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(13) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `aboutme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idTipoPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idPago`, `nombre`, `idTipoPago`) VALUES
(1, 'Nombre del primer Pago ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `nombre`) VALUES
(1, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idPaquete` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tiempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idPaquete`, `nombre`, `tiempo`) VALUES
(1, 'Paquete de valoracion Principa', '2020-03-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idRuta` int(11) DEFAULT NULL,
  `idEstado` int(11) NOT NULL,
  `FechaEntrega` varchar(45) DEFAULT NULL,
  `CodigoQR` varchar(45) DEFAULT NULL,
  `DireccionPredeterminada` varchar(45) DEFAULT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idRuta`, `idEstado`, `FechaEntrega`, `CodigoQR`, `DireccionPredeterminada`, `idCliente`) VALUES
(14, NULL, 2, '18-02-20', 'CodigosGenerados/1000757548/14.png', 'Cr 108a #46-37 1', 1),
(15, 47, 2, '18-03-20', 'CodigosGenerados/1000757548/15.png', 'Cr 108a #46-37 2', 1),
(16, 47, 2, '18-15-20', 'CodigosGenerados/1000234956/16.png', 'Cr 25 #32-3a ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `idPlato` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idTipoPlato` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
  `idPQR` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idCalificacion` int(11) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparacionalimento`
--

CREATE TABLE `preparacionalimento` (
  `idPreparacionAlimento` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idIngrediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparacion_plato`
--

CREATE TABLE `preparacion_plato` (
  `idPreparacion_Plato` int(11) NOT NULL,
  `idPlato` int(11) NOT NULL,
  `idChef` int(11) NOT NULL,
  `idCocinero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `idCalendario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(2, 'Cliente'),
(6, 'Jefe de Logistica'),
(7, 'Domiciliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `idRuta` int(11) NOT NULL,
  `idJefeLogistica` int(11) NOT NULL,
  `idDomiciliario` int(11) NOT NULL,
  `Tiempo_Aproximado` varchar(45) DEFAULT NULL,
  `Tiempo_Estimado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`idRuta`, `idJefeLogistica`, `idDomiciliario`, `Tiempo_Aproximado`, `Tiempo_Estimado`) VALUES
(46, 1, 19, '1:00:00', NULL),
(47, 1, 61, '1:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idSede` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `nombre`) VALUES
(1, 'Nombre de la primera Sede');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocita`
--

CREATE TABLE `tipocita` (
  `idTipoCita` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipoDocumento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `nombre`) VALUES
(1, 'Cedula'),
(2, 'Tarjeta de identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipoPago` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipoPago`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_alimento`
--

CREATE TABLE `tipo_alimento` (
  `idTipoAlimento` int(11) NOT NULL,
  `nombreTipo` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plato`
--

CREATE TABLE `tipo_plato` (
  `idTipoPlato` int(11) NOT NULL,
  `nombrePlato` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Usuario`, `Correo`, `Clave`, `Perfil`) VALUES
(1, 'JefeLogistica', 'nautilius92@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 6),
(2, 'Admin', 'jefelogistica@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 6),
(20, 'Teoxxxx', 'domiciliario@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 7),
(23, 'Miguel', 'Miguelito@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 7),
(24, 'Domiciliario', 'Domiciliariodeprueba@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 7),
(25, 'Teoxxxx', 'asdasdasdasdasdasdasd@asdasdsad.com', 'b4327b75666adfcc9ec0fcf10401757b', 7),
(59, 'Usuario', 'usuario@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 7),
(60, 'eqweqwe', 'dasadsd@adasd', 'f5bb0c8de146c67b44babbf4e6584cc0', 7),
(61, 'weweweqwew', '123123123@23dasd', 'b7ea72ad86bfa528f6d6b56ff8c023b8', 7),
(62, 'asdasd', '12312321dasda@dadsad', 'ec02c59dee6faaca3189bace969c22d3', 7),
(63, 'asd', 'asd@asd', '7815696ecbf1c96e6894b779456d330e', 7),
(64, 'Domiciliario', 'domiciliario@prueba.com', 'e807f1fcf82d132f9bb018ca6738a19f', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `idValoracion` int(11) NOT NULL,
  `estatura` int(11) NOT NULL,
  `medidaCuello` int(11) NOT NULL,
  `medidaBusto` int(11) NOT NULL,
  `medidaCintura` int(11) NOT NULL,
  `medidaCadera` int(11) NOT NULL,
  `pesoActual` int(11) NOT NULL,
  `pesoDeseado` int(11) NOT NULL,
  `pesoIdeal` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `contestura` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `idDetalleSeguimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idValoracion`, `estatura`, `medidaCuello`, `medidaBusto`, `medidaCintura`, `medidaCadera`, `pesoActual`, `pesoDeseado`, `pesoIdeal`, `edad`, `contestura`, `tiempo`, `idDetalleSeguimiento`) VALUES
(3, 2, 32, 23, 32, 23, 80, 50, 45, 18, 2, 29, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idPago` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fecha`, `idPago`, `idPaquete`) VALUES
(1, '2020-03-03', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZona`, `nombre`, `idMunicipio`) VALUES
(1, 'Nororiental', 1),
(2, 'Noroccidental', 1),
(3, 'Centro Oriental', 1),
(4, 'Centro Occidental', 1),
(5, 'Suroriental', 1),
(6, 'Suroccidental', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD KEY `Fk_T_Admin` (`idTipoDocumento`),
  ADD KEY `Fk_Admin_C` (`idMunicipio`),
  ADD KEY `Fk_Admin_U` (`idUsuario`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `idNutricionista` (`idNutricionista`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idUsuario1` (`idUsuario`),
  ADD KEY `idSede3` (`idSede`),
  ADD KEY `idCita2` (`idCita`);

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idAlimento`),
  ADD KEY `Fk_T_Alimento` (`idTipoAlimento`);

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`idBarrio`),
  ADD KEY `idZona` (`idZona`),
  ADD KEY `idSede` (`idSede`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`idCalendario`),
  ADD KEY `Fk_1Plato` (`idPlato`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`);

--
-- Indices de la tabla `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`idChef`),
  ADD KEY `Fk_T_Chef` (`idTipoDocumento`),
  ADD KEY `Fk_chef_C` (`idMunicipio`),
  ADD KEY `Fk_chef_U` (`idUsuario`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idCita1` (`idCita`),
  ADD KEY `idValoracion` (`idValoracion`),
  ADD KEY `idDetalleSeguimiento1` (`idDetalleSeguimiento`),
  ADD KEY `idSede2` (`idSede`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `cocineros`
--
ALTER TABLE `cocineros`
  ADD PRIMARY KEY (`idCocinero`),
  ADD KEY `Fk_cosi` (`idTipoDocumento`),
  ADD KEY `Fk_cosi_C` (`idMunicipio`),
  ADD KEY `Fk_cisi_U` (`idUsuario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`),
  ADD KEY `idPais` (`idPais`);

--
-- Indices de la tabla `detalleseguimiento`
--
ALTER TABLE `detalleseguimiento`
  ADD PRIMARY KEY (`idDetalleSeguimiento`);

--
-- Indices de la tabla `detalle_plato`
--
ALTER TABLE `detalle_plato`
  ADD PRIMARY KEY (`idDetallePlato`),
  ADD KEY `Fk_T_Detalle_Plato` (`idAlimento`),
  ADD KEY `Fk_T_Plato` (`idPlato`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `idBarrio` (`idBarrio`);

--
-- Indices de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD PRIMARY KEY (`iddomiciliario`),
  ADD KEY `Fk_T_Do_Tip` (`idTipoDocumento`),
  ADD KEY `Fk_Do_Muni` (`idMunicipio`),
  ADD KEY `Fk_Do_Usu` (`idUsuario`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `jefe_logistica`
--
ALTER TABLE `jefe_logistica`
  ADD PRIMARY KEY (`idjefe_logistica`),
  ADD KEY `Fk_T_JL_Tip` (`idTipoDocumento`),
  ADD KEY `Fk_JL_Muni` (`idMunicipio`),
  ADD KEY `Fk_JL_Usu` (`idUsuario`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `idDepartamento` (`idDeparamento`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `de` (`de`),
  ADD KEY `para` (`para`);

--
-- Indices de la tabla `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD PRIMARY KEY (`idNutricionista`),
  ADD KEY `Fk_T_Nutri` (`idTipoDocumento`),
  ADD KEY `Fk_nutris` (`idMunicipio`),
  ADD KEY `Fk_nutrii` (`idUsuario`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `idTipoPago` (`idTipoPago`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idRuta` (`idRuta`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idCliente_id` (`idCliente`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idPlato`),
  ADD KEY `Fk_T_Clien` (`idCliente`),
  ADD KEY `Fk_Tipo_Plato` (`idTipoPlato`);

--
-- Indices de la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD PRIMARY KEY (`idPQR`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idCalificacion` (`idCalificacion`);

--
-- Indices de la tabla `preparacionalimento`
--
ALTER TABLE `preparacionalimento`
  ADD PRIMARY KEY (`idPreparacionAlimento`),
  ADD KEY `Fk_Alimen` (`idAlimento`);

--
-- Indices de la tabla `preparacion_plato`
--
ALTER TABLE `preparacion_plato`
  ADD PRIMARY KEY (`idPreparacion_Plato`),
  ADD KEY `Fk_Chef` (`idChef`),
  ADD KEY `Fk_Cocinero` (`idCocinero`),
  ADD KEY `Fk_Platoul` (`idPlato`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`idRuta`),
  ADD KEY `idJefeLogistica` (`idJefeLogistica`),
  ADD KEY `idDomiciliario` (`idDomiciliario`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idSede`);

--
-- Indices de la tabla `tipocita`
--
ALTER TABLE `tipocita`
  ADD PRIMARY KEY (`idTipoCita`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipoPago`);

--
-- Indices de la tabla `tipo_alimento`
--
ALTER TABLE `tipo_alimento`
  ADD PRIMARY KEY (`idTipoAlimento`);

--
-- Indices de la tabla `tipo_plato`
--
ALTER TABLE `tipo_plato`
  ADD PRIMARY KEY (`idTipoPlato`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `USSSP` (`Perfil`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`idValoracion`),
  ADD KEY `idDetalleSeguimiento` (`idDetalleSeguimiento`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idPago` (`idPago`),
  ADD KEY `idPaquete` (`idPaquete`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`),
  ADD KEY `idMunicipio` (`idMunicipio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idAlimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `idBarrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `idCalendario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chefs`
--
ALTER TABLE `chefs`
  MODIFY `idChef` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cocineros`
--
ALTER TABLE `cocineros`
  MODIFY `idCocinero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleseguimiento`
--
ALTER TABLE `detalleseguimiento`
  MODIFY `idDetalleSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_plato`
--
ALTER TABLE `detalle_plato`
  MODIFY `idDetallePlato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  MODIFY `iddomiciliario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `jefe_logistica`
--
ALTER TABLE `jefe_logistica`
  MODIFY `idjefe_logistica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `nutricionista`
--
ALTER TABLE `nutricionista`
  MODIFY `idNutricionista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idPlato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pqr`
--
ALTER TABLE `pqr`
  MODIFY `idPQR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preparacionalimento`
--
ALTER TABLE `preparacionalimento`
  MODIFY `idPreparacionAlimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preparacion_plato`
--
ALTER TABLE `preparacion_plato`
  MODIFY `idPreparacion_Plato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `idRuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idSede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipocita`
--
ALTER TABLE `tipocita`
  MODIFY `idTipoCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idTipoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_alimento`
--
ALTER TABLE `tipo_alimento`
  MODIFY `idTipoAlimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_plato`
--
ALTER TABLE `tipo_plato`
  MODIFY `idTipoPlato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `idValoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `Fk_Admin_C` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`),
  ADD CONSTRAINT `Fk_Admin_U` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `Fk_T_Admin` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`);

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `idCita2` FOREIGN KEY (`idCita`) REFERENCES `cita` (`idCita`),
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `idNutricionista` FOREIGN KEY (`idNutricionista`) REFERENCES `nutricionista` (`idNutricionista`),
  ADD CONSTRAINT `idSede3` FOREIGN KEY (`idSede`) REFERENCES `sede` (`idSede`),
  ADD CONSTRAINT `idUsuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD CONSTRAINT `Fk_T_Alimento` FOREIGN KEY (`idTipoAlimento`) REFERENCES `tipo_alimento` (`idTipoAlimento`);

--
-- Filtros para la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD CONSTRAINT `idSede` FOREIGN KEY (`idSede`) REFERENCES `sede` (`idSede`),
  ADD CONSTRAINT `idZona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`);

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `Fk_1Plato` FOREIGN KEY (`idPlato`) REFERENCES `platos` (`idPlato`);

--
-- Filtros para la tabla `chefs`
--
ALTER TABLE `chefs`
  ADD CONSTRAINT `Fk_T_Chef` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `Fk_chef_C` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`),
  ADD CONSTRAINT `Fk_chef_U` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `idCita1` FOREIGN KEY (`idCita`) REFERENCES `cita` (`idCita`),
  ADD CONSTRAINT `idDetalleSeguimiento1` FOREIGN KEY (`idDetalleSeguimiento`) REFERENCES `detalleseguimiento` (`idDetalleSeguimiento`),
  ADD CONSTRAINT `idSede2` FOREIGN KEY (`idSede`) REFERENCES `sede` (`idSede`),
  ADD CONSTRAINT `idTipoDocumento` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `idValoracion` FOREIGN KEY (`idValoracion`) REFERENCES `valoracion` (`idValoracion`),
  ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`);

--
-- Filtros para la tabla `cocineros`
--
ALTER TABLE `cocineros`
  ADD CONSTRAINT `Fk_cisi_U` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `Fk_cosi` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `Fk_cosi_C` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `idPais` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`);

--
-- Filtros para la tabla `detalle_plato`
--
ALTER TABLE `detalle_plato`
  ADD CONSTRAINT `Fk_T_Detalle_Plato` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idAlimento`),
  ADD CONSTRAINT `Fk_T_Plato` FOREIGN KEY (`idPlato`) REFERENCES `platos` (`idPlato`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `idBarrio` FOREIGN KEY (`idBarrio`) REFERENCES `barrio` (`idBarrio`);

--
-- Filtros para la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD CONSTRAINT `Fk_Do_Muni` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`),
  ADD CONSTRAINT `Fk_Do_Usu` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `Fk_T_Do_Tip` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`);

--
-- Filtros para la tabla `jefe_logistica`
--
ALTER TABLE `jefe_logistica`
  ADD CONSTRAINT `Fk_JL_Muni` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`),
  ADD CONSTRAINT `Fk_JL_Usu` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `Fk_T_JL_Tip` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `idDepartamento` FOREIGN KEY (`idDeparamento`) REFERENCES `departamento` (`idDepartamento`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `de` FOREIGN KEY (`de`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `para` FOREIGN KEY (`para`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD CONSTRAINT `Fk_T_Nutri` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `Fk_nutrii` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `Fk_nutris` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `idTipoPago` FOREIGN KEY (`idTipoPago`) REFERENCES `tipopago` (`idTipoPago`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `idCliente_id` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `idEstado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `idRuta` FOREIGN KEY (`idRuta`) REFERENCES `ruta` (`idRuta`);

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `Fk_T_Clien` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `Fk_Tipo_Plato` FOREIGN KEY (`idTipoPlato`) REFERENCES `tipo_plato` (`idTipoPlato`);

--
-- Filtros para la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD CONSTRAINT `idCalificacion` FOREIGN KEY (`idCalificacion`) REFERENCES `calificacion` (`idCalificacion`),
  ADD CONSTRAINT `idPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `preparacionalimento`
--
ALTER TABLE `preparacionalimento`
  ADD CONSTRAINT `Fk_Alimen` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idAlimento`);

--
-- Filtros para la tabla `preparacion_plato`
--
ALTER TABLE `preparacion_plato`
  ADD CONSTRAINT `Fk_Chef` FOREIGN KEY (`idChef`) REFERENCES `chefs` (`idChef`),
  ADD CONSTRAINT `Fk_Cocinero` FOREIGN KEY (`idCocinero`) REFERENCES `cocineros` (`idCocinero`),
  ADD CONSTRAINT `Fk_Platoul` FOREIGN KEY (`idPlato`) REFERENCES `platos` (`idPlato`);

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `idDomiciliario` FOREIGN KEY (`idDomiciliario`) REFERENCES `domiciliario` (`iddomiciliario`),
  ADD CONSTRAINT `idJefeLogistica` FOREIGN KEY (`idJefeLogistica`) REFERENCES `jefe_logistica` (`idjefe_logistica`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `USSSP` FOREIGN KEY (`Perfil`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `idDetalleSeguimiento` FOREIGN KEY (`idDetalleSeguimiento`) REFERENCES `detalleseguimiento` (`idDetalleSeguimiento`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `idPago` FOREIGN KEY (`idPago`) REFERENCES `pago` (`idPago`),
  ADD CONSTRAINT `idPaquete` FOREIGN KEY (`idPaquete`) REFERENCES `paquete` (`idPaquete`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `idMunicipio` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
