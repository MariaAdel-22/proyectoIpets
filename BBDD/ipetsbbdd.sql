-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2020 a las 16:17:06
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
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `NOMBRE` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CONTRASENIA` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`NOMBRE`, `CONTRASENIA`, `EMAIL`) VALUES
('admin1', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptados`
--

CREATE TABLE `adoptados` (
  `USUARIO` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ANIMAL` int(2) NOT NULL,
  `PROTECTORA` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `HORA` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `adoptados`
--

INSERT INTO `adoptados` (`USUARIO`, `ANIMAL`, `PROTECTORA`, `HORA`) VALUES
('12345678K', 1, '001', '05/06/2020 a las 12 : 08'),
('12345678K', 2, '001', '04/06/2020 a las 18 : 33'),
('12345678D', 26, '12', '11/06/2020 a las 20 : 48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `ID` int(3) NOT NULL,
  `NOMBRE` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ESPECIE` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `EDAD` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `GENERO` varchar(13) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `RAZA` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FECHANACIMIENTO` date NOT NULL,
  `TIEMPOINYECCION` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PESO` int(3) NOT NULL,
  `IMAGEN` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`ID`, `NOMBRE`, `ESPECIE`, `EDAD`, `GENERO`, `RAZA`, `FECHANACIMIENTO`, `TIEMPOINYECCION`, `PESO`, `IMAGEN`) VALUES
