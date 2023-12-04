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

-- Volcando estructura para tabla encuestas.clasificaciones
CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `Encuesta` int NOT NULL DEFAULT '0',
  `Clave` int NOT NULL DEFAULT '0',
  `Nombre` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Encuesta`,`Clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla encuestas.clasificaciones: ~37 rows (aproximadamente)
INSERT INTO `clasificaciones` (`Encuesta`, `Clave`, `Nombre`) VALUES
	(1, 1, 'Breves'),
	(1, 2, 'Condiciones Fisicas de Trabajo'),
	(1, 3, '0'),
	(1, 4, '0'),
	(1, 5, '0'),
	(1, 6, 'Supervision'),
	(1, 7, 'Compatibilidad entre la vida laboral y Familiar'),
	(2, 1, 'LEGAL'),
	(2, 2, 'PRODUCCION'),
	(2, 3, 'FINANZAS'),
	(2, 4, 'MERCADOTECNIA'),
	(4, 1, 'Dominio de la asignatura'),
	(4, 2, 'Planificación del curso'),
	(4, 3, 'Ambientes de aprendizaje'),
	(4, 4, 'Estrategias, métodos y técnicas'),
	(4, 5, 'Motivación'),
	(4, 6, 'Evaluación'),
	(4, 7, 'Comunicación'),
	(4, 8, 'Gestión del curso'),
	(4, 9, 'Tecnologías de la información y comunicación'),
	(4, 10, 'Satisfacción general'),
	(5, 1, 'Calidad'),
	(5, 2, 'Precios'),
	(5, 3, 'Servicio'),
	(5, 4, 'Higiene'),
	(5, 5, 'Atención a Becados'),
	(6, 1, 'Genera un clima de confianza que permite el logro de los propósitos de la tutoría'),
	(6, 2, 'Calidad de la información proporcionada al tutorado'),
	(6, 3, 'Disponibilidad y calidad en la atención tutorial'),
	(6, 4, 'Planeación y preparación en los procesos de la tutoría'),
	(7, 1, 'CONDICIONES DE TRABAJO'),
	(7, 2, 'COOPERACIÓN'),
	(7, 3, 'SUPERVISIÓN'),
	(7, 4, 'SATISFACCIÓN EN EL TRABAJO'),
	(7, 5, 'COMPATIBILIDAD ENTRE LA VIDA LABORAL Y FAMILIAR'),
	(7, 6, 'SALUD EN EL TRABAJO'),
	(7, 7, 'OTROS');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
