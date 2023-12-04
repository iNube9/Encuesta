-- --------------------------------------------------------
-- Host:                         siia.lapaz.tecnm.mx
-- Versión del servidor:         8.0.19 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla encuestas.encuestas
CREATE TABLE IF NOT EXISTS `encuestas` (
  `Clave` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL DEFAULT '?',
  `Activa` enum('SI','NO') NOT NULL DEFAULT 'NO',
  `AñoActivo` int NOT NULL DEFAULT '0',
  `PeriodoActivo` int NOT NULL DEFAULT '0',
  `ParaElPersonal` enum('SI','NO') NOT NULL DEFAULT 'NO',
  `ParaElAlumnado` enum('SI','NO') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`Clave`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla encuestas.encuestas: ~8 rows (aproximadamente)
INSERT INTO `encuestas` (`Clave`, `Nombre`, `Activa`, `AñoActivo`, `PeriodoActivo`, `ParaElPersonal`, `ParaElAlumnado`) VALUES
	(1, 'Ambiente Laboral ANTERIOR', 'NO', 2018, 1, 'SI', 'NO'),
	(2, 'Cuestionario para identificar de preferencias en GESTION EMPRESARIAL', 'NO', 2011, 1, 'NO', 'SI'),
	(3, 'Evaluacion de la politica de equidad de genero', 'NO', 2011, 1, 'SI', 'NO'),
	(4, 'Evaluacion docente', 'NO', 2023, 1, 'NO', 'SI'),
	(5, 'Encuesta de satisfacción de servicio de cafetería', 'NO', 2019, 2, 'SI', 'SI'),
	(6, 'Evaluación del Estudiante al Tutor', 'NO', 2022, 1, 'NO', 'SI'),
	(7, 'Ambiente Laboral 2019', 'NO', 2022, 1, 'SI', 'NO'),
	(101, 'Sistemas Distribuidos', 'NO', 2016, 2, 'NO', 'SI');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
