-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-05-2021 a las 02:27:41
-- Versión del servidor: 10.3.28-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `creativ3_SMALIEBD`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`creativ3`@`localhost` PROCEDURE `validar_admin` (IN `num_control` INT(8), IN `rfc` VARCHAR(13))  BEGIN
select admin_nc, admin_rfc from Admin where admin_nc = num_control and admin_rfc = rfc;
  END$$

CREATE DEFINER=`creativ3`@`localhost` PROCEDURE `validar_user` (IN `num_contro` INT(8), IN `rf` VARCHAR(13))  BEGIN
select Num_Control, RFC from Trabajador where Num_Control = num_contro and RFC = rf;
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Admin`
--

CREATE TABLE `Admin` (
  `id_admin` int(8) NOT NULL,
  `admin_nc` int(8) NOT NULL,
  `admin_rfc` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Admin`
--

INSERT INTO `Admin` (`id_admin`, `admin_nc`, `admin_rfc`) VALUES
(1, 87, 'AUVJ660508GI6'),
(2, 78, 'TULT7911258M1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Area`
--

CREATE TABLE `Area` (
  `Cod_Area` int(30) NOT NULL,
  `Nombre_Area` varchar(30) NOT NULL,
  `Encargado` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Area`
--

INSERT INTO `Area` (`Cod_Area`, `Nombre_Area`, `Encargado`) VALUES
(1, 'Administrativa', NULL),
(2, 'Planeación y Vinculación', NULL),
(3, 'Academica', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Control`
--

CREATE TABLE `Control` (
  `IdControl` int(11) NOT NULL,
  `Periodo` varchar(20) NOT NULL,
  `Num_Control` int(8) NOT NULL,
  `checar` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Control`
--

INSERT INTO `Control` (`IdControl`, `Periodo`, `Num_Control`, `checar`) VALUES
(1, 'FEB-JUN 2021', 6, 'Pendiente'),
(2, 'FEB-JUN 2021', 7, 'Pendiente'),
(3, 'FEB-JUN 2021', 11, 'Pendiente'),
(4, 'FEB-JUN 2021', 13, 'Pendiente'),
(5, 'FEB-JUN 2021', 16, 'Pendiente'),
(6, 'FEB-JUN 2021', 17, 'Pendiente'),
(7, 'FEB-JUN 2021', 18, 'Pendiente'),
(8, 'FEB-JUN 2021', 19, 'Pendiente'),
(9, 'FEB-JUN 2021', 22, 'Pendiente'),
(10, 'FEB-JUN 2021', 24, 'Pendiente'),
(11, 'FEB-JUN 2021', 25, 'Pendiente'),
(12, 'FEB-JUN 2021', 26, 'Pendiente'),
(13, 'FEB-JUN 2021', 27, 'Pendiente'),
(14, 'FEB-JUN 2021', 32, 'Pendiente'),
(15, 'FEB-JUN 2021', 35, 'Pendiente'),
(16, 'FEB-JUN 2021', 41, 'Pendiente'),
(17, 'FEB-JUN 2021', 44, 'Pendiente'),
(18, 'FEB-JUN 2021', 45, 'Pendiente'),
(19, 'FEB-JUN 2021', 46, 'Pendiente'),
(20, 'FEB-JUN 2021', 48, 'Pendiente'),
(21, 'FEB-JUN 2021', 54, 'Pendiente'),
(22, 'FEB-JUN 2021', 55, 'Pendiente'),
(23, 'FEB-JUN 2021', 60, 'Pendiente'),
(24, 'FEB-JUN 2021', 64, 'Pendiente'),
(25, 'FEB-JUN 2021', 68, 'Pendiente'),
(26, 'FEB-JUN 2021', 69, 'Pendiente'),
(27, 'FEB-JUN 2021', 70, 'Pendiente'),
(28, 'FEB-JUN 2021', 73, 'Pendiente'),
(29, 'FEB-JUN 2021', 75, 'Pendiente'),
(30, 'FEB-JUN 2021', 78, 'Pendiente'),
(31, 'FEB-JUN 2021', 79, 'Pendiente'),
(32, 'FEB-JUN 2021', 80, 'Pendiente'),
(33, 'FEB-JUN 2021', 81, 'Pendiente'),
(34, 'FEB-JUN 2021', 82, 'Pendiente'),
(35, 'FEB-JUN 2021', 83, 'Pendiente'),
(36, 'FEB-JUN 2021', 86, 'Pendiente'),
(37, 'FEB-JUN 2021', 87, 'Realizado'),
(38, 'FEB-JUN 2021', 89, 'Pendiente'),
(39, 'FEB-JUN 2021', 92, 'Pendiente'),
(40, 'FEB-JUN 2021', 96, 'Pendiente'),
(41, 'FEB-JUN 2021', 97, 'Pendiente'),
(42, 'FEB-JUN 2021', 100, 'Pendiente'),
(43, 'FEB-JUN 2021', 101, 'Pendiente'),
(44, 'FEB-JUN 2021', 104, 'Pendiente'),
(45, 'FEB-JUN 2021', 106, 'Pendiente'),
(46, 'FEB-JUN 2021', 107, 'Pendiente'),
(47, 'FEB-JUN 2021', 111, 'Pendiente'),
(48, 'FEB-JUN 2021', 112, 'Pendiente'),
(49, 'FEB-JUN 2021', 113, 'Pendiente'),
(50, 'FEB-JUN 2021', 114, 'Pendiente'),
(51, 'FEB-JUN 2021', 115, 'Pendiente'),
(52, 'FEB-JUN 2021', 116, 'Pendiente'),
(53, 'FEB-JUN 2021', 120, 'Pendiente'),
(54, 'FEB-JUN 2021', 121, 'Pendiente'),
(55, 'FEB-JUN 2021', 122, 'Pendiente'),
(56, 'FEB-JUN 2021', 123, 'Pendiente'),
(57, 'FEB-JUN 2021', 126, 'Pendiente'),
(58, 'FEB-JUN 2021', 129, 'Pendiente'),
(59, 'FEB-JUN 2021', 134, 'Pendiente'),
(60, 'FEB-JUN 2021', 136, 'Pendiente'),
(61, 'FEB-JUN 2021', 144, 'Pendiente'),
(62, 'FEB-JUN 2021', 150, 'Pendiente'),
(63, 'FEB-JUN 2021', 152, 'Pendiente'),
(64, 'FEB-JUN 2021', 155, 'Pendiente'),
(65, 'FEB-JUN 2021', 156, 'Pendiente'),
(66, 'FEB-JUN 2021', 157, 'Pendiente'),
(67, 'FEB-JUN 2021', 158, 'Pendiente'),
(68, 'FEB-JUN 2021', 159, 'Pendiente'),
(69, 'FEB-JUN 2021', 160, 'Pendiente'),
(70, 'FEB-JUN 2021', 164, 'Pendiente'),
(71, 'FEB-JUN 2021', 165, 'Pendiente'),
(72, 'FEB-JUN 2021', 166, 'Pendiente'),
(73, 'FEB-JUN 2021', 169, 'Pendiente'),
(74, 'FEB-JUN 2021', 170, 'Pendiente'),
(75, 'FEB-JUN 2021', 174, 'Pendiente'),
(76, 'FEB-JUN 2021', 176, 'Pendiente'),
(77, 'FEB-JUN 2021', 179, 'Pendiente'),
(78, 'FEB-JUN 2021', 193, 'Pendiente'),
(79, 'FEB-JUN 2021', 194, 'Pendiente'),
(80, 'FEB-JUN 2021', 195, 'Pendiente'),
(81, 'FEB-JUN 2021', 196, 'Pendiente'),
(82, 'FEB-JUN 2021', 197, 'Pendiente'),
(83, 'FEB-JUN 2021', 201, 'Pendiente'),
(84, 'FEB-JUN 2021', 218, 'Pendiente'),
(85, 'FEB-JUN 2021', 219, 'Pendiente'),
(86, 'FEB-JUN 2021', 220, 'Pendiente'),
(87, 'FEB-JUN 2021', 225, 'Pendiente'),
(88, 'FEB-JUN 2021', 227, 'Pendiente'),
(89, 'FEB-JUN 2021', 229, 'Pendiente'),
(90, 'FEB-JUN 2021', 230, 'Pendiente'),
(91, 'FEB-JUN 2021', 235, 'Pendiente'),
(92, 'FEB-JUN 2021', 237, 'Pendiente'),
(93, 'FEB-JUN 2021', 243, 'Pendiente'),
(94, 'FEB-JUN 2021', 246, 'Pendiente'),
(95, 'FEB-JUN 2021', 247, 'Pendiente'),
(96, 'FEB-JUN 2021', 249, 'Pendiente'),
(97, 'FEB-JUN 2021', 252, 'Pendiente'),
(98, 'FEB-JUN 2021', 254, 'Pendiente'),
(99, 'FEB-JUN 2021', 257, 'Pendiente'),
(100, 'FEB-JUN 2021', 258, 'Pendiente'),
(101, 'FEB-JUN 2021', 262, 'Pendiente'),
(102, 'FEB-JUN 2021', 264, 'Pendiente'),
(103, 'FEB-JUN 2021', 267, 'Pendiente'),
(104, 'FEB-JUN 2021', 269, 'Pendiente'),
(105, 'FEB-JUN 2021', 271, 'Pendiente'),
(106, 'FEB-JUN 2021', 273, 'Pendiente'),
(107, 'FEB-JUN 2021', 274, 'Pendiente'),
(108, 'FEB-JUN 2021', 275, 'Pendiente'),
(109, 'FEB-JUN 2021', 278, 'Pendiente'),
(110, 'FEB-JUN 2021', 280, 'Pendiente'),
(111, 'FEB-JUN 2021', 281, 'Pendiente'),
(112, 'FEB-JUN 2021', 282, 'Pendiente'),
(113, 'FEB-JUN 2021', 283, 'Pendiente'),
(114, 'FEB-JUN 2021', 284, 'Pendiente'),
(115, 'FEB-JUN 2021', 285, 'Pendiente'),
(116, 'FEB-JUN 2021', 286, 'Pendiente'),
(117, 'FEB-JUN 2021', 287, 'Pendiente'),
(118, 'FEB-JUN 2021', 288, 'Pendiente'),
(119, 'FEB-JUN 2021', 289, 'Pendiente'),
(120, 'FEB-JUN 2021', 291, 'Pendiente'),
(121, 'FEB-JUN 2021', 294, 'Pendiente'),
(122, 'FEB-JUN 2021', 295, 'Pendiente'),
(123, 'FEB-JUN 2021', 296, 'Pendiente'),
(124, 'FEB-JUN 2021', 299, 'Pendiente'),
(125, 'FEB-JUN 2021', 300, 'Pendiente'),
(126, 'FEB-JUN 2021', 301, 'Pendiente'),
(127, 'FEB-JUN 2021', 302, 'Pendiente'),
(128, 'FEB-JUN 2021', 303, 'Pendiente'),
(129, 'FEB-JUN 2021', 304, 'Pendiente'),
(130, 'FEB-JUN 2021', 305, 'Pendiente'),
(131, 'FEB-JUN 2021', 306, 'Pendiente'),
(132, 'FEB-JUN 2021', 307, 'Pendiente'),
(133, 'FEB-JUN 2021', 308, 'Pendiente'),
(134, 'FEB-JUN 2021', 309, 'Pendiente'),
(135, 'FEB-JUN 2021', 310, 'Pendiente'),
(136, 'FEB-JUN 2021', 311, 'Pendiente'),
(137, 'FEB-JUN 2021', 312, 'Pendiente'),
(138, 'FEB-JUN 2021', 311, 'Pendiente'),
(139, 'FEB-JUN 2021', 314, 'Pendiente'),
(140, 'FEB-JUN 2021', 315, 'Pendiente'),
(141, 'FEB-JUN 2021', 317, 'Pendiente'),
(142, 'FEB-JUN 2021', 318, 'Pendiente'),
(143, 'FEB-JUN 2021', 319, 'Pendiente'),
(144, 'FEB-JUN 2021', 320, 'Pendiente'),
(145, 'FEB-JUN 2021', 321, 'Pendiente'),
(146, 'FEB-JUN 2021', 323, 'Pendiente'),
(147, 'FEB-JUN 2021', 324, 'Pendiente'),
(148, 'FEB-JUN 2021', 325, 'Pendiente'),
(149, 'FEB-JUN 2021', 327, 'Pendiente'),
(150, 'FEB-JUN 2021', 328, 'Pendiente'),
(151, 'FEB-JUN 2021', 329, 'Pendiente'),
(152, 'FEB-JUN 2021', 330, 'Pendiente'),
(153, 'FEB-JUN 2021', 331, 'Pendiente'),
(154, 'FEB-JUN 2021', 332, 'Pendiente'),
(155, 'FEB-JUN 2021', 334, 'Pendiente'),
(156, 'FEB-JUN 2021', 335, 'Pendiente'),
(157, 'FEB-JUN 2021', 336, 'Pendiente'),
(158, 'FEB-JUN 2021', 337, 'Pendiente'),
(159, 'FEB-JUN 2021', 338, 'Pendiente'),
(160, 'FEB-JUN 2021', 339, 'Pendiente'),
(161, 'FEB-JUN 2021', 340, 'Pendiente'),
(162, 'FEB-JUN 2021', 341, 'Pendiente'),
(163, 'FEB-JUN 2021', 342, 'Pendiente'),
(164, 'FEB-JUN 2021', 343, 'Pendiente'),
(165, 'FEB-JUN 2021', 344, 'Pendiente'),
(166, 'FEB-JUN 2021', 345, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Departamento`
--

CREATE TABLE `Departamento` (
  `Cod_Departamento` int(30) NOT NULL,
  `Nombre_Departamento` varchar(65) NOT NULL,
  `Encargado` varchar(25) DEFAULT NULL,
  `Cod_Area` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Departamento`
--

INSERT INTO `Departamento` (`Cod_Departamento`, `Nombre_Departamento`, `Encargado`, `Cod_Area`) VALUES
(1, 'Ing. en Sistemas Computacionales', NULL, 3),
(2, 'Ing. en Tecnologias de la Informacion y Comunicaciones', NULL, 3),
(3, 'Ing. en Administración', NULL, 3),
(4, 'Ing. en Industrias Alimentarias', NULL, 3),
(5, 'Ing. Industrial', NULL, 3),
(6, 'Ing. Ambiental', NULL, 3),
(7, '---', NULL, 2),
(8, '---', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Periodos`
--

CREATE TABLE `Periodos` (
  `id_periodo` int(11) NOT NULL,
  `fecha_p` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Periodos`
--

INSERT INTO `Periodos` (`id_periodo`, `fecha_p`) VALUES
(4, 'AGO 2021-ENE 2022'),
(5, 'FEB-JUN 2022'),
(6, 'AGO 2022-ENE 2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE `Preguntas` (
  `Num_Pregunta` int(30) NOT NULL,
  `Enunciado` varchar(255) NOT NULL,
  `Id_Tipo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Preguntas`
--

INSERT INTO `Preguntas` (`Num_Pregunta`, `Enunciado`, `Id_Tipo`) VALUES
(1, 'Se me dieron a conocer las condiciones mis funciones con calidad incluyendo la información referente al Sistema de Gestión de Calidad cuando ingrese al plantel educativo:', 4),
(2, 'Consideras que existe un ambiente de confianza entre el personal:', 1),
(3, 'El acceso hacia mis superiores es rápido:', 2),
(4, 'Tienes la confianza de comunicar tus inquietudes, comentarios y opiniones de tus jefes.', 2),
(5, 'Como es la relación con tus compañeros de trabajo.', 1),
(6, 'Es reconocido tu desempeño tu desempeño laboral.', 4),
(7, 'Como consideras la atención que da tu jefe inmediato a tus necesidades de trabajo.', 2),
(8, 'Se toman en cuenta tus opiniones y sugerencias.', 4),
(9, 'Como consideras tu horario de trabajo.', 4),
(10, 'El equipo con el que desempeñas tus actividades, te permite realizarlas satisfactoriamnete.', 3),
(11, 'Los materiales y consumos que se te asignan para el desarrollo de tus actividades\r\n	te permiten controlar la generación de basura y contaminantes dentro de tu área de trabajo', 3),
(12, 'Como considero el espacio donde realizo mis actividades respecto a iluminación, humedad, ruido\r\n	limpieza,etc.', 3),
(13, 'Como considero mi área de trabajoen cuestión de seguridad.', 3),
(14, 'Dentro de tus actividades diarias consideras la prevención de la contaminación en\r\n	tu área trabajo para una mejora del ambiente laboral.', 4),
(15, 'Has recibido orientación para el uso eficiente de los insumos y recursos\r\n	asignados para el desempeño de tus actividades (Papel,consumibles, combustibles, etc.)', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Resultados`
--

CREATE TABLE `Resultados` (
  `Num_Pregunta` int(11) DEFAULT NULL,
  `Periodo` varchar(20) DEFAULT NULL,
  `Cont_Excelente` int(11) NOT NULL,
  `Cont_Bueno` int(11) NOT NULL,
  `Cont_Regular` int(11) NOT NULL,
  `Cont_Deficiente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Resultados`
--

INSERT INTO `Resultados` (`Num_Pregunta`, `Periodo`, `Cont_Excelente`, `Cont_Bueno`, `Cont_Regular`, `Cont_Deficiente`) VALUES
(1, 'FEB-JUN 2021', 0, 1, 0, 0),
(2, 'FEB-JUN 2021', 1, 0, 0, 0),
(3, 'FEB-JUN 2021', 1, 0, 0, 0),
(4, 'FEB-JUN 2021', 1, 0, 0, 0),
(5, 'FEB-JUN 2021', 1, 0, 0, 0),
(6, 'FEB-JUN 2021', 1, 0, 0, 0),
(7, 'FEB-JUN 2021', 0, 0, 0, 1),
(8, 'FEB-JUN 2021', 0, 0, 1, 0),
(9, 'FEB-JUN 2021', 0, 0, 0, 1),
(10, 'FEB-JUN 2021', 0, 1, 0, 0),
(11, 'FEB-JUN 2021', 0, 0, 0, 1),
(12, 'FEB-JUN 2021', 0, 1, 0, 0),
(13, 'FEB-JUN 2021', 1, 0, 0, 0),
(14, 'FEB-JUN 2021', 1, 0, 0, 0),
(15, 'FEB-JUN 2021', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipos`
--

CREATE TABLE `Tipos` (
  `Id_Tipo` int(30) NOT NULL,
  `Tipo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tipos`
--

INSERT INTO `Tipos` (`Id_Tipo`, `Tipo`) VALUES
(1, 'Relación entre el personal'),
(2, 'Relación con el jefe inmediato'),
(3, 'Área de trabajo y Medio Ambiente'),
(4, 'Desempeño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Trabajador`
--

CREATE TABLE `Trabajador` (
  `Num_Control` int(8) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `ApePat` varchar(30) NOT NULL,
  `ApeMat` varchar(30) NOT NULL,
  `Cod_Area` int(30) NOT NULL,
  `Cod_Departamento` int(30) NOT NULL,
  `Puesto` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Trabajador`
--

INSERT INTO `Trabajador` (`Num_Control`, `RFC`, `Nombre`, `ApePat`, `ApeMat`, `Cod_Area`, `Cod_Departamento`, `Puesto`) VALUES
(6, 'JUGY731106RW0', 'Yadira', 'Juarez', 'Guzman', 3, 8, 'Jefe De Departamento'),
(7, 'GOON731205HJ4', 'Norma Gabriela', 'Gonzalez', 'Ortega', 2, 7, 'Director De Area'),
(11, 'VECE760719JC2', 'Emmanuel David', 'Vera', 'Carballo', 2, 7, 'Auxiliar De Departamento'),
(13, 'CUTL770524R39', 'Lilia Yaneth', 'Cruz', 'Tiburcio', 2, 7, 'Encargada De Departamento'),
(16, 'POOA660918C44', 'Alberto', 'Ponce', 'Olvera', 3, 8, 'Subdirector'),
(17, 'CUMB7705316E6', 'Bellamin Isabel', 'Cruz', 'Martinez', 2, 7, 'Jefe De Departamento'),
(18, 'LEOH710414GY2', 'Humberto', 'Lezama', 'Olivares', 3, 3, 'Jefe De Division'),
(19, 'OEVO630913BT5', 'Olga', 'Olvera', 'Vega', 1, 6, 'Jefe De Oficina'),
(22, 'JOGE7405085R9', 'Erendida', 'Johnson', 'Guzman', 3, 2, 'Docente'),
(24, 'OOAJ701126BS7', 'Jose', 'Osorio', 'Antonia', 3, 2, 'Jefe De Division'),
(25, 'REFI530706FG0', 'Isaias', 'Reyes', 'Flores', 3, 2, 'Docente'),
(26, 'FEAR710106NV5', 'Reynol', 'Fernandez', 'Aguilar', 3, 3, 'Docente'),
(27, 'MOCE6708267E1', 'Esther', 'Moreno', 'Carbajal', 3, 5, 'Jefe De Division'),
(32, 'VIAB781105L11', 'Blanca Olivia', 'Vite', 'Del Angel', 3, 8, 'Docente'),
(35, 'CUCE740103MM0', 'Edalid', 'Cruz', 'Cobos', 3, 8, 'Jefe De Departamento'),
(41, 'MOGA741004MF2', 'Angel Ranferi', 'Moreno', 'Guerrero', 3, 8, 'Director De Area'),
(44, 'VAPR580313QE9', 'Rodrigo', 'Valdez', 'Ponce', 2, 7, 'Jefe De Division'),
(45, 'CECD7908065UA', 'Daniel', 'Clemente', 'Chavez', 1, 6, 'Tecnico En Mantenimiento'),
(46, 'MOOV7512203E3', 'Veronica del Carmen', 'Monroy', 'Ornelas', 2, 7, 'Subdirector'),
(48, 'LOHF680921EV8', 'Fernando', 'Lopez', 'Herrera', 3, 2, 'Docente'),
(54, 'CUCG691202CQ4', 'Gloria', 'De la Cruz', 'De la Cruz', 2, 7, 'Jefe De Departamento'),
(55, 'AUMA650705QY4', 'Alba Delia', 'Aguirre', 'Medecigo', 3, 2, 'Docente'),
(60, 'BEPC770216EX3', 'Cynthia', 'Bernabe', 'Pacheco', 3, 1, 'Docente'),
(64, 'MACJ770905BR2', 'Julia Edith', 'Martinez', 'Cobos', 2, 7, 'Jefe De Departamento'),
(68, 'VICK8003109N1', 'Karime', 'Vizcarra', 'Can', 3, 1, 'Docente'),
(69, 'VICA7905296K0', 'Alejandro', 'Villanueva', 'CerÃ³n', 3, 1, 'Docente'),
(70, 'PERJ780918SD7', 'Jacqueline', 'Perez', 'Rodriguez', 3, 3, 'Docente'),
(73, 'ROAA660412GE0', 'Ana Maria', 'Rosales', 'Ariguznaga', 3, 4, 'Docente'),
(75, 'VACA7710182Y5', 'Ana Leyda', 'Valdez', 'Carballo', 3, 8, 'Jefe De Departamento'),
(78, 'TULT7911258M1', 'Tania', 'Turrubiates', 'López', 3, 1, 'Docente'),
(79, 'CARC770714AVA', 'Claudia', 'Carballo', 'Rivera', 1, 6, 'Encargada De Departamento'),
(80, 'GALL760712442', 'Liliana', 'Garcia', 'Lombera', 2, 7, 'Bibliotecario'),
(81, 'TOHA750421J61', 'Alejandra', 'Townsend', 'Hernandez', 3, 8, 'Encargada De Oficina'),
(82, 'SAMB6911294BA', 'Blanca Estela', 'Santiago', 'Marcelino', 1, 6, 'Jefe De Departamento'),
(83, 'AASE790728DY8', 'Edgar', 'Amador', 'Silva', 2, 7, 'Subdirector'),
(86, 'HERV700615GMA', 'Victor', 'Hernandez', 'Reyes', 1, 6, 'Encargado De Jardineria'),
(87, 'AUVJ660508GI6', 'Juan Carlos', 'Aguirre', 'Villarruel', 1, 6, 'Jefe De Departamento'),
(89, 'CUTM7611171C3', 'Miguel Angel', 'De la Cruz', 'Tiburcio', 3, 1, 'Jefe De Division'),
(92, 'HESA781127J29', 'Arely', 'Hernandez', 'San Juan', 3, 1, 'Docente'),
(96, 'MOFJ540423B38', 'Jorge Luis', 'Morales', 'Flores', 1, 6, 'Chofer De Direccion'),
(97, 'GAEE730703DP4', 'Elma', 'Garcia', 'Escalante', 1, 2, 'Docente'),
(100, 'AEHD640704UQ7', 'Debora del Refugio', 'Arres', 'Hernandez', 2, 7, 'Tecnico Especializado'),
(101, 'OICJ790330ND7', 'Janeth', 'Olivares', 'Cruz', 3, 1, 'Docente'),
(104, 'MARM810127RF5', 'Maritza', 'Martinez', 'Reyes', 2, 7, 'Encargada De Departamento'),
(106, 'AOCG691108SL1', 'Maria Guadalupe', 'Antonio', 'Cruz', 3, 2, 'Docente'),
(107, 'PEFJ660730FB2', 'Maria Julieta', 'Perez', 'Flores', 2, 7, 'Jefe De Oficina'),
(111, 'FOHA760813CE1', 'Aurora', 'Flores', 'Herrera', 3, 1, 'Encargada De Departamento'),
(112, 'GALL670120IN6', 'Jose Luis', 'Garcia', 'Lopez', 3, 8, 'Jefe De Division'),
(113, 'BACL7611164F3', 'Lila Margarita', 'Bada', 'Carbajal', 3, 2, 'Docente'),
(114, 'MOMA770111919', 'Alejandra', 'Morales', 'Martinez', 3, 4, 'Docente'),
(115, 'DODD790423EF6', 'Dalia', 'Dominguez', 'Diaz', 3, 1, 'Docente'),
(116, 'HECA800322JG7', 'Alexander', 'Herandez', 'Cruz', 3, 2, 'Docente'),
(120, 'CAML760211ERA', 'Leandro', 'Chaires', 'Martinez', 3, 8, 'Docente'),
(121, 'JIAH740924PZA', 'Hector Alejandro', 'Jimenez', 'Avalos', 3, 8, 'Docente'),
(122, 'RAHZ7701129N1', 'Zarahemla', 'Ramirez', 'Hernandez', 3, 3, 'Docente'),
(123, 'COHF751013QN9', 'Florentina', 'Cobos', 'Hernandez', 1, 6, 'Jefe De Departamento'),
(126, 'LOVM691225D56', 'Miguel Angel', 'Lopez', 'Velazquez', 1, 4, 'Docente'),
(129, 'AOVJ831112GV4', 'Janeth', 'Antonio', 'Velazquez', 1, 6, 'Jefe De Oficina'),
(134, 'CERS8403296L5', 'Sabina Elizabeth', 'Cerecedo', 'Rodriguez', 3, 8, 'Psicologo'),
(136, 'HEBP810418U16', 'Pascual', 'Hernandez', 'Bautista', 3, 3, 'Docente'),
(144, 'LOFE761011M66', 'Edgar Guadalupe', 'Lopez', 'Fuentes', 3, 8, 'Docente'),
(150, 'MUCM690526J59', 'Marisol', 'Mundo', 'Cruz', 1, 6, 'Secretaria De Direccion General'),
(152, 'OUHN8807212W8', 'Noe Emmanuel', 'Olguin', 'Hernandez', 1, 6, 'Laboratorista'),
(155, 'DOCG830622UVA', 'German', 'Dominguez', 'Carrillo', 3, 4, 'Docente'),
(156, 'MOCE830830RU3', 'Enrique Hugo', 'Morales', 'Cobos', 1, 6, 'Encargado De Departamento'),
(157, 'PEVM800928LC9', 'Miguel Alberto', 'Perez', 'Vargas', 3, 3, 'Docente'),
(158, 'RAMS840703KM9', 'Silverio', 'Ramirez', 'Martinez', 3, 1, 'Docente'),
(159, 'FOPO6706268C6', 'Olga', 'Flores', 'Perez', 1, 6, 'Jefe De Oficina'),
(160, 'HECE681115D29', 'Eugenia', 'Hernandez', 'Cruz', 1, 6, 'Jefe De Oficina'),
(164, 'PIRJ761113K60', 'Juan', 'Pitta', 'Rosado', 3, 8, 'Docente'),
(165, 'HESC8301097I0', 'Cenia Edith', 'Hernandez', 'San Juan', 3, 4, 'Docente'),
(166, 'LARE811125HB8', 'Erasmo', 'Lara', 'Roman', 3, 4, 'Docente'),
(169, 'CUGJ8311084K2', 'Josefina', 'Cruz', 'Gutierrez', 2, 7, 'Analista Especializado'),
(170, 'SACM830815G60', 'Mariana', 'Sanchez', 'Correa', 2, 7, 'Jefe De Departamento'),
(174, 'SASE761130PQ5', 'Eduardo', 'Salas', 'Suarez', 2, 7, 'Jefe De Departamento'),
(176, 'HECJ890330HE1', 'Jesus Roberto', 'Hernandez', 'Cruz', 1, 6, 'Intendente'),
(179, 'RAMO870925UKA', 'Osiel Daniel', 'Ramirez', 'Montiel', 3, 2, 'Docente'),
(193, 'ZAJN800914BB3', 'Nancy Gabriela', 'Zaleta', 'Johnson', 3, 8, 'Prefecto'),
(194, 'MOSP740830QH3', 'Perla Hiliana', 'Morales', 'Soberanes', 1, 6, 'Intendente'),
(195, 'PEOL7408211I1', 'Jose Luis', 'Perez', 'Olvera', 1, 6, 'Encargado De Jardineria'),
(196, 'AIRJ780413NC6', 'Jorge Luis', 'Animas', 'Robles', 3, 5, 'Docente'),
(197, 'HECN880420RI4', 'Nancy Deyanira', 'Hernandez', 'Castellanos', 3, 3, 'Docente'),
(201, 'TINM8301275X7', 'Maribel', 'Tiburcio', 'Noyola', 1, 6, 'Secretaria De Subdirector'),
(218, 'MOGI5803064I3', 'Irma', 'Morales', 'Garcia', 3, 8, 'Docente'),
(219, 'RERM6508223P6', 'Myrna', 'Renata', 'Ramirez', 3, 8, 'Docente'),
(220, 'VILA790315925', 'Aristides', 'Villegas', 'Lopez', 3, 8, 'Docente'),
(225, 'TEAO861017CC6', 'Maria Ojilvie', 'Terrones', 'Arellano', 3, 8, 'Docente'),
(227, 'RASE850513RD9', 'Erick Abraham', 'Ramirez', 'San Roman', 1, 6, 'Intendente'),
(229, 'BAPG810922318', 'Graciela Del Carmen', 'Bautista', 'Palacios', 3, 8, 'Docente'),
(230, 'GUAR850921RE3', 'Ruben Alejandro', 'Gutierrez', 'Adrian', 3, 8, 'Docente'),
(235, 'NIMP781004P17', 'Placido', 'Nicolas', 'Mateo', 1, 6, 'Intendente'),
(237, 'MAPE9003319P5', 'Maria Elena', 'Martinez', 'Portilla', 1, 6, 'Encargada De Prodet'),
(243, 'SOGF780801L84', 'Fernando', 'Sotelo', 'Giner', 3, 5, 'Docente'),
(246, 'TISB8711013BA', 'Blanca Estela', 'Tiburcio', 'Solares', 1, 6, 'Intendente'),
(247, 'CAAI8404106D5', 'Ivan Francisco', 'Castillo', 'Abarca', 1, 6, 'Ingeniero De Sistemas'),
(249, 'OIVJ8008279P0', 'Jorge Armando', 'Olivares', 'Ventura', 1, 6, 'Ingeniero De Sistemas'),
(252, 'OEBJ890106MR0', 'Jorge Michel', 'Orellan', 'Blanco', 3, 8, 'Programador'),
(254, 'VIVR7807035YA', 'Roberto Antonio', 'Vilis', 'Valdes', 3, 5, 'Docente'),
(257, 'REJF880627TZ2', 'Fernando', 'Reyes', 'Juarez', 3, 4, 'Docente'),
(258, 'FUOM721016PE4', 'Margarita', 'Fuentes', 'Olivares', 3, 5, 'Docente'),
(262, 'MAGH740909RP5', 'Hugo', 'Martinez', 'Garcia', 3, 8, 'Jefe De Oficina'),
(264, 'PILA8506158PA', 'Alma Aracely', 'Pinete', 'Luna', 2, 7, 'Docente'),
(267, 'CABM760720516', 'Moises', 'Carballo', 'Badillo', 1, 6, 'Secretario De Director'),
(269, 'DIAL810903LL1', 'Lazaro', 'Diaz', 'Aranda', 3, 8, 'Docente'),
(271, 'GOVG891212QK3', 'Guillermo Antonio', 'Gomez', 'Vazquez', 3, 8, 'Docente'),
(273, 'CACV8912203C1', 'Victoria', 'Cardenas', 'Chavero', 3, 4, 'Docente'),
(274, 'SORG811212NY1', 'Guadalupe', 'Sobrevilla', 'Rivera', 3, 8, 'Secretaria Jefe De Departamento'),
(275, 'SAAN700530IIA', 'Nereyda', 'Santiago', 'AvendaÃ±o', 2, 7, 'Secretaria De Subdirector'),
(278, 'TAFV930626Q89', 'Victor Hugo', 'Tlapacoyoa', 'Francisco', 3, 5, 'Docente'),
(280, 'SACY890819270', 'Yuridia Eusebia', 'Santos', 'Cruz', 3, 1, 'Docente'),
(281, 'OOGS8711024G3', 'Silvia', 'Osorio', 'Gertrudis', 2, 7, 'Enfermera'),
(282, 'SACR771023JD4', 'Rosa Angelica', 'Samano', 'Cardenas', 3, 8, 'Docente'),
(283, 'SECC791023QJ9', 'Carmen', 'Serrano', 'Chavero', 3, 1, 'Docente'),
(284, 'CEPC810711IU2', 'Claudia Patricia', 'Cerecedo', 'PatiÃ±o', 2, 7, 'Secretaria De Jefe Departamento'),
(285, 'SAE900805D62', 'Rocio', 'Sanchez', 'Escobar', 3, 4, 'Docente'),
(286, 'PEGE8911223J1', 'Ely Monserrat', 'Perez', 'Garcia', 3, 4, 'Docente'),
(287, 'EOHR810320II8', 'Raul', 'Escobar', 'Hernandez', 3, 4, 'Docente'),
(288, 'LAHO881125JL3', 'Odilon', 'Lara', 'Hernandez', 3, 4, 'Docente'),
(289, 'JUPF730619NZ4', 'Fredy', 'Juarez', 'Perez', 3, 1, 'Docente'),
(291, 'BEZH6103317JA', 'Humberto', 'Benitez', 'Zequera', 3, 8, 'Docente'),
(294, 'GOEM820411AS9', 'Marco Antonio', 'Gomez', 'Esteban', 2, 7, 'Analista Tecnico'),
(295, 'CUDP920627L79', 'Perla Jazmin', 'Cruz', 'Dominguez', 1, 6, 'Secretaria De Jefe Departamento'),
(296, 'BAGL820704GF7', 'Liliana', 'Bautista', 'Gomez', 1, 6, 'Intendente'),
(299, 'BACR660326767', 'Rosaura', 'Baca', 'De la Cruz', 3, 8, 'Docente'),
(300, 'PULE830913f52', 'Edgar', 'Pulido', 'Lara', 3, 2, 'Docente'),
(301, 'MASL690621JY5', 'Luis Guillermo', 'Martinez', 'Sarmiento', 1, 6, 'Director General'),
(302, 'CARC500208PE3', 'Ciriaco', 'Castellanos', 'Rangel', 3, 8, 'Auxiliar De Departamento'),
(303, 'GOCG590925HZ9', 'Jose Gabriel', 'Corrales', 'Gonzalez', 3, 2, 'Asesor Juridico'),
(304, 'OOMS831103270', 'Samuel', 'Ochoa', 'Mendez', 1, 6, 'Coordinador De Promociones'),
(305, 'GUCJ600821JR2', 'Julia', 'Guzman', 'Castan', 1, 6, 'Asesor Juridico'),
(306, 'MALA820113', 'Andres', 'Marquez', 'Lara', 3, 8, 'Tecnico Especializado'),
(307, 'MAPC880912DQ3', 'Citlali', 'Martinez', 'Perez', 3, 8, 'Docente'),
(308, 'LOBD821229', 'David', 'Lopez', 'Barcelata', 1, 6, 'Jefe De Departamento'),
(309, 'TOMJ741223538', 'Juan', 'Torres', 'Maldonado', 1, 6, 'Subdirector Administrativo'),
(310, 'IAHP640329G10', 'Pascual', 'Islas', 'Hernandez', 1, 6, 'Encargado De Mantenimiento'),
(311, 'AEAJ680422DB6', 'Jorge Luis', 'Del Angel', 'Arguelles', 1, 6, 'Vigilante'),
(312, 'LOMA631215NG6', 'Arturo', 'Lopez', 'Medina', 3, 4, 'Jefe De Division'),
(314, 'EIHI880424P72', 'Irving German', 'Espinoza', 'Hernandez', 3, 3, 'Docente'),
(315, 'CUHA890113F31', 'Alejandro', 'Cruz', 'Hernandez', 3, 3, 'Docente'),
(317, 'CUGC641125QW0', 'Cornelio', 'De la Cruz', 'Guerra', 3, 8, 'Docente'),
(318, 'CAJA920829L91', 'Abelardo', 'Cardenas', 'Juncal', 3, 8, 'Docente'),
(319, 'FOOC930522P95', 'Cinthya Berenice', 'Fosados', 'Osorio', 3, 8, 'Docente'),
(320, 'VAAD9107273P6', 'Diana Lucia', 'Valdez', 'Aguire', 3, 8, 'Secretaria De Subdirector'),
(321, 'MAPL840208MZ0', 'Luis Rene', 'Matus', 'Perez', 3, 8, 'Docente'),
(323, 'IAMA8708159Z5', 'Ariana de la Asuncion', 'Islas', 'Martinez', 1, 6, 'Intendente'),
(324, 'AOVM770227J55', 'Mario Alberto', 'Antonio', 'Velasco', 1, 6, 'Mantenimiento'),
(325, 'HEMG801212953', 'Guadalupe', 'Hernandez', 'Marcial', 1, 6, 'Intendente'),
(327, 'RAVS870828238', 'Sergio', 'Ramirez', 'Vite', 1, 6, 'Intendente'),
(328, 'GAMI730706QZ0', 'Ismael', 'Garcia', 'Martinez', 3, 8, 'Prefecto'),
(329, 'MARE721116TD9', 'Esmeralda', 'Marquez', 'Ramirez', 3, 8, 'Prefecto'),
(330, 'GUGN7404188W0', 'Natalio', 'Guerrero', 'Gonzalez', 1, 6, 'Intendente'),
(331, 'ROBM660130ML7', 'Martina', 'Rosas', 'Bartolo', 1, 6, 'Intendente'),
(332, 'GAPJ910721P66', 'Jazmin', 'Garcia', 'Plata', 2, 7, 'Secretaria De Subdirector'),
(334, 'HERJ9509101N6', 'Julio Cesar', 'Hernandez', 'Ruiz', 2, 7, 'Auxiliar De Departamento'),
(335, 'RANE880711QBA', 'Maria Esther', 'Ramos', 'Nery', 2, 7, 'Enfermera'),
(336, 'MOLR870608MS2', 'Rosa Maria', 'Monroy', 'Lopez', 3, 8, 'Docente'),
(337, 'HESN730109H55', 'Nicolasa', 'Hernandez', 'Sosa', 3, 8, 'Docente'),
(338, 'RIA0911009CZ8', 'Oscar Eduardo', 'Rivas', 'Aguilar', 3, 8, 'Docente'),
(339, 'SERJ670115AI3', 'Juan Carlos', 'Sedano', 'RuiseÃ±or', 3, 8, 'Docente'),
(340, 'OEDR860623Q45', 'Rosario', 'Ortega', 'Diaz', 3, 8, 'Docente'),
(341, 'CAOJ890501HA0', 'Janeth', 'Carmona', 'Osorio', 3, 8, 'Docente'),
(342, 'BABA940308UC6', 'Adela', 'Bautista', 'Burgos', 3, 8, 'Docente'),
(343, 'PICK891216NT3', 'Karla Ivette', 'Prieto', 'Carrasco', 3, 8, 'Docente'),
(344, 'AASA830910Q91', 'Alicia del Carmen', 'Alvarez', 'Salas', 3, 8, 'Docente'),
(345, 'SEPJ850918EA1', 'Juan Bernardo', 'Segura', 'Perez', 1, 6, 'Programador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `Area`
--
ALTER TABLE `Area`
  ADD PRIMARY KEY (`Cod_Area`);

--
-- Indices de la tabla `Control`
--
ALTER TABLE `Control`
  ADD PRIMARY KEY (`IdControl`),
  ADD KEY `Num_Control` (`Num_Control`);

--
-- Indices de la tabla `Departamento`
--
ALTER TABLE `Departamento`
  ADD PRIMARY KEY (`Cod_Departamento`),
  ADD KEY `Cod_Area` (`Cod_Area`);

--
-- Indices de la tabla `Periodos`
--
ALTER TABLE `Periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`Num_Pregunta`),
  ADD KEY `Id_Tipo` (`Id_Tipo`);

--
-- Indices de la tabla `Resultados`
--
ALTER TABLE `Resultados`
  ADD KEY `Num_Pregunta` (`Num_Pregunta`);

--
-- Indices de la tabla `Tipos`
--
ALTER TABLE `Tipos`
  ADD PRIMARY KEY (`Id_Tipo`);

--
-- Indices de la tabla `Trabajador`
--
ALTER TABLE `Trabajador`
  ADD PRIMARY KEY (`Num_Control`),
  ADD KEY `Cod_Area1` (`Cod_Area`),
  ADD KEY `Cod_Departamento` (`Cod_Departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Control`
--
ALTER TABLE `Control`
  MODIFY `IdControl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `Periodos`
--
ALTER TABLE `Periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
