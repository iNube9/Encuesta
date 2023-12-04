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

-- Volcando estructura para tabla encuestas.opciones
CREATE TABLE IF NOT EXISTS `opciones` (
  `encuesta` int NOT NULL DEFAULT '0',
  `pregunta` int NOT NULL DEFAULT '0',
  `Opcion` varchar(1) NOT NULL DEFAULT 'A',
  `Texto` varchar(500) NOT NULL DEFAULT '-',
  PRIMARY KEY (`encuesta`,`pregunta`,`Opcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla encuestas.opciones: ~10 rows (aproximadamente)
INSERT INTO `opciones` (`encuesta`, `pregunta`, `Opcion`, `Texto`) VALUES
	(3, 2, 'A', 'Mantener un ambiente de trabajo armonioso'),
	(3, 2, 'B', 'Favorecer la equidad de género'),
	(3, 2, 'C', 'Las dos anteriores'),
	(3, 3, 'A', 'El SNEST establece el compromiso de promover la igualdad para las mujeres y que  obtengan el mismo salario que los hombres, la prevención del hostigamiento sexual y la no discriminación entre hombres y mujeres; y tiene el propósito de mantener un ambiente de trabajo armonioso que busque el bienestar de la mujer en su entorno laboral.'),
	(3, 3, 'B', 'El SNEST establece el compromiso de promover la igualdad de oportunidades en el acceso y promoción al empleo, la prevención del hostigamiento sexual y la no discriminación entre hombres y mujeres; a través del desarrollo de acciones afirmativas y/o a favor del personal, con el propósito de mantener un ambiente de trabajo armonioso y favorecer la equidad de género.'),
	(3, 3, 'C', 'El SNEST establece el compromiso de promover la igualdad de hombres y mujeres para que tengan las mismas oportunidades de acceso a los puestos de la alta dirección, a través del desarrollo de cursos de capacitación; con el propósito de contratar la misma cantidad de mujeres y de hombres.'),
	(7, 10, 'A', 'Para el desempeño de tu trabajo.'),
	(7, 10, 'B', 'Para tu superación personal.'),
	(7, 10, 'C', 'De cooperación en tu área.'),
	(7, 10, 'D', 'De supervisión por parte de tu jefe(a) inmediato.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
