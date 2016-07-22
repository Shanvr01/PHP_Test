-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table dvd_shop.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'customer''s first name',
  `name` text COMMENT 'customer''s surname',
  `surname` text,
  `contact_number` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sa_id_number` varchar(13) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table dvd_shop.customer: ~6 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `name`, `surname`, `contact_number`, `email`, `sa_id_number`, `address`) VALUES
	(1, 'John', 'Doe', '0784562549', 'John@gmail.com', '9014454652322', '30 Salamander Street, Langebaan'),
	(2, 'Susan', 'Doe', '0215454558', 'suzy@gmail.com', '6412030212015', '19 flat road, Cape Town'),
	(3, 'Jack', 'London', '0714568597', 'jlondon@gmail.com', '8802146528456', '12 There street, Cape town'),
	(4, 'Jan ', 'Poggenpoel', '0745698556', 'poggies@gmail.com', '9102151253085', '58 Crab Road, Cape Town'),
	(5, 'Debbie', 'Waters', '0825123674', 'dwaters@telkomsa.net', '9203252356945', '102 Heights Street, Cape Town'),
	(39, 'Peter', 'Parker', '0796574657', 'peterparker_new@mail.com', '9311195583085', '30 Straat street, cape town');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
