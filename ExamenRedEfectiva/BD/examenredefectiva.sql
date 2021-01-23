-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2021 a las 04:50:22
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examenredefectiva`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_all` (OUT `total` INT)  BEGIN
    SELECT id, matricula, nombre, apellidoP, apellidoM, fecha_nac, IF(genero="M","Masculino",IF(genero="F","Femenino",genero)) AS genero, grado, IF(estatus="A","ACTIVO",IF(estatus="B","INACTIVO",estatus)) AS estatus FROM alumnos;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_all_activos` (OUT `total` INTEGER)  BEGIN
   SELECT `id`, `matricula`, `nombre`, `apellidoP`, `apellidoM`, `fecha_nac`, IF(genero='M','Masculino',IF(genero='F','Femenino',genero)) AS genero, `grado`, IF(estatus='A','ACTIVO',IF(estatus='B','INACTIVO',estatus)) AS estatus FROM alumnos WHERE estatus='A'; 
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_all_activos_grado` (IN `grado_bsc` INT(2))  BEGIN
   SELECT `id`, `matricula`, `nombre`, `apellidoP`, `apellidoM`, `fecha_nac`, IF(genero='M','Masculino',IF(genero='F','Femenino',genero)) AS genero, `grado`, IF(estatus='A','ACTIVO',IF(estatus='B','INACTIVO',estatus)) AS estatus FROM alumnos WHERE grado= grado_bsc ; 
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_consulta_detalle` (IN `IDA` INT(11))  BEGIN
SELECT `id`, `matricula`, `nombre`, `apellidoP`, `apellidoM`, `fecha_nac`, IF(genero='M','Masculino',IF(genero='F','Femenino',genero)) AS genero, `grado`,`estatus` FROM alumnos WHERE id=IDA LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_estatus` (IN `estatusA` VARCHAR(1), IN `IDA` INT(11))  BEGIN
UPDATE alumnos SET estatus=estatusA WHERE id= IDA  ;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_modificar` (IN `matriculaA` INT(4), IN `nombreA` VARCHAR(40), IN `apellidoPA` VARCHAR(25), IN `apellidoMA` VARCHAR(25), IN `fecha_nacA` DATE, IN `generoA` VARCHAR(1), IN `gradoA` INT(2), IN `IDA` INT(11))  BEGIN

UPDATE alumnos SET 
                                  matricula =  matriculaA,
                                  nombre =  nombreA,
                                  apellidoP =  apellidoPA,
                                  apellidoM =  apellidoMA,
                                  fecha_nac =  fecha_nacA,
                                  genero =  generoA,
                                  grado =   gradoA

                              WHERE id= IDA  ;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_registro` (IN `matriculaA` INT(4), IN `nombreA` VARCHAR(40), IN `apellidoPA` VARCHAR(25), IN `apellidoMA` VARCHAR(25), IN `fecha_nacA` DATE, IN `generoA` VARCHAR(1), IN `gradoA` INT(2))  BEGIN

 INSERT INTO alumnos (
                                  matricula,
                                  nombre,
                                  apellidoP,
                                  apellidoM,
                                  fecha_nac,
                                  genero,
                                  grado) 
                    VALUES        (
                                matriculaA,
                                nombreA,
                                apellidoPA,
                                apellidoMA,
                                fecha_nacA,
                                generoA,
                                gradoA
                                  );
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alumnos_totales` (IN `total` INT(1))  BEGIN
 SELECT grado, IF(estatus="A","ACTIVO",IF(estatus="B","INACTIVO",estatus)) AS estatus,COUNT(id) AS TOTAL_ALUMNOS  FROM alumnos GROUP BY grado,estatus;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `matricula` int(4) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidoP` varchar(25) NOT NULL,
  `apellidoM` varchar(25) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` varchar(1) NOT NULL COMMENT 'M-MASCULINO F-FEMENINO',
  `grado` int(2) NOT NULL,
  `estatus` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A-ACTIVO  B-BAJA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `matricula`, `nombre`, `apellidoP`, `apellidoM`, `fecha_nac`, `genero`, `grado`, `estatus`) VALUES
(1, 1, 'ALDO', 'RAMIREZ', 'OVALLE', '2021-01-22', 'M', 1, 'A'),
(2, 2, 'RIGOBERTITO', 'OZUNA', 'YANDEL', '1998-05-04', 'M', 2, 'B');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
