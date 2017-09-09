-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-11-2016 a las 19:54:09
-- Versión del servidor: 5.6.33
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matriculas_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_talumno_tapoderado`
--

CREATE TABLE `rel_talumno_tapoderado` (
  `Rut_apo` varchar(15) NOT NULL,
  `Rut_alu` varchar(15) NOT NULL,
  `Relacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_talumno_tapoderado`
--

INSERT INTO `rel_talumno_tapoderado` (`Rut_apo`, `Rut_alu`, `Relacion`) VALUES
('164589345      ', '211596548      ', 'Tio                           '),
('169582315      ', '199586349      ', 'Padre                         '),
('17586194k      ', '201251648      ', 'Madre                         '),
('17586194k      ', '211548969      ', 'Madre                         ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_talumno_thermanos`
--

CREATE TABLE `rel_talumno_thermanos` (
  `Rut` varchar(15) NOT NULL,
  `id_Hermano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_talumno_thermanos`
--

INSERT INTO `rel_talumno_thermanos` (`Rut`, `id_Hermano`) VALUES
('201251648      ', 1),
('211548969      ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_talumno_tpadres`
--

CREATE TABLE `rel_talumno_tpadres` (
  `Rut_alu` varchar(15) NOT NULL,
  `Rut_padre` varchar(15) NOT NULL,
  `Parentesco` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_talumno_tpadres`
--

INSERT INTO `rel_talumno_tpadres` (`Rut_alu`, `Rut_padre`, `Parentesco`) VALUES
('199586349      ', '167568749      ', 'Madre               '),
('199586349      ', '169582315      ', 'Padre               '),
('201251648      ', '173571589      ', 'Padre               '),
('201251648      ', '17586194k      ', 'Madre               '),
('211548969      ', '173571589      ', 'Padre               '),
('211548969      ', '17586194k      ', 'Madre               '),
('211596548      ', '174586985      ', 'Madre               '),
('211596548      ', '175489563      ', 'Padre               ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumno`
--

CREATE TABLE `talumno` (
  `Rut` varchar(15) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `F_nacimiento` date DEFAULT NULL,
  `F_ingreso` date DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Comuna` varchar(20) DEFAULT NULL,
  `Curso` varchar(20) DEFAULT NULL,
  `Curso_anterior` varchar(20) DEFAULT NULL,
  `Establecimiento_ant` varchar(50) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Repitente` tinyint(1) DEFAULT NULL,
  `Ingles` tinyint(1) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `repitio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talumno`
--

INSERT INTO `talumno` (`Rut`, `Nombre`, `F_nacimiento`, `F_ingreso`, `Direccion`, `Comuna`, `Curso`, `Curso_anterior`, `Establecimiento_ant`, `Activo`, `Repitente`, `Ingles`, `Estado`, `repitio`) VALUES
('199586349      ', 'Arturo Alexis Melgarejo Tapia                     ', '1998-01-18', '2014-01-16', 'S.Martin 9342                                                                                       ', 'Temuco              ', '1ro Medio           ', '1ro Medio           ', 'Escuela Ingles                                    ', 1, 1, 0, 'Neutro              ', 0),
('201251648      ', 'Luis Jose Mardones Padilla                        ', '1997-08-22', '2013-01-15', 'Boldos 1319                                                                                         ', 'Pucon               ', '3ro Medio           ', '2do Medio           ', 'Escuela Ingles                                    ', 1, 0, 1, 'Repitente           ', 0),
('211548969      ', 'Elliott Alberto Mardones Padilla                  ', '1999-06-05', '2015-01-15', 'Boldos 1319                                                                                         ', 'Pucon               ', '1ro Medio           ', '8vo Basico          ', 'Ramonguiñes                                       ', 1, 0, 0, 'Neutro              ', 0),
('211596548      ', 'Edio Sebastian Saavedra Parra                     ', '1998-08-26', '2014-01-18', 'Colocolo 0341                                                                                       ', 'Temuco              ', '2do Medio           ', '1ro Medio           ', 'Escuela Ingles                                    ', 1, 0, 1, 'Neutro              ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tapoderado`
--

CREATE TABLE `tapoderado` (
  `Rut` varchar(15) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Fono` varchar(20) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tapoderado`
--

INSERT INTO `tapoderado` (`Rut`, `Nombre`, `Email`, `Fono`, `Activo`) VALUES
('164589345      ', 'Eduardo Fernando Zapata Contreras                 ', 'eduardomlg@gmail.com', '(09) 962 87 254     ', 1),
('169582315      ', 'Guido Marcelo Melgarejo Meltran                   ', 'karatemel@gmail.com ', '(09) 481 64 185     ', 1),
('17586194k      ', 'Melisa Angelica Padilla Muñoz                     ', 'mangelica@gmail.com ', '(09) 850 55 428     ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomportamiento`
--

CREATE TABLE `tcomportamiento` (
  `Rut` varchar(15) NOT NULL,
  `id_Comentario` int(11) NOT NULL,
  `Comentario` varchar(250) DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  `Autor` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thermanos`
--

CREATE TABLE `thermanos` (
  `id_Hermano` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `F_nacimiento` date DEFAULT NULL,
  `Ocupacion` varchar(30) DEFAULT NULL,
  `Lugar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `thermanos`
--

INSERT INTO `thermanos` (`id_Hermano`, `Nombre`, `F_nacimiento`, `Ocupacion`, `Lugar`) VALUES
(1, 'Elliott Alberto Mardones Padilla                  ', '1999-05-06', 'Estudiante                    ', 'n/a                           '),
(2, 'Luis Jose Mardones Padilla                        ', '1997-03-22', 'Estudiante                    ', 'n/a                           ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpadres`
--

CREATE TABLE `tpadres` (
  `Rut` varchar(15) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `F_nacimiento` date DEFAULT NULL,
  `Fono` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Vive_c_alu` tinyint(1) DEFAULT NULL,
  `Estudios` varchar(20) DEFAULT NULL,
  `Ocupacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpadres`
--

INSERT INTO `tpadres` (`Rut`, `Nombre`, `F_nacimiento`, `Fono`, `Email`, `Vive_c_alu`, `Estudios`, `Ocupacion`) VALUES
('167568749      ', 'Viviana Alicia Tapia Montanares                   ', '1956-02-02', '(09) 237 58 786', 'Aliciatm@gmail.com            ', 1, 'Media completa      ', 'Contadora           '),
('169582315      ', 'Guido Marcelo Melgarejo Meltran                   ', '1953-02-11', '(09) 481 64 185', 'karatemel@gmail.com           ', 1, 'Media completa      ', 'Instructor karate   '),
('173571589      ', 'Felipe Andres Mardones Toledo                     ', '1958-10-01', '(09) 452 85 785', 'No tiene                      ', 1, '2do Medio           ', 'Jardinero           '),
('174586985      ', 'Cecilia Angelica Parra Krause                     ', '1951-09-20', '(09) 396 27 785', 'Kaiser1234@gmail.com          ', 1, 'Media completa      ', 'Vendedora           '),
('175489563      ', 'Pedro Jorge Saavedra Aguirre                      ', '1946-12-25', '(09) 123 57 875', 'No tiene                      ', 1, 'Media completa      ', 'Barbero             '),
('17586194k      ', 'Melisa Angelica Padilla Muñoz                     ', '1960-08-13', '(09) 850 55 428', 'mangelica@gmail.com           ', 1, 'Superior            ', 'Pedagoga matematicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpago`
--

CREATE TABLE `tpago` (
  `Rut_alu` varchar(15) NOT NULL,
  `Rut_apo` varchar(15) NOT NULL,
  `Mes` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Monto` int(11) DEFAULT '0',
  `Tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpago`
--

INSERT INTO `tpago` (`Rut_alu`, `Rut_apo`, `Mes`, `Fecha`, `Monto`, `Tipo`) VALUES
('199586349 ', '169582315 ', 3, '2016-03-01', 14000, 'Efectivo'),
('199586349 ', '169582315 ', 4, '2016-04-01', 14000, 'Efectivo'),
('199586349 ', '169582315 ', 5, '2016-05-01', 14000, 'Efectivo'),
('199586349 ', '169582315 ', 6, '2016-06-01', 14000, 'Efectivo'),
('199586349 ', '169582315 ', 7, '2016-07-01', 14000, 'Efectivo'),
('199586349 ', '169582315 ', 8, NULL, 0, NULL),
('199586349 ', '169582315 ', 9, NULL, 0, NULL),
('199586349 ', '169582315 ', 10, NULL, 0, NULL),
('199586349 ', '169582315 ', 11, NULL, 0, NULL),
('199586349 ', '169582315 ', 12, NULL, 0, NULL),
('201251648 ', '17586194k ', 3, '2016-03-01', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 4, '2016-03-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 5, '2016-03-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 6, '2016-03-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 7, '2016-06-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 8, '2016-06-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 9, '2016-06-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 10, '2016-09-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 11, '2016-09-25', 14000, 'Efectivo'),
('201251648 ', '17586194k ', 12, '2016-09-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 3, '2016-03-01', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 4, '2016-03-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 5, '2016-03-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 6, '2016-03-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 7, '2016-06-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 8, '2016-06-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 9, '2016-06-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 10, '2016-09-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 11, '2016-09-25', 14000, 'Efectivo'),
('211548969 ', '17586194k ', 12, '2016-09-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 3, '2016-03-01', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 4, '2016-03-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 5, '2016-04-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 6, '2016-05-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 7, '2016-06-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 8, '2016-07-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 9, '2016-08-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 10, '2016-09-25', 14000, 'Efectivo'),
('211596548 ', '164589345 ', 11, NULL, 0, NULL),
('211596548 ', '164589345 ', 12, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsalud`
--

CREATE TABLE `tsalud` (
  `Rut` varchar(15) NOT NULL,
  `Fono` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Alergia` tinyint(1) DEFAULT NULL,
  `p_Salud` tinyint(1) DEFAULT NULL,
  `Antc_Alergia` varchar(500) DEFAULT NULL,
  `Antc_Salud` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsalud`
--

INSERT INTO `tsalud` (`Rut`, `Fono`, `Email`, `Alergia`, `p_Salud`, `Antc_Alergia`, `Antc_Salud`) VALUES
('199586349', '(09) 235 33 531', 'dralfonsocorate@gmail.com', 1, 1, 'El alumno presenta antecedentes de alergia al huevo.', 'El alumno tiene Válvula aórtica bicúspide que puede afectar en su actividad fisica bajando su rendimiento. Tener cuidado si comienza a ponerse palido'),
('201251648', '(09) 485 33 987', 'No hay', 0, 1, NULL, 'El alumno tiene Osteoporosis por lo que tiene que evitar hacer actividades fisicas de caracter brusco.'),
('211548969      ', '(09) 505 43 211', 'emergencia@gmail.com', 1, 0, 'El estudiante presenta antecedentes de alergia a frutos secos.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `id_Usuario` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`id_Usuario`, `Usuario`, `Correo`, `Tipo`, `Password`) VALUES
(1, 'admin', '', '', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rel_talumno_tapoderado`
--
ALTER TABLE `rel_talumno_tapoderado`
  ADD PRIMARY KEY (`Rut_apo`,`Rut_alu`),
  ADD KEY `Rut_alu` (`Rut_alu`);

--
-- Indices de la tabla `rel_talumno_thermanos`
--
ALTER TABLE `rel_talumno_thermanos`
  ADD PRIMARY KEY (`Rut`,`id_Hermano`),
  ADD KEY `id_Hermano` (`id_Hermano`);

--
-- Indices de la tabla `rel_talumno_tpadres`
--
ALTER TABLE `rel_talumno_tpadres`
  ADD PRIMARY KEY (`Rut_alu`,`Rut_padre`),
  ADD KEY `Rut_padre` (`Rut_padre`);

--
-- Indices de la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `tapoderado`
--
ALTER TABLE `tapoderado`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `tcomportamiento`
--
ALTER TABLE `tcomportamiento`
  ADD PRIMARY KEY (`Rut`,`id_Comentario`);

--
-- Indices de la tabla `thermanos`
--
ALTER TABLE `thermanos`
  ADD PRIMARY KEY (`id_Hermano`);

--
-- Indices de la tabla `tpadres`
--
ALTER TABLE `tpadres`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `tpago`
--
ALTER TABLE `tpago`
  ADD PRIMARY KEY (`Rut_alu`,`Rut_apo`,`Mes`),
  ADD KEY `Rut_apo` (`Rut_apo`);

--
-- Indices de la tabla `tsalud`
--
ALTER TABLE `tsalud`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `thermanos`
--
ALTER TABLE `thermanos`
  MODIFY `id_Hermano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rel_talumno_tapoderado`
--
ALTER TABLE `rel_talumno_tapoderado`
  ADD CONSTRAINT `rel_talumno_tapoderado_ibfk_1` FOREIGN KEY (`Rut_apo`) REFERENCES `tapoderado` (`Rut`),
  ADD CONSTRAINT `rel_talumno_tapoderado_ibfk_2` FOREIGN KEY (`Rut_alu`) REFERENCES `talumno` (`Rut`);

--
-- Filtros para la tabla `rel_talumno_thermanos`
--
ALTER TABLE `rel_talumno_thermanos`
  ADD CONSTRAINT `rel_talumno_thermanos_ibfk_1` FOREIGN KEY (`Rut`) REFERENCES `talumno` (`Rut`),
  ADD CONSTRAINT `rel_talumno_thermanos_ibfk_2` FOREIGN KEY (`id_Hermano`) REFERENCES `thermanos` (`id_Hermano`);

--
-- Filtros para la tabla `rel_talumno_tpadres`
--
ALTER TABLE `rel_talumno_tpadres`
  ADD CONSTRAINT `rel_talumno_tpadres_ibfk_1` FOREIGN KEY (`Rut_padre`) REFERENCES `tpadres` (`Rut`),
  ADD CONSTRAINT `rel_talumno_tpadres_ibfk_2` FOREIGN KEY (`Rut_alu`) REFERENCES `talumno` (`Rut`);

--
-- Filtros para la tabla `tcomportamiento`
--
ALTER TABLE `tcomportamiento`
  ADD CONSTRAINT `tcomportamiento_ibfk_1` FOREIGN KEY (`Rut`) REFERENCES `talumno` (`Rut`);

--
-- Filtros para la tabla `tpago`
--
ALTER TABLE `tpago`
  ADD CONSTRAINT `tpago_ibfk_1` FOREIGN KEY (`Rut_alu`) REFERENCES `talumno` (`Rut`),
  ADD CONSTRAINT `tpago_ibfk_2` FOREIGN KEY (`Rut_apo`) REFERENCES `tapoderado` (`Rut`);

--
-- Filtros para la tabla `tsalud`
--
ALTER TABLE `tsalud`
  ADD CONSTRAINT `tsalud_ibfk_1` FOREIGN KEY (`Rut`) REFERENCES `talumno` (`Rut`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
