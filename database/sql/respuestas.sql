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

-- Volcando estructura para tabla encuestas.respuestas
CREATE TABLE IF NOT EXISTS `respuestas` (
  `año` int NOT NULL DEFAULT '0',
  `periodo` int NOT NULL DEFAULT '0',
  `encuestado` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '?',
  `encuesta` int NOT NULL DEFAULT '0',
  `pregunta` int NOT NULL DEFAULT '0',
  `respuesta` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  `materia` int NOT NULL DEFAULT '0',
  `grupo` varchar(1) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '?',
  PRIMARY KEY (`año`,`periodo`,`encuestado`,`encuesta`,`pregunta`,`materia`,`grupo`),
  KEY `materia` (`materia`,`grupo`,`año`,`periodo`,`encuesta`,`encuestado`),
  KEY `encuesta` (`encuesta`),
  KEY `encuesta_pregunta` (`encuesta`,`pregunta`),
  KEY `encuesta_pregunta_anio` (`año`,`encuesta`,`pregunta`),
  KEY `Índice 6` (`encuestado`,`año`,`periodo`),
  KEY `Índice 7` (`encuestado`),
  KEY `Índice 8` (`año`,`periodo`,`encuesta`,`grupo`,`materia`),
  KEY `Índice 9` (`año`,`periodo`,`pregunta`,`encuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
