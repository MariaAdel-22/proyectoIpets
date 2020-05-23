-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2020 a las 20:31:19
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ipetsbbdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `NOMBRE` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ESPECIE` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `EDAD` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `GENERO` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `RAZA` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `FECHANACIMIENTO` date NOT NULL,
  `TIEMPOINYECCION` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `PESO` int(3) NOT NULL,
  `ID` int(3) NOT NULL,
  `IMAGEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`NOMBRE`, `ESPECIE`, `EDAD`, `GENERO`, `RAZA`, `FECHANACIMIENTO`, `TIEMPOINYECCION`, `PESO`, `ID`, `IMAGEN`) VALUES
('ATREYU', 'GATO', '10 MESES', 'MACHO', 'COMUN EUROPEO', '2019-05-05', '90 DIAS', 3, 1, 'ATREYU.JPG'),
('BIENVE', 'GATO', '11 MESES', 'MACHO', 'COMUN EUROPEO', '2019-04-15', '30 DIAS', 3, 2, 'BIENVE.JPG'),
('MANUELA', 'GATO', '11 MESES', 'HEMBRA', 'COMUN EUROPEO', '2019-04-22', '90 DIAS', 4, 3, 'MANUELA.JPG'),
('DUQUESA', 'GATO', '4 ANIOS', 'HEMBRA', 'COMUN EUROPEO', '2015-10-11', '60 DIAS', 2, 4, 'DUQUESA.JPG'),
('JARO', 'PERRO', '1 ANIO', 'MACHO', 'PODENCO', '2019-01-17', '1 DIA', 11, 5, 'JARO.JPG'),
('GRACE', 'PERRO', '1 ANIO', 'HEMBRA', 'COMUN EUROPEO', '2019-01-30', '120 DIAS', 8, 6, 'GRACE.JPG'),
('TANO', 'PERRO', '5 ANIOS', 'MACHO', 'COMUN EUROPEO', '2014-06-09', '302 DIAS', 28, 7, 'TANO.jpg'),
('ANUKA', 'PERRO', '2 ANIOS', 'HEMBRA', 'MESTIZO', '2018-06-10', '12 DIAS', 17, 8, 'ANUKA.jpg'),
('ARTURO', 'PERRO', '3 ANIOS', 'MACHO', 'MESTIZO', '2017-09-30', '5 DIAS', 30, 9, 'ARTURO.jpeg'),
('CHARLINA', 'CONEJO', '1 ANIO', 'HEMBRA', 'BELIER FRANCES', '2019-10-30', '10 DIAS', 2, 10, 'CHARLINA.jpg'),
('TAMBOR', 'CONEJO', '4 ANIOS', 'HEMBRA', 'ENANA', '2016-08-26', '360 DIAS', 1, 11, 'TAMBOR.jpg'),
('POMPON', 'CONEJO', '2 ANIOS', 'MACHO', 'BELIER FRANCES', '2018-06-11', '5 DIAS', 2, 12, 'POMPON.jpg'),
('AMBER', 'CONEJO', '4 ANIOS', 'HEMBRA', 'MESTIZA ENANA', '2016-03-15', '8 DIAS', 1, 13, 'AMBER.jpg'),
('LILO', 'AVE', '3 ANIOS', 'MACHO', 'PALOMA', '2017-06-06', '90 DIAS', 1, 14, 'LILO.JPG'),
('PEGGY', 'CERDO', '8 ANIOS', 'HEMBRA', 'LARGE WHITE', '2012-11-18', '2 DIAS', 25, 15, 'PEGGY.jpg'),
('PINK', 'CERDO', '8 ANIOS', 'HEMBRA', 'LARGE WHITE', '2012-11-18', '5 DIAS', 25, 16, 'PINK.jpg'),
('IGNUS', 'ROEDOR', '2 ANIOS', 'MACHO', 'COMUN EUROPEO', '2018-01-01', '15 DIAS', 0, 17, 'IGNUS.JPG'),
('VENTUS', 'ROEDOR', '2 ANIOS', 'MACHO', 'COMUN EUROPEO', '2018-01-01', '15 DIAS', 0, 18, 'VENTUS.JPG'),
('KO', 'ROEDOR', '4 ANIOS', 'MACHO', 'HAMSTER', '2016-03-19', '80 DIAS', 1, 19, 'KO.PNG'),
('JOYA', 'ROEDOR', '5 ANIOS', 'HEMBRA', 'HAMSTER', '2015-11-03', '4 DIAS', 1, 20, 'JOYA.PNG'),
('LIEBRE', 'REPTIL', '1 ANIO', 'HERMAFRODITA', 'TORTUGA', '2019-02-02', '300 DIAS', 2, 21, 'LIEBRE.jpg'),
('YURA', 'EQUINO', '21 ANIOS', 'HEMBRA', 'CRUCE', '1999-01-05', '40 DIAS', 45, 22, 'YURA.jpg'),
('ISIDORO', 'EQUINO', '17 ANIOS', 'MACHO', 'CRUCE', '2002-08-21', '30 DIAS', 55, 23, 'ISIDORO.jpg'),
('POLLO', 'AVE', '8 MESES', 'MACHO', 'BRAVIA', '2019-07-03', '1 DÍA', 1, 24, 'images/POLLO.jpg'),
('ZETA', 'REPTIL', '3 ANIOS', 'MACHO', 'LAGARTO DRAGON BARBUDO', '2017-03-04', '60 DIAS', 0, 25, 'ZETA.PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibles`
--

CREATE TABLE `disponibles` (
  `IDENTIFICADOR` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `disponibles`
--

INSERT INTO `disponibles` (`IDENTIFICADOR`, `ID`) VALUES
('001', 1),
('001', 2),
('001', 3),
('001', 4),
('002', 5),
('002', 6),
('002', 7),
('003', 8),
('003', 9),
('004', 10),
('005', 11),
('005', 12),
('005', 13),
('006', 14),
('007', 15),
('007', 16),
('008', 17),
('008', 18),
('009', 19),
('009', 20),
('010', 21),
('011', 22),
('011', 23),
('006', 24),
('009', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protectora`
--

CREATE TABLE `protectora` (
  `NOMBRE` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `CONTRASENIA` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LOCALIDAD` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DIRECCION` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFICADOR` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `CONTACTO` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `IMAGEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `protectora`
--

INSERT INTO `protectora` (`NOMBRE`, `CONTRASENIA`, `LOCALIDAD`, `DIRECCION`, `IDENTIFICADOR`, `CONTACTO`, `IMAGEN`) VALUES
('SOCIEDAD PROTECTORA DE ANIMALES Y PLANTAS DE MADRID', '1234', 'MADRID', 'CALLE DE OCHAGAVIA,34', '001', '913-119-133', 'images/PROTECTORAS/PROTECTORA1.png'),
('LA MADRILEÑA', '5678', 'MADRID', 'NO DADA', '002', '648-495-073', 'images/PROTECTORAS/PROTECTORA2.png'),
('LA CAROLINA', '9101', 'JAÉN', 'LA CAROLINA', '003', '628-597-587', 'images/PROTECTORAS/PROTECTORA3.png'),
('ADOPTA PALENSIA', '1121', 'CÁCERES', 'CALLE CUEVA DE LA SERRANA,2', '004', '622-068-154', 'images/PROTECTORAS/PROTECTORA4.png'),
('ASOCIACIÓN PROTECTORA DEL CONEJO', '3141', 'BARCELONA', 'NO DADA ', '005', '697-826-698', 'images/PROTECTORAS/PROTECTORA5.PNG'),
('LAS MIRADAS DEL OLVIDO', '5161', 'MADRID', 'NO DADA', '006', 'lasmiradasdelolvido@gmail.com', 'images/PROTECTORAS/PROTECTORA6.png'),
('ASOKA-ORIHUELA', '7181', 'VALENCIA', 'CAMINO LO ARQUES,S/N', '007', '649-876-523', 'images/PROTECTORAS/PROTECTORA7.png'),
('RATAS EN ADOPCION', '9202', 'GRANADA', 'NO DADA', '008', 'ratasenadopcion@gmail.com', 'images/PROTECTORAS/PROTECTORA8.jpg'),
('ALMA EXÓTICA', '1222', 'TOLEDO', 'NO DADA', '009', 'almaexoticos@gmail.com', 'images/PROTECTORAS/PROTECTORA9.jpg'),
('HAKUNA MATATA', '3242', 'PAÍS VASCO', 'NO DADA', '010', '676-022-124', 'images/PROTECTORAS/PROTECTORA10.jpg'),
('CABALLOASTUR', '5262', 'ASTURIAS', 'NO DADA', '011', '672-077-956', 'images/PROTECTORAS/PROTECTORA11.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccionados`
--

CREATE TABLE `seleccionados` (
  `USUARIO` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ANIMAL` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `seleccionados`
--

INSERT INTO `seleccionados` (`USUARIO`, `ANIMAL`) VALUES
('12345678K', 1),
('12345678K', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NOMBRE` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `APELLIDOS` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `EDAD` int(2) NOT NULL,
  `LOCALIDAD` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `TRABAJO` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `DIRECCION` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `CODIGOPOSTAL` int(7) NOT NULL,
  `EMAIL` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `CONTRASENIA` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `IMAGEN` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NOMBRE`, `APELLIDOS`, `DNI`, `EDAD`, `LOCALIDAD`, `TRABAJO`, `DIRECCION`, `CODIGOPOSTAL`, `EMAIL`, `CONTRASENIA`, `IMAGEN`) VALUES
('MARIA', 'Espana', '12345678K', 22, 'MADRID', 'NO', 'Calle Álava, 16, Madrid', 28017, 'cualquiera@gmail.com', '1234', 'images/panditaAsist1.jpg'),
('NERION', 'SoyApellido2', '23456789M', 23, 'BARCELONA', 'NO', 'SoyDireccion', 29013, 'nerionchan@gmail.com', '2345', 'images/fondo5.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `disponibles`
--
ALTER TABLE `disponibles`
  ADD KEY `RR` (`ID`),
  ADD KEY `R2` (`IDENTIFICADOR`);

--
-- Indices de la tabla `protectora`
--
ALTER TABLE `protectora`
  ADD PRIMARY KEY (`IDENTIFICADOR`);

--
-- Indices de la tabla `seleccionados`
--
ALTER TABLE `seleccionados`
  ADD PRIMARY KEY (`ANIMAL`),
  ADD KEY `rrrrrrr` (`USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DNI`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibles`
--
ALTER TABLE `disponibles`
  ADD CONSTRAINT `R2` FOREIGN KEY (`IDENTIFICADOR`) REFERENCES `protectora` (`IDENTIFICADOR`),
  ADD CONSTRAINT `RR` FOREIGN KEY (`ID`) REFERENCES `animal` (`ID`);

--
-- Filtros para la tabla `seleccionados`
--
ALTER TABLE `seleccionados`
  ADD CONSTRAINT `dddd` FOREIGN KEY (`ANIMAL`) REFERENCES `animal` (`ID`),
  ADD CONSTRAINT `rrrrrrr` FOREIGN KEY (`USUARIO`) REFERENCES `usuario` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