(1, 'ATREYU', 'GATO', '10 MESES', 'MACHO', 'COMUN EUROPEO', '2019-05-05', '90 DIAS', 3, 'ATREYU.JPG'),
(2, 'BIENVE', 'GATO', '11 MESES', 'MACHO', 'COMUN EUROPEO', '2019-04-15', '30 DIAS', 3, 'BIENVE.JPG'),
(3, 'MANUELA', 'GATO', '11 MESES', 'HEMBRA', 'COMUN EUROPEO', '2019-04-22', '90 DIAS', 4, 'MANUELA.JPG'),
(4, 'DUQUESA', 'GATO', '4 ANIOS', 'HEMBRA', 'COMUN EUROPEO', '2015-10-11', '60 DIAS', 2, 'DUQUESA.JPG'),
(5, 'JARO', 'PERRO', '1 ANIO', 'MACHO', 'PODENCO', '2019-01-17', '1 DIA', 11, 'JARO.JPG'),
(6, 'GRACE', 'PERRO', '1 ANIO', 'HEMBRA', 'COMUN EUROPEO', '2019-01-30', '120 DIAS', 8, 'GRACE.JPG'),
(7, 'TANO', 'PERRO', '5 ANIOS', 'MACHO', 'COMUN EUROPEO', '2014-06-09', '302 DIAS', 28, 'TANO.jpg'),
(8, 'ANUKA', 'PERRO', '2 ANIOS', 'HEMBRA', 'MESTIZO', '2018-06-10', '12 DIAS', 17, 'ANUKA.jpg'),
(9, 'ARTURO', 'PERRO', '3 ANIOS', 'MACHO', 'MESTIZO', '2017-09-30', '5 DIAS', 30, 'ARTURO.jpeg'),
(10, 'CHARLINA', 'CONEJO', '1 ANIO', 'HEMBRA', 'BELIER FRANCES', '2019-10-30', '10 DIAS', 2, 'CHARLINA.jpg'),
(11, 'TAMBOR', 'CONEJO', '4 ANIOS', 'HEMBRA', 'ENANA', '2016-08-26', '360 DIAS', 1, 'TAMBOR.jpg'),
(12, 'POMPON', 'CONEJO', '2 ANIOS', 'MACHO', 'BELIER FRANCES', '2018-06-11', '5 DIAS', 2, 'POMPON.jpg'),
(13, 'AMBER', 'CONEJO', '4 ANIOS', 'HEMBRA', 'MESTIZA ENANA', '2016-03-15', '8 DIAS', 1, 'AMBER.jpg'),
(14, 'LILO', 'AVE', '3 ANIOS', 'MACHO', 'PALOMA', '2017-06-06', '90 DIAS', 1, 'LILO.JPG'),
(15, 'PEGGY', 'CERDO', '8 ANIOS', 'HEMBRA', 'LARGE WHITE', '2012-11-18', '2 DIAS', 25, 'PEGGY.jpg'),
(16, 'PINK', 'CERDO', '8 ANIOS', 'HEMBRA', 'LARGE WHITE', '2012-11-18', '5 DIAS', 25, 'PINK.jpg'),
(17, 'IGNUS', 'ROEDOR', '2 ANIOS', 'MACHO', 'COMUN EUROPEO', '2018-01-01', '15 DIAS', 0, 'IGNUS.JPG'),
(18, 'VENTUS', 'ROEDOR', '2 ANIOS', 'MACHO', 'COMUN EUROPEO', '2018-01-01', '15 DIAS', 0, 'VENTUS.JPG'),
(19, 'KO', 'ROEDOR', '4 ANIOS', 'MACHO', 'HAMSTER', '2016-03-19', '80 DIAS', 1, 'KO.PNG'),
(20, 'JOYA', 'ROEDOR', '5 ANIOS', 'HEMBRA', 'HAMSTER', '2015-11-03', '4 DIAS', 1, 'JOYA.PNG'),
(21, 'LIEBRE', 'REPTIL', '1 ANIO', 'HERMAFRODITA', 'TORTUGA', '2019-02-02', '300 DIAS', 2, 'LIEBRE.jpg'),
(22, 'YURA', 'EQUINO', '21 ANIOS', 'HEMBRA', 'CRUCE', '1999-01-05', '40 DIAS', 45, 'YURA.jpg'),
(23, 'ISIDORO', 'EQUINO', '17 ANIOS', 'MACHO', 'CRUCE', '2002-08-21', '30 DIAS', 55, 'ISIDORO.jpg'),
(24, 'POLLO', 'AVE', '8 MESES', 'MACHO', 'BRAVIA', '2019-07-03', '1 DÍA', 1, 'POLLO.jpg'),
(25, 'ZETA', 'REPTIL', '3 ANIOS', 'MACHO', 'LAGARTO DRAGON BARBUDO', '2017-03-04', '60 DIAS', 0, 'ZETA.PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibles`
--

CREATE TABLE `disponibles` (
  `ANIMAL` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PROTECTORA` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `disponibles`
--

INSERT INTO `disponibles` (`ANIMAL`, `PROTECTORA`) VALUES
('ATREYU', 1),
('BIENVE', 1),
('MANUELA', 1),
('DUQUESA', 1),
('JARO', 2),
('GRACE', 2),
('TANO', 2),
('ANUKA', 3),
('ARTURO', 3),
('CHARLINA', 4),
('TAMBOR', 5),
('POMPON', 5),
('AMBER', 5),
('LILO', 6),
('PEGGY', 7),
('PINK', 7),
('IGNUS', 8),
('VENTUS', 8),
('KO', 9),
('JOYA', 9),
('LIEBRE', 10),
('YURA', 11),
('ISIDORO', 11),
('POLLO', 6),
('ZETA', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protectora`
--

CREATE TABLE `protectora` (
  `NOMBRE` varchar(55) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CONTRASENIA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `LOCALIDAD` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(55) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IDENTIFICADOR` int(5) NOT NULL,
  `CONTACTO` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IMAGEN` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `protectora`
--

INSERT INTO `protectora` (`NOMBRE`, `CONTRASENIA`, `LOCALIDAD`, `DIRECCION`, `IDENTIFICADOR`, `CONTACTO`, `IMAGEN`) VALUES
('SOCIEDAD PROTECTORA DE ANIMALES Y PLANTAS DE MADRID', '1234', 'MADRID', 'CALLE OCHAGAVIA,34', 1, '913-119-133', 'PROTECTORA1.jpg'),
('LA MADRILEÑA', '5678', 'MADRID', 'NO DADA', 2, '648-495-073', 'PROTECTORA2.png'),
('LA CAROLINA', '9101', 'JAÉN', 'LA CAROLINA', 3, '628-597-587', 'PROTECTORA3.jpg'),
('ADOPTA PALENSIA', '1121', 'CÁCERES', 'CALLE CUEVA DE LA SERRANA,2', 4, '622-068-154', 'PROTECTORA4.jpg'),
('ASOCIACIÓN PROTECTORA DEL CONEJO', '3141', 'BARCELONA', 'NO DADA ', 5, '697-826-698', 'PROTECTORA5.PNG'),
('LAS MIRADAS DEL OLVIDO', '5161', 'MADRID', 'NO DADA', 6, 'lasmiradasdelolvido@gmail.com', 'PROTECTORA6.jpg'),
('ASOKA-ORIHUELA', '7181', 'VALENCIA', 'CAMINO LO ARQUES,S/N', 7, '649-876-523', 'PROTECTORA7.jpg'),
('RATAS EN ADOPCION', '9202', 'GRANADA', 'NO DADA', 8, 'ratasenadopcion@gmail.com', 'PROTECTORA8.png'),
('ALMA EXÓTICA', '1222', 'TOLEDO', 'NO DADA', 9, 'almaexoticos@gmail.com', 'PROTECTORA9.jpg'),
('HAKUNA MATATA', '3242', 'PAÍS VASCO', 'NO DADA', 10, '676-022-124', 'PROTECTORA10.jpg'),
('CABALLOASTUR', '5262', 'ASTURIAS', 'NO DADA', 11, '672-077-956', 'PROTECTORA11.jpg'),
('SOCIEDADPRUEBA', 'SoyUnaContra', 'LOGROÑO', 'SOYDIRECCION', 12, '111-111-111', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccionados`
--

CREATE TABLE `seleccionados` (
  `ANIMAL` int(2) NOT NULL,
  `USUARIO` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PROTECTORA` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `seleccionados`
--

INSERT INTO `seleccionados` (`ANIMAL`, `USUARIO`, `PROTECTORA`) VALUES
(1, '12345678D', 1),
(11, '99999999D', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NOMBRE` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DNI` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `EDAD` int(2) NOT NULL,
  `LOCALIDAD` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TRABAJO` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CODIGOPOSTAL` int(7) NOT NULL,
  `EMAIL` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CONTRASENIA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IMAGEN` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NOMBRE`, `APELLIDOS`, `DNI`, `EDAD`, `LOCALIDAD`, `TRABAJO`, `DIRECCION`, `CODIGOPOSTAL`, `EMAIL`, `CONTRASENIA`, `IMAGEN`) VALUES
('MARIA', 'Espana', '12345678D', 22, 'MADRID', 'NO', '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 28017, 'maria@gmail.com', '1234', 'panditaAsist1.jpg'),
('NERION', 'SoyApellido2', '23456789M', 23, 'BARCELONA', 'NO', '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 29013, 'nerionchan@gmail.com', '789', 'fondo5.png'),
('ad', 'Moco Nariz', '99999999D', 24, 'Mallorca', 'NO', 'Calle de Gurrutia,nÂº12', 15045, 'ejemplo@gmail.com', 'HHHHHHH5', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`NOMBRE`);

--
-- Indices de la tabla `adoptados`
--
ALTER TABLE `adoptados`
  ADD PRIMARY KEY (`ANIMAL`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `disponibles`
--
ALTER TABLE `disponibles`
  ADD KEY `Protectoraaa` (`PROTECTORA`);

--
-- Indices de la tabla `protectora`
--
ALTER TABLE `protectora`
  ADD PRIMARY KEY (`IDENTIFICADOR`) USING BTREE;

--
-- Indices de la tabla `seleccionados`
--
ALTER TABLE `seleccionados`
  ADD PRIMARY KEY (`ANIMAL`),
  ADD KEY `PPPPPPPPPP` (`PROTECTORA`),
  ADD KEY `uuuuuuuuu` (`USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `protectora`
--
ALTER TABLE `protectora`
  MODIFY `IDENTIFICADOR` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibles`
--
ALTER TABLE `disponibles`
  ADD CONSTRAINT `Protectoraaa` FOREIGN KEY (`PROTECTORA`) REFERENCES `protectora` (`IDENTIFICADOR`);

--
-- Filtros para la tabla `seleccionados`
--
ALTER TABLE `seleccionados`
  ADD CONSTRAINT `PPPPPPPPPP` FOREIGN KEY (`PROTECTORA`) REFERENCES `protectora` (`IDENTIFICADOR`),
  ADD CONSTRAINT `uuuuuuuuu` FOREIGN KEY (`USUARIO`) REFERENCES `usuario` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
